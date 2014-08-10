<?php
App::uses('ProjectAppController', 'Project.Controller');
/**
 * Fldbehaviors Controller
 *
 * @property Fldbehavior $Fldbehavior
 * @property PaginatorComponent $Paginator
 */
class FldbehaviorsController extends ProjectAppController {

public function beforeFilter() {
		parent::beforeFilter();
		$this->Security->unlockedActions = array('editindexsavefld','admin_editindexsavefld','admin_savehabtmfld','savehabtmfld','mobileindex','mobileadd','mobilesave','mobiledelete','admin_getlist');
		
	}

/**
 * Components
 *
 * @var array
 */
	public $components = array('Project.Csv','Paginator');

	
/**
 * admin_indexold method
 *
 * @return void
 */
	public function index() {
		$this->Fldbehavior->recursive = 0;
		$this->set('fldbehaviors', $this->paginate());
	}
    
   
    
 /**
 * admin_index method
 *
 * @return void
 */ 
          function admin_index() {
            //$this->Fldbehavior->recursive = 0;
            $this->set('fldbehaviors', $this->paginate());
             //check if this is a relationship table
                                     $fldbehaviordata = $this->Fldbehavior->find('all');
                        
           
           
                        
            		$flds = $this->Fldbehavior->Fld->find('list', array('fields'=>array($this->Fldbehavior->Fld->displayField)));

                            $arr = array();
                            foreach($flds as $item => $i){
                                $arr[] = $i;
                            }
                            $fldstr = json_encode($arr);
                        		$this->set(compact('fldbehaviordata', 'fldstr'));
            
        
	}
  	 
   
    
/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Fldbehavior->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid fldbehavior'));
		}
		$options = array('conditions' => array('Fldbehavior.' . $this->Fldbehavior->primaryKey => $id));
		$this->set('fldbehavior', $this->Fldbehavior->find('first', $options));
	}
    
 /**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Fldbehavior->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid fldbehavior'));
		}
		$options = array('conditions' => array('Fldbehavior.' . $this->Fldbehavior->primaryKey => $id));
		$this->set('fldbehavior', $this->Fldbehavior->find('first', $options));
	}



/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Fldbehavior->create();
			if ($this->Fldbehavior->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The fldbehavior has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The fldbehavior could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$flds = $this->Fldbehavior->Fld->find('list');
		$this->set(compact('flds'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Fldbehavior->create();
			if ($this->Fldbehavior->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The fldbehavior has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The fldbehavior could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		}
		$flds = $this->Fldbehavior->Fld->find('list');
		$this->set(compact('flds'));
	}


/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Fldbehavior->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid fldbehavior'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Fldbehavior->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The fldbehavior has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The fldbehavior could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Fldbehavior.' . $this->Fldbehavior->primaryKey => $id));
			$this->request->data = $this->Fldbehavior->find('first', $options);
		}
		$flds = $this->Fldbehavior->Fld->find('list');
		$this->set(compact('flds'));
	}
    
    

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Fldbehavior->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid fldbehavior'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Fldbehavior->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The fldbehavior has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The fldbehavior could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Fldbehavior.' . $this->Fldbehavior->primaryKey => $id));
			$this->request->data = $this->Fldbehavior->find('first', $options);
		}
		$flds = $this->Fldbehavior->Fld->find('list');
		$this->set(compact('flds'));
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
		$this->Fldbehavior->id = $id;
		if (!$this->Fldbehavior->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid fldbehavior'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Fldbehavior->delete()) {
			$this->Session->setFlash(__d('croogo', 'Fldbehavior deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Fldbehavior was not deleted'), 'default', array('class' => 'error'));
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
		$this->Fldbehavior->id = $id;
		if (!$this->Fldbehavior->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid fldbehavior'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Fldbehavior->delete()) {
			$this->Session->setFlash(__d('croogo', 'Fldbehavior deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Fldbehavior was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
    
    function admin_import(){
		$path = getcwd();
		$this->set(compact('path'));

		if (isset($this->request->data['Fldbehavior']['file']['tmp_name']) &&
			is_uploaded_file($this->request->data['Fldbehavior']['file']['tmp_name'])) {
			$destination = $path . '/'. $this->request->data['Fldbehavior']['file']['name'];
			move_uploaded_file($this->request->data['Fldbehavior']['file']['tmp_name'], $destination);
			$filename = getcwd().'/'.$this->request->data['Fldbehaviort']['file']['name'];
			$this->data = $this->Csv->import($filename);
			if($this->Fldbehavior->saveAll($this->data)){
				$this->Session->setFlash(__d('croogo', 'File imported successfully.'), 'default', array('class' => 'success'));
			}
		}
	}
    
     function admin_getlist(){
		$this->Fldbehavior->recursive = 0;
    	$this->autoRender = false;
		$items = $this->Fldbehavior->find('all');
		$items = Hash::combine($items, '{n}.Fldbehavior.id', '{n}');
		$newitems = array();
		foreach($items as $i => $item){
			$item['Fldbehavior']['text'] = $item['Fldbehavior'][$this->Fldbehavior->displayField];
			$newitems[] = $item['Fldbehavior'];
		}
        echo json_encode($newitems);
        
    }
    
    function admin_export(){
		$this->autoRender = false;
		$data = $this->Fldbehavior->find('all');
		$filename = $this->plugin.'-'.$this->name.'Export'.date('Y-m-d-H-m-s').'.csv';
		$urlname = $this->base.'/'.$filename;
		$this->Csv->export(getcwd().'/'.$filename, $data);
		$this->redirect('http://localhost/'.$urlname);
	
	}
    
	function mobileindex() {
		$this->Fldbehavior->recursive = -1;
		$this->autoRender = false;
		$check = $this->Fldbehavior->find('all', array('limit'=>200));
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
		$this->Fldbehavior->create();
		if ($this->Fldbehavior->save($_POST)) {
			$check = array(
			'logged' => false,
			'message' => 'Saved!',
			'id'=>$this->Fldbehavior->getLastInsertId()
			);	
		} else {
			$this->Session->setFlash(__('The Fldbehavior could not be saved. Please, try again.', true));
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
        $this->Fldbehavior->id=$_POST['id'];
		if ($this->Fldbehavior->save($_POST)) {
			$check = array(
            'id'=>$_POST['id'],
			'logged' => false,
			'message' => 'Saved!',
			);	
		} else {
			$this->Session->setFlash(__('The Fldbehavior could not be saved. Please, try again.', true));
		}
		if($check) {
			
			$response = $check;
				
		} else {
			$response = array(
				'logged' => false,
				'message' => 'Invalid Fldbehavior'
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
						'message' => 'Fldbehavior did not exist remotely!'
					);
			
		}
		if ($this->Fldbehavior->delete($id)) {
			$response = array(
						'logged' => false,
						'message' => 'Fldbehavior deleted!'
					);
					
		}else{
			$response = array(
						'logged' => false,
						'id'=>$id,
						'message' => 'Fldbehavior not deleted!'
					);
		}
					
		echo json_encode($response);
	}    
    
  
     function savehabtmfld(){
  
		$this->autoRender = false;
		$this->Fldbehavior->id = $_POST['pk'];
        $tr = substr($_POST['name'],0,strpos($_POST['name'],'__'));
		$ids = $this->Fldbehavior->$tr->find('list', array('fields'=>array('id'), 'conditions'=>array(str_replace('__','.',$_POST['name'])=>$_POST['value'])));
		$this->data = array('Fldbehavior'=>array('id'=>$_POST['pk']),substr($_POST['name'],0,strpos($_POST['name'],'__'))=>array(substr($_POST['name'],0,strpos($_POST['name'],'__'))=>$ids));
		
		if($this->Fldbehavior->save($this->data)) {
			$response = true;
				
		} else {
			$response = false;
		}
		echo json_encode($response);
	}
    
    
     function admin_savehabtmfld(){
  
		$this->autoRender = false;
		$this->Fldbehavior->id = $_POST['pk'];
        $tr = substr($_POST['name'],0,strpos($_POST['name'],'__'));
		$ids = $this->Fldbehavior->$tr->find('list', array('fields'=>array('id'), 'conditions'=>array(str_replace('__','.',$_POST['name'])=>$_POST['value'])));
		$this->data = array('Fldbehavior'=>array('id'=>$_POST['pk']),substr($_POST['name'],0,strpos($_POST['name'],'__'))=>array(substr($_POST['name'],0,strpos($_POST['name'],'__'))=>$ids));
		
		if($this->Fldbehavior->save($this->data)) {
			$response = true;
				
		} else {
			$response = false;
		}
		echo json_encode($response);
	}
  
     function admin_deleteall() {
		$this->autoRender = false;
		$arr = array();
		foreach($this->data['Fldbehavior'] as $fldbehavior_id => $del){
			if($del == 1 ){$arr[] = $fldbehavior_id;}
		}
		if($this->Fldbehavior->deleteAll(array('Fldbehavior.id'=>$arr))) {
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
			$this->Fldbehavior->id = $_POST['pk'];
			if($this->Fldbehavior->saveField($_POST['name'],$_POST['value'])) {
				$response = true;	
			} else {
				$response = false;
			}
		}
		
		if(isset($_POST['check'])){
			$_POST['value'] = $_POST['check'];
			$this->Fldbehavior->id = $_POST['pk'];
			if($this->Fldbehavior->saveField($_POST['name'],$_POST['value'])) {
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
			$this->Fldbehavior->id = $_POST['pk'];
			if($this->Fldbehavior->saveField($_POST['name'],$_POST['value'])) {
				$response = true;	
			} else {
				$response = false;
			}
		}
		
		if(isset($_POST['check'])){
			$_POST['value'] = $_POST['check'];
			$this->Fldbehavior->id = $_POST['pk'];
			if($this->Fldbehavior->saveField($_POST['name'],$_POST['value'])) {
				$response = intval($_POST['check']);	
			} else {
				$response = false;
			}
		}
	
		echo json_encode($response);
   
	}}
?>