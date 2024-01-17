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
	wp_enqueue_style( 'drag-and-drop', plugins_url( 'southwind-card-sorter/css/style.css' ), array(), '1.0.3' );
	wp_enqueue_script( 'sw-draganddrops', plugins_url( 'southwind-card-sorter/js/draganddrop.js' ), array( 'jquery' ), '1.0.3' );
	wp_enqueue_script( 'sw-drag-and-drop', plugins_url( 'southwind-card-sorter/js/sw-draggable.js' ), array( 'jquery', 'sw-draganddrops' ), '1.0.3' );
}

add_shortcode( 'sw_card_sorter', 'sw_card_sorter_func' );

function sw_card_sorter_func( $atts ) {
	// step 1
	$html  = '<div class="south-wind-cards-row step1">';
	$html .= '<p>Sort Cards To Most Important, Middle Important and Least Important</p>';
	$html .= '<div class="south-wind-cards-wrapper">';
	$html .= '<div class="south-wind-cards-col draggable-container  cards-unsorted">
	<h3 class="title">Unsorted</h3>';
	if ( have_rows( 'cards', 'option' ) ) :
		$html .= '<ul>';
		// Loop through rows.
		while ( have_rows( 'cards', 'option' ) ) :
			the_row();

			// Load sub field value.
			$sub_value = get_sub_field( 'card_name' );
			$html     .= sprintf( '<li class="south-wind-card shallow-draggable" draggable="true">%s</li>', $sub_value );

			// End loop.
		endwhile;
		$html .= '</ul>';
	endif;
	$html .= '</div>';

	$html .= '<div class="south-wind-cards-col draggable-container cards-most">
	<h3 class="title">Most Important</h3>';
	$html .= '<ul></ul>';
	$html .= '</div>';

	$html .= '<div class="south-wind-cards-col draggable-container cards-middle">
	<h3 class="title">Middle Important</h3>';
	$html .= '<ul></ul>';
	$html .= '</div>';

	$html .= '<div class="south-wind-cards-col draggable-container cards-least">
	<h3 class="title">Least Important</h3>';
	$html .= '<ul></ul>';
	$html .= '</div>';

	$html .= '</div>';
	$html .= '<a href="#" class="south-wind-step2">Continue</a>';
	$html .= '</div>';

	// step 2
	$html .= '<div class="south-wind-cards-row step2">';
	$html .= '<p>Sort Previously Most Important Cards To New Three Piles</p>';
	$html .= '<div class="south-wind-cards-wrapper">';

	$html .= '<div class="south-wind-cards-col draggable-container  cards-unsorted">
	<h3 class="title">Unsorted</h3>';
	$html .= '<ul></ul>';
	$html .= '</div>';

	$html .= '<div class="south-wind-cards-col draggable-container cards-most">
	<h3 class="title">Most Important</h3>';
	$html .= '<ul></ul>';
	$html .= '</div>';

	$html .= '<div class="south-wind-cards-col draggable-container cards-middle">
	<h3 class="title">Middle Important</h3>';
	$html .= '<ul></ul>';
	$html .= '</div>';

	$html .= '<div class="south-wind-cards-col draggable-container cards-least">
	<h3 class="title">Least Important</h3>';
	$html .= '<ul></ul>';
	$html .= '</div>';

	$html .= '</div>';
	$html .= '<a href="#" class="south-wind-step3">Continue</a>';
	$html .= '</div>';

	// step š
	$html .= '<div class="south-wind-cards-row step3">';
	$html .= '<p>Select Top 5 From Previously Most Important</p>';
	$html .= '<div class="south-wind-cards-wrapper">';

	$html .= '<div class="south-wind-cards-col draggable-container  cards-unsorted">
	<h3 class="title">Unsorted</h3>';
	$html .= '<ul></ul>';
	$html .= '</div>';

	$html .= '<div class="south-wind-cards-col draggable-container cards-most">
	<h3 class="title">Top 5</h3>';
	$html .= '<ul></ul>';
	$html .= '</div>';

	$html .= '</div>';
	$html .= '</div>';
	return $html;
}
