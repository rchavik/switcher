<?php

class SwitcherHelper extends AppHelper {

	public $helpers = array(
		'Form',
	);

/**
 * Gets a list of available layouts
 */
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

/**
 * Get a list of available themes
 */
	public function themes() {
		if (isset($this->_View->viewVars['switcherLayouts'])) {
			$keys = array_keys($this->_View->viewVars['switcherLayouts']);
			if (!empty($keys)) {
				return array_combine($keys, $keys);
			} else {
				return array();
			}
		} else {
			return array();
		}
	}

/**
 * Outputs a select element formatted so that it will be processed
 * by Meta behavior
 */
	public function select($key, $options = array(), $fieldOptions = array()) {
		$fieldOptions = Set::merge(array(
			'meta' => true,
			'model' => false,
			'fields' => array(
				'theme' => 'theme',
				'layout' => 'layout',
				),
			), $fieldOptions);
		switch ($key) {
			case 'switcher_theme':
				$field = $fieldOptions['model'] . '.' . $fieldOptions['fields']['theme'];
				$values = $this->themes();
			break;
			case 'switcher_layout':
				$field = $fieldOptions['model'] . '.' . $fieldOptions['fields']['layout'];
				$values = $this->layouts();
			break;
			default:
				$field = false;
				$values = array();
			break;
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
		if ($fieldOptions['meta'] === true) {
			$uuid = String::uuid();
			$this->Form->unlockField("Meta.{$uuid}.id");
			$this->Form->unlockField("Meta.{$uuid}.key");
			$this->Form->unlockField("Meta.{$uuid}.value");
			$out .= $this->Form->input("Meta.{$uuid}.id", array(
				'type' => 'hidden',
				'value' => $data['id'],
				'div' => false,
				'label' => false,
			));

			$out .= $this->Form->input("Meta.{$uuid}.key", array('type' => 'hidden', 'value' => $key));
			$out .= $this->Form->input("Meta.${uuid}.value", $options);
		} else {
			$out .= $this->Form->input($field, $options);
		}
		return $out;
	}

}
