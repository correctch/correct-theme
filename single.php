<?php get_header(); ?>
<div class="container">
    <div class="img-section">
        <?php if (has_post_thumbnail()) {
            if (wp_is_mobile()) {
                the_post_thumbnail('banner-image', ['class' => 'main-img']);
            } else {
                the_post_thumbnail('side-image', ['class' => 'main-img']);
            }
        } ?>
    </div>
    <div class="text-container blog-text" id="page-content">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h2 class="page-title"><?php the_title(); ?></h2>
            <div class="abstract">
                <?php echo get_extended(get_post()->post_content)['main'] ?>
            </div>
            <div class="text">
                <?php the_content(null, true); ?>
            </div>
            <div id="meta">
                <div class="author-img">
                    <?php echo get_avatar(get_the_author_meta('ID'), 100); ?>
                </div>
                <div class="author-meta">
                    <span>
                        <?php the_author_meta('first_name'); ?> <?php the_author_meta('last_name'); ?><br>
                        <?php the_date('d.m.Y'); ?>
                    </span>
                </div>
                <div class="back-to-blogs">
                    <a class="button" href="/blog">Zur Beitragsübersicht</a>
                </div>
            </div>
            <div class="back-to-blogs-mobile">
                <a class="button" href="/blog">Zur Beitragsübersicht</a>
            </div>
        <?php endwhile; endif; ?>
    </div>
</div>
<?php get_footer(); ?>
