<?php

add_filter( 'rwmb_meta_boxes', 'nt_landium_register_meta_boxes' );
function nt_landium_register_meta_boxes( $meta_boxes ) {
$prefix = 'nt_landium_';
$meta_boxes = array();


/* ----------------------------------------------------- */
// Frontpage Settings
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'id' => 'pagesettings',
	'title' => 'Page Settings',
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'high',
	'hide'   	=> array(
		'template'    => array( 'one-page-template.php' )
	),
	'fields' => array(
		
		// SELECT BOX

		array(
			'type' 		=> 'heading',
			'id'   		=> 'page_design_section',
			'name'		=> esc_html__( 'Page Title Options', 'nt-landium' ),
		),
		
		array(
			'name' 		=> esc_html__( 'Disable Page Title', 'nt-landium' ),
			'id'   		=> $prefix . "disable_title",
			'type' 		=> 'checkbox',
			'std'  		=> 0,
		),

		array(
			'name'		=> esc_html__( 'Alternate Page Title', 'nt-landium' ),
			'id'		=> $prefix . "alt_title",
			'clone'		=> false,
			'type'		=> 'text'
		),
		array(
			'type' 		=> 'divider',
			'id'   		=> 'fake_divider_id',
		),	
		
		array(
			'type' 		=> 'heading',
			'id'   		=> 'page_design_section',
			'name'		=> esc_html__( 'Subtitle Options', 'nt-landium' ),
		),
		array(
			'name' 		=> esc_html__( 'Disable Page Subtitle', 'nt-landium' ),
			'id'  		=> $prefix . "disable_subtitle",
			'type' 		=> 'checkbox',
			'std'  		=> 0,
		),
		array(
			'name' => esc_html__( 'Page Subtitle / Rich Text Editor', 'nt-landium' ),
			'id'		=> $prefix . "subtitle",
			'type' => 'wysiwyg',
			'raw'  => false,
			'options' => array(
				'textarea_rows' => 4,
				'teeny'         => true,
				'media_buttons' => false,
			),
		),

		array(
			'type' => 'divider',
			'id'   => 'fake_divider_id',
		),

		array(
			'type' 		=> 'heading',
			'id'   		=> 'page_design_section',
			'name'		=> esc_html__( 'Design Options', 'nt-landium' ),
		),
		//page bg image
		array(
			'name' 				=> esc_html__( 'Heading background Image', 'nt-conversi' ),
			'id'               	=> $prefix . "page_bg_image",
			'type'             	=> 'image_advanced',
			'max_file_uploads' 	=> 1,
		),
		array(
			'name' 		=> esc_html__( 'Disable background image mask color', 'nt-conversi' ),
			'id'   		=> $prefix . "disable_page_mask",
			'type' 		=> 'checkbox',
			'std'  		=> 0,
		),
		array(
			'name' 		=> esc_html__( 'Background image mask color', 'nt-conversi' ),
			'id'   		=> $prefix . "page_mask_color",
			'type' 		=> 'color',
		),
		array(
			'name' 		=> esc_html__( 'Mask color opacity', 'nt-conversi' ),
			'id'   		=> $prefix . "page_mask_opacity",
			'type' 		=> 'number',
			'min'  		=> 0,
			'max'  		=> 1,
			'step' 		=> 0.1,
		),
		// COLOR
		array(
			'name' => esc_html__( 'Page background color', 'nt-landium' ),
			'id'   => $prefix . "pagebgcolor",
			'type' => 'color',
		),
		array(
			'name' 		=> esc_html__( 'Page title color', 'nt-conversi' ),
			'id'   		=> $prefix . "pagetitlecolor",
			'type' 		=> 'color',
		),
		array(
			'name' 		=> esc_html__( 'Page subtitle color', 'nt-conversi' ),
			'id'   		=> $prefix . "pagesubtitlecolor",
			'type' 		=> 'color',
		),
		array(
			'name' => esc_html__( 'Page header padding top', 'nt-landium' ),
			'id'   => $prefix . "headerptop",
			'type' => 'number',
			'min'  => 0,
			'step' => 1,
		),
		
		array(
			'name' => esc_html__( 'Page header padding bottom', 'nt-landium' ),
			'id'   => $prefix . "headerpbottom",
			'type' => 'number',
			'min'  => 0,
			'step' => 1,
		),
			
		// SELECT BOX
		array(
			'name'    			=> esc_html__( 'Page sidebar', 'nt-landium' ),
			'id'      			=> $prefix . "pagelayout",
			'type'     			=> 'select',
			'options'  			=> array(
				'left-sidebar' 	=> esc_html__( 'left',  'nt-landium' ),
				'right-sidebar' => esc_html__( 'right', 'nt-landium' ),
				'full-width' 	=> esc_html__( 'full',  'nt-landium' ),
			),
			'multiple'    		=> false,
			'std'         		=> 'right-sidebar',
			'placeholder' 		=> esc_html__( 'Select an Item', 'nt-landium' ),
		),

		
	)
);

$meta_boxes[] = array(
	'title' 		=> esc_html__( 'Metabox menu', 'nt-landium' ),
	'pages'    		=> array( 'page' ),
	'clone-group' 	=> 'onepage-clone-group','clone-group' => 'onepage-clone-group',
	'id' 			=> 'page_menu',
	'context' 		=> 'side',
	'priority' 		=> 'low',

	'show'   		=> array(
		'template'    => array( 'one-page-template.php' )
	),

	'fields' 		=> array(
		array(
			'name' => esc_html__('Header menu type', 'nt-landium'),
			'desc' => esc_html__('Select header menu type', 'nt-landium'),
			'id'   => $prefix . 'menutype',
			'type' => 'select',
			'options'  => array(
				'm' => esc_html__( 'Metabox menu', 'nt-landium' ),
				'p' => esc_html__( 'Default Primary menu', 'nt-landium' ),
			),
			'std'         => 'm'
		),
		array(
			'name'  		=> esc_html__( 'Menu item name', 'nt-landium' ),
			'desc'  		=> esc_html__( 'Format: Any text', 'nt-landium' ),
			'id'    		=> $prefix . 'section_name',
			'type'  		=> 'text',
			'std'   		=> esc_html__( 'Menu item name', 'nt-landium' ),
			'class' 		=> 'custom-class',
			'clone' 		=> true,
			'sort_clone' 	=> true,
			'clone-group' 	=> 'onepage-clone-group',
		),
		array(
			'name'  		=> esc_html__( 'Menu item Url', 'nt-landium' ),
			'desc'  		=> esc_html__( 'Format: #sectionname or http://yoururl.com', 'nt-landium' ),
			'id'    		=> $prefix . 'section_url',
			'type'  		=> 'text',
			'std'   		=> esc_html__( '#sectionname', 'nt-landium' ),
			'class' 		=> 'custom-class',
			'clone' 		=> true,
			'sort_clone' 	=> true,
			'clone-group' 	=> 'onepage-clone-group',
		),
	),
);



/* ----------------------------------------------------- */
// PRICE PLUGINS SETTINGS
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'id' 		=> 'eventssettings',
	'title' 	=> esc_html__('Price table', 'nt-landium'),
	'pages' 	=> array( 'price' ),
	'context' 	=> 'normal',
	'priority' 	=> 'high',

	// List of meta fields
	'fields' => array(
		array(
			'name' 		=> esc_html__('Select featured pack', 'nt-landium'),
			'id'		=> $prefix . "bestpack",
			'type'		=> 'select',
			'options'	=> array(
						'price-item__normal' 	=> esc_html__( 'Normal Pack', 'nt-landium' ),
						'price-item__active'	=> esc_html__( 'Best Pack', 'nt-landium' ),
			),
			'multiple'	=> false,
			'std'		=> 'price-item__normal'
		),
		array(
			'name' 		=> esc_html__('Featured pack tag', 'nt-landium'),
			'id'		=> $prefix . "bestpacktag",
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> esc_html__( 'Sale', 'nt-landium' ),
		),
		array(
			'name' 		=> esc_html__('Select pack color', 'nt-landium'),
			'id'		=> $prefix . "packcolor",
			'desc'  	=> esc_html__( 'This option is only for style 1 ( in shortcode Post options)', 'nt-landium' ),
			'type'		=> 'select',
			'options'	=> array(
						'price-item__blue'	=> esc_html__( 'Blue', 'nt-landium' ),
						'price-item__green'	=> esc_html__( 'Green', 'nt-landium' ),
						'price-item__red'	=> esc_html__( 'Red', 	'nt-landium' ),
						'price-item__yellow'=> esc_html__( 'Yellow', 'nt-landium' ),
			),
			'multiple'	=> false,
			'std'		=> 'price-item__blue'
		),
		array(
			'name' 		=> esc_html__('Price pack name', 'nt-landium'),
			'id'		=> $prefix . "packname",
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> esc_html__( 'Standart', 'nt-landium' ),
		),
		array(
			'name' 		=> esc_html__('Currency', 'nt-landium'),
			'id'		=> $prefix . "currency",
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '$'
		),
		array(
			'name' 		=> esc_html__('Price', 'nt-landium'),
			'id'		=> $prefix . "price",
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '399'
		),
		array(
			'name' 		=> esc_html__('Small amount', 'nt-landium'),
			'id'		=> $prefix . "subprice",
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> '99'
		),
		array(
			'name' 		=> esc_html__('Period', 'nt-landium'),
			'id'		=> $prefix . "period",
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> 'per month'
		),

		array(
			'name' 		=> esc_html__('Table Features List', 'nt-landium'),
			'desc'  	=> esc_html__( 'Add features for this pack', 'nt-landium' ),
			'id'    	=> $prefix . 'features_list',
			'type'  	=> 'text',
			'std'   	=> esc_html__( 'Single user account', 'nt-landium' ),
			'class' 	=> 'custom-class',
			'clone' 	=> true,
			'clone-group' => 'my-clone-group','clone-group' => 'my-clone-group',
        ),
		// responsive opt

		array(
			'type' 			=> 'divider',
			'id'   			=> 'fake_divider_7', // Not used, but needed
		),
		array(
			'name'		=> esc_html__( 'Mobile column size', 'nt-landium' ),
			'id'		=> $prefix . "column_mobile",
			'type'		=> 'select',
			'multiple'	=> false,
			'std'		=> 'col-sm-6',
			'options'	=> array(
						''				=> esc_html__( 'Select Custom Column', 'nt-landium' ),
						'col-sm-1'		=> esc_html__( 'col-sm-1', 'nt-landium' ),
						'col-sm-2'		=> esc_html__( 'col-sm-2', 'nt-landium' ),
						'col-sm-3'		=> esc_html__( 'col-sm-3', 'nt-landium' ),
						'col-sm-4'		=> esc_html__( 'col-sm-4', 'nt-landium' ),
						'col-sm-5'		=> esc_html__( 'col-sm-5', 'nt-landium' ),
						'col-sm-6'		=> esc_html__( 'col-sm-6', 'nt-landium' ),
						'col-sm-7'		=> esc_html__( 'col-sm-7', 'nt-landium' ),
						'col-sm-8'		=> esc_html__( 'col-sm-8', 'nt-landium' ),
						'col-sm-9'		=> esc_html__( 'col-sm-9', 'nt-landium' ),
						'col-sm-10'		=> esc_html__( 'col-sm-10', 'nt-landium' ),
						'col-sm-11'		=> esc_html__( 'col-sm-11', 'nt-landium' ),
						'col-sm-12'		=> esc_html__( 'col-sm-12', 'nt-landium' ),
			)
		),
		array(
			'name'		=> esc_html__( 'Desktop column size', 'nt-landium' ),
			'id'		=> $prefix . "column_desk",
			'type'		=> 'select',
			'multiple'	=> false,
			'std'		=> 'col-md-3',
			'options'	=> array(
						''			=> esc_html__( 'Select Custom Column', 'nt-landium' ),
						'col-md-1'	=> esc_html__( 'col-md-1', 'nt-landium' ),
						'col-md-2'	=> esc_html__( 'col-md-2', 'nt-landium' ),
						'col-md-3'	=> esc_html__( 'col-md-3', 'nt-landium' ),
						'col-md-4'	=> esc_html__( 'col-md-4', 'nt-landium' ),
						'col-md-5'	=> esc_html__( 'col-md-5', 'nt-landium' ),
						'col-md-6'	=> esc_html__( 'col-md-6', 'nt-landium' ),
						'col-md-7'	=> esc_html__( 'col-md-7', 'nt-landium' ),
						'col-md-8'	=> esc_html__( 'col-md-8', 'nt-landium' ),
						'col-md-9'	=> esc_html__( 'col-md-9', 'nt-landium' ),
						'col-md-10'	=> esc_html__( 'col-md-10', 'nt-landium' ),
						'col-md-11'	=> esc_html__( 'col-md-11', 'nt-landium' ),
						'col-md-12'	=> esc_html__( 'col-md-12', 'nt-landium' ),
			)
		),
		array(
			'name'		=> esc_html__( 'Column offset size for desktop', 'nt-landium' ),
			'id'		=> $prefix . "column_offset",
			'type'		=> 'select',
			'multiple'	=> false,
			'std'		=> 'col-md-offset-0',
			'options'	=> array(
								''			=> esc_html__( 'Select Column offset', 'nt-landium' ),
						'col-md-offset-0'	=> esc_html__( 'offset-0', 'nt-landium' ),
						'col-md-offset-1'	=> esc_html__( 'offset-1', 'nt-landium' ),
						'col-md-offset-2'	=> esc_html__( 'offset-2', 'nt-landium' ),
						'col-md-offset-3'	=> esc_html__( 'offset-3', 'nt-landium' ),
						'col-md-offset-4'	=> esc_html__( 'offset-4', 'nt-landium' ),
						'col-md-offset-5'	=> esc_html__( 'offset-5', 'nt-landium' ),
						'col-md-offset-6'	=> esc_html__( 'offset-6', 'nt-landium' ),
						'col-md-offset-7'	=> esc_html__( 'offset-7', 'nt-landium' ),
						'col-md-offset-8'	=> esc_html__( 'offset-8', 'nt-landium' ),
						'col-md-offset-9'	=> esc_html__( 'offset-9', 'nt-landium' ),
						'col-md-offset-10'	=> esc_html__( 'offset-10', 'nt-landium' ),
						'col-md-offset-11'	=> esc_html__( 'offset-11', 'nt-landium' ),
						'col-md-offset-12'	=> esc_html__( 'offset-12', 'nt-landium' ),
			)
		),

	)
);

/* ----------------------------------------------------- */
// TEAM PLUGINS SETTINGS
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'title' 		=> esc_html__( 'Team Details', 'nt-landium' ),
	'pages'    		=> array( 'team' ),
	'clone-group' 	=> 'my-clone-group',
	'id' 			=> 'mm_review',
	'context'     	=> 'normal',
	'priority'    	=> 'high',
	'fields' 		=> array(

		array(
			'name' 		=> esc_html__('Team Job', 'nt-landium'),
			'id'		=> $prefix . "team_job",
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> 'Developer'
		),
		array(
			'name' 	=> esc_html__('Social Icon Name', 'nt-landium'),
			'desc' 	=> esc_html__('Format: fa fa-facebook or fonticon class name. Enter social icon name here', 'nt-landium'),
			'id'    => $prefix . 'social_icon',
			'type'  => 'text',
			'std'   => 'facebook',
			'class' => 'custom-class',
			'clone' => true,
			'clone-group' => 'my-clone-group',
		),

		array(
			'name' 	=> esc_html__('Social Url', 'nt-landium'),
			'desc' 	=> esc_html__('Format: http://facebook.com', 'nt-landium'),
			'id'    => $prefix . 'social_url',
			'type'  => 'text',
			'std'   => '#',
			'class' => 'custom-class',
			'clone' => true,
			'clone-group' => 'my-clone-group',
		),
		array(
			'name'		=> esc_html__( 'Select target type', 'nt-landium' ),
			'name' 		=> esc_html__('Select target type', 'nt-landium'),
			'id'		=> $prefix . "social_target",
			'type'		=> 'select',
			'multiple'	=> false,
			'std'		=> '_blank',
			'options'	=> array(
				'_blank'		=> '_blank',
				'_self'			=> '_self',
				'_parent'		=> '_parent',
				'_top'			=> '_top',
			)
		),
		array(
			'type' 			=> 'divider',
			'id'   			=> 'fake_divider_7', // Not used, but needed
		),
		array(
			'name'		=> esc_html__( 'Mobile column size', 'nt-landium' ),
			'id'		=> $prefix . "column_mobile",
			'type'		=> 'select',
			'multiple'	=> false,
			'std'		=> 'col-sm-6',
			'options'	=> array(
						''				=> esc_html__( 'Select Custom Column', 'nt-landium' ),
						'col-sm-1'		=> esc_html__( 'col-sm-1', 'nt-landium' ),
						'col-sm-2'		=> esc_html__( 'col-sm-2', 'nt-landium' ),
						'col-sm-3'		=> esc_html__( 'col-sm-3', 'nt-landium' ),
						'col-sm-4'		=> esc_html__( 'col-sm-4', 'nt-landium' ),
						'col-sm-5'		=> esc_html__( 'col-sm-5', 'nt-landium' ),
						'col-sm-6'		=> esc_html__( 'col-sm-6', 'nt-landium' ),
						'col-sm-7'		=> esc_html__( 'col-sm-7', 'nt-landium' ),
						'col-sm-8'		=> esc_html__( 'col-sm-8', 'nt-landium' ),
						'col-sm-9'		=> esc_html__( 'col-sm-9', 'nt-landium' ),
						'col-sm-10'		=> esc_html__( 'col-sm-10', 'nt-landium' ),
						'col-sm-11'		=> esc_html__( 'col-sm-11', 'nt-landium' ),
						'col-sm-12'		=> esc_html__( 'col-sm-12', 'nt-landium' ),
			)
		),
		array(
			'name'		=> esc_html__( 'Desktop column size', 'nt-landium' ),
			'id'		=> $prefix . "column_desk",
			'type'		=> 'select',
			'multiple'	=> false,
			'std'		=> 'col-md-3',
			'options'	=> array(
						''			=> esc_html__( 'Select Custom Column', 'nt-landium' ),
						'col-md-1'	=> esc_html__( 'col-md-1', 'nt-landium' ),
						'col-md-2'	=> esc_html__( 'col-md-2', 'nt-landium' ),
						'col-md-3'	=> esc_html__( 'col-md-3', 'nt-landium' ),
						'col-md-4'	=> esc_html__( 'col-md-4', 'nt-landium' ),
						'col-md-5'	=> esc_html__( 'col-md-5', 'nt-landium' ),
						'col-md-6'	=> esc_html__( 'col-md-6', 'nt-landium' ),
						'col-md-7'	=> esc_html__( 'col-md-7', 'nt-landium' ),
						'col-md-8'	=> esc_html__( 'col-md-8', 'nt-landium' ),
						'col-md-9'	=> esc_html__( 'col-md-9', 'nt-landium' ),
						'col-md-10'	=> esc_html__( 'col-md-10', 'nt-landium' ),
						'col-md-11'	=> esc_html__( 'col-md-11', 'nt-landium' ),
						'col-md-12'	=> esc_html__( 'col-md-12', 'nt-landium' ),
			)
		),
		array(
			'name'		=> esc_html__( 'Column offset size for desktop', 'nt-landium' ),
			'id'		=> $prefix . "column_offset",
			'type'		=> 'select',
			'multiple'	=> false,
			'std'		=> 'col-md-offset-0',
			'options'	=> array(
								''			=> esc_html__( 'Select Column offset', 'nt-landium' ),
						'col-md-offset-0'	=> esc_html__( 'offset-0', 'nt-landium' ),
						'col-md-offset-1'	=> esc_html__( 'offset-1', 'nt-landium' ),
						'col-md-offset-2'	=> esc_html__( 'offset-2', 'nt-landium' ),
						'col-md-offset-3'	=> esc_html__( 'offset-3', 'nt-landium' ),
						'col-md-offset-4'	=> esc_html__( 'offset-4', 'nt-landium' ),
						'col-md-offset-5'	=> esc_html__( 'offset-5', 'nt-landium' ),
						'col-md-offset-6'	=> esc_html__( 'offset-6', 'nt-landium' ),
						'col-md-offset-7'	=> esc_html__( 'offset-7', 'nt-landium' ),
						'col-md-offset-8'	=> esc_html__( 'offset-8', 'nt-landium' ),
						'col-md-offset-9'	=> esc_html__( 'offset-9', 'nt-landium' ),
						'col-md-offset-10'	=> esc_html__( 'offset-10', 'nt-landium' ),
						'col-md-offset-11'	=> esc_html__( 'offset-11', 'nt-landium' ),
						'col-md-offset-12'	=> esc_html__( 'offset-12', 'nt-landium' ),
			)
		),

		
	)
);


$meta_boxes[] = array(
	'id' 		=> 'portfoliosettings',
	'title' 	=> 'Portfolio Custom Options',
	'pages' 	=> array( 'portfolio' ),
	'context' 	=> 'normal',
	'priority' => 'high',
	'fields' 	=> array(

		array(
			'name'		=> esc_html__( 'Select image link type', 'nt-landium' ),
			'id'		=> $prefix . "image_link_type",
			'type'		=> 'select',
			'desc'  	=> esc_html__( 'The Default Lightbox option for to enable Lightbox and Custom Link option for your custom URL', 'nt-landium' ),
			'options'	=> array(
				'default'		=> 'Default Lightbox',
				'custom'		=> 'Custom Link'
			),
			'multiple'	=> false,
			'std'		=> 'default'
		),

		array(
			'name'		=> esc_html__( 'Custom external link', 'nt-landium' ),
			'id'		=> $prefix . "custom_link_url",
			'clone'		=> false,
			'desc'  	=> esc_html__( 'This option is compatible only Custom Link option.Format : http://facebook.com', 'nt-landium' ),
			'type'		=> 'text',
			'std'		=> '#'
		),

		array(
			'name'		=> esc_html__( 'Select target type', 'nt-landium' ),
			'id'		=> $prefix . "custom_target",
			'type'		=> 'select',
			'desc'  	=> esc_html__( 'This option is compatible only Custom Link option', 'nt-landium' ),
			'multiple'	=> false,
			'std'		=> '_blank',
			'options'	=> array(
				'_blank'		=> '_blank',
				'_self'			=> '_self',
				'_parent'		=> '_parent',
				'_top'			=> '_top',
			)
		),
	)
);




/*-----------------------------------------------------------------------------------*/
/*  Metaboxes for blog posts
/*-----------------------------------------------------------------------------------*/

    /* Gallery Post Format ------------*/

$meta_boxes[] = array(
	'title'    => esc_html__('Gallery Settings', 'nt-landium'),
	'pages'    => array('post'),
	'fields' => array(
		array(
			'name' => esc_html__('Select Images', 'nt-landium'),
			'desc' => esc_html__('Select the images from the media library or upload your new ones.', 'nt-landium'),
			'id'   => $prefix . 'gallery_image',
			'type' => 'image_advanced',
		)
	)
);

    /* Quote Post Format ------------*/

$meta_boxes[] = array(
	'title'    	=> esc_html__('Quote Settings', 'nt-landium'),
	'pages'  	 => array('post'),
	'fields' 	=> array(
		array(
			'name' => esc_html__('The Quote', 'nt-landium'),
			'desc' => esc_html__('Write your quote in this field.', 'nt-landium'),
			'id'   => $prefix . 'quote_text',
			'type' => 'textarea',
			'rows' => 5
		),
		array(
			'name' => esc_html__('The Author', 'nt-landium'),
			'desc' => esc_html__('Enter the name of the author of this quote.', 'nt-landium'),
			'id'   => $prefix . 'quote_author',
			'type' => 'text'
		),
		array(
			'name' => esc_html__('Background Color', 'nt-landium'),
			'desc' => esc_html__('Choose the background color for this quote.', 'nt-landium'),
			'id'   => $prefix . 'quote_bg',
			'type' => 'color'
		),
		array(
			'name' => esc_html__('Background Opacity', 'nt-landium'),
			'desc' => esc_html__('Choose the opacity of the background color.', 'nt-landium'),
			'id'   => $prefix . 'quote_bg_opacity',
			'type' => 'text',
			'std' => 80
		)
	)
);



    /* Audio Post Format ------------*/

$meta_boxes[] 	= array(
	'title'   	=> esc_html__('Audio Settings', 'nt-landium'),
	'pages'    	=> array('post'),
	'fields' 	=> array(
		array(
		'type' => 'heading',
		'name' => esc_html__( 'These settings enable you to embed audio in your posts. Note that for audio, you must supply both MP3 and OGG files to satisfy all browsers. For poster you can select a featured image.', 'nt-landium' ),
		'id'   => 'audio_head'
		),
		array(
			'name' => esc_html__('MP3 File URL', 'nt-landium'),
			'desc' => esc_html__('The URL to the .mp3 audio file.', 'nt-landium'),
			'id'   => $prefix . 'audio_mp3',
			'type' => 'text',
		),
		array(
			'name' => esc_html__('OGA File URL', 'nt-landium'),
			'desc' => esc_html__('The URL to the .oga, .ogg audio file.', 'nt-landium'),
			'id'   => $prefix . 'audio_ogg',
			'type' => 'text',
		),
		array(
			'name' => esc_html__('Divider', 'nt-landium'),
			'desc' => esc_html__('divider.', 'nt-landium'),
			'id'   => $prefix . 'audio_divider',
			'type' => 'divider'
		),
		array(
			'name' => esc_html__('SoundCloud', 'nt-landium'),
			'desc' => esc_html__('Enter the url of the soundcloud audio.', 'nt-landium'),
			'id'   => $prefix . 'audio_sc',
			'type' => 'text',
		),
		array(
			'name' => esc_html__('Color', 'nt-landium'),
			'desc' => esc_html__('Choose the color.', 'nt-landium'),
			'id'   => $prefix . 'audio_sc_color',
			'type' => 'color',
			'std'  => '#ff7700'
		)
	)
);

  

    /* Video Post Format ------------*/

$meta_boxes[] = array(
	'title'    => esc_html__('Video Settings', 'nt-landium'),
	'pages'    => array('post'),
	'fields' => array(
		array(
		'type' => 'heading',
		'name' => esc_html__( 'These settings enable you to embed videos into your posts. Note that for video, you must supply an M4V file to satisfy both HTML5 and Flash solutions. The optional OGV format is used to increase x-browser support for HTML5 browsers such as Firefox and Opera. For the poster, you can select a featured image.', 'nt-landium' ),
		'id'   => 'video_head'
		),
		array(
			'name' => esc_html__('M4V File URL', 'nt-landium'),
			'desc' => esc_html__('The URL to the .m4v video file.', 'nt-landium'),
			'id'   => $prefix . 'video_m4v',
			'type' => 'text',
		),
		array(
			'name' => esc_html__('OGV File URL', 'nt-landium'),
			'desc' => esc_html__('The URL to the .ogv video file.', 'nt-landium'),
			'id'   => $prefix . 'video_ogv',
			'type' => 'text',
		),
		array(
			'name' => esc_html__('WEBM File URL', 'nt-landium'),
			'desc' => esc_html__('The URL to the .webm video file.', 'nt-landium'),
			'id'   => $prefix . 'video_webm',
			'type' => 'text',
		),
		array(
			'name' => esc_html__('Embeded Code', 'nt-landium'),
			'desc' => esc_html__('Select the preview image for this video.', 'nt-landium'),
			'id'   => $prefix . 'video_embed',
			'type' => 'textarea',
			'rows' => 8
		)
	)
);
	
	
/*-----------------------------------------------------------------------------------*/
/*  Metaboxes for portfolio
/*-----------------------------------------------------------------------------------*/

    /* Gallery Post Format ------------*/

    $meta_boxes[] = array(
        'title'    => esc_html__('Gallery Settings', 'nt-landium'),
        'pages'    => array('portfolio'),
        'fields' => array(
            array(
                'name' => esc_html__('Select Images', 'nt-landium'),
                'desc' => esc_html__('Select the images from the media library or upload your new ones.', 'nt-landium'),
                'id'   => $prefix . 'gallery_image',
                'type' => 'image_advanced',
            )
        )
    );

    /* Audio Post Format ------------*/

    $meta_boxes[] = array(
        'title'    => esc_html__('Audio Settings', 'nt-landium'),
        'pages'    => array('portfolio'),
        'fields' => array(
            array(
            'type' => 'heading',
            'name' => esc_html__( 'These settings enable you to embed audio in your posts. Note that for audio, you must supply both MP3 and OGG files to satisfy all browsers. For poster you can select a featured image.', 'nt-landium' ),
            'id'   => 'audio_head'
            ),
            array(
                'name' => esc_html__('MP3 File URL', 'nt-landium'),
                'desc' => esc_html__('The URL to the .mp3 audio file.', 'nt-landium'),
                'id'   => $prefix . 'audio_mp3',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('OGA File URL', 'nt-landium'),
                'desc' => esc_html__('The URL to the .oga, .ogg audio file.', 'nt-landium'),
                'id'   => $prefix . 'audio_ogg',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Divider', 'nt-landium'),
                'desc' => esc_html__('divider.', 'nt-landium'),
                'id'   => $prefix . 'audio_divider',
                'type' => 'divider'
            ),
            array(
                'name' => esc_html__('SoundCloud', 'nt-landium'),
                'desc' => esc_html__('Enter the url of the soundcloud audio.', 'nt-landium'),
                'id'   => $prefix . 'audio_sc',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Color', 'nt-landium'),
                'desc' => esc_html__('Choose the color.', 'nt-landium'),
                'id'   => $prefix . 'audio_sc_color',
                'type' => 'color',
                'std'  => '#ff7700'
            )
        )
    );

    /* Video Post Format ------------*/

    $meta_boxes[] = array(
        'title'    => esc_html__('Video Settings', 'nt-landium'),
        'pages'    => array('portfolio'),
        'fields' => array(
            array(
            'type' => 'heading',
            'name' => esc_html__( 'These settings enable you to embed videos into your posts. Note that for video, you must supply an M4V file to satisfy both HTML5 and Flash solutions. The optional OGV format is used to increase x-browser support for HTML5 browsers such as Firefox and Opera. For the poster, you can select a featured image.', 'nt-landium' ),
            'id'   => 'video_head'
            ),
            array(
                'name' => esc_html__('M4V File URL', 'nt-landium'),
                'desc' => esc_html__('The URL to the .m4v video file.', 'nt-landium'),
                'id'   => $prefix . 'video_m4v',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('OGV File URL', 'nt-landium'),
                'desc' => esc_html__('The URL to the .ogv video file.', 'nt-landium'),
                'id'   => $prefix . 'video_ogv',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('WEBM File URL', 'nt-landium'),
                'desc' => esc_html__('The URL to the .webm video file.', 'nt-landium'),
                'id'   => $prefix . 'video_webm',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Embeded Code', 'nt-landium'),
                'desc' => esc_html__('Select the preview image for this video.', 'nt-landium'),
                'id'   => $prefix . 'video_embed',
                'type' => 'textarea',
                'rows' => 8
            )
        )
    );

  //end
 return $meta_boxes;
}

?>