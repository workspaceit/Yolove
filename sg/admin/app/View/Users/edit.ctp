<?php echo $this->Session->flash(); ?>
<div class="row-fluid">
    <div class="span12 table_action" id="admin_categories">   
        <?php echo $this->Form->create('User'); ?>
        <fieldset>
            <div class="page-header position-relative">
                <h1>
                    Edit User
                    <small>
                        <i class="icon-double-angle-right"></i>
                    </small>
                </h1>
            </div>
            <h4 class="green"><i class="icon-tags green"></i>User Basic Information</h4>

            <?php
            echo $this->Form->input('id');
            echo $this->Form->input('email', array('disabled' => 'disabled'));
            echo $this->Form->input('nickname');
            echo '<label for="UsersPassword">Password</label>';
            echo $this->Form->input('passwd', array('value' => '', 'label' => false, 'required' => false));
            echo $this->Form->input('user_credits', array('type' => 'text'));
            echo $this->Form->input('system_group', array(
//            'options' => array("fixed_amount" => "Fixed Amount", "percentage" => "Percentage"),
                'options' => $systems,
                'value' => $user_usergroup[0][0]['UserUsergroup']['id']
                    //'empty' => '(choose one)'
            ));
            ?> <input name="system" type="hidden" value="<?php echo $user_usergroup[0][0]['UserUsergroup']['id']; ?>"> <?php
            echo $this->Form->input('member_group', array(
//            'options' => array("fixed_amount" => "Fixed Amount", "percentage" => "Percentage"),
                'options' => $members,
                'value' => (isset($user_usergroup[0][1]['UserUsergroup']['id'])) ? ($user_usergroup[0][1]['UserUsergroup']['id']) : ""
                    //'empty' => '(choose one)'
            ));
            ?> <input name="member" type="hidden" value="<?php echo (isset($user_usergroup[0][1]['UserUsergroup']['id'])) ? ($user_usergroup[0][1]['UserUsergroup']['id']) : ""; ?>"> <?php
            echo $this->Form->input('bio', array('type' => 'textarea'));
            ?>
        </fieldset>
        <?php // echo $this->Form->end(__('Submit')); ?>
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