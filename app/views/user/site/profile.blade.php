@extends('user/layout/profile_layout')
@section('profileContent')
<input type="hidden" id="progress" value="0">
<input type="hidden" id="existAlbum" value="{{ Session::get('existAlbum') !== null ? Session::get('existAlbum') : '' }}">
<script>
    var existAlbum = $("#existAlbum").val();
    if(existAlbum.trim() != ""){
       // alert(existAlbum);
        var n = noty({
            text: existAlbum,
            id: "endProcessing",
            type: "error",
            dismissQueue: true,
            timeout: 3000,
            closeWith: ['click'],
            layout: "center",
            theme: 'defaultTheme',
            maxVisible: 1,
        });
        //generateTimeOut("error","center",existAlbum,3000);
    }
    $(function () {
        var id = $('#userId').val();
        $.ajax({
            url: "<?php echo URL::to('/'); ?>" + "/getUserCollections",
            type: "GET",
            data: {
                page: "profile",
                id: id,
                limit: 20
            },
            success: function (result) {
                $('#show_collection').addClass('active');
                $('#userAlbums').css('display', 'block');
                $('#userAlbums').html(result);
            }
        });
    });
    $(window).scroll(function () {
        var inProgress = $('#progress').val();
        var iCurScrollPos = $(this).scrollTop();
        if (inProgress != '1') {
            if ($('#userAlbums').is(':visible')) {
                var lastAlbum = $('.lastAlbum').last().val();
                var id = $('#userId').val();
                if ($(document).height() == $(window).scrollTop() + $(window).height()) {
                    if (iCurScrollPos > 0) {
                        $('#progress').val('1');
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
                                $('#progress').val('0');
                                $('#userAlbums').append(result);
                            }
                        });
                    }
                }
            }
        }
    });

</script>
@stop
