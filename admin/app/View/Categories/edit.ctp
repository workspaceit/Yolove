<?php echo $this->Session->flash(); ?>
<div class="row-fluid">
    <div class="span12 table_action" id="admin_categories">
        <?php echo $this->Form->create('Category'); ?>
        <fieldset>
            <div class="page-header position-relative">
                <h1>
                    Edit Category
                    <small>
                        <i class="icon-double-angle-right"></i>
                    </small>
                </h1>
            </div>
            <h4 class="green"><i class="icon-tags green"></i>Category Basic Information</h4>


            <?php
            echo $this->Form->input('id');
            echo '<label for="CategoryCategoryNameCn">Category Name</label>';
            echo $this->Form->input('category_name_cn', array('label' => false, 'required' => 'required'));
            echo '<label for="CategoryCategoryNameEn">Category Key</label>';
            echo $this->Form->input('category_name_en', array('label' => false, 'required' => 'required'));
            echo $this->Form->input('display_order', array('type' => 'text'));
            echo '<label for="CategoryIsOpen">Enable</label>';
            echo $this->Form->input('is_open', array(
                'div' => true,
                'label' => true,
                'type' => 'radio',
                'legend' => false,
                'options' => array(1 => 'Yes', 0 => 'No')
            ));
            echo '<label for="CategoryIsHome">Show in homepage</label>';
            echo $this->Form->input('is_home', array(
                'div' => true,
                'label' => true,
                'type' => 'radio',
                'legend' => false,
                'options' => array(1 => 'Yes', 0 => 'No')
            ));
            echo $this->Form->input('category_hot_words');
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