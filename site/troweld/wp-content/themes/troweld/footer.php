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
?>

	<!-- info section -->
	<section class="info_section ">
		<div class="info_container layout_padding2">
			<div class="container">
			
			<div class="info_logo">
				<?php if( $l_opt == true && $l_img ) { ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="<?php echo $l_img; ?>" alt="University Animal Clinic" />
					</a>
				<?php } ?>

				<?php if( $l_opt == false && $l_text ) { ?>
					<a class="navbar-brand " href="<?php echo esc_url( home_url( '/' ) ); ?>"> <?php echo $l_text; ?> </a>
				<?php } ?>
			</div>

			<div class="info_main">
				<div class="row">
					<div class="col-md-3 col-lg-2">
						<div class="info_link-box">
							<?php
								echo '<h5>Useful Link</h5>';
								wp_nav_menu( array(
									'menu' => 'Useful Link',
									'theme_location'    => 'useful-link',
									'depth'             => 2,
									'container'         => 'div'
								) );
							?>
						</div>
					</div>
					
					<div class="col-md-3 ">
						<?php dynamic_sidebar( 'footer-widget-1' ); ?>
					</div>
					
					<div class="col-md-3 mx-auto  ">
						<h5>
						social media
						</h5>
						<div class="social_box">
						<?php 
							if( $h_social_box ) {
								foreach($h_social_box as $h_social ) {
								$url = $h_social['social_url'];
								$icon = $h_social['social_icon_class'];

								if( $url && $icon ) { 
									echo '<a href="'.$url.'" target="_blank"><i class="fa '.$icon.'" aria-hidden="true"></i></a>';
								}
								} 
							} 
						?>
						</div>
					</div>
					
					<div class="col-md-3">
						<?php dynamic_sidebar( 'footer-widget-2' ); ?>
					</div>
				</div>
			</div>
			<div class="info_bottom">
				<div class="row">
				<div class="col-lg-9">
					<div class="info_contact ">
					<div class="row">
						<div class="col-md-3">
							<?php if( $h_location ) { ?>
								<a href="<?php echo $h_location; ?>" class="link-box" target="_blank">
									<i class="fa fa-map-marker" aria-hidden="true"></i>
									<span>Location</span>
								</a>
							<?php } ?>
						</div>
						<div class="col-md-5">
							<?php if( $h_phone ) { ?>
								<a href="tel:<?php echo $h_phone; ?>" class="link-box">
									<i class="fa fa-phone" aria-hidden="true"></i>
									<span>Call : <?php echo $h_phone; ?></span>
								</a>
							<?php } ?>
						</div>
						<div class="col-md-4">
							<?php if( $h_email ) { ?>
								<a href="mailto:<?php echo $h_email; ?>"  class="link-box">
									<i class="fa fa-envelope" aria-hidden="true"></i>
									<span><?php echo $h_email; ?></span>
								</a>
							<?php } ?>
						</div>
					</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="info_form ">
					<form action="">
						<input type="email" placeholder="Enter Your Email" />
						<button>
						<i class="fa fa-arrow-right" aria-hidden="true"></i>
						</button>
					</form>
					</div>
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
