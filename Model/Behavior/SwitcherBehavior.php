<?php

class SwitcherBehavior extends ModelBehavior {

	/**
	 * Copy then remove switcher related keys from node['Meta'] array
	 */
	public function afterFind($model, $results = array()) {
		$switcherKeys = array('switcher_theme', 'switcher_layout');
		foreach ($results as &$result) {
			if (!isset($result['Meta'])) { continue; }
			foreach ($result['Meta'] as $index => $meta) {
				if (!in_array($meta['key'], $switcherKeys)) { continue; }
				$result['Switcher'][$meta['key']] = array_intersect_key($meta, array('id' => '', 'key' => '', 'value' => ''));
				unset($result['Meta'][$index]);
			}
		}
		return $results;
	}

}
