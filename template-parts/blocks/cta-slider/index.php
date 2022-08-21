<?php if (!defined('ABSPATH')) exit;
if (is_admin()) return;

$layout = get_field('layout');

$cols = array(
    1 => 'col-lg-5',
    2 => 'col-lg-6 offset-lg-1'
);

$size = array(516, 516);

if ($layout == '2') {
    $cols = array(
        1 => 'col-lg-4',
        2 => 'col-lg-6 offset-lg-2'
    );

    $size = array(560, 525);
}
?>

<div class="c-cta-slider <?php if (get_field('dont_crop')) : ?>c-cta-slider--no-crop<?php endif; ?>" data-stretch>
    <div class="row align-items-center">
        <?php if ($images = get_field('images')) : ?>
            <div class="<?php echo $cols[2]; ?> order-lg-2">
            <div class="c-cta-slider__slider-wrap <?php if ($layout == '2') : ?>c-cta-slider__slider-wrap--large<?php endif; ?> h-relative">
                <figure class="c-cta-slider__decor h-bg-cover"></figure>

                <div class="c-cta-slider__slider-view-wrap">
                    <div class="c-cta-slider__slider-view h-relative h-ar h-ar--1">
                        <div class="c-cta-slider__slider">
                            <?php foreach ($images as $image) : ?>
                                <div class="c-cta-slider__slide h-bg-cover" style="background-image: url( <?php echo pdg_get_image_src($image, $size); ?> );"></div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        <?php endif; ?>

        <div class="c-cta-slider__info <?php echo $cols[1]; ?> order-lg-1">
            <?php if (get_field('title')) : ?>
                <h1 class="c-cta-slider__title h1"><?php the_field('title'); ?></h1>
            <?php endif; ?>

            <?php if (get_field('sub_title')) : ?>
                <p class="h3 h-mgb-l"><?php the_field('sub_title'); ?></p>
            <?php endif; ?>

            <?php if (get_field('text')) : ?>
                <div class="editor h-mgb-l">
                    <?php the_field('text'); ?>
                </div>
            <?php endif; ?>

            <?php pdgc_button(get_field('button'), 'c-cta-slider__button btn-primary s-174'); ?>
        </div>
    </div>
</div>