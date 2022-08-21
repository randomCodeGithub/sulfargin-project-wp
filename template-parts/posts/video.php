<?php if ( ! defined( 'ABSPATH' ) ) exit;

$id = get_the_ID();

if ( $video = get_field( 'youtube_url', $id ) ): ?>
    <?php $video_id = pdg_get_youtube_video_id( $video ); ?>

    <article class="l-posts__item c-video c-card flex">
        <div class="c-video__thumb-wrap">
            <figure class="c-video__thumb h-relative h-bg-cover h-ar" data-fancybox="video" data-src="<?php echo $video; ?>" style="background-image: url( <?php echo pdg_get_youtube_video_thumbnail( $video_id, 'high' ); ?> );"></figure>
        </div>

        <div class="c-video__info">
            <h3 class="c-video__title h3 h-mgb-s"><?php the_title(); ?></h3>

            <p class="p-small">
                <?php _e( 'Автор (-ы)', 'mildronat' ); ?>: <?php the_field( 'author', $id ); ?><br>
                <?php _e( 'Источник (-и)', 'mildronat' ); ?>: <?php the_field( 'source', $id ); ?><br>
                <?php _e( 'Год', 'mildronat' ); ?>: <?php the_field( 'year', $id ); ?>
            </p>
        </div>
    </article>
<?php endif; ?>