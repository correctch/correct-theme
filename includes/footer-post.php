<?php
// Query one random post
$the_query = new WP_Query(array(
    'post_type' => 'post',
    'orderby' => 'rand',
    'posts_per_page' => 3,
    'post__not_in' => [get_the_ID()]
));

$on_post = is_single() && 'post' == get_post_type();

// If we have posts lets show them
if ($the_query->have_posts()) :
    // Loop through the posts
    echo '<div id="footer-blog-post" class="text-container">';
    while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <div class="row">
            <div class="col">
                <?php the_post_thumbnail('card', ['class' => 'main-img']); ?>
            </div>
            <div class="col text-part">
                <p class="main-color">
                     <span class="title">
                        <?php if ($on_post) { ?>
                            Weiterer Beitrag lesen
                        <?php } else { ?>
                            Blog
                        <?php } ?>
                    </span>
                    <br>
                    <?php the_title(); ?></p>
                <span class="date"><?php the_date('d.m.Y'); ?></span>
                <a class="button" href="<?php the_permalink(); ?>">Beitrag lesen</a>
            </div>
        </div>
    <?php endwhile; ?>
    </div>
<?php endif; ?>
