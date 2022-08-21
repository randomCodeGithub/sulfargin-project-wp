<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php get_header(); ?>

<div class="c-404 container text-center">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h1 class="c-404__title">404</h1>

            <h2 class="c-404__sub-title h3"><?php _e( 'Страница не найдена!', 'mildronat' ); ?></h2>

            <p class="c-404__message"><?php _e( 'Страница, которую вы ищете, могла быть удалена, изменилось ее имя или временно недоступна.', 'mildronat' ); ?></p>

            <div class="c-404__btn-wrap">
                <a class="btn btn-primary s-174" href="<?php echo esc_url( home_url() ); ?>"><?php _e( 'На главную', 'mildronat' ); ?></a>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>