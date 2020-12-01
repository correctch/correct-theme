<div id="footer" class="container">
    <div class="row">
        <div class="col img-section"></div>
        <div class="col content">
            <?php echo get_theme_mod( 'footer_zeile_block'); ?>
            <a href="https://correct.ch">correct.ch ag</a> | <a href="trennung.ch/impressum">Impressum</a>
        </div>
    </div>
</div>
<?php wp_footer();?>
<script>
	$(".accordion-header").click(function() {
		$(this).next('.accordion-content').slideToggle();
		$(this).parent().toggleClass("open");
	});

	$(".accordion > .accordion-content").hide();
	$(".accordion").removeClass("open");
</script>
</body>
</html>
