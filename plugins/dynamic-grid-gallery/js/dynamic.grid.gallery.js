(function(b){function a(a,c){return a.pageX>c.offset().left&&a.pageX<c.offset().left+c.width()&&a.pageY>c.offset().top&&a.pageY<c.offset().top+c.height()?!0:!1}function e(a,c,b){this.O=c;this.cells=b;this.nCells=b.length;this.html="";this.lastColumnRows=99999;this.lastColumnDirection=-1;this.fluidWidth=!1;this.notAnimated=!0;this.interval=!1;this.columns=[];this.root=a;this.wrap=0}function c(a,c,b,d){this.O=d;this.parent=a;this.cells=c;this.nCells=this.cells.length;this.index=b;this.html="";this.top=
this.left=this.height=this.width=0;this.heights=[];this.positions=[];this.rows=0;this.direction=-this.parent.lastColumnDirection;this.position=1==this.direction?0:this.nCells-this.rows-1;this.animated=!1;this.root=0;this.parent.lastColumnDirection=this.direction}function d(a,c,b,d){this.O=d;this.parent=a;this.content=c;this.html="";this.width=this.O.width/this.O.cols;this.height=b;this.root=0}var g,f=document.createElement("div");vendors=["Khtml","Ms","O","Moz","Webkit"];len=vendors.length;(function(a){if(a in
f.style)return!0;for(a=a.replace(/^[a-z]/,function(a){return a.toUpperCase()});len--;)if(vendors[len]+a in f.style)return!0;return!1})("transform");e.prototype.init=function(){this.O.height+=this.O.padding;this.height=this.O.height;if(void 0==this.O.width){this.root.wrapInner('<div id="dg-temp"></div>');var a=b("#dg-temp");this.O.width=a.width();this.width=this.O.width;this.fluidWidth=!0;a.remove()}this.add_columns();this.put_html();this.link_elements();this.set_styles();this.init_animations();this.mouse_events();
this.touch_events();this.window_events()};e.prototype.add_columns=function(){for(var a=[],b=0;b<this.O.cols;b++)a[b]=[];for(var d=0,b=0;b<this.nCells;b++)a[d].push(this.cells[b]),d=d==this.O.cols-1?0:d+1;for(b=0;b<this.O.cols;b++)this.columns[b]=new c(this,a[b],b,this.O),this.columns[b].init()};e.prototype.put_html=function(){var a;a='<div class="dg-gallery-wrap">\t<div class="dg-wrap-inner">';for(var c=0;c<this.O.cols;c++)a+=this.columns[c].html;a+="\t</div>";a+="</div>";this.root.html(a)};e.prototype.link_elements=
function(){var a=0,c=0,d=this;this.wrap=this.root.find(".dg-gallery-wrap");this.inner=this.wrap.find(".dg-wrap-inner");this.root.find(".dg-column-wrap").each(function(){d.columns[a].root=b(this);c=0;b(this).find(".dg-cell-wrap").each(function(){d.columns[a].cells[c].root=b(this);d.columns[a].cells[c].img=b(this).find("img");c++});a++})};e.prototype.set_styles=function(){this.wrap.css({width:this.O.width,height:this.O.height-this.O.padding});this.inner.css({height:this.O.height});for(var a=0;a<this.O.cols;a++)this.columns[a].set_styles()};
e.prototype.init_animations=function(){for(var a=0;a<this.O.cols;a++)this.columns[a].init_animation();this.start()};e.prototype.start=function(){if(!this.notAnimated){!1!=this.interval&&clearInterval(this.interval);var a=0,c=this;this.interval=setInterval(function(){if(1<c.O.cols){a++;for(a==c.O.cols&&(a=0);!c.columns[a].animated;)a++,a==c.O.cols&&(a=0)}c.columns[a].advance()},this.O.interval)}};e.prototype.pause=function(){clearInterval(this.interval)};e.prototype.mouse_events=function(){var c=this;
this.inner.on("mouseover",function(b){a(b,c.inner)&&!c.paused&&(c.paused=!0,c.pause())});this.inner.on("mouseout",function(b){!a(b,c.inner)&&c.paused&&(c.paused=!1,c.start())})};e.prototype.touch_events=function(){};e.prototype.window_events=function(){var a=this;b(window).on("resize",function(){a.fluidWidth&&(a.O.width=a.root.width());a.set_styles()})};c.prototype.init=function(){this.set_heights();this.set_positions();this.set_cells();this.set_html()};c.prototype.set_heights=function(){var a=[];
this.rows=Math.round(Math.random()*(this.O.max_rows-this.O.min_rows)+this.O.min_rows);if(this.rows==this.parent.lastColumnRows&&this.O.min_rows!=this.O.max_rows)for(;this.rows==this.parent.lastColumnRows;)this.rows=Math.round(Math.random()*(this.O.max_rows-this.O.min_rows)+this.O.min_rows);this.parent.lastColumnRows=this.rows;this.nCells<this.rows&&(this.rows=this.nCells);for(var c=0;c<this.rows;c++)a[c]=Math.ceil(this.parent.height/this.rows);if(this.O.random_heights&&1<this.rows){for(var b=this.O.height/
this.O.max_rows/1.5,d=0,e=0,c=0;c<this.rows;c++)a[c]=b,d++,e+=b;for(;e<this.O.height;)a[Math.round(Math.random()*(this.rows-1-0)+0)]+=10,d++,e+=10;e>this.O.height&&(a[this.rows-1]-=e-this.O.height)}for(c=b=0;c<this.nCells;c++)this.heights[c]=a[b],b=b==this.rows-1?0:b+1};c.prototype.set_positions=function(){this.positions[0]=0;this.positions[1]=this.heights[0];for(var a=1;a<this.nCells;a++)this.positions[a+1]=this.positions[a]+this.heights[a]};c.prototype.set_cells=function(){for(var a=[],c=0;c<this.nCells;c++)a[c]=
new d(this,this.cells[c],this.heights[c],this.O),a[c].init();this.cells=a};c.prototype.set_html=function(){this.html="";this.html+='<div class="dg-column-wrap">';for(var a=0;a<this.nCells;a++)this.html+=this.cells[a].html;this.html+="</div>"};c.prototype.set_styles=function(){for(var a=0;a<this.nCells;a++)this.cells[a].set_styles();this.width=Math.round((this.O.width-this.O.padding*(this.O.cols-1))/this.O.cols);this.left=this.index*this.width+this.O.padding*this.index;this.height=this.root.height();
this.top=1==this.direction?0:-(this.height-this.O.height);this.root.css({width:this.width,left:this.left,top:this.top})};c.prototype.init_animation=function(){this.nCells<=this.rows||(this.animated=!0,this.parent.notAnimated=!1,this.position=1==this.direction?0:this.nCells-this.rows,-1==this.direction&&(this.position=this.nCells-this.rows,this.root.css({top:-this.positions[this.position]})))};c.prototype.advance=function(){if(this.animated&&(this.position=1==this.direction?this.position+1:this.position-
1,this.root.animate({top:-this.positions[this.position]},{duration:this.O.speed,easing:this.O.easing}),this.position>this.nCells-this.rows-1||0>=this.position))this.direction=-this.direction};d.prototype.init=function(){this.html=this.get_html()};d.prototype.get_html=function(){var a;a='<div class="dg-cell-wrap">\t<div class="dg-add-content-wrap">';a+=this.get_additional_content();a+="\t</div>";a+='\t<div class="dg-main-content-inner-wrap">';a+=this.get_main_content();a+="\t</div>";return a+="</div>"};
d.prototype.set_styles=function(){this.root.css({height:this.height});this.root.find(".dg-main-content-inner-wrap").css({height:this.height-this.O.padding,"margin-bottom":this.O.padding});this.imgWidth=this.root.find("img").width();this.imgHeight=this.root.find("img").height();this.init_content()};d.prototype.get_main_content=function(){return""};d.prototype.get_additional_content=function(){return""};d.prototype.init_content=function(){};e.prototype.window_events=function(){var a=this;b(".ndd-tab-group > ul li").on("click",
function(){b(this).hasClass("preview-tab")?b(".preview-tab-c").show():b(".preview-tab-c").hide();a.fluidWidth&&(a.O.width=a.root.width());a.set_styles()});b(window).on("resize",function(){a.fluidWidth&&(a.O.width=a.root.width());a.set_styles()})};d.prototype.get_html=function(){var a;a='<div class="dg-cell-wrap">\t<div class="dg-main-content-inner-wrap">';a+=this.get_main_content();a+='\t\t<div class="dg-add-content-wrap">';a+=this.get_additional_content();a+="\t\t</div>";a+="\t</div>";return a+=
"</div>"};d.prototype.get_main_content=function(){void 0==this.parent.parent.id&&(this.parent.parent.id=Math.round(1E4*Math.random()));var a="",c="",b="";"lightbox"==this.O.click_action&&(a=' rel="lightbox['+this.parent.parent.id+']"');c="link"==this.O.click_action?this.content.link:this.content.src;!0==this.O.show_title_in_lightbox&&void 0!=this.content.title&&(b=' title="'+this.content.title+'"');return a=""+('\t\t<a href="'+c+'"'+a+'"'+b+' class="dg-lightbox-link"></a><img src="'+this.content.src+
'" class="dg-image">')};d.prototype.get_additional_content=function(){var a="";void 0!=this.content.title&&(a+='\t\t<div class="dg-image-title">'+this.content.title+"</div>");void 0!=this.content.description&&(a+='\t\t<div class="dg-image-description">'+this.content.description+"</div>");void 0!=this.content.link&&"link"==this.O.click_action&&(a+='\t\t<div class="dg-image-link"><a href="'+this.content.link+'"></a></div>');return a};d.prototype.init_content=function(){var a=this;this.width=this.O.width/
this.O.cols;a.img.removeAttr("style");this.scale_image(function(){a.center_image();a.add_content_classes()});this.mouse_events()};d.prototype.mouse_events=function(){this.root.on("mouseover",function(){b(this).addClass("dg-hover")});this.root.on("mouseout",function(c){a(c,b(this))||b(this).removeClass("dg-hover")})};d.prototype.scale_image=function(a){var c=new Image,b=this;c.onload=function(){b.origWidth=this.width;b.origHeight=this.height;if(b.O.scale_images){var c=Math.abs(b.origWidth-b.width),
d=Math.abs(b.origHeight-b.height);b.fullHeight=!1;b.fullWidth=!1;c<=d?(b.img.css({width:b.width}),b.fullWidth=!0,b.img.height()<b.height&&(b.img.css({height:b.height,width:"auto"}),b.fullWidth=!1)):(b.img.css({height:b.height}),b.fullHeight=!0,b.img.width()<b.width&&(b.img.css({width:b.width,height:"auto"}),b.fullHeight=!1));b.scaledImgWidth=b.img.width();b.scaledImgHeight=b.img.height()}else b.scaledImgWidth=b.origWidth,b.scaledImgHeight=b.origHeight;a()};c.src=b.content.src};d.prototype.center_image=
function(){this.O.center_images&&(this.fullWidth?this.img.css({position:"absolute","margin-top":-(this.scaledImgHeight-this.height)/2}):this.fullHeight?this.img.css({position:"absolute","margin-left":-(this.scaledImgWidth-this.width)/2}):this.img.css({position:"absolute","margin-left":-(this.scaledImgWidth-this.width)/2,"margin-top":-(this.scaledImgHeight-this.height)/2}))};d.prototype.add_content_classes=function(){var a=void 0;void 0==this.content.description&&(a="dg-title-mode");void 0==this.content.title&&
void 0==this.content.description&&(a="dg-no-content");void 0!=a&&this.root.addClass(a)};b.fn.dynamicGallery=function(a){O=b.extend(!0,{src:"",width:void 0,height:400,cols:3,min_rows:2,max_rows:3,random_heights:!0,padding:1,interval:2E3,speed:1E3,easing:"easeOutQuart",scale_images:!0,center_images:!0,click_action:"link",show_title_in_lightbox:!0,cb:""},a);return this.each(function(){var a=b(this);if(-1==O.src.search("xml")){var c=0,d,f,h,i=[];a.find(".dg-cell").each(function(){i[c]=[];i[c].src=b(this).find(".dg-cell-src").text();
i[c].title=void 0;i[c].description=void 0;i[c].link="#";d=b(this).find(".dg-cell-title").text();f=b(this).find(".dg-cell-description").text();h=b(this).find(".dg-cell-link").text();void 0!=d&&""!=d&&(i[c].title=d);void 0!=f&&""!=f&&(i[c].description=f);void 0!=h&&""!=h&&(i[c].link=h);c++});g=new e(a,O,i);g.init()}else{var n=O;b.ajax({type:"GET",url:n.src,dataType:"xml",success:function(c){xml=b(c);for(var c=xml.find("image"),d=c.length,f,h,k,j=0;j<d;j++)i[j]=[],i[j].src=b(c[j]).find("src").text(),
i[j].title=void 0,i[j].description=void 0,i[j].link="#",f=b(c[j]).find("title").text(),h=b(c[j]).find("description").text(),k=b(c[j]).find("link").text(),void 0!=f&&""!=f&&(i[j].title=f),void 0!=h&&""!=h&&(i[j].description=h),void 0!=k&&""!=k&&(i[j].link=k);g=new e(a,n,i);g.init()}})}})}})(jQuery);
(function(){var b,a;b=jQuery;a=function(){this.fileLoadingImage="wp-content/plugins/dynamic-grid-gallery/images/loading.gif";this.fileCloseImage="../wp-content/plugins/dynamic-grid-gallery/images/close.png";this.resizeDuration=700;this.fadeDuration=500;this.labelImage="Image";this.labelOf="of"};var e=function(a){this.options=a;this.album=[];this.currentImageIndex=void 0;this.init()};e.prototype.init=function(){this.enable();return this.build()};e.prototype.enable=function(){var a=this;return b("body").on("click",
"a[rel^=lightbox], area[rel^=lightbox]",function(d){a.start(b(d.currentTarget));return!1})};e.prototype.build=function(){var a,d=this;b("<div>",{id:"lightboxOverlay"}).after(b("<div/>",{id:"lightbox"}).append(b("<div/>",{"class":"lb-outerContainer"}).append(b("<div/>",{"class":"lb-container"}).append(b("<img/>",{"class":"lb-image"}),b("<div/>",{"class":"lb-nav"}).append(b("<a/>",{"class":"lb-prev"}),b("<a/>",{"class":"lb-next"})),b("<div/>",{"class":"lb-loader"}).append(b("<a/>",{"class":"lb-cancel"}).append(b("<img/>",
{src:this.options.fileLoadingImage}))))),b("<div/>",{"class":"lb-dataContainer"}).append(b("<div/>",{"class":"lb-data"}).append(b("<div/>",{"class":"lb-details"}).append(b("<span/>",{"class":"lb-caption"}),b("<span/>",{"class":"lb-number"})),b("<div/>",{"class":"lb-closeContainer"}).append(b("<a/>",{"class":"lb-close"}).append(b("<img/>",{src:this.options.fileCloseImage}))))))).appendTo(b("body"));b("#lightboxOverlay").hide().on("click",function(){d.end();return!1});a=b("#lightbox");a.hide().on("click",
function(a){"lightbox"===b(a.target).attr("id")&&d.end();return!1});a.find(".lb-outerContainer").on("click",function(a){"lightbox"===b(a.target).attr("id")&&d.end();return!1});a.find(".lb-prev").on("click",function(){d.changeImage(d.currentImageIndex-1);return!1});a.find(".lb-next").on("click",function(){d.changeImage(d.currentImageIndex+1);return!1});a.find(".lb-loader, .lb-close").on("click",function(){d.end();return!1})};e.prototype.start=function(a){var d,e,f,h,l;b(window).on("resize",this.sizeOverlay);
b("select, object, embed").css({visibility:"hidden"});b("#lightboxOverlay").width(b(document).width()).height(b(document).height()).fadeIn(this.options.fadeDuration);this.album=[];f=0;if("lightbox"===a.attr("rel"))this.album.push({link:a.attr("href"),title:a.attr("title")});else{l=b(a.prop("tagName")+'[rel="'+a.attr("rel")+'"]');e=0;for(h=l.length;e<h;e++)d=l[e],this.album.push({link:b(d).attr("href"),title:b(d).attr("title")}),b(d).attr("href")===a.attr("href")&&(f=e)}d=b(window);a=d.scrollTop()+
d.height()/10;d=d.scrollLeft();b("#lightbox").css({top:a+"px",left:d+"px"}).fadeIn(this.options.fadeDuration);this.changeImage(f)};e.prototype.changeImage=function(a){var d,e,f,h=this;this.disableKeyboardNav();e=b("#lightbox");d=e.find(".lb-image");this.sizeOverlay();b("#lightboxOverlay").fadeIn(this.options.fadeDuration);b(".loader").fadeIn("slow");e.find(".lb-image, .lb-nav, .lb-prev, .lb-next, .lb-dataContainer, .lb-numbers, .lb-caption").hide();e.find(".lb-outerContainer").addClass("animating");
f=new Image;f.onload=function(){d.attr("src",h.album[a].link);d.width=f.width;d.height=f.height;return h.sizeContainer(f.width,f.height)};f.src=this.album[a].link;this.currentImageIndex=a};e.prototype.sizeOverlay=function(){return b("#lightboxOverlay").width(b(document).width()).height(b(document).height())};e.prototype.sizeContainer=function(a,d){var e,f,h,l,p,q,k,m,i,n,r=this;f=b("#lightbox");h=f.find(".lb-outerContainer");n=h.outerWidth();i=h.outerHeight();e=f.find(".lb-container");q=parseInt(e.css("padding-top"),
10);p=parseInt(e.css("padding-right"),10);l=parseInt(e.css("padding-bottom"),10);e=parseInt(e.css("padding-left"),10);m=a+e+p;k=d+q+l;m!==n&&k!==i?h.animate({width:m,height:k},this.options.resizeDuration,"swing"):m!==n?h.animate({width:m},this.options.resizeDuration,"swing"):k!==i&&h.animate({height:k},this.options.resizeDuration,"swing");setTimeout(function(){f.find(".lb-dataContainer").width(m);f.find(".lb-prevLink").height(k);f.find(".lb-nextLink").height(k);r.showImage()},this.options.resizeDuration)};
e.prototype.showImage=function(){var a;a=b("#lightbox");a.find(".lb-loader").hide();a.find(".lb-image").fadeIn("slow");this.updateNav();this.updateDetails();this.preloadNeighboringImages();this.enableKeyboardNav()};e.prototype.updateNav=function(){var a;a=b("#lightbox");a.find(".lb-nav").show();0<this.currentImageIndex&&a.find(".lb-prev").show();this.currentImageIndex<this.album.length-1&&a.find(".lb-next").show()};e.prototype.updateDetails=function(){var a,d=this;a=b("#lightbox");"undefined"!==typeof this.album[this.currentImageIndex].title&&
""!==this.album[this.currentImageIndex].title&&a.find(".lb-caption").html(this.album[this.currentImageIndex].title).fadeIn("fast");1<this.album.length?a.find(".lb-number").html(this.options.labelImage+" "+(this.currentImageIndex+1)+" "+this.options.labelOf+"  "+this.album.length).fadeIn("fast"):a.find(".lb-number").hide();a.find(".lb-outerContainer").removeClass("animating");a.find(".lb-dataContainer").fadeIn(this.resizeDuration,function(){return d.sizeOverlay()})};e.prototype.preloadNeighboringImages=
function(){var a;this.album.length>this.currentImageIndex+1&&(a=new Image,a.src=this.album[this.currentImageIndex+1].link);0<this.currentImageIndex&&(a=new Image,a.src=this.album[this.currentImageIndex-1].link)};e.prototype.enableKeyboardNav=function(){b(document).on("keyup.keyboard",b.proxy(this.keyboardAction,this))};e.prototype.disableKeyboardNav=function(){b(document).off(".keyboard")};e.prototype.keyboardAction=function(a){var b;b=a.keyCode;a=String.fromCharCode(b).toLowerCase();27===b||a.match(/x|o|c/)?
this.end():"p"===a||37===b?0!==this.currentImageIndex&&this.changeImage(this.currentImageIndex-1):("n"===a||39===b)&&this.currentImageIndex!==this.album.length-1&&this.changeImage(this.currentImageIndex+1)};e.prototype.end=function(){this.disableKeyboardNav();b(window).off("resize",this.sizeOverlay);b("#lightbox").fadeOut(this.options.fadeDuration);b("#lightboxOverlay").fadeOut(this.options.fadeDuration);return b("select, object, embed").css({visibility:"visible"})};b(function(){var b;b=new a;return new e(b)})}).call(this);
jQuery.easing.jswing=jQuery.easing.swing;
jQuery.extend(jQuery.easing,{def:"easeOutQuad",swing:function(b,a,e,c,d){return jQuery.easing[jQuery.easing.def](b,a,e,c,d)},easeInQuad:function(b,a,e,c,d){return c*(a/=d)*a+e},easeOutQuad:function(b,a,e,c,d){return-c*(a/=d)*(a-2)+e},easeInOutQuad:function(b,a,e,c,d){return 1>(a/=d/2)?c/2*a*a+e:-c/2*(--a*(a-2)-1)+e},easeInCubic:function(b,a,e,c,d){return c*(a/=d)*a*a+e},easeOutCubic:function(b,a,e,c,d){return c*((a=a/d-1)*a*a+1)+e},easeInOutCubic:function(b,a,e,c,d){return 1>(a/=d/2)?c/2*a*a*a+e:
c/2*((a-=2)*a*a+2)+e},easeInQuart:function(b,a,e,c,d){return c*(a/=d)*a*a*a+e},easeOutQuart:function(b,a,e,c,d){return-c*((a=a/d-1)*a*a*a-1)+e},easeInOutQuart:function(b,a,e,c,d){return 1>(a/=d/2)?c/2*a*a*a*a+e:-c/2*((a-=2)*a*a*a-2)+e},easeInQuint:function(b,a,e,c,d){return c*(a/=d)*a*a*a*a+e},easeOutQuint:function(b,a,e,c,d){return c*((a=a/d-1)*a*a*a*a+1)+e},easeInOutQuint:function(b,a,e,c,d){return 1>(a/=d/2)?c/2*a*a*a*a*a+e:c/2*((a-=2)*a*a*a*a+2)+e},easeInSine:function(b,a,e,c,d){return-c*Math.cos(a/
d*(Math.PI/2))+c+e},easeOutSine:function(b,a,e,c,d){return c*Math.sin(a/d*(Math.PI/2))+e},easeInOutSine:function(b,a,e,c,d){return-c/2*(Math.cos(Math.PI*a/d)-1)+e},easeInExpo:function(b,a,e,c,d){return 0==a?e:c*Math.pow(2,10*(a/d-1))+e},easeOutExpo:function(b,a,e,c,d){return a==d?e+c:c*(-Math.pow(2,-10*a/d)+1)+e},easeInOutExpo:function(b,a,e,c,d){return 0==a?e:a==d?e+c:1>(a/=d/2)?c/2*Math.pow(2,10*(a-1))+e:c/2*(-Math.pow(2,-10*--a)+2)+e},easeInCirc:function(b,a,e,c,d){return-c*(Math.sqrt(1-(a/=d)*
a)-1)+e},easeOutCirc:function(b,a,e,c,d){return c*Math.sqrt(1-(a=a/d-1)*a)+e},easeInOutCirc:function(b,a,e,c,d){return 1>(a/=d/2)?-c/2*(Math.sqrt(1-a*a)-1)+e:c/2*(Math.sqrt(1-(a-=2)*a)+1)+e},easeInElastic:function(b,a,e,c,d){var b=1.70158,g=0,f=c;if(0==a)return e;if(1==(a/=d))return e+c;g||(g=0.3*d);f<Math.abs(c)?(f=c,b=g/4):b=g/(2*Math.PI)*Math.asin(c/f);return-(f*Math.pow(2,10*(a-=1))*Math.sin(2*(a*d-b)*Math.PI/g))+e},easeOutElastic:function(b,a,e,c,d){var b=1.70158,g=0,f=c;if(0==a)return e;if(1==
(a/=d))return e+c;g||(g=0.3*d);f<Math.abs(c)?(f=c,b=g/4):b=g/(2*Math.PI)*Math.asin(c/f);return f*Math.pow(2,-10*a)*Math.sin(2*(a*d-b)*Math.PI/g)+c+e},easeInOutElastic:function(b,a,e,c,d){var b=1.70158,g=0,f=c;if(0==a)return e;if(2==(a/=d/2))return e+c;g||(g=1.5*0.3*d);f<Math.abs(c)?(f=c,b=g/4):b=g/(2*Math.PI)*Math.asin(c/f);return 1>a?-0.5*f*Math.pow(2,10*(a-=1))*Math.sin(2*(a*d-b)*Math.PI/g)+e:0.5*f*Math.pow(2,-10*(a-=1))*Math.sin(2*(a*d-b)*Math.PI/g)+c+e},easeInBack:function(b,a,e,c,d,g){void 0==
g&&(g=1.70158);return c*(a/=d)*a*((g+1)*a-g)+e},easeOutBack:function(b,a,e,c,d,g){void 0==g&&(g=1.70158);return c*((a=a/d-1)*a*((g+1)*a+g)+1)+e},easeInOutBack:function(b,a,e,c,d,g){void 0==g&&(g=1.70158);return 1>(a/=d/2)?c/2*a*a*(((g*=1.525)+1)*a-g)+e:c/2*((a-=2)*a*(((g*=1.525)+1)*a+g)+2)+e},easeInBounce:function(b,a,e,c,d){return c-jQuery.easing.easeOutBounce(b,d-a,0,c,d)+e},easeOutBounce:function(b,a,e,c,d){return(a/=d)<1/2.75?7.5625*c*a*a+e:a<2/2.75?c*(7.5625*(a-=1.5/2.75)*a+0.75)+e:a<2.5/2.75?
c*(7.5625*(a-=2.25/2.75)*a+0.9375)+e:c*(7.5625*(a-=2.625/2.75)*a+0.984375)+e},easeInOutBounce:function(b,a,e,c,d){return a<d/2?0.5*jQuery.easing.easeInBounce(b,2*a,0,c,d)+e:0.5*jQuery.easing.easeOutBounce(b,2*a-d,0,c,d)+0.5*c+e}});