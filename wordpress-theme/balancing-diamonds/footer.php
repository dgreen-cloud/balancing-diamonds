<?php
/**
 * Site footer.
 *
 * @package Balancing_Diamonds
 */
?>
	<footer class="site-footer">
		<div class="site-footer__inner shell shell--wide">
			<div class="site-footer__statement">
				<a class="footer-mark" href="<?php echo esc_url( home_url( '/' ) ); ?>">Balancing Diamonds</a>
				<p><?php esc_html_e( 'Equal in worth. Rare in composition. Built for self-authorship.', 'balancing-diamonds' ); ?></p>
			</div>

			<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer navigation', 'balancing-diamonds' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'container'      => false,
						'menu_class'     => 'menu',
						'fallback_cb'    => false,
					)
				);
				?>
			</nav>

			<div class="site-footer__meta">
				<p>&copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>.</p>
				<p><?php esc_html_e( 'A Bodhi Oak house.', 'balancing-diamonds' ); ?></p>
			</div>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>
</body>
</html>

