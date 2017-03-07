@extends('user/layout/profile_layout')
@section('profileContent')
<form class="col-md-12 form-edit" action='{{ URL::to('/')."/updateCollection"}}' method="POST" enctype="multipart/form-data">

    <h4>Edit Information</h4>
    <input type="hidden" name="id" value="{{$album['id']}}"/>

    <div class="row clearfix">
        <div class="show-img-div">
        </div>
        <label class="custom-upload"><input type="file" name="collection_image" class="upload-image upload-store-image" onchange='$(".show-img-div").html($(this).val());'>Upload a Image</label>
    </div>
    <div class="row clearfix">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label>Album Title :</label>
                <input class="form-control" type="text" name="album_title" value="{{$album['album_title']}}">
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label> Album Category :</label>
                <select name="category_id" class="form-control">
                    @foreach($response['categories'] as $category)
                    <option value="{{$category['id']}}"
                    <?php
                    if ($category['id'] == $album['category_id']) {
                        echo "Selected";
                    }
                    ?>>{{$category['category_name_cn']}} </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="form-group">
                <label>Description :</label>
                <textarea class="form-control" name="album_desc">{{$album['album_desc']}}</textarea>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success btn-save-change" name="updateCollection">Save</button>
</form>
<script>
    $(function () {
        $(".upload-store-image").change(function () {
            var files = this.files;
            var reader = new FileReader();
            var name = this.value;
            reader.onload = function (e) {
                $(".show-img-div").html("<img src='" + e.target.result + "' width='150' height='150' />");
            };
            reader.readAsDataURL(files[0]);
        });
    });
</script>
@stop
