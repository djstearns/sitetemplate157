<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Audits'), h($audit['Audit']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Audits'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('croogo', 'Audit'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('croogo', 'Edit Audit'), array('action' => 'edit', $audit['Audit']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('croogo', 'Delete Audit'), array('action' => 'delete', $audit['Audit']['id']), array('button' => 'danger', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $audit['Audit']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Audits'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Audit'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'List Audit Deltas'), array('controller' => 'audit_deltas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('croogo', 'New Audit Delta'), array('controller' => 'audit_deltas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="audits view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($audit['Audit']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Event'); ?></dt>
		<dd>
			<?php echo h($audit['Audit']['event']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Model'); ?></dt>
		<dd>
			<?php echo h($audit['Audit']['model']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Entity Id'); ?></dt>
		<dd>
			<?php echo h($audit['Audit']['entity_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Json Object'); ?></dt>
		<dd>
			<?php echo h($audit['Audit']['json_object']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Description'); ?></dt>
		<dd>
			<?php echo h($audit['Audit']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Source Id'); ?></dt>
		<dd>
			<?php echo h($audit['Audit']['source_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Created'); ?></dt>
		<dd>
			<?php echo h($audit['Audit']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
