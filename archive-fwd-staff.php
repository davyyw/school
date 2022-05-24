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

		<header class="page-header">
			<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );
			?>
		</header><!-- .page-header -->

		<?php
			$terms = get_terms( 
				array(
					'taxonomy' => 'fwd-stafftype',
				) 
			);
			if ( $terms && ! is_wp_error( $terms ) ) {
				foreach ( $terms as $term ) {
		?>

					<h2><?php echo $term -> name ?></h2>
		<?php	
					$args = array(
						'post_type'      => 'fwd-staff',
						'posts_per_page' => -1,
	
						'tax_query' => array(
							array(
								'taxonomy' => 'fwd-stafftype',
								'field' => 'slug',
								'terms' => $term->slug
							)
						)
					);
					$query = new WP_Query( $args );
	
					if ( $query->have_posts() ) {
						echo '<section >';
						while( $query->have_posts() ) {
							$query->the_post();
							echo '<article>';
							echo '<h3>'.get_the_title().'</h3>';
							if ( function_exists ( 'get_field' ) ) {
								if ( get_field( 'staff_biography' ) ) {
									echo '<p>'.get_field( 'staff_biography').'</p>';
								}
								if ( get_field( 'teaching_courses' ) ) {
									echo '<p>'.get_field( 'teaching_courses').'</p>';
								}
								if ( get_field( 'personal_web' ) ) {
									echo '<a href="'.get_field('personal_web').'">'.'Instructor Website</a>';
								}
							}
							echo '</article>';
						}
						echo '</section>';
						wp_reset_postdata();
					} 
				}
			}
		?>
	</main><!-- #primary -->

<?php
//get_sidebar();
get_footer();


