jQuery(document).ready(function(){

    'use strict';
    function search(){
        if(!$("input[name=search-input]").val().trim(" ").length){
            return false;
        }
        window.location.replace('/search/'+$("input[name=search-input]").val());
    }
    $(document).on("click",'.search-submit',function(){
        console.log("clicked");
        search();
    });
    $(document).on('keyup','input[name=search-input]',function(e){
        if (e.keyCode==13){
            console.log("entered");
            search();
        }
    });
    var nextpage=2;
    $(".search_showmore").click(function(){
        axios.post('continue',{"key":$(this).data('key'),'page':nextpage}).then(function(d){
            jQuery(".show-more-btn").show();
            jQuery(".show-more-btn").next().hide();
            if (!d.data.error){
                $(".list_searchresults").append(d.data);
                nextpage++;
            }else{
                $(".search_showmore").remove();
            }
        }).catch(()=>show_error('Bir hata oluştu'));
    });
   function show_error(message){
       $("#error-message .error-text").text(message);
       $("#error-message").addClass('visible');
       setTimeout(function (){
           $("#error-message").removeClass('visible');
       },2000);
   }
   function show_success(message){
       $.arcticmodal('close');
       $("#modal-success .success_text").text(message);
       $("#modal-success").arcticmodal({
           openEffect:{speed:150},
           beforeOpen: function(data, el) {
               jQuery("body").addClass("locked");
               jQuery("body").addClass("margin-fix");
           },
           afterOpen: function(data, el) {
               popupFunction();

           },
           afterClose: function(data, el) {
               popupCloseFunction();
               jQuery("body").removeAttr("style");
               jQuery("body").removeClass("locked");
               jQuery("body").removeClass("margin-fix");
           }
       });
   }
    //user agent
    if (navigator.userAgent.search("Chrome") >= 0) {
        jQuery("body").addClass("chrome-browser");
    }
    else if (navigator.userAgent.search("Firefox") >= 0) {
        var firefoxBrowser = true;
        jQuery("body").addClass("firefox-browser");
    }
    else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
        var safariBrowser = true;
        jQuery("body").addClass("safari-browser");
    }
    else if (navigator.userAgent.search("Opera") >= 0) {
        jQuery("body").addClass("opera-browser");
    }
    //user agent
    $("#login_form").submit(function (e){
        e.preventDefault();
        $("#login_form button").addClass('load');
        $("#login_form button").attr("disabled",true);
        loginaxios($(this).serialize());
    });
    $("#register_form").submit(function (e){
        e.preventDefault();
        $("#register_form button[type=submit]").addClass('load');
        $("#register_form button[type=submit]").attr("disabled",true);
        registeraxios($(this).serialize());
    });
    function registeraxios(data){
        axios.post('/register',data).then(function (){
            $("#register_form button[type=submit]").removeClass('load');
            $("#register_form button[type=submit]").text("Kayıt Yapıldı");
            setTimeout(function(){
                $.arcticmodal('close');
                $("#register_form input,#register_form textarea").val("");
                jQuery("#modal-login").arcticmodal({
                    openEffect:{speed:150},
                    beforeOpen: function(data, el) {
                        jQuery("body").addClass("locked");
                        jQuery("body").addClass("margin-fix");
                    },
                    afterOpen: function(data, el) {
                        popupFunction();

                    },
                    afterClose: function(data, el) {
                        popupCloseFunction();
                        jQuery("body").removeAttr("style");
                        jQuery("body").removeClass("locked");
                        jQuery("body").removeClass("margin-fix");
                    }
                });
            },1700);
        }).catch(function (e,v){
            $("#register_form button").removeClass('load');
            console.log(e.response.status);
            if (e.response.status==403)
            $("#error-message .error-text").text("Email Kullanımda");
            else
                $("#error-message .error-text").text("Bir Hata Oluştu");
            jQuery("#error-message").addClass("visible");

            setTimeout(function() {
                jQuery("#error-message").removeClass("visible");
                $("#register_form button").attr("disabled",false);
            }, 2000);
        });
    }
    function loginaxios(data){
        axios.post('/login',data).then(function (){
            $("#login_form button").removeClass('load');
            $("#login_form button").text("Giriş Yapıldı");
            window.location.reload();
        }).catch(function (e){
            $("#login_form button").removeClass('load');
            $("#error-message .error-text").text("Giriş Yapılamadı");
            jQuery("#error-message").addClass("visible");

            setTimeout(function() {
                jQuery("#error-message").removeClass("visible");
                $("#login_form button").attr("disabled",false);
            }, 2000);
        });
    }
    var homepage_panelindex=0;
    var homepage_panelcount=$(".panels_homepage").children().length;

    $(".home_content_indexer_next").click(function(){
        $(".panels_homepage").children().eq(homepage_panelindex).fadeOut(180);
        if(homepage_panelindex==homepage_panelcount-1){
            $(".panels_homepage").children().eq(0).fadeIn(180);
            homepage_panelindex=0;
        }else{
            $(".panels_homepage").children().eq(homepage_panelindex+1).fadeIn(180);
            homepage_panelindex++;
        }
    console.log(homepage_panelindex);
    });
    $(".home_content_indexer_prev").click(function(){
        console.log(homepage_panelindex);
        $(".panels_homepage").children().eq(homepage_panelindex).fadeOut(180);
        if(homepage_panelindex>0){
            $(".panels_homepage").children().eq(homepage_panelindex-1).fadeIn(180);
            homepage_panelindex--;
        }
        else{
            $(".panels_homepage").children().eq(homepage_panelcount-1).fadeIn(180);
            homepage_panelindex=homepage_panelcount-1;
        }


    });
    var reported=false;
    $(".download_button").click(function(){

    });

    $(".report_content-form").submit(function(e){
        e.preventDefault();
        if (!reported){
            axios.post('report',$(this).serialize()).then((e)=>{
                if (e.data.error){
                    show_error(e.data.message);
                    reported=true;
                }else{
                    show_success('Raporunuz başarıyla gönderildi, Geri bildiriminiz için teşekkür ederiz.');
                    reported=true;
                }
            }).catch(()=>{show_error('Bir Hata Oluştu')});
        }else show_error('İşlem reddedildi');
    });
    $(".change_pw-form").submit(function(e){
        e.preventDefault();
        if($(".change_pw-form input[name=new_pw]").val()!=$(".change_pw-form input[name=new_pw_r]").val()){show_error("Yeni şifreler birbiri ile uyumsuz");}
        else{
            axios.post('changepassword',$(this).serialize()).then((e)=>{
                if (e.data.error){
                    show_error(e.data.message);
                }else{
                    show_success('Şifreniz başarıyla güncellendi');
                }
            });
        }

    });
    $("#change_profile-userpic").change(()=>$("#c_avatar-form").submit());
    $("#category-slider_profilepage a").click(function(e){
        e.preventDefault();
        var index=$(this).data('tab_name');
        $(".profile-tabs .tab-item").fadeOut(150);
        $(".profile-tabs .tab-item[data-tab_name="+index+"]").fadeIn(100);
        $("#category-slider_profilepage a").removeClass('selected');
        $(this).addClass('selected');
        window.location.replace('/my/profile#'+index);

    });
    $(".reply_support_ticket").click(function(){$(".reply_supportticket input[name=reply_id]").val($(this).data('id'));});
    $(".reply_supportticket").submit(function(e){
        e.preventDefault();
        axios.post('support_ticket',$(this).serialize()).then((d)=>{
           if (d.data.error)show_error(d.data.message);
           else {show_success('Yanıtınız Gönderildi.');setTimeout(()=>{window.location.reload();},1200);}
        }).catch(()=>show_error('Bir hata oluştu'));
    });
    $(".new_supportticket").submit(function(e){
        e.preventDefault();
        axios.post('support_ticket',$(this).serialize()).then((d)=>{
            if (d.data.error)show_error(d.data.message);
            else {show_success('Destek biletiniz Gönderildi.');setTimeout(()=>{window.location.reload();},1200);}
        });
    });
   function profile_tabs(){
       if(window.location.pathname=='/my/profile'){
           var link= window.location.href;
           link = link.split('#');

           if(Object.values(link).length>1&&link[Object.values(link).length-1]!=""){
               var tab = link[Object.values(link).length-1];

               $("#category-slider_profilepage a").removeClass('selected');
               $("#category-slider_profilepage a[data-tab_name="+tab+"]").addClass('selected');
               var btn = $("#category-slider_profilepage a[data-tab_name="+tab+"]");


               $(".profile-tabs .tab-item").fadeOut(150);
               $(".profile-tabs .tab-item[data-tab_name="+tab+"]").fadeIn(100);
           }

       }
   }
   profile_tabs();
   $(document).on("click",'.nav-profile_pagelinks',function(e){
       profile_tabs();
   });
    $(".js_delete-favorite").click(function (e){
        e.preventDefault();
        axios.post('/content/fav',{"id":$(this).data('id')}).then((x)=>{
            window.location.reload();
        }).catch(()=>show_error('Bir hata oluştu'));
    });
    $("#c_avatar-form").submit(function(e){
        e.preventDefault();
        var data = new FormData(this);
        axios.post('update_avatar',data).then((d)=>{
            if(d.data.error)show_error(d.data.message);
            else {show_success('Avatarınız Başarıyla Güncellendi');setTimeout(()=>{window.location.reload()},600);}
        }).catch(()=>show_error('Bir hata oluştu'));
    });
    $(".update_profile_form").submit(function (e) {
        e.preventDefault();
        axios.post('update',$(this).serialize()).then((d)=>{
            if(d.data.error)show_error(d.data.message);
            else show_success('Profiliniz Başarıyla Güncellendi');
        }).catch(()=>show_error('Bir Hata Oluştu'));
    });
    //overflow: hidden fix for ios
    function popupFunction(){
        if( device.ios()) {
            var scrollTop = jQuery(window).scrollTop();
            var windowH = jQuery(window).innerHeight();

            jQuery("body").addClass("pop-up-open");
            jQuery("body").css({
                "top": "-" + scrollTop + "px"
            });
        }
    }

    function popupCloseFunction(){
        if(device.ios()) {
            var scTop = jQuery("body").css("top");
            var suffix = scTop.match(/\d+/); // 123456
            jQuery("body").removeClass("pop-up-open");
            jQuery("body").removeAttr("style");
            jQuery("html, body").scrollTop(parseInt(suffix));
        }
    }
    //overflow: hidden fix for ios



    //sticky share block on single page
    if (jQuery(".share-block").length) {

        jQuery("body").addClass("with-share-block");

        var linksCount = jQuery(".share-block .soc-link").length;

        if (linksCount > 3) {
            jQuery(".share-block .show-more-socials").show();
            jQuery(".share-block .soc-link").eq(1).nextAll().not(".show-more-socials").wrapAll("<div class='socials-hidden'>");
        } else {
            jQuery(".share-block").addClass("few");
        }


        jQuery(".share-block .show-more-socials").on("click", function(){
            jQuery(".share-block .socials-hidden").slideToggle();
        });

        jQuery(".share-block .soc-link .soc-icon").on({
            mouseenter: function () {
                jQuery(this).parents(".soc-link").addClass("hover");
            },
            mouseleave: function () {
                jQuery(this).parents(".soc-link").removeClass("hover");
            }
        });

        jQuery(".js-mobile-share-show").on("click", function(){
            jQuery(".share-block-main").slideToggle();
            jQuery(".share-block").toggleClass("opened");
        });
    }

    jQuery(document).mouseup(function (e){
        var div = jQuery(".share-block");
        if (jQuery(".share-block").hasClass("opened") && !div.is(e.target)
            && div.has(e.target).length === 0) {
                jQuery(".share-block-main").slideUp();
        }
    });
    //sticky share block on single page



    //Anchor link
    jQuery(".js-anchor").on("click",function(e){
        e.preventDefault();
        var thisHref = jQuery(this).attr("data-href");
        var plansOffset=jQuery(thisHref).offset().top;
        jQuery("html, body").animate({
            scrollTop:plansOffset
        },500);
    });
    //Anchor link



    //fix css transition onload
    setTimeout(function(){
        jQuery("body").removeClass("transition-none");
    }, 200);
    //fix css transition onload



    //get scrollbar width
    function scrollbarWidth() {
        var block = jQuery('<div>').css({'height':'50px','width':'50px'}),
            indicator = jQuery('<div>').css({'height':'200px'});

        jQuery('body').append(block.append(indicator));
        var w1 = jQuery('div', block).innerWidth();
        block.css('overflow-y', 'scroll');
        var w2 = jQuery('div', block).innerWidth();
        jQuery(block).remove();
        return (w1 - w2);
    }

    if (scrollbarWidth() !== 0) {
        jQuery("head").append('<style>'+
            '.superwide {width: calc(100vw - '+scrollbarWidth()+'px)}' +
             '@media screen and (max-width: 1000px) {.wide {width: calc(100vw - '+scrollbarWidth()+'px) !important}}'+
             '.margin-fix {margin-right: '+scrollbarWidth()+'px;}');

        if (!jQuery(".page-wrap-sidebar").length) {
            jQuery("head").append('<style>'+
            '@media screen and (min-width: 1001px) {body.locked .share-block {transform: translateX(-'+(825+(scrollbarWidth()/2))+'px)}}'+
             '@media screen and (max-width: 1700px) and (min-width: 1001px) {body.locked .share-block {transform: translateX(-'+(600+(scrollbarWidth()/2))+'px)}'+
             '@media screen and (max-width: 1230px) and (min-width: 1001px) {body.locked .share-block {transform: translateX(-'+(480+(scrollbarWidth()/2))+'px)}'+
       '</style>');
        }
    }
    //get scrollbar width




    //input placeholder function
    jQuery("input.input[placeholder], textarea.input[placeholder]").each(function() {
        var thisInput = jQuery(this);

        if (thisInput.val() !== "") {
            thisInput.parent().addClass("active");
            thisInput.prev("label").addClass("active");
        }
    });

    jQuery('input.input[placeholder], textarea.input[placeholder]').placeholderLabel();
    //input placeholder function



    //search section
	var pageContainer = jQuery('.page'),
		openCtrl = jQuery('.search-button'),
		closeCtrl = jQuery('#search-close'),
		searchContainer = jQuery('.search-section'),
		inputSearch = jQuery('.search-section .search-input');

	function init() {
		initEvents();
	}

	function initEvents() {
		openCtrl.on('click', openSearch);
		closeCtrl.on('click', closeSearch);
		jQuery('html').on('keyup', function(ev) {
			// escape key.
			if( ev.keyCode == 27 ) {
				closeSearch();
			}
		});
	}

	function openSearch() {
        var currentScrollPosition = jQuery(window).scrollTop();
        jQuery("body").attr("data-scroll", currentScrollPosition);
        jQuery("html, body").scrollTop(0);
        var windowHeight = jQuery(window).innerHeight();
        jQuery(".container-wrap").height(windowHeight);
		pageContainer.addClass('page--move');
		searchContainer.addClass('search--open');
		inputSearch.focus();
        jQuery("html, body").addClass("locked");
        jQuery("body").addClass("margin-fix");
        popupFunction();
	}

	function closeSearch() {
		pageContainer.removeClass('page--move');
		searchContainer.removeClass('search--open');
		inputSearch.blur();
		inputSearch.value = '';
        jQuery("html, body").removeClass("locked");
        jQuery(".container-wrap").removeAttr("style");
        jQuery("body").removeClass("margin-fix");
        popupCloseFunction();
        jQuery("html, body").scrollTop(+jQuery("body").attr("data-scroll"));
	}

	init();
    //search section



    //mobile menu functions
    var menu = jQuery("#js-panel"),
       overlay = jQuery("#overlay");

    function openMenu() {
        menu.addClass("opened");
        overlay.fadeIn();
        jQuery("html, body").addClass("locked");
        popupFunction();
	}

    function closeMenu() {
        menu.removeClass("opened");
        overlay.fadeOut();
        jQuery("html, body").removeClass("locked");
        popupCloseFunction();
	}

    jQuery("#js-menu-open").on("click", function(){
       openMenu();
    });

    jQuery("#js-menu-close, #overlay").on("click", function(){
       closeMenu();
    });
    //mobile menu functions



    //dropdown menu
    jQuery("#js-menu li").each(function(){
       var thisLi = jQuery(this),
           thisChildrenUl = thisLi.children("ul");

        if (thisChildrenUl.length) {
            thisLi.addClass("dropdown-li");
        }
    });

    var firstLevelMenu = jQuery("#js-menu > ul > li > ul"),
        secondLevelMenu = jQuery("#js-menu > ul > li > ul > li > ul");

    if (firstLevelMenu.length) {
        firstLevelMenu.addClass("first-level-menu");
    }

    if (secondLevelMenu.length) {
        secondLevelMenu.addClass("second-level-menu");
    }

    jQuery("li.dropdown-li > a").on("click", function(e){
        e.preventDefault();

        if (window.innerWidth <= 1000) {
            var thisA = jQuery(this),
               thisLi = thisA.parent("li"),
               thisMenu = thisA.next("ul");

            thisA.toggleClass("opened");
            thisMenu.slideToggle();
        }
    })

    jQuery(document).mouseup(function (e){
        if (device.tablet() && !firstLevelMenu.is(e.target) && !secondLevelMenu.is(e.target)) { // и не по его дочерним элементам
                jQuery("li.dropdown-li a").removeClass("opened");
                jQuery("li.dropdown-li ul").slideUp();
        }
    });

    jQuery("#js-menu > ul > li.dropdown-li, .first-level-menu > li.dropdown-li").on({
        mouseenter: function () {

            if (window.innerWidth > 1000) {
                var thisLi = jQuery(this),
                   thisA = thisLi.children("a"),
                   thisMenu = thisLi.children("ul");

                thisMenu.stop( true, true ).fadeIn(120);
                thisA.addClass("hover");
            }
        },
        mouseleave: function () {

            if (window.innerWidth > 1000) {
                var thisLi = jQuery(this),
                   thisA = thisLi.children("a"),
                   thisMenu = thisLi.children("ul");

                    thisMenu.stop( true, true ).fadeOut(120);
                  thisA.removeClass("hover");
            }
        }
    });

    jQuery(".second-level-menu li.dropdown-li > a").on("click", function(e){
        e.preventDefault();

        if (window.innerWidth > 1000) {
            var thisA = jQuery(this),
                thisLi = thisA.parent("li"),
                thisMenu = thisLi.children("ul");

            thisA.toggleClass("hover");
            thisA.toggleClass("opened");
            thisMenu.slideToggle();
        }
    });
    //dropdown menu



    //Slider "other posts"
    if (jQuery("#js-other-posts-slider").length) {

        jQuery('#js-other-posts-slider').slick({
            arrows: true,
            dots: false,
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: true,
            fade: false,
            focusOnSelect: false,
            swipe: true,
                    touchMove: false,
                    draggable: false,
            autoplay: false,
            variableWidth: true,
            centerMode: false,
            speed: 300,
            prevArrow: jQuery('.other-posts-section .arrow.prev'),
            nextArrow: jQuery('.other-posts-section .arrow.next'),
            responsive: [
            {
              breakpoint: 1024,
              settings: {
                  swipe: true,
                    touchMove: false,
                    draggable: false
              }
            }
          ]
        });
    }
    //Slider "other posts"



    //Slider "feathure posts"
    if (jQuery("#js-feathure-posts-slider").length) {

        jQuery('#js-feathure-posts-slider').slick({
            arrows: true,
            dots: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            fade: false,
            focusOnSelect: false,
            swipe: true,
            touchMove: false,
            draggable: false,
            autoplay: false,
            variableWidth: false,
            centerMode: false,
            speed: 300,
            responsive: [
            {
              breakpoint: 1024,
              settings: {
                  swipe: true,
                    touchMove: false,
                    draggable: false
              }
            }
          ]
        });
    }
    //Slider "feathure posts"



    //simple sliders
    if (jQuery(".slider").length) {

        jQuery('.slider').each(function(key, item) {

          var sliderIdName = 'slider' + key;
          this.id = sliderIdName;
          var sliderId = '#' + sliderIdName;

            var thisSlideCount = jQuery(sliderId + " .slider-block-item").length,
                thisTotalValue = jQuery(sliderId).next(".count").children(".total-val");

            thisTotalValue.text(thisSlideCount);

            jQuery(sliderId).slick({
                arrows: true,
                dots: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                fade: false,
                focusOnSelect: false,
                swipe: true,
                touchMove: false,
                draggable: false,
                autoplay: false,
                variableWidth: false,
                centerMode: false,
                speed: 300
            });

        });

        jQuery('.slider').on('beforeChange', function(event,
         slick, currentSlide, nextSlide){
            var nextSlideIndex = jQuery(slick.$slides[nextSlide]).attr("data-slick-index");
            jQuery(this).next().children(".current-val").text(+nextSlideIndex+1);
        });
    }
    //simple sliders



    //accordion opening function
    jQuery(".accordion-item .accordion-item-title").on("click", function(){
        var thisItem = jQuery(this).parent(),
            thisContent = jQuery(this).next();

        thisItem.toggleClass("opened");
        thisContent.slideToggle();
    });
    //accordion opening function



    //Play btn
    jQuery(".js-video-play-btn").on("click", function(){
        var thisBtn = jQuery(this),
            thisVideo = thisBtn.next("video");

        thisBtn.hide();
        thisVideo.get(0).play();
        thisVideo.prop("controls", true);
    });
    //Play btn/



    //Lightgallery function
    if (jQuery(".lightgallery-on").length) {
        jQuery(".lightgallery-on").each(function(){
           var thisGallery = jQuery(this),
               galleryImage = thisGallery.find("img");


            thisGallery.addClass("lightgallery");
        });

        jQuery(".lightgallery").each(function(){
            var childrenElement = jQuery(this).children();


            childrenElement.each(function(){
                var thisImgSrc = jQuery(this).find("img").attr("src");
                jQuery(this).attr("href", thisImgSrc);
            });


        })
    }

    jQuery('.lightgallery').lightGallery({
        counter: false,
        enableDrag: false,
        enableSwipe: true,
        mousewheel: false,
        speed: 200
    });


    jQuery('.lightgallery').on('onBeforeOpen.lg',function(event){
        jQuery("html, body").addClass("locked");
        jQuery("body").addClass("margin-fix");
    });

    jQuery('.lightgallery').on('onCloseAfter.lg',function(event){
        jQuery("html, body").removeClass("locked");
        jQuery("body").removeClass("margin-fix");
    });
    //Lightgallery function



    //sidebar wrapper
    if (jQuery(".sidebar").length) {
        var sidebarItemCount = jQuery(".sidebar-item").length;

        if (sidebarItemCount % 2 == 0)
            var sidebar1count = sidebarItemCount / 2;
            var sidebar2count = sidebarItemCount / 2;
        if (sidebarItemCount % 2 == 1)
            var sidebar1count = (sidebarItemCount / 2).toFixed(0);
            var sidebar2count = sidebarItemCount - sidebar1count;


        jQuery( ".sidebar-item:lt("+sidebar1count+")" ).wrapAll("<div class='sidebar-part'>");
        jQuery(".sidebar-part").nextAll().wrapAll("<div class='sidebar-part'>");
    }

    if (jQuery(".see-also-items").length) {
        var itemsCount = jQuery(".see-also-items").length;

        if (itemsCount % 2 == 0)
            jQuery(".see-also-items").addClass("even-count")
        if (itemsCount % 2 == 1)
            jQuery(".see-also-items").addClass("odd-count")
    }
    //sidebar wrapper



    //sidebar ul links with counter
    if (jQuery(".widget_categories").length) {

        jQuery(".widget_categories select").parents(".widget_categories").addClass("with-select");
        jQuery(".widget_categories ul").parents(".widget_categories").addClass("with-ul");

        var widget_Categories_Html = jQuery(".widget_categories.with-ul").html();

        var replaceWidget = widget_Categories_Html.replaceAll("(", "<span class='count'>").replaceAll(")", "</span>");
        jQuery(".widget_categories.with-ul").html(replaceWidget);

        if (jQuery(".widget_categories.with-ul .cat-item .count").length) {
            jQuery(".widget_categories.with-ul").addClass("with-count");

            jQuery(".widget_categories.with-ul .cat-item").each(function(){
                var thisItem = jQuery(this),
                    thisCount = thisItem.children(".count").text();
                thisItem.children("a").append("<span class='count'>"+thisCount+"</span>");
                thisItem.children(".count").remove();
            });
        }
    }
    //sidebar ul links with counter


    //sidebar ul links with counter
    if (jQuery(".widget_archive").length) {

        jQuery(".widget_archive select").parents(".widget_archive").addClass("with-select");
        jQuery(".widget_archive ul").parents(".widget_archive").addClass("with-ul");

        var widget_Archive_Html = jQuery(".widget_archive.with-ul").html();

        var replaceWidget = widget_Archive_Html.replaceAll("</a>(", "</a><span class='count'>").replaceAll(")</li>", "</span></li>");
        jQuery(".widget_archive.with-ul").html(replaceWidget);

        if (jQuery(".widget_archive.with-ul li .count").length) {
            jQuery(".widget_archive.with-ul").addClass("with-count");

            jQuery(".widget_archive.with-ul li").each(function(){
                var thisItem = jQuery(this),
                    thisCount = thisItem.children(".count").text();
                thisItem.children("a").append("<span class='count'>"+thisCount+"</span>");
                thisItem.children(".count").remove();
            });
        }
    }
    //sidebar ul links with counter



    //include content styles for html widget
    if (jQuery(".widget_custom_html").length) {
        jQuery(".widget_custom_html").addClass("wp-content");
    }
    //include content styles for html widget



    //processing SVG images
    var siteProtocol = document.location.protocol;

    if (jQuery("img.img-svg").length && siteProtocol == 'http:' || siteProtocol == 'https:') {
        jQuery('img.img-svg').each(function(){
          var $img = jQuery(this);
          var imgClass = $img.attr('class');
          var imgURL = $img.attr('src');
          $.get(imgURL, function(data) {
            var $svg = jQuery(data).find('svg');
            if(typeof imgClass !== 'undefined') {
              $svg = $svg.attr('class', imgClass+' replaced-svg');
            }
            $svg = $svg.removeAttr('xmlns:a');
            if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
              $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
            }
            $img.replaceWith($svg);
          }, 'xml');
        });
    }
    //processing SVG images




    //hide/show password functions
    function show() {
        var input = jQuery(".input.password-input");
        jQuery(".show-password-btn").addClass("visible-status");
        jQuery(".show-password-btn").parent().addClass("visible");
        input.attr('type', 'text');
    }

    function hide() {
        var input = jQuery(".input.password-input");
        jQuery(".show-password-btn").removeClass("visible-status");
        jQuery(".show-password-btn").parent().removeClass("visible");
        input.attr('type', 'password');
    }

    var pwShown = 0;


    jQuery(".show-password-btn").on("click", function(e){
        e.preventDefault();

        if (pwShown == 0) {
            pwShown = 1;
            show();
        } else {
            pwShown = 0;
            hide();
        }
    });
    //hide/show password functions



    //modal window opening
    jQuery('.getModal').on('click', function(e){
        e.preventDefault();
        var thisLink = jQuery(this);
        var target_modal = jQuery(this).attr("data-href");

        $(target_modal).arcticmodal({
            openEffect:{speed:150},
            beforeOpen: function(data, el) {
                jQuery("body").addClass("locked");
                jQuery("body").addClass("margin-fix");
            },
            afterOpen: function(data, el) {
                popupFunction();

            },
            afterClose: function(data, el) {
                popupCloseFunction();
                jQuery("body").removeAttr("style");
                jQuery("body").removeClass("locked");
                jQuery("body").removeClass("margin-fix");
            }
        });
    });

    jQuery('.modal_close').on('click', function(){
        $.arcticmodal('close');
    });

    $(".toggle_like").click(function (){
        axios.post('like',{id:$(this).data('id')}).then(function (e){
            if(e.data.like=="liked"){
                $(".disslike_icon-fill").fadeOut(100);
                $(".disslike_icon").fadeIn(100);
                $(".like_icon").fadeOut(100);
                $(".like_icon-fill").fadeIn(100);
            }else{
                $(".like_icon-fill").fadeOut(100);
                $(".like_icon").fadeIn(100);
            }

        }).catch(function(){
            show_error('Bir hata oluştu');
        });

    });
    $(".toggle_disslike").click(function(){
        axios.post('disslike',{id:$(this).data('id')}).then(function (e){
            if(e.data.disslike=="dissliked"){
                $(".like_icon-fill").fadeOut(100);
                $(".like_icon").fadeIn(100);
                $(".disslike_icon").fadeOut(100);
                $(".disslike_icon-fill").fadeIn(100);
            }else{
                $(".disslike_icon-fill").fadeOut(100);
                $(".disslike_icon").fadeIn(100);
            }

        }).catch(function(){
            show_error('Bir hata oluştu');
        });
    });
    $(".clipboard-content").click(function(){

        console.log($(".current_url").val());
        /* Select the text field */
        navigator.clipboard.writeText($(".current_url").val()).then(function() {
            console.log('Async: Copying to clipboard was successful!');
        }, function(err) {
            console.error('Async: Could not copy text: ', err);
        });

        $(".clipboard-content").attr('data-title','Kopyalandı');
        setTimeout(function (){
            $(".clipboard-content").attr('data-title','Linki Kopyala');
        },2500);
        /* Copy the text inside the text field */
        document.execCommand("copy");
    });

    $(".js-add-to-fav").on("click", function(e){
        e.preventDefault();
        var btn=$(this);
        var id = $(this).data('id');
        axios.post('/auth-check').then(function (e){

            if (e.data.authorized==true){

               axios.post('fav',{"id":id}).then(function (e){
                    if (e.data.favorite=="added"){
                        btn.addClass('added');
                    }else{
                        btn.removeClass('added');
                    }
               }).catch(()=>{
                   return show_error('Bir hata oluştu');
               });
            }else{
                jQuery("#modal-login").arcticmodal({
                    openEffect:{speed:150},
                    beforeOpen: function(data, el) {
                        jQuery("body").addClass("locked");
                        jQuery("body").addClass("margin-fix");
                    },
                    afterOpen: function(data, el) {
                        popupFunction();
                    },
                    afterClose: function(data, el) {
                        popupCloseFunction();
                        jQuery("body").removeAttr("style");
                        jQuery("body").removeClass("locked");
                        jQuery("body").removeClass("margin-fix");
                    }
                });
            }
        });

    });
var rated_content=false;
    $(".comment-form").submit(function (e){
        e.preventDefault();

        console.log(Object.keys(rates).length);
        if (Object.keys(rates).length<3){
            $("#modal-alert .subtitle").text("Lütfen değerlendirmeni daha iyi çözümleyebilmemiz için puanlamanı yap.");
            $("#modal-alert").arcticmodal({
                openEffect:{speed:150},
                beforeOpen: function(data, el) {
                    jQuery("body").addClass("locked");
                    jQuery("body").addClass("margin-fix");
                },
                afterOpen: function(data, el) {
                    popupFunction();

                },
                afterClose: function(data, el) {
                    popupCloseFunction();
                    jQuery("body").removeAttr("style");
                    jQuery("body").removeClass("locked");
                    jQuery("body").removeClass("margin-fix");
                }
            });
        }else{

           var data= new FormData(this);
            data.append('rates','{"ds":'+rates["ds"]+',"ls":'+rates["ls"]+',"ab":'+rates["ab"]+'}');

          if (!rated_content){
              axios.post('rate',data).then((e)=>{
                  if (e.data.success){
                      $(".comment-form textarea").val("");
                      rated_content=true;
                  }else{
                      show_error('Lütfen tekrar değerlendirmeyiniz, yanıtla seçeneğini kullanabilirsiniz');
                      rated_content=true;
                  }
              });
          }else{
              show_error('İşlem reddedildi');
          }
        }
    });


    //comments link in wticky block
    //transform comments number
    if (jQuery("#comments-section").length && jQuery(".share-block").length) {
        jQuery(".share-block-item.link-to-comments").show().css("display", "flex");

        var counterSpan = jQuery(".link-to-comments .comments-count span");
        var counterComments = parseFloat(counterSpan.text());
        // data-val это значение числа

        if ((counterComments >= 1000) && (counterComments < 1000000)) {
            var thisAttrK = (counterComments/1000).toFixed(0) + "K";
            counterSpan.text(thisAttrK);
        }

        if ((counterComments >= 1000000) && (counterComments < 1000000000000)) {
            var thisAttrM = (counterComments/1000000).toFixed(0) + "M";
            counterSpan.text(thisAttrM);
        }

        if (counterComments >= 1000000000000) {
            var thisAttrT = (counterComments/1000000000000).toFixed(0) + "T";
            counterSpan.text(thisAttrT);
        }
    }
    //comments link in wticky block
    //transform comments number



    //Video background function
    if (jQuery(".js-video-bg").length) {

        jQuery(".js-video-bg").each(function(){
            var thisVideoWrap = jQuery(this),
                videoLink = thisVideoWrap.attr("data-video");

            thisVideoWrap.html('<video loop autoplay muted playsinline class="fullscreen-bg__video"><source src="'+videoLink+'" type="video/mp4"></video>')
        });
    }
    //Video background function



    //transform tables
    if (jQuery(".wp-content table").length) {
        jQuery(".wp-content table").each(function(key, item){
            var thisTable = jQuery(this),
                thisTdCount = thisTable.find("tr:last-child").children("td").length;

            var newIdName = 'table-n-' + key;

            thisTable.attr("id", newIdName);
            thisTable.addClass("count-"+thisTdCount);

            if (thisTdCount > 2) {
                thisTable.addClass("large-table");
            }

            if (jQuery("#"+newIdName+" th").length) {
                jQuery("#"+newIdName+" th").parent().addClass("thead");
                jQuery("#"+newIdName).addClass("with-thead");
            }

        });

        jQuery(".wp-content table th").each(function(){
            var thisText = jQuery(this).text(),
                thisIndex = jQuery(this).index(),
                thisTableId = jQuery(this).parents("table").attr("id");

            jQuery("#"+thisTableId+" td:nth-child("+(thisIndex+1)+")").attr("data-title", thisText);
        });
    }
    //transform tables



    //opening fullscreen video
    if (jQuery(".js-open-fullscreen-video").length) {
        jQuery(".js-open-fullscreen-video").each(function(key){
            var thisVideo = jQuery(this).attr("data-video");
            var newIdName = 'append-video-' + key;

            jQuery(this).attr("data-append", newIdName);

            jQuery("body").append('<div class="full-video js-full-video" style="display: none;"><video controls class="fullscreen-video" id="'+newIdName+'"><source src="'+thisVideo+'" type="video/mp4"></video></div>');

            if (device.ios()) {
                document.getElementById(newIdName).addEventListener('webkitendfullscreen', function (e) {
                    document.getElementById(newIdName).pause();
                    document.getElementById(newIdName).parentNode.style.display = 'none';
                });
            }
        });

        jQuery(".js-open-fullscreen-video").on("click", function(e){
            var thisVideoBlock = jQuery(this).attr("data-append"),
                thisVideoParent = jQuery("#"+thisVideoBlock).parent();

            thisVideoParent.addClass("playing");

            if (firefoxBrowser) {
                document.getElementById(thisVideoBlock).mozRequestFullScreen();
            } else {
                document.getElementById(thisVideoBlock).webkitEnterFullscreen();
            }

            thisVideoParent.show();
            document.getElementById(thisVideoBlock).play();
        });
    }

    if (document.addEventListener) {
            document.addEventListener('fullscreenchange', exitHandler, false);
            document.addEventListener('mozfullscreenchange', exitHandler, false);
            document.addEventListener('MSFullscreenChange', exitHandler, false);
            document.addEventListener('webkitfullscreenchange', exitHandler, false);
        }

        function exitHandler() {
            var playingId = jQuery(".js-full-video.playing video").attr("id");

            if (document.webkitIsFullScreen === false) {

                document.getElementById(playingId).pause();
                jQuery(".js-full-video.playing").hide();
                jQuery(".js-full-video.playing").removeClass("playing");

            } else if (document.msFullscreenElement === false) {
                document.getElementById(playingId).pause();
                jQuery(".js-full-video.playing").hide();
                jQuery(".js-full-video.playing").removeClass("playing");
            }
        }

        document.addEventListener('fullscreenchange', function(event) {
            var playingId = jQuery(".js-full-video.playing video").attr("id");

            if (!document.fullscreenElement) {
                document.getElementById(playingId).pause();
                jQuery(".js-full-video.playing").hide();
                jQuery(".js-full-video.playing").removeClass("playing");
            }
        });
    //opening fullscreen video



    //footer fix if page height is small
    jQuery(window).on('resize',function() {

        var containerHeight = jQuery(".container").innerHeight();
        var windowHeight = jQuery(window).innerHeight();
        var footerHeight = jQuery(".footer").innerHeight();

        if (containerHeight < windowHeight) {
            jQuery(".footer").addClass("absolute");
            jQuery(".container-wrap").addClass("relative");
        } else {
            jQuery(".footer").removeClass("absolute");
            jQuery(".container-wrap").removeClass("relative");
        }
    });

    jQuery(window).trigger('resize');
    //footer fix if page height is small



    // sticky post tag hover
    jQuery(".sticky-post-tag .sticky-icon").on({
        mouseenter: function () {
            jQuery(this).next().show();
        },
        mouseleave: function () {
            jQuery(this).next().hide();
        }
    });
    // sticky post tag hover


     if (jQuery("#js-panel").hasClass("white-color")) {
        jQuery(".mobile-panel").addClass("white-color");
    }


    // if header is fixed
    if (jQuery("#js-panel").hasClass("fixed")) {
        jQuery(".mobile-panel").addClass("fixed");
        jQuery("body").addClass("with-fixed-panel");
    } else if (jQuery("#js-panel").hasClass("fixed-scroll-up")) {
        jQuery(".mobile-panel").addClass("fixed-scroll-up");
        jQuery("body").addClass("with-fixed-panel-up");
    }


    var lastScrollTop = 0;
    jQuery(window).on("scroll", function() {
        var scroll = jQuery(window).scrollTop();

        if (jQuery("#js-panel").hasClass("fixed")) {
            var startPosition;

            if (window.innerWidth > 1000) {
                startPosition = 122;
            } else {
                startPosition = 0;
            }

            if (scroll>startPosition) {
                jQuery("#js-panel").addClass('scrolled');
                jQuery(".mobile-panel").addClass('scrolled');
            } else {
                jQuery("#js-panel").removeClass('scrolled');
                jQuery(".mobile-panel").removeClass('scrolled');
            }
        } else if (jQuery("#js-panel").hasClass("fixed-scroll-up")) {

            if (scroll > lastScrollTop){
                jQuery("#js-panel").addClass('hidden');
                setTimeout(function(){
                    jQuery("#js-panel").removeClass('active');
                    jQuery("#js-panel").removeClass('scrolled');
                    jQuery("#js-panel").removeClass('hidden');
                }, 200);
                jQuery(".mobile-panel").addClass('hidden');
                setTimeout(function(){
                    jQuery(".mobile-panel").removeClass('scrolled');
                    jQuery(".mobile-panel").removeClass('active');
                    jQuery(".mobile-panel").removeClass('hidden');
                }, 200);
                jQuery("body").removeClass('top-panel-is-fixed');
            } else {
                jQuery("#js-panel").addClass('scrolled');
                setTimeout(function(){
                    jQuery("#js-panel").addClass('active');
                }, 100);
                jQuery(".mobile-panel").addClass('scrolled');
                setTimeout(function(){
                    jQuery(".mobile-panel").addClass('active');
                }, 100);
                jQuery("body").addClass('top-panel-is-fixed');
            }

            if ( scroll == 0) {
                jQuery("#js-panel").removeClass('active');
                jQuery("#js-panel").removeClass('scrolled');
                jQuery("#js-panel").removeClass('hidden');
                jQuery(".mobile-panel").removeClass('scrolled');
                jQuery(".mobile-panel").removeClass('active');
                jQuery(".mobile-panel").removeClass('hidden');
                jQuery("body").removeClass('top-panel-is-fixed');
            }

            lastScrollTop = scroll;
        }
    });
    // if header is fixed


    //Slider "travel"
    if (jQuery("#js-slider-section").length) {

        jQuery('#js-slider-section').slick({
            arrows: false,
            dots: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            fade: true,
            focusOnSelect: false,
            pauseOnHover: false,
            pauseOnFocus: false,
            swipe: true,
            touchMove: false,
            draggable: false,
            autoplay: true,
            variableWidth: true,
            centerMode: false,
            speed: 1000,
            autoplaySpeed: 7500
        });

        jQuery('#js-slider-section').on('beforeChange', function(event,
             slick, currentSlide, nextSlide){
            var thisSlide = jQuery('#js-slider-section .slick-current');
               var nextSlide = jQuery(slick.$slides[nextSlide]);

            thisSlide.addClass("is-processing");
            setTimeout(function(){
                thisSlide.removeClass("is-processing");
            }, 800);
        });


        if (!device.desktop() && device.portrait()) {
            jQuery("body").append("<div id='setHeight' style='position:fixed; top:0; bottom:0;left:0;right:0;z-index:-10'></div>")
             var browserHeight = jQuery("#setHeight").innerHeight();
             jQuery("#setHeight").remove();


             jQuery(".js-fix-height").innerHeight(browserHeight);
        }

    }
    //Slider "travel"


    //Beautiful shadow========================/
    jQuery(".js-shadow").each(function(){
        var thisShadow = jQuery(this),
            thisimgDiv = jQuery(this).siblings(".bg-img"),
            thisStyle = thisimgDiv.attr("style");

        if (thisStyle) {
            thisShadow.attr("style", thisStyle);
        } else {
            thisShadow.attr("style", "background-color: #000;");
        }
    });
    //Beautiful shadow========================/


    //Slider "tour-slider"
    if (jQuery(".packages-slider").length) {

        jQuery('.packages-slider').each(function(key, item) {

            var sliderParent = jQuery(this).parents(".js-slider-block");
          var sliderIdName = 'packages-slider-' + key;
          this.id = sliderIdName;
          var sliderId = '#' + sliderIdName;

            sliderParent.attr("id", 'js-slider-block-' + key);

            if (jQuery(sliderId).hasClass("single-packages-slider")) {
                var slides = 2,
                    dots = false;
            } else {
                slides = 3,
                dots = true;
            }

          jQuery(sliderId).slick({
               arrows: true,
            dots: dots,
            slidesToShow: slides,
            slidesToScroll: 1,
            infinite: true,
            fade: false,
            focusOnSelect: false,
            swipe: true,
            touchMove: false,
            draggable: false,
            autoplay: false,
            variableWidth: true,
            centerMode: false,
            prevArrow: jQuery('#js-slider-block-' + key + ' .arrow.prev'),
            nextArrow: jQuery('#js-slider-block-' + key + ' .arrow.next'),
            speed: 300,
            responsive: [
            {
              breakpoint: 1000,
              settings: {
                  slidesToShow: 2
              }
            }
          ]
            });

        });
    }
    //Slider "tour-slider"


    //Slider "destination-slider"
    if (jQuery(".collection-slider").length) {

        jQuery(".collection-slider").slick({
               arrows: true,
                dots: false,
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                fade: false,
                focusOnSelect: false,
                swipe: true,
                touchMove: false,
                draggable: false,
                autoplay: false,
                variableWidth: true,
                centerMode: false,
                prevArrow: jQuery('.collection-section .arrow.prev'),
                nextArrow: jQuery('.collection-section .arrow.next'),
                speed: 400,
                responsive: [
                {
                  breakpoint: 760,
                  settings: {
                      slidesToScroll: 2,
                      slidesToShow: 2,
                      speed: 300
                  }
                }
              ]
        });
    }
    //Slider "destination-slider"


    //input tel validation
    jQuery('.js-tel').on('keydown', function(e){
      if(e.key.length == 1 && e.key.match(/[^0-9+'"]/)){
        return false;
      };
    });
    //input tel validation


    //input focus
    jQuery('.js-input').on('blur', function(){
    var $this = jQuery(this),
          val = $this.val();

      if(val == ""){
        $this.removeClass('focus');
      } else {
          $this.addClass('focus');
      }

    }).on('focus', function(){
      jQuery(this).addClass('focus');
    });
    //input focus


    //Slider "destination-slider"
    if (jQuery(".posts-carousel-slider").length) {

        jQuery(".posts-carousel-slider").slick({
               arrows: true,
            dots: false,
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            fade: false,
            focusOnSelect: false,
            swipe: true,
            touchMove: false,
            draggable: false,
            autoplay: false,
            variableWidth: true,
            centerMode: false,
            prevArrow: jQuery('.posts-carousel-section .arrow.prev'),
            nextArrow: jQuery('.posts-carousel-section .arrow.next'),
            speed: 300
        });
    }
    //Slider "destination-slider"


    //filters
    if (jQuery(".filter-item").length) {
        jQuery(".filter-item .filter-item-field").on("click", function(e){
            e.preventDefault();
            var thisOptions = jQuery(this),
                thisFilterItem = jQuery(this).parent(),
                thisOptions = thisFilterItem.children(".filter-item-options");

            if (thisOptions.is(":visible")) {
                jQuery(".filter-panel").removeClass("opened");
                jQuery(".filter-overlay").fadeOut(100);
            } else {
                jQuery(".filter-panel").addClass("opened");
                jQuery(".filter-overlay").fadeIn(100);
            }

            jQuery(".filter-item .filter-item-options").not(thisOptions).hide();
            thisOptions.fadeToggle(0);

            if (window.innerWidth <= 1000) {
                jQuery(".filter-panel").addClass("z-index");
                jQuery("html, body").addClass("locked");
                jQuery("body").addClass("margin-fix");
                popupFunction();
            }
        });

        jQuery(".filter-item .apply-btn").on("click", function(e){
            e.preventDefault();
            var thisFilterItem = jQuery(this).parents(".filter-item"),
                thisOptions = thisFilterItem.children(".filter-item-options"),
                valueSpan = thisFilterItem.find(".selected-text"),
                valueSpanText = valueSpan.text();

            thisOptions.hide();
            jQuery(".filter-overlay").fadeOut(100);
            jQuery(".filter-panel").removeClass("opened");

            var checkList = thisOptions.find("input[type=checkbox]:checked");
            var radioList = thisOptions.find("input[type=radio]:checked");
            var filterCountSpan = thisFilterItem.find(".filter-count");

            if (checkList.length) {
                filterCountSpan.text(checkList.length);
                filterCountSpan.addClass("selected");
            } else {
                filterCountSpan.text("0");
                filterCountSpan.removeClass("selected");
            }

            if (radioList.length) {
                valueSpan.text(radioList.val());
            }

            if (window.innerWidth <= 1000) {
                jQuery(".filter-panel").removeClass("z-index");
                jQuery("html, body").removeClass("locked");
                jQuery("body").removeClass("margin-fix");
                popupCloseFunction();
            }
        });
    }


    jQuery(document).mouseup(function (e){
        var div = jQuery(".filter-item");
        if (!div.is(e.target)
            && div.has(e.target).length === 0) {
                jQuery(".filter-item-options").hide();
                jQuery(".filter-panel").removeClass("opened");
                jQuery(".filter-overlay").fadeOut(100);

            if (window.innerWidth <= 1000) {
                jQuery(".filter-panel").removeClass("z-index");
            }
        }
    });
    //filters



    //categories slider
    if (jQuery(".category-slider").length) {
        jQuery(".category-slider").slick({
               arrows: true,
            dots: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            infinite: true,
            fade: false,
            focusOnSelect: false,
            swipe: false,
            touchMove: false,
            draggable: false,
            autoplay: false,
            variableWidth: true,
            centerMode: false,
            speed: 300,
            prevArrow: jQuery('.categories-panel .arrow-area-prev'),
            nextArrow: jQuery('.categories-panel .arrow-area-next'),
            responsive: [
            {
              breakpoint: 760,
              settings: {
                  slidesToShow: 1,
                  arrows: false
              }
            }
          ]
        });
    }
    //categories slider


    //header with gallery
    if (jQuery("#js-header-gallery-slider").length) {
        jQuery("#js-header-gallery-slider").slick({
               arrows: true,
            dots: false,
            slidesToShow: 5,
            slidesToScroll: 1,
            infinite: true,
            fade: false,
            focusOnSelect: true,
            swipe: true,
            touchMove: false,
            draggable: false,
            autoplay: false,
            variableWidth: true,
            centerMode: false,
            speed: 300,
            responsive: [
            {
              breakpoint: 760,
              settings: {
                  arrows: false
              }
            }
          ]
        });
    }
    //header with gallery

    var rates = [];

    //User rating========================/
    jQuery(".js-rating-stars .star").on({
        mouseenter: function () {
            var thisStar = jQuery(this),
               thisParent = thisStar.parent(".js-rating-stars"),
               thisStarNum = thisStar.index();

              thisParent.children(".star").removeClass("filled");
              thisParent.children(".star").slice(0,thisStarNum+1).addClass("filled");
        },
        mouseleave: function () {
            var thisStar = jQuery(this),
               thisParent = thisStar.parent(".js-rating-stars"),
               thisStarNum = thisStar.index();
              thisParent.children(".star").removeClass("filled");
        }
    });

    jQuery(".js-rating-stars .star").on("click", function(e){
        e.preventDefault();
        var thisStar = jQuery(this),
           thisParent = thisStar.parent(".js-rating-stars"),
           thisStarNum = thisStar.index();
        rates[$(this).parent().data('rate')]=thisStar.index()+1;
          thisParent.children(".star").removeClass("selected");
          thisParent.children(".star").slice(0,thisStarNum+1).addClass("selected");

    });
    //User rating========================/



    //datepicker
    jQuery(".js_calendar").datepicker({
      dateFormat: "d MM yy",
        dayNamesMin: [ "S", "M", "T", "W", "T", "F", "S" ],
        monthNames: [ "January", "February", "March", "April", "May", "June", "Jule", "August", "September", "Oktober", "November", "December" ],
        setDate: "today",
        firstDay: 0,
        onSelect: function() {
            jQuery(this).parent().addClass("active");

        },
        beforeShow: function() {
            jQuery("body").addClass("locked-by-datepicker");
        },
        onClose: function() {
            jQuery("body").removeClass("locked-by-datepicker");
        }
    });
    //datepicker






    //temp styles
    // This scripts use only for demo
    // You should delete this code when developing

    var $btn = jQuery('.submit-btn');

    $btn.on('click', function() {
      jQuery(this).addClass('load');

      setTimeout(function() {
        jQuery('.submit-btn').removeClass('load');
      }, 4000);
    });

    jQuery(".show-more-btn").on('click', function() {
      jQuery(this).hide();
      jQuery(this).next().show();


    });

    jQuery(".js-form-sent-status").on('click', function() {
      jQuery("#success-message").addClass("visible");

      setTimeout(function() {
        jQuery("#success-message").removeClass("visible");
      }, 2000);
    });

    jQuery(".js-form-error-status").on('click', function() {
      jQuery("#error-message").addClass("visible");

      setTimeout(function() {
        jQuery("#error-message").removeClass("visible");
      }, 2000);
    });

});
