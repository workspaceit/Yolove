<div class="shippingProducts form">
    <?php echo $this->Form->create('ShippingProduct'); ?>
    <fieldset>
        <legend><?php echo __('Add Shipping Product'); ?></legend>
        <?php
        echo $this->Form->input('transaction_id');
        echo $this->Form->input('status');
        echo $this->Form->input('share_id');
        echo $this->Form->input('user_id');
        echo $this->Form->input('store_id');
        echo $this->Form->input('shipping_cost');
        echo $this->Form->input('price');
        echo $this->Form->input('quantity');
        echo $this->Form->input('size');
        echo $this->Form->input('create_time');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Shipping Products'), array('action' => 'index')); ?></li>
    </ul>
</div>
