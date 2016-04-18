<!--ResumeController index_view-->
<?php
echo $this->Html->link('Main page',array('controller'=>'resume','action'=>'index'));
echo "<br />";
echo "<table><tr><th>".$this->Paginator->sort('id','User id')."</th><th>".
                        $this->Paginator->sort('username','User name')."</th><th>Created</th></tr>";
foreach($users as $user)
{
    //debug($user);
    echo "<tr><td>{$user['User']['id']}</td><td>{$user['User']['username']}</td><td>";
    echo $this->Html->link('Delete',array('controller'=>'users','action' => 'delete', $user['User']['id']),
                array('confirm' => 'Are you sure?'));
    echo "&nbsp;";
    echo $this->Html->link('Edit',array('controller'=>'users','action' => 'edit', $user['User']['id']));
    echo "</td></tr>";
}
echo "</table>";
echo $this->paginator->counter()."&nbsp;";
echo $this->Paginator->prev('<< Previous',null,null,array('class'=>'disabled'))."&nbsp;";
echo $this->paginator->next('Next >>',null,null,array('class'=>'disabled'));

//debug($users);
?>