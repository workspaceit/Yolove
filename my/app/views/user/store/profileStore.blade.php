@extends('user/layout/profile_layout')
@section('profileContent')
<input type="hidden" id="progress" value="0">
<script>
    var scrollStart = 200;
    var offsetCount = 0;
    $(function () {
        var id = $('#userId').val();
        $.ajax({
            url: "<?php echo URL::to('/'); ?>" + "/userStores",
            type: "GET",
            data: {
                page: "profile",
                id: id,
                limit: 20
            },
            success: function (result) {
                offsetCount++;
                $('#show_stores').addClass('active');
                $('#show_collection').removeClass('active');
                $('#show_saved').removeClass('active');
                $('#userAlbums').css('display', 'none');
                $('#tiles').css('display', 'none');
                $('#userStores').css('display', 'block');
                $('#userStores').html(result);
            }
        });
        $(window).scroll(function () {
            var inProgress = $('#progress').val();
            var iCurScrollPos = $(this).scrollTop();
            if (inProgress != '1') {
                if ($('#userStores').is(':visible')) {
                    var lastStore = $('.lastStore').last().val();
                    var id = $('#userId').val();
                    //if ($(document).height() == $(window).scrollTop() + $(window).height()) {
                    if ($(window).scrollTop() >= scrollStart) {
                        if (iCurScrollPos > 0) {
                            scrollStart = scrollStart + 200;
                            $('#progress').val('1');
                            takeoffset = offsetCount * 20;
//                            generate('information', 'bottomCenter', " Loading......");
                            $.ajax({
                                url: "<?php echo URL::to('/'); ?>" + "/userStores",
                                type: "GET",
                                data: {
                                    page: "profile",
                                    id: id,
                                    limit: 20,
                                    lastStore: lastStore,
                                    offset: takeoffset
                                },
                                success: function (result) {

                                    $("#processing").trigger("click");
                                    if (result != null && result != "") {
                                        $('#progress').val('0');
                                        offsetCount++;
                                        $('#userStores').append(result);
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