<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package webfx
 */

// Welcome Section 
$read_more_url = get_field('read_more_url');

// Porfolio Section
$portfolio_head_title = get_field('portfolio_head_title', 'option');
$portfolio = get_field('portfolio', 'option');

// Our Services
$our_ser_title = get_field('our_services_title', 'option');
$our_ser_btn_url = get_field('our_services_button_url', 'option');

// Contact Section
$con_head_title = get_field('contact_head_title', 'option');

// Testimonial Section
$testi_head_title = get_field('testimonial_head_title', 'option');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- about section -->
	<section class="about_section layout_padding">
		<div class="container  ">
		<div class="row">
			<div class="col-md-<?php echo is_front_page() ? '6' : '8'; ?>">
				<div class="detail-box">
					<div class="heading_container">
						<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
					</div>

					<div class="entry-content">
						<?php
							if(!is_front_page() && has_post_thumbnail()) {
								$image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), '');
								echo '<img src="' . $image_url[0] . '" title="' . the_title_attribute('echo=0') . '" class="col" />';
							}

							the_content();

							wp_link_pages(
								array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'webfx' ),
									'after'  => '</div>',
								)
							);
						?>
					</div>
					<?php if( $read_more_url ) { ?>
						<a href="<?php echo $read_more_url; ?>">Read More</a>
					<?php } ?>
				</div>
			</div>
			<?php if( is_front_page() ) { ?>
				<div class="col-md-6 ">
					<div class="img-box">
						<?php 
							if ( has_post_thumbnail() ) { 
								the_post_thumbnail( '', array( 'itemprop' => 'image' ) ); 
							} 
						?>
					</div>
				</div>
			<?php } else { ?>
				<div class="col-md-4">
					<div class="img-box">
						<?php get_sidebar(); ?>
					</div>
				</div>
			<?php } ?>
		</div>
		</div>
	</section>
	
    <?php if( is_front_page() ) { ?>

	<!-- portfolio section -->
	<section class="portfolio_section ">
		<div class="container">
			<div class="heading_container heading_center">
				<?php if( $portfolio_head_title ) { ?>
					<h2><?php echo $portfolio_head_title; ?></h2>
				<?php } ?>
			</div>
			<div class="carousel-wrap ">
			<div class="filter_box">
				<nav class="owl-filter-bar">
					<a href="#" class="item active" data-owl-filter="*">All</a>
					<a href="#" class="item" data-owl-filter=".decorative">DECORATIVE</a>
					<a href="#" class="item" data-owl-filter=".facade">FACADES</a>
					<a href="#" class="item" data-owl-filter=".perforated">PERFORATED</a>
					<a href="#" class="item" data-owl-filter=".railing">RAILINGS</a>
				</nav>
			</div>
			</div>
		</div>
		<div class="owl-carousel portfolio_carousel">
			<?php 
				if( $portfolio ) {
					foreach($portfolio as $port ) { 
					$port_item = $port['portfolio_item'];

					$slug = '';
					$terms = get_the_terms( $port_item->ID, 'portfolio_categories' );		
					
					if( $terms ) {
						foreach($terms as $term) {
							$slug .= $term->slug.' ';
						}
					}
			?>
						<div class="item <?php echo $slug; ?>">
							<div class="box">
								<div class="img-box">

								<?php
									if(has_post_thumbnail($port_item->ID)) {
										$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($port_item->ID), '');
										echo '<img src="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" />';
									}
								?>

								<div class="btn_overlay">
									<a href="<?php echo get_permalink($port_item->ID); ?>">See More</a>
								</div>
								</div>
							</div>
						</div>
			<?php 
				} 
			} 
			?>
		</div>
	</section>
	<!-- end portfolio section -->

	<!-- service section -->
	<section class="service_section layout_padding">
		<div class="container ">
			<div class="heading_container heading_center">
				<?php if( $our_ser_title ) { ?>
					<h2><?php echo $our_ser_title; ?></h2>
				<?php } ?>
			</div>
			<div class="row">
				<?php
					$ser_args = array(
						'post_type'			=> 'service',
						'orderby'			=> 'menu_order',
						'order'				=> 'ASC',
						'posts_per_page'	=> 8,
						'meta_key'			=> '_thumbnail_id'
					);
					
					$ser_posts = get_posts( $ser_args );

					if( $ser_posts ) {
					foreach( $ser_posts as $ser_post ) {
				?>
					<div class="col-sm-6 col-md-4">
						<div class="box ">
							<div class="img-box">
								<?php
									if(has_post_thumbnail($ser_post->ID)) {
										echo get_the_post_thumbnail(
											$ser_post->ID, 
											'',
											array(
												'alt' => the_title_attribute('echo=0'),
												'title' => the_title_attribute('echo=0')
											)
										);
									}
								?>
							</div>
							<div class="detail-box">
								<h5><?php echo $ser_post->post_title; ?></h5>
								<p><?php echo $ser_post->post_content; ?></p>
							</div>
						</div>
					</div>
				<?php
					}
				} 
				?>
			</div>
			<div class="btn-box">
				<?php if( $our_ser_btn_url ) { ?>
					<a href="<?php echo $our_ser_btn_url; ?>">Read More</a>
				<?php } ?>
			</div>
		</div>
	</section>
	<!-- end service section -->

	<!-- contact section -->
	<section class="contact_section ">
		<div class="container">
			<div class="heading_container heading_center">
				<?php if( $con_head_title ) { ?>
					<h2><?php echo $con_head_title; ?></h2>
				<?php } ?>
			</div>
			<div class="row">
			<div class="col-md-6 px-0">
				<div class="form_container">
					<?php echo do_shortcode( '[contact-form-7 id="7094aee" title="Contact form 1"]' ); ?>				
				</div>
			</div>
			<div class="col-md-6 px-0">
				<div class="map_container">
				<div class="map">
					<div id="googleMap"></div>
				</div>
				</div>
			</div>
			</div>
		</div>
	</section>
  	<!-- end contact section -->

	<!-- client section -->
	<section class="client_section layout_padding">
		<div class="container">
			<div class="heading_container heading_center">
				<?php if( $testi_head_title ) { ?>
					<h2><?php echo $testi_head_title; ?></h2>
				<?php } ?>
			</div>
			<div class="row">
			<div class="col-md-9 mx-auto">
				<div id="customCarousel2" class="carousel slide" data-ride="carousel">
				<div class="row">
					<div class="col-md-11">
						<div class="carousel-inner">
							<?php
								$tes_args = array(
									'post_type'			=> 'testimonial',
									'orderby'			=> 'menu_order',
									'order'				=> 'ASC',
									'posts_per_page'	=> 7,
									'meta_key'			=> '_thumbnail_id'
								);
								
								$tes_posts = get_posts( $tes_args );

								$i = 0;
								if( $tes_posts ) {
								foreach( $tes_posts as $tes_post ) {
							?>
								<div class="carousel-item <?php echo ($i++ == 0) ? "active" : ''; ?>">
									<div class="box">
										<div class="client_id">
											<div class="img-box">
												<?php
													if(has_post_thumbnail($tes_post->ID)) {
														$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($tes_post->ID), '');
														echo '<img src="' . $image_url[0] . '" title="' . the_title_attribute('echo=0') . '" />';
													}
												?>
											</div>
											<h5><?php echo $tes_post->post_title; ?></h5>
										</div>
										<div class="detail-box">
											<p><?php echo $tes_post->post_content; ?></p>
										</div>
									</div>
								</div>
							<?php
								}
							} 
							?>
						</div>
					</div>
					<div class="col-md-1">
						<?php if( $tes_posts ) { ?>
							<ol class="carousel-indicators">
								<?php
									$length = count($tes_posts);
									for ($count = 0; $count < $length; $count++) {
								?>
									<li data-target="#customCarousel2" data-slide-to="<?php echo $count; ?>" class="<?php echo ($count == 0) ? 'active' : ''; ?>"></li>
								<?php
									}
								?>
							</ol>
						<?php } ?>
					</div>
				</div>
				</div>
			</div>
			</div>
		</div>
	</section>
	<!-- end client section -->

	<?php } ?>

</article><!-- #post-<?php the_ID(); ?> -->
<!-- end about section -->
