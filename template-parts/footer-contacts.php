<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<div class="site-footer__contacts row">
    <?php
    $count = 3;

    for ( $i = 1; $i - 1 < $count; $i++ ): ?>
        <?php
        $contact = get_field( 'contacts_' . $i, 'option' );

        if ( $contact['title'] && $contact['content'] ): ?>
            <div class="site-footer__contact-col col-lg-<?php if ( $i == $count ): ?>4 col-12 site-footer__contact-col--large<?php else: ?>3 col-md-6<?php endif; ?> <?php if ( $i != 1 ): ?>offset-lg-1<?php endif; ?> h-mgb-md-xl">
                <p class="h-ft-cont-heading h4"><?php echo $contact['title']; ?></p>

                <div class="p-small"><?php echo $contact['content']; ?></div>
            </div>
        <?php endif; ?>
    <?php endfor; ?>
</div>