<?php

echo $this->Session->flash(); ?>
<div class="row-fluid">
    <div class="span12 table_action" id="admin_categories"> 
        <?php echo $this->Form->create('Album'); ?>
        <fieldset>
            <div class="page-header position-relative">
                <h1>
                    Add Album
                    <small>
                        <i class="icon-double-angle-right"></i>
                    </small>
                </h1>
            </div>
            <h4 class="green"><i class="icon-tags green"></i>Add Album Basic Information</h4>

            <?php
            echo $this->Form->input('category_id', array(
//            'options' => array("fixed_amount" => "Fixed Amount", "percentage" => "Percentage"),
                'options' => $catArray,
                    //'empty' => '(choose one)'
            ));


            echo $this->Form->input('album_title', array('required' => 'required'));
            echo $this->Form->input('album_desc');
            ?>
        </fieldset>
        <button class="btn btn-info" type="submit">
            <i class="icon-ok bigger-110"></i>
            Submit
        </button>
        <a class="btn btn-danger" href="<?php echo $this->webroot; ?>Albums">
            <i class="icon-remove bigger-110"></i>
            Cancel
        </a>
    </div>
</div>