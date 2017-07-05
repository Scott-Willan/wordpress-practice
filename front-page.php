<?php

get_header(); ?>

    <!-- site-content -->
    <div class="site-content clearfix">

        <?php if (have_posts()) :
            while (have_posts()) : the_post();

                the_content();

            endwhile;

        else :
            echo '<p>No content found</p>';

        endif;
        ?>

        <div class="home-columns clearfix">

            <div class="one-half">
                <?php
                //Posters Post loop starts here
                $uncategorizedPosts = new WP_Query('cat=9&posts_per_page(2)');

                if ($uncategorizedPosts->have_posts()) :
                    while ($uncategorizedPosts->have_posts()) : $uncategorizedPosts->the_post();

                        //Content output
                        ?>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php the_excerpt(); ?>

                        <?php

                    endwhile;

                else :
                    echo '<p>No content found</p>';

                endif;
                wp_reset_postdata();
                ?>
            </div>

            <div class="one-half last">
                <?php
                //Posters Post loop starts here
                $uncategorizedPosts = new WP_Query('cat=9&posts_per_page(2)');

                if ($uncategorizedPosts->have_posts()) :
                    while ($uncategorizedPosts->have_posts()) : $uncategorizedPosts->the_post();

                        //Content output
                        ?>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php the_excerpt(); ?>
                        <?php

                    endwhile;

                else :
                    echo '<p>No content found</p>';

                endif;
                wp_reset_postdata();
                ?>
            </div>

        </div>

        <?php


        ?>

    </div><!-- /site-content -->

<?php get_footer();

?>