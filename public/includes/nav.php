<?php
wp_nav_menu([
    'menu' => 'main',
    'container_id' => 'mainmenu',
    'walker' => new CSS_Menu_Maker_Walker()
]);
wp_nav_menu([
    'menu' => 'contact',
    'container_id' => 'contact-menu',
    'walker' => new CSS_Menu_Maker_Walker()
]);
?>
<div class="search-form-outer">
    <div class="search-form-wrapper">
        <form method="get" id="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="text" class="form-control" value="<?php echo wp_specialchars($s, 1); ?>"
                   placeholder="Suchen..." name="s" id="s"/>
        </form>
    </div>
    <div class="search-form-icon"><a id="search-icon-wrapper"><i class="fas fa-search"></i></a></div>
</div>