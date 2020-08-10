<?php
/**
 * Template Name: Home Page
 **/
?>

<?php get_header(); ?>
<?php get_template_part('loops/content', 'home'); ?>
<section class="top-section">
    <div class="container">
        <div class="top-section__wrapper">
            <div class="top-section__row">
                <div class="top-section__col">
                    <h2 class="top-section__title h1"><?php echo get_post_meta(get_the_ID(), 'about_company_title', true); ?></h2>
                    <div class="block-advantages">
                        <?php
                        $advantages_list = get_field('advantage_list');
                        $company_image = get_field('about_company_image');
                        ?>
                        <?php foreach ($advantages_list as $items) { ?>
                        <div class="block-advantages__item">
                            <img class="block-advantages__icon" src="<?php echo $items['advantage_icon']; ?>" alt="icon">
                            <div class="block-advantages__title"><?php echo $items['advantage_title']; ?></div>
                        </div>
                        <?php } wp_reset_postdata(); ?>
                    </div>
                </div>
                <div class="top-section__col">
                    <div class="top-section__description-block">
                        <img class="top-section__icon" src="/wp-content/themes/nrghouse/assets/img/video.svg" alt="icon">
                        <p class="top-section__description"><?php echo get_post_meta(get_the_ID(), 'about_company_description', true); ?></p>
                        <p class="top-section__text"><?php echo get_post_meta(get_the_ID(), 'about_company_text', true); ?></p>
                    </div>
                    <div class="top-section__middle-block">
                        <img class="top-section__image" src="<?php echo $company_image; ?>" alt="image">
                        <button type="button" class="top-section__button js-toggle-request"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="categories-wrapper">
    <div class="container">
        <?php $categories_list = get_field('categories_list'); ?>
        <div class="row">
            <div class="col-12">
                <div class="categories-caption">
                    <h2 class="categories-caption__title h1"><?php echo get_post_meta(get_the_ID(), 'categories_main_title', true); ?></h2>
                    <div class="categories-caption__wrapper">
                        <img class="categories-caption__icon" src="/wp-content/themes/nrghouse/assets/img/comfort.svg"
                             alt="icon">
                        <div class="categories-caption__description">
                            <?php echo get_post_meta(get_the_ID(), 'categories_main_description', true); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php foreach ($categories_list as $category) { ?>
                <div class="col-6 col-md-6 col-lg-4">
                    <a href="<?php echo $category['categories_link']; ?>" class="categories-item">
                        <div class="categories-item__image-wrapper">
                            <img class="categories-item__main-image"
                                 src="<?php echo $category['categories_main_image']; ?>" alt="image">
                            <img class="categories-item__second-image"
                                 src="<?php echo $category['categories_hover_image']; ?>" alt="image">
                        </div>
                        <div class="categories-item__title"><?php echo $category['categories_title']; ?></div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<section class="block-services">
    <div class="block-services__row">
        <div class="block-services__col">
            <div class="block-services__container">
                <h2 class="block-services__title h1"><?php echo get_post_meta(get_the_ID(), 'services_title', true); ?></h2>
                <div class="services-tabs">
                    <?php
                    $tab_list = get_field('services_tabs');
                    $tab_count = 0;
                    $tab_content = 0;
                    ?>
                    <?php foreach ($tab_list as $list_item) { ?>
                        <button data-tab="#tab<?php echo $tab_count; ?>"
                                class="services-tabs__item<?php if ($tab_count == 0) { ?> active<?php } ?>"
                                type="button"><?php echo $list_item['services_tabs_title']; ?></button>
                        <div class="tab-mobile<?php if ($tab_count == 0) { ?> active<?php } ?>">
                            <div class="tab-mobile__container">
                                <div class="services-content__description-block">
                                    <img class="services-content__icon"
                                         src="/wp-content/themes/nrghouse/assets/img/quality.svg" alt="icon"/>
                                    <div class="services-content__description"><?php echo $list_item['services_tabs_content']['services_tabs_description']; ?></div>
                                </div>
                                <div class="tab-mobile__image-wrapper">
                                    <img class="tab-mobile__image"
                                         src="<?php echo $list_item['services_tabs_content']['services_tabs_image']; ?>" alt="image">
                                </div>
                                <div class="tab-mobile__wrapper">
                                    <p class="tab-mobile__title"><?php echo $list_item['services_tabs_title']; ?></p>
                                    <div class="tab-mobile__description">
                                        <div class="tab-mobile__text"><?php echo $list_item['services_tabs_content']['services_tabs_text']; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $tab_count++; ?>
                    <?php }
                    wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
        <div class="block-services__col">
            <div class="block-services__container">
                <div class="services-content">
                    <?php foreach ($tab_list as $content) { ?>
                        <div id="tab<?php echo $tab_content; ?>"
                             class="services-content__item<?php if ($tab_content == 0) { ?> active<?php } ?>">
                            <div class="services-content__item-wrapper">
                                <div class="services-content__description-block">
                                    <img class="services-content__icon"
                                         src="/wp-content/themes/nrghouse/assets/img/quality.svg" alt="icon"/>
                                    <div class="services-content__description"><?php echo $content['services_tabs_content']['services_tabs_description']; ?></div>
                                </div>
                                <div class="services-content__image-wrapper">
                                    <img class="services-content__image"
                                         src="<?php echo $content['services_tabs_content']['services_tabs_image']; ?>" alt="image">
                                </div>
                                <div class="services-content__middle-block">
                                    <p class="services-content__title-horizontal"><?php echo $content['services_tabs_title']; ?></p>
                                    <div class="services-content__container">
                                        <p class="services-content__title-vertical"><?php echo $content['services_tabs_title']; ?></p>
                                        <div class="services-content__wrapper">
                                            <div class="services-content__text"><?php echo $content['services_tabs_content']['services_tabs_text']; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $tab_content++; ?>
                    <?php }
                    wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bottom-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-12 col-lg-6">
                <div class="bottom-section__image-wrapper">
                    <img class="bottom-section__image" src="<?php echo get_field('bottom_block_image'); ?>" alt="image">
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6">
                <h2 class="bottom-section__title h3"><?php echo get_post_meta(get_the_ID(), 'bottom_block_title', true); ?></h2>
                <div class="bottom-section__description"><?php echo get_post_meta(get_the_ID(), 'bottom_block_description', true); ?></div>
                <?php $order_form = get_field('bottom_block_form'); ?>
                <div class="bottom-section__form-wrapper" id="order-form">
                    <?php echo do_shortcode($order_form); ?>
                </div>
                <div class="bottom-section__description-bottom h3"><?php echo get_post_meta(get_the_ID(), 'bottom_block_text', true); ?></div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
<script>

    (function ($) {

        var servicesTabs =  $('.services-tabs__item');
        var servicesTabContent = $('.services-content__item');
        var servicesMobileContent = $('.tab-mobile');

        if($(window).width() < 1200) {

            servicesTabs.on('click', function () {

                var currentTab = $(this).next();

                servicesTabs.not($(this)).removeClass('active');
                $(this).toggleClass('active');
                servicesMobileContent.not(currentTab).slideUp('linear');
                currentTab.slideToggle('linear');
            });
        } else {

            servicesTabs.on('click', function () {

                var currentTab = $(this).attr('data-tab');

                servicesTabs.not($(this)).removeClass('active');
                $(this).addClass('active');
                servicesTabContent.hide();
                servicesTabContent.removeClass('active');
                $(currentTab).fadeIn(800);
                $(currentTab).addClass('active');
            });
        }

    })(jQuery);

</script>
