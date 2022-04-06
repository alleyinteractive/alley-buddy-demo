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

add_action(
	'enqueue_block_editor_assets',
	function () {
		// Get the path to the PHP file containing the dependencies.
		$dependency_file = __DIR__ . '/build/slotfills.bundle.min.asset.php';
		if ( empty( $dependency_file ) ) {
			return;
		}

		// Ensure the filepath is valid.
		if ( ! file_exists( $dependency_file ) || 0 !== validate_file( $dependency_file ) ) {
			return;
		}

		// Try to load the dependencies.
		// phpcs:ignore WordPressVIPMinimum.Files.IncludingFile.UsingVariable
		$dependencies = require $dependency_file;
		if ( empty( $dependencies['dependencies'] ) || ! is_array( $dependencies['dependencies'] ) ) {
			return;
		}

		// Enqueue the slotfills script with dependencies.
		wp_enqueue_script(
			'example-plugin-slotfills',
			plugins_url( 'build', __FILE__ ) . '/slotfills.bundle.min.js',
			$dependencies['dependencies'],
			$dependencies['version'],
			true
		);
	}
);
