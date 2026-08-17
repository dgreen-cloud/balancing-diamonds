<?php
/**
 * Balancing Diamonds theme functions.
 *
 * @package Balancing_Diamonds
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'BD_THEME_VERSION', '1.0.0' );

require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/starter-content.php';

/**
 * Register theme features and navigation locations.
 */
function balancing_diamonds_setup() {
	load_theme_textdomain( 'balancing-diamonds', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 96,
			'width'       => 520,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'f3ecdf',
		)
	);

	add_editor_style( 'assets/css/editor-style.css' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Navigation', 'balancing-diamonds' ),
			'footer'  => __( 'Footer Navigation', 'balancing-diamonds' ),
		)
	);

	add_image_size( 'bd-featured', 1600, 1000, true );
	add_image_size( 'bd-card', 900, 675, true );
}
add_action( 'after_setup_theme', 'balancing_diamonds_setup' );

/**
 * Set a measured content width for essays and embeds.
 */
function balancing_diamonds_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'balancing_diamonds_content_width', 760 );
}
add_action( 'after_setup_theme', 'balancing_diamonds_content_width', 0 );

/**
 * Load the public styles and scripts.
 */
function balancing_diamonds_assets() {
	wp_enqueue_style(
		'balancing-diamonds-style',
		get_stylesheet_uri(),
		array(),
		BD_THEME_VERSION
	);

	wp_enqueue_script(
		'balancing-diamonds-navigation',
		get_template_directory_uri() . '/assets/js/navigation.js',
		array(),
		BD_THEME_VERSION,
		true
	);

	wp_enqueue_script(
		'balancing-diamonds-theme',
		get_template_directory_uri() . '/assets/js/theme.js',
		array(),
		BD_THEME_VERSION,
		true
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'balancing_diamonds_assets' );

/**
 * Add preconnect hints only when the site owner later chooses remote assets.
 */
function balancing_diamonds_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		return array_unique( $urls );
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'balancing_diamonds_resource_hints', 10, 2 );

/**
 * Return the reading time for an essay.
 *
 * @param int|null $post_id Post ID.
 * @return string
 */
function balancing_diamonds_reading_time( $post_id = null ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	$content = get_post_field( 'post_content', $post_id );
	$words   = str_word_count( wp_strip_all_tags( $content ) );
	$minutes = max( 1, (int) ceil( $words / 220 ) );

	return sprintf(
		/* translators: %d: number of minutes. */
		_n( '%d minute', '%d minutes', $minutes, 'balancing-diamonds' ),
		$minutes
	);
}

/**
 * Use the page excerpt or a clean automatic excerpt.
 *
 * @param int|null $post_id Post ID.
 * @param int      $words   Maximum word count.
 * @return string
 */
function balancing_diamonds_excerpt( $post_id = null, $words = 30 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	$excerpt = get_post_field( 'post_excerpt', $post_id );

	if ( ! $excerpt ) {
		$excerpt = get_post_field( 'post_content', $post_id );
	}

	return wp_trim_words( wp_strip_all_tags( strip_shortcodes( $excerpt ) ), $words, '&hellip;' );
}

/**
 * Render a simple navigation fallback before menus are assigned.
 */
function balancing_diamonds_nav_fallback() {
	$links = array(
		'philosophy'           => __( 'Philosophy', 'balancing-diamonds' ),
		'diamond-architecture' => __( 'Architecture', 'balancing-diamonds' ),
		'journal'              => __( 'Journal', 'balancing-diamonds' ),
		'letters'              => __( 'Letters', 'balancing-diamonds' ),
		'founder'              => __( 'Founder', 'balancing-diamonds' ),
	);

	echo '<ul class="menu">';
	foreach ( $links as $slug => $label ) {
		$page = get_page_by_path( $slug );
		$url  = $page ? get_permalink( $page ) : home_url( '/' . $slug . '/' );
		printf(
			'<li><a href="%1$s">%2$s</a></li>',
			esc_url( $url ),
			esc_html( $label )
		);
	}
	echo '</ul>';
}

/**
 * Get a page URL by slug with a safe fallback.
 *
 * @param string $slug Page slug.
 * @return string
 */
function balancing_diamonds_page_url( $slug ) {
	$page = get_page_by_path( $slug );
	return $page ? get_permalink( $page ) : home_url( '/' . trim( $slug, '/' ) . '/' );
}

/**
 * Output a newsletter form or a direct subscription link.
 */
function balancing_diamonds_newsletter_form() {
	$shortcode = trim( get_theme_mod( 'bd_newsletter_shortcode', '' ) );
	$url       = get_theme_mod( 'bd_newsletter_url', '' );

	if ( $shortcode ) {
		echo '<div class="letters-form letters-form--shortcode">';
		echo do_shortcode( wp_kses_post( $shortcode ) );
		echo '</div>';
		return;
	}

	if ( $url ) {
		printf(
			'<a class="button button--light" href="%1$s">%2$s <span aria-hidden="true">&#8599;</span></a>',
			esc_url( $url ),
			esc_html__( 'Receive the letters', 'balancing-diamonds' )
		);
		return;
	}

	printf(
		'<a class="button button--light" href="%1$s">%2$s <span aria-hidden="true">&#8594;</span></a>',
		esc_url( balancing_diamonds_page_url( 'letters' ) ),
		esc_html__( 'Enter Letters from the Axis', 'balancing-diamonds' )
	);
}

/**
 * Add body classes for predictable layout targets.
 *
 * @param array $classes Existing classes.
 * @return array
 */
function balancing_diamonds_body_classes( $classes ) {
	if ( is_singular( 'post' ) ) {
		$classes[] = 'reading-room';
	}
	if ( ! has_custom_logo() ) {
		$classes[] = 'has-wordmark';
	}

	return $classes;
}
add_filter( 'body_class', 'balancing_diamonds_body_classes' );

/**
 * Make the archive title more editorial.
 *
 * @param string $title Archive title.
 * @return string
 */
function balancing_diamonds_archive_title( $title ) {
	if ( is_category() || is_tag() ) {
		$title = single_term_title( '', false );
	}

	return $title;
}
add_filter( 'get_the_archive_title', 'balancing_diamonds_archive_title' );

