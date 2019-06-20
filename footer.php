<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$args = array('post_type'=>'socialMedia', 'order'=>'ASC');
$query = new WP_query($args);
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<div class="site-info">

<div class="site" id="page">

<!-- ******************* The Navbar Area ******************* -->
<div id="wrapper-navbar" class="container" itemscope itemtype="http://schema.org/WebSite">

<hr>

<nav class="navbar navbar-expand-md navbar-light pl-0 tertiary-nav row">
      <div class="col-lg-9 col-md-6 col-xs-12 col-12" id="navbarsExample04">
      <?php wp_nav_menu(
					array(
						'theme_location'  => 'tertiary',
						'container_class' => '',
						'container_id'    => 'navbarNavDropdown3',
						'menu_class'      => 'navbar-nav mr-auto tertiary-nav courses',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu-tertiary',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				);?>
	  </div>
	<div class="social-media-links col-lg-3 col-md-6 col-xs-12 col-12">
		<ul class="navbar-nav ml-auto social">
		<?php if ($query->have_posts()) : while($query->have_posts()) : ?>
		<?php $query->the_post(); ?>
		<?php
			$facebookLink = get_field('facebook');
			if( $facebookLink ): 
				$fb_link_url = $facebookLink['url'];
			endif;
			$twitterLink = get_field('twitter');
			if( $twitterLink ): 
				$twitter_url = $twitterLink['url'];
			endif;
			$instagramLink = get_field('instagram');
			if( $instagramLink ): 
				$instagram_url = $instagramLink['url'];
			endif;
			$githubLink = get_field('github');
			if( $githubLink ): 
				$github_url = $githubLink['url'];
			endif;
		?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $fb_link_url ?>"><i class="fab fa-facebook fa-1x"></i></a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="<?php echo $twitter_url ?>"><i class="fab fa-twitter fa-1x"></i></a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="<?php echo $instagram_url ?>"><i class="fab fa-instagram fa-1x"></i></a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="<?php echo $github_url ?>"><i class="fab fa-github fa-1x"></i></a>
          </li>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
			<?php endif; ?>
        </ul>
      </div>
	</nav>
	
	</div><!-- #wrapper-navbar end -->
	</div><!-- .site-info -->

	</footer><!-- #colophon -->

	</div><!--col end -->

	</div><!-- row end -->

	</div><!-- container end -->

	</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

