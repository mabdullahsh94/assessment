<?php get_header(); ?>

<div id="container">
	<div id="content" role="main">
		<?php

		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

		$args = array( 
			'posts_per_page' => 6, 
			'paged' => $paged,
			'post_type' => 'projects',
			'orderby' => 'title',
			'order' => 'ASC'
		);
		$projects = new WP_Query( $args );

		if ( $projects->have_posts() ) {
			while ( $projects->have_posts() ) {
				$projects->the_post(); 
				
				echo "<div style='border:2px groove black; margin-bottom:5px;'><h3 >";
				the_title(); 
				echo "</h3><div >";
				the_content();
				echo "</div></div>";

			}

			next_posts_link( 'Next', $projects->max_num_pages );
			previous_posts_link( 'Previous' ); 
			wp_reset_postdata();
		}
		?>

	</div><!-- #content -->
</div><!-- #container -->

<?php get_footer(); ?>