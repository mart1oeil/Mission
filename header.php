<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
	<?php wp_head(); ?>
</head>

<body id="<?php print get_stylesheet(); ?>" <?php body_class(); ?>>
<?php do_action( 'ct_mission_body_top' ); ?>
<a class="skip-content" href="#main"><?php esc_html_e( 'Press "Enter" to skip to content', 'mission' ); ?></a>
<div id="overflow-container" class="overflow-container">
	<div id="max-width" class="max-width">
		<?php do_action( 'ct_mission_before_header' ); ?>
		<header class="site-header" id="site-header" role="banner">
			<div class="top-nav">
				<?php get_template_part( 'content/search-bar' ); ?>
				<div id="menu-secondary-container" class="menu-secondary-container">
					<?php get_template_part( 'menu', 'secondary' ); ?>
				</div>
				<?php ct_mission_social_icons_output(); ?>
			</div>
			<div id="title-container" class="title-container">
				<?php get_template_part( 'logo' ) ?>
				<p class="date"><?php echo date_i18n( get_option( 'date_format' ), strtotime( '<script>new Date();</script>' ) ); ?></p>
				<?php if ( get_bloginfo( 'description' ) ) {
					echo '<p class="tagline">' . esc_html( get_bloginfo( 'description' ) ) . '</p>';
				} ?>
			</div>
			<button id="toggle-navigation" class="toggle-navigation" name="toggle-navigation" aria-expanded="false">
				<span class="screen-reader-text"><?php esc_html_e( 'open menu', 'mission' ); ?></span>
				<?php echo ct_mission_svg_output( 'toggle-navigation' ); ?>
			</button>
			<div id="menu-primary-container" class="menu-primary-container tier-1">
				<?php get_template_part( 'menu', 'primary' ); ?>
			</div>
		</header>
		<?php do_action( 'ct_mission_after_header' ); ?>
		<div class="content-container">
			<?php get_sidebar( 'left' ); ?>
			<section id="main" class="main" role="main">
				<?php do_action( 'ct_mission_main_top' );
				if ( function_exists( 'yoast_breadcrumb' ) ) {
					yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
				}
