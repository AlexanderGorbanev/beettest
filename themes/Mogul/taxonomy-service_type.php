<?php get_header('second');
$servicePage = get_page_by_title('PT: Services'); ?>

<section id="ServicesContent">
    <div class="container-fluid">
        
        <!-- PAGE TITLE -->
        <div class="row title-row">
            <div class="col-md-12">
                <h1 class="title text-center">
                    <?php the_field('s_title', $servicePage->ID); ?>
                </h1>
            </div>
        </div>
        
        <!-- SERVICES NAVIGATION -->
        <div class="row services-nav-row">
            <div class="col-md-12">
                <ul id="ServicesContentNav" class="text-center">
                    <?php $terms = get_terms('service');
                    $counter = 0;
                    foreach ($terms as $term) : 
                        if ($counter === 0) : ?>
                            <li class="first">
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
        <?php $currentSlug = get_query_var('term'); ?>
        <?php foreach ($terms as $term) :
            wp_reset_query();
            if($term->slug === $currentSlug) :
                $offset = 0; 
                $counter = 0;
                while (true) : 
                    if ($counter === 0) : ?>
                        <div class="row service-row first">
                        <?php $counter++;
                    else: ?>
                        <div class="row service-row">
                    <?php endif;
                        $args = array(
                            'post_type' => 'service_type',
                            'order' => 'ASC',
                            'posts_per_page' => 3,
                            'offset' => $offset,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'service',
                                    'field' => 'slug',
                                    'terms' => $term->slug,
                                ),
                            )
                        ); 
                        $loop = new WP_Query($args);
                        if ($loop -> have_posts()) : 
                            while ($loop -> have_posts()) : $loop -> the_post(); ?>
                                <div class="col-md-4 col-sm-4">
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
                                <?php $offset++;
                            endwhile;
                            wp_reset_postdata();
                        else:
                            break;
                        endif; ?>
                    <div> <!-- row -->
                <?php endwhile; ?>
        
                
                    
                <?php  
                $loop = new WP_Query($args);
                if ($loop -> have_posts()) : 
                    while ($loop -> have_posts()) : $loop -> the_post(); ?>
                        <h1>
                            <?php the_title(); ?>
                        </h1>
                    <?php endwhile;
                endif; ?>
                
        
        
        
        
            <?php endif; ?>
        <?php  endforeach; ?>
        
        <div class="row line-row"> 
            <div class="col-md-12">
                <hr/>
            </div>
        </div>
                    
        <!-- SERVICE OPTIONS -->
        <?php if (have_rows('services_option', $servicePage->ID)) :
            while (have_rows('services_option', $servicePage->ID)) : the_row();
                $optionTitle = get_sub_field('services_option_title'); ?>
                <div class="row options-row">
                    <div class="col-md-12">
                        <h2 class="title text-center">
                            <?= $optionTitle ?>
                        </h2>
                        <div class="options text-center">
                            <?php if (have_rows('services_options_option', $servicePage->ID)) :
                                while (have_rows('services_options_option', $servicePage->ID)) : the_row();
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
                    <?php the_field('services_examples_title', $servicePage->ID); ?>
                </h2>
            </div>
        </div>
        <div class="row examples-row">
            <div class="col-md-12">
                <?php if ((count(get_field('services_examples', $servicePage->ID)) % 2) === 0) :
                    $itemsCount = count(get_field('services_examples', $servicePage->ID)) / 2;
                    $itemsCountRight = count(get_field('services_examples', $servicePage->ID)) / 2;
                else:
                    $itemsCount = intval(count(get_field('services_examples', $servicePage->ID)) / 2) + 1;
                    $itemsCountRight = intval(count(get_field('services_examples', $servicePage->ID)) / 2);
                endif; ?>
                <div class="wrapper">
                    <?php if (have_rows('services_examples', $servicePage->ID)) :
                        $counter = 0; ?>
                        <ul id="SExamplesLeft">
                            <?php while (have_rows('services_examples', $servicePage->ID)) : the_row();
                                $exampleName = get_sub_field('services_examples_name');
                                $exampleUrl = get_sub_field('services_examples_url'); ?>
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
                    if (have_rows('services_examples', $servicePage->ID)) :
                        $counter = 0; ?>
                        <ul id="SExamplesRight">
                            <?php while (have_rows('services_examples', $servicePage->ID)) : the_row();
                                $exampleName = get_sub_field('services_examples_name');
                                $exampleUrl = get_sub_field('services_examples_url'); ?>
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