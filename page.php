<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ){
			the_post();
			get_template_part( 'template-parts/content', 'page' );
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() )
				comments_template();
		}
		?>

		<?php
		if(is_page(57)){//this is for checking whether it is shedule page
			echo '<caption>Weekly Course Schedule</caption>';
		//below are for display table head
			if( have_rows('schedule-repeater')){
				echo '<table>';
				if( have_rows('schedule-repeater') ) {
					echo '<tr>';
						$row = the_row();
						if( $subfields = get_row() ) {
							foreach ($subfields as $key => $value) {
								$field = get_sub_field_object( $key );
								echo '<th>'.$field['label'].'</th>';
							}
						}
						reset_rows('schedule-repeater');
					echo '</tr>';
				}
		//below are for display table rows
				if( have_rows('schedule-repeater')){
					while( have_rows('schedule-repeater') ){
						$row = the_row();
						if( $subfields = get_row() ) {
							echo '<tr>';
							foreach ($subfields as $key => $value) {
								echo '<td>'.$value.'</td>';
							}
							echo '</tr>';
						}
					}
				}
			}
				echo '</table>'; 
		}
		?>

	</main><!-- #primary -->

<?php
get_sidebar();
get_footer();