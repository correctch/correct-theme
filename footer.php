<div id="footer">
    <?php require('includes/footer-post.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="https://correct.ch">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo-correct-white-<?php echo substr(get_theme_mod('accent_color', ''),1); ?>.png" alt="" class="logo">
                </a>
            </div>
            <div id="social-wrapper-desktop" class="col">
                <?php require('includes/social-links.php'); ?>
            </div>
            <div class="col">
                <h4>Links</h4>
                <?php echo get_theme_mod('footer_links_block'); ?>
                <p>
                    <a class="link" href="https://correct.ch/impressum">Impressum</a>
                </p>
            </div>
            <div class="col">
                <h4>Kontakt</h4>
                <?php echo get_theme_mod('footer_adresse_block'); ?>
            </div>
        </div>
    </div>
     <div id="social-wrapper-mobile">
                <?php require('includes/social-links.php'); ?>
            </div>
</div>
<?php wp_footer(); ?>
<script>
    $(".accordion-header").click(function () {
        $(this).next('.accordion-content').slideToggle();
        $(this).parent().toggleClass("open");
    });

    $(".accordion > .accordion-content").hide();
    $(".accordion").removeClass("open");

    $(function () {
        let search_form_outer = $('.search-form-outer');

        $('.search-form-icon').click(function () {
            if (!search_form_outer.hasClass('active')) {
                search_form_outer.addClass('active');
                $(this).html('<i class="fas fa-times"></i>');
                $('#s').focus();
            } else {
                search_form_outer.removeClass('active');
                $(this).html('<i class="fas fa-search"></i>');
            }
        });
    });


    $('.mobile-menu .menu-item-has-children > span').append('<span class="next"><i class="fas fa-angle-right"></i></span>');

    var navExpand = [].slice.call(document.querySelectorAll('.mobile-menu .menu-item-has-children'));
    var backLink = '<li class="menu-item">\n\t<span><a class="nav-link nav-back-link" href="javascript:;">\n\t\t<span class="next"><i class="fas fa-angle-left"></i></span>Zurück\n\t</a></span>\n</li>';

    navExpand.forEach(item => {
        if (item.querySelector('.nav-expand-content') !== null) {
            item.querySelector('.nav-expand-content').insertAdjacentHTML('afterbegin', backLink);
        }
        
        if (item.querySelector('.next') !== null) {
            item.querySelector('.next').addEventListener('click', () => item.classList.add('active'))
        }
        
        if (item.querySelector('.nav-back-link') !== null) {
            item.querySelector('.nav-back-link').addEventListener('click', () => item.classList.remove('active'));
        }
    });

    // remove active class from all except first
    $('.menu-item-home.active:not(:first)').removeClass("active");
    $('.menu-item-home.current_page_item:not(:first)').removeClass("active");

    //get first active 
    $(function(){
      $('.menu-togle').click(function(){
             var elem = $('.current_page_item').first();
                    //funktioniert
                if (elem.parent().hasClass('nav-expand-content')) {
                    $('.current-menu-parent').find('> span > .next').click();
                }
            });
    })
    console.log('Viel Spass auf <?php echo get_bloginfo( 'name' ); ?> wünscht webtheke.ch');

</script>
</body>
</html>
