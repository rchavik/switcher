<?php
App::uses('SwitcherPath', 'Switcher.Model');

/**
 * SwitcherPath Test Case
 *
 */
class SwitcherPathTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.switcher.switcher_path');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SwitcherPath = ClassRegistry::init('SwitcherPath');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SwitcherPath);

		parent::tearDown();
	}

}
