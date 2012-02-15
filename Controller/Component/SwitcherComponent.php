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

	public function getPaths() {
		$settings = array();
		$Path = ClassRegistry::init('Switcher.SwitcherPath');
		$paths = $Path->find('all');
		for ($i = 0, $ii = count($paths); $i < $ii; $i++) {
			$path = $paths[$i]['SwitcherPath'];
			$settings[$path['path']] = array(
				'switcher_layout' => $path['layout'],
				'switcher_theme' => $path['theme'],
				);
		}
		return $settings;
	}

	public function startup(Controller $controller) {
		$key = 'Switcher.layouts';
		if (($layouts = Cache::read($key, 'switcher_default')) === false) {
			$layouts = $this->getThemeLayouts();
			if (!empty($layouts)) {
				Cache::write($key, $layouts, 'switcher_default');
			}
		}
		Configure::write($key, $layouts);
		$controller->set('switcherLayouts', $layouts);

		$key = 'Switcher.paths';
		if (($paths = Cache::read($key, 'switcher_default')) === false) {
			$paths = $this->getPaths();
			if (!empty($paths)) {
				Cache::write($key, $paths, 'switcher_default');
			}
		}
		Configure::write($key, $paths);
		$controller->set('switcherPaths', $paths);
	}

	/**
	 * Match $this->request->here with stored paths
	 *
	 * FIXME: presumably this will FAIL with large amount of rules
	 *
	 * @param Controller $controller
	 * @return mixed array containing switcher_theme and switcher_layout keys
	 */
	protected function _getSettingForPath($controller) {
		$matched = array();
		$here = $controller->request->here;
		$rules = array_keys($controller->viewVars['switcherPaths']);
		if (empty($rules)) {
			return array();
		}
		$rules = array_map(function($item) {
			$item = '(' . str_replace('/', '\/', $item) . ')';
			return $item;
		}, $rules);
		$pathRules = '/' . implode('|', $rules) . '/';
		if (preg_match($pathRules, $here, $matches)) {
			$keys = array_keys($controller->viewVars['switcherPaths']);
			foreach ($keys as $key => $val) {
				$pattern = '/' . str_replace('/', '\/', $matches[0]) . '/';
				if (preg_match($pattern, $val, $m)) {
					$matched = $controller->viewVars['switcherPaths'][$val];
					break;
				}
			}
		}
		return $matched;
	}

	public function beforeRender(Controller $controller) {
		if ($controller->request->is('ajax') || isset($controller->request->params['admin'])) {
			return;
		}
		$params = $this->_getSettingForPath($controller);
		if (empty($params) && empty($controller->viewVars['node']['CustomFields'])) {
			return;
		}

		if (empty($params)) {
			$params = $controller->viewVars['node']['CustomFields'];
		}

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
