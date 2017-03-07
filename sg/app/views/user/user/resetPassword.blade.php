@extends('user/layout/default_layout')
@section('content')
<section class="best-sellers" style="min-height: 500px;">
    <div class="Col-md-12 forget-password1">
        <div class="page_content forget-block">
            <div class="main-content main-tl">
                <small>Please enter a new password.</small>
                <div class="center-align">
                    <fieldset class="auth-input-set email-feild-forgetpass">
                        <div class="auth-form">
                            <div class="auth-icon-cont">
                                <i class="fa fa-key"></i>
                            </div>
                            <input placeholder="New Password" id="n_password" name="n_password" maxlength="256" type="password">
                        </div>
                        <div class="auth-form">
                            <div class="auth-icon-cont">
                                <i class="fa fa-key"></i>
                            </div>
                            <input placeholder="Retype Password" id="c_n_password" name="c_n_password" maxlength="256" type="password">
                        </div>


                    </fieldset>
                </div>
                <input type="hidden" id="mail" value="{{$user[0]->email}}">
                <button type="submit" id="subPass" class="btn btn-save2 cstm-save2">Submit</button>
            </div>
        </div>
    </div>
</section>
<script>
    $('#subPass').on('click', function (e) {
        e.preventDefault();
        var newpass = $('#n_password').val();
        var conNewPass = $("#c_n_password").val();

        if (newpass == '' || newpass.length < 6) {
            $('#n_password').focus();

        } else if (newpass == conNewPass) {
            $.ajax({
                url: "<?php echo URL::to('/'); ?>" + "/newPassword",
                type: "POST",
                data: {
                    email: $('#mail').val(),
                    password: newpass
                },
                success: function (result) {
                    generate('success', 'center', result);
                    window.location = "<?php echo URL::to('/login') ?>";
                }

            });
        }

    });
</script>

@stop

