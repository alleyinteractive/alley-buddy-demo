<?php
/**
 * Example Plugin Tests: Test_Sample Class
 *
 * @package Example_Plugin
 * @subpackage Tests
 */

namespace Example_Plugin;

use WP_UnitTestCase;

/**
 * A sample test.
 */
class Test_Sample extends WP_UnitTestCase {

	/**
	 * Tests the functionality of example_function.
	 */
	public function test_example_function() {
		$this->assertEquals( 4, example_function( 2 ) );
	}
}
