
	<?php

		get_header();  
		get_template_part('index-header');
		$current_blog_page_id = get_option('page_for_posts');

		$nt_landium_headerbgcolor 		= 	rwmb_meta( 'nt_landium_headerbgcolor' ); 
		$nt_landium_headertextcolor 	= 	rwmb_meta( 'nt_landium_pagetextcolor' );
		$nt_landium_headerpaddingtop 	= 	rwmb_meta( 'nt_landium_headerptop' ); 
		$nt_landium_headerpaddingbottom = 	rwmb_meta( 'nt_landium_headerpbottom' ); 
		$nt_landium_pagelayout 			= 	rwmb_meta( 'nt_landium_pagelayout' ); 
		$nt_landium_disable_title 		= 	rwmb_meta( 'nt_landium_disable_title' ); 
		$nt_landium_page_title 			= 	rwmb_meta( 'nt_landium_alt_title' ); 
		$nt_landium_page_disable_sub 	= 	rwmb_meta( 'nt_landium_page_disable_subtitle' ); 
		$nt_landium_page_subtitle 		= 	rwmb_meta( 'nt_landium_page_subtitle' ); 
		$nt_landium_bread_visibility 	= 	ot_get_option( 'nt_landium_bread', 'on' ); 


	?>

	<div id="start-screen" class="template-cover template-cover-style-2 js-full-height-off section-class-scroll index-header start-screen start-screen--static-bg start-screen--static-bg--style-1" data-stellar-background-ratio="0.5">

		<div class="template-overlay"></div>

		<div class="template-cover-text">
			<div class="container">
				<div class="row">
					<div class="col-md-8 center">
						<div class="template-cover-intro">
						
							<h2 class="uppercase white"> <?php echo bloginfo('name'); ?> </h2>
							<h2 class="cover-text-sublead wow" data-wow-duration="1s" data-wow-delay=".8s"><?php echo bloginfo('description'); ?></h2>
							
							<?php if ( ( $nt_landium_bread_visibility  ) != 'off') : ?>
								<?php if( function_exists('bcn_display') ) : ?>
									<p class="breadcrubms"> <?php bcn_display(); ?></p>
								<?php endif; ?>
							<?php endif; ?>
							
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
	
	<section id="blog">
		<div class="container has-margin-bottom">
			<div class="row">
				<?php if( ot_get_option( 'nt_landium_bloglayout' ) == 'right-sidebar' || ot_get_option( 'nt_landium_bloglayout' ) == '') { ?>
				<div class="col-lg-9  col-md-9 col-sm-12 index float-right posts">
				<?php } elseif( ot_get_option( 'nt_landium_bloglayout' ) == 'left-sidebar') { ?>
				<?php get_sidebar(); ?>
				<div class="col-lg-9  col-md-9 col-sm-12 index float-left posts">
				<?php } elseif( ot_get_option( 'nt_landium_bloglayout' ) == 'full-width') { ?>
				<div class="col-xs-12 full-width-index v">
				<?php } ?>
				
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'post-format/content', get_post_format() ); ?>
					<?php endwhile; ?>
					<?php the_posts_pagination( array(
							'prev_text'          => esc_html__( 'Previous page', 'nt-landium' ),
							'next_text'          => esc_html__( 'Next page', 'nt-landium' ),
							'before_page_number' => '<span class="meta-nav screen-reader-text"></span>',
						) ); ?>
				<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
				<?php endif; ?>	
				
				</div>
				
				<?php if( ot_get_option( 'nt_landium_bloglayout' ) == 'right-sidebar' || ot_get_option( 'nt_landium_bloglayout' ) == '') { ?>
					<?php get_sidebar(); ?>
				<?php } ?>
			</div>
		</div>
	</section>
	
	<?php get_footer(); ?>
	