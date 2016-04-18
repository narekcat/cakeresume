<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Edit User'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('edit_password',array('label'=>'Password','type'=>'password'));
        //echo $this->Form->input('hidden_password',array('type'=>'hidden'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>