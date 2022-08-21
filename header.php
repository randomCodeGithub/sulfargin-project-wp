<?php if (!defined('ABSPATH')) exit; ?>

<?php get_template_part('template-parts/head'); ?>
<?php echo '<script>console.log("asdasd' . wp_login_url() . '")</script>' ?>
<header class="site-header">
    <div class="container">
        <div class="flex justify-content-between align-items-center">
            <?php get_template_part('template-parts/site-logo'); ?>

            <div class="flex align-items-center">
                <div class="c-nav-main-wrap">
                    <div class="c-nav-main-inner flex align-items-center">
                        <nav class="c-nav-main">
                            <?php pdg_nav('header', 'flex align-items-center'); ?>
                        </nav>

                        <?php if ($buy = get_field('page_for_buy', 'option')) : ?>
                            <a class="site-header__buy btn btn-primary small s-150" href="<?php echo get_permalink($buy->ID); ?>"><?php _e('Купить', 'sulfargin'); ?></a>
                        <?php endif; ?>
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
    </div>
</header>

<?php if (is_front_page()) : ?>
    <?php if (have_rows('slides', "option")) :
        $slider_logo = get_field('slider_logo', "option");
    ?>
        <div class="c-cta_slider">
            <div class="c-cta-slider__logo">
                <?php pdg_img($slider_logo) ?>
            </div>
            <div class="c-cta-slider__slider" style="position:relative !important; border-radius: 0;user-select: text;">
                <?php while (have_rows('slides', "option")) : the_row();
                    $general_info = get_sub_field('general_info');
                    $btn = $general_info["btn"];
                    $link_url = $btn['url'];
                    $link_title = $btn['title'];
                    $link_target = $btn['target'] ? $btn['target'] : '_self';
                    $image = get_sub_field('image');
                ?>
                    <div class="c-cta-slider__slide h-bg-cover" style="background-image: url( <?php echo pdg_get_image_src($image); ?> ); height: 597px;">
                        <div class="overlay-1"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h1><?php echo $general_info['title'] ?></h1>
                                    <p><?php echo $general_info['text'] ?></p>
                                    <a href="<?php echo $link_url ?>" class="btn btn-primary s-174" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="slider-controls d-flex align-items-center justify-content-center h-w-100">
                <button type="button" class="slide-prev ic ic-caret-left"></button>
                <div class="custom-slide-dots"></div>
                <button type="button" class="slide-next ic ic-caret-right"></button>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>

<div class="site-content site-content--top-offset-<?php the_field('top_offset'); ?> <?php if (get_field('remove_top_offset')) : ?>site-content--has-no-offset-top<?php endif; ?>">