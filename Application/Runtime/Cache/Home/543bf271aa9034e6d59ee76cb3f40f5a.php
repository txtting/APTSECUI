<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>APT安全威胁感知系统</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
         <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta http-equiv="cache-control" content="max-age=0" />
		<meta http-equiv="cache-control" content="no-cache" />
		<meta http-equiv="expires" content="0" />
		<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
		<meta http-equiv="pragma" content="no-cache" />

		 <!-- basic styles -->
         <link rel="stylesheet" href="/APTSecUI/Public/css/assets/css/bootstrap.min.css"  />
         <!--<link rel="stylesheet" href="/APTSecUI/Public/css/assets/css/bootstrap.css"  />-->
         <link rel="stylesheet" href="/APTSecUI/Public/css/assets/css/font-awesome.min.css" />
        <!--[if IE 7]>
          <link rel="stylesheet" href="/APTSecUI/Public/css/assets/css/font-awesome-ie7.min.css" />
        <![endif]-->

        <!-- page specific plugin styles -->
        <link rel="stylesheet" href="/APTSecUI/Public/css/assets/css/jquery-ui-1.10.3.custom.min.css" />
        <link rel="stylesheet" href="/APTSecUI/Public/css/assets/css/chosen.css" />
        <link rel="stylesheet" href="/APTSecUI/Public/css/assets/css/datepicker.css" />
        <link rel="stylesheet" href="/APTSecUI/Public/css/assets/css/bootstrap-timepicker.css" />
        <link rel="stylesheet" href="/APTSecUI/Public/css/bootstrap-duallistbox.css" />
        <link rel="stylesheet" href="/APTSecUI/Public/css/prettify.css" />

       <!-- <link rel="stylesheet" href="/APTSecUI/Public/css/assets/css/daterangepicker.css" /> -->
        <link rel="stylesheet" href="/APTSecUI/Public/css/assets/css/colorpicker.css" />

        <!-- fonts -->

        <link rel="stylesheet" href="/APTSecUI/Public/css/assets/css/ace-fonts.css" />

        <!-- ace styles -->

        <link rel="stylesheet" href="/APTSecUI/Public/css/assets/css/ace.min.css" />
        <link rel="stylesheet" href="/APTSecUI/Public/css/assets/css/ace-rtl.min.css" />
        <link rel="stylesheet" href="/APTSecUI/Public/css/assets/css/ace-skins.min.css" />
        <link rel="stylesheet" href="/APTSecUI/Public/css/assets/css/jquery.ipaddress.css" />
        <link rel="stylesheet" href="/APTSecUI/Public/css/daterangepicker-bs3.css" />
		<link rel="stylesheet" href="/APTSecUI/Public/css/assets/css/datetimepicker/datetimepicker.min.css" />





        <!--[if lte IE 8]>
          <link rel="stylesheet" href="/APTSecUI/Public/css/assets/css/ace-ie.min.css" />
        <![endif]-->

        <!-- inline styles related to this page -->


		<link href="/APTSecUI/Public/css/assets/style/common.css" rel="stylesheet">
        <link href="/APTSecUI/Public/css/assets/style/file.css" rel="stylesheet">


       <!-- <link type="text/css" rel="stylesheet" href="/APTSecUI/Public/css/assets/css/tree/font-awesome.min.css">-->
        <link type="text/css" rel="stylesheet" href="/APTSecUI/Public/css/assets/css/goal-thermometer/goal-thermometer.css">
        <link rel="stylesheet" href="/APTSecUI/Public/css/assets/css/ztreecss/zTreeStyle/zTreeStyle.css" type="text/css">
        <link rel="stylesheet" href="/APTSecUI/Public/css/uploadfile.css" >

        <link href="/APTSecUI/Public/css/assets/js/bootstrap-table/bootstrap-table.css" rel="stylesheet">

          <link href="/APTSecUI/Public/css/assets/style/main.css" rel="stylesheet">
		<link href="/APTSecUI/Public/css/assets/style/newTable.css" rel="stylesheet">
		<!--safereportset.html-->
		 <link href="/APTSecUI/Public/css/assets/style/safereportset.css" rel="stylesheet">
		<!--setting/index.html-----switch button-->
		 <link href="/APTSecUI/Public/css/assets/css/switch/switch.css" rel="stylesheet">
		 <link href="/APTSecUI/Public/css/assets/css/switch/inserthtml.com.radios.css" rel="stylesheet">

		<script>
		var GV = {
		DIMAUB: "/APTSecUI/Public/",
		JS_ROOT: "css/assets/",
		TOKEN: ""
		};
		</script>

		<script src="/APTSecUI/Public/css/assets/js/tree/jquery.js"></script>
        <script src="/APTSecUI/Public/css/assets/js/tree/wind.js"></script>
        <script src="/APTSecUI/Public/css/assets/js/ace-extra.min.js"></script>

        <!--<script src="/APTSecUI/Public/css/assets/js/highcharts/highcharts.js"></script>-->
	    <script src="/APTSecUI/Public/css/assets/js/highcharts/highstock.js"></script>
	    <script src="/APTSecUI/Public/css/assets/js/highcharts/highcharts-more.js"></script>
	    <script src="/APTSecUI/Public/css/assets/js/highcharts/solid-gauge.js"></script>
	    <script src="/APTSecUI/Public/css/assets/js/highcharts/highcharts-3d.js"></script>
	    <script src="/APTSecUI/Public/css/assets/js/highcharts/no-data-to-display.js"></script>
	    <!-- <script src="/APTSecUI/Public/Highcharts-5.0.6/code/modules/exporting.js"></script>  -->

	    <script src="/APTSecUI/Public/js/jquery.uploadfile.min.js"></script>
		<script src="/APTSecUI/Public/css/assets/js/bootstrap-table/bootstrap-table.js"></script>
		<script src="/APTSecUI/Public/css/assets/js/uncompressed/jquery.gritter.js"></script>
	    <script src="/APTSecUI/Public/css/assets/js/bootstrap-table/bootstrap-table-export.js"></script>
	    <script src="/APTSecUI/Public/css/assets/js/bootstrap-table/bootstrap-table-filter.js"></script>

     <!--Public\css\assets\js\uncompressed\jquery.gritter.js-->

		<script src="/APTSecUI/Public/js/jquery.form.js"></script>



        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!--[if lt IE 9]>
        <script src="/APTSecUI/Public/css/assets/js/html5shiv.js"></script>
        <script src="/APTSecUI/Public/css/assets/js/respond.min.js"></script>
        <![endif]-->
	</head>

	<body class="skin-1" style="min-width:1010px;">
		<div class="navbar "  id="navbar">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
				$(document).ready(function(){
					$('.tableShow').show();
				})
			</script>

			<div class="navbar-container" id="navbar-container"  style="min-width:1010px;">

               <span class="aptLogo"> APT安全威胁感知系统</span>
                <!--<img src="/APTSecUI/Public/css/assets/images/logo.png" class="floatLeft">-->
			<div  class="Toptitle">
            	<h3 class="floatLeft"></h3>
                <span class="floatRig">

                    <label><input type="text" class="allSearch" placeholder="搜索..."><a href="#" title="全站搜索"><i class="icon-search"></i></a></label>

                    <a href="/APTSecUI/index.php/Vir/index" title="安全总揽"><i class="icon-home font16"></i></a>
                    <a href="/APTSecUI/index.php/Urgent/index" title="紧急事件"><i class="icon-bell-alt font14"></i></a>
                    <a href="#" data-toggle="dropdown" title="系统"><i class="icon-user font14"></i><i class="icon-caret-down font12"></i></a>
                    <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close topSetting" style="padding:0px;">
								<li>
										<a href="#" style="border-radius: 8px 8px 0 0"><?php echo (session('username')); ?></a>

								</li>

								<li>
									<a href="/APTSecUI/index.php/User/user_password_edite">
										修改密码
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a  href="<?php echo U('Login/logout');?>" class="noborder" style="border-radius: 0 0 8px 8px">
										退出
									</a>
								</li>
							</ul>
                </span>
           </div>


			</div><!-- /.container -->
		</div>

		<div class="main-container" id="main-container" style="min-width:1010px;">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner" style="min-width:1010px;">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

				<div class="sidebar menu-min" id="sidebar">
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
					</script>
					<ul class="nav nav-list">
                        <!-- <li <?php if($controller == 'Vir'): ?>class="active open"<?php endif; ?>>
                        	<?php if(authcheck('Home/Vir/index,','1','')): ?><a href="#" class="dropdown-toggle">
								<i class=" icon-dashboard " style="font-size:13px;"></i>
								<span class="menu-text"> 安全总揽 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li <?php if(($action) == "index"): ?>class="active"<?php endif; ?>>
									<?php echo authcheck('Home/Vir/index','
									<a href="/APTSecUI/index.php/Vir/index">
										<i class="icon-double-angle-right"></i>
                                        安全总揽
									</a>
									','');?>
								</li>
							</ul><?php endif; ?>
						</li>-->
						<li <?php if($controller == 'Vir'): ?>class="active open"<?php endif; ?>>
						<?php if(authcheck('Home/Vir/index,','1','')): ?><a href="/APTSecUI/index.php/Vir/index">
								<i class="  icon-home " style="font-size:16px;"></i>
								<span class="menu-text"> 安全总揽 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<!--<ul class="submenu">
								<li <?php if(($action) == "index"): ?>class="active"<?php endif; ?>>
								<?php echo authcheck('Home/Vir/index','
								<a href="/APTSecUI/index.php/Vir/index">
									<i class="icon-double-angle-right"></i>
									安全总揽
								</a>
								','');?>
								</li>
							</ul>--><?php endif; ?>

						</li>
						<li <?php if($controller == 'Urgent'): ?>class="active open"<?php endif; ?>>
						<?php if(authcheck('Home/Vir/index,','1','')): ?><a href="/APTSecUI/index.php/Urgent/index">
								<i class=" icon-dashboard " style="font-size:13px;"></i>
								<span class="menu-text"> 紧急事件 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<!--<ul class="submenu">
								<li <?php if(($action) == "index"): ?>class="active"<?php endif; ?>>
								<?php echo authcheck('Home/Vir/index','
								<a href="/APTSecUI/index.php/Vir/index">
									<i class="icon-double-angle-right"></i>
									安全总揽
								</a>
								','');?>
								</li>
							</ul>--><?php endif; ?>
						</li>


                        <!-- <li <?php if($controller == 'Urgent'): ?>class="active open"<?php endif; ?>>
                        	<?php if(authcheck('Home/Urgent/index,','1','')): ?><a href="#" class="dropdown-toggle">
								<i class=" icon-bolt "></i>
								<span class="menu-text"> 紧急事件 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li <?php if(($action) == "index"): ?>class="active"<?php endif; ?>>
									<?php echo authcheck('Home/Urgent/index','
									<a href="/APTSecUI/index.php/Urgent/index">
										<i class="icon-double-angle-right"></i>
                                        紧急事件
									</a>
									','');?>
								</li>
							</ul><?php endif; ?>
						</li>-->


                        <li <?php if($controller == 'Safe'): ?>class="active open"<?php endif; ?>>
                        	<?php if(authcheck('Home/Safe/index,Home/Safe/file,Home/Safe/bruteforce,Home/Safe/malicioust,Home/Safe/scanevent','1','')): ?><a href="#" class="dropdown-toggle">
								<i class=" icon-medkit" style="font-size:14px;"></i>
								<span class="menu-text"> 安全事件 </span>

								<b class="arrow icon-angle-down"></b>
							</a>


							<ul class="submenu">
								<li  <?php if(($action) == "index"): ?>class="active"<?php endif; ?>>
									<?php echo authcheck('Home/Safe/index','
									<a href="/APTSecUI/index.php/Safe/index">
										<i class="icon-double-angle-right"></i>
									    http流量检测
									</a>
									','');?>
								</li>
                                <li  <?php if(($action) == "file"): ?>class="active"<?php endif; ?>>
									<?php echo authcheck('Home/Safe/file','
									<a href="/APTSecUI/index.php/Safe/file">
										<i class="icon-double-angle-right"></i>
									    文件威胁检测
									</a>
									','');?>
								</li>
                                <li  <?php if(($action) == "bruteforce"): ?>class="active"<?php endif; ?>>
									<?php echo authcheck('Home/Safe/bruteforce','
									<a href="/APTSecUI/index.php/Safe/bruteforce">
										<i class="icon-double-angle-right"></i>
									    恶意流量检测
									</a>
									','');?>
								</li>
                                <li  <?php if(($action) == "malicioust"): ?>class="active"<?php endif; ?>>
									<?php echo authcheck('Home/Safe/malicioust','
									<a href="/APTSecUI/index.php/Safe/malicioust">
										<i class="icon-double-angle-right"></i>
									    暴力破解检测
									</a>
									','');?>
								</li>
                                <li  <?php if(($action) == "scanevent"): ?>class="active"<?php endif; ?>>
									<?php echo authcheck('Home/Safe/scanevent','
									<a href="/APTSecUI/index.php/Safe/scanevent">
										<i class="icon-double-angle-right"></i>
									    扫描事件检测
									</a>
									','');?>
								</li>
								<li  <?php if(($action) == "offLine"): ?>class="active"<?php endif; ?>>
								<?php echo authcheck('Home/Safe/offLine','
								<a href="/APTSecUI/index.php/Safe/offLine">
									<i class="icon-double-angle-right"></i>
									离线调度检测
								</a>
								','');?>
								</li>


							</ul><?php endif; ?>
						</li>
                        <li <?php if($controller == 'User'): ?>class="active open"<?php endif; ?>>
                        	<?php if(authcheck('Home/User/user,Home/User/usergroup','1','')): ?><a href="#" class="dropdown-toggle">
								<i class="icon-user" style="font-size:16px;"></i>
								<span class="menu-text"> 权限管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li <?php if(($action) == "user"): ?>class="active"<?php endif; ?>>
									<?php echo authcheck('Home/User/user','
									<a href="/APTSecUI/index.php/User/user">
										<i class="icon-double-angle-right"></i>
										用户管理
									</a>
									','');?>
								</li>

                                <li <?php if(($action) == "usergroup"): ?>class="active"<?php endif; ?>>
									<?php echo authcheck('Home/User/usergroup','
									<a href="/APTSecUI/index.php/User/usergroup">
										<i class="icon-double-angle-right"></i>
										用户组管理
									</a>
									','');?>
								</li>


							</ul><?php endif; ?>
						</li>

						<li <?php if($controller == 'Log'): ?>class="active open"<?php endif; ?>>
							<?php if(authcheck('Home/Log/index','1','')): ?><a href="#" class="dropdown-toggle">
								<i class=" icon-calendar " style="font-size:14px;"></i>
								<span class="menu-text"> 日志管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li  <?php if(($action) == "index"): ?>class="active"<?php endif; ?>>
									<a href="<?php echo U('Log/index');?>" >
										<i class="icon-double-angle-right"></i>
										系统操作日志
									</a>
								</li>
							</ul><?php endif; ?>
						</li>
                        <li <?php if($controller == 'Setting'): ?>class="active open"<?php endif; ?>>
                        	<?php if(authcheck('Home/Setting/index,Home/Setting/ugevent,Home/Setting/safereportset,','1','')): ?><a href="#" class="dropdown-toggle">
								<i class="icon-cog" style="font-size:14px;"></i>
								<span class="menu-text"> 设置 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li <?php if(($action) == "index"): ?>class="active"<?php endif; ?>>
									<?php echo authcheck('Home/Setting/index','
									<a href="/APTSecUI/index.php/Setting/index">
										<i class="icon-double-angle-right"></i>
										安全报表推送
									</a>
									','');?>
								</li>
                                <li <?php if(($action) == "ugevent"): ?>class="active"<?php endif; ?>>
									<?php echo authcheck('Home/Setting/ugevent','
									<a href="/APTSecUI/index.php/Setting/ugevent">
										<i class="icon-double-angle-right"></i>
										紧急事件推送
									</a>
									','');?>
								</li>
                                <li <?php if(($action) == "safereportset"): ?>class="active"<?php endif; ?>>
									<?php echo authcheck('Home/Setting/safereportset','
									<a href="/APTSecUI/index.php/Setting/safereportset">
										<i class="icon-double-angle-right"></i>
										安全报表模板设置
									</a>
									','');?>
								</li>
							</ul><?php endif; ?>
						</li>
                         <li <?php if($controller == 'Alarm'): ?>class="active open"<?php endif; ?>>
                        	<?php if(authcheck('Home/Alarm/index','1','')): ?><a href="#" class="dropdown-toggle">
								<i class="icon-bell-alt" style="font-size:13px;"></i>
								<span class="menu-text"> 告警检索 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li <?php if(($action) == "index"): ?>class="active"<?php endif; ?>>
									<?php echo authcheck('Home/Alarm/index','
									<a href="/APTSecUI/index.php/Alarm/index">
										<i class="icon-double-angle-right"></i>
										告警检索
									</a>
									','');?>
								</li>



							</ul><?php endif; ?>
						</li>
                         <li <?php if($controller == 'Track'): ?>class="active open"<?php endif; ?>>
                        <?php if(authcheck('Home/Track/index','1','')): ?><a href="#" class="dropdown-toggle">
                                <i class=" icon-pushpin" style=""></i>
                                <span class="menu-text">追踪溯源 </span>

                                <b class="arrow icon-angle-down"></b>
                                </a>
                                <ul class="submenu">
	                                <li  <?php if(($action) == "index"): ?>class="active"<?php endif; ?>>
		                                <?php echo authcheck('Home/Track/index','
		                                <a href="/APTSecUI/index.php/Track/index">
		                                <i class="icon-double-angle-right"></i>
		                                追踪溯源
		                                </a>
		                                ','');?>
	                                </li>

                                </ul><?php endif; ?>

                        </li>
                         <li <?php if($controller == 'Monitor'): ?>class="active open"<?php endif; ?>>
                        <?php if(authcheck('Home/Monitor/index','1','')): ?><a href="#" class="dropdown-toggle">
                                <i class=" icon-facetime-video" style="font-size:13px;"></i>
                                <span class="menu-text">应用监控 </span>

                                <b class="arrow icon-angle-down"></b>
                                </a>
                                <ul class="submenu">
	                                <li  <?php if(($action) == "index"): ?>class="active"<?php endif; ?>>
		                                <?php echo authcheck('Home/Monitor/index','
		                                <a href="/APTSecUI/index.php/Monitor/index">
		                                <i class="icon-double-angle-right"></i>
		                                应用监控
		                                </a>
		                                ','');?>
	                                </li>

                                </ul><?php endif; ?>

                        </li>








                       <!-- <li <?php if($controller == 'User'): ?>class="active open"<?php endif; ?>>
                        	<?php if(authcheck('Home/User/user,Home/User/usergroup','1','')): ?><a href="#" class="dropdown-toggle">
								<i class="icon-user" style="font-size:16px;"></i>
								<span class="menu-text"> 日志管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li <?php if(($action) == "user"): ?>class="active"<?php endif; ?>>
									<?php echo authcheck('Home/User/user','
									<a href="/APTSecUI/index.php/User/user">
										<i class="icon-double-angle-right"></i>
										操作日志管理
									</a>
									','');?>
								</li>

							</ul><?php endif; ?>
						</li>
                        -->


                        <li <?php if($controller == 'Analysis'): ?>class="active open"<?php endif; ?>>
                        	<?php if(authcheck('Home/Analysis/index','1','')): ?><a href="#" class="dropdown-toggle">
								<i class="icon-bar-chart" style="font-size:13px;"></i>
								<span class="menu-text"> 访问分析 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li <?php if(($action) == "index"): ?>class="active"<?php endif; ?>>
									<?php echo authcheck('Home/Analysis/index','
									<a href="/APTSecUI/index.php/Analysis/index">
										<i class="icon-double-angle-right"></i>
										访问分析
									</a>
									','');?>
								</li>



							</ul><?php endif; ?>
						</li>


						<!--<li <?php if($controller == 'System'): ?>class="active open"<?php endif; ?>>
							<?php if(authcheck('Home/System/setting','1','')): ?><a href="#" class="dropdown-toggle">
								<i class=" icon-cog " style="font-size:14px;"></i>
								<span class="menu-text"> 系统管理 </span>

								<b class="arrow icon-angle-down"></b>
							</a>

							<ul class="submenu">
								<li  <?php if(($action) == "setting"): ?>class="active"<?php endif; ?>>
									<a href="<?php echo U('System/setting');?>">
										<i class="icon-double-angle-right"></i>
										系统设置
									</a>
								</li>
							</ul><?php endif; ?>
						</li>
                        -->
					</ul>
                    <div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
						var locaHref=window.location.href;
						var reg=/Main\/main/

						if(reg.test(locaHref)==true){
							$("#sidebar").addClass('menu-min')
							$("#sidebar-collapse").remove()

						}else{
							$("#sidebar").removeClass('menu-min')
						}
						/*$(document).ready(function(){
							var check_status = function(){
						        $.post("/APTSecUI/index.php/System/check_status",'',function(data){
							        if(data.status=='out_time') {
							            window.location.reload();
							        }
						        });
						    }
						    setInterval(check_status,3000);
						});*/
					</script>


				</div>


<div class="main-content">
    <!-- <div id="ignore" class="popLayer" >
        <div class="breadcrumbs">
            <ul class="breadcrumb">
                <li>详情</li>
            </ul>
            .breadcrumb
            <span class="floatRig closePop">关闭</span>
        </div>
        <div class="col-sm-12" style="height: 260px">
            <div class="row">
                <div class="col-xs-win">
                    PAGE CONTENT BEGINS
                    <p id="title"></p>
                </div>
                /.col
            </div>
            /.row
        </div>
    </div> -->

    <div class="breadcrumbs" id="breadcrumbs">
        <script type="text/javascript">
            try {
                ace.settings.check('breadcrumbs', 'fixed')
            } catch (e) {
                
            }
        </script>

        <ul class="breadcrumb">
            <li>
                安全事件
            </li>
            <li class="active">http流量检测</li>
        </ul>
        <!-- .breadcrumb -->
        <!-- #nav-search -->
    </div>
    <div class="col-sm-12">
        <div class="row">
            <div class="col-xs-12" >
                <div class="formArea marT10" >
                    <div class="formTextList">
                        <label class="floatLeft">时间：</label>
                        <div class="input-group w300 floatLeft" style="width:281px; text-indent:0px;">
                            <span class="input-group-addon">
                                <i class="icon-calendar bigger-110"></i>
                             </span><input class="form-control date-range-picker" type="text" name="da1" data-date-format="YYYY-MM-DD"  id="id-date-range-picker-1"/>
                        </div>
                    </div>
                    <!--<div class="clearBoth"></div>-->
                    <a id="kSearch1" class="btn btn-primary">查询</a>
                </div>
            
                <div class="chartBox marT10" style="position: relative; ">
                
                
                <div class="aptBox aptBoxW4 aptBoxH3 boxShadowjc" >
                    <img class="loading" src="/APTSecUI/Public/css/assets/images/loading.gif" style="margin:25% 45%;"/>

                <div id="container" style=" width:98%;height:100%;margin:auto;"></div>
                </div>
                
                <div class="aptBox aptBoxW6 aptBoxH3 marL10 boxShadowjc">
                    <img class="loading" src="/APTSecUI/Public/css/assets/images/loading.gif" style="margin:20% 45%;"/>
                <div id="container2" style=" width:98%;height:100%;margin:auto;"></div>
                </div>
                    <!--30天http流量攻击趋势图的翻页-->
                    <div class=" aptBoxW6 " style="position: absolute;right: 1px;bottom: 40px">
                        <a href='javascript:;' class='jump' data='1' style="position: absolute;top: 2px;left: 60px" title="查看上一周期" >
                            <i class="icon-caret-left icon-2x"></i>
                        </a>

                        <a href='javascript:;' class='jump' data='2' style="position: absolute;top: 2px;right: 5px" title="查看下一周期">
                            <i class="icon-caret-right icon-2x" style="color:#c0c0c0"></i>
                        </a>
                    </div>
                   <div class="clearBoth"></div>
                </div>
                
                <div class="formArea marT10" id="type" >
                    <div class="formTextList">
                        <label class="floatLeft">时间：</label>
                        <div class="input-group w300 floatLeft" style="width:281px; text-indent:0px;">
                        <span class="input-group-addon">
                            <i class="icon-calendar bigger-110"></i>
                        </span>
                            <input class="form-control date-range-picker" type="text" name="da2" data-date-format="YYYY-MM-DD" id="id-date-range-picker-2" />
                        </div>
                    </div>
                    <div class="formTextList">
                        <label class="floatLeft">关键字：</label>
                        <input type="text" name="keyword" id="keyword" class="floatLeft">
                    </div>
                    <a  href="#maodian" id="kSearch2" class="btn btn-primary">查询</a>
                <p class="atpTypeList">
                   
                </p>
                </div>
                <div class="aptTable span10 marT10 tableShow boxShadowjc">
                    <div class="aptListBtnGroup" style="top: 8px;"><h4>http流量攻击详情</h4></div>
                    <div class="aptNote"><span style="color: dimgrey">注:</span>精度级别1-9级,1级表示不精准,误报多,9级表示非常精准。 成熟度1-9级,1级表示是一个全新的实验,9级通过广泛测试,常规为0。</div>
                    <table id="reportTable" >
                    </table>
                    <p id='maodian' style="height: 353px" ></p>
                </div>                
            </div>
            </div>
        </div>
        
    </div>
</div>
<script type="text/javascript">
    $('#keyword').attr('value',getParam("keyword"));
    $('#id-date-range-picker-1').attr('value',URLdecode(getParam("da1")));
    $('#id-date-range-picker-2').attr('value',URLdecode(getParam("da2")));
    function URLdecode(sStr){
       return sStr.replace(/\+/g,' ').replace(/\%2F/g,'\/').replace(/\%20/g,''); 
    }

    function getParam(paramName)
    {
        paramValue = "";
        isFound = false;
        if (this.location.search.indexOf("?") == 0 && this.location.search.indexOf("=")>1)
        {
            arrSource = this.location.search.substring(1,this.location.search.length).split("&");
            i = 0;
            while (i < arrSource.length && !isFound)
            {
                if (arrSource[i].indexOf("=") > 0)
                {
                    if (arrSource[i].split("=")[0].toLowerCase()==paramName.toLowerCase())
                    {
                        paramValue = arrSource[i].split("=")[1];
                        isFound = true;
                    }
                }
                i++;
            }
        }
        return paramValue;
    }
</script>
<!--初始化全局日期-->
<script>
    //获取时间方法
    Date.prototype.Format = function (fmt) {
        var o = {
            "M+": this.getMonth() + 1, //月份
            "d+": this.getDate() //日
        };
        if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
        for (var k in o)
            if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
        return fmt;
    }
    //获取当前日期
    var endTime= new Date().Format("MM/dd/yyyy");//Format("输入你想要的时间格式:yyyy-MM-dd,yyyyMMdd")
    //结束时间
    var date = new Date();//获取当前时间
    date.setDate(date.getDate()-29);//设置天数 30 天
    var starTime = date.Format("MM/dd/yyyy"); //减完30天以后的时间
    date1=$('input[name="da1"]').val(starTime+" - "+endTime)
</script>
<script>
    jQuery(function ($) {
        $('#id-date-range-picker-1').daterangepicker({
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment(),
                    maxDate : moment(),
                    locale : {
                        applyLabel: '提交',
                        cancelLabel: '取消',
                        fromLabel: '开始时间',
                        toLabel: '结束时间',
                        weekLabel: 'W',
                        customRangeLabel: 'Custom Range',
                        daysOfWeek: ['日', '一', '二', '三', '四', '五','六'],
                        monthNames: ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'],
                        firstDay: moment.localeData()._week.dow
                    },
//                    startDate: moment().startOf('day'),
//                    minValidDate: '315507600000000000000000', //最小可用时间，控制日期选择器的可选力度
                    dateLimit : {
                        day : 29
                    },
                    timePickerIncrement : 1440, //时间的增量，单位为分钟
                    language: 'cn',}
        ).prev().on(ace.click_event, function () {
                    $(this).next().focus();
                });
    })
time();
function time(){
    var arr=timeFormat();
    jQuery(function ($) {
        $('#id-date-range-picker-2').daterangepicker({
                    startDate: moment().subtract(arr.days, 'days'),
                    endDate: moment(),
                    maxDate : arr.dateT1,
                    minDate:arr.dateS1,
                    locale : {
                        applyLabel: '提交',
                        cancelLabel: '取消',
                        fromLabel: '开始时间',
                        toLabel: '结束时间',
                        weekLabel: 'W',
                        customRangeLabel: 'Custom Range',
                        daysOfWeek: ['日', '一', '二', '三', '四', '五','六'],
                        monthNames: ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'],
                        firstDay: moment.localeData()._week.dow
                    },
                    dateLimit : {
                        day : 29
                    },
                    timePickerIncrement : 1440, //时间的增量，单位为分钟
                    language: 'cn',}
        ).prev().on(ace.click_event, function () {
                    $(this).next().focus();
                });
    })
}
function timeFormat(){
    var arr=[];
    //    上面日期的分割
    var date1=$('input[name="da1"]').val().split('-');
//    格式化全局日期的起止时间
    var timeS1=date1[0].split('/');
    timeS1= timeS1.join('-').trim();
    var timeT1=date1[1].split('/');
    timeT1= timeT1.join('-').trim();
    var dateS1 = new Date(timeS1);
    arr.dateS1=dateS1;
    var dateT1 = new Date(timeT1);arr.dateT1=dateT1;
    var date3=dateT1.getTime()-dateS1.getTime();
    var days=Math.floor(date3/(24*3600*1000));arr.days=days;
    return arr;
}

$(document).ready(function(){
    var da1=$('#id-date-range-picker-1').val();
    $.ajax({
        url: '/APTSecUI/index.php/Home/Safe/indextu',
        type: 'GET',
        async: false,
        dataType: 'json',
        data:{'da1':da1},
        success:function(data){
            $('.loading').css('display','none');
            $('#id-date-range-picker-2').val('');
            chart1(data);
            chart2(data);
            gettypelist(data);
        },
        error: function(e) {
            $('.loading').css('display','none');
            layer.msg('数据加载失败')
        }
    })                                         
});
function gettypelist(data){
    $('.atpTypeList').empty();
    var str = '类型：';
    if(data.data4){
        $.each(data.data4, function(index, value){
            str += '<a href="#maodian" class="'+value.class+'" data="'+value.data+'">'+value.name+'('+value.num+')</a>';
        });
    }
    $('.atpTypeList').html(str);
}
var count1=1;
var count2=1;
$(document).on('click',".jump",function(){
    var v = $(this).attr('data');
    $.ajax({
        url: '/APTSecUI/index.php/Home/Safe/indexzhutu',
        type: 'GET',
        async: false,
        dataType: 'json',
        data: {'sign':v},
        success:function(data){
            //    上面日期的分割
            var date1=$('input[name="da1"]').val().split('-');
            //    格式化全局日期的起止时间
            var timeS1=date1[0].split('/');
            timeS1.pop();timeS1= timeS1.join('-').trim();
            var timeT1=date1[1].split('/');
            timeT1.pop(); timeT1= timeT1.join('-').trim();
            var fyArr=data.data2[0].data;
            if(fyArr[fyArr.length-1].name==timeT1){
                $('.icon-caret-right').css({ "color": "#c0c0c0"});
                $('.icon-caret-left').css({ "color": "#2A6496"});
            }
            if(fyArr[0].name==timeS1){
                $('.icon-caret-left').css({ "color": "#c0c0c0"});
                $('.icon-caret-right').css({ "color": "#2A6496"});
            }
            //时间范围为10天之内，不能点击
            if(fyArr[fyArr.length-1].name==timeT1&&fyArr[0].name==timeS1 &&data.data2[0].data.length <=10){
                count1= 2;count2 = 2;
                $('.icon-caret-right').css({ "color": "#c0c0c0"});
                $('.icon-caret-left').css({ "color": "#c0c0c0"});
                return;
            }else{
                if(fyArr[fyArr.length-1].name==timeT1||fyArr[0].name==timeS1){
                    if(v==1){
                        count1++;
                        if(count1>1){ return;}
                    }else {count1=0}
                    if(v==2){
                        count2++;
                        if(count2>1){return;}
                    }else{count2=0}
                }else{ count1=0;count2=0;$('.icon-caret-right').css({ "color": "#2A6496"});$('.icon-caret-left').css({ "color": "#2A6496"})}

            }
            chart2(data);
        },
        error: function(e) {
            layer.msg('数据加载失败')
        }
    })
})
</script>
<script type="text/javascript">
var chart1=function(data){
     $('#container').highcharts({
         colors: ['#c63012', '#ea7f0c', '#cbf621', '#7798BF', '#aaeeee', '#ff0066', '#eeaaee',
             '#55BF3B', '#DF5353', '#7798BF', '#aaeeee'
         ],
         chart:{
             backgroundColor: '#fefefe',
             type: 'pie',
             options3d: {
                 enabled: true,
                 alpha: 50,
                 beta: 0
             },
         },
         title: {
             text: 'http流量攻击类型'
         },
         credits:{
             enabled:false // 禁用版权信息
         },
         tooltip: {
             pointFormat: '攻击占比: <b>{point.percentage:.1f}%</b><br>'+'{series.name}: <b>{point.y}</b>'
         },
         exporting: {
             enabled: false
         },
         plotOptions: {
             pie: {
                 allowPointSelect: true,
                 cursor: 'pointer',
                 depth: 25,
                 dataLabels: {
                     enabled: true,
                     //format: '{point.name}'
                     format: '<b>{point.name}</b>',
                     style: {
                         color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                     }
                 },
             }
         },
         series: [{
             type: 'pie',
             innerSize:'40%',
             name: '攻击数',
             //data: [['SQL注入成功',30],['鸡肉行为',40],['蠕虫病毒',40],['木马回连',20],['DDoS',22],['非正常登陆',14],['其他',10]],
             data: data.data1

         }]
     });
 }


var chart2=function(data){
    $('#container2').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'http流量检测攻击趋势图',

        },
        credits:{
            enabled:false // 禁用版权信息
        },
        xAxis: {
            type: 'category',
            labels: {
                style: {
                    fontSize: '12px',
                    fontFamily: 'Verdana, sans-serif'
                }
            },
        },
        yAxis: {
            min: 0,
            title: {
                text: '数量(个)'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            formatter: function () {
                var n = this.x;
                return  this.series.data[n].name +'<br/>' +
                        '告警类别: ' + this.series.name + '<br/>' +
                        '个数: ' + this.y;
            }
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                pointPadding: 0.2,
                borderWidth: 0,
                pointWidth: 30
            }
        },
        /*series: [{
            name: 'SQL注入',
            data: [
                ['3-8',2],['3-9',3],['3-10',4],['3-11',1],['3-12',2],['3-13',2], ['3-14',5],['3-15',3],
                ['3-16',2],
                ['3-17',2]
            ]
        }, {
            name: '非正常登陆',
            data: [
                ['3-8',2],['3-9',3],['3-10',4],['3-11',1],['3-12',2],['3-13',2], ['3-14',5],['3-15',3],
                ['3-16',2],
                ['3-17',2]
            ]
        }, {
            name: '鸡肉行为',
            data: [
                ['3-8',2],['3-9',3],['3-10',4],['3-11',1],['3-12',2],['3-13',2], ['3-14',5],['3-15',3],
                ['3-16',2],
                ['3-17',2]
            ]
        }],*/
        series:data.data2

    });
}

//当左侧菜单栏显示或隐藏时图表重绘
$('.icon-double-angle-left').click(function(){
    if($('.col-xs-12').css("width")!=$('.main-content').css("min-width")){
        if($('#sidebar-collapse i').attr('class')=='icon-double-angle-left'){

            setTimeout(function(){
                $('#container2').highcharts().reflow();
            },1)
        }else{
            setTimeout(function(){
//                    $('#container2').css("width",$('#container2').css("width"))
                $('#container2').highcharts().reflow();
            },1)
        }

        $('#container2').highcharts().reflow();

    }
});

function detailFormatter(index, row) {
    var html = [];
    var rows = {'描述消息 ':' '+row.msg,'请求唯一标识 ':' '+row.unique_id,'匹配规则文件 ':' '+row.ruleFile,'匹配攻击规则所在文件中位置 ' : ' '+row.ruleLine,'规则ID ':' '+row.ruleId,'规则版本 ':' '+row.ruleVersion,'waf版本 ':' '+row.version,'标记归类 ':' '+row.tags}
   
    $.each(rows, function (key, value) {
        html.push('<p style="display:inline-block;width: 50%;height: 26px;">' + key + ': ' + value + '</p>');
    });
    return html.join('');
}
$(document).ready(function(){
    $('#maodian').hide();
    function operateFormatter(value, row, index) {
        //var d = '修改的规则:'+row.rev+'</br>'+'描述消息:'+row.msg
        return [
            "<a href='javascript:;' class='editIcon marR5 editTable ignore' title='已忽略' ><i class='icon-eye-close'></i></a>" +
            "<a href='javascript:;' class='delIcon delTable sign' title='标记'><i class='icon-pushpin' ></i></a>"
        ].join('');
    }
    function subFormatter(value, row, index){
        var str = '<span title="'+value+'" style="width: 100%; height:100%;display: inline-block;padding:0 8px;">';//要展示的字符串
        if(value){
            if(value.length>6){
                str += value.substring(0,6)+"...";
            }else{
                str += value;
            }
        }

        str +='</span>';
        return str;
    }
    function resetCell(index, row, value, field) {
        return {
            css: {
                "padding": "0px",
                "margin": "0px",
                "line-height":'34px'
            }
        };
    }
    $('#reportTable').bootstrapTable({
            method: 'get',
            url: '/APTSecUI/index.php/Home/Safe/indexbiao',
            //search:true,
            cache: false,
            //height: 450,
            striped: true,
            sidePagination:"server",
            pagination: true,
            pageSize: 10,
            pageNumber: 1,
            pageList: [10],
            sortName : 'time',
            sortOrder : 'desc',
            showColumns: true,
            detailView:true,
            detailFormatter:"detailFormatter",
            rowStyle: function (row, index) {
                var classes = [ 'success', 'warning', 'danger'];
                if(row.severity=="EMERGENCY" || row.severity=="ALERT" || row.severity=="CRITICAL"){
                    return {
                        classes: classes[2]

                    }
                }else if(row.severity=="ERROR" || row.severity=="WARNING"){
                    return {
                        classes: classes[1]
                    }
                }else if(row.severity=="NOTICE" || row.severity=="INFO" || row.severity=="DEBUG"){
                    return {
                        classes: classes[0]
                    }
                }
                return {};
            },

            formatLoadingMessage: function () {
                return "请稍等，正在加载中...";
            },
            formatNoMatches: function () {  //没有匹配的结果
                return '无符合条件的记录';
            },
            queryParams: function (params) {
                var pars = {
                    da1:$('#id-date-range-picker-1').val(),
                    da2:$('#id-date-range-picker-2').val(),
                    types:$('.sel').attr('data'),
                    keyword:$('#keyword').val(),
                    pagenum:params.offset/params.limit+1,
                    order:params.order,
                    sort:params.sort
                };
                return pars;
            },
            columns: [{
                field: "time",
                title: "攻击时间",
                align: "center",
                valign: "middle",
                sortable: true,
                width: '180'
            },{
                field: "client",
                title: "客户端IP",
                align: "center",
                //valign: "middle",
                //sortable: false
            },{
                field: "hostName",
                title: "主机域名",
                align: "center",
                valign: "middle",
                sortable: false
            }/*,
            {
                field: "rev",
                title: "修改的规则",
                align: "center",
                valign: "middle",
                sortable: false
            },{
                field: "msg",
                title: "描述消息",
                align: "center",
                valign: "middle",
                sortable: false,
                formatter: subFormatter
            }*/
            ,{
                field: "attack",
                title: "危害类型",
                align: "center",
                valign: "middle",
                sortable: false,
                formatter: subFormatter,
                cellStyle:resetCell
            },{
                field: "severity",
                title: "攻击级别",
                align: "center",
                valign: "middle"
            },{
                field: "maturity",
                title: "规则成熟度",
                align: "center",
                valign: "middle",
                sortable: false
            },{
                field: "accuracy",
                title: "精度级别",
                align: "center",
                valign: "middle",
                sortable: false,
                cellStyle:resetCell
            },{
                field: "uri",
                title: "URI",
                align: "center",
                valign: "middle",
                sortable: false,
                formatter: subFormatter,
                cellStyle:resetCell

            }/*,{
                field: "unique_id",
                title: "请求唯一标识",
                align: "center",
                valign: "middle",
                sortable: false,
                formatter: subFormatter
            }
            ,{
                field: "ref",
                title: "规则引用",
                align: "center",
                valign: "middle",
                sortable: false,
                formatter: subFormatter
            },{
                field: "tags",
                title: "标记归类",
                align: "center",
                valign: "middle",
                sortable: false,
                formatter: subFormatter
            },{
                field: "ruleFile",
                title: "匹配规则文件",
                align: "center",
                valign: "middle",
                sortable: false,
                formatter: subFormatter
            },{
                field: "ruleLine",
                title: "匹配攻击规则所在文件中位置",
                align: "center",
                valign: "middle",
                sortable: false,
                formatter: subFormatter
            },{
                field: "ruleId",
                title: "规则ID",
                align: "center",
                valign: "middle",
                sortable: false
            }*/
            ,{
                field: "ruleData",
                title: "匹配参数",
                align: "center",
                valign: "middle,",
                sortable: false,
                formatter: subFormatter,
                cellStyle:resetCell
                }
            /*,{
                field: "ruleVersion",
                title: "规则版本",
                align: "center",
                valign: "middle",
                sortable: false,
                formatter: subFormatter
            },{
                field: "version",
                title: "waf版本",
                align: "center",
                valign: "middle",
                sortable: false,
                formatter: subFormatter
            }*/
            ,{
                field: "id",
                title: "操作",
                align: "center",
                valign: "middle",
                sortable: false,
                switchable: false,
                formatter: operateFormatter
            }],
            data: [],
            onLoadSuccess:function(data){
                $('#maodian').hide();
            },
            responseHandler:function(data) {
                var tem = {"total":0,"rows":[]};
                if(typeof(data.data4) != "undefined"){
                    gettypelist(data)
                }
                var res = data.data3;
                if(res.status){
                    tem.total = res.totalNum;
                    tem.rows = eval(res.data);
                }else{
                    $('#reportTable').bootstrapTable('removeAll');
                }
                return tem;
            },
            onLoadError:function(status,res){
                $('#reportTable').bootstrapTable('removeAll');
            }
        });
        $(window).resize(function () {
            $('#reportTable').bootstrapTable('resetView');
        });
        $("#kSearch2").click(function(){
            $('#maodian').show();
            var da2 = $('#id-date-range-picker-2').val();
            var keyword = $('#keyword').val();
            var types = $('.sel').attr('data');
            $('#reportTable').bootstrapTable('refreshOptions',{pageNumber:1});
            $('#reportTable').bootstrapTable('refresh');

        });
        $(document).on('click',".types",function(){
            $('#maodian').show();
            var da2 = $('#id-date-range-picker-2').val();
            var keyword = $('#keyword').val();
            var types = $(this).attr('data');
            $('#reportTable').bootstrapTable('refreshOptions',{pageNumber:1});
            $('#reportTable').bootstrapTable('refresh');
        });
        $("#kSearch1").click(function(){
            time();
            count1=0;count2=1;
            $('#id-date-range-picker-2').val('');
            $('#keyword').val('');
            var da1 = $('#id-date-range-picker-1').val();
            $.ajax({
                url: '/APTSecUI/index.php/Home/Safe/indextu',
                type: 'GET',
                async: false,
                dataType: 'json',
                data: {'da1':da1},
                success:function(data){
                    pagingStyle(data)
                    chart1(data);
                    chart2(data);
                },
                error: function(e) {
                    layer.msg('数据加载失败')
                }
            })
            $('#reportTable').bootstrapTable('refresh');
        });
});
//        默认不可翻页时颜色的变化
function pagingStyle(data){
    var days=timeFormat().days;
    if(days <=10){
        $('.icon-caret-right').css({ "color": "#c0c0c0"});
        $('.icon-caret-left').css({ "color": "#c0c0c0"});
    }else{
        $('.icon-caret-right').css({ "color": "#c0c0c0"});
        $('.icon-caret-left').css({ "color": "#2A6496"});
    }
}
//    类型选择时样式的改变
$(document).on('click',".atpTypeList a",function(){
    $(this).addClass('sel');
    $(this).siblings('a').removeClass('sel');
});
</script>

<div class="ace-settings-container" id="ace-settings-container" style="display:none">
  <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
    <i class="icon-cog bigger-150"></i>
  </div>

  <div class="ace-settings-box" id="ace-settings-box">
    <div>
      <div class="pull-left">
        <select id="skin-colorpicker" class="hide">
          <option data-skin="default" value="#438EB9">#438EB9</option>
          <option data-skin="skin-1" value="#222A2D">#222A2D</option>
          <option data-skin="skin-2" value="#C6487E">#C6487E</option>
          <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
        </select>
      </div>
      <span>&nbsp; 换肤</span>
    </div>

    <div>
      <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar"/>
      <label class="lbl" for="ace-settings-navbar"> 固定导航</label>
    </div>

    <div>
      <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar"/>
      <label class="lbl" for="ace-settings-sidebar"> 固定边栏</label>
    </div>

    <div>
      <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs"/>
      <label class="lbl" for="ace-settings-breadcrumbs"> 固定位置信息</label>
    </div>

    <div>
      <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl"/>
      <label class="lbl" for="ace-settings-rtl"> 左右切换</label>
    </div>

    <div>
      <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container"/>
      <label class="lbl" for="ace-settings-add-container">
        缩进
        <!-- <b>.container</b> -->
      </label>
    </div>
  </div>
</div><!-- /#ace-settings-container -->
</div><!-- /.main-container-inner -->
<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse" style="display:none;">
  <i class="icon-double-angle-up icon-only bigger-110"></i>
</a>
</div><!-- /.main-container -->

<div id="fade" class="black_overlay"></div>

<div id="ajaxAlert" class="popLayerTip">
  <div class="breadcrumbs">
    <ul class="breadcrumb">
      <li>
        提示
      </li>
    </ul>
    <!-- .breadcrumb -->
    <span class="floatRig closePop"></span>
  </div>
  <div class="tipText">

  </div>
</div>


<!-- basic scripts -->

<!--[if !IE]> -->

<script type="text/javascript">
  window.jQuery || document.write("<script src='/APTSecUI/Public/css/assets/js/jquery-2.0.3.min.js'>" + "<" + "/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
  window.jQuery || document.write("<script src='/APTSecUI/Public/css/assets/js/jquery-1.10.2.min.js'>" + "<" + "/script>");
</script>
<![endif]-->

<script type="text/javascript">
  if ("ontouchend" in document) document.write("<script src='/APTSecUI/Public/css/assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>

<script src="/APTSecUI/Public/css/assets/js/bootstrap.min.js"></script>
<script src="/APTSecUI/Public/css/assets/js/typeahead-bs2.min.js"></script>
<script src="/APTSecUI/Public/css/assets/js/jquery.nestable.min.js"></script>
<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
<script src="/APTSecUI/Public/css/assets/js/excanvas.min.js"></script>
<![endif]-->

<script src="/APTSecUI/Public/css/assets/js/jquery-ui-1.10.3.custom.min.js"></script>
<script src="/APTSecUI/Public/css/assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="/APTSecUI/Public/css/assets/js/chosen.jquery.min.js"></script>
<script src="/APTSecUI/Public/css/assets/js/fuelux/fuelux.spinner.min.js"></script>
<!--<script src="/APTSecUI/Public/css/assets/js/date-time/bootstrap-datepicker.min.js"></script>-->
<script src="/APTSecUI/Public/css/assets/js/date-time/bootstrap-datepicker.min.js"></script>
<script src="/APTSecUI/Public/css/assets/js/date-time/bootstrap-timepicker.min.js"></script>
<script src="/APTSecUI/Public/css/assets/js/date-time/moment.min.js"></script>
<script src="/APTSecUI/Public/css/assets/js/date-time/daterangepicker.min.js"></script>
<script src="/APTSecUI/Public/css/assets/js/datetimepicker/datetimepicker.min.js"></script>
<script src="/APTSecUI/Public/css/assets/js/bootstrap-colorpicker.min.js"></script>
<script src="/APTSecUI/Public/css/assets/js/jquery.knob.min.js"></script>
<script src="/APTSecUI/Public/css/assets/js/jquery.autosize.min.js"></script>
<script src="/APTSecUI/Public/css/assets/js/jquery.inputlimiter.1.3.1.min.js"></script>
<script src="/APTSecUI/Public/css/assets/js/jquery.maskedinput.min.js"></script>
<script src="/APTSecUI/Public/css/assets/js/bootstrap-tag.min.js"></script>

<!-- ace scripts -->

<script src="/APTSecUI/Public/css/assets/js/ace-elements.min.js"></script>
<script src="/APTSecUI/Public/css/assets/js/ace.min.js"></script>
<script src="/APTSecUI/Public/css/assets/js/jquery.ipaddress.js"></script>
<script src="/APTSecUI/Public/js/data.js"></script>
<script src="/APTSecUI/Public/js/moment.min.js"></script>
<script src="/APTSecUI/Public/js/daterangepicker.js"></script>
<!--<script src="/APTSecUI/Public/js/jquery.bootstrap-duallistbox.js"></script>-->


<script type="text/javascript" src="/APTSecUI/Public/css/assets/js/ztreejs/jquery.ztree.core-3.5.js"></script>
<script type="text/javascript" src="/APTSecUI/Public/css/assets/js/ztreejs/jquery.ztree.excheck-3.5.js"></script>

<script type="text/javascript" src="/APTSecUI/Public/js/jquery.form.js"></script>
<script type="text/javascript" src="/APTSecUI/Public/js/main.js"></script>
<script type="text/javascript" src="/APTSecUI/Public/js/city.js"></script>
<script type="text/javascript" src="/APTSecUI/Public/js/layer/layer.js"></script>
<script type="text/javascript" src="/APTSecUI/Public/js/laytpl/laytpl.js"></script>
<script src="/APTSecUI/Public/js/person.js"></script>
<script src="/APTSecUI/Public/js/tinyselect.js"></script>

<!-- inline scripts related to this page -->

<script type="text/javascript">


  $(".closePop").css("cursor", "pointer").click(function () {
    $("#fade").hide();
    $("#table :checked").attr('checked', false);
  });
  (function (Highcharts) {
    var each = Highcharts.each;

    Highcharts.wrap(Highcharts.Legend.prototype, 'renderItem', function (proceed, item) {

      proceed.call(this, item);


      var series  = this.chart.series,
          element = item.legendGroup.element;

      element.onmouseover = function () {
        each(series, function (seriesItem) {
          if (seriesItem !== item) {
            each(['group', 'markerGroup'], function (group) {
              seriesItem[group].attr('opacity', 0.05);
            });
          }
        });
      }
      element.onmouseout  = function () {
        each(series, function (seriesItem) {
          if (seriesItem !== item) {
            each(['group', 'markerGroup'], function (group) {
              seriesItem[group].attr('opacity', 1);
            });
          }
        });
      }

    });
  }(Highcharts));

///////////////////////------//////////////////////
  jQuery(function ($) {
    $('.dd').nestable('width:100%');
    $('.dd-handle a').on('mousedown', function (e) {
      e.stopPropagation();
    });
    $(".chosen-select").chosen({width: "inherit"});
    $('#ip').ipaddress();
    $('table th input:checkbox').on('click', function () {
      var that = this;
      $(this).closest('table').find('tr > td:first-child input:checkbox')
        .each(function () {
          this.checked = that.checked;
          $(this).closest('tr').toggleClass('selected');
        });

    });


    // $('#web_button').click(function(){
    //    var webdata = $('#web_form').serialize();
    //    send('/APTSecUI/index.php/Home/Safe/add_web',webdata);
    // });

    //$('#base_info_button').on('click',function(){

    $('.date-picker').datepicker({autoclose: true, language: 'zh-CN'}).next().on(ace.click_event, function () {
      $(this).prev().focus();
    });


    $(document).on('change', '.condition', function () {
      var $this = $(this);
      var th = $(this).val();
      $this.next("select.san").remove();
      if (th == 'user') {
        if ($(this).next().attr('name') == 'sub_type[]') {
          $(this).next().remove();
        }
        $(this).after('<select name="sub_type[]">' +
          '<option value="static">静态用户</option>' +
          '<option value="dial">账号用户</option>' +
          '<option value="link">链路ID</option>' +
          '</select>');
        $(this).next("[name='sub_type[]']").bind("change", function () {
          var $this = $(this);
          $this.next("input").remove();
          $this.next("select").remove();
          if ($this.val() == "link"){
            syncPost("<?= U("Home/Vlan/link_list")?>",{},function (data) {
              var select = $("<select class='san' name='value[]'>")
              $.each(data, function (k, v) {
                select.append($("<option>").attr("value", v.id).text(v.link_name))
              });
              $this.after(select);
            });
          }else {
            $this.after('<input type="text" name="value[]" required="">');
          }
        });
      } else if (th == 'keyword') {
        if ($(this).next().attr('name') == 'sub_type[]') {
          $(this).next().remove();
        }

        $(this).after('<select name="sub_type[]"><option value="http_content">正文内容</option>' +
          '<option value="attach_title">附件标题</option><option value="attach_content">附件内容</option></select>');
      } else if (th == 'src_area') {
        if ($(this).next().attr('name') == 'sub_type[]') {
          $(this).next().remove();
        }

        $(this).after('<select name="sub_type[]"><option value="area_name">区域名称</option>' +
          '<option value="as_num">AS号</option></select>');
      } else if (th == 'src_area') {
        if ($(this).next().attr('name') == 'sub_type[]') {
          $(this).next().remove();
        }


        $(this).after('<select name="sub_type[]"><option value="area_name">区域名称</option>' +
          '<option value="as_num">AS号</option></select>');
      } else {
        if ($(this).next().attr('name') == 'sub_type[]') {
          $(this).next().remove();
        }
      }

    });


    $('.icon-plus').click(function () {
      $('.icon-plus').parent().parent().after("<div class='form-group'>" +
        "<label class='col-sm-3 control-label no-padding-right'></label>" +
        "<div class='col-sm-9'><span class='input-icon input-icon-right'>" +
        "<select  class='condition' name='condition[]' required='required'></select> " +
        "<input type='text' name='value[]' required='required' />" +
        "<i class='icon-filter blue'></i></span> " +
        "<i style='cursor:pointer' class='icon-minus red'></i></div></div>");
      var content = $('.icon-plus').parent().children().children().eq(0).html();
      $('.icon-plus').parent().parent().next().find('select').append(content);
    });

    $(document).on('click', '.icon-minus', function () {
      $(this).parent().parent().remove();
    });


  });



  $('.pre').click(function () {
    var id = $('.pre').next().val();
    //alert('xmlx');
    window.location.href = '<?php echo U('
    User / authorize
    ');?>' + '?id=' + id;
  });

  $("#logout").click(function () {
    window.location.href = "/APTSecUI/index.php/Login/logout";
  });

  $(document).ready(function () {
    Wind.css('treeTable');
    Wind.use('treeTable', function () {
      $("#menus-table").treeTable({
        indent: 20
      });
    });

    $('#datepicker1').timepicker({
      minuteStep  : 1,
      showSeconds : false,
      showMeridian: false
    }).next().on(ace.click_event, function () {
      $(this).prev().focus();
    });

    $('#datepicker2').timepicker({
      minuteStep  : 1,
      showSeconds : false,
      showMeridian: false
    }).next().on(ace.click_event, function () {
      $(this).prev().focus();
    });
  });

  function checknode(obj) {
    var chk       = $("input[type='checkbox']");
    var count     = chk.length;
    var num       = chk.index(obj);
    var level_top = level_bottom = chk.eq(num).attr('level');
    for (var i = num; i >= 0; i--) {
      var le = chk.eq(i).attr('level');
      if (eval(le) < eval(level_top)) {
        chk.eq(i).attr("checked", true);
        var level_top = level_top - 1;
      }
    }
    for (var j = num + 1; j < count; j++) {
      var le = chk.eq(j).attr('level');
      if (chk.eq(num).attr("checked") == "checked") {
        if (eval(le) > eval(level_bottom)) {
          chk.eq(j).attr("checked", true);
        }
        else if (eval(le) == eval(level_bottom)) {
          break;
        }
      } else {
        if (eval(le) > eval(level_bottom)) {
          chk.eq(j).attr("checked", false);
        } else if (eval(le) == eval(level_bottom)) {
          break;
        }
      }
    }
  }

  function delSelect() {
    var checkboxs = document.getElementsByName("checkbox");
    var tr        = table.getElementsByTagName("tr");
    for (var i = 0; i < checkboxs.length; i++) {
      if (tr.length == 2) {
        checkboxs[i].checked = false;
        return;
      }
      if (checkboxs[i].checked == true) {
        removeTr(checkboxs[i]);
        i = -1;
      }
    }
  }


</script>

<!--[if lte IE 8]>
<div id="ie678-warning" style="z-index: 10000;">您的浏览器版本过低，无法体验所有功能，建议升级或者更换浏览器。 <a href="http://browsehappy.com/">了解更多...</a>
</div>
<script type="text/javascript">
  var b_name = navigator.appName;
  var b_version = navigator.appVersion;
  var version = b_version.split(";");
  var trim_version = version[1].replace(/[ ]/g, "");
  var el = document.getElementById("ie678-warning");
  if (b_name == "Microsoft Internet Explorer") {
    /*如果是IE6或者IE7*/
    if (trim_version == "MSIE7.0" || trim_version == "MSIE6.0" || trim_version == "MSIE8.0") {

      window.onscroll = function () {
        el.style.top  = (document.documentElement.scrollTop) + "px";
        el.style.left = (document.documentElement.scrollLeft) + "px";
      }
    }
  }


</script>
<![endif]-->

</body>
</html>