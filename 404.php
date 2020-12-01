<?php get_header(); ?>
<div class="container py-4">
	<div id="main">
		<h2>404 - Seite nicht gefunden</h2>
		<img src="<?php echo get_template_directory_uri(); ?>/img/404.gif" alt="Figur mit Karte">
		<p>Sorry! Diese Seite existiert nicht. Bitte schreiben Sie mir eine <a href="mailto:samuel@webtheke.ch?subject=<?php echo get_bloginfo('name'); ?> - 404 Seite nicht gefunden">eMail</a>, dann helf ich weiter.</p>
	</div><!-- main -->
</div>
<?php get_footer(); ?>