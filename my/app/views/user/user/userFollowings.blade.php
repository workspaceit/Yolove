@extends('user/layout/profile_layout')
@section('profileContent')

<script>
    $(function () {
        var id = $('#userId').val();
//        generate('notification', 'center', '<img src="{{ URL::asset("assets/images/LoadingWait.gif")}}">');
        $.ajax({
            url: "<?php echo URL::to('/'); ?>" + "/userFollowings",
            type: "GET",
            data: {
                id: id,
                page: "profile"
            },
            success: function (result) {
                $("#processing").trigger("click");
                $('#userAlbums').css('display', 'none');
                $('#userStores').css('display', 'none');
                $('#tiles').css('display', 'none');
                $('#userFollowers').css('display', 'block');
                $('#userFollowers').html(result);
            }
        });
    });
</script>
@stop