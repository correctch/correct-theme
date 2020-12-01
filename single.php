<?php get_header(); ?>
<div class="container row">
    <div class="img-section col">
        <?php if (has_post_thumbnail()){
            if(wp_is_mobile()) {
                the_post_thumbnail('banner-image', ['class' => 'main-img']);
            } else {
                the_post_thumbnail('side-image', ['class' => 'main-img']);
            }
        } ?>
    </div>
    <div class="content col">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php
                wp_nav_menu([
                    'menu' => 'main',
                    'container_id' => 'mainmenu',
                    'walker' => new CSS_Menu_Maker_Walker()
                ]);
            ?>
            <h2 id="post-title"><?php the_title(); ?></h2>
            <div id="meta">
                <p>erstellt am: <?php the_date('d.m.Y'); ?> |
                    Kategorie: <?php the_category(', '); ?></p>
            </div>
            <div class="abstract">
                <?php echo get_extended(get_post()->post_content)['main'] ?>
            </div>
            <div class="text">
                <?php the_content(null, true); ?>
            </div>
        <?php endwhile; endif; ?>
    </div>
</div>
<?php get_footer(); ?>
