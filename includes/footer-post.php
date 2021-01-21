<?php
// Query one random post
$the_query = new WP_Query( array(
    'post_type'      => 'post',
    'orderby'        => 'rand',
    'posts_per_page' => 1,
) ); ?>

<?php
// If we have posts lets show them
if ( $the_query->have_posts() ) : ?>
    <?php
    // Loop through the posts
    while ( $the_query->have_posts() ) : $the_query->the_post();  ?>
        <div id="footer-blog-post" class="text-container">
            <div class="row">
                <div class="col">
                    <?php the_post_thumbnail('card', ['class' => 'main-img']); ?>
                </div>
                <div class="col text-part">
                    <span class="title">Blog</span>
                    <p><?php the_title(); ?></p>
                    <span class="date">14.12.2020</span>
                    <a class="button" href="<?php the_permalink(); ?>">Beitrag lesen</a>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>
