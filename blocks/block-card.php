<div class="card card-rows-<?php block_field('rows'); ?>">
    <?php
        $attachment_id = block_field( 'bild' );
        $url = wp_get_attachment_image_src( $attachment_id, $size = 'card')[0];
    ?>
    <img src="<?php echo $url; ?>" alt="" class="card-hover-img">
    <div class="card-content">
        <span class="card-title"><?php block_field('titel'); ?></span>
        <?php if(block_value('text') !== "") { ?>
            <p><?php block_field('text'); ?></p>
        <?php } ?>
        <?php if(block_value('url') !== "") { ?>
            <a href="<?php block_field('url'); ?>" class="card-link button">mehr erfahren</a>
        <?php } ?>
    </div>
</div>
