<?php 
/* Template Name: Contact */   
get_header('second'); ?>
<section id="CFeedbackSection">
    <a href="javascript:void(0);" id="CReviewButton">
        <img src="<?php the_field('c_review_img'); ?>"/>
    </a>
    <a href="javascript:void(0);" id="CAppointmentButton">
        <img src="<?php the_field('c_appointment_img'); ?>"/>
    </a>
    <div class="container-fluid">
        
        <!-- TITLES -->
        <div class="row title-row">
            <div class="col-md-12">
                <div class="wrapper">
                    <?php $args = array(
                        'post_type' => 'feedback_forms',
                        'order' => 'ASC'
                    ); 
                    $loop = new WP_Query($args);
                    if ($loop -> have_posts()) :
                        while ($loop -> have_posts()) : $loop -> the_post(); 
                            switch (get_the_title()) :
                                case "Book Your Appointment" : ?>
                                    <h1 class="title appointment text-center">
                                    <?php break;
                                case "Leave A Review" : ?>
                                    <h1 class="title review text-center">
                                    <?php break;
                                case "Contacts" : ?>
                                    <h1 class="title contacts text-center">
                                    <?php  break;
                            endswitch;
                                the_title(); ?>
                            </h1>
                        <?php endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </div>
            </div>
        </div>
        
        <!-- CONTACT FORMS -->
        <div class="feedback-form-row">
            <div class="col-md-12">
                <div class="feedback-form">
                    <?php $args1 = array(
                        'post_type' => 'feedback_forms',
                        'order' => 'ASC'
                    ); 
                    $loop1 = new WP_Query($args1);
                    if ($loop1 -> have_posts()) :
                        while ($loop1 -> have_posts()) : $loop1 -> the_post(); 
                            switch (get_the_title()) :
                                case "Book Your Appointment" : ?>
                                    <div class="form appointment">
                                    <?php break;
                                case "Leave A Review" : ?>
                                    <div class="form review">
                                    <?php break;
                                case "Contacts" : ?>
                                    <div class="form contacts">
                                    <?php  break;
                            endswitch;
                                the_content(); ?>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>