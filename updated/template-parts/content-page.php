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

// head-section
$head_title = get_field('title', get_the_ID());
$head_content = get_field('content', get_the_ID());

// about-section
$about_title = get_field('about_title', get_the_ID());
$about_content = get_field('about_content', get_the_ID());

// shop-section
$shop_title = get_field('shop_title', get_the_ID());
$shop_content = get_field('shop_content', get_the_ID());

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<!-- about section -->
	<section class="about_section layout_padding">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="detail-box">
						<div class="heading_container">
							<h2>AIR FORCE<br/>MUSEUM FOUNDATION<?php echo $about_title; ?></h2>
						</div>
						<div class="entry-content">
						<p>The Air Force Museum Foundation is an independent 501(c)(3) nonprofit.
						Since 1960, we have worked to support the National Museum of the U.S. Air
						Force™ financially for expansions, special exhibits, restorations,
						enhancements, educational programs and acquisitions. The Foundation
						also provides necessary resources for volunteer support, special events
						and funds for marketing this world-class museum throughout the region
						and beyond.</p>
							<?php echo $about_content; ?>
						</div>
						<div class="btn-box">
							<a href="<?= get_permalink(44); ?>">About Us</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="about-section-image container-xxl">
			<div class="row">
				<div class="col-md-auto"></div>
				<div class="justify-content-end col-md-3">
					<div class="entry-image">
						<img src="/wp-content/themes/afmuseum/images/banner2.png" alt="banner2" />
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- about section END -->

    <?php if( is_front_page() ) { ?>

	<!-- donation section -->
	<?php get_template_part( 'template-parts/homepage/content', 'donation' ); ?>
	<!-- end donation section -->

	<!-- blog section -->
	<?php get_template_part( 'template-parts/homepage/content', 'blog' ); ?>
	<!-- end blog section -->

	<!-- shop section -->
	<?php
		// Shop Image Background
		$shop_background_image = '/wp-content/themes/afmuseum/images/rectangle30.png';
	?>
	<section class="shop_section" style="<?php echo ($shop_background_image) ? "background-image: url($shop_background_image);" : ""; ?> <?php echo (is_front_page()) ? "" : null; ?>">
	<div class="shop-overlay"></div> 
		<div class="shop-container container">
			<div class="row">
				<div class="shop-title d-flex align-items-center justify-content-center col-sm-12 col-md-6">
					<div class="heading_container">
						<h2>SHOP HEADLINE<br/> WILL GO HERE.<?= $shop_title; ?></h2>
						<div class="shop-content">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
						eiusmod tempor incididunt ut labore et dolore magna aliqua.
						Ut enim ad minim veniam, quis nostrud exercitation ullamco
						laboris nisi ut aliquip ex ea commodo consequat.</p>
						<?= $shop_content; ?>
						</div>
						<div class="btn-box">
							<a href="<?= get_permalink(17); ?>">Shop Now</a>
						</div>
					</div>
				</div>
				<div class="shop-image col-sm-12 col-md-6">
					<img src="/wp-content/themes/afmuseum/images/shop-all3.png" class="shop2-image" alt="shop2-image" />
				</div>
			</div>
			
		</div>
	</section>
	<!-- end donation section -->

<?php } ?>

</article><!-- #post-<?php the_ID(); ?> -->
<!-- end about section -->
