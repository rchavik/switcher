<?php

$this->extend('/Common/admin_index');
$this->viewVars['title_for_layout'] = __('Path Switchers');

$this->Html
	->addCrumb('', '/admin', array('icon' => $_icons['home']))
	->addCrumb(__('Extensions'),
		array('plugin' => 'extensions', 'controller' => 'extensions_plugins')
	)
	->addCrumb(__('Switcher'),
		array('plugin' => 'switcher', 'controller' => 'switcher_paths', 'action' => 'index')
	);

$this->start('actions');
	echo $this->Html->link(__('New Path Switcher'), array('action' => 'add'), array('button' => 'btn btn-success'));
$this->end();

$this->start('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id', __d('croogo', 'Id')),
		$this->Paginator->sort('path', __d('croogo', 'Path')),
		$this->Paginator->sort('layout', __d('croogo', 'Layout')),
		$this->Paginator->sort('theme', __d('croogo', 'Theme')),
		__d('croogo', 'Actions'),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->start('table-body');
	$rows = array();
	foreach ($switcherPaths as $switcherPath):
		$actions = array();
		$actions[] = $this->Croogo->adminRowAction('',
			array('action' => 'view', $switcherPath['SwitcherPath']['id']),
			array('tooltip' => __('Preview'), 'icon' => 'eye-open')
		);
		$actions[] = $this->Croogo->adminRowAction('',
			array('action' => 'edit', $switcherPath['SwitcherPath']['id']),
			array('tooltip' => __('Edit'), 'icon' => 'pencil'));
		$actions[] = $this->Croogo->adminRowAction('',
			array('action' => 'delete', $switcherPath['SwitcherPath']['id']),
			array('tooltip' => __('Delete'), 'icon' => 'trash'),
			__('Are you sure you want to delete # %s?', $switcherPath['SwitcherPath']['id']));

		$rows[] = array(
			h($switcherPath['SwitcherPath']['id']),
			h($switcherPath['SwitcherPath']['path']),
			h($switcherPath['SwitcherPath']['layout']),
			h($switcherPath['SwitcherPath']['theme']),
			$this->Html->div('item-actions', implode(' ', $actions))
		);
	endforeach;

	echo $this->Html->tableCells($rows);
$this->end();
