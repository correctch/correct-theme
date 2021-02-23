<?php
$type = block_value( 'type' );

$media = '<img src="https://via.placeholder.com/400x300">';

if ($type === 'vid') {
    $url = block_value("media_vid");
    $string = '';
    $media = do_shortcode('[embedyt]'.$url.'[/embedyt]');

    /*$media = '<iframe width="630"
        height="354"
        src="https://www.youtube.com/embed/YuOBzWF0Aws"
        frameborder="0" 
        allowfullscreen></iframe>';*/
}elseif($type === 'img'){
    $media = wp_get_attachment_image( block_value("media_img"), 'large' );
}

?>

<div class="media-text-wrapper-container">
    <div class="media-text-wrapper">
        <div class="media">
            <?php echo $media ?>
        </div>
        <div class="text">
            <h3 class="title"><?php block_field('titel'); ?></h3>
            <span class="paragraph"><?php block_field('text'); ?></span>
            <a href="<?php block_field('button_url') ?? '' ?>"
               class="button"><?php block_field('button_text') ?? 'mehr erfahren' ?></a>
        </div>
    </div>
</div>