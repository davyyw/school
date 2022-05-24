<?php
/**
 * The template for displaying work archives
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php //if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
				$args = array(
					'post_type'      => 'fwd-student',
					'orderby'        => 'title',
					'order'			 =>'ASC',
					'posts_per_page' => -1,
				);
				$query = new WP_Query( $args );

				if ( $query->have_posts() ) {
					echo '<section ><h2>The Class</h2>';
					while( $query->have_posts() ) {
						$query->the_post();
			?>
						<article>
							<a href="<?php echo get_permalink()?>"><h2> <?php echo get_the_title(); ?> </h2></a>
							<?php the_post_thumbnail('medium'); ?>
							<?php the_excerpt(); ?>
							<p>Specialty: 
								<?php
								// $currentID = get_the_ID();
								// $terms = get_the_terms( $currentID, 'fwd-studenttype');
								// if ( $terms && ! is_wp_error( $terms ) ) {
								// 	foreach ( $terms as $term ) {
								// 		echo '<a href="'.get_term_link($term->slug,"fwd-studenttype").'">'.$term->name.'</a>';
								// 	}
								// } version 1
								$currentID = get_the_ID();//version 2
								echo get_the_term_list( $currentID, 'fwd-studenttype');
								?>
							</p>
						</article>
			<?php
					}
					echo '</section>';
					wp_reset_postdata();
				}  
			?>
			<?php
			/* Start the Loop */
			// while ( have_posts() ) :
			// 	the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
		// 		get_template_part( 'template-parts/content', get_post_type() );

		// 	endwhile;

		// 	the_posts_navigation();

		// else :

		// 	get_template_part( 'template-parts/content', 'none' );

		// endif;
		?>

	</main><!-- #primary -->

<?php
//get_sidebar();
get_footer();


