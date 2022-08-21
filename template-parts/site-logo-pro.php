<?php if ( get_field( 'logo_pro', 'option' ) && get_field( 'pro_main', 'option' ) ): ?>
    <?php
    $logo = get_field( 'logo_pro', 'option' );
    $page = get_field( 'pro_main', 'option' );
    ?>

    <a class="c-logo" href="<?php echo esc_url( get_permalink( $page->ID ) ); ?>">
        <?php pdg_img( $logo ); ?>
    </a>
<?php endif; ?>