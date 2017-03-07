<div class="shippingInfos form">
    <?php echo $this->Form->create('ShippingInfo'); ?>
    <fieldset>
        <legend><?php echo __('Add Shipping Info'); ?></legend>
        <?php
        echo $this->Form->input('unique_token_id');
        echo $this->Form->input('product_cost');
        echo $this->Form->input('user_id');
        echo $this->Form->input('payment_type');
        echo $this->Form->input('status');
        echo $this->Form->input('return_from_paypal');
        echo $this->Form->input('shipping_cost');
        echo $this->Form->input('total_cost');
        echo $this->Form->input('shipping_address');
        echo $this->Form->input('create_time');
        echo $this->Form->input('update_time');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Shipping Infos'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
    </ul>
</div>
