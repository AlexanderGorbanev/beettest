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
                var $menuIcon = $('i', '#Header .mobile-menu');
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
    $('.header-button', '#Header').hover(classNamespace.animateItem, classNamespace.animateItem);
    
    // FOOTER SOCIALS
    $('img', '#Footer .socials').hover(classNamespace.animateItem, classNamespace.animateItem);
    
    // MOBILE MENU
    $('i', '#Header .mobile-menu').on('click', classNamespace.showHideMobileMenu);
    
    // IN CASE OF RESIZE VIEWPORT
    $(window).resize(function() {
        
        // HIDE TOP MENU ON SMALL RESOLUTION
        if (($(window).width() < 674) &&
        !($('#menu-general').css("display") === "none")) {
            $('#menu-general').hide();
            
            // CHANGE MENU ICON ON BARS
            var $menuIcon = $('i', '#Header .mobile-menu');
            if ($menuIcon.hasClass("fa-times")) {
                $menuIcon.removeClass("fa-times");
                $menuIcon.addClass("fa-bars");
            }
        }
        
        // SHOW TOP MENU ON MEDIUM RESOLUTION
        if ($(window).width() > 673) {
            $('#menu-general').show();
        }
    });
    
    // ------------------------------
    // ----- FEEDBACK FORM PAGE -----
    // ------------------------------
    if ($('#FeedbackSection').is('#FeedbackSection')) {
        
        // FEEDBACK FORM PAGE EVENTS
        
        // SUBMIT BUTTON
        $('.submit-label', '#FeedbackSection table .submit')
        .hover(classNamespace.animateItem, classNamespace.animateItem);
    }
    
    // ------------------------
    // ----- CONTACT PAGE -----
    // ------------------------
    if ($('#CFeedbackSection').is('#CFeedbackSection')) {
        
        // POSITIONING AND SHOW AFTER POSITIONING
        // REVIEW AND APPOINTMENT BUTTONS FUNCTION
        function positioningButtons() {
            var $appointments = $('#CAppointmentButton'),
                $review = $('#CReviewButton');
            
            // VIEWPORT WIDTH <= 1100px AND > 508px
            if (($(window).width() <= 1100) && ($(window).width() > 508)) {
                $appointments.offset({
                    top: $('#Header').offset().top + $('#Header').height() + 164
                });
                $review.offset({
                    top: $('#Header').offset().top + $('#Header').height() + 328
                });
                $appointments.show();
                $review.show();
            }
            else {
                
                // VIEWPORT WIDTH <= 508px
                if ($(window).width() <= 508) {
                    $appointments.offset({
                        top: $('#Header').offset().top + $('#Header').height() + 180
                    });
                    $review.offset({
                        top: $('#Header').offset().top + $('#Header').height() + 180
                    });
                    $appointments.show();
                    $review.show();
                }
                
                // VIEWPORT WIDTH > 1100px
                else {
                    $appointments.offset({
                        top: $('#Header').offset().top + $('#Header').height() + 214
                    });
                    $review.offset({
                        top: $('#Header').offset().top + $('#Header').height() + 378
                    });
                    $appointments.show();
                    $review.show();
                }
            }
        }
        positioningButtons();
        
        // CLASS NAMESPACE
        var classNamespaceContact = {
            
            // SHOW CURRENT CONTACT FORM
            showContactForm: function() {
                var $titles = $('.title', '#CFeedbackSection .title-row .wrapper'),
                    $contactForms = $('.form', '#CFeedbackSection .feedback-form');
                
                // HIDE ALL CONTACT FORM TITLES
                for (var i = 0; i < $titles.length; i++) {
                    if (!($($titles[i]).css('display') === "none")) {
                        $($titles[i]).fadeOut('fast');
                    }
                }

                // HIDE ALL CONTACT FORMS
                for (var i = 0; i < $contactForms.length; i++) {
                    if (!($($contactForms[i]).css('display') === "none")) {
                        $($contactForms[i]).fadeOut('fast');
                    }
                }
                
                if ($(this).is('#CAppointmentButton')) {
                    
                    // SHOW BOOK APPOINTMENT TITLE
                    $('.appointment', '#CFeedbackSection .title-row .wrapper')
                    .fadeIn('slow');
                    
                    // SHOW BOOK APPOINTMENT CONTACT FORM
                    $('.appointment', '#CFeedbackSection .feedback-form')
                    .fadeIn('slow');
                }
                else {
                    if ($(this).is('#CReviewButton')) {
                        
                        // SHOW LEAVE A REVIEW TITLE
                        $('.review', '#CFeedbackSection .title-row .wrapper')
                        .fadeIn('slow');

                        // SHOW LEAVE A REVIEW CONTACT FORM
                        $('.review', '#CFeedbackSection .feedback-form')
                        .fadeIn('slow');
                    }
                }
            }
        };
        
        // CONTACT PAGE EVENTS
        
        // BOOK APPOINTMENT BUTTON
        $('#CAppointmentButton')
        .hover(classNamespace.animateItem, classNamespace.animateItem);
        $('#CAppointmentButton').on('click', classNamespaceContact.showContactForm);
        
        // LEAVE A REVIEW BUTTON
        $('#CReviewButton')
        .hover(classNamespace.animateItem, classNamespace.animateItem);
        $('#CReviewButton').on('click', classNamespaceContact.showContactForm);
        
        // IN CASE OF RESIZE VIEWPORT ON CONTACT PAGE
        $(window).resize(function() {

            // CALL POSITIONING REVIEW AND APPOINTMENT BUTTONS FUNCTION
            positioningButtons();
        });
    }
    
    // ------------------------
    // ----- REVIEWS PAGE -----
    // ------------------------
    if ($('#RReviews').is('#RReviews')) {
        
        // FEEDBACK FORM PAGE EVENTS
        
        // LEAVE A REVIEW BUTTON
        $('img', '#RReviews .button-row .button')
        .hover(classNamespace.animateItem, classNamespace.animateItem);
        
        // ADDITIONAL SITES
        $('img', '#RReviews .additional-row .site')
        .hover(classNamespace.animateItem, classNamespace.animateItem);
    }
    
    // --------------------------
    // ----- PORTFOLIO PAGE -----
    // --------------------------
    if ($('#PPortfolio').is('#PPortfolio')) {
        
        // ATTACH FANCYBOX
        $(".fancybox").fancybox({
            openEffect	: 'fade',
            closeEffect	: 'fade'
	});
    }
});