<?php
/**
 * Front page: the salon and hallway system.
 *
 * @package Balancing_Diamonds
 */

get_header();

$featured_query = new WP_Query(
	array(
		'post_type'           => 'post',
		'posts_per_page'      => 1,
		'post_status'         => 'publish',
		'ignore_sticky_posts' => false,
	)
);
?>

<main id="primary" class="site-main maison-home">
	<section class="salon-hero" aria-labelledby="salon-title">
		<div class="salon-hero__inner shell shell--wide">
			<div class="salon-hero__copy">
				<p class="eyebrow"><span><?php esc_html_e( 'A founder-led editorial and lifestyle house', 'balancing-diamonds' ); ?></span></p>
				<h1 id="salon-title"><?php esc_html_e( 'Every human being is as rare as a diamond.', 'balancing-diamonds' ); ?></h1>
				<p class="salon-hero__lede"><?php esc_html_e( 'A private library for moving from performance to self-authorship, and for building a life whose rooms belong to the same person.', 'balancing-diamonds' ); ?></p>
				<div class="button-row">
					<a class="button" href="<?php echo esc_url( balancing_diamonds_page_url( 'diamond-architecture' ) ); ?>"><?php esc_html_e( 'Begin with the Architecture', 'balancing-diamonds' ); ?> <span aria-hidden="true">&#8594;</span></a>
					<a class="text-link" href="<?php echo esc_url( balancing_diamonds_page_url( 'journal' ) ); ?>"><?php esc_html_e( 'Enter the library', 'balancing-diamonds' ); ?></a>
				</div>
			</div>

			<div class="salon-hero__emblem" aria-hidden="true">
				<div class="diamond-emblem">
					<span class="diamond-emblem__line diamond-emblem__line--one"></span>
					<span class="diamond-emblem__line diamond-emblem__line--two"></span>
					<span class="diamond-emblem__line diamond-emblem__line--three"></span>
					<span class="diamond-emblem__center"></span>
				</div>
				<p>Worth &middot; Voice &middot; Truth<br>Balance &middot; Dignity &middot; Authorship</p>
			</div>
		</div>
		<div class="salon-hero__folio shell shell--wide" aria-hidden="true">
			<span>Maison No. 01</span>
			<span>Los Angeles &middot; Santa Barbara</span>
		</div>
	</section>

	<section class="belief-band" aria-label="<?php esc_attr_e( 'Founding belief', 'balancing-diamonds' ); ?>">
		<div class="shell shell--wide belief-band__inner">
			<p class="kicker"><?php esc_html_e( 'The founding belief', 'balancing-diamonds' ); ?></p>
			<p><?php esc_html_e( 'You do not become valuable. You remember that you already are.', 'balancing-diamonds' ); ?></p>
		</div>
	</section>

	<section class="featured-work section-pad" aria-labelledby="featured-work-title">
		<div class="shell shell--wide">
			<div class="section-heading section-heading--split">
				<div>
					<p class="eyebrow"><?php esc_html_e( 'Selected from the journal', 'balancing-diamonds' ); ?></p>
					<h2 id="featured-work-title"><?php esc_html_e( 'The flagship work', 'balancing-diamonds' ); ?></h2>
				</div>
				<a class="text-link" href="<?php echo esc_url( balancing_diamonds_page_url( 'journal' ) ); ?>"><?php esc_html_e( 'View the complete archive', 'balancing-diamonds' ); ?></a>
			</div>

			<?php if ( $featured_query->have_posts() ) : ?>
				<?php while ( $featured_query->have_posts() ) : $featured_query->the_post(); ?>
					<article <?php post_class( 'feature-card' ); ?>>
						<a class="feature-card__media" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'bd-featured', array( 'loading' => 'eager' ) ); ?>
							<?php else : ?>
								<span class="feature-card__monogram">BD</span>
							<?php endif; ?>
						</a>
						<div class="feature-card__content">
							<p class="post-meta">
								<?php $categories = get_the_category(); ?>
								<?php if ( $categories ) : ?><span><?php echo esc_html( $categories[0]->name ); ?></span><?php endif; ?>
								<span><?php echo esc_html( balancing_diamonds_reading_time() ); ?></span>
							</p>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p><?php echo esc_html( balancing_diamonds_excerpt( get_the_ID(), 42 ) ); ?></p>
							<a class="text-link" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read the essay', 'balancing-diamonds' ); ?></a>
						</div>
					</article>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php else : ?>
				<article class="feature-card feature-card--placeholder">
					<div class="feature-card__media"><span class="feature-card__monogram">BD</span></div>
					<div class="feature-card__content">
						<p class="post-meta"><span><?php esc_html_e( 'Founding essay', 'balancing-diamonds' ); ?></span><span><?php esc_html_e( 'Volume I', 'balancing-diamonds' ); ?></span></p>
						<h3><?php esc_html_e( 'Every Human Being Is as Rare as a Diamond', 'balancing-diamonds' ); ?></h3>
						<p><?php esc_html_e( 'The origin of the idea, the meaning of the name, and the conviction that value precedes display, ranking, polish, and approval.', 'balancing-diamonds' ); ?></p>
						<a class="text-link" href="<?php echo esc_url( balancing_diamonds_page_url( 'philosophy' ) ); ?>"><?php esc_html_e( 'Read the philosophy', 'balancing-diamonds' ); ?></a>
					</div>
				</article>
			<?php endif; ?>
		</div>
	</section>

	<section class="axis-section section-pad" aria-labelledby="axis-title">
		<div class="shell shell--wide axis-section__layout">
			<div class="axis-section__intro">
				<p class="eyebrow"><?php esc_html_e( 'The inner transformation', 'balancing-diamonds' ); ?></p>
				<h2 id="axis-title"><?php esc_html_e( 'The Diamond Axis', 'balancing-diamonds' ); ?></h2>
				<p><?php esc_html_e( 'A movement from performance to self-authorship. Six acts of return, each beginning at the center: inherent worth.', 'balancing-diamonds' ); ?></p>
				<a class="button button--outline" href="<?php echo esc_url( balancing_diamonds_page_url( 'diamond-architecture' ) ); ?>"><?php esc_html_e( 'Explore the complete system', 'balancing-diamonds' ); ?></a>
			</div>
			<ol class="axis-list">
				<li><span>01</span><div><strong><?php esc_html_e( 'Worth', 'balancing-diamonds' ); ?></strong><p><?php esc_html_e( 'Remember what is already true.', 'balancing-diamonds' ); ?></p></div></li>
				<li><span>02</span><div><strong><?php esc_html_e( 'Voice', 'balancing-diamonds' ); ?></strong><p><?php esc_html_e( 'Reclaim what performance silenced.', 'balancing-diamonds' ); ?></p></div></li>
				<li><span>03</span><div><strong><?php esc_html_e( 'Truth', 'balancing-diamonds' ); ?></strong><p><?php esc_html_e( 'Identify what is authentic.', 'balancing-diamonds' ); ?></p></div></li>
				<li><span>04</span><div><strong><?php esc_html_e( 'Balance', 'balancing-diamonds' ); ?></strong><p><?php esc_html_e( 'Return to center under pressure.', 'balancing-diamonds' ); ?></p></div></li>
				<li><span>05</span><div><strong><?php esc_html_e( 'Dignity', 'balancing-diamonds' ); ?></strong><p><?php esc_html_e( 'Choose from self-respect.', 'balancing-diamonds' ); ?></p></div></li>
				<li><span>06</span><div><strong><?php esc_html_e( 'Authorship', 'balancing-diamonds' ); ?></strong><p><?php esc_html_e( 'Build the life that reflects you.', 'balancing-diamonds' ); ?></p></div></li>
			</ol>
		</div>
	</section>

	<section class="rooms-section section-pad" aria-labelledby="rooms-title">
		<div class="shell shell--wide">
			<div class="section-heading">
				<p class="eyebrow"><?php esc_html_e( 'The outer application', 'balancing-diamonds' ); ?></p>
				<h2 id="rooms-title"><?php esc_html_e( 'Enter the Four Rooms', 'balancing-diamonds' ); ?></h2>
				<p><?php esc_html_e( 'The places where self-authorship becomes visible.', 'balancing-diamonds' ); ?></p>
			</div>
			<div class="room-grid">
				<?php
				$rooms = array(
					'Self'  => __( 'Identity, embodiment, emotional sovereignty, and becoming.', 'balancing-diamonds' ),
					'House' => __( 'Home, ritual, beauty, hospitality, and private atmosphere.', 'balancing-diamonds' ),
					'Work'  => __( 'Vocation, ambition, money, leadership, and contribution.', 'balancing-diamonds' ),
					'World' => __( 'Culture, relationships, travel, public presence, and belonging.', 'balancing-diamonds' ),
				);
				$i = 1;
				foreach ( $rooms as $room => $description ) :
					$term = get_term_by( 'name', $room, 'category' );
					$url  = $term ? get_term_link( $term ) : balancing_diamonds_page_url( 'journal' );
					?>
					<a class="room-card room-card--<?php echo esc_attr( strtolower( $room ) ); ?>" href="<?php echo esc_url( $url ); ?>">
						<span class="room-card__number">0<?php echo esc_html( $i ); ?></span>
						<h3><?php echo esc_html( $room ); ?></h3>
						<p><?php echo esc_html( $description ); ?></p>
						<span class="room-card__arrow" aria-hidden="true">&#8594;</span>
					</a>
					<?php
					$i++;
				endforeach;
				?>
			</div>
		</div>
	</section>

	<section class="journal-section section-pad" aria-labelledby="latest-journal-title">
		<div class="shell shell--wide">
			<div class="section-heading section-heading--split">
				<div>
					<p class="eyebrow"><?php esc_html_e( 'Recent works', 'balancing-diamonds' ); ?></p>
					<h2 id="latest-journal-title"><?php esc_html_e( 'From the journal', 'balancing-diamonds' ); ?></h2>
				</div>
				<a class="text-link" href="<?php echo esc_url( balancing_diamonds_page_url( 'journal' ) ); ?>"><?php esc_html_e( 'Enter the complete archive', 'balancing-diamonds' ); ?></a>
			</div>
			<div class="post-grid">
				<?php
				$recent_query = new WP_Query(
					array(
						'post_type'      => 'post',
						'post_status'    => 'publish',
						'posts_per_page' => 3,
					)
				);
				if ( $recent_query->have_posts() ) :
					while ( $recent_query->have_posts() ) :
						$recent_query->the_post();
						get_template_part( 'template-parts/card', 'post' );
					endwhile;
					wp_reset_postdata();
				else :
					get_template_part( 'template-parts/card', 'empty' );
				endif;
				?>
			</div>
		</div>
	</section>

	<section class="letters-section section-pad" aria-labelledby="letters-title">
		<div class="shell letters-section__inner">
			<p class="eyebrow"><?php esc_html_e( 'Private correspondence', 'balancing-diamonds' ); ?></p>
			<h2 id="letters-title"><?php esc_html_e( 'Letters from the Axis', 'balancing-diamonds' ); ?></h2>
			<p><?php esc_html_e( 'Considered observations on worth, voice, truth, balance, dignity, and the architecture of a life that increasingly belongs to you.', 'balancing-diamonds' ); ?></p>
			<?php balancing_diamonds_newsletter_form(); ?>
			<small><?php esc_html_e( 'Written with intention. Sent with restraint.', 'balancing-diamonds' ); ?></small>
		</div>
	</section>

	<section class="founder-section section-pad" aria-labelledby="founder-title">
		<div class="shell shell--wide founder-section__layout">
			<div class="founder-section__label">
				<p class="eyebrow"><?php esc_html_e( 'The founding intelligence', 'balancing-diamonds' ); ?></p>
				<p class="founder-monogram" aria-hidden="true">DG</p>
			</div>
			<div class="founder-section__copy">
				<h2 id="founder-title"><?php echo esc_html( get_theme_mod( 'bd_founder_name', 'Derek Green' ) ); ?></h2>
				<p><?php esc_html_e( 'Balancing Diamonds began with a meditation in Santa Barbara and one clear idea: every human being is as rare as a diamond. Derek Green founded the house to turn that conviction into an enduring archive, a practical philosophy, and a disciplined cultural institution.', 'balancing-diamonds' ); ?></p>
				<a class="text-link" href="<?php echo esc_url( balancing_diamonds_page_url( 'founder' ) ); ?>"><?php esc_html_e( 'Read the founder story', 'balancing-diamonds' ); ?></a>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();

