<?php
/**
 * Admin Panel Template
 *
 * @author 		WaspThemes
 * @category 	Template
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


/* ---------------------------------------------------- */
/* Adding welcome screen Hook							*/
/* ---------------------------------------------------- */
function welcome_screen_activate() {
  set_transient( '_welcome_screen_activation_redirect', true, 30 );
}

register_activation_hook( __FILE__, 'welcome_screen_activate' );



/* ---------------------------------------------------- */
/* Automatic redirect after active						*/
/* ---------------------------------------------------- */
function welcome_screen_do_activation_redirect() {
  // Bail if no activation redirect
    if ( ! get_transient( '_welcome_screen_activation_redirect' ) ) {
    return;
  }

  // Delete the redirect transient
  delete_transient( '_welcome_screen_activation_redirect' );

  // Bail if activating from network, or bulk
  if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) {
    return;
  }

  // Redirect to bbPress about page
  wp_safe_redirect( add_query_arg( array( 'page' => 'yp-welcome-screen' ), admin_url( 'admin.php' ) ) );

}

add_action( 'admin_init', 'welcome_screen_do_activation_redirect' );



/* ---------------------------------------------------- */
/* Welcome Screen Content 								*/
/* ---------------------------------------------------- */
function yp_welcome_screen_content(){
  ?>
  <div class="wrap yp-page-welcome about-wrap">
	<h1>Welcome to Yellow Pencil <?php echo YP_VERSION; ?></h1>

	<div class="about-text">
		Congratulations! You are about to use most powerful design tool for WordPress ever - Yellow Pencil Style Editor Plugin by WaspThemes.</div>
	<div class="wp-badge yp-badge">Version <?php echo YP_VERSION; ?></div>
	<p>
		<a href="<?php echo admin_url('themes.php?page=yellow-pencil'); ?>" class="button button-primary button-large">let's start!</a>
	</p>
	<h2 class="nav-tab-wrapper">
			<a href="<?php echo admin_url('admin.php?page=yp-welcome-screen'); ?>" class="nav-tab<?php if(isset($_GET['tab']) == false){ ?> nav-tab-active<?php } ?>">Hello</a>
			<a href="<?php echo admin_url('admin.php?page=yp-welcome-screen&tab=resources'); ?>" class="nav-tab<?php if(isset($_GET['tab']) == true){ ?> nav-tab-active<?php } ?>">Resources</a>
	</h2>

	<?php if(isset($_GET['tab']) == false){ ?>
	<div class="yp-welcome-tab">

		<img class="yp-featured-img" src="<?php echo WT_PLUGIN_URL; ?>images/promo.png" />

		<div class="yp-right-content">
			<h3>Front-End Design Tool For WordPress!</h3>
			<p>Yellow Pencil is advanced visual CSS style editor wordpress plugin that you can customize your website in real-time with a few clicks. Yellow Pencil works with any theme and plugin.</p>

			<p>Today become a professional web designer and personalizing your website in a few mins!</p>

			<h3>What's New?</h3>
			Take a look to <a href="http://waspthemes.com/yellow-pencil/inc/changelog.txt" target="_blank">changelog</a> for see all details about new updates.
		</div>
		<div class="clear"></div>

	</div>
	<?php }else{ ?>
	<div class="yp-welcome-tab">

		<div class="yp-resources-left">
			<h3>Resources</h3>
			<ul>
				<li><a href="http://waspthemes.com/yellow-pencil/" target="_blank">Official Website</a></li>
				<li><a href="http://waspthemes.com/yellow-pencil/documentation/" target="_blank">Documentation</a></li>
				<li><a href="https://www.youtube.com/channel/UCKGdPyfmphEdBWPXR91GnYQ" target="_blank">Tutorials</a></li>
				<li><a href="http://waspthemes.com/yellow-pencil/inc/changelog.txt" target="_blank">Changelogs</a></li>
				<li><a href="https://www.facebook.com/waspthemes/" target="_blank">Facebook page</a></li>
				<li><a href="https://waspthemes.ticksy.com/" target="_blank">Official support</a></li>
			</ul>
		</div>

		<div class="yp-resources-right">
			<h3>Versions</h3>
			
			<ul>
				<li><a href="https://wordpress.org/plugins/yellow-pencil-visual-theme-customizer/" target="_blank">Get Lite Version (Free)</a></li>
				<li><a href="http://codecanyon.net/item/yellow-pencil-visual-customizer-for-wordpress/11322180?ref=WaspThemes" target="_blank">Get Pro Version</a></li>
			</ul>

			<h3>Licenses</h3>
			
			<ul>
				<li><a href="http://themeforest.net/licenses/terms/regular" target="_blank">Regular Licence</a></li>
				<li><a href="http://themeforest.net/licenses/terms/extended" target="_blank">Extended Licence</a></li>
			</ul>

		</div>
		<div class="clear"></div>

	</div>
	<?php } ?>

	<?php if(isset($_GET['tab']) == false){ ?>
	<div class="yp-welcome-feature feature-section">

		<div class="yp-column">
			<img class="yp-img-center" src="<?php echo WT_PLUGIN_URL; ?>images/promo-1.png">
			
			<div class="yp-feature-column">
				<h4>Customize Your Website!</h4>
				<p>Edit colors, fonts, sizes and others with a few click for all screen sizes. <a href="<?php echo admin_url('themes.php?page=yellow-pencil'); ?>">start to visual customizing</a>.</p>
			</div>

		</div>

		<div class="yp-column">
			<img class="yp-img-center" src="<?php echo WT_PLUGIN_URL; ?>images/promo-2.png">
			
			<div class="yp-feature-column">
				<h4>Manage Style Sources</h4>
				<p>Keep site design in your control, You always can manage style sources from <a href="<?php echo admin_url('admin.php?page=yellow-pencil-changes'); ?>">this page</a>.</p>
			</div>

		</div>

		<div class="yp-column">
			<img class="yp-img-center" src="<?php echo WT_PLUGIN_URL; ?>images/promo-3.png">
			
			<div class="yp-feature-column">
				<h4>Help & Support!</h4>
				<p>You must read all plugin documentation for learn how this works, Only 3 mins to read! <a target="_blank" href="http://waspthemes.com/yellow-pencil/documentation/">plugin docs</a>.</p>
			</div>

		</div>

		<div class="clear"></div>

	</div>

	<p class="yp-thank-you">Thank you for choosing Yellow Pencil,<br>Made By WaspThemes.</p>
	<?php } ?>

</div>
  <?php
}



/* ---------------------------------------------------- */
/* Adding plugin control menu 							*/
/* ---------------------------------------------------- */
function yp_add_setting_menu() {

    add_menu_page (
        'Yellow Pencil Options',
        'Yellow Pencil',
        'edit_theme_options',
        'yellow-pencil-changes',
        'yp_option_func',
        'dashicons-admin-customizer'
    );

    add_submenu_page( 'yellow-pencil-changes', __('CSS Styles','yp'), __('CSS Styles','yp'), 'edit_theme_options', 'yellow-pencil-changes', 'yp_option_func' );
    add_submenu_page( 'yellow-pencil-changes', __('Settings','yp'), __('Settings','yp'), 'edit_theme_options', 'yellow-pencil-settings', 'yp_option_func' );
    add_submenu_page( 'yellow-pencil-changes', __('Custom Animations','yp'), __('Custom Animations','yp'), 'edit_theme_options', 'yellow-pencil-animations', 'yp_option_func' );
    add_submenu_page( 'yellow-pencil-changes', __('Product License','yp'), __('Product License','yp'), 'edit_theme_options', 'yellow-pencil-license', 'yp_option_func' );
    add_submenu_page( 'yellow-pencil-changes', __('Import/Export','yp'), __('Import/Export','yp'), 'edit_theme_options', 'yellow-pencil-export', 'yp_option_func' );
    add_submenu_page( 'yellow-pencil-changes', __('About','yp'), __('About','yp'), 'read', 'yp-welcome-screen', 'yp_welcome_screen_content' );

}

add_action('admin_menu', 'yp_add_setting_menu');


function yp_css_style_li($title,$type,$href,$id){

	if($type == 'type'){

		$linkType = '&yp_type=';
		$resetType = '&yp_reset_type=';

	}elseif($type == 'id'){

		$linkType = '&yp_id=';
		$resetType = '&yp_reset_id=';

	}elseif($type == 'global'){

		$linkType = '';
		$resetType = '&yp_reset_global=true';
		$id = null;

	}

	?>
	<li>

		<span class="yp-title"><?php echo $title; ?></span>
		<a class="yp-remove" onclick="return confirm('<?php _e("Are you sure you want to delete this data?","yp"); ?>')" href="<?php echo admin_url('admin.php?page=yellow-pencil-changes'.$resetType.''.$id.''); ?>"><span class="dashicons dashicons-no"></span></a>

		<a class="yp-customize" href="<?php echo admin_url('admin.php?page=yellow-pencil-editor&href='.yp_urlencode(esc_url($href)).''.$linkType.''.$id.''); ?>"><span class="dashicons dashicons-edit"></span></a>

		<span class="yp-clearfix"></span>

	</li>
	<?php
}


/* ---------------------------------------------------- */
/* Admin Control Functions  							*/
/* ---------------------------------------------------- */
function yp_option_func() {

		// GEt page, tab.
		$screen = get_current_screen();
		$active_tab = $screen->base;
		$active_tab = str_replace("yellow-pencil_page_", "", $active_tab);
		$active_tab = str_replace("toplevel_page_", "", $active_tab);

		// Can?
		if(current_user_can("edit_theme_options") == true){

			// Reset global data.
			if(isset($_GET['yp_reset_global'])){
				delete_option('wt_css');
				delete_option('wt_styles');
			}

			if(isset($_GET['yp_delete_animate'])){
				delete_option($_GET['yp_delete_animate']);
			}

			// Reset Post type.
			if(isset($_GET['yp_reset_type'])){
				delete_option('wt_'.$_GET['yp_reset_type'].'_css');
				delete_option('wt_'.$_GET['yp_reset_type'].'_styles');
			}

			// Reset by id.
			if(isset($_GET['yp_reset_id'])){
				delete_post_meta($_GET['yp_reset_id'],'_wt_css');
				delete_post_meta($_GET['yp_reset_id'],'_wt_styles');
			}

			// Updated.
			if(isset($_GET['yp_reset_global']) || isset($_GET['yp_reset_id']) || isset($_GET['yp_reset_type']) || isset($_GET['yp_delete_animate'])){
				wp_safe_redirect( admin_url('admin.php?page=yellow-pencil-changes&yp_updated=true') );
			}

			// Import the data
			if(isset($_POST['yp_json_import_data'])){

				$data = $_POST['yp_json_import_data'];

				if(empty($data) == false){
					yp_import_data($data);
				}

			}

			// Update output format.
			if(isset($_POST['yp-output-option'])){

				$value = $_POST['yp-output-option'];

				if(!update_option('yp-output-option',$value)){
					add_option('yp-output-option',$value);
				}

				// Create a custom CSS File.
				if($value == 'external'){

					// Get All CSS data as ready-to-use
					$output = yp_get_export_css("create");

					// Update custom.css file
					yp_create_custom_css($output);

				}

			}

		}

		// Updated message.
		if(isset($_GET['yp_updated']) || isset($_POST['yp-output-option']) || isset($_POST['yp_json_import_data'])){
			?>
				<div id="message" class="updated">
			        <p><strong><?php _e('Settings saved.') ?></strong></p>
			    </div>
			<?php
		}

        ?>
        <div class="wrap">

            <h2>Yellow Pencil Options</h2>

            <h2 class="nav-tab-wrapper">  
                <a href="?page=yellow-pencil-changes" class="nav-tab <?php echo $active_tab == 'yellow-pencil-changes' ? 'nav-tab-active' : ''; ?>">CSS Styles</a>
                <a href="?page=yellow-pencil-settings" class="nav-tab <?php echo $active_tab == 'yellow-pencil-settings' ? 'nav-tab-active' : ''; ?>">Settings</a> 
                <a href="?page=yellow-pencil-animations" class="nav-tab <?php echo $active_tab == 'yellow-pencil-animations' ? 'nav-tab-active' : ''; ?>">Custom Animations</a> 
                <a href="?page=yellow-pencil-license" class="nav-tab <?php echo $active_tab == 'yellow-pencil-license' ? 'nav-tab-active' : ''; ?>">Product License</a>
                <a href="?page=yellow-pencil-export" class="nav-tab <?php echo $active_tab == 'yellow-pencil-export' ? 'nav-tab-active' : ''; ?>">Import / Export</a>
            </h2>

            <?php

            	
            	/* ---------------------------------------------------- */
				/* CSS CHANGES               							*/
				/* ---------------------------------------------------- */
                if( $active_tab == 'yellow-pencil-changes' ) {

                ?>

                	<div class="yp-tab-section">

                    <p><?php _e('All customized pages are listed below. You can delete and customize to them.','yp'); ?></p>

					<div class="yp-code-group">

					<ul>

						<?php

						$count = 0;

						// Global
						if(get_option("wt_css") != ''){
							$count = 1;
							yp_css_style_li('Global','global',get_home_url().'/',null);
						}

						// post types
						$post_types = get_post_types();
						foreach ($post_types as $post_type){

							if(get_option("wt_".$post_type."_css") != ''){

								$count = 1;

								$last_post = wp_get_recent_posts(array("post_status" => "publish","numberposts" => 1, "post_type" => $post_type));

								if(empty($last_post) == false){
									$last_post_id = $last_post['0']['ID'];
								}

								yp_css_style_li(__('Single','yp').' '.ucfirst($post_type).' '.__('Template','yp'),'type',get_the_permalink($last_post_id),$post_type);
	
							}

						}
						
						// home
						if(get_option("wt_home_css") != ''){

							$count = 1;

							$frontpage_id = get_option('page_on_front');

							if($frontpage_id == 0 || $frontpage_id == null){

								yp_css_style_li('Home Page','type',get_home_url().'/','home');
							
							}

						}

						
						// 404
						if(get_option("wt_404_css") != ''){

							$count = 1;

							yp_css_style_li('Search Template','type',get_home_url().'/?p=987654321','404');

						}

						// Search
						if(get_option("wt_search_css") != ''){

							$count = 1;

							yp_css_style_li('Search Template','type',get_home_url().'/?s='.yp_getting_last_post_title().'','search');
						
						}

						// Tag CSS
						if(get_option("wt_tag_css") != ''){

							$count = 1;

							$tag_id = '';
							$tags = get_tags(array('orderby' => 'count', 'order' => 'DESC','number'=> 1 ));
							if(empty($tags) == false){
								$tag_id = $tags[0];
							}

							yp_css_style_li('Tag Template','type',get_tag_link($tag_id),'tag');

						}

						// Category 
						if(get_option("wt_category_css") != ''){

							$count = 1;

							$cat_id = '';
							$cats = get_categories(array('orderby' => 'count', 'order' => 'DESC','number'=> 1 ));
							if(empty($cats) == false){
								$cat_id = $cats[0];
							}

							yp_css_style_li('Category Template','type',get_category_link($cat_id),'category');

						}
						
						// Author
						if(get_option("wt_author_css") != ''){

							$count = 1;

							yp_css_style_li('Author Template','type',get_author_posts_url(1),'author');

						}

						// Unknown
						global $wpdb;
						$querystr = "SELECT * FROM `$wpdb->postmeta` WHERE `meta_key` LIKE '_wt_css'";
						$pageposts = $wpdb->get_results($querystr, OBJECT);

						if($pageposts):

							global $post;

							foreach ($pageposts as $post):

							$id = $post->post_id;
							$title = "'".ucfirst(get_the_title($id))."'";

							if($title == "''"){
								$title = '(Unknown)';
							}

							if(get_post_meta($id, '_wt_css', true) != ''){

								$count = 1;

								yp_css_style_li($title.' '.ucfirst(get_post_type($id)),'id',get_the_permalink($id),$id);

							}

							endforeach;

						endif;
						wp_reset_query();

						// Count zero
						if(0 == $count){
							echo '<li>'.__("No CSS Style! First, Customize something on your website.","yp").'</li>';
						}

					?>

					</ul>

					<?php if($count > 0){ ?>
					<p><a href="<?php echo admin_url('admin.php?page=yellow-pencil-changes&yp_exportCSS=true'); ?>" class="button">Download</a> all style codes as ready to use.</p>	
					<?php } ?>

					</div>

					</div>

					<?php


				/* ---------------------------------------------------- */
				/* SETTINGS                 							*/
				/* ---------------------------------------------------- */
                } elseif( $active_tab == 'yellow-pencil-settings' )  {

                	?>

                	<div class="yp-tab-section">

                	<h2>Output CSS Options</h2>
					<p>External CSS option still in beta test, Please use dynamic CSS option if there is an issue.</p>
					<form method="POST">
						<table class="form-table yp-form-table">
							<tbody>
							<tr>
								<?php

									$a = '';
									$b = '';
									if(get_option('yp-output-option') == 'external'){
										$a = 'checked="checked"';
									}

									if(get_option('yp-output-option') != 'external'){
										$b = 'checked="checked"';
									}

								?>
								<th><label><input name="yp-output-option" value="external" <?php echo $a; ?> type="radio"> Static External CSS File</label></th>
								<td><code><?php echo get_site_url(null,'custom.css'); ?></code></td>
							</tr>
							<tr>
								<th><label><input name="yp-output-option" value="inline" <?php echo $b; ?> type="radio"> Dynamic Inline CSS</label></th>
								<td><code>&lt;head&gt;&lt;style&gt;.body{color:gray...</code></td>
							</tr>
							</tbody>
						</table>
						<div class="yp-output-css-footer">
							<input type="submit" class="button-primary" value="Save Changes" />
						</div>
					</form>

				</div>

                	<?php


                /* ---------------------------------------------------- */
				/* ANIMATIONS               							*/
				/* ---------------------------------------------------- */
                } elseif( $active_tab == 'yellow-pencil-animations' )  {

                    ?>

                    <div class="yp-tab-section">

                    <p><?php _e('Generated animations are listed below. You can manage them.','yp'); ?></p>

					<div class="yp-code-group">

					<ul>

						<?php

							$countAnim = 0;

							$all_options =  wp_load_alloptions();
							foreach($all_options as $name => $value){
								if(stristr($name, 'yp_anim')){
									$countAnim = $countAnim+1;
									$name = str_replace("yp_anim_", "", $name);
									?>
									<li>
									<span class="yp-title"><?php echo ucwords(strtolower($name)); ?></span>
									<a class="yp-remove" onclick="return confirm('<?php _e("Are you sure?","yp"); ?>')" href="<?php echo admin_url('admin.php?page=yellow-pencil-changes&yp_delete_animate=yp_anim_'.$name.''); ?>"><span class="dashicons dashicons-no"></span></a>
									<span class="yp-clearfix"></span>
									</li>
									<?php
								}
							}

							if(0 == $countAnim){
								echo '<li>'.__("No Custom Animation! First, Generate a few animations!","yp").'</li>';
							}

						?>
						

					</ul>

					</div>

					</div>

                    <?php


                /* ---------------------------------------------------- */
				/* LICENSE               							    */
				/* ---------------------------------------------------- */
                } elseif( $active_tab == 'yellow-pencil-license' )  {

                	$extraClassBtn = '';
                	$loadingIcon = '';

                	// If isset product license, ie activation success.
                	if(isset($_GET['purchase_code']) == true){

                		// Purchase Code
                		$code = $_GET['purchase_code'];

                		// Adds Product code
                		if(!update_option("yp_purchase_code",$code)){
							add_option("yp_purchase_code",$code);
						}

						// Upgrade to Pro Version if is lite version.
						if(defined('WTFV') == false || defined('YP_TRIAL_MODE') == true){
	                		$extraClassBtn = ' yp-upgrade-pro-action';
	                		$loadingIcon = "<img class='yp-upgrading-loading' src='".esc_url(plugins_url( '/images/wpspin_light.gif' , dirname(dirname(__FILE__ ))))."' style='position: relative;left: 20px;top: 4px;width: 20px;height: 20px;' />";
						}

                	}elseif(defined('WTFV') == false || defined('YP_TRIAL_MODE') == true){

                		// Get purchase code from database
                		$purchase_code = get_option("yp_purchase_code");

                		// Has?
                		if($purchase_code){
                			delete_option('yp_purchase_code');
                		}

                	}

                	// Get purchase code from database
                	$purchase_code = get_option("yp_purchase_code");

                	$isActive = false;

                	// Button Text
                	if(isset($_GET['purchase_code']) || $purchase_code){
                		$isActive = true;
                		$activate_btn = 'Yellow Pencil Activated';
                		$aclink = '<a class="button button-primary button-hero yp-product-activation disabled'.$extraClassBtn.'">';

                		if($extraClassBtn != ''){
                			$activate_btn = 'Upgrading..';
                		}

                	}else{
                		$activate_btn = 'Activate Yellow Pencil Pro';
                		$aclink = '<a class="button button-primary button-hero yp-product-activation" href="http://waspthemes.com/yellow-pencil/auto-update/?client-redirect='.urlencode(admin_url('admin.php?page=yellow-pencil-license')).'">';
                	}

                	// Thank you.
                	if(isset($_GET['purchase_code']) && defined("WTFV") == TRUE){
                		echo '<div class="updated"><p><strong>Yellow Pencil Pro successfully activated.</strong></p></div>';
                	}

                	// no license founded
                	if(isset($_GET['activation_error'])){
                		echo '<div class="error"><p><strong>No licenses found on your Envato account, <a href="http://waspthemes.com/yellow-pencil/buy/" target="_blank">Get your copy today</a>.</strong></p></div>';
                	}


                	?>

                	<div class="yp-activation-section">

                		<?php if($isActive == false){ ?>
	                		<p>In order to receive all benefits of Yellow Pencil, you need to activate your copy of the plugin. By activating Yellow Pencil License you will unlock <strong>premium features</strong> and <strong>direct plugin updates</strong>.</p>
	                	<?php }else{ ?>
	                		<p>You have activated Yellow Pencil Pro version which allows you to access all the customer benefits! You will be notified when new updates are available. Thank you for choosing Yellow Pencil!</p>
	                	<?php } ?>
	                	
	                	<br />

	                    <p style="margin:0px;padding:0px;"><?php echo $aclink; ?><?php echo $activate_btn; ?></a><?php echo $loadingIcon; ?></p>

	                    <?php if($extraClassBtn != ''){ ?>
	                    	<p class='description'>Yellow Pencil Pro installing. This may take a few minutes. Please don't close the page!</p>
	                    <?php } ?>

	                    <?php if($isActive == false){ ?>
		                    <p class='description'>
							Don't have direct license yet? <a href='http://waspthemes.com/yellow-pencil/buy/' target='_blank'>Purchase Yellow Pencil license</a>.</p>
						<?php } ?>

					</div>

					<?php


				/* ---------------------------------------------------- */
				/* EXPORT/IMPORT               							*/
				/* ---------------------------------------------------- */
                } elseif( $active_tab == 'yellow-pencil-export' )  {

                    ?>

                    <div class="yp-tab-section">
	                    <h2>Export</h2>
						<p>Copy what appears to be a random string of alpha numeric characters in following text area<br />and paste into Import field on another web site.</p>
						<div class="yp-export-section">
							<textarea rows="6" class="yp-admin-textarea"><?php echo yp_get_export_data(); ?></textarea>
						</div>

						<hr style="margin-top: 50px;margin-bottom: 25px;">

						<h2>Import</h2>
						<p>Paste the exported data and click "Import Data" button.</p>
						<form method="POST">
							<div class="yp-import-section">
								<textarea name="yp_json_import_data" rows="6" class="yp-admin-textarea"></textarea>
							</div>
							<input type="submit" class="button" value="Import Data" />
						</form>
					</div>

                    <?php

                }

            ?>

        </div>

    <?php

}