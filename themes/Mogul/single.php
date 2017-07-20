<?php
get_header('second'); ?>
    <section id="blogContent">
        <div class="container-fluid">
            <div class="row main-row">
                <div class="col-md-9 col-sm-8 col-xs-12 blog-col">
                    <div class="wrapper single text-center">
                    <?php if(have_posts()) : 
                        while (have_posts()) : the_post(); ?>
                            <div class="post">
                                <h2 class="post-title text-center">
                                    <?php the_title(); ?>
                                </h2>
                                <hr/>
                                <div class="post-content">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        <?php endwhile;
                    endif; ?>
                </div>
            </div>
            <div class="col-sm-3  col-sm-4 col-xs-12 sidebar-col">
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