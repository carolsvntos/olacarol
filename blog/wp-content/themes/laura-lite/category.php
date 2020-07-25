<?php get_header(); ?>

<?php

	if(laura_globals('grid_blog')){
		switch(laura_data('grid_blog')){
		case 1:
			get_template_part('category-default','category');
		break;
		case 2:
			get_template_part('category-grid','category');
		break;		
		}
	}
	else {
		get_template_part('category-default','category');
	}

?>

<?php get_footer(); ?>