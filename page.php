<?php get_header(); ?>
    <div class="container page-img-compact">
        <?php if (has_post_thumbnail()) { ?>
            <div class="img-section" class="position-relative">
                <?php if (wp_is_mobile()) {
                    the_post_thumbnail('banner-image', ['class' => 'main-img']);
                } else {
                    the_post_thumbnail('side-image', ['class' => 'main-img']);
                } ?>
                <?php if (get_field('main-image__button-link') || get_field('main-image__title')) { ?>
                    <div class="av-section-color-overlay"></div>
                <?php } ?>
                <div id="image-text-wrapper">
                    <h1 id="main-image-text"><?php echo get_field('main-image__title'); ?></h1>
                    <?php if (get_field('main-image__button-link')) { ?>
                        <a class="button" id="main-image-button"
                           href="<?php echo get_field('main-image__button-link'); ?>"><?php echo get_field('main-image__button-text'); ?></a>
                    <?php } elseif (get_field('search_type') && get_field('search_type') == 1) { ?>
                        <form action="https://app.dokumentengenerator.correct.ch/suchen" target="__blank" method="get"
                              id="search-form-header">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input type="text" class="form-control search-input" name="filter"
                                       placeholder="Vorlagen durchsuchen">
                                <div class="input-group-append">
                                    <input type="submit" class="button btn btn-primary border-main-color"
                                           value="suchen">
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        <div class="text-container" id="page-content">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php
                if (is_page() && $post->post_parent) {
                    $children = get_children(['post_parent' => $post->post_parent]);
                }
                ?>
                <div class="text">
                    <?php the_content(null, true); ?>
                </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
<?php get_footer(); ?>