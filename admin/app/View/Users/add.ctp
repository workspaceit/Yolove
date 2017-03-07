<?php

echo $this->Session->flash(); ?>
<div class="row-fluid">
    <div class="span12 table_action" id="admin_categories">   
        <?php echo $this->Form->create('User'); ?>
        <fieldset>
            <div class="page-header position-relative">
                <h1>
                    Add User
                    <small>
                        <i class="icon-double-angle-right"></i>
                    </small>
                </h1>
            </div>
            <h4 class="green"><i class="icon-tags green"></i>Add User Basic Information</h4>
            <?php
            echo $this->Form->input('email', array('type' => 'email'));
            echo '<label for="UsersPassword">Password</label>';
            echo $this->Form->input('passwd', array('required' => 'required', 'label' => false, 'value' => ''));
            echo $this->Form->input('nickname', array('required' => 'required'));
            ?>
        </fieldset>
        <button class="btn btn-info" type="submit">
            <i class="icon-ok bigger-110"></i>
            Submit
        </button>
        <a class="btn btn-danger" href="<?php echo $this->webroot; ?>Users">
            <i class="icon-remove bigger-110"></i>
            Cancel
        </a>
    </div>
</div>