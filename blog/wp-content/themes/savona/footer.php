		</div><!-- #page-content -->

		<!-- Page Footer -->
		<footer id="page-footer" class="<?php echo esc_attr(savona_options( 'general_footer_width' )) === 'boxed' ? 'boxed-wrapper ': ''; ?>clear-fix">
			
			<!-- Scroll Top Button -->
			<span class="scrolltop">
				<i class="fa fa fa-angle-up"></i>
			</span>

			<div class="page-footer-inner <?php echo savona_options( 'general_footer_width' ) === 'contained' ? 'boxed-wrapper': ''; ?>">

			<!-- Footer Widgets -->
			<?php 
			if ( savona_options( 'page_footer_columns' ) !== 'none' ) {
				echo get_template_part( 'templates/sidebars/footer', 'widgets' ); 
			}
			?>

			<div class="footer-copyright">
				<div class="copyright-info">
				<?php

				$copyright = savona_options( 'page_footer_copyright' );
				$copyright = str_replace( '$year', date_i18n( __('Y','savona') ), $copyright );
				$copyright = str_replace( '$copy', '&copy;', $copyright );

				// some allowed HTML
				echo wp_kses_post( $copyright );

				?>
				</div>
				
				<div class="credit">
					<?php esc_html_e( 'Savona Theme by ', 'savona' ); ?>
					<a href="<?php echo esc_url( 'http://optimathemes.com/' ); ?>">
					<?php esc_html_e( 'Optima Themes', 'savona' ); ?>
					</a>
				</div>

			</div>

			</div><!-- .boxed-wrapper -->

		</footer><!-- #page-footer -->

	</div><!-- #page-wrap -->

<?php wp_footer(); ?>

</body>
</html>