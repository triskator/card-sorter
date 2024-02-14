<?php
/**
 * Plugin Name: Southwind Card Sorter
 * Description: Card Sorter. Depends on ACF.
 * Version: 1.0.0
 * Author: Jakub
 * Text Domain: southwind
 */
add_action( 'wp_enqueue_scripts', 'sw_enqueue_script' );
// #page-container width 100%

function sw_enqueue_script() {
	wp_enqueue_style( 'drag-and-drop', plugins_url( 'southwind-card-sorter/css/style.min.css' ), array(), '1.0.8' );
	wp_enqueue_script( 'sw-drag-and-drop', plugins_url( 'southwind-card-sorter/js/sw-draggable.js' ), array( 'jquery' ), '1.0.8' );
}

add_shortcode( 'sw_card_sorter', 'sw_card_sorter_func' );

function sw_card_sorter_func( $atts ) {
	ob_start();
	include_once __DIR__ . '/southwind-card-sorter-cards.php';
	$html = ob_get_clean();
	return $html;
}
