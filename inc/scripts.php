<?php
//----------------------------------------------------------------------------------
// Load scripts and stylesheets for the front-end
//----------------------------------------------------------------------------------
function ct_mission_news_load_scripts_styles() {

	wp_enqueue_style( 'ct-mission-google-fonts', '//fonts.googleapis.com/css?family=Abril+Fatface|PT+Sans:400,700|PT+Serif:400,400i,700,700i' );
	wp_enqueue_script( 'ct-mission-js', get_template_directory_uri() . '/js/build/production.min.js', array( 'jquery' ), '', true );
	wp_localize_script( 'ct-mission-js', 'objectL10n', array(
		'openMenu'       => esc_html__( 'open menu', 'mission-news' ),
		'closeMenu'      => esc_html__( 'close menu', 'mission-news' ),
		'openChildMenu'  => esc_html__( 'open dropdown menu', 'mission-news' ),
		'closeChildMenu' => esc_html__( 'close dropdown menu', 'mission-news' )
	) );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css' );
	wp_enqueue_style( 'ct-mission-style', get_stylesheet_uri() );

	// enqueue comment-reply script only on posts & pages with comments open ( included in WP core )
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ct_mission_news_load_scripts_styles' );

//----------------------------------------------------------------------------------
// Load stylesheet for the widget & theme options page
//----------------------------------------------------------------------------------
function ct_mission_news_enqueue_admin_styles( $hook ) {

	if ( $hook == 'appearance_page_mission-options' || $hook == 'widgets.php' ) {
		wp_enqueue_style( 'ct-mission-admin-styles', get_template_directory_uri() . '/styles/admin.min.css' );
	}
}
add_action( 'admin_enqueue_scripts', 'ct_mission_news_enqueue_admin_styles' );

//----------------------------------------------------------------------------------
// Load script and stylesheet for Customizer
//----------------------------------------------------------------------------------
function ct_mission_news_enqueue_customizer_scripts() {
	wp_enqueue_style( 'ct-mission-customizer-styles', get_template_directory_uri() . '/styles/customizer.min.css' );
	wp_enqueue_script( 'ct-mission-customizer-js', get_template_directory_uri() . '/js/build/customizer.min.js', array( 'jquery' ), '', true );
}
add_action( 'customize_controls_enqueue_scripts', 'ct_mission_news_enqueue_customizer_scripts' );

//----------------------------------------------------------------------------------
// Load script for postMessage support in Customizer
//----------------------------------------------------------------------------------
function ct_mission_news_enqueue_customizer_post_message_scripts() {
	wp_enqueue_script( 'ct-mission-customizer-post-message-js', get_template_directory_uri() . '/js/build/postMessage.min.js', array( 'jquery' ), '', true );
}
add_action( 'customize_preview_init', 'ct_mission_news_enqueue_customizer_post_message_scripts' );