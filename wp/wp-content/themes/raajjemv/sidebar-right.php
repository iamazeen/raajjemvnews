<?php
/**
 * Right sidebar.
 *
 * @package RaajjeMV
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<aside class="sidebar-right">
    <?php
    $right_posts = new WP_Query(
        array(
            'posts_per_page'      => 6,
            'post_status'         => 'publish',
            'ignore_sticky_posts' => true,
        )
    );
    ?>
    <section class="widget home-right-panel">
        <h3 class="widget-title"><?php esc_html_e('Recent Posts', 'raajjemv'); ?></h3>
        <?php if ($right_posts->have_posts()) : ?>
            <?php $is_first = true; ?>
            <?php while ($right_posts->have_posts()) : $right_posts->the_post(); ?>
                <?php if ($is_first) : ?>
                    <article class="right-feature">
                        <a href="<?php the_permalink(); ?>" class="right-feature-thumb">
                            <?php echo raajjemv_fallback_thumbnail('medium'); ?>
                        </a>
                        <p class="card-kicker"><?php echo esc_html(get_the_date()); ?></p>
                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    </article>
                    <?php $is_first = false; ?>
                <?php else : ?>
                    <article class="right-list-item">
                        <a href="<?php the_permalink(); ?>" class="right-list-thumb">
                            <?php echo raajjemv_fallback_thumbnail('thumbnail'); ?>
                        </a>
                        <div class="right-list-copy">
                            <p class="card-kicker"><?php echo esc_html(get_the_date()); ?></p>
                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        </div>
                    </article>
                <?php endif; ?>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p class="card-excerpt"><?php esc_html_e('Publish posts to populate the right panel.', 'raajjemv'); ?></p>
        <?php endif; ?>
    </section>
</aside>
