<?php get_header(); ?>
    <div class="container">
        <h2><?php single_cat_title(); ?></h2>
        <div class="post-boxes row">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="post-box col">
                    <?php if (has_post_thumbnail()) { ?>
                        <div class="post-box-image-container">
                            <a class="link" href="<?php the_permalink(); ?>">
                                <?php if(wp_is_mobile()){ the_post_thumbnail('card-medium'); }else{the_post_thumbnail('card');} ?>
                            </a>
                        </div>
                    <?php } ?>
                    <p class="blog-info"><?php the_author(); ?> | <?php the_time('d.m.Y'); ?></p>
                    <h4 class="post-box-title">
                        <a class="link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h4>
                    <?php the_excerpt(); ?>
                    <a class="post-box-action button" href="<?php the_permalink(); ?>">weiter lesen</a>
                </div>
            <?php endwhile; endif; ?>
        </div>
        <a class="button" id="loadMore">Mehr Beiträge anzeigen</a>
    </div>
    <?php json_encode(get_queried_object()); ?>
    </div><!-- main -->
    <script>
        jQuery( document ).on( 'click', '#loadMore', function() {
            var num = $('.post-box').length;
            var cat = "<?php  echo get_queried_object()->cat_ID; ?>";
            console.log(num,cat);

             $.ajax({
                type: "GET",
                url: "/wp-admin/admin-ajax.php", // check the exact URL for your situation
                dataType: 'json',
                data: { action: 'loadMoreBlog', cat: cat, num: num},
                success: function(data){
                    console.log(data);
                },
                error: function(data)  
                {  
                    console.log(data)
                    console.log("Your browser broke!");
                    return false;
                }  

            }); 
    return false;   
});
    </script>
<?php get_footer(); ?>