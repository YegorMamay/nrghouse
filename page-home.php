<?php
/**
 * Template Name: Home Page
 **/
?>

<?php get_header(); ?>
<?php get_template_part('loops/content', 'home'); ?>
<div class="categories-wrapper">
    <div class="container">
        <?php $categories_list = get_field('categories_list'); ?>
        <div class="row">
            <div class="col-12">
                <div class="categories-caption">
                    <h2 class="categories-caption__title h1"><?php echo get_post_meta(get_the_ID(), 'categories_main_title', true); ?></h2>
                    <div class="categories-caption__wrapper">
                        <img class="categories-caption__icon" src="/wp-content/themes/nrghouse/assets/img/comfort.svg" alt="icon">
                        <div class="categories-caption__description">
                            <?php echo get_post_meta(get_the_ID(), 'categories_main_description', true); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php foreach ($categories_list as $category) { ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <a href="<?php echo $category['categories_link']; ?>" class="categories-item">
                        <div class="categories-item__image-wrapper">
                            <img class="categories-item__main-image" src="<?php echo $category['categories_main_image']; ?>" alt="image">
                            <img class="categories-item__second-image" src="<?php echo $category['categories_hover_image']; ?>" alt="image">
                        </div>
                        <div class="categories-item__title"><?php echo $category['categories_title']; ?></div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="block-services">
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
                        <button data-tab="tab<?php echo $tab_count; ?>" class="services-tabs__item" type="button"><?php echo $list_item['services_tabs_title']; ?></button>
                        <?php $tab_count++; ?>
                    <?php } wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
        <div class="block-services__col">
            <div class="block-services__container">
                <div class="services-content">
                    <?php foreach ($tab_list as $content) { ?>
                        <div id="tab<?php echo $tab_content; ?>" class="services-content__item<?php if($tab_content == 0) { ?> active<?php } ?>">
                            <div class="services-content__description-block">
                                <img class="services-content__icon" src="/wp-content/themes/nrghouse/assets/img/quality.svg" alt="icon"/>
                                <div class="services-content__description"><?php echo $content['services_tabs_content']['services_tabs_description']; ?></div>
                            </div>
                            <div class="services-content__image-wrapper">
                                <img class="services-content__image" src="<?php echo $content['services_tabs_content']['services_tabs_image']; ?>">
                            </div>
                            <div class="services-content__middle-block">
                                <p class="services-content__title-horizontal"><?php echo $content['services_tabs_title']; ?></p>
                                <p class="services-content__title-vertical"><?php echo $content['services_tabs_title']; ?></p>
                                <div class="services-content__wrapper">
                                    <div class="services-content__text"><?php echo $content['services_tabs_content']['services_tabs_text']; ?></div>
                                </div>
                            </div>
                        </div>
                        <?php $tab_content++; ?>
                    <?php } wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
