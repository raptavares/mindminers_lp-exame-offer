<?php
	add_action( 'init', 'nt_landium_custom_theme_options' );
	function nt_landium_custom_theme_options() {
	 
	if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
	return false;

	$nt_landium_saved_settings = get_option( ot_settings_id(), array() );
	$nt_landium_custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
	
	'sections'        => array( 
		array(
			'id'          => 'generalcolor',
			'title'       => esc_html__( 'General Color', 'nt-landium' ),
		),
		array(
			'id'          => 'general',
			'title'       => esc_html__( 'Logo', 'nt-landium' ),
		),  
		  array(
			'id'          => 'pre',
			'title'       => esc_html__( 'Preloader', 'nt-landium' ),
		), 
		array(
			'id'          => 'navigation',
			'title'       => esc_html__( 'Navigation', 'nt-landium' ),
		), 
		array(
			'id'          => 'sidebars',
			'title'       => esc_html__( 'Sidebar Type', 'nt-landium' ),
		),
		array(
			'id'          => 'sidebars_settings',
			'title'       => esc_html__( 'Sidebar Color', 'nt-landium' ),
		),
		array(
			'id'          => 'header',
			'title'       => esc_html__( 'Blog/Page Header', 'nt-landium' ),
		),
		array(
			'id'          => 'header_color',
			'title'       => esc_html__( 'Blog/Page Header Color', 'nt-landium' ),
		),	  
		array(
			'id'          => 'post_color',
			'title'       => esc_html__( 'Blog Post Color', 'nt-landium' ),
		),

		array(
			'id'          => 'single_header',
			'title'       => esc_html__( 'Single Page', 'nt-landium' ),
		),
		array(
			'id'          => 'archive_page',
			'title'       => esc_html__( 'Archive Page', 'nt-landium' ),
		),
		array(
			'id'          => 'error_page',
			'title'       => esc_html__( '404 Page', 'nt-landium' ),
		),
		array(
			'id'          => 'search_page',
			'title'       => esc_html__( 'Search Page', 'nt-landium' ),
		),	  
		array(
			'id'          => 'breadcrubms',
			'title'       => esc_html__( 'Blog/Page Breadcrubms Options', 'nt-landium' ),
		),	  
		array(
			'id'          => 'copyright',
			'title'       => esc_html__( 'Footer', 'nt-landium' ),
		),	  
		array(
			'id'          => 'copyright_c',
			'title'       => esc_html__( 'Footer Copyright', 'nt-landium' ),
		),	  
		array(
			'id'          => 'copyright_n',
			'title'       => esc_html__( 'Footer Newsletter', 'nt-landium' ),
		),  
		array(
			'id'          => 'copyright_con',
			'title'       => esc_html__( 'Footer Contact', 'nt-landium' ),
		),	  
		array(
			'id'          => 'copyright_s',
			'title'       => esc_html__( 'Footer Social', 'nt-landium' ),
		),
		array(
			'id'          => 'copyright_color',
			'title'       => esc_html__( 'Footer Color', 'nt-landium' ),
		),
		array(
			'id'          => 'maps',
			'title'       => esc_html__( 'Google maps settings', 'nt-landium' ),
		),
	), // sidebar end
	
// options start
'settings'        => array( 

		array(
			'id'          => 'nt_landium_theme_color',
			'label'       => esc_html__('Theme Color', 'nt-landium' ),
			'desc'        => esc_html__('Choose theme general color', 'nt-landium' ),
			'std'         => '#3c83cb',
			'type'        => 'select',
			'section'     => 'generalcolor',
			'operator'    => 'and',
			'choices'     => array( 
				array(
					'value'       => '#3c83cb',
					'label'       => esc_html__('Blue', 'nt-landium' ),
					'src'         => ''
				),
				array(
					'value'       => '#44d86e',
					'label'       => esc_html__('Green', 'nt-landium' ),
					'src'         => ''
				),
				array(
					'value'       => '#fb53c2',
					'label'       => esc_html__('Pink', 'nt-landium' ),
					'src'         => ''
				),
				array(
					'value'       => '#c95ef5',
					'label'       => esc_html__('Purple', 'nt-landium' ),
					'src'         => ''
				),
				array(
					'value'       => '#ff7469',
					'label'       => esc_html__('Red', 'nt-landium' ),
					'src'         => ''
				),
				array(
					'value'       => '#f7b943',
					'label'       => esc_html__('Yellow', 'nt-landium' ),
					'src'         => ''
				),
				array(
					'value'       => 'custom',
					'label'       => esc_html__('Custom Color', 'nt-landium' ),
					'src'         => ''
				),

			)
		),
		array(
			'id'          => 'nt_landium_theme_color_one',
			'label'       => esc_html__( 'Theme general color 1', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_landium_theme_color:is(custom)',
			'section'     => 'generalcolor'
		),
		array(
			'id'          => 'nt_landium_theme_color_two',
			'label'       => esc_html__( 'Theme general link color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_landium_theme_color:is(custom)',
			'section'     => 'generalcolor'
		),
		array(
			'id'          => 'nt_landium_theme_color_three',
			'label'       => esc_html__( 'Theme general link hover color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_landium_theme_color:is(custom)',
			'section'     => 'generalcolor'
		),

		/*** GENERAL SETTINGS. **/
		array(
			'id'          => 'nt_landium_logo_type',
			'label'       => esc_html__('Logo Type', 'nt-landium' ),
			'desc'        => esc_html__('Choose logo type', 'nt-landium' ),
			'std'         => 'text',
			'type'        => 'select',
			'section'     => 'general',
			'operator'    => 'and',
			'choices'     => array( 
					array(
					'value'       => 'img',
					'label'       => esc_html__('Image Logo', 'nt-landium' ),
					'src'         => ''
				),
				array(
					'value'       => 'text',
					'label'       => esc_html__('Text Logo', 'nt-landium' ),
					'src'         => ''
				)
			)
		),
		//img logo
		array(
			'id'          => 'nt_landium_logoimg',
			'label'       => 'Upload logo image',
			'desc'        => 'Upload logo image',
			'type'        => 'upload',
			'condition'   => 'nt_landium_logo_type:is(img)',
			'section'     => 'general'
		),
		array(
			'id'          => 'nt_landium_logo_dimension',
			'label'       => esc_html__( 'Logo image width and height', 'nt-landium' ),
			'desc'        => esc_html__( 'The Dimension option type is used to set width and height values.', 'nt-landium' ),
			'type'        => 'dimension',
			'condition'   => 'nt_landium_logo_type:is(img)',
			'section'     => 'general',
			'operator'    => 'and'
		),
		//text logo
		array(
			'id'          => 'nt_landium_textlogo',
			'label'       => 'Text logo',
			'desc'        => 'Text logo',
			'std'         => 'Landium',
			'type'        => 'text',
			'condition'   => 'nt_landium_logo_type:is(text)',
			'section'     => 'general'
		),
		array(
			'id'          => 'nt_landium_staticlogo_color',
			'label'       => esc_html__( 'Static Text Logo color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color for static menu text logo', 'nt-landium' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_landium_logo_type:is(text)',
			'section'     => 'general'
		),
		array(
			'id'          => 'nt_landium_stickylogo_color',
			'label'       => esc_html__( 'Sticky Text Logo color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color for sticky menu text logo', 'nt-landium' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_landium_logo_type:is(text)',
			'section'     => 'general'
		),
		array(
			'id'          => 'nt_landium_textlogo_hovercolor',
			'label'       => esc_html__( 'Text Logo hover color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color for menu text logo hover color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_landium_logo_type:is(text)',
			'section'     => 'general'
		),
		array(
			'id'          => 'nt_landium_textlogo_fs',
			'label'       => esc_html__('Font size', 'nt-landium' ),
			'desc'        => esc_html__('Font size for text logo', 'nt-landium' ),
			'std'         => '36',
			'type'        => 'numeric-slider',
			'condition'   => 'nt_landium_logo_type:is(text)',
			'min_max_step'=> '0,100',
			'section'     => 'general',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_textlogo_fw',
			'label'       => esc_html__('Font weight', 'nt-landium' ),
			'desc'        => esc_html__('Font weight for text logo', 'nt-landium' ),
			'std'         => '700',
			'type'        => 'numeric-slider',
			'condition'   => 'nt_landium_logo_type:is(text)',
			'min_max_step'=> '100,900,100',
			'section'     => 'general',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_textlogo_lettersp',
			'label'       => esc_html__('Letter spacing', 'nt-landium' ),
			'desc'        => esc_html__('Letter spacing for text logo', 'nt-landium' ),
			'std'         => '0',
			'type'        => 'numeric-slider',
			'condition'   => 'nt_landium_logo_type:is(text)',
			'min_max_step'=> '0,10',
			'section'     => 'general',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_textlogo_fstyle',
			'label'       => esc_html__('Font style', 'nt-landium' ),
			'desc'        => esc_html__('Choose font style for text logo', 'nt-landium' ),
			'std'         => 'normal',
			'type'        => 'select',
			'section'     => 'general',
			'condition'   => 'nt_landium_logo_type:is(text)',
			'operator'    => 'and',
			'choices'     => array( 
				array(
					'value'       => 'normal',
					'label'       => esc_html__('Normal', 'nt-landium' ),
					'src'         => ''
				),
				array(
					'value'       => 'italic',
					'label'       => esc_html__('Italic', 'nt-landium' ),
					'src'         => ''
				)
			)
		),
		array(
			'id'          => 'nt_landium_margin_logo',
			'label'       => esc_html__( 'Logo margin values', 'nt-landium' ),
			'desc'        => esc_html__( 'Logo margin in the form of top, right, bottom, and left.', 'nt-landium' ),
			'type'        => 'spacing',
			'section'     => 'general',
			'operator'    => 'and'
		),	
		array(
			'id'          => 'nt_landium_padding_logo',
			'label'       => esc_html__( 'Logo padding values', 'nt-landium' ),
			'desc'        => esc_html__( 'Logo padding in the form of top, right, bottom, and left.', 'nt-landium' ),
			'type'        => 'spacing',
			'section'     => 'general',
			'operator'    => 'and'
		),

		//PRELOADER
		array(
			'id'          => 'nt_landium_pre',
			'label'       => esc_html__( 'Preloader', 'nt-landium' ),
			'desc'        => sprintf( esc_html__( 'Preloader visibility %s or %s.', 'nt-landium' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'pre',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_type',
			'label'       => esc_html__( 'Select preloader type', 'nt-landium' ),
			'desc'        => esc_html__( 'Loader types', 'nt-landium' ),
			'type'        => 'select',
			'section'     => 'pre',
			'operator'    => 'and',
			'choices'     => array( 
				array(
					'value'       => '0',
					'label'       => esc_html__( 'Select preloader type', 'nt-landium' )
				),
				array(
					'value'       => '1',
					'label'       => esc_html__( '1', 'nt-landium' )
				),
				array(
					'value'       => '2',
					'label'       => esc_html__( '2', 'nt-landium' )
				),
				array(
					'value'       => '3',
					'label'       => esc_html__( '3', 'nt-landium' )
				),
				array(
					'value'       => '4',
					'label'       => esc_html__( '4', 'nt-landium' )
				),
				array(
					'value'       => '5',
					'label'       => esc_html__( '5', 'nt-landium' )
				),
				array(
					'value'       => '6',
					'label'       => esc_html__( '6', 'nt-landium' )
				),
				array(
					'value'   => 'custom',
					'label'   => esc_html__( 'Custom Preloader', 'nt-landium' )
				)
			)
		),
		//CUSTOM PRELOADER
		array(
			'id'          => 'nt_landium_custom_preloader',
			'label'       => esc_html__( 'Custom preloader html area', 'nt-landium' ),
			'desc'        => esc_html__('Add your custom preloader html', 'nt-landium' ),
			'type'        => 'textarea',
			'rows'        => '15',
			'condition'   => 'nt_landium_pre:is(on),nt_landium_type:is(custom)',
			'section'     => 'pre',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_preloadercss',
			'label'       => esc_html__( 'Custom preloader CSS', 'nt-landium' ),
			'desc'        => esc_html__('You can add additional css for custom preloader', 'nt-landium' ),
			'type'        => 'css',
			'condition'   => 'nt_landium_pre:is(on),nt_landium_type:is(custom)',
			'section'     => 'pre',
			'rows'        => '20',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_custom_preloader_js',
			'label'       => esc_html__( 'Use custom javascript ?', 'nt-landium' ),
			'desc'        => sprintf( esc_html__( 'You can use custom javascript for your custom preloader class or ID name. %s or %s.', 'nt-landium' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'off',
			'type'        => 'on-off',
			'condition'   => 'nt_landium_pre:is(on),nt_landium_type:is(custom)',
			'section'     => 'pre',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_preloaderjs',
			'label'       => esc_html__( 'Custom preloader JS', 'nt-landium' ),
			'desc'        => esc_html__('You can add additional javascript function for your custom preloader', 'nt-landium' ),
			'type'        => 'javascript',
			'condition'   => 'nt_landium_pre:is(on),nt_landium_type:is(custom),nt_landium_custom_preloader_js:is(on)',
			'section'     => 'pre',
			'rows'        => '20',
			'operator'    => 'and'
		),

		/**  NAVIGATION SETTINGS.  **/
		array(
			'id'          => 'nt_landium_nav_bg',
			'label'       => esc_html__( 'Theme navigation background color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'navigation'
		),
		array(
			'id'          => 'nt_landium_nav_fixed_bg',
			'label'       => esc_html__( 'Theme navigation fixed type background color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'navigation'
		),
		array(
			'id'          => 'nt_landium_navitem',
			'label'       => esc_html__( 'Theme navigation menu item color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'navigation'
		),
		array(
			'id'          => 'nt_landium_navitemhover',
			'label'       => esc_html__( 'Theme navigation menu item hover color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'navigation'
		),
		array(
			'id'          => 'nt_landium_dropdown_bg',
			'label'       => esc_html__( 'Theme navigation dropdown background color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'navigation'
		),
		array(
			'id'          => 'nt_landium_dropdown_item',
			'label'       => esc_html__( 'Theme navigation dropdown menu item color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'navigation'
		),
		array(
			'id'          => 'nt_landium_dropdown_itemhover',
			'label'       => esc_html__( 'Theme navigation dropdown menu item hover color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'navigation'
		),

		/**  SIDEBAR TYPE SETTINGS.  **/
		array(
			'id'          => 'nt_landium_bloglayout',
			'label'       => esc_html__( 'Blog Layout', 'nt-landium' ),
			'desc'        => esc_html__( 'Choose blog page layout type', 'nt-landium' ),
			'std'         => 'right-sidebar',
			'type'        => 'radio-image',
			'section'     => 'sidebars',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_pagelayout',
			'label'       => esc_html__( 'Default Page Layout', 'nt-landium' ),
			'desc'        => esc_html__( 'Choose default page layout type', 'nt-landium' ),
			'std'         => 'right-sidebar',
			'type'        => 'radio-image',
			'section'     => 'sidebars',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_searchlayout',
			'label'       => esc_html__( 'Search page Layout', 'nt-landium' ),
			'desc'        => esc_html__( 'Choose search page layout type', 'nt-landium' ),
			'std'         => 'right-sidebar',
			'type'        => 'radio-image',
			'section'     => 'sidebars',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_postlayout',
			'label'       => esc_html__( 'Blog single page layout', 'nt-landium' ),
			'desc'        => esc_html__( 'Choose post page layout type', 'nt-landium' ),
			'std'         => 'right-sidebar',
			'type'        => 'radio-image',
			'section'     => 'sidebars',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_archivelayout',
			'label'       => esc_html__( 'archive page layout', 'nt-landium' ),
			'desc'        => esc_html__( 'Choose archive page layout type', 'nt-landium' ),
			'std'         => 'right-sidebar',
			'type'        => 'radio-image',
			'section'     => 'sidebars',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_404layout',
			'label'       => esc_html__( '404 page layout', 'nt-landium' ),
			'desc'        => esc_html__( 'Choose 404 page layout type', 'nt-landium' ),
			'std'         => 'right-sidebar',
			'type'        => 'radio-image',
			'section'     => 'sidebars',
			'operator'    => 'and'
		),
		array(
			'id'          => 'woosingle',
			'label'       => esc_html__( 'Woocommerce single page layout', 'nt-landium' ),
			'desc'        => esc_html__( 'Choose Woocommerce single page layout type', 'nt-landium' ),
			'std'         => 'right-sidebar',
			'type'        => 'radio-image',
			'section'     => 'sidebars',
			'operator'    => 'and'
		),
		array(
			'id'          => 'woopage',
			'label'       => esc_html__( 'Woocommerce  page layout', 'nt-landium' ),
			'desc'        => esc_html__( 'Choose 404 page layout type', 'nt-landium' ),
			'std'         => 'right-sidebar',
			'type'        => 'radio-image',
			'section'     => 'sidebars',
			'operator'    => 'and'
		),

		/**  SIDEBAR SETTINGS.  **/	
		array(
			'id'          => 'nt_landium_sb_bg',
			'label'       => esc_html__('Theme Sidebar widget area background color', 'nt-landium' ),
			'desc'        => esc_html__('Please select color', 'nt-landium' ),
			'type'        => 'colorpicker-opacity',
			'section'     => 'sidebars_settings',
			'operator'    => 'and'
		),	  
	    array(
			'id'          => 'nt_landium_sb_bg',
			'label'       => esc_html__( 'Theme Sidebar widget area background color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'sidebars_settings'
		),
	    array(
			'id'          => 'nt_landium_sb_c',
			'label'       => esc_html__( 'Theme Sidebar widget general color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'sidebars_settings'
		),
		array(
			'id'          => 'nt_landium_sb_t_c',
			'label'       => esc_html__( 'Theme Sidebar widget title color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'sidebars_settings'
		),
 		array(
			'id'          => 'nt_landium_sb_l_c',
			'label'       => esc_html__( 'Theme Sidebar link title color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'sidebars_settings'
		),
 		array(
			'id'          => 'nt_landium_sb_l_c_h',
			'label'       => esc_html__( 'Theme Sidebar link title hover color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'sidebars_settings'
		),
  		array(
			'id'          => 'nt_landium_sb_s_t',
			'label'       => esc_html__( 'Theme Sidebar search submit text color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'sidebars_settings'
		),   
      	array(
			'id'          => 'nt_landium_sb_s_bg',
			'label'       => esc_html__( 'Theme Sidebar search submit background color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'sidebars_settings'
		),

		/**  POST SETTINGS.  **/
      	array(
			'id'          => 'nt_landium_blogposttitlecolor',
			'label'       => esc_html__( 'Blog Post Title color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
      	array(
			'id'          => 'nt_landium_blogposttitlhoverecolor',
			'label'       => esc_html__( 'Blog Post Title hover color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
      	array(
			'id'          => 'nt_landium_blogmetacolor',
			'label'       => esc_html__( 'Blog Post Meta Title color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
      	array(
			'id'          => 'nt_landium_blogmetalinktextcolor',
			'label'       => esc_html__( 'Blog Post Meta Link Text color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
      	array(
			'id'          => 'nt_landium_blogmetalinkhovercolor',
			'label'       => esc_html__( 'Blog Post Meta Link Text hover color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
      	array(
			'id'          => 'nt_landium_blogmetalinktextbgcolor',
			'label'       => esc_html__( 'Blog Post Meta Link Text background color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
      	array(
			'id'          => 'nt_landium_blogmetalinktextbghovercolor',
			'label'       => esc_html__( 'Blog Post Meta Link Text background hover color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
      	array(
			'id'          => 'nt_landium_blogpostparagraphcolor',
			'label'       => esc_html__( 'Blog Post Paragraph color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
     	array(
			'id'          => 'nt_landium_blogpostbuttonbgcolor',
			'label'       => esc_html__( 'Blog Post button background color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
     	array(
			'id'          => 'nt_landium_blogpostbuttonbghovercolor',
			'label'       => esc_html__( 'Blog Post button background hover color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
     	array(
			'id'          => 'nt_landium_blogpostbuttontitlecolor',
			'label'       => esc_html__( 'Blog Post button title color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
     	array(
			'id'          => 'nt_landium_blogpostbuttontitlehovercolor',
			'label'       => esc_html__( 'Blog Post button title hover color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
       	array(
			'id'          => 'nt_landium_blogsharebgcolor',
			'label'       => esc_html__( 'Blog Post Share Icon background color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
      	array(
			'id'          => 'nt_landium_blogsharebghovercolor',
			'label'       => esc_html__( 'Blog Post Share Icon background hover color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
       	array(
			'id'          => 'nt_landium_blogsharecolor',
			'label'       => esc_html__( 'Blog Post Share Icon color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
       	array(
			'id'          => 'nt_landium_blogsharehovercolor',
			'label'       => esc_html__( 'Blog Post Share Icon hover color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
		array(
			'id'          => 'nt_landium_blogcommentformsubmitcolor',
			'label'       => esc_html__( 'Single post comment button title color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
		array(
			'id'          => 'nt_landium_blogcommentformsubmithovercolor',
			'label'       => esc_html__( 'Single post comment button title hover color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
		array(
			'id'          => 'nt_landium_blogcommentformsubmitbgcolor',
			'label'       => esc_html__( 'Single post comment button background color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
		array(
			'id'          => 'nt_landium_blogcommentformsubmitbghovercolor',
			'label'       => esc_html__( 'Single post comment button background hover color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
		array(
			'id'          => 'nt_landium_pagertitlecolor',
			'label'       => esc_html__( 'Pager button title color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
		array(
			'id'          => 'nt_landium_pagertitlehovercolor',
			'label'       => esc_html__( 'Pager button title hover color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
		array(
			'id'          => 'nt_landium_pagerbgcolor',
			'label'       => esc_html__( 'Pager button background color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),
		array(
			'id'          => 'nt_landium_pagerbghovercolor',
			'label'       => esc_html__( 'Pager button background hover color', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'post_color'
		),

		/**  BLOG/PAGE HEADER SETTINGS.  **/
		array(
			'id'          => 'nt_landium_blog_mask_v',
			'label'       => esc_html__( 'Blog header background overlay mask visibility', 'nt-landium' ),
			'desc'        => sprintf( esc_html__( 'Blog header background overlay mask  %s or %s.', 'nt-landium' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_blog_mask_c',
			'label'       => esc_html__( 'Blog header background overlay mask color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_landium_blog_mask_v:is(on)',
			'section'     => 'header'
		),
		array(
			'id'          => 'nt_landium_blog_h_bg',
			'label'       =>  esc_html__( 'Blog page header section background image', 'nt-landium' ),
			'desc'        =>  esc_html__( 'You can upload your image for parallax header', 'nt-landium' ),
			'type'        => 'upload',
			'section'     => 'header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_blogheaderbgcolor',
			'label'       => esc_html__( 'Blog Pages Header Section background color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker-opacity',
			'section'     => 'header'
		),
		array(
			'id'          => 'nt_landium_blog_h_h',
			'label'       => esc_html__('Blog Pages Header height', 'nt-landium' ),
			'desc'        => esc_html__('Blog Pages Header height', 'nt-landium' ),
			'std'         => '50',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'section'     => 'header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_blog_h_p',
			'label'       => esc_html__('Blog page header padding', 'nt-landium' ),
			'desc'        => esc_html__('You can use this option for heading text vertical align', 'nt-landium' ),
			'type'        => 'spacing',
			'section'     => 'header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_blogheaderpaddingbottom',
			'label'       => esc_html__('Header padding bottom', 'nt-landium' ),
			'desc'        => esc_html__('You can use this option for heading text vertical align', 'nt-landium' ),
			'std'         => '200',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,500',
			'section'     => 'header',
			'operator'    => 'and'
		),

		/**  BLOG/PAGE HEADING COLOR SETTINGS.  **/
		array(
			'id'          => 'nt_landium_blog_h_c',
			'label'       => esc_html__( 'Blog pages heading color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'header_color'
		),
		array(
			'id'          => 'nt_landium_blog_sub_h_c',
			'label'       => esc_html__( 'Blog pages subtitle color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'header_color'
		),

		/**  SINGLE HEADER SETTINGS.  **/
		array(
			'id'          => 'nt_landium_single_mask_v',
			'label'       => esc_html__( 'Single header background overlay mask visibility', 'nt-landium' ),
			'desc'        => sprintf( esc_html__( 'Single header background overlay mask  %s or %s.', 'nt-landium' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_single_mask_c',
			'label'       => esc_html__( 'Single header background overlay mask color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_landium_single_mask_v:is(on)',
			'section'     => 'single_header'
		),
		array(
			'id'          => 'nt_landium_singlepageheadbg',
			'label'       =>  esc_html__( 'Single Header Section background image', 'nt-landium' ),
			'desc'        =>  esc_html__( 'You can upload your image for parallax header', 'nt-landium' ),
			'type'        => 'upload',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_singleheaderbgcolor',
			'label'       => esc_html__( 'Single Pages Header Section background color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'single_header'
		),
		array(
			'id'          => 'nt_landium_singleheaderbgheight',
			'label'       => esc_html__('Single Pages Header height', 'nt-landium' ),
			'desc'        => esc_html__('Single Pages Header height', 'nt-landium' ),
			'std'         => '50',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_singleheaderpaddingtop',
			'label'       => esc_html__('Header padding top', 'nt-landium' ),
			'desc'        => esc_html__('You can use this option for heading text vertical align', 'nt-landium' ),
			'std'         => '250',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,500',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_singleheaderpaddingbottom',
			'label'       => esc_html__('Header padding bottom', 'nt-landium' ),
			'desc'        => esc_html__('You can use this option for heading text vertical align', 'nt-landium' ),
			'std'         => '200',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,500',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_single_disable_heading',
			'label'       => esc_html__( 'Single pages heading post title visibility', 'nt-landium' ),
			'desc'        => sprintf( esc_html__( 'Please select single pages heading post title  visibility %s or %s.', 'nt-landium' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_singleheadingcolor',
			'label'       => esc_html__( 'Single Pages Heading color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_landium_single_disable_heading:is(on)',
			'section'     => 'single_header'
		),
		array(
			'id'          => 'nt_landium_single_heading_fontsize',
			'label'       => esc_html__('Single Heading font size', 'nt-landium' ),
			'desc'        => esc_html__('Enter Single Heading font size', 'nt-landium' ),
			'std'         => '65',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'condition'   => 'nt_landium_single_disable_heading:is(on)',
			'section'     => 'single_header',
			'operator'    => 'and'
		),

		/**  ARCHIVE HEADER SETTINGS.  **/
		array(
			'id'          => 'nt_landium_archive_mask_v',
			'label'       => esc_html__( 'Archive header background overlay mask visibility', 'nt-landium' ),
			'desc'        => sprintf( esc_html__( 'Archive header background overlay mask  %s or %s.', 'nt-landium' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'archive_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_archive_mask_c',
			'label'       => esc_html__( 'Archive header background overlay mask color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_landium_archive_mask_v:is(on)',
			'section'     => 'archive_page'
		),
		array(
			'id'          => 'nt_landium_archivepageheadbg',
			'label'       =>  esc_html__( 'Archive Header Section background image', 'nt-landium' ),
			'desc'        =>  esc_html__( 'You can upload your image for parallax header', 'nt-landium' ),
			'type'        => 'upload',
			'section'     => 'archive_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_archiveheaderbgcolor',
			'label'       => esc_html__( 'Archive Pages Header Section background color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'archive_page'
		),
		array(
			'id'          => 'nt_landium_archiveheaderbgheight',
			'label'       => esc_html__('Archive Pages Header height', 'nt-landium' ),
			'desc'        => esc_html__('Archive Pages Header height', 'nt-landium' ),
			'std'         => '50',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'section'     => 'archive_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_archiveheaderpaddingtop',
			'label'       => esc_html__('Header padding top', 'nt-landium' ),
			'desc'        => esc_html__('You can use this option for heading text vertical align', 'nt-landium' ),
			'std'         => '250',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,500',
			'section'     => 'archive_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_archiveheaderpaddingbottom',
			'label'       => esc_html__('Header padding bottom', 'nt-landium' ),
			'desc'        => esc_html__('You can use this option for heading text vertical align', 'nt-landium' ),
			'std'         => '200',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,500',
			'section'     => 'archive_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_archive_heading_visibility',
			'label'       => esc_html__( 'Archive Heading visibility', 'nt-landium' ),
			'desc'        => sprintf( esc_html__( 'Archive Heading visibility %s or %s.', 'nt-landium' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'archive_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_archive_heading',
			'label'       => esc_html__( 'Archive Heading', 'nt-landium' ),
			'desc'        => esc_html__( 'Enter Archive Heading', 'nt-landium' ),
			'std'         => 'Our Archive',
			'type'        => 'text',
			'condition'   => 'nt_landium_archive_heading_visibility:is(on)',
			'section'     => 'archive_page'
		),
		array(
			'id'          => 'nt_landium_archive_heading_fontsize',
			'label'       => esc_html__('Archive Heading font size', 'nt-landium' ),
			'desc'        => esc_html__('Enter Archive Heading font size', 'nt-landium' ),
			'std'         => '65',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'condition'   => 'nt_landium_archive_heading_visibility:is(on)',
			'section'     => 'archive_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_archiveheadingcolor',
			'label'       => esc_html__( 'Archive Pages Heading color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_landium_archive_heading_visibility:is(on)',
			'section'     => 'archive_page'
		),
		array(
			'id'          => 'nt_landium_archive_slogan_visibility',
			'label'       => esc_html__( 'Archive Heading visibility', 'nt-landium' ),
			'desc'        => sprintf( esc_html__( 'Archive slogan visibility %s or %s.', 'nt-landium' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'archive_page',
			'operator'    => 'and'
		),  
		array(
			'id'          => 'nt_landium_archive_slogan',
			'label'       => esc_html__( 'Archive Slogan', 'nt-landium' ),
			'desc'        => esc_html__( 'Enter Archive Slogan', 'nt-landium' ),
			'std'         => 'Welcome to your Archive. This is your all post. Edit or delete them, then start writing!',
			'type'        => 'text',
			'condition'   => 'nt_landium_archive_slogan_visibility:is(on)',
			'section'     => 'archive_page'
		),
		array(
			'id'          => 'nt_landium_archiveheaderparagraphcolor',
			'label'       => esc_html__( 'Archive Pages paragraph/slogan color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_landium_archive_slogan_visibility:is(on)',
			'section'     => 'archive_page'
		),

		/**  404 PAGE HEADER SETTINGS.  **/
		array(
			'id'          => 'nt_landium_error_mask_v',
			'label'       => esc_html__( '404 header background overlay mask visibility', 'nt-landium' ),
			'desc'        => sprintf( esc_html__( '404 header background overlay mask  %s or %s.', 'nt-landium' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'error_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_error_mask_c',
			'label'       => esc_html__( '404 header background overlay mask color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_landium_error_mask_v:is(on)',
			'section'     => 'error_page'
		),
		array(
			'id'          => 'nt_landium_errorpageheadbg',
			'label'       =>  esc_html__( '404 Header Section background image', 'nt-landium' ),
			'desc'        =>  esc_html__( 'You can upload your image for parallax header', 'nt-landium' ),
			'type'        => 'upload',
			'section'     => 'error_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_errorheaderbgcolor',
			'label'       => esc_html__( '404 Pages Header Section background color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'error_page'
		),
		array(
			'id'          => 'nt_landium_errorheaderbgheight',
			'label'       => esc_html__('404 Pages Header height', 'nt-landium' ),
			'desc'        => esc_html__('404 Pages Header height', 'nt-landium' ),
			'std'         => '50',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'section'     => 'error_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_errorheaderpaddingtop',
			'label'       => esc_html__('Header padding top', 'nt-landium' ),
			'desc'        => esc_html__('You can use this option for heading text vertical align', 'nt-landium' ),
			'std'         => '250',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,500',
			'section'     => 'error_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_errorheaderpaddingbottom',
			'label'       => esc_html__('Header padding bottom', 'nt-landium' ),
			'desc'        => esc_html__('You can use this option for heading text vertical align', 'nt-landium' ),
			'std'         => '200',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,500',
			'section'     => 'error_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_error_heading_visibility',
			'label'       => esc_html__( '404 Page Heading visibility', 'nt-landium' ),
			'desc'        => sprintf( esc_html__( 'error Heading visibility %s or %s.', 'nt-landium' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'error_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_error_heading',
			'label'       => esc_html__( '404 Page Heading', 'nt-landium' ),
			'desc'        => esc_html__( 'Enter Error Heading', 'nt-landium' ),
			'std'         => '404 Page',
			'type'        => 'text',
			'condition'   => 'nt_landium_error_heading_visibility:is(on)',
			'section'     => 'error_page'
		),
		array(
			'id'          => 'nt_landium_error_heading_fontsize',
			'label'       => esc_html__('404 Page Heading font size', 'nt-landium' ),
			'desc'        => esc_html__('Enter 404 Page Heading font size', 'nt-landium' ),
			'std'         => '65',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'condition'   => 'nt_landium_error_heading_visibility:is(on)',
			'section'     => 'error_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_errorheadingcolor',
			'label'       => esc_html__( '404 Pages Heading color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_landium_error_heading_visibility:is(on)',
			'section'     => 'error_page'
		),
		array(
			'id'          => 'nt_landium_error_slogan_visibility',
			'label'       => esc_html__( '404 Page slogan visibility', 'nt-landium' ),
			'desc'        => sprintf( esc_html__( '404 Page slogan visibility %s or %s.', 'nt-landium' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'error_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_error_slogan',
			'label'       => esc_html__( '404 Page Slogan', 'nt-landium' ),
			'desc'        => esc_html__( 'Enter 404 Page Slogan', 'nt-landium' ),
			'std'         => 'Oops! That page can not be found.',
			'type'        => 'text',
			'condition'   => 'nt_landium_error_slogan_visibility:is(on)',
			'section'     => 'error_page'
		),
		array(
			'id'          => 'nt_landium_errorheaderparagraphcolor',
			'label'       => esc_html__( '404 Pages paragraph/slogan color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_landium_error_slogan_visibility:is(on)',
			'section'     => 'error_page'
		),

		/**  SEARCH PAGE HEADER SETTINGS.  **/
		array(
			'id'          => 'nt_landium_search_mask_v',
			'label'       => esc_html__( 'Search header background overlay mask visibility', 'nt-landium' ),
			'desc'        => sprintf( esc_html__( 'Search header background overlay mask  %s or %s.', 'nt-landium' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'search_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_search_mask_c',
			'label'       => esc_html__( 'Search header background overlay mask color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_landium_search_mask_v:is(on)',
			'section'     => 'search_page'
		),
		array(
			'id'          => 'nt_landium_searchpageheadbg',
			'label'       =>  esc_html__( 'Search Header Section background image', 'nt-landium' ),
			'desc'        =>  esc_html__( 'You can upload your image for parallax header', 'nt-landium' ),
			'type'        => 'upload',
			'section'     => 'search_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_searchheaderbgcolor',
			'label'       => esc_html__( 'Search Pages Header Section background color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'section'     => 'search_page'
		),
		array(
			'id'          => 'nt_landium_searchheaderbgheight',
			'label'       => esc_html__('Search Pages Header height', 'nt-landium' ),
			'desc'        => esc_html__('Search Pages Header height', 'nt-landium' ),
			'std'         => '50',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'section'     => 'search_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_searchheaderpaddingtop',
			'label'       => esc_html__('Header padding top', 'nt-landium' ),
			'desc'        => esc_html__('You can use this option for heading text vertical align', 'nt-landium' ),
			'std'         => '250',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,500',
			'section'     => 'search_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_searchheaderpaddingbottom',
			'label'       => esc_html__('Header padding bottom', 'nt-landium' ),
			'desc'        => esc_html__('You can use this option for heading text vertical align', 'nt-landium' ),
			'std'         => '200',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,500',
			'section'     => 'search_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_search_heading_visibility',
			'label'       => esc_html__( 'Search Page Heading visibility', 'nt-landium' ),
			'desc'        => sprintf( esc_html__( 'search Heading visibility %s or %s.', 'nt-landium' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'search_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_search_heading',
			'label'       => esc_html__( 'Search Page Heading', 'nt-landium' ),
			'desc'        => esc_html__( 'Enter Search Heading', 'nt-landium' ),
			'std'         => 'Search Page',
			'type'        => 'text',
			'condition'   => 'nt_landium_search_heading_visibility:is(on)',
			'section'     => 'search_page'
		),
		array(
			'id'          => 'nt_landium_search_heading_fontsize',
			'label'       => esc_html__('Search Page Heading font size', 'nt-landium' ),
			'desc'        => esc_html__('Enter Search Page Heading font size', 'nt-landium' ),
			'std'         => '50',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'condition'   => 'nt_landium_search_heading_visibility:is(on)',
			'section'     => 'search_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_searchheadingcolor',
			'label'       => esc_html__( 'Search Pages Heading color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_landium_search_heading_visibility:is(on)',
			'section'     => 'search_page'
		),
		array(
			'id'          => 'nt_landium_search_slogan_visibility',
			'label'       => esc_html__( 'Search Page slogan visibility', 'nt-landium' ),
			'desc'        => sprintf( esc_html__( 'Search Page slogan visibility %s or %s.', 'nt-landium' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'search_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_search_slogan',
			'label'       => esc_html__( 'Search Page Slogan', 'nt-landium' ),
			'desc'        => esc_html__( 'Enter Search Page Slogan', 'nt-landium' ),
			'std'         => 'Search completed',
			'type'        => 'text',
			'condition'   => 'nt_landium_search_slogan_visibility:is(on)',
			'section'     => 'search_page'
		),
		array(
			'id'          => 'nt_landium_searchheaderparagraphcolor',
			'label'       => esc_html__( 'Search Pages paragraph/slogan color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_landium_search_slogan_visibility:is(on)',
			'section'     => 'search_page'
		),

		/**  BREADCRUBMS SETTINGS.  **/
		array(
			'id'          => 'nt_landium_bread',
			'label'       => esc_html__( 'Default and Fullwidth  Page breadcrubms visibility', 'nt-landium' ),
			'desc'        => sprintf( esc_html__( 'Breadcrubms visibility %s or %s.', 'nt-landium' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'breadcrubms',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_blogbreadcrubmscolor',
			'label'       => esc_html__( 'Blog Pages Breadcrubms color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_landium_bread:is(on)',
			'section'     => 'breadcrubms'
		),
		array(
			'id'          => 'nt_landium_blogbreadcrubmshovercolor',
			'label'       => esc_html__( 'Blog Pages Breadcrubms hover color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_landium_bread:is(on)',
			'section'     => 'breadcrubms'
		),
		array(
			'id'          => 'nt_landium_blogbreadcrubmscurrentcolor',
			'label'       => esc_html__( 'Blog Pages Breadcrubms current page text color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_landium_bread:is(on)',
			'section'     => 'breadcrubms'
		),
		array(
			'id'          => 'nt_landium_blogbreadcrubmsfontsize',
			'label'       => esc_html__('Breadcrubms font size', 'nt-landium' ),
			'desc'        => esc_html__('Blog/Pages Header Breadcrubms font size', 'nt-landium' ),
			'std'         => '15',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'condition'   => 'nt_landium_bread:is(on)',
			'section'     => 'breadcrubms',
			'operator'    => 'and'
		),

		/**  FOOTER SETTINGS.  **/
		array(
			'id'          => 'nt_landium_footer_style',
			'label'       => esc_html__( 'Footer type', 'nt-landium' ),
			'desc'        => esc_html__( 'Select social media target type. Default : _blank' , 'nt-landium' ),
			'type'        => 'select',
			'section'     => 'copyright',
			'choices'     => array( 
				array(
					'value'       => '1',
					'label'       => esc_html__( '1', 'nt-landium' )
				),
				array(
					'value'       => '2',
					'label'       => esc_html__( '2', 'nt-landium' )
				),
				array(
					'value'       => '3',
					'label'       => esc_html__( '3', 'nt-landium' )
				),
			)
		),
		// NEWSLETTER FOOTER
		array(
			'id'          => 'nt_landium_widgetize',
			'label'       => esc_html__( 'Footer top widgetize area section', 'nt-landium' ),
			'desc'        => sprintf( esc_html__( 'Choose footer widgetize section %s or %s.', 'nt-landium' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'copyright',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_footerwidgetizebgcolor',
			'label'       => esc_html__( 'Footer widgetize background color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_landium_widgetize:is(on)',
			'section'     => 'copyright_color'
		),
		array(
			'id'          => 'nt_landium_footer_h_c',
			'label'       => esc_html__( 'Footer widgetize widget heading color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_landium_widgetize:is(on)',
			'section'     => 'copyright_color'
		),
		array(
			'id'          => 'nt_landium_footer_t_c',
			'label'       => esc_html__( 'Footer widgetize text color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_landium_widgetize:is(on)',
			'section'     => 'copyright_color'
		),
		array(
			'id'          => 'nt_landium_footer_a_c',
			'label'       => esc_html__( 'Footer widgetize a(link/URL) color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_landium_widgetize:is(on)',
			'section'     => 'copyright_color'
		),
		
		array(
			'id'          => 'nt_landium_footer_default',
			'label'       => esc_html__( 'Footer top default section', 'nt-landium' ),
			'desc'        => sprintf( esc_html__( 'Choose footer default section %s or %s.', 'nt-landium' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'copyright',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_footercontactpaddingtop',
			'label'       => esc_html__('Footer contact padding top', 'nt-landium' ),
			'desc'        => esc_html__('Enter padding top for footer contact section', 'nt-landium' ),
			'type'        => 'numeric-slider',
			'std'		  => '85',
			'min_max_step'=> '0,250',
			'condition'   => 'nt_landium_footer_default:is(on)',
			'section'     => 'copyright',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_footercontactpaddingbottom',
			'label'       => esc_html__('Footer contact padding bottom', 'nt-landium' ),
			'desc'        => esc_html__('Enter padding bottom for footer contact section', 'nt-landium' ),
			'type'        => 'numeric-slider',
			'std'		  => '0',
			'min_max_step'=> '0,250',
			'condition'   => 'nt_landium_footer_default:is(on)',
			'section'     => 'copyright',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_landium_footercopyrightpadding',
			'label'       => esc_html__('Footer copyright padding top and botom', 'nt-landium' ),
			'desc'        => esc_html__('Enter padding top and botom for footer copyright', 'nt-landium' ),
			'type'        => 'numeric-slider',
			'std'		  => '30',
			'min_max_step'=> '0,250',
			'condition'   => 'nt_landium_footer_default:is(on)',
			'section'     => 'copyright',
			'operator'    => 'and'
		),
		// NEWSLETTER FOOTER
		array(
			'id'          => 'nt_landium_news',
			'label'       => esc_html__( 'Footer newsletter section visibility ', 'nt-landium' ),
			'desc'        => sprintf( esc_html__( 'Choose newsletter section visibility %s or %s.', 'nt-landium' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'copyright_n'
		),
		array(
			'id'          => 'nt_landium_news_h',
			'label'       => 'Footer newsletter heading',
			'type'        => 'text',
			'condition'   => 'nt_landium_news:is(on)',
			'section'     => 'copyright_n'
		), 
		array(
			'id'          => 'nt_landium_news_d',
			'label'       => 'Footer newsletter description',
			'type'        => 'text',
			'condition'   => 'nt_landium_news:is(on)',
			'section'     => 'copyright_n'
		),
		array(
			'id'          => 'nt_landium_footernewsletterbgcolor',
			'label'       => esc_html__( 'Footer newsletter background color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_landium_news:is(on)',
			'section'     => 'copyright_n'
		),
		array(
			'id'          => 'nt_landium_footernewslettertitlecolor',
			'label'       => esc_html__( 'Footer newsletter title color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_landium_news:is(on)',
			'section'     => 'copyright_n'
		),
		array(
			'id'          => 'nt_landium_footernewsletterdesccolor',
			'label'       => esc_html__( 'Footer newsletter description color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_landium_news:is(on)',
			'section'     => 'copyright_n'
		),
		array(
			'id'          => 'nt_landium_footernewsletterinputcolor',
			'label'       => esc_html__( 'Footer newsletter input text color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_landium_news:is(on)',
			'section'     => 'copyright_n'
		),
		array(
			'id'          => 'nt_landium_footernewslettericoncolor',
			'label'       => esc_html__( 'Footer newsletter input icon color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_landium_news:is(on)',
			'section'     => 'copyright_n'
		),
		array(
			'id'          => 'nt_landium_footernewsletterinputbordercolor',
			'label'       => esc_html__( 'Footer newsletter input border bottom color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_landium_news:is(on)',
			'section'     => 'copyright_n'
		),
		array(
			'id'          => 'nt_landium_footernewsletterbuttonbordercolor',
			'label'       => esc_html__( 'Footer newsletter button border color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_landium_news:is(on)',
			'section'     => 'copyright_n'
		),
		array(
			'id'          => 'nt_landium_footernewsletterbuttoncolor',
			'label'       => esc_html__( 'Footer newsletter button background hover color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_landium_news:is(on)',
			'section'     => 'copyright_n'
		),
		// CONTACT FOOTER
		array(
			'id'          => 'nt_landium_contact',
			'label'       => esc_html__( 'Footer contact section visibility ', 'nt-landium' ),
			'desc'        => sprintf( esc_html__( 'Choose contact section visibility %s or %s.', 'nt-landium' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'copyright_con'
		),
		array(
			'id'          => 'nt_landium_adress',
			'label'       => 'Footer adress',
			'type'        => 'textarea',
			'condition'   => 'nt_landium_contact:is(on)',
			'section'     => 'copyright_con'
		),
		array(
			'id'          => 'nt_landium_phone',
			'label'       => 'Footer phone',
			'type'        => 'textarea',
			'condition'   => 'nt_landium_contact:is(on)',
			'section'     => 'copyright_con'
		),
		array(
			'id'          => 'nt_landium_mail',
			'label'       => 'Footer mail',
			'type'        => 'textarea',
			'condition'   => 'nt_landium_contact:is(on)',
			'section'     => 'copyright_con'
		),
		array(
			'id'          => 'nt_landium_copyright',
			'label'       => 'Footer copyright',
			'type'        => 'textarea',
			'condition'   => 'nt_landium_contact:is(on)',
			'section'     => 'copyright_c'
		),

		// FOOTER SOCIAL
		array(
			'id'          => 'nt_landium_social_section',
			'label'       => esc_html__( 'Social section visibility ', 'nt-landium' ),
			'desc'        => sprintf( esc_html__( 'Choose social section visibility %s or %s.', 'nt-landium' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'copyright_s'
		),
		array(
			'id'          => 'nt_landium_social',
			'label'       => 'Footer Social Icons',
			'desc'        => 'Footer Social Icons',
			'type'        => 'list-item',
			'condition'   => 'nt_landium_social_section:is(on)',
			'section'     => 'copyright_s',
			'settings'    => array( 
				array(
					'id'          => 'nt_landium_social_text',
					'label'       => 'social icon name',
					'desc'        => 'Enter font awesome social icon name',
					'type'        => 'text',
				),
				array(
					'id'          => 'nt_landium_social_link',
					'label'       => 'Link',
					'desc'        => 'Enter font awesome social share link',
					'type'        => 'text',
				)
			)
		),
		array(
			'id'          => 'nt_landium_social_target',
			'label'       => esc_html__( 'Target social media', 'nt-landium' ),
			'desc'        => esc_html__( 'Select social media target type. Default : _blank' , 'nt-landium' ),
			'std'         => '_blank',
			'type'        => 'select',
			'condition'   => 'nt_landium_social_section:is(on)',
			'section'     => 'copyright_s',
			'operator'    => 'and',
			'choices'     => array( 
				array(
					'value'       => '_blank',
					'label'       => esc_html__( '_blank', 'nt-landium' )
				),
				array(
					'value'       => '_self',
					'label'       => esc_html__( '_self', 'nt-landium' )
				),
				array(
					'value'       => '_parent',
					'label'       => esc_html__( '_parent', 'nt-landium' )
				),
				array(
					'value'       => '_top',
					'label'       => esc_html__( '_top', 'nt-landium' )
				),
			)
		),
		array(
			'id'          => 'nt_landium_social_fontsize',
			'label'       => esc_html__('Footer social font size', 'nt-landium' ),
			'desc'        => esc_html__('Footer social media font size', 'nt-landium' ),
			'std'         => '22',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'condition'   => 'nt_landium_bread:is(on)',
			'section'     => 'breadcrubms',
			'operator'    => 'and'
		),

		/**  FOOTER COLOR SETTINGS.  **/  
		array(
			'id'          => 'nt_landium_footerbgcolor',
			'label'       => esc_html__( 'Footer Background  color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker-opacity',
			'section'     => 'copyright_color'
		),
		array(
			'id'          => 'nt_landium_footercontacttextcolor',
			'label'       => esc_html__( 'Footer contact text color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker-opacity',
			'section'     => 'copyright_color'
		),
		array(
			'id'          => 'nt_landium_footercontacticoncolor',
			'label'       => esc_html__( 'Footer contact icon color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker-opacity',
			'section'     => 'copyright_color'
		),
		array(
			'id'          => 'nt_landium_footerpoweredbordertopcolor',
			'label'       => esc_html__( 'Footer copyright border top color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker-opacity',
			'section'     => 'copyright_color'
		),
		array(
			'id'          => 'nt_landium_footerpoweredcolor',
			'label'       => esc_html__( 'Footer copyright text color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker-opacity',
			'section'     => 'copyright_color'
		),
		array(
			'id'          => 'nt_landium_footersocialcolor',
			'label'       => esc_html__( 'Footer Social color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker-opacity',
			'section'     => 'copyright_color'
		),
		array(
			'id'          => 'nt_landium_footersocialhovercolor',
			'label'       => esc_html__( 'Footer Social Icon hover color ', 'nt-landium' ),
			'desc'        => esc_html__( 'Please select color', 'nt-landium' ),
			'type'        => 'colorpicker-opacity',
			'section'     => 'copyright_color'
		),

		//CUSTOM MAP
		array(
			'id'          => 'nt_landium_map_api_key',
			'label'       =>  esc_html__( 'Google Maps api key', 'nt-landium' ),
			'desc'        =>  esc_html__( 'You must create an api key and paste this box. Create :https://developers.google.com/maps/documentation/javascript/get-api-key#key ', 'nt-landium' ),
			'type'        => 'text',
			'section'     => 'maps'
		),
		array(
			'id'          => 'nt_landium_longitude',
			'label'       => esc_html__( 'Google Maps longitude', 'nt-landium' ),
			'type'        => 'text',
			'section'     => 'maps'
		),
		array(
			'id'          => 'nt_landium_latitude',
			'label'       => esc_html__( 'Google Maps latitude', 'nt-landium' ),
			'type'        => 'text',
			'section'     => 'maps'
		),
	
	) // end array
); // end function

	/* allow settings to be filtered before saving */
	$nt_landium_custom_settings = apply_filters( ot_settings_id() . '_args', $nt_landium_custom_settings );
	
	/* settings are not the same update the DB */
	if ( $nt_landium_saved_settings !== $nt_landium_custom_settings ) {
		update_option( ot_settings_id(), $nt_landium_custom_settings ); 
	}
	
	/* Lets OptionTree know the UI Builder is being overridden */
	global $ot_has_custom_theme_options;
	$ot_has_custom_theme_options = true;
	
	}