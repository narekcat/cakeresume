<!--ResumeController add_resume-->
<?php
echo $this->Html->link('Main Page',array('controller'=>'resume','action'=>'index'));
echo"<br />";
echo $this->Html->link('Search resume',array('controller'=>'resume','action'=>'search'));
?>
<h1>Add new resume</h1>
<?php
echo $this->Form->create('Resume',array('enctype' => 'multipart/form-data'));
echo $this->Form->input('first_name',array('label'=>'Enter your first name'));
echo $this->Form->input('last_name',array('label'=>'Enter your last name'));
echo $this->Form->input('keywords',array('label'=>'Enter keywords name'));
echo $this->Form->input('resume_file', array('type' => 'file','label'=>'Upload resume file'));
echo $this->Form->end('Add resume');
?>