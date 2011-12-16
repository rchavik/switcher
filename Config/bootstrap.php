<?php

Croogo::hookBehavior('Node', 'Params');
Croogo::hookComponent('Nodes', 'Switcher.Switcher');
Croogo::hookHelper('*', 'Switcher.Switcher');

Croogo::hookAdminTab('Nodes/admin_edit', 'Switcher', 'switcher.admin_tab_node');
Croogo::hookAdminTab('Nodes/admin_add', 'Switcher', 'switcher.admin_tab_node');
