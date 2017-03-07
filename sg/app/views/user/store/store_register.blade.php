@extends('user/layout/default_layout')
@section('content')
@if($store)
<section class="best-sellers">
    <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2" role="tabpanel">
        <h3>Claim <a href="http://{{$store->domain_name}}"><i>{{$store->store_name}}</i></a></h3>	
        <p>
            To claim your store page on Yolove, we need to verify that you're  the owner or
            authorized to manage it. Submit the information below and we'll get started.
            Questions? Email us at <a href="mailto:support@yolove.it">support@yolove.it</a>.
        </p>
        <div class="row clearfix single-block">
            <div class="col-md-3">
                <label>You</label>
            </div>
            <div class="col-md-9">
                <div class="row clearfix">
                    <input type="text" class="form-control" placeholder="Username" value="{{$response['cuser']['nickname']}}" disabled>
                </div>
            </div>
        </div>
        <div class="row clearfix single-block">
            <div class="col-md-3">
                <label>Your Store</label>
            </div>
            <div class="col-md-9">
                <div class="row clearfix">
                    <p class="create-p">
                        You can edit your business name, phone number and location.
                    </p>
                </div>
                <div class="row clearfix form-control-div">
                    <input type="text" class="form-control" id="store_name" placeholder="Business name" value="{{$store->store_name}}" required="required">
                </div>
                <div class="row clearfix form-control-div">
                    <input type="text" class="form-control" placeholder="Email address" value="{{$response['cuser']['email']}}" disabled>
                </div>
                <div class="row clearfix form-control-div">
                    <input type="text" class="form-control" id="phone" placeholder="Phone number" required="required">
                </div>
                <div class="row clearfix form-control-div">
                    <input type="text" class="form-control" id="address" placeholder="Business address" required="required">
                </div>
                <div class="row clearfix form-control-div">
                    <input type="text" class="form-control" id="city" placeholder="City" required="required">
                </div>
                <div class="row clearfix form-control-div">
                    <input type="text" class="form-control" id="state" placeholder="State" required="required">
                </div>
                <div class="row clearfix form-control-div">
                    <input type="text" class="form-control" id="zip" placeholder="Zip/ Postal code" required="required">
                </div>
                <div class="row clearfix form-control-div">
                    <input type="text" class="form-control" list="countries" id="country" placeholder="Country" required="required">
                </div>
                <div class="row clearfix form-control-div">
                    <input type="text" class="form-control" id="shipping_cost" placeholder="Shipping Cost" required="required">
                </div>
                <div class="row clearfix form-control-div">
                    <textarea class="form-control" id="description" placeholder="Description">Fashion in your life</textarea>
                </div>

            </div>
        </div>
        <div class="row clearfix single-block">
            <div class="col-md-3">
                <label>Image</label>
            </div>
            <div class="col-md-9">
                <div class="row clearfix">
                    <p class="create-p">
                        Upload an official Image of your business.
                    </p>
                </div>
                <div class="row clearfix">
                    <div class="show-img-div">

                    </div>
                    <label class="custom-upload"><input type="file" name="upload_file" class="upload-store-image" onchange='$(".show-img-div").html($(this).val());'>
                        Upload A image
                    </label>
                </div>
            </div>
        </div>
        <div class="row clearfix single-block text-right">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-lg no-radius" id="claimStore">Submit</button>
            </div>
        </div>

    </div>
</section>

<datalist id="countries">

</datalist>
<input type="hidden" id="storeId" value="{{$store->id}}">
@endif
<script type="text/javascript" src="{{ URL::asset('assets/js/countries.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.upload-store-image').on('change', function (event) {// we fetch the file data
            var files = this.files;
            var reader = new FileReader();
            var name = this.value;
            reader.onload = function (e) {
                $(".show-img-div").html("<img src='" + e.target.result + "' width='150' height='150' />");
            };
            reader.readAsDataURL(files[0]);
        });
        var str = '';
        for (var i = 0; i < jsonData.length; i++) {
            str += "<option value='" + jsonData[i].name + "'>";
            //console.log(jsonData[i].name);
        }
        $("#countries").append(str);
    });

    $('#claimStore').on('click', function () {
        var id = $('#storeId').val();
        var storeName = $('#store_name').val();
        var phone = $('#phone').val();
        var address = $('#address').val();
        var city = $('#city').val();
        var state = $('#state').val();
        var zip = $('#zip').val();
        var country = $("#country").val();
        var cost = $('#shipping_cost').val();
        if(cost == ''){
            cost = 0;
        }
        var description = $('#description').val();
        var image = $('.upload-store-image')[0].files;
        var error = false;
        var msg = "";
        if (storeName == "") {
            error = true;
            msg = "Store Name field need to fill up"
            $('#store_name').focus();
        } else if (phone == "") {
            error = true;
            msg = "Phone field need to fill up"
            $('#phone').focus();
        } else if (address == "") {
            error = true;
            msg = "Address field need to fill up"
            $('#address').focus();
        } else if (city == "") {
            error = true;
            msg = "City field need to fill up"
            $('#city').focus();
        } else if (state == "") {
            error = true;
            msg = "State field need to fill up"
            $('#state').focus();
        } else if (zip == "") {
            error = true;
            msg = "Zip Code field need to fill up"
            $('#zip').focus();
        } else if (country == "") {
            error = true;
            msg = "Country field need to fill up"
            $("#country").focus();
        }else if (image.length == 0) {
            error = true;
            msg = "An Image need to upload"
            $('.custom-upload').css('background-color', 'red');
        }
        if(error){
            generateTimeOut("error", "center", msg, 2000);
        } else {
            var formData = new FormData();
            formData.append('id', id);
            formData.append('image', $('.upload-store-image').get(0).files[0]);
            formData.append('storeName', storeName);
            formData.append('phone', phone);
            formData.append('address', address);
            formData.append('city', city);
            formData.append('state', state);
            formData.append('zip', zip);
            formData.append('country', country);
            formData.append('cost', cost);
            formData.append('description', description);

            $.ajax({
                url: "<?php echo URL::to('/'); ?>" + "/claimStore",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (result) {
                    generateTimeOut('success', 'center', "Thank you for claiming your store, our staff will contact you in 48 hours for verification….Please update all your items in your store", 3000);
                    setTimeout(function () {
                        window.location = "<?php echo URL::to('/store'); ?>/" + id;
                    }, 5000);
                }
            });
        }
    });


</script>
@stop
