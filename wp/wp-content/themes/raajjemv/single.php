<?php
/**
 * Single article template.
 *
 * @package RaajjeMV
 */

get_header();
?>

<main class="article-layout">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article class="single-article">
                <p class="card-kicker"><?php echo wp_kses_post(get_the_category_list(' / ')); ?></p>
                <h1 class="article-title"><?php the_title(); ?></h1>
                <div class="article-meta">
                    <?php
                    printf(
                        /* translators: 1: author 2: date */
                        esc_html__('By %1$s - %2$s', 'raajjemv'),
                        esc_html(get_the_author()),
                        esc_html(get_the_date())
                    );
                    ?>
                </div>

                <?php echo raajjemv_fallback_thumbnail('large'); ?>

                <div class="entry-content">
                    <?php the_content(); ?>
                    <div class="cta-box">
                        <strong><?php esc_html_e('The story behind the story.', 'raajjemv'); ?></strong>
                        <p><?php esc_html_e('Join RaajjeMV premium to access exclusive records and full archive context.', 'raajjemv'); ?></p>
                    </div>
                </div>
            </article>

            <nav class="article-pagination" aria-label="<?php esc_attr_e('Post navigation', 'raajjemv'); ?>">
                <div>
                    <?php previous_post_link('%link', '← ' . esc_html__('Previous Record', 'raajjemv')); ?>
                </div>
                <div>
                    <?php next_post_link('%link', esc_html__('Next Record', 'raajjemv') . ' →'); ?>
                </div>
            </nav>

            <?php if (comments_open() || get_comments_number()) : ?>
                <?php comments_template(); ?>
            <?php endif; ?>

            <section class="related-section">
                <h2 class="card-title-sm"><?php esc_html_e('Related Records', 'raajjemv'); ?></h2>
                <div class="post-grid">
                    <?php
                    $related = new WP_Query(
                        array(
                            'post__not_in'   => array(get_the_ID()),
                            'posts_per_page' => 3,
                            'category__in'   => wp_get_post_categories(get_the_ID()),
                        )
                    );
                    if ($related->have_posts()) :
                        while ($related->have_posts()) :
                            $related->the_post();
                            ?>
                            <article class="card">
                                <?php echo raajjemv_fallback_thumbnail('medium'); ?>
                                <h3 class="card-title-sm"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            </article>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
