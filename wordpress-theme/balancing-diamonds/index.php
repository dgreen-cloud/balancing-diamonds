<?php
/**
 * Required fallback template.
 *
 * @package Balancing_Diamonds
 */

get_header();
?>
<main id="primary" class="site-main journal-archive">
	<header class="archive-hero archive-hero--compact"><div class="shell shell--wide archive-hero__inner"><div><p class="eyebrow"><?php esc_html_e( 'The library', 'balancing-diamonds' ); ?></p><h1><?php bloginfo( 'name' ); ?></h1></div><p><?php bloginfo( 'description' ); ?></p></div></header>
	<section class="archive-content section-pad"><div class="shell shell--wide">
		<?php if ( have_posts() ) : ?><div class="post-grid post-grid--archive"><?php while ( have_posts() ) : the_post(); get_template_part( 'template-parts/card', 'post' ); endwhile; ?></div><?php the_posts_pagination(); ?><?php else : get_template_part( 'template-parts/content', 'none' ); endif; ?>
	</div></section>
</main>
<?php get_footer(); ?>

