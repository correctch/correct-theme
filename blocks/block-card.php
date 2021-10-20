<div class="card <?php if (block_value('color') === 'white') {
    echo 'card-white';
} else {
    echo 'card-accent';
} ?> card-rows-<?php block_field('rows'); ?>">
    <div class="img-wrapper">
        <?php
        $attachment_id = block_value('bild');
        $url = wp_get_attachment_image_src($attachment_id, $size = 'card')[0];
        ?>
        <img src="<?php echo $url; ?>" alt="" class="card-img">
        <?php if ((strlen(block_value('titel')) > 2 || strlen(block_value('sub_title')) > 2) && block_value('type') !== 'person') { ?>
            <div class="img-text-wrapper">
                <span class="card-title"><?php block_field('titel'); ?></span>
                <span class="card-subtitle"><?php block_field('sub_title'); ?></span>
            </div>
            <div class="av-section-color-overlay"></div>
        <?php } ?>
    </div>
    <div class="card-content">
        <?php if (strlen(block_value('titel')) > 2 && block_value('type') === 'person') { ?>
        <p class="card-title-content"><b><?php block_field('titel'); ?></b></p>
        <?php } ?>
        <ul class="card-list">
            <?php for ($i = 1; $i <= 4; $i++) {
                if (strlen(block_value('list_' . $i)) > 2) { ?>
                    <li><?php block_field('list_' . $i); ?></li>
                <?php }
            } ?>
        </ul>
        <?php if (strlen(block_value('text')) > 2) { ?><?php block_field('text'); ?><?php } ?>

        <?php if (strlen(block_value('catchphrase')) > 2) { ?><p
                class="card-catchphrase"><?php block_field('catchphrase'); ?></p><?php } ?>
        <?php if (block_value('url') !== "") { ?><a href="<?php block_field('url'); ?>" class="card-link button">
            <?php if (block_value('button-text') !== "") {
                block_field('button-text');
            } else {
                echo 'mehr erfahren';
            } ?>
            </a><?php } ?>

    </div>
</div>
