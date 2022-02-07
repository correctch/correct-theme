<?php get_header(); ?>
    <div class="text-container text-center error-404" id="page-content">
        <div class="text">
            <h2 class="text-center">Die correcte Seite nicht gefunden?</h2>
            <div class="row mt-2">
                <div class="col" id="error-image-col">
                    <img alt="Servierer der Kundin hilft" id="error-image"
                         src="<?php echo get_template_directory_uri(); ?>/img/examples/error-404.png">
                </div>
                <div class="col" id="error-text-col">
                    <div>
                        <span class="error">
                            <span class="error-nbr">
                               404
                            </span>
                            <span class="error-text">
                                Seite existiert nicht
                            </span>
                        </span>
                    </div>
                    <div class="mt-2">
                        <div>
                            <p>Wie können wir Ihnen weiterhelfen?</p>
                        </div>
                        <div>
                            <a class="button btn-block btn-wide">Startseite</a>
                            <a class="button">Kontakt</a>
                        </div>
                        <div class="mt-2">
                            <p>support@correct.ch</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- main -->
    </div>
<?php get_footer(); ?>