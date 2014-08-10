<?php
App::uses('AuditLogAppModel', 'AuditLog.Model');
/**
 * Audit Model
 *
 * @property AuditDelta $AuditDelta
 */
class Audit extends AuditLogAppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'AuditDelta' => array(
			'className' => 'AuditDelta',
			'foreignKey' => 'audit_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
		
	);
	
	public $belongsTo = array(
		'User' => array(
			'className' => 'Users.User',
			'foreignKey' => 'source_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
