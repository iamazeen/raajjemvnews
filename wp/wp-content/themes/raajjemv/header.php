<?php
/**
 * Header template.
 *
 * @package RaajjeMV
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="topbar">
    <div class="topbar-inner">
        <span class="topbar-date"><?php echo esc_html(date_i18n('l, F j, Y')); ?></span>
        <div class="topbar-ticker" aria-label="<?php esc_attr_e('Breaking news', 'raajjemv'); ?>">
            <div class="topbar-ticker-track">
                <?php
                $ticker_posts = get_posts(
                    array(
                        'posts_per_page' => 5,
                        'post_status'    => 'publish',
                    )
                );
                if (!empty($ticker_posts)) :
                    foreach ($ticker_posts as $ticker_post) :
                        ?>
                        <a href="<?php echo esc_url(get_permalink($ticker_post)); ?>">
                            <?php echo esc_html(get_the_title($ticker_post)); ?>
                        </a>
                    <?php endforeach; ?>
                <?php else : ?>
                    <span><?php esc_html_e('Breaking: Welcome to RaajjeMV newsroom.', 'raajjemv'); ?></span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<header class="site-header">
    <div class="header-inner">
        <div class="site-branding">
            <a class="logo" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
        </div>

        <nav class="primary-menu" aria-label="<?php esc_attr_e('Primary Menu', 'raajjemv'); ?>">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'fallback_cb'    => function (): void {
                        echo '<ul>';
                        echo '<li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Home', 'raajjemv') . '</a></li>';
                        $fallback_categories = get_categories(
                            array(
                                'hide_empty' => false,
                                'number'     => 6,
                            )
                        );
                        foreach ($fallback_categories as $fallback_category) {
                            echo '<li><a href="' . esc_url(get_category_link($fallback_category)) . '">' . esc_html($fallback_category->name) . '</a></li>';
                        }
                        echo '</ul>';
                    },
                )
            );
            ?>
        </nav>

        <div class="header-tools">
            <?php get_search_form(); ?>
        </div>
    </div>

    <?php
    $nav_categories = get_categories(
        array(
            'hide_empty' => false,
            'number'     => 8,
        )
    );
    if (!empty($nav_categories)) :
        ?>
        <nav class="category-nav" aria-label="<?php esc_attr_e('News Categories', 'raajjemv'); ?>">
            <div class="category-nav-inner">
                <a class="category-nav-link <?php echo is_home() || is_front_page() ? 'is-active' : ''; ?>" href="<?php echo esc_url(home_url('/')); ?>">
                    <?php esc_html_e('All News', 'raajjemv'); ?>
                </a>
                <?php foreach ($nav_categories as $nav_category) : ?>
                    <?php
                    $is_active = is_category($nav_category->term_id) || (is_single() && has_category($nav_category->term_id));
                    ?>
                    <a class="category-nav-link <?php echo $is_active ? 'is-active' : ''; ?>" href="<?php echo esc_url(get_category_link($nav_category)); ?>">
                        <?php echo esc_html($nav_category->name); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </nav>
    <?php endif; ?>
</header>

<div class="site-wrapper">
