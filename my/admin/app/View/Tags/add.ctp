<?php

echo $this->Session->flash(); ?>
<div class="row-fluid">
    <div class="span12 table_action" id="admin_tags"> 
        <?php echo $this->Form->create('Tag'); ?>
	<fieldset>
		<div class="page-header position-relative">
                <h1>
                    Add Hashtag
                    <small>
                        <i class="icon-double-angle-right"></i>
                    </small>
                </h1>
            </div>
            <h4 class="green"><i class="icon-tags green"></i>Add Hashtag Basic Information</h4>
	<?php
		echo $this->Form->input('tag_name');
//		echo $this->Form->input('share_id');
//		echo $this->Form->input('is_show');
                echo '<label for="TagsIsShow">Show</label>';
                echo $this->Form->input('is_show', array('div' => true,
                    'label' => true,
                    'type' => 'radio',
                    'legend' => false,
                    'options' => array(1 => 'Yes', 0 => 'No'),
                    'value' => 0,
                ));		
//                echo $this->Form->input('create_time');
	?>
	</fieldset>
<button class="btn btn-info" type="submit">
            <i class="icon-ok bigger-110"></i>
            Submit
        </button>
        <a class="btn btn-danger" href="<?php echo $this->webroot; ?>Tags">
            <i class="icon-remove bigger-110"></i>
            Cancel
        </a>
</div>
