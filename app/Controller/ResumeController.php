<?php

class ResumeController extends AppController{
    public $helpers = array('Form','Html','Session');
    public $components = array('Session');
    
    public $paginate = array(
        'limit' => 2, 
        'order' => array(
            'Resume.id' => 'asc'
        )
    );
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }
    
    public function index()
    {
        $this->set('is_auth',$this->Auth->user('id')==NULL?false:true);
    }
    
    public function add()
    {
        if($this->request->is('post'))
        {
            $this->Resume->create();
            $this->request->data['Resume']['user_id'] = $this->Auth->user('id');
            if($this->Resume->save($this->request->data))
            {
                $this->Session->setFlash('Your resume has been added.');
                $this->redirect(array('action'=>'index'));
            }
            else
            {
                $this->Session->setFlash('Unable to added your resume.');
            }
        }
    }
    
    public function search()
    {
        if($this->request->is('post'))
        {
            $this->Resume->create();
            $data_arr = $this->request->data;
            if($data_arr['Resume']['sfirst_name']=="" && $data_arr['Resume']['slast_name']=="" 
                                                        && $data_arr['Resume']['skeywords']=="") 
                $this->Session->setFlash('You must enter any of fields.');
            else
            {
                $data_arr['Resume']['user_id'] = $this->Auth->user('id');
                $this->Session->delete('dara_arr');
                $this->Session->write('data_arr',$data_arr);
                $this->paginate['conditions'] = 
                                array('Resume.first_name LIKE' => "%{$data_arr['Resume']['sfirst_name']}%",
                                            'Resume.last_name LIKE' => "%{$data_arr['Resume']['slast_name']}%",
                                            'Resume.keywords LIKE' => "%{$data_arr['Resume']['skeywords']}%",
                                            'Resume.user_id' => "{$data_arr['Resume']['user_id']}");
                $this->set('search_res',$this->paginate());
            }
        }
        else if($this->Session->check('data_arr'))
        {
            $data_arr = $this->Session->read('data_arr');
            $this->paginate['conditions'] = 
                                array('Resume.first_name LIKE' => "%{$data_arr['Resume']['sfirst_name']}%",
                                            'Resume.last_name LIKE' => "%{$data_arr['Resume']['slast_name']}%",
                                            'Resume.keywords LIKE' => "%{$data_arr['Resume']['skeywords']}%",
                                            'Resume.user_id' => "{$data_arr['Resume']['user_id']}");
                
            $this->set('search_res',$this->paginate());
        }
    } 
}

?>