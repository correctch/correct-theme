<a href="<?php block_field( 'url' ); ?>" class="card card-rows-<?php block_field( 'rows' ); ?>">
	<img src="<?php block_field( 'bild' ); ?>" alt="" class="card-hover-img">
	<img src="<?php echo(get_template_directory_uri()) ?>/img/card-mask-hover.png" class="card-mask-hover" alt="">
	<img src="<?php echo(get_template_directory_uri()) ?>/img/card-mask.png" class="card-mask" alt="">
	<span class="card-title"><?php block_field( 'titel' ); ?></span>
</a>