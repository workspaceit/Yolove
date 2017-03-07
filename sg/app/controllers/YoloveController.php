<?php

session_start();

class YoloveController extends \BaseController {

    public $_response;
    public $islogin;
    public $siteTitle;

    public function __construct() {
        if ($this->isDevice()) {
            $user = new UserHelper();
            $this->islogin = $user->isLogin();
            $this->isadmin = $user->isAdmin();
            $this->iseditor = $user->isEditor();
            $this->cuser = $user->getUserInfo();
        } else {
            $user = new UserHelper();
            $this->islogin = $user->isLogin();
            $this->isadmin = $user->isAdmin();
            $this->iseditor = $user->isEditor();
            $this->cuser = $user->getUserInfo();
        }
//parent::__construct();
        $this->_response['status']['islogin'] = $this->login();
        $this->_response['status']['isDevice'] = $this->isDevice();
        $this->_response['status']['isBrowser'] = ($this->isDevice()) ? FALSE : TRUE;
        $this->_response['status']['isAdmin'] = $user->isAdmin();
        $this->_response['cuser'] = $this->cuser;
        $this->_response['categories'] = $this->getCategories();
        if ($this->islogin) {
            $helper = new ActivityHelper();
            $productHelper = new ProductsHelper();
            $activity = $helper->getActivityByUser($this->cuser['uid']);
            $all_activity = $helper->getUnreadActivityByUser($this->cuser['uid']);
            $this->_response['num_noti'] = count($all_activity);
            foreach ($activity as $key => $act) {
                $activity[$key]->differ = $helper->TimeDifference($act->create_time);
                if ($act->act_code == 'addlike' || $act->act_code == 'postcomment') {
                    $activity[$key]->slugTitle = $productHelper->createSlug($act->act_title);
                }
            }
            //if (count($activity)) {
            $this->_response['notifications'] = $activity;
            // }
            $this->cartuser = md5($this->cuser['uid']);
            $inNewsletter = UserNewsletter::where('email', '=', $this->_response['cuser']['email'])->get();
            if (count($inNewsletter)) {
                $this->_response['status']['inNewsletter'] = 1;
            } else {
                $this->_response['status']['inNewsletter'] = 0;
            }
            $this->_response['userInfo'] = $this->getUserInformation($this->cuser['uid']);
        } else {
            $this->cartuser = md5(00);
        }
        $this->_response['cartuser'] = $this->cartuser;
//var_dump($this->islogin);
//die();
    }

//public function isBrowser() {
//    print_r($_SERVER['HTTP_USER_AGENT']);
// }

    public function isDevice() {
        $useragent = $_SERVER['HTTP_USER_AGENT'];
        if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4))) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function login() {
        if ($this->isDevice()) {
            $uid = Session::get('uid');
            return ($uid) ? TRUE : FALSE;
        } else {
            $uid = Session::get('uid');
            return ($uid) ? TRUE : FALSE;
        }
    }

    public function getUserInformation($id) {
        $userHelper = new UserHelper();
        $userInfo = $userHelper->getUserById($this->cuser['uid']);
        if (!empty($userInfo)) {
            if ($userInfo->is_social) {
                $socialInfo = Connector::where('user_id', '=', $userInfo->id)->get();
                if (count($socialInfo)) {
                    $userInfo->socialInfo = $socialInfo[0];
                }
            }
            return $userInfo;
        }else{
            return Redirect::to('/login');
        }
    }

    public function getCategories() {
        $categories = new CategoryHelper();
        $categories = $categories->getAllCategory();
        return $categories;
    }

    public function ajax_success_response($data, $message = '') {
        $response = array('success' => true, 'data' => $data, 'message' => $message);
        $content = json_encode($response);
        return $content;
    }

    public function ajax_failed_response($message = 'failed_msg', $data = null) {
        $response = array('success' => false, 'message' => $message, 'data' => $data);
        $content = json_encode($response);
        return $content;
    }

//    public function beforeAction() {
//        $user = new UserHelper();
//        $this->islogin = $user->isLogin();
//        $this->isadmin = $user->isAdmin();
//        $this->iseditor = $user->isEditor();
//        $this->cuser = $user->getUserInfo();
//    }
}
