<?php
class UsersController extends AppController {
    
    public $paginate = array(
        'limit' => 2, 
        'order' => array(
            'User.id' => 'asc'
        )
    );
        
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }
    
    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect(array('controller'=>'resume','action'=>'index'));
            } else {
                $this->Session->setFlash(__('Invalid username or password, try again'));
            }
        }
    }
    
    public function logout() {
        if($this->Auth->logout())
            $this->redirect(array('controller'=>'resume','action'=>'index'));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            $data = $this->request->data;
            //debug($data);
            if($data['User']['password']!=$data['User']['repeat_password']){
                $this->Session->setFlash('Passwords must be equall.');
            }
            else{
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('The user has been saved'));
                    $this->redirect(array('controller'=>'resume','action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                }
            }
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash(__('Undefined user'));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            //$this->request->data['User']['hidden_password'] = $this->request->data['User']['password']; 
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash(__('Undefined user'));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
}

?>