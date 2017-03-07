<div class="items view">
<h2><?php echo __('Item'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($item['Item']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($item['Item']['user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Nickname'); ?></dt>
		<dd>
			<?php echo h($item['Item']['user_nickname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($item['Item']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reference Url'); ?></dt>
		<dd>
			<?php echo h($item['Item']['reference_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Keyword'); ?></dt>
		<dd>
			<?php echo h($item['Item']['keyword']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Keyword Search'); ?></dt>
		<dd>
			<?php echo h($item['Item']['keyword_search']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Summary'); ?></dt>
		<dd>
			<?php echo h($item['Item']['summary']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Color'); ?></dt>
		<dd>
			<?php echo h($item['Item']['color']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image Large'); ?></dt>
		<dd>
			<?php echo h($item['Item']['image_large']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image Middle'); ?></dt>
		<dd>
			<?php echo h($item['Item']['image_middle']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image Square'); ?></dt>
		<dd>
			<?php echo h($item['Item']['image_square']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Width'); ?></dt>
		<dd>
			<?php echo h($item['Item']['width']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Height'); ?></dt>
		<dd>
			<?php echo h($item['Item']['height']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Item Type'); ?></dt>
		<dd>
			<?php echo h($item['Item']['item_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Share Type'); ?></dt>
		<dd>
			<?php echo h($item['Item']['share_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($item['Item']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Show'); ?></dt>
		<dd>
			<?php echo h($item['Item']['is_show']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Create Time'); ?></dt>
		<dd>
			<?php echo h($item['Item']['create_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Deleted'); ?></dt>
		<dd>
			<?php echo h($item['Item']['is_deleted']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Images'); ?></dt>
		<dd>
			<?php echo h($item['Item']['total_images']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cloud'); ?></dt>
		<dd>
			<?php echo h($item['Item']['cloud']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Item'), array('action' => 'edit', $item['Item']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Item'), array('action' => 'delete', $item['Item']['id']), array(), __('Are you sure you want to delete # %s?', $item['Item']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('action' => 'add')); ?> </li>
	</ul>
</div>
