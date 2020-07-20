<footer class="footer js-footer">
    <?php
    $footer_left_column = get_field('footer_left_column', 'option');
    $footer_right_column = get_field('footer_right_column', 'option');
    if (have_rows('footer_left_column', 'option') && have_rows('footer_right_column', 'option')) { ?>
        <div class="footer__row">
            <div class="footer__col">
                <img class="footer__image" src="<?php echo $footer_left_column['left_column_image']; ?>" alt="image">
                <div class="footer__container">
                    <div class="footer__logo">
                        <?php get_default_logo_link([
                            'name' => 'logo-white.svg',
                            'options' => [
                                'class' => 'logo-img',
                                'width' => 210,
                                'height' => 110,
                            ],
                        ])
                        ?>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="footer__social">
                                <?php echo $footer_left_column['left_column_social_text']; ?>
                                <?php echo do_shortcode('[bw-social]'); ?>
                            </div>
                            <div class="footer__phones">
                                <?php echo do_shortcode('[bw-phone]'); ?>
                            </div>
                            <div class="footer__field">
                                <?php
                                $address = get_theme_mod('bw_additional_address');
                                if (!empty($address)) { ?>
                                    <?php echo $address; ?>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <?php if (has_nav_menu('footer-nav')) { ?>
                                <div class="footer-nav">
                                    <?php wp_nav_menu(array(
                                        'theme_location' => 'footer-nav',
                                        'container' => false,
                                        'menu_class' => 'menu-container',
                                        'menu_id' => '',
                                        'fallback_cb' => 'wp_page_menu',
                                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                        'depth' => 1
                                    )); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__col">
                <img class="footer__image" src="<?php echo $footer_right_column['right_column_image']; ?>" alt="image">
            </div>
        </div>
    <?php } ?>
    <?php if (is_active_sidebar('footer-widget-area')) : ?>
        <div class="pre-footer">
            <div class="container">
                <div class="row">
                    <?php dynamic_sidebar('footer-widget-area'); ?>
                </div>
            </div>
        </div><!-- .pre-footer end-->
    <?php endif; ?>

    <div class="container">
        <div class="copyright">
            <div class="date">© NRG House. <?php echo date('Y'); ?>, усі права захищені</div>
            <div class="developer">
                Сайт розроблений
                <a href="https://brainworks.pro/" target="_blank">BrainWorks</a>
            </div>
        </div>
    </div>
</footer>

</div><!-- .wrapper end Do not delete! -->

<?php scroll_top(); ?>

<div class="is-hide"><?php svg_sprite(); ?></div>

<?php wp_footer(); ?>

</body>
</html>
