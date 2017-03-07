<div class="coupons view">
    <h2><?php echo __('Coupon'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($coupon['Coupon']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Coupon Name'); ?></dt>
        <dd>
            <?php echo h($coupon['Coupon']['coupon_name']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Code'); ?></dt>
        <dd>
            <?php echo h($coupon['Coupon']['code']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Above'); ?></dt>
        <dd>
            <?php echo h($coupon['Coupon']['above']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Type'); ?></dt>
        <dd>
            <?php echo h($coupon['Coupon']['type']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Discount'); ?></dt>
        <dd>
            <?php echo h($coupon['Coupon']['discount']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Free Shipping'); ?></dt>
        <dd>
            <?php echo h($coupon['Coupon']['free_shipping']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Date Start'); ?></dt>
        <dd>
            <?php echo h(date("d/m/Y", $coupon['Coupon']['date_start'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Date End'); ?></dt>
        <dd>
            <?php echo h(date("d/m/Y", $coupon['Coupon']['date_end'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Status'); ?></dt>
        <dd>
            <?php echo h($coupon['Coupon']['status']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Coupon'), array('action' => 'edit', $coupon['Coupon']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Coupon'), array('action' => 'delete', $coupon['Coupon']['id']), array(), __('Are you sure you want to delete # %s?', $coupon['Coupon']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Coupons'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Coupon'), array('action' => 'add')); ?> </li>
    </ul>
</div>
