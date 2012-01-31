<?php
App::uses('SwitcherAppModel', 'Switcher.Model');
/**
 * SwitcherPath Model
 *
 */
class SwitcherPath extends SwitcherAppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'path';

	public function afterSave($created) {
		Cache::clear(false, 'switcher_default');
	}

	public function afterDelete() {
		Cache::clear(false, 'switcher_default');
	}

}
