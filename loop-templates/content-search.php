<?php
/**
 * Search results partial template.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<?php if (get_the_post_thumbnail()) : ?>
<article <?php post_class('col-lg-4'); ?> id="post-<?php the_ID(); ?>">
	<div class="row">
		<div class="col-6 col-lg-12 col-12 col-sm-12 col-md-6">

		<figure class="effect-lexi">
			<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
			<figcaption>
				<?php
				the_title(
					sprintf( '<p class="bubble-text"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
					' <br> <span class="see-more"> Read article </span></a></p>'
				);
				?>
			</figcaption>			
		</figure>
		</div>

	<div class="col-6 col-lg-12 col-12 col-sm-12 col-md-6">
	
		<div class="content-container">
		<div class="title-and-icons">
		<?php erinds_blog_footer_info(); ?>
		<?php
		the_title(
			sprintf( '<h2 class="entry-title entry-title-index"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h2>'
		);
		?>
		</div>

			<div class="entry-content">
			<?php the_excerpt(); ?>
			</div><!-- .entry-content -->
		</div>
		</div>
				
		</div>
		<?php if ( 'post' == get_post_type() ) : ?>

		<?php endif; ?>


</article><!-- #post-## -->
	<?php endif; ?>
