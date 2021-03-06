<?php

$header = <<<EOF
<?php
\$this->viewVars['title_for_layout'] = __d('croogo', '$pluralHumanName');
\$this->extend('/Common/admin_edit');

\$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', '${pluralHumanName}'), array('action' => 'index'));

if (\$this->action == 'admin_edit') {
	\$this->Html->addCrumb(\$this->data['$modelClass']['$displayField'], '/' . \$this->request->url);
	\$this->viewVars['title_for_layout'] = '$pluralHumanName: ' . \$this->data['$modelClass']['$displayField'];
} else {
	\$this->Html->addCrumb(__d('croogo', 'Add'), '/' . \$this->request->url);
}

echo \$this->Form->create('{$modelClass}', array(
	'type' => 'file'));

?>\n
EOF;
echo $header;

$primaryTab = strtolower(Inflector::slug($singularHumanName, '-'));

?>
<div class="<?php echo $pluralVar; ?> row-fluid">
	<div class="span8">
		<ul class="nav nav-tabs">
		<?php echo "<?php\n"; ?>
		<?php echo "\techo \$this->Croogo->adminTab(__d('croogo', '$singularHumanName'), '#$primaryTab');\n"; ?>
		<?php echo "\techo \$this->Croogo->adminTabs();\n"; ?>
		<?php echo "?>\n"; ?>
		</ul>

		<div class="tab-content">
			<div id='<?php echo $primaryTab; ?>' class="tab-pane">
<?php
				
				echo "\$this->Form->input('file', array('label' => 'Name', 'type'=>'file'));\n";	


?>
			</div>
<?php
			echo "\t\t\t<?php echo \$this->Croogo->adminTabs(); ?>\n";
?>
		</div>

	</div>

	<div class="span4">
	<?php
		echo <<<EOF
<?php
		echo \$this->Html->beginBox(__d('croogo', 'Publishing')) .
			\$this->Form->button(__d('croogo', 'Apply'), array('name' => 'apply')) .
			\$this->Form->button(__d('croogo', 'Save'), array('class' => 'btn btn-primary')) .
			\$this->Html->link(__d('croogo', 'Cancel'), array('action' => 'index'), array('class' => 'btn btn-danger')) .
			\$this->Html->endBox();
		?>\n
EOF;
	?>
	</div>

</div>
<?php echo "<?php echo \$this->Form->end(); ?>\n"; ?>
