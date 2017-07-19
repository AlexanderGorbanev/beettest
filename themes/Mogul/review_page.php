<?php 
/* Template Name: Review */   
get_header('second'); ?>
<section id="Reviews">
    <div class="container-fluid">
        <div class="row title-row">
            <div class="col-md-12">
                <h1 class="title text-center">
                    <?php the_field('reviews_title'); ?>
                </h1>
            </div>
        </div>

        <?php if (have_rows('reviews')) : 
            $offset = 0;
            $rowsAmount = count(get_field('reviews'));
            while (true) :
                $i = 0;
                $counter = 0; ?>
                <div class="row reviews-row">
                    <?php while (have_rows('reviews')) : the_row();
                        $startText = get_sub_field('reviews_start_text');
                        $text = get_sub_field('reviews_text');
                        $author = get_sub_field('reviews_author');
                        $location = get_sub_field('reviews_location');
                        if ($i >= $offset) : ?>
                            <div class="col-md-6">
                                <?php if (($i % 2) === 0) : ?>
                                    <div class="wrapper left text-center">
                                <?php else: ?>
                                    <div class="wrapper text-center">
                                <?php endif; ?>
                                    <div class="review-text">
                                        <span>
                                            <?= $startText ?>
                                        </span>
                                        <?= $text ?>
                                    </div>
                                    <div class="author-info">    
                                        <span class="name">
                                            <?= $author ?>
                                        </span>
                                        <span class="location">
                                            <?= $location ?>
                                        </span>
                                    </div>    
                                </div>
                            </div>
                            <?php $offset++;
                            $counter++;
                        endif; ?>
                        <?php $i++;
                        if ($counter === 2) :
                            break;
                        endif;
                    endwhile; ?>
                </div>
                <?php if ($offset == $rowsAmount) : 
                    break;
                endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
        
        <!-- BUTTON ROW -->
        <div class="row button-row">
            <div class="col-md-12">
                <div class="button text-center">
                    <a href="/feedback_forms/leave-a-review/">
                        <img src="<?php the_field('r_button_image'); ?>" 
                        alt="Review Button"/>
                    </a>
                </div>
            </div>
        </div>
        <div class="row additional-row">
            <div class="col-md-12">
                <div class="additional-title">
                    <h2 class="text-center">
                        <?php the_field('r_additional_title'); ?>
                    </h2>
                </div>
                <div class="additional-sites">
                    <?php if (have_rows('r_additional')) :
                        $counter = 0;
                        while (have_rows('r_additional')) : the_row();
                            $siteIcon = get_sub_field('r_additional_icon');
                            $siteUrl = get_sub_field('r_additional_url');
                            if ($counter === 0) : ?>
                                <div class="site first">
                            <?php else: ?>
                                <div class="site">
                            <?php endif; ?>
                                <div class="line"></div>
                                <a href="<?= $siteUrl ?>">
                                    <img src="<?= $siteIcon ?>" alt="Site Icon"/>
                                </a>
                            </div>
                            <?php $counter++;
                        endwhile;
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>