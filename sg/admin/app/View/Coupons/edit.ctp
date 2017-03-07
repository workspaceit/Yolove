<script>
    $(function() {
        $(".datepicker").datepicker();
    });
</script>
<?php echo $this->Session->flash(); ?>
<?php echo $this->Form->create('Coupon'); ?>
<div class="row-fluid">
    <div class="span12 table_action" id="admin_categories"> 
        <fieldset>

            <div class="page-header position-relative">
                <h1>
                    Edit Coupon
                    <small>
                        <i class="icon-double-angle-right"></i>
                    </small>
                </h1>
            </div>
            <h4 class="green"><i class="icon-tags green"></i>Coupon Basic Information</h4>

            <?php
            echo $this->Form->input('id');
            echo $this->Form->input('coupon_name');
            echo $this->Form->input('code');
            echo $this->Form->input('above', array('min' => 0));
            echo $this->Form->input('type', array(
                'options' => array("fixed_amount" => "Fixed Amount", "percentage" => "Percentage"),
                    //'empty' => '(choose one)'
            ));
            echo $this->Form->input('discount', array('min' => 0));
            echo '<label for="CouponFreeShipping">Free Shipping</label>';
            echo $this->Form->input('free_shipping', array(
                'div' => true,
                'label' => true,
                'type' => 'radio',
                'legend' => false,
                'options' => array(1 => 'Yes', 0 => 'No')
            ));
            echo $this->Form->input('date_start', array(
                'id' => 'date_start',
                'class' => 'datepicker',
                'type' => 'text',
                'value' => date("m/d/Y", $this->form->request['data']['Coupon']['date_start']),
            ));
            echo $this->Form->input('date_end', array(
                'id' => 'date_end',
                'class' => 'datepicker',
                'type' => 'text',
                'value' => date("m/d/Y", $this->form->request['data']['Coupon']['date_end']),
            ));
            echo $this->Form->input('status', array(
                'options' => array("enabled" => "Enabled", "disabled" => "Disabled"),
                    //'empty' => '(choose one)'
            ));
            ?>
        </fieldset>

        <button class="btn btn-info" type="submit">
            <i class="icon-ok bigger-110"></i>
            Submit
        </button>
        <a class="btn btn-danger" href="<?php echo $this->webroot; ?>Coupons">
            <i class="icon-remove bigger-110"></i>
            Cancel
        </a>

    </div>
</div>

<script type="text/javascript">
    $(function() {
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        var checkin = $('#date_start').datepicker({
            onRender: function(date) {
                return date.valueOf() < now.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function(ev) {
            if (ev.date.valueOf() > checkout.date.valueOf()) {
                var newDate = new Date(ev.date)
                newDate.setDate(newDate.getDate() + 1);
                checkout.setValue(newDate);
            }
            checkin.hide();
            $('#date_end')[0].focus();
        }).data('datepicker');
        var checkout = $('#date_end').datepicker({
            onRender: function(date) {
                return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function(ev) {
            checkout.hide();
        }).data('datepicker');
    });
</script>