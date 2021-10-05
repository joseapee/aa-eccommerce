// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// Place any jQuery/helper plugins in here.


// Section slider
// by Kirill Bunin (www.kirillbunin.com)
// for Cleevio.com
// v1.0
(function ($) {
 
    $.fn.sectionSlider = function( options ) {
 
        // This is the easiest way to have default options.
        var _ = $.extend({
            // These are the defaults.
            wrap: this,
            child: 'section'
        }, options );

        var $section = $(_.wrap).children(_.child);
        var numberOfChildren = $section.length - 1;
        var scrollInProgress = false;

        $section.not(':eq(0)').hide(); 
        $section.addClass('this-absoluteBox');

        // Set height to wraps
        $('#l_pageContentWrap').css('height', '100%');
        $('.l_pageContent').css('height', '100%');

        // Create nav
        $(_.wrap).append('<nav class="l_landingWrapNav js_transformScaleY js_getTranslateY">');
        var navWrap = $('.l_landingWrapNav');
        // Create linka for nav
        for (i = 0; i <= numberOfChildren; i++) {
            $(navWrap).append('<a href="#" data-target="'+i+'">');
            $section.filter(':nth-of-type('+(i+1)+')').data('index', i);
        };
        // Activate first link and section
        activateNav($(navWrap).children('a:first-child'));
        activateSection($section.filter(':first-of-type'));
        // Bind nav links
        $(navWrap).children('a').on('click', function(e){
            e.preventDefault();
            var dataTarget = $(this).data('target');
            if ( !scrollInProgress ) {
                // Activate link
                activateNav($(this));
                // Activate section
                activateSection($section[dataTarget]);
            }

        });
        // Bind logo
        $('.js_headerLogo').on('click', function(e){
            if ($('.l_landingWrap').length > 0) {
                e.preventDefault()
            }
            activateSection($section[0]);
        });
        // Bind footer arrow
        $('.js_intro-arrowDown').on('click', function(e){
            e.preventDefault();
            var current = getCurrent();
            activateSection(current.next(_.child));
        })
        // Bind scroll and key controller
        $(document)
            .on('mousewheel DOMMouseScroll swipedown swipeup', function(e){stateScrollController(e)})
            .on('keydown', function(e){stateKeyController(e)});
        function stateKeyController (e) {
            var $keyMapDown = {32: true, 34: true, 35: true, 40: true} // 32 space, 34 pgdown, 35 end, 40 arrowDown
            var $keyMapUp = {33: true, 36: true, 38: true} // 33 pgup, 36 home, 38 arrowUp
            
            if (!scrollInProgress) {
                var current = getCurrent();
                if (e.which in $keyMapDown) {
                    activateSection(current.next(_.child));
                } else if (e.which in $keyMapUp) {
                    activateSection(current.prev(_.child));
                }
            }
        };
        function stateScrollController (e) {
            var current = getCurrent();
            var delta = e.originalEvent.deltaY ? e.originalEvent.deltaY : e.originalEvent.detail;

            if (!scrollInProgress) {
                if (delta>0) {
                    activateSection(current.next(_.child));
                } else if (delta<0) {
                    activateSection(current.prev(_.child));
                }
            }
        };

        /*function clearActiveSection(){
            $section.removeClass('this-active');
        };*/
        function activateSection(target){
            var activeSection = getCurrent();
            if ( !(typeof(getIndex(target)) == 'undefined') && !(getIndex(target).length) && !scrollInProgress ) {
                scrollInProgress = true;
                // Inactivate section
                if (getIndex(target) > getCurrentIndex()) {
                    activeSection.addClass('this-goDown').removeClass('this-active');
                    setTimeout(function(){ activeSection.removeClass('this-goDown').hide(); }, 500);
                } else if (getIndex(target) < getCurrentIndex()) {
                    activeSection.addClass('this-goUp').removeClass('this-active');
                    setTimeout(function(){ activeSection.removeClass('this-goUp').hide(); }, 500);
                }
                // Activate footer on last section
                if (getIndex(target) == numberOfChildren) {
                    Main.Footer.showLast();
                } else {
                    Main.Footer.hideLast();
                }
                // If homepage activate header and side nav
                if (getIndex(target) == 0) {
                    Main.Footer.showIntro();
                } else {
                    Main.Footer.hideIntro();
                }
                // Activate targeted section
                $(target).show();
                setTimeout(function(){ $(target).addClass('this-active'); }, 50);
                // Activate nav
                activateNav($(navWrap).find('[data-target="'+getIndex(target)+'"]'));
                setTimeout(function(){ scrollInProgress = false; }, 1501)
            }
        };
        function activateNav(target) {
            $(navWrap).children('a').removeClass('this-active');
            target.addClass('this-active');
        }
        function getCurrent(){
            return $section.filter('.this-active');
        }
        function getCurrentIndex(){
            return $section.filter('.this-active').data('index');
        }
        function getIndex(el) {
            return $(el).data('index');
        }

    };
 
}(jQuery));

// Twitter slider
// by Kirill Bunin (www.kirillbunin.com)
// for Cleevio.com
// v1.0
(function ($) {
 
    $.fn.twitterSlider = function( options ) {
 
        // This is the easiest way to have default options.
        var _ = $.extend({
            // These are the defaults.
            target: this,
            wrap: '.js_section5-quoteWrap',
            child: '.child-quote',
            timing: 8000
        }, options );

        shuffle();
        activateThree();
        checkIfSet();

        function checkIfSet(){
            if (isSectionActive()) {
                setHeight();
                setTiming();
            } else {
                setTimeout(function(){
                    checkIfSet();
                }, 1000);
            }
        }

        function shuffle(){
            $(_.wrap).randomize(_.child);
        }

        function setTiming(){
            setTimeout(function(){
                goNext();
            }, _.timing);
        }

        function activateThree(){
            $(_.target).find(_.child+':lt(3)').addClass('this-active');
            $(_.target).find(_.child+'.this-active:last').nextAll().addClass('this-next');
        };

        function goNext(){
            $(_.target).find(_.child+'.this-active:first').removeClass('this-active').addClass('this-prev').prevAll().addClass('this-prev');
            $(_.target).find(_.child+'.this-active:last').next().removeClass('this-next').addClass('this-active').nextAll().addClass('this-next');
            setOffset();
            checkIfSet();
        }


        function setOffset(){
            var outerHeight = 0;
            if($(_.target).find(_.child+'.this-prev').length > 0){
                $(_.target).find(_.child+'.this-prev').each(function() {
                    outerHeight -= $(this).outerHeight();
                });
            }

            $('.js_section5-quoteWrap')
                .animate(
                    {top:outerHeight},
                    {
                        duration: 500,
                        easing: 'swing',
                        step: function(){$(this).css("overflow","visible");},
                        complete: function(){
                            $('.js_section5-quoteWrap').css('top', 0);
                            $(_.target).find(_.child+'.this-prev').appendTo($(_.target).find(_.wrap)).removeClass('this-prev');
                        }
                    }
                );
        }

        function setHeight(){
            var newHeight = 0;
            if($(_.target).find(_.child+'.this-active').length > 0){
                $(_.target).find(_.child+'.this-active').each(function() {
                    newHeight += $(this).outerHeight();
                });
            }

            $(_.target).animate({height:newHeight}, {duration: 500, easing: 'swing', step: function(){$(this).css("overflow","visible");}});
        }

        function isSectionActive(){
            return $(_.target).parents('.l_section').hasClass('this-active');
        }

    };
 
}(jQuery));


// Quotes slider
// by Kirill Bunin (www.kirillbunin.com)
// for Cleevio.com
// v1.0
(function ($) {
 
    $.fn.quotesSlider = function( options ) {
 
        // This is the easiest way to have default options.
        var _ = $.extend({
            // These are the defaults.
            target: this,
            timing: 5000
        }, options );


        var intervalLanding3 = setInterval(function(){setRandom();}, 5000);
        // Quotes
        $(_.target).on('click', function(e){
            e.preventDefault();
            var target = $(this).attr('href');
            resetActive();
            $(this).addClass('this-active');
            $('.js_section5-quoteGroup .child-quote .js_section5-quoteLink[href*="'+target+'"]').parents('.child-quote').addClass('this-active');
            resetInterval();
        }).on('click',function(e){
            e.preventDefault();
        });

        function resetActive () {
            $('.js_section5-quoteToggle').removeClass('this-active');
            $('.js_section5-quoteGroup .child-quote').removeClass('this-active');
        }
        function resetInterval() {
            clearInterval(intervalLanding3);
            intervalLanding3 = setInterval(function(){setRandom();}, 5000);
        }
        function setRandom() {
            var number = Math.floor((Math.random() * 6) + 1);
            resetActive();
            $('.js_section5-quoteGroup .child-quote:nth-child('+number+')').addClass('this-active');
            var href = $('.js_section5-quoteGroup .child-quote.this-active .js_section5-quoteLink').attr('href');
            $('.js_section5-logoGroup .js_section5-quoteToggle[href*="'+href+'"]').addClass('this-active');
        }

    };
 
}(jQuery));

 


(function($) {

$.fn.randomize = function(childElem) {
  return this.each(function() {
      var $this = $(this);
      var elems = $this.children(childElem);

      elems.sort(function() { return (Math.round(Math.random())-0.5); });  

      $this.detach(childElem);  

      for(var i=0; i < elems.length; i++)
        $this.append(elems[i]);      

  });    
}
})(jQuery);



function playVideo() {
                 $.magnificPopup.open({
                              items: {
                                src: 'https://www.youtube.com/watch?v=8BtNEAIjSyA'
                              },
                              type: 'iframe',
                              fixedContentPos: true,
                              mainClass: 'mfp-fade',
		                      removalDelay: 200,
                     
                       
                      callbacks: {
                        open: function() {
                            $('#content-wrap').foggy({blurRadius: 10, opacity: 0.8});
                            
                            new YT.Player('player', {
                                events: {
                                    'onStateChange': onPlayerStateChange
                                }
                            });
                            
                            
                            
                            $("body").bind("mousewheel", function() {return false;});
                            $(document).bind("touchmove", function(e){
                                    e.preventDefault();
                            });
                            
                        },
                        close: function() {
                           $('#content-wrap').foggy(false);
                           $('body').unbind("mousewheel");
                           $(document).unbind("touchmove");
                        }
                      } 
                }); 
}


function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.ENDED) {
        $.magnificPopup.close();
    }
}

