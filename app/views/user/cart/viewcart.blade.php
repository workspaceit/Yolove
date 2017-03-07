@extends('user/layout/default_layout')
@section('content')
<section class="cart-details" style="min-height: 500px;">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-8 shopping-cart">
                    <h4>Shopping cart</h4>
                    <table class="table table-condensed ">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Price</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($_SESSION[$response['cartuser']]['shoppingItems']))
                            @foreach($_SESSION[$response['cartuser']]['shoppingItems'] as $key=>$item) 

                            <tr>
                                <td>
                                    <div class="cart-img-div">
                                    <a href="{{URL::to('/')}}/item/{{$item['share_id']}}/{{$item['slugTitle']}}"><img src="{{$api_url.$item['image']}}" alt=".." height="100"></a>
                                    </div>
                                    <a href="{{URL::to('/')}}/item/{{$item['share_id']}}/{{$item['slugTitle']}}" class="CartItem" id="{{$item['share_id']}}" class="product-name">{{$item['title']}}</a><br>
                                    <button class="btn btn-width-love delete_item" id="delete" data-item="{{$item['share_id']}}">Delete</button>
                                </td>
                                <td>
                                    ${{$item['price']}}
                                </td>
                                <td>
                                    <select name="size" id="size_{{$item['share_id']}}" class="item_size">
<!--                                        <option>{{$item['size']}}</option>-->
                                        @if(isset($item['allSize']))
                                            @foreach($item['allSize'] as $itemSize)
                                               <option @if($itemSize->size == $item['size']) selected @endif>{{$itemSize->size}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </td>
                                <td>
                                    <input type="number" name="qty" id="qty_{{$item['share_id']}}" value="{{$item['quantity']}}" class="quantity" />
                                </td>
                                <td>{{$item['quantity']}}X{{$item['price']}}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>	

                </div>						
                <div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
                    <div class="row summary">
                        <div class="col-md-12">
                            <h4>Summary</h4>
                            <!--                    <div style="display: none;" id="error_msg" class="error_promo">
                                                </div>-->
                            <form class="form-inline promo-code" id="promo_code" style="display: none;">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" id="apply_code" placeholder="Enter promo code">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success no-margin" style="margin-top: 0px;" id="submit_code">Apply</button>
                            </form>
                            <p id="promo_p">Have a gift card or promo code? Enter it <a href="javascript:void(0);" id="show_promo" class="promo_enter">here</a></p>
                            <div class="row col-md-12 total-price">
                                <table class="table summary-table">
                                    <tbody>
                                        <tr>
                                            <th>Total cost</th>
                                            <td>${{$_SESSION[$response['cartuser']]['totalPrice']}}</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping cost</th>
                                            <td><span id="shipping_cost">
                                                    <?php
                                                    if (isset($_SESSION[$response['cartuser']]['freeshipping'])) {
                                                        echo $_SESSION[$response['cartuser']]['freeshipping'];
                                                    } else {
                                                        echo "$" . $shipping_cost;
                                                    }
                                                    ?>
                                                </span>
                                            </td>
                                        </tr>
                                        <?php if ($user_credit != 0) { ?>
                                            <tr>
                                                <th>
                                                    My store credit <i rel="tooltip" title="Your store Balance" class="fa fa-info-circle credit_info"></i>
                                                </th>
                                                <td>-${{$user_credit}}</td>
                                            </tr>
                                            <?php
                                        }
                                        if (isset($_SESSION[$response['cartuser']]['totalDiscount'])) {
                                            ?>
                                            <tr id="discountDiv">
                                                <th>
                                                    Discount
                                                </th>
                                                <td id="totalDiscount">${{$_SESSION[$response['cartuser']]['totalDiscount']}}</td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Final Price <?php if (isset($response['creditMessage'])) { ?><i class ="fa fa-info-circle credit_info" rel="tooltip" title="{{$response['creditMessage']}}"></i><?php } ?></th>
                                            <td>${{$totalprice}}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <a class="btn btn-success set-btn" href="<?php echo URL::to('/'); ?>">Continue Shopping</a>
                                <a class="btn btn-success set-btn" href="<?php echo URL::to('/'); ?>/checkout">Proceed Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>		

            </div>	
        </div>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function ($) {
        $('#show_promo').on("click", function () {
            $('#promo_p').css("display", "none");
            $('#promo_code').css("display", "block");
        });
        $('.quantity').on("change", function (e) {
            e.preventDefault();
            var thisObj = $(this),
                    id = thisObj.attr('id').split('_');
            qty = $('#qty_' + id[1]).val();
            if (qty == '' || qty == '0' || qty[0] == '-') {
                window.location = '';
            } else {
                $.ajax({
                    url: "<?php echo URL::to('/'); ?>" + "/increaseQuantity",
                    type: "POST",
                    data: {
                        share_id: id[1],
                        quantity: qty
                    },
                    success: function (e) {
                        window.location = '';
                    }
                });
            }
            return;
        });
        $('.item_size').on("change", function (e) {
            e.preventDefault();
            var thisObj = $(this),
                    id = thisObj.attr('id').split('_');
            size = thisObj.val();
            $.ajax({
                url: "<?php echo URL::to('/'); ?>" + "/changeItemSize",
                type: "POST",
                data: {
                    share_id: id[1],
                    size: size
                },
                success: function (e) {
                    window.location = '';
                }

            });
        });
//        $('.item_color').on("change", function (e) {
//            e.preventDefault();
//            var thisObj = $(this),
//                    id = thisObj.attr('id').split('_');
//            color = thisObj.val();
//            $.ajax({
//                url: "<?php echo URL::to('/'); ?>" + "/changeItemColor",
//                type: "POST",
//                data: {
//                    share_id: id[1],
//                    color: color
//                },
//                success: function (e) {
//                    window.location = '';
//                }
//
//            });
//        });

        $('.delete_item').on("click", function (e) {
            e.preventDefault();
            var thisObj = $(this),
                    shareId = thisObj.attr('data-item');
            $.ajax({
                url: "<?php echo URL::to('/'); ?>" + "/deleteCartItem",
                type: "POST",
                data: {
                    share_id: shareId
                },
                success: function (e) {
                    window.location = '';
                }
            });
        });
        $('#submit_code').on("click", function (e) {
            e.preventDefault();
            submitPromoCode();

        });
        function submitPromoCode() {
            var code = $('#apply_code').val();
            $.ajax({
                url: "<?php echo URL::to('/'); ?>" + "/applyPromoCode",
                type: "POST",
                data: {
                    code: code
                },
                success: function (e) {
                    e = $.parseJSON(e);
                    if (e.success == false) {
                        $('#promo_code').css("display", "none");
                        generate('error', 'center', e.message);
                        $('#promo_p').css("display", "block");
                    } else {
                        window.location = '';
                    }
                }
            });
        }
    });

</script>
@stop