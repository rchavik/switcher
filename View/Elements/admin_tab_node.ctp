<?php

echo $this->Switcher->select('switcher_theme', array(
	'label' => __d('switcher', 'Theme'),
	));

echo $this->Switcher->select('switcher_layout', array(
	'label' => __d('switcher', 'Layout'),
	'rel' => __d('switcher', 'Selecting a layout will automatically activate its theme'),
	));
