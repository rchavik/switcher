<?php

$this->extend('/Common/admin_index');
$this->viewVars['title_for_layout'] = __('Path Switchers');

$this->Html
	->addCrumb(__('Extensions'),
		array('plugin' => 'extensions', 'controller' => 'extensions_plugins'),
		array('icon' => 'home')
	)
	->addCrumb(__('Switcher'),
		array('plugin' => 'switcher', 'controller' => 'switcher_paths', 'action' => 'index')
	);
?>

<table class="table table-striped">
	<tr>
		<th><?php echo $this->Paginator->sort('id');?></th>
		<th><?php echo $this->Paginator->sort('path');?></th>
		<th><?php echo $this->Paginator->sort('layout');?></th>
		<th><?php echo $this->Paginator->sort('theme');?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($switcherPaths as $switcherPath): ?>
	<tr>
		<td><?php echo h($switcherPath['SwitcherPath']['id']); ?>&nbsp;</td>
		<td><?php echo h($switcherPath['SwitcherPath']['path']); ?>&nbsp;</td>
		<td><?php echo h($switcherPath['SwitcherPath']['layout']); ?>&nbsp;</td>
		<td><?php echo h($switcherPath['SwitcherPath']['theme']); ?>&nbsp;</td>
		<td class="item-actions">
		<?php
			echo $this->Croogo->adminRowAction('',
				array('action' => 'edit', $switcherPath['SwitcherPath']['id']),
				array('tooltip' => __('Edit'), 'icon' => 'pencil'));
			echo $this->Croogo->adminRowAction('',
				array('action' => 'delete', $switcherPath['SwitcherPath']['id']),
				array('tooltip' => __('Delete'), 'icon' => 'trash'),
				__('Are you sure you want to delete # %s?', $switcherPath['SwitcherPath']['id']));
		?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
