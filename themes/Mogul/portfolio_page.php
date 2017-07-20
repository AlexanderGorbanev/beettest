<?php 
/* Template Name: Portfolio */   
get_header('second'); ?>
<section id="Portfolio">
    <div class="container-fluid">
        
        <!-- PAGE TITLE -->
        <div class="row title-row">
            <div class="col-md-12 col-sm-12 col-xs-12 ">
                <h1 class="title text-center">
                    <?php the_field('p_title'); ?>
                </h1>
            </div>
        </div>
        
        <!-- GALLERY NAV -->
        <div class="row gallery-nav-row">
            <div class="col-md-12  col-sm-12 col-xs-12 ">
                <?php $gallery1 = get_field_object('p_beauty');
                $gallery2 = get_field_object('p_bridal'); 
                $gallery3 = get_field_object('p_fashion');
                $gallery4 = get_field_object('p_candid'); ?>
                <ul id="PGalleryNav" class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#PGallery1">
                            <?= $gallery1['label'] ?>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#PGallery2">
                            <?= $gallery2['label'] ?>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#PGallery3">
                            <?= $gallery3['label'] ?>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#PGallery4">
                            <?= $gallery4['label'] ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row line-row">
            <div class="col-md-12 col-sm-12 col-xs-12 ">
                <hr/>
            </div>
        </div>
        
        <!-- GALLERIES -->
        <div class="row gallery-row">
            <div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="tab-content">

                    <!-- FIRST GALLERY -->
                    <div id="PGallery1" class="tab-pane fade in active gallery">
                        <?php $galleryA = get_field('p_beauty');
                        if ($galleryA) :
                            $counter = 0;
                            $flag = 0;
                            foreach ($galleryA as $img) : 
                                if ($counter === 0) : ?>
                                    <div class="row img-row">
                                        <div class="col-sm-2 col-sm-offset-1 text-center">
                                    <?php $flag = 1; 
                                else: ?>
                                    <div class="col-sm-2 text-center">
                                <?php endif; ?>
                                    <a class="fancybox" rel="gallery1" 
                                    href="<?= $img['url'] ?>">
                                        <img src="<?= $img['url'] ?>" alt="Gallery Image"/>
                                    </a>
                                </div>
                                <?php if ($counter === 4) : ?>
                                        </div>
                                    <?php $counter = 0;
                                    $flag = 0;
                                else :
                                    $counter++;
                                endif;   
                            endforeach;
                            if ($flag === 1) : ?>
                                </div>
                            <?php endif;
                        endif; ?>
                    </div>
                        
                    <!-- SECOND GALLERY -->
                    <div id="PGallery2" class="tab-pane fade gallery">
                        <?php $galleryB = get_field('p_bridal');
                        if ($galleryB) :
                            $counter = 0;
                            foreach ($galleryB as $img) : 
                                if ($counter === 0) : ?>
                                    <div class="row img-row">
                                        <div class="col-sm-2 col-sm-offset-1 text-center">
                                    <?php $flag = 1; 
                                else: ?>
                                    <div class="col-sm-2 text-center">
                                <?php endif; ?>
                                    <a class="fancybox" rel="gallery1" 
                                    href="<?= $img['url'] ?>">
                                        <img src="<?= $img['url'] ?>" alt="Gallery Image"/>
                                    </a>
                                </div>
                                <?php if ($counter === 4) : ?>
                                        </div>
                                    <?php $counter = 0;
                                    $flag = 0;
                                else :
                                    $counter++;
                                endif;   
                            endforeach;
                            if ($flag === 1) : ?>
                                </div>
                            <?php endif;
                        endif; ?>
                    </div>
                        
                    <!-- THIRD GALLERY -->
                    <div id="PGallery3" class="tab-pane fade gallery">
                        <?php $galleryC = get_field('p_fashion');
                        if ($galleryC) :
                            $counter = 0;
                            foreach ($galleryC as $img) : 
                                if ($counter === 0) : ?>
                                    <div class="row img-row">
                                        <div class="col-sm-2 col-sm-offset-1 text-center">
                                    <?php $flag = 1; 
                                else: ?>
                                    <div class="col-sm-2 text-center">
                                <?php endif; ?>
                                    <a class="fancybox" rel="gallery1" 
                                    href="<?= $img['url'] ?>">
                                        <img src="<?= $img['url'] ?>" alt="Gallery Image"/>
                                    </a>
                                </div>
                                <?php if ($counter === 4) : ?>
                                        </div>
                                    <?php $counter = 0;
                                    $flag = 0;
                                else :
                                    $counter++;
                                endif;   
                            endforeach;
                            if ($flag === 1) : ?>
                                </div>
                            <?php endif;
                        endif; ?>
                    </div>
                    
                    <!-- FOURTH GALLERY -->
                    <div id="PGallery4" class="tab-pane fade gallery">
                        <?php $galleryD = get_field('p_candid');
                        if ($galleryD) :
                            $counter = 0;
                            foreach ($galleryD as $img) : 
                                if ($counter === 0) : ?>
                                    <div class="row img-row">
                                        <div class="col-sm-2 col-sm-offset-1 text-center">
                                    <?php $flag = 1; 
                                else: ?>
                                    <div class="col-sm-2 text-center">
                                <?php endif; ?>
                                    <a class="fancybox" rel="gallery1" 
                                    href="<?= $img['url'] ?>">
                                        <img src="<?= $img['url'] ?>" alt="Gallery Image"/>
                                    </a>
                                </div>
                                <?php if ($counter === 4) : ?>
                                        </div>
                                    <?php $counter = 0;
                                    $flag = 0;
                                else :
                                    $counter++;
                                endif;   
                            endforeach;
                            if ($flag === 1) : ?>
                                </div>
                            <?php endif;
                        endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row line-row">
            <div class="col-md-12 col-sm-12 col-xs-12 ">
                <hr class="bottom-line"/>
            </div>
        </div>
                    
        <!-- BOTTOM TEXT -->
        <div class="row bottom-title-row">
            <div class="col-md-12 col-sm-12 col-xs-12 ">
                <h2 class="bottom-title text-center">
                    <?php the_field('p_bottom_title') ?>
                </h2>
            </div>
        </div>
        <div class="row bottom-text-row">
            <div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="bottom-text text-center">
                    <?php the_field('p_bottom_text'); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>