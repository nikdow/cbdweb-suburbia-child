<?php
// Check if we are on mobile
function jetpackme_is_mobile() {
 
    // Are Jetpack Mobile functions available?
    if ( ! function_exists( 'jetpack_is_mobile' ) )
        return false;
 
    // Is Mobile theme showing?
    if ( isset( $_COOKIE['akm_mobile'] ) && $_COOKIE['akm_mobile'] == 'false' )
        return false;
  
    return jetpack_is_mobile();
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(), array( 'parent-style' ) );
	if ( jetpackme_is_mobile() ) {
		wp_enqueue_style( 'mobile-style', get_stylesheet_directory_uri() . '/mobile.css' );
	}
}
function code_shortcode( $atts, $content = null ) {
	return '<span class="code">' . $content . '</span>';
}
add_shortcode( 'code', 'code_shortcode' );
