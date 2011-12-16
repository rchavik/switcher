<?php

echo $this->Form->unlockField('Params.layout');
echo $this->Form->unlockField('Params.theme');

echo $this->Form->input('Params.theme', array(
	'empty' => true,
	'options' => $this->Switcher->themes(),
	));

echo $this->Form->input('Params.layout', array(
	'empty' => true,
	'rel' => __d('switcher', 'Selecting a layout will automatically activate its theme'),
	'options' => $this->Switcher->layouts(),
	));
