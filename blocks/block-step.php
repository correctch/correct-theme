<div class="explanation-step">
    <div class="step__icon">
        <?php
        $attachment_id = block_value('icon');
        $url = wp_get_attachment_image_src($attachment_id, $size = 'card')[0];
        ?>
        <img src="<?php echo $url; ?>" alt="" class="step__icon-image">
    </div>
    <div class="step__title">
        <?php block_field('title'); ?>
    </div>
    <div class="step__abstract">
        <?php block_field('abstract'); ?>
        <span class="read-more">Mehr anzeigen <i class="fas fa-caret-down"></i></span>
        <span class="read-less">Weniger anzeigen <i class="fas fa-caret-up"></i></span>
    </div>
    <div class="step__details">
        <ul class="step__details-list">
            <?php for ($i = 1; $i <= 6; $i++) {
                if (strlen(block_value('list-' . $i)) > 2) { ?>
                    <li><?php block_field('list-' . $i); ?></li>
                <?php }
            } ?>
        </ul>
    </div>
</div>