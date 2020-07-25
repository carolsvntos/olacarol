<?php
/*
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'laura_category_select_slider_post_widget' );

/* Function that registers our widget. */
function laura_category_select_slider_post_widget() {
	register_widget( 'laura_category_select_slider_posts' );
}
class laura_category_select_slider_posts extends WP_Widget {
	function __construct() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'category_select_slider_posts', 'description' => esc_attr__('Displays the post in slider from a selected category','laura') );
		/* Create the widget. */
		parent::__construct( 'category_select_slider_posts-widget', esc_attr__('Laura - Premium Posts with slider','laura'), $widget_ops, '' );
	}
	

	function widget( $args, $instance ) {

		global $pmc_data;
		extract( $args );
		/* User-selected settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		// to sure the number of posts displayed isn't negative or more than 10
		if ( !$number = (int) $instance['number'] )
			$number = 5;
		else if ( $number < 1 )
			$number = 1;
		else if ( $number > 10 )
			$number = 10;
		//the query that will get post from a specific category. 
		//Wr slug the category because you actualy need the slug and not the name

		$args = array(
					'showposts' => $number,
					'post_status' => 'publish',
					'cat' => esc_attr($instance['category'] ),
					'post_type' => 'post',
					'tax_query' => array(
						array(
							'taxonomy' => 'post_format',
							'field'    => 'slug',						
							'terms'    => array( 'post-format-quote'),
							'operator' => 'NOT IN'
						)
					),					
				);
	
		$pc = new WP_Query($args);
	
		echo $before_widget; 
		//display the posts title as a link
		if ($pc->have_posts()) : 
		
		
				if ( $title ) echo $before_title . $title . $after_title; 
		?>
		<div class="<?php echo $this->id ?>" style="float:left;">
		
			<?php 
			
			?>
			<ul class="bxslider-<?php echo esc_attr($this->id) ?>">		
			<?php  while ($pc->have_posts()) : $pc->the_post();  ?>				
			<li>
				<div class="widgett">		
					<?php
					$image=$comment_0=$comment_1=$comment_2= '';
					if ( has_post_thumbnail() ){
						$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'laura_widget', false);
						$image = $image[0];}	
					?>			
					<div class="imgholder">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php esc_attr_e('Permanent Link to','laura')?> <?php the_title(); ?>">
							<?php if (has_post_thumbnail( get_the_ID() )) echo laura_getImage(get_the_id(),'laura-widget') ;?>		
						</a>
					</div>
					<div class="wttitle"><h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php esc_attr_e('Permanent Link to','laura')?> <?php the_title(); ?>"><?php the_title(); ?></a></h4></div>
					<?php if(!empty($instance['excerpt']) && !(has_post_format( 'link' , get_the_id()))) { ?>
					<div class="pmc-excerpt"><?php echo wp_trim_words(get_the_excerpt(), esc_attr($instance['n_excerpt']) ,'...')  ?></div>
					<?php } ?>
				</div>	
			</li>
				
			<?php  endwhile; ?>
			</ul>
		</div>
		<input id="slider_id" type="hidden" value="<?php echo esc_attr($this->id) ?>">
		<input id="slider" type="hidden" value="<?php echo esc_attr($instance['slider']) ?>">	
		
	<?php
			wp_reset_postdata();   // Restore global post data stomped by the_post().
			endif;
		echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['number'] = $new_instance['number'];
		$instance['category'] = $new_instance['category'];		
		$instance['slider'] = $new_instance['slider'];			
		$instance['excerpt'] = $new_instance['excerpt'];	
		$instance['n_excerpt'] = $new_instance['n_excerpt'];			
		return $instance;
	}
	function form( $instance ) {
		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Laura Post slider', 'number' => 3, 'slider' => 2, 'excerpt' => 0, 'n_excerpt' => 10,'category' =>'');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_attr_e('Title:','laura') ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php esc_attr_e('Number of posts to show:','laura') ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" value="<?php echo esc_attr($instance['number']); ?>" size="3" />
			<br /><small><?php echo esc_attr('(at most 10)','laura') ?></small>
		</p>
		<p>
		<input id="<?php echo esc_attr( $this->get_field_id( 'excerpt' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'excerpt' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $instance['excerpt'] ); ?> />
		<label for="<?php echo esc_attr( $this->get_field_id( 'excerpt' ) ); ?>"><?php esc_attr_e('Show excpert?','laura') ?></label>
		</p>	
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'n_excerpt' )); ?>"><?php esc_attr_e('Number of words to show in excpert:','laura') ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'n_excerpt' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'n_excerpt' )); ?>" value="<?php echo esc_attr($instance['n_excerpt']); ?>" size="3" />
		</p>		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'slider' )); ?>"><?php esc_attr_e('Number of posts to show in slider:','laura') ?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'slider' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'slider' )); ?>" value="<?php echo esc_attr($instance['slider']); ?>" size="3" />
			<br /><small><?php esc_attr_e('(at most 4 for fullwidth slider and 2 for smaller slider)','laura') ?></small>
		</p>		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'category' )); ?>"><?php esc_attr_e('Category to display','laura') ?></label>
			<?php $args = array(
							'name' => $this->get_field_name( 'category' ),
							'id' => $this->get_field_id( 'category' ),
							'selected' => esc_attr($instance['category'] ),
							'show_count' => 1,
							'value_field'	     => 'term_id'
						);
			?>
			<?php wp_dropdown_categories($args); ?>
			<br /><small><?php esc_attr_e('(select category to display)','laura') ?></small>
		</p>
		</p>
		<br /><small><?php esc_attr_e('Note: Quote post will not be displayed.','laura') ?></small>	
		<br />
		</p>	
		<?php
	}

}
?>
