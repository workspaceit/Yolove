<div class="items index">
	<h2><?php echo __('Items'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_nickname'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('reference_url'); ?></th>
			<th><?php echo $this->Paginator->sort('keyword'); ?></th>
			<th><?php echo $this->Paginator->sort('keyword_search'); ?></th>
			<th><?php echo $this->Paginator->sort('summary'); ?></th>
			<th><?php echo $this->Paginator->sort('color'); ?></th>
			<th><?php echo $this->Paginator->sort('image_large'); ?></th>
			<th><?php echo $this->Paginator->sort('image_middle'); ?></th>
			<th><?php echo $this->Paginator->sort('image_square'); ?></th>
			<th><?php echo $this->Paginator->sort('width'); ?></th>
			<th><?php echo $this->Paginator->sort('height'); ?></th>
			<th><?php echo $this->Paginator->sort('item_type'); ?></th>
			<th><?php echo $this->Paginator->sort('share_type'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('is_show'); ?></th>
			<th><?php echo $this->Paginator->sort('create_time'); ?></th>
			<th><?php echo $this->Paginator->sort('is_deleted'); ?></th>
			<th><?php echo $this->Paginator->sort('total_images'); ?></th>
			<th><?php echo $this->Paginator->sort('cloud'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($items as $item): ?>
	<tr>
		<td><?php echo h($item['Item']['id']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['user_id']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['user_nickname']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['title']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['reference_url']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['keyword']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['keyword_search']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['summary']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['color']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['image_large']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['image_middle']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['image_square']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['width']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['height']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['item_type']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['share_type']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['price']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['is_show']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['create_time']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['is_deleted']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['total_images']); ?>&nbsp;</td>
		<td><?php echo h($item['Item']['cloud']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $item['Item']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $item['Item']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $item['Item']['id']), array(), __('Are you sure you want to delete # %s?', $item['Item']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Item'), array('action' => 'add')); ?></li>
	</ul>
</div>
