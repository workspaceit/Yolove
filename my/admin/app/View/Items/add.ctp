<div class="items form">
<?php echo $this->Form->create('Item'); ?>
	<fieldset>
		<legend><?php echo __('Add Item'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('user_nickname');
		echo $this->Form->input('title');
		echo $this->Form->input('reference_url');
		echo $this->Form->input('keyword');
		echo $this->Form->input('keyword_search');
		echo $this->Form->input('summary');
		echo $this->Form->input('color');
		echo $this->Form->input('image_large');
		echo $this->Form->input('image_middle');
		echo $this->Form->input('image_square');
		echo $this->Form->input('width');
		echo $this->Form->input('height');
		echo $this->Form->input('item_type');
		echo $this->Form->input('share_type');
		echo $this->Form->input('price');
		echo $this->Form->input('is_show');
		echo $this->Form->input('create_time');
		echo $this->Form->input('is_deleted');
		echo $this->Form->input('total_images');
		echo $this->Form->input('cloud');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Items'), array('action' => 'index')); ?></li>
	</ul>
</div>
