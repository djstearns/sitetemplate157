<?php

App::uses('AppModel', 'Model');
App::Uses('SessionComponent', 'Controller/Console');

/**
 * Example App Model
 *
 * @category Example.Model
 * @package  Croogo.Example.Model
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class ExampleAppModel extends AppModel {
	public function currentUser() {
	  	$user = SessionComponent::read('Auth.User.id');
	  return array('id'=>$user); # Return the complete user array
	}

}
