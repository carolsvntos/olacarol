<?php

// if password is required
if ( post_password_required() ) {
	return;
}

// if post has comments
if ( have_comments() ) : ?>

	<h3 class="comment-title">
		<?php comments_number( esc_html__( '0 Comments', 'bard' ), esc_html__( 'One Comment', 'bard' ), esc_html__( '% Comments', 'bard' ) ); ?>
	</h3>
	
	<ul class="commentslist" >
		<?php wp_list_comments( 'callback=bard_comments' ); ?>
	</ul>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<div class="comments-nav-section">					
		<p class="fl"></p>
		<p class="fr"></p>

		<div>				
			<div class="default-previous">
			<?php  previous_comments_link( '<i class="fas fa-long-arrow-alt-left" ></i>&nbsp;'. esc_html__( 'Older Comments', 'bard' )  ); ?>
			</div>

			<div class="default-next">
				<?php  next_comments_link( esc_html__( 'Newer Comments', 'bard' ) . '&nbsp;<i class="fas fa-long-arrow-alt-right" ></i>'  ); ?>
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