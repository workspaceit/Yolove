@extends('user/layout/default_layout')
@section('content')
<div class="container">
    <div class="row clearfix collection-container">
        <div class="col-md-12 collections clearfix">
            <form id="post-page-form">

                <!-- start images from another site -->
                <div class="img-from-another-site-container">
                    @foreach($data['images'] as $image)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="row no-margin clearfix">
                            <div class="row collection-block post-image-block">
                                <img src="{{$image['imageurl']}}" class="img-responsive">
                                <div class="image-overlay"><img class="image-selected" src="{{ URL::asset('assets/images/right-icon.png')}}" style="display: none;"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- end images from another site -->

                <div class="item-description title-add clearfix">
                    <h2 class="head-styler-add">Then describe your item </h2>
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputAmount">TITLE</label>
                        <div class="input-group">
                            <div class="input-group-addon">Title</div>
                            <input type="text" class="" placeholder="Title" value="{{$data['title']}}" id="title" style="height: 43px;">
                        </div>
                    </div>
                </div>

                <!-- start item category -->
                <div class="item-category item-description clearfix">
                    <h2 class="head-styler-add">Select a category for your item *</h2>
                    <div class="item-category-selection">
                        @foreach($response['categories'] as $category)
                        <div class="col-md-2 col-sm-2 col-xs-6 no-padding category-select category-div" id="{{$category['id']}}">
                            <div class="row category no-margin dummyCategory">
                                <div class="{{$category['category_name_en']}}_image"></div>
                                <span>{{$category['category_name_cn']}}</span>
                            </div>
                        </div>  
                        @endforeach
                    </div>

                </div>
                <!-- end item category -->

                <!-- start item collection -->    
                <div class="item-description clearfix" style="padding-bottom: 20px;">
                    <h2 class="head-styler-add">Create new Collection*</h2>
                    <div class="form-inline">
                        <div class="col-md-10 col-sm-10 col-xs-8 no-padding">
                            <input type="text" style="width: 100%;height: 41px" placeholder="Put your title" id="new_collection">
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-4 no-padding">
                            <a class="create-btn" style="width: 100%;text-align: center;" href="javascript:void(0);" id="create_collection">CREATE</a>
                        </div>
                    </div>
                </div>


                <!-- start item category -->
                <div class="item-category item-description clearfix">
                    <h2 class="head-styler-add">Select a collection for your item *</h2>
                    <div class="item-category-selection item-collection">
                        @foreach($data['collection'] as $collection)
                        <div class="col-md-2 col-sm-2 col-xs-6 no-padding collection-select" id="{{$collection['id']}}">
                            <div class="row category no-margin dummyCollection">
                                <div class="{{$collection->category['category_name_en']}}_image"></div>
                                <span>{{$collection['album_title']}}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
                <!-- end item category -->

                <div class="item-description title-add">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">PRICE</div>
                            <input type="text" class="" placeholder="PRICE" value="{{$data['price']}}" id="price">
                        </div>
                    </div>
                </div>

                <div class="row no-margin">
                    <div class="col-md-12">
                    <div id="product-stock" class="form-group set-form col-md-12 col-sm-12 col-xs-12 text-center">
                        <div class="col-md-1 producthead">SL</div>
                        <div class="col-md-4 producthead">Size</div>
                        <div class="col-md-4 producthead">Quantity</div>
                        <div class="col-md-3 producthead">Action</div>
                    </div>
                    </div>
                </div>

                <div class="item-description title-add">
                    <div class="form-group" style="background: #FFFFFF;">
                        <div class="input-group">
                            <div class="input-group-addon">Stock</div>
                            <div class="row no-margin">
                                <div class="form-group set-form col-md-5 col-sm-5 col-xs-12">
                                    <label for="sel1">Select Size:</label>
                                    <select id="productSize" class="form-control">
                                        <option value="">Select Size</option>
                                        <option value="XL">XL</option>
                                        <option value="L">L</option>
                                        <option value="M">M</option>
                                        <option value="S">S</option>
                                        <option value="XS">XS</option>
                                    </select>
                                </div>
                                <div class="form-group set-form col-md-5 col-sm-5 col-xs-12">
                                    <input type="number" class="" placeholder="Quantity" value="{{@$share['item']['reference_url']}}" id="quantity">
                                </div>
                                <div class="form-group set-form col-md-5 col-sm-5 col-xs-12">
                                    <a class="post-btn" href="javascript:void(0);" id="edit-product-stock">Add</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="item-description title-add">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">URL</div>
                            <input type="text" class="" placeholder="URL" value="{{$data['url']}}" id="url" disabled>
                        </div>
                    </div>
                </div>

                <div class="item-description">
                    <a class="post-btn" href="javascript:void(0);" id="post">POST</a>
                </div>

            </form>
        </div>
    </div>
</div>
<input type = 'hidden' id="productList" name = '' value = '[]'/>
<input type = 'hidden' id="product-sl" name = '' value = '0'/>
<script>
    $(document).ready(function () {
//        var str = '';
//        for (var i = 0; i < colorData.length; i++) {
//            str += "<option value='" + colorData[i].name + "'>";
//            //console.log(jsonData[i].name);
//        }
//        $("#colors").append(str);
        
    });
</script>
<script>
    function deleteOldData(index) {
        var $productList = $("#productList");
        var $productListView = $("#product-stock");

        var productList = JSON.parse($productList.val());
        productList.splice(index, 1);
        $productList.val(JSON.stringify(productList));
        createView(productList, $productListView);
    }

    function createView(data, location) {
        location.html('<div class="col-md-1 producthead">SL</div>'+
                       '<div class="col-md-4 producthead">Size</div>'+
                        '<div class="col-md-4 producthead">Quantity</div>'+
                        '<div class="col-md-3 producthead">Action</div>');

        for (var i = 0; i < data.length; i++) {
            location.append('<div id="productRow' + (i + 1) + '">' +
                    '<div class="col-md-1 productbody">' + (i + 1) + '</div>' +
                    '<div class="col-md-4 productbody">' + data[i].s + '</div>' +
                    '<div class="col-md-4 productbody">' + data[i].q + '</div>' +
                    '<div class="col-md-3 productbody" style="cursor: pointer" class="col-md-2" onclick="deleteOldData(' + "'" + (data.length - 1) + "'" + ');" >delete</div>' +
                    '</div>'
            );
        }
    }

    window.addEventListener("load", function () {

        $("#edit-product-stock").click(function () {
            var pushArray = true;
            var row = -1;
            var size = $("#productSize").val();
            var quantity = $("#quantity").val();
            var productSl;

            var $productSl = $("#product-sl");
            var $productList = $("#productList");
            var $productListView = $("#product-stock");

            if (size != "" && quantity != "") {
                var productList = JSON.parse($productList.val());
                var productListTemp = {s: size, q: parseInt(quantity)};

                for (var i = 0; i < productList.length; i++) {
                    if (productList[i].s == productListTemp.s) {
                        productList[i].q += productListTemp.q;
                        pushArray = false;
                        row = i + 1;
                    }
                }

                if (pushArray) {
                    productSl = parseInt($productSl.val());
                    productSl += 1;
                    $productSl.val(productSl);

                    productList.push(productListTemp);
                    $productListView.append('<div id="productRow' + productList.length + '">' +
                            '<div class="col-md-1 productbody">' + productSl + '</div>' +
                            '<div class="col-md-4 productbody">' + productListTemp.s + '</div>' +
                            '<div class="col-md-4 productbody">' + productListTemp.q + '</div>' +
                            '<div  class="col-md-3 productbody" style="cursor: pointer" onclick="deleteOldData('+ "'" + (productList.length-1) + "'" +');" id="delete-' + productList.length + '">delete</div>' +
                            '</div>'
                    );
                } else {
                    $('#productRow' + row).html(
                            '<div class="col-md-1 productbody">' + row + '</div>' +
                            '<div class="col-md-4 productbody">' + productList[row - 1].s + '</div>' +
                            '<div class="col-md-4 productbody">' + productList[row - 1].q + '</div>' +
                            '<div class="col-md-3 productbody" style="cursor: pointer" onclick="deleteOldData('+ "'" + (productList.length-1) + "'" +');" id="delete-' + row + '">delete</div>'
                    );
                }

                $productList.val(JSON.stringify(productList));

            } else {
                alert("All Stock fields required !");
            }
        });

        $(".post-image-block").click(function () {
            var elem = $(this).find(".image-overlay").first();
            var elem_img = $(this).find(".image-selected").first();
            if (typeof $(elem).attr("selected_item") != "undefined" && $(elem).attr("selected_item") == "true") {
                $(elem).removeAttr("selected_item");
                $(elem).removeAttr("style");
                $(elem_img).removeAttr("style");
                $(elem_img).fadeOut(500);
            } else {
                $(elem).css("display", "block");
                $(elem_img).fadeIn(500, function () {
                    setItemToDefault(getSelectedElement());
                    $(elem).attr("selected_item", "true");
                });

            }
        });
        $(".dummyCategory").click(function () {
            if (typeof $(this).attr("selected_category") != "undefined" && $(this).attr("selected_category") == "true") {
                $(this).removeAttr("selected_category");
                $(this).removeAttr("style");
            } else {
                var elem = getSelectedCategoryElement("dummyCategory");
                $(elem).removeAttr("selected_category");
                $(elem).removeAttr("style");

                $(this).attr("selected_category", "true");
                $(this).css("background", " #d43d2e");
            }
        });
        $(".dummyCollection").click(function () {

            if (typeof $(this).attr("selected_category") != "undefined" && $(this).attr("selected_category") == "true") {
                $(this).removeAttr("selected_category");
                $(this).removeAttr("style");
            } else {
                var elem = getSelectedCategoryElement("dummyCollection");
                $(elem).removeAttr("selected_category");
                $(elem).removeAttr("style");

                $(this).attr("selected_category", "true");
                $(this).css("background", " #d43d2e");
            }
        });

        // Select First Element 
        $(".category").first().trigger("click");
        $(".post-image-block").first().trigger("click");
        $(".dummyCollection").first().trigger("click");

    });
    function setItemToDefault(selectedElem) {
        if (typeof selectedElem != "undefined") {
            var elem_img = $(selectedElem).find(".image-selected").first();
            $(elem_img).fadeOut(500, function () {
                $(selectedElem).removeAttr("selected_item");
                $(selectedElem).removeAttr("style");
                $(elem_img).removeAttr("style");
            });
        }
    }
    function getSelectedElement() {
        var selectedElem;
        $(".post-image-block").each(function () {
            var elem = $(this).find(".image-overlay").first();
            var elem_img = $(this).find(".image-selected").first();
            $(elem_img).removeAttr("style");
            if (typeof $(elem).attr("selected_item") != "undefined" && $(elem).attr("selected_item") == "true") {
                selectedElem = elem;
                return;
            }
            ;

        });

        return selectedElem;
    }
    function getSelectedCategoryElement(cls) {
        var selectedElem;
        $("." + cls).each(function () {
            if (typeof $(this).attr("selected_category") != "undefined" && $(this).attr("selected_category") == "true") {
                selectedElem = this;
            }
        });

        return selectedElem;
    }
    function getSelectedElementImgSrc() {
        var elem = getSelectedElement();
        if (typeof elem != "undefined") {
            return  $(elem).parent().find("img").first().attr("src");
        }
        return "";
    }
    function getSelectedCategoryElementId() {

        var elem = getSelectedCategoryElement("dummyCategory");
        if (typeof elem != "undefined") {
            return  $(elem).parent().first().attr("id");
        }
        return "0";
    }
    function getSelectedCollectionElementId() {

        var elem = getSelectedCategoryElement("dummyCollection");
        if (typeof elem != "undefined") {
            return  $(elem).parent().first().attr("id");
        }
        return "0";
    }
    $('#create_collection').on("click", function () {
        var album_title = $('#new_collection').val();
        var category_id = getSelectedCategoryElementId();
        if (album_title != '') {
            $.ajax({
                url: "<?php echo URL::to('/'); ?>" + "/createAlbum",
                type: "POST",
                data: {
                    album_title: album_title,
                    category_id: category_id
                },
                success: function (result) {
                    if (result == "This Album Already Exist in your Profile") {
                        generateTimeOut('notification', 'center', result, 3000);
                    } else {
                        collection = '<div class="col-md-2 col-sm-2 col-xs-6 no-padding collection-select" id="' + result.id + '"><div class="row category no-margin dummyCollection"><div class="' + result.category.category_name_en + '_image"></div><span>' + result.album_title + '</span></div></div>';
                        $('.item-collection').prepend(collection);
                        $("#" + result.id).find(".dummyCollection").first().click(function () {
                            if (typeof $(this).attr("selected_category") != "undefined" && $(this).attr("selected_category") == "true") {
                                $(this).removeAttr("selected_category");
                                $(this).removeAttr("style");
                            } else {
                                var elem = getSelectedCategoryElement("dummyCollection");
                                $(elem).removeAttr("selected_category");
                                $(elem).removeAttr("style");

                                $(this).attr("selected_category", "true");
                                $(this).css("background", " #d43d2e");
                            }
                        });
                        $(".dummyCollection").first().trigger("click");
                    }
                }
            });
        }
    });
    $('#post').on("click", function () {
        var album_id = getSelectedCollectionElementId();
        var category_id = getSelectedCategoryElementId();
        var image_path = getSelectedElementImgSrc();
        var url = $('#url').val();
        var title = $('#title').val();
        var price = $('#price').val();
        var error = false;
        var errorMsg = "";
        var productId = $('#productList').val();
        // image_path = $(".selectFile").attr("value",image_path);
        if (album_id == "0"){
            error = true;
            errorMsg = "Please Select a Collection";
        } else if(category_id == "0"){
            error = true;
            errorMsg = "Please Select a Category";
        } else if(image_path == "") {
            error = true;
            errorMsg = "Please Select an Image";
        } else if (url == "") {
            $('#url').focus();
            error = true;
            errorMsg = "Please fill up Url field";
        } else if (title == "") {
            $('#title').focus();
            error = true;
            errorMsg = "Please fill up Title field";
        }  else if (price.trim() == "") {
            $('#price').focus();
            error = true;
            errorMsg = "Please fill up Price field";
        } else if(isNaN(price.trim())){
            error = true;
            errorMsg = "Please put a valid price";
        }
        if(error){
            generateTimeOut('error', 'center', errorMsg, 3000);
        } else {
            var formData = new FormData();
            formData.append('image_path', image_path);
            formData.append('album_id', album_id);
            formData.append('category_id', category_id);
            formData.append('reference_url', url);
            formData.append('title', title);
            formData.append('price', price);
            formData.append('product', productId);
            $.ajax({
                url: "<?php echo URL::to('/'); ?>" + "/postProduct",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (result) {
                    result = $.parseJSON(result);
                    generateTimeOut('success', 'center', result.message, 5000);
                    setTimeout(function () {
                        window.location = "<?php echo URL::to('/item'); ?>/" + result.data.id + "/" + result.data.slugTitle;
                    }, 3000);
                }
            });
        }
    });

</script>
@stop