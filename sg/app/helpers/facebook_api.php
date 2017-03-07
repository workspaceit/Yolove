<?php

require app_path().'/helpers/OAuth_Facebook.php';

class facebook_api {

    private $vendor = 'facebook';
    private $pz;
    protected $oauth;
    protected $client;
    protected $info;

    function __construct() {
        $this->oauth = new Facebook(array(
            'appId' => '145994735602919',
            'secret' => 'ff3699fb75ce442b90c47d6026895eb8',
        ));
    }

    function getloginpage($state = NULL, $display = NULL) {
        return $this->oauth->getLoginUrl(array(
                    'scope' => 'email',
                    'req_perms' => 1,
                    'fbconnect' => 0));
    }

    function get_accesstoken() {
        return true;
    }

    function get_userinfo() {
        $user = $this->oauth->getUser();
        if ($user) {
            try {
                $user_profile = $this->oauth->api('/me');
                echo "<pre>";
                print_r($user_profile);
                die();
                $userinfo = array();
                $userinfo['uid'] = $user_profile['id'];
                $userinfo['screen_name'] = $user_profile['username'];
                $userinfo['email'] = $user_profile['email'];
                $userinfo['name'] = $user_profile['name'];
                $userinfo['avatar'] = "https://graph.facebook.com/" . $user_profile['id'] . "/picture?type=large";
                $userinfo['location'] = $user_profile['location'] ? $user_profile['location']['name'] : '';
                $userinfo['description'] = $user_profile['bio'];
                $userinfo['url'] = $user_profile['link'];
                if ($user_profile['gender'] == 'male') {
                    $userinfo['gender'] = 'male';
                } elseif ($temp['gender'] == 'female') {
                    $userinfo['gender'] = 'female';
                } else {
                    $userinfo['gender'] = 'none';
                }
                return $userinfo;
            } catch (FacebookApiException $e) {
                $errot = $e;
            }
        }
        return null;
    }

}
