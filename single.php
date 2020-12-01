<?php get_header(); ?>
<?php if (has_post_thumbnail()){
	if(wp_is_mobile()) {
		the_post_thumbnail('small-banner-image', ['class' => 'main-img']);
	} else {
		the_post_thumbnail('banner-image', ['class' => 'main-img']);
	}
	
} ?>
<div class="container container-tight">
    <div id="main" class="row">
       <div class="col-sm-12">
           <?php
            if (have_posts()) : while (have_posts()) : the_post(); ?>
                <h2><?php the_title(); ?></h2>
                <div id="meta">
					<p>erstellt am: <?php the_date('d.m.Y'); ?> |
					Kategorie: <?php the_category(', '); ?></p>
				</div>
                <div class="entry">
                    <?php the_content(); ?>
                </div>
                <?php
                if(get_the_tag_list()) {
                    echo get_the_tag_list('<h3>Schlagworte</h3><ul class="tags"><li>','</li><li>','</li></ul>');
                }
        ?>
		<?php endwhile; endif; ?>
       </div>
	</div><!-- main -->
</div>
<?php get_footer(); ?>