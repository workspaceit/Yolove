<div class="shippingProducts form">
    <?php echo $this->Form->create('ShippingProduct'); ?>
    <fieldset>
        <legend><?php echo __('Edit Shipping Product'); ?></legend>
        <?php
        echo $this->Form->input('id');
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

        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ShippingProduct.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('ShippingProduct.id'))); ?></li>
        <li><?php echo $this->Html->link(__('List Shipping Products'), array('action' => 'index')); ?></li>
    </ul>
</div>
<div class="page-header position-relative">
    <h1>
        <?php echo __('Edit Shipping Product'); ?>
        <small>
            <i class="icon-double-angle-right"></i>
        </small>
    </h1>
</div>

<div class="row-fluid">
    <div class="span12">
        <?php echo $this->Form->create('ShippingProduct', array('class' => 'form-horizontal')); ?>
        <h4 class="green"><i class="icon-tags green"></i>Party Basic Information</h4>
        <div class="control-group">				
            <?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
            <?php echo $this->Form->label('party_type', 'Party type', array('class' => 'control-label')); ?>			
            <?php echo $this->Form->input('party_type', array('label' => false, 'div' => 'controls')); ?>
        </div>


        <div class="control-group">

            <div class="row-fluid input-append">           
                <?php echo $this->Form->label('date_added', 'Joining Date', array('class' => 'control-label')); ?>			
                <?php echo $this->Form->input('date_added', array('type' => 'text', 'id' => 'id-date-picker-1', 'label' => false, 'div' => 'controls', 'class' => 'date-picker', 'data-date-format' => 'yyyy-mm-dd')); ?>




            </div>         
        </div>
        <div class="control-group">

            <div class="row-fluid input-append">           
                <?php echo $this->Form->label('transaction_id', 'Transection Id', array('class' => 'control-label')); ?>			
                <?php echo $this->Form->input('transaction_id', array('type' => 'text')); ?>




            </div>         
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-info">
                <i class="icon-ok bigger-110"></i>
                Submit
            </button>
            &nbsp; &nbsp; &nbsp;
            <button type="reset" class="btn">
                <i class="icon-undo bigger-110"></i>
                Reset
            </button>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.date-picker').datepicker().next().on(ace.click_event, function() {
            $(this).prev().focus();
        });
    });
</script>


