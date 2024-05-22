<?php

	/**
	 * The template for displaying the footer
	 *
	 * Contains the closing of the #content div and all content after.
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package webfx
	 */

	// Logo
	$l_opt = get_field('logo_option', 'option'); 
	$l_img = get_field('logo_image', 'option');
	$l_text = get_field('logo_text', 'option');

	// Site Info
	$h_location = get_field('location_url', 'option');
	$h_phone = get_field('phone', 'option');
	$h_email = get_field('email', 'option');

	// Social Box
	$h_social_box = get_field('social_box', 'option');

	// footer
	$footer_address = get_field('footer_address', 'option');
	$footer_phone = get_field('footer_phone', 'option');
?>

	<!-- info section -->
	<section class="info_section ">
		<div class="info_container layout_padding2">
			<div class="container-xxl">
			
			<div class="info_logo">
				<?php if( $l_opt == true && $l_img ) { ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="<?php echo $l_img; ?>" alt="Air Force Museum" />
					</a>
				<?php } ?>

				<?php if( $l_opt == false && $l_text ) { ?>
					<a class="navbar-brand " href="<?php echo esc_url( home_url( '/' ) ); ?>"> <?php echo $l_text; ?> </a>
				<?php } ?>
			</div>

			<div class="info_main">
				<div class="row">

					<div class="col-md-5 col-lg-3">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo">
							<img src="/wp-content/themes/afmuseum/images/logo.png" alt="" />
						</a>
						<a href="#seal" class="seal-logo">
							<img src="/wp-content/themes/afmuseum/images/candid-seal-gold-2023.png" alt="candid seal gold 2023" />
						</a>
					</div>
					<div class="footer-menu1 col-md-2 col-lg-2">
						<div class="info_link-box">
							<?php
								wp_nav_menu( array(
									'menu' => 'Menu 1',
									'theme_location'    => 'useful-link',
									'depth'             => 2,
									'container'         => 'div'
								) );
							?>
						</div>
					</div>
					<div class="footer-menu2 col-md-2">
						<div class="info_link-box">
							<?php
								wp_nav_menu( array(
									'menu' => 'Menu 2',
									'theme_location'    => 'useful-link',
									'depth'             => 2,
									'container'         => 'div'
								) );
							?>
						</div>
						<?php //dynamic_sidebar( 'footer-widget-1' ); ?>
					</div>
					<div class="footer-menu3 col-md-3">
						<div class="info1-box">
							<a href="#" target="_blank">AFMF BOARD OF TRUSTEES</a>
						</div>
						<div class="info2-box">
							<a href="#" target="_blank">AFMF EMPLOYEE PORTAL</a>
						</div>
					</div>
					<div class="footer-menu4 col-md-2 mx-auto">
						<div class="social_box">
							<a href="#search">
								<img src="/wp-content/themes/afmuseum/images/search.png" alt="search" />
							</a>
							<a href="<?= get_field('footer_facebook', 'option'); ?>" target="_blank">
								<img src="/wp-content/themes/afmuseum/images/facebook.png" alt="facebook" />
							</a>
							<a href="<?= get_field('footer_facebook', 'option'); ?>" target="_blank">
								<img src="/wp-content/themes/afmuseum/images/instagram.png" alt="facebook" />
							</a>
							<a href="<?= get_field('footer_facebook', 'option'); ?>" target="_blank">
								<img src="/wp-content/themes/afmuseum/images/linkin.png" alt="facebook" />
							</a>
							<a href="<?= get_field('footer_facebook', 'option'); ?>" target="_blank">
								<img src="/wp-content/themes/afmuseum/images/youtube.png" alt="facebook" />
							</a>
						</div>
						<div class="footer_address_box">
							<?= $footer_address; ?>
						</div>
						<div class="footer_phone_box">
							<?= $footer_phone; ?>
						</div>
					</div>
					<?php //dynamic_sidebar( 'footer-widget-2' ); ?>
				</div>
			</div>
			</div>
			</div>
		</div>
	</section>
	<!-- end info section -->
	
  <!-- footer section -->
	<footer class="footer_section">
		<div class="container">
			<p>
				&copy; <span id="displayYear"></span> All Rights Reserved By
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'webfx' ) ); ?>">
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Free Html Templates', 'webfx' ), 'WordPress' );
					?>
				</a>
			</p>
		</div>
	</footer>
  <!-- footer section -->

</div><!-- #page -->

<?php wp_footer(); ?>

<!-- Google Map -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRkjdNoxTscCQugqaFdhMRINs72tWYO_M&callback=myMap"></script> -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
<!-- End Google Map -->

</body>
</html>
