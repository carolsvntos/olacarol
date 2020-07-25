<!-- Main Container -->
<div class="main-container">
	
	<?php

	// Blog Grid
	echo '<ul class="blog-grid">';
	
	if ( have_posts() ) :

		// Loop Start
		while ( have_posts() ) :

			the_post();

			echo '<li>';

			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
				
				<div class="post-media">
					<a href="<?php echo esc_url( get_permalink() ); ?>"></a>
					<?php the_post_thumbnail('savona-full-thumbnail'); ?>
				</div>

				<header class="post-header">

			 		<?php

					$category_list = get_the_category_list( ',&nbsp;&nbsp;' );

					if ( savona_options( 'blog_page_show_categories' ) === true && $category_list ) {
						echo '<div class="post-categories">' . ent2ncr($category_list) . ' </div>';
					}

					?>

					<h1 class="post-title">
						<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
					</h1>
					
					<div class="post-meta clear-fix">
						<?php if ( savona_options( 'blog_page_show_date' ) === true ) : ?>
						<span class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
						<?php endif; ?>
					</div>
					
				</header>

				<?php if ( savona_options( 'blog_page_post_description' ) !== 'none' ) : ?>

				<div class="post-content">
					<?php
					if ( savona_options( 'blog_page_post_description' ) === 'content' ) {
						the_content('');
					} elseif ( savona_options( 'blog_page_post_description' ) === 'excerpt' ) {
						if ( substr( savona_page_layout(), 0, 4 ) === 'col1' ) {
							savona_excerpt(  savona_options( 'blog_page_excerpt_length' ) );
						} else {
							savona_excerpt(  savona_options( 'blog_page_grid_excerpt_length' ) );
						}						
					}
					?>
				</div>

				<?php endif; ?>

				<?php if ( savona_options( 'blog_page_show_more' ) === true ) : ?>
				<div class="read-more">
					<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( savona_options( 'blog_page_more_text' ) ); ?></a>
				</div>
				<?php endif; ?>
				
				<footer class="post-footer">

					<?php if ( savona_options( 'blog_page_show_author' ) === true ) : ?>
					<span class="post-author">
						<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>">
							<?php echo get_avatar( get_the_author_meta( 'ID' ), 30 ); ?>
						</a>
						<?php the_author_posts_link(); ?>	
					</span>
					<?php endif; ?>

					<?php
					if ( savona_options( 'blog_page_show_comments' ) === true && comments_open() ) {
						comments_popup_link( esc_html__( 'No Comments', 'savona' ), esc_html__( '1 Comment', 'savona' ), '% '. esc_html__( 'Comments', 'savona' ), 'post-comments');
					}
					?>
					
				</footer>

				<!-- Related Posts -->
				<?php
				if ( substr( savona_page_layout(), 0, 4 ) === 'col1' && savona_options( 'blog_page_related_orderby' ) !== 'none' ) {
					savona_related_posts( savona_options( 'blog_page_related_title' ), savona_options( 'blog_page_related_orderby' ) );
				}
				?>

			</article>
		
			<?php

			echo '</li>';

		endwhile; // Loop End

	else:

	?>

	<div class="no-result-found">
		<h3><?php esc_html_e( 'Nothing Found!', 'savona' ); ?></h3>
		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'savona' ); ?></p>
		<div class="savona-widget widget_search">
			<?php get_search_form(); ?>
		</div> 
		
	</div>

	<?php
	
	endif; // have_posts()

	echo '</ul>';

	?>

	<?php get_template_part( 'templates/grid/blog', 'pagination' ); ?>

</div><!-- .main-container -->