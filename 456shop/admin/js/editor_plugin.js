(
	function(){
	
		tinymce.create(
			"tinymce.plugins.ThemeShortcodes",
			{
				init: function(d,e) {},
				createControl:function(d,e)
				{
				
					if(d=="theme_shortcodes_button"){
					
						d=e.createMenuButton( "theme_shortcodes_button",{
							title:"Insert Shortcode",
							icons:false
							});
							
							var a=this;d.onRenderMenu.add(function(c,b){
								
  
                                
                                //b.addSeparator();
                                

                                		
                                a.addImmediate(b,"Address", '[address][strong]Twitter, Inc.[/strong][br][/br]795 Folsom Ave, Suite 600[br][/br]San Francisco, CA 94107[br][/br][abbr title="Phone"]P:[/abbr] (123) 456-7890[/address][address][strong]Full Name[/strong][br][/br][hyperlink href="mailto:#"]first.last@gmail.com[/hyperlink][/address]');
                                
                                c=b.addMenu({title:"Badges"});
                                		a.addImmediate(c,"Default", '[badge]Default[/badge]');
                                        a.addImmediate(c,"Success", '[badge type="success"]Success[/badge]');
                                        a.addImmediate(c,"Warning", '[badge type="warning"]Warning[/badge]');
                                        a.addImmediate(c,"Important", '[badge type="important"]Important[/badge]');
                                        a.addImmediate(c,"Info", '[badge type="info"]Info[/badge]');
                                        a.addImmediate(c,"Inverse", '[badge type="inverse"]Inverse[/badge]');
                                        
                                a.addImmediate(b,"Business Hours", '[biz-hours title=""][biz-day day="Monday :"]8am to 5pm[/biz-day][biz-day day="Tuesday :"]8am to 5pm[/biz-day][biz-day day="Wednesday :"]8am to 5pm[/biz-day][biz-day day="Thursday :"]8am to 5pm[/biz-day][biz-day day="Friday :"]8am to 5pm[/biz-day][biz-day day="Saturday :"]9am to 2pm[/biz-day][biz-day day="Sunday :"]Closed[/biz-day][/biz-hours]');        
                                
                                a.addImmediate(b,"Break Tag", '[br][/br]');
                                
                                a.addImmediate(b,"Carousel", '[carousel title="Carousel" control="on"][carousel-item img="http://twitter.github.com/bootstrap/assets/img/bootstrap-mdo-sfmoma-01.jpg"]some dec[/carousel-item][carousel-item img="http://twitter.github.com/bootstrap/assets/img/bootstrap-mdo-sfmoma-02.jpg" link="http://themeforest.net/"]some dec[/carousel-item][carousel-item img="http://twitter.github.com/bootstrap/assets/img/bootstrap-mdo-sfmoma-03.jpg"]some dec[/carousel-item][/carousel]');
                                
                                c=b.addMenu({title:"Callout"});
                                		a.addImmediate(c,"Callout", '[callout][callout-content layout="span8"][h4]Your content here...[/h4][p]Your content here...[/p][/callout-content][callout-button layout="span4"][button size="large" type="primary" value="Large Button" href="#"][/callout-button][/callout]');
                                        a.addImmediate(c,"Callout 2", '[callout type="style2"][callout-content layout="span8"][h4]Your content here...[/h4][p]Your content here...[/p][/callout-content][callout-button layout="span4"][button size="large" type="primary" value="Large Button" href="#"][/callout-button][/callout]');
                                        a.addImmediate(c,"Callout (for newsletter)", '[callout][callout-content layout="span8"][h4]Your content here...[/h4][p]Your content here...[/p][/callout-content][callout-newsletter layout="span4"]Your mail chimp shortcode...[/callout-newsletter][/callout]');
                                        a.addImmediate(c,"Callout 2 (for newsletter)", '[callout type="style2"][callout-content layout="span8"][h4]Your content here...[/h4][p]Your content here...[/p][/callout-content][callout-newsletter layout="span4"]Your mail chimp shortcode...[/callout-newsletter][/callout]');              
                                a.addImmediate(b,"Computer Code", '[code]Your content here...[/code]');
                                
                                a.addImmediate(b,"Clients", '[clients title="This is a title"][/clients]');
                                
                                c=b.addMenu({title:"Dropcaps"});
                                		a.addImmediate(c,"Dropcap", '[dropcap]a[/dropcap]');
                                        a.addImmediate(c,"Dropcap 1", '[dropcap1]a[/dropcap1]');
                                        a.addImmediate(c,"Dropcap 2", '[dropcap2]a[/dropcap2]');
                                
                                a.addImmediate(b,"Float Clear", '[clear][/clear]');
                                
                                a.addImmediate(b,"Front Tabs", '[front_tabs category=""][/front_tabs]');
                                
                                c=b.addMenu({title:"Headings"});
										a.addImmediate(c,"Headeing h1","[h1]Your content here...[/h1]" );
										a.addImmediate(c,"Headeing h2","[h2]Your content here...[/h2]" );
										a.addImmediate(c,"Headeing h3","[h3]Your content here...[/h3]" );
										a.addImmediate(c,"Headeing h4","[h4]Your content here...[/h4]" );
										a.addImmediate(c,"Headeing h5","[h5]Your content here...[/h5]" );
										a.addImmediate(c,"Headeing h6","[h6]Your content here...[/h6]" );
										
								a.addImmediate(b,"Google Map", '[map latitude="51.507335" longitude="-0.127683" zoom="13" height_px="300" icon=""][/map]');
										
								a.addImmediate(b,"Horizontal Line", '[hr][/hr]');
                                        
                                a.addImmediate(b,"Hyperlink", "[hyperlink target='_self' href='#']Your content here...[/hyperlink]");
                                        
                                a.addImmediate(b,"Icon", '[icon]hot[/icon]');
                                
                                a.addImmediate(b,"Iconitem", '[iconitem icon="delivery-truck" title="Lorem ipsum dolor"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pulvinar, felis fringillaconvallis rhoncus, lorem arcu feugiat nisi, vel accumsan nisi arcu sit amet metus. Pellentesque id lorem in dolor condimentum varius [...][/iconitem]');
                                
                                c=b.addMenu({title:"Icon Headings"});;
										a.addImmediate(c,"Icon Heading (64px icon)",'[icon_heading icon_size="64" icon="hot"]This is a Heading[/icon_heading]' );
                                        a.addImmediate(c,"Icon Heading (64px icon, center)",'[icon_heading icon_size="64" icon="hot" align="center"]This is a Heading[/icon_heading]' );
                                        a.addImmediate(c,"Icon Heading (64px icon, right)",'[icon_heading icon_size="64" icon="hot" align="right"]This is a Heading[/icon_heading]' );
										a.addImmediate(c,"Icon Heading (32px icon)",'[icon_heading icon_size="32" icon="hot"]This is a Heading[/icon_heading]' );
                                        a.addImmediate(c,"Icon Heading (32px icon, center)",'[icon_heading icon_size="32" icon="hot" align="center"]This is a Heading[/icon_heading]' );
                                        a.addImmediate(c,"Icon Heading (32px icon, right)",'[icon_heading icon_size="32" icon="hot" align="right"]This is a Heading[/icon_heading]' ); 
                                
                                c=b.addMenu({title:"Labels"});
                                		a.addImmediate(c,"Default", '[label]Default[/label]');
                                        a.addImmediate(c,"Success", '[label type="success"]Success[/label]');
                                        a.addImmediate(c,"Warning", '[label type="warning"]Warning[/label]');
                                        a.addImmediate(c,"Important", '[label type="important"]Important[/label]');
                                        a.addImmediate(c,"Info", '[label type="info"]Info[/label]');
                                        a.addImmediate(c,"Inverse", '[label type="inverse"]Inverse[/label]');
                                        
                                c=b.addMenu({title:"List"});
		                                a.addImmediate(c,"Unordered List (square)", '[lists bullet="square" type="style1"]<ul><li>Coffee</li><li>Tea</li><li>Milk</li></ul>[/lists]');
		                                a.addImmediate(c,"Ordered List", '[lists bullet="ordered" type="style1"]<ul><li>Coffee</li><li>Tea</li><li>Milk</li></ul>[/lists]');
		                                a.addImmediate(c,"Unordered List (square), style2", '[lists bullet="square" type="style2"]<ul><li>Coffee</li><li>Tea</li><li>Milk</li></ul>[/lists]');
		                                a.addImmediate(c,"Ordered List, style2", '[lists bullet="ordered" type="style2"]<ul><li>Coffee</li><li>Tea</li><li>Milk</li></ul>[/lists]');
		                                
                                
                                a.addImmediate(b,"Margin Bottom", '[margin-bottom]Your content here...[/margin-bottom]');
                                
                                c=b.addMenu({title:"Media Button"});
		                                a.addImmediate(c,"Media Buttom ( bottom right position, medium button size, primary button type)", '[media-button image_url="" image_alt="" button_position="bottom_right" button_size="medium" button_type="primary" button_url="http://themeforest.net/"]Shop Now![/media-button]');
		                                a.addImmediate(c,"Media Buttom ( bottom left position, medium button size, default button type)", '[media-button image_url="" image_alt="" button_position="bottom_left" button_size="large" button_type="default" button_url="http://themeforest.net/"]Shop Now![/media-button]');
		                                a.addImmediate(c,"Media Buttom ( top left position, small button size, info button type)", '[media-button image_url="" image_alt="" button_position="top_left" button_size="small" button_type="info" button_url="http://themeforest.net/"]Shop Now![/media-button]');
		                                a.addImmediate(c,"Media Buttom ( top right position, medium button size, success button type)", '[media-button image_url="" image_alt="" button_position="top_right" button_size="medium" button_type="success" button_url="http://themeforest.net/"]Shop Now![/media-button]');
		                                a.addImmediate(c,"Media Buttom ( bottom 20% right 20% position, medium button size, danger button type)", '[media-button image_url="" image_alt="" button_bottom="20" button_right="20" button_size="medium" button_type="danger" button_url="http://themeforest.net/"]Shop Now![/media-button]');
		                                a.addImmediate(c,"Media Buttom ( top 20% left 20% position, medium button size, danger button type)", '[media-button image_url="" image_alt="" button_top="20" button_left="20" button_size="medium" button_type="inverse" button_url="http://themeforest.net/"]Shop Now![/media-button]');
		                                a.addImmediate(c,"Media Buttom ( bottom right position, medium button size, primary button type, dark button border)", '[media-button image_url="" image_alt="" button_position="bottom_right" button_size="medium" button_type="primary" button_border="dark" button_url="http://themeforest.net/"]Shop Now![/media-button]');
		                                a.addImmediate(c,"Media Buttom (hidden on phone)", '[media-button image_url="" image_alt="" button_position="bottom_right" button_size="medium" button_type="primary" button_url="http://themeforest.net/" responsive="hidden-phone"]Shop Now![/media-button]');
		                                a.addImmediate(c,"Media Buttom (hidden on table)", '[media-button image_url="" image_alt="" button_position="bottom_right" button_size="medium" button_type="primary" button_url="http://themeforest.net/" responsive="hidden-table"]Shop Now![/media-button]');
		                                a.addImmediate(c,"Media Buttom (visible on desktop)", '[media-button image_url="" image_alt="" button_position="bottom_right" button_size="medium" button_type="primary" button_url="http://themeforest.net/" responsive="visible-desktop"]Shop Now![/media-button]');
                                
                                c=b.addMenu({title:"Media Image"});
		                                a.addImmediate(c,"Media Image", '[media-image image_url=""][/media-image]');
		                                a.addImmediate(c,"Media Image (with url)", '[media-image image_url="" image_alt="" href="http://themeforest.net/"][/media-image]');
		                                a.addImmediate(c,"Media Image (hidden on phone)", '[media-image image_url="" image_alt="" responsive="hidden-phone"][/media-image]');
		                                a.addImmediate(c,"Media Image (hidden on table)", '[media-image image_url="" image_alt="" responsive="hidden-table"][/media-image]');
		                                a.addImmediate(c,"Media Image (visible on desktop)", '[media-image image_url="" image_alt="" responsive="visible-desktop"][/media-image]');
                                
                                a.addImmediate(b,"Paragraph", '[p]Your content here...[/p]');
                                
                                c=b.addMenu({title:"Portfolio"});
                                		a.addImmediate(c,"Portfolio (4 columns, 4 posts)", '[portfolio columns="4" posts="4"][/portfolio]');
                                		a.addImmediate(c,"Portfolio (2 columns)", '[portfolio columns="2"][/portfolio]');
                                		a.addImmediate(c,"Portfolio (3 columns)", '[portfolio columns="3"][/portfolio]');
                                        a.addImmediate(c,"Portfolio (6 columns)", '[portfolio columns="6"][/portfolio]');
                                        a.addImmediate(c,"Portfolio (filter by post id)", '[portfolio id=""][/portfolio]');
                                        a.addImmediate(c,"Portfolio (filter by category)", '[portfolio category=""][/portfolio]');
                                
                                c=b.addMenu({title:"Preformatted"});
                                		a.addImmediate(c,"Preformatted Text", '[pre]Your content here...[/pre]');
                                		a.addImmediate(c,"Preformatted Prettyprint", '[prettyprint]Your content here...[/prettyprint]');
                                
                                c=b.addMenu({title:"Quotation"});
                                		a.addImmediate(c,"Quotation Left", '[blockquote cite="Someone famous Source Title"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.[/blockquote]'); 
                                		a.addImmediate(c,"Quotation Right", '[blockquote-right cite="Someone famous Source Title"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.[/blockquote-right]');
                                		      
                                a.addImmediate(b,"Selected Font", '[select]Your content here...[/select]');
                                
                                a.addImmediate(b,"Shadow Wrap", '[shadow-wrap]Your content here...[/shadow-wrap]');
                                
                                a.addImmediate(b,"Shop Tabs", '[shop-tabs columns="4" orderby="" order="" include_id=""][/shop-tabs]');
                                
                                c=b.addMenu({title:"Sidebar"});
                                		a.addImmediate(c,"Sidebar Right", '[sidebar][/sidebar]');
                                		a.addImmediate(c,"Sidebar Left", '[sidebar type="left"][/sidebar]');

                                a.addImmediate(b,"Testimonial Widget", '[testimonial title="Testimonial" control="on"][testimonial-item cite="John Doe, CEO" linktitle="themeforest.com" linkurl="http://themeforest.net/"][p]Your content here...[/p][p]Your content here...[/p][/testimonial-item][testimonial-item cite="John Doe, CEO" linktitle="themeforest.com" linkurl="http://themeforest.net/"][p]Your content here...[/p][p]Your content here...[/p][/testimonial-item][testimonial-item cite="John Doe, CEO" linktitle="themeforest.com" linkurl="http://themeforest.net/"][p]Your content here...[/p][p]Your content here...[/p][/testimonial-item][/testimonial]');
                                
                                a.addImmediate(b,"Title", "[title]Your content here...[/title]");
                                
                                c=b.addMenu({title:"Team Members"});
                                		a.addImmediate(c,"Team Members (4 columns, 4 posts)", '[team-members columns="4" posts="4"][/team-members]');
                                		a.addImmediate(c,"Team Members (2 columns)", '[team-members columns="2"][/team-members]');
                                		a.addImmediate(c,"Team Members (3 columns)", '[team-members columns="3"][/team-members]');
                                        a.addImmediate(c,"Team Members (6 columns)", '[team-members columns="6"][/team-members]');
                                        a.addImmediate(c,"Team Members (filter by post id)", '[team-members id=""][/team-members]');
                                        a.addImmediate(c,"Team Members (filter by title)", '[team-members title=""][/team-members]');
                                
                                c=b.addMenu({title:"Tooltip"});
                                		a.addImmediate(c,"Tooltip on top", '[tooltip title="Tooltip on top"]Tooltip on top[/tooltip]');
                                        a.addImmediate(c,"Tooltip on right", '[tooltip title="Tooltip on right" placement="right"]Tooltip on right[/tooltip]');
                                        a.addImmediate(c,"Tooltip on bottom", '[tooltip title="Tooltip on bottom" placement="bottom"]Tooltip on bottom[/tooltip]');
                                        a.addImmediate(c,"Tooltip on left", '[tooltip title="Tooltip on left" placement="left"]Tooltip on left[/tooltip]');
                                        
                                c=b.addMenu({title:"Video"});
                                		a.addImmediate(c,"Video", '[video video_url="http://www.youtube.com/watch?v=UX7GycmeQVo"][/video]');
                                		a.addImmediate(c,"Video (without shadow)", '[video video_url="http://www.youtube.com/watch?v=UX7GycmeQVo" shadow="no"][/video]');
                                
                                c=b.addMenu({title:"Widget"});
                                		a.addImmediate(c,"Portfolio Widget", '[widget title="This is a title" type="portfolio"][/widget]');
                                		a.addImmediate(c,"Portfolio Widget (dark)", '[widget title="This is a title" type="portfolio" style="dark"][/widget]');
                                		a.addImmediate(c,"Post Widget", '[widget title="This is a title" type="post"][/widget]');
                                        a.addImmediate(c,"Post Widget (2 colums)", '[widget title="This is a title" type="post" layout="2-column"][/widget]');
                                        a.addImmediate(c,"Post Widget (3 colums)", '[widget title="This is a title" type="post" layout="3-column"][/widget]');
                                        a.addImmediate(c,"Post Widget (6 colums)", '[widget title="This is a title" type="post" layout="6-column"][/widget]');
                                        a.addImmediate(c,"Post Widget (category filter)", '[widget title="This is a title" type="post" category=""][/widget]');
                                
							});
						return d
					
					}
					
					return null
				},
		
				addImmediate:function(d,e,a){d.add({title:e,onclick:function(){tinyMCE.activeEditor.execCommand( "mceInsertContent",false,a)}})}
				
			}
		);
		
		tinymce.PluginManager.add( "ThemeShortcodes", tinymce.plugins.ThemeShortcodes);
	}
)();