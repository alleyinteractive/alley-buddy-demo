<?php
/**
 * Reusable extensions for an example site.
 *
 * Plugin Name: Example Plugin
 * Plugin URI: https://github.com/alleyinteractive/alley-buddy-demo
 * Description: Extensions to an example site.
 * Version: 1.0.0
 * Author: Alley
 *
 * @package Example_Plugin
 */

namespace Example_Plugin;

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
