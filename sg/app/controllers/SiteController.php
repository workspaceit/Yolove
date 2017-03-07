<?php

class SiteController extends YoloveController {

    public $official_softname;

    public function __construct() {
        parent::__construct();
        $this->official_softname = app('official_softname');
    }

    public function viewLogin() {
        return View::make('user.site.login', array('response' => $this->_response));
    }

    public function viewRegister() {
        return View::make('user.site.registration', array('response' => $this->_response));
    }

    public function home() {
        if ($this->islogin) {
            if (isset($_SESSION['beforelogin'])) {
                $_SESSION[$this->cartuser] = $_SESSION['beforelogin'];
                unset($_SESSION['beforelogin']);
            }
        }
        $siteInfo = Settings::where('set_key', '=', 'global')->get();
        if (count($siteInfo)) {
            $site = unserialize($siteInfo[0]->set_value);
            $siteBanner = $site['site_banner'];
        }
        $this->siteTitle = $this->official_softname . " - Shop your clothes online Discovery";
        return View::make('user.site.index', array('response' => $this->_response, 'siteTitle' => $this->siteTitle, 'siteBanner' => $siteBanner));
    }
    public function trending() {
        if ($this->islogin) {
            if (isset($_SESSION['beforelogin'])) {
                $_SESSION[$this->cartuser] = $_SESSION['beforelogin'];
                unset($_SESSION['beforelogin']);
            }
        }
        $siteInfo = Settings::where('set_key', '=', 'global')->get();
        if (count($siteInfo)) {
            $site = unserialize($siteInfo[0]->set_value);
            $siteBanner = $site['site_banner'];
        }
        $this->siteTitle = $this->official_softname . " - Shop your clothes online Discovery";
        return View::make('user.site.trending', array('response' => $this->_response, 'siteTitle' => $this->siteTitle, 'siteBanner' => $siteBanner));
    }

    public function showColor($color) {
        $this->siteTitle = ucfirst($color) . " Color Search";
        return View::make('user.items.filterProducts', array('response' => $this->_response, 'color' => $color, 'siteTitle' => $this->siteTitle));
    }

    public function showRange($range) {
        $this->siteTitle = "Range " . $range . " Search";
        return View::make('user.items.filterProducts', array('response' => $this->_response, 'range' => $range, 'siteTitle' => $this->siteTitle));
    }

    public function showRangeAndColor($range, $color) {
        return View::make('user.items.filterProducts', array('response' => $this->_response, 'range' => $range, 'color' => $color));
    }

    public function showCategoryAndRangeAndColor($category, $range, $color) {
        return View::make('user.items.filterProducts', array('response' => $this->_response, 'id' => $category, 'range' => $range, 'color' => $color));
    }

    public function showCategoryAndRange($category, $range) {
        return View::make('user.items.filterProducts', array('response' => $this->_response, 'id' => $category, 'range' => $range));
    }

    public function showCategoryAndColor($category, $color) {
        return View::make('user.items.filterProducts', array('response' => $this->_response, 'id' => $category, 'color' => $color));
    }

    public function showUnderPrice($price) {
        $this->siteTitle = "Under $" . $price . " Items";
        return View::make('user.items.underPrice', array('response' => $this->_response, 'underPrice' => $price, 'siteTitle' => $this->siteTitle));
    }

    public function showYoloveTool() {
        $this->siteTitle = $this->official_softname . " Tool";
        $smtpEmail = Settings::where('set_key', '=', 'email')->get();
        if (count($smtpEmail)) {
            $sender = unserialize($smtpEmail[0]->set_value);
            $serverEmail = $sender['from'];
        }
        return View::make('user.site.about', array('response' => $this->_response, 'siteTitle' => $this->siteTitle, 'serverEmail' => $serverEmail));
    }

    public function showYolovePrivacy() {
        $this->siteTitle = "Privacy Policy";
        $smtpEmail = Settings::where('set_key', '=', 'email')->get();
        if (count($smtpEmail)) {
            $sender = unserialize($smtpEmail[0]->set_value);
            $serverEmail = $sender['from'];
        }
        return View::make('user.site.about', array('response' => $this->_response, 'siteTitle' => $this->siteTitle, 'serverEmail' => $serverEmail));
    }

    public function showYoloveAbout() {
        $this->siteTitle = "About Us";
        $smtpEmail = Settings::where('set_key', '=', 'email')->get();
        if (count($smtpEmail)) {
            $sender = unserialize($smtpEmail[0]->set_value);
            $serverEmail = $sender['from'];
        }
        return View::make('user.site.about', array('response' => $this->_response, 'siteTitle' => $this->siteTitle, 'serverEmail' => $serverEmail));
    }

    public function showYoloveTermsNCondition() {
        $this->siteTitle = "Terms & Conditions";
        $smtpEmail = Settings::where('set_key', '=', 'email')->get();
        if (count($smtpEmail)) {
            $sender = unserialize($smtpEmail[0]->set_value);
            $serverEmail = $sender['from'];
        }
        return View::make('user.site.about', array('response' => $this->_response, 'siteTitle' => $this->siteTitle, 'serverEmail' => $serverEmail));
    }

//    public function showYoloveBlog(){
//        return View::make('user.site.blog', array('response' => $this->_response));
//    }
    public function showYoloveContact() {
        $this->siteTitle = "Contact Us";
        $smtpEmail = Settings::where('set_key', '=', 'email')->get();
        if (count($smtpEmail)) {
            $sender = unserialize($smtpEmail[0]->set_value);
            $serverEmail = $sender['from'];
        }
        //$data = View::make('user.site.contact', array('response' => $this->_response, 'serverEmail' => $serverEmail));
        return View::make('user.site.about', array('response' => $this->_response, 'siteTitle' => $this->siteTitle, 'serverEmail' => $serverEmail));
    }
public function showCustomer() {
        $this->siteTitle = "Customer Service";
        $smtpEmail = Settings::where('set_key', '=', 'email')->get();
        if (count($smtpEmail)) {
            $sender = unserialize($smtpEmail[0]->set_value);
            $serverEmail = $sender['from'];
        }
        return View::make('user.site.about', array('response' => $this->_response, 'siteTitle' => $this->siteTitle, 'serverEmail' => $serverEmail));
    }
public function showShipping() {
        $this->siteTitle = "Shipping Info";
        $smtpEmail = Settings::where('set_key', '=', 'email')->get();
        if (count($smtpEmail)) {
            $sender = unserialize($smtpEmail[0]->set_value);
            $serverEmail = $sender['from'];
        }
        return View::make('user.site.about', array('response' => $this->_response, 'siteTitle' => $this->siteTitle, 'serverEmail' => $serverEmail));
    }
public function showReturns() {
        $this->siteTitle = "Returns & Exchanges";
        $smtpEmail = Settings::where('set_key', '=', 'email')->get();
        if (count($smtpEmail)) {
            $sender = unserialize($smtpEmail[0]->set_value);
            $serverEmail = $sender['from'];
        }
        return View::make('user.site.about', array('response' => $this->_response, 'siteTitle' => $this->siteTitle, 'serverEmail' => $serverEmail));
    }

    public function showYoloveForget() {
        return View::make('user.site.forget', array('response' => $this->_response));
    }

//    public function getYoloveTool() {
//        return View::make('user.site.tool', array('response' => $this->_response));
//    }
//
//    public function getAboutUs() {
//        return View::make('user.site.about_us', array('response' => $this->_response));
//    }
//
//    public function getPrivacy() {
//        return View::make('user.site.privacy', array('response' => $this->_response));
//    }
//
//    public function getTermsAndCondition() {
//        return View::make('user.site.terms', array('response' => $this->_response));
//    }

    public function getContact() {
        $smtpEmail = Settings::where('set_key', '=', 'email')->get();
        if (count($smtpEmail)) {
            $sender = unserialize($smtpEmail[0]->set_value);
            $serverEmail = $sender['from'];
        }
        return View::make('user.site.contact', array('response' => $this->_response, 'serverEmail' => $serverEmail));
    }

    public function sendMessageToContact() {
        $input = Input::all();
        $emaiData = array();
        $emaiData = array('name' => "<a style='text-decoration:none;color:#46BFC4' href=''>" . $input['name'] . " </a>", 'email' => $input['email'], 'message' => $input['msg'], 'subject' => $input['name'] . " wants to contact to Yolove.it");
        $mail = new MailHelper();
        $mail = $mail->mailPassToContact($emaiData);
        //if ($mail) {
            $message = "Your Message Successfully sent to Yolove.it";
//        } else {
//            $message = "Your Message doesn't sent to Yolove.it";
//        }
        return $message;
    }

//    public function loadData() {
////        $collections = Palbum::all();
////        foreach($collections as $album){
////            $this->insertAlbum($album);
////        }
////        $activities = Pactivity::all();
////        foreach($activities as $activity){
////            $this->insertActivity($activity);
////        }
////        $attachmentZero = PattachmentZero::all();
////        foreach($attachmentZero as $attachment){
////            $this->insertAttachment($attachment);
////        }
////        $attachmentOne = PattachmentOne::all();
////        foreach($attachmentOne as $attachment){
////            $this->insertAttachment($attachment);
////        }
////        $attachmentTwo = PattachmentTwo::all();
////        foreach($attachmentTwo as $attachment){
////            $this->insertAttachment($attachment);
////        }
////        $attachmentThree = PattachmentThree::all();
////        foreach($attachmentThree as $attachment){
////            $this->insertAttachment($attachment);
////        }
////        $attachmentFour = PattachmentFour::all();
////        foreach($attachmentFour as $attachment){
////            $this->insertAttachment($attachment);
////        }
////        $attachmentFive = PattachmentFive::all();
////        foreach($attachmentFive as $attachment){
////            $this->insertAttachment($attachment);
////        }
////        $attachmentSix = PattachmentSix::all();
////        foreach($attachmentSix as $attachment){
////            $this->insertAttachment($attachment);
////        }
////        $attachmentSeven = PattachmentSeven::all();
////        foreach($attachmentSeven as $attachment){
////            $this->insertAttachment($attachment);
////        }
////        $attachmentEight = PattachmentEight::all();
////        foreach($attachmentEight as $attachment){
////            $this->insertAttachment($attachment);
////        }
////        $attachmentNine = PattachmentNine::all();
////        foreach($attachmentNine as $attachment){
////            $this->insertAttachment($attachment);
////        }
//////        $comments = Pcomment::all();
//////        foreach($comments as $comment){
//////            $this->insertComment($comment);
//////        }
////        $connectors = Pconnector::all();
////        foreach ($connectors as $connector) {
////            $this->insertConnector($connector);
////        }
////        $favAlbums = Pfalbum::all();
////        foreach ($favAlbums as $favAlbum) {
////            $this->insertFavAlbum($favAlbum);
////        }
////        $favShares = Pfsharing::all();
////        foreach ($favShares as $favShare) {
////            $this->insertFavShare($favShare);
////        }
////        $favStores = Pfstore::all();
////        foreach ($favStores as $favStore) {
////            $this->insertFavStore($favStore);
////        }
////        $items = DB::table('ptx_item')
////                ->join('ptx_item_detail', 'ptx_item.item_id', '=', 'ptx_item_detail.item_id')
////                ->select('ptx_item.*', 'ptx_item_detail.reference_url')
////                ->get();
////        foreach ($items as $item) {
////            $this->insertItem($item);
////        }
////        $shares = Pshare::all();
////        foreach ($shares as $share) {
////            $this->insertShare($share);
////        }
////        $stores = Pstore::all();
////        foreach ($stores as $store) {
////            $this->insertStore($store);
////        }
////        $users = Puser::all();
////        foreach ($users as $user) {
////            $this->insertUser($user);
////        }
////        $userGroups = Pusergroup::all();
////        foreach ($userGroups as $userGroup) {
////            $this->insertUserGroup($userGroup);
////        }
////        $relationships = Prelationship::all();
////        foreach ($relationships as $relationship) {
////            $this->insertRelation($relationship);
////        }
////        $deletedShare = DB::table('share')
////                ->join('item', 'item.id', '=', 'share.item_id')
////                ->where('item.image_large',"=",NULL)
////                ->select('share.id')
////                ->get();
////        
////        foreach ($deletedShare as $deleted) {
////            $helper = new ShareHelper();
////            $helper->deleteProduct($deleted->id);
////        }
//        
//    }
//
//    public function insertAlbum($data) {
//        $newData = new Album();
//        $newData->id = $data->album_id;
//        $newData->category_id = $data->category_id;
//        $newData->album_title = $data->album_title;
//        $newData->create_time = $data->create_time;
//        $newData->update_time = ($data->update_time) ? $data->update_time : time();
//        $newData->user_id = $data->user_id;
//        $newData->total_share = $data->total_share;
//        $newData->total_like = $data->total_like;
//        $newData->save();
//    }
//
//    public function insertActivity($data) {
//        $newData = new Activity();
//        $newData->id = $data->id;
//        $newData->user_id = $data->user_id;
//        $newData->to_user_id = $data->to_user_id;
//        $newData->act_code = $data->act_code;
//        $newData->act_title = $data->act_title;
//        $newData->create_time = $data->create_time;
//        $newData->is_read = ($data->is_read) ? 0 : 1;
//        $newData->rel_id = $data->rel_id;
//        $newData->save();
//    }
//
//    public function insertAttachment($data) {
//        $newData = new Attachment();
//        $newData->id = $data->aid;
//        $newData->item_id = $data->item_id;
//        $newData->user_id = $data->user_id;
//        $newData->create_time = $data->create_time;
//        $newData->fileext = $data->fileext;
//        $newData->filesize = $data->filesize;
//        $path = explode("/", $data->attachment);
//        $data->attachment = "uploads/attachments/products/large/" . end($path) . "." . $data->fileext;
//        $newData->attachment = $data->attachment;
//        $newData->remote = $data->remote;
//        $newData->source = $data->source;
//        $newData->description = $data->description;
//        $newData->readperm = $data->readperm;
//        $newData->isimage = $data->isimage;
//        $newData->width = $data->width;
//        $newData->height = $data->height;
//        $newData->thumb = $data->thumb;
//        $newData->downloads = $data->downloads;
//        $newData->cloud = $data->cloud;
//        $newData->save();
//    }
//
//    public function insertComment($data) {
//        $newData = new Comment();
//        $newData->id = $data->comment_id;
//        $newData->user_id = $data->user_id;
//        $newData->share_id = $data->share_id;
//        $newData->comment_txt = $data->comment_txt;
//        $newData->search_en = $data->search_en;
//        $newData->create_time = $data->create_time;
//        $newData->save();
//    }
//
//    public function insertConnector($data) {
//        $newData = new Connector();
//        $newData->id = $data->connect_id;
//        $newData->user_id = $data->user_id;
//        $newData->social_userid = $data->social_userid;
//        $newData->vendor = $data->vendor;
//        $newData->vendor_info = $data->vendor_info;
//        $newData->name = $data->name;
//        $newData->username = $data->username;
//        $newData->description = $data->description;
//        $newData->homepage = $data->homepage;
//        $newData->avatar = $data->avatar;
//        $newData->email = $data->email;
//        $newData->gender = $data->gender;
//        $newData->location = $data->location;
//        $newData->save();
//    }
//
//    public function insertFavAlbum($data) {
//        $newData = new FavoriteAlbum();
//        $newData->id = $data->favorite_id;
//        $newData->user_id = $data->user_id;
//        $newData->album_id = $data->album_id;
//        $newData->create_time = $data->create_time;
//        $newData->save();
//    }
//
//    public function insertFavShare($data) {
//        $newData = new FavoriteShare();
//        $newData->id = $data->favorite_id;
//        $newData->user_id = $data->user_id;
//        $newData->share_id = $data->share_id;
//        $newData->create_time = $data->create_time;
//        $newData->save();
//    }
//
//    public function insertFavStore($data) {
//        $newData = new FavoriteStore();
//        $newData->id = $data->favorite_id;
//        $newData->user_id = $data->user_id;
//        $newData->store_id = $data->store_id;
//        $newData->create_time = $data->create_time;
//        $newData->save();
//    }
//
//    public function insertItem($data) {
//        $newData = new Item();
//        $newData->id = $data->item_id;
//        $newData->user_id = $data->user_id;
//        $newData->user_nickname = $data->user_nickname;
//        $newData->title = $data->title;
//        $newData->reference_url = $data->reference_url;
//        $newData->keyword = $data->keyword;
//        $newData->keyword_search = $data->keyword_search;
//        $newData->summary = $data->summary;
//        $newData->color = $data->color;
//        $path = explode("/", $data->image_path_0);
//        if (count($path)) {
//            $newData->image_large = "uploads/attachments/products/large/" . end($path);
//            $newData->image_middle = "uploads/attachments/products/middle/" . end($path);
//            $newData->image_square = "uploads/attachments/products/square/" . end($path);
//        }
//        $newData->width = $data->width;
//        $newData->height = $data->height;
//        $newData->item_type = $data->item_type;
//        $newData->share_type = $data->share_type;
//        $newData->price = $data->price;
//        $newData->is_show = $data->is_show;
//        $newData->create_time = $data->create_time;
//        $newData->is_deleted = $data->is_deleted;
//        $newData->total_images = $data->total_images;
//        $newData->cloud = $data->cloud;
//        $newData->save();
//    }
//    
//    public function insertShare($data) {
//        $newData = new Share();
//        $newData->id = $data->share_id;
//        $newData->item_id = $data->item_id;
//        $newData->poster_id = $data->poster_id;
//        $newData->poster_nickname = $data->poster_nickname;
//        $newData->original_id = $data->original_id;
//        $newData->user_id = $data->user_id;
//        $newData->user_nickname = $data->user_nickname;
//        $newData->total_comment = $data->total_comment;
//        $newData->total_click = $data->total_click;
//        $newData->total_like = $data->total_like;
//        $newData->total_forwarding = $data->total_forwarding;
//        $newData->create_time = $data->create_time;
//        $newData->comments = $data->comments;
//        $newData->category_id = $data->category_id;
//        $newData->album_id = $data->album_id;
//        $newData->channel = $data->channel;
//        $newData->store_id = $data->store_id;
//        $newData->dtype = $data->dtype;
//        $newData->lastcomment_time = $data->lastcomment_time;
//        $newData->save();
//    }
//    
//    public function insertStore($data) {
//        $newData = new Store();
//        $newData->id = $data->store_id;
//        $newData->user_id = $data->user_id;
//        $newData->poster_id = $data->poster_id;
//        $newData->poster_nickname = $data->poster_nickname;
//        $newData->category_id = $data->category_id;
//        $newData->store_name = $data->store_name;
//        $newData->domain_name = $data->domain_name;
//        $newData->theme = $data->theme;
//        $newData->province = $data->province;
//        $newData->city = $data->city;
//        $newData->address = $data->address;
//        $newData->phone = $data->phone1;
//        $newData->phone2 = $data->phone2;
//        $newData->phone3 = $data->phone3;
//        $newData->recent_post = $data->recent_post;
//        $newData->store_desc = $data->store_desc;
//        $newData->total_like = $data->total_like;
//        $newData->total_review = $data->total_review;
//        $newData->total_visit = $data->total_visit;
//        $newData->display_order = $data->display_order;
//        $newData->create_time = $data->create_time;
//        $newData->keyword = $data->keyword;
//        $newData->keyword_search = $data->keyword_search;
//        $newData->settings = $data->settings;
//        $newData->shipping_fee = ($data->shipping_fee) ? $data->shipping_fee : 0;
//        $newData->update_time = time();
//        $newData->save();
//    }
//    
//    public function insertUser($data) {
//        $newData = new User();
//        $newData->id = $data->user_id;
//        $newData->uc_id = $data->uc_id;
//        $newData->email = $data->email;
//        $newData->passwd = $data->passwd;
//        $newData->nickname = $data->nickname;
//        $newData->uc_nickname = $data->uc_nickname;
//        $newData->domain = $data->domain;
//        $newData->gender = $data->gender;
//        $newData->province = $data->province;
//        $newData->city = $data->city;
//        $newData->location = $data->location;
//        $newData->user_title = $data->user_title;
//        $newData->bio = $data->bio;
//        $newData->create_time = $data->create_time;
//        $newData->total_follow = $data->total_follow;
//        $newData->total_follower = $data->total_follower;
//        $newData->total_share = $data->total_share;
//        $newData->total_album = $data->total_album;
//        $newData->total_like = $data->total_like;
//        $newData->total_favorite_share = $data->total_favorite_share;
//        $newData->total_favorite_album = $data->total_favorite_album;
//        $newData->lost_password_key = $data->lost_password_key;
//        $newData->lost_password_expire = $data->lost_password_expire;
//        $newData->last_login_time = $data->last_login_time;
//        $newData->credits = $data->credits;
//        $newData->ext_credits_1 = $data->ext_credits_1;
//        $newData->ext_credits_2 = $data->ext_credits_2;
//        $newData->ext_credits_3 = $data->ext_credits_3;
//        $newData->is_social = $data->is_social;
//        $newData->is_star = $data->is_star;
//        $newData->has_store = $data->has_store;
//        $newData->is_deleted = $data->is_deleted;
//        $newData->theme = $data->theme;
//        $newData->follow_you = $data->follow_you;
//        $newData->like_collection = $data->like_collection;
//        $newData->like_item = $data->like_item;
//        $newData->mentions_you = $data->mentions_you;
//        $newData->store_follow = $data->store_follow;
//        $newData->user_follow = $data->user_follow;
//        $newData->collection_follow = $data->collection_follow;
//        $newData->save();
//    }
//    
//    public function insertUserGroup($data) {
//        $newData = new UserRole();
//        $newData->id = $data->usergroup_id;
//        $newData->user_id = $data->user_id;
//        $newData->create_time = $data->create_time;
//        $newData->save();
//    }
//    
//    public function insertRelation($data) {
//        $newData = new Relationship();
//        $newData->id = $data->relation_id;
//        $newData->user_id = $data->user_id;
//        $newData->friend_id = $data->friend_id;
//        $newData->relation_status = $data->relation_status;
//        $newData->save();
//    }

}

?>
