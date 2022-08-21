<?php if ($logo = get_field('logo', 'option')) : ?>
    <a class="c-logo" href="<?php echo esc_url(home_url()); ?>">
        <?php
        pdg_img($logo, 'full', array(
            'svg_mode' => 2
        ));
        ?>
    </a>
<?php endif; ?>