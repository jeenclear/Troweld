<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package webfx
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php wp_head(); ?>

  <!-- fonts style -->
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
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

    // Banner Image Background
    $banner_background_image = get_field('banner_background_image', 'option');
?>

<div class="hero_area" style="<?php echo ($banner_background_image) ? "background-image: url($banner_background_image);" : ""; ?> <?php echo (is_front_page()) ? "height:calc(100vh - 35px);" : "height:auto;"; ?>">

    <!-- header section strats -->
    <header class="header_section">
      <div class="header_top">
        <div class="container-fluid header_top_container">

            <?php if( $l_opt == true && $l_img ) { ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?php echo $l_img; ?>" alt="University Animal Clinic" />
                </a>
            <?php } ?>

            <?php if( $l_opt == false && $l_text ) { ?>
                <a class="navbar-brand " href="<?php echo esc_url( home_url( '/' ) ); ?>"> <?php echo $l_text; ?> </a>
            <?php } ?>
          
          <div class="contact_nav">
            
            <?php if( $h_location ) { ?>
              <a href="<?php echo $h_location; ?>" target="_blank">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>Location</span>
              </a>
            <?php } ?>
            
            <?php if( $h_phone ) { ?>
              <a href="tel:<?php echo $h_phone; ?>">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>Call : <?php echo $h_phone; ?></span>
              </a>
            <?php } ?>
            
            <?php if( $h_email ) { ?>
              <a href="mailto:<?php echo $h_email; ?>">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span><?php echo $h_email; ?></span>
              </a>
            <?php } ?>

          </div>
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
      </div>
      <div class="header_bottom">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand navbar_brand_mobile" href="index.html"> Tro<span>Weld</span> </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>
            
            <?php
              wp_nav_menu( array(
                'menu' => 'Menu-1',
                'theme_location'    => 'menu-1',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'navbarSupportedContent',
                'menu_class'        => 'navbar-nav',
                'walker'            => new WP_Bootstrap_Navwalker(),
              ) );
            ?>

            <!--
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="service.html">Services</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.html"> About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="portfolio.html">Portfolio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.html">Contact Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span>
                      Login
                    </span>
                  </a>
                </li>
                <form class="form-inline">
                  <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                    <i class="fa fa-search" aria-hidden="true"></i>
                  </button>
                </form>
              </ul>
            </div>
            -->
          </nav>
        </div>
      </div>
    </header>
    <!-- end header section -->

    <!-- slider section -->
    <?php if( is_front_page() ) { ?>

      <section class="slider_section ">
        <div id="customCarousel1" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
          <?php
            $a_args = array(
              'post_type'			=> 'banner',
              'orderby'			=> 'menu_order',
              'order'				=> 'ASC',
              'posts_per_page'	=> 7
            );
            $a_posts = get_posts( $a_args );

            $i = 0;
            if( $a_posts ) {
            foreach( $a_posts as $o_post ) {

            $banner_read_more_url = get_field( 'banner_read_more_url' , $o_post->ID );
            $banner_contact_us_url = get_field( 'banner_contact_us_url' , $o_post->ID );
          ?>
          
            <div class="carousel-item <?php echo ($i++ == 1) ? "active" : ''; ?>">
              <div class="container ">
                <div class="detail-box">
                  <h1><?php echo $o_post->post_title; ?></h1>
                  <div class="btn-box">
                    
                    <?php if( $banner_read_more_url !="" ) { ?>
                      <a href="<?php echo $o_post->banner_read_more_url; ?>" class="btn1">
                        Read More
                      </a>
                    <?php } ?>

                    <?php if( $banner_contact_us_url !="" ) { ?>
                      <a href="<?php echo $o_post->banner_contact_us_url; ?>" class="btn2">
                        Contact Us
                      </a>
                    <?php } ?>
                  
                  </div>
                </div>
              </div>
            </div>

          <?php 
            }
          } 
          ?>
          </div>
          <div class="carousel_btn-box">
            <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
              <i class="fa fa-arrow-left" aria-hidden="true"></i>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
              <i class="fa fa-arrow-right" aria-hidden="true"></i>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </section>
      <!-- end slider section -->

    <?php } ?>

  </div>