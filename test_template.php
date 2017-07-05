<?php 

/*
Template Name: Test Template
*/

get_header();

if (have_posts()) :
	while (have_posts()) : the_post(); ?>

	<article class="post page">
		<h2><?php the_title(); ?></h2>

		<div class="info-box">
			<h4>Disclaimer</h4>
			<p>
				This is the disclaimer body
			</p>
		</div>
		<?php the_content(); ?>
	</article>

	<?php endwhile;

else :
	echo '<p>No Content Found!</p>';
endif;

get_footer();	

?>