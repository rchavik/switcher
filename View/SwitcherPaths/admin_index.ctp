<?php
	$this->viewVars['title_for_layout'] = __('Path Switchers');
?>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('New Path Switcher'), array('action' => 'add')); ?></li>
	</ul>
</div>
<div class="switcherPaths index">
	<h2><?php echo __('Path Switchers');?></h2>
	<table cellpadding="0" cellspacing="0">
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
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $switcherPath['SwitcherPath']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $switcherPath['SwitcherPath']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $switcherPath['SwitcherPath']['id']), null, __('Are you sure you want to delete # %s?', $switcherPath['SwitcherPath']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->first();
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		echo $this->Paginator->last();
	?>
	</div>
</div>
