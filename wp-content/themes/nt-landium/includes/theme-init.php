<?php
/**
 *
 * @package WordPress
 * @subpackage nt_landium
 * @since nt_landium 1.0
 *
 */


/*************************************************
## Google Font
*************************************************/

if ( ! function_exists( 'nt_landium_fonts_url' ) ) :
function nt_landium_fonts_url() {
	$fonts_url = '';

	$raleway 	= 	_x( 'on', 'Raleway font: on or off', 	'nt-landium' );
	$roboto 	= 	_x( 'on', 'Roboto font: on or off', 	'nt-landium' );

	if ( 'off' !== $raleway || 'off' !== $roboto ) {
		$font_families = array();

		if ( 'off' !== $raleway )
			$font_families[] = 'Raleway:300,300i,400,400i,700,700i';

		if ( 'off' !== $roboto )
			$font_families[] = 'Roboto:300,300i,400,400i,700,700i';

		$query_args = array(
			'family'     => urlencode( implode( '|', $font_families ) ),
			'subset'     => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
	}

	return $fonts_url;
}
endif;

/*************************************************
## Styles and Scripts
*************************************************/


function nt_landium_scripts() {

	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );


	// general css file
	wp_enqueue_style('font-awesome',					get_template_directory_uri() . '/css/font-awesome.min.css', 	false, '1.0');
	wp_enqueue_style('nt-landium-main-style',			get_template_directory_uri() . '/css/main-style.css', 			false, '1.0');
	wp_enqueue_style('bootstrap',						get_template_directory_uri() . '/css/bootstrap.min.css', 		false, '1.0');
	wp_enqueue_style('nt-landium-theme',				get_template_directory_uri() . '/css/nt-landium-theme.css', 	false, '1.0');
	// visual composer css for homepage
	wp_enqueue_style('nt-landium-vc', 					get_template_directory_uri() . '/css/visual-composer.css', 		false, '1.0');
	// flexslider css file for blog post
	wp_enqueue_style('nt-landium-custom-flexslider',  	get_template_directory_uri() . '/js/flexslider/flexslider.css', false, '1.0');
	// wordpress css file for blog post
	wp_enqueue_style('nt-landium-wordpress',  			get_template_directory_uri() . '/css/wordpress.css', 			false, '1.0');
	// update css file
	wp_enqueue_style('nt-landium-update',  				get_template_directory_uri() . '/css/update.css', 				false, '1.0');
	// theme default google webfont loader
	wp_enqueue_style('nt-landium-fonts-load',  			nt_landium_fonts_url(), array(), '1.0.0' );

	// custom css
	wp_enqueue_style( 'nt-landium-custom-style', 		get_stylesheet_uri() );
	wp_enqueue_style('style',							get_stylesheet_uri() );

	// JS files
	wp_register_script('particleground', 				get_template_directory_uri() .  '/js/jquery.particleground.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('device', 						get_template_directory_uri() .  '/js/device.js', 					array('jquery'), '1.0', true);
	wp_enqueue_script('nicescroll', 					get_template_directory_uri() .  '/js/jquery.nicescroll.min.js', 	array('jquery'), '1.0', true);
	wp_enqueue_script('owl-carousel', 					get_template_directory_uri() .  '/js/owl.carousel.min.js', 			array('jquery'), '1.0', true);
	wp_enqueue_script('stellar', 						get_template_directory_uri() .  '/js/jquery.stellar.min.js', 		array('jquery'), '1.0', true);
	wp_enqueue_script('matchHeight', 					get_template_directory_uri() .  '/js/jquery.matchHeight-min.js',	array('jquery'), '1.0', true);
	wp_enqueue_script('fs-boxer', 						get_template_directory_uri() .  '/js/jquery.fs.boxer.min.js', 		array('jquery'), '1.0', true);
	wp_enqueue_script('bootstrap', 						get_template_directory_uri() .  '/js/bootstrap.js', 				array('jquery'), '1.0', true);
	wp_enqueue_script('nt-landium-main', 				get_template_directory_uri() .  '/js/main.js', 						array('jquery'), '1.0', true);

	// Google maps api & customization
	$nt_landium_map_api_key 		= ot_get_option( 'nt_landium_map_api_key' );
	$nt_landium_map_api_key_out 	= ( $nt_landium_map_api_key != '') ? '' .  $nt_landium_map_api_key  . '' : '';
	wp_register_script( 'google-map-api', 				'https://maps.googleapis.com/maps/api/js?key='. $nt_landium_map_api_key_out .'', '3.0.0', true);
	wp_register_script( 'nt-landium-google-map', 		get_template_directory_uri() .  '/js/map.js', 			array('jquery'), '1.0', true);


	// WP default scripts for theme
	wp_register_script('nt-landium-custom-flexslider', 	get_template_directory_uri() .  '/js/jquery.flexslider.js', 		array('jquery'), '1.0', true);
	wp_register_script('fitvids', 	 					get_template_directory_uri() .  '/js/jquery.fitvids.js', 			array('jquery'), '1.0', true);
	wp_register_script('nt-landium-blog-settings', 		get_template_directory_uri() .  '/js/blog-settings.js', 			array('jquery'), '1.0', true);

	// HTML5, devices and browsers support
	wp_enqueue_script('nt-landium-device', 				get_template_directory_uri() .  '/js/device.min.js', 				array('jquery'), '1.0', false);
	wp_enqueue_script('nt-landium-modernizr-custom', 	get_template_directory_uri()  . '/js/modernizr.custom.min.js', 	array('jquery'), '2.7.1', false );
	wp_script_add_data('nt-landium-modernizr-custom', 	'conditional', 'lt IE 9' );

	wp_enqueue_script('respond', 						get_template_directory_uri()  . '/js/respond.min.js', 				array('jquery'), '1.4.2', false );
	wp_script_add_data('respond', 						'conditional', 'lt IE 9' );

}

add_action( 'wp_enqueue_scripts', 'nt_landium_scripts' );


/*************************************************
## WP body classes filter
*************************************************/


function nt_landium_custom_body_class($classes) {
	$classes[] = 'home';
	return $classes;
}

add_filter('body_class','nt_landium_custom_body_class');

/*************************************************
## Admin style and scripts
*************************************************/

function nt_landium_admin_style() {

	// Update CSS within in Admin
	wp_enqueue_style('nt-landium-custom-admin', 		get_template_directory_uri().'/css/admin.css');
	wp_enqueue_script('nt-landium-custom-admin', 		get_template_directory_uri() . '/js/jquery.custom.admin.js');

}
add_action('admin_enqueue_scripts', 'nt_landium_admin_style');


/*************************************************
## Theme option & Metaboxes & shortcodes
*************************************************/

	// theme homepage visual composer shortcodes settings
	if(function_exists('vc_set_as_theme')) {
		require_once get_template_directory() . '/includes/visual-shortcodes.php';
	}

	// Metabox plugin check
	if ( ! function_exists( 'rwmb_meta' ) ) {
		function rwmb_meta( $key, $args = '', $post_id = null ) {
			return false;
		}
	}
	// Theme post and page meta plugin for customization and more features
	require_once get_template_directory() . '/includes/page-metaboxes.php';

	// Theme css setting file
	require_once get_template_directory() . '/includes/custom-style.php';

	// Theme navigation and pagination options
	require_once get_template_directory() . '/includes/template-tags.php';

	// image resizer
	require_once get_template_directory() . '/includes/aq_resizer.php';

	require_once get_template_directory() . '/includes/easy_installer/init.php';

	// Option tree controllers
	if ( ! class_exists( 'OT_Loader' )){

		function ot_get_option() {
			return false;
		}

	}

	// add filter for  options panel loader
	add_filter( 'ot_show_pages', 		'__return_false' );
	add_filter( 'ot_show_new_layout', 	'__return_false' );

	// Theme options admin panel setings file
	include_once get_template_directory() . '/includes/theme-options.php';

	// Theme customize css setting file
	require_once get_template_directory() . '/includes/custom-style.php';


/*************************************************
## Theme Setup
*************************************************/

if ( ! isset( $content_width ) ) $content_width = 960;

function nt_landium_theme_setup() {

	/*
	* This theme styles the visual editor to resemble the theme style,
	* specifically font, colors, icons, and column width.
	*/
	add_editor_style ( 'custom-editor-style.css' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	* Enable support for Post Thumbnails on posts and pages.
	*
	* See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	*/
	add_theme_support( 'post-thumbnails' );

	// Theme customizer and tag support
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'custom-header' );

	/*
	* Enable support for Post Formats.
	*
	* See: https://codex.wordpress.org/Post_Formats
	*/
	add_theme_support( 'post-formats', array('gallery', 'quote', 'video', 'audio'));
	add_post_type_support( 'portfolio', 'post-formats' );
	add_image_size( 'nt_landium_member_thumb', 650, 650, true);

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'nt-landium', get_template_directory() . '/languages' );

	register_nav_menus( array(
		'primary' 			    => 	esc_html__( 'Primary Menu', 'nt-landium' ),
		'primary-menu-2' 	    => 	esc_html__( 'Secondary Header Menu', 'nt-landium' ),
	) );

}
add_action( 'after_setup_theme', 'nt_landium_theme_setup' );

/*************************************************
## Widget columns
*************************************************/

function nt_landium_widgets_init() {
	register_sidebar( array(
		'name' 			    => esc_html__( 'Blog Sidebar Area', 'nt-landium' ),
		'id' 			    => 'sidebar-1',
		'description'       => esc_html__( 'These are widgets for the blog page.','nt-landium' ),
		'before_widget'     => '<div class="widget  %2$s">',
		'after_widget'      => '</div>',
		'before_title'      => '<h4 class="widget-title"><span>',
		'after_title'       => '</span></h4>'
	) );
	register_sidebar( array(
		'name' 			    => esc_html__( 'Footer Widgetize Area', 'nt-landium' ),
		'id' 			    => 'nt-landium-footer-widgetize',
		'description'       => esc_html__( 'Theme footer widgetize area','nt-landium' ),
		'before_widget'     => '<div class="col-md-3"><div class="widget %2$s">',
		'after_widget'      => '</div></div>',
		'before_title'      => '<h3 class="widget-head">',
		'after_title'       => '</h3>'
	) );
	register_sidebar( array(
		'name' 			    => esc_html__( 'Footer Newsletter Area', 'nt-landium' ),
		'id' 			    => 'nt-landium-footer-news',
		'description'       => esc_html__( 'Theme footer default area','nt-landium' ),
		'before_widget'     => '<div class="foot-news">',
		'after_widget'      => '</div>',
		'before_title'      => '<h3 class="widget-head">',
		'after_title'       => '</h3>'
	) );

}
add_action( 'widgets_init', 'nt_landium_widgets_init' );

/*************************************************
## Include the TGM_Plugin_Activation class.
*************************************************/

require_once get_template_directory() . '/includes/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'nt_landium_register_required_plugins' );

function nt_landium_register_required_plugins() {

    $plugins = array(
		array(
            'name'             => esc_html__('Breadcrumb NavXT', "nt-landium"),
            'slug'             => 'breadcrumb-navxt',
        ),
        array(
            'name'             => esc_html__('Contact Form 7', "nt-landium"),
            'slug'             => 'contact-form-7',
        ),
        array(
            'name'             => esc_html__('Meta Box', "nt-landium"),
            'slug'             => 'meta-box',
			'required'         => true,
        ),
		array(
            'name'             => esc_html__('Option Tree', "nt-landium"),
            'slug'             => 'option-tree',
			'required'         => true,
        ),
		array(
            'name'             => esc_html__('Metabox Tabs', "nt-landium"),
            'slug'             => 'meta-box-tabs',
            'source'           => esc_url('http://ninetheme.com/themes/plugins/meta-box-tabs.zip'),
            'required'         => true,
            'version'          => '0.1.7',
        ),
		array(
            'name'             => esc_html__('Metabox Show/Hide', "nt-conversi"),
            'slug'             => 'meta-box-show-hide',
            'source'           => esc_url('http://ninetheme.com/themes/plugins/meta-box-show-hide.zip'),
            'required'         => true,
            'version'          => '1.0.2',
        ),
		array(
            'name'             => esc_html__('Visual CSS Style Editor', "nt-framework"),
            'slug'             => 'yellow-pencil-visual-theme-customizer',
        ),
		array(
            'name'             => esc_html__('Envato WordPress Toolkit', "nt-landium"),
            'slug'             => 'envato-market',
            'source'           => esc_url('https://envato.github.io/wp-envato-market/dist/envato-market.zip'),
            'required'         => false,
            'version'          => '1.0.0-RC2',
        ),
		array(
            'name'             => esc_html__('Visual Composer', "nt-landium"),
            'slug'             => 'js_composer_5_0_1',
            'source'           => esc_url('http://ninetheme.com/themes/plugins/js_composer_5_0_1.zip'),
            'required'         => true,
            'version'          => '5.0.1',
		),
		array(
            'name'             => esc_html__('Portfolio Posts', "nt-landium"),
            'slug'             => 'portfolio-post-type',
        ),
		array(
            'name'             => esc_html__('Price Tables', 'nt-landium'),
            'slug'             => 'price-table-type',
			'source'           => esc_url( 'http://ninetheme.com/themes/plugins/price-table-type.zip' ),
            'required'         => false,
            'version'          => '0.9.1',
        ),
		array(
            'name'             => esc_html__('NT Landium Shortcodes', "nt-landium"),
            'slug'             => 'nt-landium-shortcodes',
            'source'           => get_template_directory() . '/plugins/nt-landium-shortcodes.zip',
            'required'         => true,
            'version'          => '1.1',
        ),
    );

	$config = array(
		'id'           		   => 'tgmpa',
		'default_path' 	       => '',
		'menu'         	       => 'tgmpa-install-plugins',
		'has_notices'  	       => true,
		'dismissable'  	       => true,
		'dismiss_msg'  	       => '',
		'is_automatic' 	       => true,
		'message'      	       => '',
	);

	tgmpa( $plugins, $config );
}



/*************************************************
## Register Menu
*************************************************/

class Nt_Landium_Wp_Bootstrap_Navwalker extends Walker_Nav_Menu {
	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul role=\"menu\" class=\"sub-menu dropdown-menu\">\n";
	}

	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		/**
		 * Dividers, Headers or Disabled
		 */
		if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider item-has-children">';
		} else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider item-has-children">';
		} else if ( strcasecmp( $item->attr_title, 'dropdown-header item-has-children') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="dropdown-header item-has-children">' . esc_attr( $item->title );
		} else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
			$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
		} else {

			$class_names = $value = '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

			if ( $args->has_children )
				$class_names .= 'sub item-has-children';

			if ( in_array( 'current-menu-item', $classes ) )
				$class_names .= ' active';

			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= $indent . '<li' . $id . $value . $class_names .'>';

			$atts = array();
			$atts['title']  = ! empty( $item->title )	? $item->title	: '';
			$atts['target'] = ! empty( $item->target )	? $item->target	: '';
			$atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';

			// If item has_children add atts to a.
			if ( $args->has_children && $depth === 0 ) {
				$atts['href']   		= $item->url;
				$atts['data-toggle']	= 'dropdown';
				$atts['class']			= 'dropdown-toggle';
			} else {
				$atts['href'] = ! empty( $item->url ) ? $item->url : '';
			}

			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

			$attributes = '';
			foreach ( $atts as $attr     => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			$item_output = $args->before;

			/*
			 * Glyphicons
			 **/
			if ( ! empty( $item->attr_title ) )
				$item_output .= '<a'. $attributes .'><span class=" ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
			else
				$item_output .= '<a'. $attributes .'>';

			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="caret"></span></a>' : '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}

	/**
	 * Traverse elements to create list from elements.
	 **/
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;

        $id_field = $this->db_fields['id'];

        // Display this element.
        if ( is_object( $args[0] ) )
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

	/**
	 * Menu Fallback
	 **/
	public static function fallback( $args ) {
		if ( current_user_can( 'manage_options' ) ) {

			extract( $args );

			$fb_output = null;

			if ( $container ) {
				$fb_output = '<' . $container;

				if ( $container_id )
					$fb_output .= ' id="' . $container_id . '"';

				if ( $container_class )
					$fb_output .= ' class="' . $container_class . '"';

				$fb_output .= '>';
			}

			$fb_output .= '<ul';

			if ( $menu_id )
				$fb_output .= ' id="' . $menu_id . '"';

			if ( $menu_class )
				$fb_output .= ' class="' . $menu_class . '"';

			$fb_output .= '>';
			$fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">' . esc_html__('Add a menu', 'nt-landium') .'</a></li>';
			$fb_output .= '</ul>';

			if ( $container )
				$fb_output .= '</' . $container . '>';

			echo ($fb_output);
		}
	}
}

/*************************************************
## nt_landium Comment
*************************************************/

	if ( ! function_exists( 'nt_landium_comment' ) ) :
	function nt_landium_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
	case 'pingback' :
	case 'trackback' :
	?>

   <article class="post pingback">
   <p><?php esc_html_e( 'Pingback:', 'nt-landium' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( '(Edit)', 'nt-landium' ), ' ' ); ?></p>
	<?php
	break;
	default :
	?>
        <div class="comments">
            <ul>
				<li class="comment">
					<span class="who">
						<?php echo get_avatar( $comment, 80 ); ?>
					</span>
					<div class="who-comment">
					<p class="name"><?php comment_author(); ?></p>
					<?php comment_text(); ?>
                    <?php edit_comment_link( esc_html__( 'Edit', 'nt-landium' ), ' ' ); ?>
                    <?php comment_reply_link( array_merge( $args, array( 'depth'     => $depth, 'max_depth'     => $args['max_depth'] ) ) ); ?>
                    <span class="meta-data"><time class="comment-date" pubdate datetime="<?php comment_time( 'c' ); ?>"><?php comment_date(); ?> <?php esc_html_e( 'at', 'nt-landium' ); ?> <?php comment_time(); ?></time></span>
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<em><?php esc_html_e( 'Your comment is awaiting moderation.', 'nt-landium' ); ?></em>
					<?php endif; ?>
					</div>
				</li>
            </ul>
		</div>
	<?php
	break;
	endswitch;
	}
	endif;