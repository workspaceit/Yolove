<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//echo 'hello';
//$user = $this->Session->read('MyUser');
//echo '<pre>';
//print_r($user);
//die;
?>
<?php echo $this->Session->flash(); ?>
<div class="row-fluid">
    <div class="span12 table_action" id="admin_categories">   
<?php echo $this->Form->create('User'); ?>
        <fieldset>
            <div class="page-header position-relative">
                <h1>
                    Change Password
                    <small>
                        <i class="icon-double-angle-right"></i>
                    </small>
                </h1>
            </div>
            <h4 class="green"><i class="icon-tags green"></i>Add User Basic Information</h4>
<?php
echo $this->Form->input('old_password', array('type' => 'password', 'required' => 'required'));
echo '<label for="UsersPassword">New Password</label>';
echo $this->Form->input('passwd', array('required' => 'required', 'label' => false, 'size' => 5));
?>
            <div id="passwdDiv">
            </div>
<?php
echo $this->Form->input('repeat_password', array('type' => 'password', 'required' => 'required'));
?>
            <div id="repeatDiv">
            </div>
        </fieldset>
        <button class="btn btn-info test" type="submit">
            <i class="icon-ok bigger-110"></i>
            Submit
        </button>
        <a class="btn btn-danger" href="<?php echo $this->webroot; ?>">
            <i class="icon-remove bigger-110"></i>
            Cancel
        </a>
    </div>
</div>


<script type="text/javascript">
    $('.test').on("click", function () {
//        alert('hi');
        var newPass = $('#UserPasswd').val();
        var repeatPass = $('#UserRepeatPassword').val();
        var passLen = ($('#UserPasswd').val()).length;
//        alert(passLen);
        if (newPass != repeatPass)
        {
            document.getElementById('repeatDiv').innerHTML = "Repeated password doesn't match";
            document.getElementById('passwdDiv').innerHTML = "";
            return false;
        }
        else if (passLen < 6)
        {
            document.getElementById('passwdDiv').innerHTML = "Minimum password length is 6 character";
            document.getElementById('repeatDiv').innerHTML = "";
            return false;
        }
    });
</script>