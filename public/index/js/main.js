var previousScroll = 0;
// Page JS as an object
var Main = {
	// Initialize page
	pageInit: function(){
        Main.Header.init();
        Main.Header.nav.init();
        Main.Page.init();
        $(window).on('load', function(){
            if (isDesktop()) {
                transformScale('.js_transformScaleY', 10.36, 18);
                $('#s_pageHeader').addClass('this-active');
            }
            $('body').addClass('this-loaded');
        
            $('#js_loading').on('animationiteration animationiteration webkitAnimationIteration oanimationiteration MSAnimationIteration', function() {
                var $this = $(this);
                $(this).addClass('this-done');
                setTimeout(function(){
                    $this.fadeOut({complete: function(){$this.removeClass('this-done')}});
                }, 0);
                $(this).unbind('animationiteration animationiteration webkitAnimationIteration oanimationiteration MSAnimationIteration');
            }); 
        }).on('resize orientationchange', function(){
            if (isDesktop()) {
                transformScale('.js_transformScaleY', 10.36, 18);
            }
            if (isMobile() || isTablet()) {
                setViewport();
            }
        });
        if ($(window).width() <= 768) {
            
            if($('#s_pageHeader').hasClass('this-intro')) {
                $('.js_headerLogo').addClass('invert');
            }
            
            // Hide logo on scroll down
            $(window).on('scroll touchmove', function(e){
            if(isInView($('#s_landingIntro'))) {
                  $('.js_headerLogo').addClass('invert');
                 $('.child-iconInactive').removeClass('invert');  
               } else {
                 $('.js_headerLogo').removeClass('invert');  
                 $('.child-iconInactive').addClass('invert');  
               }
                
                if ( $(window).scrollTop() >= 300) {
                    $('.js_headerLogo').addClass('this-out');
                } else {
                    $('.js_headerLogo').removeClass('this-out');
                }
            });
        };
        
        if (isMobile()) {
            // Hide logo on scroll down
            $(window).on('scroll touchmove', function(e){
           
                if ( $(window).scrollTop() >= 300) {
                    $('.js_headerLogo').addClass('this-out');
                } else {
                    $('.js_headerLogo').removeClass('this-out');
                }
            });
        };
        window.onpopstate = function(event) {
            Main.Global.showLoading();
            Main.Header.nav.loadContent(location.pathname);
            $('#js_pageNav a.this-active').removeClass('this-active');
            if (location.pathname != '/') {
                $('#js_pageNav').find('[href$="'+location.pathname+'"]').addClass('this-active');
            } else {
                $('#js_pageNav>ul>li:first-child>a').addClass('this-active');
            }
        };
        
        /* Whisper Search */
        if($('#search').length > 0) {
           var searchInput = $('input[name=help_search]', '#search'),
               whisperer = $('#whisperer'),
               searchForm = $('#search'),
               typingTimer;

              searchInput.on('keydown', function () {
                  clearTimeout(typingTimer);
              });

              searchInput.on('keyup change', function(word) {
                  var word = searchInput.val();
                  var searching = $('.loading','#search');

                  searching.css('opacity','1');

                  clearTimeout(typingTimer);
                  typingTimer = setTimeout(function() {

                  if(word.length) {

                    //$('.seeAll').attr('href', 'search/&str='+word);  

                    var searchScript = 'whisperSearch.php'

                    $.ajax({ 
                       type: 'GET',
                       url: './app/'+searchScript,
                       data: {str : word},
                       cache: false,
                       success: function(res) {
                          whisperer.find('.results').html(res);

                          if(res.length > 0) {
                              searchForm.addClass('active');

                              setTimeout(function() {
                                searching.css('opacity','0');
                              }, 500); 

                          } else {
                              searchForm.removeClass('active');
                          }
                       }
                     });
                  } else {
                      searching.css('opacity','0');
                      searchForm.removeClass('active');
                  }

                  }, 500);

              });
        }
        
	},
    Global: {
        showLoading: function(){
            $('#js_loading').show();
        },
        hideLoading: function(){
            setTimeout(function(){ $('#js_loading').fadeOut(); }, 500);
        }
    },
    Header: {
        init: function() {
            $('.js-toggleNav').on('click', function(e){
                e.preventDefault();
                Main.Header.nav.toggleNav();
            });
        },
        nav: {
            init: function(){
                var $this = $(this)[0];
                $('#js_pageNav a').click(function(e) {
                    var href = $(this).attr("href");

                    if (!href.match(/^\//)) {
                        return;
                    }

                    e.preventDefault();

                    Main.Global.showLoading();

                    $this.loadContent(href);                    
                    
                    history.pushState('', 'New URL: '+href, href);

                    $('#js_pageNav a.this-active').removeClass('this-active');
                    $(this).addClass('this-active');

                    if(isMobile()) {
                        Main.Header.nav.toggleNav(true);
                    }
                });
                $('.js_headerLogo').on('click', function(e){
                    e.preventDefault();

                    Main.Global.showLoading();

                    $this.loadContent('/');
                    history.pushState('', 'New URL: '+'/', '/');

                    $('#js_pageNav a.this-active').removeClass('this-active');
                    $('#js_pageNav>ul>li:first-child>a').addClass('this-active');

                    Main.Header.nav.toggleNav(true);
                });
            },
            toggleNav: function(forceHide){
                var $target = $($('.js-toggleNav').data('target'));
                var isActive = $target.hasClass('this-active');
                var timing = 500;
                if (forceHide) {
                    isActive = true;
                }
                if (isActive) {
                    $target.removeClass('this-active').addClass('this-inactive');
                    setTimeout(function(){ $target.removeClass('this-inactive') }, timing);
                    if (isMobile() || isTablet()) {
                        if ( $(window).scrollTop() >= 250) {
                            $('.js_headerLogo').addClass('this-out');
                        }
                    }
                } else {
                    $target.addClass('this-active');
                    if (isMobile() || isTablet()) {
                        $('.js_headerLogo').removeClass('this-out');
                    }
                }
            },
            loadContent: function(newUrl){
                $.ajax({
                    url: newUrl,
                    success: function(response){
                        $('#l_pageContentWrap').empty();
                        $(response).find('.l_pageContent').appendTo('#l_pageContentWrap');
                        $(window).scrollTop(0);
                        Main.Page.init();
                        Main.Global.hideLoading();
                        if(newUrl === "/support") { 
                            changeCSS('css/stylesheet_old.css', 0);
                        } else {
                            changeCSS('css/stylesheet.min.css', 0);
                            if ($('#supportStyles')) {
                                $('#supportStyles').attr('href', '#');
                            } 
                        }
                    } 
                });
            }
        }
    },
    Footer: {
        showIntro: function(){
            $('#s_pageHeader').addClass('this-intro');
            $('#s_pageFooter').addClass('this-intro');
            $('.l_landingWrapNav').addClass('this-intro');
        },
        hideIntro: function(){
            $('#s_pageHeader').removeClass('this-intro');
            $('#s_pageFooter').removeClass('this-intro');
            $('.l_landingWrapNav').removeClass('this-intro');
        },
        showLast: function(){
            $('#s_pageFooter').addClass('this-last');
        },
        hideLast: function(){
            $('#s_pageFooter').removeClass('this-last');
        },
        setStatic: function(){
            if (!$('#s_pageFooter').hasClass('this-static')) {
                $('#l_pageContentWrap').height('auto');
                $('#s_pageFooter').fadeOut(400);
                setTimeout(function(){
                    $('#s_pageFooter').addClass('this-static').fadeIn(400);
                }, 420)
            }
        },
        setFixed: function(){
            if ($('#s_pageFooter').hasClass('this-static')){
                $('#s_pageFooter').fadeOut(400);
                setTimeout(function(){
                    $('#s_pageFooter').removeClass('this-static').fadeIn(400);
                }, 420)
            }
        }
    },
    Page: {
        init: function(){
            Main.Page.Intro.init();
            Main.Page.Media.init();
            Main.Page.Support.init();
            Main.Page.HelpArticle.init();
            Main.Page.Pro.init();
            Main.Page.Contact.init();
            if (isDesktop()){
                transformScale('.js_transformScaleY', 10.36, 18);
            }
            
   
        },
        Intro: {
            init: function(){
                if($('#js_page-intro').length>0) {
                    if (isDesktop()){
                        Main.Footer.setFixed();
                    }
                    // Reset footer state
                    Main.Footer.hideLast();
                    Main.Footer.showIntro();
                    // Quotes
                    $('.js_section5-quoteToggle').quotesSlider();
                    /*$('.js_section5-quoteToggle').on('mouseenter', function(e){
                        e.preventDefault();
                        var target = $(this).attr('href');
                        $('.js_section5-quoteToggle').removeClass('this-active');
                        $(this).addClass('this-active');
                        $('.js_section5-quoteGroup .child-quote').removeClass('this-active');
                        $('.js_section5-quoteGroup .child-quote .js_section5-quoteLink[href*="'+target+'"]').parents('.child-quote').addClass('this-active');
                    }).on('click',function(e){
                        e.preventDefault();
                    });*/
                    // Desktop only
                    if (isDesktop()) {
                        $('.l_landingWrap').sectionSlider();
                        $('.js_section5-quoteGroup2').twitterSlider();
                    }
                    // Desktop and Tablet
                    if (isDesktop() || isTablet()) {
                        $('.js_landingSection3-phoneWrap .child-phone').on('mouseenter', function(){
                            $('.js_landingSection3-phoneWrap .child-phone').removeClass('this-active');
                            $(this).addClass('this-active');
                            $('.js_landingSection3-textWrap .child-textWrap').removeClass('this-active');
                            var nth = $(this).parent().index()+1;
                            $('.js_landingSection3-textWrap .child-textWrap:nth-child('+nth+')').addClass('this-active');
                        });
                    }
                    // Tablet only
                    if (isTablet()){
                        var section5maxHeight = -1;
                        $('.js_section5-quoteGroup .child-quote').each(function() {
                            if ($(this).outerHeight() > section5maxHeight)
                                section5maxHeight = $(this).outerHeight();
                        });
                        $('.js_section5-quoteGroup').height(section5maxHeight);
                    }
                    if (isMobile() || isTablet()) {
                        $(window).on('scroll touchmove', function(){
                            if ( $(window).scrollTop() >= $('#s_landingIntro').outerHeight()) {
                                $('#s_pageHeader').removeClass('this-intro');
                            } else {
                                $('#s_pageHeader').addClass('this-intro');
                            }
                        });
                        if ( $(window).scrollTop() >= $('#s_landingIntro').outerHeight()) {
                            $('#s_pageHeader').removeClass('this-intro');
                        } else {
                            $('#s_pageHeader').addClass('this-intro');
                        }
                    }
                    rearangeElements();
                    $(window).on('orientationchange', function () {
                        rearangeElements();
                    });
                }
            }
        },
        Media: {
            init: function(){
                if($('#js_page-media').length>0){
                    Main.Footer.showLast();
                    Main.Footer.hideIntro();
                    if (isDesktop()){
                        Main.Footer.setStatic();
                    }
                }
            }
        },
        HelpArticle: {
            init: function(){ 
                if($('#s_pageSupportArticle').length>0){
                    Main.Footer.showLast();
                    Main.Footer.hideIntro();
                    if (isDesktop()){
                        Main.Footer.setStatic();
                    }
                    
                    /*
                    $('.accordion').each(function(){
                        var this = $(this);
                        
                    });
                    */
                    
                    $('.accordion .header').click(function() {
                       var accordion = $(this).parent();
                        
                       if(!accordion.hasClass('open')) {
                         accordion.removeClass('open'); 
                         accordion.addClass('open');      
                       } else {
                         accordion.removeClass('open');  
                       }
                    });
                    
                    
                    var likeBtn = $('.article-like'),
                        dislikeBtn = $('.article-dislike');
                    
                    likeBtn.one('click', function() {
                        var a_id = $(this).data('id');
                        
                        dislikeBtn.fadeOut(500);
                        likeBtn.css({
                            'background-color' : '#12c48b',
                            'color' : '#fff',
                        });
                        
                        $.ajax({ 
                           type: 'GET',
                           url: './app/action/article_like.php',
                           data: {a_id : a_id},
                           cache: false,
                           success: function(res) {}
                         });
                    });
                    
                    dislikeBtn.one('click', function() {
                        var a_id = $(this).data('id');
                        
                        likeBtn.fadeOut(500);
                        dislikeBtn.css({
                            'background-color' : '#12c48b',
                            'color' : '#fff',
                        });
                        
                        $.ajax({ 
                           type: 'GET',
                           url: './app/action/article_dislike.php',
                           data: {a_id : a_id},
                           cache: false,
                           success: function(res) {}
                         });
                    });
                    
                }
            }
        },
        Support: {
            init: function(){
                if($('#js_page-support').length>0){
                    Main.Footer.showLast();
                    Main.Footer.hideIntro();
                    if (isDesktop()){
                        Main.Footer.setStatic();
                    }

                    $(window).on('load', function(){
                        $('.js_tab').each(function(){
                            var newWidth = $(this).children('h4').width();
                            $(this).find('.child-line').width(newWidth).data('width', newWidth);
                        });
                    });
                    if ($('.child-line').width() == 0) {
                        $('.js_tab').each(function(){
                            var newWidth = $(this).children('h4').width();
                            $(this).find('.child-line').width(newWidth).data('width', newWidth);
                        });
                    }
                    $('.js_tab h4').on('click', function(){
                        if (!$(this).hasClass('this-active')) {
                            $('.js_tab').each(function(){
                                if ($(this).hasClass('this-active')) {
                                    $(this).removeClass('this-active');
                                    $(this).children('.child-text').slideToggle();
                                    $(this).children('.child-line').width($(this).children('.child-line').data('width'));
                                }
                            });
                        }
                        $(this).parent().toggleClass('this-active');
                        $(this).next().slideToggle();
                        if ($(this).parent().hasClass('this-active')) {
                            $(this).parent().children('.child-line').width('100%');
                        } else {
                            $(this).parent().children('.child-line').width($(this).parent().children('.child-line').data('width'));
                        }
                    });

                    $('.js_togglePopup').on('click', function(e){
                        e.preventDefault();
                        $($(this).attr('href')).fadeIn();
                        $('body').css('top', -($('body').scrollTop()) + 'px').addClass('this-noscroll');
                    });

                    $('.js_popup').each(function(){
                        var $this = $(this);
                        $this.find('.l_popup-bg').on('click', function(){
                            $this.fadeOut();
                            var scrollTop = parseInt($('body').css('top'));
                            $('body').removeClass('this-noscroll');
                            $('html,body').scrollTop(-scrollTop);
                        });
                        $this.find('.l_popup-contentClose').on('click', function(e){
                            $this.fadeOut();
                            var scrollTop = parseInt($('body').css('top'));
                            $('body').removeClass('this-noscroll');
                            $('html,body').scrollTop(-scrollTop);
                            e.preventDefault();
                        });
                    });
                    
                }
            }
        },
        Pro: {
            init: function(){
                if($('#js_page-pro').length>0){
                    Main.Footer.showLast();
                    Main.Footer.hideIntro();
                    if (isDesktop()){
                        Main.Footer.setStatic();
                    }
                }
            }
        },
        Contact: {
            init: function(){
                if($('#js_page-contact').length>0){
                    Main.Footer.showLast();
                    Main.Footer.hideIntro();
                    if (isDesktop()){
                        Main.Footer.setStatic();
                        
                        $('.js_shareFB').on('click', function (e) {
                            e.preventDefault();
                            postToFeed();

                            return false;
                        });
                        // Twitter custom share button
                        $('.js_shareTW').click(function (event) {
                            var width = 575,
                                height = 400,
                                left = ($(window).width() - width) / 2,
                                top = ($(window).height() - height) / 2,
                                url = this.href,
                                dialog = 1,
                                opts = 'status=1' +
                                ',width=' + width +
                                ',height=' + height +
                                ',top=' + top +
                                ',left=' + left;

                            window.open(url, 'twitter', opts);

                            return false;
                        });
                        }
                  
                        $('.js_shareFB').on('click', function (e) {
                            e.preventDefault();
                            postToFeed();

                            return false;
                        });
                   
                    $('#submit_cform').click(function(e){
                         e.preventDefault();
                        
                        $.post("./php/cform.php", $("#contact_form").serialize(),  function(data) {   });

                        $('#contact_form').fadeOut(500).delay(5000).fadeIn(500);
                        $('#contact_form').find("input[type=text], input[type=email], textarea").val("");
                        $('#success').hide().delay(500).html('<p>Message has been sent. Thank you!<p>').fadeIn(500).delay(4000).fadeOut(500);
                        
                    });
                    
                        // Twitter custom share button
                        $('.js_shareTW').click(function (event) {
                            var width = 575,
                                height = 400,
                                left = ($(window).width() - width) / 2,
                                top = ($(window).height() - height) / 2,
                                url = this.href,
                                dialog = 1,
                                opts = 'status=1' +
                                ',width=' + width +
                                ',height=' + height +
                                ',top=' + top +
                                ',left=' + left;

                            window.open(url, 'twitter', opts);

                            return false;
                        });
                }
            }
        }
    }

}

//Executes your code when the DOM is ready.  Acts the same as $(document).ready().
$(function(){
	Main.pageInit();
    setViewport();
    //var ww = $(window).width();
    //var ww2 = window.screen.width;
    //$('body').append('<p style="position: fixed; left: 0; top: 0; z-index: 1111; font-size: 20px; font-weight: bold;">'+$('#Viewport').attr('content')+'<br>---<br><br>'+ww+'/'+ww2+'--'+$('html').hasClass('mobile')+'</p>')
});
function transformScale (target, heightMultiplier, widthMultiplier) {
    $(target).each(function(){
        var windowHeight = $(window).outerHeight();
        var windowWidth = $(window).innerWidth();
        var scaleY = windowHeight/heightMultiplier/100;
        var scaleX = windowWidth/widthMultiplier/100;
        var scale = scaleY > scaleX ? scaleX : scaleY;
        var translateY = "";
        if ($(this).hasClass('js_getTranslateY')) {
            var translateY = 'translateY(-50%) ';
        };
        $(this).css('transform', translateY+'scale('+scale+')');
    });
}

function isDesktop(){
    var check = !(Detectizr.device.type == "mobile") && !(Detectizr.device.type == "tablet");
    return check
}
function isMobile(){
    var check = (Detectizr.device.type == "mobile") && (Detectizr.device.orientation == "portrait");
    return check;
}
function isMobileLandscape() {
    var check = (Detectizr.device.type == "mobile") && (Detectizr.device.orientation == "landscape");
    return check;
}
function isTablet(){
    var check = Detectizr.device.type == "tablet";
    return check;
}

function setViewport(){
    if( /Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent) ) {
      var ww = ( $(window).width() < window.screen.width ) ? $(window).width() : window.screen.width; //get proper width
      var mw = 750; // min width of site
      var ratio =  ww / mw; //calculate ratio
      if( ww <= mw){ //smaller than minimum size
       $('#Viewport').attr('content', 'initial-scale=' + ratio + ', maximum-scale=' + ratio + ', minimum-scale=' + ratio + ', user-scalable=yes, width=' + ww);
      }else{ //regular size
       $('#Viewport').attr('content', 'initial-scale=1.0, maximum-scale=2, minimum-scale=1.0, user-scalable=yes, width=' + ww);
      }
    }
}

function rearangeElements() {
    // Mobile only
    if (isMobile()) {
        // Rearange elements
        $('.js_section5-quoteGroup').insertAfter('.js_section5-logoGroup')
        $('.js_section2-text2').insertAfter('.js_section2-phoneWrap');
    };
    // Mobile only
    if (isMobileLandscape()) {
        // Rearange elements
        $('.js_section5-quoteGroup').insertBefore('.js_section5-logoGroup')
        $('.js_section2-text2').insertAfter('.js_section2-text1');
    };
};

function isInView(el) {
    var $elem = $(el);
    var $window = $(window);

    var docViewTop = $window.scrollTop();
    var docViewBottom = docViewTop + $window.height();

    var elemTop = $elem.offset().top;
    var elemBottom = elemTop + $elem.outerHeight();
    return ((elemTop <= docViewTop) && (docViewTop <= elemBottom));
}


function postToFeed() {
    var obj = {
        method: 'share',
        href: window.location.href
    };
    function callback(response) {
    }
    FB.ui(obj, callback);
}

function changeCSS(cssFile, cssLinkIndex) {

    var oldlink = document.getElementsByTagName("link").item(cssLinkIndex);

    var newlink = document.createElement("link");
    newlink.setAttribute("rel", "stylesheet");
    newlink.setAttribute("type", "text/css");
    newlink.setAttribute("href", cssFile);

    document.getElementsByTagName("head").item(0).replaceChild(newlink, oldlink);
}
