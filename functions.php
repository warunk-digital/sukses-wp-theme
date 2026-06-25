<?php
/**
 * Sukses functions and definitions.
 *
 * @package Sukses
 * @since Sukses 1.0
 */

if ( ! function_exists( 'sukses_setup' ) ) :
	function sukses_setup() {
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'custom-logo' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
		add_theme_support( 'block-template-parts' );

		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'sukses' ),
				'footer'  => __( 'Footer Menu', 'sukses' ),
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'sukses_setup' );

function sukses_enqueue_styles() {
	wp_enqueue_style(
		'sukses-style',
		get_parent_theme_file_uri( 'style.css' ),
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'sukses_enqueue_styles' );

/**
 * Filter to make Elementor and FSE play together.
 * When an Elementor template overrides the header/footer,
 * do not let FSE block templates interfere.
 */
function sukses_elementor_compat() {
	if ( defined( 'ELEMENTOR_VERSION' ) ) {
		add_theme_support( 'elementor' );
	}
}
add_action( 'after_setup_theme', 'sukses_elementor_compat' );
