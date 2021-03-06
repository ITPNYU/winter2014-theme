<?php
/**
 * The template for displaying Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php if ( have_posts() ) : ?>
        <header class="entry-header">
          <h1 class="entry-title"><?php printf( __( '%s', 'twentyfourteen' ), single_cat_title( '', false ) ); ?></h1>
			  </header><!-- .entry-header -->
			<?php
					// Start the Loop.
					$cat_id = get_queried_object()->term_id;
					$category_posts = get_posts(array(
						'category' => $cat_id,
						'posts_per_page' => -1,
						'orderby' => 'title',
						'order' => 'ASC'
					));
					echo '<div class="entry-content"><table>' . "\n";
					echo '<p>This show is dedicated to the memory of ITP student <a href="http://justinr.me" target="_blank">Justin Restauri</a>.</p>' . "\n";
					echo "<thead><tr><th>Project</th><th>Student(s)</th><th>Instructor(s)</th><th>Class</th></thead>\n";
					echo "<tbody>\n";
					foreach ( (array) $category_posts as $order => $post ) :
						setup_postdata($post);
						get_template_part( 'content', 'listview');
					endforeach;
					echo "</tbody>\n";
					echo "</table></div>\n";
					wp_reset_postdata();

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?>
		</div><!-- #content -->
	</section><!-- #primary -->

<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();
