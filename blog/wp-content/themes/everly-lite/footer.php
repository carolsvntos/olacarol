<div class="totop"><div class="gototop"><div class="arrowgototop"></div></div></div>
<!-- footer-->
<?php if(is_front_page()){ ?>
<div class="sidebars-wrap bottom">
	<div class="sidebars">
		<div class="sidebar-fullwidth">
			<?php dynamic_sidebar( 'everly-sidebar-footer-fullwidth' ); ?>
		</div>		
		<div class="sidebar-left-right">
			<div class="left-sidebar">
				<?php dynamic_sidebar( 'everly-sidebar-footer-left' ); ?>
			</div>
			<div class="right-sidebar">
				<?php dynamic_sidebar( 'everly-sidebar-footer-right' ); ?>
			</div>
		</div>							
	</div>
</div>
<?php } ?>
<!-- footer-->
<footer>
	<?php if(is_active_sidebar( 'everly_footer1' ) || is_active_sidebar( 'everly_footer2' ) || is_active_sidebar( 'everly_footer3' )){ ?>
		<div id="footer">
			<div id="footerinside">
			<!--footer widgets-->
				<div class="block_footer_text">
					<p><?php 
					if(isset($everly_data['block_footer_text'])){
					everly_security($everly_data['block_footer_text']); }?></p>
				</div>
				<div class="footer_widget">
					<div class="footer_widget1">
						<?php if (is_active_sidebar('everly_footer1' )) { ?>
						<?php dynamic_sidebar( 'everly_footer1' ); ?>	
						<?php } ?>				
					</div>	
					<div class="footer_widget2">	
						<?php if (is_active_sidebar('everly_footer2' )) { ?>
						<?php dynamic_sidebar( 'everly_footer2' ); ?>	
						<?php } ?>	
					</div>	
					<div class="footer_widget3">	
						<?php if (is_active_sidebar('everly_footer3' )) { ?>
						<?php dynamic_sidebar( 'everly_footer3' ); ?>	
						<?php } ?>	
					</div>
				</div>
			</div>		
		</div>
	<?php } ?>
	<?php
	if(everly_globals('use_block3') && everly_globals('block3_username') && shortcode_exists( 'instagram-feed' ) ){ ?>
		<div class="block3">
			<a href="<?php everly_security(everly_data('block3_url')) ?>" target="_blank"></a>
		</div>
		<?php
			echo do_shortcode('[instagram-feed id=517 id="'.esc_attr(everly_data('block3_username')).'" src="user_recent" imgl="instagram" imagepadding=0 cols="6" imageres=full  num="6" ]');
	}
	?>
	
	
	<!-- footer bar at the bootom-->
	<div id="footerbwrap">
		<div id="footerb">
			<div class="lowerfooter">
			<div class="copyright">	
				<?php everly_security(everly_data('copyright')); ?>
			</div>
			</div>
		</div>
	</div>	
</footer>	
<?php wp_footer();  ?>
</body>
</html>
