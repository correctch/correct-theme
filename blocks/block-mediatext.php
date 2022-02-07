<?php
$type = block_value('type');

$media = '<img src="https://via.placeholder.com/400x300">';

if ($type === 'vid') {
    $url = block_value("media_vid");

    if (strpos($url, 'youtube')) {
        $video_id = str_replace('https://www.youtube.com/watch?v=', '', $url);
        $embed_url = 'https://www.youtube.com/embed/' . $video_id;
        $media = '<iframe width="560" height="315" src="' . $embed_url . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    } else if (strpos($url, 'vimeo')) {
        $video_id = str_replace('https://vimeo.com/', '', $url);
        $embed_url = 'https://player.vimeo.com/video/' . $video_id;
        $media = '<iframe title="vimeo-player" src="' . $embed_url . '" width="640" height="360" frameborder="0" allowfullscreen></iframe>';
    }
} elseif ($type === 'img') {
    $media = wp_get_attachment_image(block_value("media_img"), 'large');
}

?>

<div class="media-text-wrapper-container">
    <div class="media-text-wrapper <?php echo(block_value('media-small') ? 'media-small' : ''); ?> media-text-<?php echo block_field('color') ?>">
        <div class="media">
            <?php echo $media ?>
        </div>
        <div class="text">
            <h3 class="title"><?php block_field('titel'); ?></h3>
            <ul>
                <?php
                if (block_rows('liste')) {
                    while (block_rows('liste')) :
                        block_row('liste');
                        $title = block_sub_value('titel');
                        $text = block_sub_value('subtext');
                        if ($title || $text) {
                            // Do something.
                            echo "<li>";
                            if ($title){
                                echo "<span class=\"list-title\">".$title."</span>";
                            }
                            if ($title && $text){
                                echo "<br>";
                            }
                            if ($text){
                                echo "<span class=\"list-text\">".$text."</span>";
                            }
                            echo "</li>";
                        }
                    endwhile;
                } else {
                    for ($i = 1; $i <= 5; $i++) {
                        if (strlen(block_value('list-title-' . $i)) > 2 && strlen(block_value('list-text-' . $i)) > 2) { ?>
                            <li><span class="list-title"><?php block_field('list-title-' . $i); ?></span><br><span
                                        class="list-text"><?php block_field('list-text-' . $i); ?></span></li>
                        <?php }
                    }
                } ?>
            </ul>
            <a href="<?php block_field('button_url') ?? '' ?>" <?php if (block_value('new-tab') == 1): echo "target=\"_blank\""; endif; ?>
               class="button"><?php block_field('button_text') ?? 'mehr erfahren' ?></a>
        </div>
    </div>
</div>