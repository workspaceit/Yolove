<?php

include_once(app_path() . "/helpers/ImageLib.php");

class ShareHelper {

    public function PostProduct($input, $cuser) {
        $api_server = app('api_server');
        $product = new Item();
        $image = $input['image_path'];

//        $filename = $image->getClientOriginalName();
//        $file_extension = $image->getClientOriginalExtension();
        $extension = explode(".", $image);
        $file_extension = end($extension);
        if ($file_extension) {
            if (!in_array($file_extension, array('png', 'jpg', 'jpeg', 'gif', 'bmp'))) {
                $file_extension = 'jpg';
            }
            $file_name = $cuser['uid'] . '_' . uniqid() . '';
            $dir = 'uploads/attachments/products/';
            //$save_path = base_path() . '/' . $dir;
            $save_path = $api_server . '/' . $dir;
            $filename = $file_name . '.' . $file_extension;
            $file_path = $save_path . 'large/' . $filename;
            $ch = curl_init($image);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
            $raw = curl_exec($ch);
            curl_close($ch);
            if (file_exists($file_path)) {
                unlink($file_path);
            }
            $fp = fopen($file_path, 'x');
            fwrite($fp, $raw);
            fclose($fp);
            list($width, $height, $type, $attr) = getimagesize($file_path);
            $size = filesize($file_path);
            $colorHelper = new ImageLib();
            $color = $colorHelper->sample_color($file_path);
//            $pal = new GetMostCommonColors();
//            $pal->image = $file_path;
//            $colors = $pal->Get_Color();
//            $colors_key = array_keys($colors);
            $colorArray = array('red', 'purple', 'green', 'blue', 'gray', 'black', 'yellow');
//            $hexColor = "#" . $colors_key[0];
//            $color = $this->colorConversion($hexColor);
            if ($color == "white" || $color == "silver") {
                $productColor = "gray";
            } else if (in_array($color, $colorArray)) {
                $productColor = $color;
            } else {
                $productColor = "gray";
            }


            $input['width'] = $width;
            $input['height'] = $height;
            $input['filesize'] = $size;
            $input['item_type'] = "image";
            $input['share_type'] = "web";
            $input['color'] = $productColor;
            //$image->move($save_path . 'large/', $filename);
            $squareImage = Image::make($file_path)->resize(200, 200)->save($save_path . 'square/' . $filename);
            $middleImage = Image::make($file_path)->resize(220, 300)->save($save_path . 'middle/' . $filename);
            $product->user_id = $cuser['uid'];
            $product->user_nickname = $cuser['nickname'];
            $product->title = $input['title'];
            $product->reference_url = $input['reference_url'];
            $product->color = $input['color'];
            $product->image_large = $dir . 'large/' . $filename;
            $product->image_square = $dir . 'square/' . $filename;
            $product->image_middle = $dir . 'middle/' . $filename;
            $product->width = $input['width'];
            $product->height = $input['height'];
            $product->item_type = $input['item_type'];
            $product->share_type = $input['share_type'];
            $product->price = $input['price'];
            $product->is_show = 1;
            $product->create_time = time();
            $product->total_images = 1;
            $product->save();

            $attachment = $this->createAttachment($product, $input, $cuser);

            if(@$attachment->id){  
                $productList = json_decode($input['product']);
                foreach($productList as $product){
                    $updateSize =  $this->saveSize($attachment->id, $product->s, $product->q);
                }
            }

            $helper = new ProductsHelper();
            $product = $helper->getById($attachment->id);
            $product['slugTitle'] = $helper->createSlug($product['item']['title']);
        }
        return $product;
    }

    public function updateProduct($input, $cuser) {
        $share = Share::find($input['id']);

        $share->category_id = $input['category_id'];
        $share->album_id    = $input['album_id'];
        $share->save();

        $item        = Item::find($share->item_id);
        $item->title = $input['title'];
        $item->price = $input['price'];
        $item->save();

        if($item){
            $productList = json_decode($input['product']);
            foreach($productList as $product){
                $updateSize =  $this->saveSize($item->id, $product->s, $product->q);
            }
        }

        $helper           = new ProductsHelper();
        $share->slugTitle = $helper->createSlug($item->title);

        return $share;
    }

    public function deleteProduct($id) {
        $share = Share::find($id);
        $share->delete();
        $deleteItem = new ProductsHelper();
        $deleteItem = $deleteItem->deleteProduct($share->item_id);
        $deleteComment = $this->deleteComment($id);
        $deleteFavShare = $this->deleteFavShare($id);
        $deleteActivity = new ActivityHelper();
        $deleteActivity = $deleteActivity->deleteActivity($id);
        $reduceShare = new CategoryHelper();
        $reduceShare = $reduceShare->reduceShare($share->category_id);
        $reduceAlbumShare = new AlbumsHelper();
        $reduceAlbumShare = $reduceAlbumShare->reduceAlbumShare($share->album_id);
        $reduceUserShare = new UserHelper();
        $reduceUserShare = $reduceUserShare->reduceUserShare($share->user_id);
        return $share;
    }

    public function deleteComment($id) {
        $comment = Comment::where('share_id', '=', $id)->get();
        if ($comment) {
            foreach ($comment as $key => $cmnt) {
                $comment[$key]->delete();
            }
        }
    }

    public function deleteFavShare($id) {
        $favShare = FavoriteShare::where('share_id', '=', $id)->get();
        if ($favShare) {
            foreach ($favShare as $key => $fav) {
                $favShare[$key]->delete();
            }
        }
    }

    public function createAttachment($product, $input, $cuser) {
        $attachment = new Attachment();
        $attachment->item_id = $product->id;
        $attachment->user_id = $cuser['uid'];
        $attachment->create_time = time();
        $file = explode('/', $product->image_large);
        $filename = end($file);
        $attachment->filename = $filename;
        $fileext = explode('.', $filename);
        $attachment->fileext = $fileext[1];
        $attachment->filesize = $input['filesize'];
        $attachment->attachment = $product->image_large;
        $attachment->remote = $input['reference_url'];
        $siteUrl = explode('/', $input['reference_url']);
        $source = $siteUrl[2];
        $attachment->source = $source;
        $attachment->isimage = 1;
        $attachment->width = $input['width'];
        $attachment->height = $input['height'];
        $attachment->save();
        $store = explode('.', $source);
        if ($store[0] == "www") {
            unset($store[0]);
            $store[0] = $store[1];
        }
        //$store = implode('.', $store);
        $input['store_name'] = $store[0];
        $input['domain_name'] = $source;
        $getStore = Store::where('domain_name', '=', $source)->get();
        if (!count($getStore)) {
            $createStore = new StoreHelper();
            $createStore = $createStore->createStore($input, $cuser);
            $input['store_id'] = $createStore->id;
        } else {
            $getStore[0]->update_time = time();
            $getStore[0]->save();
            $input['store_id'] = $getStore[0]->id;
            $storeFollower = FavoriteStore::where('store_id', '=', $getStore[0]->id);
            if (count($storeFollower)) {
                foreach ($storeFollower as $key => $follower) {
                    if ($follower->user_id != $cuser['uid']) {
                        $owner = User::find($follower->user_id);
                        if ($owner->store_follow) {
                            $user = User::find($cuser['uid']);
                            $emaiData = array();
                            $emaiData = array('user' => "<a style='text-decoration:none;color:#46BFC4' href=''>" . $user->nickname . " </a>", 'email' => $owner->email, 'collection' => " the Store You follow", 'msg' => " add an item on", 'subject' => $user->nickname . " add an item on Yolove.it ", 'see_post' => "<a style='text-decoration:none;background:#46BFC4;color:#fff;padding:5px 12px;font-weight:700;font-size:14px;border-radius:1px;-moz-border-radius:1px;-webkit-border-radius:1px;' href=''>See Product</a>", 'name' => $owner->nickname);
                            $mail = new MailHelper();
                            $mail = $mail->sendMail($emaiData);
                        }
                    }
                }
            }
        }
        $share = $this->shareProduct($product->id, $input, $cuser);
        return $share;
    }

    public function shareProduct($item_id, $input, $cuser) {
        $share = new Share();
        $share->item_id = $item_id;
        $share->poster_id = $cuser['uid'];
        $share->poster_nickname = $cuser['nickname'];
        $share->user_id = $cuser['uid'];
        $share->user_nickname = $cuser['nickname'];
        $share->create_time = time();
        $share->category_id = $input['category_id'];
        $share->album_id = $input['album_id'];
        $share->store_id = $input['store_id'];
        $share->save();
        $album = Album::find($share->album_id);
        $album->total_share = $album->total_share + 1;
        $album->update_time = time();
        $album->save();
        $category = Category::find($share->category_id);
        $category->total_share = $category->total_share + 1;
        $category->save();
        $user = User::find($cuser['uid']);
        $user->total_share = $user->total_share + 1;
        $user->save();
        $albumFollower = FavoriteAlbum::where('album_id', '=', $share->album_id);
        if (count($albumFollower)) {
            foreach ($albumFollower as $key => $follower) {
                if ($follower->user_id != $cuser['uid']) {
                    $owner = User::find($follower->user_id);
                    if ($owner->collection_follow) {
                        $user = User::find($cuser['uid']);
                        $emaiData = array();
                        $emaiData = array('user' => "<a style='text-decoration:none;color:#46BFC4' href=''>" . $user->nickname . " </a>", 'email' => $owner->email, 'collection' => " the Collection You followed", 'msg' => " add an item on", 'subject' => $user->nickname . " add an item on Yolove.it ", 'see_post' => "<a style='text-decoration:none;background:#46BFC4;color:#fff;padding:5px 12px;font-weight:700;font-size:14px;border-radius:1px;-moz-border-radius:1px;-webkit-border-radius:1px;' href=''>See Collection</a>", 'name' => $owner->nickname);
                        $mail = new MailHelper();
                        $mail = $mail->sendMail($emaiData);
                    }
                }
            }
        }
        $userFollower = Relationship::where('user_id', '=', $cuser['uid']);
        if (count($userFollower)) {
            foreach ($albumFollower as $key => $follower) {
                $owner = User::find($follower->friend_id);
                if ($owner->user_follow) {
                    $user = User::find($cuser['uid']);
                    $emaiData = array();
                    $emaiData = array('user' => "<a style='text-decoration:none;color:#46BFC4' href=''>" . $user->nickname . " </a>", 'email' => $owner->email, 'collection' => " yolove.it", 'msg' => " who you followed, add an item on", 'subject' => $user->nickname . " add an item on Yolove.it ", 'see_post' => "<a style='text-decoration:none;background:#46BFC4;color:#fff;padding:5px 12px;font-weight:700;font-size:14px;border-radius:1px;-moz-border-radius:1px;-webkit-border-radius:1px;' href=''>See Product</a>", 'name' => $owner->nickname);
                    $mail = new MailHelper();
                    $mail = $mail->sendMail($emaiData);
                }
            }
        }
        return $share;
    }

    public function fetchUrl($url) {
        $hdata = $this->fetch_images_from_html($url);
        if ($hdata) {
            $data = array();
            $data['title'] = (isset($hdata['title'])) ? ($hdata['title']) : "";
            $data['price'] = (isset($hdata['price'])) ? ($hdata['price']) : "";
            $data['type'] = 'web';
            $data['url'] = $url;
            $data['images'] = $hdata['images'];
            return $data;
        }
        return false;
    }

    public function fetch_images_from_html($url) {

        if (stripos($url, 'http://') === false && stripos($url, 'https://') === false) {
            $url = 'http://' . $url;
        }
        $parsed_url = parse_url($url);
        $host = isset($parsed_url['host']) ? $parsed_url['host'] : '';
        $port = isset($parsed_url['port']) ? ':' . $parsed_url['port'] : '';
        $html = $this->get_contents($url);
        if (!$html) {
            return Redirect::to('/');
        }
        $content = urldecode(stripslashes($html));
        $pattern = "/<img([^>]*)\s*(src|file)=('|\")([^'\"]+)('|\")/i";
        if (preg_match("/<title>([^<]*)<\/title>/i", $content, $tmatches)) {
            $data['title'] = $tmatches[1];
        }
        $link = explode('.', $url);
        if (($link[0] == "www") || ($link[0] == "http://www") || ($link[0] == "https://www")) {
            $newUrl = $link[1];
        } else {
            $new = explode('/', $link[0]);
            $newUrl = $new[2];
        }
        $data['price'] = '';
        if (preg_match_all('/<b .*?class="(.*?priceLarge.*?)">(.*?)<\/b>/', $content, $pmatches)) {
            if ($pmatches[2][1]) {
                $data['price'] = $pmatches[2][1];
            } else {
                $data['price'] = $pmatches[2][0];
            }
        } else if (preg_match_all('/\$\d+([\,]\d+)*([\.]\d+)?/', $content, $pmatches)) {
            if ($newUrl == "forever21") {
                $data['price'] = $pmatches[0][3];
            } else if ($newUrl == "designersimports") {
                if ($pmatches[0][3]) {
                    $data['price'] = $pmatches[0][3];
                } else {
                    $data['price'] = $pmatches[0][2];
                }
            } else if ($newUrl == "urbanoutfitters") {
                $data['price'] = $pmatches[0][6];
            } else if ($newUrl == "pacsun") {
                if ($pmatches[0][12]) {
                    $data['price'] = $pmatches[0][12];
                } else {
                    $data['price'] = $pmatches[0][10];
                }
            } else if ($newUrl == "charlotterusse") {
                $data['price'] = $pmatches[0][22];
            } else if ($newUrl == "drjays") {
                $data['price'] = $pmatches[0][2];
            } else if ($newUrl == "aeropostale") {
                $data['price'] = $pmatches[0][1];
            } else if ($newUrl == "theoutnet") {
                $data['price'] = $pmatches[0][4];
            } else if ($newUrl == "superdry") {
                $data['price'] = $pmatches[0][2];
            } else if ($newUrl == "bebe") {
                $data['price'] = $pmatches[0][4];
            } else if ($link[1] == "asos") {
                if ($pmatches[0][36]) {
                    $data['price'] = $pmatches[0][36];
                } else {
                    $data['price'] = $pmatches[0][0];
                }
            } else if ($link[1] == "karenmillen") {
                $data['price'] = $pmatches[0][2];
            } else if ($newUrl == "karenkane") {
                $data['price'] = $pmatches[0][2];
            } else {
                $data['price'] = $pmatches[0][0];
            }
        }
        if ($data['price'] != '') {
            if (($data['price'][0] == "R") && ($data['price'][1] == "M")) {
                $price = explode('RM', $data['price']);
            } else if (($data['price'][0] == "S") && ($data['price'][1] == "$")) {
                $price = explode('S$', $data['price']);
            } else if ($data['price'][0] == "$") {
                $price = explode('$', $data['price']);
            }
            $data['price'] = $price[1];
        } else {
            $data['price'] = '';
        }
        $images = array();
        $imageadded = array();
        preg_match_all($pattern, $content, $matches);
        $matchimgs = ($matches[4]) ? array_unique($matches[4]) : array();
        foreach ($matchimgs as $value) {
            if (stripos($value, 'http://') === false && stripos($value, 'https://') === false) {
                if (stripos($value, '//') === 0) {
                    $value = 'http:' . $value;
                } else {
                    $value = 'http://' . $host . $port . '/' . $value;
                }
            }

            $value = rawurldecode($value);
            if (!in_array($value, $imageadded)) {
                array_push($imageadded, $value);
                $img['imageurl'] = $value;
                $img['thumburl'] = $value;
                array_push($images, $img);
            }
        }
        $data['images'] = $images;
        return $data;
    }

    //------------------get Color from color code-------------
    function html2rgb($color) {
        if ($color[0] == '#')
            $color = substr($color, 1);

        if (strlen($color) == 6)
            list($r, $g, $b) = array($color[0] . $color[1],
                $color[2] . $color[3],
                $color[4] . $color[5]);
        elseif (strlen($color) == 3)
            list($r, $g, $b) = array($color[0] . $color[0],
                $color[1] . $color[1], $color[2] . $color[2]);
        else
            return false;

        $r = hexdec($r);
        $g = hexdec($g);
        $b = hexdec($b);

        return array($r, $g, $b);
    }

    function distancel2(array $color1, array $color2) {
        return sqrt(pow($color1[0] - $color2[0], 2) +
                pow($color1[1] - $color2[1], 2) +
                pow($color1[2] - $color2[2], 2));
    }

//--------------------------get Color from color code----------



    public function colorConversion($value) {
        $colors = array(
            "black" => array(0, 0, 0),
            "green" => array(0, 128, 0),
            "silver" => array(192, 192, 192),
            "lime" => array(0, 255, 0),
            "gray" => array(128, 0, 128),
            "olive" => array(128, 128, 0),
            "white" => array(255, 255, 255),
            "yellow" => array(255, 255, 0),
            "maroon" => array(128, 0, 0),
            "navy" => array(0, 0, 128),
            "red" => array(255, 0, 0),
            "blue" => array(0, 0, 255),
            "purple" => array(128, 0, 128),
            "teal" => array(0, 128, 128),
            "fuchsia" => array(255, 0, 255),
            "aqua" => array(0, 255, 255),
        );
        $distances = array();
        $val = $this->html2rgb($value); // call html2rgb() function to get hex to rgb
        foreach ($colors as $name => $c) {
            $distances[$name] = $this->distancel2($c, $val); //
        }

        $mincolor = "";
        $minval = pow(2, 30); /* big value */
        foreach ($distances as $k => $v) {
            if ($v < $minval) {
                $minval = $v;
                $mincolor = $k;
            }
        }

        return $mincolor;
    }

    function get_contents($url, $retries = 3, $needheader = false, $mr = 10) {
        if (function_exists('curl_init')) {
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
            curl_setopt($ch, CURLOPT_TIMEOUT, 20);
            curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
            curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/14.0.835.202 Safari/535.1");
            curl_setopt($ch, CURLOPT_AUTOREFERER, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FAILONERROR, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            if ($this->is_empty(ini_get('open_basedir')) && ($this->is_empty(ini_get('safe_mode')) || strtolower(ini_get('safe_mode')) == 'off')) {
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                //curl_setopt($ch, CURLOPT_MAXREDIRS, 100);
            } else {
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
                if ($mr > 0) {
                    $newurl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);

                    $rch = curl_copy_handle($ch);
                    curl_setopt($rch, CURLOPT_HEADER, true);
                    curl_setopt($rch, CURLOPT_NOBODY, true);
                    curl_setopt($rch, CURLOPT_FORBID_REUSE, false);
                    curl_setopt($rch, CURLOPT_RETURNTRANSFER, true);
                    do {
                        curl_setopt($rch, CURLOPT_URL, $newurl);
                        $header = curl_exec($rch);
                        if (curl_errno($rch)) {
                            $code = 0;
                        } else {
                            $code = curl_getinfo($rch, CURLINFO_HTTP_CODE);
                            if ($code == 301 || $code == 302) {
                                preg_match('/Location:(.*?)\n/', $header, $matches);
                                $newurl = trim(array_pop($matches));
                            } else {
                                $code = 0;
                            }
                        }
                    } while ($code && --$mr);
                    curl_close($rch);
                    if (!$mr) {
                        if (@$maxredirect === null) {
                            trigger_error('Too many redirects. When following redirects, libcurl hit the maximum amount.', E_USER_WARNING);
                        } else {
                            $maxredirect = 0;
                        }
                        //return false;
                    }
                    curl_setopt($ch, CURLOPT_URL, $newurl);
                }
            }

            //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

            $content = false;
            while (($content === false) && (--$retries > 0)) {
                if ($needheader) {
                    $content['data'] = curl_exec($ch);
                    $content['content_type'] = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
                    $content['content_length'] = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
                } else {
                    $content = curl_exec($ch);
                }
            }
            curl_close($ch);
        } else {
            set_time_limit(0);
            $content = false;
            while (($content === false) && (--$retries > 0)) {
                $content['data'] = @file_get_contents($url);
            }
        }
        if ($content && isset($content['data'])) {
            if ($dehtml = $this->pgzdecode($content['data']))
                $content['data'] = $dehtml;
        }
        return $content;
    }

    function pgzdecode($data) {
        $len = strlen($data);
        if ($len < 18 || strcmp(substr($data, 0, 2), "\x1f\x8b")) {
            return null; // Not GZIP format (See RFC 1952)
        }
        $method = ord(substr($data, 2, 1)); // Compression method
        $flags = ord(substr($data, 3, 1)); // Flags
        if ($flags & 31 != $flags) {
            // Reserved bits are set -- NOT ALLOWED by RFC 1952
            return null;
        }
        // NOTE: $mtime may be negative (PHP integer limitations)
        $mtime = unpack("V", substr($data, 4, 4));
        $mtime = $mtime [1];
        $xfl = substr($data, 8, 1);
        $os = substr($data, 8, 1);
        $headerlen = 10;
        $extralen = 0;
        $extra = "";
        if ($flags & 4) {
            // 2-byte length prefixed EXTRA data in header
            if ($len - $headerlen - 2 < 8) {
                return false; // Invalid format
            }
            $extralen = unpack("v", substr($data, 8, 2));
            $extralen = $extralen [1];
            if ($len - $headerlen - 2 - $extralen < 8) {
                return false; // Invalid format
            }
            $extra = substr($data, 10, $extralen);
            $headerlen += 2 + $extralen;
        }

        $filenamelen = 0;
        $filename = "";
        if ($flags & 8) {
            // C-style string file NAME data in header
            if ($len - $headerlen - 1 < 8) {
                return false; // Invalid format
            }
            $filenamelen = strpos(substr($data, 8 + $extralen), chr(0));
            if ($filenamelen === false || $len - $headerlen - $filenamelen - 1 < 8) {
                return false; // Invalid format
            }
            $filename = substr($data, $headerlen, $filenamelen);
            $headerlen += $filenamelen + 1;
        }

        $commentlen = 0;
        $comment = "";
        if ($flags & 16) {
            // C-style string COMMENT data in header
            if ($len - $headerlen - 1 < 8) {
                return false; // Invalid format
            }
            $commentlen = strpos(substr($data, 8 + $extralen + $filenamelen), chr(0));
            if ($commentlen === false || $len - $headerlen - $commentlen - 1 < 8) {
                return false; // Invalid header format
            }
            $comment = substr($data, $headerlen, $commentlen);
            $headerlen += $commentlen + 1;
        }

        $headercrc = "";
        if ($flags & 1) {
            // 2-bytes (lowest order) of CRC32 on header present
            if ($len - $headerlen - 2 < 8) {
                return false; // Invalid format
            }
            $calccrc = crc32(substr($data, 0, $headerlen)) & 0xffff;
            $headercrc = unpack("v", substr($data, $headerlen, 2));
            $headercrc = $headercrc [1];
            if ($headercrc != $calccrc) {
                return false; // Bad header CRC
            }
            $headerlen += 2;
        }

        // GZIP FOOTER - These be negative due to PHP's limitations
        $datacrc = unpack("V", substr($data, - 8, 4));
        $datacrc = $datacrc [1];
        $isize = unpack("V", substr($data, - 4));
        $isize = $isize [1];

        // Perform the decompression:
        $bodylen = $len - $headerlen - 8;
        if ($bodylen < 1) {
            // This should never happen - IMPLEMENTATION BUG!
            return null;
        }
        $body = substr($data, $headerlen, $bodylen);
        $data = "";
        if ($bodylen > 0) {
            switch ($method) {
                case 8 :
                    // Currently the only supported compression method:
                    $data = gzinflate($body);
                    break;
                default :
                    // Unknown compression method
                    return false;
            }
        } else {
            //...
        }

        if ($isize != strlen($data) || crc32($data) != $datacrc) {
            // Bad format!  Length or CRC doesn't match!
            return false;
        }
        return $data;
    }

    function is_empty($var) {
        if ((!$var || $var == 'false' || $var == null || strlen(trim($var)) == 0))
            return true;
        return false;
    }

    function saveSize($itemId, $size, $quantity) {
        $itemSize = ItemSize::where('item_id', '=', $itemId)
                            ->where('size', '=', $size)
                            ->first();
        if (!@$itemSize->exists){
            $itemSize          = new ItemSize();
            $itemSize->item_id = $itemId;
            $itemSize->size    = $size;
            $itemSize->quantity    = $quantity;
            $itemSize->save();
        }else{
            $itemSize->quantity = $quantity;
            $itemSize->save();
        }

        return $itemSize->id;
    }

//    function saveColor($sizeId, $color, $quantity) {
//        $itemColor = ItemColor::where('size_id', '=', $sizeId)
//                              ->where('color', '=', $color)
//                              ->first();
//
//        if (@$itemColor->exists) {
//            $itemColor->quantity = $quantity;
//            $itemColor->save();
//        } else {
//            $itemColor           = new ItemColor();
//            $itemColor->size_id  = $sizeId;
//            $itemColor->color    = $color;
//            $itemColor->quantity = $quantity;
//            $itemColor->save();
//        }
//    }

}

?>
