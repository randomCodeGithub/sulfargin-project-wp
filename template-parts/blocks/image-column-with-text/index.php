<?php if ( ! defined( 'ABSPATH' ) ) exit; if ( is_admin() ) return; ?>

<div class="b-image-column-with-text h-mgb-<?php the_field( 'margin' ); ?> h-mgb-sm-xl" data-stretch>
    <div class="row">
        <div class="b-image-column-with-text__image-col col-lg-3 offset-lg-2 col-md-6 col-12">
            <figure>
                <?php pdg_img( get_field( 'image' ) ); ?>
            </figure>
        </div>

        <div class="col-lg-5">
            <?php if ( get_field( 'title' ) ): ?>
                <h3 class="h3 h-mgb-m h-mgb-sm-s"><?php the_field( 'title' ); ?></h3>
            <?php endif; ?>

            <?php if ( get_field( 'text' ) ): ?>
                <div class="b-image-column-with-text__text editor">
                    <?php the_field( 'text' ); ?>
                </div>
            <?php endif; ?>

            <?php pdgc_button( get_field( 'button' ), '', 'btn-more' ); ?>
        </div>
    </div>
</div>