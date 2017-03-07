<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Yolove.it::<?php echo ucfirst($this->params['controller']); ?></title>		
        <meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!--basic styles-->

        <link href="<?php echo $this->webroot; ?>app/webroot/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo $this->webroot; ?>app/webroot/assets/css/modify.css" rel="stylesheet" />
        <link href="<?php echo $this->webroot; ?>app/webroot/assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo $this->webroot; ?>app/webroot/assets/css/font-awesome.min.css" />

        <!--[if IE 7]>
          <link rel="stylesheet" href="<?php echo $this->webroot; ?>app/webroot/assets/css/font-awesome-ie7.min.css" />
        <![endif]-->

        <!--page specific plugin styles-->

        <!--fonts-->

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

        <!--ace styles-->
        <link rel="stylesheet" href="<?php echo $this->webroot; ?>app/webroot/assets/css/datepicker.css" />
        <link rel="stylesheet" href="<?php echo $this->webroot; ?>app/webroot/assets/css/ace.min.css" />
        <link rel="stylesheet" href="<?php echo $this->webroot; ?>app/webroot/assets/css/ace-responsive.min.css" />
        <link rel="stylesheet" href="<?php echo $this->webroot; ?>app/webroot/assets/css/ace-skins.min.css" />
        <link rel="stylesheet" href="<?php echo $this->webroot; ?>app/webroot/assets/css/colorbox.css" />
        <link rel="stylesheet" href="<?php echo $this->webroot; ?>app/webroot/assets/css/featherlight.css" />
        <link rel="stylesheet" href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/v4.0.0/build/css/bootstrap-datetimepicker.css">

        <!--[if lte IE 8]>
          <link rel="stylesheet" href="<?php echo $this->webroot; ?>app/webroot/assets/css/ace-ie.min.css" />
        <![endif]-->

        <!--inline styles related to this page-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <!--basic scripts-->

        <!--[if !IE]>-->

<!-- 		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> -->

        <!--<![endif]-->

        <!--[if IE]>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <![endif]-->

        <!--[if !IE]>-->

        <script type="text/javascript">
            window.jQuery || document.write("<script src='<?php echo $this->webroot; ?>app/webroot/assets/js/jquery-2.0.3.min.js'>" + "<" + "/script>");
        </script>
        <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/v4.0.0/src/js/bootstrap-datetimepicker.js"></script>
        <!--<![endif]-->

        <!--[if IE]>
            <script type="text/javascript">
                window.jQuery || document.write("<script src='<?php echo $this->webroot; ?>app/webroot/assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
            </script>
        <![endif]-->

        <script type="text/javascript">
            if ("ontouchend" in document)
                document.write("<script src='<?php echo $this->webroot; ?>app/webroot/assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>
        <script src="<?php echo $this->webroot; ?>app/webroot/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo $this->webroot; ?>app/webroot/assets/js/jquery.colorbox-min.js"></script>
        <script src="<?php echo $this->webroot; ?>app/webroot/assets/js/featherlight.min.js"></script>


        <!--page specific plugin scripts-->

        <!--[if lte IE 8]>
          <script src="assets/js/excanvas.min.js"></script>
        <![endif]-->

        <script src="<?php echo $this->webroot; ?>app/webroot/assets/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="<?php echo $this->webroot; ?>app/webroot/assets/js/jquery.ui.touch-punch.min.js"></script>
        <script src="<?php echo $this->webroot; ?>app/webroot/assets/js/jquery.slimscroll.min.js"></script>
        <script src="<?php echo $this->webroot; ?>app/webroot/assets/js/bootstrap-datepicker.min.js"></script>


        <!--ace scripts-->

        <script src="<?php echo $this->webroot; ?>app/webroot/assets/js/ace-elements.min.js"></script>
        <script src="<?php echo $this->webroot; ?>app/webroot/assets/js/ace.min.js"></script>
    </head>
    <body>	
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a href="<?php echo $this->webroot; ?>" class="brand">
                        <small>
                            <i class="icon-leaf"></i>
                            Yolove.it
                        </small>
                    </a><!--/.brand-->

                    <ul class="nav ace-nav pull-right">	
                        <li class="light-blue">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <?php
                                $user = $this->Session->read('User');
                    $a = "uploads/attachments/avatar/" . $user['User']['nickname'] . "/" . $user['User']['id'] . "_" . md5($user['User']['email']) . ".jpg" . "";
                    if (file_exists($apiPath . $a)) {
                        ?><img class="nav-user-photo" src="<?php echo $apiUrl.$a; ?>" alt="Jason's Photo" />
                        <?php } else { ?>
                        <img class="nav-user-photo" src="<?php echo $this->webroot; ?>assets/avatars/user.jpg" alt="Jason's Photo" />
                        <?php } ?>
                                <span class="user-info">
                                    <small>Welcome,</small>
                                    <?php
                                    $user = $this->Session->read('SgUser');
                                    echo $user['User']['nickname'];
                                    ?>
                                </span>

                                <i class="icon-caret-down"></i>
                            </a>

                            <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">

                                <li>
                                    <a href="<?php echo $this->webroot . "users/changePassword"; ?>">
                                        <i class="icon-user"></i>Change password
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->webroot . "users/editprofile"; ?>">
                                        <i class="icon-cog"></i>Profile
                                    </a>
                                </li>

                                <li class="divider"></li>

                                <li>
                                    <a href="<?php echo $this->webroot ?>index/logout">
                                        <i class="icon-off"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul><!--/.ace-nav-->
                </div><!--/.container-fluid-->
            </div><!--/.navbar-inner-->
        </div>

        <div class="main-container container-fluid">
            <a class="menu-toggler" id="menu-toggler" href="#">
                <span class="menu-text"></span>
            </a>

            <div class="sidebar" id="sidebar">
                <?php /* ?>
                  <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                  <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                  <button class="btn btn-small btn-success">
                  <i class="icon-signal"></i>
                  </button>

                  <button class="btn btn-small btn-info">
                  <i class="icon-pencil"></i>
                  </button>

                  <button class="btn btn-small btn-warning">
                  <i class="icon-group"></i>
                  </button>

                  <button class="btn btn-small btn-danger">
                  <i class="icon-cogs"></i>
                  </button>
                  </div>

                  <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                  <span class="btn btn-success"></span>

                  <span class="btn btn-info"></span>

                  <span class="btn btn-warning"></span>

                  <span class="btn btn-danger"></span>
                  </div>
                  </div><!--#sidebar-shortcuts-->
                  <?php */ ?>

                <ul class="nav nav-list">
                    <?php
                    $navController = $this->params['controller'];
                    $navAction = $this->params['action'];
                    $url = $_SERVER['REQUEST_URI'];
//                    echo $url."<br/>";
//                    echo $this->webroot . 'Settings/siteInfo'."<br/>";
//                    echo $navAction."<br/>";
//                    echo $navController."<br/>";
                    ?>

                    <li class="<?php if (
                            $url == $this->webroot || 
                            $url == $this->webroot . 'Settings/siteInfo' || 
                            $url == $this->webroot . 'Settings/emailSetting'
                            ) { ?>active<?php } ?>">
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-th"></i>
                            <span class="menu-text"> Basic </span>
                            <b class="arrow icon-angle-down"></b>
                        </a>
                        <ul class="submenu">
                            <li class="<?php if ($url == $this->webroot || $url == $this->webroot . 'Settings/siteInfo') { ?>active<?php } ?>">
                                <a href="<?php echo $this->webroot . 'Settings/siteInfo'; ?>">
                                    <i class="icon-double-angle-right"></i>
                                    Site Info
                                </a>
                            </li>
                            <li class="<?php if ($url == $this->webroot . 'Settings/emailSetting') { ?>active<?php } ?>">
                                <a href="<?php echo $this->webroot . 'Settings/emailSetting'; ?>">
                                    <i class="icon-double-angle-right"></i>
                                    Email Setting
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="<?php if (
                            $url == $this->webroot . 'Users/index/100' || 
                            $url == $this->webroot . 'Users/index/50' || 
                            $url == $this->webroot . 'Users/index/25' || 
                            $url == $this->webroot . 'Users/index/10' || 
                            $this->params['action'] == 'manageStar' || 
                            $url == $this->webroot . 'Users' || 
                            $url == $this->webroot . 'Users/add' || 
                            $url == $this->webroot . 'Users/manageStar'
                            ) { ?>active<?php } ?>">
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-user"></i>
                            <span class="menu-text"> Users </span>
                            <b class="arrow icon-angle-down"></b>
                        </a>
                        <ul class="submenu">
                            <li class="<?php if (
                                    $url == $this->webroot . 'Users' || 
                                    $url == $this->webroot . 'Users/index/100' || 
                                    $url == $this->webroot . 'Users/index/50' || 
                                    $url == $this->webroot . 'Users/index/25' || 
                                    $url == $this->webroot . 'Users/index/10' || 
                                    $url == $this->webroot . 'Users/index'
                                    ) { ?>active<?php } ?>">
                                <a href="<?php echo $this->webroot . 'Users'; ?>">
                                    <i class="icon-double-angle-right"></i>
                                    Manage Users
                                </a>
                            </li>
                            <li class="<?php if ($url == $this->webroot . 'Users/add') { ?>active<?php } ?>">
                                <a href="<?php echo $this->webroot . 'Users/add'; ?>">
                                    <i class="icon-double-angle-right"></i>
                                    Add Users
                                </a>
                            </li>
                            <li class="<?php if (
                                    $this->params['action'] == 'manageStar' || 
                                    $url == $this->webroot . 'Users/manageStar'
                                    ) { ?>active<?php } ?>">
                                <a href="<?php echo $this->webroot . 'Users/manageStar'; ?>">
                                    <i class="icon-double-angle-right"></i>
                                    Manage Star User
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="<?php if (
                            $url == $this->webroot . 'Users/userGroups/system' ||
                            $url == $this->webroot . 'Users/userGroups/member' ||
                            $url == $this->webroot . 'Users/userGroups' || 
                            $url == $this->webroot . 'Users/addUsergroup'
                            ) { ?>active<?php } ?>">
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-group"></i>
                            <span class="menu-text"> Users Group </span>
                            <b class="arrow icon-angle-down"></b>
                        </a>
                        <ul class="submenu">
                            <li class="<?php if ($url == $this->webroot . 'Users/userGroups') { ?>active<?php } ?>">
                                <a href="<?php echo $this->webroot . 'Users/userGroups'; ?>">
                                    <i class="icon-double-angle-right"></i>
                                    Manage User Group
                                </a>
                            </li>
                            <li class="<?php if ($url == $this->webroot . 'Users/addUsergroup') { ?>active<?php } ?>">
                                <a href="<?php echo $this->webroot . 'Users/addUsergroup'; ?>">
                                    <i class="icon-double-angle-right"></i>
                                    Add User Group
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="<?php if ($url == $this->webroot . 'Settings') { ?>active<?php } ?>">
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-text-width"></i>
                            <span class="menu-text"> Operations </span>
                            <b class="arrow icon-angle-down"></b>
                        </a>
                        <ul class="submenu">
                            <li class="<?php if ($url == $this->webroot . 'Settings') { ?>active<?php } ?>">
                                <a href="<?php echo $this->webroot . 'Settings'; ?>">
                                    <i class="icon-double-angle-right"></i>
                                    API Setting
                                </a>
                            </li>
                        </ul>
                    </li>                    


                    <li class="<?php if (
                            $url == $this->webroot . 'Albums/index/100' || 
                            $url == $this->webroot . 'Albums/index/50' || 
                            $url == $this->webroot . 'Albums/index/25' || 
                            $url == $this->webroot . 'Albums/index/10' || 
                            $url == $this->webroot . 'Albums' || 
                            $url == $this->webroot . 'Albums/add'
                            ) { ?>active<?php } ?>">
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-picture"></i>
                            <span class="menu-text"> Albums </span>
                            <b class="arrow icon-angle-down"></b>
                        </a>
                        <ul class="submenu">
                            <li class="<?php if (
                                    $url == $this->webroot . 'Albums/index/100' || 
                                    $url == $this->webroot . 'Albums/index/50' || 
                                    $url == $this->webroot . 'Albums/index/25' || 
                                    $url == $this->webroot . 'Albums/index/10' || 
                                    $url == $this->webroot . 'Albums/index' || 
                                    $url == $this->webroot . 'Albums'
                                    ) { ?>active<?php } ?>">
                                <a href="<?php echo $this->webroot . 'Albums'; ?>">
                                    <i class="icon-double-angle-right"></i>
                                    Manage Album
                                </a>
                            </li>
                            <li class="<?php if ($url == $this->webroot . 'Albums/add') { ?>active<?php } ?>">
                                <a href="<?php echo $this->webroot . 'Albums/add'; ?>">
                                    <i class="icon-double-angle-right"></i>
                                    Add Album
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="<?php if (
                            $url == $this->webroot . 'Shares/index/100' || 
                            $url == $this->webroot . 'Shares/index/50' || 
                            $url == $this->webroot . 'Shares/index/25' || 
                            $url == $this->webroot . 'Shares/index/10' || 
                            $url == $this->webroot . 'Shares/index' || 
                            $url == $this->webroot . 'Shares'
                            ) { ?>active<?php } ?>">
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-plus"></i>
                            <span class="menu-text"> Shares </span>
                            <b class="arrow icon-angle-down"></b>
                        </a>
                        <ul class="submenu">
                            <li class="<?php if (
                                    $url == $this->webroot . 'Shares/index/100' || 
                                    $url == $this->webroot . 'Shares/index/50' || 
                                    $url == $this->webroot . 'Shares/index/25' || 
                                    $url == $this->webroot . 'Shares/index/10' || 
                                    $url == $this->webroot . 'Shares/index' || 
                                    $url == $this->webroot . 'Shares'
                                    ) { ?>active<?php } ?>">
                                <a href="<?php echo $this->webroot . 'Shares'; ?>">
                                    <i class="icon-double-angle-right"></i>
                                    Manage Shares
                                </a>
                            </li>							
                        </ul>
                    </li>


                    <li class="<?php if (
                            $url == $this->webroot . 'Categories/index/100' || 
                            $url == $this->webroot . 'Categories/index/50' || 
                            $url == $this->webroot . 'Categories/index/25' || 
                            $url == $this->webroot . 'Categories/index/10' || 
                            $url == $this->webroot . 'Categories/index' || 
                            $url == $this->webroot . 'Categories' || 
                            $url == $this->webroot . 'Categories/add'
                            ) { ?>active<?php } ?>">
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-list"></i>
                            <span class="menu-text"> Categories </span>
                            <b class="arrow icon-angle-down"></b>
                        </a>
                        <ul class="submenu">
                            <li class="<?php if (
                                    $url == $this->webroot . 'Categories/index/100' || 
                                    $url == $this->webroot . 'Categories/index/50' || 
                                    $url == $this->webroot . 'Categories/index/25' || 
                                    $url == $this->webroot . 'Categories/index/10' || 
                                    $url == $this->webroot . 'Categories/index' || 
                                    $url == $this->webroot . 'Categories'
                                    ) { ?>active<?php } ?>">
                                <a href="<?php echo $this->webroot . 'Categories'; ?>">
                                    <i class="icon-double-angle-right"></i>
                                    Manage Categories
                                </a>
                            </li>
                            <li class="<?php if ($url == $this->webroot . 'Categories/add') { ?>active<?php } ?>">
                                <a href="<?php echo $this->webroot . 'Categories/add'; ?>">
                                    <i class="icon-double-angle-right"></i>
                                    Add Categories
                                </a>
                            </li>							
                        </ul>
                    </li>


                    <li class="<?php if (
                            $url == $this->webroot . 'Stores/index/100' || 
                            $url == $this->webroot . 'Stores/index/50' || 
                            $url == $this->webroot . 'Stores/index/25' || 
                            $url == $this->webroot . 'Stores/index/10' || 
                            $url == $this->webroot . 'Stores/index' || 
                            $url == $this->webroot . 'Stores'
                            ) { ?>active<?php } ?>">
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-home"></i>
                            <span class="menu-text"> Stores </span>
                            <b class="arrow icon-angle-down"></b>
                        </a>
                        <ul class="submenu">
                            <li class="<?php if (
                                    $url == $this->webroot . 'Stores/index/100' || 
                                    $url == $this->webroot . 'Stores/index/50' || 
                                    $url == $this->webroot . 'Stores/index/25' || 
                                    $url == $this->webroot . 'Stores/index/10' || 
                                    $url == $this->webroot . 'Stores/index' || 
                                    $url == $this->webroot . 'Stores'
                                    ) { ?>active<?php } ?>">
                                <a href="<?php echo $this->webroot . 'Stores'; ?>">
                                    <i class="icon-double-angle-right"></i>
                                    Manage Stores
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="<?php
                    if (
                            $url == $this->webroot . 'ShippingInfos/complete/100' ||
                            $url == $this->webroot . 'ShippingInfos/complete/50' ||
                            $url == $this->webroot . 'ShippingInfos/complete/25' ||
                            $url == $this->webroot . 'ShippingInfos/complete/10' ||
                            $url == $this->webroot . 'ShippingInfos/complete' ||
                            $url == $this->webroot . 'ShippingInfos/follow_up/100' ||
                            $url == $this->webroot . 'ShippingInfos/follow_up/50' ||
                            $url == $this->webroot . 'ShippingInfos/follow_up/25' ||
                            $url == $this->webroot . 'ShippingInfos/follow_up/10' ||
                            $url == $this->webroot . 'ShippingInfos/follow_up' ||
                            $url == $this->webroot . 'ShippingInfos/unpaid/100' ||
                            $url == $this->webroot . 'ShippingInfos/unpaid/50' ||
                            $url == $this->webroot . 'ShippingInfos/unpaid/25' ||
                            $url == $this->webroot . 'ShippingInfos/unpaid/10' ||
                            $url == $this->webroot . 'ShippingInfos/unpaid' ||
                            $url == $this->webroot . 'ShippingInfos/paid/100' ||
                            $url == $this->webroot . 'ShippingInfos/paid/50' ||
                            $url == $this->webroot . 'ShippingInfos/paid/25' ||
                            $url == $this->webroot . 'ShippingInfos/paid/10' ||
                            $url == $this->webroot . 'ShippingInfos/paid' ||
                            $url == $this->webroot . 'ShippingInfos/index/100' ||
                            $url == $this->webroot . 'ShippingInfos/index/50' ||
                            $url == $this->webroot . 'ShippingInfos/index/25' ||
                            $url == $this->webroot . 'ShippingInfos/index/10' ||
                            $url == $this->webroot . 'ShippingInfos/index' ||
                            $url == $this->webroot . 'ShippingInfos' ||
                            $url == $this->webroot . 'ShippingInfos/paid' ||
                            $url == $this->webroot . 'ShippingInfos/unpaid' ||
                            $url == $this->webroot . 'ShippingInfos/follow_up' ||
                            $url == $this->webroot . 'ShippingInfos/complete') {
                        ?>active<?php } ?>">
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-shopping-cart"></i>
                            <span class="menu-text"> Shopping Cart </span>
                            <b class="arrow icon-angle-down"></b>
                        </a>
                        <ul class="submenu">
                            <li class="<?php
                            if (
                                    $url == $this->webroot . 'ShippingInfos/index/100' ||
                                    $url == $this->webroot . 'ShippingInfos/index/50' ||
                                    $url == $this->webroot . 'ShippingInfos/index/25' ||
                                    $url == $this->webroot . 'ShippingInfos/index/10' ||
                                    $url == $this->webroot . 'ShippingInfos/index' ||
                                    $url == $this->webroot . 'ShippingInfos') {
                                ?>active<?php } ?>">
                                <a href="<?php echo $this->webroot . 'ShippingInfos'; ?>">
                                    <i class="icon-double-angle-right"></i>
                                    New Cart
                                </a>
                            </li>
                            <li class="<?php
                            if (
                                    $url == $this->webroot . 'ShippingInfos/paid/100' ||
                                    $url == $this->webroot . 'ShippingInfos/paid/50' ||
                                    $url == $this->webroot . 'ShippingInfos/paid/25' ||
                                    $url == $this->webroot . 'ShippingInfos/paid/10' ||
                                    $url == $this->webroot . 'ShippingInfos/paid' ||
                                    $url == $this->webroot . 'ShippingInfos/paid') {
                                ?>active<?php } ?>">
                                <a href="<?php echo $this->webroot . 'ShippingInfos/paid'; ?>">
                                    <i class="icon-double-angle-right"></i>
                                    Paid Cart
                                </a>
                            </li>
                            <li class="<?php
                            if (
                                    $url == $this->webroot . 'ShippingInfos/unpaid/100' ||
                                    $url == $this->webroot . 'ShippingInfos/unpaid/50' ||
                                    $url == $this->webroot . 'ShippingInfos/unpaid/25' ||
                                    $url == $this->webroot . 'ShippingInfos/unpaid/10' ||
                                    $url == $this->webroot . 'ShippingInfos/unpaid' ||
                                    $url == $this->webroot . 'ShippingInfos/unpaid') {
                                ?>active<?php } ?>">
                                <a href="<?php echo $this->webroot . 'ShippingInfos/unpaid'; ?>">
                                    <i class="icon-double-angle-right"></i>
                                    Unpaid Cart
                                </a>
                            </li>
                            <li class="<?php
                            if (
                                    $url == $this->webroot . 'ShippingInfos/follow_up/100' ||
                                    $url == $this->webroot . 'ShippingInfos/follow_up/50' ||
                                    $url == $this->webroot . 'ShippingInfos/follow_up/25' ||
                                    $url == $this->webroot . 'ShippingInfos/follow_up/10' ||
                                    $url == $this->webroot . 'ShippingInfos/follow_up' ||
                                    $url == $this->webroot . 'ShippingInfos/follow_up') {
                                ?>active<?php } ?>">
                                <a href="<?php echo $this->webroot . 'ShippingInfos/follow_up'; ?>">
                                    <i class="icon-double-angle-right"></i>
                                    Follow Up Cart
                                </a>
                            </li>
                            <li class="<?php
                            if (
                                    $url == $this->webroot . 'ShippingInfos/complete/100' ||
                                    $url == $this->webroot . 'ShippingInfos/complete/50' ||
                                    $url == $this->webroot . 'ShippingInfos/complete/25' ||
                                    $url == $this->webroot . 'ShippingInfos/complete/10' ||
                                    $url == $this->webroot . 'ShippingInfos/complete' ||
                                    $url == $this->webroot . 'ShippingInfos/complete') {
                                ?>active<?php } ?>">
                                <a href="<?php echo $this->webroot . 'ShippingInfos/complete'; ?>">
                                    <i class="icon-double-angle-right"></i>
                                    Complete Cart
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="<?php if (
                            $url == $this->webroot . 'Coupons/index/100' || 
                            $url == $this->webroot . 'Coupons/index/50' || 
                            $url == $this->webroot . 'Coupons/index/25' || 
                            $url == $this->webroot . 'Coupons/index/10' || 
                            $url == $this->webroot . 'Coupons/index' || 
                            $url == $this->webroot . 'Coupons' || 
                            $url == $this->webroot . 'Coupons/add'
                            ) { ?>active<?php } ?>">
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-list-alt"></i>
                            <span class="menu-text"> Coupons </span>
                            <b class="arrow icon-angle-down"></b>
                        </a>
                        <ul class="submenu">
                            <li class="<?php if (
                                    $url == $this->webroot . 'Coupons/index/100' || 
                                    $url == $this->webroot . 'Coupons/index/50' || 
                                    $url == $this->webroot . 'Coupons/index/25' || 
                                    $url == $this->webroot . 'Coupons/index/10' || 
                                    $url == $this->webroot . 'Coupons/index' || 
                                    $url == $this->webroot . 'Coupons'
                                    ) { ?>active<?php } ?>">
                                <a href="<?php echo $this->webroot . 'Coupons'; ?>">
                                    <i class="icon-double-angle-right"></i>
                                    Manage Coupons
                                </a>
                            </li>
                            <li class="<?php if ($url == $this->webroot . 'Coupons/add') { ?>active<?php } ?>">
                                <a href="<?php echo $this->webroot . 'Coupons/add'; ?>">
                                    <i class="icon-double-angle-right"></i>
                                    Add Coupons
                                </a>
                            </li>							
                        </ul>
                    </li>




                    <li class="<?php if (
                            $url == $this->webroot . 'Smiles/index/100' || 
                            $url == $this->webroot . 'Smiles/index/50' || 
                            $url == $this->webroot . 'Smiles/index/25' || 
                            $url == $this->webroot . 'Smiles/index/10' || 
                            $url == $this->webroot . 'Smiles/index' || 
                            $url == $this->webroot . 'Smiles' || 
                            $url == $this->webroot . 'Smiles/add'
                            ) { ?>active<?php } ?>">
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-heart"></i>
                            <span class="menu-text"> Smiles </span>
                            <b class="arrow icon-angle-down"></b>
                        </a>
                        <ul class="submenu">
                            <li class="<?php if (
                                    $url == $this->webroot . 'Smiles/index/100' || 
                                    $url == $this->webroot . 'Smiles/index/50' || 
                                    $url == $this->webroot . 'Smiles/index/25' || 
                                    $url == $this->webroot . 'Smiles/index/10' || 
                                    $url == $this->webroot . 'Smiles/index' || 
                                    $url == $this->webroot . 'Smiles'
                                    ) { ?>active<?php } ?>">
                                <a href="<?php echo $this->webroot . 'Smiles'; ?>">
                                    <i class="icon-double-angle-right"></i>
                                    Manage Smiles
                                </a>
                            </li>
                            <li class="<?php if ($url == $this->webroot . 'Smiles/add') { ?>active<?php } ?>">
                                <a href="<?php echo $this->webroot . 'Smiles/add'; ?>">
                                    <i class="icon-double-angle-right"></i>
                                    Add Smile
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="<?php if (
                            $url == $this->webroot . 'Tags/index/100' || 
                            $url == $this->webroot . 'Tags/index/50' || 
                            $url == $this->webroot . 'Tags/index/25' || 
                            $url == $this->webroot . 'Tags/index/10' || 
                            $url == $this->webroot . 'Tags/index' || 
                            $url == $this->webroot . 'Tags' || 
                            $url == $this->webroot . 'Tags/add'
                            ) { ?>active<?php } ?>">
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-tumblr-sign"></i>
                            <span class="menu-text"> Hashtag </span>
                            <b class="arrow icon-angle-down"></b>
                        </a>
                        <ul class="submenu">
                            <li class="<?php if (
                                    $url == $this->webroot . 'Tags/index/100' || 
                                    $url == $this->webroot . 'Tags/index/50' || 
                                    $url == $this->webroot . 'Tags/index/25' || 
                                    $url == $this->webroot . 'Tags/index/10' || 
                                    $url == $this->webroot . 'Tags/index' || 
                                    $url == $this->webroot . 'Tags'
                                    ) { ?>active<?php } ?>">
                                <a href="<?php echo $this->webroot . 'Tags'; ?>">
                                    <i class="icon-double-angle-right"></i>
                                    Manage Hashtag
                                </a>
                            </li>
                            <li class="<?php if ($url == $this->webroot . 'Tags/add') { ?>active<?php } ?>">
                                <a href="<?php echo $this->webroot . 'Tags/add'; ?>">
                                    <i class="icon-double-angle-right"></i>
                                    Add Hashtag
                                </a>
                            </li>							
                        </ul>
                    </li>



                    <?php /* ?>
                      <li class="<?php if($navController=='settings'){?>active<?php } ?>">
                      <a href="#" class="dropdown-toggle">
                      <i class="icon-dashboard"></i>
                      <span class="menu-text">Configuration Management</span>
                      <b class="arrow icon-angle-down"></b>
                      </a>
                      <ul class="submenu">
                      <li>
                      <a href="#">
                      <i class="icon-double-angle-right"></i>
                      Site Settings
                      </a>
                      </li>
                      </ul>
                      </li>
                      <?php */ ?>


                    <!-- <li>
                        <a href="#" class="dropdown-toggle">
                            <i class="icon-envelope"></i>
                            <span class="menu-text">Message Manage..</span>
                            <b class="arrow icon-angle-down"></b>
                        </a>
    
                        <ul class="submenu">
                            <li>
                                <a href="#">
                                    <i class="icon-double-angle-right"></i>
                                    Manage Messages
                                </a>
                            </li>
                        </ul>
                    </li> -->

                </ul><!--/.nav-list-->

                <div class="sidebar-collapse" id="sidebar-collapse">
                    <i class="icon-double-angle-left"></i>
                </div>
            </div>

            <div class="main-content">
                <?php if(
                        $this->params['action'] != 'editprofile' &&
                        $this->params['action'] != 'changePassword' && 
                        $this->params['action'] != 'emailSetting' &&
                        $this->params['controller'] != 'ShippingProducts' &&
                        $this->params['action'] != 'siteInfo'
                        ){ ?>
                <div class="breadcrumbs" id="breadcrumbs">
                    <ul class="breadcrumb">
<?php if (
        $this->params['action'] != 'emailSetting' &&
        $this->params['action'] != 'siteInfo' &&
        $this->params['action'] != 'changePassword' &&
        $this->params['action'] != 'editprofile' &&
        $this->params['action'] != 'editUsergroup' &&
        $url != $this->webroot . 'Users/userGroups' &&
        $url != $this->webroot . 'Users/addUsergroup' &&
        $url != $this->webroot . 'Users/userGroups/system' &&
        $url != $this->webroot . 'Users/userGroups/member'
        ) { ?>
                        <li>
                            <i class="icon-home home-icon"></i>
                            <a href="<?php echo $this->webroot . $this->params['controller']; ?>"><?php
                                    echo ucfirst($this->params['controller']);
//                            echo $_SERVER['REQUEST_URI'];
//                            echo $this->params['action'];
                                    ?></a>

                            <span class="divider">
                                <i class="icon-angle-right arrow-icon"></i>
                            </span>
                        </li>
                        <li class="active"><?php echo ucfirst($this->params['action']); ?></li>
<?php } else if($this->params['action'] == 'editUsergroup' || $url == $this->webroot . 'Users/userGroups' || $url == $this->webroot . 'Users/addUsergroup' || $url == $this->webroot . 'Users/userGroups/system' || $url == $this->webroot . 'Users/userGroups/member'){ ?>
                        <li>
                            <i class="icon-home home-icon"></i>
                            <a href="<?php echo $this->webroot . 'Users/userGroups'; ?>">User Group</a>

                            <span class="divider">
                                <i class="icon-angle-right arrow-icon"></i>
                            </span>
                        </li>
                            <?php if ($url == $this->webroot . 'Users/userGroups/system' || $url == $this->webroot . 'Users/userGroups') {
                                ?><li class="active">System Group</li><?php
                                } else if ($url == $this->webroot . 'Users/userGroups/member') {
//                                   echo $_SERVER['REQUEST_URI'];
                                    ?><li class="active">Member Group</li><?php
                                } else if ($this->params['action'] == 'editUsergroup') {
//                                   echo $_SERVER['REQUEST_URI'];
                                    ?><li class="active">Edit User Group</li><?php
                                }
                        ?>
<?php } ?>
                    </ul><!--.breadcrumb-->

                    <!--                    <div class="nav-search" id="nav-search">
                                            <form class="form-search" method="get" action="#">
                                                <span class="input-icon">
                                                    <input type="text" placeholder="Search ..." class="input-small nav-search-input" id="nav-search-input" autocomplete="off" />
                                                    <i class="icon-serch nav-search-icon"></i>
                                                </span>
                                            </form>
                                        </div>#nav-search-->
                </div>
<?php } ?>
                <div class="page-content">
<?php echo $this->fetch('content'); ?>					
                </div><!--/.page-content-->

            </div><!--/.main-content-->
        </div><!--/.main-container-->

        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
            <i class="icon-double-angle-up icon-only bigger-110"></i>
        </a>		

        <!--inline scripts related to this page-->

        <script type="text/javascript">
            $(function () {
                //$('#sample-table-2_length').find('select').val('<?php //echo $limits             ?>')

                $('.dialogs,.comments').slimScroll({
                    height: '300px'
                });



                //Android's default browser somehow is confused when tapping on label which will lead to dragging the task
                //so disable dragging when clicking on label
                var agent = navigator.userAgent.toLowerCase();
                if ("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
                    $('#tasks').on('touchstart', function (e) {
                        var li = $(e.target).closest('#tasks li');
                        if (li.length == 0)
                            return;
                        var label = li.find('label.inline').get(0);
                        if (label == e.target || $.contains(label, e.target))
                            e.stopImmediatePropagation();
                    });

                $('[data-rel=tooltip]').tooltip();

                $('.table_action').on('click', '.isBlock', function (e) {
                    e.preventDefault();

                    var $this = $(this),
                            st = $this.attr('data-original-title');
                    $.ajax({
                        url: $(this).attr('href'),
                        type: 'post',
                        success: function (d) {
                            if (st == 'Unblock') {
                                $this.attr('data-original-title', 'Block');
                                $this.removeClass('green');
                                $this.addClass('pink');
                                $this.find('i').removeClass('icon-unlock').addClass('icon-lock');
                            } else {
                                $this.attr('data-original-title', 'Unblock');
                                $this.removeClass('pink');
                                $this.addClass('green');
                                $this.find('i').removeClass('icon-lock').addClass('icon-unlock');
                            }
                        }
                    });
                });
            });
        </script>
    </body>
</html>
