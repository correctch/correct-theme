
                <?php
                $facebook = get_theme_mod('facebook_link_block');
                $instagram = get_theme_mod('instagram_link_block');
                $linkedin = get_theme_mod('linkedin_link_block');
                $twitter = get_theme_mod('twitter_link_block');
                $youtube = get_theme_mod('youtube_link_block');

                if (!$facebook == "" || !$instagram == "" || !$twitter == "" || !$linkedin == "" || !$youtube == "") {
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
                if (!$youtube == "") {
                    ?>
                    <a class="social-icon" href="<?php echo $youtube ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/brands/youtube.svg" alt="">
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
       