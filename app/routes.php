<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Route::get('/', function()
//{
//	return View::make('hello');
//});
Route::get('/', 'SiteController@home');
Route::get('/trending', 'SiteController@trending');
Route::get('/category/{category}/range/{range}/color/{color}', 'SiteController@showCategoryAndRangeAndColor');
Route::get('/category/{category}/range/{range}', 'SiteController@showCategoryAndRange');
Route::get('/category/{category}/color/{color}', 'SiteController@showCategoryAndColor');
Route::get('/range/{range}/color/{color}', 'SiteController@showRangeAndColor');
Route::get('/range/{range}', 'SiteController@showRange');
Route::get('/color/{color}', 'SiteController@showColor');
Route::get('/underPrice/{price}', 'SiteController@showUnderPrice');

//Route::get('/getaboutUs', 'SiteController@getAboutUs');
//Route::get('/getyoloveTool', 'SiteController@getYoloveTool');
//Route::get('/getprivacy', 'SiteController@getPrivacy');
//Route::get('/gettermsAndCondition', 'SiteController@getTermsAndCondition');
//Route::get('/getcontact', 'SiteController@getContact');
Route::post('/sendMessage', 'SiteController@sendMessageToContact');

Route::get('/yoloveTool', 'SiteController@showYoloveTool');
Route::get('/privacy', 'SiteController@showYolovePrivacy');
Route::get('/aboutUs', 'SiteController@showYoloveAbout');
Route::get('/terms-n-conditions', 'SiteController@showYoloveTermsNCondition');
//Route::get('/blog', 'SiteController@showYoloveBlog');
Route::get('/contact', 'SiteController@showYoloveContact');
Route::get('/customer', 'SiteController@showCustomer');
Route::get('/shipping', 'SiteController@showShipping');
Route::get('/returns', 'SiteController@showReturns');
Route::get('/forget','SiteController@showYoloveForget');
Route::get('/login','SiteController@viewLogin');
Route::get('/register','SiteController@viewRegister');
Route::get('/size', function()
{
    return View::make('user.site.size');
});
//Route::get('/loadData','SiteController@loadData');

Route::get('/getItems', 'ItemController@getAllItems');
Route::get('/item/{id}/{title}', 'ItemController@getDetails');
Route::get('/getItemDetails', 'ItemController@itemDetails');
Route::get('/profile/uid/{id}/uname/{name}/saved','ItemController@showUserSaves');
Route::get('/profile/uid/{id}/uname/{name}/shares','ItemController@showUserShares');
Route::get('/userSaves','ItemController@getLikedProducts');
Route::get('/getProductsByStore','ItemController@getProductByStores');
Route::get('/getProductsByCollection','ItemController@getProductByCollections');
Route::get('/getSearchItems','ItemController@getProductsByKeyword');
Route::get('/keyword/{name}','ItemController@showKeyword');
Route::get('/userShares','ItemController@getUsersShare');
Route::get('/getProductsByFiltering','ItemController@getProductsByFiltering');
Route::get('/sizeGuide', 'ItemController@sizeGuide');

Route::post('/deleteProduct','ItemController@deleteProduct');
Route::post('/comment','ItemController@commentOnProduct');
Route::get('/getSimilerItems','ItemController@getSimilerItems');
Route::get('/hashtag/{tag}','ItemController@showHashtagItems');
Route::get('/hashtagItems','ItemController@getItemByHashtag');
Route::get('/bestSellers', 'ItemController@showBestSellers');
Route::get('/beauty', 'ItemController@showBeauty');
Route::get('/getBestSellers', 'ItemController@getBestSellersItems');
Route::get('/getMixProducts', 'ItemController@getMixItems');
Route::get('/getNewProducts', 'ItemController@getNewItems');
Route::get('/getUnderPriceItems', 'ItemController@getUnderPrice');
Route::get('/getBeautyProducts', 'ItemController@getBeautyItems');


Route::get('/profile/uid/{id}/uname/{name}','UserController@userProfile');
Route::post('/userLogin', 'UserController@userLogin');
Route::post('/userRegister', 'UserController@userRegister');
Route::get('/logout', 'UserController@logout');
Route::get('/profile/uid/{id}/uname/{name}/fans','UserController@showUserFans');
Route::get('/profile/uid/{id}/uname/{name}/followings','UserController@showUserFollowings');
Route::get('/userFans','UserController@getUserFans');
Route::get('/userFollowings','UserController@getUserFollowings');
Route::get('/users','UserController@showUsers');
Route::get('/getAllUsers','UserController@getAllUser');
Route::get('/users/sort/{sort}','UserController@showUsers');
Route::get('/profile/basicSettings','UserController@showBasicSettings');
Route::get('/profile/securitySetting','UserController@showSecuritySetting');
Route::get('/profile/bindSettings','UserController@showBindSetting');
Route::post('/changeProfile','UserController@changeProfileImage');
Route::post('/updateUser','UserController@updateUser');
Route::post('/updatePassword','UserController@updateUserPassword');
Route::get('/socialLogin/{provider}','UserController@loginwith');
Route::get('/users/resetPassword','UserController@resetPassword');
Route::post('/newPassword','UserController@newPassword');
Route::post('/forgotPassword','UserController@forgetPassword');
Route::post('/newsletterRegister','UserController@registerToNewsletter');
Route::get('/go/{name}','UserController@getProfile');



Route::get('/profile/uid/{id}/uname/{name}/collections','AlbumController@showCollection');
Route::get('/getUserCollections','AlbumController@getCollectionsByUser');
Route::get('/collection/{id}','AlbumController@getCollectionById');
Route::get('/collections','AlbumController@showAllCollections');
Route::get('/getAllCollections','AlbumController@getAllCollections');
Route::post('/deleteAlbum','AlbumController@deleteAlbum');
Route::get('/editCollection/{id}','AlbumController@editAlbum');
Route::post('/updateCollection','AlbumController@updateCollection');
Route::post('/createAlbum','AlbumController@createAlbum');


Route::get('/profile/uid/{id}/uname/{name}/stores','StoreController@showUserStores');
Route::get('/userStores','StoreController@getStoresByUser');
Route::get('/allstores','StoreController@showStores');
Route::get('/getStores','StoreController@getAllStores');
Route::get('/store/{id}','StoreController@getStorebyId');
Route::post('/deleteStore','StoreController@deleteStore');
Route::get('/store/{id}/register','StoreController@registerStore');
Route::post('/claimStore','StoreController@claimStore');
Route::get('/editStore/{id}','StoreController@editStore');
Route::post('/updateStore','StoreController@updateStore');
Route::post('/getStoreCollections','StoreController@getCollectionByStore');
Route::get('/getStoreStatistics/{id}','StoreController@getStatisticsByStore');
Route::post('/storeProductInfoDisplay','StoreController@showStoreProductInfo');
Route::post('/saveStoreStatus','StoreController@saveStoreStatus');

Route::get('/category/{id}','CategoryController@showCategory');

Route::post('/likeProduct','ActivityController@likeProduct');
Route::post('/likeAlbum','ActivityController@likeAlbum');
Route::post('/likeStore','ActivityController@likeStore');
Route::post('/unlikeProduct','ActivityController@unlikeProduct');
Route::post('/unlikeAlbum','ActivityController@unlikeAlbum');
Route::post('/unlikeStore','ActivityController@unlikeStore');
Route::get('/notifications','ActivityController@showAllNotifications');
Route::get('/notifications/{name}','ActivityController@showNotifications');
Route::post('/getNotifications/{name}','ActivityController@getNotifications');
Route::post('/getAllNotifications','ActivityController@getAllNotifications');
Route::post('/follow','ActivityController@followUser');
Route::post('/unfollow','ActivityController@unfollowUser');
Route::post('/readNotifictaion','ActivityController@readNotification');
Route::post('/deleteComment','ActivityController@commentDelete');
Route::get('/getLastComment','ActivityController@getLastComment');



Route::post('/fetchUrl','ShareController@imageFetch');
Route::post('/postProduct','ShareController@postProduct');
Route::get('/editProduct/{id}','ShareController@editProduct');
Route::post('/updateProduct','ShareController@updateProductInfo');

Route::post('/shoppingCart','ShippingController@addProductToCart');
Route::get('/viewcart','ShippingController@viewCart');
Route::post('/increaseQuantity','ShippingController@increaseQuantity');
Route::post('/changeItemSize','ShippingController@changeItemSize');
Route::post('/deleteCartItem','ShippingController@deleteCartItem');
Route::post('/applyPromoCode','ShippingController@applyPromoCode');
Route::get('/checkout','ShippingController@checkout');
Route::post('/addCartToDatabase','ShippingController@addCartToDatabase');
Route::get('/returnUrl','ShippingController@returnUrl');
Route::post('/getOrder','ShippingController@getOrderInfo');
Route::get('/success','ShippingController@success');
Route::post('/updateShippingStatus','ShippingController@updateStatus');

//-----------

