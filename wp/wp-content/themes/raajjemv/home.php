<?php
/**
 * Posts index template.
 *
 * @package RaajjeMV
 */

get_header();
?>

<div class="main-grid">
    <?php get_sidebar('left'); ?>
    <main class="content-main">
        <header class="category-header">
            <p class="widget-title"><?php esc_html_e('Archive Category', 'raajjemv'); ?></p>
            <h1 class="category-title"><?php esc_html_e('Latest Records', 'raajjemv'); ?></h1>
            <p class="section-subtitle"><?php esc_html_e('Continuous updates from RaajjeMV desk and bureau network.', 'raajjemv'); ?></p>
        </header>

        <div class="stream-list">
            <?php if (have_posts()) : ?>
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
            <?php else : ?>
                <p><?php esc_html_e('No records found.', 'raajjemv'); ?></p>
            <?php endif; ?>
        </div>

        <div class="pagination"><?php the_posts_pagination(); ?></div>
    </main>
    <?php get_sidebar('right'); ?>
</div>

<?php get_footer(); ?>
