<div class="custom-citation">
    <div class="citation__details">
        <div class="citation__text"><?php block_field( 'text' ); ?></div>
        <div class="citation__from"><?php block_field( 'person' ); ?></div>
    </div>
    <div class="citation__image-wrapper">
        <?php
        $attachment_id = block_value('bild');
        $url = wp_get_attachment_image_src($attachment_id, $size = 'card')[0];
        ?>
        <img src="<?php echo $url; ?>" alt="" class="citation-image">
    </div>
</div>