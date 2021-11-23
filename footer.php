<?php
    $show_post = !isset($args['show_post']) || $args['show_post'];
    $post_query = new WP_Query(array(
        'post_type' => 'post',
    ));
    var_dump($post_query);
?>

<div id="footer" class="<?php if($show_post && $post_query->have_posts()) { echo('with-post'); } ?>">
    <?php
    if ($show_post) {
        require('includes/footer-post.php');
    }
    ?>
    <div class="container">
        <div class="meetings-iframe-container" data-src="https://meetings.hubspot.com/alessandro-esposito?embed=true"></div>
        <div class="row">
            <div class="col">
                <a href="https://correct.ch">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo-correct-white-<?php echo substr(get_theme_mod('accent_color', ''), 1); ?>.png"
                         alt="" class="logo">
                </a>
            </div>
            <div id="social-wrapper-desktop" class="col">
                <?php require('includes/social-links.php'); ?>
            </div>
            <div class="col">
                <h4>Links</h4>
                <?php echo get_theme_mod('footer_links_block'); ?>
            </div>
            <div class="col">
                <h4>Kontakt</h4>
                <?php echo get_theme_mod('footer_adresse_block'); ?>
            </div>
        </div>
    </div>
    <div id="social-wrapper-mobile">
        <?php require('includes/social-links.php'); ?>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>
