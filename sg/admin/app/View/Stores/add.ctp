<div class="stores form">
    <?php echo $this->Form->create('Store'); ?>
    <fieldset>
        <legend><?php echo __('Add Store'); ?></legend>
        <?php
        echo $this->Form->input('user_id');
        echo $this->Form->input('poster_id');
        echo $this->Form->input('poster_nickname');
        echo $this->Form->input('category_id');
        echo $this->Form->input('store_name');
        echo $this->Form->input('domain_name');
        echo $this->Form->input('theme');
        echo $this->Form->input('province');
        echo $this->Form->input('city');
        echo $this->Form->input('address');
        echo $this->Form->input('phone1');
        echo $this->Form->input('phone2');
        echo $this->Form->input('phone3');
        echo $this->Form->input('recent_post');
        echo $this->Form->input('store_desc');
        echo $this->Form->input('total_like');
        echo $this->Form->input('total_review');
        echo $this->Form->input('total_visit');
        echo $this->Form->input('display_order');
        echo $this->Form->input('create_time');
        echo $this->Form->input('keyword');
        echo $this->Form->input('keyword_search');
        echo $this->Form->input('settings');
        echo $this->Form->input('shipping_fee');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Stores'), array('action' => 'index')); ?></li>
    </ul>
</div>
