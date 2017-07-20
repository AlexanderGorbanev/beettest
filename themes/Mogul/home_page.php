<?php 
/* Template Name: Home */
get_header(); ?>
<section id="HP_Content">
    
    <!-- TITLE -->
    <div class="container-fluid">
        <div class="row title-row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h1 class="title text-center">
                    <?php the_field('home_page_content_title'); ?>
                </h1>
            </div>
        </div>
        
        <?php if (have_rows('home_page_content_block')) :
            $counter = 0;
            while (have_rows('home_page_content_block')) : the_row(); 
                $contentText = get_sub_field('home_page_content_block_text');
                $contentImg = get_sub_field('home_page_content_block_image'); ?>
                <div class="row content_block_row">
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        <div class="wrapper text-center">
                            <?php if ($counter === 0) : ?>
                                <div class="content_block_text first-paragraph">
                            <?php else : ?>
                                <div class="content_block_text">
                            <?php endif; ?>
                                <?= $contentText ?>
                                </div>
                            <?php if (!empty($contentImg)) : ?>
                                <div class="content_block_img">
                                    <img src="<?= $contentImg ?>" alt="Content block Image"/>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php $counter++;
            endwhile;
        endif; ?>

        <div class="row content_editor_row">
                <div class="wrapper">
                    <div class="content_editor_photo text-center">
                        <img src="<?php the_field('home_page_content_editor_photo') ?>"/>
                    </div>
                    <div class="content_editor text-center">
                        <?php the_field('home_page_content_editor_info'); ?>
                    </div>
                    <div class="content_editor_contacts text-center">
                        <a class="content_editor_contacts_mail" href="mailto:<?php the_field('home_page_content_editor_mail'); ?>"><?php the_field('home_page_content_editor_mail'); ?></a>
                        <a class="content_editor_contacts_other" href="tel:<?php the_field('home_page_content_editor_other'); ?>"><?php the_field('home_page_content_editor_other'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>