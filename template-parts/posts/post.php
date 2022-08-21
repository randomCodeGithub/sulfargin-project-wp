<?php if ( ! defined( 'ABSPATH' ) ) exit;

$id = get_the_ID();
?>

<article class="c-post h-relative">
    <?php if ( has_post_thumbnail() ): ?>
        <figure class="c-post__thumbnail h-mgb-m h-mgb-sm-s h-ar h-bg-cover" style="background-image: url( <?php echo pdg_get_image_src( get_post_thumbnail_id(), 'post_thumbnail' ); ?> );"></figure>
    <?php endif; ?>

    <h3 class="c-post__title h3 clamp" data-lines="3"><?php the_title(); ?></h3>

    <p class="c-post__excerpt p-small clamp" data-lines="3"><?php the_excerpt(); ?></p>

    <a class="h-block-link" href="<?php the_permalink(); ?>"></a>
</article>