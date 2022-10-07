<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package school_site_theme
 */

get_header();
?>

	<main id="primary" class="site-main">

	<header class="page-header">
				<h1><?php single_term_title(); ?></h1>
				<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
			</header><!-- .page-header -->
<h1>The Class</h1>

<section class="students">

<?php				
$args = array(
    'post_type'      => 'school-students',
    'posts_per_page' => -1,
	'tax_query'      => array(
        array (
            'taxonomy' => 'school-students-category',
            'field'    => 'slug',
            'terms'    => 'developers'
        ),
    ),
);
 
$query = new WP_Query( $args );
 
if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post();
		?>

<article class="student-item">

	<a href="<?php the_permalink(); ?>">
		<h2><?php the_title(); ?></h2>
	</a>
	<?php
    the_post_thumbnail('student-pic');
    the_excerpt();
    ?>

</article>

		<?php
    }
    wp_reset_postdata();
} 
?>

<?php				
$args = array(
    'post_type'      => 'school-students',
    'posts_per_page' => -1,
	'tax_query'      => array(
        array (
            'taxonomy' => 'school-students-category',
            'field'    => 'slug',
            'terms'    => 'designers'
        ),
    ),
);
 
$query = new WP_Query( $args );
 
if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post();
		?>

<article class="student-item">

	<a href="<?php the_permalink(); ?>">
		<h2><?php the_title(); ?></h2>
	</a>
	<?php
the_post_thumbnail('student-pic');
the_excerpt();

?>

</article>

		<?php
    }
    wp_reset_postdata();
} 
?>

</section>
	</main><!-- #primary -->

<?php
get_footer();
