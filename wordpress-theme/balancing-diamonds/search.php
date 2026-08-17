<?php
/**
 * Search results.
 *
 * @package Balancing_Diamonds
 */

get_header();
?>
<main id="primary" class="site-main journal-archive">
	<header class="archive-hero archive-hero--compact"><div class="shell shell--wide archive-hero__inner"><div><p class="eyebrow"><?php esc_html_e( 'Search the library', 'balancing-diamonds' ); ?></p><h1><?php printf( esc_html__( 'Results for “%s”', 'balancing-diamonds' ), esc_html( get_search_query() ) ); ?></h1></div><?php get_search_form(); ?></div></header>
	<section class="archive-content section-pad"><div class="shell shell--wide">
		<?php if ( have_posts() ) : ?><div class="post-grid post-grid--archive"><?php while ( have_posts() ) : the_post(); get_template_part( 'template-parts/card', 'post' ); endwhile; ?></div><?php the_posts_pagination(); ?><?php else : get_template_part( 'template-parts/content', 'none' ); endif; ?>
	</div></section>
</main>
<?php get_footer(); ?>

