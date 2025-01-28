<?php
/**
 * Displays top navigation
 */
?>

<div class="header-menu">
	<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'the-writers-blog' ); ?>">
		<button role="tab" class="menu-toggle my-3 mx-auto" aria-controls="top-menu" aria-expanded="false">
			<?php
				esc_html_e( 'Menu', 'the-writers-blog' );
			?>
		</button>
		<?php wp_nav_menu( array(
			'theme_location' => 'top',
			'menu_id'        => 'top-menu',
		) ); ?>				
	</nav>		
</div>