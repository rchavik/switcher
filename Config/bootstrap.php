<?php

$cacheConfig = array(
	'duration' => '+10 minutes',
	'path' => CACHE . 'queries',
	'engine' => 'File',
	);

Cache::config('switcher_default', $cacheConfig);

Croogo::hookBehavior('Node', 'Switcher.Switcher');
Croogo::hookComponent('*', 'Switcher.Switcher');
Croogo::hookHelper('*', 'Switcher.Switcher');

Croogo::hookAdminTab('Nodes/admin_edit', 'Switcher', 'switcher.admin_tab_node');
Croogo::hookAdminTab('Nodes/admin_add', 'Switcher', 'switcher.admin_tab_node');

CroogoNav::add('extensions.children.switcher', array(
    'title' => 'Switcher',
	'url' => '#',
	'children' => array(
		'paths' => array(
			'title' => 'Paths',
			'url' => array(
				'admin' => true,
				'plugin' => 'switcher',
				'controller' => 'switcher_paths',
				'action' => 'index',
				),
			'weight' => 10,
			),
		'nodes' => array(
			'title' => 'Nodes',
			'url' => array(
				'admin' => true,
				'plugin' => 'nodes',
				'controller' => 'nodes',
				'action' => 'index',
				),
			'weight' => 20,
			),
		),
    ));
