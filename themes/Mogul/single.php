<?php
get_header('second'); ?>
    <section id="blogContent">
        <div class="container-fluid">
            <div class="row main-row">
                <div class="col-md-9 col-sm-9 col-xs-9 blog-col">
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
            <div class="col-sm-3 sidebar-col">
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