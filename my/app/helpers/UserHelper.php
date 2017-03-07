<?php

class UserHelper {

    public function getAllUsers($sort = null, $limit = null, $lastUser = null, $offset = null) {
        if ($limit && $lastUser) {
            $lastUser = User::find($lastUser);
            if ($sort == "time") {
                $users = User::orderBy('create_time', 'ASC')->where('id', '!=', $lastUser->id)->where('create_time', '>=', $lastUser->create_time)->take($limit)->get();
            } elseif ($sort == "share") {
                $users = User::orderBy('total_share', 'DESC')->where('id', '!=', $lastUser->id)->offset($offset)->take($limit)->get();
            } elseif ($sort == "like") {
                $users = User::orderBy('total_like', 'DESC')->where('id', '!=', $lastUser->id)->offset($offset)->take($limit)->get();
            } elseif ($sort == "nickname") {
                $users = User::orderBy('nickname', 'ASC')->where('id', '!=', $lastUser->id)->where('nickname', '>=', $lastUser->nickname)->take($limit)->get();
            } elseif ($sort == "fan") {
                $users = User::orderBy('total_follower', 'DESC')->where('id', '!=', $lastUser->id)->offset($offset)->take($limit)->get();
            } else {
                $users = User::orderBy('id', 'ASC')->where('id', '>', $lastUser->id)->take($limit)->get();
            }
        } elseif ($limit) {
            if ($sort == "time") {
                $users = User::orderBy('create_time', 'ASC')->take($limit)->get();
            } elseif ($sort == "share") {
                $users = User::orderBy('total_share', 'DESC')->take($limit)->get();
            } elseif ($sort == "like") {
                $users = User::orderBy('total_like', 'DESC')->take($limit)->get();
            } elseif ($sort == "nickname") {
                $users = User::orderBy('nickname', 'ASC')->take($limit)->get();
            } elseif ($sort == "fan") {
                $users = User::orderBy('total_follower', 'DESC')->take($limit)->get();
            } else {
                $users = User::orderBy('id', 'ASC')->take($limit)->get();
            }
        } else {
            if ($sort == "time") {
                $users = User::orderBy('create_time', 'ASC')->get();
            } elseif ($sort == "share") {
                $users = User::orderBy('total_share', 'DESC')->get();
            } elseif ($sort == "like") {
                $users = User::orderBy('total_like', 'DESC')->get();
            } elseif ($sort == "nickname") {
                $users = User::orderBy('nickname', 'ASC')->get();
            } elseif ($sort == "fan") {
                $users = User::orderBy('total_follower', 'DESC')->get();
            } else {
                $users = User::all();
            }
        }
        foreach ($users as $key => $user) {
            $role = User::find($users[$key]->id)->role;
            if (!empty($role)) {
                $userRole = UserGroup::find($role->id);
                $users[$key]->role = $userRole;
            }
            unset($users[$key]->passwd);
            unset($users[$key]->access_key);
        }
        return $users;
    }

    public function getUserById($id) {
        $user = User::find($id);
        if (!empty($user)) {
            $role = User::find($id)->role;
            if (!empty($role)) {
                $userRole = UserGroup::find($role->id);
                $user->role = $userRole;
            }
            unset($user->passwd);
            unset($user->access_key);
        }
        return $user;
    }

    public function login($input) {
        $user = User::where('email', '=', $input['email'])->orWhere('nickname', '=', $input['email'])->get();
        if (count($user)) {
            $user = $user[0];
            if (md5($input['password']) == $user->passwd) {
                $role = User::find($user->id)->role;
                $userRole = UserGroup::find($role->id);
                $user->role = $userRole;
                $user->message = "Login Successfully";
                return $user;
            } else {
                $user = new User();
                $user->errorMessage = "Invalid Username or Password";
                return $user;
            }
        } else {
            $user = new User();
            $user->errorMessage = "User does not exist";
            return $user;
        }
    }

    public function createUser($input) {
        $uniqueKey = md5(microtime() . rand());
        $user = new User();
        $user->email = $input['email'];
        $user->passwd = md5($input['password']);
        $user->nickname = $input['nickname'];
        $user->create_time = time();
        $user->access_key = $uniqueKey;
        $user->save();
        $userRole = new UserRole();
        $userRole->id = 6;
        $userRole->user_id = $user->id;
        $userRole->create_time = time();
        $userRole->save();
        $userRole = new UserRole();
        $userRole->id = 8;
        $userRole->user_id = $user->id;
        $userRole->create_time = time() + 1;
        $userRole->save();
        $newAlbum = $this->createDefaultAlbum($user->id);
        $myUser = new User();
        $myUser->setConnection('mysql2');
        $myUser->email = $input['email'];
        $myUser->passwd = md5($input['password']);
        $myUser->nickname = $input['nickname'];
        $myUser->create_time = time();
        $myUser->access_key = $uniqueKey;
        $myUser->save();
        $myUserRole = new UserRole();
        $myUserRole->setConnection('mysql2');
        $myUserRole->id = 6;
        $myUserRole->user_id = $myUser->id;
        $myUserRole->create_time = time();
        $myUserRole->save();
        $myUserRole = new UserRole();
        $myUserRole->setConnection('mysql2');
        $myUserRole->id = 8;
        $myUserRole->user_id = $myUser->id;
        $myUserRole->create_time = time() + 1;
        $myUserRole->save();
        $newAlbum = $this->createMyDefaultAlbum($myUser->id);
        $sgUser = new User();
        $sgUser->setConnection('mysql3');
        $sgUser->email = $input['email'];
        $sgUser->passwd = md5($input['password']);
        $sgUser->nickname = $input['nickname'];
        $sgUser->create_time = time();
        $sgUser->access_key = $uniqueKey;
        $sgUser->save();
        $sgUserRole = new UserRole();
        $sgUserRole->setConnection('mysql3');
        $sgUserRole->id = 6;
        $sgUserRole->user_id = $sgUser->id;
        $sgUserRole->create_time = time();
        $sgUserRole->save();
        $sgUserRole = new UserRole();
        $sgUserRole->setConnection('mysql3');
        $sgUserRole->id = 8;
        $sgUserRole->user_id = $sgUser->id;
        $sgUserRole->create_time = time() + 1;
        $sgUserRole->save();
        $newAlbum = $this->createSgDefaultAlbum($sgUser->id);
        return $user;
    }

    public function updateUser($id, $input) {
        $user = User::find($id);
        $user->nickname = $input['nickname'];
        $user->gender = $input['gender'];
        $user->province = $input['province'];
        $user->city = $input['city'];
        $user->user_title = $input['usertitle'];
        $user->location = (isset($input['location'])) ? ($input['location']) : "";
        $user->domain = $input['domain'];
        $user->bio = $input['bio'];
        $user->follow_you = (isset($input['user_follow_email_option'])) ? ($input['user_follow_email_option']) : 0;
        $user->like_collection = (isset($input['user_like_collection_email_option'])) ? ($input['user_like_collection_email_option']) : 0;
        $user->like_item = (isset($input['user_like_item_email_option'])) ? ($input['user_like_item_email_option']) : 0;
        $user->mentions_you = (isset($input['user_mention_email_option'])) ? ($input['user_mention_email_option']) : 0;
        $user->store_follow = (isset($input['user_store_email_option'])) ? ($input['user_store_email_option']) : 0;
        $user->user_follow = (isset($input['user_you_follow_email_option'])) ? ($input['user_you_follow_email_option']) : 0;
        $user->collection_follow = (isset($input['user_collection_email_option'])) ? ($input['user_collection_email_option']) : 0;
        $user->save();
        return $user;
    }

    public function deleteUser($id) {
        $user = User::find($id);
        $user->delete();
        $albums = Album::where("user_id", "=", $id);
        $userAlbum = new AlbumsHelper();
        if (count($albums)) {
            foreach ($albums as $key => $album) {
                $userAlbum->deleteAlbum($album->id);
            }
        }
        $stores = Store::wheree("user_id", "=", $id);
        $userStore = new StoreHelper();
        if (count($store)) {
            foreach ($stores as $key => $store) {
                $userStore->deleteStore($stores->id);
            }
        }

        return $user;
    }

    public function checkUser($id, $input) {
        $user = User::find($id);
        if ($user->nickname != $input['nickname']) {
            $existNickname = User::where('nickname', '=', $input['nickname'])->get();
            $existNickname->message = "Username already exist";
            return $existNickname;
        }
        if ($user->domain != $input['domain']) {
            $existDomain = User::where('domain', '=', $input['domain'])->get();
            $existDomain->message = "Personal Url already exist";
            return $existDomain;
        }
    }

    public function updateUserCredit($id, $credit) {
        $user = User::find($id);
        $user->user_credits = $credit;
        $user->save();
        return $user;
    }

    public function reduceUserShare($id) {
        $user = User::find($id);
        if ($user->total_share != 0) {
            $user->total_share = $user->total_share - 1;
            $user->save();
        }
    }

    public function updateUserImage($input) {
        $api_server = app('api_server');
        $id = $input['id'];
        $image = $input['avatar'];
        $imageName = $image->getClientOriginalName();
        $file_extension = $image->getClientOriginalExtension();
        if ($file_extension) {
            $user = User::find($id);
            $file_name = $user->id . '_' . md5($user->email) . '';
            $dir = '/uploads/attachments/avatar/';
            //$save_path = base_path() . $dir;
            $save_path = $api_server . $dir;
            $imageName = $file_name . '.' . $file_extension;
            $file_path = $save_path . $user->nickname . '/' . $imageName;
            $image->move($save_path . $user->nickname . '/', $imageName);
            //$avatar = Image::make($file_path)->resize(200, 150)->save($save_path . $user->nickname . '/' . $file_name . '.' . 'jpg');
            return $user;
        }
    }

    public function changePassword($input, $cuser) {
        $user = User::find($cuser['uid']);
        if (!empty($user)) {
            if (md5($input['password']) == $user->passwd) {
                $user->passwd = md5($input['new_password']);
                $user->save();
                return $user;
            } else {
                $user = new User();
                $user->errorMessage = "Invalid Username or Password";
                return $user;
            }
        } else {
            $user = new User();
            $user->errorMessage = "User does not exist";
            return $user;
        }
    }

    public function isLogin() {
        $uid = Session::get('uid');
        return ($uid) ? $uid : FALSE;
    }

    public function isAdmin() {
        $system = Session::get('system');
        return ($system == 1) ? TRUE : FALSE;
    }

    public function isEditor() {
        $system = Session::get('system');
        return ($system == 2) ? TRUE : FALSE;
    }

    public function getUserInfo() {
        $userInfo = Session::all();
        return $userInfo;
    }

    public function getLastProduct($userId) {
        $prods = Share::where('user_id', '=', $userId)->orderBy('id', 'DESC')->select('id')->take(6)->get();
        if (count($prods)) {
            $item = New ProductsHelper();
            foreach ($prods as $key => $prod) {
                $Item = $item->getById($prod->id);
                $prods[$key]->ProductImage = $Item['item']['image_large'];
            }
            return $prods;
        } else {
            return FALSE;
        }
    }

//    public function isDeviceLogin($userData) {
//        $uid = $userData->id;
//        return ($uid) ? $uid : FALSE;
//    }
//
//    public function isDeviceAdmin($userData) {
//        $role = User::find($userData->id)->role;
//        $system = $role->id;
//        return ($system == 1) ? TRUE : FALSE;
//    }
//
//    public function isDeviceEditor($userData) {
//        $role = User::find($userData->id)->role;
//        $system = $role->id;
//        return ($system == 2) ? TRUE : FALSE;
//    }
//
//    public function getDeviceUserInfo($userData) {
//        $user = User::find($userData->id);
//        $role = User::find($userData->id)->role;
//        $userRole = UserGroup::find($role->id);
//        $userInfo['uid'] = $user->id;
//        $userInfo['nickname'] = $user->nickname;
//        $userInfo['role'] = $userRole->usergroup_key;
//        return $userInfo;
//    }

    public function socialLogin($input) {
        $socialUser = Connector::where('social_userid', '=', $input['social_userid'])->get();
        if (count($socialUser)) {
            $user = User::find($socialUser[0]->user_id);
            $role = User::find($user->id)->role;
            $userRole = UserGroup::find($role->id);
            $user->role = $userRole;
            return $user;
        } else {
            $user = new User();
            $emailExist = User::where('email', '=', $input['email'])->get();
            if (count($emailExist)) {
//                $nicknameExist = User::where('nickname', '=', $input['username'])->get();
//                if (count($nicknameExist)) {
//                    $emailExist[0]->nickname = $input['username'] . rand(1, 3);
//                } else {
//                    $emailExist[0]->nickname = $input['username'];
//                }
                $emailExist[0]->is_social = 1;
                $emailExist[0]->save();
                $role = User::find($emailExist[0]->id)->role;
                $userRole = UserGroup::find($role->id);
                $emailExist[0]->role = $userRole;
                //$user->errormessage = "This Email has been taken";
                $connector = new Connector();
                $connector->user_id = $emailExist[0]->id;
                $connector->social_userid = $input['social_userid'];
                $connector->vendor = $input['vendor'];
                $connector->name = $input['fullname'];
                $connector->username = $input['username'];
                $connector->homepage = $input['homepage'];
                $connector->avatar = $input['avatar'];
                $connector->email = $input['email'];
                $connector->gender = $input['gender'];
                //$connector->location = ($input['location']) ? ($input['location']) : "";
                $connector->save();
                $myUserModel = new User();
                $myUserModel->setConnection('mysql2');
                $myUserExist = $myUserModel->find($emailExist[0]->id);
                $myUserExist->is_social = 1;
                $myUserExist->save();
                $myConnector = new Connector();
                $myConnector->setConnection('mysql2');
                $myConnector->user_id = $myUserExist->id;
                $myConnector->social_userid = $input['social_userid'];
                $myConnector->vendor = $input['vendor'];
                $myConnector->name = $input['fullname'];
                $myConnector->username = $input['username'];
                $myConnector->homepage = $input['homepage'];
                $myConnector->avatar = $input['avatar'];
                $myConnector->email = $input['email'];
                $myConnector->gender = $input['gender'];
                //$connector->location = ($input['location']) ? ($input['location']) : "";
                $myConnector->save();
                $sgUserModel = new User();
                $sgUserModel->setConnection('mysql3');
                $sgUserExist = $sgUserModel->find($emailExist[0]->id);
                $sgUserExist->is_social = 1;
                $sgUserExist->save();
                $sgConnector = new Connector();
                $sgConnector->setConnection('mysql3');
                $sgConnector->user_id = $sgUserExist->id;
                $sgConnector->social_userid = $input['social_userid'];
                $sgConnector->vendor = $input['vendor'];
                $sgConnector->name = $input['fullname'];
                $sgConnector->username = $input['username'];
                $sgConnector->homepage = $input['homepage'];
                $sgConnector->avatar = $input['avatar'];
                $sgConnector->email = $input['email'];
                $sgConnector->gender = $input['gender'];
                //$connector->location = ($input['location']) ? ($input['location']) : "";
                $sgConnector->save();
                return $emailExist[0];
            } else {
                $nicknameExist = User::where('nickname', '=', $input['username'])->get();
                if (count($nicknameExist)) {
                    $user->nickname = $input['username'] . rand(1, 3);
                } else {
                    $user->nickname = $input['username'];
                }
                $nicname = $user->nickname;
                $user->email = $input['email'];
                $uniqueKey = md5(microtime() . rand());
                $password = rand(4, 8);
                $salt = substr(uniqid(rand()), -9);
                $user->passwd = md5(md5(md5($password) . $salt));
                $user->is_social = 1;
                $user->create_time = time();
                $user->access_key = $uniqueKey;
                $user->save();
                $socialUser = User::find($user->id);
                $userRole = new UserRole();
                $userRole->id = 6;
                $userRole->user_id = $user->id;
                $userRole->create_time = time();
                $userRole->save();
                $userRole = new UserRole();
                $userRole->id = 8;
                $userRole->user_id = $user->id;
                $userRole->create_time = time() + 1;
                $userRole->save();
                $newAlbum = $this->createDefaultAlbum($user->id);
                $userGroup = UserGroup::find(6);
                $socialUser->role = $userGroup;
                $connector = new Connector();
                $connector->user_id = $user->id;
                $connector->social_userid = $input['social_userid'];
                $connector->vendor = $input['vendor'];
                $connector->name = $input['fullname'];
                $connector->username = $input['username'];
                $connector->homepage = $input['homepage'];
                $connector->avatar = $input['avatar'];
                $connector->email = $input['email'];
                $connector->gender = $input['gender'];
                //$connector->location = ($input['location']) ? ($input['location']) : "";
                $connector->save();
                $myUser = new User();
                $myUser->setConnection('mysql2');
                $myUser->nickname = $nicname;
                $myUser->email = $input['email'];
                $myUser->passwd = md5(md5(md5($password) . $salt));
                $myUser->is_social = 1;
                $myUser->create_time = time();
                $myUser->access_key = $uniqueKey;
                $myUser->save();
                $myUserRole = new UserRole();
                $myUserRole->setConnection('mysql2');
                $myUserRole->id = 6;
                $myUserRole->user_id = $myUser->id;
                $myUserRole->create_time = time();
                $myUserRole->save();
                $myUserRole = new UserRole();
                $myUserRole->setConnection('mysql2');
                $myUserRole->id = 8;
                $myUserRole->user_id = $myUser->id;
                $myUserRole->create_time = time() + 1;
                $myUserRole->save();
                $newAlbum = $this->createMyDefaultAlbum($myUser->id);
                $myConnector = new Connector();
                $myConnector->setConnection('mysql2');
                $myConnector->user_id = $emailExist[0]->id;
                $myConnector->social_userid = $input['social_userid'];
                $myConnector->vendor = $input['vendor'];
                $myConnector->name = $input['fullname'];
                $myConnector->username = $input['username'];
                $myConnector->homepage = $input['homepage'];
                $myConnector->avatar = $input['avatar'];
                $myConnector->email = $input['email'];
                $myConnector->gender = $input['gender'];
                //$connector->location = ($input['location']) ? ($input['location']) : "";
                $myConnector->save();

                $sgUser = new User();
                $sgUser->setConnection('mysql3');
                $sgUser->nickname = $nicname;
                $sgUser->email = $input['email'];
                $sgUser->passwd = md5(md5(md5($password) . $salt));
                $sgUser->is_social = 1;
                $sgUser->create_time = time();
                $sgUser->access_key = $uniqueKey;
                $sgUser->save();
                $sgUserRole = new UserRole();
                $sgUserRole->setConnection('mysql3');
                $sgUserRole->id = 6;
                $sgUserRole->user_id = $myUser->id;
                $sgUserRole->create_time = time();
                $sgUserRole->save();
                $sgUserRole = new UserRole();
                $sgUserRole->setConnection('mysql3');
                $sgUserRole->id = 8;
                $sgUserRole->user_id = $myUser->id;
                $sgUserRole->create_time = time() + 1;
                $sgUserRole->save();
                $newAlbum = $this->createMyDefaultAlbum($sgUser->id);
                $sgConnector = new Connector();
                $sgConnector->setConnection('mysql3');
                $sgConnector->user_id = $emailExist[0]->id;
                $sgConnector->social_userid = $input['social_userid'];
                $sgConnector->vendor = $input['vendor'];
                $sgConnector->name = $input['fullname'];
                $sgConnector->username = $input['username'];
                $sgConnector->homepage = $input['homepage'];
                $sgConnector->avatar = $input['avatar'];
                $sgConnector->email = $input['email'];
                $sgConnector->gender = $input['gender'];
                //$connector->location = ($input['location']) ? ($input['location']) : "";
                $sgConnector->save();
                /* $api_server = app('api_server');
                  $image = $input['avatar'];
                  $extension = explode(".", $image);
                  $file_extension = end($extension);
                  if ($file_extension) {
                  $file_name = $user->id . '_' . md5($user->email) . '';
                  $dir = '/uploads/attachments/avatar/';
                  $save_path = $api_server . $dir;
                  $imageName = $file_name . '.' . $file_extension;
                  $file_path = $save_path . $user->nickname . '/';
                  if (!file_exists($file_path)) {
                  mkdir($file_path, 0777, true);
                  }
                  $file_path = $file_path . $imageName;
                  $file = file_get_contents($image);
                  file_put_contents($file_path, $file);
                  $avatar = Image::make($file_path)->resize(200, 150)->save($save_path . $user->nickname . '/' . $file_name . '.' . 'jpg');
                  } */
                return $user;
            }
        }
    }

    public function getUserProfile($id) {
        $userinfo = $this->getUserById($id);
        if (!empty($userinfo)) {
            $relation = new RelationHelper();
            $fans = $relation->getFans($userinfo->id);
            $followings = $relation->getFollowings($userinfo->id);
            $userinfo->fans = $fans;
            $userinfo->followings = $followings;
            $album = new AlbumsHelper();
            $collections = $album->getAlbumsByUser($userinfo->id);
            $userinfo->collections = $collections;
            $product = new ProductsHelper();
            $shares = $product->getProductsByUser($userinfo->id);
            $userinfo->shares = $shares;
            $getStore = new StoreHelper();
            $stores = $getStore->getFavoriteStore($userinfo->id);
            $userinfo->stores = $stores;
            if ($userinfo->is_social) {
                $socialInfo = Connector::where('user_id', '=', $userinfo->id)->get();
                $userinfo->socialInfo = $socialInfo[0];
            }
        }
        return $userinfo;
    }

    public function addUserToNewsletter($email) {
        $user = new UserNewsletter();
        $user->email = $email;
        $user->create_time = time();
        $user->save();
        return $user;
    }

    public function getUserByName($name) {
        $userinfo = $this->getUserByDomain($name);
        if (!empty($userinfo)) {
            $relation = new RelationHelper();
            $fans = $relation->getFans($userinfo->id);
            $followings = $relation->getFollowings($userinfo->id);
            $userinfo->fans = $fans;
            $userinfo->followings = $followings;
            $album = new AlbumsHelper();
            $collections = $album->getAlbumsByUser($userinfo->id);
            $userinfo->collections = $collections;
            $product = new ProductsHelper();
            $shares = $product->getProductsByUser($userinfo->id);
            $userinfo->shares = $shares;
            $getStore = new StoreHelper();
            $stores = $getStore->getFavoriteStore($userinfo->id);
            $userinfo->stores = $stores;
            if ($userinfo->is_social) {
                $socialInfo = Connector::where('user_id', '=', $userinfo->id)->get();
                $userinfo->socialInfo = $socialInfo[0];
            }
            return $userinfo;
        }
    }

    public function getUserByDomain($name) {
        $user = User::where("domain", "=", $name)->first();
        if (!empty($user)) {
            $role = User::find($user->id)->role;
            if (!empty($role)) {
                $userRole = UserGroup::find($role->id);
                $user->role = $userRole;
            }
            unset($user->passwd);
            return $user;
        }
    }

//    public function getUserInfo() {
//        return $this->session->all();
//    }
//
//    public function isLogin() {
//        return ($this->session->get('uid')) ? $this->session->get('uid') : FALSE;
//    }
//
//    public function isAdmin() {
//        return ($this->session->get('system') == 1) ? TRUE : FALSE;
//    }
//
//    public function isEditor() {
//        return ($this->session->get('system') == 2) ? TRUE : FALSE;
//    }
    public function createDefaultAlbum($cuser) {
        $album = new Album();
        $album->category_id = 5;
        $album->album_title = "Wish List";
        $album->create_time = time();
        $album->update_time = time();
        $album->user_id = $cuser;
        $album->save();
        $user = User::find($cuser);
        $user->total_album = $user->total_album + 1;
        $user->save();
    }

    public function createMyDefaultAlbum($cuser) {
        $album = new Album();
        $album->setConnection('mysql2');
        $album->category_id = 5;
        $album->album_title = "Wish List";
        $album->create_time = time();
        $album->update_time = time();
        $album->user_id = $cuser;
        $album->save();
        $newUser = new User();
        $newUser->setConnection('mysql2');
        $user = $newUser->find($cuser);
        $user->total_album = $user->total_album + 1;
        $user->save();
    }

    public function createSgDefaultAlbum($cuser) {
        $album = new Album();
        $album->setConnection('mysql3');
        $album->category_id = 5;
        $album->album_title = "Wish List";
        $album->create_time = time();
        $album->update_time = time();
        $album->user_id = $cuser;
        $album->save();
        $newUser = new User();
        $newUser->setConnection('mysql3');
        $user = $newUser->find($cuser);
        $user->total_album = $user->total_album + 1;
        $user->save();
    }

}

?>
