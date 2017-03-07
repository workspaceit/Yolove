<?php

require app_path() . '/helpers/facebook_api.php';

class UserController extends YoloveController {

    public function userLogin() {
        if (!$this->islogin) {
            if (isset($_SESSION[$this->cartuser])) {
                $_SESSION['beforelogin'] = $_SESSION[$this->cartuser];
                unset($_SESSION[$this->cartuser]);
            }
        }
        $input = Input::all();
        $validUser = User::where('nickname', '=', $input['email'])->get();
        if (count($validUser)) {
            $rules = array(
                'email' => 'required',
                'password' => 'required|min:6',
            );
        } else {
            $rules = array(
                'email' => 'required|email',
                'password' => 'required|min:6',
            );
        }
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $this->_response['error'] = true;
            if (strlen($input['password']) < 6) {
                $this->_response['response'] = 'Password must be greater then 6 charecter';
            } else {
                $this->_response['response'] = 'User does not found';
            }
            $this->_response['message'] = $validator->messages();
            $this->_status = 400;
        } else {
            if (Session::has('uid')) {
                $this->_response['status']['hasUid'] = true;
            } else {
                $user = new UserHelper();
                $user = $user->login($input);
                if (!empty($user) && !$user->errorMessage) {
                    $data = $user->toArray();
                    $userdata = array('uid' => $data['id'], 'nickname' => $data['nickname'], 'email' => $data['email'], 'isstar' => $data['is_star'], 'issocial' => $data['is_social'], 'user_credits' => $data['user_credits'], 'system' => $data['role']->id);
                    Session::put($userdata);
                    $this->_response['response'] = $user->message;
                    $this->_response['status']['islogin'] = $this->login();
                } else {
                    $this->_response['response'] = $user->errorMessage;
                    $this->_response['status']['islogin'] = $this->login();
                }
            }
        }
        return $this->_response;
    }

    public function userRegister() {
        $input = Input::all();
        $rules = array(
            'email' => 'required|email|unique:user',
            'nickname' => 'required|unique:user',
            'password' => 'required|min:6',
            'password_confirm' => 'required|same:password',
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $this->_response['error'] = true;
            $this->_response['response'] = 'validation error';
            $this->_response['message'] = $validator->messages();
            $this->_status = 400;
        } else {
            $user = new UserHelper();
            $user = $user->createUser($input);
            if (!empty($user)) {
                $this->_response['user_created'] = TRUE;
            }
        }
        return $this->_response;
    }

    public function userProfile($id, $name) {
        $userinfo = new UserHelper();
        $userinfo = $userinfo->getUserProfile($id);
        if(!empty($userinfo)){
            $this->siteTitle = $userinfo->nickname . "'s Timeline";
            return View::make('user.site.profile', array('response' => $this->_response, 'userInfo' => $userinfo, 'siteTitle' => $this->siteTitle));
        }else{
            return Redirect::to('/login');
        }
    }

    public function showUserFans($id, $name) {
        $userinfo = new UserHelper();
        $userinfo = $userinfo->getUserProfile($id);
        $this->siteTitle = $userinfo->nickname . "'s Fans";
        return View::make('user.user.userFans', array('response' => $this->_response, 'userInfo' => $userinfo, 'siteTitle' => $this->siteTitle));
    }

    public function showUserFollowings($id, $name) {
        $userinfo = new UserHelper();
        $userinfo = $userinfo->getUserProfile($id);
        $this->siteTitle = $userinfo->nickname . "'s Following";
        return View::make('user.user.userFollowings', array('response' => $this->_response, 'userInfo' => $userinfo, 'siteTitle' => $this->siteTitle));
    }

    public function getUserFans() {
        $id = Input::get('id');
        $page = Input::get('page');
        $fans = new RelationHelper();
        $users = $fans->getFans($id);
        $getuser = new UserHelper();
        if (count($users)) {
            $prod = array();
            foreach ($users as $key => $user) {
                $users[$key]->lastProduct = $getuser->getLastProduct($user->id);
            }
            $userinfo = array();
            $follow = array();
            if ($this->islogin) {
                $userinfo = $getuser->getUserProfile($this->cuser['uid']);
                $i = 0;
                foreach ($userinfo->followings as $following) {
                    $follow[$i] = $following['id'];
                    $i++;
                }
            }
            $lastUser = $users->last()->id;
            return View::make('user.user.loadUser', array('userInfo' => $userinfo, 'response' => $this->_response, 'users' => $users, 'follow' => $follow,
                        'lastUser' => $lastUser, 'page' => $page));
        }
    }

    public function getUserFollowings() {
        $id = Input::get('id');
        $page = Input::get('page');
        $followings = new RelationHelper();
        $getuser = new UserHelper();
        $users = $followings->getFollowings($id);
        if (count($users)) {
            $prod = array();
            foreach ($users as $key => $user) {
                $users[$key]->lastProduct = $getuser->getLastProduct($user->id);
            }
            $userinfo = array();
            $follow = array();
            if ($this->islogin) {
                $userinfo = $getuser->getUserProfile($this->cuser['uid']);
                $i = 0;
                foreach ($userinfo->followings as $following) {
                    $follow[$i] = $following['id'];
                    $i++;
                }
            }
            $lastUser = $users->last()->id;
            return View::make('user.user.loadUser', array('userInfo' => $userinfo, 'response' => $this->_response, 'users' => $users, 'follow' => $follow,
                        'lastUser' => $lastUser, 'page' => $page));
        }
    }

    public function showUsers($sort = null) {
        $this->siteTitle = "Facewall";
        return View::make('user.user.allUsers', array('response' => $this->_response, 'sort' => $sort, 'siteTitle' => $this->siteTitle));
    }

    public function getAllUser() {
        $limit = (Input::get('limit')) ? (Input::get('limit')) : null;
        $lastUser = (Input::get('lastUser')) ? (Input::get('lastUser')) : null;
        $sort = (Input::get('sort')) ? (Input::get('sort')) : null;
        $offset = (Input::get('offset')) ? (Input::get('offset')) : null;
        $getuser = new UserHelper();
        $users = $getuser->getAllUsers($sort, $limit, $lastUser, $offset);
        if (count($users)) {
            $prod = array();
            foreach ($users as $key => $user) {
                $users[$key]->lastProduct = $getuser->getLastProduct($user->id);
            }
            $userinfo = array();
            $follow = array();
            if ($this->islogin) {
                $userinfo = $getuser->getUserProfile($this->cuser['uid']);
                $i = 0;
                foreach ($userinfo->followings as $following) {
                    $follow[$i] = $following['id'];
                    $i++;
                }
            }
            $lastUser = $users->last()->id;
            return View::make('user.user.loadUser', array('userInfo' => $userinfo, 'response' => $this->_response, 'users' => $users, 'follow' => $follow,
                        'lastUser' => $lastUser));
        }
    }

    public function logout() {
        require_once( base_path() . '/assets/hybridauth/Hybrid/Auth.php' );
        $mainUrl = app('main_url');

        $hybridauth_config = array(
            // "base_url" => URL::asset('/yolove/assets/hybridauth/'), // set hybridauth path
            "base_url" => $mainUrl . "/assets/hybridauth/index.php", // set hybridauth path
            "providers" => array(
                "Facebook" => array(
                    "enabled" => true,
                    "keys" => array("id" => "1773661679525515", "secret" => "05deaa8d49822d5f8a681837d285ddeb"),
                    "scope" => 'email',
                ),
                "Twitter" => array(
                    "enabled" => true,
                    "keys" => array("key" => "iblq1YVfDuHj32gogiMJigk0o", "secret" => "DvTVnBHNvGI0GDHDUBP4h5fiIDm3qkFKqMiMJ9fDylSVPWyqjH")
                )
// for another provider refer to hybridauth documentation
            )
        );
        $hybridauth = new Hybrid_Auth($hybridauth_config);
        $hybridauth->logoutAllProviders();


        // try to authenticate the selected $provider
        // $adapter = $hybridauth->authenticate($provider);
        //$adapter->logout();
        Session::flush();
        $this->_response['status']['islogin'] = $this->login();
        $this->_response['status']['isDevice'] = $this->isDevice();
        $this->_response['status']['isBrowser'] = ($this->isDevice()) ? FALSE : TRUE;
        $this->_response['cuser'] = $this->cuser;
        return Redirect::to('/');
        //return View::make('user.site.index', array('response' => $this->_response));
    }

    public function showBasicSettings() {
        if (!$this->islogin) {
            return Redirect::to('/login');
        } else {
            $userinfo = new UserHelper();
            $userinfo = $userinfo->getUserProfile($this->cuser['uid']);
            $this->siteTitle = $userinfo->nickname . "'s Bassic, it's open";
            return View::make('user.user.basicSettings', array('response' => $this->_response, 'userInfo' => $userinfo, 'siteTitle' => $this->siteTitle));
        }
    }

    public function showSecuritySetting() {
        if (!$this->islogin) {
            return Redirect::to('/login');
        } else {
            $userinfo = new UserHelper();
            $userinfo = $userinfo->getUserProfile($this->cuser['uid']);
            $this->siteTitle = $userinfo->nickname . "'s Change Password.";
            return View::make('user.user.changePassword', array('response' => $this->_response, 'userInfo' => $userinfo, 'siteTitle' => $this->siteTitle));
        }
    }

    public function showBindSetting() {
        if (!$this->islogin) {
            return Redirect::to('/login');
        } else {
            $userinfo = new UserHelper();
            $userinfo = $userinfo->getUserProfile($this->cuser['uid']);
            $this->siteTitle = $userinfo->nickname . "'s Bindsettings";
            return View::make('user.user.connects', array('response' => $this->_response, 'userInfo' => $userinfo, 'siteTitle' => $this->siteTitle));
        }
    }

    public function changeProfileImage() {
        if (!$this->islogin) {
            return Redirect::to('/login');
        } else {
            $input = Input::all();
            $input['id'] = $this->cuser['uid'];
            $user = new UserHelper();
            $changeImage = $user->updateUserImage($input);
        }
    }

    public function updateUser() {
        if (!$this->islogin) {
            return Redirect::to('/login');
        } else {
            $input = Input::all();
            $user = new UserHelper();
            $validateUser = $user->checkUser($this->cuser['uid'], $input);
            if (count($validateUser)) {
                return Redirect::back()->with('error', $validateUser->message);
            } else {
                $updateUser = $user->updateUser($this->cuser['uid'], $input);
                if (!empty($updateUser)) {
                    return Redirect::back()->with('message', 'Profile Update Successful !');
                }
            }
        }
    }

    public function updateUserPassword() {
        if (!$this->islogin) {
            return Redirect::to('/login');
        } else {
            $input = Input::all();
            $userinfo = new UserHelper();
            $userinfo = $userinfo->getUserProfile($this->cuser['uid']);
            $userPass = User::where('id', '=', $this->cuser['uid'])->select('passwd')->get();
            if (md5($input['password']) != $userPass[0]->passwd) {
                $this->_response['message'] = '<p style="color: #FFFFFF; background-color: red; font-weight: bold;">Current Password does not match</p>';
            } else {
                $user = new UserHelper();
                $rules = array(
                    'password' => 'required|min:6',
                    'new_password' => 'required|min:6',
                    'retype_password' => 'required|same:new_password',
                );
                $validator = Validator::make($input, $rules);
                if ($validator->fails()) {
                    $this->_response['error'] = true;
                    $this->_response['response'] = 'validation error';
                    $this->_response['message'] = '<p style=" color: #FFFFFF; background-color: red; font-weight: bold;">The new password must be at least 6 characters</p>';
                    $this->_status = 400;
                } else {
                    $user = $user->changePassword($input, $this->cuser);
                    if (!empty($user)) {
                        $this->_response['message'] = '<p style="  color: #FFFFFF; background-color: #00AFB4; font-weight: bold;">Operation Successful !</p>';
                    }
                }
            }
            $this->siteTitle = $userinfo->nickname . "'s Change Password";
            return View::make('user.user.changePassword', array('response' => $this->_response, 'userInfo' => $userinfo, 'siteTitle' => $this->siteTitle));
        }
    }

    public function loginWithFacebook() {
//        $connector = new facebook_api();
//	$url = $connector->getloginpage();
//        print_r($url);die();
//        return Redirect::away($url);
//        //$this->jump($url);
    }

    public function loginwith($provider) {
        require_once( base_path() . '/assets/hybridauth/Hybrid/Auth.php' );
        $mainUrl = app('main_url');
        $hybridauth_config = array(
            // "base_url" => URL::asset('/yolove/assets/hybridauth/'), // set hybridauth path
            "base_url" => $mainUrl . "/assets/hybridauth/index.php", // set hybridauth path
            "providers" => array(
                "Facebook" => array(
                    "enabled" => true,
                    "keys" => array("id" => "1773661679525515", "secret" => "05deaa8d49822d5f8a681837d285ddeb"),
                    "scope" => 'email',
                ),
                "Twitter" => array(
                    "enabled" => true,
                    "keys" => array("key" => "iblq1YVfDuHj32gogiMJigk0o", "secret" => "DvTVnBHNvGI0GDHDUBP4h5fiIDm3qkFKqMiMJ9fDylSVPWyqjH")
                )
// for another provider refer to hybridauth documentation
            )
        );

        try {
            // create an instance for Hybridauth with the configuration file path as parameter
            $hybridauth = new Hybrid_Auth($hybridauth_config);


            // try to authenticate the selected $provider
            $adapter = $hybridauth->authenticate($provider);


            // grab the user profile

            $user_profile = $adapter->getUserProfile();


            //login user using auth component
            if (!empty($user_profile)) {

                $input = array();
                if ($provider == 'facebook') {
                    $input['social_userid'] = $user_profile->identifier;
                    $input['email'] = $user_profile->email;
                    $input['username'] = $user_profile->firstName . '.' . $user_profile->lastName;
                    $input['fullname'] = $user_profile->firstName . ' ' . $user_profile->lastName;
                    $input['homepage'] = $user_profile->profileURL;
                    $input['avatar'] = $user_profile->photoURL;
                    $input['gender'] = $user_profile->gender;
                    $input['vendor'] = $provider;
                } else if ($provider == 'twitter') {
                    $input['social_userid'] = $user_profile->identifier;
                    $input['email'] = uniqid() . '@yolve.it';
                    $input['username'] = $user_profile->displayName;
                    $input['fullname'] = $user_profile->firstName . ' ' . $user_profile->lastName;
                    $input['homepage'] = $user_profile->profileURL;
                    $input['avatar'] = str_replace("_normal","_400x400",$user_profile->photoURL);
                    $input['gender'] = NULL;
                    $input['vendor'] = $provider;
                }
                $user = new UserHelper();
                $social = $user->socialLogin($input);
                if (!empty($social)) {
                    if ($social->errormessage) {

                        $hybridauth->logoutAllProviders();
                        return Redirect::to('/login');
                    } else {

                        $data = $social->toArray();
                        $userdata = array('uid' => $data['id'], 'nickname' => $input['username'], 'email' => $input['email'], 'isstar' => $data['is_star'], 'issocial' => $data['is_social'], 'user_credits' => $data['user_credits'], 'system' => $data['role']->id, 'avatar' => $input['avatar']);
//                        $userdata = array('uid' => $data['id'], 'nickname' => $data['nickname'], 'email' => $data['email'], 'isstar' => $data['is_star'], 'issocial' => $data['is_social'], 'user_credits' => $data['user_credits'], 'system' => $data['role']->id);
                        Session::put($userdata);
                        return Redirect::to('/');
                    }
                } else {
                    return Redirect::to('/login');
                }
            }
        } catch (Exception $e) {

            switch ($e->getCode()) {
                case 0 : $error = "Unspecified error.";
                    break;
                case 1 : $error = "Hybriauth configuration error.";
                    break;
                case 2 : $error = "Provider not properly configured.";
                    break;
                case 3 : $error = "Unknown or disabled provider.";
                    break;
                case 4 : $error = "Missing provider application credentials.";
                    break;
                case 5 : $error = "Authentification failed. The user has canceled the authentication or the provider refused the connection.";
                    break;
                case 6 : $error = "User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.";
                    $adapter->logout();
                    break;
                case 7 : $error = "User not connected to the provider.";
                    $adapter->logout();
                    break;
            }
        }
        return Redirect::to('/');
    }

    public function forgetPassword() {
        $input = Input::all();
        if ($input['email'] != "") {
            $user = User::where('email', $input['email'])->get();
            if (count($user)) {
                //$respond_str['status'] = true;
                //$respond_str['message'] = "Email sent -- Please check your inbox";
                $mail = new MailHelper();
                $mail->mailPassConfirmation($user[0]);
                return "yes";
            } else {
                return 'no';
//                        $respond_str['status'] = false;
//                        $respond_str['message'] = "Email was not found";
            }
        } else {
            //$respond_str['status'] = false;
            //$respond_str['message'] = "Please enter your Email or Username";
        }
    }

    public function resetPassword() {
        $user = array();
        $input = Input::all();
        $status = "";
        $reply = "";
        if (isset($input['email']) && isset($input['passwordToken'])) {
            $email = $input['email'];
            $pvc = $input['passwordToken'];

            if (substr(sha1($email), 9, 13) == $pvc) {
                $user = User::where('email', $email)->get();
                $status = 1;
                $reply = "Please change your password";
            } else {
                $status = 2;
                $reply = "Sorry, invalid password token";
            }
        } else {
            $status = 3;
            $reply = "Invalid validation URL";
        }
        return view::make('user.user.resetPassword', array(
                    'user' => $user,
                    'reply' => $reply,
                    'status' => $status,
                    'response' => $this->_response
        ));
    }

    public function newPassword() {
        $input = Input::all();
        if ($input['password']) {
            $email = $input['email'];
            $newpassword = $input['password'];
            $user = User::where('email', $email)->get();
            if (count($user)) {
                $user[0]->passwd = md5($newpassword);
                $user[0]->save();
                return 'Password Changed';
            } else {
                
            }
        } else {
            
        }
    }

    public function registerToNewsletter() {
        $email = Input::get('email');
        $isExist = UserNewsletter::where('email', '=', $email)->get();
        if (count($isExist)) {
            
        } else {
            $user = new UserHelper();
            $addUser = $user->addUserToNewsletter($email);
            if (!empty($addUser)) {
                //return "Thanks for submit the email";
            }
        }
    }

    public function getProfile($name) {
        $helper = new UserHelper();
        $userinfo = $helper->getUserByName($name);
        if (!empty($userinfo)) {
            $this->siteTitle = $userinfo->domain . "'s Timeline";
            return View::make('user.site.profile', array('response' => $this->_response, 'userInfo' => $userinfo, 'siteTitle' => $this->siteTitle));
        } else {
            return Redirect::to('/');
        }
    }

}

?>
