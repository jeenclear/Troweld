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
	<link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:ital@0;1&family=Sen:wght@400..800&display=swap" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
    // Banner Image Background
    $banner_background_image = '/wp-content/themes/afmuseum/images/banner1.png';
?>

<div class="hero_area" style="<?php echo ($banner_background_image) ? "background-image: url($banner_background_image);" : ""; ?> <?php echo (is_front_page()) ? "" : null; ?>">

    <!-- header section strats -->
    <header class="header_section">
      <div class="header_bottom">
        <div class="container">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img src="/wp-content/themes/afmuseum/images/logo.png" alt="" />
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>
            
            <?php
              wp_nav_menu( array(
                'menu' => 'Menu-1',
                'theme_location'    => 'menu-1',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse justify-content-end',
                'container_id'      => 'navbarSupportedContent',
                'menu_class'        => 'navbar-nav',
                'walker'            => new WP_Bootstrap_Navwalker(),
              ) );
            ?>
          </nav>
        </div>
      </div>
    </header>
    <!-- end header section -->

    <!-- slider section -->
    <?php if( is_front_page() ) { ?>

      <section class="slider_section">
        <div class="slider-overlay"></div> 
        <div class="container slider-wrapper">
          <div class="slide" data-ride="carousel">
            <div class="carousel-top-inner">
                <img src="/wp-content/themes/afmuseum/images/group65.png" alt="MILLIONS OF VISITORS COUNTLESS MEMORIES" />
            </div>
            <div class="carousel-bottom-inner">
                HELP US SUPPORT THE NEXT 100 YEARS
            </div>
            <div class="carousel-button-inner">
                <a href="<?= get_permalink(21); ?>" class="donate-button">
                    DONATE NOW
                </a>
            </div>
            <div class="carousel-arrow-inner">
                <a href="#scroll" class="arrow-button">
                  <img src="/wp-content/themes/afmuseum/images/arrow.png" alt="scroll-button" />
                </a>
            </div>
          </div>
        </div>
      </section>
      <!-- end slider section -->

    <?php } ?>

  </div>