<div class="founder">
    <div class="founder__text">
        <div class="founder__title"><?php block_field('title'); ?></div>
        <div class="founder__intro"><?php block_field('intro'); ?></div>
        <?php if (strlen(block_value('more')) > 2) { ?>
            <div class="read-more">Mehr erfahren</div>
            <div class="founder__more"><?php block_field('more'); ?></div>
            <div class="read-less">Weniger erfahren</div>
        <?php } ?>
    </div>
    <div class="founder__infos">
        <div class="founder__image">
            <?php
            $attachment_id = block_value('image');
            $url = wp_get_attachment_image_src($attachment_id, $size = 'card')[0];
            ?>
            <img src="<?php echo $url; ?>" alt="" class="founder-image">
        </div>
        <span class="founder__name"><?php block_field('name'); ?></span>
    </div>
</div>