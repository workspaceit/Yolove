<?php

class MailHelper {

    public function sendMail($data){
        //$sendUrl = "";        
        //$domain = $_SERVER['HTTP_HOST'];
        $smtpEmail = Settings::where('set_key','=','email')->get();
        if(count($smtpEmail)){
           $sender = unserialize($smtpEmail[0]->set_value);
           $serverEmail = $sender['from'];
        }
//        $domain = "yolove.it";
//        //print_r($domain);die();
//        $exp = explode('.', $domain);
//        $serverUrl = "localhost"; 
//        
//        
//        if ($_SERVER['HTTP_HOST'] == 'localhost') {            
//            //$sendUrl = base_path()."home/alert";
//        } else {
//            $serverUrl = $exp[0] . '.' . $exp[1];
//            //$sendUrl = 'http://' . $exp[0] . '.' . $exp[1] . '/home/alert';
//        }
        $subject = $data['subject'];
        $message = '<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"></head>';
        $message .= '<div style="width:690px;height:auto;margin-right:auto;margin-left:auto;background:#f8f8f8;margin-top:20px;padding:20px 0px">
	<div style="min-height: 500px;">
	

	<div style="background:#46BFC4;min-height:60px;padding-top:20px;text-align:center;border:1px solid #ddd;width:600px;margin-left:auto;margin-right:auto;">
	
		<img src="http://yolove.it/sg/assets/css/logo_email.png"/>
	</div>	

	<div style="margin-top:20px;border:1px solid #ddd;background:#fff;width:600px;margin-left:auto;margin-right:auto;min-height:100px;text-align:center;padding:50px 0;">
		<p style="font-size: 22px">Hi '.$data['name'].'</p>
                <p style="font-size: 22px">'.$data['user'].'</a>'. $data['msg']. $data['collection'] .'</p>
		<p style="font-size: 22px"><img style="padding: 10px 15px;" src="http://yolove.it/sg/assets/css/yolove_email.png"/> <br> </p>

		<div  style="padding:10px 0;border:1px solid #ddd;background:#f2f2f2;width:500px;margin-left:auto;margin-right:auto;min-height:20px;text-align:center;">
			'.$data['see_post'].'
		</div>

	</div>

	<div style="margin-top:20px;border:1px solid #ddd;background:#fff;width:600px;margin-left:auto;margin-right:auto;min-height:50px;text-align:center;padding:50px 0; padding-bottom: 0px;">
		<p> 
			<a style= "text-decoration: none; color: #46BFC4;"  href="https://www.facebook.com/pages/Pinkalscom/564548893582317?ref=hl"><img style="padding: 10px 5px 20px 5px;" src ="http://yolove.it/sg/assets/css/facebook_email.png"/></a>
			<a style= "text-decoration: none; color: #46BFC4;"  href="https://twitter.com/PinkalsLLP"><img style="padding: 10px 5px 20px 5px;" src ="http://yolove.it/sg/assets/css/twitter_email.png"/></a>
			<a style= "text-decoration: none; color: #46BFC4;" href="http://yolove.it/sg"><img style="padding: 10px 5px 20px 5px;" src ="http://yolove.it/sg/assets/css/instagram_email.png"/></a>
		</p>

		<p style="font-size: 16px;">This email was sent by Yolove.it. <a style="text-decoration:none;color:#46BFC4"  href="www.workspaceit.com/yolove_web/profile/basicsetting">You can edit your notification settings on Yolove.it</a> <br> Thank you </p>
	
		<div style="margin-top:30px;background:#46BFC4;width:600px;margin-left:auto;margin-right:auto;min-height:30px;padding-top:10px;text-align:center;">
	    	<img src="http://yolove.it/sg/assets/css/logo_footer_email.png"/>
		</div>

			</div>
	</div>


</div>';
        $to = $data['email'];
        $from = $serverEmail;
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From:" . $from;
        mail($to, $subject, $message, $headers);
    }
    public function mailPassConfirmation($data) {
        $sendUrl = "";
        //$domain = $_SERVER['HTTP_HOST'];
        $smtpEmail = Settings::where('set_key','=','email')->get();
        if(count($smtpEmail)){
           $sender = unserialize($smtpEmail[0]->set_value);
           $serverEmail = $sender['from'];
        }
        $verification_code = substr(sha1($data->email), 9, 13);

        if ($_SERVER['HTTP_HOST'] == 'localhost') {
            $sendUrl = "http://workspaceit.com/yolove_web/users/resetPassword?email=" . $data->email . "&passwordToken=" . $verification_code;
        } else {
            //$serverUrl = $exp[0] . '.' . $exp[1];
            $sendUrl = 'http://workspaceit.com/yolove_web/users/resetPassword?email=' . $data->email . '&passwordToken=' . $verification_code;
        }
        $to = $data->email;
        $subject = "Yolove.it | Password Recovery";
        $message = $data->nickname . ", to change the password for your account | ";
        $message .= "Please click the following link: " . $sendUrl . " ... then follow the on-site instructions. ";
        $message .= "Thank you, Yolove.it Management Team";
        $from = $serverEmail;
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From:" . $from;
        mail($to, $subject, $message, $headers);
    }
    
    
    public function mailPassToContact($data) {
        $sendUrl = "";
        $smtpEmail = Settings::where('set_key','=','email')->get();
        if(count($smtpEmail)){
           $sender = unserialize($smtpEmail[0]->set_value);
           $serverEmail = $sender['from'];
        }
        $to = $serverEmail;
        $subject = $data['subject'];
        $message = "<p> Hi I am " . $data['name']. "</p>";
        $message .= $data['message'];
        $from = $data['email'];
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From:" . $from;
        mail($to, $subject, $message, $headers);
    }

}

?>
