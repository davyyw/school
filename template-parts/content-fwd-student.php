<?php
/**
 * Template part for displaying work posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
		?>
			<div class="entry-meta">
				<?php
				fwd_posted_on();
				fwd_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php fwd_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fwd' ),
				'after'  => '</div>',
			)
		);
		?>

		<?php
		$currentID = get_the_ID();
		$currentTitle = get_the_title();
		$terms = get_the_terms( $currentID, 'fwd-studenttype'
		);
		if ( $terms && ! is_wp_error( $terms ) ) {
			foreach ( $terms as $term ) {
		?>			
				<h3>Meet other <?php echo $term -> name ?> Students</h3>
		<?php 
				$args = array(
					'post_type'      => 'fwd-student',
					'posts_per_page' => -1,

					'tax_query' => array(
						array(
							'taxonomy' => 'fwd-studenttype',
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
						if(get_the_title() !== $currentTitle){
							echo '<a href="'. get_permalink() .'"id = '.get_the_ID().'>';
								echo '<h4>'. get_the_title() .'</h4>';
							echo '</a>';
						}
						echo '</article>';

					}
					echo '</section>';
					wp_reset_postdata();
				} 
			}
		}
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php fwd_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
