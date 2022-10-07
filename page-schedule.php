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
 * @package school-site-theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

<?php if( get_field('schedule') ): ?>
	<table class="schedule">
	<caption>Weekly Course Schedule</caption>
		<thead>
			<tr>
				<th>Date</th>
				<th>Course</th>
				<th>Instrutor</th>
			</tr>
		</thead>

    <?php while( the_repeater_field('schedule') ): ?>
  <tr>
    <td><?php the_sub_field('date'); ?></td>
	<td><?php the_sub_field('course'); ?></td>
	<td><?php the_sub_field('instructor'); ?></td>
  </tr>

    <?php endwhile; ?>
 <?php endif; ?>
 </table>


	</main><!-- #main -->

<?php
get_footer();
