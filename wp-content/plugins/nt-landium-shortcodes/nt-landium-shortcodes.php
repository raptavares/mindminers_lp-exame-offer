<?php
 
/*
Plugin Name: NT Landium Shortcodes
Plugin URI: http://themeforest.net/user/Ninetheme
Description: Shortcodes for Ninetheme WordPress Themes - nt-landium Version
Version: 1.1
Author: Ninetheme
Author URI: http://themeforest.net/user/Ninetheme
*/

/*************************************************
## Word Limiter
*************************************************/ 
function nt_landium_limit_words($string, $limit) {
	$words = explode(' ', $string);
	return implode(' ', array_slice($words, 0, $limit));
}

if ( ! function_exists( 'landium_sanitize_data' ) ) {
    function landium_sanitize_data( $landiumdata ) {

            $landiumdata = wp_kses( $landiumdata, array(
                    'a'         => array(
                        'href'  => array(),
                        'title' => array()
                    ),
                    'br'        => array(),
                    'em'        => array(),
                    'strong'    => array(),
            ) );
        
        return $landiumdata;
    }
}


/*-----------------------------------------------------------------------------------*/
/*	HERO FORM landium
/*-----------------------------------------------------------------------------------*/
function theme_nt_landium_section_heroform( $atts, $content = null ) {	
    extract( shortcode_atts(array( 
	"section_id"		=> '',
	"particle"			=> '',
	"overlay_display"	=> '',
	"overlaycolor"		=> '',
	"herobgimg"			=> '',
	"section_heading"	=> '',
	"section_desc"		=> '',
	"herobtnlink"		=> '',
	"heroform_title"	=> '',
	"heroform_desc"		=> ''

	), $atts) );

	if ( $particle == 'show' ) { 
		wp_enqueue_script( 'particleground' );
		$particle_class = ' particle-ground';
	}
	else{ $particle_class = ''; }

	$id = ($section_id != '') ? 'id="'. esc_attr($section_id) . '"' : '';
	$herobtnlink 		= ( $herobtnlink == '||' ) ? '' : $herobtnlink;
	$herobtnlink 		= vc_build_link( $herobtnlink );
	$herobtn_href 		= $herobtnlink['url'];
	$herobtn_title 		= $herobtnlink['title'];
	$herobtn_target 	= $herobtnlink['target'];

	if ( $herobgimg !='' ) { 
		$herobg_img = wp_get_attachment_url( $herobgimg,'full' );
		$heroparallaxbg = ' data-stellar-background-ratio="0.5" data-stellar-vertical-offset="300" data-stellar-offset-parent="true" style="background-image: url('.esc_url( $herobg_img ).')"';
	}
	else{ $heroparallaxbg = ''; }

	$out = '';
		$out .= '<a '.$id.' class="ancor"></a>';
		$out .= '<div id="start-screen" class="start-screen start-screen--static-bg start-screen--static-bg--style-1">';

			$out .= '<div class="start-screen__static-bg parallax'.$particle_class.'"'.$heroparallaxbg.'>';
					if ( $overlay_display == 'show' ) { 
						$out .= '<div class="pattern" style="background-color:'.$overlaycolor.'"></div>';
					}
			$out .= '</div>';

			$out .= '<div class="start-screen__content-container">';
				$out .= '<div class="start-screen__content">';
					$out .= '<div class="v-align">';
						$out .= '<div class="v-bottom">';
							$out .= '<div class="container">';
								$out .= '<div class="row">';
									$out .= '<div class="col-xs-12 col-sm-7">';
									if ( $section_heading !='' ) { $out .= '<h1 class="title">'.landium_sanitize_data( $section_heading ).'</h1>'; }

									if ( $section_desc !='' ) { $out .= '<p>'.landium_sanitize_data( $section_desc ).'</p>'; }

									if ( $herobtn_title !='' ) {
										$out .= '<p><a href="'.esc_attr( $herobtn_href ).'" '; if ( $herobtn_target != '' ) { $out .= ' target="'.$herobtn_target.'"';}$out .= 'class="start-screen__btn">'.esc_html( $herobtn_title ).'</a></p>';
									}
									$out .= '</div>';

									$out .= '<div class="col-xs-12 col-sm-5 col-md-4 col-md-offset-1">';
										$out .= '<div class="hero-form">';
										if ( $heroform_title !='' || $heroform_desc !='' ) {
											$out .= '<div class="text">';
												if ( $heroform_title !='' ) { $out .= '<h4 class="heading">'.esc_html( $heroform_title ).'</h4>'; }
												if ( $heroform_desc !='' ) { $out .= '<p>'.esc_html( $heroform_desc ).'</p>'; }
											$out .= '</div>';
										}
											$out .= ''.do_shortcode( $content ).'';

										$out .= '</div>';
									$out .= '</div>';
								$out .= '</div>';
							$out .= '</div>';
						$out .= '</div>';
					$out .= '</div>';
				$out .= '</div>';
			$out .= '</div>';
		$out .= '</div>';

return $out;
}
add_shortcode('nt_landium_section_heroform', 'theme_nt_landium_section_heroform');

/*-----------------------------------------------------------------------------------*/
/* HERO PRODUCT landium
/*-----------------------------------------------------------------------------------*/
function theme_nt_landium_section_heroproduct( $atts, $content = null ) {	
    extract( shortcode_atts(array( 
	"section_id"		=> '',
	"herobgimg"			=> '',
	"particle"			=> '',
	"overlay_display"	=> '',
	"overlaycolor"		=> '',
	"hero_img"			=> '',
	"section_heading"	=> '',
	"section_desc"		=> '',
	"herobtnlink"		=> ''

	), $atts) );

	if ( $particle == 'show' ) { 
		wp_enqueue_script( 'particleground' );
		$particle_class = ' particle-ground';
	}
	else{ $particle_class = ''; }
	
	$id = ($section_id != '') ? 'id="'. esc_attr($section_id) . '"' : '';
	$herobtnlink 		= ( $herobtnlink == '||' ) ? '' : $herobtnlink;
	$herobtnlink 		= vc_build_link( $herobtnlink );
	$herobtn_href 		= $herobtnlink['url'];
	$herobtn_title 		= $herobtnlink['title'];
	$herobtn_target 	= $herobtnlink['target'];

	if ( $herobgimg !='' ) { 
		$herobg_img = wp_get_attachment_url( $herobgimg,'full' );
		$heroparallaxbg = ' style="background-image: url('.esc_url( $herobg_img ).')"';
	}
	else{ $heroparallaxbg = ''; }

	$out = '';
		$out .= '<a '.$id.' class="ancor"></a>';
		$out .= '<div id="start-screen" class="start-screen start-screen--static-bg start-screen--static-bg--style-2">';
			$out .= '<div class="start-screen__static-bg'.$particle_class.'"'.$heroparallaxbg.'>';
					if ( $overlay_display == 'show' ) { 
						$out .= '<div class="pattern" style="background-color:'.$overlaycolor.'"></div>';
					}
					$out .= '</div>';
			$out .= '<div class="start-screen__content-container">';
				$out .= '<div class="start-screen__content">';
					$out .= '<div class="v-align">';
						$out .= '<div class="v-middle">';
							$out .= '<div class="container">';
								$out .= '<div class="row matchHeight-container">';
									$out .= '<div class="col-xs-12 col-sm-7 col-md-8">';
										$out .= '<div class="matchHeight-item v-align">';
											$out .= '<div>';
									if ( $section_heading !='' ) { $out .= '<h1 class="title">'.landium_sanitize_data( $section_heading ).'</h1>'; }

									if ( $section_desc !='' ) { $out .= '<p>'.landium_sanitize_data( $section_desc ).'</p>'; }

									if ( $herobtn_title !='' ) {
										$out .= '<p><a href="'.esc_attr( $herobtn_href ).'" '; if ( $herobtn_target != '' ) { $out .= ' target="'.$herobtn_target.'"';}$out .= 'class="start-screen__btn">'.esc_html( $herobtn_title ).'</a></p>';
									}
											$out .= '</div>';
										$out .= '</div>';
									$out .= '</div>';

									$out .= '<div class="col-xs-12 col-sm-5 col-md-4 hidden-xs">';
									if ( $hero_img !='' ){
										$heroimg = wp_get_attachment_url( $hero_img,'full' );
										$out .= '<div class="matchHeight-item">';
											$out .= '<img class="img-responsive center-block" src="'.esc_url( $heroimg ).'" alt="demo">';
										$out .= '</div>';
									}
									$out .= '</div>';
											
								$out .= '</div>';
							$out .= '</div>';
						$out .= '</div>';
					$out .= '</div>';
				$out .= '</div>';
			$out .= '</div>';
		$out .= '</div>';

return $out;
}
add_shortcode('nt_landium_section_heroproduct', 'theme_nt_landium_section_heroproduct');

/*-----------------------------------------------------------------------------------*/
/*	SERVICES landium
/*-----------------------------------------------------------------------------------*/
function theme_nt_landium_section_services( $atts, $content = null ) {	
    extract( shortcode_atts(array( 
	"section_id"		=> '',
	"heading_display"	=> '',
	"heading_align"		=> '',
	"section_heading"	=> '',
	"section_desc"		=> '',
	"item_column"		=> '',
	"desk_column"		=> '',
	"desk_column_offset"=> '',
	"mob_column"		=> '',
	"servicesloop"		=> '',
	"icon_type"			=> '',
	"itemimg_icon"		=> '',
	"item_fonticon"		=> '',
	"item_title"		=> '',
	"item_desc"			=> '',
	"sectionbgcss"		=> ''

	), $atts) );

	$sectionbg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $sectionbgcss, ' ' ),  $atts );
	$id = ($section_id != '') ? 'id="'. esc_attr($section_id) . '"' : '';
	$services_loop = (array) vc_param_group_parse_atts($servicesloop);	

	$out = '';

			$out .= '<!-- start section -->';
			$out .= '<a '.$id.' class="ancor"></a>';
			$out .= '<section class="section'.esc_attr( $sectionbg_css ).'">';
				$out .= '<div class="container">';
				$headingdisplay = $heading_display ? $heading_display : 'show';
				$headingalign = $heading_align ? $heading_align : 'left';
				if ( $headingdisplay !='hide' ) { 
					$out .= '<div class="section-heading section-heading--'.esc_attr( $headingalign ).'">';
						if ( $section_heading !='' ) { $out .= '<h2 class="title h1">'.landium_sanitize_data( $section_heading ).'</h2>'; }
						if ( $section_desc !='' ) { $out .= '<p>'.landium_sanitize_data( $section_desc ).'</p>'; }
					$out .= '</div>';
				}
					$out .= '<div class="list-with-icon list-with-icon--style-1">';
						$out .= '<div class="list__inner">';
							$out .= '<div class="row">';

							if ( $item_column !='custom' ) { 
								$itemcolumntotal = $item_column ? $item_column : 'col-sm-6 col-md-4';
							}
							if ( $item_column =='custom' ) { 
								$deskcolumn = $desk_column ? $desk_column : 'col-md-4';
								$deskcolumn_offset = $desk_column_offset ? $desk_column_offset : '';
								$mobcolumn = $mob_column ? $mob_column : 'col-sm-6';
								$itemcolumn =  ''.esc_attr( $deskcolumn ).' '.esc_attr( $deskcolumn_offset ).' '.esc_attr( $mobcolumn ).'';
								$itemcolumntotal = preg_replace('/\s\s+/', ' ', $itemcolumn);
							}

							foreach ( $services_loop as $serv ) {
								$out .= '<!-- start item -->';
								$out .= '<div class="col-xs-12 '.$itemcolumntotal.'">';
									$out .= '<div class="list__item">';
								if ( isset( $serv['icon_type'] ) !='' ){ $icon_type = $serv['icon_type']; } else{ $icon_type = 'fonticon'; }
								if ( $icon_type == 'imgicon' ){
									if ( isset( $serv['itemimg_icon'] ) !='' ){
										$itemimgicon = wp_get_attachment_url( $serv['itemimg_icon'],'full' );
										$out .= '<img class="list__item__ico img-responsive" src="'.esc_url( $itemimgicon ).'" alt="img-icon" />';
									}
								}
								else{
									if ( isset( $serv['item_fonticon'] ) !='' ){$out .= '<i class="list__item__ico font-icon '.$serv['item_fonticon'].'"></i>'; }
								}
									if ( isset( $serv['item_title'] ) !='' ){$out .= '<h3 class="list__item__title">'.$serv['item_title'].'</h3>'; }
									if ( isset( $serv['item_desc'] ) !='' ){$out .= '<p>'.$serv['item_desc'].'</p>'; }
									$out .= '</div>';
								$out .= '</div>';
								$out .= '<!-- end item -->';
							}

							$out .= '</div>';
						$out .= '</div>';
					$out .= '</div>';
				$out .= '</div>';
			$out .= '</section>';
			$out .= '<!-- end section -->';

	return $out;
}
add_shortcode('nt_landium_section_services', 'theme_nt_landium_section_services');

/*-----------------------------------------------------------------------------------*/
/*	SERVICES 2 landium
/*-----------------------------------------------------------------------------------*/
function theme_nt_landium_section_servicestwo( $atts, $content = null ) {	
    extract( shortcode_atts(array( 
	"section_id"		=> '',
	"heading_display"	=> '',
	"heading_align"		=> '',
	"section_heading"	=> '',
	"section_desc"		=> '',
	"item_column"		=> '',
	"desk_column"		=> '',
	"desk_column_offset"=> '',
	"mob_column"		=> '',
	"servicesloop"		=> '',
	"icon_type"			=> '',
	"itemimg_icon"		=> '',
	"item_fonticon"		=> '',
	"item_title"		=> '',
	"item_desc"			=> '',
	"sectionbgcss"		=> ''

	), $atts) );

	$sectionbg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $sectionbgcss, ' ' ),  $atts );
	$id = ($section_id != '') ? 'id="'. esc_attr($section_id) . '"' : '';
	$services_loop = (array) vc_param_group_parse_atts($servicesloop);	

	$out = '';

			$out .= '<!-- start section -->';
			$out .= '<a '.$id.' class="ancor"></a>';
			$out .= '<section class="section section--background-dark'.esc_attr( $sectionbg_css ).'">';
				$out .= '<div class="container">';
				$headingdisplay = $heading_display ? $heading_display : 'show';
				$headingalign = $heading_align ? $heading_align : 'center';
				if ( $headingdisplay !='hide' ) { 
					$out .= '<div class="section-heading section-heading--'.esc_attr( $headingalign ).' section-heading--white">';
						if ( $section_heading !='' ) { $out .= '<h2 class="title h1">'.landium_sanitize_data( $section_heading ).'</h2>'; }
						if ( $section_desc !='' ) { $out .= '<p>'.landium_sanitize_data( $section_desc ).'</p>'; }
					$out .= '</div>';
				}
					$out .= '<div class="list-with-icon list-with-icon--style-2">';
						$out .= '<div class="list__inner">';
							$out .= '<div class="row">';

							if ( $item_column !='custom' ) { 
								$itemcolumntotal = $item_column ? $item_column : 'col-sm-6 col-md-4';
							}
							if ( $item_column =='custom' ) { 
								$deskcolumn = $desk_column ? $desk_column : 'col-md-4';
								$deskcolumn_offset = $desk_column_offset ? $desk_column_offset : '';
								$mobcolumn = $mob_column ? $mob_column : 'col-sm-6';
								$itemcolumn =  ''.esc_attr( $deskcolumn ).' '.esc_attr( $deskcolumn_offset ).' '.esc_attr( $mobcolumn ).'';
								$itemcolumntotal = preg_replace('/\s\s+/', ' ', $itemcolumn);
							}

							foreach ( $services_loop as $serv ) {
								$out .= '<!-- start item -->';
								$out .= '<div class="col-xs-12 '.$itemcolumntotal.'">';
									$out .= '<div class="list__item text-center">';
								if ( isset( $serv['icon_type'] ) !='' ){ $icon_type = $serv['icon_type']; } else{ $icon_type = 'fonticon'; }
								if ( $icon_type == 'imgicon' ){
									if ( isset( $serv['itemimg_icon'] ) !='' ){
										$itemimgicon = wp_get_attachment_url( $serv['itemimg_icon'],'full' );
										$out .= '<img class="list__item__ico img-responsive" src="'.esc_url( $itemimgicon ).'" alt="img-icon" />';
									}
								}
								else{
									if ( isset( $serv['item_fonticon'] ) !='' ){$out .= '<i class="list__item__ico font-icon '.$serv['item_fonticon'].'"></i>'; }
								}
									if ( isset( $serv['item_title'] ) !='' ){$out .= '<h3 class="list__item__title">'.$serv['item_title'].'</h3>'; }
									if ( isset( $serv['item_desc'] ) !='' ){$out .= '<p>'.$serv['item_desc'].'</p>'; }
									$out .= '</div>';
								$out .= '</div>';
								$out .= '<!-- end item -->';
							}

							$out .= '</div>';
						$out .= '</div>';
					$out .= '</div>';
				$out .= '</div>';
			$out .= '</section>';
			$out .= '<!-- end section -->';
			
	return $out;
}
add_shortcode('nt_landium_section_servicestwo', 'theme_nt_landium_section_servicestwo');


/*-----------------------------------------------------------------------------------*/
/*	ABOUT landium
/*-----------------------------------------------------------------------------------*/
function theme_nt_landium_section_aboutone( $atts, $content = null ) {	
    extract( shortcode_atts(array( 
	"section_id"		=> '',
	"section_heading"	=> '',
	"section_subtitle"	=> '',
	"section_desc"		=> '',
	"btnlink"			=> '',
	"sec_img"			=> ''

	), $atts) );
	
	$id = ($section_id != '') ? 'id="'. esc_attr($section_id) . '"' : '';

	$btnlink 		= ( $btnlink == '||' ) ? '' : $btnlink;
	$btnlink 		= vc_build_link( $btnlink );
	$btn_href 		= $btnlink['url'];
	$btn_title 		= $btnlink['title'];
	$btn_target 	= $btnlink['target'];
	
	$out = '';
	
		$out .= '<!-- start section -->';
		$out .= '<a '.$id.' class="ancor"></a>';
		$out .= '<section class="section section-about section-about--style-1 section--background-base">';
			$out .= '<div class="container-fluid">';
				$out .= '<div class="section-heading section-heading--center section-heading--white  hidden-md hidden-lg">';
					if ( $section_heading !='' ) { $out .= '<h2 class="title h1">'.landium_sanitize_data( $section_heading ).'</h2>'; }

					if ( $section_subtitle !='' ) { $out .= '<p><strong>'.landium_sanitize_data( $section_subtitle ).'</strong></p>'; }
				$out .= '</div>';

			if ( $sec_img !='' ){
				$out .= '<div class="row">';
					$out .= '<div class="col-xs-12 col-md-6">';
						$out .= '<div class="img-place">';
							$sectionimg = wp_get_attachment_url( $sec_img,'full' );
							$out .= '<img class="center-block" src="'.esc_url( $sectionimg ).'" alt="demo" />';
						$out .= '</div>';
						
					$out .= '</div>';
				$out .= '</div>';
			}

			$out .= '</div>';

			$out .= '<div class="container">';
				$out .= '<div class="row">';
					$out .= '<div class="col-xs-12 col-md-6 col-md-offset-6">';
						$out .= '<div class="col-md-MB-30">';
							$out .= '<div class="section-heading section-heading--left section-heading--white  visible-md visible-lg">';
								if ( $section_heading !='' ) { $out .= '<h2 class="title h1">'.landium_sanitize_data( $section_heading ).'</h2>'; }

								if ( $section_subtitle !='' ) { $out .= '<p><strong>'.landium_sanitize_data( $section_subtitle ).'</strong></p>'; }
							$out .= '</div>';
						$out .= '</div>';

						if ( $section_desc !='' ) { $out .= '<p>'.landium_sanitize_data( $section_desc ).'</p>'; }
					if ( $btn_title !='' ) {
						$out .= '<p><a href="'.esc_attr( $btn_href ).'" '; if ( $btn_target != '' ) { $out .= ' target="'.$btn_target.'"';}$out .= 'class="custom-btn light inverted">'.esc_html( $btn_title ).'</a></p>';
					}
					$out .= '</div>';
				$out .= '</div>';
			$out .= '</div>';
		$out .= '</section>';
		$out .= '<!-- end section -->';

	return $out;
}
add_shortcode('nt_landium_section_aboutone', 'theme_nt_landium_section_aboutone');

/*-----------------------------------------------------------------------------------*/
/*	ABOUT 2 landium
/*-----------------------------------------------------------------------------------*/
function theme_nt_landium_section_abouttwo( $atts, $content = null ) {	
    extract( shortcode_atts(array( 
	"section_id"		=> '',
	"section_heading"	=> '',
	"section_desc"		=> '',
	"about_img"			=> '',

	"abouttwoloop"		=> '',
	"item_fonticon"		=> '',
	"item_desc"			=> '',
	"btnlink"			=> '',
	"sectionbgcss"		=> ''

	), $atts) );

	$sectionbg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $sectionbgcss, ' ' ),  $atts );
	$id = ($section_id != '') ? 'id="'. esc_attr($section_id) . '"' : '';
	$abouttwo_loop = (array) vc_param_group_parse_atts($abouttwoloop);	

	$btnlink 		= ( $btnlink == '||' ) ? '' : $btnlink;
	$btnlink 		= vc_build_link( $btnlink );
	$btn_href 		= $btnlink['url'];
	$btn_title 		= $btnlink['title'];
	$btn_target 	= $btnlink['target'];
	
	$out = '';

		$out .= '<!-- start section -->';
		$out .= '<a '.$id.' class="ancor"></a>';
		$out .= '<section class="section'.esc_attr( $sectionbg_css ).'">';
			$out .= '<div class="container">';

				$out .= '<div class="section-heading section-heading--center hidden-md hidden-lg">';
					if ( $section_heading !='' ) { $out .= '<h2 class="title h1">'.landium_sanitize_data( $section_heading ).'</h2>'; }
					if ( $section_desc !='' ) { $out .= '<p>'.landium_sanitize_data( $section_desc ).'</p>'; }
				$out .= '</div>';

				$out .= '<div class="row">';
					$out .= '<div class="col-xs-12 col-sm-4 col-lg-3 col-sm-push-8 col-lg-push-9">';
					if ( $about_img !='' ){ 
						$aboutimg = wp_get_attachment_url( $about_img,'full' );
						$out .= '<img class="img-responsive center-block" src="'.esc_url( $aboutimg ).'" alt="demo">';
					}
					$out .= '</div>';

					$out .= '<div class="col-xs-12 col-sm-8 col-lg-9 col-sm-pull-4 col-lg-pull-3">';
						$out .= '<div class="col-md-MB-30">';
							$out .= '<div class="section-heading section-heading--left  visible-md visible-lg">';
								if ( $section_heading !='' ) { $out .= '<h2 class="title h1">'.landium_sanitize_data( $section_heading ).'</h2>'; }
								if ( $section_desc !='' ) { $out .= '<p>'.landium_sanitize_data( $section_desc ).'</p>'; }
							$out .= '</div>';
						$out .= '</div>';

						$out .= '<div class="list-with-icon list-with-icon--style-3">';
							$out .= '<div class="list__inner">';
							
							foreach ( $abouttwo_loop as $atwo ) {
								$out .= '<div class="list__item clearfix">';
								if ( isset( $atwo['item_fonticon'] ) !='' ){ $out .= '<i class="list__item__ico font-icon circled '.$atwo['item_fonticon'].'"></i>'; }
									$out .= '<div>';
								if ( isset( $atwo['item_desc'] ) !='' ){$out .= '<p>'.$atwo['item_desc'].'</p>'; }
									$out .= '</div>';
								$out .= '</div>';
							}
							if ( $btn_title !='' ) {
								$out .= '<a href="'.esc_attr( $btn_href ).'" '; if ( $btn_target != '' ) { $out .= ' target="'.$btn_target.'"';}$out .= 'class="custom-btn info about2-btn">'.esc_html( $btn_title ).'</a>';
							}
							$out .= '</div>';
						$out .= '</div>';
					$out .= '</div>';
				$out .= '</div>';
			$out .= '</div>';
		$out .= '</section>';
		$out .= '<!-- end section -->';

	return $out;
}
add_shortcode('nt_landium_section_abouttwo', 'theme_nt_landium_section_abouttwo');

/*-----------------------------------------------------------------------------------*/
/*	TESTIMONIAL landium
/*-----------------------------------------------------------------------------------*/
function theme_nt_landium_section_testimonial( $atts, $content = null ) {	
    extract( shortcode_atts(array( 
	"section_id"		=> '',
	"heading_display"	=> '',
	"heading_align"		=> '',
	"section_heading"	=> '',
	"section_desc"		=> '',
	"testistyle"		=> '',
	"testiloop"			=> '',
	"testi_img"			=> '',
	"testi_quote"		=> '',
	"testi_name"		=> '',
	"testi_job"			=> '',
	"sectionbgcss"		=> ''

	), $atts) );

	$sectionbg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $sectionbgcss, ' ' ),  $atts );
	$id = ($section_id != '') ? 'id="'. esc_attr($section_id) . '"' : '';
	$testi_loop = (array) vc_param_group_parse_atts($testiloop);	

	$out = '';

	
			$out .= '<!-- start section -->';
			$out .= '<a '.$id.' class="ancor"></a>';
			$out .= '<section class="section section--background-base-light'.esc_attr( $sectionbg_css ).'">';
				$out .= '<div class="container">';
				$headingdisplay = $heading_display ? $heading_display : 'show';
				$headingalign = $heading_align ? $heading_align : 'center';
				$testi_style = $testistyle ? $testistyle : '1';
				if ( $headingdisplay !='hide' ) { 
					$out .= '<div class="section-heading section-heading--center">';
						if ( $section_heading !='' ) { $out .= '<h2 class="title h1">'.landium_sanitize_data( $section_heading ).'</h2>'; }
						if ( $section_heading !='' ) { $out .= '<p>'.landium_sanitize_data( $section_desc ).'</p>'; }
					$out .= '</div>';
				}
					$out .= '<div class="feedback feedback--slider feedback--style-'.esc_attr( $testi_style ).' feedback-slider--style-'.esc_attr( $testi_style ).'">';
						$out .= '<div class="feedback__inner owl-carousel owl-theme">';

						foreach ( $testi_loop as $testi ) {
							$out .= '<!-- start item -->';
							$out .= '<article class="feedback__item">';
							if ( isset( $testi['testi_quote'] ) !='' ){ 
								$out .= '<div class="feedback__text">';
									$out .= '<p>'.$testi['testi_quote'].'</p>';
								$out .= '</div>';
							}
								$out .= '<div class="feedback__author">';
								if ( isset( $testi['testi_img'] ) !='' ){ 
									$testiimg = wp_get_attachment_url( $testi['testi_img'],'full' );
									$out .= '<img class="circled" src="'.esc_url( $testiimg ).'" height="75" width="75" alt="demo" />';
								}
									if ( isset( $testi['testi_name'] ) !='' ){$out .= '<h3 class="name">'.$testi['testi_name'].'</h3>'; }
									if ( isset( $testi['testi_job'] ) !='' ){$out .= '<h5 class="position">'.$testi['testi_job'].'</h5>'; }
								$out .= '</div>';
							$out .= '</article>';
							$out .= '<!-- end item -->';
						}

						$out .= '</div>';
					$out .= '</div>';
				$out .= '</div>';
			$out .= '</section>';
			$out .= '<!-- end section -->';

	return $out;
}
add_shortcode('nt_landium_section_testimonial', 'theme_nt_landium_section_testimonial');

/*-----------------------------------------------------------------------------------*/
/*	CLIENTS landium
/*-----------------------------------------------------------------------------------*/
function theme_nt_landium_section_clients( $atts, $content = null ) {	
    extract( shortcode_atts(array( 
	"section_id"	=> '',
	"clientloop"	=> '',
	"client_img"	=> '',
	"sectionbgcss"	=> ''

	), $atts) );

	$sectionbg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $sectionbgcss, ' ' ),  $atts );
	$id = ($section_id != '') ? 'id="'. esc_attr($section_id) . '"' : '';
	$client_loop = (array) vc_param_group_parse_atts($clientloop);	

	$out = '';

		$out .= '<!-- start section -->';
		$out .= '<div '.$id.' class="section'.esc_attr( $sectionbg_css ).'">';
			$out .= '<div class="container">';
				$out .= '<div class="partners-list">';
					$out .= '<div class="partners-list__inner">';
					foreach ( $client_loop as $client ) {
						if ( isset( $client['client_img'] ) !='' ){
							$clientimg = wp_get_attachment_url( $client['client_img'],'full' );
							$out .= '<span class="partners-list__item"><img src="'.esc_url( $clientimg ).'" alt="demo" /></span>';
						}
					}
					$out .= '</div>';
				$out .= '</div>';
			$out .= '</div>';
		$out .= '</div>';
		$out .= '<!-- end section -->';

return $out;
}
add_shortcode('nt_landium_section_clients', 'theme_nt_landium_section_clients');

/*-----------------------------------------------------------------------------------*/
/*	VIDEO landium
/*-----------------------------------------------------------------------------------*/
function theme_nt_landium_section_video( $atts, $content = null ) {	
    extract( shortcode_atts(array( 
	"section_id"		=> '',
	"section_heading"	=> '',
	"section_desc"		=> '',
	"video_bgimg"		=> '',
	"youtubeurl"		=> '',
	"sectionbgcss"		=> ''

	), $atts) );

	$sectionbg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $sectionbgcss, ' ' ),  $atts );
	$id = ($section_id != '') ? 'id="'. esc_attr($section_id) . '"' : '';

	$out = '';

		$out .= '<!-- start section -->';
		$out .= '<a '.$id.' class="ancor"></a>';
		$out .= '<section class="section section--video'.esc_attr( $sectionbg_css ).'">';
			$out .= '<div class="container">';
			if ( $video_bgimg !='' ) { 
				$videobgimg = wp_get_attachment_url( $video_bgimg,'full' );
				$videobg_img = ' style="background-image: url('.esc_url( $videobgimg ).')"';
			}
			else{$videobg_img = '';}
				$out .= '<div class="b-video b-video--boxed"'.$videobg_img.'>';
					$out .= '<div class="pattern" style="opacity: 0.38;"></div>';

					$out .= '<div class="b-video__inner">';
					if ( $youtubeurl !='' ) { 
						$out .= '<a class="b-video__btn-play circled" href="'.esc_url( $youtubeurl ).'" data-gallery="s-video"><i></i></a>';
					}
					if ( $section_heading !='' || $section_desc !='' ) { 
						$out .= '<div class="section-heading section-heading--center section-heading--white">';
							if ( $section_heading !='' ) { $out .= '<h2 class="title">'.landium_sanitize_data( $section_heading ).'</h2>'; }
							if ( $section_desc !='' ) { $out .= '<p>'.landium_sanitize_data( $section_desc ).'</p>'; }
						$out .= '</div>';
					}
					$out .= '</div>';
				$out .= '</div>';
			$out .= '</div>';
		$out .= '</section>';
		$out .= '<!-- end section -->';

	return $out;
}
add_shortcode('nt_landium_section_video', 'theme_nt_landium_section_video');

/*-----------------------------------------------------------------------------------*/
/*	FEATURES ICON landium
/*-----------------------------------------------------------------------------------*/
function theme_nt_landium_section_featuresicon( $atts, $content = null ) {	
    extract( shortcode_atts(array( 
	"section_id"		=> '',
	"heading_display"	=> '',
	"section_heading"	=> '',
	"section_desc"		=> '',
	"centerimg"			=> '',

	"featuresiconloop"	=> '',
	"icon_type"			=> '',
	"l_item_fonticon"	=> '',
	"l_itemimg_icon"	=> '',
	"l_item_title"		=> '',
	"l_item_desc"		=> '',
	"r_item_fonticon"	=> '',
	"r_itemimg_icon"	=> '',
	"r_item_title"		=> '',
	"r_item_desc"		=> '',
	"sectionbgcss"		=> ''

	), $atts) );

	$sectionbg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $sectionbgcss, ' ' ),  $atts );
	$id = ($section_id != '') ? 'id="'. esc_attr($section_id) . '"' : '';
	$featuresicon_loop = (array) vc_param_group_parse_atts($featuresiconloop);

	$out = '';

			$out .= '<!-- start section -->';
			$out .= '<a '.$id.' class="ancor"></a>';
			$out .= '<section class="section'.esc_attr( $sectionbg_css ).'">';
				$out .= '<div class="container">';
				if ( $heading_display != 'hide' ){
					$out .= '<div class="section-heading section-heading--center">';
						$out .= '<h2 class="title h1">'.landium_sanitize_data( $section_heading ).'</h2>';
						$out .= '<p>'.landium_sanitize_data( $section_desc ).'</p>';
					$out .= '</div>';
				}
					$out .= '<div class="row">';
						$out .= '<div class="col-xs-12 col-md-4 col-md-push-4">';
							$out .= '<div class="col-md-MB-30">';
							if ( $centerimg !='' ){
								$center_img = wp_get_attachment_url( $centerimg,'full' );
								$out .= '<img class="img-responsive center-block" src="'.esc_url( $center_img ).'" alt="demo" />';
							}
							$out .= '</div>';
						$out .= '</div>';

						$out .= '<div class="col-xs-12 col-md-8">';
							$out .= '<div class="list-with-icon list-with-icon--style-1">';
								$out .= '<div class="list__inner">';
								
								foreach ( $featuresicon_loop as $f ) {
									$out .= '<div class="row">';
										$out .= '<!-- start item -->';
										$out .= '<div class="col-xs-12 col-sm-6 col-md-pull-6">';
											$out .= '<div class="list__item">';
												if ( isset( $f['icon_type'] ) !='' ){ $icon_type = $f['icon_type']; } else{ $icon_type = 'fonticon'; }
												if ( $icon_type == 'imgicon' ){
													if ( isset( $f['l_itemimg_icon'] ) !='' ){
														$l_itemimgicon = wp_get_attachment_url( $f['l_itemimg_icon'],'full' );
														$out .= '<img class="list__item__ico img-responsive" src="'.esc_url( $l_itemimgicon ).'" alt="img-icon" />';
													}
												}
												else{
													if ( isset( $f['l_item_fonticon'] ) !='' ){$out .= '<i class="list__item__ico font-icon '.$f['l_item_fonticon'].'"></i>'; }
												}
												if ( isset( $f['l_item_title'] ) !='' ){$out .= '<h3 class="list__item__title">'.$f['l_item_title'].'</h3>'; }
												if ( isset( $f['l_item_desc'] ) !='' ){$out .= '<p>'.$f['l_item_desc'].'</p>'; }
											$out .= '</div>';
										$out .= '</div>';
										$out .= '<!-- end item -->';

										$out .= '<!-- start item -->';
										$out .= '<div class="col-xs-12 col-sm-6">';
											$out .= '<div class="list__item">';
												if ( $icon_type == 'imgicon' ){
													if ( isset( $f['r_itemimg_icon'] ) !='' ){
														$r_itemimgicon = wp_get_attachment_url( $f['r_itemimg_icon'],'full' );
														$out .= '<img class="list__item__ico img-responsive" src="'.esc_url( $r_itemimgicon ).'" alt="img-icon" />';
													}
												}
												else{
													if ( isset( $f['r_item_fonticon'] ) !='' ){$out .= '<i class="list__item__ico font-icon '.$f['r_item_fonticon'].'"></i>'; }
												}
												if ( isset( $f['r_item_title'] ) !='' ){$out .= '<h3 class="list__item__title">'.$f['r_item_title'].'</h3>'; }
												if ( isset( $f['r_item_desc'] ) !='' ){$out .= '<p>'.$f['r_item_desc'].'</p>'; }
											$out .= '</div>';
										$out .= '</div>';
										$out .= '<!-- end item -->';
									$out .= '</div>';
								}

								$out .= '</div>';
							$out .= '</div>';
						$out .= '</div>';
					$out .= '</div>';
				$out .= '</div>';
			$out .= '</section>';
			$out .= '<!-- end section -->';

return $out;
}
add_shortcode('nt_landium_section_featuresicon', 'theme_nt_landium_section_featuresicon');

/*-----------------------------------------------------------------------------------*/
/*	FEATURES 2 ICON landium
/*-----------------------------------------------------------------------------------*/
function theme_nt_landium_section_featuresicontwo( $atts, $content = null ) {	
    extract( shortcode_atts(array( 
	"section_id"		=> '',
	"heading_display"	=> '',
	"section_heading"	=> '',
	"section_desc"		=> '',
	"centerimg"			=> '',

	"featuresiconloop"	=> '',
	"icon_type"			=> '',
	"l_item_fonticon"	=> '',
	"l_itemimg_icon"	=> '',
	"l_item_title"		=> '',
	"l_item_desc"		=> '',
	"r_item_fonticon"	=> '',
	"r_itemimg_icon"	=> '',
	"r_item_title"		=> '',
	"r_item_desc"		=> '',
	"sectionbgcss"		=> ''

	), $atts) );

	$sectionbg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $sectionbgcss, ' ' ),  $atts );
	$id = ($section_id != '') ? 'id="'. esc_attr($section_id) . '"' : '';
	$featuresicon_loop = (array) vc_param_group_parse_atts($featuresiconloop);

	$out = '';

			$out .= '<!-- start section -->';
			$out .= '<a '.$id.' class="ancor"></a>';
			$out .= '<section class="section'.esc_attr( $sectionbg_css ).'">';
				$out .= '<div class="container">';
				if ( $heading_display != 'hide' ){
					$out .= '<div class="section-heading section-heading--center">';
						$out .= '<h2 class="title h1">'.landium_sanitize_data( $section_heading ).'</h2>';
						$out .= '<p>'.landium_sanitize_data( $section_desc ).'</p>';
					$out .= '</div>';
				}
					$out .= '<div class="row">';
						$out .= '<div class="col-xs-12 col-md-6 col-md-push-3">';
							$out .= '<div class="col-md-MB-30">';
							if ( $centerimg !='' ){
								$center_img = wp_get_attachment_url( $centerimg,'full' );
								$out .= '<img class="img-responsive center-block" src="'.esc_url( $center_img ).'" alt="demo" />';
							}
							$out .= '</div>';
						$out .= '</div>';

						$out .= '<div class="col-xs-12 col-md-6">';
							$out .= '<div class="list-with-icon list-with-icon--style-1">';
								$out .= '<div class="list__inner">';
								
								foreach ( $featuresicon_loop as $f ) {
									$out .= '<div class="row">';
										$out .= '<!-- start item -->';
										$out .= '<div class="col-xs-12 col-sm-6 col-md-pull-12">';
											$out .= '<div class="list__item">';
												if ( isset( $f['icon_type'] ) !='' ){ $icon_type = $f['icon_type']; } else{ $icon_type = 'fonticon'; }
												if ( $icon_type == 'imgicon' ){
													if ( isset( $f['l_itemimg_icon'] ) !='' ){
														$l_itemimgicon = wp_get_attachment_url( $f['l_itemimg_icon'],'full' );
														$out .= '<img class="list__item__ico img-responsive" src="'.esc_url( $l_itemimgicon ).'" alt="img-icon" />';
													}
												}
												else{
													if ( isset( $f['l_item_fonticon'] ) !='' ){$out .= '<i class="list__item__ico font-icon '.$f['l_item_fonticon'].'"></i>'; }
												}
												if ( isset( $f['l_item_title'] ) !='' ){$out .= '<h3 class="list__item__title">'.$f['l_item_title'].'</h3>'; }
												if ( isset( $f['l_item_desc'] ) !='' ){$out .= '<p>'.$f['l_item_desc'].'</p>'; }
											$out .= '</div>';
										$out .= '</div>';
										$out .= '<!-- end item -->';

										$out .= '<!-- start item -->';
										$out .= '<div class="col-xs-12 col-sm-6">';
											$out .= '<div class="list__item">';
												if ( $icon_type == 'imgicon' ){
													if ( isset( $f['r_itemimg_icon'] ) !='' ){
														$r_itemimgicon = wp_get_attachment_url( $f['r_itemimg_icon'],'full' );
														$out .= '<img class="list__item__ico img-responsive" src="'.esc_url( $r_itemimgicon ).'" alt="img-icon" />';
													}
												}
												else{
													if ( isset( $f['r_item_fonticon'] ) !='' ){$out .= '<i class="list__item__ico font-icon '.$f['r_item_fonticon'].'"></i>'; }
												}
												if ( isset( $f['r_item_title'] ) !='' ){$out .= '<h3 class="list__item__title">'.$f['r_item_title'].'</h3>'; }
												if ( isset( $f['r_item_desc'] ) !='' ){$out .= '<p>'.$f['r_item_desc'].'</p>'; }
											$out .= '</div>';
										$out .= '</div>';
										$out .= '<!-- end item -->';
									$out .= '</div>';
								}

								$out .= '</div>';
							$out .= '</div>';
						$out .= '</div>';
					$out .= '</div>';
				$out .= '</div>';
			$out .= '</section>';
			$out .= '<!-- end section -->';

return $out;
}
add_shortcode('nt_landium_section_featuresicontwo', 'theme_nt_landium_section_featuresicontwo');

/*-----------------------------------------------------------------------------------*/
/*	HOW IT WORKS landium
/*-----------------------------------------------------------------------------------*/
function theme_nt_landium_section_howitworks( $atts, $content = null ) {	
    extract( shortcode_atts(array( 
	"section_id"		=> '',
	"heading_display"	=> '',
	"section_heading"	=> '',
	"section_desc"		=> '',

	"featuresiconloop"	=> '',
	"icon_type"			=> '',
	"item_fonticon"		=> '',
	"itemimg_icon"		=> '',
	"item_title"		=> '',
	"item_desc"			=> '',
	"sectionbgcss"		=> ''

	), $atts) );

	$sectionbg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $sectionbgcss, ' ' ),  $atts );
	$id = ($section_id != '') ? 'id="'. esc_attr($section_id) . '"' : '';
	$featuresicon_loop = (array) vc_param_group_parse_atts($featuresiconloop);

	$out = '';

		$out .= '<!-- start section -->';
		$out .= '<a '.$id.' class="ancor"></a>';
		$out .= '<section class="section section--background-base-light'.esc_attr( $sectionbg_css ).'">';
			$out .= '<div class="container">';
			if ( $heading_display != 'hide' ){
				$out .= '<div class="section-heading section-heading--center">';
					$out .= '<h2 class="title h1">'.landium_sanitize_data( $section_heading ).'</h2>';
					$out .= '<p>'.landium_sanitize_data( $section_desc ).'</p>';
				$out .= '</div>';
			}
				$out .= '<div class="list-with-icon list-with-icon--style-4">';
					$out .= '<div class="list__inner">';
						$out .= '<div class="row">';
						
						foreach ( $featuresicon_loop as $f ) {
							$out .= '<!-- start item -->';
							$out .= '<div class="col-xs-12 col-sm-6 col-md-4">';
								$out .= '<div class="list__item text-center">';
										if ( isset( $f['icon_type'] ) !='' ){ $icon_type = $f['icon_type']; } else{ $icon_type = 'fonticon'; }
										if ( $icon_type == 'imgicon' ){
											if ( isset( $f['itemimg_icon'] ) !='' ){
												$itemimgicon = wp_get_attachment_url( $f['itemimg_icon'],'full' );
												$out .= '<img class="list__item__ico img-responsive" src="'.esc_url( $itemimgicon ).'" alt="img-icon" />';
											}
										}
										else{
											if ( isset( $f['item_fonticon'] ) !='' ){$out .= '<i class="list__item__ico font-icon '.$f['item_fonticon'].'"></i>'; }
										}
											if ( isset( $f['item_title'] ) !='' ){$out .= '<h3 class="list__item__title">'.$f['item_title'].'</h3>'; }
											if ( isset( $f['item_desc'] ) !='' ){$out .= '<p>'.$f['item_desc'].'</p>'; }
								$out .= '</div>';
							$out .= '</div>';
							$out .= '<!-- end item -->';
						}

						$out .= '</div>';
					$out .= '</div>';
				$out .= '</div>';
			$out .= '</div>';
		$out .= '</section>';
		$out .= '<!-- end section -->';

return $out;
}
add_shortcode('nt_landium_section_howitworks', 'theme_nt_landium_section_howitworks');

/*-----------------------------------------------------------------------------------*/
/*	GALLERY landium
/*-----------------------------------------------------------------------------------*/
function theme_nt_landium_section_gallery( $atts, $content = null ) {	
    extract( shortcode_atts(array( 
	"section_id"		=> '',
	"galleryloop"		=> '',
	"bgimg_pos"			=> '',
	"gallerybg_img"		=> '',
	"item_title"		=> '',
	"item_desc"			=> '',
	"sectionbgcss"		=> ''

	), $atts) );

	$sectionbg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $sectionbgcss, ' ' ),  $atts );
	$id = ($section_id != '') ? 'id="'. esc_attr($section_id) . '"' : '';
	$gallery_loop = (array) vc_param_group_parse_atts($galleryloop);

	$out = '';

		$out .= '<!-- start section -->';
		$out .= '<a '.$id.' class="ancor"></a>';
		$out .= '<section class="section'.esc_attr( $sectionbg_css ).'">';
			$out .= '<div class="container-fluid">';
				$out .= '<div class="gallery">';
				
			foreach ( $gallery_loop as $g ) {
				if ( isset( $g['bgimg_pos'] ) !='' ){ $bgimg_p = $g['bgimg_pos']; } else{ $bgimg_p = 'left';}
				if ( $bgimg_p == 'left' ){
					$out .= '<div class="row matchHeight-container">';
						$out .= '<div class="col-xs-12 col-sm-6 col-sm-push-6">';
							$out .= '<div class="gallery__item gallery__item--text matchHeight-item">';
								$out .= '<div class="v-align">';
									$out .= '<div>';
										$out .= '<div class="section-heading section-heading--left">';
											if ( isset( $g['item_title'] ) !='' ){ $out .= '<h3 class="title h1">'.$g['item_title'].'</h3>'; }
											if ( isset( $g['item_desc'] ) !='' ){ $out .= '<p>'.$g['item_desc'].'</p>'; }
										$out .= '</div>';
									$out .= '</div>';
								$out .= '</div>';
							$out .= '</div>';
						$out .= '</div>';

						$out .= '<div class="col-xs-12 col-sm-6 col-sm-pull-6">';
							if ( isset( $g['gallerybg_img'] ) !='' ){
								$gallery_bgimg = wp_get_attachment_url( $g['gallerybg_img'],'full' );
								$gallerybgimg = ' style="background-image: url('.esc_url( $gallery_bgimg ).')"';
							}
							else{ $gallerybgimg = ''; }
							$out .= '<div class="gallery__item gallery__item--image matchHeight-item"'.$gallerybgimg.'></div>';
						$out .= '</div>';
					$out .= '</div>';
				}
				if ( $bgimg_p == 'right' ){
					$out .= '<div class="row matchHeight-container">';
						$out .= '<div class="col-xs-12 col-sm-6">';
							$out .= '<div class="gallery__item gallery__item--text matchHeight-item">';
								$out .= '<div class="v-align">';
									$out .= '<div>';
										$out .= '<div class="section-heading section-heading--left">';
											if ( isset( $g['item_title'] ) !='' ){ $out .= '<h3 class="title h1">'.$g['item_title'].'</h3>'; }
											if ( isset( $g['item_desc'] ) !='' ){ $out .= '<p>'.$g['item_desc'].'</p>'; }
										$out .= '</div>';
									$out .= '</div>';
								$out .= '</div>';
							$out .= '</div>';
						$out .= '</div>';

						$out .= '<div class="col-xs-12 col-sm-6">';
							if ( isset( $g['gallerybg_img'] ) !='' ){
								$gallery_bgimg = wp_get_attachment_url( $g['gallerybg_img'],'full' );
								$gallerybgimg = ' style="background-image: url('.esc_url( $gallery_bgimg ).')"';
							}
							else{ $gallerybgimg = ''; }
							$out .= '<div class="gallery__item gallery__item--image matchHeight-item"'.$gallerybgimg.'></div>';
						$out .= '</div>';
					$out .= '</div>';
				}
			}
					
				$out .= '</div>';
			$out .= '</div>';
		$out .= '</section>';
		$out .= '<!-- end section -->';

return $out;
}
add_shortcode('nt_landium_section_gallery', 'theme_nt_landium_section_gallery');

/*-----------------------------------------------------------------------------------*/
/*	PRICE TABLE
/*-----------------------------------------------------------------------------------*/
function theme_nt_landium_section_pricing($atts){
	extract(shortcode_atts(array(
		'section_id'		=> '',
		'heading_display'	=> 'show',
		'section_heading'	=> '',
		'section_desc'		=> '',
		'sectionbgcss'		=> '',

		'pack_style'		=> '',
		'orderby'         	=> 'date',
		'order'           	=> 'DESC',
		'post_number'     	=> '4',
		'price_category'  	=> 'all',
		'pricelink'   		=> ''
		
		), $atts));

		$pricelink = ( $pricelink == '||' ) ? '' : $pricelink;
		$pricelink = vc_build_link( $pricelink );
		$price_btnhref = $pricelink['url'];
		$price_btntitle = $pricelink['title'];
		$price_btntarget = $pricelink['target'];
		$pricebtntarget = $price_btntarget ? 'target="'.esc_attr( $price_btntarget ).'"' : '';


		global $post;
		$args = array( 'post_type' => 'price',
			'posts_per_page' => $post_number,
			'order' 		 => $order,
			'orderby' 		 => $orderby,
			'post_status' 	 => 'publish' 
		);
		if($price_category != 'all'){
			$str = $price_category;
			$arr = explode(',', $str);
			$args['tax_query'][] = array( 'taxonomy' => 'price_category', 'field' => 'slug', 'terms' => $arr );
		}

	$sectionbg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $sectionbgcss, ' ' ),  $atts );
	$id = ($section_id != '') ? 'id="'. esc_attr($section_id) . '"' : '';
    $out = '';

		$out .= '<!-- start section -->';
		$out .= '<a '.$id.' class="ancor"></a>';
		$out .= '<section class="section'.esc_attr( $sectionbg_css ).'">';
			$out .= '<div class="container">';
			
			if ( $heading_display != 'hide' ){
				$out .= '<div class="section-heading section-heading--center">';
					if ( $section_heading !='' ) { $out .= '<h2 class="title h1">'.landium_sanitize_data( $section_heading ).'</h2>'; }

					if ( $section_desc !='' ) { $out .= '<p>'.landium_sanitize_data( $section_desc ).'</p>'; }
				$out .= '</div>';
			}

				$packstyle = $pack_style ? $pack_style : '1';
				$out .= '<div class="pricing-table pricing-table--style-'.esc_attr( $packstyle ).'">';
					$out .= '<div class="pricing__inner">';
						$out .= '<div class="row">';

						$nt_landium_price_query = new WP_Query($args);
						if( $nt_landium_price_query->have_posts() ) :
						while ($nt_landium_price_query->have_posts()) : $nt_landium_price_query->the_post();

							$column_mobile	= get_post_meta( get_the_ID(), 'nt_landium_column_mobile', true );
							$column_desk	= get_post_meta( get_the_ID(), 'nt_landium_column_desk', true );
							$column_offset	= get_post_meta( get_the_ID(), 'nt_landium_column_offset', true );

							$packcolor		= get_post_meta( get_the_ID(), 'nt_landium_packcolor', true );
							$bestpack		= get_post_meta( get_the_ID(), 'nt_landium_bestpack', true );
							$bestpacktag	= get_post_meta( get_the_ID(), 'nt_landium_bestpacktag', true );
							$packname		= get_post_meta( get_the_ID(), 'nt_landium_packname', true );
							$currency		= get_post_meta( get_the_ID(), 'nt_landium_currency', true );
							$price			= get_post_meta( get_the_ID(), 'nt_landium_price', true );
							$subprice		= get_post_meta( get_the_ID(), 'nt_landium_subprice', true );
							$period			= get_post_meta( get_the_ID(), 'nt_landium_period', true );

							$tablefeatures	= get_post_meta( get_the_ID(), 'nt_landium_features_list', true );

							$columnmobile = $column_mobile ? $column_mobile : 'col-sm-6';
							$columndesk = $column_desk ? $column_desk : 'col-md-3';
							$columnoffset = $column_offset ? $column_offset : '';

							$col_str = ''.esc_attr( $columnmobile ).' '.esc_attr( $columndesk ).' '.esc_attr( $columnoffset ).'';
							$coltotal = preg_replace('/\s\s+/', ' ', $col_str);
							$out .= '<!-- start item -->';
							$out .= '<div class="col-xs-12 '.$coltotal.'">';
							if ( $packstyle =='1' ) { $pack_color = $packcolor ? $packcolor : 'price-item__blue'; } else{ $pack_color = '' ; }
								$out .= '<div class="price-item '.esc_attr( $pack_color ).' '.esc_attr( $bestpack ).' center-block">';
								if ( $bestpack =='price-item__active' ) { 
									$out .= '<div class="price-item__label">'.esc_html( $bestpacktag ).'</div>';
								}
									$out .= '<div class="price-item__price" data-before="'.esc_attr( $currency ).'">'.esc_html( $price ).'<sup>'.esc_html( $subprice ).'</sup><span>'.esc_html( $period ).'</span>
											</div>';

									if ( $packname !='' ) { $out .= '<h3 class="price-item__title">'.esc_html( $packname ).'</h3>'; }

									if ( !empty($tablefeatures) ) { 
										$out .= '<ul class="price-item__list">';
										foreach ( $tablefeatures as $listitem ) { 
											$out .= '<li>'.esc_html( $listitem ).'</li>';
										}
										$out .= '</ul>';
									}

									if ( $price_btntitle !='' ) { 
										$out .= '<a href="'.esc_attr( $price_btnhref ).'" '.$pricebtntarget.' class="price-item__btn">'.esc_html( $price_btntitle ).'</a>';
									}

									$out .= '<span class="price-item__bg"></span>';
								$out .= '</div>';
							$out .= '</div>';
							$out .= '<!-- end item -->';

						endwhile;
						endif;
						wp_reset_postdata();

						$out .= '</div>';
					$out .= '</div>';
				$out .= '</div>';
			$out .= '</div>';
		$out .= '</section>';
		$out .= '<!-- end section -->';
	return $out;
}
add_shortcode('nt_landium_section_pricing', 'theme_nt_landium_section_pricing');

/*-----------------------------------------------------------------------------------*/
/*	TEAM
/*-----------------------------------------------------------------------------------*/	
function theme_nt_landium_section_team($atts){
	extract(shortcode_atts(array( 
		'section_id'		=> '',
		'heading_display'	=> 'show',
		'section_heading'	=> '',
		'section_desc'		=> '',
		'sectionbgcss'		=> '',
		'orderby'       	=> 'date',
		'order'         	=> 'DESC',
		'post_number'   	=> '3',
		'team_category' 	=> 'all',

    ), $atts));

	global $post;
	$nt_landium_team_args = array( 'post_type' => 'team',
		'posts_per_page' => $post_number,
		'order' 		 => $order,
		'orderby' 		 => $orderby,
		'post_status' 	 => 'publish' 
	);

	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $sectionbgcss, ' ' ),  $atts );
	$id = ($section_id != '') ? 'id="'. esc_attr($section_id) . '"' : '';

    if( $team_category != 'all' ){
    	$str = $team_category;
    	$arr = explode( ',', $str );
		$nt_landium_team_args['tax_query'][] = array( 'taxonomy' => 'team_category', 'field' => 'slug', 'terms' => $arr );

	}

	$out = '';
			$out .= '<!-- start section -->';
			$out .= '<a '.$id.' class="ancor"></a>';
			$out .= '<section class="section '.esc_attr( $css_class ).'">';
				$out .= '<div class="container">';
			if ( $heading_display != 'hide' ){
				$out .= '<div class="section-heading section-heading--center">';
					if ( $section_heading !='' ) { $out .= '<h2 class="title h1">'.landium_sanitize_data( $section_heading ).'</h2>'; }

					if ( $section_desc !='' ) { $out .= '<p>'.landium_sanitize_data( $section_desc ).'</p>'; }
				$out .= '</div>';
			}

					$out .= '<div class="team">';
						$out .= '<div class="team__inner">';
							$out .= '<div class="row">';


						$nt_landium_team_query = new WP_Query($nt_landium_team_args);
						if ( $nt_landium_team_query->have_posts() ) :
							while ($nt_landium_team_query->have_posts()) : $nt_landium_team_query->the_post();

								$team_job 	   = get_post_meta( get_the_ID(), 'nt_landium_team_job', true );
								$contents      = get_post_meta( get_the_ID(), 'nt_landium_social_icon', true );
								$socialurl     = get_post_meta( get_the_ID(), 'nt_landium_social_url', true );
								$social_target = get_post_meta( get_the_ID(), 'nt_landium_social_target', true );

								$column_mobile	= get_post_meta( get_the_ID(), 'nt_landium_column_mobile', true );
								$column_desk	= get_post_meta( get_the_ID(), 'nt_landium_column_desk', true );
								$column_offset	= get_post_meta( get_the_ID(), 'nt_landium_column_offset', true );

								$columnmobile = $column_mobile ? $column_mobile : 'col-sm-6';
								$columndesk = $column_desk ? $column_desk : 'col-md-4';
								$columnoffset = $column_offset ? $column_offset : '';

								$col_str = ''.esc_attr( $columnmobile ).' '.esc_attr( $columndesk ).' '.esc_attr( $columnoffset ).'';
								$coltotal = preg_replace('/\s\s+/', ' ', $col_str);
								
								$out .= '<!-- start item -->';
								$out .= '<div class="col-xs-12 '.$coltotal.'">';
									$out .= '<div class="team__item center-block">';
										$nt_landium_teamthumb = get_post_thumbnail_id();
										$nt_landium_teamimg = nt_landium_aq_resize( wp_get_attachment_url( $nt_landium_teamthumb,'full' ), 400, 541 , true, true, true ); 
										$out .= '<figure class="team__photo">';
											$out .= '<img src="'.esc_url( $nt_landium_teamimg ).'" alt="'.get_the_title().'" />';
										$out .= '</figure>';
					
										$out .= '<div class="team__description">';
											$out .= '<h3 class="team__name">'.get_the_title().'</h3>';
					
											if ( $teamjob !='' ) { $out .= '<h5 class="team__position">'.esc_html( $teamjob ).'</h5>'; }
					
											$out .= '<div class="social-btns">';
												
											foreach (array_combine($contents, $socialurl) as $content => $url){
												$target = ( $social_target != '' ) ? 'target="'.esc_attr( $social_target ).'"' : '';
												$out .= '<a class="'.$content.'" href="'.$url.'" '.$target.'></a>';
											}
											$out .= '</div>';
										$out .= '</div>';
									$out .= '</div>';
								$out .= '</div>';
								$out .= '<!-- end item -->';
							endwhile;
						endif;
						wp_reset_postdata();

							$out .= '</div>';
						$out .= '</div>';
					$out .= '</div>';
				$out .= '</div>';
			$out .= '</section>';
			$out .= '<!-- end section -->';
	return $out;
}
add_shortcode('nt_landium_section_team', 'theme_nt_landium_section_team');


/*-----------------------------------------------------------------------------------*/
/*	APP STORE COMINGSOON landium
/*-----------------------------------------------------------------------------------*/

function theme_nt_landium_section_appstore( $atts, $content = null ) {	
    extract( shortcode_atts(array( 
	"section_id"		=> '',
	"appbgimg"			=> '',
	"section_heading"	=> '',
	"section_desc"		=> '',
	"section_desc2"		=> '',
	"leftimg"			=> '',
	"herobtnlink1"		=> '',
	"appstoreimg"		=> '',
	"herobtnlink2"		=> '',
	"playstoreimg"		=> ''

	), $atts) );

	$id = ($section_id != '') ? 'id="'. esc_attr($section_id) . '"' : '';	

	$herobtnlink1 		= ( $herobtnlink1 == '||' ) ? '' : $herobtnlink1;
	$herobtnlink1 		= vc_build_link( $herobtnlink1 );
	$herobtn_href1 		= $herobtnlink1['url'];
	$herobtn_title1 	= $herobtnlink1['title'];
	$herobtn_target1 	= $herobtnlink1['target'];

	$herobtnlink2 		= ( $herobtnlink2 == '||' ) ? '' : $herobtnlink2;
	$herobtnlink2 		= vc_build_link( $herobtnlink2 );
	$herobtn_href2 		= $herobtnlink2['url'];
	$herobtn_title2 	= $herobtnlink2['title'];
	$herobtn_target2 	= $herobtnlink2['target'];

	$out = '';

	if ( $appbgimg !='' ) { 
		$appbg_img = wp_get_attachment_url( $appbgimg,'full' );
		$app_bgimg = ' data-stellar-background-ratio="0.5" data-stellar-vertical-offset="300" data-stellar-offset-parent="true" style="background-image: url('.esc_url( $appbg_img ).')"';
	}
	else{ $app_bgimg = ''; }

		$out .= '<!-- start section -->';
		$out .= '<section '.$id.' class="section section-apps parallax"'.$app_bgimg.'>';
			$out .= '<div class="container">';
				$out .= '<div class="section-heading section-heading--center section-heading--white visible-xs">';
					if ( $section_heading !='' ) { $out .= '<h2 class="title h1">'.landium_sanitize_data( $section_heading ).'</h2>'; }
					if ( $section_desc !='' ) { $out .= '<p>'.landium_sanitize_data( $section_desc ).'</p>'; }
				$out .= '</div>';
			
				$out .= '<div class="row">';
					$out .= '<div class="col-xs-12 col-sm-6">';
						$out .= '<div class="img-place">';
							if ( $leftimg !='' ) { 
							$left_img = wp_get_attachment_url( $leftimg,'full' );
							$out .= '<img class="img-responsive center-block" src="'.esc_url( $left_img ).'" alt="demo">';
							}
						$out .= '</div>';
					$out .= '</div>';

					$out .= '<div class="col-xs-12 col-sm-6">';
						$out .= '<div class="text">';
							$out .= '<div class="col-md-MB-30">';
								$out .= '<div class="section-heading section-heading--left section-heading--white  hidden-xs">';
									if ( $section_heading !='' ) { $out .= '<h2 class="title h1">'.landium_sanitize_data( $section_heading ).'</h2>'; }
									if ( $section_desc !='' ) { $out .= '<p>'.landium_sanitize_data( $section_desc ).'</p>'; }
								$out .= '</div>';
							$out .= '</div>';
							if ( $section_desc2 !='' ) { $out .= '<p>'.landium_sanitize_data( $section_desc2 ).'</p>'; }

							if ( $appstoreimg !='' || $playstoreimg !='' ) {
								$out .= '<p class="download-button">';
								if ( $appstoreimg !='' ) {
									$out .= '<a href="'.esc_attr( $herobtn_href1 ).'"'; if ( $herobtn_target1 != '' ) { $out .= ' target="'.$herobtn_target1.'"';}$out .= '>';
										$appstore_img = wp_get_attachment_url( $appstoreimg,'full' );
										$out .= '<img src="'.esc_url( $appstore_img ).'" alt="'.esc_html( $herobtn_title1 ).'" />';
									$out .= '</a>';
								}
								if ( $playstoreimg !='' ) { 
									$out .= '<a href="'.esc_attr( $herobtn_href2 ).'"'; if ( $herobtn_target2 != '' ) { $out .= ' target="'.$herobtn_target2.'"';}$out .= '>';
											$playstore_img = wp_get_attachment_url( $playstoreimg,'full' );
											$out .= '<img src="'.esc_url( $playstore_img ).'" alt="'.esc_html( $herobtn_title2 ).'" />';
									$out .= '</a>';
								}
								$out .= '</p>';
							}

						$out .= '</div>';
					$out .= '</div>';
				$out .= '</div>';
			$out .= '</div>';
		$out .= '</section>';
		$out .= '<!-- end section -->';

return $out;
}
add_shortcode('nt_landium_section_appstore', 'theme_nt_landium_section_appstore');