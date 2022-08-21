<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

</div>

<footer class="site-footer">
    <div class="container">
        <?php get_template_part( 'template-parts/footer-contacts' ); ?>

        <div class="row">
            <div class="site-footer__logos col-lg-4 offset-lg-1 flex align-items-end justify-content-lg-between order-lg-2">
                <?php
                get_template_part( 'template-parts/logo', 'eu' );
                get_template_part( 'template-parts/logo', 'footer' );
                ?>
            </div>

            <div class="col-lg-7 order-lg-1">
                <nav class="c-nav-footer">
                    <?php
                    $nav = ( pdgc_is_pro_page() ) ? 'footer-pro' : 'footer';

                    pdg_nav( $nav, 'flex p-small' );
                    ?>
                </nav>

                <?php pdgc_copyright(); ?>
            </div>
        </div>
    </div>
</footer>

<?php
$message = false;

if ( pdgc_is_pro_page() && get_field( 'bottom_message_pro', 'option' ) ) {
    $message = get_field( 'bottom_message_pro', 'option' );
} elseif ( get_field( 'bottom_message', 'option' ) ) {
    $message = get_field( 'bottom_message', 'option' );
}

if ( $message ): ?>
    <div class="c-bot-msg h3 text-center uppercase"><?php echo $message; ?></div>
<?php endif; ?>

<?php get_template_part( 'template-parts/foot' ); ?>