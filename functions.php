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

function sukses_enqueue_assets() {
	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style(
		'sukses-style',
		get_parent_theme_file_uri( 'style.css' ),
		array(),
		$theme_version
	);

	wp_enqueue_style(
		'sukses-fonts',
		'https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Hanken+Grotesk:wght@300;400;500;600;700&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'sukses-icons',
		'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap',
		array(),
		null
	);

	$custom_css = '
		.material-symbols-outlined {
			font-variation-settings: \'FILL\' 0, \'wght\' 400, \'GRAD\' 0, \'opsz\' 24;
		}
		.hide-scrollbar::-webkit-scrollbar {
			display: none;
		}
		.hide-scrollbar {
			-ms-overflow-style: none;
			scrollbar-width: none;
		}
		.text-balance {
			text-wrap: balance;
		}
		@keyframes slideInRight {
			from { opacity: 0; transform: translateX(50px); }
			to { opacity: 1; transform: translateX(0); }
		}
		.animate-slideInRight {
			animation: slideInRight 1s ease-out forwards;
		}
	';
	wp_add_inline_style( 'sukses-style', $custom_css );

	wp_enqueue_script(
		'sukses-tailwind',
		'https://cdn.tailwindcss.com?plugins=forms,container-queries',
		array(),
		null,
		false
	);

	$tailwind_config = 'tailwind.config = {
		darkMode: "class",
		theme: {
			extend: {
				colors: {
					"on-tertiary-fixed": "#1b1c1c",
					"on-secondary": "#ffffff",
					"secondary-fixed-dim": "#f0bd8b",
					"tertiary-fixed-dim": "#c8c6c5",
					"on-primary": "#ffffff",
					"on-secondary-fixed": "#2c1600",
					"primary-fixed": "#d0e9d4",
					"error-container": "#ffdad6",
					"surface-bright": "#fbf9f6",
					"secondary-container": "#ffca98",
					"on-surface": "#1b1c1a",
					"secondary-fixed": "#ffdcbd",
					"on-primary-fixed": "#0b2013",
					"on-error": "#ffffff",
					"on-secondary-container": "#7a532a",
					"primary-container": "#1b3022",
					"on-primary-container": "#819986",
					"surface-container-highest": "#e3e2e0",
					"inverse-on-surface": "#f2f1ee",
					"primary-fixed-dim": "#b4cdb8",
					"outline": "#737973",
					"background": "#fbf9f6",
					"tertiary-fixed": "#e4e2e1",
					"surface-tint": "#4d6453",
					"inverse-primary": "#b4cdb8",
					"surface": "#fbf9f6",
					"on-error-container": "#93000a",
					"on-surface-variant": "#434843",
					"outline-variant": "#c3c8c1",
					"on-tertiary-fixed-variant": "#474746",
					"secondary": "#7d562d",
					"inverse-surface": "#30312f",
					"surface-container-lowest": "#ffffff",
					"on-tertiary-container": "#949292",
					"primary": "#061b0e",
					"surface-container": "#efeeeb",
					"tertiary-container": "#2b2b2b",
					"surface-container-high": "#e9e8e5",
					"surface-container-low": "#f5f3f0",
					"on-secondary-fixed-variant": "#623f18",
					"tertiary": "#171717",
					"surface-dim": "#dbdad7",
					"on-tertiary": "#ffffff",
					"on-primary-fixed-variant": "#364c3c",
					"error": "#ba1a1a",
					"on-background": "#1b1c1a",
					"surface-variant": "#e3e2e0"
				},
				borderRadius: {
					DEFAULT: "0.125rem",
					lg: "0.25rem",
					xl: "0.5rem",
					full: "0.75rem"
				},
				spacing: {
					"container-max": "1280px",
					unit: "8px",
					"section-gap": "120px",
					"margin-desktop": "64px",
					gutter: "24px",
					"margin-mobile": "20px"
				},
				fontFamily: {
					"display-lg-mobile": ["EB Garamond"],
					"headline-lg": ["EB Garamond"],
					"body-md": ["Hanken Grotesk"],
					"body-lg": ["Hanken Grotesk"],
					"headline-md": ["EB Garamond"],
					"label-caps": ["Hanken Grotesk"],
					"display-lg": ["EB Garamond"]
				},
				fontSize: {
					"display-lg-mobile": ["40px", { "lineHeight": "1.2", "fontWeight": "500" }],
					"headline-lg": ["48px", { "lineHeight": "1.2", "fontWeight": "500" }],
					"body-md": ["16px", { "lineHeight": "1.6", "fontWeight": "400" }],
					"body-lg": ["18px", { "lineHeight": "1.6", "fontWeight": "400" }],
					"headline-md": ["32px", { "lineHeight": "1.3", "fontWeight": "500" }],
					"label-caps": ["12px", { "lineHeight": "1", "letterSpacing": "0.1em", "fontWeight": "600" }],
					"display-lg": ["64px", { "lineHeight": "1.1", "letterSpacing": "-0.02em", "fontWeight": "500" }]
				}
			}
		}
	};';
	wp_add_inline_script( 'sukses-tailwind', $tailwind_config );

	$observer_js = '
	document.addEventListener("DOMContentLoaded", () => {
		const observerOptions = { threshold: 0.1 };
		const observer = new IntersectionObserver((entries) => {
			entries.forEach(entry => {
				if (entry.isIntersecting) {
					entry.target.classList.add("animate-slideInRight");
					observer.unobserve(entry.target);
				}
			});
		}, observerOptions);
		document.querySelectorAll("section > div").forEach(div => {
			div.style.opacity = "0";
			observer.observe(div);
		});
	});
	';
	wp_add_inline_script( 'sukses-tailwind', $observer_js );
}
add_action( 'wp_enqueue_scripts', 'sukses_enqueue_assets' );

function sukses_elementor_compat() {
	if ( defined( 'ELEMENTOR_VERSION' ) ) {
		add_theme_support( 'elementor' );
		if ( ! function_exists( 'elementor_theme_do_location' ) ) {
			add_action( 'init', function () {
				if ( class_exists( '\ElementorPro\Modules\ThemeBuilder\Module' ) ) {
					\ElementorPro\Modules\ThemeBuilder\Module::instance()->get_conditions_manager()->register_all_conditions();
				}
			} );
		}
	}
}
add_action( 'after_setup_theme', 'sukses_elementor_compat' );

function sukses_register_elementor_locations( $elementor_theme_manager ) {
	$elementor_theme_manager->register_location(
		'header',
		array(
			'label'            => __( 'Header', 'sukses' ),
			'multiple'         => false,
			'edit_in_content'  => true,
		)
	);
	$elementor_theme_manager->register_location(
		'footer',
		array(
			'label'            => __( 'Footer', 'sukses' ),
			'multiple'         => false,
			'edit_in_content'  => true,
		)
	);
	$elementor_theme_manager->register_location(
		'single',
		array(
			'label'            => __( 'Single', 'sukses' ),
			'multiple'         => false,
			'edit_in_content'  => true,
		)
	);
	$elementor_theme_manager->register_location(
		'archive',
		array(
			'label'            => __( 'Archive', 'sukses' ),
			'multiple'         => false,
			'edit_in_content'  => true,
		)
	);
}
add_action( 'elementor/theme/register_locations', 'sukses_register_elementor_locations' );
