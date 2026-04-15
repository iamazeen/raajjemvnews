<?php
/**
 * Left sidebar.
 *
 * @package RaajjeMV
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<aside class="sidebar-left">
    <?php if (is_active_sidebar('left-rail')) : ?>
        <?php dynamic_sidebar('left-rail'); ?>
    <?php else : ?>
        <section class="widget">
            <h3 class="widget-title"><?php esc_html_e('About RaajjeMV', 'raajjemv'); ?></h3>
            <p><?php esc_html_e('Independent digital newsroom covering politics, business, and culture.', 'raajjemv'); ?></p>
        </section>
        <section class="widget">
            <h3 class="widget-title"><?php esc_html_e('Quick Index', 'raajjemv'); ?></h3>
            <ul class="footer-list">
                <?php
                $left_categories = get_categories(
                    array(
                        'hide_empty' => false,
                        'number'     => 6,
                    )
                );
                foreach ($left_categories as $left_category) :
                    ?>
                    <li><a href="<?php echo esc_url(get_category_link($left_category)); ?>"><?php echo esc_html($left_category->name); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </section>
        <section class="widget">
            <h3 class="widget-title"><?php esc_html_e('Sections', 'raajjemv'); ?></h3>
            <ul class="footer-list">
                <li><a href="#"><?php esc_html_e('Trending Now', 'raajjemv'); ?></a></li>
                <li><a href="#"><?php esc_html_e('Top Stories', 'raajjemv'); ?></a></li>
                <li><a href="#"><?php esc_html_e('Multimedia', 'raajjemv'); ?></a></li>
                <li><a href="#"><?php esc_html_e('Live Feed', 'raajjemv'); ?></a></li>
                <li><a href="#"><?php esc_html_e('Opinion', 'raajjemv'); ?></a></li>
            </ul>
        </section>
    <?php endif; ?>
</aside>
