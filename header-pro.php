<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php get_template_part( 'template-parts/head' ); ?>

<header class="site-header">
    <div class="container">
        <div class="flex justify-content-between align-items-center">
            <?php get_template_part( 'template-parts/site-logo', 'pro' ); ?>

            <div class="flex align-items-center">
                <div class="c-nav-main-wrap">
                    <div class="c-nav-main-inner flex align-items-center">
                        <nav class="c-nav-main">
                            <?php pdg_nav( 'header-pro', 'flex align-items-center' ); ?>
                        </nav>
                    </div>
                </div>

                <button class="c-burger d-lg-none js-burger">
                    <span class="c-burger__close h-abs-c ic ic-close"></span>

                    <span class="c-burger__item c-burger__item--bacon"></span>
                    <span class="c-burger__item c-burger__item--salad"></span>
                    <span class="c-burger__item c-burger__item--bun"></span>
                </button>
            </div>
        </div>

        <?php get_template_part( 'template-parts/site-logo', 'additional' ); ?>
    </div>
</header>

<div class="site-content site-content--top-offset-<?php the_field( 'top_offset' ); ?> <?php if ( get_field( 'remove_top_offset' ) ): ?>site-content--has-no-offset-top<?php endif; ?>">