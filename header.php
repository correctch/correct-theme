<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" lang="de" itemscope itemtype="http://schema.org/WebPage">
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>

    <!-- Icons -->
    <link rel="apple-touch-icon" sizes="180x180"
          href="<?php echo get_template_directory_uri(); ?>/img/favicons/apple-icon">
    <link rel="icon" type="image/png" sizes="192x192"
          href="<?php echo get_template_directory_uri(); ?>/img/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32"
          href="<?php echo get_template_directory_uri(); ?>/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96"
          href="<?php echo get_template_directory_uri(); ?>/img/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16"
          href="<?php echo get_template_directory_uri(); ?>/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/img/favicons/site.webmanifest">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" rel="stylesheet" type="text/css">
    <?php wp_head(); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/public/js/non-defer.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/public/js/app.js" defer></script>
    <script src="<?php echo get_template_directory_uri(); ?>/public/hyphens/Hyphenopoly_Loader.js"></script>
    <script>
        Hyphenopoly.config({
            require: {
                "de": "FORCEHYPHENOPOLY"//"Silbentrennungsalgorithmus",
            },
            paths: {
                "patterndir": "<?php echo get_template_directory_uri(); ?>/public/hyphens/patterns/", //path to the directory of pattern files
                "maindir": "<?php echo get_template_directory_uri(); ?>/public/hyphens/" //path to the directory where the other ressources are stored
            },
            setup: {
                exceptions: {
                    "global": "Hotellerie, Hotellerie-" //language-specific exceptions
                },
                defaultLanguage: "de"
            }
        });
    </script>
    <script type="text/javascript" src="https://static.hsappstatic.net/MeetingsEmbed/ex/MeetingsEmbedCode.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-WBS0LZ9WJC"></script>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-N4RN7D2');</script>
    <!-- End Google Tag Manager -->
</head>
<body class="hyphenate <?php if (isset($page) && $page === 'landing'){echo 'landing-page';} ?>">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N4RN7D2"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="header">
    <div class="container">
        <div class="logo">
            <?php if (function_exists('the_custom_logo')) {
                the_custom_logo();
            } ?>
        </div>
        <?php
        if (!isset($page) || (isset($page) && $page !== 'landing')){
            require('includes/nav.php');
        }else{
        wp_nav_menu([
            'menu' => 'contact',
            'container_id' => 'contact-menu',
            'walker' => new CSS_Menu_Maker_Walker()
        ]);
        }
        ?>
        <?php if (!isset($page) || (isset($page) && $page !== 'landing')){?>
        <button class="menu-toggle"></button>
        <?php } ?>
    </div>
    <?php if (!isset($page) || (isset($page) && $page !== 'landing')){ require('includes/mobile-nav.php'); } ?>
</div>
