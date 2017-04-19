<?php

/*-----------------------------------------------------------------------------------*/
/*	Shortcode Filter
/*-----------------------------------------------------------------------------------*/

vc_set_as_theme( $disable_updater = false ); 
vc_is_updater_disabled();


function nt_landium_vc_remove_woocommerce() {
    if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
        vc_remove_element( 'woocommerce_cart' );
        vc_remove_element( 'woocommerce_checkout' );
        vc_remove_element( 'woocommerce_order_tracking' );
        vc_remove_element( 'woocommerce_my_account' );
        vc_remove_element( 'recent_products' );
        vc_remove_element( 'featured_products' );
        vc_remove_element( 'product' );
        vc_remove_element( 'products' );
        vc_remove_element( 'add_to_cart' );
        vc_remove_element( 'add_to_cart_url' );
        vc_remove_element( 'product_page' );
        vc_remove_element( 'product_category' );
        vc_remove_element( 'product_categories' );
        vc_remove_element( 'sale_products' );
        vc_remove_element( 'best_selling_products' );
        vc_remove_element( 'top_rated_products' );
        vc_remove_element( 'product_attribute' );
        vc_remove_element( 'related_products' );
    }
}
// Hook for admin editor.
add_action( 'vc_build_admin_page', 'nt_landium_vc_remove_woocommerce', 11 );
// Hook for frontend editor.
add_action( 'vc_load_shortcode', 'nt_landium_vc_remove_woocommerce', 11 );


vc_remove_element(  "vc_wp_search");
vc_remove_element(  "vc_wp_meta" );
vc_remove_element(  "vc_wp_recentcomments" );
vc_remove_element(  "vc_wp_calendar" );
vc_remove_element(  "vc_wp_pages" );
vc_remove_element(  "vc_wp_tagcloud" );
vc_remove_element(  "vc_wp_custommenu" );
vc_remove_element(  "vc_wp_text" );
vc_remove_element(  "vc_wp_posts" );
vc_remove_element(  "vc_wp_categories" );
vc_remove_element(  "vc_wp_archives" );
vc_remove_element(  "vc_wp_rss" );
vc_remove_element(  "vc_flickr" );
vc_remove_element(  "vc_facebook" );
vc_remove_element(  "vc_tweetmeme" );
vc_remove_element(  "vc_googleplus" );
vc_remove_element(  "vc_pinterest" );



/*-----------------------------------------------------------------------------------*/
/*	HERO 3 FORM landium
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Landium_heroform_integrateWithVC' );
function NT_Landium_heroform_integrateWithVC() {
   vc_map( array(
		"name" 	   => esc_html__( "Hero Form", "nt-landium" ),
		"base" 	   => "nt_landium_section_heroform",
		"category"   => esc_html__( "NT Landium", "nt-landium"),
		"params"     => array(
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Section ID', 'nt-landium' ),
				'param_name'    => 'section_id',
				'description'   => esc_html__("Add Your Section ID for scroll", "nt-landium"),
			),
			array(
				"type" 		  	=> "attach_image",
				"heading" 	  	=> esc_html__("Background parallax image", "nt-landium"),
				"param_name"  	=> "herobgimg",
				"description" 	=> esc_html__("Add your BG parallax image", "nt-landium"),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__('Select particles effect hide or show', 'nt-landium' ),
				'param_name'  => 'particle',
				'description' => esc_html__('You can select particles effect hide or show', 'nt-landium' ),
				'value'       => array(
					esc_html__('Select particles effect', 'nt-landium' )	=> '',
					esc_html__('Show', 	'nt-landium' )	=> 'show',
					esc_html__('Hide', 	'nt-landium' )	=> 'hide',
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__('Select overlay color hide or show', 'nt-landium' ),
				'param_name'  => 'overlay_display',
				'description' => esc_html__('You can select overlay mask color hide or show', 'nt-landium' ),
				'value'       => array(
					esc_html__('Select a style', 'nt-landium' )	=> '',
					esc_html__('Show', 			'nt-landium' )	=> 'show',
					esc_html__('Hide', 			'nt-landium' )	=> 'hide',
				),
			),
			array(
				'type'          => 'colorpicker',
				'heading'       => esc_html__('Overlay color', 'nt-landium' ),
				'param_name'    => 'overlaycolor',
				"description"   => esc_html__("Add/select an color", "nt-landium"),
				'dependency' => array(
					'element' 	=> 'overlay_display',
					'value'   	=> 'show'
				)
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Heading', 'nt-landium' ),
				'param_name'    => 'section_heading',
				'description'   => esc_html__("Add heading for this section", "nt-landium"),
				'group' 	  	=> esc_html__('Heading', 'nt-landium' ),

			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Description', 'nt-landium' ),
				'param_name'    => 'section_desc',
				'description'   => esc_html__("Add description for this section", "nt-landium"),
				'group' 	  	=> esc_html__('Heading', 'nt-landium' ),
			),
			array(
				'type'          => 'vc_link',
				'heading'       => esc_html__('Button (Link)', 'nt-landium' ),
				'param_name'    => 'herobtnlink',
				'description'   => esc_html__('Add custom link.', 'nt-landium' ),
				'group' 	  	=> esc_html__('Heading', 'nt-landium' ),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Hero Contact Form heading', 'nt-landium' ),
				'param_name'    => 'heroform_title',
				'description'   => esc_html__("Add contact form 7 heading/title", "nt-landium"),
				'group' 	  	=> esc_html__('Hero Form', 'nt-landium' ),	
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Hero Contact Form description', 'nt-landium' ),
				'param_name'    => 'heroform_desc',
				'description'   => esc_html__("Add contact form 7 description", "nt-landium"),
				'group' 	  	=> esc_html__('Hero Form', 'nt-landium' ),	
			),
			array(
				'type'          => 'textarea_html',
				'heading'       => esc_html__('Hero Contact Form', 'nt-landium' ),
				'param_name'    => 'content',
				'description'   => esc_html__("Add contact form 7 shortcode here", "nt-landium"),
				'group' 	  	=> esc_html__('Hero Form', 'nt-landium' ),	
			),
		),
   ));
} class NT_Landium_section_heroform extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	HERO PRODUCT landium
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Landium_heroproduct_integrateWithVC' );
function NT_Landium_heroproduct_integrateWithVC() {
   vc_map( array(
		"name" 	   => esc_html__( "Hero Product", "nt-landium" ),
		"base" 	   => "nt_landium_section_heroproduct",
		"category"   => esc_html__( "NT Landium", "nt-landium"),
		"params"     => array(
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Section ID', 'nt-landium' ),
				'param_name'    => 'section_id',
				'description'   => esc_html__("Add Your Section ID for scroll", "nt-landium"),
			),
			array(
				"type" 		  	=> "attach_image",
				"heading" 	  	=> esc_html__("Background parallax image", "nt-landium"),
				"param_name"  	=> "herobgimg",
				"description" 	=> esc_html__("Add your BG parallax image", "nt-landium"),
			),
			array(
				"type" 		  	=> "attach_image",
				"heading" 	  	=> esc_html__("Product image", "nt-landium"),
				"param_name"  	=> "hero_img",
				"description" 	=> esc_html__("Add your hero product image", "nt-landium"),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__('Select particles effect hide or show', 'nt-landium' ),
				'param_name'  => 'particle',
				'description' => esc_html__('You can select particles effect hide or show', 'nt-landium' ),
				'value'       => array(
					esc_html__('Select particles effect', 'nt-landium' )	=> '',
					esc_html__('Show', 	'nt-landium' )	=> 'show',
					esc_html__('Hide', 	'nt-landium' )	=> 'hide',
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__('Select overlay color hide or show', 'nt-landium' ),
				'param_name'  => 'overlay_display',
				'description' => esc_html__('You can select overlay mask color hide or show', 'nt-landium' ),
				'value'       => array(
					esc_html__('Select a style', 'nt-landium' )	=> '',
					esc_html__('Show', 			'nt-landium' )	=> 'show',
					esc_html__('Hide', 			'nt-landium' )	=> 'hide',
				),
			),
			array(
				'type'          => 'colorpicker',
				'heading'       => esc_html__('Overlay color', 'nt-landium' ),
				'param_name'    => 'overlaycolor',
				"description"   => esc_html__("Add/select an color", "nt-landium"),
				'dependency' => array(
					'element' 	=> 'overlay_display',
					'value'   	=> 'show'
				)
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Heading', 'nt-landium' ),
				'param_name'    => 'section_heading',
				'description'   => esc_html__("Add heading for this section", "nt-landium"),
				'group' 	  	=> esc_html__('Heading', 'nt-landium' ),

			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Description', 'nt-landium' ),
				'param_name'    => 'section_desc',
				'description'   => esc_html__("Add description for this section", "nt-landium"),
				'group' 	  	=> esc_html__('Heading', 'nt-landium' ),
			),
			array(
				'type'          => 'vc_link',
				'heading'       => esc_html__('Button (Link)', 'nt-landium' ),
				'param_name'    => 'herobtnlink',
				'description'   => esc_html__('Add custom link.', 'nt-landium' ),
				'group' 	  	=> esc_html__('Heading', 'nt-landium' ),
			)
		)
   ));
} class NT_Landium_section_heroproduct extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	SERVICES landium
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Landium_services_integrateWithVC' );
function NT_Landium_services_integrateWithVC() {
   vc_map( array(
		"name" 	   => esc_html__( "Services Section", "nt-landium" ),
		"base" 	   => "nt_landium_section_services",
		"category"   => esc_html__( "NT Landium", "nt-landium"),
		"params"     => array(
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Section ID', 'nt-landium' ),
				'param_name'    => 'section_id',
				'description'   => esc_html__("Add Your Section ID for scroll", "nt-landium"),
			),
			//heading section
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__('Heading display ( hide or show )', 'nt-landium' ),
				'param_name'  => 'heading_display',
				'description' => esc_html__('You can select hide or show for section heading and description', 'nt-landium' ),
				'group' 	  => esc_html__('Heading', 'nt-landium' ),
				'value'       => array(
					esc_html__('Show', 	'nt-landium' )	=> 'show',
					esc_html__('Hide', 	'nt-landium' )	=> 'hide',
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__('Text align( position )', 'nt-landium' ),
				'param_name'  => 'heading_align',
				'description' => esc_html__('You can select position for section heading and description', 'nt-landium' ),
				'group' 	  => esc_html__('Heading', 'nt-landium' ),
				'value'       => array(
					esc_html__('Select text align', 	'nt-landium' )	=> '',
					esc_html__('Left', 		'nt-landium' )	=> 'fonticon',
					esc_html__('center', 	'nt-landium' )	=> 'imgicon',
					esc_html__('Right', 	'nt-landium' )	=> 'imgicon',
				),
				'dependency' 	=> array(
					'element' 	=> 'heading_display',
					'value'   	=> 'show'
				)
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Heading', 'nt-landium' ),
				'param_name'    => 'section_heading',
				'description'   => esc_html__("Add heading for this section", "nt-landium"),
				'group' 	  	=> esc_html__('Heading', 'nt-landium' ),
				'dependency' 	=> array(
						'element' 	=> 'heading_display',
						'value'   	=> 'show'
					)
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Description', 'nt-landium' ),
				'param_name'    => 'section_desc',
				'description'   => esc_html__("Add description for this section", "nt-landium"),
				'group' 	  	=> esc_html__('Heading', 'nt-landium' ),
				'dependency' 	=> array(
						'element' 	=> 'heading_display',
						'value'   	=> 'show'
					)
			),
			//services loop
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__('Item column size', 'nt-landium' ),
				'param_name'  => 'item_column',
				'description' => esc_html__('You can select detail item column size', 'nt-landium' ),
				'group' 	  => esc_html__('Services', 'nt-landium' ),
				'value'       => array(
					esc_html__('Select column for all item', 	'nt-landium' )	=> '',
					esc_html__('1 Column', 	'nt-landium' )	=> 'col-md-12',
					esc_html__('2 Column', 	'nt-landium' )	=> 'col-md-6',
					esc_html__('3 Column', 	'nt-landium' )	=> 'col-md-4',
					esc_html__('4 Column', 	'nt-landium' )	=> 'col-md-3',
					esc_html__('6 Column', 	'nt-landium' )	=> 'col-md-2',
					esc_html__('Custom Column', 'nt-landium' )	=> 'custom',
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__('Desktop column', 'nt-landium' ),
				'param_name'  => 'desk_column',
				'description' => esc_html__('You can select desktop column size', 'nt-landium' ),
				'group' 	  => esc_html__('Services', 'nt-landium' ),
				'value'       => array(
					esc_html__('Select desktop column for all item', 	'nt-landium' )	=> '',
					esc_html__('col-md-1', 	'nt-landium' )	=> 'col-md-1',
					esc_html__('col-md-2', 	'nt-landium' )	=> 'col-md-2',
					esc_html__('col-md-3', 	'nt-landium' )	=> 'col-md-3',
					esc_html__('col-md-4', 	'nt-landium' )	=> 'col-md-4',
					esc_html__('col-md-5', 	'nt-landium' )	=> 'col-md-5',
					esc_html__('col-md-6', 	'nt-landium' )	=> 'col-md-6',
					esc_html__('col-md-7', 	'nt-landium' )	=> 'col-md-7',
					esc_html__('col-md-8', 	'nt-landium' )	=> 'col-md-8',
					esc_html__('col-md-9', 	'nt-landium' )	=> 'col-md-9',
					esc_html__('col-md-10', 'nt-landium' )	=> 'col-md-10',
					esc_html__('col-md-11', 'nt-landium' )	=> 'col-md-11',
					esc_html__('col-md-12', 'nt-landium' )	=> 'col-md-12',
				),
				'dependency' 	=> array(
						'element' 	=> 'item_column',
						'value'   	=> 'custom'
					)
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__('Desktop column offset', 'nt-landium' ),
				'param_name'  => 'desk_column_offset',
				'description' => esc_html__('You can select desktop column offset size', 'nt-landium' ),
				'group' 	  => esc_html__('Services', 'nt-landium' ),
				'value'       => array(
					esc_html__('Select desktop column offset for all item', 	'nt-landium' )	=> '',
					esc_html__('col-md-offset-1', 	'nt-landium' )	=> 'col-md-offset-1',
					esc_html__('col-md-offset-2', 	'nt-landium' )	=> 'col-md-offset-2',
					esc_html__('col-md-offset-3', 	'nt-landium' )	=> 'col-md-offset-3',
					esc_html__('col-md-offset-4', 	'nt-landium' )	=> 'col-md-offset-4',
					esc_html__('col-md-offset-5', 	'nt-landium' )	=> 'col-md-offset-5',
					esc_html__('col-md-offset-6', 	'nt-landium' )	=> 'col-md-offset-6',
					esc_html__('col-md-offset-7', 	'nt-landium' )	=> 'col-md-offset-7',
					esc_html__('col-md-offset-8', 	'nt-landium' )	=> 'col-md-offset-8',
					esc_html__('col-md-offset-9', 	'nt-landium' )	=> 'col-md-offset-9',
					esc_html__('col-md-offset-10', 'nt-landium' )	=> 'col-md-offset-10',
					esc_html__('col-md-offset-11', 'nt-landium' )	=> 'col-md-offset-11',
					esc_html__('col-md-offset-12', 'nt-landium' )	=> 'col-md-offset-12',
				),
				'dependency' 	=> array(
						'element' 	=> 'item_column',
						'value'   	=> 'custom'
					)
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__('Mobile column', 'nt-landium' ),
				'param_name'  => 'mob_column',
				'description' => esc_html__('You can select mobile device column size', 'nt-landium' ),
				'group' 	  => esc_html__('Services', 'nt-landium' ),
				'value'       => array(
					esc_html__('Select mobile column for all item', 	'nt-landium' )	=> '',
					esc_html__('col-sm-1', 	'nt-landium' )	=> 'col-sm-1',
					esc_html__('col-sm-2', 	'nt-landium' )	=> 'col-sm-2',
					esc_html__('col-sm-3', 	'nt-landium' )	=> 'col-sm-3',
					esc_html__('col-sm-4', 	'nt-landium' )	=> 'col-sm-4',
					esc_html__('col-sm-5', 	'nt-landium' )	=> 'col-sm-5',
					esc_html__('col-sm-6', 	'nt-landium' )	=> 'col-sm-6',
					esc_html__('col-sm-7', 	'nt-landium' )	=> 'col-sm-7',
					esc_html__('col-sm-8', 	'nt-landium' )	=> 'col-sm-8',
					esc_html__('col-sm-9', 	'nt-landium' )	=> 'col-sm-9',
					esc_html__('col-sm-10', 'nt-landium' )	=> 'col-sm-10',
					esc_html__('col-sm-11', 'nt-landium' )	=> 'col-sm-11',
					esc_html__('col-sm-12', 'nt-landium' )	=> 'col-sm-12',
				),
				'dependency' 	=> array(
						'element' 	=> 'item_column',
						'value'   	=> 'custom'
					)
			),
		array(
			'type'        => 'param_group',
			'heading'     => esc_html__('Services items', 'nt-landium' ),
			'param_name'  => 'servicesloop',
			'group' 	  => esc_html__('Services', 'nt-landium' ),			
			'params' 	  => array(
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Item icon type', 'nt-landium' ),
					'param_name'  => 'icon_type',
					'description' => esc_html__('You can select icon type image or fonticon', 'nt-landium' ),
					'value'       => array(
						esc_html__('Select icon type', 	'nt-landium' )	=> '',
						esc_html__('Font icon', 	'nt-landium' )	=> 'fonticon',
						esc_html__('Image icon', 	'nt-landium' )	=> 'imgicon',
					),
				),
				array(
					"type" 			  => "textfield",
					"heading" 		  => esc_html__("Fonticon name", "nt-landium"),
					"param_name" 	  => "item_fonticon",
					"description" 	  => esc_html__("Add icon name(fonticon class name). example : fa fa-facebook", "nt-landium"),
					'dependency' 	=> array(
						'element' 	=> 'icon_type',
						'value'   	=> 'fonticon'
					)
				),
				array(
					"type" 		  	=> "attach_image",
					"heading" 	  	=> esc_html__("image icon", "nt-landium"),
					"param_name"  	=> "itemimg_icon",
					"description" 	=> esc_html__("Add your image icon", "nt-landium"),
					'dependency' 	=> array(
						'element' 	=> 'icon_type',
						'value'   	=> 'imgicon'
					)
				),
				array(
					"type" 			  => "textfield",
					"heading" 		  => esc_html__("Title", "nt-landium"),
					"param_name" 	  => "item_title",
					"description" 	  => esc_html__("Add title for item.", "nt-landium"),
				),
				array(
					"type" 			  => "textarea",
					"heading" 		  => esc_html__("Detail", "nt-landium"),
					"param_name" 	  => "item_desc",
					"description" 	  => esc_html__("Add detail for item.", "nt-landium"),
				),
			)
		),
		
			array(
				'type'          => 'css_editor',
				'heading'       => esc_html__('Background CSS', 'nt-landium' ),
				'param_name'    => 'sectionbgcss',
				'group' 	    => esc_html__('Background options', 'nt-landium' ),
			),
		),
   ));
} class NT_Landium_section_services extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	SERVICES landium
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Landium_servicestwo_integrateWithVC' );
function NT_Landium_servicestwo_integrateWithVC() {
   vc_map( array(
		"name" 	   => esc_html__( "Services 2 Section", "nt-landium" ),
		"base" 	   => "nt_landium_section_servicestwo",
		"category"   => esc_html__( "NT Landium", "nt-landium"),
		"params"     => array(
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Section ID', 'nt-landium' ),
				'param_name'    => 'section_id',
				'description'   => esc_html__("Add Your Section ID for scroll", "nt-landium"),
			),
			//heading section
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__('Heading display ( hide or show )', 'nt-landium' ),
				'param_name'  => 'heading_display',
				'description' => esc_html__('You can select hide or show for section heading and description', 'nt-landium' ),
				'group' 	  => esc_html__('Heading', 'nt-landium' ),
				'value'       => array(
					esc_html__('Show', 	'nt-landium' )	=> 'show',
					esc_html__('Hide', 	'nt-landium' )	=> 'hide',
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__('Text align( position )', 'nt-landium' ),
				'param_name'  => 'heading_align',
				'description' => esc_html__('You can select position for section heading and description', 'nt-landium' ),
				'group' 	  => esc_html__('Heading', 'nt-landium' ),
				'value'       => array(
					esc_html__('Select text align', 	'nt-landium' )	=> '',
					esc_html__('Left', 		'nt-landium' )	=> 'left',
					esc_html__('center', 	'nt-landium' )	=> 'center',
					esc_html__('Right', 	'nt-landium' )	=> 'right',
				),
				'dependency' 	=> array(
					'element' 	=> 'heading_display',
					'value'   	=> 'show'
				)
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Heading', 'nt-landium' ),
				'param_name'    => 'section_heading',
				'description'   => esc_html__("Add heading for this section", "nt-landium"),
				'group' 	  	=> esc_html__('Heading', 'nt-landium' ),
				'dependency' 	=> array(
						'element' 	=> 'heading_display',
						'value'   	=> 'show'
					)
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Description', 'nt-landium' ),
				'param_name'    => 'section_desc',
				'description'   => esc_html__("Add description for this section", "nt-landium"),
				'group' 	  	=> esc_html__('Heading', 'nt-landium' ),
				'dependency' 	=> array(
						'element' 	=> 'heading_display',
						'value'   	=> 'show'
					)
			),
			//services loop
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__('Item column size', 'nt-landium' ),
				'param_name'  => 'item_column',
				'description' => esc_html__('You can select detail item column size', 'nt-landium' ),
				'group' 	  => esc_html__('Services', 'nt-landium' ),
				'value'       => array(
					esc_html__('Select column for all item', 	'nt-landium' )	=> '',
					esc_html__('1 Column', 	'nt-landium' )	=> 'col-md-12',
					esc_html__('2 Column', 	'nt-landium' )	=> 'col-md-6',
					esc_html__('3 Column', 	'nt-landium' )	=> 'col-md-4',
					esc_html__('4 Column', 	'nt-landium' )	=> 'col-md-3',
					esc_html__('6 Column', 	'nt-landium' )	=> 'col-md-2',
					esc_html__('Custom Column', 'nt-landium' )	=> 'custom',
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__('Desktop column', 'nt-landium' ),
				'param_name'  => 'desk_column',
				'description' => esc_html__('You can select desktop column size', 'nt-landium' ),
				'group' 	  => esc_html__('Services', 'nt-landium' ),
				'value'       => array(
					esc_html__('Select desktop column for all item', 	'nt-landium' )	=> '',
					esc_html__('col-md-1', 	'nt-landium' )	=> 'col-md-1',
					esc_html__('col-md-2', 	'nt-landium' )	=> 'col-md-2',
					esc_html__('col-md-3', 	'nt-landium' )	=> 'col-md-3',
					esc_html__('col-md-4', 	'nt-landium' )	=> 'col-md-4',
					esc_html__('col-md-5', 	'nt-landium' )	=> 'col-md-5',
					esc_html__('col-md-6', 	'nt-landium' )	=> 'col-md-6',
					esc_html__('col-md-7', 	'nt-landium' )	=> 'col-md-7',
					esc_html__('col-md-8', 	'nt-landium' )	=> 'col-md-8',
					esc_html__('col-md-9', 	'nt-landium' )	=> 'col-md-9',
					esc_html__('col-md-10', 'nt-landium' )	=> 'col-md-10',
					esc_html__('col-md-11', 'nt-landium' )	=> 'col-md-11',
					esc_html__('col-md-12', 'nt-landium' )	=> 'col-md-12',
				),
				'dependency' 	=> array(
						'element' 	=> 'item_column',
						'value'   	=> 'custom'
					)
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__('Desktop column offset', 'nt-landium' ),
				'param_name'  => 'desk_column_offset',
				'description' => esc_html__('You can select desktop column offset size', 'nt-landium' ),
				'group' 	  => esc_html__('Services', 'nt-landium' ),
				'value'       => array(
					esc_html__('Select desktop column offset for all item', 	'nt-landium' )	=> '',
					esc_html__('col-md-offset-1', 	'nt-landium' )	=> 'col-md-offset-1',
					esc_html__('col-md-offset-2', 	'nt-landium' )	=> 'col-md-offset-2',
					esc_html__('col-md-offset-3', 	'nt-landium' )	=> 'col-md-offset-3',
					esc_html__('col-md-offset-4', 	'nt-landium' )	=> 'col-md-offset-4',
					esc_html__('col-md-offset-5', 	'nt-landium' )	=> 'col-md-offset-5',
					esc_html__('col-md-offset-6', 	'nt-landium' )	=> 'col-md-offset-6',
					esc_html__('col-md-offset-7', 	'nt-landium' )	=> 'col-md-offset-7',
					esc_html__('col-md-offset-8', 	'nt-landium' )	=> 'col-md-offset-8',
					esc_html__('col-md-offset-9', 	'nt-landium' )	=> 'col-md-offset-9',
					esc_html__('col-md-offset-10', 'nt-landium' )	=> 'col-md-offset-10',
					esc_html__('col-md-offset-11', 'nt-landium' )	=> 'col-md-offset-11',
					esc_html__('col-md-offset-12', 'nt-landium' )	=> 'col-md-offset-12',
				),
				'dependency' 	=> array(
						'element' 	=> 'item_column',
						'value'   	=> 'custom'
					)
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__('Mobile column', 'nt-landium' ),
				'param_name'  => 'mob_column',
				'description' => esc_html__('You can select mobile device column size', 'nt-landium' ),
				'group' 	  => esc_html__('Services', 'nt-landium' ),
				'value'       => array(
					esc_html__('Select mobile column for all item', 	'nt-landium' )	=> '',
					esc_html__('col-sm-1', 	'nt-landium' )	=> 'col-sm-1',
					esc_html__('col-sm-2', 	'nt-landium' )	=> 'col-sm-2',
					esc_html__('col-sm-3', 	'nt-landium' )	=> 'col-sm-3',
					esc_html__('col-sm-4', 	'nt-landium' )	=> 'col-sm-4',
					esc_html__('col-sm-5', 	'nt-landium' )	=> 'col-sm-5',
					esc_html__('col-sm-6', 	'nt-landium' )	=> 'col-sm-6',
					esc_html__('col-sm-7', 	'nt-landium' )	=> 'col-sm-7',
					esc_html__('col-sm-8', 	'nt-landium' )	=> 'col-sm-8',
					esc_html__('col-sm-9', 	'nt-landium' )	=> 'col-sm-9',
					esc_html__('col-sm-10', 'nt-landium' )	=> 'col-sm-10',
					esc_html__('col-sm-11', 'nt-landium' )	=> 'col-sm-11',
					esc_html__('col-sm-12', 'nt-landium' )	=> 'col-sm-12',
				),
				'dependency' 	=> array(
						'element' 	=> 'item_column',
						'value'   	=> 'custom'
					)
			),
		array(
			'type'        => 'param_group',
			'heading'     => esc_html__('Services items', 'nt-landium' ),
			'param_name'  => 'servicesloop',
			'group' 	  => esc_html__('Services', 'nt-landium' ),			
			'params' 	  => array(
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Item icon type', 'nt-landium' ),
					'param_name'  => 'icon_type',
					'description' => esc_html__('You can select icon type image or fonticon', 'nt-landium' ),
					'value'       => array(
						esc_html__('Select icon type', 	'nt-landium' )	=> '',
						esc_html__('Font icon', 	'nt-landium' )	=> 'fonticon',
						esc_html__('Image icon', 	'nt-landium' )	=> 'imgicon',
					),
				),
				array(
					"type" 			  => "textfield",
					"heading" 		  => esc_html__("Fonticon name", "nt-landium"),
					"param_name" 	  => "item_fonticon",
					"description" 	  => esc_html__("Add icon name(fonticon class name). example : fa fa-facebook", "nt-landium"),
					'dependency' 	=> array(
						'element' 	=> 'icon_type',
						'value'   	=> 'fonticon'
					)
				),
				array(
					"type" 		  	=> "attach_image",
					"heading" 	  	=> esc_html__("image icon", "nt-landium"),
					"param_name"  	=> "itemimg_icon",
					"description" 	=> esc_html__("Add your image icon", "nt-landium"),
					'dependency' 	=> array(
						'element' 	=> 'icon_type',
						'value'   	=> 'imgicon'
					)
				),
				array(
					"type" 			  => "textfield",
					"heading" 		  => esc_html__("Title", "nt-landium"),
					"param_name" 	  => "item_title",
					"description" 	  => esc_html__("Add title for item.", "nt-landium"),
				),
				array(
					"type" 			  => "textarea",
					"heading" 		  => esc_html__("Detail", "nt-landium"),
					"param_name" 	  => "item_desc",
					"description" 	  => esc_html__("Add detail for item.", "nt-landium"),
				),
			)
		),
		
			array(
				'type'          => 'css_editor',
				'heading'       => esc_html__('Background CSS', 'nt-landium' ),
				'param_name'    => 'sectionbgcss',
				'group' 	    => esc_html__('Background options', 'nt-landium' ),
			),
		),
   ));
} class NT_Landium_section_servicestwo extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	ABOUTONE  landium
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Landium_aboutone_integrateWithVC' );
function NT_Landium_aboutone_integrateWithVC() {
   vc_map( array(
		"name" 	   => esc_html__( "About Section", "nt-landium" ),
		"base" 	   => "nt_landium_section_aboutone",
		"category"   => esc_html__( "NT Landium", "nt-landium"),
		"params"     => array(
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Section ID', 'nt-landium' ),
				'param_name'    => 'section_id',
				'description'   => esc_html__("Add Your Section ID for scroll", "nt-landium"),
			),
			array(
				"type" 		  	=> "attach_image",
				"heading" 	  	=> esc_html__("Section image", "nt-landium"),
				"param_name"  	=> "sec_img",
				"description" 	=> esc_html__("Add your custom left section image", "nt-landium"),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Heading', 'nt-landium' ),
				'param_name'    => 'section_heading',
				'description'   => esc_html__("Add heading for this section", "nt-landium"),
				'group' 	  	=> esc_html__('Heading', 'nt-landium' ),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Subtitle', 'nt-landium' ),
				'param_name'    => 'section_subtitle',
				'description'   => esc_html__("Add subtitle for this section", "nt-landium"),
				'group' 	  	=> esc_html__('Heading', 'nt-landium' ),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Description', 'nt-landium' ),
				'param_name'    => 'section_desc',
				'description'   => esc_html__("Add description for this section", "nt-landium"),
				'group' 	  	=> esc_html__('Heading', 'nt-landium' ),
			),
			array(
				'type'          => 'vc_link',
				'heading'       => esc_html__('Button (Link)', 'nt-landium' ),
				'param_name'    => 'btnlink',
				'description'   => esc_html__('Add custom link.', 'nt-landium' ),
				'group' 	  	=> esc_html__('Heading', 'nt-landium' ),
			)
		),
   ));
} class NT_Landium_section_aboutone extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	ABOUT 2 landium
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Landium_abouttwo_integrateWithVC' );
function NT_Landium_abouttwo_integrateWithVC() {
   vc_map( array(
		"name" 	   => esc_html__( "About 2 Section", "nt-landium" ),
		"base" 	   => "nt_landium_section_abouttwo",
		"category"   => esc_html__( "NT Landium", "nt-landium"),
		"params"     => array(
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Section ID', 'nt-landium' ),
				'param_name'    => 'section_id',
				'description'   => esc_html__("Add Your Section ID for scroll", "nt-landium"),
			),
			//heading section
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Heading', 'nt-landium' ),
				'param_name'    => 'section_heading',
				'description'   => esc_html__("Add heading for this section", "nt-landium"),
				'group' 	  	=> esc_html__('Heading', 'nt-landium' ),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Description', 'nt-landium' ),
				'param_name'    => 'section_desc',
				'description'   => esc_html__("Add description for this section", "nt-landium"),
				'group' 	  	=> esc_html__('Heading', 'nt-landium' ),
			),
			array(
				"type" 		  	=> "attach_image",
				"heading" 	  	=> esc_html__("Left image", "nt-landium"),
				"param_name"  	=> "about_img",
				"description" 	=> esc_html__("Add your left image", "nt-landium"),
				'group' 	  	=> esc_html__('Heading', 'nt-landium' ),
			),
		//services loop
		array(
			'type'        => 'param_group',
			'heading'     => esc_html__('About items', 'nt-landium' ),
			'param_name'  => 'abouttwoloop',
			'group' 	  => esc_html__('About', 'nt-landium' ),			
			'params' 	  => array(

				array(
					"type" 			  => "textfield",
					"heading" 		  => esc_html__("Fonticon name", "nt-landium"),
					"param_name" 	  => "item_fonticon",
					"description" 	  => esc_html__("Add icon name(fonticon class name). example : fa fa-facebook", "nt-landium"),
					'dependency' 	=> array(
						'element' 	=> 'icon_type',
						'value'   	=> 'fonticon'
					)
				),
				array(
					"type" 			  => "textarea",
					"heading" 		  => esc_html__("Detail", "nt-landium"),
					"param_name" 	  => "item_desc",
					"description" 	  => esc_html__("Add detail for item.", "nt-landium"),
				),
			)
		),
			array(
				'type'          => 'vc_link',
				'heading'       => esc_html__('Button (Link)', 'nt-landium' ),
				'param_name'    => 'btnlink',
				'description'   => esc_html__('Add custom link.', 'nt-landium' ),
				'group' 	  	=> esc_html__('About', 'nt-landium' ),
			),
			array(
				'type'          => 'css_editor',
				'heading'       => esc_html__('Background CSS', 'nt-landium' ),
				'param_name'    => 'sectionbgcss',
				'group' 	    => esc_html__('Background options', 'nt-landium' ),
			),
		),
   ));
} class NT_Landium_section_abouttwo extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	TESTIMONIAL landium
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Landium_testimonial_integrateWithVC' );
function NT_Landium_testimonial_integrateWithVC() {
   vc_map( array(
		"name" 	   => esc_html__( "Testimonial Section", "nt-landium" ),
		"base" 	   => "nt_landium_section_testimonial",
		"category"   => esc_html__( "NT Landium", "nt-landium"),
		"params"     => array(
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Section ID', 'nt-landium' ),
				'param_name'    => 'section_id',
				'description'   => esc_html__("Add Your Section ID for scroll", "nt-landium"),
			),
		//Section Heading
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__('Heading display ( hide or show )', 'nt-landium' ),
				'param_name'  => 'heading_display',
				'description' => esc_html__('You can select hide or show for section heading and description', 'nt-landium' ),
				'group' 	  => esc_html__('Heading', 'nt-landium' ),
				'value'       => array(
					esc_html__('Show', 	'nt-landium' )	=> 'show',
					esc_html__('Hide', 	'nt-landium' )	=> 'hide',
				),
			),

			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Section heading', 'nt-landium' ),
				'param_name'    => 'section_heading',
				'description'   => esc_html__("Add heading for pricing section", "nt-landium"),
				'group' 	  	=> esc_html__('Heading', 'nt-landium' ),
				'dependency' 	=> array(
						'element' 	=> 'heading_display',
						'value'   	=> 'show'
					)
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Section description', 'nt-landium' ),
				'param_name'    => 'section_desc',
				'description'   => esc_html__("Add description for pricing section", "nt-landium"),
				'group' 	  	=> esc_html__('Heading', 'nt-landium' ),
				'dependency' 	=> array(
						'element' 	=> 'heading_display',
						'value'   	=> 'show'
					)
			),
		//Testimonial loop
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__('Testimonial Style', 'nt-landium' ),
				'param_name'  => 'testistyle',
				'description' => esc_html__('You can select testimonial style', 'nt-landium' ),
				'group' 	  => esc_html__('Testimonial', 'nt-landium' ),
				'value'       => array(
					esc_html__('Style 1', 	'nt-landium' )	=> '1',
					esc_html__('Style 2', 	'nt-landium' )	=> '2',
				),
			),
		array(
			'type'        => 'param_group',
			'heading'     => esc_html__('Testimonial items', 'nt-landium' ),
			'param_name'  => 'testiloop',
			'group' 	  => esc_html__('Testimonial', 'nt-landium' ),			
			'params' 	  => array(

				array(
					"type" 		  	=> "attach_image",
					"heading" 	  	=> esc_html__("Testimonial image", "nt-landium"),
					"param_name"  	=> "testi_img",
					"description" 	=> esc_html__("Add your client image", "nt-landium"),
				),
				array(
					"type" 			  => "textfield",
					"heading" 		  => esc_html__("Testimonial name", "nt-landium"),
					"param_name" 	  => "testi_name",
					"description" 	  => esc_html__("Add your testimonial name", "nt-landium"),
				),
				array(
					"type" 			  => "textfield",
					"heading" 		  => esc_html__("Testimonial job", "nt-landium"),
					"param_name" 	  => "testi_job",
					"description" 	  => esc_html__("Add your testimonial job or detail", "nt-landium"),
				),
				array(
					"type" 			  => "textarea",
					"heading" 		  => esc_html__("Testimonial quote", "nt-landium"),
					"param_name" 	  => "testi_quote",
					"description" 	  => esc_html__("Add your testimonial quote text", "nt-landium"),
				),

			)
		),
			array(
				'type'          => 'css_editor',
				'heading'       => esc_html__('Background CSS', 'nt-landium' ),
				'param_name'    => 'sectionbgcss',
				'group' 	    => esc_html__('Background options', 'nt-landium' ),
			),
		),
   ));
} class NT_Landium_section_testimonial extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	CLIENTS landium
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Landium_clients_integrateWithVC' );
function NT_Landium_clients_integrateWithVC() {
   vc_map( array(
		"name" 	   => esc_html__( "Clients Section", "nt-landium" ),
		"base" 	   => "nt_landium_section_clients",
		"category"   => esc_html__( "NT Landium", "nt-landium"),
		"params"     => array(
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Section ID', 'nt-landium' ),
				'param_name'    => 'section_id',
				'description'   => esc_html__("Add Your Section ID for scroll", "nt-landium"),
			),
		array(
			'type'        => 'param_group',
			'heading'     => esc_html__('Client item', 'nt-landium' ),
			'param_name'  => 'clientloop',
			'group' 	  => esc_html__('Client', 'nt-landium' ),			
			'params' 	  => array(

				array(
					"type" 		  	=> "attach_image",
					"heading" 	  	=> esc_html__("Client image", "nt-landium"),
					"param_name"  	=> "client_img",
					"description" 	=> esc_html__("Add your client image", "nt-landium"),
				),
			)
		),
			array(
				'type'          => 'css_editor',
				'heading'       => esc_html__('Background CSS', 'nt-landium' ),
				'param_name'    => 'sectionbgcss',
				'group' 	    => esc_html__('Background options', 'nt-landium' ),
			)
		)
   ));
} class NT_Landium_section_clients extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	FEATURES ICON landium
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Landium_featuresicon_integrateWithVC' );
function NT_Landium_featuresicon_integrateWithVC() {
   vc_map( array(
		"name" 	   => esc_html__( "Features Section", "nt-landium" ),
		"base" 	   => "nt_landium_section_featuresicon",
		"category"   => esc_html__( "NT Landium", "nt-landium"),
		"params"     => array(
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Section ID', 'nt-landium' ),
				'param_name'    => 'section_id',
				'description'   => esc_html__("Add Your Section ID for scroll", "nt-landium"),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__('Heading display ( hide or show )', 'nt-landium' ),
				'param_name'  => 'heading_display',
				'description' => esc_html__('You can select hide or show for section heading and description', 'nt-landium' ),
				'group' 	  => esc_html__('Heading', 'nt-landium' ),
				'value'       => array(
					esc_html__('Show', 	'nt-landium' )	=> 'show',
					esc_html__('Hide', 	'nt-landium' )	=> 'hide',
				),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Section heading', 'nt-landium' ),
				'param_name'    => 'section_heading',
				'description'   => esc_html__("Add heading for pricing section", "nt-landium"),
				'group' 	  	=> esc_html__('Heading', 'nt-landium' ),
				'dependency' 	=> array(
						'element' 	=> 'heading_display',
						'value'   	=> 'show'
					)
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Section description', 'nt-landium' ),
				'param_name'    => 'section_desc',
				'description'   => esc_html__("Add description for pricing section", "nt-landium"),
				'group' 	  	=> esc_html__('Heading', 'nt-landium' ),
				'dependency' 	=> array(
						'element' 	=> 'heading_display',
						'value'   	=> 'show'
					)
			),
			array(
				"type" 		  	=> "attach_image",
				"heading" 	  	=> esc_html__("Center image", "nt-landium"),
				"param_name"  	=> "centerimg",
				"description" 	=> esc_html__("Add your center image", "nt-landium"),
				'group' 	  	=> esc_html__('Heading', 'nt-landium' ),
			),
		array(
			'type'        => 'param_group',
			'heading'     => esc_html__('Features item', 'nt-landium' ),
			'param_name'  => 'featuresiconloop',
			'group' 	  => esc_html__('Features', 'nt-landium' ),			
			'params' 	  => array(

				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Item icon type', 'nt-landium' ),
					'param_name'  => 'icon_type',
					'description' => esc_html__('You can select icon type image or fonticon', 'nt-landium' ),
					'value'       => array(
						esc_html__('Select icon type', 	'nt-landium' )	=> '',
						esc_html__('Font icon', 	'nt-landium' )	=> 'fonticon',
						esc_html__('Image icon', 	'nt-landium' )	=> 'imgicon',
					),
				),
				//left section
				array(
					"type" 			  => "textfield",
					"heading" 		  => esc_html__("Fonticon name", "nt-landium"),
					"param_name" 	  => "l_item_fonticon",
					"description" 	  => esc_html__("Add left icon name(fonticon class name). example : fa fa-facebook", "nt-landium"),
					'dependency' 	=> array(
						'element' 	=> 'icon_type',
						'value'   	=> 'fonticon'
					)
				),
				array(
					"type" 		  	=> "attach_image",
					"heading" 	  	=> esc_html__("Left image icon", "nt-landium"),
					"param_name"  	=> "l_itemimg_icon",
					"description" 	=> esc_html__("Add your left image icon", "nt-landium"),
					'dependency' 	=> array(
						'element' 	=> 'icon_type',
						'value'   	=> 'imgicon'
					)
				),
				array(
					"type" 			  => "textfield",
					"heading" 		  => esc_html__("Left title", "nt-landium"),
					"param_name" 	  => "l_item_title",
					"description" 	  => esc_html__("Add left title for item.", "nt-landium"),
				),
				array(
					"type" 			  => "textarea",
					"heading" 		  => esc_html__("Left detail", "nt-landium"),
					"param_name" 	  => "l_item_desc",
					"description" 	  => esc_html__("Add left detail for item.", "nt-landium"),
				),
				//right section
				array(
					"type" 			  => "textfield",
					"heading" 		  => esc_html__("Right fonticon name", "nt-landium"),
					"param_name" 	  => "r_item_fonticon",
					"description" 	  => esc_html__("Add right icon name(fonticon class name). example : fa fa-facebook", "nt-landium"),
					'dependency' 	=> array(
						'element' 	=> 'icon_type',
						'value'   	=> 'fonticon'
					)
				),
				array(
					"type" 		  	=> "attach_image",
					"heading" 	  	=> esc_html__("Right image icon", "nt-landium"),
					"param_name"  	=> "r_itemimg_icon",
					"description" 	=> esc_html__("Add your right image icon", "nt-landium"),
					'dependency' 	=> array(
						'element' 	=> 'icon_type',
						'value'   	=> 'imgicon'
					)
				),
				array(
					"type" 			  => "textfield",
					"heading" 		  => esc_html__("Right title", "nt-landium"),
					"param_name" 	  => "r_item_title",
					"description" 	  => esc_html__("Add right title for item.", "nt-landium"),
				),
				array(
					"type" 			  => "textarea",
					"heading" 		  => esc_html__("Right detail", "nt-landium"),
					"param_name" 	  => "r_item_desc",
					"description" 	  => esc_html__("Add right detail for item.", "nt-landium"),
				),
			)
		),
			array(
				'type'          => 'css_editor',
				'heading'       => esc_html__('Background CSS', 'nt-landium' ),
				'param_name'    => 'sectionbgcss',
				'group' 	    => esc_html__('Background options', 'nt-landium' ),
			)
		)
   ));
} class NT_Landium_section_featuresicon extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	FEATURES ICON 2 landium
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Landium_featuresicontwo_integrateWithVC' );
function NT_Landium_featuresicontwo_integrateWithVC() {
   vc_map( array(
		"name" 	   => esc_html__( "Features 2 Section", "nt-landium" ),
		"base" 	   => "nt_landium_section_featuresicontwo",
		"category"   => esc_html__( "NT Landium", "nt-landium"),
		"params"     => array(
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Section ID', 'nt-landium' ),
				'param_name'    => 'section_id',
				'description'   => esc_html__("Add Your Section ID for scroll", "nt-landium"),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__('Heading display ( hide or show )', 'nt-landium' ),
				'param_name'  => 'heading_display',
				'description' => esc_html__('You can select hide or show for section heading and description', 'nt-landium' ),
				'group' 	  => esc_html__('Heading', 'nt-landium' ),
				'value'       => array(
					esc_html__('Show', 	'nt-landium' )	=> 'show',
					esc_html__('Hide', 	'nt-landium' )	=> 'hide',
				),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Section heading', 'nt-landium' ),
				'param_name'    => 'section_heading',
				'description'   => esc_html__("Add heading for pricing section", "nt-landium"),
				'group' 	  	=> esc_html__('Heading', 'nt-landium' ),
				'dependency' 	=> array(
						'element' 	=> 'heading_display',
						'value'   	=> 'show'
					)
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Section description', 'nt-landium' ),
				'param_name'    => 'section_desc',
				'description'   => esc_html__("Add description for pricing section", "nt-landium"),
				'group' 	  	=> esc_html__('Heading', 'nt-landium' ),
				'dependency' 	=> array(
						'element' 	=> 'heading_display',
						'value'   	=> 'show'
					)
			),
			array(
				"type" 		  	=> "attach_image",
				"heading" 	  	=> esc_html__("Center image", "nt-landium"),
				"param_name"  	=> "centerimg",
				"description" 	=> esc_html__("Add your center image", "nt-landium"),
				'group' 	  	=> esc_html__('Heading', 'nt-landium' ),
			),
		array(
			'type'        => 'param_group',
			'heading'     => esc_html__('Features item', 'nt-landium' ),
			'param_name'  => 'featuresiconloop',
			'group' 	  => esc_html__('Features', 'nt-landium' ),			
			'params' 	  => array(

				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Item icon type', 'nt-landium' ),
					'param_name'  => 'icon_type',
					'description' => esc_html__('You can select icon type image or fonticon', 'nt-landium' ),
					'value'       => array(
						esc_html__('Select icon type', 	'nt-landium' )	=> '',
						esc_html__('Font icon', 	'nt-landium' )	=> 'fonticon',
						esc_html__('Image icon', 	'nt-landium' )	=> 'imgicon',
					),
				),
				//left section
				array(
					"type" 			  => "textfield",
					"heading" 		  => esc_html__("Fonticon name", "nt-landium"),
					"param_name" 	  => "l_item_fonticon",
					"description" 	  => esc_html__("Add left icon name(fonticon class name). example : fa fa-facebook", "nt-landium"),
					'dependency' 	=> array(
						'element' 	=> 'icon_type',
						'value'   	=> 'fonticon'
					)
				),
				array(
					"type" 		  	=> "attach_image",
					"heading" 	  	=> esc_html__("Left image icon", "nt-landium"),
					"param_name"  	=> "l_itemimg_icon",
					"description" 	=> esc_html__("Add your left image icon", "nt-landium"),
					'dependency' 	=> array(
						'element' 	=> 'icon_type',
						'value'   	=> 'imgicon'
					)
				),
				array(
					"type" 			  => "textfield",
					"heading" 		  => esc_html__("Left title", "nt-landium"),
					"param_name" 	  => "l_item_title",
					"description" 	  => esc_html__("Add left title for item.", "nt-landium"),
				),
				array(
					"type" 			  => "textarea",
					"heading" 		  => esc_html__("Left detail", "nt-landium"),
					"param_name" 	  => "l_item_desc",
					"description" 	  => esc_html__("Add left detail for item.", "nt-landium"),
				),
				//right section
				array(
					"type" 			  => "textfield",
					"heading" 		  => esc_html__("Right fonticon name", "nt-landium"),
					"param_name" 	  => "r_item_fonticon",
					"description" 	  => esc_html__("Add right icon name(fonticon class name). example : fa fa-facebook", "nt-landium"),
					'dependency' 	=> array(
						'element' 	=> 'icon_type',
						'value'   	=> 'fonticon'
					)
				),
				array(
					"type" 		  	=> "attach_image",
					"heading" 	  	=> esc_html__("Right image icon", "nt-landium"),
					"param_name"  	=> "r_itemimg_icon",
					"description" 	=> esc_html__("Add your right image icon", "nt-landium"),
					'dependency' 	=> array(
						'element' 	=> 'icon_type',
						'value'   	=> 'imgicon'
					)
				),
				array(
					"type" 			  => "textfield",
					"heading" 		  => esc_html__("Right title", "nt-landium"),
					"param_name" 	  => "r_item_title",
					"description" 	  => esc_html__("Add right title for item.", "nt-landium"),
				),
				array(
					"type" 			  => "textarea",
					"heading" 		  => esc_html__("Right detail", "nt-landium"),
					"param_name" 	  => "r_item_desc",
					"description" 	  => esc_html__("Add right detail for item.", "nt-landium"),
				),
			)
		),
			array(
				'type'          => 'css_editor',
				'heading'       => esc_html__('Background CSS', 'nt-landium' ),
				'param_name'    => 'sectionbgcss',
				'group' 	    => esc_html__('Background options', 'nt-landium' ),
			)
		)
   ));
} class NT_Landium_section_featuresicontwo extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	HOW IT WORKS landium
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Landium_howitworks_integrateWithVC' );
function NT_Landium_howitworks_integrateWithVC() {
   vc_map( array(
		"name" 	   => esc_html__( "How It Works Section", "nt-landium" ),
		"base" 	   => "nt_landium_section_howitworks",
		"category"   => esc_html__( "NT Landium", "nt-landium"),
		"params"     => array(
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Section ID', 'nt-landium' ),
				'param_name'    => 'section_id',
				'description'   => esc_html__("Add Your Section ID for scroll", "nt-landium"),
			),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__('Heading display ( hide or show )', 'nt-landium' ),
			'param_name'  => 'heading_display',
			'description' => esc_html__('You can select hide or show for section heading and description', 'nt-landium' ),
			'group' 	  => esc_html__('Heading', 'nt-landium' ),
			'value'       => array(
				esc_html__('Show', 	'nt-landium' )	=> 'show',
				esc_html__('Hide', 	'nt-landium' )	=> 'hide',
			),
		),
		array(
			'type'          => 'textarea',
			'heading'       => esc_html__('Section heading', 'nt-landium' ),
			'param_name'    => 'section_heading',
			'description'   => esc_html__("Add heading for pricing section", "nt-landium"),
			'group' 	  	=> esc_html__('Heading', 'nt-landium' ),
			'dependency' 	=> array(
					'element' 	=> 'heading_display',
					'value'   	=> 'show'
				)
		),
		array(
			'type'          => 'textarea',
			'heading'       => esc_html__('Section description', 'nt-landium' ),
			'param_name'    => 'section_desc',
			'description'   => esc_html__("Add description for pricing section", "nt-landium"),
			'group' 	  	=> esc_html__('Heading', 'nt-landium' ),
			'dependency' 	=> array(
					'element' 	=> 'heading_display',
					'value'   	=> 'show'
				)
		),
		array(
			'type'        => 'param_group',
			'heading'     => esc_html__('Features item', 'nt-landium' ),
			'param_name'  => 'featuresiconloop',
			'group' 	  => esc_html__('Features', 'nt-landium' ),			
			'params' 	  => array(
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Item icon type', 'nt-landium' ),
					'param_name'  => 'icon_type',
					'description' => esc_html__('You can select icon type image or fonticon', 'nt-landium' ),
					'value'       => array(
						esc_html__('Select icon type', 	'nt-landium' )	=> '',
						esc_html__('Font icon', 	'nt-landium' )	=> 'fonticon',
						esc_html__('Image icon', 	'nt-landium' )	=> 'imgicon',
					),
				),
				//left section
				array(
					"type" 			  => "textfield",
					"heading" 		  => esc_html__("Fonticon name", "nt-landium"),
					"param_name" 	  => "item_fonticon",
					"description" 	  => esc_html__("Add icon name(fonticon class name). example : fa fa-facebook", "nt-landium"),
					'dependency' 	=> array(
						'element' 	=> 'icon_type',
						'value'   	=> 'fonticon'
					)
				),
				array(
					"type" 		  	=> "attach_image",
					"heading" 	  	=> esc_html__("image icon", "nt-landium"),
					"param_name"  	=> "itemimg_icon",
					"description" 	=> esc_html__("Add your image icon", "nt-landium"),
					'dependency' 	=> array(
						'element' 	=> 'icon_type',
						'value'   	=> 'imgicon'
					)
				),
				array(
					"type" 			  => "textfield",
					"heading" 		  => esc_html__("Title", "nt-landium"),
					"param_name" 	  => "item_title",
					"description" 	  => esc_html__("Add title for item.", "nt-landium"),
				),
				array(
					"type" 			  => "textarea",
					"heading" 		  => esc_html__("Detail", "nt-landium"),
					"param_name" 	  => "item_desc",
					"description" 	  => esc_html__("Add detail for item.", "nt-landium"),
				)
			)
		),
			array(
				'type'          => 'css_editor',
				'heading'       => esc_html__('Background CSS', 'nt-landium' ),
				'param_name'    => 'sectionbgcss',
				'group' 	    => esc_html__('Background options', 'nt-landium' ),
			)
		)
   ));
} class NT_Landium_section_howitworks extends WPBakeryShortCode {}


/*-----------------------------------------------------------------------------------*/
/*	GALLERY landium
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Landium_gallery_integrateWithVC' );
function NT_Landium_gallery_integrateWithVC() {
   vc_map( array(
		"name" 	   => esc_html__( "Gallery Section", "nt-landium" ),
		"base" 	   => "nt_landium_section_gallery",
		"category"   => esc_html__( "NT Landium", "nt-landium"),
		"params"     => array(
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Section ID', 'nt-landium' ),
				'param_name'    => 'section_id',
				'description'   => esc_html__("Add Your Section ID for scroll", "nt-landium"),
			),

		array(
			'type'        => 'param_group',
			'heading'     => esc_html__('Gallery item', 'nt-landium' ),
			'param_name'  => 'galleryloop',
			'group' 	  => esc_html__('Gallery', 'nt-landium' ),			
			'params' 	  => array(
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('BG image position', 'nt-landium' ),
					'param_name'  => 'bgimg_pos',
					'description' => esc_html__('You can select gallery bg image position', 'nt-landium' ),
					'value'       => array(
						esc_html__('Select bg image position', 	'nt-landium' )	=> '',
						esc_html__('Left', 	'nt-landium' )	=> 'left',
						esc_html__('Right', 'nt-landium' )	=> 'right',
					),
				),
				array(
					"type" 		  	=> "attach_image",
					"heading" 	  	=> esc_html__("Background image", "nt-landium"),
					"param_name"  	=> "gallerybg_img",
					"description" 	=> esc_html__("Add your background image", "nt-landium"),
					'dependency' 	=> array(
						'element' 	=> 'icon_type',
						'value'   	=> 'imgicon'
					)
				),
				array(
					"type" 			  => "textarea",
					"heading" 		  => esc_html__("Title", "nt-landium"),
					"param_name" 	  => "item_title",
					"description" 	  => esc_html__("Add title for item.", "nt-landium"),
				),
				array(
					"type" 			  => "textarea",
					"heading" 		  => esc_html__("Detail", "nt-landium"),
					"param_name" 	  => "item_desc",
					"description" 	  => esc_html__("Add detail for item.", "nt-landium"),
				)
			)
		),
			array(
				'type'          => 'css_editor',
				'heading'       => esc_html__('Background CSS', 'nt-landium' ),
				'param_name'    => 'sectionbgcss',
				'group' 	    => esc_html__('Background options', 'nt-landium' ),
			)
		)
   ));
} class NT_Landium_section_gallery extends WPBakeryShortCode {}


/*-----------------------------------------------------------------------------------*/
/*	VIDEO  landium
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Landium_video_integrateWithVC' );
function NT_Landium_video_integrateWithVC() {
   vc_map( array(
		"name" 	   => esc_html__( "Video Section", "nt-landium" ),
		"base" 	   => "nt_landium_section_video",
		"category"   => esc_html__( "NT Landium", "nt-landium"),
		"params"     => array(
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Section ID', 'nt-landium' ),
				'param_name'    => 'section_id',
				'description'   => esc_html__("Add section ID for scrolling", "nt-landium"),
			),
			array(
				"type" 		  	=> "attach_image",
				"heading" 	  	=> esc_html__("BG image", "nt-landium"),
				"param_name"  	=> "video_bgimg",
				"description" 	=> esc_html__("Add background image for video section", "nt-landium"),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Video(Youtube) URL', 'nt-landium' ),
				'param_name'    => 'youtubeurl',
				'description'   => esc_html__("Add youtube video URL example: https://www.youtube.com/embed/1zG1iq9LZ2U", "nt-landium"),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Heading', 'nt-landium' ),
				'param_name'    => 'section_heading',
				'description'   => esc_html__("Add heading for this section", "nt-landium"),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Description', 'nt-landium' ),
				'param_name'    => 'section_desc',
				'description'   => esc_html__("Add description for this section", "nt-landium"),
			),
			 array(
				'type'        => 'css_editor',
				'heading'     => esc_html__('Background CSS', 'nt-landium'),
				'param_name'  => 'sectionbgcss',
				'group'       => esc_html__('Background options', 'nt-landium'),
			)
		)
   ));
} class NT_Landium_section_video extends WPBakeryShortCode {}


/*-----------------------------------------------------------------------------------*/
/*	PRICING landium
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Landium_section_pricing_integrateWithVC' );
function NT_Landium_section_pricing_integrateWithVC() {
   vc_map( array(
      "name"       => esc_html__("Pricing ( Plugin )", "nt-landium"),
      "base"       => "nt_landium_section_pricing",
	  "icon"       => "icon-wpb-row",
	  "category"   => esc_html__("NT Landium", "nt-landium"),
      "params"     => array(
		 array(
            'type'        => 'textfield',
            'heading'     => esc_html__('Section ID', 'nt-landium'),
            'param_name'  => 'section_id',
            'description' => esc_html__('Add your Section ID', 'nt-landium'),
        ),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__('Heading display ( hide or show )', 'nt-landium' ),
			'param_name'  => 'heading_display',
			'description' => esc_html__('You can select hide or show for section heading and description', 'nt-landium' ),
			'group' 	  => esc_html__('Heading', 'nt-landium' ),
			'value'       => array(
				esc_html__('Show', 	'nt-landium' )	=> 'show',
				esc_html__('Hide', 	'nt-landium' )	=> 'hide',
			),
		),
		array(
			'type'          => 'textarea',
			'heading'       => esc_html__('Section heading', 'nt-landium' ),
			'param_name'    => 'section_heading',
			'description'   => esc_html__("Add heading for pricing section", "nt-landium"),
			'group' 	  	=> esc_html__('Heading', 'nt-landium' ),
			'dependency' 	=> array(
					'element' 	=> 'heading_display',
					'value'   	=> 'show'
				)
		),
		array(
			'type'          => 'textarea',
			'heading'       => esc_html__('Section description', 'nt-landium' ),
			'param_name'    => 'section_desc',
			'description'   => esc_html__("Add description for pricing section", "nt-landium"),
			'group' 	  	=> esc_html__('Heading', 'nt-landium' ),
			'dependency' 	=> array(
					'element' 	=> 'heading_display',
					'value'   	=> 'show'
				)
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__('Pack Style', 'nt-landium' ),
			'param_name'  => 'pack_style',
			'description' => esc_html__('You can select pricing pack color style', 'nt-landium' ),
			'group' 	  => esc_html__('Post Options', 'nt-landium' ),
			'value'       => array(
				esc_html__('Style 1 ( Different Color )', 	'nt-landium' )	=> '1',
				esc_html__('Style 2 ( Simple color )', 	'nt-landium' )	=> '2',
			),
		),
		array(
			'type'        => 'vc_link',
			'heading'     => esc_html__('Price Button URL', 'nt-landium'),
			'param_name'  => 'pricelink',
			'description' => esc_html__('Add link for price button.', 'nt-landium'),
			'group' 	  => esc_html__('Post Options', 'nt-landium' ),
		),
        array(
            'type'        => 'textfield',
            'heading'     => esc_html__('Price Table Count', 'nt-landium' ),
            'param_name'  => 'post_number',
			'group'       => esc_html__('Post Options', 'nt-landium'),
            'description' => esc_html__('You can control with number your price tables.Please enter a number', 'nt-landium'),
        ),
        array(
            'type'        => 'textfield',
            'heading'     => esc_html__('Category', 'nt-landium' ),
            'param_name'  => 'price_category',
			'group'       => esc_html__('Post Options', 'nt-landium'),
            'description' => esc_html__('Enter Price table category or write all', 'nt-landium'),
        ),
        array(
            'type'        => 'textfield',
            'heading'     => esc_html__('Order', 'nt-landium' ),
            'param_name'  => 'order',
			'group'       => esc_html__('Post Options', 'nt-landium'),
            'description' => esc_html__('Enter Price table order. DESC or ASC', 'nt-landium'),
        ),
        array(
            'type'        => 'textfield',
            'heading'     => esc_html__('Orderby', 'nt-landium' ),
            'param_name'  => 'orderby',
			'group'       => esc_html__('Post Options', 'nt-landium'),
            'description' => esc_html__('Enter Price table orderby. Default is : date', 'nt-landium'),
        ),
        array(
            'type'        => 'css_editor',
            'heading'     => esc_html__('Background CSS', 'nt-landium'),
            'param_name'  => 'sectionbgcss',
            'group'       => esc_html__('Background options', 'nt-landium'),
        )
    ),
   )
 );
}
class NT_Landium_section_pricing extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	TEAM Landium
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'NT_Landium_section_team_integrateWithVC' );
function NT_Landium_section_team_integrateWithVC() {
   vc_map( array(
      "name"       => esc_html__("TEAM ( Plugin )", "nt-landium"),
      "base"       => "nt_landium_section_team",
	  "icon"       => "icon-wpb-row",
	  "category"   => esc_html__("NT Landium", "nt-landium"),
      "params"     => array(
		 array(
            'type'        => 'textfield',
            'heading'     => esc_html__('Section ID', 'nt-landium'),
            'param_name'  => 'section_id',
            'description' => esc_html__('Add your section ID for scrolling', 'nt-landium'),
        ),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__('Heading display ( hide or show )', 'nt-landium' ),
			'param_name'  => 'heading_display',
			'description' => esc_html__('You can select hide or show for section heading and description', 'nt-landium' ),
			'group' 	  => esc_html__('Heading', 'nt-landium' ),
			'value'       => array(
				esc_html__('Show', 	'nt-landium' )	=> 'show',
				esc_html__('Hide', 	'nt-landium' )	=> 'hide',
			),
		),
		array(
			'type'          => 'textarea',
			'heading'       => esc_html__('Section heading', 'nt-landium' ),
			'param_name'    => 'section_heading',
			'description'   => esc_html__("Add heading for pricing section", "nt-landium"),
			'group' 	  	=> esc_html__('Heading', 'nt-landium' ),
			'dependency' 	=> array(
					'element' 	=> 'heading_display',
					'value'   	=> 'show'
				)
		),
		array(
			'type'          => 'textarea',
			'heading'       => esc_html__('Section description', 'nt-landium' ),
			'param_name'    => 'section_desc',
			'description'   => esc_html__("Add description for pricing section", "nt-landium"),
			'group' 	  	=> esc_html__('Heading', 'nt-landium' ),
			'dependency' 	=> array(
					'element' 	=> 'heading_display',
					'value'   	=> 'show'
				)
		),
        array(
            'type'        => 'textfield',
            'heading'     => esc_html__('Team post count', 'nt-landium' ),
            'param_name'  => 'post_number',
			'group'       => esc_html__('Post Options', 'nt-landium'),
            'description' => esc_html__('You can control with number your team members post.Please enter a number', 'nt-landium'),
        ),
        array(
            'type'        => 'textfield',
            'heading'     => esc_html__('Category', 'nt-landium' ),
            'param_name'  => 'team_category',
			'group'       => esc_html__('Post Options', 'nt-landium'),
            'description' => esc_html__('Enter Team category or write all', 'nt-landium'),
        ),
        array(
            'type'        => 'textfield',
            'heading'     => esc_html__('order', 'nt-landium' ),
            'param_name'  => 'order',
			'group'       => esc_html__('Post Options', 'nt-landium'),
            'description' => esc_html__('Enter Team order. DESC or ASC', 'nt-landium'),
        ),
        array(
            'type'        => 'textfield',
            'heading'     => esc_html__('orderby', 'nt-landium' ),
            'param_name'  => 'orderby',
			'group'       => esc_html__('Post Options', 'nt-landium'),
            'description' => esc_html__('Enter Team orderby. Default is : date', 'nt-landium'),
        ),
		array(
			'type'          => 'css_editor',
			'heading'       => esc_html__('Background CSS', 'nt-landium' ),
			'param_name'    => 'sectionbgcss',
			'group' 	    => esc_html__('Background options', 'nt-landium' ),
		),
	),
));
}
class NT_Landium_section_team extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	APP STORE landium
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Landium_appstore_integrateWithVC' );
function NT_Landium_appstore_integrateWithVC() {
   vc_map( array(
		"name" 	   => esc_html__( "App store Section", "nt-landium" ),
		"base" 	   => "nt_landium_section_appstore",
		"category"   => esc_html__( "NT Landium", "nt-landium"),
		"params"     => array(
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Section ID', 'nt-landium' ),
				'param_name'    => 'section_id',
				'description'   => esc_html__("Add Your Section ID for scroll", "nt-landium"),
			),
			array(
				"type" 		  	=> "attach_image",
				"heading" 	  	=> esc_html__("BG parallax image", "nt-landium"),
				"param_name"  	=> "appbgimg",
				"description" 	=> esc_html__("Add background parallax image", "nt-landium"),
			),
			array(
				"type" 		  	=> "attach_image",
				"heading" 	  	=> esc_html__("Left image", "nt-landium"),
				"param_name"  	=> "leftimg",
				"description" 	=> esc_html__("Add left image", "nt-landium"),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Heading', 'nt-landium' ),
				'param_name'    => 'section_heading',
				'description'   => esc_html__("Add heading for this section", "nt-landium"),
				'group' 	  	=> esc_html__('Right Section', 'nt-landium' ),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Description', 'nt-landium' ),
				'param_name'    => 'section_desc',
				'description'   => esc_html__("Add description for this section", "nt-landium"),
				'group' 	  	=> esc_html__('Right Section', 'nt-landium' ),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Description 2', 'nt-landium' ),
				'param_name'    => 'section_desc2',
				'description'   => esc_html__("Add description second for this section", "nt-landium"),
				'group' 	  	=> esc_html__('Right Section', 'nt-landium' ),
			),
			array(
				'type'          => 'vc_link',
				'heading'       => esc_html__('Button 1(Link)', 'nt-landium' ),
				'param_name'    => 'herobtnlink1',
				'description'   => esc_html__('Add custom link.', 'nt-landium' ),
				'group' 	  	=> esc_html__('Button', 'nt-landium' ),
			),
			array(
				"type" 		  	=> "attach_image",
				"heading" 	  	=> esc_html__("Appstore image", "nt-landium"),
				"param_name"  	=> "appstoreimg",
				"description" 	=> esc_html__("Add your custom button image", "nt-landium"),
				'group' 	  	=> esc_html__('Button', 'nt-landium' ),
			),
			array(
				'type'          => 'vc_link',
				'heading'       => esc_html__('Button 2(Link)', 'nt-landium' ),
				'param_name'    => 'herobtnlink2',
				'description'   => esc_html__('Add custom link.', 'nt-landium' ),
				'group' 	  	=> esc_html__('Button', 'nt-landium' ),
			),
			array(
				"type" 		  	=> "attach_image",
				"heading" 	  	=> esc_html__("Playstore image", "nt-landium"),
				"param_name"  	=> "playstoreimg",
				"description" 	=> esc_html__("Add your custom button image", "nt-landium"),
				'group' 	  	=> esc_html__('Button', 'nt-landium' ),
			)
		)
   ));
} class NT_Landium_section_appstore extends WPBakeryShortCode {}

// Filter to replace default css class names for vc_row shortcode and vc_column
add_filter( 'vc_shortcodes_css_class', 'nt_landium_custom_css_classes_for_vc_row_and_vc_column', 10, 2 );
function nt_landium_custom_css_classes_for_vc_row_and_vc_column( $class_string, $tag ) {
  if (  $tag == 'vc_row_inner' ) {
    $class_string = str_replace( 'vc_row-fluid', 'container bootstrap', $class_string ); // This will replace "vc_row-fluid" with "my_row-fluid"
  }
  return $class_string; // Important: you should always return modified or original $class_string
}