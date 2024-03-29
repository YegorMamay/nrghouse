<?php if (have_posts()): ?>
    <div class="js-ajax-posts">
        <?php while (have_posts()): the_post(); ?>
                    <article id="post_<?php the_ID() ?>" class="row">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <?php the_post_thumbnail('large'); ?>
                            <div class="sp-xs-3 sp-sm-0"></div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>
                                <div class="sp-xs-1"></div>
                                <p><?php the_excerpt(); ?></p>
                                <?php /*
                        <h5>
                          <em>
                            <span class="text-muted author"><?php _e('By', 'brainworks'); echo " "; the_author() ?>,</span>
                            <time  class="text-muted" datetime="<?php the_time('d-m-Y')?>"><?php echo get_option( 'date_format' ) ?></time>
                          </em>
                        </h5>
                        <p class="text-muted">
                            <i class="fa fa-folder-open-o"></i>&nbsp; <?php _e('Category', 'brainworks'); ?>: <?php the_category(', ') ?><br/>
                            <i class="fa fa-comment-o"></i>&nbsp; <?php _e('Comments', 'brainworks'); ?>: <?php comments_popup_link(__('None', 'brainworks'), '1', '%'); ?>
                        </p>
                    */ ?>
                            <div class="sp-xs-2"></div>
                            <a class="btn btn-secondary btn-sm"
                               href="<?php echo get_permalink(); ?>"><?php _e('Continue reading', 'brainworks') ?> <i
                                        class="glyphicon glyphicon-arrow-right"></i></a>
                        </div>
                    </article>
            <div class="sp-xs-2"></div>
            <hr>
            <div class="sp-xs-2"></div>
        <?php endwhile; ?>
    </div>

    <?php if (get_theme_mod('bw_load_more_enable') && function_exists('bw_load_more')) { ?>
        <div class="text-center"><?php bw_load_more(); ?></div>
    <?php } else {
        if (function_exists('bw_pagination')) {
            bw_pagination();
        } else {
            if (is_paged()) { ?>
                <ul class="pagination">
                    <li class="older"><?php next_posts_link('<i class="fa fa-arrow-left"></i> ' . __('Previous', 'brainworks')) ?></li>
                    <li class="newer"><?php previous_posts_link(__('Next', 'brainworks') . ' <i class="fa fa-arrow-right"></i>') ?></li>
                </ul>
            <?php }
        }
    } ?>

<?php else : ?>
    <?php get_template_part('loops/content', 'none'); ?>
<?php endif; ?>
