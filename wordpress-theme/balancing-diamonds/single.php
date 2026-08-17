<?php
/**
 * Single essay reading room.
 *
 * @package Balancing_Diamonds
 */

get_header();
?>
<main id="primary" class="site-main essay-page">
	<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'essay' ); ?>>
			<header class="essay-header shell shell--reading">
				<p class="essay-kicker">
					<?php $categories = get_the_category(); ?>
					<?php if ( $categories ) : ?><a href="<?php echo esc_url( get_category_link( $categories[0] ) ); ?>"><?php echo esc_html( $categories[0]->name ); ?></a><?php endif; ?>
					<span><?php esc_html_e( 'Essay', 'balancing-diamonds' ); ?></span>
				</p>
				<h1><?php the_title(); ?></h1>
				<?php if ( has_excerpt() ) : ?><p class="essay-deck"><?php echo esc_html( get_the_excerpt() ); ?></p><?php endif; ?>
				<div class="essay-byline">
					<span><?php echo esc_html( get_theme_mod( 'bd_founder_name', get_the_author() ) ); ?></span>
					<span><?php echo esc_html( get_the_date() ); ?></span>
					<span><?php echo esc_html( balancing_diamonds_reading_time() ); ?></span>
				</div>
			</header>

			<?php if ( has_post_thumbnail() ) : ?>
				<figure class="essay-featured shell shell--wide">
					<?php the_post_thumbnail( 'bd-featured' ); ?>
					<?php if ( wp_get_attachment_caption( get_post_thumbnail_id() ) ) : ?><figcaption><?php echo esc_html( wp_get_attachment_caption( get_post_thumbnail_id() ) ); ?></figcaption><?php endif; ?>
				</figure>
			<?php endif; ?>

			<div class="essay-content shell shell--reading entry-content">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<nav class="page-links">' . esc_html__( 'Pages:', 'balancing-diamonds' ), 'after' => '</nav>' ) ); ?>
			</div>

			<footer class="essay-footer shell shell--reading">
				<?php $tags = get_the_tags(); ?>
				<?php if ( $tags ) : ?>
					<div class="essay-tags"><span><?php esc_html_e( 'Along the axis', 'balancing-diamonds' ); ?></span><?php the_tags( '', '', '' ); ?></div>
				<?php endif; ?>
				<div class="essay-author-note">
					<span class="founder-monogram founder-monogram--small" aria-hidden="true">DG</span>
					<div>
						<p class="eyebrow"><?php esc_html_e( 'Written by the founder', 'balancing-diamonds' ); ?></p>
						<h2><?php echo esc_html( get_theme_mod( 'bd_founder_name', get_the_author() ) ); ?></h2>
						<p><?php esc_html_e( 'Founder of Balancing Diamonds and Bodhi Oak. Writing on dignity, self-authorship, beauty, discipline, and the architecture of a coherent life.', 'balancing-diamonds' ); ?></p>
					</div>
				</div>
			</footer>
		</article>

		<nav class="essay-navigation shell shell--wide" aria-label="<?php esc_attr_e( 'Adjacent essays', 'balancing-diamonds' ); ?>">
			<div><?php previous_post_link( '<span>' . esc_html__( 'Previous work', 'balancing-diamonds' ) . '</span>%link' ); ?></div>
			<div><?php next_post_link( '<span>' . esc_html__( 'Next work', 'balancing-diamonds' ) . '</span>%link' ); ?></div>
		</nav>

		<section class="letters-section letters-section--essay section-pad" aria-labelledby="essay-letters-title">
			<div class="shell letters-section__inner">
				<p class="eyebrow"><?php esc_html_e( 'Continue the correspondence', 'balancing-diamonds' ); ?></p>
				<h2 id="essay-letters-title"><?php esc_html_e( 'Letters from the Axis', 'balancing-diamonds' ); ?></h2>
				<p><?php esc_html_e( 'Receive new essays, private letters, and considered invitations from the house.', 'balancing-diamonds' ); ?></p>
				<?php balancing_diamonds_newsletter_form(); ?>
			</div>
		</section>
	<?php endwhile; ?>
</main>
<?php
get_footer();

