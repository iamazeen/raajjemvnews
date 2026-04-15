<?php
/**
 * Comments template.
 *
 * @package RaajjeMV
 */

if (post_password_required()) {
    return;
}
?>

<section class="comments-wrap">
    <div class="comments-head">
        <p class="widget-title"><?php esc_html_e('Discussion', 'raajjemv'); ?></p>
        <h2 class="card-title-sm">
            <?php
            printf(
                esc_html(
                    _nx('%1$s Comment', '%1$s Comments', get_comments_number(), 'comments title', 'raajjemv')
                ),
                number_format_i18n(get_comments_number())
            );
            ?>
        </h2>
    </div>

    <?php if (have_comments()) : ?>
        <ol class="comment-list">
            <?php
            wp_list_comments(
                array(
                    'style'      => 'ol',
                    'short_ping' => true,
                    'avatar_size' => 42,
                )
            );
            ?>
        </ol>
    <?php endif; ?>

    <?php
    comment_form(
        array(
            'title_reply'          => __('Leave a Comment', 'raajjemv'),
            'title_reply_before'   => '<h3 class="comment-reply-title">',
            'title_reply_after'    => '</h3>',
            'class_form'           => 'comment-form-modern',
            'class_submit'         => 'btn-primary comment-submit',
            'label_submit'         => __('Post Comment', 'raajjemv'),
            'comment_field'        => '<p class="comment-form-comment"><label for="comment">' . esc_html__('Comment', 'raajjemv') . '</label><textarea id="comment" name="comment" cols="45" rows="6" required="required" placeholder="' . esc_attr__('Share your thoughts...', 'raajjemv') . '"></textarea></p>',
        )
    );
    ?>
    
    <?php if (!comments_open() && get_comments_number()) : ?>
        <p class="card-excerpt"><?php esc_html_e('Comments are closed.', 'raajjemv'); ?></p>
    <?php endif; ?>
</section>
