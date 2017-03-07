<div class="shippingProducts view">
    <h2><?php echo __('Shipping Product'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($shippingProduct['ShippingProduct']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Transaction Id'); ?></dt>
        <dd>
            <?php echo h($shippingProduct['ShippingProduct']['transaction_id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Status'); ?></dt>
        <dd>
            <?php echo h($shippingProduct['ShippingProduct']['status']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Share Id'); ?></dt>
        <dd>
            <?php echo h($shippingProduct['ShippingProduct']['share_id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('User Id'); ?></dt>
        <dd>
            <?php echo h($shippingProduct['ShippingProduct']['user_id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Store Id'); ?></dt>
        <dd>
            <?php echo h($shippingProduct['ShippingProduct']['store_id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Shipping Cost'); ?></dt>
        <dd>
            <?php echo h($shippingProduct['ShippingProduct']['shipping_cost']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Price'); ?></dt>
        <dd>
            <?php echo h($shippingProduct['ShippingProduct']['price']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Quantity'); ?></dt>
        <dd>
            <?php echo h($shippingProduct['ShippingProduct']['quantity']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Size'); ?></dt>
        <dd>
            <?php echo h($shippingProduct['ShippingProduct']['size']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Create Time'); ?></dt>
        <dd>
            <?php echo h($shippingProduct['ShippingProduct']['create_time']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Shipping Product'), array('action' => 'edit', $shippingProduct['ShippingProduct']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Shipping Product'), array('action' => 'delete', $shippingProduct['ShippingProduct']['id']), array(), __('Are you sure you want to delete # %s?', $shippingProduct['ShippingProduct']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Shipping Products'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Shipping Product'), array('action' => 'add')); ?> </li>
    </ul>
</div>
