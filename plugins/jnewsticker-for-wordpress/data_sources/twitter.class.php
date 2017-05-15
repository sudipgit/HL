<?php
/**
 * Retrieves and formats recent tweets for use in a jNewsticker instance
 * 
 * @author Eric Daams <eric@164a.com>
 */

class jNewsticker_Twitter extends jNewsticker_Data_Source {

    /**
     * Instantiate object
     * @return void
     */
    public function __construct($jnewsticker = null) {
        parent::__construct( $jnewsticker );
        $this->id = 'jnews_source_twitter';
        $this->title = __('Twitter', 'jnews');
        $this->name = 'jNewsticker_Twitter';
        $this->assist = __('Displays most recent tweets', 'jnews');
        $this->allows_extra = true;
        $this->extra_instance_text = __('Add another Twitter feed', 'jnews');
        $this->variables = array(
            'author' => array(
                'description' => __('Display username', 'jnews'),
                'method' => 'get_item_author'
            ),
            'excerpt' => array(
                'description' => __('Display excerpt of tweet. Note that links are not preserved in excerpts.', 'jnews'),
                'method' => 'get_item_excerpt'
            ),
            'content' => array(
                'description' => __('Display full tweet', 'jnews'), 
                'method' => 'get_item_content'
            ),
            'profile_link' => array(
                'description' => __('Display link to Twitter profile', 'jnews'),
                'method' => 'get_profile_url'
            ),
            'link' => array(
                'description' => __('Display link to individual tweet', 'jnews'),
                'method' => 'get_item_url'
            ),
            'date' => array(
                'description' => __('Display date tweet was made', 'jnews'),
                'method' => 'get_item_date'
            ),
            'time_ago' => array(
                'description' => __('Display the time elapsed since the tweet was made', 'jnews'),
                'method' => 'get_time_ago'
            )
        );

        $this->set_default_format( sprintf( __( "%s posted on %s", 'jnews' ), '%excerpt%', '<a href="%link%">'.__( 'Twitter', 'jnews' ).'</a> %time_ago%' ) );

        add_filter('wp_feed_cache_transient_lifetime', array(&$this, 'set_feed_cache_lifetime'), 10, 2);
    }

    /**
     * Filter function executed when settings are saved
     * @param array $settings
     * @param int $ticker_id
     * @return array
     */
    public function jnewsticker_ticker_settings($settings, $ticker_id) {
        if ( isset( $settings['data_sources']['jNewsticker_Twitter']['enable'] ) && $settings['data_sources']['jNewsticker_Twitter']['enable'] == 'on' ) {
            foreach ( $settings['data_sources']['jNewsticker_Twitter']['instance'] as $instance => $instance_settings ) {
                $instance_settings['feed_url'] = self::get_feed_url($instance_settings);
                $settings['data_sources']['jNewsticker_Twitter']['instance'][$instance] = $instance_settings;
            }
        }
        return $settings;
    }    
    
    /**
     * Get feed url 
     * @param array $instance_settings
     * @return string
     */
    public static function get_feed_url($instance_settings) {
        $include_retweets = isset( $instance_settings['include_retweets'] ) 
                            ? $instance_settings['include_retweets'] == 'on' ? 1 : 0
                            : 0;

        $exclude_replies = isset( $instance_settings['include_replies'] ) 
                            ? $instance_settings['include_replies'] == 'on' ? 0 : 1
                            : 1;

        $count = isset( $instance_settings['count']) ? $instance_settings['count'] : 5;

        $parameters = array();        
        $parameters[] = 'screen_name='.$instance_settings['username'];
        $parameters[] = 'count='.$count;
        $parameters[] = 'include_entities=1';
        $parameters[] = 'include_rts='.$include_retweets;
        $parameters[] = 'exclude_replies='.$exclude_replies;

        $url = "http://api.twitter.com/1/statuses/user_timeline.json?";
        $url .= implode( '&', $parameters );
        return $url;
    }    

    /**
     * Return items for newsticker
     * @return array
     */
    public function get_items() {
        $all_items = array();
        $settings = $this->get_instance_settings();

        foreach ( $settings['instance'] as $instance => $instance_settings ) {
        
            if ( !isset( $instance_settings['username'] ) ) {
                return $all_items;
            }                   

            // Check for cached tweets
            $transient_key = 'jnewsticker_'.$this->jnewsticker->get_ticker_id().'_twitter_'.$instance;
            $tweets = get_transient($transient_key );
            $tweets = false;
            
            // Nothing in the cache, so we get tweets from Twitter
            if ( $tweets === false ) {
                $url = array_key_exists( 'feed_url', $instance_settings ) ? $instance_settings['feed_url'] : self::get_feed_url($instance_settings['feed_url']);                
                $response = wp_remote_get( $url );

                if ( $response instanceof WP_Error ) {
                    return $all_items;
                }

                $tweets = json_decode( $response['body'], true );

                // When rate limit is exceeded, the first array element is a string
                if ( !is_array( $tweets['0'] ) ) {
                    return $all_items;
                }

                $cache_time = isset( $instance_settings['cache'] ) ? $instance_settings['cache'] : 5;

                set_transient( $transient_key, $tweets, 60 * $cache_time );
            }
            
            $all_items = array_merge( $this->get_item_array( $tweets, $instance ), $all_items );            
        }

        return $all_items;
    }
    
    /**
     * Configure specific settings for this data source
     * @return array
     */
    public function get_settings() {
        $settings = array();

        // Twitter username
        $settings[] = array(
            'id' => 'username',
            'title' => __('Twitter username', 'jnews'),
            'type' => 'text'
        );
        
        // Include retweets
        $settings[] = array(
            'id' => 'include_retweets',
            'title' => __('Include retweets?', 'jnews'),
            'type' => 'checkbox',
            'default' => 'on'
        );

        // Include replies
        $settings[] = array(
            'id' => 'include_replies',
            'title' => __('Include replies?', 'jnews'),
            'type' => 'checkbox',
            'default' => false
        );

        // Count
        $settings[] = array(
            'id' => 'count',
            'title' => __('Number of tweets to display', 'jnews'),
            'type' => 'number',
            'default' => 5
        );

        // Excerpt length
        $settings[] = array(
            'id' => 'excerpt_length',
            'title' => __('Length of excerpt (words)', 'jnews'),
            'type' => 'number',
            'default' => 12
        );

        // Cache
        $settings[] = array(
            'id' => 'cache',
            'title' => __('How many minutes should tweets be cached for?', 'jnews'),
            'type' => 'number',
            'default' => 5
        );
        
        return $settings;
    }    

    /** 
     * Return the parsed Twitter link     
     * @return string
     */
    protected function get_parsed_twitter_link( $entity, $type ) {   
        $target = apply_filters( 'jnewsticker_open_links_in_new_window', false ) === true ? ' target="_blank"' : '';        

        switch ( $type ) {
            case 'url': 
                return '<a href="' . $entity['url'] . '"' . $target . '>' . $entity['display_url'] . '</a>';
                break;
            case 'user_mention':
                return '<a href="https://twitter.com/#!/' . $entity['screen_name'] . '"' . $target . '>@' . $entity['screen_name'] . '</a>';
                break;
            case 'hashtag':
                return '<a href="https://twitter.com/#!/search/' . $entity['text'] . '"' . $target . '>#' . $entity['text'] . '</a>';                
                break; 
        }
    }
    /**
     * Return tweet's post date as timestamp
     * @param stdObject $tweet
     * @return int
     */
    public function get_item_timestamp( $tweet ) {
        return strtotime( $tweet['created_at'] );
    }
    
    /**
     * Return commenter's username
     * @param array $tweet
     * @return string
     */
    public function get_item_author( $tweet ) {
        return $tweet['user']['screen_name'];
    }

    /**
     * Return tweet excerpt
     * @param stdOject $tweet
     * @return string
     */
    public function get_item_excerpt( $tweet ) {
        $settings = $this->get_instance_settings();
        $excerpt_length = isset( $settings['instance'][$tweet['jnews_instance']]['excerpt_length'] ) ? $settings['instance'][$tweet['jnews_instance']]['excerpt_length'] : 12; 
        return $this->get_trimmed_string( $tweet['text'], $excerpt_length );
    }    

    /**
     * Return full tweet
     * @param stdOject $tweet
     * @return string
     */
    public function get_item_content( $tweet ) {
        // Deal with HTML entities
        $output = htmlentities(html_entity_decode($tweet['text'], ENT_NOQUOTES, 'UTF-8'), ENT_NOQUOTES, 'UTF-8');

        // Parse URLs
        foreach ($tweet['entities']['urls'] as $url) {
            $output = str_replace( $url['url'], $this->get_parsed_twitter_link( $url, 'url' ), $output );
        }

        // Parse hashtags
        foreach ($tweet['entities']['hashtags'] as $hashtags) {
            $output = str_ireplace( '#'.$hashtags['text'], $this->get_parsed_twitter_link( $hashtags, 'hashtag' ), $output);
        }

        // Parse usernames
        foreach ($tweet['entities']['user_mentions'] as $user_mentions) {
            $output = str_ireplace( '@'.$user_mentions['screen_name'], $this->get_parsed_twitter_link( $user_mentions, 'user_mention' ), $output );
        }

        return $output;
    }

    /** 
     * Sort tweet entities
     */
    public function sort_tweet_entities( $a, $b ) {
        $a = $a['indices'][0];
        $b = $b['indices'][0];

        if ($a == $b) {
            return 0;
        }

        return ($a > $b) ? -1 : 1;
    }

    /**
     * Return link to tweet
     * @param stdOject $tweet
     * @return string
     */
    public function get_item_url( $tweet ) {
        return 'https://twitter.com/#!/' . $tweet['user']['screen_name'] . '/statuses/'. $tweet['id_str'];
    }        

    /**
     * Return link to Twitter profile
     * @param stdOject $tweet
     * @return string
     */
    public function get_profile_url( $tweet ) {        
        return 'https://twitter.com/#!/' . $tweet['user']['screen_name'];
    }        
    
    /**
     * Return tweet date
     * @param stdObject $tweet
     * @return string
     */
    public function get_item_date( $tweet ) {
        $format = apply_filters( 'jnewsticker_item_date_format', 'M d' );
        return date( $format, $this->get_item_timestamp( $tweet ) );
    }

    /**
     * Return time since tweet was made
     * @param stdObject $tweet
     * @return string
     */
    public function get_time_ago( $tweet ) {        
        return apply_filters( 'jnewsticker_item_time_ago_format', $tweet['created_at'], $this );
    }
}