<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/skin.css')}}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/msdropdown/dd.css')}}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/msdropdown/flags.css')}}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/font-awesome-4.3.0/css/font-awesome.min.css')}}">
<!--<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/pace-theme.css')}}"/>-->

<!--<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/buttons.css')}}">-->
<link rel="icon" href="{{ URL::asset('assets/images/favicon.ico')}}" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/noty/animate.css')}}"/>
<link rel="stylesheet" href="{{ URL::asset('assets/js/fancybox/source/jquery.fancybox.css?v=2.1.5')}}" type="text/css" media="screen" />
<!--<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/social-share-kit.css')}}">-->

<meta class="facebookKitImage" property="og:image" content="@if(isset($shareItem)) {{$api_url.$shareItem['item']['image_large']}} @endif" />
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@if(isset($shareItem)) {{ URL::to('/item')}}/{{$shareItem['id']}}/{{$shareItem['item']['slugTitle']}} @endif">
<meta name="twitter:title" content="@if(isset($shareItem)) {{$shareItem['item']['title']}} @endif">
<meta name="twitter:description" content="NEWARK - The guest list and parade of limousines with celebrities emerging from them seemed more suited to a red carpet event in Hollywood or New York than than a gritty stretch of Sussex Avenue near the former site of the James M. Baxter Terrace public housing project here.">
<meta name="twitter:image" content="@if(isset($shareItem)) {{$api_url.$shareItem['item']['image_large']}} @endif">
 
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
<script type="text/javascript" src="{{ URL::asset('assets/js/jquery-1.11.0.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/jquery.bootstrap-autohidingnavbar.js')}}"></script>
<!--<script type="text/javascript" src="{{ URL::asset('assets/js/pace.min.js')}}"></script>-->

<script type="text/javascript" src="{{ URL::asset('assets/js/modernizr.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/msdropdown/jquery.dd.min.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->

<script type="text/javascript" src="{{ URL::asset('assets/js/jquery.bootstrap-autohidingnavbar.js')}}"></script>

<script type="text/javascript" src="{{ URL::asset('assets/js/fancybox/source/jquery.fancybox.pack.js?v=2.1.5')}}"></script>

<!-- Include the imagesLoaded plug-in -->
<script type="text/javascript" src="{{ URL::asset('assets/js/jquery.imagesloaded.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/pincollect.js')}}"></script>


<script type="text/javascript" src="{{ URL::asset('assets/js/isotope.pkgd.min.fn.js')}}"></script>

<!--noty-->
<script type="text/javascript" src="{{ URL::asset('assets/js/noty/packaged/jquery.noty.packaged.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/noty/notification_html.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/social-share-kit.js')}}"></script>


<title>@if(isset($siteTitle)) {{$siteTitle}} {{$site_name}} - {{$official_softname}} @else {{$official_softname}} - Shop your clothes online Discovery {{$site_name}} - {{$official_softname}} @endif</title>
