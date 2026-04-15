<?php
/**
 * Footer template.
 *
 * @package RaajjeMV
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
</div>

<footer class="site-footer">
    <div class="footer-grid">
        <div>
            <h2 class="footer-brand">RaajjeMV</h2>
            <p class="copyright"><?php esc_html_e('Fast, trusted reporting on the stories shaping Maldives and the world.', 'raajjemv'); ?></p>
            <p class="copyright">© <?php echo esc_html(date_i18n('Y')); ?> <?php bloginfo('name'); ?></p>
        </div>
        <div>
            <h3 class="widget-title"><?php esc_html_e('Journalism', 'raajjemv'); ?></h3>
            <ul class="footer-list">
                <li><a href="#"><?php esc_html_e('About Us', 'raajjemv'); ?></a></li>
                <li><a href="#"><?php esc_html_e('Ethics Policy', 'raajjemv'); ?></a></li>
                <li><a href="#"><?php esc_html_e('Editorial Team', 'raajjemv'); ?></a></li>
            </ul>
        </div>
        <div>
            <h3 class="widget-title"><?php esc_html_e('Support', 'raajjemv'); ?></h3>
            <ul class="footer-list">
                <li><a href="#"><?php esc_html_e('Contact', 'raajjemv'); ?></a></li>
                <li><a href="#"><?php esc_html_e('Help Center', 'raajjemv'); ?></a></li>
                <li><a href="#"><?php esc_html_e('Advertise', 'raajjemv'); ?></a></li>
            </ul>
        </div>
        <div>
            <h3 class="widget-title"><?php esc_html_e('Legal', 'raajjemv'); ?></h3>
            <ul class="footer-list">
                <li><a href="#"><?php esc_html_e('Privacy', 'raajjemv'); ?></a></li>
                <li><a href="#"><?php esc_html_e('Terms', 'raajjemv'); ?></a></li>
                <li><a href="#"><?php esc_html_e('Cookie Policy', 'raajjemv'); ?></a></li>
            </ul>
        </div>
    </div>
    <div class="footer-newsletter">
        <div>
            <p class="widget-title"><?php esc_html_e('Daily Bulletin', 'raajjemv'); ?></p>
            <p class="card-excerpt"><?php esc_html_e('The top 5 stories each morning, delivered in under 3 minutes.', 'raajjemv'); ?></p>
        </div>
        <a class="btn-primary" href="#"><?php esc_html_e('Join Bulletin', 'raajjemv'); ?></a>
    </div>
    <div class="footer-menu-wrap">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'footer',
                'container'      => false,
                'menu_class'     => 'footer-list',
                'fallback_cb'    => '__return_empty_string',
            )
        );
        ?>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
