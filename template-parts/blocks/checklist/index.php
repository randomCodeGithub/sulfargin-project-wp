<?php if (!defined('ABSPATH')) exit;
if (is_admin()) return;

$img  = get_field('image');
$img2 = get_field('image_2');

if (have_rows('list')) : ?>
    <div class="b-checklist h-mgb-xxxl h-mgb-sm-xl" data-stretch>
        <div class="<?php if ($img) : ?>row<?php endif; ?>">
            <?php if ($img) : ?>
                <div class="col-lg-6 h-mgb-md-l">
                    <?php if ($img2) : ?>
                        <div class="row align-items-end">
                            <div class="col-6">
                                <figure class="h-relative b-checklist__image b-checklist__image--is-<?php the_field('image_style'); ?>">
                                    <?php pdg_img($img); ?>
                                </figure>
                            </div>

                            <div class="col-6">
                                <figure class="h-relative b-checklist__image b-checklist__image--is-<?php the_field('image_style'); ?>">
                                    <?php pdg_img($img2); ?>
                                </figure>
                            </div>
                        </div>
                        <div class="row">
                            <?php if ($img['caption']) : ?>
                                <div class="col-6">
                                    <figcaption class="b-checklist__image-cap h4 text-center"><?php echo $img['caption']; ?></figcaption>
                                </div>
                            <?php endif; ?>

                            <?php if ($img2['caption']) : ?>
                                <div class="col-6">
                                    <figcaption class="b-checklist__image-cap h4 text-center"><?php echo $img2['caption']; ?></figcaption>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php else : ?>
                        <figure class="b-checklist__image b-checklist__image--is-<?php the_field('image_style'); ?>">
                            <?php pdg_img($img); ?>
                        </figure>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="<?php if ($img) : ?>col-lg-5<?php endif; ?>">
                <?php if (get_field('title')) : ?>
                    <h3 class="b-checklist__title <?php the_field('title_style'); ?>"><?php the_field('title'); ?></h3>
                <?php endif; ?>
                <?php if (get_field('text')) : ?>
                    <p class="b-checklist__text"><?php the_field('text'); ?></p>
                <?php endif; ?>

                <ul class="c-checklist <?php if (get_field('button')) : ?>h-mgb-l<?php endif; ?>">
                    <?php
                    $i = 1;
                    while (have_rows('list')) : the_row(); ?>
                        <li class="c-checklist__item">
                            <span class="c-checklist__number d-flex justify-content-center align-items-center"><?php echo $i; ?></span>

                            <?php the_sub_field('text'); ?>
                        </li>
                    <?php $i++;
                    endwhile; ?>
                </ul>

                <?php pdgc_button(get_field('button')); ?>
            </div>
        </div>
    </div>
<?php endif; ?>