<?php
/**
 * Taxonomy and date archives.
 *
 * @package Balancing_Diamonds
 */

get_header();
?>
<main id="primary" class="site-main journal-archive">
	<header class="archive-hero archive-hero--compact">
		<div class="shell shell--wide archive-hero__inner">
			<div><p class="eyebrow"><?php esc_html_e( 'A collection from the library', 'balancing-diamonds' ); ?></p><h1><?php the_archive_title(); ?></h1></div>
			<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
		</div>
	</header>
	<section class="archive-content section-pad">
		<div class="shell shell--wide">
			<?php if ( have_posts() ) : ?>
				<div class="post-grid post-grid--archive">
					<?php while ( have_posts() ) : the_post(); get_template_part( 'template-parts/card', 'post' ); endwhile; ?>
				</div>
				<?php the_posts_pagination( array( 'mid_size' => 1 ) ); ?>
			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			<?php endif; ?>
		</div>
	</section>
</main>
<?php get_footer(); ?>

