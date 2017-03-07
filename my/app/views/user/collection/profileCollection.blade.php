@extends('user/layout/profile_layout')
@section('profileContent')
<input type="hidden" id="progress" value="0">
<script>
    var scrollStart = 200;
    $(function () {
        var id = $('#userId').val();
//        generate('notification', 'center', '<img src="{{ URL::asset("assets/images/LoadingWait.gif")}}">');
        $.ajax({
            url: "<?php echo URL::to('/'); ?>" + "/getUserCollections",
            type: "GET",
            data: {
                page: "profile",
                id: id,
                limit: 20
            },
            success: function (result) {
                $("#processing").trigger("click");
                $('#show_collection').addClass('active');
                $('#userAlbums').css('display', 'block');
                $('#userAlbums').html(result);

            }
        });
        $(window).scroll(function () {
            var inProgress = $('#progress').val();
            var iCurScrollPos = $(this).scrollTop();
            if (inProgress != '1') {
                if ($('#userAlbums').is(':visible')) {
                    var lastAlbum = $('.lastAlbum').last().val();
                    var id = $('#userId').val();
                    if ($(window).scrollTop() >= scrollStart) {
                        if (iCurScrollPos > 0) {
                            scrollStart = scrollStart + 200;
                            $('#progress').val('1');
//                            generate('information', 'bottomCenter', " Loading......");
                            $.ajax({
                                url: "<?php echo URL::to('/'); ?>" + "/getUserCollections",
                                type: "GET",
                                data: {
                                    page: "profile",
                                    id: id,
                                    limit: 20,
                                    lastAlbum: lastAlbum
                                },
                                success: function (result) {

                                    $("#processing").trigger("click");
                                    if (result != null && result != "") {
                                        $('#progress').val('0');
                                        $('#userAlbums').append(result);
                                    } else {
//                                        generateTimeOut('information', 'bottomCenter', 'No more product found', 3000);
                                    }
                                }
                            });
                        }
                    }
                }
            }

        });
    });

</script>
@stop