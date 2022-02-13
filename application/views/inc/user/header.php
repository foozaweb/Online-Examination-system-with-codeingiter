<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
        
        <!-- Title -->
        <title>Blw Campus Ministry | Fitness for Duty | Exam Portal</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Blw Campus Ministry" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url("public/plugins/materialize/css/materialize.min.css");?>"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		
        <link href="<?php echo base_url("public/plugins/metrojs/MetroJs.min.css");?>" rel="stylesheet">
        <link href="<?php echo base_url("public/plugins/weather-icons-master/css/weather-icons.min.css");?>" rel="stylesheet">
        <link href="<?php echo base_url("public/plugins/material-preloader/css/materialPreloader.min.css");?>" rel="stylesheet">
        <link href="<?php echo base_url("public/plugins/vertical-timeline/css/style.css");?>" rel="stylesheet">
        <link href="<?php echo base_url("public/plugins/clock/css/analog.css");?>" rel="stylesheet">
        <link href="<?php echo base_url("public/plugins/countdown/css/jquery.countdown.css");?>" rel="stylesheet">
		<link href="<?php echo base_url("public/plugins/google-code-prettify/prettify.css");?>" rel="stylesheet" type="text/css"/>    
        <link href="<?php echo base_url("public/plugins/sweetalert/sweetalert.css");?>" rel="stylesheet" type="text/css"/>         

        <!-- Theme Styles -->
        <link href="<?php echo base_url("public/css/beta.css");?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url("public/css/custom.css");?>" rel="stylesheet" type="text/css"/>
        
        <script src="<?php echo base_url("public/plugins/vertical-timeline/js/modernizr.js");?>"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body>
	
        <div class="loader-bg"></div>
        <div class="loader">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-teal lighten-1">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mn-content fixed-sidebar">
            <header class="mn-header navbar-fixed">
                <nav class="black darken-1">
                    <div class="nav-wrapper row">
                        <section class="material-design-hamburger navigation-toggle">
                            <a href="javascript:void(0)" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                                <span class="material-design-hamburger__layer"></span>
                            </a>
                        </section>
                        <div class="header-title col s10 m6">      
                            <span class="chapter-title">Exam Portal</span>
                        </div>
                        
                        <ul class="right col s2 m6 nav-right-menu">
                            <li><a href="<?php echo base_url("index.php/user/signout");?>" Title="Sign Out"><i class="material-icons">exit_to_app</i></a></li>
                       </ul>
                    </div>
                </nav>
            </header>
			
            
                      
            <aside id="slide-out" class="side-nav white fixed">
                <div class="side-nav-wrapper">
                    <div class="sidebar-profile">
                        <div class="sidebar-profile-image">
                            <img src="<?php echo base_url("public/images/av.png");?>" class="circle" alt="">
                        </div>
                        <div class="sidebar-profile-info">
                            <a href="javascript:void(0);" class="account-settings-link">
							<?php
							$query = $this->db->get_where('data_capture', array('dc_id' => $this->session->user_id));
							$real = $query->row();
							?>
                                <p><?php echo $real->name;?></p>
								<span><?php echo str_replace('-', ' ', $real->chapter);?></span>
                            </a>
                        </div>
                    </div>
                    <div class="">
                        <ul>
                            <li class="no-padding">
                                <a href="<?php echo base_url();?>" class="waves-effect waves-grey"><i class="material-icons">settings_input_svideo</i>Dashboard</a>
                            </li>
                            <!-- <li class="no-padding">
                                <a class="waves-effect waves-grey" href="<?php //echo base_url("index.php/user/profile");?>"><i class="material-icons">perm_identity</i>Profile</a>
                            </li> -->
                            <li class="no-padding">
                                <a class="waves-effect waves-grey" href="<?php echo base_url("index.php/user/history");?>"><i class="material-icons">info</i>History</a>
                            </li>
                            
							<!-- <li class="no-padding">
                                <a class="waves-effect waves-grey" href="<?php //echo base_url("index.php/user/security");?>"><i class="material-icons">lock</i>Security</a>
                            </li> -->
                            <li class="divider"></li>
                            <li class="no-padding">
                                <a class="waves-effect waves-grey" href="<?php echo base_url("index.php/user/signout");?>"><i class="material-icons">exit_to_app</i>Sign Out</a>
                            </li>


                            <li class="no-padding">
                                <a href="https://blwcampusministry.net/fitnessforduty/index.php/home/index/options" class="waves-effect waves-grey"><i class="material-icons">lock</i>Go Back</a>
                            </li>
                        </ul>
                    </div>
                <div class="footer">
                    <p class="copyright">&copy; Blw Campus Ministry</p>
                </div>
                </div>
            </aside>