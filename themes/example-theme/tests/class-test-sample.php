<?php
/**
 * Example Theme Tests: Test_Sample Class
 *
 * @package Example_Theme
 * @subpackage Tests
 */

namespace Example_Theme;

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
