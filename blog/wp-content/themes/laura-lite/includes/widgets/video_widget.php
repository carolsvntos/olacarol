<?php
/*
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'laura_video_widget' );
/* Function that registers our widget. */
function laura_video_widget() {
	register_widget( 'laura_videos' );
}
class laura_videos extends WP_Widget {
	function __construct() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'videos', 'description' => esc_attr__('Displays the post image and title.','laura'));
		/* Create the widget. */
		parent::__construct( 'videos-widget',esc_attr__('Laura - Premium Video','laura'), $widget_ops, '' );
        add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
		
	}
	function widget( $args, $instance ) {
		global $pmc_data;
		extract( $args );
		$title = apply_filters('widget_title', $instance['title'] );
		
		echo $before_widget; 
		
		if ( $title ) echo $before_title . $title . $after_title;  ?>
		<style scoped>
		.widget.videos .self.id-<?php echo esc_attr($this->id); ?>  .wttitle{margin-top: -<?php echo esc_attr($instance['text-top']); ?>}
		<?php if(!empty($instance['self_video']) && !empty($instance['display_text'])) { ?>
			.widget.videos .self a{background:#fff; width:100%; floaT:left; padding:20px 0; text-align:center; opacity:0.4}
			.widget.videos .widgett.self{margin:0;}		
		<?php } ?>
		</style>
		<div class="widgett <?php if(!empty($instance['self_video'])) echo 'self'; ?> id-<?php echo esc_attr($this->id); ?>">	
			<div class="video">
					<?php
					if(empty($instance['self_video'])){
						echo wp_oembed_get(esc_url($instance['video']));
					} else {
						echo wp_video_shortcode(array('src' => esc_url($instance['video']),'autoplay'=>$instance['auto_play'],'poster' => $instance['image']));
					}

					?>
				</div>
				<?php if(!empty($instance['display_text'])) { ?>
					<div class="wttitle"><a target="_blank" href="<?php echo esc_attr($instance['link']); ?>" rel="bookmark" title="<?php esc_attr_e('Permanent Link to','laura')?> <?php echo esc_attr($instance['text']); ?>"><?php echo esc_attr($instance['text']);?></a></div>
				<?php } ?>
		</div>	
			
		
		
		
		<?php
		echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['video'] = $new_instance['video'];		
		$instance['link'] = $new_instance['link'];
		$instance['text'] = $new_instance['text'];
		$instance['text-top'] = $new_instance['text-top'];		
		$instance['display_text'] = $new_instance['display_text'];		
		$instance['self_video'] = $new_instance['self_video'];		
		$instance['auto_play'] = $new_instance['auto_play'];				
		$instance['image'] = $new_instance['image'];
		return $instance;
	}
	function form( $instance ) {
		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Laura Video', 'video' => 'https://www.youtube.com/watch?v=35YZkJaDhh8', 'text' => 'Laura Video Text', 'text-top' => '200px','self_video'=>'','auto_play' => '','display_text' => '','link' =>'','self_video' => '','image' => '');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<script>
		jQuery(document).ready(function($) {
			$(document).on("click", ".upload_image_button", function() {

				jQuery.data(document.body, 'prevElement', $(this).prev());

				window.send_to_editor = function(html) {
					var imgurl = jQuery(html).find('img').attr('src');
					var inputText = jQuery.data(document.body, 'prevElement');
					if(inputText != undefined && inputText != '')
					{
						inputText.val(imgurl);
					}

					tb_remove();
				};

				tb_show('', 'media-upload.php?type=image&TB_iframe=true');
				return false;
			});
		});		
		</script>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_attr_e('Title:','laura') ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'video' )); ?>"><?php esc_attr_e('Video URL:','laura') ?></label>
			<input class="widefat"  id="<?php echo esc_attr($this->get_field_id( 'video' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'video' )); ?>" value="<?php echo esc_attr($instance['video']); ?>" />
			<br /><small><?php esc_attr_e('(Youtube or Vimeo or self hosted)','laura') ?></small>
		</p>
		<p>
		<input class="checkbox" type="checkbox" <?php checked( $instance[ 'self_video' ], 'on' ); ?> id="<?php echo esc_attr($this->get_field_id( 'self_video' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'self_video' )); ?>" /> 
		<label for="<?php echo esc_attr($this->get_field_id( 'self_video' )); ?>"><?php esc_attr_e('Self hosted video (formats : "mp4", "m4v", "webm", "ogv", "wmv", "flv")?','laura') ?></label>
		</p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_name( 'image' )); ?>"><?php esc_attr_e('Image cover for self hosted video:','laura') ?></label>
            <input name="<?php echo esc_attr($this->get_field_name( 'image' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'image' )); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $instance['image'] ); ?>" />
            <input class="upload_image_button" type="button" value="<?php esc_attr_e('Upload Image','laura') ?>" />
        </p>		
		<p>
		<input class="checkbox" type="checkbox" <?php checked( $instance[ 'auto_play' ], 'on' ); ?> id="<?php echo esc_attr($this->get_field_id( 'auto_play' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'auto_play' )); ?>" /> 
		<label for="<?php echo esc_attr($this->get_field_id( 'auto_play' )); ?>"><?php esc_attr_e('Auto play (only for self hosted video)?','laura') ?></label>
		</p>		
		<p>
		<input class="checkbox" type="checkbox" <?php checked( $instance[ 'display_text' ], 'on' ); ?> id="<?php echo esc_attr($this->get_field_id( 'display_text' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'display_text' )); ?>" /> 
		<label for="<?php echo esc_attr($this->get_field_id( 'display_text' )); ?>"><?php esc_attr_e('Display Text with link?','laura') ?></label>
		</p>		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'link' )); ?>"><?php esc_attr_e('Link URL:','laura') ?></label>
			<input class="widefat"  id="<?php echo esc_attr($this->get_field_id( 'link' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'link' )); ?>" value="<?php echo esc_url($instance['link']); ?>" />
			<br /><small><?php esc_attr_e('(Link for the text)','laura') ?></small>
		</p>			
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'text' )); ?>"><?php esc_attr_e('Text:','laura') ?></label>
			<input class="widefat"  id="<?php echo esc_attr($this->get_field_id( 'text' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'text' )); ?>" value="<?php echo esc_attr($instance['text']); ?>" />
			<br /><small><?php esc_attr_e('(Text over the video)','laura') ?></small>
		</p>		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'text-top' )); ?>"><?php esc_attr_e('Text bottom margin:','laura') ?></label>
			<input class="widefat"  id="<?php echo esc_attr( $this->get_field_id( 'text-top' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'text-top' )); ?>" value="<?php echo esc_attr($instance['text-top']); ?>" />
			<br /><small><?php esc_attr_e('(Bottom margin for text with px (200px))','laura') ?></small>
		</p>		
		<?php
	}
	public function upload_scripts()
    {
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_enqueue_style('thickbox');

    }

}


?>
