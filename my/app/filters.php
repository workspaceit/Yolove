<?php

/*
  |--------------------------------------------------------------------------
  | Application & Route Filters
  |--------------------------------------------------------------------------
  |
  | Below you will find the "before" and "after" events for the application
  | which may be used to do any work before or after a request into your
  | application. Here you may also register your custom route filters.
  |
 */
App::error(function($exception, $code)
{
    switch ($code)
    {
        case 403:
            return Response::view('errors.403', array(), 403);

        case 404:
            return Response::view('errors.404', array(), 404);

        case 500:
            return Response::view('errors.500', array(), 500);

        default:
            return Response::view('errors.default', array(), $code);
    }
});

App::before(function($request) {
    if (Input::get('uid')) {
        $userInfo = User::find(Input::get('uid'));
        if (!empty($userInfo)) {
            Session::put(Input::all());
        }
        return Redirect::to('/');
    }

    App::singleton('api_server', function() {
        $api_server = $_SERVER['DOCUMENT_ROOT'] . "/yolove_api/my/";
        return $api_server;
    });
    App::singleton('api_url', function() {
        if (isset($_SERVER['HTTPS'])) {
            $domain = 'https://' . $_SERVER['SERVER_NAME'];
        } else {
            $domain = 'http://' . $_SERVER['SERVER_NAME'];
        }
        $api_url = $domain . "/yolove_api/my/";
        //$api_url = "http://localhost/yolove/";
        return $api_url;
    });

    App::singleton('site_name', function() {
        $site_name = "Yolove.it-Malaysia";
        return $site_name;
    });

    App::singleton('official_softname', function() {
        $official_softname = "Yolove.it";
        return $official_softname;
    });
    App::singleton('main_url', function() {
        if (isset($_SERVER['HTTPS'])) {
            $domain = 'https://' . $_SERVER['SERVER_NAME'];
        } else {
            $domain = 'http://' . $_SERVER['SERVER_NAME'];
        }
        if ($_SERVER['SERVER_NAME'] == "localhost") {
            $main_url = $domain . "/yolove_web";
        } else {
            $main_url = $domain;
        }
        return $main_url;
    });


    // If you use this line of code then it'll be available in any view
    // as $site_settings but you may also use app('site_settings') as well
    View::share('api_url', app('api_url'));
    View::share('api_server', app('api_server'));
    View::share('site_name', app('site_name'));
    View::share('official_softname', app('official_softname'));
    View::share('main_url', app('main_url'));
});


App::after(function($request, $response) {
    //
});

/*
  |--------------------------------------------------------------------------
  | Authentication Filters
  |--------------------------------------------------------------------------
  |
  | The following filters are used to verify that the user of the current
  | session is logged into this application. The "basic" filter easily
  | integrates HTTP Basic authentication for quick, simple checking.
  |
 */

Route::filter('auth', function() {
//            if (Input::get('access_key')){
//                $key =Input::get('access_key');
//                $user = User::where('access_key','=',$key)->get();
//                if (!count($user)){
//                    return Response::make('Unauthorized', 401);
//                }else{
//                    $info = new YoloveController();
//                    $info->test($user[0]);
//                }
//            }else{
//               return Redirect::to('/');
//            }
    if (Auth::guest()) {
        if (Request::ajax()) {
            return Response::make('Unauthorized', 401);
        } else {
            return Redirect::guest('login');
        }
    }
});


Route::filter('auth.basic', function() {
    return Auth::basic();
});

/*
  |--------------------------------------------------------------------------
  | Guest Filter
  |--------------------------------------------------------------------------
  |
  | The "guest" filter is the counterpart of the authentication filters as
  | it simply checks that the current user is not logged in. A redirect
  | response will be issued if they are, which you may freely change.
  |
 */

Route::filter('guest', function() {
    if (Auth::check())
        return Redirect::to('/');
});

/*
  |--------------------------------------------------------------------------
  | CSRF Protection Filter
  |--------------------------------------------------------------------------
  |
  | The CSRF filter is responsible for protecting your application against
  | cross-site request forgery attacks. If this special token in a user
  | session does not match the one given in this request, we'll bail.
  |
 */

Route::filter('csrf', function() {
    if (Session::token() !== Input::get('_token')) {
        throw new Illuminate\Session\TokenMismatchException;
    }
});
