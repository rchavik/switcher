<?php

$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb(__('Extensions'),
		array('plugin' => 'extensions', 'controller' => 'extensions_plugins'),
		array('icon' => 'home')
	)
	->addCrumb(__('Switcher'),
		array('plugin' => 'switcher', 'controller' => 'switcher_paths', 'action' => 'index')
	)
	->addCrumb(__($switcherPath['SwitcherPath']['path']), $this->here);
?>
<?php $this->start('actions'); ?>
	<li><?php echo $this->Html->link(__('Edit Switcher Path'), array('action' => 'edit', $switcherPath['SwitcherPath']['id']), array('button' => 'default')); ?> </li>
	<li><?php echo $this->Form->postLink(__('Delete Switcher Path'), array('action' => 'delete', $switcherPath['SwitcherPath']['id']), array('button' => 'danger'), __('Are you sure you want to delete # %s?', $switcherPath['SwitcherPath']['id'])); ?> </li>
	<li><?php echo $this->Html->link(__('List Switcher Paths'), array('action' => 'index'), array('button' => 'default')); ?> </li>
	<li><?php echo $this->Html->link(__('New Switcher Path'), array('action' => 'add'), array('button' => 'default')); ?> </li>
<?php $this->end(); ?>

<dl>
	<dt><?php echo __('Id'); ?></dt>
	<dd>
		<?php echo h($switcherPath['SwitcherPath']['id']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Path'); ?></dt>
	<dd>
		<?php echo h($switcherPath['SwitcherPath']['path']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Layout'); ?></dt>
	<dd>
		<?php echo h($switcherPath['SwitcherPath']['layout']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Theme'); ?></dt>
	<dd>
		<?php echo h($switcherPath['SwitcherPath']['theme']); ?>
		&nbsp;
	</dd>
</dl>
