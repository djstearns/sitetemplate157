<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Audits');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Audits'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->data['Audit']['id'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = 'Audits: ' . $this->data['Audit']['id'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

echo $this->Form->create('Audit');

?>
<div class="audits row-fluid">
	<div class="span8">
		<ul class="nav nav-tabs">
		<?php
			echo $this->Croogo->adminTab(__d('croogo', 'Audit'), '#audit');
			echo $this->Croogo->adminTabs();
		?>
		</ul>

		<div class="tab-content">
			<div id='audit' class="tab-pane">
			<?php
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
				echo $this->Form->input('event', array(
					'label' => 'Event',
				));
				echo $this->Form->input('model', array(
					'label' => 'Model',
				));
				echo $this->Form->input('entity_id', array(
					'label' => 'Entity Id',
				));
				echo $this->Form->input('json_object', array(
					'label' => 'Json Object',
				));
				echo $this->Form->input('description', array(
					'label' => 'Description',
				));
				echo $this->Form->input('source_id', array(
					'label' => 'Source Id',
				));
			?>
			</div>
			<?php echo $this->Croogo->adminTabs(); ?>
		</div>

	</div>

	<div class="span4">
	<?php
		echo $this->Html->beginBox(__d('croogo', 'Publishing')) .
			$this->Form->button(__d('croogo', 'Apply'), array('name' => 'apply')) .
			$this->Form->button(__d('croogo', 'Save'), array('class' => 'btn btn-primary')) .
			$this->Html->link(__d('croogo', 'Cancel'), array('action' => 'index'), array('class' => 'btn btn-danger')) .
			$this->Html->endBox();
		?>
	</div>

</div>
<?php echo $this->Form->end(); ?>
