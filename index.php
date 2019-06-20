
<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<?php
get_header();
$argsForUX=array(
    'category_name' => 'UX'
);
// QUERY FOR THE MAIN POSTS
$ux = new WP_Query( $argsForUX);

$argsForUI=array(
    'category_name' => 'UI'
);

$ui = new WP_Query( $argsForUI);


$argsForWeb=array(
    'posts-per-page=50'
);

$web  = new WP_Query( $argsForWeb);


$container = get_theme_mod( 'understrap_container_type' );

// QUERY FOR User Experience Topics

?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<div class="wrapper" id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<div class="row">

			<!-- Do the left sidebar check and opens the primary div -->
			<?php# get_template_part( 'global-templates/left-sidebar-check' ); 
			
			?>


				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'loop-templates/content', 'main' );
						?>

					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

			<!-- Do the right sidebar check -->
			<?php #get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

	<div class="container">

	<?php if ( $ux->have_posts() ) : ?>
	<hr>
	<h1>User Experience topics</h1>
	<div class="row">
		<?php /* Start the Loop */ ?>

		<?php while ( $ux->have_posts() ) : $ux->the_post(); ?>

			<?php

			/*
			* Include the Post-Format-specific template for the content.
			* If you want to override this in a child theme, then include a file
			* called content-___.php (where ___ is the Post Format name) and that will be used instead.
			*/
			get_template_part( 'loop-templates/content', 'topics' );
			?>

		<?php endwhile; ?>

		<?php else : ?>

		<?php get_template_part( 'loop-templates/content', 'none' ); ?>

		<?php endif; ?>
		</div>
	</div>


		<div class="container">
	<?php if ( $ui->have_posts() ) : ?>
	<hr>
	<h1>User Interface topics</h1>
	<div class="row">
		<?php /* Start the Loop */ ?>

		<?php while ( $ui->have_posts() ) : $ui->the_post(); ?>

			<?php

			/*
			* Include the Post-Format-specific template for the content.
			* If you want to override this in a child theme, then include a file
			* called content-___.php (where ___ is the Post Format name) and that will be used instead.
			*/
			get_template_part( 'loop-templates/content', 'topics' );
			?>

		<?php endwhile; ?>

		<?php else : ?>

		<?php get_template_part( 'loop-templates/content', 'none' ); ?>

		<?php endif; ?>
		</div>
	</div>

		<div class="container">

	<?php if ( $web->have_posts() ) : ?>
	<hr>
	<h1>Web development topics</h1>
	<div class="row">
		<?php /* Start the Loop */ ?>

		<?php while ( $web->have_posts() ) : $web->the_post(); ?>

			<?php

			/*
			* Include the Post-Format-specific template for the content.
			* If you want to override this in a child theme, then include a file
			* called content-___.php (where ___ is the Post Format name) and that will be used instead.
			*/
			get_template_part( 'loop-templates/content', 'topics' );
			?>

		<?php endwhile; ?>

		<?php else : ?>

		<?php get_template_part( 'loop-templates/content', 'none' ); ?>

		<?php endif; ?>
		</div>
	</div>

</div><!-- #index-wrapper -->

<?php get_footer(); ?>
