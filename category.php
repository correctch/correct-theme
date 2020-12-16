<?php get_header(); ?>
    <div class="container row">
        <div class="img-section col">
            <?php if (has_post_thumbnail()) {
                if (wp_is_mobile()) {
                    the_post_thumbnail('banner-image', ['class' => 'main-img']);
                } else {
                    the_post_thumbnail('side-image', ['class' => 'main-img']);
                }
            } ?>
        </div>
        <div class="content col">
            <h2><?php single_cat_title(); ?></h2>
            <div class="post-boxes">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="post-box">
                        <?php if (has_post_thumbnail()) { ?>
                            <div class="post-box-image-container">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('card'); ?>
                                </a>
                            </div>
                        <?php } ?>
                        <h4 class="post-box-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>
                        <?php the_excerpt(); ?>
                        <a class="post-box-action" href="<?php the_permalink(); ?>">Mehr erfahren</a>
                    </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </div><!-- main -->
<?php get_footer(); ?>