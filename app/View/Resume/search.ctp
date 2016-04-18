<!--ResumeController SearchResume-->
<?php
echo $this->Html->link('Main Page',array('controller'=>'resume','action'=>'index'));
echo"<br />";
echo $this->Html->link('Add new resume',array('controller'=>'resume','action'=>'add'));
?>
<h1>Search resume</h1>
<?php
echo $this->Form->create('Resume');
echo $this->Form->input('sfirst_name',array('label'=>'Enter your first name'));
echo $this->Form->input('slast_name',array('label'=>'Enter your last name'));
echo $this->Form->input('skeywords',array('label'=>'Enter keywords name'));
echo $this->Form->end('Search resume');

if(isset($search_res))
{
    echo "<table><tr><th>Id</th><th>First name</th><th>Last name</th><th>Resume file</th></tr>";
    foreach($search_res as $item)
    {
        echo "<tr><td>{$item['Resume']['id']}</td>";
        echo "<td>{$item['Resume']['first_name']}</td>";
        echo "<td>{$item['Resume']['last_name']}</td>";
        echo "<td>{$item['Resume']['resume_file']}</td></tr>";
    }
    echo "</table>";
    echo $this->paginator->counter()."&nbsp;";
    echo $this->Paginator->prev('<< Previous',array(),null,array('class'=>'disabled'))."&nbsp;";
    echo $this->paginator->next('Next >>',array(),null,array('class'=>'disabled'));
}
?>