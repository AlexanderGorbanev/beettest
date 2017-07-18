<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mogul</title>
        
        <!-- BOOTSTRAP -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
        integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" 
        crossorigin="anonymous">
        <link rel="stylesheet" 
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
        integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r"
        crossorigin="anonymous">
        
        <!-- FONT AWESOME -->
        <link rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
    
        <!-- NAVIGATION -->
        <section id="Header">
            <a href="<?php the_field('header_top_menu_button_url', 'option'); ?>"
            class="header-button">
                <img src="<?php the_field('header_top_menu_button_image', 'option'); ?>"
                alt="Book Button"/>
            </a>
            <div class="mobile-menu">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
            <div class="TopNav">
                <?php wp_nav_menu('menu=general'); ?>
            </div>
            <!-- HEADER SECTION -->
            <div id="TopSection"
            style="background: url(<?php the_field('header_section_background', 'option'); ?>);">
                <div class="wrapper">
                    <div class="content">
                        <img src="<?php the_field('header_section_image', 'option'); ?>"
                        alt="Mogul Logo" />
                    </div>
                </div>
            </div>
        </section>
        