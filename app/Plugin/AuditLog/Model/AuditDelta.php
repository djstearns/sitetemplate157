<?php
App::uses('AuditLogAppModel', 'AuditLog.Model');
/**
 * AuditDelta Model
 *
 * @property Audit $Audit
 */
class AuditDelta extends AuditLogAppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'property_name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Audit' => array(
			'className' => 'Audit',
			'foreignKey' => 'audit_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
