<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Audit Deltas'), h($auditDelta['AuditDelta']['property_name']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Audit Deltas'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Audit Delta'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Audit Delta'), array('action' => 'edit', $auditDelta['AuditDelta']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Audit Delta'), array('action' => 'delete', $auditDelta['AuditDelta']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $auditDelta['AuditDelta']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Audit Deltas'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Audit Delta'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Audits'), array('controller' => 'audits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Audit'), array('controller' => 'audits', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="auditDeltas view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($auditDelta['AuditDelta']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Audit'); ?></dt>
		<dd>
			<?php echo $this->Html->link($auditDelta['Audit']['id'], array('controller' => 'audits', 'action' => 'view', $auditDelta['Audit']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Property Name'); ?></dt>
		<dd>
			<?php echo h($auditDelta['AuditDelta']['property_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Old Value'); ?></dt>
		<dd>
			<?php echo h($auditDelta['AuditDelta']['old_value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'New Value'); ?></dt>
		<dd>
			<?php echo h($auditDelta['AuditDelta']['new_value']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
