<div class="card card-rows-<?php block_field('rows'); ?>">
    <img src="<?php block_field('bild'); ?>" alt="" class="card-hover-img">
    <span class="card-title"><?php block_field('titel'); ?></span>
    <?php if(block_value('text') !== "") { ?>
        <p><?php block_field('text'); ?></p>
    <?php } ?>
    <?php if(block_value('url') !== "") { ?>
        <a href="<?php block_field('url'); ?>" class="card-link button">mehr erfahren</a>
    <?php } ?>
</div>
