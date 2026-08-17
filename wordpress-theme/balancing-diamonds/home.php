<?php
/**
 * Journal archive.
 *
 * @package Balancing_Diamonds
 */

get_header();

$rooms = array( 'Self', 'House', 'Work', 'World' );
$axis  = array( 'Worth', 'Voice', 'Truth', 'Balance', 'Dignity', 'Authorship' );
?>
<main id="primary" class="site-main journal-archive">
	<header class="archive-hero">
		<div class="shell shell--wide archive-hero__inner">
			<div>
				<p class="eyebrow"><?php esc_html_e( 'The permanent archive', 'balancing-diamonds' ); ?></p>
				<h1><?php esc_html_e( 'The Journal', 'balancing-diamonds' ); ?></h1>
			</div>
			<p><?php esc_html_e( 'Serious, intimate work on the construction of a self-authored life. Organized as a library, not a content feed.', 'balancing-diamonds' ); ?></p>
		</div>
	</header>

	<nav class="archive-index" aria-label="<?php esc_attr_e( 'Journal collections', 'balancing-diamonds' ); ?>">
		<div class="shell shell--wide archive-index__inner">
			<div class="archive-index__group">
				<span><?php esc_html_e( 'By room', 'balancing-diamonds' ); ?></span>
				<?php foreach ( $rooms as $room ) : ?>
					<?php $term = get_term_by( 'name', $room, 'category' ); ?>
					<?php if ( $term ) : ?><a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo esc_html( $room ); ?></a><?php endif; ?>
				<?php endforeach; ?>
			</div>
			<div class="archive-index__group">
				<span><?php esc_html_e( 'By axis', 'balancing-diamonds' ); ?></span>
				<?php foreach ( $axis as $axis_term ) : ?>
					<?php $term = get_term_by( 'name', $axis_term, 'post_tag' ); ?>
					<?php if ( $term ) : ?><a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo esc_html( $axis_term ); ?></a><?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
	</nav>

	<section class="archive-content section-pad">
		<div class="shell shell--wide">
			<?php if ( have_posts() ) : ?>
				<div class="post-grid post-grid--archive">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'template-parts/card', 'post' ); ?>
					<?php endwhile; ?>
				</div>
				<?php the_posts_pagination( array( 'mid_size' => 1, 'prev_text' => __( 'Previous room', 'balancing-diamonds' ), 'next_text' => __( 'Next room', 'balancing-diamonds' ) ) ); ?>
			<?php else : ?>
				<div class="post-grid"><?php get_template_part( 'template-parts/card', 'empty' ); ?></div>
			<?php endif; ?>
		</div>
	</section>
</main>
<?php
get_footer();

