<?php get_header(); ?>
<div class="container py-4">
	<div class="row">
		<?php if(!wp_is_mobile()) { ?>
			<div class="col-sm-3" id="sidebar">
				<?php get_sidebar(); ?>
			</div><!-- sidebar -->
			<div class="col-sm-9" id="main">
		<?php } else { ?>
			<div class="col-sm-12" id="main">
		<?php } ?>
			<h2>Suche</h2>
			<?php 
			$count_posts = 0;
			$default_posts_per_page = get_option( 'posts_per_page' );
			if (have_posts()) { ?>
				<p class="info">Ihre Suche für <strong><?php echo $s ?></strong> ergab folgende Resultate:</p>

				<?php echo($total);
					while (have_posts()) : the_post();
					$count_posts++;?>
					<div class="row search-result">
						<div class="col-sm-12">
							<h3 class="search-page-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
							<div class="entry">
								<?php the_content(); ?>
							</div>
						</div>
					</div>
					<hr>

				<?php endwhile; ?>

				<?php 
				if($count_posts >= $default_posts_per_page) { ?>
					<div class="row">
						<div class="col-sm-12">
							<p align="center"><?php next_posts_link('Mehr Suchresultate') ?></p>
						</div>
					</div>
				<?php } ?>
			<?php } else { ?>
				<p>Leider nichts gefunden. <i class="far fa-frown"></i></p>
				<form method="get" id="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="Suchen..." name="s" id="s" />
						<div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-search"></i></span>
						</div>
					</div>
				</form>
			<?php } ?>
		</div><!-- main -->
	</div>
</div>

<?php get_footer(); ?>