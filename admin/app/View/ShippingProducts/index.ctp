<?php
$tx = unserialize($shippingInfos['ShippingInfo']['return_from_paypal']);
?>

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
                            <!--<a class="btn btn-success"  shipping_id="<?php //echo $shippingInfos['ShippingInfo']['id']  ?>" id="proceed">Complete</a>
                        <a class="btn btn-success"  id="follow_up" href="#" >Follow Up</a>-->
                <a class="btn btn-success" id="proceed" data-uid="<?php echo $shippingProducts[0]['ShippingProduct']['user_id']; ?>" data-tid="<?php echo $shippingProducts[0]['ShippingProduct']['transaction_id']; ?>" data-pid="<?php echo $tx['tx']; ?>">Complete</a>
                <a class="btn btn-success"  id="follow_up" href="#" >Follow Up</a>
                <?php
            }
            ?>
        </div>
        <table id="sample-table-2" class="table table-striped table-bordered table-hover data-table">
            <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('id'); ?></th>
                    <?php
                    if ($shippingInfos['ShippingInfo']['payment_type'] == 'paypal') {
                        ?><th style="color: #08c"><?php echo "Payment Transaction Id"; ?></th>
                        <?php } ?>
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
                <?php
                $sl = 01;
                foreach ($shippingProducts as $key => $shippingProduct): ?>
                    <tr>
                        <td><?php echo h($shippingInfos['ShippingInfo']['id']."-"); 
                                    if($sl < 10)
                                        echo h("0".$sl++);
                                    else
                                        echo h($sl++);
                        ?>&nbsp;</td>
                        <?php
                        if ($shippingInfos['ShippingInfo']['payment_type'] == 'paypal') {
                            ?><td><?php echo h($tx['tx']); ?>&nbsp</td>
                        <?php } ?>
                        <td><?php echo h($shippingProduct['user']['email']); ?>&nbsp;</td>
                        <td><a href="<?php echo $siteUrl . '/profile/uid/' . $shippingProduct['user']['id'] . '/uname/' . $shippingProduct['user']['nickname'];?>" target="_blank"><?php echo h($shippingProduct['user']['nickname']); ?>&nbsp;</a></td>
                        <td><a href="<?php echo $siteUrl . '/item/' . $shippingProduct['ShippingProduct']['share_id'] . '/' .$items[$key]['slugTitle'];?>" target="_blank"><?php echo h($items[$key]['Item']['title']); ?>&nbsp;</a></td>
                        <td><?php echo h($shippingProduct['ShippingProduct']['quantity']); ?>&nbsp;</td>
                        <td><?php echo h($shippingProduct['ShippingProduct']['size']); ?>&nbsp;</td>
                        <td>$<?php echo h($shippingProduct['ShippingProduct']['price']); ?>&nbsp;</td>
                        <td>$<?php echo h($shippingProduct['ShippingProduct']['shipping_cost']); ?>&nbsp;</td>
                        <td><?php
                            if (!isset($shippingInfos['ShippingInfo']['shipping_address']))
                                echo 'NULL';
                            else {
                                $temp = json_decode($shippingInfos['ShippingInfo']['shipping_address']);
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
                                ?><input type="text" style="width: 100px;-webkit-border-radius: 4px;" disabled="disabled" value="unpaid"><?php
                            } else if ($shippingInfos['ShippingInfo']['status'] == 'paid' || $shippingInfos['ShippingInfo']['status'] == 'follow_up') {
                                ?>

                                <select class="status" item-id="<?php echo $shippingProduct['ShippingProduct']['id']; ?>" style="width: 110px;-webkit-border-radius: 4px; color: #2E2B2B;">
                                    <option name="shipped" style="padding: 4px 0; height: 30px;">Shipped</option>
                                    <option name="refunded" style="padding: 4px 0; height: 30px;">Refunded</option>
                                </select>
                            <?php } else if ($shippingInfos['ShippingInfo']['status'] == 'complete') { ?>
                                <?php if ($shippingProduct['ShippingProduct']['status'] == 'refunded' || $shippingProduct['ShippingProduct']['status'] == 'returned') { ?>
                                    <input type="text" style="width: 100px;-webkit-border-radius: 4px;" disabled="disabled" value="<?php echo $shippingProduct['ShippingProduct']['status']; ?>">
                                <?php } else if ($shippingProduct['ShippingProduct']['status'] == 'shipped') { ?>
                                    <select data-qty='<?php echo $shippingProduct['ShippingProduct']['quantity']; ?>' data-price='<?php echo $shippingProduct['ShippingProduct']['price']; ?>' data-tid='<?php echo $shippingInfos['ShippingInfo']['id']; ?>' data-uid='<?php echo $shippingProduct['User']['id']; ?>'
                                            item-id='<?php echo $shippingProduct['ShippingProduct']['id']; ?>' class="returned_status" style="width: 110px;-webkit-border-radius: 4px; color: #2E2B2B;">
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
<div style="display: none;" id="follow_up_msgbox">
    <label style="color: #49afcd;font-size: 18px;">Message:</label><br/>
    <textarea style="width: 400px;height: 130px;border: 1px solid #d8d8d8;border-radius: 0px;" name="message" id="message"></textarea>
    <input style="background: #49afcd;color: #fff;padding: 5px 20px;border:0px;border-radius: 3px;" type="button" value="Send" id="send_msg" data-id="<?php echo $shippingProducts[0]['ShippingProduct']['transaction_id']; ?>" data-status="follow_up" data-user="<?php echo $shippingProducts[0]['ShippingProduct']['user_id']; ?>">
</div>
<input type="hidden" id="base_Url" value="<?php echo $this->webroot; ?>">
<input type="hidden" id="user_id" value="<?php echo $shippingProducts[0]['user']['id']; ?>">
<script type="text/javascript">
    $(function() {
        $('#proceed').on("click", function() {
            var productStatus = $('.status');
            var productInfo = [];
            $.map(productStatus, function(n, i) {
                productInfo.push({
                    'itemId': $(n).attr('item-id'),
                    'status': $(n).val().toLowerCase()
                });
            });
            var uid = $('#proceed').attr('data-uid');
            var tid = $('#proceed').attr('data-tid');
            var pid = $('#proceed').attr('data-pid');
            var base_url = $('#base_Url').val();
            $.ajax({
                url: base_url + 'ShippingProducts/cartAction',
                type: "POST",
                data: {
                    uid: uid,
                    tid: tid,
                    pid: pid,
                    status: productInfo
                },
                success: function(e) {
                    location.reload();
                    
                }
            });

        });
        $('#follow_up').on("click", function(e) {
            e.preventDefault();
            $.featherlight($('#follow_up_msgbox').html());
            $('#send_msg').on("click", function() {
                var message = $('#message').val();
                var order_id = $('#send_msg').attr('data-id');
                var user_id = $('#send_msg').attr('data-user');
                var order_status = $('#send_msg').attr('data-status');
                var base_url = $('#base_Url').val();
                $.ajax({
                    url: base_url + 'ShippingProducts/orderFollowUp',
                    type: "POST",
                    data: {
                        order_id: order_id,
                        order_status: order_status,
                        user_id: user_id,
                        message: message
                    },
                    success: function(e) {
                       location.reload();
                        //if (!parent.history.back()) {
                            //window.location = '';
                       // }
                    }
                });


            });
        });
        $('.returned_status').on("change", function(e) {
            e.preventDefault();
            var thisObj = $(this),
            itemId = thisObj.attr('item-id');
            var itemStatus = thisObj.val().toLowerCase();
            uid = thisObj.attr('data-uid');
            tid = thisObj.attr('data-tid');
            price = thisObj.attr('data-price');
            quantity = thisObj.attr('data-qty');
            var base_url = $('#base_Url').val();
            $.ajax({
                url: base_url + 'ShippingProducts/changeStatustoReturned',
                type: "POST",
                data: {
                    item_id: itemId,
                    item_status: itemStatus,
                    uid: uid,
                    tid: tid,
                    price: price,
                    quantity: quantity
                },
                success: function(e) {
                    location.reload();
                }

            });

        });

    });
    $('#refund_all').on("click", function() {
        var productStatus = $('.status');
        var productInfo = [];
        $.map(productStatus, function(n, i) {
            productInfo.push({
                'itemId': $(n).attr('item-id'),
                'status': $(n).val().toLowerCase()
            });
        });
        var uid = $('#refund_all').attr('data-uid');
        var tid = $('#refund_all').attr('data-tid');
        var pid = $('#refund_all').attr('data-pid');
        var base_url = $('#base_Url').val();
        $.ajax({
            url: base_url + 'ShippingProducts/cartaction',
            type: "POST",
            data: {
                uid: uid,
                tid: tid,
                pid: pid,
                status: productInfo
            },
            success: function(e) {
                //window.location = 'https://www.onlinepayment.com.my/MOLPay/API/refundAPI/refund.php?txnID=$shoppingproducts[0]["payment_transaction_id"]&domain=$shoppingproducts[0]["domain"]&skey=$shoppingproducts[0]["skey"]';
//                    if (!parent.history.back()) {
//                        window.location = '';
//                    }
            }
        });

    });
</script>