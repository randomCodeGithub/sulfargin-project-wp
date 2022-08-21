<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php if ( $logo = get_field( 'eu_logo', 'option' ) ): ?>
    <div class="site-footer__eu-wrap flex align-items-center">
        <figure class="site-footer__eu">
            <?php pdg_img( $logo ); ?>
        </figure>

        <?php if ( get_field( 'eu_logo_title', 'option' ) ): ?>
            <p class="p-small"><?php the_field( 'eu_logo_title', 'option' ); ?></p>
        <?php endif; ?>
    </div>
<?php endif; ?>