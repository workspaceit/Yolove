<?php $sessionData = Session::all();?>
<div class="modal fade itemhide" id="showStat" tabindex="-1" role="dialog" aria-labelledby="productIndividual" aria-hidden="true">

</div>


<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="helpModalLabel" aria-hidden="true" style="top: 10px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Sign Up for FREE</h4>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <h3 class="head-sign text-uppercase">Log In</h3>
                        <h4 class="head-greeting">Welcome Back</h4>
                        <form>
                            <div class="btn-facebook">
                                <a href="<?php echo URL::to('/'); ?>/socialLogin/facebook"><i class="fa fa-facebook"></i>&nbsp;&nbsp;Sign in With Facebook</a>
                            </div>
                            <div class="btn-twitter">												
                                <a href="<?php echo URL::to('/'); ?>/socialLogin/twitter"><i class="fa fa-twitter"></i>&nbsp;&nbsp;Sign in With Twitter</a>
                            </div>
                            <h4>OR</h4>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input placeholder="Email or Username" id="log_email" name="log_email" type="email" class="form-control">
                                </div>
                                <span id="email-error" class="help-block has-error"></span>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                    <input placeholder="Password" id="log_password" name="log_password" type="password" class="form-control">
                                </div>
                            </div>
                            <button data-loading-text="Signing In...." class="btn btn-block bt-login" id="login" type="submit">Login</button><br>
                            <a href="javascript:void(0);" class='forget-div forgetPassPopup'>Forget password?</a>
                            <div class="clearfix"></div>
                            <div class='text-center'>Don't Have a yolove account? <a class="forget-div registerNowPopup" href="javascript:void(0);">Sign Up now!</a></div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="helpModalLabel" aria-hidden="true" style="top: 10px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Forget Password</h4>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <h3 class="head-sign">Sign Up</h3>
                        <h4 class="head-greeting">Nice To Meet You</h4>
                        <form>
                            <div class="form-group">
                                <div class="btn-facebook">
                                    <a href="<?php echo URL::to('/'); ?>/socialLogin/facebook"><i class="fa fa-facebook"></i>&nbsp;&nbsp;Sign up With Facebook</a>
                                </div>
                                <div class="btn-twitter">												
                                    <a href="<?php echo URL::to('/'); ?>/socialLogin/twitter"><i class="fa fa-twitter"></i>&nbsp;&nbsp;Sign up With Twitter</a>
                                </div>
                                <h4>OR</h4>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input placeholder="User Name" id="nickname" name="nickname" type="text" class="form-control">
                                </div>
                                <span id="username-error" data-error="0" class="help-block has-error"></span>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-at"></i></div>
                                    <input placeholder="Email" id="regi_email" name="email"  type="email" class="form-control">
                                </div>
                                <span id="remail-error" data-error="0" class="help-block has-error"></span>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                    <input class="form-control" placeholder="Password" id="regi_password" name="password" type="password">
                                </div>
                                <span class="help-block has-error" id="password-error"></span>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                    <input class="form-control" placeholder="Confirm Password" id="password_confirm" name="password_confirm" type="password">
                                </div>
                                <span class="help-block has-error" id="password-error"></span>
                            </div>

                            <button data-loading-text="Registering...." class="btn btn-block bt-login" id="register" type="submit">Register</button><br>
                            <div class="clearfix"></div>
                            <div class="text-center">
                                Already registered? <a class="forget-div loginNow" href="javascript:void(0);">Log In now!</a>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
<div class="modal fade" id="forgetPassModal" tabindex="-1" role="dialog" aria-labelledby="helpModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">USER AUTHENTICATION</h4>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <h4>  Forget Password?</h4>
                        <small>Please enter your email address or<br> username </small>
                        <form>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input placeholder="Email or Username" id="userEmail" name="userEmail"  type="email" class="form-control">
                                </div>
                                <span id="femail-error" data-error="0" class="help-block has-error"></span>
                            </div>
                            <small> eg:example@example.com</small><br>

                            <button data-loading-text="Please wait...." class="btn btn-block bt-login" id="emailSub" type="submit">Forget Password</button>
                            <div class="clearfix"></div>

                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>

<div class="modal fade" id="fetchModal" tabindex="-1" role="dialog" aria-labelledby="helpModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">PLEASE TYPE A WEBSITE LINK</h4>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    &nbsp;&nbsp;
                    <form class="top-area-yolove" action="<?php echo URL::to('/'); ?>/fetchUrl" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" id="fetchUrl" name="fetch" placeholder="Enter url of the site">
                        </div>
                        <button data-loading-text="Signing In...." class="btn btn-block bt-login fetch-now" type="submit">Fetch Now</button>
                    </form>
                    <div class="form-group">
                        <h5>Want to post a product like a pro? Install this awesome bookmarklet.</h5>
                    </div>
                    <div class="form-group">
                        <a class="btn btn-success yolove-it" href="javascript:void(function(g,d,m,s){g[m]?(g[m].c=1,g[m]()):!d[m]&&(d.getElementsByTagName('head')[0]||d.body).appendChild((d[m]=1,s=d.createElement('script'),s.setAttribute('charset','utf-8'),s.id='pinit-script',s.src='<?php echo URL::asset('assets/js/pincollect.js'); ?>?'+Math.floor(+new Date/10000000),s))}(window,document,'__pinit'))" title="Yolove.it Tool">+Post to Yolove.it</a>
                        <h5>Drag this button to your bookmark bar.</h5>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>	

<div class="modal fade" id="orderItemParent" tabindex="-1" role="dialog" aria-labelledby="helpModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Track Your Order</h4>
            </div>
            <div class="modal-body">
                <div class="text-center" id="trackAllOrder">

                </div>
            </div>
        </div>
    </div>
</div>	
<!----orderInfo----->

<div class="modal fade" id="orderInfoModal" tabindex="-1" role="dialog" aria-labelledby="helpModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Track your order</h4>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <div class="login-tab" role="tabpanel">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="home" class="tab-pane active text-center" role="tabpanel">
                                &nbsp;&nbsp;
                                <span style="display: none;" class="response_error" id="error">Unable to find your order</span>
                                <div class="clearfix"></div>
                                <div class="form-group">
                                    <label> Email Address</label>
                                    <input id="order_email" class="form-control" type="email" />
                                </div>
                                <div class="form-group">
                                    <label> Order ID</label>
                                    <input id="orderId" class="form-control" type="text" />
                                </div>

                                <button id="orderStatus" class="btn btn-success fetch-now" type="submit">view order status</button>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade itemhide" id="showDetails" tabindex="-1" role="dialog" aria-labelledby="productIndividual" aria-hidden="true">

</div>
<div class="modal fade" id="addedCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog added-cart">
        <div class="modal-content">
            <div class="modal-header">
                <p>Added to cart</p>
            </div>
            <div class="modal-body" data-dismiss="modal">
                <p>Keep Shopping !</p>
            </div>
            <div class="modal-footer">
                <a href="<?php echo URL::to('/'); ?>/viewcart"><p>Proceed to checkout</p></a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="welcomeModal" tabindex="-1" role="dialog" aria-labelledby="helpModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close not_now" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
                <h3 class="modal-title text-center" id="myModalLabel">Welcome To Yolove.it</h3>
            </div>
            <div class="modal-body">
                <div class="">
                    <h4 class="head-greeting text-center sub-head-notify">shop With us and Experience the difference</h4>
                    <h4 class="head-greeting">Enjoy hassle-free international shipping with.</h4>
                    <ul>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                    </ul>

                    <p>Sign-up to our newsletter for new arrivals, trends and promotions</p>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <input placeholder="please enter a valid email address" id="news_email" name="news_email" type="email" class="form-control">
                        </div>
                    </div>
                    <button data-loading-text="" class="btn btn-block btn-success submit_news_email" type="submit">Submit</button><br>
                    <p>
                        <a href="javascript:void(0);" class='forget-div not_now' aria-hidden="true" data-dismiss="modal">No Thanks not right now</a>
                        <a class="forget-div dont_show pull-right" href="javascript:void(0);" aria-hidden="true" data-dismiss="modal">Don't show me this again</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade clearfix" id="signup-prompt-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog custom-modal-wanello">
        <div class="modal-content clearfix">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Sign Up for FREE</h4>
            </div>
            <div class="modal-sub-header">
                Amazing products personalized for you. Shop all stores in one place.
            </div>
            <div class="modal-body">
                <div class="buttons">
                    <div class="btn-facebook">
                        <a href="<?php echo URL::to('/'); ?>/socialLogin/facebook"><i class="fa fa-facebook"></i>&nbsp;&nbsp;Sign in With Facebook</a>
                    </div>
                    <a class="btn btn-block bt-login loginNow" data-toggle="" href="javascript:void(0);" style="display: none;">
                        <img alt="Email-icon" class="icon-email" src="https://assets-fs.wnlimg.com/assets/email-icon-d735261ac3cea026474eac405a585bc3.png">
                        Continue with Email
                    </a>
                    <span class="btn btn-block bt-login loginNow" data-toggle="modal" style="display: inline-block;">
                        <img alt="Email-icon" class="icon-email" src="https://assets-fs.wnlimg.com/assets/email-icon-d735261ac3cea026474eac405a585bc3.png">
                        Continue with Email
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="showStoreDetails" tabindex="-1" role="dialog" aria-labelledby="helpModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Track Your Store Items</h4>
            </div>
            <div class="modal-body">
                <div class="text-center" id="storeItemDetails">

                </div>
            </div>
        </div>
    </div>
</div>

<section class="footer">
    <div class="container">
        <div class="row widget-area">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <strong>CONNECT</strong>
                <h3 class="widget-title"><a href="javascript:void(0)" class="dropdown-toggle visible-lg visible-md visible-sm" data-toggle="modal" data-target="#welcomeModal" data-toggle="dropdown" aria-expanded="true">Sign up for our Newsletter</a></h3>
                <p>
                    Read our privacy and cookie policy <a href="javascript:void(0);">here</a>
                </p>
                <strong>SOCIAL</strong><br><br>
                <ul class="social">
                    <li class="circle facebook-circle"><a href="https://www.facebook.com/yoloveit?ref=tn_tnmn" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li class="circle twitter-circle"><a href="https://twitter.com/Yoloveit" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <li class="circle google-circle"><a href="https://plus.google.com/+YoLoveitFashion/posts" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                    <li class="circle pinterest-circle"><a href="http://www.pinterest.com/yoloveit/" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                    <li class="circle instagram-circle"><a href="http://instagram.com/yoloveit" target="_blank"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-xs-12 col-md-4 brdr">
                <strong>COUNTRY</strong><br><br>
                <div class="widget-title" style="font-size:13px !important;">
                    <!--select style="width:100%; height:35px;margin-bottom:4px; cursor:pointer;" class="form-control">
                            <option class="flag">Singapore</option>
                            <option>Malaysia</option>
                    </select-->
                    <select name="countries" id="countries" data-link="{{$main_url}}" data-session="{{http_build_query($sessionData)}}" style="width:100%; height:30px;">
                        <option value='us' data-image="{{ URL::asset('assets/images/msdropdown/icons/blank.gif')}}" data-imagecss="flag us" data-title="USA">USA</option>
                        <option value='my' data-image="{{ URL::asset('assets/images/msdropdown/icons/blank.gif')}}" data-imagecss="flag my" data-title="Malaysia">Malaysia</option>
                        <option value='sg' data-image="{{ URL::asset('assets/images/msdropdown/icons/blank.gif')}}" data-imagecss="flag sg" data-title="Singapore">Singapore</option>     
                    </select>    
                </div>
                <p  style=" padding-top:10px;">
                    <a href="javascript:void(0);">Location Preference</a>
                </p>
            </div>
            <div class="col-sm-6 col-xs-12 col-md-2">
                <strong>CUSTOMER SERVICE</strong><br><br>
                <ul class="widget-menu">
                    <li><a href="<?php echo URL::to('/'); ?>/contact"><i class="fa fa-chevron-right"></i>  Help & Contact Us</a></li>
                    <li><a href="<?php echo URL::to('/'); ?>/yoloveTool"><i class="fa fa-chevron-right"></i>  FAQs</a></li>
                    <li><a href="<?php echo URL::to('/'); ?>/terms-n-conditions"><i class="fa fa-chevron-right"></i>  Term & Conditions</a></li>
                    <li><a href="<?php echo URL::to('/'); ?>/privacy"><i class="fa fa-chevron-right"></i>  Privacy & Cookies Policy</a></li>
                    <li><a href="<?php echo URL::to('/'); ?>/customer"><i class="fa fa-chevron-right"></i>  Customer Service</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-xs-12 col-md-2">
                <strong>ABOUT</strong><br><br>
                <ul class="widget-menu">
                    <li><a href="<?php echo URL::to('/'); ?>/aboutUs"><i class="fa fa-chevron-right"></i>  About us</a></li>
                    <li><a href="http://yolove.it/blog/" target="_blank"><i class="fa fa-chevron-right"></i>  Blog</a></li>
                    <li><a href="<?php echo URL::to('/'); ?>/shipping"><i class="fa fa-chevron-right"></i> Shipping Info</a></li>
                    <li><a href="<?php echo URL::to('/'); ?>/returns"><i class="fa fa-chevron-right"></i> Returns & Exchanges</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <p class="copyright">© 2015. All Rights Reserved.</p>
            </div>		
        </div>		
    </div>
</section>
<a href="#0" class="BackToTop">Top</a>
<input type="hidden" class="countHistory" value=""/>
<script type="text/javascript">
    var count = 0;
    $body = $('body');
//    var getUrl = location.pathname.split('/')[2];
//    if(getUrl == "aboutUs" || getUrl == "terms-n-conditions" || getUrl == "yoloveTool" || getUrl == "privacy" || getUrl == "contact"){
//        
//    }else if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
//        
//    } else {
//        $(".set-submenu").autoHidingNavbar();
//    }
    $(document).ready(function () {
        $("#countries").msDropdown();

        $(window).scroll(function () {
            var scroll = $(window).scrollTop();
            if (scroll >= 40) {
                $(".nav-sub-bar").addClass("fixed");
                $("#nav").css("margin-top", "40px");
            } else if (scroll == 0) {
                $(".nav-sub-bar").removeClass("fixed");
                $("#nav").css("margin-top", "0px");
            }
        });

        var bottom = $('.navbar-default').offset().top - 45;
        $(window).scroll(function () {
            if ($(this).scrollTop() > bottom) {
                $('.navbar-default').addClass('fixed2');
            }
            else {
                $('.navbar-default').removeClass('fixed2');
            }
        });

    });
    $(document).ready(function (e) {
        // browser window scroll (in pixels) after which the "back to top" link is shown
        var offset = 300,
                //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
                offset_opacity = 1200,
                //duration of the top scrolling animation (in ms)
                scroll_top_duration = 700,
                //grab the "back to top" link
                $back_to_top = $('.BackToTop');

        //hide or show the "back to top" link
        $(window).scroll(function () {
            ($(this).scrollTop() > offset) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
            if ($(this).scrollTop() > offset_opacity) {
                $back_to_top.addClass('cd-fade-out');
            }
        });

        //smooth scroll to top
        $back_to_top.on('click', function (event) {
            event.preventDefault();
            $('body,html').animate({
                scrollTop: 0,
            }, scroll_top_duration
                    );
        });

    });
    $(window).scroll(
            {
                previousTop: 0
            },
    function () {
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {

        } else {
            var currentTop = $(window).scrollTop();
            if (currentTop < this.previousTop) {
                //$(".nav-sub-bar").show();
                $(".set-submenu").fadeIn("slow");
            } else {
                // $(".nav-sub-bar").hide();
                $(".set-submenu").fadeOut("slow");
            }
            this.previousTop = currentTop;
        }
    });
//    $(document).ajaxStart(function () {
//        
//    });
//    $(document).ajaxComplete(function () {
//        
//    });
    $("#countries").on("change", function () {
        var url = $("#countries").attr("data-link");
        var country = $("#countries").val();
        var sessionData = $(this).attr('data-session');
        if (country == "us") {
            window.location.href = url+'?'+sessionData;
        } else {
            window.location.href = url + '/' + country+'?'+sessionData;
        }
    });

    $(".cat-drop").on("click", function () {
        var open = $(this).attr('aria-expanded');
        if (open == "true") {
            $(this).find(".drop").removeClass("rotated");
        } else {
            $(this).find(".drop").addClass("rotated");
        }

    });
    $body.on('click', '.getDetails', function (e) {
        if (e.target == this) {
            $this = $(this);
            var id = $this.attr('data-id'),
                    title = $this.attr('data-title');
            productDetails(id, title);
        } else {
            return;
        }
    });
    $body.on('click', '.follow', function () {
        var id = $(this).attr("id");
        followUser(id);
    });
    $body.on('click', '.unfollow', function () {
        var id = $(this).attr("id");
        unfollowUser(id);
    });
    $body.on('click', '.falseFollow', function () {
        generate('error', 'center', 'You have to login first');
        setTimeout(function () {
            $('#loginModal').modal();
            //window.location = "<?php echo URL::to('/login') ?>";
        }, 3000);
    });

    $body.on('click', '.comment-box', function (e) {
        e.preventDefault();
        if ($('.comment-box').hasClass('increase')) {
        } else {
            var commentBox = $('.comment-box');
            commentBox.animate({
                height: commentBox.height() * 3}, 1000);
            $('.comment-box').addClass('increase');
            $('.comment-submitButton').removeClass('hidden');
        }
    });
    $body.on('click', '.cancel-submit', function (e) {
        e.preventDefault();
        if ($('.comment-box').hasClass('increase')) {
            var commentBox = $('.comment-box');
            commentBox.animate({
                height: 38}, 1000);
            $('.comment-box').removeClass('increase');
            $('.comment-submitButton').addClass('hidden');
        } else {
        }
    });

    $body.on('click', '.close-item', function (e) {
        window.history.go(-$('.countHistory').val());
        $('.countHistory').val(0);
        //$('#showDetails').fadeOut(200);
    });
    $body.on('click', '.itemhide', function (e) {
        if (typeof e.target.id != 'undefined' && e.target.id == "showDetails") {
            window.history.go(-$('.countHistory').val());
            $('.countHistory').val(0);
        }
    });
    $body.on('click', '.like-r', function (e) {
        e.preventDefault();
        e.stopPropagation();
        var thisObj = $(this);
        var id = thisObj.attr('id');
        var like = thisObj.attr('like');
        itemActivity(id, like);
    });
    $body.on('click', '.add_to_cart', function (e) {
        e.preventDefault();
        e.stopPropagation();
        var thisObj = $(this);
        var size = $('#productSize option:selected').text();
        var sizeId = $('#productSize').val();
        if (size == "" || size == "Select Size" || size == undefined) {
            size = "M";
        }
        addToCart(thisObj, size, sizeId);
    });
    $body.on('click', ".reference-btn", function () {
        var url = $(this).attr('data-href');
        window.open(url, '_blank');
    });
    $body.on('click', ".cart-without-login", function () {
        window.location = "<?php echo URL::to('/viewcart') ?>";
    });
    $body.on('click', ".itemDelete", function () {
        var id = $(this).attr("id");
        deleteProduct(id);
    });
    $body.on('click', '.likeAlbum', function () {
        var thisObj = $(this);
        var id = thisObj.attr('id');
        var like = thisObj.attr('like');
        if (like == "true") {
            unlikeAlbum(id);
        } else {
            likeAlbum(id);
        }
    });
    $body.on('click', '.likeStore', function () {
        var thisObj = $(this);
        var id = thisObj.attr('id');
        var like = thisObj.attr('like');
        if (like == "true") {
            unlikeStore(id);
        } else {
            likeStore(id);
        }
    });
    $body.on('click', ".deleteColl", function () {
        deleteAlbum($(this).attr("id"));
    });
    $body.on('click', ".deleteStore", function () {
        deleteStore($(this).attr("id"));
    });

    $(".shopItem").click(function () {
        var id = $(this).attr("id");
        var title = $(this).attr('data-title');
        productDetails(id, title);

    });
    function productDetails(id, title) {
        count = $('.countHistory').val();
        count++;
        $('.countHistory').val(count);
        $.ajax({
            url: "<?php echo URL::to('/'); ?>" + "/getItemDetails",
            type: "GET",
            data: {
                id: id
            },
            success: function (result) {
                $('#showDetails').html(result);
                $('#showDetails').css("display", "block");
                window.history.pushState("", "", "<?php echo URL::to('/'); ?>" + "/item/" + id + "/" + title);
                $('#showDetails').scrollTop(0);
                $('#showDetails').modal();
            }
        });
    }
    function deleteProduct(id) {

        noty({
            text: 'Are You Sure Want To Delete This Product?',
            type: 'information',
            dismissQueue: true,
            layout: 'center',
            theme: 'defaultTheme',
            buttons: [
                {addClass: 'btn btn-primary', text: 'Ok', onClick: function ($noty) {
                        $noty.close();
                        $.ajax({
                            url: "<?php echo URL::to('/'); ?>" + "/deleteProduct",
                            type: "POST",
                            data: {
                                itemId: id
                            },
                            success: function (result) {
                                noty({dismissQueue: true, force: true, layout: 'center', theme: 'defaultTheme', timeout: 3000, text: 'Product Has been deleted', type: 'success'});
                                //var page = $(".item_" + id).attr('data-page');
                                //if (page == 'allproduct') {
                                $(".item_" + id).css('display', 'none');
//                                } else {
//                                    setTimeout(function () {
//                                        window.location = "<?php echo URL::to('/'); ?>";
//                                    }, 3000);
//                                }
                            }
                        });

                    }
                },
                {addClass: 'btn btn-width-love', text: 'Cancel', onClick: function ($noty) {
                        $noty.close();
                        // noty({dismissQueue: true, force: true, layout: 'center', theme: 'defaultTheme', text: 'You clicked "Cancel" button', type: 'error'});
                    }
                }
            ]
        });
    }
    function likeProduct(id) {
        $.ajax({
            url: "<?php echo URL::to('/'); ?>" + "/likeProduct",
            type: "POST",
            data: {
                id: id
            },
            success: function (result) {
                generate('success', 'center', result.message);
                if (result.message != "You Can't Love Your Own Item") {
                    $('.like_button_' + id).attr('like', 'true');
                    $('.like_button_' + id).html("<i class='fa fa-heart'></i>");
                    likeCount = $('.favourite_' + id).html();
                    likecount = parseInt(likeCount) + 1;
                    $('.favourite_' + id).html(likecount);
                }

            }
        });
    }
    function unlikeProduct(id) {
        $.ajax({
            url: "<?php echo URL::to('/'); ?>" + "/unlikeProduct",
            type: "POST",
            data: {
                id: id
            },
            success: function (result) {
                generate('success', 'center', 'You Unliked This Item');
                $('.like_button_' + id).attr('like', 'false');
                $('.like_button_' + id).html("Love");
                likeCount = $('.favourite_' + id).html();
                if (parseInt(likeCount) > 0) {
                    likecount = parseInt(likeCount) - 1;
                }
                $('.favourite_' + id).html(likecount);
            }
        });
    }
    $body.on('click', '.falseLikeAlbum', function () {
        generate('error', 'center', 'You have to login first');
        setTimeout(function () {
            $('#loginModal').modal();
            //window.location = "<?php echo URL::to('/login') ?>";
        }, 3000);
    });
    $body.on('click', '.falseLikeStore', function () {
        generate('error', 'center', 'You have to login first');
        setTimeout(function () {
            $('#loginModal').modal();
            //window.location = "<?php echo URL::to('/login') ?>";
        }, 3000);
    });
    $body.on('click', '.falseLikeProduct', function () {
        generate('error', 'center', 'You have to login first');
        setTimeout(function () {
            $('#loginModal').modal();
            //window.location = "<?php echo URL::to('/login') ?>";
        }, 3000);
    });
    function likeAlbum(id) {
        $.ajax({
            url: "<?php echo URL::to('/'); ?>" + "/likeAlbum",
            type: "POST",
            data: {
                id: id
            },
            success: function (result) {
                generate('success', 'center', result.message);
                if (result.message != "You Can't Love Your Own Collection") {
                    setTimeout(function () {
                        window.location = "<?php echo URL::to('/'); ?>" + "/collection/" + id;
                    }, 3000);
                }
                //window.setTimeout('location.reload()', 2000);
            }
        });
    }
    function unlikeAlbum(id) {
        $.ajax({
            url: "<?php echo URL::to('/'); ?>" + "/unlikeAlbum",
            type: "POST",
            data: {
                id: id
            },
            success: function (result) {
                generate('success', 'center', 'You Unliked This Collection');
                $('.like_album_' + id).attr('like', 'false');
                $('.like_album_' + id).html("Love");
                //window.setTimeout('location.reload()', 1000);
            }
        });
    }
    function likeStore(id) {
        $.ajax({
            url: "<?php echo URL::to('/'); ?>" + "/likeStore",
            type: "POST",
            data: {
                id: id
            },
            success: function (result) {
                generate('success', 'center', result.message);
                setTimeout(function () {
                    window.location = "<?php echo URL::to('/'); ?>" + "/store/" + id;
                }, 3000);

                //window.setTimeout('location.reload()', 1000);
            }
        });
    }
    function unlikeStore(id) {
        $.ajax({
            url: "<?php echo URL::to('/'); ?>" + "/unlikeStore",
            type: "POST",
            data: {
                id: id
            },
            success: function (result) {
                generate('success', 'center', result.message);
                $('.like_store_' + id).attr('like', 'false');
                $('.like_store_' + id).html("Follow");
                //window.setTimeout('location.reload()', 1000);
            }
        });
    }
    function deleteAlbum(id) {
        noty({
            text: 'Are You Sure Want To Delete This Collection?',
            type: 'information',
            dismissQueue: true,
            layout: 'center',
            theme: 'defaultTheme',
            buttons: [
                {addClass: 'btn btn-primary', text: 'Ok', onClick: function ($noty) {
                        $noty.close();
                        $.ajax({
                            url: "<?php echo URL::to('/'); ?>" + "/deleteAlbum",
                            type: "POST",
                            data: {
                                albumid: id
                            },
                            success: function (result) {
                                noty({dismissQueue: true, force: true, layout: 'center', theme: 'defaultTheme', timeout: 3000, text: 'Album Has been deleted', type: 'success'});
                                var page = $("#collection_" + id).attr('data-page');
                                if (page == 'allcollection') {
                                    $("#collection_" + id).css('display', 'none');
                                } else {
                                    setTimeout(function () {
                                        window.location = "<?php echo URL::to('/'); ?>" + "/collections";
                                    }, 3000);
                                }
                            }
                        });
                    }
                },
                {addClass: 'btn btn-width-love', text: 'Cancel', onClick: function ($noty) {
                        $noty.close();
                        // noty({dismissQueue: true, force: true, layout: 'center', theme: 'defaultTheme', text: 'You clicked "Cancel" button', type: 'error'});
                    }
                }
            ]
        });
    }
    function deleteStore(id) {
        noty({
            text: 'Are You Sure Want To Delete This Store?',
            type: 'information',
            dismissQueue: true,
            layout: 'center',
            theme: 'defaultTheme',
            buttons: [
                {addClass: 'btn btn-primary', text: 'Ok', onClick: function ($noty) {
                        $noty.close();
                        $.ajax({
                            url: "<?php echo URL::to('/'); ?>" + "/deleteStore",
                            type: "POST",
                            data: {
                                storeid: id
                            },
                            success: function (result) {
                                noty({dismissQueue: true, force: true, layout: 'center', theme: 'defaultTheme', timeout: 3000, text: 'Store Has been deleted', type: 'success'});
                                //window.setTimeout('location.reload()', 1000);
                                var page = $("#store_" + id).attr('data-page');
                                if (page == 'allstore') {
                                    $("#store_" + id).css('display', 'none');
                                } else {
                                    setTimeout(function () {
                                        window.location = "<?php echo URL::to('/'); ?>" + "/allstores";
                                    }, 3000);
                                }
                            }
                        });
                    }
                },
                {addClass: 'btn btn-width-love', text: 'Cancel', onClick: function ($noty) {
                        $noty.close();
                        // noty({dismissQueue: true, force: true, layout: 'center', theme: 'defaultTheme', text: 'You clicked "Cancel" button', type: 'error'});
                    }
                }
            ]
        });

    }
    $('#keyword').keypress(function (e) {
        if (e.which == 13) {
            var keyword = $('#keyword').val();
            if (keyword != '') {
                window.location = "<?php echo URL::to('/'); ?>" + "/keyword/" + keyword;
            }
        }
    });
    $("#search").click(function () {
        var keyword = $('#keyword').val();
        if (keyword != '') {
            window.location = "<?php echo URL::to('/'); ?>" + "/keyword/" + keyword;
        }
    });

    function addToCart(thisObj, productSize, sizeId) {
        price = thisObj.attr('data-price');
        shareId = thisObj.attr('data-item');
        storeId = thisObj.attr('data-store');
        userId = thisObj.attr('data-user');
        img = thisObj.attr('data-image');
        title = thisObj.attr('data-title');
        link = thisObj.attr('data-link');
        shippingCost = thisObj.attr('data-shipping-cost');
        if (productSize) {
            size = productSize;
        } else {
            size = "M";
        }
        qty = 1;
        $.ajax({
            url: "<?php echo URL::to('/'); ?>" + "/shoppingCart",
            type: "POST",
            data: {
                price: price,
                share_id: shareId,
                store_id: storeId,
                user_id: userId,
                image: img,
                title: title,
                link: link,
                shipping_cost: shippingCost,
                size: size,
                quantity: qty,
                sizeId: sizeId,
                discount: 0
            },
            success: function (e) {
                if (e != "false") {
                    $("#countCart").html(parseInt($("#countCart").html()) + 1);
                }
                $('.' + shareId + '_cartItem').html("Added");
                $('.' + shareId + '_cartItem').removeClass('add_to_cart');
                $('#addedCart').modal();
                if (($("#showDetails").data('bs.modal') || {}).isShown) {
                    $('#showDetails').modal('hide');
                    window.history.go(-$('.countHistory').val());
                    $('.countHistory').val(0);
                }
            }


        });
    }

    function itemActivity(id, like) {
        if (like == "true") {
            unlikeProduct(id);
        } else {
            likeProduct(id);
        }
    }
    //$('#myModal').modal('hide');
    $('#btn_show').click(function () {
        $('#popit').fadeIn(300);
    });

    $('#closeit').click(function () {
        $('#popit').fadeOut(200);
    });
    $body.on('click', '.notiItem', function () {
        var id = $(this).attr("id");
        var activity = $(this).attr("activity");
        var slugTitle = $(this).attr("slug");
        var title = $(this).attr('data-title');
        var countNoti = $("#countNoti").html();
        $.ajax({
            url: "<?php echo URL::to('/'); ?>" + "/readNotifictaion",
            type: "POST",
            data: {
                activity: activity
            },
            success: function (result) {
                if (countNoti != 0) {
                    $("#countNoti").html(countNoti - 1);
                }
                productDetails(id, slugTitle);
            }
        });
    });
    $body.on('click', '.notiAlbum', function () {
        var activity = $(this).attr("activity");
        var id = $(this).attr("id");
        $.ajax({
            url: "<?php echo URL::to('/'); ?>" + "/readNotifictaion",
            type: "POST",
            data: {
                activity: activity
            },
            success: function (result) {
                window.location = "{{URL::to('/')}}/collection/" + id
            }
        });
    });
    function followUser(id) {
        $.ajax({
            url: "<?php echo URL::to('/'); ?>" + "/follow",
            type: "POST",
            data: {
                id: id
            },
            success: function (result) {
                generate('success', 'center', result.message);

                $('.follow_button_' + id).removeClass('follow').removeClass('clr-sky-block').removeClass('follow-btn').addClass('unfollow').addClass('following-btn').html('Following');
            }
        });
    }
    function unfollowUser(id) {

        $.ajax({
            url: "<?php echo URL::to('/'); ?>" + "/unfollow",
            type: "POST",
            data: {
                id: id
            },
            success: function (result) {
                generate('success', 'center', result.message);
                $('.follow_button_' + id).removeClass('unfollow').removeClass('following-btn').addClass('clr-sky-block').addClass('follow').addClass('follow-btn').html('Follow');
            }
        });
    }
    function comment(shareId, Text) {
        generate('information', 'center', 'Processing...');
        var total_comment = $('.row').find('.comment-header').attr('data-count');
        $.ajax({
            url: "<?php echo URL::to('/'); ?>" + "/comment",
            type: "POST",
            data: {
                share_id: shareId,
                comment: Text
            },
            success: function (result) {
                $.ajax({
                    url: "<?php echo URL::to('/'); ?>" + "/getLastComment",
                    type: "GET",
                    success: function (res) {
                        total_comment = parseInt(total_comment)+1;
                        $(".commentArea").prepend(res).fadeIn('slow');
                        $('.row').find('.comment-header').attr('data-count',total_comment);
                        $('.row').find('.comment-header').html(total_comment + ' Comments');
                        if ($('.comment-box').hasClass('increase')) {
                            var commentBox = $('.comment-box');
                            commentBox.animate({
                                height: 38}, 1000);
                            $('.comment-box').removeClass('increase');
                            $('.comment-box').val('');
                            $('.comment-submitButton').addClass('hidden');
                        } else {
                        }
                    }
                });
            }
        });
    }
    //---------orderInfo--------------------
    $('#order_show').click(function () {
        $('#orderInfoModal').modal();
    });

    $('#closeorder').click(function () {
        $('#orderInfo').fadeOut(200);
    });

    $('#orderStatus').click(function (e) {
        var email = $('#order_email').val();
        var orderId = $('#orderId').val();
        if (email == '') {
            $('#order_email').focus();
        } else if (orderId == '') {
            $('#orderId').focus();
        } else {
            e.preventDefault();
            $.ajax({
                url: "<?php echo URL::to('/'); ?>" + '/getOrder',
                type: 'POST',
                data: {
                    email: email,
                    id: orderId
                },
                success: function (data) {
                    if (data == '') {
                        $('#error').fadeToggle(500);
                    } else {
                        $('#orderInfoModal').modal('hide');
                        $('#trackAllOrder').html(data);
                        $('#orderItemParent').modal();
                    }
                }
            });
        }

    });
    function generate(type, layout, text) {
        var n = noty({
            text: text,
            id: "processing",
            type: type,
            dismissQueue: true,
            timeout: 3000,
            closeWith: ['click'],
            layout: layout,
            theme: 'defaultTheme',
            maxVisible: 1,
        });
    }
    function generateTimeOut(type, layout, text, timeout) {
        var n = noty({
            text: text,
            id: "endProcessing",
            type: type,
            dismissQueue: true,
            timeout: timeout,
            closeWith: ['click'],
            layout: layout,
            theme: 'defaultTheme',
            maxVisible: 1,
        });
    }
    $body.on('click', ".signup-prompt", function (e) {
        e.preventDefault();
        $('#loginModal').modal('hide');
        $('#registerModal').modal('hide');
        $('#forgetPassModalModal').modal('hide');
        $('#signup-prompt-modal').modal();
        //$('.fancybox').fancybox();
    });


    $body.on('click', '#storeStat', function (e) {
        var id = $(this).attr('data-store');
        $.ajax({
            url: "<?php echo URL::to('/'); ?>" + "/getStoreStatistics/" + id,
            type: "GET",
            data: {
            },
            success: function (result) {

                $('#showStat').html(result);
                $('#showStat').scrollTop(0);
                $('#showStat').modal();
            }
        });
    });


    $('.loginNow').on('click', function (e) {
        e.preventDefault();
        $('#registerModal').modal('hide');
        $('#forgetPassModalModal').modal('hide');
        $('#signup-prompt-modal').modal('hide');
        if (($("#showDetails").data('bs.modal') || {}).isShown) {
            $('#showDetails').modal('hide');
            window.history.go(-$('.countHistory').val());
            $('.countHistory').val(0);
        }
        $('#loginModal').modal();
        //$('.fancybox').fancybox();
    });
    $('.registerNowPopup').on('click', function (e) {
        e.preventDefault();
        $('#loginModal').modal('hide');
        $('#forgetPassModalModal').modal('hide');
        $('#registerModal').modal();
        //$('.fancybox').fancybox();
    });
    $('.forgetPassPopup').on('click', function (e) {
        e.preventDefault();
        $('#loginModal').modal('hide');
        $('#registerModal').modal('hide');
        $('#forgetPassModal').modal();
        //$('.fancybox').fancybox();
    });

    $('#login').on('click', function (e) {
        e.preventDefault();
        var email = $('#log_email').val();
        var password = $('#log_password').val();
        if (email == '') {
            $('#log_email').focus();
        } else if (password == '') {
            $('#log_password').focus();
        } else {

            $.ajax({
                url: "<?php echo URL::to('/'); ?>" + "/userLogin",
                type: "POST",
                data: {
                    email: email,
                    password: password
                },
                success: function (result) {
                    if (result.status.hasUid == true) {
                        generate('warning', 'center', 'You are Already Logged In');
                        setTimeout(function () {
                            window.location = "<?php echo URL::to('/'); ?>";
                        }, 3000);
                    } else {
                        if (result.status.islogin == true) {
                            generate('success', 'center', 'Login Successful! You are redirecting...');
                            setTimeout(function () {
                                window.location = "<?php echo URL::to('/'); ?>";
                            }, 3000);
                        } else {
                            generate('error', 'center', result.response);
                        }
                    }
                }
            });
        }
    });

    $('#register').on('click', function (e) {
        e.preventDefault();
        var email = $('#regi_email').val();
        var nickname = $('#nickname').val();
        var password = $('#regi_password').val();
        var password_confirm = $('#password_confirm').val();
        if (nickname == '') {
            $('#nickname').focus();
        } else if (email == '') {
            $('#regi_email').focus();
        } else if (password == '') {
            $('#regi_password').focus();
        } else if (password_confirm == '') {
            $('#password_confirm').focus();
        } else {
            $.ajax({
                url: "<?php echo URL::to('/'); ?>" + "/userRegister",
                type: "POST",
                data: {
                    email: email,
                    nickname: nickname,
                    password: password,
                    password_confirm: password_confirm
                },
                success: function (result) {
                    if (result.user_created) {
                        generate('success', 'center', 'Registration Successful! You are redirecting...');
                        setTimeout(function () {
                            window.location = "<?php echo URL::to('/'); ?>";
                        }, 3000);
                    } else {
                        if (result.message.email) {
                            generate('error', 'center', result.message.email);
                            $('#regi_email').focus();
                        } else if (result.message.password) {
                            generate('error', 'center', result.message.password);
                            $('#regi_password').focus();
                        } else if (result.message.password_confirm) {
                            generate('error', 'center', result.message.password_confirm);
                            $('#password_confirm').focus();
                        }
                    }
                }
            });
        }
    });
    $('#emailSub').on('click', function (e) {
        e.preventDefault();
        var email = $('#userEmail').val();
        if (email == '') {
            $('#userEmail').focus();

        } else {
            $.ajax({
                url: "<?php echo URL::to('/'); ?>" + "/forgotPassword",
                type: "POST",
                data: {
                    email: email

                },
                success: function (result) {
                    if (result == "yes") {
                        generate('success', 'center', 'Email sent -- Please check your inbox');
                    } else {
                        generate('error', 'center', 'Email does not found');
                    }
                }

            });
        }

    });

    $(".not_now").on("click", function () {
        var user = "test";
        setCookie("newsletter", user, 7);
    });
    $(".dont_show").on("click", function () {
        var user = "test";
        setCookie("newsletter", user, 365);
    });
    $(".submit_news_email").on("click", function () {
        var email = $("#news_email").val();
        if (email.trim() == "") {
            $("#news_email").focus();
        } else {
            $.ajax({
                url: "<?php echo URL::to('/'); ?>" + "/newsletterRegister",
                type: "POST",
                data: {
                    email: email,
                },
                success: function (result) {
                    generate('success', 'center', "Thanks for submit the email");
                    var user = "test";
                    setCookie("newsletter", user, 365);
                    $("#welcomeModal").modal("hide");
                }
            });
        }

    });

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toGMTString();
        document.cookie = cname + "=" + cvalue + "; " + expires;
    }

    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ')
                c = c.substring(1);
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
    function checkCookie() {
        var user = getCookie("newsletter");
        if (user != "") {
            //setCookie("newsletter", user, -30);
        } else {
            $("#welcomeModal").modal();
//            user = "test";
////            if (user != "" && user != null) {
//                setCookie("newsletter", user, -30);
////            }
        }
    }
    $body.on('click', ".close-size", function () {
        $("#sizeModal").modal("hide");
    });
    $body.on('click', ".get-ios", function () {
        var url = "";
        window.open(url, '_blank');
    });
    $body.on('click', ".get-android", function () {
        var url = "https://play.google.com/store/apps/details?id=com.workspace.yolove";
        window.open(url, '_blank');
    });
    $body.on('click', ".btn-unavailable", function () {
        generateTimeOut('error', 'center', 'This Item is currently unavailable', 3000);
    });
    $body.on('click', '#storeProductsInfo', function () {
        var id = $(this).attr('data-store');
        $.ajax({
            url: "<?php echo URL::to('/'); ?>" + "/storeProductInfoDisplay",
            type: "POST",
            data: {id: id},
            success: function (result) {
                $('#storeItemDetails').html(result);
                $('#showStoreDetails').modal();
            }

        })

    });
    $body.on('click', ".gotoCountry", function () {
        var url = $(this).attr('data-url');
        window.location = url;
    });
    $body.on('click','.deleteComment', function () {
        var comment_id = $(this).attr('data-id');
        //var $this = $(this);
        var total_comment = $('.row').find('.comment-header').attr('data-count');
        //var total_comment = $(this).parent().parent().parent().parent().parent().parent().parent().find('.comment-header').attr('data-count');
        noty({
            text: 'Are You Sure Want To Delete This Comment?',
            type: 'information',
            dismissQueue: true,
            layout: 'center',
            theme: 'defaultTheme',
            buttons: [
                {addClass: 'btn btn-primary', text: 'Ok', onClick: function ($noty) {
                        $noty.close();
                        $.ajax({
                            url: "<?php echo URL::to('/'); ?>" + "/deleteComment",
                            type: "POST", data: {
                                comment_id: comment_id
                            },
                            success: function (result) {
                                noty({dismissQueue: true, force: true, layout: 'center', theme: 'defaultTheme', text: 'Comment Has been deleted', type: 'success',timeout: 3000});
                                $("#comment_" + comment_id).css('display', 'none');
                                total_comment = parseInt(total_comment)-1;
                                $('.row').find('.comment-header').attr('data-count',total_comment);
                                $('.row').find('.comment-header').html(total_comment + ' Comments');
                                //$this.parent().parent().parent().parent().parent().parent().parent().find('.comment-header').attr('data-count',total_comment);
                                //$this.parent().parent().parent().parent().parent().parent().parent().find('.comment-header').html(total_comment + ' Comments');
                            }
                        });
                    }

                },
                {addClass: 'btn btn-width-love', text: 'Cancel', onClick: function ($noty) {
                        $noty.close();
                        // noty({dismissQueue: true, force: true, layout: 'center', theme: 'defaultTheme', text: 'You clicked "Cancel" button', type: 'error'});
                    }
                }

            ]
        });
    });

</script>