<div class="categories view">
    <h2><?php echo __('Category'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($category['Category']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Category'); ?></dt>
        <dd>
            <?php echo h($category['Category']['category_name_cn']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Total Share'); ?></dt>
        <dd>
            <?php echo h($category['Category']['total_share']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Category'), array('action' => 'edit', $category['Category']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Category'), array('action' => 'delete', $category['Category']['id']), array(), __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Categories'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Category'), array('action' => 'add')); ?> </li>
    </ul>
</div>
