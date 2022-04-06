<?php
/**
 * Example Theme Functions
 *
 * @package Example_Theme
 */

namespace Example_Theme;

/**
 * An example function for use in a sample test. Squares a provided value.
 *
 * @param int $value The value to square.
 *
 * @return int The square of the value.
 */
function example_function( int $value ): int {
	return $value * $value;
}

// Add scripts and styles to the front-end.
add_action(
	'wp_enqueue_scripts',
	function () {
		wp_enqueue_script( 'example-theme-script', get_template_directory_uri() . '/build/example-script.bundle.min.js', [], '1.0.0', true );
		wp_enqueue_style( 'example-theme-style', get_template_directory_uri() . '/build/css/example-script.min.css', [], '1.0.0' );
	}
);
