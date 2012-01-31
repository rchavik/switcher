<?php
App::uses('SwitcherPathsController', 'Switcher.Controller');

/**
 * TestSwitcherPathsController *
 */
class TestSwitcherPathsController extends SwitcherPathsController {
/**
 * Auto render
 *
 * @var boolean
 */
	public $autoRender = false;

/**
 * Redirect action
 *
 * @param mixed $url
 * @param mixed $status
 * @param boolean $exit
 * @return void
 */
	public function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

/**
 * SwitcherPathsController Test Case
 *
 */
class SwitcherPathsControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('plugin.switcher.switcher_path', 'app.block', 'app.region', 'app.link', 'app.menu', 'app.setting', 'app.node', 'app.user', 'app.role', 'app.comment', 'app.meta', 'app.taxonomy', 'app.term', 'app.vocabulary', 'app.type', 'app.types_vocabulary', 'app.nodes_taxonomy', 'plugin.sites.site', 'plugin.sites.site_domain', 'plugin.sites.sites_node');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->SwitcherPaths = new TestSwitcherPathsController();
		$this->SwitcherPaths->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SwitcherPaths);

		parent::tearDown();
	}

/**
 * testAdminIndex method
 *
 * @return void
 */
	public function testAdminIndex() {

	}
/**
 * testAdminView method
 *
 * @return void
 */
	public function testAdminView() {

	}
/**
 * testAdminAdd method
 *
 * @return void
 */
	public function testAdminAdd() {

	}
/**
 * testAdminEdit method
 *
 * @return void
 */
	public function testAdminEdit() {

	}
/**
 * testAdminDelete method
 *
 * @return void
 */
	public function testAdminDelete() {

	}
}
