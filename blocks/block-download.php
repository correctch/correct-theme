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
$is_account = strlen($_COOKIE['hubspotRegistration']) > 0;

?>
<div class="media-text-wrapper-container">
    <div class="media-text-wrapper media-text-<?php echo block_field('color') ?> downloads">
        <div class="media">
            <?php echo $media ?>
        </div>
        <div class="text">
            <h3 class="title"><?php block_field('titel'); ?></h3>
            <p class="subtitle"><?php block_field('subtitle'); ?></p>
            <?php if (strlen(block_value('download-button-url')) > 6) { ?>
                <div>
                    <?php if ($is_account || block_value('color') === 'white') { ?>
                        <a target="_blank" href="<?php block_field('download-button-url') ?? '' ?>" onclick="dataLayer.push({'event': 'download-pdf', 'href':this.href});"
                           class="button"><?php block_field('download-button-text') ?? 'Download Dokument' ?></a>
                    <?php } elseif (strlen(block_value('shortcode-form')) > 4) { ?>
                        <?php $hasId = preg_match('/id="(.+)"\]/', block_value('shortcode-form'), $id);
                        $id = $id[1] ?? substr(str_shuffle("abcdefghijklmnopqrstuvwxyz1234567890ABCDFGHJIKLMNOPQRSTUVWXYZ-"), 0, 24);
                        ?>
                        <a target="_blank" style="display: none"
                           id="download-direct-<?php echo $id ?>"
                           onclick="dataLayer.push({'event': 'download-pdf', 'href':this.href});"
                           href="<?php block_field('download-button-url') ?? '' ?>"
                           class="button download-direct"><?php block_field('download-button-text') ?? 'Download Dokument' ?></a>
                        <a target="#" data-modal-target="modal-<?php echo $id ?>" class="button modal-button"
                           id="download-<?php echo $id ?>"><?php block_field('download-button-text') ?? 'Download Dokument' ?></a>
                        <div id="modal-<?php echo $id ?>" class="modal custom-modal">
                            <!-- Modal content -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <span class="download-modal-close close">&times;</span>
                                    <h2>Registration für Zugriff</h2>
                                </div>
                                <div class="modal-body">
                                    <?php do_shortcode(block_field('shortcode-form')) ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
            <?php
            if (block_value('blog')->post_title !== 'Downloads' && strlen(block_value('blog-button-text')) > 6) { ?>
                <div><a target="_blank" href="<?php echo get_permalink(block_value('blog')->ID); ?>"
                        class="button"><?php block_field('blog-button-text') ?? 'Zum Blogbeitrag' ?></a></div>
            <?php } ?>
        </div>
    </div>
</div>