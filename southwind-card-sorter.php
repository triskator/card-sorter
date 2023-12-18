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
	wp_enqueue_style( 'drag-and-drop', plugins_url( 'southwind-card-sorter/css/style.css' ), array(), '1.0.0' );
	wp_enqueue_script( 'sw-drag-and-drop', plugins_url( 'southwind-card-sorter/js/sw-draggable.js' ), array( 'jquery' ), '1.0.0' );
}

add_shortcode( 'sw_card_sorter', 'sw_card_sorter_func' );

function sw_card_sorter_func( $atts ) {
	// step 1
	$html  = '<div class="south-wind-cards-wrapper step1">';
	$html .= '<div class="south-wind-cards-col draggable-container  cards-unsorted">
	<h3 class="title">Unsorted</h3>';
	// $html .= '<div class="south-wind-cards cards-unsorted">';
	if ( have_rows( 'cards', 'option' ) ) :

		// Loop through rows.
		while ( have_rows( 'cards', 'option' ) ) :
			the_row();

			// Load sub field value.
			$sub_value = get_sub_field( 'card_name' );
			$html     .= sprintf( '<p class="south-wind-card shallow-draggable" draggable="true">%s</p>', $sub_value );

			// End loop.
		endwhile;
	endif;
	// $html .= '</div>';
	$html .= '</div>';

	$html .= '<div class="south-wind-cards-col draggable-container cards-most">
	<h3 class="title">Most Important</h3>';
	// $html .= '<div class="south-wind-cards cards-most">';
	// $html .= '</div>';
	$html .= '</div>';

	$html .= '<div class="south-wind-cards-col draggable-container cards-middle">
	<h3 class="title">Middle Important</h3>';
	// $html .= '<div class="south-wind-cards cards-middle">';
	// $html .= '</div>';
	$html .= '</div>';

	$html .= '<div class="south-wind-cards-col draggable-container cards-least">
	<h3 class="title">Least Important</h3>';
	// $html .= '<div class="south-wind-cards cards-least">';
	// $html .= '</div>';
	$html .= '</div>';

	$html .= '</div>';
	// step 2
	$html .= '<div class="south-wind-cards-wrapper step2">';
	$html .= '<div class="south-wind-cards-col draggable-container  cards-unsorted">
	<h3 class="title">Unsorted</h3>';
	$html .= '</div>';

	$html .= '</div>';
	return $html;
}
