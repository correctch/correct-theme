<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="https://correct.ch">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo-correct-white.png" alt="" class="logo">
                </a>
            </div>
            <div class="col">
                <?php
                $facebook = get_theme_mod('facebook_link_block');
                $instagram = get_theme_mod('instagram_link_block');
                if (!$facebook == "" || !$instagram == "") {
                    ?>
                    <p>Unser Social Media: </p>
                    <?php
                }
                if (!$facebook == "") {
                    ?>
                    <a class="social-icon" href="<?php echo $facebook ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/brands/facebook_blue.png" alt="">
                    </a>
                    <?php
                }
                if (!$instagram == "") {
                    ?>
                    <a class="social-icon" href="<?php echo $instagram ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/brands/instagram_blue.png" alt="">
                    </a>
                    <?php
                }
                ?>
            </div>
            <div class="col">
                <p>Mehr von Correct: </p>
                <?php echo get_theme_mod('footer_links_block'); ?>
            </div>
            <div class="col">
                <?php echo get_theme_mod('footer_adresse_block'); ?>
                <p>
                    <a class="link" href="https://correct.ch">correct.ch ag</a><br>
                    <a class="link" href="https://correct.ch/impressum">Impressum</a>
                </p>
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
