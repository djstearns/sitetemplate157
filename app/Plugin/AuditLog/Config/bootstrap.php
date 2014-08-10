<?php
/**
 * Routes
 *
 * AuditLog_routes.php will be loaded in main app/config/routes.php file.
 */
Croogo::hookRoutes('AuditLog');

/**
 * Behavior
 *
 * This plugin's AuditLog behavior will be attached whenever Node model is loaded.
 */
//Croogo::hookBehavior('Node', 'AuditLog.AuditLog', array());

/**
 * Component
 *
 * This plugin's AuditLog component will be loaded in ALL controllers.
 */
//Croogo::hookComponent('*', 'AuditLog.AuditLog');

/**
 * Helper
 *
 * This plugin's AuditLog helper will be loaded via NodesController.
 */
//Croogo::hookHelper('Nodes', 'AuditLog.AuditLog');

/**
 * Admin menu (navigation) OLD DEFAULT STRING WILL BE APPENDED BELOW:
 */
 /*
CroogoNav::add('extensions.children.AuditLog', array(
	'title' => 'AuditLog',
	'url' => '#',
	'children' => array(
		'AuditLog1' => array(
			'title' => 'AuditLog 1',
			'url' => array(
				'admin' => true,
				'plugin' => 'AuditLog',
				'controller' => 'AuditLog',
				'action' => 'index',
			),
		),
		'AuditLog2' => array(
			'title' => 'AuditLog 2 with a title that won\'t fit in the sidebar',
			'url' => '#',
			'children' => array(
				'AuditLog-2-1' => array(
					'title' => 'AuditLog 2-1',
					'url' => '#',
					'children' => array(
						'AuditLog-2-1-1' => array(
							'title' => 'AuditLog 2-1-1',
							'url' => '#',
							'children' => array(
								'AuditLog-2-1-1-1' => array(
									'title' => 'AuditLog 2-1-1-1',
								),
							),
						),
					),
				),
			),
		),
		'AuditLog3' => array(
			'title' => 'Chooser AuditLog',
			'url' => array(
				'admin' => true,
				'plugin' => 'AuditLog',
				'controller' => 'AuditLog',
				'action' => 'chooser',
			),
		),
		'AuditLog4' => array(
			'title' => 'RTE AuditLog',
			'url' => array(
				'admin' => true,
				'plugin' => 'AuditLog',
				'controller' => 'AuditLog',
				'action' => 'rte_AuditLog',
			),
		),
	),
));
*/
$Localization = new L10n();

//This will need to be custom also set in the field type

Croogo::mergeConfig('Wysiwyg.actions', array(
	'AuditLog/admin_rte_AuditLog' => array(
		array(
			'elements' => 'AuditLogBasic',
			'preset' => 'basic',
		),
		array(
			'elements' => 'AuditLogStandard',
			'preset' => 'standard',
			'language' => 'ja',
		),
		array(
			'elements' => 'AuditLogFull',
			'preset' => 'full',
			'language' => $Localization->map(Configure::read('Site.locale')),
		),
		array(
			'elements' => 'AuditLogCustom',
			'toolbar' => array(
				array('Format', 'Bold', 'Italic'),
				array('Copy', 'Paste'),
			),
			'uiColor' => '#ffe79a',
			'language' => 'fr',
		),
	),
));

/**
 * Admin row action
 *
 * When browsing the content list in admin panel (Content > List),
 * an extra link called 'AuditLog' will be placed under 'Actions' column.
 */
 
/* 
Croogo::hookAdminRowAction('Nodes/admin_index', 'AuditLog', 'plugin:AuditLog/controller:AuditLog/action:index/:id');
*/
/* Row action with link options */
/*
Croogo::hookAdminRowAction('Nodes/admin_index', 'Button with Icon', array(
	'plugin:AuditLog/controller:AuditLog/action:index/:id' => array(
		'options' => array(
			'icon' => 'key',
			'button' => 'success',
		),
	),
));
*/
/* Row action with icon */
/*
Croogo::hookAdminRowAction('Nodes/admin_index', 'Icon Only', array(
	'plugin:AuditLog/controller:AuditLog/action:index/:id' => array(
		'title' => false,
		'options' => array(
			'icon' => 'picture',
			'tooltip' => array(
				'data-title' => 'A nice and simple action with tooltip',
				'data-placement' => 'left',
			),
		),
	),
));
*/
/**
 * Admin tab
 *
 * When adding/editing Content (Nodes),
 * an extra tab with title 'AuditLog' will be shown with markup generated from the plugin's admin_tab_node element.
 *
 * Useful for adding form extra form fields to OTHER MODELS if necessary.
 */
 
 /*
Croogo::hookAdminTab('Nodes/admin_add', 'AuditLog', 'AuditLog.admin_tab_node');
Croogo::hookAdminTab('Nodes/admin_edit', 'AuditLog', 'AuditLog.admin_tab_node');
*/
CroogoNav::add('AuditLog', 
			array(
				'title' => 'AuditLog',
				'url' => '#',
				'children' => array(
					'audits' => array(
						'title' => 'Audits',
						'url' => '#',
						'children'=> array(
							'List' => array(
									'title' => 'List',
									'url' => array(
										'admin' => true,
										'plugin' => 'audit_log',
										'controller' => 'audits',
										'action' => 'index',
									),
								),
							'Add' => array(
								'title' => 'Add',
								'url' => array(
									'admin' => true,
									'plugin' => 'audit_log',
									'controller' => 'audits',
									'action' => 'add',
								),
							),
						)
					),
					'audit_deltas' => array(
						'title' => 'Audit Deltas',
						'url' => '#',
						'children'=> array(
							'List' => array(
									'title' => 'List',
									'url' => array(
										'admin' => true,
										'plugin' => 'audit_log',
										'controller' => 'audit_deltas',
										'action' => 'index',
									),
								),
							'Add' => array(
								'title' => 'Add',
								'url' => array(
									'admin' => true,
									'plugin' => 'audit_log',
									'controller' => 'audit_deltas',
									'action' => 'add',
								),
							),
						)
					),
				)
			)
);