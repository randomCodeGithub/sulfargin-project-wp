<?php if (!defined('ABSPATH')) exit;
if (is_admin()) return; ?>

<div class="b-zigzag h-mgb-xxl h-mgb-sm-xl" data-stretch>
    <?php if (get_field('title')) : ?>
        <h2 class="h2 text-center h-mgb-xl"><?php the_field('title'); ?></h2>
    <?php endif; ?>
    <?php if (have_rows('zigzag')) :
        $i = 1; ?>
        <div class="b-zigzag__row">
            <?php while (have_rows('zigzag')) : the_row();
                $image = get_sub_field('image');
                $text = get_sub_field('text');
            ?>
                <div class="row">
                    <?php if ($image) : ?>
                        <div class="<?php echo ($i % 2 == 0) ? "col-lg-4" : 'col-lg-3 offset-lg-1'; ?>">
                            <div class="b-zigzag__image">
                                <?php pdg_img($image); ?>
                            </div>
                        </div>
                    <?php endif ?>

                    <?php if ($text) : ?>
                        <div class="d-flex align-items-center <?php echo ($i % 2 == 0) ? "col-lg-7 offset-lg-1" : 'col-lg-8'; ?>">
                            <div class="b-zigzag__text h-relative">
                                <span class="b-zigzag__number d-flex justify-content-center align-items-center"><?php echo $i ?></span>
                                <p><?php echo $text; ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php $i++;
            endwhile; ?>
        </div>
    <?php endif; ?>
</div>