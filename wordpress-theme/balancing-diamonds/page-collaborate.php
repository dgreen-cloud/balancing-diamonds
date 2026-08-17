<?php
/**
 * Collaboration page.
 *
 * @package Balancing_Diamonds
 */

get_header();
$email = get_theme_mod( 'bd_collaborate_email', '' );
?>
<main id="primary" class="site-main page-room collaborate-page">
	<?php while ( have_posts() ) : the_post(); ?>
		<header class="page-hero shell">
			<p class="eyebrow"><?php esc_html_e( 'Invitations and commissions', 'balancing-diamonds' ); ?></p>
			<h1><?php the_title(); ?></h1>
		</header>
		<div class="page-content shell shell--reading entry-content">
			<?php the_content(); ?>
			<?php if ( $email ) : ?>
				<p><a class="button" href="mailto:<?php echo esc_attr( antispambot( $email ) ); ?>"><?php esc_html_e( 'Write to the house', 'balancing-diamonds' ); ?></a></p>
			<?php endif; ?>
		</div>
	<?php endwhile; ?>
</main>
<?php get_footer(); ?>

