<?php

class SwitcherHelper extends AppHelper {

	public $helpers = array(
		'Form',
		);

	/** Gets a list of available layouts */
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

	/** Get a list of available themes */
	public function themes() {
		if (isset($this->_View->viewVars['switcherLayouts'])) {
			$keys = array_keys($this->_View->viewVars['switcherLayouts']);
			return array_combine($keys, $keys);
		} else {
			return array();
		}
	}

	/** Outputs a select element formatted so that it will be processed
	 *  by Meta behavior
	 */
	public function select($key, $options = array()) {
		switch ($key) {
		case 'switcher_theme':
			$values = $this->themes(); break;
		case 'switcher_layout':
			$values = $this->layouts(); break;
		default:
			$values = array();
		}
		$options = Set::merge(array(
			'empty' => true,
			'options' => $values,
			), $options);
		if (!empty($this->data['Switcher'][$key]['value'])) {
			$options['selected'] = $this->data['Switcher'][$key]['value'];
		}

		if (!isset($this->data['Switcher'][$key])) {
			$data = array('id' => '', 'value' => '');
		} else {
			$data = $this->data['Switcher'][$key];
		}

		$out  = '';
		$uuid = String::uuid();
		$out .= $this->Form->input("Meta.{$uuid}.id", array(
			'type' => 'hidden',
			'value' => $data['id'],
			'div' => false,
			'label' => false,
			));

		$out .= $this->Form->input("Meta.{$uuid}.key", array('type' => 'hidden', 'value' => $key));
		$out .= $this->Form->input("Meta.${uuid}.value", $options);
		return $out;
	}

}
