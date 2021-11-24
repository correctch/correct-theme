<?php /* Template Name: Landing Page Vorlage*/ ?>
<?php get_header('landing', ['page' => 'landing']); ?>
    <div id="app" data-app class="container landing-page">
        <?php if (has_post_thumbnail()) { ?>
            <div class="img-section" class="position-relative">
                <?php if (has_post_thumbnail()) {
                    if (wp_is_mobile()) {
                        the_post_thumbnail('banner-image', ['class' => 'main-img']);
                    } else {
                        the_post_thumbnail('side-image', ['class' => 'main-img']);
                    }
                } ?>
                <?php if (get_field('main-image__button-link') || get_field('main-image__title')) { ?>
                    <div class="av-section-color-overlay"></div>
                <?php } ?>
                <div id="image-text-wrapper">
                    <h1 id="main-image-text"><?php echo get_field('main-image__title'); ?></h1>
                    <?php if (get_field('main-image__button-link')) { ?>
                        <a class="button" id="main-image-button"
                           href="<?php echo get_field('main-image__button-link'); ?>"><?php echo get_field('main-image__button-text'); ?></a>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        <div class="text-container" id="page-content">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php
                if (is_page() && $post->post_parent) {
                    $children = get_children(['post_parent' => $post->post_parent]);
                    //var_dump($children);
                }
                ?>
                <div class="text">
                    <?php the_content(null, true); ?>
                </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
<?php get_footer(null, ['show_post' => false]); ?>