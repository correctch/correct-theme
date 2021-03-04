<?php get_header(); ?>
<div class="container">
    <div class="text-container">

        <h2 class="page-title">
            Suche
        </h2>
        <div class="text">
            <?php
            $default_posts_per_page = get_option('posts_per_page');
            if (have_posts()) { ?>
            <p class="info">Ihre Suche für <strong><?php echo $s ?></strong> ergab folgende Resultate:</p>

            <?php while (have_posts()) : the_post();
                $count_posts++; ?>
                <div class="row search-result">
                    <div class="col-sm-12">
                        <h3 class="search-page-title"><a
                                    href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                        <div class="entry">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
                <hr>

            <?php endwhile; ?>

            <?php
            if ($count_posts >= $default_posts_per_page) { ?>
                <div class="row">
                    <div class="col-sm-12">
                        <p align="center"><?php next_posts_link('Mehr Suchresultate') ?></p>
                    </div>
                </div>
            <?php } } else { ?>
                <p>Wir konnten für Ihre Suche keine Ergebnisse finden.</p>
                <div class="search-form-outer active">
                    <div class="search-form-wrapper">
                        <form method="get" id="searchform-page" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="text" class="form-control" value="<?php echo wp_specialchars($s, 1); ?>"
                                   placeholder="Suchen..." name="s" id="s" required/>
                        </form>
                    </div>
                    <div class="search-form-icon no-action"><button form="searchform-page" type="submit"><i class="fas fa-search"></i></button></div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
