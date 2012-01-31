<?php
	$this->viewVars['title_for_layout'] = __('Add Path Switcher');
?>
<div class="actions">
	<ul>

		<li><?php echo $this->Html->link(__('List Path Switchers'), array('action' => 'index'));?></li>
	</ul>
</div>
<div class="switcherPaths form">
<?php echo $this->Form->create('SwitcherPath');?>
	<fieldset>
		<legend><?php echo __('Add Path Switcher'); ?></legend>
	<?php
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
