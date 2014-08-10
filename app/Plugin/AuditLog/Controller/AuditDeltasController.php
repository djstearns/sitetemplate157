<?php
App::uses('AuditLogAppController', 'AuditLog.Controller');
/**
 * AuditDeltas Controller
 *
 * @property AuditDelta $AuditDelta
 * @property PaginatorComponent $Paginator
 */
class AuditDeltasController extends AuditLogAppController {

public function beforeFilter() {
		parent::beforeFilter();
		$this->Security->unlockedActions = array('editindexsavefld','admin_editindexsavefld','admin_savehabtmfld','savehabtmfld','mobileindex','mobileadd','mobilesave','mobiledelete','admin_getlist');
		
	}

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');


	
/**
 * admin_indexold method
 *
 * @return void
 */
	public function index() {
		$this->AuditDelta->recursive = 0;
		$this->set('auditDeltas', $this->paginate());
	}
    
   
    
 /**
 * admin_index method
 *
 * @return void
 */ 
          function admin_index() {
            //$this->AuditDelta->recursive = 0;
            $this->set('auditDeltas', $this->paginate());
             //check if this is a relationship table
                                    $AuditDeltadata = $this->AuditDelta->find('all');
                              
           
           
                        
            		$audits = $this->AuditDelta->Audit->find('list', array('fields'=>array($this->AuditDelta->Audit->displayField)));
		$this->set(compact('AuditDeltadata', 'audits'));
            
        
	}
  	 
   
    
/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->AuditDelta->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid audit delta'));
		}
		$options = array('conditions' => array('AuditDelta.' . $this->AuditDelta->primaryKey => $id));
		$this->set('auditDelta', $this->AuditDelta->find('first', $options));
	}
    
 /**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AuditDelta->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid audit delta'));
		}
		$options = array('conditions' => array('AuditDelta.' . $this->AuditDelta->primaryKey => $id));
		$this->set('auditDelta', $this->AuditDelta->find('first', $options));
	}



/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->AuditDelta->create();
			if ($this->AuditDelta->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The audit delta has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The audit delta could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$audits = $this->AuditDelta->Audit->find('list');
		$this->set(compact('audits'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AuditDelta->create();
			if ($this->AuditDelta->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The audit delta has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The audit delta could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$audits = $this->AuditDelta->Audit->find('list');
		$this->set(compact('audits'));
	}


/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->AuditDelta->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid audit delta'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AuditDelta->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The audit delta has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The audit delta could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('AuditDelta.' . $this->AuditDelta->primaryKey => $id));
			$this->request->data = $this->AuditDelta->find('first', $options);
		}
		$audits = $this->AuditDelta->Audit->find('list');
		$this->set(compact('audits'));
	}
    
    

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->AuditDelta->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid audit delta'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AuditDelta->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The audit delta has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The audit delta could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('AuditDelta.' . $this->AuditDelta->primaryKey => $id));
			$this->request->data = $this->AuditDelta->find('first', $options);
		}
		$audits = $this->AuditDelta->Audit->find('list');
		$this->set(compact('audits'));
	}    
    
    

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->AuditDelta->id = $id;
		if (!$this->AuditDelta->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid audit delta'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AuditDelta->delete()) {
			$this->Session->setFlash(__d('croogo', 'Audit delta deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Audit delta was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
    
 /**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->AuditDelta->id = $id;
		if (!$this->AuditDelta->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid audit delta'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AuditDelta->delete()) {
			$this->Session->setFlash(__d('croogo', 'Audit delta deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Audit delta was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
    
    function admin_import(){
		$path = getcwd();
		$this->set(compact('path'));

		if (isset($this->request->data['AuditDelta']['file']['tmp_name']) &&
			is_uploaded_file($this->request->data['AuditDelta']['file']['tmp_name'])) {
			$destination = $path . '/'. $this->request->data['AuditDelta']['file']['name'];
			move_uploaded_file($this->request->data['AuditDelta']['file']['tmp_name'], $destination);
			$filename = getcwd().'/'.$this->request->data['AuditDeltat']['file']['name'];
			$this->data = $this->Csv->import($filename);
			if($this->AuditDelta->saveAll($this->data)){
				$this->Session->setFlash(__d('croogo', 'File imported successfully.'), 'default', array('class' => 'success'));
			}
		}
	}
    
     function admin_getlist(){
		$this->AuditDelta->recursive = 0;
    	$this->autoRender = false;
		$items = $this->AuditDelta->find('all');
		$items = Hash::combine($items, '{n}.AuditDelta.id', '{n}');
		$newitems = array();
		foreach($items as $i => $item){
			$item['AuditDelta']['text'] = $item['AuditDelta'][$this->AuditDelta->displayField];
			$newitems[] = $item['AuditDelta'];
		}
        echo json_encode($newitems);
        
    }
    
    function admin_export(){
		$this->autoRender = false;
		$data = $this->AuditDelta->find('all');
		$filename = $this->plugin.'-'.$this->name.'Export'.date('Y-m-d-H-m-s').'.csv';
		$urlname = $this->base.'/'.$filename;
		$this->Csv->export(getcwd().'/'.$filename, $data);
		$this->redirect('http://localhost/'.$urlname);
	
	}
    
	function mobileindex() {
		$this->AuditDelta->recursive = -1;
		$this->autoRender = false;
		$check = $this->AuditDelta->find('all', array('limit'=>200));
		$save = array();
		if($check) {
			
			$response = $check;
				
		} else {
			$response = array(
				'logged' => false,
				'message' => 'Invalid user'
			);
		}
		echo json_encode($response);
	}
    
    function mobileadd() {
		$this->autoRender = false;
		$this->AuditDelta->create();
		if ($this->AuditDelta->save($_POST)) {
			$check = array(
			'logged' => false,
			'message' => 'Saved!',
			'id'=>$this->AuditDelta->getLastInsertId()
			);	
		} else {
			$this->Session->setFlash(__('The AuditDelta could not be saved. Please, try again.', true));
		}
		if($check) {
			
			$response = $check;
				
		} else {
			$response = array(
				'logged' => false,
				'message' => 'Invalid user'
			);
		}
		echo json_encode($response);
	}
    
     function mobilesave() {
		$this->autoRender = false;
        $this->AuditDelta->id=$_POST['id'];
		if ($this->AuditDelta->save($_POST)) {
			$check = array(
            'id'=>$_POST['id'],
			'logged' => false,
			'message' => 'Saved!',
			);	
		} else {
			$this->Session->setFlash(__('The AuditDelta could not be saved. Please, try again.', true));
		}
		if($check) {
			
			$response = $check;
				
		} else {
			$response = array(
				'logged' => false,
				'message' => 'Invalid AuditDelta'
			);
		}
		echo json_encode($response);
	}
    
    function mobiledelete($id = null) {
    	if(!isset($id)){
        	$id = $_POST['id'];
       	}
		if (!$id) {
			$response = array(
						'logged' => false,
						'message' => 'AuditDelta did not exist remotely!'
					);
			
		}
		if ($this->AuditDelta->delete($id)) {
			$response = array(
						'logged' => false,
						'message' => 'AuditDelta deleted!'
					);
					
		}else{
			$response = array(
						'logged' => false,
						'id'=>$id,
						'message' => 'AuditDelta not deleted!'
					);
		}
					
		echo json_encode($response);
	}    
    
  
     function savehabtmfld(){
  
		$this->autoRender = false;
		$this->AuditDelta->id = $_POST['pk'];
        $tr = substr($_POST['name'],0,strpos($_POST['name'],'__'));
		$ids = $this->AuditDelta->$tr->find('list', array('fields'=>array('id'), 'conditions'=>array(str_replace('__','.',$_POST['name'])=>$_POST['value'])));
		$this->data = array('AuditDelta'=>array('id'=>$_POST['pk']),substr($_POST['name'],0,strpos($_POST['name'],'__'))=>array(substr($_POST['name'],0,strpos($_POST['name'],'__'))=>$ids));
		
		if($this->AuditDelta->save($this->data)) {
			$response = true;
				
		} else {
			$response = false;
		}
		echo json_encode($response);
	}
    
    
     function admin_savehabtmfld(){
  
		$this->autoRender = false;
		$this->AuditDelta->id = $_POST['pk'];
        $tr = substr($_POST['name'],0,strpos($_POST['name'],'__'));
		$ids = $this->AuditDelta->$tr->find('list', array('fields'=>array('id'), 'conditions'=>array(str_replace('__','.',$_POST['name'])=>$_POST['value'])));
		$this->data = array('AuditDelta'=>array('id'=>$_POST['pk']),substr($_POST['name'],0,strpos($_POST['name'],'__'))=>array(substr($_POST['name'],0,strpos($_POST['name'],'__'))=>$ids));
		
		if($this->AuditDelta->save($this->data)) {
			$response = true;
				
		} else {
			$response = false;
		}
		echo json_encode($response);
	}
  
     function admin_deleteall() {
		$this->autoRender = false;
		$arr = array();
		foreach($this->data['AuditDelta'] as $auditDelta_id => $del){
			if($del == 1 ){$arr[] = $auditDelta_id;}
		}
		if($this->AuditDelta->deleteAll(array('AuditDelta.id'=>$arr))) {
			$this->Session->setFlash(__('Deleted.', true));
			$this->redirect(array('action' => 'editindex'));
		
		}else{
			$this->Session->setFlash(__('Could not be deleted.', true));
			$this->redirect(array('action' => 'editindex'));
		}

	}
    
  
    function admin_editindexsavefld() {
    
    	$this->autoRender = false;
	
		if(isset($_POST['value'])){
			$this->AuditDelta->id = $_POST['pk'];
			if($this->AuditDelta->saveField($_POST['name'],$_POST['value'])) {
				$response = true;	
			} else {
				$response = false;
			}
		}
		
		if(isset($_POST['check'])){
			$_POST['value'] = $_POST['check'];
			$this->AuditDelta->id = $_POST['pk'];
			if($this->AuditDelta->saveField($_POST['name'],$_POST['value'])) {
				$response = intval($_POST['check']);	
			} else {
				$response = false;
			}
		}
	
		echo json_encode($response);
   
	}
    
    function editindexsavefld() {
    
    	$this->autoRender = false;
	
		if(isset($_POST['value'])){
			$this->AuditDelta->id = $_POST['pk'];
			if($this->AuditDelta->saveField($_POST['name'],$_POST['value'])) {
				$response = true;	
			} else {
				$response = false;
			}
		}
		
		if(isset($_POST['check'])){
			$_POST['value'] = $_POST['check'];
			$this->AuditDelta->id = $_POST['pk'];
			if($this->AuditDelta->saveField($_POST['name'],$_POST['value'])) {
				$response = intval($_POST['check']);	
			} else {
				$response = false;
			}
		}
	
		echo json_encode($response);
   
	}}
?>