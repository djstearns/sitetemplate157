<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Audit Deltas');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Audit Deltas'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->data['AuditDelta']['property_name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = 'Audit Deltas: ' . $this->data['AuditDelta']['property_name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

echo $this->Form->create('AuditDelta');

?>
<div class="auditDeltas row-fluid">
	<div class="span8">
		<ul class="nav nav-tabs">
		<?php
			echo $this->Croogo->adminTab(__d('croogo', 'Audit Delta'), '#audit-delta');
			echo $this->Croogo->adminTabs();
		?>
		</ul>

		<div class="tab-content">
			<div id='audit-delta' class="tab-pane">
			<?php
				echo $this->Form->input('id');
				$this->Form->inputDefaults(array('label' => false, 'class' => 'span10'));
				echo $this->Form->input('audit_id', array(
					'label' => 'Audit Id',
				));
				echo $this->Form->input('property_name', array(
					'label' => 'Property Name',
				));
				echo $this->Form->input('old_value', array(
					'label' => 'Old Value',
				));
				echo $this->Form->input('new_value', array(
					'label' => 'New Value',
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
