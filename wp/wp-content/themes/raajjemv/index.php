<?php
/**
 * Fallback template.
 *
 * @package RaajjeMV
 */

get_header();
?>

<div class="main-grid">
    <?php get_sidebar('left'); ?>
    <main class="content-main">
        <?php if (have_posts()) : ?>
            <div class="stream-list">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="card">
                        <a href="<?php the_permalink(); ?>"><?php echo raajjemv_fallback_thumbnail('medium'); ?></a>
                        <div>
                            <p class="card-kicker"><?php echo esc_html(get_the_date()); ?></p>
                            <h2 class="card-title-sm"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p class="card-excerpt"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 25)); ?></p>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            <div class="pagination"><?php the_posts_pagination(); ?></div>
        <?php else : ?>
            <p><?php esc_html_e('No posts found.', 'raajjemv'); ?></p>
        <?php endif; ?>
    </main>
    <?php get_sidebar('right'); ?>
</div>

<?php get_footer(); ?>
