<?php
    $show_post = !isset($args['show_post']) || $args['show_post'];
    $post_query = new WP_Query(array(
        'post_type' => 'post',
    ));
?>

<div id="footer" class="<?php if($show_post && sizeof($post_query->posts) > 0) { echo('with-post'); } ?>">
    <?php
    if ($show_post) {
        require('includes/footer-post.php');
    }
    ?>
    <div class="container">
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
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/public/js/non-defer.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/public/js/app.js" defer></script>
<script>


    let $ = jQuery.noConflict();
    jQuery(function($) {
            function setRespBreakpoints(){
                var nbr = 1;
                var width = $(window).width();
                if (width > 1050) {
                    nbr = 3
                }else if(width > 700){
                    nbr = 2;
                }
                return nbr;
            }

            function getWidth(){
                return $(window).width();
            }
            $('.wp-block-cb-carousel').slick('slickSetOption', 'slidesToShow',setRespBreakpoints());
            $(window).resize(function() {
                $('.wp-block-cb-carousel').slick('slickSetOption', 'slidesToShow', setRespBreakpoints());
            });
    });
</script>
</body>
</html>
