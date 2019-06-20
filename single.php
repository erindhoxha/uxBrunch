<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$args = array('order'=>'ASC');
$query = new WP_query($args);
get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<main class="site-main single-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'single' ); ?>

					<?php understrap_post_nav(); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

			<!-- Do the right sidebar check -->
		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->
<div class="container">
<h1>Latest posts</h1>
	<div class="row">
	<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<?php get_template_part( 'loop-templates/content', 'latest' ); ?>
				<?php understrap_post_nav(); ?>
	<?php endwhile; // end of the loop. ?>
	</div>
</div>
	<?php get_footer(); ?>

