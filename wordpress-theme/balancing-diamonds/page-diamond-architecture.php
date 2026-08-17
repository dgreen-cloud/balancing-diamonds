<?php
/**
 * The Diamond Architecture page.
 *
 * @package Balancing_Diamonds
 */

get_header();
?>
<main id="primary" class="site-main architecture-page">
	<header class="architecture-hero">
		<div class="shell architecture-hero__inner">
			<p class="eyebrow"><?php esc_html_e( 'The intellectual architecture', 'balancing-diamonds' ); ?></p>
			<h1><?php esc_html_e( 'A life whose rooms belong to the same person.', 'balancing-diamonds' ); ?></h1>
			<p><?php esc_html_e( 'The Diamond Architecture is a literary and practical operating system for translating inherent worth into a coherent life.', 'balancing-diamonds' ); ?></p>
		</div>
	</header>

	<section class="architecture-center section-pad" aria-labelledby="center-title">
		<div class="shell shell--wide architecture-center__layout">
			<div class="architecture-gem" aria-hidden="true"><span>Center</span></div>
			<div>
				<p class="eyebrow"><?php esc_html_e( 'The Center', 'balancing-diamonds' ); ?></p>
				<h2 id="center-title"><?php esc_html_e( 'Inherent Worth', 'balancing-diamonds' ); ?></h2>
				<p class="large-copy"><?php esc_html_e( 'The center is what does not need to be earned. Every other part of the system begins here.', 'balancing-diamonds' ); ?></p>
				<blockquote><?php esc_html_e( 'Where have I been acting as though my value is conditional?', 'balancing-diamonds' ); ?></blockquote>
			</div>
		</div>
	</section>

	<section class="architecture-axis section-pad" aria-labelledby="architecture-axis-title">
		<div class="shell shell--wide">
			<div class="section-heading">
				<p class="eyebrow"><?php esc_html_e( 'The inner transformation', 'balancing-diamonds' ); ?></p>
				<h2 id="architecture-axis-title"><?php esc_html_e( 'The Diamond Axis', 'balancing-diamonds' ); ?></h2>
				<p><?php esc_html_e( 'Six movements from performance to self-authorship.', 'balancing-diamonds' ); ?></p>
			</div>
			<div class="architecture-steps">
				<?php
				$steps = array(
					array( 'Worth', 'Remember what is already true.', 'Where have I been acting as though my value is conditional?' ),
					array( 'Voice', 'Reclaim what performance silenced.', 'What have I stopped saying, asking for, naming, or admitting?' ),
					array( 'Truth', 'Identify what is authentic.', 'What is true, even if it disrupts the script?' ),
					array( 'Balance', 'Return to center under pressure.', 'What pulls me off-axis, and what brings me back?' ),
					array( 'Dignity', 'Choose from self-respect.', 'What would dignity require here?' ),
					array( 'Authorship', 'Build the life that reflects you.', 'What am I choosing to write now?' ),
				);
				foreach ( $steps as $index => $step ) :
					?>
					<article class="architecture-step">
						<span class="architecture-step__number">0<?php echo esc_html( $index + 1 ); ?></span>
						<h3><?php echo esc_html( $step[0] ); ?></h3>
						<p class="architecture-step__command"><?php echo esc_html( $step[1] ); ?></p>
						<p class="architecture-step__question"><?php echo esc_html( $step[2] ); ?></p>
					</article>
					<?php
				endforeach;
				?>
			</div>
		</div>
	</section>

	<section class="architecture-rooms section-pad" aria-labelledby="architecture-rooms-title">
		<div class="shell shell--wide">
			<div class="section-heading section-heading--light">
				<p class="eyebrow"><?php esc_html_e( 'The outer application', 'balancing-diamonds' ); ?></p>
				<h2 id="architecture-rooms-title"><?php esc_html_e( 'The Four Rooms', 'balancing-diamonds' ); ?></h2>
				<p><?php esc_html_e( 'The places where self-authorship becomes visible.', 'balancing-diamonds' ); ?></p>
			</div>
			<div class="architecture-room-grid">
				<article><span>01</span><h3><?php esc_html_e( 'Self', 'balancing-diamonds' ); ?></h3><p><?php esc_html_e( 'Identity, embodiment, emotional sovereignty, self-image, becoming, and personal mythology.', 'balancing-diamonds' ); ?></p></article>
				<article><span>02</span><h3><?php esc_html_e( 'House', 'balancing-diamonds' ); ?></h3><p><?php esc_html_e( 'Home, ritual, beauty, style, domestic order, hospitality, and private atmosphere.', 'balancing-diamonds' ); ?></p></article>
				<article><span>03</span><h3><?php esc_html_e( 'Work', 'balancing-diamonds' ); ?></h3><p><?php esc_html_e( 'Vocation, ambition, craft, money, leadership, power, contribution, and influence.', 'balancing-diamonds' ); ?></p></article>
				<article><span>04</span><h3><?php esc_html_e( 'World', 'balancing-diamonds' ); ?></h3><p><?php esc_html_e( 'Culture, relationships, travel, place, public image, social conduct, and belonging.', 'balancing-diamonds' ); ?></p></article>
			</div>
		</div>
	</section>

	<section class="disciplines-section section-pad" aria-labelledby="disciplines-title">
		<div class="shell shell--wide">
			<div class="section-heading">
				<p class="eyebrow"><?php esc_html_e( 'The standard of construction', 'balancing-diamonds' ); ?></p>
				<h2 id="disciplines-title"><?php esc_html_e( 'Beauty. Discipline. Grace.', 'balancing-diamonds' ); ?></h2>
			</div>
			<div class="disciplines-grid">
				<article><h3><?php esc_html_e( 'Beauty', 'balancing-diamonds' ); ?></h3><p><?php esc_html_e( 'Coherence, proportion, sensory intelligence, and care.', 'balancing-diamonds' ); ?></p></article>
				<article><h3><?php esc_html_e( 'Discipline', 'balancing-diamonds' ); ?></h3><p><?php esc_html_e( 'Boundaries, practice, structure, maintenance, and execution.', 'balancing-diamonds' ); ?></p></article>
				<article><h3><?php esc_html_e( 'Grace', 'balancing-diamonds' ); ?></h3><p><?php esc_html_e( 'Humanity, mercy, softness, hospitality, and elegance in motion.', 'balancing-diamonds' ); ?></p></article>
			</div>
			<div class="architecture-cta">
				<p><?php esc_html_e( 'Remember your worth. Reclaim your voice. Author the rooms of your life.', 'balancing-diamonds' ); ?></p>
				<a class="button" href="<?php echo esc_url( balancing_diamonds_page_url( 'letters' ) ); ?>"><?php esc_html_e( 'Receive Letters from the Axis', 'balancing-diamonds' ); ?></a>
			</div>
		</div>
	</section>

	<?php while ( have_posts() ) : the_post(); ?>
		<?php if ( trim( get_the_content() ) ) : ?>
			<div class="page-content shell shell--reading entry-content architecture-page__editable">
				<?php the_content(); ?>
			</div>
		<?php endif; ?>
	<?php endwhile; ?>
</main>
<?php
get_footer();

