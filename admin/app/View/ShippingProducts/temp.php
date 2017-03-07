<div class="page-header position-relative">
    <h1>
        Details
        <small>
            <i class="icon-double-angle-right"></i>
        </small>
    </h1>
</div>
<div class="row-fluid">

    <div class="span12 table_action" id="admin_categories">   
        <div>
            <h4 class="green"><i class="icon-tags green"></i>Details of Order #<?php echo $shippingInfos['ShippingInfo']['id'] ?></h4>

            <?php
            if ($shippingInfos['ShippingInfo']['status'] == 'paid' || $shippingInfos['ShippingInfo']['status'] == 'follow_up') {
                ?>
                <a class="btn btn-success"  shipping_id="<?php echo $shippingInfos['ShippingInfo']['id'] ?>" id="proceed" >Complete</a>
                <a class="btn btn-success"  id="follow_up" href="#" >Follow Up</a>
                <?php
            }
            ?>
        </div>
        <table id="sample-table-2" class="table table-striped table-bordered table-hover data-table">
            <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                    <th><?php echo $this->Paginator->sort('email'); ?></th>
                    <th><?php echo $this->Paginator->sort('nickname'); ?></th>
                    <th><?php echo $this->Paginator->sort('title', 'Product Title'); ?></th>
                    <th><?php echo $this->Paginator->sort('quantity'); ?></th>
                    <th><?php echo $this->Paginator->sort('size'); ?></th>
                    <th><?php echo $this->Paginator->sort('price'); ?></th>
                    <th><?php echo $this->Paginator->sort('shipping_cost'); ?></th>
                    <th><?php echo $this->Paginator->sort('address', 'Shipping Address'); ?></th>
                    <th><?php echo $this->Paginator->sort('status'); ?></th>
                    <th><?php echo $this->Paginator->sort('create_time', 'Created At'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($shippingProducts as $key => $shippingProduct): ?>
                    <tr>
                        <td><?php echo h($shippingProduct['ShippingProduct']['id']); ?>&nbsp;</td>
                        <td><?php echo h($shippingProduct['user']['email']); ?>&nbsp;</td>
                        <td><?php echo h($shippingProduct['user']['nickname']); ?>&nbsp;</td>
                        <td><?php echo h($items[$key]['item']['title']); ?>&nbsp;</td>
                        <td><?php echo h($shippingProduct['ShippingProduct']['quantity']); ?>&nbsp;</td>
                        <td><?php echo h($shippingProduct['ShippingProduct']['size']); ?>&nbsp;</td>
                        <td><?php echo h($shippingProduct['ShippingProduct']['price']); ?>&nbsp;</td>
                        <td><?php echo h($shippingProduct['ShippingProduct']['shipping_cost']); ?>&nbsp;</td>
                        <td><?php
                            if (!isset($shippingInfos['ShippingInfo']['shipping_address']))
                                echo 'NULL';
                            else {
                                $temp = json_decode($shippingProduct['ShippingInfo']['shipping_address']);
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
                        <td><?php
                            if ($shippingInfos['ShippingInfo']['status'] == 'unpaid') {
                                ?><input type="text" style="width: 100px;-webkit-border-radius: 4px;" disabled="disabled" value="unpaid"><?php } else if ($shippingInfos['ShippingInfo']['status'] == 'paid') {
                                ?>
                                <select item_id="<?php echo $shippingProduct['ShippingProduct']['id'] ?>" class="status" style="width: 110px;-webkit-border-radius: 4px; color: #2E2B2B;">
                                    <option name="shipped" style="padding: 4px 0; height: 30px;">Shipped</option>
                                    <option name="refunded" style="padding: 4px 0; height: 30px;">Refunded</option>
                                </select>
                            <?php } else if ($shippingInfos['ShippingInfo']['status'] == 'complete') { ?>
                                <?php if ($shippingProduct['ShippingProduct']['status'] == 'refunded' || $shippingProduct['ShippingProduct']['status'] == 'returned') { ?>
                                    <input type="text" style="width: 100px;-webkit-border-radius: 4px;" disabled="disabled" value="<?php echo $shippingProduct['ShippingProduct']['status'] ?>">
                                <?php } else if ($shippingProduct['ShippingProduct']['status'] == 'shipped') { ?>
                                    <select data_qty='<?php echo $shippingProduct['ShippingProduct']['quantity'] ?>' data_price='<?php echo $shippingProduct['ShippingProduct']['price'] ?>' data_tid='<?php echo $shippingInfos['ShippingInfo']['id'] ?>' data_uid='<?php echo $shippingProduct['user']['id'] ?>'
                                            item_id='<?php echo $shippingProduct['ShippingProduct']['id'] ?>' class="returned_status" style="width: 110px;-webkit-border-radius: 4px; color: #2E2B2B;">
                                        <option name="shipped" style="padding: 4px 0; height: 30px;">shipped</option>
                                        <option name="returned" style="padding: 4px 0; height: 30px;">returned</option>
                                    </select>
                                    <?php
                                }
                            }
                            ?>
                            &nbsp;</td>
                        <td><?php echo h(date('d/m/Y', $shippingProduct['ShippingProduct']['create_time'])); ?>&nbsp;</td>
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


<input type="hidden" id="base_Url" value="<?php echo $this->webroot; ?>">
<input type="hidden" id="user_id" value="<?php echo $shippingProducts[0]['user']['id']; ?>">
<script>
    $(".returned_status").change(function() {
        var productId = $(this).attr("item_id");
        var price = $(this).attr("data_price");
        var qty = $(this).attr("data_qty");
        var add = price * qty;
        var user_id = $('#user_id').val();
        var baseUrl = $('#base_Url').val();

        $.ajax({
            type: "POST",
            url: baseUrl + 'ShippingProducts/editProduct',
            data: {
                productid: productId,
                add: add,
                userid: user_id
            },
            success: function(data) {
                location.reload();
            }
        });

    });

    $("#proceed").click(function() {
        var shippingId = $(this).attr("shipping_id");
        var baseUrl = $('#base_Url').val();
        alert(baseUrl + 'ShippingInfos/index');


        $.ajax({
            type: "POST",
            url: baseUrl + 'ShippingInfos/updateStatus',
            data: {
                id: shippingId
            },
            success: function(data) {
                alert("done");
                window.location.href = baseUrl + 'ShippingInfos/index';
            }
        });
    });
</script>