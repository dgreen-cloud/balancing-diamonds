<?php
/**
 * Not found page.
 *
 * @package Balancing_Diamonds
 */

get_header();
?>
<main id="primary" class="site-main not-found-page">
	<div class="shell shell--reading not-found-page__inner">
		<p class="eyebrow"><?php esc_html_e( 'The room is quiet', 'balancing-diamonds' ); ?></p>
		<p class="not-found-page__number" aria-hidden="true">404</p>
		<h1><?php esc_html_e( 'This page has left the house.', 'balancing-diamonds' ); ?></h1>
		<p><?php esc_html_e( 'Return to the library, begin with the Diamond Architecture, or search the archive.', 'balancing-diamonds' ); ?></p>
		<div class="button-row"><a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Return home', 'balancing-diamonds' ); ?></a><a class="text-link" href="<?php echo esc_url( balancing_diamonds_page_url( 'journal' ) ); ?>"><?php esc_html_e( 'Enter the journal', 'balancing-diamonds' ); ?></a></div>
		<?php get_search_form(); ?>
	</div>
</main>
<?php get_footer(); ?>

