<?php

$this->extend('/Common/admin_edit');

$action = $this->request->params['action'];
if ($action == 'admin_edit') {
	$this->viewVars['title_for_layout'] = __('Edit Path Switcher');
} else {
	$this->viewVars['title_for_layout'] = __('Add Path Switcher');
}

$crumb = $action == 'admin_add' ? __('Add') : $this->data['SwitcherPath']['path'];
$this->Html
	->addCrumb('', '/admin', array('icon' => $_icons['home']))
	->addCrumb(__('Extensions'),
		array('plugin' => 'extensions', 'controller' => 'extensions_plugins')
	)
	->addCrumb(__('Switcher'),
		array('plugin' => 'switcher', 'controller' => 'switcher_paths', 'action' => 'index')
	)
	->addCrumb($crumb, $this->here);

$this->start('actions');
	echo $this->Html->link(__('List Path Switchers'), array('action' => 'index'), array('button' => 'default'));
	if ($action == 'admin_edit'):
		echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SwitcherPath.id')), array('button' => 'danger'), __('Are you sure you want to delete # %s?', $this->Form->value('SwitcherPath.id')));
	endif;
$this->end();

$this->append('form-start', $this->Form->create('SwitcherPath'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab('Switcher', '#switcher-main');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');
	echo $this->Html->tabStart('switcher-main');
		echo $this->Form->input('id');
		$this->Form->inputDefaults(array(
			'label' => false,
			'class' => 'span10',
		));
		echo $this->Form->input('path', array(
			'placeholder' => __('Path'),
		));
		$options = array('meta' => false, 'model' => 'SwitcherPath');
		echo $this->element('admin_tab_node', array('fieldOptions' => $options));
	echo $this->Html->tabEnd();

	echo $this->Croogo->adminTabs();
$this->end();

$this->start('panels');
	echo $this->Html->beginBox(__('Publishing')) .
		$this->Form->button(__('Apply'), array('name' => 'apply')) .
		$this->Form->button(__('Save'), array('class' => 'btn btn-primary')) .
		$this->Html->link(__('Cancel'), array('action' => 'index'), array('class' => 'cancel btn btn-danger')) .

		$this->Html->endBox();
$this->end();
$this->append('form-end', $this->Form->end());