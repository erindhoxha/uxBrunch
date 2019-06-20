<?php
/**
 * Template Name: Category Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
global $post;
$post_slug = $post->post_name;
if ($post_slug == 'all') {
	$q = new WP_Query(array(
		'orderby' => 'name',
		'order'   => 'ASC'
	));
} else {
	$q = new WP_Query(array(
		'category_name' => $post_slug,
	));
}


get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main row" id="main" role="main">

					<?php while ( $q->have_posts() ) : $q->the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'main' ); ?>


					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>
