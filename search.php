<?php
/**
 * The template for displaying search results pages.
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

<div class="wrapper" id="search-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">

							<h1 class="page-title mb-5">
								<?php
								printf(
									/* translators: %s: query term */
									esc_html__( 'Super-duper great articles for:  %s', 'understrap' ),
									'<span class="searched-value">' . get_search_query() . '</span>'
								);
								?>
							</h1>

					</header><!-- .page-header -->

					<?php /* Start the Loop */ ?>
				<div class="container">
					<div class="row">

	
					<?php while ( have_posts() ) : the_post(); ?>

						<?php
						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'loop-templates/content', 'search' );
						?>

					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'search' ); ?>

				<?php endif; ?>
				</div>
				</div>
			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

		</div><!-- .row -->

	</div><!-- #content -->
	<div class="container">
<h1>Latest posts</h1>
	<div class="row">
	<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<?php get_template_part( 'loop-templates/content', 'latest' ); ?>
				<?php understrap_post_nav(); ?>
	<?php endwhile; // end of the loop. ?>
	</div>
</div>
</div><!-- #search-wrapper -->

<?php get_footer(); ?>
