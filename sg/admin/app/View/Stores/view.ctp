<div class="stores view">
    <h2><?php echo __('Store'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($store['Store']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('User Id'); ?></dt>
        <dd>
            <?php echo h($store['Store']['user_id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Poster Nickname'); ?></dt>
        <dd>
            <?php echo h($store['Store']['poster_nickname']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Category Id'); ?></dt>
        <dd>
            <?php echo h($store['Store']['category_id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Store Name'); ?></dt>
        <dd>
            <?php echo h($store['Store']['store_name']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Total Like'); ?></dt>
        <dd>
            <?php echo h($store['Store']['total_like']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Create Time'); ?></dt>
        <dd>
            <?php echo h(date("d/m/Y", $store['Store']['create_time'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Shipping Fee'); ?></dt>
        <dd>
            <?php echo h($store['Store']['shipping_fee']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Store'), array('action' => 'edit', $store['Store']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Store'), array('action' => 'delete', $store['Store']['id']), array(), __('Are you sure you want to delete # %s?', $store['Store']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Stores'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Store'), array('action' => 'add')); ?> </li>
    </ul>
</div>
