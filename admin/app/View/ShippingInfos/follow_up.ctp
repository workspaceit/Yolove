<div class="page-header position-relative">
    <h1>
        Follow Up Cart
        <small>
            <i class="icon-double-angle-right"></i>
        </small>
    </h1>
</div>
<h4 class="green"><i class="icon-tags green"></i>Manage Follow Up Cart</h4>

<?php echo $this->Session->flash(); ?>
<div class="row-fluid">

    <div class="span12 table_action" id="admin_paidCart">        
        <table id="sample-table-2" class="table table-striped table-bordered table-hover data-table">
            <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('id', 'Order ID'); ?></th>
                    <th><?php echo $this->Paginator->sort('user_id', 'User ID'); ?></th>
                    <th><?php echo $this->Paginator->sort('email'); ?></th>
                    <th><?php echo $this->Paginator->sort('nickname'); ?></th>
                    <th><?php echo $this->Paginator->sort('payment_type'); ?></th>
                    <th><?php echo $this->Paginator->sort('total_cost'); ?></th>
                    <th><?php echo $this->Paginator->sort('shipping_address'); ?></th>
                    <th><?php echo $this->Paginator->sort('status'); ?></th>
                    <th><?php echo $this->Paginator->sort('create_time'); ?></th>
                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($shippingInfos as $shippingInfo): ?>
                    <tr>
                        <td><?php echo h($shippingInfo['ShippingInfo']['id']); ?>&nbsp;</td>
                        <td><?php echo h($shippingInfo['User']['id']); ?>&nbsp;</td>
                        <td><?php echo h($shippingInfo['User']['email']); ?>&nbsp;</td>
                        <td><?php echo h($shippingInfo['User']['nickname']); ?>&nbsp;</td>
                        <td><?php echo h($shippingInfo['ShippingInfo']['payment_type']); ?>&nbsp;</td>
                        <td>$<?php echo h($shippingInfo['ShippingInfo']['total_cost']); ?>&nbsp;</td>
                        <td><?php
                            if (empty($shippingInfo['ShippingInfo']['shipping_address']))
                                echo 'NULL';
                            else {
                                $temp = json_decode($shippingInfo['ShippingInfo']['shipping_address']);
                                if ($temp) {
                                    if (isset($temp->address_floor)) {
                                        $address_floor = $temp->address_floor;
                                    } else {
                                        $address_floor = "";
                                    }
                                    if (isset($temp->street)) {
                                        $street = $temp->street;
                                    } else {
                                        $street = "";
                                    }
                                    echo utf8_decode($address_floor . ', ' . $street . ", " . $temp->city . ',<br/>' . $temp->state . '-' . $temp->zip . '<br/>Phone: ' . $temp->cell_phone . "<br/>Alt.Phone: " . $temp->alternate_phone);
                                }
                            }
                            ?>&nbsp;</td>
                        <td>
                            <select class="status orderStatus" order-id="<?php echo $shippingInfo['ShippingInfo']['id']; ?>" style="width: 110px;-webkit-border-radius: 4px; color: #2E2B2B;">
                                <option value="unpaid" style="padding: 4px 0; height: 30px;" <?php if ($shippingInfo['ShippingInfo']['status'] == "unpaid") { ?> selected <?php } ?>>Unpaid</option>
                                <option value="paid" style="padding: 4px 0; height: 30px;" <?php if ($shippingInfo['ShippingInfo']['status'] == "paid") { ?> selected <?php } ?>>Paid</option>
                                <option value="follow_up" style="padding: 4px 0; height: 30px;" <?php if ($shippingInfo['ShippingInfo']['status'] == "follow_up") { ?> selected <?php } ?>>Follow Up</option>
                                <option value="complete" style="padding: 4px 0; height: 30px;" <?php if ($shippingInfo['ShippingInfo']['status'] == "complete") { ?> selected <?php } ?>>Complete</option>
                            </select>
                        </td>
                        <td><?php echo h(date("d/m/Y", $shippingInfo['ShippingInfo']['create_time'])); ?>&nbsp;</td>
                        <td class="actions">
                            <a href="<?php echo $this->webroot; ?>ShippingProducts/index/<?php echo $shippingInfo['ShippingInfo']['id']; ?>">Details</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="row-fluid">
            <!--PAGE CONTENT ENDS-->
            <div class="span6">
                <div id="sample-table-2_info" class="dataTables_info"><?php
                    echo $this->Paginator->counter(array(
                        'format' => __('showing {:current} records out of {:count} total, starting on record {:start}')
                    ));
                    ?>	</div>
            </div>
            <div class="span6">
                <div class="dataTables_paginate paging_bootstrap pagination">
                    <ul>
                        <?php
                        echo ' <li class="prev disabled">';
                        echo $this->Paginator->prev('<< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
                        echo ' </li>';
                        echo '<li class="active">';
                        echo $this->Paginator->numbers(array('separator' => ''));
                        echo "</li>";
                        echo '<li class="next">';
                        echo $this->Paginator->next(__('next') . ' >>', array(), null, array('class' => 'next disabled'));
                        echo '</li>';
                        ?> 
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
<input type="hidden" id="limits" value="<?php echo $limits; ?>" />
<input type="hidden" id="base_Url" value="<?php echo $this->webroot; ?>">
<script src="<?php echo $this->webroot; ?>app/webroot/assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $this->webroot; ?>app/webroot/assets/js/jquery.dataTables.bootstrap.js"></script>
<script type="text/javascript">
    $(function() {
        $('.data-table').dataTable({
            "bSort": false,
        });

        $('#admin_followUpCart').on('click', '.changeVerification', function(e) {
            e.preventDefault();
            var $this = $(this);

            $.ajax({
                url: $(this).attr('href'),
                type: 'post',
                success: function(d) {
                    var spanClass = $this.find('span');
                    if (spanClass.hasClass('label-success')) {
                        spanClass.removeClass('label-success arrowed-in arrowed-in-right');
                        spanClass.addClass('label-warning');
                        spanClass.text('Inactive');
                    } else {
                        spanClass.addClass('label-success arrowed-in arrowed-in-right');
                        spanClass.removeClass('label-warning');
                        spanClass.text('Active');
                    }
                }
            });
        });


    });
    $('.orderStatus').on('change', function() {
        var id = $(this).attr('order-id');
        var status = $(this).val();
        var baseUrl = $('#base_Url').val();
        $.ajax({
            url: baseUrl + 'ShippingInfos/changeOrderStatus',
            type: "POST",
            data: {
                id: id,
                status: status
            },
            success: function(e) {
                location.reload();
            }
        });
    });
    $(document).ready(function() {
        $('#sample-table-2_length select').val($("#limits").val());
        $('#sample-table-2_length select').trigger("change");
        $(".row-fluid").eq(2).css('display', 'none');
        $('#sample-table-2_length select').change(function() {
            var limits = $('#sample-table-2_length').find('select').val();
            window.location = "<?php echo $this->webroot; ?>ShippingInfos/follow_up/" + limits;
        });
    });
</script>


