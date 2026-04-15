<?php
/**
 * Front page template.
 *
 * @package RaajjeMV
 */

get_header();
?>

<main class="content-main">
    <div class="home-top-grid">
        <?php get_sidebar('left'); ?>

        <section class="home-top-content">
        <?php
        $hero_query = new WP_Query(
            array(
                'posts_per_page' => 1,
            )
        );
        ?>

        <section class="hero">
            <div class="hero-layout">
                <article class="hero-main">
                    <?php if ($hero_query->have_posts()) : ?>
                        <?php $hero_query->the_post(); ?>
                        <p class="hero-kicker"><?php esc_html_e('Top Story', 'raajjemv'); ?></p>
                        <h1 class="hero-title"><?php the_title(); ?></h1>
                        <p class="hero-desc"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 24)); ?></p>
                        <div class="hero-actions">
                            <a class="btn-primary" href="<?php the_permalink(); ?>"><?php esc_html_e('Read Full Story', 'raajjemv'); ?></a>
                            <span class="hero-meta"><?php echo esc_html(get_the_date()); ?></span>
                        </div>
                    <?php else : ?>
                        <p class="hero-kicker"><?php esc_html_e('Featured Story', 'raajjemv'); ?></p>
                        <h1 class="hero-title"><?php esc_html_e('Set your latest post to show the lead headline.', 'raajjemv'); ?></h1>
                        <p class="hero-desc"><?php esc_html_e('Set your latest post as featured to populate this hero section automatically.', 'raajjemv'); ?></p>
                    <?php endif; ?>
                </article>

                <section class="card trend-panel">
                    <div class="trend-panel-head">
                        <h2 class="widget-title"><?php esc_html_e('Trending Now', 'raajjemv'); ?></h2>
                        <a class="trend-panel-link" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('View All', 'raajjemv'); ?></a>
                    </div>
                    <ol class="trend-list trend-list-ranked">
                        <?php
                        $trending = new WP_Query(
                            array(
                                'posts_per_page' => 3,
                                'offset'         => 1,
                            )
                        );
                        if ($trending->have_posts()) :
                            $trend_rank = 1;
                            while ($trending->have_posts()) :
                                $trending->the_post();
                                ?>
                                <li>
                                    <span class="trend-rank"><?php echo esc_html(sprintf('%02d', $trend_rank)); ?></span>
                                    <div class="trend-copy">
                                        <p class="card-kicker"><?php echo esc_html(get_the_date()); ?></p>
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </div>
                                </li>
                                <?php
                                $trend_rank++;
                            endwhile;
                            wp_reset_postdata();
                        else :
                            ?>
                            <li><?php esc_html_e('Add at least 4 posts to auto-fill this list.', 'raajjemv'); ?></li>
                        <?php endif; ?>
                    </ol>
                </section>
            </div>
        </section>
        <?php wp_reset_postdata(); ?>
        </section>

        <?php get_sidebar('right'); ?>
    </div>

    <div class="home-fullwidth">
        <section class="section-heading">
            <h2 class="record-heading"><?php esc_html_e('Top Stories', 'raajjemv'); ?></h2>
            <p class="section-subtitle"><?php esc_html_e('Today\'s most important updates, selected by our editorial team.', 'raajjemv'); ?></p>
        </section>
        <section class="post-grid">
            <?php
            $grid_query = new WP_Query(
                array(
                    'posts_per_page' => 3,
                    'offset'         => 1,
                )
            );
            if ($grid_query->have_posts()) :
                while ($grid_query->have_posts()) :
                    $grid_query->the_post();
                    ?>
                    <article class="card">
                        <a href="<?php the_permalink(); ?>">
                            <?php echo raajjemv_fallback_thumbnail('medium'); ?>
                        </a>
                        <p class="card-kicker"><?php echo wp_kses_post(get_the_category_list(' / ')); ?></p>
                        <h3 class="card-title-sm"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p class="card-excerpt"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 20)); ?></p>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <article class="card"><p><?php esc_html_e('Publish posts to fill this section.', 'raajjemv'); ?></p></article>
            <?php endif; ?>
        </section>

        <section class="section-heading">
            <h2 class="record-heading"><?php esc_html_e('More Coverage', 'raajjemv'); ?></h2>
            <p class="section-subtitle"><?php esc_html_e('In-depth reporting, analysis, and follow-up stories.', 'raajjemv'); ?></p>
        </section>

        <section class="post-grid archive-grid">
            <?php
            $more_query = new WP_Query(
                array(
                    'posts_per_page' => 6,
                    'offset'         => 4,
                )
            );
            if ($more_query->have_posts()) :
                while ($more_query->have_posts()) :
                    $more_query->the_post();
                    ?>
                    <article class="card">
                        <?php echo raajjemv_fallback_thumbnail('medium'); ?>
                        <p class="card-kicker"><?php echo esc_html(get_the_date()); ?></p>
                        <h3 class="card-title-sm"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </section>

        <section class="newsletter-strip">
            <div>
                <p class="widget-title"><?php esc_html_e('Morning Brief', 'raajjemv'); ?></p>
                <h3 class="card-title-sm"><?php esc_html_e('Get a quick summary of top headlines in your inbox.', 'raajjemv'); ?></h3>
            </div>
            <a class="btn-primary" href="#"><?php esc_html_e('Subscribe', 'raajjemv'); ?></a>
        </section>

        <section class="news-river">
            <div class="section-heading">
                <h2 class="record-heading"><?php esc_html_e('Latest Updates', 'raajjemv'); ?></h2>
                <p class="section-subtitle"><?php esc_html_e('Chronological updates for fast scanning.', 'raajjemv'); ?></p>
            </div>
            <div class="stream-list">
                <?php
                $river_query = new WP_Query(
                    array(
                        'posts_per_page' => 5,
                        'offset'         => 10,
                    )
                );
                if ($river_query->have_posts()) :
                    while ($river_query->have_posts()) :
                        $river_query->the_post();
                        ?>
                        <article class="card">
                            <a href="<?php the_permalink(); ?>"><?php echo raajjemv_fallback_thumbnail('medium'); ?></a>
                            <div>
                                <p class="card-kicker"><?php echo esc_html(get_the_date()); ?></p>
                                <h3 class="card-title-sm"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p class="card-excerpt"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 22)); ?></p>
                            </div>
                        </article>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>
