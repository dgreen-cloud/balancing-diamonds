<?php
/**
 * Editorial placeholders shown before the first published works arrive.
 *
 * @package Balancing_Diamonds
 */

$placeholders = array(
	array( 'Self', 'You Do Not Have to Perform Your Way Into Being Worthy', 'A distinction between inherent worth and the exhausting rituals used to secure approval.' ),
	array( 'Inner Order', 'Balance Is Alignment Under Pressure', 'Balance is not perfect equilibrium. It is the practiced capacity to return to center.' ),
	array( 'Authorship', 'A Life Does Not Become Yours by Accident', 'A coherent life is consciously constructed through standards, choices, spaces, and conduct.' ),
);

foreach ( $placeholders as $index => $placeholder ) :
	?>
	<article class="post-card post-card--placeholder">
		<div class="post-card__media"><span class="post-card__facet post-card__facet--<?php echo esc_attr( $index + 1 ); ?>"></span></div>
		<div class="post-card__content">
			<p class="post-meta"><span><?php echo esc_html( $placeholder[0] ); ?></span><span><?php esc_html_e( 'Canonical essay', 'balancing-diamonds' ); ?></span></p>
			<h3><?php echo esc_html( $placeholder[1] ); ?></h3>
			<p><?php echo esc_html( $placeholder[2] ); ?></p>
			<span class="text-link text-link--muted"><?php esc_html_e( 'In the reading room', 'balancing-diamonds' ); ?></span>
		</div>
	</article>
	<?php
endforeach;

