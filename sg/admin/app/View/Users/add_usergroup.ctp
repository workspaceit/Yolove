<div class="row-fluid">
    <div class="span12 table_action" id="admin_categories">   
        <?php echo $this->Form->create('Usergroup'); ?>
        <fieldset>
            <div class="page-header position-relative">
                <h1>
                    Add User Group
                    <small>
                        <i class="icon-double-angle-right"></i>
                    </small>
                </h1>
            </div>
            <h4 class="green"><i class="icon-tags green"></i>Add User Group Basic Information</h4>



            <?php
            echo '<label for="UsergroupType">Group Type</label>';
            echo $this->Form->input('usergroup_type', array(
                'label' => false, 'required' => 'required',
                'options' => array("system" => "System", "member" => "Member"),
            ));
            echo '<label for="UsergroupKey">Group Key</label>';
            echo $this->Form->input('usergroup_key', array('label' => false, 'required' => 'required'));
            echo '<label for="UsergroupName">Group Name</label>';
            echo $this->Form->input('usergroup_name', array('label' => false, 'required' => 'required'));
            ?>
        </fieldset>
        <button class="btn btn-info" type="submit">
            <i class="icon-ok bigger-110"></i>
            Submit
        </button>
        <a class="btn btn-danger" href="<?php echo $this->webroot; ?>Users/userGroups">
            <i class="icon-remove bigger-110"></i>
            Cancel
        </a>
    </div>
</div>