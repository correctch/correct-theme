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
