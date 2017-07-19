<?php get_header('second');
if (have_posts()) :
    while (have_posts()) : the_post(); ?> 
        <section id="FeedbackSection">
            <div class="container-fluid">
                <div class="row title-row">
                    <div class="col-md-12">
                        <h1 class="title text-center">
                            <?php the_title(); ?>
                        </h1>
                    </div>
                </div>
                <div class="row feedback-form-row">
                    <div class="col-md-12">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile;
endif; 
get_footer(); ?>
