<div class="mobile-menu">
	            <?php
	                wp_nav_menu([
	                    'menu' => 'main',
	                    'container_id' => 'main-menu-mobile',
	                    'walker' => new CSS_Menu_Maker_Walker()
	                ]);
	            ?>
	             <div id="mobile-search-form" class="search-form-outer">
		            <div class="search-form-wrapper">
		           		 <form method="get" id="searchform-mobile" action="<?php echo $_SERVER['PHP_SELF']; ?>">
									<input type="text" class="form-control" style="color:white;" value="<?php echo wp_specialchars($s, 1); ?>" placeholder="Suchen..." name="s" id="s-mobile" />
						</form>
						<div class="search-form-icon"><a id="search-icon-wrapper"><i class="fas fa-search"></i></a></div>
		            </div>
	            </div>
	            <?php
	                wp_nav_menu([
	                    'menu' => 'contact',
	                    'container_id' => 'contact-menu-mobile',
	                    'walker' => new CSS_Menu_Maker_Walker()
	                ]);
	            ?>
</div>