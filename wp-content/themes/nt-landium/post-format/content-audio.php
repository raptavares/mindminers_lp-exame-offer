
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				 
    <?php
		$nt_landium_mp3 		= rwmb_meta( 'nt_landium_audio_mp3' );
		$nt_landium_oga 		= rwmb_meta( 'nt_landium_audio_ogg' );
		$nt_landium_sc_url 	= rwmb_meta( 'nt_landium_audio_sc' );
		$nt_landium_sc_color = rwmb_meta( 'nt_landium_audio_sc_color' );
		$nt_landium_wp_audio = '[audio mp3="'.$nt_landium_mp3.'"  ogg="'.$nt_landium_oga.'"]';
		$nt_landium_soundcloud_audio = '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url='.urlencode( $nt_landium_sc_url ).'&amp;show_comments=true&amp;auto_play=false&amp;color='.$nt_landium_sc_color.'"></iframe>';
	?>

	<?php if($nt_landium_sc_url!='') : ?>
		<div class="post-thumb blog-bg"><?php echo ( $nt_landium_soundcloud_audio ); ?></div>
	<?php else : ?>
		<div class="post-thumb blog-bg">
			<?php if(has_post_thumbnail()) : the_post_thumbnail(); endif; ?>
			<?php echo do_shortcode ( $nt_landium_wp_audio ); ?>
		</div>
	<?php endif; ?>

	<div class="post-container">
		<div class="content-container">
			<div class="entry-header">
				<?php
					if ( ! is_single() ) :
						the_title( sprintf( '<h2 class="entry-title all-caps"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
					endif;
				?>
			</div><!-- .entry-header -->

			<ul class="entry-meta">
				<li><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_time('F j, Y'); ?></a></li>
				<li><?php esc_html_e('in', 'nt-landium'); ?>  <?php the_category(', '); ?></li>
				<li><?php the_author(); ?></li>
					<?php the_tags( '<li>', ', ', '</li> '); ?>
			</ul>

		</div>
	
		<div class="entry-content">
			<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
					esc_html__( 'Continue reading %s', 'nt-landium' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				) );

				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'nt-landium' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'nt-landium' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );
			?>
		</div><!-- .entry-content -->
	
		<?php if ( ! is_single() ) : ?>
			<a class="margin_30 btn" href="<?php echo esc_url( get_permalink() ); ?>" role="button"><?php esc_html_e( 'Read More', 'nt-landium' ); ?></a>
		<?php endif; // is_single() ?>
		
		<?php if (  is_single() ) : ?>
			<div id="share-buttons">
				<a href="http://www.facebook.com/sharer.php?u=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="http://twitter.com/share?url=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="https://plus.google.com/share?url=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
				<a href="http://www.digg.com/submit?url=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><i class="fa fa-digg"></i></a>
				<a href="http://reddit.com/submit?url=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><i class="fa fa-reddit"></i></a>
				<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());"><i class="fa fa-pinterest"></i></a>
				<a href="http://www.stumbleupon.com/submit?url=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><i class="fa fa-stumbleupon"></i></a>
			</div>
		<?php endif; // is_single() ?>
	</div>
</article><!-- #post-## -->