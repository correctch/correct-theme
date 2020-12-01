<?php get_header(); ?>
<img class="attachment-banner-image size-banner-image wp-post-image main-img" src="<?php if (function_exists('z_taxonomy_image_url')) echo z_taxonomy_image_url(); ?>">
<div class="container container-tight py-4">
<h2><?php single_cat_title(); ?></h2>
<?php 
the_archive_description( '<div class="taxonomy-description">', '</div>' ); 
?>
	<div class="row">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		    <div class="card-box">
                <?php if (has_post_thumbnail()){ ?>
                    <div class="card-box-image-container">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('card'); ?>
                        </a>
                    </div>
		        <?php } ?>
		        <h4 class="card-box-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>		
				<a class="card-box-action" href="<?php the_permalink(); ?>">Mehr erfahren</a>
		    </div>
		<?php endwhile; endif; ?>
	</div>
</div><!-- main -->

<?php get_footer(); ?>