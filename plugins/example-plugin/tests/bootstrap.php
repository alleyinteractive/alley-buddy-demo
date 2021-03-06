<?php
/**
 * Example Plugin Tests: Bootstrap File
 *
 * @package Example_Plugin
 * @subpackage Tests
 */

// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedConstantFound
const WP_TESTS_PHPUNIT_POLYFILLS_PATH = __DIR__ . '/../vendor/yoast/phpunit-polyfills';

// Load Core's test suite.
$example_plugin_tests_dir = getenv( 'WP_TESTS_DIR' );
if ( ! $example_plugin_tests_dir ) {
	$example_plugin_tests_dir = '/tmp/wordpress-tests-lib';
}

require_once $example_plugin_tests_dir . '/includes/functions.php'; // phpcs:ignore WordPressVIPMinimum.Files.IncludingFile.UsingVariable

/**
 * Setup our environment.
 */
function example_plugin_manually_load_environment() {
	/*
	 * Tests won't start until the uploads directory is scanned, so use the
	 * lightweight directory from the test install.
	 *
	 * @see https://core.trac.wordpress.org/changeset/29120.
	 */
	add_filter(
		'pre_option_upload_path',
		function () {
			return ABSPATH . 'wp-content/uploads';
		}
	);

	// Load this plugin.
	require_once dirname( __DIR__ ) . '/example-plugin.php';
}
tests_add_filter( 'muplugins_loaded', 'example_plugin_manually_load_environment' );

// Disable the emoji detection script, because it throws unnecessary errors.
tests_add_filter(
	'init',
	function () {
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	}
);

// Include core's bootstrap.
require $example_plugin_tests_dir . '/includes/bootstrap.php'; // phpcs:ignore WordPressVIPMinimum.Files.IncludingFile.UsingVariable
