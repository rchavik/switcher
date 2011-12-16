<?php

$cacheConfig = array(
	'duration' => '+10 minutes',
	'path' => CACHE . 'queries',
	'engine' => 'File',
	);

Cache::config('switcher_default', $cacheConfig);

Croogo::hookBehavior('Node', 'Params');
Croogo::hookComponent('Nodes', 'Switcher.Switcher');
Croogo::hookHelper('*', 'Switcher.Switcher');

Croogo::hookAdminTab('Nodes/admin_edit', 'Switcher', 'switcher.admin_tab_node');
Croogo::hookAdminTab('Nodes/admin_add', 'Switcher', 'switcher.admin_tab_node');
