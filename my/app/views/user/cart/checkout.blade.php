@extends('user/layout/default_layout')
@section('content')
<section class="best-sellers">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 shopping-cart">
                    <h4 class="checkout-heading">CUSTOMER INFORMATION</h4>
                    <div class="row col-md-12 col-sm-12 col-xs-12">
                        <p>Shipping Information</p>
                        <form class="form set-form">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label>Email*</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email" id="email" value="{{$user->email}}" required="required" disabled="disabled">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label>Name*</label>
                                    <input type="text" placeholder="Name" class="form-control" id="name" value="@if($user->address){{$user->address->name}}@else{{$user->nickname}}@endif" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label>Cellphone*</label>
                                    <input type="text" placeholder="Cellphone" class="form-control" id="cellphone" required="required" value="@if($user->address){{$user->address->cell_phone}}@endif">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label>Address*</label>
                                    <input type="text" placeholder="#Floor Number - Unit Number" class="form-control" required="required" id="address_floor" value="@if(isset($user->address->address_floor)){{$user->address->address_floor}}@endif">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label></label>
                                    <input type="text" placeholder="#Street Number" class="form-control" id="address_street" value="@if($user->address){{$user->address->street}}@endif">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <label>Town / City*</label>
                                    <input type="text" placeholder="City" id="city" class="form-control" value="@if($user->address){{$user->address->city}}@else{{$user->city}}@endif" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-12">
                                    <label>State / Region*</label>
                                    <select name ="state" id ="state" class="form-control">
                                        @if($user->address)
                                        <option>{{$user->address->state}}</option>
                                        @elseif($user->province != NULL)
                                        <option>{{$user->province}}</option>
                                        @endif
                                        <option>Johor</option>
                                        <option>Kedah</option>
                                        <option>Kelantan</option>
                                        <option>Labuan</option>
                                        <option>Melaka</option>
                                        <option>Negeri Sembilan</option>
                                        <option>Pahang</option>
                                        <option>Perak</option>
                                        <option>Perlis</option>
                                        <option>Pulau Pinang</option>
                                        <option>Sabah</option>
                                        <option>Sarawak</option>
                                        <option>Selangor</option>
                                        <option>Terengganu</option>
                                        <option>Wilayah Persekutuan</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>Zip-code*</label>
                                    <input type="text" name="zip_code" class="form-control" id="zip_code" required="required" placeholder="Zip Code" value="@if($user->address){{$user->address->zip}}@endif">
                                </div>
                            </div>
                        </form>	
                    </div>
                    <h4 class="checkout-heading">PAYMENT METHOD</h4>
                    <div class="row col-md-12 col-sm-12 col-xs-12">
                        @if(isset($paymentButton['paypal']))
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12">
                                <div class=" col-md-3">
                                    <input type="radio" name="payment_method" data-id="paypal_form" class="payment_method" value="Paypal" checked="checked">&nbsp;{{$paymentButton['paypal']}}
                                </div>
                                <div class="col-sm-4 col-md-4 col-xs-12">
                                    <img src="{{ URL::asset('assets/images/paypal-button.png')}}" class="img-responsive" />
                                </div>
                                <div class="col-md-5">
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(isset($paymentButton['direct']))
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12">
                                <input type="radio" name="payment_method" data-id="direct_payment" class="payment_method" checked="checked">&nbsp;Direct payment
                            </div>

                        </div>
                        @endif
                        <div class="row col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-3"></div>
                            <div class="col-sm-4 col-md-4 col-xs-12">
                                <button class="btn btn-danger order-now" id="checkout" style="margin-top:30px;">Order Now</button>
                            </div>
                            <div class="col-md-5"></div>

                        </div>
                    </div>						

                </div>	
            </div>	
        </div>
    </div>
</section>

<script type="text/javascript">
    $(function () {
        var paymentMethod = $("input:radio[name=payment_method]").attr('data-id');
        $("input:radio[name=payment_method]").click(function () {
            paymentMethod = $(this).attr('data-id');
        });
        $('#checkout').on("click", function () {
            //$.featherlight($('#data_loading').html('<img alt="Loading..." src="http://www.infinite-scroll.com/loading.gif">'));
            var email = $('#email').val();
            var name = $('#name').val();
            var cell_phone = $('#cellphone').val();
            //var alternate_phone = $('#altphone').val();
            var street = $('#address_street').val();
            var address_floor = $('#address_floor').val();
            var city = $('#city').val();
            var state = $('#state').val();
            var zip = $('#zip_code').val();
            if (email == "" || email == "Email") {
                $('#email').focus();
            } else if (name == "") {
                $('#name').focus();
            } else if (cell_phone == "") {
                $('#cellphone').focus();
            } else if (address_floor == "" || address_floor == "#Floor Number - Unit Number") {
                $('#address_floor').focus();
            } else if (city == "" || city == "City") {
                $('#city').focus();
            } else if (state == "") {
                $('#state').focus();
            } else if (zip == "" || zip == "Zip Code") {
                $('#zip_code').focus();
            } else {
                console.log("ok");
                generate('notification', 'center', '<img src="{{ URL::asset("assets/images/LoadingWait.gif")}}">');
                $.ajax({
                    url: "<?php echo URL::to('/'); ?>" + "/addCartToDatabase",
                    type: "POST",
                    data: {
                        email: email,
                        name: name,
                        cell_phone: cell_phone,
                        street: street,
                        address_floor: address_floor,
                        city: city,
                        state: state,
                        zip: zip
                    },
                    success: function (e) {
                        if (paymentMethod == "direct_payment") {
                            window.location = "<?php echo URL::to('/'); ?>" + "/returnUrl?type=user_credit";
                        } else {
                            //------Jquery is not working with payment gateway form submit in ajax success------------ 
                            document.getElementById(paymentMethod).submit();
                        }
                    }

                });
            }
        });
    });
</script>
@stop
