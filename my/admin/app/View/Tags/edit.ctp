<?php echo $this->Session->flash(); ?>
<div class="row-fluid">
    <div class="span12 table_action" id="admin_categories">   
        <?php echo $this->Form->create('Tag'); ?>
	<fieldset>
		<legend><?php echo __('Edit Tag'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tag_name');
//		echo $this->Form->input('share_id');
		echo '<label for="TagsIsShow">Show</label>';
                echo $this->Form->input('is_show', array('div' => true,
                    'label' => true,
                    'type' => 'radio',
                    'legend' => false,
                    'options' => array(1 => 'Yes', 0 => 'No'),
                ));
//		echo $this->Form->input('create_time');
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
