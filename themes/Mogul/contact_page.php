<?php 
/* Template Name: Contact */   
get_header('second'); ?>
<section id="CFeedbackSection">
    <a class="formButton" href="javascript:void(0);" id="CReviewButton">
        <img src="<?php the_field('c_review_img'); ?>"/>
    </a>
    <a class="formButton" href="javascript:void(0);" id="CAppointmentButton">
        <img src="<?php the_field('c_appointment_img'); ?>"/>
    </a>
    <div class="container">
        <!-- CONTACT FORMS -->
        <div class="feedback-form row">
            <div class="col-md-12 col-xs-12 col-sm-12 text-center">
                <div class="feedback-form">
                    <?php if (have_rows('contact_forms')) :
                        while (have_rows('contact_forms')) : the_row();
                            $title = get_sub_field('form_title');
                            $id = get_sub_field('form_id');
                            $form = get_sub_field('form_shortcode');?>
                            <div class="form-block col-md-12 col-xs-12 col-sm-12 text-center">
                                <div id="<?= $id ?>" class="changeForm">
                                    <div class="form-title">
                                        <?= $title ?>
                                    </div>

                                    <?= $form ?>
                                </div>
                            </div>
                        <?php endwhile;
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>