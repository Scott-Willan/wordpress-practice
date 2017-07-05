<?php

get_header();

if (have_posts()) :
	while (have_posts()) : the_post(); ?>
		<article class="post page">

			<div class="column-container clearfix">
				<div class="title-column">
					<h2><?php the_title(); ?></h2>
				</div>

				<div class="text-column">
					<h5> <?php the_content(); ?></h5>
				</div>
			</div>

		</article>
	<?php endwhile;

else :
	echo '<p>No Content Found!</p>';
endif;

get_footer();	

?>