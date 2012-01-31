<div class="switcherPaths view">
<h2><?php  echo __('Switcher Path');?></h2>
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
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Switcher Path'), array('action' => 'edit', $switcherPath['SwitcherPath']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Switcher Path'), array('action' => 'delete', $switcherPath['SwitcherPath']['id']), null, __('Are you sure you want to delete # %s?', $switcherPath['SwitcherPath']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Switcher Paths'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Switcher Path'), array('action' => 'add')); ?> </li>
	</ul>
</div>
