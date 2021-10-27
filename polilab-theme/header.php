<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PoliLAB_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>


<div class="polilab-preloader polilab-preloader--show" id="polilab-preloader">
	<?php echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'full', '', ["class" => "polilab-preloader__img"] ); ?>
</div>

<aside class="canvi-navbar">
	<div class="canvi-navbar__header">
		<button class="site-hamburger-close">
			<span></span>
			<span></span>
			<span></span>
		</button>
		<?php the_custom_logo(); ?>		
	</div>
	<nav class="site-navbar site-navbar--mobile" role="navigation">
		<?php
		wp_nav_menu( array(
			'theme_location' => 'menu-1',
			'menu_id'       => 'main-menu',
			'menu_class'	=> 'site-navbar__list',
			'container'		=> false
		) );
		?>
	</nav>
</aside>


<div id="page" class="canvi-content">

	<header class="site-header">
		<div class="container">
			<button class="site-hamburger">
				<span></span>
				<span></span>
				<span></span>
			</button>

			<?php the_custom_logo(); ?>

			<nav class="site-navbar site-navbar--desktop" role="navigation">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'       => 'main-menu',
					'menu_class'	=> 'site-navbar__list',
					'container'		=> false
				) );
				?>
			</nav>
		</div>		
	</header>	

	<main id="content">