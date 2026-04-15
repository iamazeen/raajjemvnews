<?php
/**
 * Search form template.
 *
 * @package RaajjeMV
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <span class="screen-reader-text"><?php esc_html_e('Search for:', 'raajjemv'); ?></span>
        <input type="search" class="search-field" placeholder="<?php esc_attr_e('Search archive...', 'raajjemv'); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s">
    </label>
    <button type="submit" aria-label="<?php esc_attr_e('Search', 'raajjemv'); ?>">⌕</button>
</form>
