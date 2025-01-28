<?php
/**
 * The Writers Blog: Customizer
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function the_writers_blog_custom_controls() {

	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-control.php' );
}

add_action( 'customize_register', 'the_writers_blog_custom_controls' );

function the_writers_blog_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-changer.php' );

	$wp_customize->add_panel( 'the_writers_blog_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'the-writers-blog' ),
	    'description' => __( 'Description of what this panel does.', 'the-writers-blog' ),
	) );

	// font array
	$the_writers_blog_font_array = array(
        '' => 'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' => 'Acme',
        'Anton' => 'Anton',
        'Architects Daughter' => 'Architects Daughter',
        'Arimo' => 'Arimo',
        'Arsenal' => 'Arsenal', 
        'Arvo' => 'Arvo',
        'Alegreya' => 'Alegreya',
        'Alfa Slab One' => 'Alfa Slab One',
        'Averia Serif Libre' => 'Averia Serif Libre',
        'Bangers' => 'Bangers', 
        'Boogaloo' => 'Boogaloo',
        'Bad Script' => 'Bad Script',
        'Bitter' => 'Bitter',
        'Bree Serif' => 'Bree Serif',
        'BenchNine' => 'BenchNine', 
        'Cabin' => 'Cabin', 
        'Cardo' => 'Cardo',
        'Courgette' => 'Courgette',
        'Cherry Swash' => 'Cherry Swash',
        'Cormorant Garamond' => 'Cormorant Garamond',
        'Crimson Text' => 'Crimson Text',
        'Cuprum' => 'Cuprum', 
        'Cookie' => 'Cookie', 
        'Chewy' => 'Chewy', 
        'Days One' => 'Days One', 
        'Dosis' => 'Dosis',
        'Droid Sans' => 'Droid Sans',
        'Economica' => 'Economica',
        'Fredoka One' => 'Fredoka One',
        'Fjalla One' => 'Fjalla One',
        'Francois One' => 'Francois One',
        'Frank Ruhl Libre' => 'Frank Ruhl Libre',
        'Gloria Hallelujah' => 'Gloria Hallelujah',
        'Great Vibes' => 'Great Vibes',
        'Handlee' => 'Handlee', 
        'Hammersmith One' => 'Hammersmith One',
        'Inconsolata' => 'Inconsolata', 
        'Indie Flower' => 'Indie Flower', 
        'IM Fell English SC' => 'IM Fell English SC', 
        'Julius Sans One' => 'Julius Sans One',
        'Josefin Slab' => 'Josefin Slab', 
        'Josefin Sans' => 'Josefin Sans', 
        'Kanit' => 'Kanit', 
        'Lobster' => 'Lobster', 
        'Lato' => 'Lato',
        'Lora' => 'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather', 
        'Monda' => 'Monda',
        'Montserrat' => 'Montserrat',
        'Muli' => 'Muli', 
        'Marck Script' => 'Marck Script',
        'Noto Serif' => 'Noto Serif',
        'Open Sans' => 'Open Sans', 
        'Overpass' => 'Overpass',
        'Overpass Mono' => 'Overpass Mono',
        'Oxygen' => 'Oxygen', 
        'Orbitron' => 'Orbitron', 
        'Patua One' => 'Patua One', 
        'Pacifico' => 'Pacifico',
        'Padauk' => 'Padauk', 
        'Playball' => 'Playball',
        'Playfair Display' => 'Playfair Display', 
        'PT Sans' => 'PT Sans',
        'Philosopher' => 'Philosopher',
        'Permanent Marker' => 'Permanent Marker',
        'Poiret One' => 'Poiret One', 
        'Quicksand' => 'Quicksand', 
        'Quattrocento Sans' => 'Quattrocento Sans', 
        'Raleway' => 'Raleway', 
        'Rubik' => 'Rubik', 
        'Rokkitt' => 'Rokkitt', 
        'Russo One' => 'Russo One', 
        'Righteous' => 'Righteous', 
        'Slabo' => 'Slabo', 
        'Source Sans Pro' => 'Source Sans Pro', 
        'Shadows Into Light Two' =>'Shadows Into Light Two', 
        'Shadows Into Light' => 'Shadows Into Light', 
        'Sacramento' => 'Sacramento', 
        'Shrikhand' => 'Shrikhand', 
        'Tangerine' => 'Tangerine',
        'Ubuntu' => 'Ubuntu', 
        'VT323' => 'VT323', 
        'Varela Round' => 'Varela Round', 
        'Vampiro One' => 'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' => 'Volkhov', 
        'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
    );
    
	//Typography
	$wp_customize->add_section( 'the_writers_blog_typography', array(
    	'title'      => __( 'Color / Fonts Settings', 'the-writers-blog' ),
		'panel' => 'the_writers_blog_panel_id'
	) );

	$wp_customize->add_setting('the_writers_blog_typography_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_writers_blog_typography_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','the-writers-blog'),
		'description' => "<ul><li>". esc_html__('Please explore our premium theme for additional settings and features.','the-writers-blog') ."</li></ul><a target='_blank' href='". esc_url(THE_WRITERS_BLOG_BUY_PRO) ." '>". esc_html__('Upgrade to Pro','the-writers-blog') ."</a>",
		'section'=> 'the_writers_blog_typography'
	));

	// This is Body Color setting
	$wp_customize->add_setting( 'the_writers_blog_body_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_writers_blog_body_color', array(
		'label' => __('Body Color', 'the-writers-blog'),
		'section' => 'the_writers_blog_typography',
		'settings' => 'the_writers_blog_body_color',
	)));

	//This is Body FontFamily  setting
	$wp_customize->add_setting('the_writers_blog_body_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'the_writers_blog_sanitize_choices'
	));
	$wp_customize->add_control(
		'the_writers_blog_body_font_family', array(
		'section'  => 'the_writers_blog_typography',
		'label'    => __( 'Body Fonts','the-writers-blog'),
		'type'     => 'select',
		'choices'  => $the_writers_blog_font_array,
	));

    //This is Body Fontsize setting
	$wp_customize->add_setting('the_writers_blog_body_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_writers_blog_body_font_size',array(
		'label'	=> __('Body Font Size','the-writers-blog'),
		'section'	=> 'the_writers_blog_typography',
		'setting'	=> 'the_writers_blog_body_font_size',
		'type'	=> 'text'
	));
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'the_writers_blog_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_writers_blog_paragraph_color', array(
		'label' => __('Paragraph Color', 'the-writers-blog'),
		'section' => 'the_writers_blog_typography',
		'settings' => 'the_writers_blog_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('the_writers_blog_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'the_writers_blog_sanitize_choices'
	));
	$wp_customize->add_control(
	    'the_writers_blog_paragraph_font_family', array(
	    'section'  => 'the_writers_blog_typography',
	    'label'    => __( 'Paragraph Fonts','the-writers-blog'),
	    'type'     => 'select',
	    'choices'  => $the_writers_blog_font_array,
	));

	$wp_customize->add_setting('the_writers_blog_paragraph_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_writers_blog_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','the-writers-blog'),
		'section'	=> 'the_writers_blog_typography',
		'setting'	=> 'the_writers_blog_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'the_writers_blog_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_writers_blog_atag_color', array(
		'label' => __('"a" Tag Color', 'the-writers-blog'),
		'section' => 'the_writers_blog_typography',
		'settings' => 'the_writers_blog_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('the_writers_blog_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'the_writers_blog_sanitize_choices'
	));
	$wp_customize->add_control(
	    'the_writers_blog_atag_font_family', array(
	    'section'  => 'the_writers_blog_typography',
	    'label'    => __( '"a" Tag Fonts','the-writers-blog'),
	    'type'     => 'select',
	    'choices'  => $the_writers_blog_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'the_writers_blog_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_writers_blog_li_color', array(
		'label' => __('"li" Tag Color', 'the-writers-blog'),
		'section' => 'the_writers_blog_typography',
		'settings' => 'the_writers_blog_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('the_writers_blog_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'the_writers_blog_sanitize_choices'
	));
	$wp_customize->add_control(
	    'the_writers_blog_li_font_family', array(
	    'section'  => 'the_writers_blog_typography',
	    'label'    => __( '"li" Tag Fonts','the-writers-blog'),
	    'type'     => 'select',
	    'choices'  => $the_writers_blog_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'the_writers_blog_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_writers_blog_h1_color', array(
		'label' => __('H1 Color', 'the-writers-blog'),
		'section' => 'the_writers_blog_typography',
		'settings' => 'the_writers_blog_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('the_writers_blog_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'the_writers_blog_sanitize_choices'
	));
	$wp_customize->add_control(
	    'the_writers_blog_h1_font_family', array(
	    'section'  => 'the_writers_blog_typography',
	    'label'    => __( 'H1 Fonts','the-writers-blog'),
	    'type'     => 'select',
	    'choices'  => $the_writers_blog_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('the_writers_blog_h1_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_writers_blog_h1_font_size',array(
		'label'	=> __('H1 Font Size','the-writers-blog'),
		'section'	=> 'the_writers_blog_typography',
		'setting'	=> 'the_writers_blog_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'the_writers_blog_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_writers_blog_h2_color', array(
		'label' => __('h2 Color', 'the-writers-blog'),
		'section' => 'the_writers_blog_typography',
		'settings' => 'the_writers_blog_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('the_writers_blog_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'the_writers_blog_sanitize_choices'
	));
	$wp_customize->add_control(
	    'the_writers_blog_h2_font_family', array(
	    'section'  => 'the_writers_blog_typography',
	    'label'    => __( 'h2 Fonts','the-writers-blog'),
	    'type'     => 'select',
	    'choices'  => $the_writers_blog_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('the_writers_blog_h2_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_writers_blog_h2_font_size',array(
		'label'	=> __('h2 Font Size','the-writers-blog'),
		'section'	=> 'the_writers_blog_typography',
		'setting'	=> 'the_writers_blog_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'the_writers_blog_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_writers_blog_h3_color', array(
		'label' => __('h3 Color', 'the-writers-blog'),
		'section' => 'the_writers_blog_typography',
		'settings' => 'the_writers_blog_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('the_writers_blog_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'the_writers_blog_sanitize_choices'
	));
	$wp_customize->add_control(
	    'the_writers_blog_h3_font_family', array(
	    'section'  => 'the_writers_blog_typography',
	    'label'    => __( 'h3 Fonts','the-writers-blog'),
	    'type'     => 'select',
	    'choices'  => $the_writers_blog_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('the_writers_blog_h3_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_writers_blog_h3_font_size',array(
		'label'	=> __('h3 Font Size','the-writers-blog'),
		'section'	=> 'the_writers_blog_typography',
		'setting'	=> 'the_writers_blog_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'the_writers_blog_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_writers_blog_h4_color', array(
		'label' => __('h4 Color', 'the-writers-blog'),
		'section' => 'the_writers_blog_typography',
		'settings' => 'the_writers_blog_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('the_writers_blog_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'the_writers_blog_sanitize_choices'
	));
	$wp_customize->add_control(
	    'the_writers_blog_h4_font_family', array(
	    'section'  => 'the_writers_blog_typography',
	    'label'    => __( 'h4 Fonts','the-writers-blog'),
	    'type'     => 'select',
	    'choices'  => $the_writers_blog_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('the_writers_blog_h4_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_writers_blog_h4_font_size',array(
		'label'	=> __('h4 Font Size','the-writers-blog'),
		'section'	=> 'the_writers_blog_typography',
		'setting'	=> 'the_writers_blog_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'the_writers_blog_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_writers_blog_h5_color', array(
		'label' => __('h5 Color', 'the-writers-blog'),
		'section' => 'the_writers_blog_typography',
		'settings' => 'the_writers_blog_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('the_writers_blog_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'the_writers_blog_sanitize_choices'
	));
	$wp_customize->add_control(
	    'the_writers_blog_h5_font_family', array(
	    'section'  => 'the_writers_blog_typography',
	    'label'    => __( 'h5 Fonts','the-writers-blog'),
	    'type'     => 'select',
	    'choices'  => $the_writers_blog_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('the_writers_blog_h5_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_writers_blog_h5_font_size',array(
		'label'	=> __('h5 Font Size','the-writers-blog'),
		'section'	=> 'the_writers_blog_typography',
		'setting'	=> 'the_writers_blog_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'the_writers_blog_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_writers_blog_h6_color', array(
		'label' => __('h6 Color', 'the-writers-blog'),
		'section' => 'the_writers_blog_typography',
		'settings' => 'the_writers_blog_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('the_writers_blog_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'the_writers_blog_sanitize_choices'
	));
	$wp_customize->add_control(
	    'the_writers_blog_h6_font_family', array(
	    'section'  => 'the_writers_blog_typography',
	    'label'    => __( 'h6 Fonts','the-writers-blog'),
	    'type'     => 'select',
	    'choices'  => $the_writers_blog_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('the_writers_blog_h6_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_writers_blog_h6_font_size',array(
		'label'	=> __('h6 Font Size','the-writers-blog'),
		'section'	=> 'the_writers_blog_typography',
		'setting'	=> 'the_writers_blog_h6_font_size',
		'type'	=> 'text'
	));

	// background skin mode
	$wp_customize->add_setting('the_writers_blog_background_image_type',array(
        'default' => 'Transparent',
        'sanitize_callback' => 'the_writers_blog_sanitize_choices'
	));
	$wp_customize->add_control('the_writers_blog_background_image_type',array(
        'type' => 'radio',
        'label' => __('Background Skin Mode','the-writers-blog'),
        'section' => 'background_image',
        'choices' => array(
            'Transparent' => __('Transparent','the-writers-blog'),
            'Background' => __('Background','the-writers-blog'),
        ),
	) );

	// Add the Theme Color Option section.
	$wp_customize->add_section( 'the_writers_blog_theme_color_option', array( 
		'panel' => 'the_writers_blog_panel_id', 
		'title' => esc_html__( 'Theme Color Option', 'the-writers-blog' ) 
	));

	$wp_customize->add_setting('the_writers_blog_typography_theme_color_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_writers_blog_typography_theme_color_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','the-writers-blog'),
		'description' => "<ul><li>". esc_html__('Please explore our premium theme for additional settings and features.','the-writers-blog') ."</li></ul><a target='_blank' href='". esc_url(THE_WRITERS_BLOG_BUY_PRO) ." '>". esc_html__('Upgrade to Pro','the-writers-blog') ."</a>",
		'section'=> 'the_writers_blog_theme_color_option'
	));


  	$wp_customize->add_setting( 'the_writers_blog_theme_color', array(
	    'default' => '#fe0219',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_writers_blog_theme_color', array(
  		'label' => __('Color Option', 'the-writers-blog'),
	    'description' => __('One can change complete theme color on just one click.', 'the-writers-blog'),
	    'section' => 'the_writers_blog_theme_color_option',
	    'settings' => 'the_writers_blog_theme_color',
  	)));

  	// woocommerce Options
	$wp_customize->add_section( 'the_writers_blog_shop_page_options', array(
    	'title'      => __( 'Shop Page Settings', 'the-writers-blog' ),
		'panel' => 'woocommerce'
	) );

	$wp_customize->add_setting('the_writers_blog_display_related_products',array(
       'default' => true,
       'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_writers_blog_display_related_products',array(
       'type' => 'checkbox',
       'label' => __('Related Product','the-writers-blog'),
       'section' => 'the_writers_blog_shop_page_options',
    ));

    $wp_customize->add_setting('the_writers_blog_shop_products_border',array(
       'default' => false,
       'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_writers_blog_shop_products_border',array(
       'type' => 'checkbox',
       'label' => __('Product Border','the-writers-blog'),
       'section' => 'the_writers_blog_shop_page_options',
    ));

    $wp_customize->add_setting('the_writers_blog_shop_page_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_writers_blog_shop_page_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Shop Page Sidebar','the-writers-blog'),
       'section' => 'the_writers_blog_shop_page_options',
    ));

    $wp_customize->add_setting('the_writers_blog_single_product_sidebar',array(
        'default' => true,
        'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
	));
	$wp_customize->add_control('the_writers_blog_single_product_sidebar',array(
     	'type' => 'checkbox',
      	'label' => __('Enable / Disable Single Product Sidebar','the-writers-blog'),
      	'section' => 'the_writers_blog_shop_page_options',
	));

	// shop page sidebar alignment
	$wp_customize->add_setting('the_writers_blog_shop_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'the_writers_blog_sanitize_choices',
	));
	$wp_customize->add_control('the_writers_blog_shop_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Shop Page Layout', 'the-writers-blog'),
		'section'        => 'the_writers_blog_shop_page_options',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'the-writers-blog'),
			'Right Sidebar' => __('Right Sidebar', 'the-writers-blog'),
		),
	));

	$wp_customize->add_setting( 'the_writers_blog_woocommerce_product_per_columns' , array(
		'default'           => 3,
		'transport'         => 'refresh',
		'sanitize_callback' => 'the_writers_blog_sanitize_choices',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'the_writers_blog_woocommerce_product_per_columns', array(
		'label'    => __( 'Total Products Per Columns', 'the-writers-blog' ),
		'section'  => 'the_writers_blog_shop_page_options',
		'type'     => 'radio',
		'choices'  => array(
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
		),
	) ) );

	$wp_customize->add_setting('the_writers_blog_woocommerce_product_per_page',array(
		'default'	=> 9,
		'sanitize_callback'	=> 'the_writers_blog_sanitize_float',
	));	
	$wp_customize->add_control('the_writers_blog_woocommerce_product_per_page',array(
		'label'	=> __('Total Products Per Page','the-writers-blog'),
		'section'	=> 'the_writers_blog_shop_page_options',
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'the_writers_blog_shop_page_top_padding',array(
		'default' => 10,
		'sanitize_callback'	=> 'the_writers_blog_sanitize_float',
	));
	$wp_customize->add_control( 'the_writers_blog_shop_page_top_padding',	array(
		'label' => esc_html__( 'Product Padding (Top Bottom)','the-writers-blog' ),
		'section' => 'the_writers_blog_shop_page_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'the_writers_blog_shop_page_left_padding',array(
		'default' => 10,
		'sanitize_callback'	=> 'the_writers_blog_sanitize_float',
	));
	$wp_customize->add_control( 'the_writers_blog_shop_page_left_padding',	array(
		'label' => esc_html__( 'Product Padding (Right Left)','the-writers-blog' ),
		'section' => 'the_writers_blog_shop_page_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'the_writers_blog_shop_page_border_radius',array(
		'default' => 0,
		'sanitize_callback'	=> 'the_writers_blog_sanitize_float',
	));
	$wp_customize->add_control('the_writers_blog_shop_page_border_radius',array(
		'label' => esc_html__( 'Product Border Radius','the-writers-blog' ),
		'section' => 'the_writers_blog_shop_page_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'the_writers_blog_shop_page_box_shadow',array(
		'default' => '',
		'sanitize_callback'	=> 'the_writers_blog_sanitize_float',
	));
	$wp_customize->add_control('the_writers_blog_shop_page_box_shadow',array(
		'label' => esc_html__( 'Product Shadow','the-writers-blog' ),
		'section' => 'the_writers_blog_shop_page_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number'
	));

	$wp_customize->add_setting( 'the_writers_blog_shop_button_padding_top',array(
		'default' => 9,
		'sanitize_callback'	=> 'the_writers_blog_sanitize_float',
	));
	$wp_customize->add_control('the_writers_blog_shop_button_padding_top',	array(
		'label' => esc_html__( 'Button Padding (Top Bottom)','the-writers-blog' ),
		'section' => 'the_writers_blog_shop_page_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'number',

	));

	$wp_customize->add_setting( 'the_writers_blog_shop_button_padding_left',array(
		'default' => 16,
		'sanitize_callback'	=> 'the_writers_blog_sanitize_float',
	));
	$wp_customize->add_control('the_writers_blog_shop_button_padding_left',array(
		'label' => esc_html__( 'Button Padding (Right Left)','the-writers-blog' ),
		'section' => 'the_writers_blog_shop_page_options',
		'type'		=> 'number',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'the_writers_blog_shop_button_border_radius',array(
		'default' => 0,
		'sanitize_callback'	=> 'the_writers_blog_sanitize_float',
	));
	$wp_customize->add_control('the_writers_blog_shop_button_border_radius',array(
		'label' => esc_html__( 'Button Border Radius','the-writers-blog' ),
		'section' => 'the_writers_blog_shop_page_options',
		'type'		=> 'number',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('the_writers_blog_position_product_sale',array(
        'default' => 'Right',
        'sanitize_callback' => 'the_writers_blog_sanitize_choices'
	));
	$wp_customize->add_control('the_writers_blog_position_product_sale',array(
        'type' => 'radio',
        'label' => __('Product Sale Position','the-writers-blog'),
        'section' => 'the_writers_blog_shop_page_options',
        'choices' => array(
            'Right' => __('Right','the-writers-blog'),
            'Left' => __('Left','the-writers-blog'),
        ),
	) );

	$wp_customize->add_setting( 'the_writers_blog_border_radius_product_sale_text',array(
		'default' => 50,
		'sanitize_callback'	=> 'the_writers_blog_sanitize_float',
	));
	$wp_customize->add_control('the_writers_blog_border_radius_product_sale_text', array(
        'label'  => __('Product Sale Border Radius','the-writers-blog'),
        'section'  => 'the_writers_blog_shop_page_options',
        'type'        => 'number',
        'input_attrs' => array(
        	'step'=> 1,
            'min' => 0,
            'max' => 50,
        )
    ) );

    $wp_customize->add_setting('the_writers_blog_top_bottom_product_sale_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'the_writers_blog_sanitize_float',
	));
	$wp_customize->add_control('the_writers_blog_top_bottom_product_sale_padding',array(
		'label'	=> __('Top / Bottom Product Sale Padding ','the-writers-blog'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'the_writers_blog_shop_page_options',
		'type'=> 'number'
	));

	$wp_customize->add_setting('the_writers_blog_left_right_product_sale_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'the_writers_blog_sanitize_float',
	));
	$wp_customize->add_control('the_writers_blog_left_right_product_sale_padding',array(
		'label'	=> __('Left / Right Product Sale Padding','the-writers-blog'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'the_writers_blog_shop_page_options',
		'type'=> 'number'
	));

	$wp_customize->add_setting('the_writers_blog_product_sale_text_size',array(
		'default'=> 14,
		'sanitize_callback'	=> 'the_writers_blog_sanitize_float'
	));
	$wp_customize->add_control('the_writers_blog_product_sale_text_size',array(
		'label'	=> __('Product Sale Text Size','the-writers-blog'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'the_writers_blog_shop_page_options',
		'type'=> 'number'
	));

	$wp_customize->add_setting('the_writers_blog_shop_products_navigation',array(
       'default' => 'Yes',
       'sanitize_callback'	=> 'the_writers_blog_sanitize_choices'
    ));
    $wp_customize->add_control('the_writers_blog_shop_products_navigation',array(
       'type' => 'radio',
       'label' => __('WooCommerce Products Navigation','the-writers-blog'),
       'choices' => array(
            'Yes' => __('Yes','the-writers-blog'),
            'No' => __('No','the-writers-blog'),
        ),
       'section' => 'the_writers_blog_shop_page_options',
    ));

  	//Layout Settings
	$wp_customize->add_section( 'the_writers_blog_width_layout', array(
    	'title'      => __( 'Layout Settings', 'the-writers-blog' ),
		'panel' => 'the_writers_blog_panel_id'
	) );

	$wp_customize->add_setting('the_writers_blog_typography_layout_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_writers_blog_typography_layout_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','the-writers-blog'),
		'description' => "<ul><li>". esc_html__('Please explore our premium theme for additional settings and features.','the-writers-blog') ."</li></ul><a target='_blank' href='". esc_url(THE_WRITERS_BLOG_BUY_PRO) ." '>". esc_html__('Upgrade to Pro','the-writers-blog') ."</a>",
		'section'=> 'the_writers_blog_width_layout'
	));

	$wp_customize->add_setting( 'the_writers_blog_single_page_breadcrumb',array(
		'default' => true,
		'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
	) );
	$wp_customize->add_control('the_writers_blog_single_page_breadcrumb',array(
		'type' => 'checkbox',
		'label' => __( 'Show / Hide Single Page Breadcrumb','the-writers-blog'),
		'section' => 'the_writers_blog_width_layout'
	));

	//Sticky Header
	$wp_customize->add_setting( 'the_writers_blog_fixed_header',array(
		'default' => false,
      	'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
    ) );
    $wp_customize->add_control('the_writers_blog_fixed_header',array(
    	'type' => 'checkbox',
        'label' => __( 'Enable / Disable Fixed Header','the-writers-blog' ),
        'section' => 'the_writers_blog_width_layout'
    ));

    $wp_customize->add_setting( 'the_writers_blog_fixed_header_padding_option', array(
		'default'=> '',
		'sanitize_callback'	=> 'the_writers_blog_sanitize_float',
	) );
	$wp_customize->add_control( 'the_writers_blog_fixed_header_padding_option', array(
		'label'       => esc_html__( 'Fixed Header Padding','the-writers-blog' ),
		'section'     => 'the_writers_blog_width_layout',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('the_writers_blog_loader_setting',array(
       'default' => false,
       'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_writers_blog_loader_setting',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Preloader','the-writers-blog'),
       'section' => 'the_writers_blog_width_layout'
    ));

    $wp_customize->add_setting('the_writers_blog_preloader_types',array(
        'default' => 'Default',
        'sanitize_callback' => 'the_writers_blog_sanitize_choices'
	));
	$wp_customize->add_control('the_writers_blog_preloader_types',array(
        'type' => 'radio',
        'label' => __('Preloader Option','the-writers-blog'),
        'section' => 'the_writers_blog_width_layout',
        'choices' => array(
            'Default' => __('Default','the-writers-blog'),
            'Circle' => __('Circle','the-writers-blog'),
            'Two Circle' => __('Two Circle','the-writers-blog')
        ),
	) );

	$wp_customize->add_setting( 'the_writers_blog_loader_color_setting', array(
	    'default' => '#fff',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_writers_blog_loader_color_setting', array(
  		'label' => __('Preloader Color Option', 'the-writers-blog'),
	    'section' => 'the_writers_blog_width_layout',
	    'settings' => 'the_writers_blog_loader_color_setting',
  	)));

  	$wp_customize->add_setting( 'the_writers_blog_loader_background_color', array(
	    'default' => '#000',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_writers_blog_loader_background_color', array(
  		'label' => __('Preloader Background Color Option', 'the-writers-blog'),
	    'section' => 'the_writers_blog_width_layout',
	    'settings' => 'the_writers_blog_loader_background_color',
  	)));

	$wp_customize->add_setting('the_writers_blog_theme_options',array(
    'default' => 'Default',
        'sanitize_callback' => 'the_writers_blog_sanitize_choices'
	));
	$wp_customize->add_control('the_writers_blog_theme_options',array(
        'type' => 'select',
        'label' => __('Container Box','the-writers-blog'),
        'description' => __('Here you can change the Width layout. ','the-writers-blog'),
        'section' => 'the_writers_blog_width_layout',
        'choices' => array(
            'Default' => __('Default','the-writers-blog'),
            'Wide Layout' => __('Wide Layout','the-writers-blog'),
            'Box Layout' => __('Box Layout','the-writers-blog'),
        ),
	) );

	$wp_customize->add_setting( 'the_writers_blog_post_image_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'the_writers_blog_sanitize_float',
	) );
	$wp_customize->add_control( 'the_writers_blog_post_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','the-writers-blog' ),
		'section'     => 'the_writers_blog_width_layout',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 100,
		),
	) );

	$wp_customize->add_setting( 'the_writers_blog_featured_image_box_shadow',array(
		'default' => 0,
		'sanitize_callback'    => 'the_writers_blog_sanitize_number_range',
	));
	$wp_customize->add_control('the_writers_blog_featured_image_box_shadow',array(
		'label' => esc_html__( 'Featured Image Shadow','the-writers-blog' ),
		'section' => 'the_writers_blog_width_layout',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type' => 'range'
	));

	// Button Settings
	$wp_customize->add_section( 'the_writers_blog_button_option', array(
		'title' =>  __( 'Button', 'the-writers-blog' ),
		'panel' => 'the_writers_blog_panel_id',
	));

	$wp_customize->add_setting('the_writers_blog_typography_button_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_writers_blog_typography_button_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','the-writers-blog'),
		'description' => "<ul><li>". esc_html__('Please explore our premium theme for additional settings and features.','the-writers-blog') ."</li></ul><a target='_blank' href='". esc_url(THE_WRITERS_BLOG_BUY_PRO) ." '>". esc_html__('Upgrade to Pro','the-writers-blog') ."</a>",
		'section'=> 'the_writers_blog_button_option'
	));

	$wp_customize->add_setting('the_writers_blog_button_text',array(
		'default'=> __('VIEW POST','the-writers-blog'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_writers_blog_button_text',array(
		'label'	=> __('Add Button Text','the-writers-blog'),
		'section'=> 'the_writers_blog_button_option',
		'type'=> 'text'
	));
    
	$wp_customize->add_setting('the_writers_blog_btn_font_size_option',array(
		'default'=> 13,
		'sanitize_callback'	=> 'the_writers_blog_sanitize_float',
	));
	$wp_customize->add_control('the_writers_blog_btn_font_size_option',array(
		'label'	=> __('Button Font Size','the-writers-blog'),
		'input_attrs' => array(
         'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
		'section'=> 'the_writers_blog_button_option',
		'type'=> 'number'
	));

	$wp_customize->add_setting('the_writers_blog_top_bottom_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'the_writers_blog_sanitize_float',
	));
	$wp_customize->add_control('the_writers_blog_top_bottom_padding',array(
		'label'	=> __('Top and Bottom Padding ','the-writers-blog'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 1,
			'max'              => 50,
        ),
		'section'=> 'the_writers_blog_button_option',
		'type'=> 'number'
	));

	$wp_customize->add_setting('the_writers_blog_left_right_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'the_writers_blog_sanitize_float',
	));
	$wp_customize->add_control('the_writers_blog_left_right_padding',array(
		'label'	=> __('Left and Right Padding','the-writers-blog'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 1,
			'max'              => 50,
        ),
		'section'=> 'the_writers_blog_button_option',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'the_writers_blog_border_radius', array(
		'default'=> '',
		'sanitize_callback'	=> 'the_writers_blog_sanitize_float',
	) );
	$wp_customize->add_control( 'the_writers_blog_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','the-writers-blog' ),
		'section'     => 'the_writers_blog_button_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );
	$wp_customize->add_setting('the_writers_blog_button_text_transform',array(
		'default' => 'Uppercase',
		'sanitize_callback' => 'the_writers_blog_sanitize_choices'
 	));
 	$wp_customize->add_control('the_writers_blog_button_text_transform',array(
		'type' => 'radio',
		'label' => __('Button Text Transform','the-writers-blog'),
		'section' => 'the_writers_blog_button_option',
		'choices' => array(
		   'Uppercase' => __('Uppercase','the-writers-blog'),
		   'Lowercase' => __('Lowercase','the-writers-blog'),
		   'Capitalize' => __('Capitalize','the-writers-blog'),
		),
	));

	$wp_customize->add_setting('the_writers_blog_btn_font_weight',array(
		'default'=> '',
		'sanitize_callback'	=> 'the_writers_blog_sanitize_choices',
	));
	$wp_customize->add_control('the_writers_blog_btn_font_weight',array(
		'label'	=> __('Button Font Weight','the-writers-blog'),
		'section'=> 'the_writers_blog_button_option',
		'type' => 'select',
		'choices' => array(
            '100' => __('100','the-writers-blog'),
            '200' => __('200','the-writers-blog'),
            '300' => __('300','the-writers-blog'),
            '400' => __('400','the-writers-blog'),
            '500' => __('500','the-writers-blog'),
            '600' => __('600','the-writers-blog'),
            '700' => __('700','the-writers-blog'),
            '800' => __('800','the-writers-blog'),
            '900' => __('900','the-writers-blog'),
        ),
	));

	//Sidebar Layout Settings
	$wp_customize->add_section( 'the_writers_blog_general_option', array(
    	'title'      => __( 'Sidebar Settings', 'the-writers-blog' ),
		'panel' => 'the_writers_blog_panel_id'
	) );


	$wp_customize->add_setting('the_writers_blog_typography_sidebar_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_writers_blog_typography_sidebar_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','the-writers-blog'),
		'description' => "<ul><li>". esc_html__('Please explore our premium theme for additional settings and features.','the-writers-blog') ."</li></ul><a target='_blank' href='". esc_url(THE_WRITERS_BLOG_BUY_PRO) ." '>". esc_html__('Upgrade to Pro','the-writers-blog') ."</a>",
		'section'=> 'the_writers_blog_general_option'
	));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('the_writers_blog_layout_settings',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'the_writers_blog_sanitize_choices'
	));
	$wp_customize->add_control('the_writers_blog_layout_settings',array(
        'type' => 'radio',
        'label' => __('Post Sidebar Layout','the-writers-blog'),
        'section' => 'the_writers_blog_general_option',
        'description' => __('This option work for blog page, blog single page, archive page and search page.','the-writers-blog'),
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','the-writers-blog'),
            'Right Sidebar' => __('Right Sidebar','the-writers-blog'),
            'One Column' => __('Full Column','the-writers-blog'),
            'Grid Layout' => __('Grid Layout','the-writers-blog')
        ),
	) );

	$wp_customize->add_setting('the_writers_blog_page_sidebar_option',array(
        'default' => 'One Column',
        'sanitize_callback' => 'the_writers_blog_sanitize_choices'
	));
	$wp_customize->add_control('the_writers_blog_page_sidebar_option',array(
        'type' => 'radio',
        'label' => __('Page Sidebar Layout','the-writers-blog'),
        'section' => 'the_writers_blog_general_option',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','the-writers-blog'),
            'Right Sidebar' => __('Right Sidebar','the-writers-blog'),
            'One Column' => __('Full Column','the-writers-blog')
        ),
	) );

	//Social Icons
	$wp_customize->add_section( 'the_writers_blog_social_icons' , array(
    	'title'      => __( 'Social Icons', 'the-writers-blog' ),
		'panel' => 'the_writers_blog_panel_id'
	) );

	$wp_customize->add_setting('the_writers_blog_typography_social_icons_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_writers_blog_typography_social_icons_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','the-writers-blog'),
		'description' => "<ul><li>". esc_html__('Please explore our premium theme for additional settings and features.','the-writers-blog') ."</li></ul><a target='_blank' href='". esc_url(THE_WRITERS_BLOG_BUY_PRO) ." '>". esc_html__('Upgrade to Pro','the-writers-blog') ."</a>",
		'section'=> 'the_writers_blog_social_icons'
	));

	$wp_customize->add_setting('the_writers_blog_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('the_writers_blog_facebook_url',array(
		'label'	=> __('Add Facebook link','the-writers-blog'),
		'section'	=> 'the_writers_blog_social_icons',
		'setting'	=> 'the_writers_blog_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('the_writers_blog_facebook_icon_changer',array(
		'default'	=> 'fab fa-facebook-f',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new the_writers_blog_Icon_Changer(
        $wp_customize,'the_writers_blog_facebook_icon_changer',array(
		'label'	=> __('Facebook Icon','the-writers-blog'),
		'transport' => 'refresh',
		'section'	=> 'the_writers_blog_social_icons',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('the_writers_blog_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('the_writers_blog_twitter_url',array(
		'label'	=> __('Add Twitter link','the-writers-blog'),
		'section'	=> 'the_writers_blog_social_icons',
		'setting'	=> 'the_writers_blog_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('the_writers_blog_twitter_icon_changer',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new the_writers_blog_Icon_Changer(
        $wp_customize,'the_writers_blog_twitter_icon_changer',array(
		'label'	=> __('Twitter Icon','the-writers-blog'),
		'transport' => 'refresh',
		'section'	=> 'the_writers_blog_social_icons',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('the_writers_blog_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('the_writers_blog_youtube_url',array(
		'label'	=> __('Add Youtube link','the-writers-blog'),
		'section'	=> 'the_writers_blog_social_icons',
		'setting'	=> 'the_writers_blog_youtube_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('the_writers_blog_youtube_icon_changer',array(
		'default'	=> 'fab fa-youtube',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new the_writers_blog_Icon_Changer(
        $wp_customize,'the_writers_blog_youtube_icon_changer',array(
		'label'	=> __('Youtube Icon','the-writers-blog'),
		'transport' => 'refresh',
		'section'	=> 'the_writers_blog_social_icons',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('the_writers_blog_linkedin_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('the_writers_blog_linkedin_url',array(
		'label'	=> __('Add Linkedin link','the-writers-blog'),
		'section'	=> 'the_writers_blog_social_icons',
		'setting'	=> 'the_writers_blog_linkedin_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('the_writers_blog_linkedin_icon_changer',array(
		'default'	=> 'fab fa-linkedin-in',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new the_writers_blog_Icon_Changer(
        $wp_customize,'the_writers_blog_linkedin_icon_changer',array(
		'label'	=> __('Linkedin Icon','the-writers-blog'),
		'transport' => 'refresh',
		'section'	=> 'the_writers_blog_social_icons',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('the_writers_blog_instagram_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('the_writers_blog_instagram_url',array(
		'label'	=> __('Add Instagram link','the-writers-blog'),
		'section'	=> 'the_writers_blog_social_icons',
		'setting'	=> 'the_writers_blog_instagram_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('the_writers_blog_instagram_icon_changer',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new the_writers_blog_Icon_Changer(
        $wp_customize,'the_writers_blog_instagram_icon_changer',array(
		'label'	=> __('Instagram Icon','the-writers-blog'),
		'transport' => 'refresh',
		'section'	=> 'the_writers_blog_social_icons',
		'type'		=> 'icon'
	)));

	// navigation menu 
	$wp_customize->add_section( 'the_writers_blog_navigation_menu' , array(
    	'title'      => __( 'Navigation Menus Settings', 'the-writers-blog' ),
		'priority'   => null,
		'panel' => 'the_writers_blog_panel_id'
	) );


	$wp_customize->add_setting('the_writers_blog_typography_navigation_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_writers_blog_typography_navigation_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','the-writers-blog'),
		'description' => "<ul><li>". esc_html__('Please explore our premium theme for additional settings and features.','the-writers-blog') ."</li></ul><a target='_blank' href='". esc_url(THE_WRITERS_BLOG_BUY_PRO) ." '>". esc_html__('Upgrade to Pro','the-writers-blog') ."</a>",
		'section'=> 'the_writers_blog_navigation_menu'
	));

	$wp_customize->add_setting('the_writers_blog_menu_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'the_writers_blog_menu_color', array(
		'label'    => __('Menu Color', 'the-writers-blog'),
		'section'  => 'the_writers_blog_navigation_menu',
		'settings' => 'the_writers_blog_menu_color',
	)));

	$wp_customize->add_setting('the_writers_blog_sub_menu_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'the_writers_blog_sub_menu_color', array(
		'label'    => __('Submenu Color', 'the-writers-blog'),
		'section'  => 'the_writers_blog_navigation_menu',
		'settings' => 'the_writers_blog_sub_menu_color',
	)));

	$wp_customize->add_setting('the_writers_blog_menu_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'the_writers_blog_menu_hover_color', array(
		'label'    => __('Menu Hover Color', 'the-writers-blog'),
		'section'  => 'the_writers_blog_navigation_menu',
		'settings' => 'the_writers_blog_menu_hover_color',
	)));

	$wp_customize->add_setting('the_writers_blog_sub_menu_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'the_writers_blog_sub_menu_hover_color', array(
		'label'    => __('Submenu Hover Color', 'the-writers-blog'),
		'section'  => 'the_writers_blog_navigation_menu',
		'settings' => 'the_writers_blog_sub_menu_hover_color',
	)));

	$wp_customize->add_setting('the_writers_blog_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'the_writers_blog_sanitize_float',
	));
	$wp_customize->add_control('the_writers_blog_navigation_menu_font_size',array(
		'label'	=> __('Navigation Menus Font Size ','the-writers-blog'),
		'section'=> 'the_writers_blog_navigation_menu',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'type'=> 'number'
	));

	$wp_customize->add_setting('the_writers_blog_menu_text_tranform',array(
        'default' => 'Default',
        'sanitize_callback' => 'the_writers_blog_sanitize_choices'
    ));
    $wp_customize->add_control('the_writers_blog_menu_text_tranform',array(
        'type' => 'radio',
        'label' => __('Navigation Menus Text Transform','the-writers-blog'),
        'section' => 'the_writers_blog_navigation_menu',
        'choices' => array(
            'Default' => __('Default','the-writers-blog'),
            'Capitalize' => __('Capitalize','the-writers-blog'),
            'Lowercase' => __('Lowercase','the-writers-blog'),
        ),
	) );

	$wp_customize->add_setting('the_writers_blog_menu_font_weight',array(
        'default' => 'Default',
        'sanitize_callback' => 'the_writers_blog_sanitize_choices'
    ));
    $wp_customize->add_control('the_writers_blog_menu_font_weight',array(
        'type' => 'radio',
        'label' => __('Navigation Menus Font Weight','the-writers-blog'),
        'section' => 'the_writers_blog_navigation_menu',
        'choices' => array(
            'Default' => __('Default','the-writers-blog'),
            'Normal' => __('Normal','the-writers-blog'),
        ),
	) );

	//home page slider
	$wp_customize->add_section( 'the_writers_blog_slider' , array(
    	'title'      => __( 'Slider Settings', 'the-writers-blog' ),
		'priority'   => null,
		'panel' => 'the_writers_blog_panel_id'
	) );


	$wp_customize->add_setting('the_writers_blog_slider_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_writers_blog_slider_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','the-writers-blog'),
		'description' => "<ul><li>". esc_html__('Include customizable typography settings with a selection of premium fonts.','the-writers-blog') ."</li><li>". esc_html__('And so on...','the-writers-blog') ."</li></ul><a target='_blank' href='". esc_url(THE_WRITERS_BLOG_BUY_PRO) ." '>". esc_html__('Upgrade to Pro','the-writers-blog') ."</a>",
		'section'=> 'the_writers_blog_slider'
	));

	$wp_customize->add_setting('the_writers_blog_slider_arrows',array(
        'default' => false,
        'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
	));
	$wp_customize->add_control('the_writers_blog_slider_arrows',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide slider','the-writers-blog'),
      	'section' => 'the_writers_blog_slider',
	));

	$wp_customize->add_setting('the_writers_blog_slider_category',array(
       'default' => true,
       'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_writers_blog_slider_category',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Slider Category','the-writers-blog'),
       'section' => 'the_writers_blog_slider'
    ));

	$wp_customize->add_setting('the_writers_blog_slider_title',array(
       'default' => true,
       'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_writers_blog_slider_title',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Slider Title','the-writers-blog'),
       'section' => 'the_writers_blog_slider'
    ));

    $wp_customize->add_setting('the_writers_blog_slider_metabox',array(
       'default' => true,
       'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_writers_blog_slider_metabox',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Slider Metabox','the-writers-blog'),
       'section' => 'the_writers_blog_slider'
    ));

    $wp_customize->add_setting('the_writers_blog_slider_content',array(
       'default' => true,
       'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_writers_blog_slider_content',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Slider Content','the-writers-blog'),
       'section' => 'the_writers_blog_slider'
    ));

    $wp_customize->add_setting('the_writers_blog_slider_button',array(
       'default' => true,
       'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_writers_blog_slider_button',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Slider Button','the-writers-blog'),
       'section' => 'the_writers_blog_slider'
    ));

    $wp_customize->add_setting('the_writers_blog_slider_width_options',array(
    	'default' => 'Full Width',
     	'sanitize_callback' => 'the_writers_blog_sanitize_choices'
	));
	$wp_customize->add_control('the_writers_blog_slider_width_options',array(
		'type' => 'select',
		'label' => __('Slider Width Layout','the-writers-blog'),
		'description' => __('Here you can change the Slider Width. ','the-writers-blog'),
		'section' => 'the_writers_blog_slider',
		'choices' => array(
		   'Full Width' => __('Full Width','the-writers-blog'),
		   'Container Width' => __('Container Width','the-writers-blog'),
		),
	) );

	$args = array('numberposts' => -1);
	$post_list = get_posts($args);
	$i = 0;	
	$pst_sls[]='Select';
	foreach ($post_list as $key => $p_post) {
		$pst_sls[$p_post->ID]=$p_post->post_title;
	}
	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting('the_writers_blog_slide_page'.$count,array(
			'sanitize_callback' => 'the_writers_blog_sanitize_choices',
		));
		$wp_customize->add_control('the_writers_blog_slide_page'.$count,array(
			'type'    => 'select',
			'choices' => $pst_sls,
			'label' => __('Select post','the-writers-blog'),
			'section' => 'the_writers_blog_slider',
		));
	}

	$wp_customize->add_setting( 'the_writers_blog_slider_speed',array(
		'default' => 3000,
		'sanitize_callback'    => 'the_writers_blog_sanitize_number_range',
	));
	$wp_customize->add_control( 'the_writers_blog_slider_speed',array(
		'label' => esc_html__( 'Slider Speed','the-writers-blog' ),
		'section' => 'the_writers_blog_slider',
		'type'        => 'range',
		'input_attrs' => array(
			'min' => 1000,
			'max' => 5000,
			'step' => 500,
		),
	));

	$wp_customize->add_setting('the_writers_blog_slider_height_option',array(
		'default'=> 600,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_writers_blog_slider_height_option',array(
		'label'	=> __('Slider Height Option','the-writers-blog'),
		'section'=> 'the_writers_blog_slider',
		'type'=> 'text'
	));

    $wp_customize->add_setting('the_writers_blog_slider_content_option',array(
    	'default' => __('Left','the-writers-blog'),
        'sanitize_callback' => 'the_writers_blog_sanitize_choices'
	));
	$wp_customize->add_control('the_writers_blog_slider_content_option',array(
        'type' => 'select',
        'label' => __('Slider Content Layout','the-writers-blog'),
        'section' => 'the_writers_blog_slider',
        'choices' => array(
            'Center' => __('Center','the-writers-blog'),
            'Left' => __('Left','the-writers-blog'),
            'Right' => __('Right','the-writers-blog'),
        ),
	) );

	$wp_customize->add_setting('the_writers_blog_slider_button_text',array(
		'default'=> __('VIEW POST','the-writers-blog'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_writers_blog_slider_button_text',array(
		'label'	=> __('Slider Button Text','the-writers-blog'),
		'section'=> 'the_writers_blog_slider',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'the_writers_blog_slider_excerpt_number', array(
		'default'              => 20,
		'sanitize_callback'    => 'the_writers_blog_sanitize_number_range',
	) );
	$wp_customize->add_control( 'the_writers_blog_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','the-writers-blog' ),
		'section'     => 'the_writers_blog_slider',
		'type'        => 'range',
		'settings'    => 'the_writers_blog_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('the_writers_blog_slider_opacity_color',array(
      'default'              => 0.9,
      'sanitize_callback' => 'the_writers_blog_sanitize_choices'
	));
	$wp_customize->add_control( 'the_writers_blog_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','the-writers-blog' ),
	'section'     => 'the_writers_blog_slider',
	'type'        => 'select',
	'settings'    => 'the_writers_blog_slider_opacity_color',
	'choices' => array(
		'0' =>  esc_attr__('0','the-writers-blog'),
		'0.1' =>  esc_attr__('0.1','the-writers-blog'),
		'0.2' =>  esc_attr__('0.2','the-writers-blog'),
		'0.3' =>  esc_attr__('0.3','the-writers-blog'),
		'0.4' =>  esc_attr__('0.4','the-writers-blog'),
		'0.5' =>  esc_attr__('0.5','the-writers-blog'),
		'0.6' =>  esc_attr__('0.6','the-writers-blog'),
		'0.7' =>  esc_attr__('0.7','the-writers-blog'),
		'0.8' =>  esc_attr__('0.8','the-writers-blog'),
		'0.9' =>  esc_attr__('0.9','the-writers-blog')
	),
	));

	$wp_customize->add_setting('the_writers_blog_padding_top_bottom_slider_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'the_writers_blog_sanitize_float',
	));
	$wp_customize->add_control('the_writers_blog_padding_top_bottom_slider_content',array(
		'label'	=> __('Top Bottom Slider Content Padding','the-writers-blog'),
		'section'=> 'the_writers_blog_slider',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'type'=> 'number'
	));

	$wp_customize->add_setting('the_writers_blog_padding_left_right_slider_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'the_writers_blog_sanitize_float',
	));
	$wp_customize->add_control('the_writers_blog_padding_left_right_slider_content',array(
		'label'	=> __('Left Right Slider Content Padding','the-writers-blog'),
		'section'=> 'the_writers_blog_slider',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'type'=> 'number'
	));

	$wp_customize->add_setting('the_writers_blog_show_slider_image_overlay',array(
       'default' => true,
       'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_writers_blog_show_slider_image_overlay',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Image Overlay Slider','the-writers-blog'),
       'section' => 'the_writers_blog_slider'
    ));

    $wp_customize->add_setting('the_writers_blog_color_slider_image_overlay', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'the_writers_blog_color_slider_image_overlay', array(
		'label'    => __('Image Overlay Slider Color', 'the-writers-blog'),
		'section'  => 'the_writers_blog_slider',
		'settings' => 'the_writers_blog_color_slider_image_overlay',
	)));
	
	// services section
	$wp_customize->add_section('the_writers_blog_service',array(
		'title'	=> __('Blog Category','the-writers-blog'),
		'description'	=> __('Add Our Blog Category sections below.','the-writers-blog'),
		'panel' => 'the_writers_blog_panel_id',
	));


	$wp_customize->add_setting('the_writers_blog_blog_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_writers_blog_blog_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','the-writers-blog'),
		'description' => "<ul><li>". esc_html__('Please explore our premium theme for additional settings and features.','the-writers-blog') ."</li></ul><a target='_blank' href='". esc_url(THE_WRITERS_BLOG_BUY_PRO) ." '>". esc_html__('Upgrade to Pro','the-writers-blog') ."</a>",
		'section'=> 'the_writers_blog_service'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('the_writers_blog_category_section',array(
		'default'	=> 'select',
		'sanitize_callback' => 'the_writers_blog_sanitize_choices',
	));
	$wp_customize->add_control('the_writers_blog_category_section',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display Latest Post','the-writers-blog'),
		'section' => 'the_writers_blog_service',
	));

	//no Result Setting
	$wp_customize->add_section('the_writers_blog_no_result_setting',array(
		'title'	=> __('No Results Settings','the-writers-blog'),
		'panel' => 'the_writers_blog_panel_id',
	));	

	$wp_customize->add_setting('the_writers_blog_no_result_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_writers_blog_no_result_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','the-writers-blog'),
		'description' => "<ul><li>". esc_html__('Please explore our premium theme for additional settings and features.','the-writers-blog') ."</li></ul><a target='_blank' href='". esc_url(THE_WRITERS_BLOG_BUY_PRO) ." '>". esc_html__('Upgrade to Pro','the-writers-blog') ."</a>",
		'section'=> 'the_writers_blog_no_result_setting'
	));

	$wp_customize->add_setting('the_writers_blog_no_search_result_title',array(
		'default'=> __('Nothing Found','the-writers-blog'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_writers_blog_no_search_result_title',array(
		'label'	=> __('No Search Results Title','the-writers-blog'),
		'section'=> 'the_writers_blog_no_result_setting',
		'type'=> 'text'
	));

	$wp_customize->add_setting('the_writers_blog_no_search_result_content',array(
		'default'=> __('Sorry, but nothing matched your search terms. Please try again with some different keywords.','the-writers-blog'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_writers_blog_no_search_result_content',array(
		'label'	=> __('No Search Results Content','the-writers-blog'),
		'section'=> 'the_writers_blog_no_result_setting',
		'type'=> 'text'
	));

	//404 Page Setting
	$wp_customize->add_section('the_writers_blog_page_not_found_setting',array(
		'title'	=> __('Page Not Found Settings','the-writers-blog'),
		'panel' => 'the_writers_blog_panel_id',
	));	

	$wp_customize->add_setting('the_writers_blog_page_not_found_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_writers_blog_page_not_found_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','the-writers-blog'),
		'description' => "<ul><li>". esc_html__('Please explore our premium theme for additional settings and features.','the-writers-blog') ."</li></ul><a target='_blank' href='". esc_url(THE_WRITERS_BLOG_BUY_PRO) ." '>". esc_html__('Upgrade to Pro','the-writers-blog') ."</a>",
		'section'=> 'the_writers_blog_page_not_found_setting'
	));

	$wp_customize->add_setting('the_writers_blog_page_not_found_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_writers_blog_page_not_found_title',array(
		'label'	=> __('Page Not Found Title','the-writers-blog'),
		'section'=> 'the_writers_blog_page_not_found_setting',
		'type'=> 'text'
	));

	$wp_customize->add_setting('the_writers_blog_page_not_found_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_writers_blog_page_not_found_content',array(
		'label'	=> __('Page Not Found Content','the-writers-blog'),
		'section'=> 'the_writers_blog_page_not_found_setting',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('the_writers_blog_mobile_media',array(
		'title'	=> __('Mobile Media Settings','the-writers-blog'),
		'panel' => 'the_writers_blog_panel_id',
	));

	$wp_customize->add_setting('the_writers_blog_mobile_media_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_writers_blog_mobile_media_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','the-writers-blog'),
		'description' => "<ul><li>". esc_html__('Please explore our premium theme for additional settings and features.','the-writers-blog') ."</li></ul><a target='_blank' href='". esc_url(THE_WRITERS_BLOG_BUY_PRO) ." '>". esc_html__('Upgrade to Pro','the-writers-blog') ."</a>",
		'section'=> 'the_writers_blog_mobile_media'
	));

	$wp_customize->add_setting('the_writers_blog_enable_disable_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_writers_blog_enable_disable_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Sidebar','the-writers-blog'),
       'section' => 'the_writers_blog_mobile_media'
    ));

    $wp_customize->add_setting('the_writers_blog_enable_disable_slider',array(
       'default' => true,
       'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_writers_blog_enable_disable_slider',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Slider','the-writers-blog'),
       'section' => 'the_writers_blog_mobile_media'
    ));

    $wp_customize->add_setting('the_writers_blog_show_hide_slider_button',array(
       'default' => true,
       'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_writers_blog_show_hide_slider_button',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Slider Button','the-writers-blog'),
       'section' => 'the_writers_blog_mobile_media'
    ));

    $wp_customize->add_setting('the_writers_blog_enable_disable_scrolltop',array(
       'default' => false,
       'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_writers_blog_enable_disable_scrolltop',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Scroll To Top','the-writers-blog'),
       'section' => 'the_writers_blog_mobile_media'
    ));

	//Blog Post
	$wp_customize->add_section('the_writers_blog_blog_post',array(
		'title'	=> __('Post Settings','the-writers-blog'),
		'panel' => 'the_writers_blog_panel_id',
	));	

	$wp_customize->add_setting('the_writers_blog_post_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_writers_blog_post_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','the-writers-blog'),
		'description' => "<ul><li>". esc_html__('Please explore our premium theme for additional settings and features.','the-writers-blog') ."</li></ul><a target='_blank' href='". esc_url(THE_WRITERS_BLOG_BUY_PRO) ." '>". esc_html__('Upgrade to Pro','the-writers-blog') ."</a>",
		'section'=> 'the_writers_blog_blog_post'
	));

	$wp_customize->add_setting('the_writers_blog_caps_enable',array(
        'default' => false,
        'sanitize_callback' => 'the_writers_blog_sanitize_checkbox',
    ));
	$wp_customize->add_control( 'the_writers_blog_caps_enable',array(
			'label' => esc_html__('Initial Cap (First Big Letter)', 'the-writers-blog'),
			'type' => 'checkbox',
			'section' => 'the_writers_blog_blog_post',
	));

	$wp_customize->add_setting('the_writers_blog_date_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_writers_blog_date_hide',array(
       'type' => 'checkbox',
       'label' => __('Post Date','the-writers-blog'),
       'section' => 'the_writers_blog_blog_post'
    ));

    $wp_customize->add_setting('the_writers_blog_post_date_icon_changer',array(
		'default'	=> 'fa fa-calendar',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new the_writers_blog_Icon_Changer(
        $wp_customize,'the_writers_blog_post_date_icon_changer',array(
		'label'	=> __('Post Date Icon','the-writers-blog'),
		'transport' => 'refresh',
		'section'	=> 'the_writers_blog_blog_post',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('the_writers_blog_author_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_writers_blog_author_hide',array(
       'type' => 'checkbox',
       'label' => __('Post Author','the-writers-blog'),
       'section' => 'the_writers_blog_blog_post'
    ));

    $wp_customize->add_setting('the_writers_blog_post_author_icon_changer',array(
		'default'	=> 'fa fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new the_writers_blog_Icon_Changer(
        $wp_customize,'the_writers_blog_post_author_icon_changer',array(
		'label'	=> __('Post Author Icon','the-writers-blog'),
		'transport' => 'refresh',
		'section'	=> 'the_writers_blog_blog_post',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('the_writers_blog_comment_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_writers_blog_comment_hide',array(
       'type' => 'checkbox',
       'label' => __('Post Comments','the-writers-blog'),
       'section' => 'the_writers_blog_blog_post'
    ));

    $wp_customize->add_setting('the_writers_blog_post_comment_icon_changer',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new the_writers_blog_Icon_Changer(
        $wp_customize,'the_writers_blog_post_comment_icon_changer',array(
		'label'	=> __('Post Comments Icon','the-writers-blog'),
		'transport' => 'refresh',
		'section'	=> 'the_writers_blog_blog_post',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('the_writers_blog_post_time',array(
       'default' => true,
       'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_writers_blog_post_time',array(
       'type' => 'checkbox',
       'label' => __('Post Time','the-writers-blog'),
       'section' => 'the_writers_blog_blog_post'
    ));

	$wp_customize->add_setting('the_writers_blog_post_time_icon_changer',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new The_Writers_Blog_Icon_Changer(
        $wp_customize,'the_writers_blog_post_time_icon_changer',array(
		'label'	=> __('Post Time Icon','the-writers-blog'),
		'transport' => 'refresh',
		'section'	=> 'the_writers_blog_blog_post',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'the_writers_blog_blog_post_metabox_seperator', array(
		'default'   => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'the_writers_blog_blog_post_metabox_seperator', array(
		'label'       => esc_html__( 'Blog Post Meta Box Seperator','the-writers-blog' ),
		'section'     => 'the_writers_blog_blog_post',
		'description' => __('Add the seperator for meta box. Example: ",",  "|", "/", etc. ','the-writers-blog'),
		'type'        => 'text',
		'settings'    => 'the_writers_blog_blog_post_metabox_seperator',
	) );

    $wp_customize->add_setting('the_writers_blog_blog_post_layout',array(
        'default' => 'Default',
        'sanitize_callback' => 'the_writers_blog_sanitize_choices'
    ));
    $wp_customize->add_control('the_writers_blog_blog_post_layout',array(
        'type' => 'radio',
        'label' => __('Post Layout Option','the-writers-blog'),
        'section' => 'the_writers_blog_blog_post',
        'choices' => array(
            'Default' => __('Default','the-writers-blog'),
            'Center' => __('Center','the-writers-blog'),
            'Left' => __('Left','the-writers-blog'),
			'Content and Image' => __('Content and Image','the-writers-blog'),
        ),
	) );

	$wp_customize->add_setting('the_writers_blog_post_break_block_setting',array(
        'default' => 'Into Blocks',
        'sanitize_callback' => 'the_writers_blog_sanitize_choices'
	));
	$wp_customize->add_control('the_writers_blog_post_break_block_setting',array(
        'type' => 'radio',
        'label' => __('Display Blog Page posts','the-writers-blog'),
        'section' => 'the_writers_blog_blog_post',
        'choices' => array(
            'Into Blocks' => __('Into Blocks','the-writers-blog'),
            'Without Blocks' => __('Without Blocks','the-writers-blog'),
        ),
	) );

	$wp_customize->add_setting('the_writers_blog_post_image_dimention',array(
       'default' => 'Default',
       'sanitize_callback'	=> 'the_writers_blog_sanitize_choices'
    ));
    $wp_customize->add_control('the_writers_blog_post_image_dimention',array(
       'type' => 'radio',
       'label'	=> __('Post Featured Image Dimention','the-writers-blog'),
       'choices' => array(
            'Default' => __('Default','the-writers-blog'),
            'Custom Image Size' => __('Custom Image Size','the-writers-blog'),
        ),
      	'section'	=> 'the_writers_blog_blog_post'
    ));

    $wp_customize->add_setting( 'the_writers_blog_post_featured_image_width',array(
		'default' => '',
		'sanitize_callback'	=> 'the_writers_blog_sanitize_number_range'
	));
	$wp_customize->add_control('the_writers_blog_post_featured_image_width',	array(
		'label' => esc_html__( 'Blog Post Custom Width','the-writers-blog' ),
		'section' => 'the_writers_blog_blog_post',
		'input_attrs' => array(
			'min' => 0,
			'max' => 500,
			'step' => 1,
		),
		'type' => 'range',
		'active_callback' => 'the_writers_blog_enable_image_dimention'
	));

	$wp_customize->add_setting( 'the_writers_blog_post_featured_image_height',array(
		'default' => '',
		'sanitize_callback'	=> 'the_writers_blog_sanitize_number_range'
	));
	$wp_customize->add_control('the_writers_blog_post_featured_image_height',	array(
		'label' => esc_html__( 'Blog Post Custom Height','the-writers-blog' ),
		'section' => 'the_writers_blog_blog_post',
		'input_attrs' => array(
			'min' => 0,
			'max' => 350,
			'step' => 1,
		),
		'type' => 'range',
		'active_callback' => 'the_writers_blog_enable_image_dimention'
	));

	$wp_customize->add_setting( 'the_writers_blog_blog_post_img_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'the_writers_blog_sanitize_float',
	) );
	$wp_customize->add_control( 'the_writers_blog_blog_post_img_border_radius', array(
		'label'       => esc_html__( 'Post Image Border Radius','the-writers-blog' ),
		'section'     => 'the_writers_blog_blog_post',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 100,
		),
	) );

	$wp_customize->add_setting( 'the_writers_blog_blog_post_img_box_shadow',array(
		'default' => 0,
		'sanitize_callback'    => 'the_writers_blog_sanitize_float',
	));
	$wp_customize->add_control('the_writers_blog_blog_post_img_box_shadow',array(
		'label' => esc_html__( 'Post Image Shadow','the-writers-blog' ),
		'section' => 'the_writers_blog_blog_post',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type' => 'number'
	));

	$wp_customize->add_setting('the_writers_blog_blog_description',array(
    	'default'   => 'Post Excerpt',
        'sanitize_callback' => 'the_writers_blog_sanitize_choices'
	));
	$wp_customize->add_control('the_writers_blog_blog_description',array(
        'type' => 'select',
        'label' => __('Post Description','the-writers-blog'),
        'section' => 'the_writers_blog_blog_post',
        'choices' => array(
            'None' => __('None','the-writers-blog'),
            'Post Excerpt' => __('Post Excerpt','the-writers-blog'),
            'Post Content' => __('Post Content','the-writers-blog'),
        ),
	) );

    $wp_customize->add_setting( 'the_writers_blog_excerpt_number', array(
		'default'              => 20,
		'sanitize_callback'	=> 'the_writers_blog_sanitize_float',
	) );
	$wp_customize->add_control( 'the_writers_blog_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','the-writers-blog' ),
		'section'     => 'the_writers_blog_blog_post',
		'type'        => 'range',
		'settings'    => 'the_writers_blog_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'the_writers_blog_post_excerpt_suffix', array(
		'default'   => __('{...}','the-writers-blog'),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'the_writers_blog_post_excerpt_suffix', array(
		'label'       => esc_html__( 'Excerpt Indicator','the-writers-blog' ),
		'section'     => 'the_writers_blog_blog_post',
		'type'        => 'text',
		'settings'    => 'the_writers_blog_post_excerpt_suffix',
	) );

	$wp_customize->add_setting('the_writers_blog_show_post_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_writers_blog_show_post_pagination',array(
       'type' => 'checkbox',
       'label' => __('Post Pagination','the-writers-blog'),
       'section' => 'the_writers_blog_blog_post'
    ));

	$wp_customize->add_setting( 'the_writers_blog_pagination_option', array(
        'default'			=> 'Default',
        'sanitize_callback'	=> 'the_writers_blog_sanitize_choices'
    ));
    $wp_customize->add_control( 'the_writers_blog_pagination_option', array(
        'section' => 'the_writers_blog_blog_post',
        'type' => 'radio',
        'label' => __( 'Post Pagination', 'the-writers-blog' ),
        'choices'		=> array(
            'Default'  => __( 'Default', 'the-writers-blog' ),
            'next-prev' => __( 'Next / Previous', 'the-writers-blog' ),
    )));

	// Single post setting
    $wp_customize->add_section('the_writers_blog_single_post_section',array(
		'title'	=> __('Single Post Settings','the-writers-blog'),
		'panel' => 'the_writers_blog_panel_id',
	));	


	$wp_customize->add_setting('the_writers_blog_single_post_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_writers_blog_single_post_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','the-writers-blog'),
		'description' => "<ul><li>". esc_html__('Please explore our premium theme for additional settings and features.','the-writers-blog') ."</li></ul><a target='_blank' href='". esc_url(THE_WRITERS_BLOG_BUY_PRO) ." '>". esc_html__('Upgrade to Pro','the-writers-blog') ."</a>",
		'section'=> 'the_writers_blog_single_post_section'
	));


	$wp_customize->add_setting('the_writers_blog_single_post_breadcrumb',array(
		'default' => false,
		'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
	));
	$wp_customize->add_control('the_writers_blog_single_post_breadcrumb',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Breadcrumb','the-writers-blog'),
		'section' => 'the_writers_blog_single_post_section',
	));

	$wp_customize->add_setting('the_writers_blog_tags_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_writers_blog_tags_hide',array(
       'type' => 'checkbox',
       'label' => __('Single Post Tags','the-writers-blog'),
       'section' => 'the_writers_blog_single_post_section'
    ));

    $wp_customize->add_setting('the_writers_blog_single_post_image',array(
       'default' => true,
       'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_writers_blog_single_post_image',array(
       'type' => 'checkbox',
       'label' => __('Single Post Featured Image','the-writers-blog'),
       'section' => 'the_writers_blog_single_post_section'
    ));

     $wp_customize->add_setting( 'the_writers_blog_single_post_img_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'the_writers_blog_sanitize_float',
	) );
	$wp_customize->add_control( 'the_writers_blog_single_post_img_border_radius', array(
		'label'       => esc_html__( 'Single Post Image Border Radius','the-writers-blog' ),
		'section'     => 'the_writers_blog_single_post_section',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 100,
		),
	) );

	$wp_customize->add_setting( 'the_writers_blog_single_post_img_box_shadow',array(
		'default' => 0,
		'sanitize_callback'    => 'the_writers_blog_sanitize_float',
	));
	$wp_customize->add_control('the_writers_blog_single_post_img_box_shadow',array(
		'label' => esc_html__( 'Single Post Image Shadow','the-writers-blog' ),
		'section' => 'the_writers_blog_single_post_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type' => 'number'
	));

    $wp_customize->add_setting('the_writers_blog_single_post_date',array(
       'default' => true,
       'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
    ));
	
    $wp_customize->add_control('the_writers_blog_single_post_date',array(
       'type' => 'checkbox',
       'label' => __('Single Post Date','the-writers-blog'),
       'section' => 'the_writers_blog_single_post_section'
    ));

	$wp_customize->add_setting('the_writers_blog_single_post_date_icon_changer',array(
		'default'	=> 'fa fa-calendar',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control(new The_Writers_Blog_Icon_Changer(
     	$wp_customize,'the_writers_blog_single_post_date_icon_changer',array(
		'label'	=> __('Single Post Date Icon','the-writers-blog'),
		'transport' => 'refresh',
		'section'	=> 'the_writers_blog_single_post_section',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('the_writers_blog_single_post_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_writers_blog_single_post_comment',array(
       'type' => 'checkbox',
       'label' => __('Single Post Comments','the-writers-blog'),
       'section' => 'the_writers_blog_single_post_section'
    ));

	$wp_customize->add_setting('the_writers_blog_single_post_comment_icon_changer',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new The_Writers_Blog_Icon_Changer(
        $wp_customize,'the_writers_blog_single_post_comment_icon_changer',array(
		'label'	=> __('Single Post Comment Icon','the-writers-blog'),
		'transport' => 'refresh',
		'section'	=> 'the_writers_blog_single_post_section',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('the_writers_blog_single_post_author',array(
       'default' => true,
       'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_writers_blog_single_post_author',array(
       'type' => 'checkbox',
       'label' => __('Single Post Author','the-writers-blog'),
       'section' => 'the_writers_blog_single_post_section'
    ));

	$wp_customize->add_setting('the_writers_blog_single_post_author_icon_changer',array(
		'default'	=> 'fa fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new The_Writers_Blog_Icon_Changer(
        $wp_customize,'the_writers_blog_single_post_author_icon_changer',array(
		'label'	=> __('Single Post Author Icon','the-writers-blog'),
		'transport' => 'refresh',
		'section'	=> 'the_writers_blog_single_post_section',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('the_writers_blog_single_post_time',array(
       'default' => true,
       'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_writers_blog_single_post_time',array(
       'type' => 'checkbox',
       'label' => __('Single Post Time','the-writers-blog'),
       'section' => 'the_writers_blog_single_post_section'
    ));

	$wp_customize->add_setting('the_writers_blog_single_post_time_icon_changer',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new The_Writers_Blog_Icon_Changer(
        $wp_customize,'the_writers_blog_single_post_time_icon_changer',array(
		'label'	=> __('Single Post Time Icon','the-writers-blog'),
		'transport' => 'refresh',
		'section'	=> 'the_writers_blog_single_post_section',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('the_writers_blog_show_single_post_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_writers_blog_show_single_post_pagination',array(
       'type' => 'checkbox',
       'label' => __('Single Post Pagination','the-writers-blog'),
       'section' => 'the_writers_blog_single_post_section'
    ));

     $wp_customize->add_setting('the_writers_blog_prev_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_writers_blog_prev_text',array(
       'type' => 'text',
       'label' => __('Previous Navigation Text','the-writers-blog'),
       'section' => 'the_writers_blog_single_post_section'
    ));

    $wp_customize->add_setting('the_writers_blog_next_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_writers_blog_next_text',array(
       'type' => 'text',
       'label' => __('Next Navigation Text','the-writers-blog'),
       'section' => 'the_writers_blog_single_post_section'
    ));

    $wp_customize->add_setting('the_writers_blog_show_hide_single_post_categories',array(
		'default' => true,
		'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
 	));
 	$wp_customize->add_control('the_writers_blog_show_hide_single_post_categories',array(
		'type' => 'checkbox',
		'label' => __('Single Post Categories','the-writers-blog'),
		'section' => 'the_writers_blog_single_post_section'
	));

	$wp_customize->add_setting('the_writers_blog_post_comment_enable',array(
		'default' => true,
		'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
	));
	$wp_customize->add_control('the_writers_blog_post_comment_enable',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Post Comment','the-writers-blog'),
		'section' => 'the_writers_blog_single_post_section',
	));

    $wp_customize->add_setting( 'the_writers_blog_seperator_metabox', array(
		'default'   => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'the_writers_blog_seperator_metabox', array(
		'label'       => esc_html__( 'Single Post Meta Box Seperator','the-writers-blog' ),
		'section'     => 'the_writers_blog_single_post_section',
		'description' => __('Add the seperator for meta box. Example: ",",  "|", "/", etc. ','the-writers-blog'),
		'type'        => 'text',
		'settings'    => 'the_writers_blog_seperator_metabox',
	) );

	$wp_customize->add_setting('the_writers_blog_comment_form_heading',array(
       'default' => __('Leave a Reply','the-writers-blog'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_writers_blog_comment_form_heading',array(
       'type' => 'text',
       'label' => __('Comment Form Heading','the-writers-blog'),
       'section' => 'the_writers_blog_single_post_section'
    ));

    $wp_customize->add_setting('the_writers_blog_comment_button_text',array(
       'default' => __('Post Comment','the-writers-blog'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('the_writers_blog_comment_button_text',array(
       'type' => 'text',
       'label' => __('Comment Submit Button Text','the-writers-blog'),
       'section' => 'the_writers_blog_single_post_section'
    ));

    $wp_customize->add_setting( 'the_writers_blog_comment_form_size',array(
		'default' => 100,
		'sanitize_callback'    => 'the_writers_blog_sanitize_number_range',
	));
	$wp_customize->add_control('the_writers_blog_comment_form_size',	array(
		'label' => esc_html__( 'Comment Form Size','the-writers-blog' ),
		'section' => 'the_writers_blog_single_post_section',
		'type' => 'range',
		'input_attrs' => array(
			'min' => 0,
			'max' => 100,
			'step' => 1,
		),
	));

    // related post setting
    $wp_customize->add_section('the_writers_blog_related_post_section',array(
		'title'	=> __('Related Post Settings','the-writers-blog'),
		'panel' => 'the_writers_blog_panel_id',
	));	


	$wp_customize->add_setting('the_writers_blog_related_post_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_writers_blog_related_post_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','the-writers-blog'),
		'description' => "<ul><li>". esc_html__('Please explore our premium theme for additional settings and features.','the-writers-blog') ."</li></ul><a target='_blank' href='". esc_url(THE_WRITERS_BLOG_BUY_PRO) ." '>". esc_html__('Upgrade to Pro','the-writers-blog') ."</a>",
		'section'=> 'the_writers_blog_related_post_section'
	));

	$wp_customize->add_setting('the_writers_blog_related_posts',array(
		'default' => true,
		'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
	 ));
	 $wp_customize->add_control('the_writers_blog_related_posts',array(
		'type' => 'checkbox',
		'label' => __('Related Post','the-writers-blog'),
		'section' => 'the_writers_blog_related_post_section',
	 ));
 

	$wp_customize->add_setting('the_writers_blog_related_posts',array(
       'default' => true,
       'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
    ));
    $wp_customize->add_control('the_writers_blog_related_posts',array(
       'type' => 'checkbox',
       'label' => __('Related Post','the-writers-blog'),
       'section' => 'the_writers_blog_related_post_section',
    ));

	$wp_customize->add_setting( 'the_writers_blog_show_related_post', array(
        'default' => 'By Categories',
        'sanitize_callback'	=> 'the_writers_blog_sanitize_choices'
    ));
    $wp_customize->add_control( 'the_writers_blog_show_related_post', array(
        'section' => 'the_writers_blog_related_post_section',
        'type' => 'radio',
        'label' => __( 'Show Related Posts', 'the-writers-blog' ),
        'choices' => array(
            'categories'  => __(' By Categories', 'the-writers-blog'),
            'tags' => __( ' By Tags', 'the-writers-blog' ),
    )));

    $wp_customize->add_setting('the_writers_blog_change_related_post_title',array(
		'default'=> __('Related Posts','the-writers-blog'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_writers_blog_change_related_post_title',array(
		'label'	=> __('Change Related Post Title','the-writers-blog'),
		'section'=> 'the_writers_blog_related_post_section',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('the_writers_blog_change_related_posts_number',array(
		'default'=> 3,
		'sanitize_callback'	=> 'the_writers_blog_sanitize_float',
	));
	$wp_customize->add_control('the_writers_blog_change_related_posts_number',array(
		'label'	=> __('Change Related Post Number','the-writers-blog'),
		'section'=> 'the_writers_blog_related_post_section',
		'type'=> 'number',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	));
	
	$wp_customize->add_setting( 'the_writers_blog_related_post_excerpt_number',array(
		'default' =>20,
		'sanitize_callback' => 'the_writers_blog_sanitize_number_range'
	));

	$wp_customize->add_control( 'the_writers_blog_related_post_excerpt_number',	array(
		'label' => esc_html__( 'Content Limit','the-writers-blog' ),
		'section' => 'the_writers_blog_related_post_section',
		'type'        => 'range',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	//Footer
	$wp_customize->add_section( 'the_writers_blog_footer' , array(
    	'title' => __( 'Footer Section', 'the-writers-blog' ),
		'priority'   => null,
		'panel' => 'the_writers_blog_panel_id'
	) );

	$wp_customize->add_setting('the_writers_blog_footer_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('the_writers_blog_footer_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','the-writers-blog'),
		'description' => "<ul><li>". esc_html__('Please explore our premium theme for additional settings and features.','the-writers-blog') ."</li></ul><a target='_blank' href='". esc_url(THE_WRITERS_BLOG_BUY_PRO) ." '>". esc_html__('Upgrade to Pro','the-writers-blog') ."</a>",
		'section'=> 'the_writers_blog_footer'
	));

	$wp_customize->add_setting('the_writers_blog_show_hide_footer',array(
		'default' => true,
		'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
	));
	$wp_customize->add_control('the_writers_blog_show_hide_footer',array(
     	'type' => 'checkbox',
      'label' => __('Enable / Disable Footer','the-writers-blog'),
      'section' => 'the_writers_blog_footer',
	));

	$wp_customize->add_setting('the_writers_blog_footer_widget',array(
        'default'           => 4,
        'sanitize_callback' => 'the_writers_blog_sanitize_choices',
    ));
    $wp_customize->add_control('the_writers_blog_footer_widget',array(
        'type'        => 'radio',
        'label'       => __('No. of Footer widget area', 'the-writers-blog'),
        'section'     => 'the_writers_blog_footer',
        'description' => __('Select the number of footer widget areas and after that, go to Appearance > Widgets and add your widgets in the footer.', 'the-writers-blog'),
        'choices' => array(
            '1'     => __('One', 'the-writers-blog'),
            '2'     => __('Two', 'the-writers-blog'),
            '3'     => __('Three', 'the-writers-blog'),
            '4'     => __('Four', 'the-writers-blog')
        ),
    ));

    $wp_customize->add_setting( 'the_writers_blog_footer_widget_background', array(
	    'default' => '#313131',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'the_writers_blog_footer_widget_background', array(
  		'label' => __('Footer Widget Background','the-writers-blog'),
	    'section' => 'the_writers_blog_footer',
  	)));

  	$wp_customize->add_setting('the_writers_blog_footer_widget_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'the_writers_blog_footer_widget_image',array(
        'label' => __('Footer Widget Background Image','the-writers-blog'),
        'section' => 'the_writers_blog_footer'
	)));

	$wp_customize->add_setting('the_writers_blog_img_footer',array(
		'default'=> 'scroll',
		'sanitize_callback'	=> 'the_writers_blog_sanitize_choices'
	));
	$wp_customize->add_control('the_writers_blog_img_footer',array(
		'type' => 'select',
		'label'	=> __('Footer Background Attatchment','the-writers-blog'),
		'choices' => array(
            'fixed' => __('fixed','the-writers-blog'),
            'scroll' => __('scroll','the-writers-blog'),
        ),
		'section'=> 'the_writers_blog_footer',
	));

	$wp_customize->add_setting('the_writers_blog_footer_img_position',array(
		'default' => 'center center',
		'transport' => 'refresh',
		'sanitize_callback' => 'the_writers_blog_sanitize_choices'
	));
	$wp_customize->add_control('the_writers_blog_footer_img_position',array(
		'type' => 'select',
		'label' => __('Footer Image Position','the-writers-blog'),
		'section' => 'the_writers_blog_footer',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'the-writers-blog' ),
			'center top'   => esc_html__( 'Top', 'the-writers-blog' ),
			'right top'   => esc_html__( 'Top Right', 'the-writers-blog' ),
			'left center'   => esc_html__( 'Left', 'the-writers-blog' ),
			'center center'   => esc_html__( 'Center', 'the-writers-blog' ),
			'right center'   => esc_html__( 'Right', 'the-writers-blog' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'the-writers-blog' ),
			'center bottom'   => esc_html__( 'Bottom', 'the-writers-blog' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'the-writers-blog' ),
		),
	)); 

	$wp_customize->add_setting('the_writers_blog_footer_heading_option',array(
    	'default' => 'Center',
        'sanitize_callback' => 'the_writers_blog_sanitize_choices'
	));
	$wp_customize->add_control('the_writers_blog_footer_heading_option',array(
        'type' => 'select',
        'label' => __('Footer Heading Alignment','the-writers-blog'),
        'section' => 'the_writers_blog_footer',
        'choices' => array(
            'Center' => __('Center','the-writers-blog'),
            'Left' => __('Left','the-writers-blog'),
            'Right' => __('Right','the-writers-blog'),
        ),
	) );

	$wp_customize->add_setting('the_writers_blog_footer_content_option',array(
    	'default' => 'Center',
        'sanitize_callback' => 'the_writers_blog_sanitize_choices'
	));
	$wp_customize->add_control('the_writers_blog_footer_content_option',array(
        'type' => 'select',
        'label' => __('Footer Content Alignment','the-writers-blog'),
        'section' => 'the_writers_blog_footer',
        'choices' => array(
            'Center' => __('Center','the-writers-blog'),
            'Left' => __('Left','the-writers-blog'),
            'Right' => __('Right','the-writers-blog'),
        ),
	) );

	$wp_customize->add_setting('the_writers_blog_hide_show_scroll',array(
        'default' => true,
        'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
	));
	$wp_customize->add_control('the_writers_blog_hide_show_scroll',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Scroll To Top','the-writers-blog'),
      	'section' => 'the_writers_blog_footer',
	));

	$wp_customize->add_setting('the_writers_blog_scroll_icon_changer',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new the_writers_blog_Icon_Changer(
        $wp_customize,'the_writers_blog_scroll_icon_changer',array(
		'label'	=> __('Scroll To Top Icon','the-writers-blog'),
		'transport' => 'refresh',
		'section'	=> 'the_writers_blog_footer',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('the_writers_blog_footer_options',array(
        'default' => 'Right align',
        'sanitize_callback' => 'the_writers_blog_sanitize_choices'
	));
	$wp_customize->add_control('the_writers_blog_footer_options',array(
        'type' => 'select',
        'label' => __('Scroll To Top','the-writers-blog'),
        'description' => __('Here you can change the Footer layout. ','the-writers-blog'),
        'section' => 'the_writers_blog_footer',
        'choices' => array(
            'Left align' => __('Left align','the-writers-blog'),
            'Right align' => __('Right align','the-writers-blog'),
            'Center align' => __('Center align','the-writers-blog'),
        ),
	) );

	$wp_customize->add_setting('the_writers_blog_scroll_top_fontsize',array(
		'default'=> '',
		'sanitize_callback'    => 'the_writers_blog_sanitize_number_range',
	));
	$wp_customize->add_control('the_writers_blog_scroll_top_fontsize',array(
		'label'	=> __('Scroll To Top Font Size','the-writers-blog'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'the_writers_blog_footer',
		'type'=> 'range'
	));

	$wp_customize->add_setting('the_writers_blog_scroll_top_bottom_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'the_writers_blog_sanitize_float',
	));
	$wp_customize->add_control('the_writers_blog_scroll_top_bottom_padding',array(
		'label'	=> __('Scroll Top Bottom Padding ','the-writers-blog'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'the_writers_blog_footer',
		'type'=> 'number'
	));

	$wp_customize->add_setting('the_writers_blog_scroll_left_right_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'the_writers_blog_sanitize_float',
	));
	$wp_customize->add_control('the_writers_blog_scroll_left_right_padding',array(
		'label'	=> __('Scroll Left Right Padding','the-writers-blog'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'the_writers_blog_footer',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'the_writers_blog_scroll_border_radius', array(
		'default'=> '',
		'sanitize_callback'	=> 'the_writers_blog_sanitize_float',
	) );
	$wp_customize->add_control( 'the_writers_blog_scroll_border_radius', array(
		'label'       => esc_html__( 'Scroll To Top Border Radius','the-writers-blog' ),
		'section'     => 'the_writers_blog_footer',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('the_writers_blog_scroll_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'the_writers_blog_scroll_background_color', array(
		'label'    => __('Scroll To Top Background Color', 'the-writers-blog'),
		'section'  => 'the_writers_blog_footer',
	)));

	$wp_customize->add_setting('the_writers_blog_scroll_icon_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'the_writers_blog_scroll_icon_color', array(
		'label'    => __('Scroll To Top Color', 'the-writers-blog'),
		'section'  => 'the_writers_blog_footer',
	)));

	$wp_customize->add_setting('the_writers_blog_scroll_background_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'the_writers_blog_scroll_background_hover_color', array(
		'label'    => __('Scroll To Top Background Hover Color', 'the-writers-blog'),
		'section'  => 'the_writers_blog_footer',
	)));

	$wp_customize->add_setting('the_writers_blog_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('the_writers_blog_footer_text',array(
		'label'	=> __('Add Copyright Text','the-writers-blog'),
		'section'	=> 'the_writers_blog_footer',
		'setting'	=> 'the_writers_blog_footer_text',
		'type'		=> 'text'
	));

    $wp_customize->add_setting('the_writers_blog_copyright_top_bottom_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'the_writers_blog_sanitize_float',
	));
	$wp_customize->add_control('the_writers_blog_copyright_top_bottom_padding',array(
		'label'	=> __('Copyright Top and Bottom Padding','the-writers-blog'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'the_writers_blog_footer',
		'type'=> 'number'
	));

	 $wp_customize->add_setting('the_writers_blog_copyright_background_color', array(
		'default'           => '#fe0219',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'the_writers_blog_copyright_background_color', array(
		'label'    => __('Copyright Background Color', 'the-writers-blog'),
		'section'  => 'the_writers_blog_footer',
	)));

	$wp_customize->add_setting('the_writers_blog_copyright_text_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'the_writers_blog_copyright_text_color', array(
		'label'    => __('Copyright text Color', 'the-writers-blog'),
		'section'  => 'the_writers_blog_footer',
	)));

	$wp_customize->add_setting('the_writers_blog_footer_text_font_size',array(
		'default'=> 16,
		'sanitize_callback' => 'the_writers_blog_sanitize_float',
	));
	$wp_customize->add_control('the_writers_blog_footer_text_font_size',array(
		'label'	=> __('Footer Text Font Size','the-writers-blog'),
		'section'=> 'the_writers_blog_footer',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'type'=> 'number'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'the_writers_blog_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'the_writers_blog_customize_partial_blogdescription',
	) );
	//Footer Social Icons
	$wp_customize->add_section('the_writers_blog_social_icons_section',array(
		'title'	=> __('Footer Social Icons','the-writers-blog'),
		'priority'	=> null,
		'panel' => 'the_writers_blog_panel_id',
	));
	$wp_customize->selective_refresh->add_partial(
		'the_writers_blog_facebook_url',
		array(
			'selector'        => '.social-media',
			'render_callback' => 'the_writers_blog_customize_partial_the_writers_blog_facebook_url',
		)
	);
	$wp_customize->add_setting('the_writers_blog_show_footer_social_icon',array(
        'default' => true,
        'sanitize_callback'	=> 'the_writers_blog_sanitize_checkbox'
	));
	$wp_customize->add_control('the_writers_blog_show_footer_social_icon',array(
     	'type' => 'checkbox',
      	'label' => __('Show/Hide Social Icons','the-writers-blog'),
      	'section' => 'the_writers_blog_social_icons_section',
	));
	$wp_customize->add_setting('the_writers_blog_footer_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('the_writers_blog_footer_facebook_url',array(
		'label'	=> __('Add Facebook URL','the-writers-blog'),
		'section'	=> 'the_writers_blog_social_icons_section',
		'setting'	=> 'the_writers_blog_footer_facebook_url',
		'type'	=> 'url'
	));
	$wp_customize->add_setting('the_writers_blog_footer_facebook_icon',array(
		'default'	=> 'fab fa-facebook-f',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new The_Writers_Blog_Icon_Changer(
		$wp_customize,'the_writers_blog_footer_facebook_icon',array(
		'label'	=> __('Add Facebook Icon','the-writers-blog'),
		'transport' => 'refresh',
		'section'	=> 'the_writers_blog_social_icons_section',
		'setting'	=> 'the_writers_blog_footer_facebook_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('the_writers_blog_footer_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('the_writers_blog_footer_twitter_url',array(
		'label'	=> __('Add Twitter URL','the-writers-blog'),
		'section'	=> 'the_writers_blog_social_icons_section',
		'setting'	=> 'the_writers_blog_footer_twitter_url',
		'type'	=> 'url'
	));
	$wp_customize->add_setting('the_writers_blog_footer_twitter_icon',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new The_Writers_Blog_Icon_Changer(
		$wp_customize,'the_writers_blog_footer_twitter_icon',array(
		'label'	=> __('Add Twitter Icon','the-writers-blog'),
		'transport' => 'refresh',
		'section'	=> 'the_writers_blog_social_icons_section',
		'setting'	=> 'the_writers_blog_footer_twitter_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('the_writers_blog_footer_instagram_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('the_writers_blog_footer_instagram_url',array(
		'label'	=> __('Add Instagram URL','the-writers-blog'),
		'section'	=> 'the_writers_blog_social_icons_section',
		'setting'	=> 'the_writers_blog_footer_instagram_url',
		'type'	=> 'url'
	));
	$wp_customize->add_setting('the_writers_blog_footer_instagram_icon',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new The_Writers_Blog_Icon_Changer(
		$wp_customize,'the_writers_blog_footer_instagram_icon',array(
		'label'	=> __('Add Instagram Icon','the-writers-blog'),
		'transport' => 'refresh',
		'section'	=> 'the_writers_blog_social_icons_section',
		'setting'	=> 'the_writers_blog_footer_instagram_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('the_writers_blog_footer_linkedin_url',array(
        'default' => '',
        'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('the_writers_blog_footer_linkedin_url',array(
     	'type' => 'url',
	   	'label' => __('Add Linkedin URL','the-writers-blog'),
	   	'section' => 'the_writers_blog_social_icons_section',
	));

	$wp_customize->add_setting('the_writers_blog_footer_linkedin_icon',array(
		'default'	=> 'fab fa-linkedin',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new The_Writers_Blog_Icon_Changer(
        $wp_customize,'the_writers_blog_footer_linkedin_icon',array(
		'label'	=> __('Add Linkedin Icon','the-writers-blog'),
		'transport' => 'refresh',
		'section'	=> 'the_writers_blog_social_icons_section',
		'setting'	=> 'the_writers_blog_linkedin_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('the_writers_blog_footer_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('the_writers_blog_footer_youtube_url',array(
		'label'	=> __('Add Youtube link','the-writers-blog'),
		'section'	=> 'the_writers_blog_social_icons_section',
		'setting'	=> 'the_writers_blog_youtube_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('the_writers_blog_footer_youtube_icon',array(
		'default'	=> 'fab fa-youtube',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new The_Writers_Blog_Icon_Changer(
        $wp_customize,'the_writers_blog_footer_youtube_icon',array(
		'label'	=> __('Youtube Icon','the-writers-blog'),
		'transport' => 'refresh',
		'section'	=> 'the_writers_blog_social_icons_section',
		'type'		=> 'icon'
	)));	
	$wp_customize->add_setting( 'the_writers_blog_footer_icon_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'the_writers_blog_sanitize_float',
	) );
	$wp_customize->add_control( 'the_writers_blog_footer_icon_font_size', array(
		'label' => __( 'Icon Font Size','the-writers-blog' ),
		'section'     => 'the_writers_blog_social_icons_section',
		'type'        => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 50,
		),
	) );	
	
}
add_action( 'customize_register', 'the_writers_blog_customize_register' );

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since The Writers Blog 1.0
 * @see the-writers-blog_customize_register()
 *
 * @return void
 */
function the_writers_blog_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since The Writers Blog 1.0
 * @see the-writers-blog_customize_register()
 *
 * @return void
 */
function the_writers_blog_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Return whether we're on a view that supports a one or two column layout.
 */
function the_writers_blog_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'footer-1' ) ) );
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class The_Writers_Blog_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'The_Writers_Blog_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new The_Writers_Blog_Customize_Section_Pro(
				$manager,
				'the_writers_blog_example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__( 'BUY ALL THEMES IN ONE PACKAGE', 'the-writers-blog' ),
					'pro_text' => esc_html__( 'Get All Themes', 'the-writers-blog' ),
					'pro_url'  => esc_url('https://www.themeseye.com/wordpress/wp-theme-bundle/'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'the-writers-blog-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'the-writers-blog-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
The_Writers_Blog_Customize::get_instance();