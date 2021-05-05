<div class="card card-rows-<?php block_field('rows'); ?>">
    <?php
        $attachment_id = block_value( 'bild' );
        echo($attachment_id);
        $url = wp_get_attachment_image( $attachment_id, $size = 'card');
        echo($url);
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
