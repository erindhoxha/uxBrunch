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
<a href="<?php echo get_permalink(); ?>">
<article <?php post_class('mt-3 col-lg-4'); ?> id="post-<?php the_ID(); ?>">
<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
<?php the_title(sprintf( '<h1 class="mb-1"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
					'</a></h1>'
				);
				?>
	<?php the_excerpt(); ?>
</article><!-- #post-## -->
</a>
