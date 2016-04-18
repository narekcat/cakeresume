<!-- app/View/Users/add.ctp -->
<?php echo $this->Html->link('Main page',array('controller'=>'resume','action'=>'index'));
echo "<br />"; ?>
<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password',array('label'=>'Password','type'=>'password'));
        echo $this->Form->input('repeat_password',array('label'=>'Repeat password','type'=>'password'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>