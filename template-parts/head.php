<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
	    <meta charset="<?php bloginfo( 'charset' ); ?>" />
	    <meta name="format-detection" content="telephone=no">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />

	    <link rel="profile" href="https://gmpg.org/xfn/11" />

		<?php wp_head(); ?>

		<?php get_template_part( 'template-parts/head', 'additional' ); ?>

		<!--[if IE]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script>

		<link rel="stylesheet" href="<?php echo PDG_URL; ?>/assets/vendor/browser-notice/browser-notice.css">
		<link rel="stylesheet" href="<?php echo PDG_URL; ?>/assets/vendor/browser-notice/browser-notice-ie.css">
		<![endif]-->

		<script>
		window.dataLayer = window.dataLayer || [];
		</script>

		<!-- Google Tag Manager -->
		<script>
		(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-M9GFFF6');
		</script>
		<!-- End Google Tag Manager -->
	</head>
	<body <?php body_class(); ?>>
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M9GFFF6"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->

		<!--[if IE]>
		<?php get_template_part( 'template-parts/browser-notice' ); ?>
		<![endif]-->

		<div class="site-wrap">