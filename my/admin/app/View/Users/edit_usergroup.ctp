<div class="row-fluid">
    <div class="span12 table_action" id="admin_categories">   
        <?php echo $this->Form->create('Usergroup'); ?>
        <fieldset>
            <div class="page-header position-relative">
                <h1>
                    Edit User Group
                    <small>
                        <i class="icon-double-angle-right"></i>
                    </small>
                </h1>
            </div>
            <h4 class="green"><i class="icon-tags green"></i>User Group Basic Information</h4>

            <?php
            echo $this->Form->input('id', array('value' => $this->request->data['Usergroup']['id']));
            echo $this->Form->input('usergroup_type', array('value' => $this->request->data['Usergroup']['usergroup_type'], 'type' => 'hidden'));
            echo $this->Form->input('usergroup_name', array('value' => $this->request->data['Usergroup']['usergroup_name']));
            echo $this->Form->input('usergroup_key', array('value' => $this->request->data['Usergroup']['usergroup_key']));
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