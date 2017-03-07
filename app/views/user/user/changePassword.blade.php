@extends('user/layout/profile_layout')
@section('profileContent')

<div class="row start-thumbs">
    <div class="col-md-9 col-sm-12 col-xs-12">
        @if(isset($response['message']))
        {{$response['message']}}
        @endif
        <form class="change-password-form form-edit" style="padding: 5px 10px;" action="<?php echo URL::to('/'); ?>/updatePassword" method="POST">
            <h4>Change account Settings</h4>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$userInfo['email']}}" placeholder="" disabled>
            </div>

            <div class="form-group">
                <label for=""> Current password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="" required>
            </div>
            <div class="form-group">
                <label for=""> New password</label>
                <input type="password" class="form-control" id="new_password" name="new_password" placeholder="" required>
            </div>
            <div class="form-group">
                <label for=""> Re-type password</label>
                <input type="password" class="form-control" id="retype_password" name="retype_password" placeholder="" required>
            </div>
            <!--<input type="hidden" value="{{$userInfo['passwd']}}" id="old_pass" name="old_pass">-->
            <div class="form-group">
                <button type="submit" class="btn btn-set btn-success">Save Change</button>
            </div>
        </form>
    </div>
</div>

<script>
    $('.form-edit').submit(function () {
        if ($("#new_password").val() != $("#retype_password").val()) {
            generate('error', 'center', 'Repeated password does not match with new password!');
            return false;
        }
        return true;
    })
</script>
@stop