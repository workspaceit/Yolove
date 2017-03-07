<?php echo $this->Session->flash(); ?>
<div class="row-fluid">
    <div class="span12 table_action" id="admin_categories">   
        <?php echo $this->Form->create('User'); ?>
        <fieldset>
            <div class="page-header position-relative">
                <h1>
                    Edit Profile
                    <small>
                        <i class="icon-double-angle-right"></i>
                    </small>
                </h1>
            </div>
            <h4 class="green"><i class="icon-tags green"></i>Profile Information</h4>
            <img src="<?php echo h($apiUrl . "uploads/attachments/avatar/" . $user[0]['user']['nickname'] . "/" . $user[0]['user']['id'] . "_" . md5($user[0]['user']['email'])) . ".jpg"; ?>" alt="No Image"/>
            <?php
            echo $this->Form->input('id', array('value' => $user[0]['user']['id']));
            echo $this->Form->input('email', array('disabled' => 'disabled', 'value' => $user[0]['user']['email']));
            echo $this->Form->input('nickname', array('value' => $user[0]['user']['nickname']));
            echo $this->Form->input('bio', array('type' => 'textarea', 'value' => $user[0]['user']['bio']));
            ?>
        </fieldset>
        <?php // echo $this->Form->end(__('Submit')); ?>
        <button class="btn btn-info" type="submit">
            <i class="icon-ok bigger-110"></i>
            Submit
        </button>
        <a class="btn btn-danger" href="<?php echo $this->webroot; ?>">
            <i class="icon-remove bigger-110"></i>
            Cancel
        </a>
    </div>
</div>