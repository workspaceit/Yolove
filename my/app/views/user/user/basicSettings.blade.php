@extends('user/layout/profile_layout')
@section('profileContent')
<div class="col-md-12 start-thumbs">
    <div class="col-md-12 col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-1">   
        <form class="form-horizontal" action="<?php echo URL::to('/'); ?>/updateUser" method="POST">
            <div class="form-group">
                <label for="" class="col-md-3 col-sm-4 set-lb text-left">Profile Picture</label>
                <div class="col-md-9 col-sm-8">
                    <button type="button" class="btn profile-photo" data-toggle="modal" data-target="#profile-photo-modal">
                        Upload Profile Photo
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="profile-photo-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Upload Profile Photo</h4>
                                </div>
                                <div class="modal-body">
                                    <div style="position:relative;">
                                        <a class="btn btn-primary btn-mob" href="javascript:;">
                                            Choose File...
                                            <input class="upload-profile-image upload-mob-image" type="file" name="file_source" size="40" onchange='$("#upload-file-info").html($(this).val());'>
                                        </a>
                                        &nbsp;
                                        <span class="label label-info" id="upload-file-info"></span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success" id="changeProfile" data-dismiss="modal">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-md-3 col-sm-4 set-lb"> Profile</label>
                <div class="col-md-9 col-sm-8">
                    <input type="text" class="form-control" id="nickname" name="nickname" value="{{$userInfo['nickname']}}" placeholder="Name" style="width:100%">
                    <label class="note">4 to 20 characters</label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-3 col-sm-offset-4 col-md-9 col-sm-8">
                    <input type="text" class="form-control" id="" name="usertitle" value="{{$userInfo['user_title']}}" placeholder="Alternate Name">
                    <label class="note">Only characters and numbers</label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-3 col-sm-offset-4 col-md-9 col-sm-8">
                    <input type="text" class="form-control" id="" name="domain" value="{{$userInfo['domain']}}" placeholder="Personal URL">
                    <label class="note"> <a href="<?php echo URL::to('/'); ?>/go/@if($userInfo['domain']){{$userInfo['domain']}} @else *** @endif"><?php echo URL::to('/'); ?>/go/@if($userInfo['domain']){{$userInfo['domain']}} @else *** @endif</a> </label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-3 col-sm-offset-4 col-md-9 col-sm-8">
                    <label class="radio-inline">
                        <input id="" name="gender" value="male" type="radio" checked>
                        Male </label>
                    <label class="radio-inline">
                        <input id="" name="gender" value="female" type="radio" @if($userInfo['gender'] == "female") checked @endif>
                               Female</label>
                    <label class="radio-inline">
                        <input id="" name="gender" value="none" type="radio" @if($userInfo['gender'] == "none") checked @endif>
                               Secret</label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-3 col-sm-offset-4 col-md-9 col-sm-8">
                    <input type="text" class="form-control" id="" name="province" value="{{$userInfo['province']}}" placeholder="state">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-3 col-sm-offset-4 col-md-9 col-sm-8">
                    <input type="text" class="form-control" id="" name="city" value="{{$userInfo['city']}}" placeholder="city">
                </div>
            </div>                   
            <div class="form-group">
                <div class="col-md-offset-3 col-sm-offset-4 col-md-9 col-sm-8">
                    <textarea placeholder="About yourself" name="bio" class="form-control">{{$userInfo['bio']}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-md-3 col-sm-4 set-lb">Connections</label>
                <div class="col-md-9 col-sm-8 connection">
                    <a class="btn btn-facebook" href="<?php echo URL::to('/'); ?>/socialLogin/facebook"><i class="fa fa-facebook"></i>&nbsp;&nbsp;Connect with Facebook</a>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-3 col-sm-offset-4 col-md-9 col-sm-8 connection">
                    <a class="btn btn-twitter" href="<?php echo URL::to('/'); ?>/socialLogin/twitter"> <i class="fa fa-twitter"></i>&nbsp;&nbsp; Connect with Twitter</a>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-md-3 col-sm-4 set-lb">Email Notification</label>
                <div class="col-md-9 col-sm-8">
                    <label>Get an email when...</label>
                    <div class="checkbox">
                        <label><input type="checkbox" value="1" name="user_follow_email_option" @if($userInfo['follow_you']) checked @endif>Someone follows you </label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="1" name="user_like_collection_email_option" @if($userInfo['like_collection']) checked @endif> Someone like your collections </label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="1" name="user_like_item_email_option" @if($userInfo['like_item']) checked @endif>Someone like a item of yours </label>
                    </div>

                    <div class="checkbox">
                        <label><input type="checkbox" value="1" name="user_mention_email_option" @if($userInfo['mentions_you']) checked @endif> Someone mentions you </label>
                    </div>

                    <div class="checkbox">
                        <label><input type="checkbox" value="1" name="user_store_email_option" @if($userInfo['store_follow']) checked @endif>Someone added an item to the store you follow </label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="1" name="user_you_follow_email_option" @if($userInfo['user_follow']) checked @endif>Someone added an item who you follow </label>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="1" name="user_collection_email_option" @if($userInfo['collection_follow']) checked @endif>Someone added an item to the collection you follow </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-4 col-sm-offset-4 col-md-4 col-xs-4 col-xs-offset-4">
                    <button type="submit" class="btn btn-success">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(function () {
        $('.upload-profile-image').on('change', function (event) {// we fetch the file data
            var files = this.files;
            var reader = new FileReader();
            var name = this.value;
            reader.onload = function (e) {
                $(".user-img").find("img").attr("src",e.target.result);
            };
            reader.readAsDataURL(files[0]);
        });
        $('#changeProfile').on("click", function () {
            var avatar = $('.upload-profile-image')[0].files;
            if (avatar.length != 0) {
                var formData = new FormData();
                formData.append('avatar', $('.upload-profile-image').get(0).files[0]);
                $.ajax({
                    url: "<?php echo URL::to('/'); ?>" + "/changeProfile",
                    type: "POST",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (result) {
                    }
                });
            }
        });

    });
</script>
@stop
