$(function() {

    // CLASS NAMESPACE
    var classNamespace = {
        
        // ANIMATE ITEM/STOP ANIMATION FUNCTION
        animateItem: function() {
            if ($(this).is('.animated', '.infinite', '.jello')) {
                $(this).removeClass('animated infinite jello');
            }
            else {
                $(this).addClass('animated infinite jello');
            }
        },
        
        // SHOW/HIDE MOBILE MENU
        showHideMobileMenu: function() {
            $('#menu-general').toggle('slow', function() {
                var $menuIcon = $('i', 'header .mobile-menu');
                if ($menuIcon.hasClass("fa-bars")) {
                    $menuIcon.removeClass("fa-bars");
                    $menuIcon.addClass("fa-times");
                }
                else {
                    if ($menuIcon.hasClass("fa-times")) {
                        $menuIcon.removeClass("fa-times");
                        $menuIcon.addClass("fa-bars");
                    }
                }
            });
        } 
    };

    // GLOBAL EVENTS
    
    // HEADER BUTTON
    $('.header-button', 'header').hover(classNamespace.animateItem, classNamespace.animateItem);
    
    // FOOTER SOCIALS
    $('img', 'footer .socials').hover(classNamespace.animateItem, classNamespace.animateItem);
    
    // MOBILE MENU
    $('i', 'header .mobile-menu').on('click', classNamespace.showHideMobileMenu);
    
    // IN CASE OF RESIZE VIEWPORT
    $(window).resize(function() {
        
        // HIDE TOP MENU ON SMALL RESOLUTION
        if (($(window).width() < 809) &&
        !($('#menu-general').css("display") === "none")) {
            $('#menu-general').hide();
            
            // CHANGE MENU ICON ON BARS
            var $menuIcon = $('i', 'header .mobile-menu');
            if ($menuIcon.hasClass("fa-times")) {
                $menuIcon.removeClass("fa-times");
                $menuIcon.addClass("fa-bars");
            }
        }
        
        // SHOW TOP MENU ON MEDIUM RESOLUTION
        if ($(window).width() > 810) {
            $('#menu-general').show();
        }
    });

    // ------------------------
    // ----- CONTACT PAGE -----
    // ------------------------
    $("#CAppointmentButton").click(function() {
        $("#CForm").css("display", "none");
        $(".changeForm").removeClass("active");
        $("#AForm").addClass("active");
    });

    $("#CReviewButton").click(function() {
        $("#CForm").css("display", "none");
        $(".changeForm").removeClass("active");
        $("#RForm").addClass("active");
    });

    
    // ------------------------
    // ----- REVIEWS PAGE -----
    // ------------------------
    if ($('#Reviews').is('#Reviews')) {
        
        // FEEDBACK FORM PAGE EVENTS
        
        // LEAVE A REVIEW BUTTON
        $('img', '#Reviews .button-row .button')
        .hover(classNamespace.animateItem, classNamespace.animateItem);
        
        // ADDITIONAL SITES
        $('img', '#Reviews .additional-row .site')
        .hover(classNamespace.animateItem, classNamespace.animateItem);
    }
    
    // --------------------------
    // ----- PORTFOLIO PAGE -----
    // --------------------------
    if ($('#Portfolio').is('#Portfolio')) {
        
        // ATTACH FANCYBOX
        $(".fancybox").fancybox({
            openEffect	: 'fade',
            closeEffect	: 'fade'
	});
    }
});