<!--ResumeController index_view-->
<?php
//debug($is_auth);
if(!$is_auth) echo $this->Html->link('Login',array('controller'=>'users','action'=>'login'));
else echo $this->Html->link('Logout',array('controller'=>'users','action'=>'logout'));
echo "<br />";
echo $this->Html->link('Add new user',array('controller'=>'users','action'=>'add'));
echo "<br />";
echo $this->Html->link('View users list',array('controller'=>'users','action'=>'index'));
echo "<br />";
echo "<br />";
echo $this->Html->link('Add new resume',array('controller'=>'resume','action'=>'add'));
echo "<br />";
echo $this->Html->link('Search resume',array('controller'=>'resume','action'=>'search'));
echo "<br />";
?>