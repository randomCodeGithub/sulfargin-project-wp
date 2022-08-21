<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php if ( $logo = get_field( 'footer_logo', 'option' ) ): ?>
    <figure class="site-footer__logo">
        <?php pdg_img( $logo ); ?>
    </figure>
<?php endif; ?>