<?php get_header(); ?>
<div class="row">
	<?php if(!wp_is_mobile()) { ?>
		<div class="col-sm-3" id="sidebar">
			<h4>Archiv</h4>
			<?php wp_get_archives( array( 'type' => 'yearly') ); ?>
		</div><!-- sidebar -->
		<div class="col-sm-9" id="main">
	<?php } else { ?>
		<div class="col-sm-12" id="main">
			<h2>Neuigkeiten</h2>
	<?php }
	if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article class="cardW">
				<div class="post-thumbnail">
					<a href="<?php the_permalink(); ?>">
						<?php if (has_post_thumbnail()){
							the_post_thumbnail('banner-image');
						} else { ?>
							<img src="https://via.placeholder.com/1000x400">
						<?php } ?>
					</a>
				</div>
				<h5><?php the_time('d.m.Y'); ?></h5>
				<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>		
				<div class="content">
					<?php the_content(); ?>
				</div>
				<a class="read-more" href="<?php the_permalink(); ?>">Mehr erfahren</a>
			</article>
		<?php endwhile; endif; ?>
	</div><!-- main -->
</div>
<?php get_footer(); ?>