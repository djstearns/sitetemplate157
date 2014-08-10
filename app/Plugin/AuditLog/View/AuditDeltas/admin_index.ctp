<?php
$this->viewVars['title_for_layout'] = __d('croogo', 'Audit Deltas');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Audit Deltas'), array('action' => 'index'));

?>
<div class="auditDeltas index">
		<table class="table table-striped">
	<tr>
	<th></th>	
	   
	<th><?php echo $this->Paginator->sort('id'); ?></th>
	   
	<th><?php echo $this->Paginator->sort('audit_id'); ?></th>
	   
	<th><?php echo $this->Paginator->sort('property_name'); ?></th>
	   
	<th><?php echo $this->Paginator->sort('old_value'); ?></th>
	   
	<th><?php echo $this->Paginator->sort('new_value'); ?></th>
			<th class="actions"><?php echo __d('croogo', 'Actions'); ?></th>
	</tr>

	<?php $i = 0; ?>
<?php foreach ($auditDeltas as $auditDelta): ?>
<?php $i++; ?>	<tr id='$auditDelta['AuditDelta']['id']'>
	<td>
<?php echo $this->Form->input($auditDelta['AuditDelta']['id'], array('type'=>'checkbox', 'class'=>'markdelete', 'value'=>$auditDelta['AuditDelta']['id'], 'label'=>false)); ?>
	</td>
		<td><?php echo $this->Html->link($auditDelta['AuditDelta']['id'], '#', array('id'=>'id','data-url'=>$this->here.'/editindexsavefld', 'data-type'=>'text', 'data-pk'=> $auditDelta['AuditDelta']['id'], 'class'=>'editable editable-click jclass', 'style'=>'display: inline;', 'other'=>'')); ?></td>
		<td><?php echo $this->Html->link($auditDelta['Audit']['id'], '#', array('data-source'=>$this->base.'/admin/'.$this->params['plugin'].'/audits/getlist' ,'id'=>'audit_id','data-url'=>$this->here.'/editindexsavefld', 'data-type'=>'select2', 'data-pk'=> $auditDelta['AuditDelta']['id'], 'class'=>'editable editable-click dclass-Audit', 'style'=>'display: inline;')); ?></td>
		<td><?php echo $this->Html->link($auditDelta['AuditDelta']['property_name'], '#', array('id'=>'property_name','data-url'=>$this->here.'/editindexsavefld', 'data-type'=>'text', 'data-pk'=> $auditDelta['AuditDelta']['id'], 'class'=>'editable editable-click jclass', 'style'=>'display: inline;', 'other'=>'')); ?></td>
		<td><?php echo $this->Html->link($auditDelta['AuditDelta']['old_value'], '#', array('id'=>'old_value','data-url'=>$this->here.'/editindexsavefld', 'data-type'=>'text', 'data-pk'=> $auditDelta['AuditDelta']['id'], 'class'=>'editable editable-click jclass', 'style'=>'display: inline;', 'other'=>'')); ?></td>
		<td><?php echo $this->Html->link($auditDelta['AuditDelta']['new_value'], '#', array('id'=>'new_value','data-url'=>$this->here.'/editindexsavefld', 'data-type'=>'text', 'data-pk'=> $auditDelta['AuditDelta']['id'], 'class'=>'editable editable-click jclass', 'style'=>'display: inline;', 'other'=>'')); ?></td>
		<td class="item-actions">
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'view', $auditDelta['AuditDelta']['id']), array('icon' => 'eye-open')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'edit', $auditDelta['AuditDelta']['id']), array('icon' => 'pencil')); ?>
			<?php echo $this->Croogo->adminRowAction('', array('action' => 'delete', $auditDelta['AuditDelta']['id']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', $auditDelta['AuditDelta']['id'])); ?>
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
//fix me below!
			var Auditslist = [];
			$.each(<?php echo json_encode($audits); ?>, function(k, v) {
				Auditslist.push({id: k, text: v});
			}); 
			
			$('.dclass-Audit').editable({
				source: Auditslist,
				select2: {
					width: 200,
					placeholder: 'Select Audit',
					allowClear: true
				} 
			});
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