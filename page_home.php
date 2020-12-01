<?php /* Template Name: Overview Page */ ?>
<?php get_header(); ?>
<div class="container">
  <div id="header">
      <div class="menu-symbol"><
        <img src="<?php echo(get_template_directory_uri()); ?>/img/menu-symbol.png">
      </div>
    </div>
    <div class="overview">
      <?php the_content(null, true); ?>
    </div>
</div>
<?php get_footer(); ?>