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
<?php get_footer(); ?>
