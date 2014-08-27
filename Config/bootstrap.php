<?php
CroogoCache::config('switcher_default', array_merge(
	Configure::read('Cache.defaultConfig'),
	['duration' => '+10 minutes']
));

Croogo::hookBehavior('Node', 'Switcher.Switcher');
Croogo::hookComponent('*', 'Switcher.Switcher');
Croogo::hookHelper('*', 'Switcher.Switcher');

Croogo::hookAdminTab('Nodes/admin_edit', 'Switcher', 'switcher.admin_tab_node');
Croogo::hookAdminTab('Nodes/admin_add', 'Switcher', 'switcher.admin_tab_node');

CroogoNav::add('extensions.children.switcher', [
    'title' => 'Switcher',
	'url' => '#',
	'children' => [
		'paths' => [
			'title' => 'Paths',
			'url' => [
				'admin' => true,
				'plugin' => 'switcher',
				'controller' => 'switcher_paths',
				'action' => 'index',
				],
			'weight' => 10,
			],
		'nodes' => [
			'title' => 'Nodes',
			'url' => [
				'admin' => true,
				'plugin' => 'nodes',
				'controller' => 'nodes',
				'action' => 'index',
				],
			'weight' => 20,
			],
		],
    ]);
