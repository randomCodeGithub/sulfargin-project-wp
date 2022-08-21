<?php if ( ! defined( 'ABSPATH' ) ) exit; if ( is_admin() ) return;

if ( $form = get_field( 'form' ) ): ?>
    <div class="b-contact">
        <?php if ( get_field( 'title' ) ): ?>
            <h3 class="h2 h-mgb-m text-center"><?php the_field( 'title' ); ?></h3>
        <?php endif; ?>

        <?php if ( get_field( 'sub_title' ) ): ?>
            <p class="h-mgb-l text-center"><?php the_field( 'sub_title' ); ?></p>
        <?php endif; ?>

        <div class="b-contact__form-wrap" data-pdg-cf7>
            <?php echo do_shortcode( '[contact-form-7 id="' . $form->ID . '"]' ); ?>
        </div>
    </div>
<?php endif; ?>