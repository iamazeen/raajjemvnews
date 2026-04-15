<?php
/**
 * Page template.
 *
 * @package RaajjeMV
 */

get_header();
?>

<main class="article-layout">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article>
                <h1 class="article-title"><?php the_title(); ?></h1>
                <div class="entry-content"><?php the_content(); ?></div>
            </article>
        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
