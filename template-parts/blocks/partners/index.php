<?php if ( ! defined( 'ABSPATH' ) ) exit; if ( is_admin() ) return;

$break = ( get_field( 'count' ) && get_field( 'count' ) != -1 ) ? get_field( 'count' ) : false;

if ( have_rows( 'partners', 'pdgc-partners' ) ): ?>
    <div class="b-partners h-mgb-xxl" data-stretch>
        <?php if ( get_field( 'title' ) ): ?>
            <h3 class="b-partners__title h2 text-center"><?php the_field( 'title' ); ?></h3>
        <?php endif; ?>

        <?php if ( get_field( 'sub_title' ) ): ?>
            <p class="b-partners__sub-title text-center"><?php the_field( 'sub_title' ); ?></p>
        <?php endif; ?>

        <div class="<?php if ( get_field( 'button' ) ): ?>h-mgb-l<?php endif; ?>">
            <div class="l-logos row justify-content-center">
                <?php $i = 0; while ( have_rows( 'partners', 'pdgc-partners' ) ): the_row(); ?>
                    <?php
                    if ( $break !== false && $break == $i ) {
                        break;
                    }
                    ?>

                    <div class="l-logos__item col-lg-2 col-md-4 col-4">
                        <a class="c-partner h-relative h-ar" <?php if ( get_sub_field( 'data_layer_event' ) ): ?>onclick="dataLayer.push({'event': '<?php the_sub_field( 'data_layer_event' ); ?>'})"<?php endif; ?> href="<?php echo esc_url( get_sub_field( 'url' ) ); ?>" target="_blank">
                            <?php if ( get_sub_field( 'margin' ) ): ?>
                                <figure class="c-partner__wrap h-abs-c">
                                    <?php pdg_img( get_sub_field( 'logo' ), 'partner', array(
                                        'crop'  => false
                                    ) ); ?>
                                </figure>
                            <?php else: ?>
                                <?php pdg_img( get_sub_field( 'logo' ), 'partner', array(
                                    'class' => array( 'h-abs-c' ),
                                    'crop'  => false
                                ) ); ?>
                            <?php endif; ?>
                        </a>
                    </div>
                <?php $i++; endwhile; ?>
            </div>
        </div>

        <div class="text-center">
            <?php pdgc_button( get_field( 'button' ) ); ?>
        </div>
    </div>
<?php endif; ?>