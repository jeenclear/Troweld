<?php
/*
Plugin Name: WebFx Custom Post Type
Description: Plugin to register the custom post type
Version: 1.0
Author: Edjeen Capillanes
Textdomain: edjeen
License: GPLv2
*/

// Custom Post Type Class 
if (! class_exists("WebFX_Test_Register") ) {

	class WebFX_Test_Register {

		public function __construct() {
            add_action('init', array($this, 'WebFX_Test_PostType') );
			add_action('init', array($this, 'WebFX_Test_Taxonomies') );
        }

			// Set priority to avoid plugin conflicts
		public function WebFX_Test_PostType() {
			$a_types = array(
				// Banner
				array(
					"the_type"	=>	"banner",
					"single"	=>	"Banner",
					"plural"	=>	"Banners"
				),

				// Portfolio
				array(
					"the_type"	=>	"portfolio",
					"single"	=>	"Portfolio",
					"plural"	=>	"Portfolio"
				),
				
				// Service
				array(
					"the_type"	=>	"service",
					"single"	=>	"Service",
					"plural"	=>	"Services"
				),

				// Testimonial
				array(
					"the_type"	=>	"testimonial",
					"single"	=>	"Testimonial",
					"plural"	=>	"Testimonials"
				),
			);

			foreach ($a_types as $a_type) {
				$s_the_type = $a_type['the_type'];
				$s_single = $a_type['single'];
				$s_plural = $a_type['plural'];

				if(!empty($a_type['slug'])) {
					$s_slug = $a_type['slug'];
				}else{
					$s_slug =$a_type['the_type'];
				}

				// Set UI labels for Custom Post Type
				$a_supports = empty($a_type['supports']) ? array('title','editor','thumbnail','page-attributes') : $a_type['supports'];

				$a_labels = array(
					'name' 					=> _x($s_plural, 'post type general name'),
					'singular_name' 		=> _x($s_single, 'post type singular name'),
					'add_new' 				=> _x('Add New ' .$s_single, $s_single),
					'add_new_item' 			=> __('Add New ' . $s_single),
					'edit_item' 			=> __('Edit ' . $s_single),
					'new_item' 				=> __('New ' . $s_single),
					'view_item' 			=> __('View ' . $s_single),
					'search_items' 			=> __('Search ' . $s_plural),
					'not_found' 			=>  __('No ' . $s_plural . ' found'),
					'not_found_in_trash'	=> __('No ' . $s_plural . ' found in Trash')
				);

				$a_rewrite = array(
					'slug'                => $s_slug,
					'with_front'          => true,
					'pages'               => true,
					'feeds'               => true
				);

				$a_args = array(
					'labels'        	  => $a_labels,
					'rewrite'       	  => $a_rewrite,
					
					// Features this CPT supports in Post Editor
					'supports'      	  => $a_supports,
			
					/* A hierarchical CPT is like Pages and can have
					* Parent and child items. A non-hierarchical CPT
					* is like Posts.
					*/
					'hierarchical'        => false,
					'public'              => true,
					'show_ui'             => true,
					'show_in_menu'        => true,
					'show_in_nav_menus'   => true,
					'show_in_admin_bar'   => true,
					'menu_position'       => 5,
					'can_export'          => true,
					'has_archive'         => true,
					'exclude_from_search' => false,
					'publicly_queryable'  => true,
					'capability_type'     => 'post',
					'show_in_rest'        => true,
				);

				register_post_type($s_the_type , $a_args);
			}
					
		}

		//create a custom taxonomy name it topics for your posts
		public function WebFX_Test_Taxonomies() {

			// Add new taxonomy, make it hierarchical like categories
			$a_taxonomies = array(
				// Service Category
				array(
					// Custom post type name that you want to have an category
					"the_type"			=> "portfolio",
					"the_taxonomies"	=> "portfolio_categories",
					"single"			=> "Portfolio Category",
					"plural"			=> "Portfolio Categories"
				)
			);

			foreach ($a_taxonomies as $a_taxonomy) {

				$s_the_type = $a_taxonomy["the_type"];
				$s_the_taxonomies = $a_taxonomy["the_taxonomies"];
				$s_single = $a_taxonomy["single"];
				$s_plural = $a_taxonomy["plural"];

				//first do the translations part for GUI
				$a_labels = array(
					'name' => _x( $s_plural, 'taxonomy general name' ),
					'singular_name' => _x( $s_single, 'taxonomy singular name' ),
					'search_items' => __( 'Search '.$s_plural ),
					'all_items' => __( 'All '.$s_plural ),
					'parent_item' => __( 'Parent '.$s_single ),
					'parent_item_colon' => __( 'Parent '.$s_single.':' ),
					'edit_item' => __( 'Edit '.$s_single ),
					'update_item' => __( 'Update '.$s_single ),
					'add_new_item' => __( 'Add New '.$s_single ),
					'new_item_name' => __( 'New '.$s_single.' Name' ),
					'menu_name' => __( $s_plural ),
				);

				$a_rewrite = array(
					'slug'                       => $s_the_taxonomies,
					'with_front'                 => true,
					'hierarchical'               => true,
				);

				$a_args = array(
					'labels'                     => $a_labels,
					'hierarchical'               => true,
					'public'                     => true,
					'show_ui'                    => true,
					'show_admin_column'          => true,
					'show_in_nav_menus'          => true,
					'show_tagcloud'              => true,
					'rewrite'                    => $a_rewrite,
				);
				
				register_taxonomy( $s_the_taxonomies, $s_the_type, $a_args );
				
			}
		}

	}

	new WebFX_Test_Register();
}

