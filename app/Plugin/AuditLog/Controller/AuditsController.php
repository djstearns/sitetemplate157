<?php
App::uses('AuditLogAppController', 'AuditLog.Controller');
/**
 * Audits Controller
 *
 * @property Audit $Audit
 * @property PaginatorComponent $Paginator
 */
class AuditsController extends AuditLogAppController {

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
		$this->Audit->recursive = 0;
		$this->set('audits', $this->paginate());
	}
    
   
    
 /**
 * admin_index method
 *
 * @return void
 */ 
          function admin_index() {
            //$this->Audit->recursive = 0;
            $this->set('audits', $this->paginate());
             //check if this is a relationship table
                                     $auditdata = $this->Audit->find('all');
                        
           
           
                        
            		$this->set(compact('auditdata'));
            
        
	}
  	 
   
    
/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Audit->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid audit'));
		}
		$options = array('conditions' => array('Audit.' . $this->Audit->primaryKey => $id));
		$this->set('audit', $this->Audit->find('first', $options));
	}
    
 /**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Audit->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid audit'));
		}
		$options = array('conditions' => array('Audit.' . $this->Audit->primaryKey => $id));
		$this->set('audit', $this->Audit->find('first', $options));
	}



/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Audit->create();
			if ($this->Audit->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The audit has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The audit could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Audit->create();
			if ($this->Audit->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The audit has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The audit could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
	}


/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Audit->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid audit'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Audit->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The audit has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The audit could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Audit.' . $this->Audit->primaryKey => $id));
			$this->request->data = $this->Audit->find('first', $options);
		}
	}
    
    

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Audit->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid audit'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Audit->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The audit has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The audit could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Audit.' . $this->Audit->primaryKey => $id));
			$this->request->data = $this->Audit->find('first', $options);
		}
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
		$this->Audit->id = $id;
		if (!$this->Audit->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid audit'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Audit->delete()) {
			$this->Session->setFlash(__d('croogo', 'Audit deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Audit was not deleted'), 'default', array('class' => 'error'));
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
		$this->Audit->id = $id;
		if (!$this->Audit->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid audit'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Audit->delete()) {
			$this->Session->setFlash(__d('croogo', 'Audit deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Audit was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
    
    function admin_import(){
		$path = getcwd();
		$this->set(compact('path'));

		if (isset($this->request->data['Audit']['file']['tmp_name']) &&
			is_uploaded_file($this->request->data['Audit']['file']['tmp_name'])) {
			$destination = $path . '/'. $this->request->data['Audit']['file']['name'];
			move_uploaded_file($this->request->data['Audit']['file']['tmp_name'], $destination);
			$filename = getcwd().'/'.$this->request->data['Auditt']['file']['name'];
			$this->data = $this->Csv->import($filename);
			if($this->Audit->saveAll($this->data)){
				$this->Session->setFlash(__d('croogo', 'File imported successfully.'), 'default', array('class' => 'success'));
			}
		}
	}
    
     function admin_getlist(){
		$this->Audit->recursive = 0;
    	$this->autoRender = false;
		$items = $this->Audit->find('all');
		$items = Hash::combine($items, '{n}.Audit.id', '{n}');
		$newitems = array();
		foreach($items as $i => $item){
			$item['Audit']['text'] = $item['Audit'][$this->Audit->displayField];
			$newitems[] = $item['Audit'];
		}
        echo json_encode($newitems);
        
    }
    
    function admin_export(){
		$this->autoRender = false;
		$data = $this->Audit->find('all');
		$filename = $this->plugin.'-'.$this->name.'Export'.date('Y-m-d-H-m-s').'.csv';
		$urlname = $this->base.'/'.$filename;
		$this->Csv->export(getcwd().'/'.$filename, $data);
		$this->redirect('http://localhost/'.$urlname);
	
	}
    
	function mobileindex() {
		$this->Audit->recursive = -1;
		$this->autoRender = false;
		$check = $this->Audit->find('all', array('limit'=>200));
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
		$this->Audit->create();
		if ($this->Audit->save($_POST)) {
			$check = array(
			'logged' => false,
			'message' => 'Saved!',
			'id'=>$this->Audit->getLastInsertId()
			);	
		} else {
			$this->Session->setFlash(__('The Audit could not be saved. Please, try again.', true));
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
        $this->Audit->id=$_POST['id'];
		if ($this->Audit->save($_POST)) {
			$check = array(
            'id'=>$_POST['id'],
			'logged' => false,
			'message' => 'Saved!',
			);	
		} else {
			$this->Session->setFlash(__('The Audit could not be saved. Please, try again.', true));
		}
		if($check) {
			
			$response = $check;
				
		} else {
			$response = array(
				'logged' => false,
				'message' => 'Invalid Audit'
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
						'message' => 'Audit did not exist remotely!'
					);
			
		}
		if ($this->Audit->delete($id)) {
			$response = array(
						'logged' => false,
						'message' => 'Audit deleted!'
					);
					
		}else{
			$response = array(
						'logged' => false,
						'id'=>$id,
						'message' => 'Audit not deleted!'
					);
		}
					
		echo json_encode($response);
	}    
    
  
     function savehabtmfld(){
  
		$this->autoRender = false;
		$this->Audit->id = $_POST['pk'];
        $tr = substr($_POST['name'],0,strpos($_POST['name'],'__'));
		$ids = $this->Audit->$tr->find('list', array('fields'=>array('id'), 'conditions'=>array(str_replace('__','.',$_POST['name'])=>$_POST['value'])));
		$this->data = array('Audit'=>array('id'=>$_POST['pk']),substr($_POST['name'],0,strpos($_POST['name'],'__'))=>array(substr($_POST['name'],0,strpos($_POST['name'],'__'))=>$ids));
		
		if($this->Audit->save($this->data)) {
			$response = true;
				
		} else {
			$response = false;
		}
		echo json_encode($response);
	}
    
    
     function admin_savehabtmfld(){
  
		$this->autoRender = false;
		$this->Audit->id = $_POST['pk'];
        $tr = substr($_POST['name'],0,strpos($_POST['name'],'__'));
		$ids = $this->Audit->$tr->find('list', array('fields'=>array('id'), 'conditions'=>array(str_replace('__','.',$_POST['name'])=>$_POST['value'])));
		$this->data = array('Audit'=>array('id'=>$_POST['pk']),substr($_POST['name'],0,strpos($_POST['name'],'__'))=>array(substr($_POST['name'],0,strpos($_POST['name'],'__'))=>$ids));
		
		if($this->Audit->save($this->data)) {
			$response = true;
				
		} else {
			$response = false;
		}
		echo json_encode($response);
	}
  
     function admin_deleteall() {
		$this->autoRender = false;
		$arr = array();
		foreach($this->data['Audit'] as $audit_id => $del){
			if($del == 1 ){$arr[] = $audit_id;}
		}
		if($this->Audit->deleteAll(array('Audit.id'=>$arr))) {
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
			$this->Audit->id = $_POST['pk'];
			if($this->Audit->saveField($_POST['name'],$_POST['value'])) {
				$response = true;	
			} else {
				$response = false;
			}
		}
		
		if(isset($_POST['check'])){
			$_POST['value'] = $_POST['check'];
			$this->Audit->id = $_POST['pk'];
			if($this->Audit->saveField($_POST['name'],$_POST['value'])) {
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
			$this->Audit->id = $_POST['pk'];
			if($this->Audit->saveField($_POST['name'],$_POST['value'])) {
				$response = true;	
			} else {
				$response = false;
			}
		}
		
		if(isset($_POST['check'])){
			$_POST['value'] = $_POST['check'];
			$this->Audit->id = $_POST['pk'];
			if($this->Audit->saveField($_POST['name'],$_POST['value'])) {
				$response = intval($_POST['check']);	
			} else {
				$response = false;
			}
		}
	
		echo json_encode($response);
   
	}}
?>