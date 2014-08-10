<?php
App::uses('ProjectAppModel', 'Project.Model');
/**
 * Fldbehavior Model
 *
 * @property Fld $Fld
 */
class Fldbehavior extends ProjectAppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Behaviors
 *
 * @var array
 */
	public $actsAs = array('AuditLog.Auditable'
     );

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Fld' => array(
			'className' => 'Fld',
			'joinTable' => 'flds_fldbehaviors',
			'foreignKey' => 'fldbehavior_id',
			'associationForeignKey' => 'fld_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
