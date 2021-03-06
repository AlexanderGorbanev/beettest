<?php
get_header('second'); ?>
    <section id="blogContent">
        <div class="container-fluid">
            <div class="row main-row">
                <div class="col-md-9 col-sm-8 col-xs-12 blog-col">
                    <div class="wrapper text-center">
                    <?php $year = get_query_var('year');
                    $monthnum = get_query_var('monthnum');
                    $args = array(
                        'order' => 'ASC',
                        'year' => $year,
                        'monthnum' => $monthnum
                    ); 
                    $query = new WP_Query($args); 
                    if ($query->have_posts()) : 
                        while ($query->have_posts()) : $query->the_post(); ?>
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
                        wp_reset_postdata();
                    endif; ?>
                </div>
            </div>
            <div class="col-sm-3 col-sm-4 col-xs-12  sidebar-col">
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