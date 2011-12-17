<?php

class SwitcherComponent extends Component {

	public $components = array(
		'Croogo',
		);

	protected function _getLayouts($path) {
		$path = $path . 'Layouts';
		if (!file_exists($path)) {
			return array();
		}
		$Folder = new Folder($path);
		$files = $Folder->find('.*\.ctp', true);
		array_walk($files, function($val, $key) use (&$files) {
			list($layout, $ext) = explode('.', $val);
			$files[$key] = $layout;
		});
		$files = array_flip($files);
		foreach ($files as $file => $junk) {
			$files[$file]  = array(
				'path' => $path . DS . $file . '.ctp'
				);
		}
		return $files;
	}

	public function getThemeLayouts() {
		$themes = $this->Croogo->getThemes();
		$available = array();
		foreach ($themes as $theme) {
			if ($theme == 'default') { continue; }
			$path = App::themePath($theme);
			$layouts = $this->_getLayouts($path);
			$available[$theme] = compact('path', 'layouts');
		}
		return $available;
	}

	public function startup(Controller $controller) {
		$key = 'Switcher.layouts';
		if (($layouts = Cache::read($key, 'switcher_default')) === false) {
			$layouts = $this->getThemeLayouts();
			if (!empty($layouts)) {
				Cache::write($key, $layouts, 'switcher_default');
			}
		}
		Configure::write('Switcher.layouts', $layouts);
		$controller->set('switcherLayouts', $layouts);
	}

	public function beforeRender(Controller $controller) {
		if (empty($controller->viewVars['node']['CustomFields'])) {
			return;
		}
		$params = $controller->viewVars['node']['CustomFields'];
		if (!empty($params['switcher_theme'])) {
			$controller->theme = $params['switcher_theme'];
		}
		if (!empty($params['switcher_layout'])) {
			list($theme, $layout) = explode('.', $params['switcher_layout']);
			$controller->theme = $theme;
			$controller->layout = $layout;
		}
	}
}
