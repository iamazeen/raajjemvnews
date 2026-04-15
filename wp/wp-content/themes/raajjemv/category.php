<?php
/**
 * Category archive template.
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
            <h1 class="category-title"><?php single_cat_title(); ?></h1>
            <div class="chip-row">
                <?php
                $categories = get_categories(array('hide_empty' => true));
                foreach ($categories as $category) :
                    ?>
                    <a class="chip" href="<?php echo esc_url(get_category_link($category)); ?>">
                        <?php echo esc_html($category->name); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </header>

        <section class="category-layout">
            <?php if (have_posts()) : ?>
                <?php $first = true; ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php if ($first) : ?>
                        <article class="card category-feature-card">
                            <?php echo raajjemv_fallback_thumbnail('large'); ?>
                            <p class="card-kicker"><?php echo esc_html(get_the_date()); ?></p>
                            <h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p class="card-excerpt"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 32)); ?></p>
                        </article>
                        <?php $first = false; ?>
                    <?php else : ?>
                        <article class="card category-list-card">
                            <p class="card-kicker"><?php echo esc_html(get_the_date()); ?></p>
                            <h3 class="card-title-sm"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p class="card-excerpt"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 18)); ?></p>
                        </article>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php else : ?>
                <p><?php esc_html_e('No posts in this category yet.', 'raajjemv'); ?></p>
            <?php endif; ?>
        </section>

        <div class="pagination"><?php the_posts_pagination(); ?></div>
    </main>

    <?php get_sidebar('right'); ?>
</div>

<?php get_footer(); ?>
