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
	->addCrumb(__('Extensions'),
		array('plugin' => 'extensions', 'controller' => 'extensions_plugins'),
		array('icon' => 'home')
	)
	->addCrumb(__('Switcher'),
		array('plugin' => 'switcher', 'controller' => 'switcher_paths', 'action' => 'index')
	)
	->addCrumb($crumb, $this->here);

?>

<?php echo $this->Form->create('SwitcherPath');?>

<div class="row-fluid">

	<div class="span8">
		<ul class="nav nav-tabs">
			<li><a href="#switcher-main" data-toggle="tab"><?php echo __('Switcher'); ?></a></li>
		</ul>
		<div class="tab-content">
			<div id="switcher-main" class="tab-pane">
			<?php
				echo $this->Form->input('id');
				echo $this->Form->input('path', array(
					'placeholder' => __('Path'),
				));
				$options = array('meta' => false, 'model' => 'SwitcherPath');
				echo $this->element('admin_tab_node', array('fieldOptions' => $options));
			?>
			</div>
		</div>
	</div>
	<div class="span4">
	<?php
		echo $this->Html->beginBox(__('Publishing')) .
			$this->Form->button(__('Apply'), array('name' => 'apply')) .
			$this->Form->button(__('Save'), array('class' => 'btn btn-primary')) .
			$this->Html->link(__('Cancel'), array('action' => 'index'), array('class' => 'cancel btn btn-danger')) .

			$this->Html->endBox();
		
		//echo $this->Form->button(__('Apply'), array('button' => 'danger'));
		//echo $this->Form->button(__('Submit'));
	?>
	</div>
</div>

<?php echo $this->Form->end(); ?>
