<?php
function wesen_enqueue_styles() {
  wp_enqueue_style( 'main-style', get_stylesheet_uri() );
  wp_enqueue_style( 'sub-style', get_template_directory_uri() . '/assets/css/custom-style.css', array( 'main-style' ) );
}
add_action( 'wp_enqueue_scripts', 'wesen_enqueue_styles' );

function add_scripts() { 
  wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/assets/js/custom.js', '', '202302', true );
}
add_action('wp_print_scripts', 'add_scripts');

function add_async_to_script( $tag, $handle, $src ) {
  if ( 'custom-script' === $handle ) {
    $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
  }
  return $tag;
}
add_filter( 'script_loader_tag', 'add_async_to_script', 10, 3 );

function custom_mime_types( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'custom_mime_types' );

if ( ! function_exists( 'wesen_theme_setup' ) ) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which runs
   * before the init hook. The init hook is too late for some features, such as indicating
   * support for post thumbnails.
   */function wesen_theme_setup() {
      add_theme_support( 'custom-logo' );
      add_theme_support( 'wp-block-styles' );
      add_theme_support( 'align-wide' );
      add_theme_support( 'disable-custom-font-sizes' );
      add_theme_support( 'disable-custom-colors' );
      add_theme_support( 'responsive-embeds' );
  }
endif;
add_action( 'after_setup_theme', 'wesen_theme_setup' );

register_nav_menus( array(
	'nav' => 'Header',
	'nav-footer' => 'Footer',
) );
?>