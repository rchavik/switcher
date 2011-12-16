<?php

class SwitcherHelper extends AppHelper {

	public function layouts() {
		if (isset($this->_View->viewVars['switcherLayouts'])) {
			$themedLayouts = $this->_View->viewVars['switcherLayouts'];
		} else {
			return array();
		}
		$options = array();
		foreach ($themedLayouts as $theme => $data) {
			$layouts = array();
			$themeLayouts = array_keys($data['layouts']);
			foreach ($themeLayouts as $layout) {
				$layouts[$theme . '.' . $layout] = $layout;
			}
			$options[$theme] = $layouts;
		}
		return $options;
	}

	public function themes() {
		if (isset($this->_View->viewVars['switcherLayouts'])) {
			$keys = array_keys($this->_View->viewVars['switcherLayouts']);
			return array_combine($keys, $keys);
		} else {
			return array();
		}
	}

}
