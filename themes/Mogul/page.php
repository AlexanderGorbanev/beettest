<?php
/**
 * Page
 */
get_header('second'); ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <article <?php post_class(); ?>>
                        <h1 class="page_title"><?php the_title(); ?></h1>
                        <?php if ( has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
                        <?php endif; ?>
                        <?php the_content(); ?>
                    </article>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>