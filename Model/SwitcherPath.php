<?php

App::uses('SwitcherAppModel', 'Switcher.Model');

/**
 * SwitcherPath Model
 *
 */
class SwitcherPath extends SwitcherAppModel {

	public $actsAs = array(
		'Search.Searchable',
	);

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'path';

	public $filterArgs = array(
		'path' => array('type' => 'like'),
	);

	public function afterSave($created) {
		Cache::clear(false, 'switcher_default');
	}

	public function afterDelete() {
		Cache::clear(false, 'switcher_default');
	}

}
