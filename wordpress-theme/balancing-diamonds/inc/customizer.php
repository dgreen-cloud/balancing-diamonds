<?php
/**
 * Customizer settings for Balancing Diamonds.
 *
 * @package Balancing_Diamonds
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register restrained brand and publishing settings.
 *
 * @param WP_Customize_Manager $wp_customize Customizer instance.
 */
function balancing_diamonds_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'bd_maison_settings',
		array(
			'title'       => __( 'Maison Settings', 'balancing-diamonds' ),
			'description' => __( 'Core publishing, newsletter, founder, and contact settings.', 'balancing-diamonds' ),
			'priority'    => 30,
		)
	);

	$wp_customize->add_setting(
		'bd_founder_name',
		array(
			'default'           => 'Derek Green',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'bd_founder_name',
		array(
			'label'   => __( 'Founder name', 'balancing-diamonds' ),
			'section' => 'bd_maison_settings',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'bd_newsletter_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'bd_newsletter_url',
		array(
			'label'       => __( 'Newsletter subscription URL', 'balancing-diamonds' ),
			'description' => __( 'Use this for a hosted Mailchimp, Kit, Buttondown, or Substack form.', 'balancing-diamonds' ),
			'section'     => 'bd_maison_settings',
			'type'        => 'url',
		)
	);

	$wp_customize->add_setting(
		'bd_newsletter_shortcode',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'bd_newsletter_shortcode',
		array(
			'label'       => __( 'Newsletter form shortcode', 'balancing-diamonds' ),
			'description' => __( 'Optional. Example: [mailpoet_form id="1"]. This overrides the URL.', 'balancing-diamonds' ),
			'section'     => 'bd_maison_settings',
			'type'        => 'text',
		)
	);

	$wp_customize->add_setting(
		'bd_collaborate_email',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_email',
		)
	);
	$wp_customize->add_control(
		'bd_collaborate_email',
		array(
			'label'   => __( 'Collaboration email', 'balancing-diamonds' ),
			'section' => 'bd_maison_settings',
			'type'    => 'email',
		)
	);

	$wp_customize->add_setting(
		'bd_shop_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'bd_shop_url',
		array(
			'label'   => __( 'Editions or shop URL', 'balancing-diamonds' ),
			'section' => 'bd_maison_settings',
			'type'    => 'url',
		)
	);
}
add_action( 'customize_register', 'balancing_diamonds_customize_register' );

