<?php
/**
 * Standard page template.
 *
 * @package Balancing_Diamonds
 */

get_header();
?>
<main id="primary" class="site-main page-room">
	<?php while ( have_posts() ) : the_post(); ?>
		<header class="page-hero shell">
			<p class="eyebrow"><?php esc_html_e( 'Balancing Diamonds', 'balancing-diamonds' ); ?></p>
			<h1><?php the_title(); ?></h1>
		</header>
		<div class="page-content shell shell--reading entry-content">
			<?php the_content(); ?>
			<?php
			wp_link_pages(
				array(
					'before' => '<nav class="page-links">' . esc_html__( 'Pages:', 'balancing-diamonds' ),
					'after'  => '</nav>',
				)
			);
			?>
		</div>
	<?php endwhile; ?>
</main>
<?php
get_footer();

