<?php 
/* Template Name: Services */
get_header('second'); ?>
<section id="ServicesContent">
    <div class="container-fluid">

        <!-- PAGE TITLE -->
        <div class="row title-row">
            <div class="col-md-12 col-sm-12 col-xs-12 ">
                <h1 class="title text-center">
                    <?php the_field('services_title'); ?>
                </h1>
            </div>
        </div>

        <!-- SERVICES NAVIGATION -->
        <div class="row services-nav-row">
            <div class="col-md-12 col-sm-12 col-xs-12 ">
                <ul id="ServicesContentNav" class="text-center">
                    <?php $terms = get_terms('service');
                    $counter = 0;
                    foreach ($terms as $term) :
                        if ($counter === 0) : ?>
                            <li>
                        <?php else: ?>
                            <li>
                        <?php endif; ?>
                            <a href="<?= get_term_link($term->slug, 'service'); ?>">
                                <?= $term->name ?>
                            </a>
                        </li>
                        <?php $counter++;
                    endforeach; ?>
                </ul>
            </div>
        </div>
        <!-- SERVICES -->
        <?php $shownPosts = array();
        for ($i = 0; $i < 2; $i++) :
            if ($i === 0) : ?>
                <div class="row service-row first">
            <?php else: ?>
                <div class="row service-row">
            <?php endif; ?>
                <?php $args = array(
                    'post_type' => 'service_type',
                    'orderby' => 'rand'
                );
                $loop = new WP_Query($args);
                if ($loop -> have_posts()) :
                    $j = 0;
                    while ($loop -> have_posts()) : $loop -> the_post();
                        if (!in_array($post->ID, $shownPosts)) : ?>
                            <div class="col-md-4 col-sm-4 col-xs-4">
                                <div class="wrapper">
                                    <div class="service-name text-center">
                                        <?php the_title(); ?>
                                    </div>
                                    <div class="service-price text-center">
                                        <?php the_field('cpt_services_price'); ?>
                                    </div>
                                    <div class="service-description text-center">
                                        <?php the_field('cpt_services_description'); ?>
                                    </div>
                                </div>
                            </div>
                            <?php $j++;
                        endif;
                        $shownPosts[$j] = $post->ID;
                        if ($j === 3) :
                            break;
                        endif;
                    endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>
        <?php endfor; ?>
        <div class="row line-row">
            <div class="col-md-12">
                <hr/>
            </div>
        </div>

        <!-- SERVICE OPTIONS -->
        <?php if (have_rows('services_option')) :
            while (have_rows('services_option')) : the_row();
                $optionTitle = get_sub_field('services_option_title'); ?>
                <div class="row options-row">
                    <div class="col-md-12">
                        <h2 class="title text-center">
                            <?= $optionTitle ?>
                        </h2>
                        <div class="options text-center">
                            <?php if (have_rows('services_options_option')) :
                                while (have_rows('services_options_option')) : the_row();
                                    $optionName = get_sub_field('services_option_name');
                                    $optionPrice = get_sub_field('services_option_price'); ?>
                                    <div class="option">
                                        <div class="option-name text-center">
                                            <?= $optionName ?>
                                        </div>
                                        <div class="option-price text-center">
                                            <?= $optionPrice ?>
                                        </div>
                                    </div>
                                <?php endwhile;
                            endif; ?>
                        </div>
                        <hr/>
                    </div>
                </div>
            <?php endwhile;
        endif; ?>

        <!-- EXAMPLES -->
        <div class="row examples-title-row">
            <div class="col-md-12">
                <h2 class="title text-center">
                    <?php the_field('services_example_title'); ?>
                </h2>
            </div>
        </div>
        <div class="row examples-row">
            <div class="col-md-12">
                <?php if ((count(get_field('services_examples')) % 2) === 0) :
                    $itemsCount = count(get_field('services_examples')) / 2;
                    $itemsCountRight = count(get_field('services_examples')) / 2;
                else:
                    $itemsCount = intval(count(get_field('services_examples')) / 2) + 1;
                    $itemsCountRight = intval(count(get_field('services_examples')) / 2);
                endif; ?>
                <div class="wrapper">
                    <?php if (have_rows('services_examples')) :
                        $counter = 0; ?>
                        <ul id="examplesListLeft">
                            <?php while (have_rows('services_examples')) : the_row();
                                $exampleName = get_sub_field('services_example_name');
                                $exampleUrl = get_sub_field('services_example_url'); ?>
                                <li>
                                    <a href="<?= $exampleUrl ?>">
                                        <?= $exampleName ?>
                                    </a>
                                </li>
                                <?php $counter++;
                                if ($counter == $itemsCount) :
                                    break;
                                endif;
                            endwhile; ?>
                        </ul>
                    <?php endif;
                    if (have_rows('services_examples')) :
                        $counter = 0; ?>
                        <ul id="examplesListRight">
                            <?php while (have_rows('services_examples')) : the_row();
                                $exampleName = get_sub_field('services_example_name');
                                $exampleUrl = get_sub_field('services_example_url'); ?>
                                <li>
                                    <a href="<?= $exampleUrl ?>">
                                        <?= $exampleName ?>
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>  
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>