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
                    <input type="text" class="form-control" id="phone" placeholder="Phone number" required="required" value="{{$store->phone}}">
                </div>
                <div class="row clearfix form-control-div">
                    <input type="text" class="form-control" id="address" placeholder="Business address" required="required" value="{{$store->address}}">
                </div>
                <div class="row clearfix form-control-div">
                    <input type="text" class="form-control" id="city" placeholder="City" required="required" value="{{$store->city}}">
                </div>
                <div class="row clearfix form-control-div">
                    <input type="text" class="form-control" id="state" placeholder="State" required="required" value="{{$store->province}}">
                </div>
                <div class="row clearfix form-control-div">
                    <input type="text" class="form-control" id="zip" placeholder="Zip/ Postal code" required="required" value="{{$store->zip_code}}">
                </div>
                <div class="row clearfix form-control-div">
                    <input type="text" class="form-control" list="countries" id="country" placeholder="Country" required="required" value="{{$store->country}}">
                </div>
                <div class="row clearfix form-control-div">
                    <input type="text" class="form-control" id="shipping_cost" placeholder="Shipping Cost" required="required" value="{{$store->shipping_fee}}">
                </div>
                <div class="row clearfix form-control-div">
                    <textarea class="form-control" id="description" placeholder="Description">{{$store->store_desc}}</textarea>
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
                        <?php
                        $storeImg = "uploads/attachments/store/" . $store->id . "_" . md5($store->domain_name) . ".jpg" . "";
                        if (file_exists($api_server . $storeImg)) {
                            ?>
                            <img class="img-responsive storeImage" src="<?php echo $api_url; ?>{{$storeImg}}">
                        <?php } else { ?>
                            <img class="img-responsive storeImage" src="{{URL::asset('assets/images/no-image.jpg')}}">
                        <?php } ?>
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

//var mydata = JSON.parse(jsonData);
        console.log(jsonData.length);
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
        if (storeName == "") {
            $('#store_name').focus();
        } else if (phone == "") {
            $('#phone').focus();
        } else if (address == "") {
            $('#address').focus();
        } else if (city == "") {
            $('#city').focus();
        } else if (state == "") {
            $('#state').focus();
        } else if (zip == "") {
            $('#zip').focus();
        } else if (country == "") {
            $("#country").focus();
        } else {
            var formData = new FormData();
            formData.append('id', id);
            if (image.length != 0) {
                formData.append('image', $('.upload-store-image').get(0).files[0]);
            }
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
                url: "<?php echo URL::to('/'); ?>" + "/updateStore",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (result) {
                    window.location = "<?php echo URL::to('/store'); ?>/" + id;
                }
            });
        }
    });


</script>
@stop
