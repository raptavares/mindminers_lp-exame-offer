<?php 

function nt_landium_custom_preloader_script() { ?>

<?php  if ( function_exists( 'ot_get_option' ) ) : ?>

	<?php //CUSTOM PRELOADER AND CUSTOM JAVASCRIPT  ?>
	<?php if ( ot_get_option( 'nt_landium_custom_preloader_js' ) !='off' && ot_get_option( 'nt_landium_preloaderjs' ) !='' ) : ?>

		<script id="nt-landium-custom-preloader-and-custom-script" type="text/javascript">

		<?php if(ot_get_option('nt_landium_preloaderjs')) { echo  ot_get_option( 'nt_landium_preloaderjs' ) ; }  ?>

		</script>

	<?php endif; ?>

	<?php //CUSTOM PRELOADER AND DEFAULT JAVASCRIPT ?>
	<?php if ( ot_get_option( 'nt_landium_custom_preloader_js' ) =='off' && ot_get_option( 'nt_landium_custom_preloader' ) !='' ) : ?>

		<script id="nt-landium-custom-preloader-and-default-script" type="text/javascript">

			jQuery(document).ready(function($) {
				"use strict";

				jQuery(window).load(function() {
					// Animate loader off screen
					jQuery(".nt-landium-custom-preloader").fadeOut("slow");;
				});

			})(jQuery);

		</script>

	<?php endif;?>
<?php endif; ?>
<?php }

add_action('wp_footer', 'nt_landium_custom_preloader_script');


function nt_landium_css_options() {

    /* CSS to output */
    $theCSS = '';
	
	// admin bar
	if( is_admin_bar_showing() && ! is_customize_preview() ) {
		 $theCSS .= '.template-nav-style-1, .template-nav-style-2 {
			margin-top: 72px;
		}
		#top-bar.fixed{ margin-top: 32px !important;}
		
		@media (max-width: 992px){
			#top-bar.fixed{ margin-top: 0px !important;}
			body.admin-bar{ position: inherit !important; }
			#top-bar {
				top: 32px !important;
			}
		}
		@media (max-width: 480px){
			#top-bar.fixed{ margin-top: 46px;top: 0px;}
		}
		';
	} // end admin
	
	// theme defaults
	$theCSS .= '.start-screen--static-bg--style-1 .start-screen__static-bg:after { 
		content: ""; 
		position: absolute; 
		left: 0; 
		bottom: 0; 
		width: 100%; 
		height: 115px; 
		background-image: url( '. get_template_directory_uri() . '/images/bevel.png'.'); background-position: 0 0; 
	}

	.b-video .b-video__btn-play i:before {
		opacity: 1;
		background-image: url('. get_template_directory_uri() . '/images/ico_play.png'.');
	}
	
	.b-video .b-video__btn-play i:after {
		opacity: 0;
		background-image: url('. get_template_directory_uri() . '/images/ico_play_hover.png'.');
	}';
	
	function hex2rgb($hex) {
	$hex = str_replace("#", "", $hex);

	if(strlen($hex) == 3) {
	$r = hexdec(substr($hex,0,1).substr($hex,0,1));
	$g = hexdec(substr($hex,1,1).substr($hex,1,1));
	$b = hexdec(substr($hex,2,1).substr($hex,2,1));
	} else {
	$r = hexdec(substr($hex,0,2));
	$g = hexdec(substr($hex,2,2));
	$b = hexdec(substr($hex,4,2));
	}
	$rgb = array($r, $g, $b);

	return $rgb; // returns an array with the rgb values
	}
	
	// color options

	$nt_landium_theme_color = ot_get_option( 'nt_landium_theme_color' ) ;

	
	$custom_color 	= esc_attr( ot_get_option( 'nt_landium_theme_color_one' ) );
	$link_color 	= ot_get_option( 'nt_landium_theme_color_two' ) ;
	$link_hover 	= ot_get_option( 'nt_landium_theme_color_three' ) ;

	if( $nt_landium_theme_color == 'custom' ){

	$one_color = $custom_color;
	$a_color = $link_color;
	$a_hover = ( $link_hover != '') ? $link_hover : $custom_color;

	}else{ 

		$one_color = $nt_landium_theme_color;
		$a_color = '';
		$a_hover = $nt_landium_theme_color;

	}

	$theCSS .= '
	a, .entry-meta li a, #widget-area .widget ul li a, #share-buttons i { color:' . $a_color . ';}
	a:hover, a:focus, .entry-title a:hover, .entry-meta a:hover, #widget-area .widget ul li a:hover, #share-buttons i:hover, .flex-direction-nav a { color:' . $a_hover . ';}
	 a.margin_30.btn:hover, .pager li > a:hover { border-color:' . $a_hover . ';}
	 a.margin_30.btn:hover, .pager li > a, .pager li > a:hover { background-color:' . $a_hover . ';}
	.pricing-table .price-item__label, .list-with-icon--style-1 .font-icon, .list-with-icon--style-2 .font-icon, .list-with-icon--style-3 .font-icon, .feedback .feedback__text:before, .b-video .b-video__btn-play:hover i {
	color:' . $one_color . ';
	}
	.team .team__item:hover .team__description, .pricing-table--style-2 .price-item__active, .pricing-table--style-2 .price-item__btn, .custom-btn.info, .start-screen form input[type="submit"], .section--background-base, .pattern, .b-video .b-video__btn-play:before, #footer .s-form, #footer.footer--style-2:before, #footer.footer--style-2 .s-form:before, #top-bar__navigation li:not(.menu-item--button):before, #top-bar__navigation li:not(.menu-item--button):after, .margin_30, .pager li > a, .pager li > span, #widget-area #searchform input#searchsubmit, body.search article .searchform input[type="submit"], body.error404 .index .searchform input[type="submit"] {
	background-color:' . $one_color . ';
	}
	.pricing-table--style-2 .price-item__active, .custom-btn.info, .list-with-icon--style-3 .list__item__ico, .start-screen form input[type="submit"], .section--background-base, .pattern, .b-video .b-video__btn-play:before, .widget-title:after, .pager li > a, .pager li > span, a.margin_30.btn {
	border-color:' . $one_color . ';
	}
	.owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span {
		-webkit-box-shadow: 0 0 0 6px ' . $one_color . ' inset;
		box-shadow: 0 0 0 6px ' . $one_color . ' inset;
	}
	';


	// nav
	$nav_bg 				= esc_attr( ot_get_option( 'nt_landium_nav_bg' ) );
	$nav_fixed_bg 			= esc_attr( ot_get_option( 'nt_landium_nav_fixed_bg' ) );
    $navitem 				= esc_attr( ot_get_option( 'nt_landium_navitem' ) );
    $navitemhover 			= esc_attr( ot_get_option( 'nt_landium_navitemhover' ) );
	$dropdown_bg 			= esc_attr( ot_get_option( 'nt_landium_dropdown_bg' ) );
    $dropdown_item 			= esc_attr( ot_get_option( 'nt_landium_dropdown_item' ) );
    $dropdown_i_h 			= esc_attr( ot_get_option( 'nt_landium_dropdown_itemhover' ) );
	
	// sidebar
    $sb_bg 					= esc_attr( ot_get_option( 'nt_landium_sb_bg' ) );
    $sb_t_c 				= esc_attr( ot_get_option( 'nt_landium_sb_t_c' ) );
    $sb_c 					= esc_attr( ot_get_option( 'nt_landium_sb_c' ) );
    $sb_l_c 				= esc_attr( ot_get_option( 'nt_landium_sb_l_c' ) );
    $sb_l_c_h 				= esc_attr( ot_get_option( 'nt_landium_sb_l_c_h' ) );
    $sb_s_t 				= esc_attr( ot_get_option( 'nt_landium_sb_s_t' ) );
    $sb_s_bg 				= esc_attr( ot_get_option( 'nt_landium_sb_s_bg' ) );
	
	if ( $nav_bg !='' ) 		{ $theCSS .= '#top-bar{background-color:' . $nav_bg . '!important;}'; }
	if ( $nav_fixed_bg !='' ) 	{ $theCSS .= '#top-bar.fixed{background-color:' . $nav_fixed_bg . '!important;}'; }
	if ( $navitem !='' ) 		{ $theCSS .= '#top-bar  #top-bar__navigation ul > li > a{color:' . $navitem . ';}'; }
	if ( $navitem !='' ) 		{ $theCSS .= '#top-bar  #top-bar__navigation ul > li > a:hover{color:' . $navitemhover . ' !important;}'; }
	if ( $dropdown_bg !='' ) 	{ $theCSS .= '#top-bar  #top-bar__navigation ul > li .dropdown-menu{background-color:' . $dropdown_bg . '!important;}'; }
	if ( $dropdown_item !='' ) 	{ $theCSS .= '#top-bar  #top-bar__navigation ul > li .dropdown-menu > li > a{color:' . $dropdown_item . '!important;}'; }
	if ( $dropdown_i_h !='' ) 	{ $theCSS .= '#top-bar  #top-bar__navigation ul > li .dropdown-menu> li > a:hover{color:' . $dropdown_i_h . ' !important;}'; }
	
	if ( $sb_bg !='' ) 		{ $theCSS .= '#widget-area{background-color:' . $sb_bg . '!important;}'; }
	if ( $sb_t_c !='' ) 	{ $theCSS .= '.widget-title{color:' . $sb_t_c . '!important;}'; }
	if ( $sb_c !='' ) 		{ $theCSS .= '.widget ul{color:' . $sb_c . '!important;}'; }
	if ( $sb_l_c !='' ) 	{ $theCSS .= '.widget ul li a{color:' . $sb_l_c . '!important;}'; }
	if ( $sb_l_c_h !='' ) 	{ $theCSS .= '.widget ul li a:hover{color:' . $sb_l_c_h . '!important;}'; }
	if ( $sb_s_t !='' ) 	{ $theCSS .= '#widget-area #searchform input#searchsubmit{color:' . $sb_s_t . '!important;}'; }
	if ( $sb_s_bg !='' ) 	{ $theCSS .= '#widget-area #searchform input#searchsubmit{background-color:' . $sb_s_bg . '!important;}'; }
	
	// logo dimension
	$theme_logo_type		= ( ot_get_option( 'nt_landium_logo_type' ) );
	$logo 					= ( ot_get_option( 'nt_landium_logo_dimension', array() ) );
	$logo_m 				= ( ot_get_option( 'nt_landium_margin_logo', array() ) );
	$logo_p 				= ( ot_get_option( 'nt_landium_padding_logo', array() ) );

	// logo
	if(isset($logo['unit']))   { $logounit = $logo['unit'];}else{ $logounit = 'px'; }
	if(isset($logo['width']))   { $theCSS .= '#top-bar__logo img{ width:' .  $logo['width'] .''. $logounit . ' !important; }'; }
	if(isset($logo['height']))  { $theCSS .= '#top-bar__logo img{ height:' . $logo['height'] .''. $logounit . ' !important; }'; }

	//logo  margin
	if(isset($logo_m['unit']))   { $logomarunit = $logo_m['unit'];}else{ $logomarunit = 'px'; }
	if(isset($logo_m['top']))    { $theCSS .= '#top-bar__logo img{ margin-top:' .  $logo_m['top'] .''. $logomarunit . ' !important; }'; }
	if(isset($logo_m['bottom'])) { $theCSS .= '#top-bar__logo img{ margin-bottom:' . $logo_m['bottom'] .''. $logomarunit . ' !important; }'; }
	if(isset($logo_m['right']))  { $theCSS .= '#top-bar__logo img{ margin-right:' . $logo_m['right'] .''. $logomarunit . ' !important; }'; }
	if(isset($logo_m['left']))   { $theCSS .= '#top-bar__logo img{ margin-left:' . $logo_m['left'] .''. $logomarunit . ' !important; }'; }
	
	//logo padding
	if(isset($logo_p['unit']))   { $logopadunit = $logo_p['unit'];}else{ $logopadunit = 'px'; }
	if(isset($logo_p['top']))    { $theCSS .= '#top-bar__logo img{ padding-top:' .  $logo_p['top'] .''. $logopadunit . ' !important; }'; }
	if(isset($logo_p['bottom'])) { $theCSS .= '#top-bar__logo img{ padding-bottom:' . $logo_p['bottom'] .''. $logopadunit . ' !important; }'; }
	if(isset($logo_p['right']))  { $theCSS .= '#top-bar__logo img{ padding-right:' . $logo_p['right'] .''. $logopadunit . ' !important; }'; }
	if(isset($logo_p['left']))   { $theCSS .= '#top-bar__logo img{ padding-left:' . $logo_p['left'] .''. $logopadunit . ' !important; }'; }
	
	// default logo
    if ( ot_get_option( 'nt_landium_logoimg' ) =='' ) {
		$theCSS .= '#top-bar__logo {
			width: 141px;
			height: 27px;
			overflow: hidden;
			text-indent: 100%;
			white-space: nowrap;
			background: url('. get_template_directory_uri() . '/images/site_logo.png' .');
		}';
	}
	
	if ( $theme_logo_type == 'text' ){

		//variable for text logo custom style
		$textlogo_fs 			= esc_attr( ot_get_option( 'nt_landium_textlogo_fs' ) );
		$textlogo_fw 			= esc_attr( ot_get_option( 'nt_landium_textlogo_fw' ) );
		$textlogo_fstyle		= esc_attr( ot_get_option( 'nt_landium_textlogo_fstyle' ) );
		$textlogo_ltsp			= esc_attr( ot_get_option( 'nt_landium_textlogo_lettersp' ) );
		$textlogo_h_color		= esc_attr( ot_get_option( 'nt_landium_textlogo_hovercolor' ) );
		$staticlogo_color		= esc_attr( ot_get_option( 'nt_landium_staticlogo_color' ) );
		$stickylogo_color		= esc_attr( ot_get_option( 'nt_landium_stickylogo_color' ) );

		//static menu text logo
		$theCSS .= '#top-bar__logo, #top-bar__logo_text {line-height: 1.1; text-decoration:none;'; 
		if ( $textlogo_fw 		!= '' ){ $theCSS .= 'font-weight:'.$textlogo_fw.';'; }
		if ( $textlogo_ltsp 	!= '' ){ $theCSS .= 'letter-spacing:'.$textlogo_ltsp.'px;';}
		if ( $textlogo_fs 		!= '' ){ $theCSS .= 'font-size:'.$textlogo_fs.'px;';}
		if ( $textlogo_fstyle 	!= '' ){ $theCSS .= 'font-style:'.$textlogo_fstyle.';';}
		$theCSS .= '}';
		if ( $staticlogo_color 	!= '' ){ $theCSS .= '#top-bar__logo_text, #top-bar__logo {color:'.$staticlogo_color.'!important;}';}
		if ( $textlogo_h_color 	!= '' ){ $theCSS .= '#top-bar__logo_text:hover, #top-bar__logo:hover {color:'.$textlogo_h_color.'!important;}';}

		//sticky menu text logo
		$theCSS .= '#top-bar__logo, #top-bar__logo_text {line-height: 1.1; text-decoration:none; '; 
		if ( $textlogo_fw 		!= '' ){ $theCSS .= 'font-weight:'.$textlogo_fw.';'; }
		if ( $textlogo_ltsp 	!= '' ){ $theCSS .= 'letter-spacing:'.$textlogo_ltsp.'px;';}
		if ( $textlogo_fs 		!= '' ){ $theCSS .= 'font-size:'.$textlogo_fs.'px;';}
		if ( $textlogo_fstyle 	!= '' ){ $theCSS .= 'font-style:'.$textlogo_fstyle.';';}
		$theCSS .= '}';
		if ( $stickylogo_color 	!= '' ){ $theCSS .= '.fixed.in #top-bar__logo_text, .fixed.in #top-bar__logo{color:'.$stickylogo_color.'!important;}';}
		if ( $textlogo_h_color 	!= '' ){ $theCSS .= '.fixed.in #top-bar__logo_text:hover, .fixed.in #top-bar__logo:hover {color:'.$textlogo_h_color.'!important;}';}
	}

	// ALL PAGE OVERLAY MASK COLOR
	$blog_mask_v 			= esc_attr( ot_get_option( 'nt_landium_blog_mask_v' ) );
	$blog_mask_c 			= esc_attr( ot_get_option( 'nt_landium_blog_mask_c' ) );
	$single_mask_v 			= esc_attr( ot_get_option( 'nt_landium_single_mask_v' ) );
	$single_mask_c 			= esc_attr( ot_get_option( 'nt_landium_single_mask_c' ) );
	$archive_mask_v 		= esc_attr( ot_get_option( 'nt_landium_archive_mask_v' ) );
	$archive_mask_c 		= esc_attr( ot_get_option( 'nt_landium_archive_mask_c' ) );
	$error_mask_v 			= esc_attr( ot_get_option( 'nt_landium_error_mask_v' ) );
	$error_mask_c 			= esc_attr( ot_get_option( 'nt_landium_error_mask_c' ) );
	$search_mask_v 			= esc_attr( ot_get_option( 'nt_landium_search_mask_v' ) );
	$search_mask_c 			= esc_attr( ot_get_option( 'nt_landium_search_mask_c' ) );

	// blog header
	$blog_h_bg 				= esc_attr( ot_get_option( 'nt_landium_blog_h_bg' ) );
	$blog_h_h 				= esc_attr( ot_get_option( 'nt_landium_blog_h_h' ) );
	$blog_h_c 				= esc_attr( ot_get_option( 'nt_landium_blog_h_c' ) );
	$blog_sub_h_c 			= esc_attr( ot_get_option( 'nt_landium_blog_sub_h_c' ) );
	$blog_h_p 				= ( ot_get_option( 'nt_landium_blog_h_p', array() ) );
	
	
	if ( $blog_h_bg !='' ) 	{ 
		$theCSS .= '.index-header {background: transparent url( ' . $blog_h_bg .')no-repeat fixed center top / cover!important; }'; 
	} else {
		$theCSS .= '.index-header{ background-image: url('. get_template_directory_uri() . '/images/1.jpg'.');}';
	}
	if ( $blog_mask_v =='off' ){
		$theCSS .= '.blog .index-header .template-overlay{display: none !important; }';
	}

	if (( $blog_mask_c !='' ) && ( $blog_mask_v !='off' )){
		$theCSS .= '.blog .index-header .template-overlay{background: '.$blog_mask_c.';!important; }'; 
	}
	
	if ( $blog_h_h !='' ) 		{  $theCSS .= '.blog .index-header {height: ' . $blog_h_h .'vh !important;     max-height: 100%; }';  }
	if ( $blog_h_c !='' ) 		{  $theCSS .= '.blog .index-header .template-cover-text .uppercase{color: ' . $blog_h_c .' !important; }';  }
	if ( $blog_sub_h_c !='' ) 	{  $theCSS .= '.blog .index-header .template-cover-text .cover-text-sublead{color: ' . $blog_sub_h_c .' !important; }';  }
	
	if(isset($blog_h_p['top']))    { $theCSS .= '.blog .index-header { padding-top:' .  $blog_h_p['top'] .''. $blog_h_p['unit'] . ' !important; }'; }
	if(isset($blog_h_p['bottom'])) { $theCSS .= '.blog .index-header { padding-bottom:' . $blog_h_p['bottom'] .''. $blog_h_p['unit'] . ' !important; }'; }
	if(isset($blog_h_p['right']))  { $theCSS .= '.blog .index-header { padding-right:' . $blog_h_p['right'] .''. $blog_h_p['unit'] . ' !important; }'; }
	if(isset($blog_h_p['left']))   { $theCSS .= '.blog .index-header { padding-left:' . $blog_h_p['left'] .''. $blog_h_p['unit'] . ' !important; }'; }

	// PAGE.PHP AND FULLWIDTH-PAGE.PHP HEADER - CUSTOM PAGE METABOX OPTIONS
	//page bg image and overlay
	$nt_landium_page_bg 			= 	wp_get_attachment_url( get_post_meta(get_the_ID(), 'nt_landium_page_bg_image', true ),'full' );
	$nt_landium_page_bg_color 		= 	esc_attr( get_post_meta(get_the_ID(), 'nt_landium_pagebgcolor', true ) );
	$nt_landium_disable_page_mask 	= 	esc_attr( get_post_meta(get_the_ID(), 'nt_landium_disable_page_mask', true ) );
	$nt_landium_page_mask_color 	= 	esc_attr( get_post_meta(get_the_ID(), 'nt_landium_page_mask_color', true ) );
	$nt_landium_page_mask_opacity 	= 	esc_attr( get_post_meta(get_the_ID(), 'nt_landium_page_mask_opacity', true ) );
	//page heading
	$nt_landium_page_text_color 	= 	esc_attr( get_post_meta(get_the_ID(), 'nt_landium_pagetitlecolor', true ) );
	$nt_landium_page_subtitle_color= 	esc_attr( get_post_meta(get_the_ID(), 'nt_landium_pagesubtitlecolor', true ) );
	$nt_landium_header_p_top 		= 	esc_attr( get_post_meta(get_the_ID(), 'nt_landium_header_p_top', true ) );
	$nt_landium_header_p_bottom 	= 	esc_attr( get_post_meta(get_the_ID(), 'nt_landium_header_p_bottom', true ) );


	
	$page_mask_color = $nt_landium_page_mask_color;
	$mask_rgb_color = hex2rgb($page_mask_color);
	$final_page_mask_color = implode(", ", $mask_rgb_color);
	
	if ( $nt_landium_page_bg !='' ) {
		$theCSS .= '.page-id-' . get_the_ID().'.index-header { background-image: url(' . esc_url( $nt_landium_page_bg ) .') !important; }';
	}
	if ( $nt_landium_page_bg_color !='' && $nt_landium_page_bg =='' ) {
		$theCSS .= '.page-id-' . get_the_ID().'.index-header { background-image: none !important; }';
	}
	if ( $nt_landium_disable_page_mask == true ){  
		$theCSS .= '.page-id-' . get_the_ID().'.index-header .template-overlay .template-overlay{ display: none !important; }'; 
	}
	if ( ( $nt_landium_disable_page_mask != true ) && ( $nt_landium_page_mask_color != '' ) ){
		$theCSS .= '.page-id-' . get_the_ID().'.index-header .template-overlay{background: rgba('.$final_page_mask_color.', '.$nt_landium_page_mask_opacity .');!important; }'; 
	}
	if ( $nt_landium_page_bg_color !='' ) {
		$theCSS .= '.page-id-' . get_the_ID().'.index-header { background-color: ' . $nt_landium_page_bg_color .' !important; }';
	}
	if ( $nt_landium_page_text_color !='' ) {
		$theCSS .= '.page-id-' . get_the_ID().'.index-header h2.lead-heading { color: ' . $nt_landium_page_text_color .' !important; }';
	}
	if ( $nt_landium_page_subtitle_color !='' ) {
		$theCSS .= '.page-id-' . get_the_ID().'.index-header h2.cover-text-sublead, .page-id-' . get_the_ID().'.index-header h2.cover-text-sublead p { color: ' . $nt_landium_page_subtitle_color .' !important; }';
	}
	if ( $nt_landium_header_p_top !='' ) {
		$theCSS .= '.page-id-' . get_the_ID().'.index-header { padding-bottom : ' . $nt_landium_header_p_top .'px !important; }';
	}
	if ( $nt_landium_header_p_bottom !='' ) {
		$theCSS .= '.page-id-' . get_the_ID().'.index-header { padding-top : ' . $nt_landium_header_p_bottom .'px !important; }';
	}


	// single post
	if  ( ot_get_option( 'nt_landium_singlepageheadbg' ) !='' ){
    $theCSS .= '.single .index-header {background: transparent url( '.  esc_attr( ot_get_option( 'nt_landium_singlepageheadbg' ) ) .')no-repeat fixed center top / cover!important; }'; 
    }
	if  ( ot_get_option( 'nt_landium_singleheaderbgcolor' ) !='' ){
    $theCSS .= '.single .index-header {background-color: '.  esc_attr( ot_get_option( 'nt_landium_singleheaderbgcolor' ) ) .'; }'; 
    }	
	if  ( ot_get_option( 'nt_landium_singleheadingcolor' ) !='' ){
    $theCSS .= '.single .index-header  h1{color: '.  esc_attr( ot_get_option( 'nt_landium_singleheadingcolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_landium_single_heading_fontsize' ) !='' ){
    $theCSS .= '.single .index-header  h1{font-size: '.  esc_attr( ot_get_option( 'nt_landium_single_heading_fontsize' ) ) .'px; }'; 
    }
	if  ( ot_get_option( 'nt_landium_singleheaderbgheight' ) !='' ){
    $theCSS .= '.single .index-header {height: '.  esc_attr( ot_get_option( 'nt_landium_singleheaderbgheight' ) ) .'vh !important; }'; 
    }
	if  (( ot_get_option( 'nt_landium_singleheaderpaddingtop' ) !='' )||( ot_get_option( 'nt_landium_singleheaderpaddingbottom' ) !='' )){
		$theCSS .= '@media (min-width: 768px){
			.single .index-header  {
				padding-top: '.  esc_attr( ot_get_option( 'nt_landium_singleheaderpaddingtop' ) ) .'px !important; 
				padding-bottom: '.  esc_attr( ot_get_option( 'nt_landium_singleheaderpaddingbottom' ) ) .'px !important; 
			}
		}';
    }

	// archive pages
	if  ( ot_get_option( 'nt_landium_archivepageheadbg' ) !='' ){
     $theCSS .= '.archive .index-header {background: transparent url( '.  esc_attr( ot_get_option( 'nt_landium_archivepageheadbg' ) ) .')no-repeat fixed center top / cover!important; }'; 
    }
	if  ( ot_get_option( 'nt_landium_archiveheaderbgcolor' ) !='' ){
     $theCSS .= '.archive .index-header {background-color: '.  esc_attr( ot_get_option( 'nt_landium_archiveheaderbgcolor' ) ) .'; }'; 
    }	
	if  ( ot_get_option( 'nt_landium_archiveheadingcolor' ) !='' ){
     $theCSS .= '.archive .index-header  h1{color: '.  esc_attr( ot_get_option( 'nt_landium_archiveheadingcolor' ) ) .'; }'; 
	}
	if  ( ot_get_option( 'nt_landium_archive_heading_fontsize' ) !='' ){
     $theCSS .= '.archive .index-header  h1{font-size: '.  esc_attr( ot_get_option( 'nt_landium_archive_heading_fontsize' ) ) .'px; }'; 
    }
	if  ( ot_get_option( 'nt_landium_archiveheaderparagraphcolor' ) !='' ){
     $theCSS .= '.archive .index-header  p{color: '.  esc_attr( ot_get_option( 'nt_landium_archiveheaderparagraphcolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_landium_archiveheaderbgheight' ) !='' ){
     $theCSS .= '.archive .index-header {height: '.  esc_attr( ot_get_option( 'nt_landium_archiveheaderbgheight' ) ) .'vh !important; }'; 
    }
	if  (( ot_get_option( 'nt_landium_archiveheaderpaddingtop' ) !='' )||( ot_get_option( 'nt_landium_archiveheaderpaddingbottom' ) !='' )) {
		$theCSS .= '@media (min-width: 768px){
			.archive .index-header  {
				padding-top: '.  esc_attr( ot_get_option( 'nt_landium_archiveheaderpaddingtop' ) ) .'px !important; 
				padding-bottom: '.  esc_attr( ot_get_option( 'nt_landium_archiveheaderpaddingbottom' ) ) .'px !important; 
			} 
		}'; 
	}

	// 404
	if  ( ot_get_option( 'nt_landium_errorpageheadbg' ) !='' ){
     $theCSS .= '.error404 .index-header {background: transparent url( '.  esc_attr( ot_get_option( 'nt_landium_errorpageheadbg' ) ) .')no-repeat fixed center top / cover!important; }'; 
    }
	if  ( ot_get_option( 'nt_landium_errorheaderbgcolor' ) !='' ){
     $theCSS .= '.error404 .index-header {background-color: '.  esc_attr( ot_get_option( 'nt_landium_errorheaderbgcolor' ) ) .'; }'; 
    }	
	if  ( ot_get_option( 'nt_landium_errorheadingcolor' ) !='' ){
     $theCSS .= '.error404 .index-header  h1{color: '.  esc_attr( ot_get_option( 'nt_landium_errorheadingcolor' ) ) .'; }'; 
	}
	if  ( ot_get_option( 'nt_landium_error_heading_fontsize' ) !='' ){
     $theCSS .= '.error404 .index-header  h1{font-size: '.  esc_attr( ot_get_option( 'nt_landium_error_heading_fontsize' ) ) .'px; }'; 
    }
	if  ( ot_get_option( 'nt_landium_errorheaderparagraphcolor' ) !='' ){
     $theCSS .= '.error404 .index-header  p{color: '.  esc_attr( ot_get_option( 'nt_landium_errorheaderparagraphcolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_landium_errorheaderbgheight' ) !='' ){
     $theCSS .= '.error404 .index-header {height: '.  esc_attr( ot_get_option( 'nt_landium_errorheaderbgheight' ) ) .'vh !important; }'; 
    }
	if  (( ot_get_option( 'nt_landium_errorheaderpaddingtop' ) !='' )||( ot_get_option( 'nt_landium_errorheaderpaddingbottom' ) !='' )) {
		$theCSS .= '@media (min-width: 768px){
			.error404 .index-header  {
				padding-top: '.  esc_attr( ot_get_option( 'nt_landium_errorheaderpaddingtop' ) ) .'px !important; 
				padding-bottom: '.  esc_attr( ot_get_option( 'nt_landium_errorheaderpaddingbottom' ) ) .'px !important; 
			} 
		}'; 
	}
	
	// search page
	if  ( ot_get_option( 'nt_landium_searchpageheadbg' ) !='' ){
     $theCSS .= '.search .index-header {background: transparent url( '.  esc_attr( ot_get_option( 'nt_landium_searchpageheadbg' ) ) .')no-repeat scroll center top / cover!important; }'; 
    }
	if  ( ot_get_option( 'nt_landium_searchheaderbgcolor' ) !='' ){
     $theCSS .= '.search .index-header {background-color: '.  esc_attr( ot_get_option( 'nt_landium_searchheaderbgcolor' ) ) .'; }'; 
    }	
	if  ( ot_get_option( 'nt_landium_searchheadingcolor' ) !='' ){
     $theCSS .= '.search .index-header  h1{color: '.  esc_attr( ot_get_option( 'nt_landium_searchheadingcolor' ) ) .'; }'; 
	}
	if  ( ot_get_option( 'nt_landium_search_heading_fontsize' ) !='' ){
     $theCSS .= '.search .index-header  h1{font-size: '.  esc_attr( ot_get_option( 'nt_landium_search_heading_fontsize' ) ) .'px; }'; 
    }
	if  ( ot_get_option( 'nt_landium_searchheaderparagraphcolor' ) !='' ){
     $theCSS .= '.search .index-header  p{color: '.  esc_attr( ot_get_option( 'nt_landium_searchheaderparagraphcolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_landium_searchheaderbgheight' ) !='' ){
     $theCSS .= '.search .index-header {height: '.  esc_attr( ot_get_option( 'nt_landium_searchheaderbgheight' ) ) .'vh !important; }'; 
    }
	if  (( ot_get_option( 'nt_landium_searchheaderpaddingtop' ) !='' )||( ot_get_option( 'nt_landium_searchheaderpaddingbottom' ) !='' )) {
		$theCSS .= '@media (min-width: 768px){
			.search .index-header  {
				padding-top: '.  esc_attr( ot_get_option( 'nt_landium_searchheaderpaddingtop' ) ) .'px !important; 
				padding-bottom: '.  esc_attr( ot_get_option( 'nt_landium_searchheaderpaddingbottom' ) ) .'px !important; 
			} 
		}'; 
	}	

	if  ( ot_get_option( 'nt_landium_bread' ) !='off' ){
		// BREADCRUBMS
		if  ( ot_get_option( 'nt_landium_blogbreadcrubmscolor' ) !='' ){
		 $theCSS .= '.breadcrubms, .breadcrubms span a span{color: '.  esc_attr( ot_get_option( 'nt_landium_blogbreadcrubmscolor' ) ) .'; }'; 
		}
		if  ( ot_get_option( 'nt_landium_blogbreadcrubmshovercolor' ) !='' ){
		 $theCSS .= '.breadcrubms span a span:hover{color: '.  esc_attr( ot_get_option( 'nt_landium_blogbreadcrubmshovercolor' ) ) .'; }'; 
		}
		if  ( ot_get_option( 'nt_landium_blogbreadcrubmscurrentcolor' ) !='' ){
		 $theCSS .= '.breadcrubms span {color: '.  esc_attr( ot_get_option( 'nt_landium_blogbreadcrubmscurrentcolor' ) ) .'; }'; 
		}
		if  ( ot_get_option( 'nt_landium_blogbreadcrubmsfontsize' ) !='' ){
		 $theCSS .= '.breadcrubms{font-size: '.  esc_attr( ot_get_option( 'nt_landium_blogbreadcrubmsfontsize' ) ) .'px; }'; 
		}
	}
	
	

	if  ( ot_get_option( 'nt_landium_blogposttitlecolor' ) !='' ){
     $theCSS .= '.entry-title a{color: '.  esc_attr( ot_get_option( 'nt_landium_blogposttitlecolor' ) ) .'; }'; 
	}
	if  ( ot_get_option( 'nt_landium_blogposttitlhoverecolor' ) !='' ){
     $theCSS .= '.entry-title a:hover{color: '.  esc_attr( ot_get_option( 'nt_landium_blogposttitlhoverecolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_landium_blogmetacolor' ) !='' ){
     $theCSS .= '.entry-meta li{color: '.  esc_attr( ot_get_option( 'nt_landium_blogmetacolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_landium_blogmetalinktextcolor' ) !='' ){
     $theCSS .= '.entry-meta li a{color: '.  esc_attr( ot_get_option( 'nt_landium_blogmetalinktextcolor' ) ) .'; }'; 
	}
	if  ( ot_get_option( 'nt_landium_blogmetalinkhovercolor' ) !='' ){
     $theCSS .= '.entry-meta li a:hover{color: '.  esc_attr( ot_get_option( 'nt_landium_blogmetalinkhovercolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_landium_blogmetalinktextbgcolor' ) !='' ){
     $theCSS .= '.entry-meta li a{background-color: '.  esc_attr( ot_get_option( 'nt_landium_blogmetalinktextbgcolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_landium_blogmetalinktextbghovercolor' ) !='' ){
     $theCSS .= '.entry-meta li a:hover{background-color: '.  esc_attr( ot_get_option( 'nt_landium_blogmetalinktextbghovercolor' ) ) .'; }'; 
    }	
	if  ( ot_get_option( 'nt_landium_blogpostparagraphcolor' ) !='' ){	
     $theCSS .= '.entry-content p{color: '.  esc_attr( ot_get_option( 'nt_landium_blogpostparagraphcolor' ) ) .'; }'; 
	 $theCSS .= '.entry-content p{color:#000;}'; 
	}
	if  ( ot_get_option( 'nt_landium_blogpostbuttonbgcolor' ) !='' ){	
     $theCSS .= 'a.margin_30{background-color:'.  esc_attr( ot_get_option( 'nt_landium_blogpostbuttonbgcolor' ) ) .';}'; 
    }
	if  ( ot_get_option( 'nt_landium_blogpostbuttonbghovercolor' ) !='' ){	
     $theCSS .= 'a.margin_30:hover{background-color:'.  esc_attr( ot_get_option( 'nt_landium_blogpostbuttonbghovercolor' ) ) .';}'; 	
    }
	if  ( ot_get_option( 'nt_landium_blogpostbuttontitlecolor' ) !='' ){	
     $theCSS .= 'a.margin_30{color:'.  esc_attr( ot_get_option( 'nt_landium_blogpostbuttontitlecolor' ) ) .';}'; 
    }
	if  ( ot_get_option( 'nt_landium_blogpostbuttontitlehovercolor' ) !='' ){	
     $theCSS .= 'a.margin_30:hover{color:'.  esc_attr( ot_get_option( 'nt_landium_blogpostbuttontitlehovercolor' ) ) .';}'; 	
    }
	
	
	if  ( ot_get_option( 'nt_landium_blogsharebgcolor' ) !='' ){	
     $theCSS .= '#share-buttons i{ background-color: '.  esc_attr( ot_get_option( 'nt_landium_blogsharebgcolor' ) ) .'; }'; 
    }	
	if  ( ot_get_option( 'nt_landium_blogsharebghovercolor' ) !='' ){	
    $theCSS .= ' #share-buttons i:hover{ background-color: '.  esc_attr( ot_get_option( 'nt_landium_blogsharebghovercolor' ) ) .'; }'; 
    }		
	if  ( ot_get_option( 'nt_landium_blogsharecolor' ) !='' ){	
     $theCSS .= '#share-buttons i{ color: '.  esc_attr( ot_get_option( 'nt_landium_blogsharecolor' ) ) .'; }'; 
    }	
	if  ( ot_get_option( 'nt_landium_blogsharehovercolor' ) !='' ){	
     $theCSS .= '#share-buttons i:hover{ color: '.  esc_attr( ot_get_option( 'nt_landium_blogsharehovercolor' ) ) .'; }'; 
    }	
	if  ( ot_get_option( 'nt_landium_blogmetalinktextcolor' ) !='' ){
     $theCSS .= 'p.logged-in-as a{color: '.  esc_attr( ot_get_option( 'nt_landium_blogmetalinktextcolor' ) ) .'; }'; 
	}
	if  ( ot_get_option( 'nt_landium_blogmetalinkhovercolor' ) !='' ){
     $theCSS .= 'p.logged-in-as a:hover{color: '.  esc_attr( ot_get_option( 'nt_landium_blogmetalinkhovercolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_landium_blogmetalinktextbgcolor' ) !='' ){
     $theCSS .= 'p.logged-in-as a{background-color: '.  esc_attr( ot_get_option( 'nt_landium_blogmetalinktextbgcolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_landium_blogmetalinktextbghovercolor' ) !='' ){
     $theCSS .= 'p.logged-in-as a:hover{background-color: '.  esc_attr( ot_get_option( 'nt_landium_blogmetalinktextbghovercolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_landium_blogmetalinktextcolor' ) !='' ){
     $theCSS .= 'a.comment-edit-link,a.comment-reply-link{color: '.  esc_attr( ot_get_option( 'nt_landium_blogmetalinktextcolor' ) ) .'; }'; 
	}
	if  ( ot_get_option( 'nt_landium_blogmetalinkhovercolor' ) !='' ){
     $theCSS .= 'a.comment-edit-link:hover,a.comment-reply-link:hover{color: '.  esc_attr( ot_get_option( 'nt_landium_blogmetalinkhovercolor' ) ) .'; }'; 
    }	
	if  ( ot_get_option( 'nt_landium_blogmetalinktextbgcolor' ) !='' ){
     $theCSS .= 'a.comment-edit-link,a.comment-reply-link{background-color: '.  esc_attr( ot_get_option( 'nt_landium_blogmetalinktextbgcolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_landium_blogmetalinktextbghovercolor' ) !='' ){
     $theCSS .= 'a.comment-edit-link:hover,a.comment-reply-link:hover{background-color: '.  esc_attr( ot_get_option( 'nt_landium_blogmetalinktextbghovercolor' ) ) .'; }'; 
    }

	if  ( ot_get_option( 'nt_landium_blogcommentformsubmitcolor' ) !='' ){
     $theCSS .= '.comment-form .submit{color: '.  esc_attr( ot_get_option( 'nt_landium_blogcommentformsubmitcolor' ) ) .'; }'; 
	}
	if  ( ot_get_option( 'nt_landium_blogcommentformsubmithovercolor' ) !='' ){
     $theCSS .= '.comment-form .submit:hover{color: '.  esc_attr( ot_get_option( 'nt_landium_blogcommentformsubmithovercolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_landium_blogcommentformsubmitbgcolor' ) !='' ){
     $theCSS .= '.comment-form .submit{background-color: '.  esc_attr( ot_get_option( 'nt_landium_blogcommentformsubmitbgcolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_landium_blogcommentformsubmitbghovercolor' ) !='' ){
     $theCSS .= '.comment-form .submit:hover{background-color: '.  esc_attr( ot_get_option( 'nt_landium_blogcommentformsubmitbghovercolor' ) ) .'; }'; 
	}

	
	if  ( ot_get_option( 'nt_landium_pagertitlecolor' ) !='' ){
     $theCSS .= '.pager li a{color: '.  esc_attr( ot_get_option( 'nt_landium_pagertitlecolor' ) ) .'; }'; 
	}
	if  ( ot_get_option( 'nt_landium_pagertitlehovercolor' ) !='' ){
     $theCSS .= '.pager li a:hover{color: '.  esc_attr( ot_get_option( 'nt_landium_pagertitlehovercolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_landium_pagerbgcolor' ) !='' ){
     $theCSS .= '.pager li a{background-color: '.  esc_attr( ot_get_option( 'nt_landium_pagerbgcolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_landium_pagerbghovercolor' ) !='' ){
     $theCSS .= '.pager li a:hover{background-color: '.  esc_attr( ot_get_option( 'nt_landium_pagerbghovercolor' ) ) .'; }'; 
	}

	// FOOTER WIDGETIZE OPTIONS
	$nt_landium_f_v_bg		= 	esc_attr( ot_get_option( 'nt_landium_footerwidgetizebgcolor' ) );
	$nt_landium_f_v_pad	= 	esc_attr( ot_get_option( 'nt_landium_footerwidgetizepadding' ) );
	$nt_landium_f_h_c		= 	esc_attr( ot_get_option( 'nt_landium_footer_h_c' ) );
	$nt_landium_f_t_c		= 	esc_attr( ot_get_option( 'nt_landium_footer_t_c' ) );
	$nt_landium_f_a_c		= 	esc_attr( ot_get_option( 'nt_landium_footer_a_c' ) );

	// WIDGETIZE FOOTER
	if  ( $nt_landium_f_v_bg !='' ){	
    $theCSS .= '.footer-top.footer-widgetize{ background-color: '. $nt_landium_f_v_bg .'; }'; 
    }
	if  ( $nt_landium_f_v_pad !='' ){	
    $theCSS .= '.footer-top.footer-widgetize{ padding-top: '.$nt_landium_f_v_pad.'px 0!important; padding-bottom: '.$nt_landium_f_v_pad.'px 0!important; }'; 
    }
	if  ( $nt_landium_f_h_c !='' ){
     $theCSS .= '.footer-top.footer-widgetize .widget .widget-head{color: '. $nt_landium_f_h_c	.'; }'; 
	}
	if  ( $nt_landium_f_a_c ){
     $theCSS .= '.footer-top.footer-widgetize .widget ul li a{ color: '. $nt_landium_f_a_c .'; }'; 
	}
	if  ( $nt_landium_f_t_c !='' ){
     $theCSS .= '.footer-top.footer-widgetize .widget .textwidget{color: '. esc_attr( ot_get_option( 'nt_landium_footer_t_c' ) ) .'; }'; 
	}

	// FOOTER COPYRIGHT OPTIONS
	
	//footer form section
	if  ( ot_get_option( 'nt_landium_footernewsletterbgcolor' ) !='' ){	
    $theCSS .= '#footer .s-form, #footer.footer--style-2:before, #footer.footer--style-2 .s-form:before{background-color: '.  esc_attr( ot_get_option( 'nt_landium_footernewsletterbgcolor' ) ) .'!important; }'; 
    }
	if  ( ot_get_option( 'nt_landium_footernewslettertitlecolor' ) !='' ){	
    $theCSS .= '.s-form .section-heading.section-heading--white .title{color: '.  esc_attr( ot_get_option( 'nt_landium_footernewslettertitlecolor' ) ) .'!important; }';
    }
	if  ( ot_get_option( 'nt_landium_footernewsletterdesccolor' ) !='' ){	
    $theCSS .= '.s-form .section-heading.section-heading--white p{color: '.  esc_attr( ot_get_option( 'nt_landium_footernewsletterdesccolor' ) ) .'!important; }';
    }
	if  ( ot_get_option( 'nt_landium_footernewsletterinputcolor' ) !='' ){	
    $theCSS .= '#footer .footer__form .input-wrp input, #footer .footer__form .input-wrp textarea{color: '.  esc_attr( ot_get_option( 'nt_landium_footernewsletterinputcolor' ) ) .'!important; }';
    }
	if  ( ot_get_option( 'nt_landium_footernewsletterinputbordercolor' ) !='' ){	
    $theCSS .= '#footer .footer__form .input-wrp input, #footer .footer__form .input-wrp textarea{border-color: '.  esc_attr( ot_get_option( 'nt_landium_footernewsletterinputbordercolor' ) ) .'!important; }';
    }
	if  ( ot_get_option( 'nt_landium_footernewslettericoncolor' ) !='' ){	
    $theCSS .= '.s-form form .input-wrp i{color: '.  esc_attr( ot_get_option( 'nt_landium_footernewslettericoncolor' ) ) .'!important; }';
    }
	if  ( ot_get_option( 'nt_landium_footernewsletterbuttonbordercolor' ) !='' ){	
    $theCSS .= '.s-form .custom-btn.light, .s-form .custom-btn.light.inverted {border-color: '.  esc_attr( ot_get_option( 'nt_landium_footernewsletterbuttonbordercolor' ) ) .'!important; }';
    }
	if  ( ot_get_option( 'nt_landium_footernewsletterbuttoncolor' ) !='' ){	
    $theCSS .= '.s-form .custom-btn.light.inverted:hover, .s-form .custom-btn.light.inverted:focus {background-color: '.  esc_attr( ot_get_option( 'nt_landium_footernewsletterbuttoncolor' ) ) .'!important; }';
    }
	//footer bottom and contact item
	if  ( ot_get_option( 'nt_landium_footerbgcolor' ) !='' ){	
    $theCSS .= '.footer--style-3, .footer--style-2, .footer__bottom-text, .footer__contact{background-color: '.  esc_attr( ot_get_option( 'nt_landium_footerbgcolor' ) ) .'!important; }'; 
    }
	if  ( ot_get_option( 'nt_landium_footercopyrightpadding' ) !='' ){	
    $theCSS .= '.footer__bottom-text{padding: '.  esc_attr( ot_get_option( 'nt_landium_footercopyrightpadding' ) ) .'px 0!important; }'; 
    }
	if  ( ot_get_option( 'nt_landium_footercontactpaddingtop' ) !='' ){	
    $theCSS .= '.footer__contact{padding-top: '.  esc_attr( ot_get_option( 'nt_landium_footercontactpaddingtop' ) ) .'px!important; }'; 
    }
	if  ( ot_get_option( 'nt_landium_footercontactpaddingbottom' ) !='' ){	
    $theCSS .= '.footer__contact{padding-bottom: '.  esc_attr( ot_get_option( 'nt_landium_footercontactpaddingbottom' ) ) .'px!important; }'; 
    }
	if  ( ot_get_option( 'nt_landium_footercontacttextcolor' ) !='' ){	
    $theCSS .= '.footer__contact, #footer .contact__item {color: '.  esc_attr( ot_get_option( 'nt_landium_footercontacttextcolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_landium_footercontacttextcolor' ) !='' ){	
    $theCSS .= '#footer .contact__item > a[href^="mailto"] {border-color: '.  esc_attr( ot_get_option( 'nt_landium_footercontacttextcolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_landium_footercontacticoncolor' ) !='' ){	
    $theCSS .= '.footer__contact i, #footer .contact__item i{color: '.  esc_attr( ot_get_option( 'nt_landium_footercontacticoncolor' ) ) .'; }'; 
    }
	if  ( ot_get_option( 'nt_landium_footerpoweredcolor' ) !='' ){
     $theCSS .= '.footer__bottom-text, .footer__bottom-text p, .footer-style-2 p, .footer-style-2 p, .footer-style-2, .footer-style-3 {color: '.  esc_attr( ot_get_option( 'nt_landium_footerpoweredcolor' ) ) .'; }'; 
	}
	if  ( ot_get_option( 'nt_landium_footerpoweredbordertopcolor' ) !='' ){
     $theCSS .= '#footer.footer--style-1 .footer__bottom-text{border-color: '.  esc_attr( ot_get_option( 'nt_landium_footerpoweredbordertopcolor' ) ) .'; }'; 
	}
	if  ( ot_get_option( 'nt_landium_footersocialcolor' ) !='' ){
     $theCSS .= '#footer .social-btns a{color: '.  esc_attr( ot_get_option( 'nt_landium_footersocialcolor' ) ) .'; }'; 
	}
	if  ( ot_get_option( 'nt_landium_footersocialhovercolor' ) !='' ){
     $theCSS .= '#footer .social-btns a:hover{color: '.  esc_attr( ot_get_option( 'nt_landium_footersocialhovercolor' ) ) .'; }'; 
	}
	if  ( ot_get_option( 'nt_landium_social_fontsize' ) !='' ){
     $theCSS .= '#footer .social-btns a{font-size: '.  esc_attr( ot_get_option( 'nt_landium_social_fontsize' ) ) .'px; }'; 
    }
	if  ( ot_get_option( 'nt_landium_social_margin_left' ) !='' ){
     $theCSS .= '.footer__bottom-text .social-btns a{margin-left: '.  esc_attr( ot_get_option( 'nt_landium_social_margin_left' ) ) .'px; }'; 
    }
	if  ( ot_get_option( 'nt_landium_social_opacity' ) !='' ){
     $theCSS .= '.footer__bottom-text .social-btns a{opacity: '.  esc_attr( ot_get_option( 'nt_landium_social_opacity' ) ) .'; }'; 
    }

	// CUSTOM PRELOADER CSS
	if  ( ot_get_option('nt_landium_preloadercss')  !='' ) { $theCSS .= ''.ot_get_option( 'nt_landium_preloadercss' ).''; }

    /* Add CSS to style.css */
    wp_add_inline_style( 'nt-landium-custom-style', $theCSS );
	}

add_action( 'wp_enqueue_scripts', 'nt_landium_css_options' );