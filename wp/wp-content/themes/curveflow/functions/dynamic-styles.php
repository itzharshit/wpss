<?php
/* ------------------------------------------------------------------------- *
 *  Dynamic styles
/* ------------------------------------------------------------------------- */

/*  Convert hexadecimal to rgb
/* ------------------------------------ */
if ( ! function_exists( 'curveflow_hex2rgb' ) ) {

	function curveflow_hex2rgb( $hex, $array=false ) {
		$hex = str_replace("#", "", $hex);

		if ( strlen($hex) == 3 ) {
			$r = hexdec(substr($hex,0,1).substr($hex,0,1));
			$g = hexdec(substr($hex,1,1).substr($hex,1,1));
			$b = hexdec(substr($hex,2,1).substr($hex,2,1));
		} else {
			$r = hexdec(substr($hex,0,2));
			$g = hexdec(substr($hex,2,2));
			$b = hexdec(substr($hex,4,2));
		}

		$rgb = array( $r, $g, $b );
		if ( !$array ) { $rgb = implode(",", $rgb); }
		return $rgb;
	}
	
}	


/*  Google fonts
/* ------------------------------------ */
if ( ! function_exists( 'curveflow_enqueue_google_fonts' ) ) {

	function curveflow_enqueue_google_fonts () {
		if ( get_theme_mod('dynamic-styles', 'on') == 'on' ) {
			if ( get_theme_mod( 'font' ) == 'titillium-web-ext' ) { wp_enqueue_style( 'titillium-web-ext', '//fonts.googleapis.com/css?family=Titillium+Web:400,400italic,300italic,300,600&subset=latin,latin-ext' ); }		
			if ( get_theme_mod( 'font' ) == 'droid-serif' )	{ wp_enqueue_style( 'droid-serif', '//fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700' ); }				
			if ( get_theme_mod( 'font' ) == 'source-sans-pro' )	{ wp_enqueue_style( 'source-sans-pro', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,300italic,300,400italic,600&subset=latin,latin-ext' ); }
			if ( get_theme_mod( 'font' ) == 'lato' ) { wp_enqueue_style( 'lato', '//fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700' ); }
			if ( get_theme_mod( 'font' ) == 'raleway' )	{ wp_enqueue_style( 'raleway', '//fonts.googleapis.com/css?family=Raleway:400,300,600' ); }
			/*default*/ if ( ( get_theme_mod( 'font' ) == '' ) || ( get_theme_mod( 'font' ) == 'inter' ) ) { wp_enqueue_style( 'inter', '//fonts.googleapis.com/css?family=Inter:400,300,600,800' ); }
			if ( get_theme_mod( 'font' ) == 'ubuntu' ) { wp_enqueue_style( 'ubuntu', '//fonts.googleapis.com/css?family=Ubuntu:400,400italic,300italic,300,700&subset=latin,latin-ext' ); }
			if ( get_theme_mod( 'font' ) == 'ubuntu-cyr' ) { wp_enqueue_style( 'ubuntu-cyr', '//fonts.googleapis.com/css?family=Ubuntu:400,400italic,300italic,300,700&subset=latin,cyrillic-ext' ); }
			if ( get_theme_mod( 'font' ) == 'roboto' ) { wp_enqueue_style( 'roboto', '//fonts.googleapis.com/css?family=Roboto:400,300italic,300,400italic,700&subset=latin,latin-ext' ); }
			if ( get_theme_mod( 'font' ) == 'roboto-cyr' ) { wp_enqueue_style( 'roboto-cyr', '//fonts.googleapis.com/css?family=Roboto:400,300italic,300,400italic,700&subset=latin,cyrillic-ext' ); }
			if ( get_theme_mod( 'font' ) == 'roboto-condensed' ) { wp_enqueue_style( 'roboto-condensed', '//fonts.googleapis.com/css?family=Roboto+Condensed:400,300italic,300,400italic,700&subset=latin,latin-ext' ); }
			if ( get_theme_mod( 'font' ) == 'roboto-condensed-cyr' ) { wp_enqueue_style( 'roboto-condensed-cyr', '//fonts.googleapis.com/css?family=Roboto+Condensed:400,300italic,300,400italic,700&subset=latin,cyrillic-ext' ); }
			if ( get_theme_mod( 'font' ) == 'roboto-slab' ) { wp_enqueue_style( 'roboto-slab', '//fonts.googleapis.com/css?family=Roboto+Slab:400,300italic,300,400italic,700&subset=latin,latin-ext' ); }
			if ( get_theme_mod( 'font' ) == 'roboto-slab-cyr' ) { wp_enqueue_style( 'roboto-slab-cyr', '//fonts.googleapis.com/css?family=Roboto+Slab:400,300italic,300,400italic,700&subset=latin,cyrillic-ext' ); }
			if ( get_theme_mod( 'font' ) == 'playfair-display' ) { wp_enqueue_style( 'playfair-display', '//fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700&subset=latin,latin-ext' ); }
			if ( get_theme_mod( 'font' ) == 'playfair-display-cyr' ) { wp_enqueue_style( 'playfair-display-cyr', '//fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700&subset=latin,cyrillic' ); }
			if ( get_theme_mod( 'font' ) == 'open-sans' ) { wp_enqueue_style( 'open-sans', '//fonts.googleapis.com/css?family=Open+Sans:400,400italic,300italic,300,600&subset=latin,latin-ext' ); }
			if ( get_theme_mod( 'font' ) == 'open-sans-cyr' ) { wp_enqueue_style( 'open-sans-cyr', '//fonts.googleapis.com/css?family=Open+Sans:400,400italic,300italic,300,600&subset=latin,cyrillic-ext' ); }
			if ( get_theme_mod( 'font' ) == 'pt-serif' ) { wp_enqueue_style( 'pt-serif', '//fonts.googleapis.com/css?family=PT+Serif:400,700,400italic&subset=latin,latin-ext' ); }
			if ( get_theme_mod( 'font' ) == 'pt-serif-cyr' ) { wp_enqueue_style( 'pt-serif-cyr', '//fonts.googleapis.com/css?family=PT+Serif:400,700,400italic&subset=latin,cyrillic-ext' ); }
		}
	}	
	
}
add_action( 'wp_enqueue_scripts', 'curveflow_enqueue_google_fonts' ); 	


/*  Dynamic css output
/* ------------------------------------ */
if ( ! function_exists( 'curveflow_dynamic_css' ) ) {

	function curveflow_dynamic_css() {
		if ( get_theme_mod('dynamic-styles', 'on') == 'on' ) {
		
			// rgb values
			$color_1 = get_theme_mod('color-1');
			$color_1_rgb = curveflow_hex2rgb($color_1);
			
			// start output
			$styles = '';		
			
			// google fonts
			if ( get_theme_mod( 'font' ) == 'titillium-web-ext' ) { $styles .= 'body { font-family: "Titillium Web", Arial, sans-serif; }'."\n"; }
			if ( get_theme_mod( 'font' ) == 'droid-serif' ) { $styles .= 'body { font-family: "Droid Serif", serif; }'."\n"; }
			if ( get_theme_mod( 'font' ) == 'source-sans-pro' ) { $styles .= 'body { font-family: "Source Sans Pro", Arial, sans-serif; }'."\n"; }
			if ( get_theme_mod( 'font' ) == 'lato' ) { $styles .= 'body { font-family: "Lato", Arial, sans-serif; }'."\n"; }
			if ( get_theme_mod( 'font' ) == 'raleway' ) { $styles .= 'body { font-family: "Raleway", Arial, sans-serif; }'."\n"; }
			/*default*/ if ( ( get_theme_mod( 'font' ) == '' ) || ( get_theme_mod( 'font' ) == 'inter' ) ) { $styles .= 'body { font-family: "Inter", Arial, sans-serif; }'."\n"; }
			if ( ( get_theme_mod( 'font' ) == 'ubuntu' ) || ( get_theme_mod( 'font' ) == 'ubuntu-cyr' ) ) { $styles .= 'body { font-family: "Ubuntu", Arial, sans-serif; }'."\n"; }	
			if ( ( get_theme_mod( 'font' ) == 'roboto' ) || ( get_theme_mod( 'font' ) == 'roboto-cyr' ) ) { $styles .= 'body { font-family: "Roboto", Arial, sans-serif; }'."\n"; }
			if ( ( get_theme_mod( 'font' ) == 'roboto-condensed' ) || ( get_theme_mod( 'font' ) == 'roboto-condensed-cyr' ) ) { $styles .= 'body { font-family: "Roboto Condensed", Arial, sans-serif; }'."\n"; }
			if ( ( get_theme_mod( 'font' ) == 'roboto-slab' ) || ( get_theme_mod( 'font' ) == 'roboto-slab-cyr' ) ) { $styles .= 'body { font-family: "Roboto Slab", Arial, sans-serif; }'."\n"; }			
			if ( ( get_theme_mod( 'font' ) == 'playfair-display' ) || ( get_theme_mod( 'font' ) == 'playfair-display-cyr' ) ) { $styles .= 'body { font-family: "Playfair Display", Arial, sans-serif; }'."\n"; }
			if ( ( get_theme_mod( 'font' ) == 'open-sans' ) || ( get_theme_mod( 'font' ) == 'open-sans-cyr' ) )	{ $styles .= 'body { font-family: "Open Sans", Arial, sans-serif; }'."\n"; }
			if ( ( get_theme_mod( 'font' ) == 'pt-serif' ) || ( get_theme_mod( 'font' ) == 'pt-serif-cyr' ) ) { $styles .= 'body { font-family: "PT Serif", serif; }'."\n"; }	
			if ( get_theme_mod( 'font' ) == 'arial' ) { $styles .= 'body { font-family: Arial, sans-serif; }'."\n"; }
			if ( get_theme_mod( 'font' ) == 'georgia' ) { $styles .= 'body { font-family: Georgia, serif; }'."\n"; }
			if ( get_theme_mod( 'font' ) == 'verdana' ) { $styles .= 'body { font-family: Verdana, sans-serif; }'."\n"; }
			if ( get_theme_mod( 'font' ) == 'tahoma' ) { $styles .= 'body { font-family: Tahoma, sans-serif; }'."\n"; }
			
			// container width
			if ( get_theme_mod('container-width','1080') != '1080' ) {			
				if ( get_theme_mod( 'boxed' ) ) { 
					$styles .= '.boxed #wrapper-inner { max-width: '.esc_attr( get_theme_mod('container-width') ).'px; }'."\n";
				}
				else {
					$styles .= '
#wrapper-inner,
#header { max-width: '.esc_attr( get_theme_mod('container-width') ).'px; }

				'."\n";
				}
			}
			// content max-width
			if ( get_theme_mod('content-width','700') != '700' ) {
				$styles .= '
.entry-header,
.entry-footer,
.entry > :not(.alignfull) { max-width: '.esc_attr( get_theme_mod('content-width') ).'px; }
				'."\n";
			}
			// header color
			if ( get_theme_mod('color-header','#ffffff') != '#ffffff' ) {
				$styles .= '
#wrapper { border-top: 0; }
#header { background: '.esc_attr( get_theme_mod('color-header') ).'; }
.site-title a { color: #fff; }
.site-description { color: rgba(255,255,255,0.5); }

.menu-toggle-icon span { background: #fff; }

.nav-menu:not(.mobile) a { color: rgba(255,255,255,0.6); }
.nav-menu:not(.mobile) a:hover { color: #fff; }
.nav-menu:not(.mobile) button.active { background: rgba(255,255,255,0.15); }
.nav-menu:not(.mobile) button .svg-icon { fill: rgba(255,255,255,0.4); }
.nav-menu:not(.mobile) li.current_page_item > span > a, 
.nav-menu:not(.mobile) li.current-menu-item > span > a, 
.nav-menu:not(.mobile) li.current-menu-ancestor > span > a, 
.nav-menu:not(.mobile) li.current-post-parent > span > a { color: #fff; }

.nav-menu.mobile button.active .svg-icon { fill: #fff; }
.nav-menu.mobile ul ul { background: rgba(255,255,255,0.05); }
.nav-menu.mobile ul li .menu-item-wrapper,
.nav-menu.mobile ul ul li .menu-item-wrapper { border-bottom: 1px solid rgba(255,255,255,0.1); }
.nav-menu.mobile ul li a { color: #fff; }
.nav-menu.mobile ul button,
.nav-menu.mobile ul ul button { border-left: 1px solid rgba(255,255,255,0.1); }
.nav-menu.mobile > div > ul { border-top: 1px solid rgba(255,255,255,0.1); }

.nav-menu .svg-icon { fill: #fff; }
.nav-menu.mobile button:focus,
.menu-toggle:focus { background: rgba(255,255,255,0.06); }

@media only screen and (max-width: 719px) {
	#wrapper { background: '.esc_attr( get_theme_mod('color-header') ).'!important; }
	.site-title { border-bottom: 1px solid rgba(255,255,255,0.1)!important; }
	.s2 .social-links { border-top: 1px solid rgba(255,255,255,0.1)!important; }
	.toggle-search .svg-icon,
	.toggle-search.active #svg-close,
	.toggle-search:focus #svg-search,
	.toggle-search:focus #svg-close { fill: #fff!important; }
}

				'."\n";
			}
			// layout box color
			if ( get_theme_mod('color-layout-box','#222222') != '#222222' ) {
				$styles .= '
#wrapper-inner { background: '.esc_attr( get_theme_mod('color-layout-box') ).'; }
				'."\n";
			}
			// layout box border color
			if ( get_theme_mod('color-layout-box','#000000') != '#000000' ) {
				$styles .= '
#wrapper-inner { border-color: '.esc_attr( get_theme_mod('color-layout-box-border') ).'; }
				'."\n";
			}
			// layout box border width
			if ( get_theme_mod('layout-box-border-width','8') != '8' ) {
				$styles .= '
#wrapper-inner { border-width: '.esc_attr( get_theme_mod('layout-box-border-width') ).'px; }
				'."\n";
			}
			// sidebar
			if ( get_theme_mod('color-sidebar','#222222') != '#222222' ) {
				$styles .= '
.s1 { background: '.esc_attr( get_theme_mod('color-sidebar') ).'; }
				'."\n";
			}
			// social sidebar
			if ( get_theme_mod('color-social-sidebar','#222222') != '#222222' ) {
				$styles .= '
.s2 { background: '.esc_attr( get_theme_mod('color-social-sidebar') ).'; }
				'."\n";
			}
			// background color
			if ( get_theme_mod('color-background','#eeeeee') != '#eeeeee' ) {
				$styles .= '
body { background: '.esc_attr( get_theme_mod('color-background') ).'; }
#wrapper { border-top: 0; }
				'."\n";
			}
			// featured 2 color
			if ( get_theme_mod('color-featured-2','#3bb0f0') != '#3bb0f0' ) {
				$styles .= '
.flow-featured .flow:nth-child(2),
.flow-featured .flow:nth-child(2) .flow-inner:after,
.flow-featured .flow:nth-child(2) .flow-content { background: '.esc_attr( get_theme_mod('color-featured-2') ).'; }
.flow-featured .flow:nth-child(2):before { box-shadow: 0 -100px 0 0 '.esc_attr( get_theme_mod('color-featured-2') ).'; }
@media only screen and (max-width: 479px) {
	.flow-featured .flow:nth-child(2):before { box-shadow: 0 -50px 0 0 '.esc_attr( get_theme_mod('color-featured-2') ).'; }
}
				'."\n";
			}
			// featured 3 color
			if ( get_theme_mod('color-featured-3','#3862ea') != '#3862ea' ) {
				$styles .= '
.flow-featured .flow:nth-child(3),
.flow-featured .flow:nth-child(3) .flow-inner:after,
.flow-featured .flow:nth-child(3) .flow-content { background: '.esc_attr( get_theme_mod('color-featured-3') ).'; }
.flow-featured .flow:nth-child(3):before { box-shadow: 0 -100px 0 0 '.esc_attr( get_theme_mod('color-featured-3') ).'; }
@media only screen and (max-width: 479px) {
	.flow-featured .flow:nth-child(3):before { box-shadow: 0 -50px 0 0 '.esc_attr( get_theme_mod('color-featured-3') ).'; }
}
				'."\n";
			}
			// featured 4 color
			if ( get_theme_mod('color-featured-4','#061a3a') != '#061a3a' ) {
				$styles .= '
.flow-featured .flow:nth-child(4),
.flow-featured .flow:nth-child(4) .flow-inner:after,
.flow-featured .flow:nth-child(4) .flow-content { background: '.esc_attr( get_theme_mod('color-featured-4') ).'; }
.flow-featured .flow:nth-child(4):before { box-shadow: 0 -100px 0 0 '.esc_attr( get_theme_mod('color-featured-4') ).'; }
@media only screen and (max-width: 479px) {
	.flow-featured .flow:nth-child(4):before { box-shadow: 0 -50px 0 0 '.esc_attr( get_theme_mod('color-featured-4') ).'; }
}
				'."\n";
			}
			// header logo max-height
			if ( get_theme_mod('logo-max-height','60') != '60' ) {
				$styles .= '.site-title a img { max-height: '.esc_attr( get_theme_mod('logo-max-height') ).'px; }'."\n";
			}
			// header text color
			if ( get_theme_mod( 'header_textcolor' ) != '' ) {
				$styles .= '.site-title a, .site-description { color: #'.esc_attr( get_theme_mod( 'header_textcolor' ) ).'; }'."\n";
			}
			if ( get_theme_mod('dark','off') == 'on' ) { 
				wp_add_inline_style( 'curveflow-dark', $styles );
			} else {
				wp_add_inline_style( 'curveflow-style', $styles );
			}
		}
	}
	
}
add_action( 'wp_enqueue_scripts', 'curveflow_dynamic_css' );
