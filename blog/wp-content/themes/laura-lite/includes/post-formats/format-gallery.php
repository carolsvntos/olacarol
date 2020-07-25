<?php 
$postmeta = get_post_custom(get_the_id()); 	
$attachments = array();
if(!empty($postmeta["_format_gallery"][0])){					
	$attachments =  $postmeta["_format_gallery"][0];
	$attachments = preg_replace('/[^0-9.]+/', ',', $attachments);
	$attachments = explode(',',$attachments);
}
if ($attachments) {		
?>
<div class="category-slider" value="slider-category-<?php echo esc_attr($post->ID) ?>">
	<div id="slider-category" class="slider-category">
		<ul id="slider" class="slider-category-<?php echo esc_attr($post->ID) ?>">
			<?php foreach ($attachments as  $image_url) { 
				$image_url = wp_get_attachment_url( $image_url );
				if(!empty($image_url)) { ?>	
					<li>
						<img src="<?php echo esc_url( $image_url) ?>" />	
					</li>
				<?php } ?>
			<?php } ?>
		</ul>
		<div class="bx-controls bx-has-pager bx-has-controls-direction">
			<div class="bx-pager bx-custom-pager">
				<?php
				foreach ($attachments as  $key=>$image_url) { 
					$image_url = wp_get_attachment_url( $image_url );
					if(!empty($image_url)) {
					?>	
						<div class="bx-pager-item">
						<a data-slide-index="<?php echo esc_attr($key-1) ?>" href=""><img src="<?php echo esc_url( $image_url) ?>" alt="<?php ?>"/></a>
						</div>
					<?php } ?>
					<?php 
				} ?>	
			</div>
		</div>
	</div>
</div>
<?php } ?>