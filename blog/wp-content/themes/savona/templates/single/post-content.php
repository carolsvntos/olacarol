<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php

if ( have_posts() ) :

	// Loop Start
	while ( have_posts() ) :

		the_post();

?>	

	<div class="post-media">
		<?php the_post_thumbnail('savona-full-thumbnail'); ?>
	</div>

	<header class="post-header">

		<?php

		$category_list = get_the_category_list( ',&nbsp;&nbsp;' );
		if ( savona_options( 'single_page_show_categories' ) === true && $category_list ) {
			echo '<div class="post-categories">' . ent2ncr($category_list) . ' </div>';
		}

		?>

		<h1 class="post-title"><?php the_title(); ?></h1>
		
		<div class="post-meta clear-fix">
			<?php if ( savona_options( 'single_page_show_date' ) === true ) : ?>
			<span class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
			<?php endif; ?>
		</div>
		
	</header>

	<div class="post-content">

		<?php

		// The Post Content
		the_content('');

		// Post Pagination
		$defaults = array(
			'before' => '<p class="single-pagination">'. esc_html__( 'Pages:', 'savona' ),
			'after' => '</p>'
		);

		wp_link_pages( $defaults );

		?>
	</div>

	<footer class="post-footer">

		<?php 

		// The Tags
		$tag_list = get_the_tag_list( '<div class="post-tags">','','</div>');
		
		if ( savona_options( 'single_page_show_tags' ) === true && $tag_list ) {
			echo ''. ent2ncr($tag_list);
		}

		?>

		<?php if ( savona_options( 'single_page_show_author' ) === true ) : ?>
		<span class="post-author"><?php esc_html_e( 'By', 'savona' ); ?>&nbsp;<?php the_author_posts_link(); ?></span>
		<?php endif; ?>

		<?php

		if ( savona_options( 'single_page_show_comments' ) === true && comments_open() ) {
			comments_popup_link( esc_html__( 'No Comments', 'savona' ), esc_html__( '1 Comment', 'savona' ), '% '. esc_html__( 'Comments', 'savona' ), 'post-comments');
		}

		?>
		
	</footer>

<?php

	endwhile; // Loop End
endif; // have_posts()

?>

</article>