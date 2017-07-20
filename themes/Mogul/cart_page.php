<?php 
/* Template Name: Cart */
get_header('second'); ?>
<section id="CartContent">
    <div class="container-fluid">

        <!-- PAGE TITLE -->
        <div class="row title-row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <?php do_shortcode( '[woocommerce_cart]' );?>
            </div>
        </div>

     
        </div>
</section>
<?php get_footer(); ?>