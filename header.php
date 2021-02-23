<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" lang="de" itemscope itemtype="http://schema.org/WebPage">
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<!-- Icons -->
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png" />
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png" />
	<link rel="manifest" href="/site.webmanifest" />
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5" />
	<meta name="msapplication-TileColor" content="#ffc40d" />
	<meta name="theme-color" content="#ffffff" />
	<link href="https://fonts.googleapis.com/css2?family=Assistant:wght@600;700&display=swap" rel="stylesheet">
	<link href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" rel="stylesheet" type="text/css">
	<?php wp_head(); ?>

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"
	integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
	crossorigin="anonymous"></script>
</head>
<body>
	<div id="header">
		<div class="container">
			<div class="logo">
				<?php if ( function_exists( 'the_custom_logo' ) ) {
					the_custom_logo();
				} ?>
			</div>
				<?php require('includes/nav.php'); ?>
			<button class="menu-toggle"></button>
			<script>
				$('button.menu-toggle').on('click', function(){
					$('body').toggleClass('nav-is-toggled');
				});
			</script>
		</div>
		<?php require('includes/mobile-nav.php'); ?>
	</div>
