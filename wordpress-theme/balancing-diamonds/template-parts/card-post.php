<?php
/**
 * Journal card.
 *
 * @package Balancing_Diamonds
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
	<a class="post-card__media" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'bd-card' ); ?>
		<?php else : ?>
			<span class="post-card__facet"></span>
		<?php endif; ?>
	</a>
	<div class="post-card__content">
		<p class="post-meta">
			<?php $categories = get_the_category(); ?>
			<?php if ( $categories ) : ?><span><?php echo esc_html( $categories[0]->name ); ?></span><?php endif; ?>
			<span><?php echo esc_html( balancing_diamonds_reading_time() ); ?></span>
		</p>
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<p><?php echo esc_html( balancing_diamonds_excerpt( get_the_ID(), 26 ) ); ?></p>
		<a class="text-link" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read the essay', 'balancing-diamonds' ); ?></a>
	</div>
</article>

