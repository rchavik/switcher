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
		$contents = $Folder->read();
		$files = $contents[1];
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
		if (empty($controller->viewVars['node']['Params'])) {
			return;
		}
		$params = $controller->viewVars['node']['Params'];
		if (!empty($params['theme'])) {
			$controller->theme = $params['theme'];
		}
		if (!empty($params['layout'])) {
			list($theme, $layout) = explode('.', $params['layout']);
			$controller->theme = $theme;
			$controller->layout = $layout;
		}
	}
}
