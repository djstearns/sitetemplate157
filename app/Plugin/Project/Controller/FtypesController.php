<?php
App::uses('ProjectAppController', 'Project.Controller');
/**
 * Ftypes Controller
 *
 * @property Ftype $Ftype
 * @property PaginatorComponent $Paginator
 */
 
class FtypesController extends ProjectAppController {

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
		$this->Ftype->recursive = 0;
		$this->set('ftypes', $this->paginate());
	}
    
   
    
 /**
 * admin_index method
 *
 * @return void
 */ 
          function admin_index() {
            //$this->Ftype->recursive = 0;
            $this->set('ftypes', $this->paginate());
             //check if this is a relationship table
                                     $ftypedata = $this->Ftype->find('all');
                        
           
           
                        
            		$this->set(compact('ftypedata'));
            
        
	}
  	 
   
    
/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Ftype->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid ftype'));
		}
		$options = array('conditions' => array('Ftype.' . $this->Ftype->primaryKey => $id));
		$this->set('ftype', $this->Ftype->find('first', $options));
	}
    
 /**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Ftype->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid ftype'));
		}
		$options = array('conditions' => array('Ftype.' . $this->Ftype->primaryKey => $id));
		$this->set('ftype', $this->Ftype->find('first', $options));
	}



/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Ftype->create();
			if ($this->Ftype->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The ftype has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The ftype could not be saved. Please, try again.'), 'default', array('class' => 'error'));
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
			$this->Ftype->create();
			if ($this->Ftype->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The ftype has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The ftype could not be saved. Please, try again.'), 'default', array('class' => 'error'));
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
		if (!$this->Ftype->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid ftype'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Ftype->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The ftype has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The ftype could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Ftype.' . $this->Ftype->primaryKey => $id));
			$this->request->data = $this->Ftype->find('first', $options);
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
		if (!$this->Ftype->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid ftype'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Ftype->save($this->request->data)) {
				$this->Session->setFlash(__d('croogo', 'The ftype has been saved'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('croogo', 'The ftype could not be saved. Please, try again.'), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Ftype.' . $this->Ftype->primaryKey => $id));
			$this->request->data = $this->Ftype->find('first', $options);
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
		$this->Ftype->id = $id;
		if (!$this->Ftype->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid ftype'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Ftype->delete()) {
			$this->Session->setFlash(__d('croogo', 'Ftype deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Ftype was not deleted'), 'default', array('class' => 'error'));
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
		$this->Ftype->id = $id;
		if (!$this->Ftype->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid ftype'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Ftype->delete()) {
			$this->Session->setFlash(__d('croogo', 'Ftype deleted'), 'default', array('class' => 'success'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', 'Ftype was not deleted'), 'default', array('class' => 'error'));
		$this->redirect(array('action' => 'index'));
	}
    
    function admin_import(){
		$path = getcwd();
		$this->set(compact('path'));

		if (isset($this->request->data['Ftype']['file']['tmp_name']) &&
			is_uploaded_file($this->request->data['Ftype']['file']['tmp_name'])) {
			$destination = $path . '/'. $this->request->data['Ftype']['file']['name'];
			move_uploaded_file($this->request->data['Ftype']['file']['tmp_name'], $destination);
			$filename = getcwd().'/'.$this->request->data['Ftypet']['file']['name'];
			$this->data = $this->Csv->import($filename);
			if($this->Ftype->saveAll($this->data)){
				$this->Session->setFlash(__d('croogo', 'File imported successfully.'), 'default', array('class' => 'success'));
			}
		}
	}
    
     function admin_getlist(){
		$this->Ftype->recursive = 0;
    	$this->autoRender = false;
		$items = $this->Ftype->find('all');
		$items = Hash::combine($items, '{n}.Ftype.id', '{n}');
		$newitems = array();
		foreach($items as $i => $item){
			$item['Ftype']['text'] = $item['Ftype'][$this->Ftype->displayField];
			$newitems[] = $item['Ftype'];
		}
        echo json_encode($newitems);
        
    }
    
    function admin_export(){
		$this->autoRender = false;
		$data = $this->Ftype->find('all');
		$filename = $this->plugin.'-'.$this->name.'Export'.date('Y-m-d-H-m-s').'.csv';
		$urlname = $this->base.'/'.$filename;
		$this->Csv->export(getcwd().'/'.$filename, $data);
		$this->redirect('http://localhost/'.$urlname);
	
	}
    
	function mobileindex() {
		$this->Ftype->recursive = -1;
		$this->autoRender = false;
		$check = $this->Ftype->find('all', array('limit'=>200));
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
		$this->Ftype->create();
		if ($this->Ftype->save($_POST)) {
			$check = array(
			'logged' => false,
			'message' => 'Saved!',
			'id'=>$this->Ftype->getLastInsertId()
			);	
		} else {
			$this->Session->setFlash(__('The Ftype could not be saved. Please, try again.', true));
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
        $this->Ftype->id=$_POST['id'];
		if ($this->Ftype->save($_POST)) {
			$check = array(
            'id'=>$_POST['id'],
			'logged' => false,
			'message' => 'Saved!',
			);	
		} else {
			$this->Session->setFlash(__('The Ftype could not be saved. Please, try again.', true));
		}
		if($check) {
			
			$response = $check;
				
		} else {
			$response = array(
				'logged' => false,
				'message' => 'Invalid Ftype'
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
						'message' => 'Ftype did not exist remotely!'
					);
			
		}
		if ($this->Ftype->delete($id)) {
			$response = array(
						'logged' => false,
						'message' => 'Ftype deleted!'
					);
					
		}else{
			$response = array(
						'logged' => false,
						'id'=>$id,
						'message' => 'Ftype not deleted!'
					);
		}
					
		echo json_encode($response);
	}    
    
  
     function savehabtmfld(){
  
		$this->autoRender = false;
		$this->Ftype->id = $_POST['pk'];
        $tr = substr($_POST['name'],0,strpos($_POST['name'],'__'));
		$ids = $this->Ftype->$tr->find('list', array('fields'=>array('id'), 'conditions'=>array(str_replace('__','.',$_POST['name'])=>$_POST['value'])));
		$this->data = array('Ftype'=>array('id'=>$_POST['pk']),substr($_POST['name'],0,strpos($_POST['name'],'__'))=>array(substr($_POST['name'],0,strpos($_POST['name'],'__'))=>$ids));
		
		if($this->Ftype->save($this->data)) {
			$response = true;
				
		} else {
			$response = false;
		}
		echo json_encode($response);
	}
    
    
     function admin_savehabtmfld(){
  
		$this->autoRender = false;
		$this->Ftype->id = $_POST['pk'];
        $tr = substr($_POST['name'],0,strpos($_POST['name'],'__'));
		$ids = $this->Ftype->$tr->find('list', array('fields'=>array('id'), 'conditions'=>array(str_replace('__','.',$_POST['name'])=>$_POST['value'])));
		$this->data = array('Ftype'=>array('id'=>$_POST['pk']),substr($_POST['name'],0,strpos($_POST['name'],'__'))=>array(substr($_POST['name'],0,strpos($_POST['name'],'__'))=>$ids));
		
		if($this->Ftype->save($this->data)) {
			$response = true;
				
		} else {
			$response = false;
		}
		echo json_encode($response);
	}
  
     function admin_deleteall() {
		$this->autoRender = false;
		$arr = array();
		foreach($this->data['Ftype'] as $ftype_id => $del){
			if($del == 1 ){$arr[] = $ftype_id;}
		}
		if($this->Ftype->deleteAll(array('Ftype.id'=>$arr))) {
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
			$this->Ftype->id = $_POST['pk'];
			if($this->Ftype->saveField($_POST['name'],$_POST['value'])) {
				$response = true;	
			} else {
				$response = false;
			}
		}
		
		if(isset($_POST['check'])){
			$_POST['value'] = $_POST['check'];
			$this->Ftype->id = $_POST['pk'];
			if($this->Ftype->saveField($_POST['name'],$_POST['value'])) {
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
			$this->Ftype->id = $_POST['pk'];
			if($this->Ftype->saveField($_POST['name'],$_POST['value'])) {
				$response = true;	
			} else {
				$response = false;
			}
		}
		
		if(isset($_POST['check'])){
			$_POST['value'] = $_POST['check'];
			$this->Ftype->id = $_POST['pk'];
			if($this->Ftype->saveField($_POST['name'],$_POST['value'])) {
				$response = intval($_POST['check']);	
			} else {
				$response = false;
			}
		}
	
		echo json_encode($response);
   
	}
}
