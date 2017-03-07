/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var baseUrl;
var jsnObj;
var $signInputs;
var $Email;
var $Password;
jQuery(document).ready(function() {

    baseUrl = jQuery('#baseUrl').val();


    jQuery('.sub').click(function() {
        $signInputs = jQuery('#signup :input');
        $Email = jQuery('.email').val();
        $Password = jQuery('.pass').val();
        if ($Email.length === "" && !IsEmail($Email)) {
            alert("Email Error1");
            return false;
        }
//        console.log(isExistemail($Email));
        if (isExistemail($Email)) {
//            console.log("dsdsd");
            alert("Email Error@");
            return false;
        }
        if ($Password.length <= 6 || $Password.length >= 25) {
            alert("Password Error");
            return false;
        }

    });
});

function createJSON($inputs) {
    jsonObj = [];
    var item = {};
    $($inputs).each(function() {
        item[this.className] = $(this).val();
        //console.log(e[0].className);
        //console.log($(this).attr('name'));
        jsonObj.push(item);
    });
    return  JSON.stringify(jsonObj[0]);

}

function IsEmail($Email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test($Email);
}
function isExistemail($Email) {
    var $Data;
    $.ajax({
        type: "POST",
        url: baseUrl + 'accounts/isExistemail',
        beforeSend: function() {

        },
        data: {
            email: $Email
        },
        success: function($Data) {
            
             if($Data==="True"){
                 signup();
             }else{
                 $( ".box" ).effect( "shake" );
             }
        }, error: function(xhr) {

        }
    });
}

function signup() {

    jsnObj = createJSON($signInputs);
    jQuery.ajax({
        type: "POST",
        url: baseUrl + 'Accounts/doSignupOne',
        dataType: "json",
        beforeSend: function() {

        },
        data: {
            data: jsnObj
        },
        success: function() {

        }, error: function(xhr) {

        },
        complete: function() {

        }
    });
}



