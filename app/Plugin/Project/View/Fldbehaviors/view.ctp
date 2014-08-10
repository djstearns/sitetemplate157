<div class="fldbehaviors view">
<h2><?php echo __('Fldbehavior'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($fldbehavior['Fldbehavior']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($fldbehavior['Fldbehavior']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($fldbehavior['Fldbehavior']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($fldbehavior['Fldbehavior']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Fldbehavior'), array('action' => 'edit', $fldbehavior['Fldbehavior']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Fldbehavior'), array('action' => 'delete', $fldbehavior['Fldbehavior']['id']), null, __('Are you sure you want to delete # %s?', $fldbehavior['Fldbehavior']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Fldbehaviors'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fldbehavior'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Flds'), array('controller' => 'flds', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Fld'), array('controller' => 'flds', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Flds'); ?></h3>
	<?php if (!empty($fldbehavior['Fld'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Pobject Id'); ?></th>
		<th><?php echo __('Display'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Ftype Id'); ?></th>
		<th><?php echo __('Defaultvalue'); ?></th>
		<th><?php echo __('Length'); ?></th>
		<th><?php echo __('Nullable'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($fldbehavior['Fld'] as $fld): ?>
		<tr>
			<td><?php echo $fld['id']; ?></td>
			<td><?php echo $fld['pobject_id']; ?></td>
			<td><?php echo $fld['display']; ?></td>
			<td><?php echo $fld['name']; ?></td>
			<td><?php echo $fld['ftype_id']; ?></td>
			<td><?php echo $fld['defaultvalue']; ?></td>
			<td><?php echo $fld['length']; ?></td>
			<td><?php echo $fld['nullable']; ?></td>
			<td><?php echo $fld['created']; ?></td>
			<td><?php echo $fld['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'flds', 'action' => 'view', $fld['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'flds', 'action' => 'edit', $fld['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'flds', 'action' => 'delete', $fld['id']), null, __('Are you sure you want to delete # %s?', $fld['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Fld'), array('controller' => 'flds', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
