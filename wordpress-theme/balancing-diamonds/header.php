<?php
/**
 * Site header.
 *
 * @package Balancing_Diamonds
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#f3ecdf">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to the reading room', 'balancing-diamonds' ); ?></a>

<div class="site-frame">
	<header class="site-header" id="masthead">
		<div class="site-header__inner shell shell--wide">
			<div class="site-branding">
				<?php if ( has_custom_logo() ) : ?>
					<?php the_custom_logo(); ?>
				<?php else : ?>
					<a class="wordmark" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<span class="wordmark__primary">Balancing Diamonds</span>
						<span class="wordmark__secondary">An editorial maison</span>
					</a>
				<?php endif; ?>
			</div>

			<button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-menu">
				<span class="menu-toggle__label"><?php esc_html_e( 'Menu', 'balancing-diamonds' ); ?></span>
				<span class="menu-toggle__lines" aria-hidden="true"><i></i><i></i></span>
			</button>

			<nav class="primary-navigation" id="primary-menu" aria-label="<?php esc_attr_e( 'Primary navigation', 'balancing-diamonds' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_class'     => 'menu',
						'fallback_cb'    => 'balancing_diamonds_nav_fallback',
					)
				);
				?>
			</nav>

			<button class="mode-toggle" type="button" aria-pressed="false" aria-label="<?php esc_attr_e( 'Use Night Library mode', 'balancing-diamonds' ); ?>">
				<span class="mode-toggle__sun" aria-hidden="true">&#9675;</span>
				<span class="mode-toggle__moon" aria-hidden="true">&#9680;</span>
			</button>
		</div>
	</header>

