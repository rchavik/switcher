<?php
	$this->viewVars['title_for_layout'] = __('Edit Path Switcher');
?>
<div class="actions">
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SwitcherPath.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('SwitcherPath.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Path Switchers'), array('action' => 'index'));?></li>
	</ul>
</div>
<div class="switcherPaths form">
<?php echo $this->Form->create('SwitcherPath');?>
	<fieldset>
		<legend><?php echo __('Edit Path Switcher'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('path');
		$options = array('meta' => false, 'model' => 'SwitcherPath');
		echo $this->element('admin_tab_node', array('fieldOptions' => $options));
	?>
	</fieldset>
	<div class="buttons">
	<?php
		echo $this->Form->end(__('Submit'));
		echo $this->Html->link(__('Cancel'), array('action' => 'index'), array('class' => 'cancel'));
	?>
	</div>
</div>
