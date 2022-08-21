<?php if (!defined('ABSPATH')) exit;
if (is_admin()) return;

if (have_rows('list')) : ?>
    <div class="b-icon-grid h-mgb-xxxl h-mgb-sm-xl" data-stretch>
        <?php if (get_field('title')) : ?>
            <h2 class="h2 text-center <?php echo (get_field('text')) ? 'h-mgb-l' : 'h-mgb-xl'; ?>"><?php the_field('title'); ?></h2>
        <?php endif; ?>

        <?php if (get_field('text')) : ?>
            <div class="col-lg-8 h-mx-auto h-mgb-l">
                <p class="b-icon-grid__text text-center"><?php the_field('text'); ?></p>
            </div>
        <?php endif; ?>

        <div class="b-icon-grid__items row justify-content-center">
            <?php while (have_rows('list')) : the_row(); ?>
                <div class="b-icon-grid__item col-md-6 text-center <?php the_field('сolumn_width'); ?>">
                    <?php pdgc_featured_icon(get_sub_field('icon'), get_sub_field('color'), 'c-featured-icon--is-centered h-mgb-m'); ?>
                    <?php if (get_sub_field('title')) : ?>
                        <p class="b-icon-grid__item-title text-center h-mgb-s"><?php the_sub_field('title'); ?></p>
                    <?php endif; ?>
                    <?php the_sub_field('text'); ?>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>