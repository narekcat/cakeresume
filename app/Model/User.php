<?php
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel {
    
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        ),
        'repeat_password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        )
    );
    
    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        else if(isset($this->data[$this->alias]['edit_password'])){
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['edit_password']);
        }
        return true;
    }
    
}

?>