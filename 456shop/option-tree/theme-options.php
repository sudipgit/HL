<?php
/**
 * Initialize the options before anything else.
 */
add_action( 'admin_init', 'custom_theme_options', 1 );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'general_default',
        'title'       => 'General Settings'
      ),
      array(
        'id'          => 'typography',
        'title'       => 'Typography'
      ),
      array(
        'id'          => 'seo_settings',
        'title'       => 'SEO Settings'
      ),
      array(
        'id'          => 'theme_options',
        'title'       => 'Theme Options'
      ),
      array(
        'id'          => 'menu_options',
        'title'       => 'Menu Options'
      ),
      array(
        'id'          => 'social_media_options',
        'title'       => 'Social Media Options'
      ),
      array(
        'id'          => 'footer_options',
        'title'       => 'Footer Options'
      ),
      array(
        'id'          => 'blog_options',
        'title'       => 'Blog Options'
      ),
      array(
        'id'          => 'shop_options',
        'title'       => 'Shop Options'
      )
    ),
    'settings'        => array(
      array(
        'id'          => 'theme_layouts',
        'label'       => 'Theme Layouts',
        'desc'        => 'Select one of theme layouts',
        'std'         => '1170',
        'type'        => 'select',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '1170',
            'label'       => '1170px wide (standard bootstrap system)',
            'src'         => ''
          ),
          array(
            'value'       => '940',
            'label'       => '940px wide (based on 960 grid system)',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'type_layouts',
        'label'       => 'Layouts Type',
        'desc'        => 'Select one of layouts type',
        'std'         => 'responsive',
        'type'        => 'select',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'responsive',
            'label'       => 'responsive',
            'src'         => ''
          ),
          array(
            'value'       => 'fixed',
            'label'       => 'fixed',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'left_headermeta',
        'label'       => 'Left Header Meta',
        'desc'        => 'Enter a value for left header meta or use shortcode for displaying jnewsticket.',
        'std'         => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        'type'        => 'text',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'right_headermeta',
        'label'       => 'Right Header Meta',
        'desc'        => 'Enter a value for right header meta.',
        'std'         => 'Call Us Free: +44 (0) 1234567890',
        'type'        => 'text',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'headermeta_font_size',
        'label'       => 'Header Meta Font Size',
        'desc'        => 'Set the header meta font size.',
        'std'         => '13',
        'type'        => 'select',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '11',
            'label'       => '11',
            'src'         => ''
          ),
          array(
            'value'       => '12',
            'label'       => '12',
            'src'         => ''
          ),
          array(
            'value'       => '13',
            'label'       => '13',
            'src'         => ''
          ),
          array(
            'value'       => '14',
            'label'       => '14',
            'src'         => ''
          ),
          array(
            'value'       => '15',
            'label'       => '15',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'header_meta_c',
        'label'       => 'Header Meta',
        'desc'        => 'Disable for hiding "header meta" bar.',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Disable',
            'label'       => 'Disable',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'wpml_switcher',
        'label'       => 'WPML Switcher',
        'desc'        => 'Enable for displaying "WordPress Multilingual" switcher.',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Enable',
            'label'       => 'Enable',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'custom_logo',
        'label'       => 'Custom Logo',
        'desc'        => 'Upload a logo for your theme.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'logo_tagline',
        'label'       => 'Logo Tagline',
        'desc'        => 'Disable for hiding logo tagline.',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Disable',
            'label'       => 'Disable',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'header_search',
        'label'       => 'Header Search Form',
        'desc'        => 'Select one of search form type.',
        'std'         => 'shop_search',
        'type'        => 'select',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'shop_search',
            'label'       => 'Shop search',
            'src'         => ''
          ),
          array(
            'value'       => 'theme_search',
            'label'       => 'Theme search',
            'src'         => ''
          ),
          array(
            'value'       => 'none',
            'label'       => 'None',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'header_right_container',
        'label'       => 'Header Right Container',
        'desc'        => 'Enter any html or theme shortcode content for displaying it in right side of the header.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'header_right_social',
        'label'       => 'Header Social Icons',
        'desc'        => 'Enable for displaying social medial icons in header right container.',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Enable',
            'label'       => 'Enable',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'heading_navi',
        'label'       => 'Heading Navigation',
        'desc'        => 'Select one of the option for heading navigation.',
        'std'         => 'shop_enable',
        'type'        => 'select',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'enable',
            'label'       => 'Enable',
            'src'         => ''
          ),
          array(
            'value'       => 'shop_enable',
            'label'       => 'Enable (only shop products)',
            'src'         => ''
          ),
          array(
            'value'       => 'disable',
            'label'       => 'Disable',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'fb_like',
        'label'       => 'Facebook "Like" Button',
        'desc'        => 'Select one of facebook languages for "Like" button.',
        'std'         => 'en_GB',
        'type'        => 'select',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'ca_ES',
            'label'       => 'Catalan',
            'src'         => ''
          ),
          array(
            'value'       => 'cs_CZ',
            'label'       => 'Czech',
            'src'         => ''
          ),
          array(
            'value'       => 'cy_GB',
            'label'       => 'Welsh',
            'src'         => ''
          ),
          array(
            'value'       => 'da_DK',
            'label'       => 'Danish',
            'src'         => ''
          ),
          array(
            'value'       => 'de_DE',
            'label'       => 'German',
            'src'         => ''
          ),
          array(
            'value'       => 'eu_ES',
            'label'       => 'Basque',
            'src'         => ''
          ),
           array(
            'value'       => 'en_PI',
            'label'       => 'English (Pirate)',
            'src'         => ''
          ),
          array(
            'value'       => 'en_UD',
            'label'       => 'English (Upside Down)',
            'src'         => ''
          ),
          array(
            'value'       => 'ck_US',
            'label'       => 'Cherokee',
            'src'         => ''
          ),
          array(
            'value'       => 'en_US',
            'label'       => 'English (US)',
            'src'         => ''
          ),
          array(
            'value'       => 'es_LA',
            'label'       => 'Spanish',
            'src'         => ''
          ),
          array(
            'value'       => 'es_CL',
            'label'       => 'Spanish (Chile)',
            'src'         => ''
          ),
           array(
            'value'       => 'es_CO',
            'label'       => 'Spanish (Colombia)',
            'src'         => ''
          ),
          array(
            'value'       => 'es_ES',
            'label'       => 'Spanish (Spain)',
            'src'         => ''
          ),
          array(
            'value'       => 'es_MX',
            'label'       => 'Spanish (Mexico)',
            'src'         => ''
          ),
          array(
            'value'       => 'es_VE',
            'label'       => 'Spanish (Venezuela)',
            'src'         => ''
          ),
          array(
            'value'       => 'fb_FI',
            'label'       => 'Finnish (test)',
            'src'         => ''
          ),
          array(
            'value'       => 'fi_FI',
            'label'       => 'Finnish',
            'src'         => ''
          ),
           array(
            'value'       => 'fr_FR',
            'label'       => 'French (France)',
            'src'         => ''
          ),
          array(
            'value'       => 'gl_ES',
            'label'       => 'Galician',
            'src'         => ''
          ),
          array(
            'value'       => 'hu_HU',
            'label'       => 'Hungarian',
            'src'         => ''
          ),
          array(
            'value'       => 'it_IT',
            'label'       => 'Italian',
            'src'         => ''
          ),
          array(
            'value'       => 'ja_JP',
            'label'       => 'Japanese',
            'src'         => ''
          ),
          array(
            'value'       => 'ko_KR',
            'label'       => 'Korean',
            'src'         => ''
          ),
           array(
            'value'       => 'nb_NO',
            'label'       => 'Norwegian (bokmal)',
            'src'         => ''
          ),
          array(
            'value'       => 'nn_NO',
            'label'       => 'Norwegian (nynorsk)',
            'src'         => ''
          ),
          array(
            'value'       => 'nl_NL',
            'label'       => 'Dutch',
            'src'         => ''
          ),
          array(
            'value'       => 'pl_PL',
            'label'       => 'Polish',
            'src'         => ''
          ),
          array(
            'value'       => 'pt_BR',
            'label'       => 'Portuguese (Brazil)',
            'src'         => ''
          ),
          array(
            'value'       => 'pt_PT',
            'label'       => 'Portuguese (Portugal)',
            'src'         => ''
          ),
           array(
            'value'       => 'ro_RO',
            'label'       => 'Romanian',
            'src'         => ''
          ),
          array(
            'value'       => 'ru_RU',
            'label'       => 'Russian',
            'src'         => ''
          ),
          array(
            'value'       => 'sk_SK',
            'label'       => 'Slovak',
            'src'         => ''
          ),
          array(
            'value'       => 'sl_SI',
            'label'       => 'Slovenian',
            'src'         => ''
          ),
          array(
            'value'       => 'sv_SE',
            'label'       => 'Swedish',
            'src'         => ''
          ),
          array(
            'value'       => 'th_TH',
            'label'       => 'Thai',
            'src'         => ''
          ),
           array(
            'value'       => 'tr_TR',
            'label'       => 'Turkish',
            'src'         => ''
          ),
          array(
            'value'       => 'ku_TR',
            'label'       => 'Kurdish',
            'src'         => ''
          ),
          array(
            'value'       => 'zh_CN',
            'label'       => 'Simplified Chinese (China)',
            'src'         => ''
          ),
          array(
            'value'       => 'zh_HK',
            'label'       => 'Traditional Chinese (Hong Kong)',
            'src'         => ''
          ),
          array(
            'value'       => 'zh_TW',
            'label'       => 'Traditional Chinese (Taiwan)',
            'src'         => ''
          ),
          array(
            'value'       => 'fb_LT',
            'label'       => 'Leet Speak',
            'src'         => ''
          ),
           array(
            'value'       => 'af_ZA',
            'label'       => 'Afrikaans',
            'src'         => ''
          ),
          array(
            'value'       => 'sq_AL',
            'label'       => 'Albanian',
            'src'         => ''
          ),
          array(
            'value'       => 'hy_AM',
            'label'       => 'Armenian',
            'src'         => ''
          ),
          array(
            'value'       => 'az_AZ',
            'label'       => 'Azeri',
            'src'         => ''
          ),
          array(
            'value'       => 'be_BY',
            'label'       => 'Belarusian',
            'src'         => ''
          ),
          array(
            'value'       => 'bn_IN',
            'label'       => 'Bengali',
            'src'         => ''
          ),
           array(
            'value'       => 'bs_BA',
            'label'       => 'Bosnian',
            'src'         => ''
          ),
          array(
            'value'       => 'bg_BG',
            'label'       => 'Bulgarian',
            'src'         => ''
          ),
          array(
            'value'       => 'hr_HR',
            'label'       => 'Croatian',
            'src'         => ''
          ),
          array(
            'value'       => 'nl_BE',
            'label'       => 'Dutch (België)',
            'src'         => ''
          ),
          array(
            'value'       => 'en_GB',
            'label'       => 'English (UK)',
            'src'         => ''
          ),
          array(
            'value'       => 'eo_EO',
            'label'       => 'Esperanto',
            'src'         => ''
          ),

           array(
            'value'       => 'et_EE',
            'label'       => 'Estonian',
            'src'         => ''
          ),
          array(
            'value'       => 'fo_FO',
            'label'       => 'Faroese',
            'src'         => ''
          ),
          array(
            'value'       => 'fr_CA',
            'label'       => 'French (Canada)',
            'src'         => ''
          ),
          array(
            'value'       => 'ka_GE',
            'label'       => 'Georgian',
            'src'         => ''
          ),
          array(
            'value'       => 'el_GR',
            'label'       => 'Greek',
            'src'         => ''
          ),
          array(
            'value'       => 'gu_IN',
            'label'       => 'Gujarati',
            'src'         => ''
          ),
           array(
            'value'       => 'hi_IN',
            'label'       => 'Hindi',
            'src'         => ''
          ),
          array(
            'value'       => 'is_IS',
            'label'       => 'Icelandic',
            'src'         => ''
          ),
          array(
            'value'       => 'id_ID',
            'label'       => 'Indonesian',
            'src'         => ''
          ),
          array(
            'value'       => 'ga_IE',
            'label'       => 'Irish',
            'src'         => ''
          ),
          array(
            'value'       => 'jv_ID',
            'label'       => 'Javanese',
            'src'         => ''
          ),
          array(
            'value'       => 'kn_IN',
            'label'       => 'Kannada',
            'src'         => ''
          ),

           array(
            'value'       => 'kk_KZ',
            'label'       => 'Kazakh',
            'src'         => ''
          ),
          array(
            'value'       => 'la_VA',
            'label'       => 'Latin',
            'src'         => ''
          ),
          array(
            'value'       => 'lv_LV',
            'label'       => 'Latvian',
            'src'         => ''
          ),
          array(
            'value'       => 'li_NL',
            'label'       => 'Limburgish',
            'src'         => ''
          ),
          array(
            'value'       => 'lt_LT',
            'label'       => 'Lithuanian',
            'src'         => ''
          ),
          array(
            'value'       => 'mk_MK',
            'label'       => 'Macedonian',
            'src'         => ''
          ),
           array(
            'value'       => 'mg_MG',
            'label'       => 'Malagasy',
            'src'         => ''
          ),
          array(
            'value'       => 'ms_MY',
            'label'       => 'Malay',
            'src'         => ''
          ),
          array(
            'value'       => 'mt_MT',
            'label'       => 'Maltese',
            'src'         => ''
          ),
          array(
            'value'       => 'mr_IN',
            'label'       => 'Marathi',
            'src'         => ''
          ),
          array(
            'value'       => 'mn_MN',
            'label'       => 'Mongolian',
            'src'         => ''
          ),
          array(
            'value'       => 'ne_NP',
            'label'       => 'Nepali',
            'src'         => ''
          ),

           array(
            'value'       => 'pa_IN',
            'label'       => 'Punjabi',
            'src'         => ''
          ),
          array(
            'value'       => 'rm_CH',
            'label'       => 'Romansh',
            'src'         => ''
          ),
          array(
            'value'       => 'sa_IN',
            'label'       => 'Sanskrit',
            'src'         => ''
          ),
          array(
            'value'       => 'sr_RS',
            'label'       => 'Serbian',
            'src'         => ''
          ),
          array(
            'value'       => 'so_SO',
            'label'       => 'Somali',
            'src'         => ''
          ),
          array(
            'value'       => 'sw_KE',
            'label'       => 'Swahili',
            'src'         => ''
          ),
           array(
            'value'       => 'tl_PH',
            'label'       => 'Filipino',
            'src'         => ''
          ),
          array(
            'value'       => 'ta_IN',
            'label'       => 'Tamil',
            'src'         => ''
          ),
          array(
            'value'       => 'tt_RU',
            'label'       => 'Tatar',
            'src'         => ''
          ),
          array(
            'value'       => 'te_IN',
            'label'       => 'Telugu',
            'src'         => ''
          ),
          array(
            'value'       => 'ml_IN',
            'label'       => 'Malayalam',
            'src'         => ''
          ),
          array(
            'value'       => 'uk_UA',
            'label'       => 'Ukrainian',
            'src'         => ''
          ),
          array(
            'value'       => 'uz_UZ',
            'label'       => 'Uzbek',
            'src'         => ''
          ),
          array(
            'value'       => 'vi_VN',
            'label'       => 'Vietnamese',
            'src'         => ''
          ),
          array(
            'value'       => 'xh_ZA',
            'label'       => 'Xhosa',
            'src'         => ''
          ),
          array(
            'value'       => 'zu_ZA',
            'label'       => 'Zulu',
            'src'         => ''
          ),
          array(
            'value'       => 'km_KH',
            'label'       => 'Khmer',
            'src'         => ''
          ),
          array(
            'value'       => 'tg_TJ',
            'label'       => 'Tajik',
            'src'         => ''
          ),
           array(
            'value'       => 'ar_AR',
            'label'       => 'Arabic',
            'src'         => ''
          ),
          array(
            'value'       => 'he_IL',
            'label'       => 'Hebrew',
            'src'         => ''
          ),
          array(
            'value'       => 'ur_PK',
            'label'       => 'Urdu',
            'src'         => ''
          ),
          array(
            'value'       => 'fa_IR',
            'label'       => 'Persian',
            'src'         => ''
          ),
          array(
            'value'       => 'sy_SY',
            'label'       => 'Syriac',
            'src'         => ''
          ),
          array(
            'value'       => 'yi_DE',
            'label'       => 'Yiddish',
            'src'         => ''
          ),
          array(
            'value'       => 'gn_PY',
            'label'       => 'Guaraní',
            'src'         => ''
          ),
          array(
            'value'       => 'qu_PE',
            'label'       => 'Quechua',
            'src'         => ''
          ),
          array(
            'value'       => 'ay_BO',
            'label'       => 'Aymara',
            'src'         => ''
          ),
          array(
            'value'       => 'se_NO',
            'label'       => 'Northern Sámi',
            'src'         => ''
          ),
          array(
            'value'       => 'ps_AF',
            'label'       => 'Pashto',
            'src'         => ''
          ),
          array(
            'value'       => 'tl_ST',
            'label'       => 'Klingon',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'custom_css',
        'label'       => 'Custom Css',
        'desc'        => 'Enter your custom css styles.',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'general_default',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'custom_js',
        'label'       => 'Custom Javascript',
        'desc'        => 'Enter your custom javascript.',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'general_default',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
       array(
        'id'          => 'body_font_size',
        'label'       => 'Body Font Size',
        'desc'        => 'Set body font size.',
        'std'         => '13',
        'type'        => 'select',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '12',
            'label'       => '12',
            'src'         => ''
          ),
          array(
            'value'       => '13',
            'label'       => '13',
            'src'         => ''
          ),
          array(
            'value'       => '14',
            'label'       => '14',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'body_font_family',
        'label'       => 'Body Font Family',
        'desc'        => 'Set body font family.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => '',
            'label'       => '--- Google Webfonts ---',
            'src'         => ''
          ),
          array(
            'value'       => 'Open+Sans',
            'label'       => '"Open Sans", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Titillium+Web',
            'label'       => '"Titillium Web", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Oxygen',
            'label'       => '"Oxygen", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Quicksand',
            'label'       => '"Quicksand", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Lato',
            'label'       => '"Lato", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Raleway',
            'label'       => '"Raleway", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Source+Sans+Pro',
            'label'       => '"Source Sans Pro", sans-serif',
            'src'         => ''
          ),
           array(
            'value'       => 'Dosis',
            'label'       => '"Dosis", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Exo',
            'label'       => '"Exo", sans-serif',
            'src'         => ''
          ), 
          array(
            'value'       => '',
            'label'       => '--- System Fonts ---',
            'src'         => ''
          ),
          array(
            'value'       => '"Helvetica Neue", Helvetica, Arial, sans-serif',
            'label'       => '"Helvetica Neue", Helvetica, Arial, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Arial, "Helvetica Neue", Helvetica, sans-serif',
            'label'       => 'Arial, "Helvetica Neue", Helvetica, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Garamond, "Hoefler Text", Times New Roman, Times, serif',
            'label'       => 'Garamond, "Hoefler Text", Times New Roman, Times, serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Geneva, Verdana, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'label'       => 'Geneva, Verdana, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Georgia, Palatino, "Palatino Linotype", Times, "Times New Roman", serif',
            'label'       => 'Georgia, Palatino, "Palatino Linotype", Times, "Times New Roman", serif',
            'src'         => ''
          ),
          array(
            'value'       => '"Gill Sans", Calibri, "Trebuchet MS", sans-serif',
            'label'       => '"Gill Sans", Calibri, "Trebuchet MS", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'label'       => '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Palatino, "Palatino Linotype", "Hoefler Text", Times, "Times New Roman", serif',
            'label'       => 'Palatino, "Palatino Linotype", "Hoefler Text", Times, "Times New Roman", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Tahoma, Geneva, Verdana, sans-serif',
            'label'       => 'Tahoma, Geneva, Verdana, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Times, "Times New Roman", Georgia, serif',
            'label'       => 'Times, "Times New Roman", Georgia, serif',
            'src'         => ''
          ),
          array(
            'value'       => '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif',
            'label'       => '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Verdana, Tahoma, Geneva, sans-serif, sans-serif',
            'label'       => 'Verdana, Tahoma, Geneva, sans-serif, sans-serif',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'heading_font_family',
        'label'       => 'Heading Font Family',
        'desc'        => 'Set heading font family.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => '',
            'label'       => '--- Google Webfonts ---',
            'src'         => ''
          ),
          array(
            'value'       => 'Open+Sans',
            'label'       => '"Open Sans", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Titillium+Web',
            'label'       => '"Titillium Web", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Oxygen',
            'label'       => '"Oxygen", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Quicksand',
            'label'       => '"Quicksand", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Lato',
            'label'       => '"Lato", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Raleway',
            'label'       => '"Raleway", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Source+Sans+Pro',
            'label'       => '"Source Sans Pro", sans-serif',
            'src'         => ''
          ),
           array(
            'value'       => 'Dosis',
            'label'       => '"Dosis", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Exo',
            'label'       => '"Exo", sans-serif',
            'src'         => ''
          ), 
          array(
            'value'       => '',
            'label'       => '--- System Fonts ---',
            'src'         => ''
          ),
          array(
            'value'       => '"Helvetica Neue", Helvetica, Arial, sans-serif',
            'label'       => '"Helvetica Neue", Helvetica, Arial, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Arial, "Helvetica Neue", Helvetica, sans-serif',
            'label'       => 'Arial, "Helvetica Neue", Helvetica, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Garamond, "Hoefler Text", Times New Roman, Times, serif',
            'label'       => 'Garamond, "Hoefler Text", Times New Roman, Times, serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Geneva, Verdana, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'label'       => 'Geneva, Verdana, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Georgia, Palatino, "Palatino Linotype", Times, "Times New Roman", serif',
            'label'       => 'Georgia, Palatino, "Palatino Linotype", Times, "Times New Roman", serif',
            'src'         => ''
          ),
          array(
            'value'       => '"Gill Sans", Calibri, "Trebuchet MS", sans-serif',
            'label'       => '"Gill Sans", Calibri, "Trebuchet MS", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'label'       => '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Palatino, "Palatino Linotype", "Hoefler Text", Times, "Times New Roman", serif',
            'label'       => 'Palatino, "Palatino Linotype", "Hoefler Text", Times, "Times New Roman", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Tahoma, Geneva, Verdana, sans-serif',
            'label'       => 'Tahoma, Geneva, Verdana, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Times, "Times New Roman", Georgia, serif',
            'label'       => 'Times, "Times New Roman", Georgia, serif',
            'src'         => ''
          ),
          array(
            'value'       => '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif',
            'label'       => '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Verdana, Tahoma, Geneva, sans-serif, sans-serif',
            'label'       => 'Verdana, Tahoma, Geneva, sans-serif, sans-serif',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'elements_font_family',
        'label'       => 'Elements Font Family',
        'desc'        => 'Set font family for input, button, select and textarea elements.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => '',
            'label'       => '--- Google Webfonts ---',
            'src'         => ''
          ),
          array(
            'value'       => 'Open+Sans',
            'label'       => '"Open Sans", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Titillium+Web',
            'label'       => '"Titillium Web", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Oxygen',
            'label'       => '"Oxygen", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Quicksand',
            'label'       => '"Quicksand", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Lato',
            'label'       => '"Lato", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Raleway',
            'label'       => '"Raleway", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Source+Sans+Pro',
            'label'       => '"Source Sans Pro", sans-serif',
            'src'         => ''
          ),
           array(
            'value'       => 'Dosis',
            'label'       => '"Dosis", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Exo',
            'label'       => '"Exo", sans-serif',
            'src'         => ''
          ), 
          array(
            'value'       => '',
            'label'       => '--- System Fonts ---',
            'src'         => ''
          ),
          array(
            'value'       => '"Helvetica Neue", Helvetica, Arial, sans-serif',
            'label'       => '"Helvetica Neue", Helvetica, Arial, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Arial, "Helvetica Neue", Helvetica, sans-serif',
            'label'       => 'Arial, "Helvetica Neue", Helvetica, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Garamond, "Hoefler Text", Times New Roman, Times, serif',
            'label'       => 'Garamond, "Hoefler Text", Times New Roman, Times, serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Geneva, Verdana, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'label'       => 'Geneva, Verdana, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Georgia, Palatino, "Palatino Linotype", Times, "Times New Roman", serif',
            'label'       => 'Georgia, Palatino, "Palatino Linotype", Times, "Times New Roman", serif',
            'src'         => ''
          ),
          array(
            'value'       => '"Gill Sans", Calibri, "Trebuchet MS", sans-serif',
            'label'       => '"Gill Sans", Calibri, "Trebuchet MS", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'label'       => '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Palatino, "Palatino Linotype", "Hoefler Text", Times, "Times New Roman", serif',
            'label'       => 'Palatino, "Palatino Linotype", "Hoefler Text", Times, "Times New Roman", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Tahoma, Geneva, Verdana, sans-serif',
            'label'       => 'Tahoma, Geneva, Verdana, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Times, "Times New Roman", Georgia, serif',
            'label'       => 'Times, "Times New Roman", Georgia, serif',
            'src'         => ''
          ),
          array(
            'value'       => '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif',
            'label'       => '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Verdana, Tahoma, Geneva, sans-serif, sans-serif',
            'label'       => 'Verdana, Tahoma, Geneva, sans-serif, sans-serif',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'navigation_font_family',
        'label'       => 'Navigation Font Family',
        'desc'        => 'Set navigation font family.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => '',
            'label'       => '--- Google Webfonts ---',
            'src'         => ''
          ),
          array(
            'value'       => 'Open+Sans',
            'label'       => '"Open Sans", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Titillium+Web',
            'label'       => '"Titillium Web", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Oxygen',
            'label'       => '"Oxygen", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Quicksand',
            'label'       => '"Quicksand", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Lato',
            'label'       => '"Lato", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Raleway',
            'label'       => '"Raleway", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Source+Sans+Pro',
            'label'       => '"Source Sans Pro", sans-serif',
            'src'         => ''
          ),
           array(
            'value'       => 'Dosis',
            'label'       => '"Dosis", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Exo',
            'label'       => '"Exo", sans-serif',
            'src'         => ''
          ), 
          array(
            'value'       => '',
            'label'       => '--- System Fonts ---',
            'src'         => ''
          ),
          array(
            'value'       => '"Helvetica Neue", Helvetica, Arial, sans-serif',
            'label'       => '"Helvetica Neue", Helvetica, Arial, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Arial, "Helvetica Neue", Helvetica, sans-serif',
            'label'       => 'Arial, "Helvetica Neue", Helvetica, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Garamond, "Hoefler Text", Times New Roman, Times, serif',
            'label'       => 'Garamond, "Hoefler Text", Times New Roman, Times, serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Geneva, Verdana, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'label'       => 'Geneva, Verdana, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Georgia, Palatino, "Palatino Linotype", Times, "Times New Roman", serif',
            'label'       => 'Georgia, Palatino, "Palatino Linotype", Times, "Times New Roman", serif',
            'src'         => ''
          ),
          array(
            'value'       => '"Gill Sans", Calibri, "Trebuchet MS", sans-serif',
            'label'       => '"Gill Sans", Calibri, "Trebuchet MS", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'label'       => '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Palatino, "Palatino Linotype", "Hoefler Text", Times, "Times New Roman", serif',
            'label'       => 'Palatino, "Palatino Linotype", "Hoefler Text", Times, "Times New Roman", serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Tahoma, Geneva, Verdana, sans-serif',
            'label'       => 'Tahoma, Geneva, Verdana, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Times, "Times New Roman", Georgia, serif',
            'label'       => 'Times, "Times New Roman", Georgia, serif',
            'src'         => ''
          ),
          array(
            'value'       => '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif',
            'label'       => '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif',
            'src'         => ''
          ),
          array(
            'value'       => 'Verdana, Tahoma, Geneva, sans-serif, sans-serif',
            'label'       => 'Verdana, Tahoma, Geneva, sans-serif, sans-serif',
            'src'         => ''
          )
        ),
      ),
       array(
        'id'          => 'navigation_font_size',
        'label'       => 'Navigation Font Size',
        'desc'        => 'Set navigation font size.',
        'std'         => '15',
        'type'        => 'select',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '13',
            'label'       => '13',
            'src'         => ''
          ),
          array(
            'value'       => '14',
            'label'       => '14',
            'src'         => ''
          ),
          array(
            'value'       => '15',
            'label'       => '15',
            'src'         => ''
          ),
          array(
            'value'       => '16',
            'label'       => '16',
            'src'         => ''
          )
        ),
      ),
       array(
        'id'          => 'navigation_font_style',
        'label'       => 'Navigation Font Weight',
        'desc'        => 'Set navigation font weight.',
        'std'         => 'normal',
        'type'        => 'select',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'normal',
            'label'       => 'normal',
            'src'         => ''
          ),
          array(
            'value'       => 'bold',
            'label'       => 'bold',
            'src'         => ''
          )
        ),
      ),
       array(
        'id'          => 'dropdown_font_size',
        'label'       => 'Navigation Dropdown Font Size',
        'desc'        => 'Set navigation dropdown font size.',
        'std'         => '13',
        'type'        => 'select',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '12',
            'label'       => '12',
            'src'         => ''
          ),
          array(
            'value'       => '13',
            'label'       => '13',
            'src'         => ''
          ),
          array(
            'value'       => '14',
            'label'       => '14',
            'src'         => ''
          )
        ),
      ),
       array(
        'id'          => 'dropdown_font_style',
        'label'       => 'Navigation Dropdown Font Weight',
        'desc'        => 'Set navigation dropdown font weight.',
        'std'         => 'bold',
        'type'        => 'select',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'normal',
            'label'       => 'normal',
            'src'         => ''
          ),
          array(
            'value'       => 'bold',
            'label'       => 'bold',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'google_character_sets',
        'label'       => 'Google Webfont Character Sets',
        'desc'        => 'Choose the character sets you want.',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'typography',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'cyrillic-ext',
            'label'       => 'Cyrillic Extended (cyrillic-ext)',
            'src'         => ''
          ),
          array(
            'value'       => 'greek-ext',
            'label'       => 'Greek Extended',
            'src'         => ''
          ),
          array(
            'value'       => 'greek',
            'label'       => 'Greek',
            'src'         => ''
          ),
          array(
            'value'       => 'vietnamese',
            'label'       => 'Vietnamese',
            'src'         => ''
          ),
          array(
            'value'       => 'latin-ext',
            'label'       => 'Latin Extended',
            'src'         => ''
          ),
          array(
            'value'       => 'cyrillic',
            'label'       => 'Cyrillic',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'disable_seo',
        'label'       => 'Disable Theme SEO',
        'desc'        => 'If you are using an external SEO plug-in you should disable this option.',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'seo_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Disable',
            'label'       => 'Disable',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'theme_title',
        'label'       => 'Browser Page Title',
        'desc'        => '%blog_title% - Will display name of your blog,
%blog_description% - Will blog description,
%page_title% - Will display current page title.',
        'std'         => '%blog_title%, %blog_description%, %page_title%',
        'type'        => 'textarea-simple',
        'section'     => 'seo_settings',
        'rows'        => '2',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'keywords',
        'label'       => 'Keywords',
        'desc'        => 'Enter a list of keywords separated by commas.',
        'std'         => 'keyword1, keywords2',
        'type'        => 'textarea-simple',
        'section'     => 'seo_settings',
        'rows'        => '2',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'description',
        'label'       => 'Description',
        'desc'        => 'Enter a description for your site.',
        'std'         => 'website description',
        'type'        => 'textarea-simple',
        'section'     => 'seo_settings',
        'rows'        => '4',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'theme_color',
        'label'       => 'Theme Color',
        'desc'        => 'Pick the color for link, buttons and etc.',
        'std'         => '#c82f2a',
        'type'        => 'colorpicker',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'gradient_color',
        'label'       => 'Gradient Color',
        'desc'        => 'Pick the color for gradient elements.',
        'std'         => '#eb3731',
        'type'        => 'colorpicker',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'meta-pattern',
        'label'       => 'Meta Pattern',
        'desc'        => 'Select one of pattern for meta container.',
        'std'         => 'none',
        'type'        => 'select',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'none',
            'label'       => 'none',
            'src'         => ''
          ), 
          array(
            'value'       => 'pattern01',
            'label'       => 'pattern01',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern02',
            'label'       => 'pattern02',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern03',
            'label'       => 'pattern03',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern04',
            'label'       => 'pattern04',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern05',
            'label'       => 'pattern05',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern06',
            'label'       => 'pattern06',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern07',
            'label'       => 'pattern07',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern08',
            'label'       => 'pattern08',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern09',
            'label'       => 'pattern09',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern10',
            'label'       => 'pattern10',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern11',
            'label'       => 'pattern11',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern12',
            'label'       => 'pattern12',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern13',
            'label'       => 'pattern13',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern14',
            'label'       => 'pattern14',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern15',
            'label'       => 'pattern15',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern16',
            'label'       => 'pattern16',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern17',
            'label'       => 'pattern17',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern18',
            'label'       => 'pattern18',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern19',
            'label'       => 'pattern19',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern20',
            'label'       => 'pattern20',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern21',
            'label'       => 'pattern21',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern22',
            'label'       => 'pattern22',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern23',
            'label'       => 'pattern23',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern24',
            'label'       => 'pattern24',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern25',
            'label'       => 'pattern25',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern26',
            'label'       => 'pattern26',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern27',
            'label'       => 'pattern27',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern28',
            'label'       => 'pattern28',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern29',
            'label'       => 'pattern29',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern30',
            'label'       => 'pattern30',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern31',
            'label'       => 'pattern31',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern32',
            'label'       => 'pattern32',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern33',
            'label'       => 'pattern33',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern34',
            'label'       => 'pattern34',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern35',
            'label'       => 'pattern35',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern36',
            'label'       => 'pattern36',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern37',
            'label'       => 'pattern37',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern38',
            'label'       => 'pattern38',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern39',
            'label'       => 'pattern39',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern40',
            'label'       => 'pattern40',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern41',
            'label'       => 'pattern41',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern42',
            'label'       => 'pattern42',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern43',
            'label'       => 'pattern43',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern44',
            'label'       => 'pattern44',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern45',
            'label'       => 'pattern45',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern46',
            'label'       => 'pattern46',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern47',
            'label'       => 'pattern47',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern48',
            'label'       => 'pattern48',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern49',
            'label'       => 'pattern49',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern50',
            'label'       => 'pattern50',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern51',
            'label'       => 'pattern51',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern52',
            'label'       => 'pattern52',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern53',
            'label'       => 'pattern53',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern54',
            'label'       => 'pattern54',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern55',
            'label'       => 'pattern55',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern56',
            'label'       => 'pattern56',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern57',
            'label'       => 'pattern57',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern58',
            'label'       => 'pattern58',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern59',
            'label'       => 'pattern59',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern60',
            'label'       => 'pattern60',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern61',
            'label'       => 'pattern61',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern62',
            'label'       => 'pattern62',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern63',
            'label'       => 'pattern63',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern64',
            'label'       => 'pattern64',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern65',
            'label'       => 'pattern65',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern66',
            'label'       => 'pattern66',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern67',
            'label'       => 'pattern67',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern68',
            'label'       => 'pattern68',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern69',
            'label'       => 'pattern69',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern70',
            'label'       => 'pattern70',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern71',
            'label'       => 'pattern71',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern72',
            'label'       => 'pattern72',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'bg_pattern',
        'label'       => 'Pattern Background',
        'desc'        => 'Select one of pattern background for displaying it.',
        'std'         => 'pattern07',
        'type'        => 'select',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'none',
            'label'       => 'none',
            'src'         => ''
          ), 
          array(
            'value'       => 'pattern01',
            'label'       => 'pattern01',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern02',
            'label'       => 'pattern02',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern03',
            'label'       => 'pattern03',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern04',
            'label'       => 'pattern04',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern05',
            'label'       => 'pattern05',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern06',
            'label'       => 'pattern06',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern07',
            'label'       => 'pattern07 (light)',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern08',
            'label'       => 'pattern08 (light)',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern09',
            'label'       => 'pattern09 (light)',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern10',
            'label'       => 'pattern10 (light)',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern11',
            'label'       => 'pattern11 (light)',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern12',
            'label'       => 'pattern12 (light)',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'bg_types',
        'label'       => 'Background Type',
        'desc'        => 'Select one of background type.',
        'std'         => 'one_color',
        'type'        => 'select',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'one_color',
            'label'       => 'one color',
            'src'         => ''
          ), 
          array(
            'value'       => 'horizontal',
            'label'       => 'gradient (horizontal reflected)',
            'src'         => ''
          ),
          array(
            'value'       => 'vertical',
            'label'       => 'gradient (vertical)',
            'src'         => ''
          ),
          array(
            'value'       => 'circular_top',
            'label'       => 'gradient (circular, top center)',
            'src'         => ''
          ),
          array(
            'value'       => 'circular_top_50',
            'label'       => 'gradient (circular, top center 50%)',
            'src'         => ''
          ),
          array(
            'value'       => 'ellipse_top',
            'label'       => 'gradient (ellipse, top center)',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'gradient_bg_color_1',
        'label'       => 'Gradient Background Color 1',
        'desc'        => 'Pick the color for gradient background, use this color picker for "one color" background type.',
        'std'         => '#ebebeb',
        'type'        => 'colorpicker',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'gradient_bg_color_2',
        'label'       => 'Gradient Background Color 2',
        'desc'        => 'Pick the second color for gradient background.',
        'std'         => '#ebebeb',
        'type'        => 'colorpicker',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'bg_custom_pattern',
        'label'       => 'Custom Pattern Background',
        'desc'        => 'Upload a pattern image for backgrond.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'bg_custom_img',
        'label'       => 'Custom Image Background',
        'desc'        => 'Upload an image for backgrond.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'favicon',
        'label'       => 'Favicon',
        'desc'        => 'Upload an .ico image (dimensions 16x16) for favicon.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'iphone_icon',
        'label'       => 'Iphone Icon',
        'desc'        => 'Upload an .png image (dimensions 57x57) for touch icon.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'ipad_icon',
        'label'       => 'Ipad Icon',
        'desc'        => 'Upload an .png image (dimensions 72x72) for touch icon.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'iphone2_icon',
        'label'       => 'Iphone Icon Retina',
        'desc'        => 'Upload an .png image (dimensions 114x114) for touch icon.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'ipad2_icon',
        'label'       => 'Ipad Icon Retina',
        'desc'        => 'Upload an .png image (dimensions 144x144) for touch icon.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'exclude_primarynavi',
        'label'       => 'Exclude From Primary Navigation',
        'desc'        => 'Enter a comma-separated list of any Page IDs you wish to exclude from the navigation (e.g. 1,3,6,)',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'menu_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'menu_order',
        'label'       => 'Menu Order',
        'desc'        => 'Select the view order you wish to set for the main navigation.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'menu_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'post_title',
            'label'       => 'post_title',
            'src'         => ''
          ),
          array(
            'value'       => 'menu_order',
            'label'       => 'menu_order',
            'src'         => ''
          ),
          array(
            'value'       => 'ID',
            'label'       => 'ID',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'navi_type',
        'label'       => 'Navigation',
        'desc'        => 'Check for disabling animated hover style.',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'menu_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Disable Animated Style',
            'label'       => 'Disable Animated Style',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => '500px',
        'label'       => '500px',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'about_me',
        'label'       => 'About Me',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'add_this',
        'label'       => 'Add This',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'amazon',
        'label'       => 'Amazon',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'aol',
        'label'       => 'Aol',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'app_store_alt',
        'label'       => 'App Store Alt',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'app_store',
        'label'       => 'App Store',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'apple',
        'label'       => 'Apple',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'bebo',
        'label'       => 'Bebo',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'behance',
        'label'       => 'Behance',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'bing',
        'label'       => 'Bing',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'blip',
        'label'       => 'Blip',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'blogger',
        'label'       => 'Blogger',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'coroflot',
        'label'       => 'Coroflot',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'daytum',
        'label'       => 'Daytum',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'delicious',
        'label'       => 'Delicious',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'design_bump',
        'label'       => 'Design Bump',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'designfloat',
        'label'       => 'Designfloat',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'deviant_art',
        'label'       => 'Deviant Art',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'digg_alt',
        'label'       => 'Digg Alt',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'digg',
        'label'       => 'Digg',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'dribbble',
        'label'       => 'Dribbble',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'drupal',
        'label'       => 'Drupal',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'ebay',
        'label'       => 'Ebay',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'email',
        'label'       => 'Email',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'ember_app',
        'label'       => 'Ember App',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'etsy',
        'label'       => 'Etsy',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'facebook',
        'label'       => 'Facebook',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'flickr',
        'label'       => 'Flickr',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'foodspotting',
        'label'       => 'Foodspotting',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'forrst',
        'label'       => 'Forrst',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'foursquare',
        'label'       => 'Foursquare',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'friendsfeed',
        'label'       => 'Friendsfeed',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'friendstar',
        'label'       => 'Friendstar',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'gdgt',
        'label'       => 'Gdgt',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'github',
        'label'       => 'Github',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'google_buzz',
        'label'       => 'Google Buzz',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'google_talk',
        'label'       => 'Google Talk',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'gowalla_pin',
        'label'       => 'Gowalla Pin',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'gowalla',
        'label'       => 'Gowalla',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'grooveshark',
        'label'       => 'Grooveshark',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'heart',
        'label'       => 'Heart',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'hyves',
        'label'       => 'Hyves',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'icondock',
        'label'       => 'Icondock',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'icq',
        'label'       => 'Icq',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'identica',
        'label'       => 'Identica',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'imessage',
        'label'       => 'Imessage',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'itune',
        'label'       => 'Itune',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'last_fm',
        'label'       => 'Last.fm',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'linkedin',
        'label'       => 'Linkedin',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'meetup',
        'label'       => 'Meetup',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'metacafe',
        'label'       => 'Metacafe',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'mixx',
        'label'       => 'Mixx',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'mobileme',
        'label'       => 'Mobileme',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'mr_wong',
        'label'       => 'Mr Wong',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'msn',
        'label'       => 'Msn',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'myspace',
        'label'       => 'Myspace',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'newsvine',
        'label'       => 'Newsvine',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'paypal',
        'label'       => 'Paypal',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'photobucket',
        'label'       => 'Photobucket',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'qik',
        'label'       => 'Qik',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'quora',
        'label'       => 'Quora',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'reddit',
        'label'       => 'Reddit',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'retweet',
        'label'       => 'Retweet',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'rss',
        'label'       => 'Rss',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'scribd',
        'label'       => 'Scribd',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'share_this',
        'label'       => 'Share This',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'skype',
        'label'       => 'Skype',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'slashdot',
        'label'       => 'Slashdot',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'slideshare',
        'label'       => 'Slideshare',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'smugmug',
        'label'       => 'Smugmug',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'sound_cloud',
        'label'       => 'Sound Cloud',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'spotify',
        'label'       => 'Spotify',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'squidoo',
        'label'       => 'Squidoo',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'stackoverflow',
        'label'       => 'Stackoverflow',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'stumbleupon',
        'label'       => 'Stumbleupon',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'technorati',
        'label'       => 'Technorati',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'tumblr',
        'label'       => 'Tumblr',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'twitter_bird',
        'label'       => 'Twitter_bird',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'twitter',
        'label'       => 'Twitter',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'viddler',
        'label'       => 'Viddler',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vimeo',
        'label'       => 'Vimeo',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'virb',
        'label'       => 'Virb',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'w3',
        'label'       => 'w3',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'wikipedia',
        'label'       => 'Wikipedia',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'windows',
        'label'       => 'Windows',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'wordpress',
        'label'       => 'Wordpress',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'xing',
        'label'       => 'Xing',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'yahoo_buzz',
        'label'       => 'Yahoo Buzz',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'yahoo',
        'label'       => 'Yahoo',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'yelp',
        'label'       => 'Yelp',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'youtube',
        'label'       => 'Youtube',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_search',
        'label'       => 'Footer Search Form',
        'desc'        => 'Select one search form type',
        'std'         => 'theme_search',
        'type'        => 'select',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'shop_search',
            'label'       => 'Shop search',
            'src'         => ''
          ),
          array(
            'value'       => 'theme_search',
            'label'       => 'Theme search',
            'src'         => ''
          ),
          array(
            'value'       => 'none',
            'label'       => 'None',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'ccard',
        'label'       => 'Credit Cards',
        'desc'        => 'Select your payment methods.',
        'std'         => '#',
        'type'        => 'checkbox',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'amazon',
            'label'       => 'Amazon',
            'src'         => ''
          ),
          array(
            'value'       => 'amex_alt',
            'label'       => 'Amex Alt',
            'src'         => ''
          ),
          array(
            'value'       => 'amex_gold',
            'label'       => 'Amex Gold',
            'src'         => ''
          ),
          array(
            'value'       => 'amex_green',
            'label'       => 'Amex Green',
            'src'         => ''
          ),
          array(
            'value'       => 'amex_silver',
            'label'       => 'Amex Silver',
            'src'         => ''
          ),
           array(
            'value'       => 'amex',
            'label'       => 'Amex',
            'src'         => ''
          ),
           array(
            'value'       => 'apple',
            'label'       => 'Apple',
            'src'         => ''
          ),
           array(
            'value'       => 'bank',
            'label'       => 'Bank',
            'src'         => ''
          ),
          array(
            'value'       => 'cash',
            'label'       => 'Cash',
            'src'         => ''
          ),
           array(
            'value'       => 'chase',
            'label'       => 'Chase',
            'src'         => ''
          ),
           array(
            'value'       => 'coupon',
            'label'       => 'Coupon',
            'src'         => ''
          ),
           array(
            'value'       => 'credit',
            'label'       => 'Credit',
            'src'         => ''
          ),
          array(
            'value'       => 'debit',
            'label'       => 'Debit',
            'src'         => ''
          ),
           array(
            'value'       => 'discover_alt',
            'label'       => 'Discover Alt',
            'src'         => ''
          ),
           array(
            'value'       => 'discover_novus',
            'label'       => 'Discover Novus',
            'src'         => ''
          ),
           array(
            'value'       => 'discover',
            'label'       => 'Discover',
            'src'         => ''
          ),
           array(
            'value'       => 'echeck',
            'label'       => 'Echeck',
            'src'         => ''
          ),
           array(
            'value'       => 'generic_1',
            'label'       => 'Generic 1',
            'src'         => ''
          ),
           array(
            'value'       => 'generic_2',
            'label'       => 'Generic 2',
            'src'         => ''
          ),
           array(
            'value'       => 'generic_3',
            'label'       => 'Generic 3',
            'src'         => ''
          ),
           array(
            'value'       => 'gift_alt',
            'label'       => 'Gift Alt',
            'src'         => ''
          ),
           array(
            'value'       => 'gift',
            'label'       => 'Gift',
            'src'         => ''
          ),
           array(
            'value'       => 'gold',
            'label'       => 'Gold',
            'src'         => ''
          ),
           array(
            'value'       => 'googleckout',
            'label'       => 'Googleckout',
            'src'         => ''
          ),
           array(
            'value'       => 'itunes_2',
            'label'       => 'Itunes 2',
            'src'         => ''
          ),
           array(
            'value'       => 'itunes_3',
            'label'       => 'Itunes 3',
            'src'         => ''
          ),
           array(
            'value'       => 'itunes',
            'label'       => 'Itunes',
            'src'         => ''
          ),
           array(
            'value'       => 'mastercard_alt',
            'label'       => 'Mastercard Alt',
            'src'         => ''
          ),
           array(
            'value'       => 'mastercard',
            'label'       => 'Mastercard',
            'src'         => ''
          ),
           array(
            'value'       => 'mileage',
            'label'       => 'Mileage',
            'src'         => ''
          ),
           array(
            'value'       => 'paypal',
            'label'       => 'Paypal',
            'src'         => ''
          ),
           array(
            'value'       => 'sapphire',
            'label'       => 'Sapphire',
            'src'         => ''
          ),
           array(
            'value'       => 'solo',
            'label'       => 'Solo',
            'src'         => ''
          ),
           array(
            'value'       => 'visa_alt',
            'label'       => 'Visa Alt',
            'src'         => ''
          ),
           array(
            'value'       => 'visa',
            'label'       => 'Visa',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'footer_copyright',
        'label'       => 'Footer Copyright Text',
        'desc'        => 'Enter the copyright text you\'d like to show in the footer of your site.',
        'std'         => 'Copyright © 2012 <a href="http://themeforest.net/user/lidplussdesign/">lpd-themes</a>',
        'type'        => 'text',
        'section'     => 'footer_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'blog_number_of_post',
        'label'       => 'Number of Posts',
        'desc'        => 'Enter a number of posts for custom blog templates, the option is available only for "Blog Temlplate (full-width), Blog Template (mini), Blog Template (mini-sidebar)"',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'blog_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'loop_shop_per_page',
        'label'       => 'Number of Products',
        'desc'        => 'Number of products to display on shop page.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'shop_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'shop_columns',
        'label'       => 'Number of Columns',
        'desc'        => 'Select number of columns for shop page.',
        'std'         => '4',
        'type'        => 'select',
        'section'     => 'shop_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '2',
            'label'       => '2',
            'src'         => ''
          ),
          array(
            'value'       => '3',
            'label'       => '3',
            'src'         => ''
          ),
          array(
            'value'       => '4',
            'label'       => '4',
            'src'         => ''
          ),
          array(
            'value'       => '6',
            'label'       => '6',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'product_style',
        'label'       => 'Product Page Sidebar',
        'desc'        => 'Select one of sidebar side for product (taxonomy).',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'shop_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'right_sidebar',
            'label'       => 'right sidebar',
            'src'         => ''
          ),
          array(
            'value'       => 'left_sidebar',
            'label'       => 'left sidebar',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'product_post_style',
        'label'       => 'Product Post Sidebar',
        'desc'        => 'Select one of sidebar side for product post.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'shop_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'right_sidebar',
            'label'       => 'right sidebar',
            'src'         => ''
          ),
          array(
            'value'       => 'left_sidebar',
            'label'       => 'left sidebar',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'sale_flash_color1',
        'label'       => 'Sale Flash Element (gradient color 1)',
        'desc'        => 'Pick the color 1 for sale flash element.',
        'std'         => '#5c942e',
        'type'        => 'colorpicker',
        'section'     => 'shop_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'sale_flash_color2',
        'label'       => 'Sale Flash Element (gradient color 2)',
        'desc'        => 'Pick the color 2 for sale flash element.',
        'std'         => '#76bd3b',
        'type'        => 'colorpicker',
        'section'     => 'shop_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'shop_search_image',
        'label'       => 'Shop Search Page Image',
        'desc'        => 'Upload an image for shop search page.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'shop_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'shop_tag_image',
        'label'       => 'Shop Tag Page Image',
        'desc'        => 'Upload an image for shop search page.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'shop_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}