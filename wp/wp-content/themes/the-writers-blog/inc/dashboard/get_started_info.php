<?php

add_action( 'admin_menu', 'the_writers_blog_gettingstarted' );
function the_writers_blog_gettingstarted() {
	add_theme_page( esc_html__('About Theme', 'the-writers-blog'), esc_html__('About Theme', 'the-writers-blog'), 'edit_theme_options', 'the-writers-blog-guide-page', 'the_writers_blog_guide');   
}

function the_writers_blog_admin_theme_style() {
   wp_enqueue_style('the-writers-blog-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/get_started_info.css');
   wp_enqueue_script('tabs', esc_url(get_template_directory_uri()) . '/inc/dashboard/js/tab.js');
}
add_action('admin_enqueue_scripts', 'the_writers_blog_admin_theme_style');

function the_writers_blog_notice(){
    global $pagenow;
    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {?>
    <div class="notice notice-success is-dismissible getting_started">
		<div class="notice-content">
			<h2><?php esc_html_e( 'Thanks for installing The Writers Blog Theme', 'the-writers-blog' ) ?> </h2>
			<p><?php esc_html_e( "Please Click on the link below to know the theme setup information", 'the-writers-blog' ) ?></p>
			<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=the-writers-blog-guide-page' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Get Started ', 'the-writers-blog' ); ?></a></p>
		</div>
	</div>
	<?php }
}
add_action('admin_notices', 'the_writers_blog_notice');


/**
 * Theme Info Page
 */
function the_writers_blog_guide() {

	// Theme info
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'the-writers-blog' ); ?>

	<div class="wrap getting-started">
		<div class="getting-started__header">
				<div class="intro">
					<div class="pad-box">
						<h2 align="center"><?php esc_html_e( 'Welcome to The Writers Blog Theme', 'the-writers-blog' ); ?>
						<span class="version" align="center">Version: <?php echo esc_html($theme['Version']);?></span></h2>	
						</span>
						<div class="powered-by">
							<p align="center"><strong><?php esc_html_e( 'Theme created by ThemesEye', 'the-writers-blog' ); ?></strong></p>
							<p align="center">
								<img role="img" class="logo" src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/logo.png'); ?>"/>
							</p>
						</div>
					</div>
				</div>

			<div class="tab">
			  <button role="tab" class="tablinks" onclick="the_writers_blog_open(event, 'lite_theme')">Getting Started</button>		  
			  <button role="tab" class="tablinks" onclick="the_writers_blog_open(event, 'pro_theme')">Get Premium</button>
			</div>

			<!-- Tab content -->
			<div id="lite_theme" class="tabcontent open">
				<h2 class="tg-docs-section intruction-title" id="section-4" align="center"><?php esc_html_e( '1) The Writers Blog Lite Theme', 'the-writers-blog' ); ?></h2>
				<div class="row">
					<div class="col-md-5">
						<div class="pad-box">
	              			<img role="img" class="logo" src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/screenshot.png'); ?>"/>
	              		 </div> 
					</div>
					<div class="theme-instruction-block col-md-7">
						<div class="pad-box">
		                    <div class="table-image">
								<table class="tablebox">
									<thead>
										<tr>
											<th><?php esc_html_e('Setup', 'the-writers-blog'); ?></th>
											<th><?php esc_html_e('Click Here', 'the-writers-blog'); ?></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><?php esc_html_e('Logo', 'the-writers-blog'); ?></td>
											<td class="table-img"><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Click', 'the-writers-blog'); ?></a></td>
										</tr>
									</tbody>
									<tbody>
										<tr>
											<td><?php esc_html_e('Menus', 'the-writers-blog'); ?></td>
											<td class="table-img"><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Click', 'the-writers-blog'); ?></a></td>
										</tr>
									</tbody>
									<tbody>
										<tr>
											<td><?php esc_html_e('Slider', 'the-writers-blog'); ?></td>
											<td class="table-img"><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=the_writers_blog_slider') ); ?>" target="_blank"><?php esc_html_e('Click', 'the-writers-blog'); ?></a></td>
										</tr>
									</tbody>
									<tbody>
										<tr>
											<td><?php esc_html_e('Post Settings', 'the-writers-blog'); ?></td>
											<td class="table-img"><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=the_writers_blog_blog_post') ); ?>" target="_blank"><?php esc_html_e('Click', 'the-writers-blog'); ?></a></td>
										</tr>
									</tbody>
									<tbody>
										<tr>
											<td><?php esc_html_e('Footer', 'the-writers-blog'); ?></td>
											<td class="table-img"><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=the_writers_blog_footer') ); ?>" target="_blank"><?php esc_html_e('Click', 'the-writers-blog'); ?></a></td>
										</tr>
									</tbody>
								</table>
							</div>
							<ol>
								<li><?php esc_html_e( 'Start','the-writers-blog'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','the-writers-blog'); ?></a> <?php esc_html_e( 'your website.','the-writers-blog'); ?> </li>
								<li><?php esc_html_e( 'The Writers Blog','the-writers-blog'); ?> <a target="_blank" href="<?php echo esc_url( THE_WRITERS_BLOG_FREE_DOC ); ?>"><?php esc_html_e( 'Documentation','the-writers-blog'); ?></a> </li>
							</ol>
	                    </div>
	                </div>
				</div><br><br>
				
	        </div>
	        <div id="pro_theme" class="tabcontent">
				<h2 class="dashboard-install-title" align="center"><?php esc_html_e( '2) Premium Theme Information.','the-writers-blog'); ?></h2>
            	<div class="row">
					<div class="col-md-7">
						<img role="img" src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/responsive.png'); ?>" alt="">
						<div class="pro-links" >
					    	<a href="<?php echo esc_url( THE_WRITERS_BLOG_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'the-writers-blog'); ?></a>
							<a href="<?php echo esc_url( THE_WRITERS_BLOG_BUY_PRO ); ?>"><?php esc_html_e('Buy Pro', 'the-writers-blog'); ?></a>
							<a href="<?php echo esc_url( THE_WRITERS_BLOG_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'the-writers-blog'); ?></a>
						</div>
						<div class="pad-box">
							<h3><?php esc_html_e( 'Pro Theme Description','the-writers-blog'); ?></h3>
                    		<p class="pad-box-p"><?php esc_html_e( 'This blog WordPress theme is packed with some top notch features to make an all-encompassing website that does not require you to be a professional coder to make important changes. You can include unlimited slides in the slider area. For a blog it is important to choose typography wisely and to help in the same we have offered unlimited colour options and numerous Google fonts. This blog theme welcomes heavy customization through theme customizer and dashboard. Various shortcodes are implemented and many more Font Awesome icons are used to make website modern and handy. We give customer support and regular theme updates for one year with this premium theme.', 'the-writers-blog' ); ?><p>
                    	</div>
					</div>
					<div class="col-md-5 install-plugin-right">
						<div class="pad-box">								
							<h3><?php esc_html_e( 'Pro Theme Features','the-writers-blog'); ?></h3>
							<div class="dashboard-install-benefit">
								<ul>
									<li><?php esc_html_e( 'Easy install 10 minute setup Themes','the-writers-blog'); ?></li>
									<li><?php esc_html_e( 'Multiplue Domain Usage','the-writers-blog'); ?></li>
									<li><?php esc_html_e( 'Premium Technical Support','the-writers-blog'); ?></li>
									<li><?php esc_html_e( 'FREE Shortcodes','the-writers-blog'); ?></li>
									<li><?php esc_html_e( 'Multiple page templates','the-writers-blog'); ?></li>
									<li><?php esc_html_e( 'Google Font Integration','the-writers-blog'); ?></li>
									<li><?php esc_html_e( 'Customizable Colors','the-writers-blog'); ?></li>
									<li><?php esc_html_e( 'Theme customizer ','the-writers-blog'); ?></li>
									<li><?php esc_html_e( 'Documention','the-writers-blog'); ?></li>
									<li><?php esc_html_e( 'Unlimited Color Option','the-writers-blog'); ?></li>
									<li><?php esc_html_e( 'Plugin Compatible','the-writers-blog'); ?></li>
									<li><?php esc_html_e( 'Social Media Integration','the-writers-blog'); ?></li>
									<li><?php esc_html_e( 'Incredible Support','the-writers-blog'); ?></li>
									<li><?php esc_html_e( 'Eye Appealing Design','the-writers-blog'); ?></li>
									<li><?php esc_html_e( 'Simple To Install','the-writers-blog'); ?></li>
									<li><?php esc_html_e( 'Fully Responsive ','the-writers-blog'); ?></li>
									<li><?php esc_html_e( 'Translation Ready','the-writers-blog'); ?></li>
									<li><?php esc_html_e( 'Custom Page Templates ','the-writers-blog'); ?></li>
									<li><?php esc_html_e( 'WooCommerce Integration','the-writers-blog'); ?></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
          	<div class="dashboard__blocks">
				<div class="row">
					<div class="col-md-3">
						<h3><?php esc_html_e( 'Get Support','the-writers-blog'); ?></h3>
						<ol>
							<li><a target="_blank" href="<?php echo esc_url( THE_WRITERS_BLOG_FREE_SUPPORT ); ?>"><?php esc_html_e( 'Free Theme Support','the-writers-blog'); ?></a></li>
							<li><a target="_blank" href="<?php echo esc_url( THE_WRITERS_BLOG_PRO_SUPPORT ); ?>"><?php esc_html_e( 'Premium Theme Support','the-writers-blog'); ?></a></li>
						</ol>
					</div>

					<div class="col-md-3">
						<h3><?php esc_html_e( 'Getting Started','the-writers-blog'); ?></h3>
						<ol>
							<li><?php esc_html_e( 'Start','the-writers-blog'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','the-writers-blog'); ?></a> <?php esc_html_e( 'your website.','the-writers-blog'); ?> </li>
						</ol>
					</div>
					<div class="col-md-3">
						<h3><?php esc_html_e( 'Help Docs','the-writers-blog'); ?></h3>
						<ol>
							<li><a target="_blank" href="<?php echo esc_url( THE_WRITERS_BLOG_FREE_DOC ); ?>"><?php esc_html_e( 'Free Theme Documentation','the-writers-blog'); ?></a></li>
							<li><a target="_blank" href="<?php echo esc_url( THE_WRITERS_BLOG_PRO_DOC ); ?>"><?php esc_html_e( 'Premium Theme Documentation','the-writers-blog'); ?></a></li>
						</ol>
					</div>
					<div class="col-md-3">
						<h3><?php esc_html_e( 'Buy Premium','the-writers-blog'); ?></h3>
						<ol>
							<li><a href="<?php echo esc_url( THE_WRITERS_BLOG_BUY_PRO ); ?>"><?php esc_html_e('Buy Pro', 'the-writers-blog'); ?></a></li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		
	</div>

<?php
}?>