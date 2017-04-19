	<?php
		/**
		* The template for displaying the footer
		*
		*
		* @package WordPress
		* @subpackage nt_landium
		* @since nt_landium 1.0
		*/
		
		$nt_landium_allowed_tags = array(
			'a' => array(
				'class'=> array (),
				'target'=> array (),
				'href' 	=> array (),
				'title' => array ()
			),
			'div' => array(
				'class'=> array ()
			),
			'p' => array(),
			'i' => array (),
			'br' => array(),
			'em' => array(),
			'strong' => array(),
		);
		
		
		
		$nt_landium_news_h 		= ot_get_option('nt_landium_news_h');
		$nt_landium_news_d 		= ot_get_option('nt_landium_news_d');
		$nt_landium_adress 		= ot_get_option('nt_landium_adress');
		$nt_landium_phone		= ot_get_option('nt_landium_phone');
		$nt_landium_mail		= ot_get_option('nt_landium_mail');
		$nt_landium_copyright 	= ot_get_option('nt_landium_copyright');
		$nt_landium_social_c 	= ot_get_option('nt_landium_social' );
		$nt_landium_longitude 	= ot_get_option('nt_landium_longitude' );
		$nt_landium_latitude	= ot_get_option('nt_landium_latitude' );
	?>
	
	<!-- footer widgetize -->
	<?php if ( ot_get_option('nt_landium_widgetize') == 'on' && is_active_sidebar( 'nt-landium-footer-widgetize' )) : ?>
		<footer class="footer-top footer-widgetize">
			<div class="container">
				<div class="row">
					<?php dynamic_sidebar( 'nt-landium-footer-widgetize' ); ?>
				</div>
			</div>
		</footer>
	<?php endif; ?>
	
	<?php if ( ot_get_option('nt_landium_footer_style') == '1' ) : ?>
	<footer id="footer" class="footer--style-1">
	
		<?php if ( ot_get_option('nt_landium_news') != 'off') : ?>
			<div class="s-form">
				<div class="container">
				
					<div class="section-heading section-heading--center section-heading--white">
						
						<?php  if ( ot_get_option('nt_landium_news_h') != '') : ?>
							<h2 class="title h1"><?php  echo esc_html( $nt_landium_news_h ); ?></h2>
						<?php endif; ?>
						
						<?php  if ( ot_get_option('nt_landium_news_d') != '') : ?>
							<p><?php  echo esc_html( $nt_landium_news_d ); ?></p>
						<?php endif; ?>
						
					</div>

					<?php 
						if ( is_active_sidebar( 'nt-landium-footer-news' ) ) { 
							dynamic_sidebar( 'nt-landium-footer-news' ); 
						} 
					?>
				</div>
			</div>
		<?php endif; ?>
		
		<?php if ( ot_get_option('nt_landium_contact') != 'off') : ?>
			<div class="footer__contact">
				<div class="container">
					<div class="row">
						
						<?php  if ( ot_get_option('nt_landium_adress') != '') : ?>
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
								<div class="contact__item clearfix">
									<i class="fontello-location"></i>

									<?php  echo wp_kses( $nt_landium_adress, $nt_landium_allowed_tags ); ?>

								</div>
							</div>
						<?php endif; ?>
						
						<?php  if ( ot_get_option('nt_landium_phone') != '') : ?>
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-lg-offset-1">
								<div class="contact__item clearfix">
									<i class="fontello-phone-call"></i>

									<?php  echo wp_kses( $nt_landium_phone, $nt_landium_allowed_tags ); ?>

								</div>
							</div>
						<?php endif; ?>
						
						<?php  if ( ot_get_option('nt_landium_mail') != '') : ?>
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-lg-offset-1">
								<div class="contact__item clearfix">
									<i class="fontello-mail"></i>

									<?php  echo wp_kses( $nt_landium_mail, $nt_landium_allowed_tags ); ?>

								</div>
							</div>
						<?php endif; ?>
						
					</div>
				</div>
			</div>
		<?php endif; ?>
		
		
		<div class="footer__bottom-text">
			<div class="container">
			
				<?php if ( ot_get_option('nt_landium_social_section') != 'off') : ?>
					<div class="social-btns">
						<?php 
							if ($nt_landium_social_c) {
								foreach($nt_landium_social_c as $key => $value) {
									$target = ot_get_option('nt_landium_social_target');
									echo '<a href="' .esc_url($value['nt_landium_social_link']). '" target="' .esc_attr($target). '" class="' .esc_attr($value['nt_landium_social_text']). '" title="' .esc_html($value['nt_landium_social_text']). '"></a>'; 
								}
							}
						?>
					</div>
				<?php endif; ?>
				
				<?php 
					if ( ot_get_option('nt_landium_copyright') != '') : 
						echo wp_kses( $nt_landium_copyright, $nt_landium_allowed_tags ); 
					endif; 
				?>
				
			</div>
		</div>
	</footer>
	<?php endif; ?>
	
	<?php if ( ot_get_option('nt_landium_footer_style') == '2' ) : ?>
	<footer id="footer" class="footer--style-2">
			<div class="container">
				<div class="row">
					
					<?php if ( ot_get_option('nt_landium_news') != 'off') : ?>
						<div class="col-xs-12 col-sm-6 col-sm-push-6">
							<div class="s-form">
								<div class="row">
									<div class="col-xs-12 col-sm-11 col-sm-offset-1">
										<div class="section-heading section-heading--center section-heading--white">
											<?php  if ( ot_get_option('nt_landium_news_h') != '') : ?>
												<h2 class="title h1"><?php  echo esc_html( $nt_landium_news_h ); ?></h2>
											<?php endif; ?>
											
											<?php  if ( ot_get_option('nt_landium_news_d') != '') : ?>
												<p><?php  echo esc_html( $nt_landium_news_d ); ?></p>
											<?php endif; ?>
										</div>

										<?php 
											if ( is_active_sidebar( 'nt-landium-footer-news' ) ) { 
												dynamic_sidebar( 'nt-landium-footer-news' ); 
											} 
										?>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>
					
					<?php if ( ot_get_option('nt_landium_contact') != 'off') : ?>
						<div class="col-xs-12 col-sm-6 col-sm-pull-6">
							<div class="footer__contact footer-style-2">
								<div class="row">
									<div class="col-xs-12 col-sm-11 col-md-8">
										
										<?php  if ( ot_get_option('nt_landium_adress') != '') : ?>
											<div class="contact__item clearfix">
												<i class="fontello-location"></i>

												<?php  echo wp_kses( $nt_landium_adress, $nt_landium_allowed_tags ); ?>

											</div>
										<?php endif; ?>
										
										<?php  if ( ot_get_option('nt_landium_phone') != '') : ?>
											<div class="contact__item clearfix">
												<i class="fontello-phone-call"></i>

												<?php  echo wp_kses( $nt_landium_phone, $nt_landium_allowed_tags ); ?>

											</div>
										<?php endif; ?>
										
										<?php  if ( ot_get_option('nt_landium_mail') != '') : ?>
											<div class="contact__item clearfix">
												<i class="fontello-mail"></i>

												<?php  echo wp_kses( $nt_landium_mail, $nt_landium_allowed_tags ); ?>

											</div>
										<?php endif; ?>
										
										<div class="contact__item clearfix">
											<div class="social-btns">
												<?php 
													if ($nt_landium_social_c) {
														foreach($nt_landium_social_c as $key => $value) {
															$target = ot_get_option('nt_landium_social_target');
															echo '<a href="' .esc_url($value['nt_landium_social_link']). '" target="' .esc_attr($target). '" class="' .esc_attr($value['nt_landium_social_text']). '" title="' .esc_html($value['nt_landium_social_text']). '"></a>'; 
														}
													}
												?>
											</div>
										</div>

										<?php 
											if ( ot_get_option('nt_landium_copyright') != '') : 
												echo wp_kses( $nt_landium_copyright, $nt_landium_allowed_tags ); 
											endif; 
										?>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>
					
				</div>
			</div>
		</footer>
	<?php endif; ?>
	
	<?php if ( ot_get_option('nt_landium_footer_style') == '3' ) : ?>
		<footer id="footer" class="footer--style-3">
			
			<?php if ( ot_get_option('nt_landium_news') != 'off') : ?>
				<div class="s-form">
					<div class="container">
						<div class="section-heading section-heading--center section-heading--white">
							<?php  if ( ot_get_option('nt_landium_news_h') != '') : ?>
								<h2 class="title h1"><?php  echo esc_html( $nt_landium_news_h ); ?></h2>
							<?php endif; ?>
							
							<?php  if ( ot_get_option('nt_landium_news_d') != '') : ?>
								<p><?php  echo esc_html( $nt_landium_news_d ); ?></p>
							<?php endif; ?>
						</div>

						<div class="footer__form center-block">
							<?php 
								if ( is_active_sidebar( 'nt-landium-footer-news' ) ) { 
									dynamic_sidebar( 'nt-landium-footer-news' ); 
								} 
							?>
						</div>
						
					</div>
				</div>
			<?php endif; ?>
			
			<div class="container-fluid">
				<div class="row matchHeight-container">
					<div class="map-container matchHeight-item">
						<div class="g_map" data-longitude="<?php  echo esc_attr( $nt_landium_longitude ); ?>" data-latitude="<?php  echo esc_attr( $nt_landium_latitude ); ?>" data-marker="<?php  echo get_template_directory_uri(); ?>/images/marker.png"></div>
						<?php  wp_enqueue_script( 'google-map-api'); ?>
						<?php  wp_enqueue_script( 'nt-landium-google-map'); ?>
					</div>

					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<div class="footer__contact matchHeight-item footer-style-3">
									<div class="row">
										<div class="col-xs-12 col-sm-11 col-md-8">
										
											<?php  if ( ot_get_option('nt_landium_adress') != '') : ?>
												<div class="contact__item clearfix">
													<i class="fontello-location"></i>

													<?php  echo wp_kses( $nt_landium_adress, $nt_landium_allowed_tags ); ?>

												</div>
											<?php endif; ?>
											
											<?php  if ( ot_get_option('nt_landium_phone') != '') : ?>
												<div class="contact__item clearfix">
													<i class="fontello-phone-call"></i>

													<?php  echo wp_kses( $nt_landium_phone, $nt_landium_allowed_tags ); ?>

												</div>
											<?php endif; ?>
											
											<?php  if ( ot_get_option('nt_landium_mail') != '') : ?>
												<div class="contact__item clearfix">
													<i class="fontello-mail"></i>

													<?php  echo wp_kses( $nt_landium_mail, $nt_landium_allowed_tags ); ?>

												</div>
											<?php endif; ?>
											
											<div class="contact__item clearfix">
												<div class="social-btns">
													<?php 
														if ($nt_landium_social_c) {
															foreach($nt_landium_social_c as $key => $value) {
																$target = ot_get_option('nt_landium_social_target');
																echo '<a href="' .esc_url($value['nt_landium_social_link']). '" target="' .esc_attr($target). '" class="' .esc_attr($value['nt_landium_social_text']). '" title="' .esc_html($value['nt_landium_social_text']). '"></a>'; 
															}
														}
													?>
												</div>
											</div>

											<?php 
												if ( ot_get_option('nt_landium_copyright') != '') : 
													echo wp_kses( $nt_landium_copyright, $nt_landium_allowed_tags ); 
												endif; 
											?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</footer>
	<?php endif; ?>
	
	<?php wp_footer(); ?>
	</body>
</html>