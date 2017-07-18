        <!-- FOOTER -->
        <footer>
            <div class="container-fluid">
                <div class="row main-row">
                    <div class="col-md-4 sign-up-col">
                        <div class="wrapper">
                            <div class="title text-center">
                                <?php the_field('footer_sign_title', 'option'); ?>
                            </div>
                            <div class="excerpt text-center">
                                <?php the_field('footer_sign_excerpt', 'option'); ?>
                            </div>
                            <div class="sign-up-form text-center">
                                <?php echo do_shortcode('[contact-form-7 id="156" title="Footer SingUp"]'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 contacts-col">
                        <div class="wrapper">
                            <div class="title text-center">
                                <?php the_field('footer_contacts_title', 'option'); ?>
                            </div>
                            <?php if (have_rows('footer_contacts_person', 'option')) :
                                while (have_rows('footer_contacts_person', 'option')) : the_row();
                                    $name = get_sub_field('footer_contacts_person_name');
                                    $position = get_sub_field('footer_contacts_person_position'); ?>
                                    <div class="person-name text-center">
                                        <?= $name ?>
                                    </div>
                                    <div class="person-position text-center">
                                        <?= $position ?>
                                    </div>
                                <?php endwhile;
                            endif; ?>
                            <div class="contacts text-center">
                                <?php if (have_rows('footer_contacts', 'option')) :
                                    while (have_rows('footer_contacts', 'option')) : the_row();
                                        $icon = get_sub_field('footer_contacts_icon');
                                        $contact = get_sub_field('footer_contacts_contact'); ?>
                                        <div class="contact">
                                            <span>
                                                <img src="<?= $icon ?>" alt="Icon"/>
                                                <?= $contact ?>
                                            </span>
                                        </div>
                                    <?php endwhile;
                                endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 socials-col">
                        <div class="wrapper">
                            <div class="title text-center">
                                <?php the_field('footer_social_title', 'option'); ?>
                            </div>
                            <div class="excerpt text-center">
                                <?php the_field('footer_social_excerpt', 'option'); ?>
                            </div>
                            <?php if (have_rows('footer_socials', 'option')) : ?>
                                <div class="socials text-center">
                                    <?php while (have_rows('footer_socials', 'option')) : the_row();
                                        $social = get_sub_field('footer_socials_icon');
                                        $socialUrl = get_sub_field('footer_socials_url'); ?>
                                        <a href="<?= $socialUrl ?>" target="_blank">
                                            <img src="<?= $social ?>" alt="Social Icon"/>
                                        </a>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        
        <!-- BOOTSTRAP -->
        <script type="text/javascript"
        src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" 
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
        <?php wp_footer(); ?>
    </body>
</html>