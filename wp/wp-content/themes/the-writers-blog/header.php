<?php
/**
 * The header for our theme 
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open(); 
	} else { 
		do_action( 'wp_body_open' ); 
	} ?>	
	<?php if(get_theme_mod('the_writers_blog_loader_setting',false)){ ?>
	    <div id="pre-loader">
			<div class='demo'>
				<?php $the_writers_blog_theme_lay = get_theme_mod( 'the_writers_blog_preloader_types','Default');
				if($the_writers_blog_theme_lay == 'Default'){ ?>
					<div class='circle'>
						<div class='inner'></div>
					</div>
					<div class='circle'>
						<div class='inner'></div>
					</div>
					<div class='circle'>
						<div class='inner'></div>
					</div>
				<?php }elseif($the_writers_blog_theme_lay == 'Circle'){ ?>
					<div class='circle'>
						<div class='inner'></div>
					</div>
				<?php }elseif($the_writers_blog_theme_lay == 'Two Circle'){ ?>
					<div class='circle'>
						<div class='inner'></div>
					</div>
					<div class='circle'>
						<div class='inner'></div>
					</div>
				<?php } ?>
			</div>
	    </div>
	<?php }?>
	<a class="screen-reader-text skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'the-writers-blog' ); ?></a>
	<div id="page" class="site">
		<header id="masthead" class="site-header" role="banner">
			<div class="main-header">
				<div class="container">
					<div class="top-menu">
						<div class="row m-0">
							<div class="col-lg-4 col-md-4 align-self-center">
								<div class="social-icons mt-2 text-lg-start text-center ps-3 align-self-center">
								    <?php if( get_theme_mod( 'the_writers_blog_facebook_url') != '') { ?>
							        	<a href="<?php echo esc_url( get_theme_mod( 'the_writers_blog_facebook_url','' ) ); ?>" target="_blank"><i class="<?php echo esc_attr(get_theme_mod('the_writers_blog_facebook_icon_changer','fab fa-facebook-f')); ?> py-3 px-2" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook','the-writers-blog' );?></span></a>
								    <?php } ?>
								    <?php if( get_theme_mod( 'the_writers_blog_twitter_url') != '') { ?>
								    	<a href="<?php echo esc_url( get_theme_mod( 'the_writers_blog_twitter_url','' ) ); ?>" target="_blank"><i class="<?php echo esc_attr(get_theme_mod('the_writers_blog_twitter_icon_changer','fab fa-twitter')); ?> py-3 px-2"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter','the-writers-blog' );?></span></a>
								    <?php } ?>
								    <?php if( get_theme_mod( 'the_writers_blog_youtube_url') != '') { ?>
								    	<a href="<?php echo esc_url( get_theme_mod( 'the_writers_blog_youtube_url','' ) ); ?>" target="_blank"><i class="<?php echo esc_attr(get_theme_mod('the_writers_blog_youtube_icon_changer','fab fa-youtube')); ?> py-3 px-2"></i><span class="screen-reader-text"><?php esc_html_e( 'Youtube','the-writers-blog' );?></span></a>
								    <?php } ?>	
								    <?php if( get_theme_mod( 'the_writers_blog_linkedin_url') != '') { ?>
								    	<a href="<?php echo esc_url( get_theme_mod( 'the_writers_blog_linkedin_url','' ) ); ?>" target="_blank"><i class="<?php echo esc_attr(get_theme_mod('the_writers_blog_linkedin_icon_changer','fab fa-linkedin-in')); ?> py-3 px-2"></i><span class="screen-reader-text"><?php esc_html_e( 'Linkedin','the-writers-blog' );?></span></a>
								    <?php } ?>
								    <?php if( get_theme_mod( 'the_writers_blog_instagram_url') != '') { ?>
								    	<a href="<?php echo esc_url( get_theme_mod( 'the_writers_blog_instagram_url','' ) ); ?>" target="_blank"><i class="<?php echo esc_attr(get_theme_mod('the_writers_blog_instagram_icon_changer','fab fa-instagram')); ?> py-3 px-2"></i><span class="screen-reader-text"><?php esc_html_e( 'Instagram','the-writers-blog' );?></span></a>
								    <?php } ?>		           
								</div> 
							</div>
							<div class="col-lg-4 col-md-4 align-self-center">
								<div class="logo text-center my-3 align-self-center">
									<?php if ( has_custom_logo() ) : ?>
						              <div class="site-logo"><?php the_custom_logo(); ?></div>
						            <?php endif; ?>
				              		<?php $blog_info = get_bloginfo( 'name' ); ?>
				              		<?php if ( ! empty( $blog_info ) ) : ?>
						              	<?php if( get_theme_mod('the_writers_blog_show_site_title',true) != ''){ ?>
							                <?php if ( is_front_page() && is_home() ) : ?>
							                  <h1 class="site-title m-0 text-uppercase"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							                <?php else : ?>
							                  <p class="site-title m-0 text-uppercase"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							                <?php endif; ?>
						                <?php }?>
						            <?php endif; ?>
						            <?php
							            $description = get_bloginfo( 'description', 'display' );
							            if ( $description || is_customize_preview() ) :
						            ?>
					             	<?php if( get_theme_mod('the_writers_blog_show_tagline',false) != ''){ ?>
						              		<p class="site-description m-0">
								                <?php echo esc_html($description); ?>
								            </p>
								        <?php }?>
						            <?php endif; ?>
						        </div>
							</div>
							<div class="col-lg-4 col-md-4 align-self-center">
								<div class="search-box mt-2 text-lg-end text-center ps-3 align-self-center">
			      					<?php get_search_form(); ?>
		    					</div>
							</div>
						</div>
						<div class="<?php if( get_theme_mod( 'the_writers_blog_fixed_header', false) != '') { ?> sticky-header"<?php } else { ?>close-sticky <?php } ?>">				
							<div class="navigation-top p-1">
								<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

	<div class="site-content-contain">
		<div id="content">
