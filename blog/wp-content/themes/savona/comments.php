<?php

// if password is required
if ( post_password_required() ) {
	echo '<p>'. esc_html__( 'This post is password protected. Enter the password to view the comments.' ,'savona') .'</p>';
	return;
}

// if post has comments
if ( have_comments() ) : ?>

	<h2  class="comment-title">
		<?php comments_number( esc_html__( 'No Comments', 'savona' ), esc_html__( 'One Comment', 'savona' ), esc_html__( '% Comments', 'savona' ) ); ?>
	</h2>
	
	<ul class="commentslist" >
		<?php wp_list_comments( 'callback=savona_comments' ); ?>
	</ul>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<div class="comments-nav-section">					
		<p class="fl"></p>
		<p class="fr"></p>

		<div>				
			<div class="default-previous">
			<?php  previous_comments_link( '<i class="fa fa-long-arrow-left" ></i>&nbsp;'. esc_html__( 'Older Comments', 'savona' )  ); ?>
			</div>

			<div class="default-next">
				<?php  next_comments_link( esc_html__( 'Newer Comments', 'savona' ) . '&nbsp;<i class="fa fa-long-arrow-right" ></i>'  ); ?>
			</div>
			
			<div class="clear"></div>
		</div>
	</div>
<?php
	endif;

// have_comments()
endif;

// Form
comment_form();
?>