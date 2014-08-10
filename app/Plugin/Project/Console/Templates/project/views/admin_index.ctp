<?php

$header = <<<EOF
<?php
\$this->viewVars['title_for_layout'] = __d('croogo', '$pluralHumanName');
\$this->extend('/Common/$action');

\$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', '${pluralHumanName}'), array('action' => 'index'));

?>\n
EOF;
echo $header;

?>
<div class="<?php echo $pluralVar; ?> index">
	<?php /* echo <?php echo \$this->Form->create(null, array('action'=>'deleteall')); ?>\n" */?>
	<table class="table table-striped">
	<tr>
	<th></th>	
	<?php foreach ($fields as $field): ?>
   
	<th><?php echo "<?php echo \$this->Paginator->sort('{$field}'); ?>"; ?></th>
	<?php endforeach; ?>
	<?php
	if (!empty($associations['hasAndBelongsToMany'])) {
			foreach ($associations['hasAndBelongsToMany'] as $alias => $details) {
				
				/*echo "\t\t<td><?php foreach(\$kiddata[\$i-1]['$alias'] as \$alias){ echo \$this->Html->link(\$alias['{$details['displayField']}'], array('controller' => '{$alias}s', 'action' => 'view', \$alias['{$details['primaryKey']}'])); } ?></td>\n";
				*/
				
				echo " 
					<?php echo '<th>{$alias}</th>'\n";
			
			}
			echo " ?>\n";
		}
	?>
	<th class="actions"><?php echo "<?php echo __d('croogo', 'Actions'); ?>"; ?></th>
	</tr>

	<?php
	echo "<?php \$i = 0; ?>\n";
	echo "<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
	echo "<?php \$i++; ?>";
	echo "\t<tr id='\${$singularVar}['{$modelClass}']['id']'>\n";
	echo "\t<td>\n";
    echo "<?php echo \$this->Form->input(\${$singularVar}['{$modelClass}']['id'], array('type'=>'checkbox', 'class'=>'markdelete', 'value'=>\${$singularVar}['{$modelClass}']['id'], 'label'=>false)); ?>\n";
	echo "\t</td>\n";
		
		foreach ($fields as $field) {
			
			
			$isKey = false;
			if (!empty($associations['belongsTo'])) {
				foreach ($associations['belongsTo'] as $alias => $details) {
					if ($field === $details['foreignKey']) {
						$isKey = true;
						
						/*echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
						*/
						/*
						debugger::dump($details);
						<pre>array(
						'primaryKey' => 'id',
						'displayField' => 'name',
						'foreignKey' => 'rider_id',
						'controller' => 'riders',
						'fields' => array(
							(int) 0 => 'id',
							(int) 1 => 'name'
						)
						*/
						echo "\t\t<td><?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], '#', array('data-source'=>\$this->base.'/admin/'.\$this->params['plugin'].'/".$details['controller']."/getlist' ,'id'=>'{$field}','data-url'=>\$this->here.'/editindexsavefld', 'data-type'=>'select2', 'data-pk'=> \${$singularVar}['{$modelClass}']['{$primaryKey}'], 'class'=>'editable editable-click dclass-".$alias."', 'style'=>'display: inline;')); ?></td>\n";
						
						
						/*echo "\t\t<td><?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], '#', array('id'=>'{$field}','data-url'=>\$this->here.'/editindexsavefld', 'data-type'=>'select2', 'data-pk'=> \${$singularVar}['{$modelClass}']['{$primaryKey}'], 'class'=>'editable editable-click dclass-".$alias."', 'style'=>'display: inline;')); ?></td>\n";
						*/
						break;
					}
				}
			}

				if ($isKey !== true) {
				
				//debugger::dump($schema[$field]['type']);
			
					switch($schema[$field]['type']){
						case 'date':
						
						break;
						case 'time':
						
						break;
						case 'datetime':
						echo "\t\t<td><?php echo \$this->Html->link(\${$singularVar}['{$modelClass}']['{$field}'], '#', array('value'=>\${$singularVar}['{$modelClass}']['{$field}'], 'id'=>'{$field}','data-url'=>\$this->here.'/editindexsavefld', 'data-type'=>'datetime', 'data-pk'=> \${$singularVar}['{$modelClass}']['id'], 'class'=>'editable editable-click datetimepicker', 'style'=>'display: inline;')); ?></td>";
						
						break;
						case 'timestamp':
						
						break;
						case 'boolean':
						echo "\t\t<td><?php echo \$this->Html->image((\${$singularVar}['{$modelClass}']['{$field}'] == 1 ? '/project/img/icons/tick.png':'/project/img/icons/cross.png'), array('value'=>(\${$singularVar}['{$modelClass}']['{$field}'] == 1 ? 0:1), 'id'=>'{$field}','data-url'=>\$this->here.'/editindexsavefld', 'data-type'=>'checklist', 'data-pk'=> \${$singularVar}['{$modelClass}']['id'], 'class'=>'editable editable-click dclass-checkbox', 'style'=>'display: inline;')); ?></td>";
						break;
						case 'biginteger':
						
						break;
						case 'float':
						
						break;
						case 'binary':
						
						break;
						case 'string':
						case 'integer':
						case 'text':
						default:
						
						echo "\t\t<td><?php echo \$this->Html->link(\${$singularVar}['{$modelClass}']['{$field}'], '#', array('id'=>'{$field}','data-url'=>\$this->here.'/editindexsavefld', 'data-type'=>'text', 'data-pk'=> \${$singularVar}['{$modelClass}']['{$primaryKey}'], 'class'=>'editable editable-click jclass', 'style'=>'display: inline;', 'other'=>'')); ?></td>\n";
						
					}
				
				
			}
			
			
		}
	
		
		if (!empty($associations['hasAndBelongsToMany'])) {
			foreach ($associations['hasAndBelongsToMany'] as $alias => $details) {
				
				/*echo "\t\t<td><?php foreach(\$kiddata[\$i-1]['$alias'] as \$alias){ echo \$this->Html->link(\$alias['{$details['displayField']}'], array('controller' => '{$alias}s', 'action' => 'view', \$alias['{$details['primaryKey']}'])); } ?></td>\n";
				*/
				
				echo "
				 <td> <?php \$arr = array(); 
				 \$j = 0;
				 \$val = ".count($details['fields']).";
				  foreach(\${$singularVar}['$alias'] as \$key => \${$alias}){
						 if(isset(\${$singularVar}['$alias'][\$j]) && (\$val < count(\${$alias})) ){
				 			\$arr[] = \${$alias}['{$details['displayField']}']; 
							\$j++;
						 }
				 }
				 \$str = implode(',',\$arr); 
					echo \$this->Html->link(\$str, '#', array( 'id'=>'{$alias}__{$details['displayField']}','data-url'=>\$this->here.'/savehabtmfld', 'data-type'=>'select2', 'data-pk'=> \${$singularVar}['{$modelClass}']['{$primaryKey}'], 'class'=>'editable editable-click mclass-{$alias}', 'style'=>'display: inline;')); ?></td>
				";
			/*
				echo "
				 <td> <?php \$arr = array(); 
				 foreach(\${$singularVar}data[\$i-1]['$alias'] as \${$alias}){ \$arr[] = \${$alias}['{$details['displayField']}']; }
					\$str = implode(',',\$arr); 
					echo \$this->Html->link(\$str, '#', array( 'id'=>'{$alias}__{$details['displayField']}','data-url'=>\$this->here.'/savehabtmfld', 'data-type'=>'select2', 'data-pk'=> \${$singularVar}['{$modelClass}']['{$primaryKey}'], 'class'=>'editable editable-click mclass-{$alias}', 'style'=>'display: inline;')); ?></td>
				";
				*/
				echo "\t</td>\n";
			}
			
		}
		
		
		echo "\t\t<td class=\"item-actions\">\n";
		echo "\t\t\t<?php echo \$this->Croogo->adminRowAction('', array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('icon' => 'eye-open')); ?>\n";
		echo "\t\t\t<?php echo \$this->Croogo->adminRowAction('', array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('icon' => 'pencil')); ?>\n";
		echo "\t\t\t<?php echo \$this->Croogo->adminRowAction('', array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('icon' => 'trash', 'escape' => true), __d('croogo', 'Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
		echo "\t\t</td>\n";
	echo "\t</tr>\n";

	echo "<?php endforeach; ?>\n";
	?>
	</table>
	<?php /*echo "<?php echo \$this->Form->end('Delete'); ?>\n" */ ?>
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
	  url: <?php echo '<?php echo "\'".$this->here."/deleteall\'"; ?>,'; ?>
	  data: allVals,
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
<?php
if (!empty($associations['hasAndBelongsToMany'])) {
			foreach ($associations['hasAndBelongsToMany'] as $alias => $details) {
				
				/*echo "\$('#{$alias}__{$details['displayField']}').editable({
						inputclass: 'input-large',
							select2: {
								tags: <?php echo \$".strtolower($alias)."tr; ?>,
								tokenSeparators: [',', ' ']
							}
							});\n";	
				*/
				echo "\$('.mclass-".$alias."').editable({
						inputclass: 'input-large',
							select2: {
								tags: <?php echo \$".strtolower($alias)."str; ?>,
								tokenSeparators: [',', ' ']
							}
							});\n";	
							
			}
			
		}

if (!empty($associations['belongsTo'])) {
			foreach ($associations['belongsTo'] as $alias => $details) {
			/*	
			echo "var {$alias}slist = [];
			$.each(<?php echo json_encode(\$".strtolower($alias)."s); ?>, function(k, v) {
				{$alias}slist.push({id: k, text: v});
			}); 
			
			$('#".strtolower($alias)."_id').editable({
				source: {$alias}slist,
				select2: {
					width: 200,
					placeholder: 'Select $alias',
					allowClear: true
				} 
			});\n ";
			*/
			echo "//fix me below!
			";
			echo "var {$alias}slist = [];
			$.each(<?php echo json_encode(\$".strtolower($alias)."s); ?>, function(k, v) {
				{$alias}slist.push({id: k, text: v});
			}); 
			
			$('.dclass-".$alias."').editable({
				source: {$alias}slist,
				select2: {
					width: 200,
					placeholder: 'Select $alias',
					allowClear: true
				} 
			});\n ";
				
			}
			
		}
?>
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
			  url: <?php echo '<?php echo "\'".$this->here."/editindexsavefld\'"; ?>,'; ?>
			  data: {"name":id,"check":value,"pk":pk},
			  success: function(data, config) {
				if(data == '1'){
					$(linkitem).attr("src", "<?php echo '<?php echo $this->base; ?>/project/img/icons/tick.png");'; ?>
					$(linkitem).attr("value", 0);
				}else{
					$(linkitem).attr("src", "<?php echo '<?php echo $this->base; ?>/project/img/icons/cross.png");'; ?>
					$(linkitem).attr("value", 1);
				}
			  }
			  
			});
			 return false;
		});
</script>