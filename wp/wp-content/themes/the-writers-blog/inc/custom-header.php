<?php
/**
 * Custom header implementation
 */

function the_writers_blog_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'the_writers_blog_custom_header_args', array(

		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1355,
		'height'                 => 175,
		'flex-width'         	=> true,
        'flex-height'        	=> true,
		'wp-head-callback'       => 'the_writers_blog_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'the_writers_blog_custom_header_setup' );

if ( ! function_exists( 'the_writers_blog_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see the_writers_blog_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'the_writers_blog_header_style' );
function the_writers_blog_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$the_writers_blog_custom_css = "
        #masthead .main-header,
		.page-template-home-custom #masthead .top-menu{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'the-writers-blog-basic-style', $the_writers_blog_custom_css );
	endif;
}
endif; // the_writers_blog_header_style