<?php

echo $this->Session->flash(); ?>
<div class="row-fluid">
    <div class="span12 table_action" id="admin_categories"> 
        <?php echo $this->Form->create('Category'); ?>
        <fieldset>
            <div class="page-header position-relative">
                <h1>
                    Add Category
                    <small>
                        <i class="icon-double-angle-right"></i>
                    </small>
                </h1>
            </div>
            <h4 class="green"><i class="icon-tags green"></i>Add Category Basic Information</h4>

            <?php
            echo '<label for="CategoryCategoryNameCn">Category Name</label>';
            echo $this->Form->input('category_name_cn', array('label' => FALSE, 'required' => 'required'));
            echo '<label for="CategoryCategoryNameEn">Category Key</label>';
            echo $this->Form->input('category_name_en', array('label' => FALSE, 'required' => 'required'));
            echo $this->Form->input('display_order', array('type' => 'text', 'required' => 'required'));
            echo '<label for="CategoryIsOpen">Enable</label>';
            echo $this->Form->input('is_open', array(
                'div' => true,
                'label' => true,
                'type' => 'radio',
                'legend' => false,
                'options' => array(1 => 'Yes', 0 => 'No'),
                'value' => 1
            ));
            echo '<label for="CategoryIsHome">Show in homepage</label>';
            echo $this->Form->input('is_home', array(
                'div' => true,
                'label' => true,
                'type' => 'radio',
                'legend' => false,
                'options' => array(1 => 'Yes', 0 => 'No'),
                'value' => 0
            ));
            echo $this->Form->input('category_hot_words', array('required' => 'required'));
            ?>
        </fieldset>
        <button class="btn btn-info" type="submit">
            <i class="icon-ok bigger-110"></i>
            Submit
        </button>
        <a class="btn btn-danger" href="<?php echo $this->webroot; ?>Categories">
            <i class="icon-remove bigger-110"></i>
            Cancel
        </a>

    </div>
</div>