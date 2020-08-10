<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">

    <title>
        <?php
        if (is_front_page()) {
            echo bloginfo('name');
        } elseif (is_post_type_archive()) {
            echo post_type_archive_title();
        } elseif (!is_front_page() || !is_page()) {
            echo single_post_title();
        } elseif (!is_front_page() || !is_single()) {
            echo the_title();
        } elseif (is_front_page() && is_category()) {
            echo single_cat_title();
        }
        if (is_archive()) {
            echo single_cat_title();
        }
        ?>
    </title>

    <meta name="description" content="<?php bloginfo('description'); ?>">

    <!-- OpenGraph -->
    <meta property="og:locale" content="ru_RU"/>
    <meta property="og:locale:alternate" content="ru_RU"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="
    <?php
    if (is_front_page()) {
        echo bloginfo('name');
    } elseif (is_post_type_archive()) {
        echo post_type_archive_title();
    } elseif (!is_front_page() || !is_page()) {
        echo single_post_title();
    } elseif (!is_front_page() || !is_single()) {
        echo the_title();
    } elseif (is_front_page() && is_category()) {
        echo single_cat_title();
    }
    if (is_archive()) {
        echo single_cat_title();
    }
    ?>
    "/>
    <meta property="og:description" content="<?php bloginfo('description'); ?>">
    <meta property="og:url" content="<?php echo esc_url(site_url()); ?>"/>
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
    <meta property="og:image" content="<?php echo esc_url(the_post_thumbnail_url()); ?>"/>
    <meta property="og:image:secure_url" content="<?php echo esc_url(the_post_thumbnail_url()); ?>"/>
    <meta property="og:image:width" content="1200"/>
    <meta property="og:image:height" content="628"/>
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:title" content="
        <?php
    if (is_front_page()) {
        echo bloginfo('name');
    } elseif (is_post_type_archive()) {
        echo post_type_archive_title();
    } elseif (!is_front_page() || !is_page()) {
        echo single_post_title();
    } elseif (!is_front_page() || !is_single()) {
        echo the_title();
    } elseif (is_front_page() && is_category()) {
        echo single_cat_title();
    }
    if (is_archive()) {
        echo single_cat_title();
    }
    ?>
    "/>
    <meta name="twitter:image" content="<?php echo esc_url(the_post_thumbnail_url()); ?>"/>
    <!-- OpenGraph end-->
    <link rel="shortcut icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/favicon.ico'); ?>"
          type="image/x-icon">
    <link rel="icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/img/favicon.ico'); ?>"
          type="image/x-icon">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> id="top">

<?php wp_body_open(); ?>
<div class="wrapper js-container"><!--Do not delete!-->

    <header class="header">
        <div class="header__wrapper">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
                        <div class="logo-wrapper">
                            <div class="logo">
                                <?php get_default_logo_link([
                                    'name' => 'logo.svg',
                                    'options' => [
                                        'class' => 'logo-img',
                                        'width' => 135,
                                        'height' => 96,
                                    ],
                                ])
                                ?>
                            </div>
                            <div class="logo-description"><?php the_field('header_text_logo', 'option'); ?></div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
                        <div class="header__row">
                            <div class="header__top-block">
                                <?php echo do_shortcode('[bw-phone]'); ?>
                                <?php
                                $work_schedule = get_theme_mod('bw_additional_work_schedule');
                                if (!empty($work_schedule )) { ?>
                                    <div class="header__field">
                                        <img class="header__icon" src="/wp-content/themes/nrghouse/assets/img/calendar.svg" alt="icon">
                                        <?php echo $work_schedule; ?>
                                    </div>
                                <?php } ?>

                            </div>
                            <div class="header__bottom-block">
                                <?php if (has_nav_menu('main-nav')) { ?>
                                    <nav class="nav js-menu">
                                        <button type="button" tabindex="0"
                                                class="menu-item-close menu-close js-menu-close"></button>
                                        <?php wp_nav_menu(array(
                                            'theme_location' => 'main-nav',
                                            'container' => false,
                                            'menu_class' => 'menu-container',
                                            'menu_id' => '',
                                            'fallback_cb' => 'wp_page_menu',
                                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                            'depth' => 3
                                        )); ?>
                                    </nav>
                                <?php } ?>
                                <div class="social-wrapper">
                                <span class="social-wrapper__text">
                                    <?php the_field('header_text_social', 'option'); ?>
                                </span>
                                    <?php echo do_shortcode('[bw-social]'); ?>
                                </div>
                            </div>
                        </div>
                        <?php if (has_nav_menu('language-switcher')) { ?>
                            <nav class="nav js-menu">
                                <button type="button" tabindex="0"
                                        class="menu-item-close menu-close js-menu-close"></button>
                                <?php wp_nav_menu(array(
                                    'theme_location' => 'language-switcher',
                                    'container' => false,
                                    'menu_class' => 'menu-container',
                                    'menu_id' => '',
                                    'fallback_cb' => 'wp_page_menu',
                                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                    'depth' => 3
                                )); ?>
                            </nav>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php if( have_rows('header_nav', 'option') ) { ?>
        <div class="header-nav">
            <div class="container">
                <?php $header_nav = get_field('header_nav', 'option');
                $header_nav_count = count(get_field('header_nav', 'option'));
                ?>

                <div class="header-nav__wrapper">
                    <?php foreach ($header_nav as $items) { ?>
                        <a href="<?php echo $items['header_nav_link']; ?>" class="header-nav__item item-<?php echo $header_nav_count ?>">
                            <img class="header-nav__icon" src="<?php echo $items['header_nav_icon']; ?>" alt="icon">
                            <span class="header-nav__title"><?php echo $items['header_nav_title']; ?></span>
                        </a>
                    <?php wp_reset_postdata(); } ?>
                </div>
            </div>
        </div>
    <?php } ?>

    </header>

    <!-- Mobile menu start-->
    <div class="nav-mobile-header">
        <div class="logo">
            <?php get_default_logo_link([
                'name' => 'logo-white.svg',
                'options' => [
                    'class' => 'logo-img',
                    'width' => 120,
                    'height' => 60,
                ],
            ])
            ?>
        </div>
        <div class="mobile-phones">
            <?php echo do_shortcode('[bw-phone]'); ?>
        </div>
        <button class="hamburger js-hamburger" type="button" tabindex="0">
        <span class="hamburger-box">
            <span class="hamburger-inner"></span>
        </span>
        </button>
    </div>
    <?php if (has_nav_menu('second-menu')) { ?>
        <nav class="nav js-menu hide-on-desktop">
            <button type="button" tabindex="0" class="menu-item-close menu-close js-menu-close"></button>
            <?php wp_nav_menu(array(
                'theme_location' => 'second-menu',
                'container' => false,
                'menu_class' => 'menu-container',
                'menu_id' => '',
                'fallback_cb' => 'wp_page_menu',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth' => 1
            )); ?>
            <?php /* if (has_nav_menu('language-switcher')) { ?>
                <div class="mobile-language">
                    <?php wp_nav_menu(array(
                        'theme_location' => 'language-switcher',
                        'container' => false,
                        'menu_class' => 'menu-container',
                        'menu_id' => '',
                        'fallback_cb' => 'wp_page_menu',
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth' => 3
                    )); ?>
                </div>
            <?php } */ ?>
        </nav>
    <?php } ?>
    <div class="mobile-block">
        <div class="mobile-block__description"><?php the_field('header_text_logo', 'option'); ?></div>
        <?php
        $work_schedule = get_theme_mod('bw_additional_work_schedule');
        if (!empty($work_schedule )) { ?>
            <div class="mobile-block__field">
                <img class="mobile-block__icon" src="/wp-content/themes/nrghouse/assets/img/calendar.svg" alt="icon">
                <?php echo $work_schedule; ?>
            </div>
        <?php } ?>
        <div class="mobile-block__col">
            <?php the_field('header_text_social', 'option'); ?>
            <div class="social-mob"><?php echo do_shortcode('[bw-social]'); ?></div>
        </div>
    </div>
    <!-- Mobile menu end-->
    <?php if ( class_exists( 'WooCommerce' ) ) { ?>
    <input id="cyr-value" type="hidden" value='<?php echo get_woocommerce_currency_symbol(); ?>'/>
    <?php } ?>