<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<style>
	.post-navigation {
		display:none;
	}
</style>

<article <?php post_class('row mt-3'); ?> id="post-<?php the_ID(); ?>">
<div class="col-lg-2">
<?php echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); ?>
</div>
<div class="col-lg-10">
<?php the_title(sprintf( '<h1 class="mb-1"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
					'</a></h1>'
				);
				?>
	<?php the_excerpt(); ?>
</div>

</article><!-- #post-## -->
