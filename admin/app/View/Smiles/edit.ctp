<?php

echo $this->Session->flash(); ?>
<div class="row-fluid">
    <div class="span12 table_action" id="admin_categories">   
        <?php echo $this->Form->create('Smile'); ?>
        <fieldset>
            <div class="page-header position-relative">
                <h1>
                    Edit Smile
                    <small>
                        <i class="icon-double-angle-right"></i>
                    </small>
                </h1>
            </div>
            <h4 class="green"><i class="icon-tags green"></i>Smile Basic Information</h4>


            <?php
            echo '<label for="SmileCode">smile code</label>';
            echo $this->Form->input('code', array('label' => false, 'required' => 'required'));
            echo '<label for="SmileUrl">file name</label>';
            echo $this->Form->input('url', array('label' => false, 'type' => 'file', 'required' => 'required'));
            echo $this->Form->input('displayorder', array('type' => 'text'));
            ?>
        </fieldset>
        <button class="btn btn-info" type="submit">
            <i class="icon-ok bigger-110"></i>
            Submit
        </button>
        <a class="btn btn-danger" href="<?php echo $this->webroot; ?>Smiles">
            <i class="icon-remove bigger-110"></i>
            Cancel
        </a>
    </div>
</div>
