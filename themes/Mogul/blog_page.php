<?php 
/* Template Name: Blog */
get_header('second'); ?>
    <section id="blogContent">
        <div class="container-fluid">
            <div class="row main-row">
                <div class="col-md-9 col-sm-8 col-xs-12 blog-col">
                    <div class="wrapper text-center">
                        <div class="row">
                            <?php
                            $args  = array(
                                'posts_per_page' => -1 );
                            $query = new WP_Query($args);
                            if ($query->have_posts()): ?>
                            <?php
                            while ($query->have_posts()):
                                $query->the_post(); ?>

                                <div class="widgetPost">
                                    <div class="widgetPostTitle">
                                        <div class="col-md-12 col-sm-12 col-xs-12 blogTitle">
                                            <h3><?php the_title(); ?></h3>
                                        </div>
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-sm-12 sidebar-col">
                    <?php if (is_active_sidebar('sidebar_side')) : ?>
                        <aside id="blogSidebar">
                            <?php dynamic_sidebar('sidebar_side'); ?>
                        </aside>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>