<?php get_header(); ?>
    <div class="container">
            <h2><?php single_cat_title(); ?></h2>
            <div class="post-boxes row">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="post-box col">
                        <?php if (has_post_thumbnail()) { ?>
                            <div class="post-box-image-container">
                                <a class="link" href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('card'); ?>
                                </a>
                            </div>
                        <?php } ?>
                        <h4 class="post-box-title">
                            <a class="link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>
                        <?php the_excerpt(); ?>
                        <p class="post-box-action">
                            <a class="button" href="<?php the_permalink(); ?>">Mehr erfahren</a>
                        </p>
                    </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </div><!-- main -->
<?php get_footer(); ?>