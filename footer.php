<div id="footer">
    <?php require('includes/footer-post.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="https://correct.ch">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo-correct-white-<?php echo substr(get_theme_mod('accent_color', ''),1); ?>.png" alt="" class="logo">
                </a>
            </div>
            <div class="col">
                <?php
                $facebook = get_theme_mod('facebook_link_block');
                $instagram = get_theme_mod('instagram_link_block');
                $linkedin = get_theme_mod('linkedin_link_block');
                $twitter = get_theme_mod('twitter_link_block');

                if (!$facebook == "" || !$instagram == "" || !$twitter == "" || !$linkedin == "") {
                    ?>
                    <h4>Social Media</h4>
                    <?php
                }
                if (!$linkedin == "") {
                    ?>
                    <a class="social-icon" href="<?php echo $linkedin ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/brands/linkedin.png" alt="">
                    </a>
                    <?php
                }
                if (!$twitter == "") {
                    ?>
                <a class="social-icon" href="<?php echo $twitter ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/brands/twitter.png" alt="">
                </a>
                <?php
                }
                if (!$facebook == "") {
                    ?>
                    <a class="social-icon" href="<?php echo $facebook ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/brands/facebook.png" alt="">
                    </a>
                    <?php
                }
                if (!$instagram == "") {
                    ?>
                    <a class="social-icon" href="<?php echo $instagram ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/brands/instagram.png" alt="">
                    </a>
                    <?php
                }


                ?>
            </div>
            <div class="col">
                <h4>Links</h4>
                <?php echo get_theme_mod('footer_links_block'); ?>
                <p>
                    <a class="link" href="https://correct.ch/impressum">Impressum</a>
                </p>
            </div>
            <div class="col">
                <h4>Kontakt</h4>
                <?php echo get_theme_mod('footer_adresse_block'); ?>
            </div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
<script>
    $(".accordion-header").click(function () {
        $(this).next('.accordion-content').slideToggle();
        $(this).parent().toggleClass("open");
    });

    $(".accordion > .accordion-content").hide();
    $(".accordion").removeClass("open");
</script>
</body>
</html>
