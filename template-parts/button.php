<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<a class="<?php if ( $module ): ?><?php echo $module; ?>__button<?php endif; ?> btn <?php echo $class; ?>" href="<?php echo $link['url']; ?>" <?php if ( $link['target'] ): ?>target="<?php echo $link['target']; ?>"<?php endif; ?>><?php echo $link['title']; ?></a>