<?php if ( ! defined( 'ABSPATH' ) ) exit;

$id    = get_the_ID();
$terms = wp_get_post_terms( $id, 'publication_cat' );
$term  = ( isset( $terms[0] ) ) ? $terms[0] : false;
?>

<article class="l-posts__item c-pub c-card h-relative">
    <?php if ( $term ): ?>
        <div class="c-pub__term-wrap">
            <span class="c-pub__icon ic ic-<?php the_field( 'icon', $term ); ?>"></span>

            <p class="c-pub__term h-mgb-s h-c-secondary p-small"><?php echo $term->name; ?></p>
        </div>
    <?php endif; ?>

    <h3 class="c-pub__title h3 h-mgb-s"><?php the_title(); ?></h3>

    <p class="p-small">
        <?php _e( 'Автор (-ы)', 'mildronat' ); ?>: <?php the_field( 'author', $id ); ?><br>
        <?php _e( 'Источник (-и)', 'mildronat' ); ?>: <?php the_field( 'source', $id ); ?><br>
        <?php _e( 'Год', 'mildronat' ); ?>: <?php the_field( 'year', $id ); ?>
    </p>

    <?php if ( $file = get_field( 'file', $id ) ): ?>
        <a class="c-pub__read-more btn btn-more" href="<?php echo $file['url']; ?>" target="_blank"><?php _e( 'Скачать PDF', 'mildronat' ); ?></a>
    <?php endif; ?>
</article>