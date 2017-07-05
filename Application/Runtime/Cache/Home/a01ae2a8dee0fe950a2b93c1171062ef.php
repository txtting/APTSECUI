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

    <div id="addUser" class="popLayer">
        <div class="breadcrumbs">
            <ul class="breadcrumb">
                <li>添加收件人</li>
            </ul>
            <!-- .breadcrumb -->
            <span class="floatRig closePop">关闭</span>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xs-win">
                    <!-- PAGE CONTENT BEGINS -->
                    <form style="position:relative;margin-top:20px;" id="addUser_form" class="form-horizontal" role="form">

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right"> 姓名： </label>

                            <div class="col-sm-9">
                                <input type="text" name="name" placeholder="收件人姓名"  pattern="^\S{1,18}$"  title="请输入1-18位字符" class="col-xs-10 col-sm-5" required/>
                            </div>
                        </div>

                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right"> 邮箱：</label>

                            <div class="col-sm-9">
                                <input type="email" name="email" class="col-xs-10 col-sm-5" pattern="^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+" required/>
                            </div>
                        </div>
                        <div class="space-4"></div>

                        <!-- <input type="hidden" name="id" value="<?php echo ($template_data['id']); ?>" /> -->
                        <div class="clearfix form-actions">
                            <div>
                                <button class="btn btn-info" type="submit">
                                    <i class="icon-ok bigger-110"></i>
                                    提交
                                </button>

                                &nbsp; &nbsp; &nbsp;
                                <button class="btn" type="reset">
                                    <i class="icon-undo bigger-110"></i>
                                    重置
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </div>
    <div id="editeUser" class="popLayer">
        <div class="breadcrumbs">
            <ul class="breadcrumb">
                <li>编辑收件人</li>
            </ul>
            <!-- .breadcrumb -->
            <span class="floatRig closePop">关闭</span>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xs-win">
                    <!-- PAGE CONTENT BEGINS -->
                    <form style="position:relative;margin-top:20px;" id="user_edite_form" class="form-horizontal" role="form">

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right"> 姓名： </label>

                            <div class="col-sm-9">

                                <input type="text" name="name" id="edite_user" placeholder="收件人姓名" pattern="^\S{1,18}$"  title="请输入小于1-18位字符" class="col-xs-10 col-sm-5"
                                       required/>

                            </div>
                        </div>


                        <div class="space-4"></div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right"> 邮箱： </label>

                            <div class="col-sm-9">

                                <input type="email" name="email" id="edite_email" class="col-xs-10 col-sm-5" pattern="^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+" required/>

                            </div>
                        </div>

                        <div class="space-4"></div>
                        <div class="clearfix form-actions">
                            <div>
                                <button class="btn btn-info user_edite" type="submit">
                                    <i class="icon-ok bigger-110"></i>
                                    提交
                                </button>

                                <button class="btn" type="reset">
                                    <i class="icon-undo bigger-110"></i>
                                    重置
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </div>
    <div id="delUser" class="popLayer" style="top:100px;left:50%;width: 40%;margin-left:-20%;">
        <div class="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    删除用户
                </li>
            </ul>
            <!-- .breadcrumb -->
            <span class="floatRig closePop">关闭</span>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xs-win">
                    <!-- PAGE CONTENT BEGINS -->
                    <form style="position:relative;top:20px;" id="user_delete_form" class="form-horizontal" role="form">

                        <div class="form-group">
                            <label class="col-sm-4 control-label no-padding-right"> 确定要删除此用户？ </label>
                        </div>

                        <input type="hidden" id="id"  />
                        <div class="clearfix form-actions">
                            <div>
                                <button class="allusers btn btn-danger" >
                                    <i class="icon-remove  bigger-110 "></i>
                                    删除
                                </button>
                                &nbsp; &nbsp; &nbsp;
                                <button class="btn closePop" type="reset">
                                    <i class="icon-undo bigger-110"></i>
                                    取消
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </div>
    <div id="fade" class="black_overlay"></div>

    <div class="breadcrumbs" id="breadcrumbs">
        <script type="text/javascript">
            try {
                ace.settings.check('breadcrumbs', 'fixed')
            } catch (e) {
            }
        </script>

        <ul class="breadcrumb">
            <li>
                设置
            </li>
            <li class="active">安全报表推送</li>
        </ul>
        <!-- .breadcrumb -->
        <!-- #nav-search -->
    </div>
    <div class="col-sm-12">
        <div class="row">
            <div class="col-xs-12">

                <!--主要内容-->
                <!--<div class="table-responsive">-->
                <div class="formArea marT10">
                    <!--<laber></laber>-->
                    <div class="topName marT10 col-xs-12" style="padding-left: 15px;">
                        <label style="vertical-align:baseline;width: 69px; margin-left: -5px;">日报名称：</label>
                        <input type="text" class="name" id="nameStyle" value="我的安全感知系统日报" disabled/>
                        <a href="#" class="alter dailyStyle">修改</a>
                    </div>
                    <div class="holder marT10 col-xs-12" style="padding-left: 15px">
                        <label class="" style="float:left;width: 69px;">发送日报：</label>
						<div class="center" style="float: left;margin-left: 5px;">
							<input type="checkbox" id="checkbox-11-1" style="display: none;"/>
							<label for="checkbox-11-1"></label>
						</div>
                        <div class="clearBoth"></div>
					</div>
                    <div class="clearBoth"></div>
                    <!-- 收件人表格-->
                   <div class="recipients marT10" style="padding-left: 15px">
                       <label style="float: left;width: 69px;">收件人：</label>
                       <div >
                           <a href="#" class="dailyStyle" id="userAdd"><i class="icon-plus-sign bigger-120"></i>添加收件人</a>
                           <!--<label style="float: left"><i class="icon-plus-sign bigger-120 green"></i>添加收件人：</label>-->
                           <div style="margin: 10px 0px 10px 77px; width: 90%;">
                               <table id="table" class="table table-striped table-bordered table-hover">
                                   <thead>
                                   <tr>
                                       <th>姓名</th>
                                       <th>邮箱</th>
                                       <th>操作</th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   <tr>
                                       <td>admin</td>
                                       <td>admin@163.com</td>
                                       <td>
                                           <a class="green editeUser" href="javascript:;" title="编辑">
                                               <i class="icon-pencil bigger-130"></i>
                                           </a>

                                           <a class="red deleteuser"  href="javascript:;" title="删除">

                                               <i class="icon-trash bigger-130"></i>
                                           </a>
                                       </td>
                                   </tr>
                                   </tbody>
                                   </table>
                           </div>
                       </div>
                    </div>
                    <!--邮件模板-->
                    <div class="recipients marT10" style="padding-left: 15px" id="sendmail">
                        <label style="width: 69px;float: left;">邮件模板：</label>
						<style>
							#nameStyle{
								border: 0px;
								background: #ffffff
							}
							.dailyStyle{
								color: #00B4C5;
								font-size: 13px;
							}
							.aptTable .navBar{
								height: 35px;
								margin-left: -0.5px;
								background: black;
								padding-right: 20px;
							}
							.aptTable .navBar li{
								font-size: 13px;
								margin: 10px 0;
								padding: 0 8px;
								line-height: 15px;
								height: 15px;
								float: right;
								list-style: none;
								border-right: 1px solid #fff;
								cursor:pointer;
							}
							.aptTable .navBar a{
								text-decoration: none;
								color: #EFF0EB;
							}
							.aptTable .navBar a:hover{
								color: #fff;
							}
							.aptTable .navBar li:first-child{
								border: none;
							}
							.aptTable .navBar li:after{
								content: "";
								clear: both;
								display: block;
							}
							.aptTable .navBar li{
								zoom: 1;
							}
							.aptTable .wrapper>div{
								padding-left: 20px;
								padding-right: 20px;
							}
							.aptTable .process{
								height: 82px;
							}
							.aptTable .process .box, .col-sm-12 .row .col-xs-12 .aptTable .score{
								float: left;
							}
							.aptTable .process .box{
								padding: 16px 20px 20px 0;
								width: 26%;
							}
							.aptTable .process .box img{
								width: 273px;
								height: auto;
							}
							.aptTable .score{
								width: 74%;
							}
							.aptTable .process .score .todayScore{
								font-size: 13px;
								color: #86827B;
								padding-top: 16px;
							}
							.aptTable .process .score .number{
								font-size: 25px;
								color: #00C1FF;
							}
							.aptTable .block{
								padding: 0 0 45px 20px;
							}
							.aptTable .block .express{
								width: 41%;
								height: 65px;
								background: #454544;
								color: #888783;
								border-radius: 5px;
								font-size: 13px;
								padding: 10px;
							}
							.aptTable .count .todayCount{
								font-size: 18px;
								color: #807D72;
							}
							.aptTable .underline{
								height: 1px;
								border: 2px solid #007151;
								width: 110px;
							}
							.aptTable .smallGreen{
								width: 74px;
							}
							.aptTable .content {
								width: 100%;
								padding-bottom: 40px;
							}
							.aptTable .content .chose{
								width: 100%;
								height:30px;
								margin-bottom: 20px;
							}
							.aptTable .content .chooseBtn{
								width: 100px;
								height:30px;
								line-height: 30px;
								font-size: 15px;
								background: #007151;
								text-align: center;
								border-radius: 3px;
								float: right;
							}
							.aptTable .content .chooseBtn:hover{
								background: #479E38;
							}
							.aptTable .content .mainBlock{
								display: inline-block;
								width: 16.377%;
							}
							.aptTable .content .line, .col-sm-12 .row .col-xs-12 .aptTable .content .section{
								width: 100%;
							}
							.aptTable .content .line span{
								font-size: 13px;
								padding: 10px 40px 10px 0;
								display: inline-block;
								color: #EFF0EB;
							}
							.aptTable .content .section .stock{
								font-size: 13px;
								display: inline-block;
								height: 48px;
								line-height: 48px;
								width: 100%;
								color: #EFF0EB;
								background: #00B6C2;
							}
							.aptTable .content .section .stock .num{
								font-size: 18px;
								padding-right: 4px;
								display: inline-block;
							}
							.aptTable .wrapper .event{
								padding-top: 15px;
								padding-bottom: 30px;
							}
							.aptTable .wrapper .event table{
								width: 100%;
							}
							.aptTable .wrapper .event td{
								font-size:15px;
								border: 1px solid #00B6C2;
								padding-left: 20px;
								width: 50%;
							}
							.aptTable .wrapper .event .eventType{
								color: #807D72;
							}
							.aptTable .wrapper .event .eventSeries{
								color:#EEF0EB;
							}
							@media only screen and (min-device-width: 320px){
								div, span, li{
									font-size: 10px!important;
								}
								.aptTable .navBar {
									padding-right: 10px;
									padding-left: 8px;
								}
								.aptTable .navBar li {
									padding: 0 0.5px;
								}
								.aptTable .wrapper>div {
									padding-left: 10px;
									padding-right: 10px;
								}
								.aptTable .content .chose {
									margin-bottom: 0px;
								}
								.aptTable .content .section .stock {
									height: 35px;
									line-height: 35px;
								}
								.aptTable .process {
									width: 95%;
									height: 60px;
								}
								.aptTable .process .box {
									padding: 10px 32px 20px 0;
									width: 43%;
								}
								.aptTable .process .box img {
									width: 140px;
								}
								.aptTable .score {
									width: 45%!important;
								}
								.aptTable .process .score .todayScore {
									padding-top: 10px;
								}
								.aptTable .process .score .number {
									font-size: 22px!important;
								}
								.aptTable .wrapper>div{
									padding-left: 10px;
									padding-right: 10px;
								}
								.aptTable .block {
									padding: 0 0 28px 20px;
								}
								.aptTable .block .express {
									width: 65%;
									height: 56px;
								}
								.aptTable .count .todayCount {
									font-size: 14px;
								}
								.aptTable .underline{
									height: 0px;
									width: 82px;
								}
								.aptTable .content .mainBlock {
									width: 14.89%;
								}
								.aptTable .content{
									width: 94%;
									padding-bottom: 35px;
								}
								.aptTable .content .line span{
									padding: 15px 0 15px 0;
								}
								.aptTable .smallGreen {
									width: 50px;
								}
								.aptTable .wrapper .event table {
									border-collapse: collapse;
									width:100%;
								}
								.aptTable .wrapper .event td {
									font-size: 10px;
									padding-left: 0;
									width: 0;
								}
							}

							@media only screen and (min-device-width: 360px)and (-webkit-min-device-pixel-ratio: 2) {
								div, span, li{
									font-size: 12px!important;
								}
								.aptTable .content .mainBlock {
									width: 14.97%;
								}
								.aptTable .content .section .stock .num {
									font-size: 18px!important;
								}
								.aptTable .process .box img {
									width: 170px;
								}
								.aptTable .process .score .number {
									font-size: 25px!important;
								}
								.aptTable .content .section .stock {
									height: 40px;
									line-height: 40px;
								}
							}
							@media (min-device-width:411px) and (min-device-width:412px) {
								div, span, li{
									font-size: 13px!important;
								}
								.aptTable .content .section .stock {
									height: 40px;
									line-height: 40px;
								}
								.aptTable .process .score .number {
									font-size: 25px!important;
								}
								.aptTable .wrapper .event td {
									width: 0;
									padding: 3px;
								}
								.aptTable .smallGreen {
									width: 56px;
								}
							}
							@media only screen and (min-device-width:414px) and (-webkit-min-device-pixel-ratio: 3) {
								div, span, li{
									font-size: 13px!important;
								}
								.aptTable .navBar li {
									padding: 0 2px!important;
								}
								.aptTable .smallGreen {
									width: 56px;
								}
								.aptTable .block .express {
									height: 68px;
								}
								.aptTable .process .score .number {
									font-size: 26px!important;
								}
								.aptTable .wrapper .event td {
									width: 0;
									padding: 3px;
								}
								.aptTable .content .line span{
									padding: 15px 0 15px 0;
								}
								.aptTable .content .section .stock {
									height: 50px;
									line-height: 50px;
								}
							}
							@media (min-device-width:767px) and (max-device-width:1023px){
								.aptTable .navBar {
									padding-right: 20px;
								}
								.aptTable .navBar li {
									padding: 0 5px;
								}
								.aptTable .process .box img {
									width: 260px;
								}
								.aptTable .process .box {
									width: 35%;
								}
								.aptTable .process {
									height: 79px;
								}
								.aptTable .content .mainBlock {
									width: 15.78%;
								}
								.aptTable .process .score .number {
									font-size: 38px!important;
								}
								.aptTable .block .express {
									width: 38%;
									height: 70px;
								}
								.aptTable .block .express {
									width: 61%;
									height: 38px;
								}
								.aptTable .process .box {
									padding: 15px 32px 5px 0;
								}
								.aptTable .wrapper>div {
									padding-left: 20px;
									padding-right: 20px;
								}
								.aptTable .wrapper .event td {
									width: 50%;
								}
								.aptTable .content .section .stock .num {
									font-size: 18px!important;
								}
							}
							@media (min-device-width:1024px){
								div, span, li{
									font-size: 13px!important;
								}
								.aptTable .process {
									height: 80px;
								}
								.aptTable .navBar li {
									padding: 0 9px;
								}
								.aptTable .process .score .number {
									font-size: 38px!important;
								}
								.aptTable .content {
									width: 97%;
								}
								.aptTable .process .box {
									width: 33%;
								}
								.aptTable .process .box img {
									width: 290px;
								}
								.aptTable .block .express {
									width: 48%;
									height:65px;
									padding: 10px;
								}
								.aptTable .navBar {
									padding-right: 20px!important;
									padding-left: 20px!important;
								}
								.aptTable .wrapper>div {
									padding-left: 20px!important;
									padding-right: 20px!important;
								}
								.aptTable .content .mainBlock {
									width: 16.18%;
								}
								.aptTable .wrapper .event td {
									width: 50%;
								}
								.aptTable .underline {
									width: 102px;
								}
								.aptTable .smallGreen {
									width: 72px;
								}
							}
						</style>
                        <div class="aptTable span10 marT10" style="background:#252723;padding:0px;float: left;width: 90%; margin-left: 8px;">
                                <ul class="navBar">
									<li style="padding-right: 0px;"><a href="/APTSecUI/index.php/Safe/scanevent">扫描事件</a></li>
									<li><a href="/APTSecUI/index.php/Safe/malicioust">暴力破解</a></li>
									<li><a href="/APTSecUI/index.php/Safe/bruteforce">恶意流量</a></li>
									<li><a href="/APTSecUI/index.php/Safe/file">文件威胁</a></li>
									<li><a href="/APTSecUI/index.php/Safe/index">HTTP流量</a></li>
									<li><a href="/APTSecUI/index.php/Urgent/index">紧急事件</a></li>
									<li><a href="/APTSecUI/index.php/Vir/index">首页</a></li>
                                </ul>
                                <div class="wrapper">
                                    <div class="process">
                                        <div class="box" style="width: 30%;min-width: 276px">
                                            <img src="/APTSecUI/Public/css/assets/images/score/1.jpg">
                                        </div>
                                        <div class="score">
                                            <div class="todayScore">
                                                今日安全得分
                                            </div>
                                            <div class="number">
                                                69分
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block">
                                        <div class="express">
                                            得分是通过今日一天安全数据，如：紧急事件，漏洞，弱点，攻击，信息泄露
                                            威胁等因素综合计算得出，代表了今天的安全指数
                                        </div>
                                    </div>
                                    <div class="count">
                                        <div class="todayCount">
                                            今日安全统计
                                        </div>
                                        <div class="underline"></div>
                                    </div>
                                    <div class="content">
                                    <?php if(is_array($attack)): $i = 0; $__LIST__ = $attack;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$attack_vo): $mod = ($i % 2 );++$i;?><!--  -->
                            <div class="mainBlock" id="<?php echo ($attack_vo["id"]); ?>" style="margin-left: -1px;">
                                <div class="line">
                                    <span>
                                        <?php echo ($attack_vo["name"]); ?>
                                    </span>
                                </div>
                                <div class="section">
                                    <a href="javascript:;">
                                        <span class="stock">
                                            <span class="num"><?php echo ($attack_vo["attack"]); ?></span><span>次</span>
                                        </span>
                                    </a>
                                </div>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                        <!-- <div class="mainBlock" style="margin-left: -5px;">
                                            <div class="line">
                                                <span>
                                                    网络异常连接
                                                </span>
                                            </div>
                                            <div class="section">
                                                <a href="javascript:;">
                                                <span class="stock">
                                                    <span class="num">0</span><span>次</span>
                                                </span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="mainBlock">
                                            <div class="line">
                                                <span>
                                                    DDos攻击
                                                </span>
                                            </div>
                                            <div class="section">
                                                <a href="javascript:;">
                                                <span class="stock">
                                                    <span class="num">0</span><span>次</span>
                                                </span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="mainBlock">
                                            <div class="line">
                                                            				<span>
                                                            					未授权下载
                                                            				</span>
                                            </div>
                                            <div class="section">
                                                <a href="javascript:;">
                                        	                    				<span class="stock">
                                        		                    				<span class="num">0</span><span>次</span>
                                        		                    			</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="mainBlock">
                                            <div class="line">
                                                            				<span>
                                                            					非法登录
                                                            				</span>
                                            </div>
                                            <div class="section">
                                                <a href="javascript:;">
                                        	                    				<span class="stock">
                                        		                    				<span class="num">0</span><span>次</span>
                                        		                    			</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="mainBlock">
                                            <div class="line">
                                                            				<span>
                                                            					页面被篡改
                                                            				</span>
                                            </div>
                                            <div class="section">
                                                <a href="javascript:;">
                                        	                    				<span class="stock">
                                        		                    				<span class="num">0</span><span>次</span>
                                        		                    			</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="mainBlock">
                                            <div class="line">
                                                            				<span>
                                                            					攻击次数
                                                            				</span>
                                            </div>
                                            <div class="section">
                                                <a href="javascript:;">
                                        	                    				<span class="stock">
                                        		                    				<span class="num">75</span><span>次</span>
                                        		                    			</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="mainBlock">
                                            <div class="line">
                                                            				<span>
                                                            					发现后门
                                                            				</span>
                                            </div>
                                            <div class="section">
                                                <a href="javascript:;">
                                        	                    				<span class="stock">
                                        		                    				<span class="num">0</span><span>次</span>
                                        		                    			</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="mainBlock">
                                            <div class="line">
                                                            				<span>
                                                            					暴力破解成功
                                                            				</span>
                                            </div>
                                            <div class="section">
                                                <a href="javascript:;">
                                        	                    				<span class="stock">
                                        		                    				<span class="num">0</span><span>次</span>
                                        		                    			</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="mainBlock">
                                            <div class="line">
                                                            				<span>
                                                            					肉鸡行动
                                                            				</span>
                                            </div>
                                            <div class="section">
                                                <a href="javascript:;">
                                        	                    				<span class="stock">
                                        		                    				<span class="num">1</span><span>次</span>
                                        		                    			</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="mainBlock">
                                            <div class="line">
                                                            				<span>
                                                            					发现漏洞
                                                            				</span>
                                            </div>
                                            <div class="section">
                                                <a href="javascript:;">
                                        	                    				<span class="stock">
                                        		                    				<span class="num">5</span><span>次</span>
                                        		                    			</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="mainBlock">
                                            <div class="line">
                                                            				<span>
                                                            					发现弱口令
                                                            				</span>
                                            </div>
                                            <div class="section">
                                                <a href="javascript:;">
                                        	                    				<span class="stock">
                                        		                    				<span class="num">0</span><span>次</span>
                                        		                    			</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="mainBlock">
                                            <div class="line">
                                                            				<span>
                                                            					新发现资产
                                                            				</span>
                                            </div>
                                            <div class="section">
                                                <a href="javascript:;">
                                        	                    				<span class="stock">
                                        		                    				<span class="num">2</span><span>次</span>
                                        		                    			</span>
                                                </a>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="count">
                                        <div class="todayCount">
                                            重点关注
                                        </div>
                                        <div class="underline smallGreen"></div>
                                    </div>
                                    <div class="event">
                                        <table>
                                            <tr>
                                                <td>
                                                    <span class="eventType">事件类型：</span><span class="eventSeries">肉鸡行动</span>
                                                </td>
                                                <td>
                                                    <span class="eventType">受影响资产：</span><span class="eventSeries">(ECS)12345678</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="eventType">事件类型：</span><span class="eventSeries">肉鸡行动</span>
                                                </td>
                                                <td>
                                                    <span class="eventType">受影响资产：</span><span class="eventSeries">(ECS)12345678</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="eventType">事件类型：</span><span class="eventSeries">肉鸡行动</span>
                                                </td>
                                                <td>
                                                    <span class="eventType">受影响资产：</span><span class="eventSeries">(ECS)12345678</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="eventType">事件类型：</span><span class="eventSeries">肉鸡行动</span>
                                                </td>
                                                <td>
                                                    <span class="eventType">受影响资产：</span><span class="eventSeries">(ECS)12345678</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                    	</div>
                    	<div class="clearBoth"></div>
                    </div>
                    
            </div>
        </div>

    </div>
</div>
<script>
    //    点击修改输入框显示
    $('.alter').on('click',function(){
        $('.name').removeAttr("disabled");
        $('.name').attr('id',"");
		$('.name').focus();
    })
    //输入框失去焦点时触发
    $('.name').on('focusout',function(){
        $('.name').attr("disabled","disabled");
        $('.name').attr('id',"nameStyle");
    })
//添加用户
    $(document).on("click","#userAdd",function(){
        $("#addUser").show();
        $("#fade").show();
        return false
    });

    $('#addUser_form').submit(function(e){
        e.stopPropagation();
        e.preventDefault();
        var data = $('#addUser_form').serialize();
        var checkVal= $('#ischeck input').serialize();
        $("#addUser").hide();
        $("#fade").hide();
        $('#addUser_form')[0].reset();
    })

    $(".closePop").css("cursor", "pointer").click(function () {
        $("#addUser").hide();
        $("#delUser").hide();
        $("#editeUser").hide();
        $("#fade").hide();
        $(":checked").attr('checked',false);
    });
//    编辑用户
    $(document).on("click",".editeUser",function(){
        var row = $(this).parents('tr');
        var user_status = $(this).parents('td').prev('td').attr('data');
        $("#edite_user").val(row.children('td:eq(0)').html());
        $("#edite_email").val(row.children('td:eq(1)').html());
        var id = $(this).next().next().val();
        $("#editeUser").show();
        $("#fade").show();
        return false
    });
    //重置.mainBlock的hover样式
    $(".section .stock").each(function () {
        $(".section .stock").hover(function(){
             $(this).css("background-color","#00B6C2");
        })
    })
    $('#user_edite_form').submit(function(e){
        e.stopPropagation();
        e.preventDefault();
        var editeUser_data = $('#user_edite_form').serialize();
        $("#editeUser").hide();
        $("#fade").hide();
           /* $.ajax({
                url:'/APTSecUI/index.php/Home/Setting/do_user_edite',
                type:'POST',
                dataType:'json',
                data:editeUser_data,
                success:function(data){
                    if(data.status=='success'){
                        $("#editeUser").hide();
                        $("#fade").hide();
                        $('#user_edite_form')[0].reset();
                        layer.msg("编辑成功");
                        window.location.reload();
                    }else if(data.status=='1'){
                        layer.msg(data.msg);
                    }else{
                        layer.msg(data.msg);
                    }
                }
            });*/
    });
    $(document).on("click",".deleteuser",function(){
        $("#delUser").show();
        $("#fade").show();
        return false;
    });
    $('#user_delete_form').submit(function(e){
        e.stopPropagation();
        e.preventDefault();
       
        $("#delUser").hide();
        $("#fade").hide();
       /* $.ajax({
            url:'/APTSecUI/index.php/Home/Setting/user_delete',
            type:'POST',
            dataType:'json',
            data:{'id':id},
            success:function(data){
                if(data.status=='success'){
                    $("#delUser").hide();
                    $("#fade").hide();
                    $('#user_delete_form')[0].reset();
                    layer.msg(data.msg);
                    window.location.reload();
                    $(":checked").attr('checked',false);
                }else{
                    $("#delUser").hide();
                    $("#fade").hide();
                    $(":checked").attr('checked',false);
                    layer.msg(data.msg);
                }
            }
        });*/
    });

    
//判断开关按钮情况
	var i=0;
	$("#checkbox-11-1").click(function () {
		i++;	
		if(i%2 == 1){
//			console.log(i);
			      
		}else{
//			console.log(i);
			console.log("关闭");
		}	
	})


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
    //    send('/APTSecUI/index.php/Home/Setting/add_web',webdata);
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