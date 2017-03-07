<div class="shippingInfos view">
    <h2><?php echo __('Shipping Info'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($shippingInfo['ShippingInfo']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Unique Token Id'); ?></dt>
        <dd>
            <?php echo h($shippingInfo['ShippingInfo']['unique_token_id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Product Cost'); ?></dt>
        <dd>
            <?php echo h($shippingInfo['ShippingInfo']['product_cost']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('User'); ?></dt>
        <dd>
            <?php echo $this->Html->link($shippingInfo['User']['id'], array('controller' => 'users', 'action' => 'view', $shippingInfo['User']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Payment Type'); ?></dt>
        <dd>
            <?php echo h($shippingInfo['ShippingInfo']['payment_type']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Status'); ?></dt>
        <dd>
            <?php echo h($shippingInfo['ShippingInfo']['status']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Return From Paypal'); ?></dt>
        <dd>
            <?php echo h($shippingInfo['ShippingInfo']['return_from_paypal']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Shipping Cost'); ?></dt>
        <dd>
            <?php echo h($shippingInfo['ShippingInfo']['shipping_cost']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Total Cost'); ?></dt>
        <dd>
            <?php echo h($shippingInfo['ShippingInfo']['total_cost']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Shipping Address'); ?></dt>
        <dd>
            <?php echo h($shippingInfo['ShippingInfo']['shipping_address']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Create Time'); ?></dt>
        <dd>
            <?php echo h($shippingInfo['ShippingInfo']['create_time']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Update Time'); ?></dt>
        <dd>
            <?php echo h($shippingInfo['ShippingInfo']['update_time']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Shipping Info'), array('action' => 'edit', $shippingInfo['ShippingInfo']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Shipping Info'), array('action' => 'delete', $shippingInfo['ShippingInfo']['id']), array(), __('Are you sure you want to delete # %s?', $shippingInfo['ShippingInfo']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Shipping Infos'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Shipping Info'), array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
    </ul>
</div>
