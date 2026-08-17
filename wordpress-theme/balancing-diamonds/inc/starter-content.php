<?php
/**
 * One-click starter content for the Balancing Diamonds maison.
 *
 * The importer is deliberately opt-in. It creates only missing pages, terms,
 * navigation, and draft essays, so activating the theme never overwrites a site.
 *
 * @package Balancing_Diamonds
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Show a short onboarding notice after activation.
 */
function balancing_diamonds_activation_notice() {
	if ( ! current_user_can( 'manage_options' ) || get_option( 'bd_starter_content_installed' ) ) {
		return;
	}

	$url = admin_url( 'themes.php?page=balancing-diamonds-setup' );
	printf(
		'<div class="notice notice-info is-dismissible"><p><strong>%1$s</strong> %2$s <a class="button button-primary" href="%3$s">%4$s</a></p></div>',
		esc_html__( 'Balancing Diamonds is ready.', 'balancing-diamonds' ),
		esc_html__( 'Build the core pages, editorial taxonomy, menus, and five canonical essay drafts.', 'balancing-diamonds' ),
		esc_url( $url ),
		esc_html__( 'Open Maison Setup', 'balancing-diamonds' )
	);
}
add_action( 'admin_notices', 'balancing_diamonds_activation_notice' );

/**
 * Register the onboarding page under Appearance.
 */
function balancing_diamonds_setup_page() {
	add_theme_page(
		__( 'Balancing Diamonds Setup', 'balancing-diamonds' ),
		__( 'Maison Setup', 'balancing-diamonds' ),
		'manage_options',
		'balancing-diamonds-setup',
		'balancing_diamonds_render_setup_page'
	);
}
add_action( 'admin_menu', 'balancing_diamonds_setup_page' );

/**
 * Render the setup screen.
 */
function balancing_diamonds_render_setup_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$installed = (bool) get_option( 'bd_starter_content_installed' );
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Balancing Diamonds Maison Setup', 'balancing-diamonds' ); ?></h1>
		<p><?php esc_html_e( 'This optional installer creates the site architecture from the Unified Master Blueprint without replacing anything already on your site.', 'balancing-diamonds' ); ?></p>
		<ul>
			<li><?php esc_html_e( 'Core pages: Home, Philosophy, Founder, Diamond Architecture, Journal, Letters, Editions, and Collaborate', 'balancing-diamonds' ); ?></li>
			<li><?php esc_html_e( 'Four Rooms categories: Self, House, Work, and World', 'balancing-diamonds' ); ?></li>
			<li><?php esc_html_e( 'Diamond Axis tags: Worth, Voice, Truth, Balance, Dignity, and Authorship', 'balancing-diamonds' ); ?></li>
			<li><?php esc_html_e( 'Five canonical essays saved as drafts for editorial review', 'balancing-diamonds' ); ?></li>
			<li><?php esc_html_e( 'Primary and footer navigation menus', 'balancing-diamonds' ); ?></li>
		</ul>
		<?php if ( $installed ) : ?>
			<div class="notice notice-success inline"><p><?php esc_html_e( 'The Maison starter content has been installed. Existing content was preserved.', 'balancing-diamonds' ); ?></p></div>
		<?php else : ?>
			<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
				<input type="hidden" name="action" value="bd_install_starter_content">
				<?php wp_nonce_field( 'bd_install_starter_content' ); ?>
				<?php submit_button( __( 'Build the Maison', 'balancing-diamonds' ), 'primary large' ); ?>
			</form>
		<?php endif; ?>
	</div>
	<?php
}

/**
 * Create or retrieve a page by slug.
 *
 * @param string $title   Page title.
 * @param string $slug    Page slug.
 * @param string $content Initial page content.
 * @return int Page ID.
 */
function balancing_diamonds_create_page( $title, $slug, $content = '' ) {
	$existing = get_page_by_path( $slug );
	if ( $existing ) {
		return (int) $existing->ID;
	}

	return (int) wp_insert_post(
		array(
			'post_title'   => $title,
			'post_name'    => $slug,
			'post_content' => $content,
			'post_status'  => 'publish',
			'post_type'    => 'page',
		)
	);
}

/**
 * Process the opt-in starter content install.
 */
function balancing_diamonds_install_starter_content() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( esc_html__( 'You do not have permission to configure this site.', 'balancing-diamonds' ) );
	}

	check_admin_referer( 'bd_install_starter_content' );

	$pages = array(
		'home' => array(
			'title'   => 'Home',
			'content' => '',
		),
		'philosophy' => array(
			'title'   => 'Philosophy',
			'content' => '<!-- wp:paragraph {"className":"bd-lede"} --><p class="bd-lede">Balancing Diamonds is a founder-led editorial and lifestyle house devoted to the movement from performance to self-authorship.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Human worth is inherent.</h2><!-- /wp:heading --><!-- wp:paragraph --><p>A person should not have to perform for worth. The outer life should increasingly reflect the truth of the inner one through voice, standards, choices, spaces, work, relationships, and daily practice.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Dignity before performance.</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Balancing Diamonds does not reject ambition, beauty, refinement, status, or pleasure. It insists that they be governed by the person rather than used to govern the person.</p><!-- /wp:paragraph --><!-- wp:quote --><blockquote class="wp-block-quote"><p>You do not have to perform your way into being worthy.</p></blockquote><!-- /wp:quote -->',
		),
		'founder' => array(
			'title'   => 'Founder',
			'content' => '<!-- wp:paragraph {"className":"bd-lede"} --><p class="bd-lede">Balancing Diamonds began in Santa Barbara during Derek Green\'s college years, in a period of distance, stillness, and deeper questions about identity, meaning, and human value.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>During a meditation alone in his room, one idea arrived with unusual clarity: every human being is as rare as a diamond. No two diamonds carry the same cut, pressure, clarity, flaws, brilliance, or history. People are equally irreducible. Yet a diamond is not easy to balance on its axis, and neither is a human life.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>The founding intelligence</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Derek\'s authority comes from lived reinvention, administrative leadership, luxury hospitality, private-estate operations, creative direction, aesthetic judgment, cultural observation, and the discipline of turning ideas into systems.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>He establishes the worldview. The archive, frameworks, products, and experiences turn that worldview into an institution.</p><!-- /wp:paragraph -->',
		),
		'diamond-architecture' => array(
			'title'   => 'The Diamond Architecture',
			'content' => '',
		),
		'journal' => array(
			'title'   => 'Journal',
			'content' => '',
		),
		'letters' => array(
			'title'   => 'Letters from the Axis',
			'content' => '<!-- wp:paragraph {"className":"bd-lede"} --><p class="bd-lede">An intimate correspondence on worth, voice, truth, balance, dignity, and the practice of authoring a coherent life.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>Letters from the Axis is a direct reader relationship, not a promotional funnel disguised as intimacy. Expect considered observations, reading-room notes, and invitations to return to center.</p><!-- /wp:paragraph -->',
		),
		'editions' => array(
			'title'   => 'Editions',
			'content' => '<!-- wp:paragraph {"className":"bd-lede"} --><p class="bd-lede">Tools of remembrance, return, authorship, and coherent living.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>The first edition</h2><!-- /wp:heading --><!-- wp:paragraph --><p>The Diamond Architecture Starter Guide is being prepared as the first entry into the house: a practical introduction to the Center, the Axis, the Four Rooms, and the disciplines of Beauty, Discipline, and Grace.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>Future editions will include journals, guided volumes, collected essays, and objects chosen for their ability to deepen attention rather than merely occupy space.</p><!-- /wp:paragraph -->',
		),
		'collaborate' => array(
			'title'   => 'Collaborate',
			'content' => '<!-- wp:paragraph {"className":"bd-lede"} --><p class="bd-lede">Balancing Diamonds welcomes thoughtful editorial commissions, cultural partnerships, hospitality collaborations, private salons, and work that deepens the architecture of a self-authored life.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>Share the nature of the invitation, intended audience, timing, and why the collaboration belongs inside this house.</p><!-- /wp:paragraph -->',
		),
	);

	$page_ids = array();
	foreach ( $pages as $slug => $data ) {
		$page_ids[ $slug ] = balancing_diamonds_create_page( $data['title'], $slug, $data['content'] );
	}

	foreach ( array( 'Self', 'House', 'Work', 'World' ) as $category_name ) {
		if ( ! term_exists( $category_name, 'category' ) ) {
			wp_insert_term( $category_name, 'category' );
		}
	}

	foreach ( array( 'Worth', 'Voice', 'Truth', 'Balance', 'Dignity', 'Authorship' ) as $tag_name ) {
		if ( ! term_exists( $tag_name, 'post_tag' ) ) {
			wp_insert_term( $tag_name, 'post_tag' );
		}
	}

	$essay_titles = array(
		'Every Human Being Is as Rare as a Diamond',
		'You Do Not Have to Perform Your Way Into Being Worthy',
		'What Is the Diamond Axis?',
		'Balance Is Alignment Under Pressure',
		'A Life Does Not Become Yours by Accident',
	);
	foreach ( $essay_titles as $essay_title ) {
		$existing_essays = get_posts(
			array(
				'post_type'      => 'post',
				'post_status'    => 'any',
				'title'          => $essay_title,
				'posts_per_page' => 1,
				'fields'         => 'ids',
			)
		);
		if ( empty( $existing_essays ) ) {
			wp_insert_post(
				array(
					'post_title'   => $essay_title,
					'post_content' => '<!-- wp:paragraph --><p>Editorial draft. Develop this canonical essay in Ulysses, then publish or update it directly to WordPress.</p><!-- /wp:paragraph -->',
					'post_status'  => 'draft',
					'post_type'    => 'post',
				)
			);
		}
	}

	$menu_name = 'The Maison';
	$menu      = wp_get_nav_menu_object( $menu_name );
	$menu_id   = $menu ? (int) $menu->term_id : (int) wp_create_nav_menu( $menu_name );
	$menu_items = wp_get_nav_menu_items( $menu_id );
	if ( empty( $menu_items ) ) {
		foreach ( array( 'philosophy', 'diamond-architecture', 'journal', 'letters', 'editions', 'founder' ) as $slug ) {
			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-object-id' => $page_ids[ $slug ],
					'menu-item-object'    => 'page',
					'menu-item-type'      => 'post_type',
					'menu-item-status'    => 'publish',
				)
			);
		}
	}

	$footer_menu_name  = 'The Colophon';
	$footer_menu       = wp_get_nav_menu_object( $footer_menu_name );
	$footer_menu_id    = $footer_menu ? (int) $footer_menu->term_id : (int) wp_create_nav_menu( $footer_menu_name );
	$footer_menu_items = wp_get_nav_menu_items( $footer_menu_id );
	if ( empty( $footer_menu_items ) ) {
		foreach ( array( 'philosophy', 'founder', 'editions', 'collaborate' ) as $slug ) {
			wp_update_nav_menu_item(
				$footer_menu_id,
				0,
				array(
					'menu-item-object-id' => $page_ids[ $slug ],
					'menu-item-object'    => 'page',
					'menu-item-type'      => 'post_type',
					'menu-item-status'    => 'publish',
				)
			);
		}
	}

	$locations            = get_theme_mod( 'nav_menu_locations', array() );
	$locations['primary'] = $menu_id;
	$locations['footer']  = $footer_menu_id;
	set_theme_mod( 'nav_menu_locations', $locations );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $page_ids['home'] );
	update_option( 'page_for_posts', $page_ids['journal'] );
	update_option( 'permalink_structure', '/%postname%/' );
	update_option( 'bd_starter_content_installed', current_time( 'mysql' ) );
	flush_rewrite_rules();

	wp_safe_redirect( admin_url( 'themes.php?page=balancing-diamonds-setup&installed=1' ) );
	exit;
}
add_action( 'admin_post_bd_install_starter_content', 'balancing_diamonds_install_starter_content' );
