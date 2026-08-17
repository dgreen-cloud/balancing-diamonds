<?php
/**
 * Letters page.
 *
 * @package Balancing_Diamonds
 */

get_header();
?>
<main id="primary" class="site-main letters-page">
	<div class="letters-page__inner shell">
		<p class="eyebrow"><?php esc_html_e( 'Private correspondence', 'balancing-diamonds' ); ?></p>
		<h1><?php esc_html_e( 'Letters from the Axis', 'balancing-diamonds' ); ?></h1>
		<p class="letters-page__lede"><?php esc_html_e( 'An intimate correspondence on worth, voice, truth, balance, dignity, and the practice of authoring a coherent life.', 'balancing-diamonds' ); ?></p>
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="entry-content"><?php the_content(); ?></div>
		<?php endwhile; ?>
		<div class="letters-page__form">
			<?php balancing_diamonds_newsletter_form(); ?>
		</div>
		<p class="letters-page__note"><?php esc_html_e( 'No noise. No borrowed urgency. Only letters worth returning to.', 'balancing-diamonds' ); ?></p>
	</div>
</main>
<?php
get_footer();

