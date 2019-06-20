<?php

/**
 * Generate custom search form
 *
 * @param string $form Form HTML.
 * @return string Modified form HTML.
 */
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

 $args = array('post_type'=>'socialMedia', 'order'=>'ASC');
 $query = new WP_query($args);
 $url = home_url( '/' );

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<div class="loader">
	<div class="marker">
	<?php the_custom_logo(); ?>
	</div>
</div>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<div class="navbar_side">

		<div class="row">
			<div class="col-lg-12">
				<span class='exit_site_navbar'><i class="fas fa-times"></i></span>
			</div>
			<div class="col-lg-12">
					<!-- The WordPress Menu goes here -->
					<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => '',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-primary navbar-nav ml-auto',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				); ?>

			</div>


		</div>
	</div>
	<!-- ******************* The Navbar Area ******************* -->

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<nav class="navbar navbar-light navbar-primary bg-white">

  <div class="container">
					<!-- Your site title as branding in the menu -->
					<?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>

							<h1 class="navbar-brand mb-0 mx-auto"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

						<?php else : ?>

							<a class="navbar-brand mx-auto" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

						<?php endif; ?>


					<?php } else { ?>
 
					<a href="<?php echo esc_url( $url ); ?>">
						<div class="custom-logo" style="z-index:10" >
							<?php the_custom_logo(); ?>
						</div>
					</a>

				<?php	} ?><!-- end custom logo -->
				<div class="icon-box container">
					<i class="fab fa-searchengin navbar-search"></i>
					<i class="fas fa-bars navbar-toggler navbar-toggler-erindsblog"></i>
					<a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
						<i class="fas fa-shopping-cart shopping-cart">
							<span class="badge badge-cart badge-pill badge-success text-dark" id="cart-count">
							<?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> 
							</span>
						</i>
					</a>
				</div>
		</div>
		</nav><!-- .site-navigation -->


	<div id="wrapper-navbar" class="container" itemscope itemtype="http://schema.org/WebSite">
	<nav class="navbar navbar-expand-md navbar-light pl-0 mt-2 pt-4">
		<div class="secondary-nav">
        <?php wp_nav_menu(
					array(
						'theme_location'  => 'secondary',
						'container_class' => '',
						'container_id'    => 'navbarNavDropdown2',
						'menu_class'      => 'navbar-nav mr-auto secondary-nav',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu2',
						'depth'           => 3,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
		); ?>
		</div>

	  <form role="search" method="get" class="search-form form-inline ml-auto my-2 my-lg-0" action="<?php echo home_url( '/' ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
        <input type="search" class="search-field form-control mr-sm-2"
            placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    </label>
		<input type="submit" class="search-submit btn btn-search my-2 my-sm-0"
			value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
	</form>

    </nav>
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
