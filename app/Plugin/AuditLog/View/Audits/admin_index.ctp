<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Audits');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Audits'), array('action' => 'index'));

?>
<div class="audits index">
		<table class="table table-striped">
	<tr>
	<th></th>	
	   
	<th><?php echo $this->Paginator->sort('id'); ?></th>
	   
	<th><?php echo $this->Paginator->sort('event'); ?></th>
	   
	<th><?php echo $this->Paginator->sort('model'); ?></th>
	   
	<th><?php echo $this->Paginator->sort('entity_id'); ?></th>
	   
	<th><?php echo $this->Paginator->sort('json_object'); ?></th>
	   
	<th><?php echo $this->Paginator->sort('description'); ?></th>
	   
	<th><?php echo $this->Paginator->sort('source_id'); ?></th>
	   
	<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>

	<?php $i = 0; ?>
<?php foreach ($audits as $audit): ?>
<?php $i++; ?>	<tr id='$audit['Audit']['id']'>
	<td>
<?php echo $this->Form->input($audit['Audit']['id'], array('type'=>'checkbox', 'class'=>'markdelete', 'value'=>$audit['Audit']['id'], 'label'=>false)); ?>
	</td>
		<td><?php echo $this->Html->link($audit['Audit']['id'], '#', array('id'=>'id','data-url'=>$this->here.'/editindexsavefld', 'data-type'=>'text', 'data-pk'=> $audit['Audit']['id'], 'class'=>'editable editable-click jclass', 'style'=>'display: inline;', 'other'=>'')); ?></td>
		<td><?php echo $this->Html->link($audit['Audit']['event'], '#', array('id'=>'event','data-url'=>$this->here.'/editindexsavefld', 'data-type'=>'text', 'data-pk'=> $audit['Audit']['id'], 'class'=>'editable editable-click jclass', 'style'=>'display: inline;', 'other'=>'')); ?></td>
		<td><?php echo $this->Html->link($audit['Audit']['model'], '#', array('id'=>'model','data-url'=>$this->here.'/editindexsavefld', 'data-type'=>'text', 'data-pk'=> $audit['Audit']['id'], 'class'=>'editable editable-click jclass', 'style'=>'display: inline;', 'other'=>'')); ?></td>
		<td><?php echo $this->Html->link($audit['Audit']['entity_id'], '#', array('id'=>'entity_id','data-url'=>$this->here.'/editindexsavefld', 'data-type'=>'text', 'data-pk'=> $audit['Audit']['id'], 'class'=>'editable editable-click jclass', 'style'=>'display: inline;', 'other'=>'')); ?></td>
		<td><?php echo $this->Html->link($audit['Audit']['json_object'], '#', array('id'=>'json_object','data-url'=>$this->here.'/editindexsavefld', 'data-type'=>'text', 'data-pk'=> $audit['Audit']['id'], 'class'=>'editable editable-click jclass', 'style'=>'display: inline;', 'other'=>'')); ?></td>
		<td><?php echo $this->Html->link($audit['Audit']['description'], '#', array('id'=>'description','data-url'=>$this->here.'/editindexsavefld', 'data-type'=>'text', 'data-pk'=> $audit['Audit']['id'], 'class'=>'editable editable-click jclass', 'style'=>'display: inline;', 'other'=>'')); ?></td>
		<td><?php echo $this->Html->link($audit['Audit']['source_id'], '#', array('id'=>'source_id','data-url'=>$this->here.'/editindexsavefld', 'data-type'=>'text', 'data-pk'=> $audit['Audit']['id'], 'class'=>'editable editable-click jclass', 'style'=>'display: inline;', 'other'=>'')); ?></td>
		<td><?php echo $this->Html->link($audit['Audit']['created'], '#', array('value'=>$audit['Audit']['created'], 'id'=>'created','data-url'=>$this->here.'/editindexsavefld', 'data-type'=>'datetime', 'data-pk'=> $audit['Audit']['id'], 'class'=>'editable editable-click datetimepicker', 'style'=>'display: inline;')); ?></td>		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $audit['Audit']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $audit['Audit']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $audit['Audit']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $audit['Audit']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	</div>
<script type="text/javascript">
$('.deleteall').click( function (e) {
	e.preventDefault();
	var allVals = [];
	$('.markdelete:checked').each(function() {
	   allVals.push($(this).val());
	 });
	 $.ajax({
	  type: "POST", 
	  url: <?php echo "'".$this->here."/deleteall'"; ?>,	  data: allVals,
	  success: function(data, config) {
		$('.markdelete:checked').each(function() {
		   $('#'+$(this).val()).hide();
		 });
	  }  
	});
	 return false;
	
});

$.fn.editable.defaults.mode = 'inline';

$('.jclass').editable();
		$(function(){
			$('.datetimepicker').editable({
				format: 'yyyy-mm-dd hh:ii',    
				viewformat: 'dd/mm/yyyy hh:ii',    
				datetimepicker: {
						weekStart: 1
				   }
				
			});
		});
		$('.dclass-checkbox').click( function (e){
			e.preventDefault();
			var linkitem = $(this);
			//$(this).attr("src","");
			var id = $(this).attr('id');
			var value = $(this).attr('value');
			var pk = $(this).attr('data-pk');
			$.ajax({
			  type: "POST", 
			  url: <?php echo "'".$this->here."/editindexsavefld'"; ?>,			  data: {"name":id,"check":value,"pk":pk},
			  success: function(data, config) {
				if(data == '1'){
					$(linkitem).attr("src", "<?php echo $this->base; ?>/project/img/icons/tick.png");					$(linkitem).attr("value", 0);
				}else{
					$(linkitem).attr("src", "<?php echo $this->base; ?>/project/img/icons/cross.png");					$(linkitem).attr("value", 1);
				}
			  }
			  
			});
			 return false;
		});
</script>