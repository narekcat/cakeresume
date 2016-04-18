<?php

class Resume extends AppModel
{
    public $validate = array(
            'first_name' => array(
                'rule' => 'notEmpty'
            ),
            'last_name' => array(
                'rule' => 'notEmpty'
            ),
            'keywords' => array(
                'rule' => 'notEmpty'
            ),
            'resume_file' => array(
                /*'rule1' => array(
                    'rule' => array('mimeType', array('application/msword'))
                ),*/
                'rule2' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Please chose file'
                ),
            )
    );

    public $fieldList = array(
        'first_name',
        'last_name',
        'keywords',
        'resume_file'
    );

    public function save($data = NULL, $validate = true, $fieldList = Array())
    {
        if(!move_uploaded_file($data['Resume']['resume_file']['tmp_name'],"../resume_files/".$data['Resume']['resume_file']['name'])) return false;
        $data['Resume']['resume_file'] = $data['Resume']['resume_file']['name'];
        if(!parent::save($data, $this->validate, $this->fieldList)) return false;
        return true;
    }
}

?>
