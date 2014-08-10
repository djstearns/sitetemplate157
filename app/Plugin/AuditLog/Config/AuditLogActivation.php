<?php
/**
 * AuditLog Activation
 *
 * Activation class for AuditLog plugin.
 * This is optional, and is required only if you want to perform tasks when your plugin is activated/deactivated.
 *
 * @package  Croogo
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class AuditLogActivation {

/**
 * onActivate will be called if this returns true
 *
 * @param  object $controller Controller
 * @return boolean
 */
	public function beforeActivation(&$controller) {
		return true;
	}

/**
 * Called after activating the plugin in ExtensionsPluginsController::admin_toggle()
 *
 * @param object $controller Controller
 * @return void
 */
	public function onActivation(&$controller) {
		$controller->Croogo->addAco('AuditLog/AuditLog/admin_index'); // ProjectController::admin_index()
		$controller->Croogo->addAco('AuditLog/AuditLog/index', array('registered', 'public')); // ProjectController::index()
		
		// ACL: set ACOs with permissions
		App::uses('ConnectionManager', 'Model');
		
		$db = ConnectionManager::getDataSource('default');
		
		App::uses('ShellDispatcher', 'Console');
		App::uses('BakeShell', 'Console/Command');
		App::uses('Shell', 'Console');
		App::uses('AppShell', 'Console/Command');
		App::uses('Model', 'Model');
		
		
		App::uses('CroogoPlugin', 'Extensions.Lib');
		$CroogoPlugin = new CroogoPlugin();
		$CroogoPlugin->migrate('AuditLog');
		$controller->Croogo->addAco('AuditLog/AuditLog/admin_index'); // AuditLogController::admin_index()
		$controller->Croogo->addAco('AuditLog/AuditLog/index', array('registered', 'public')); // AuditLogController::index()

		$this->Link = ClassRegistry::init('Menus.Link');

		// Main menu: add an AuditLog link
		$mainMenu = $this->Link->Menu->findByAlias('main');
		$this->Link->Behaviors->attach('Tree', array(
			'scope' => array(
				'Link.menu_id' => $mainMenu['Menu']['id'],
			),
		));
		$this->Link->save(array(
			'menu_id' => $mainMenu['Menu']['id'],
			'title' => 'AuditLog',
			'link' => 'plugin:AuditLog/controller:AuditLog/action:index',
			'status' => 1,
			'class' => 'AuditLog',
		));
		
	}

/**
 * onDeactivate will be called if this returns true
 *
 * @param  object $controller Controller
 * @return boolean
 */
	public function beforeDeactivation(&$controller) {
		return true;
	}

/**
 * Called after deactivating the plugin in ExtensionsPluginsController::admin_toggle()
 *
 * @param object $controller Controller
 * @return void
 */
	public function onDeactivation(&$controller) {
		App::uses('CroogoPlugin', 'Extensions.Lib');
		$CroogoPlugin = new CroogoPlugin();
		$CroogoPlugin->unmigrate('AuditLog');
		// ACL: remove ACOs with permissions
		$controller->Croogo->removeAco('AuditLog'); // AuditLogController ACO and it's actions will be removed

		$this->Link = ClassRegistry::init('Menus.Link');

		// Main menu: delete AuditLog link
		$link = $this->Link->find('first', array(
			'joins' => array(
				array(
					'table' => 'menus',
					'alias' => 'JoinMenu',
					'conditions' => array(
						'JoinMenu.alias' => 'main',
					),
				),
			),
			'conditions' => array(
				'Link.link' => 'plugin:AuditLog/controller:AuditLog/action:index',
			),
		));
		if (empty($link)) {
			return;
		}
		$this->Link->Behaviors->attach('Tree', array(
			'scope' => array(
				'Link.menu_id' => $link['Link']['menu_id'],
			),
		));
		if (isset($link['Link']['id'])) {
			$this->Link->delete($link['Link']['id']);
		}
	}
}
