<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>
		Medical Borrowing
	</title>
	<!-- tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- bootstrap 3.3.4-->
	<?php echo link_tag('bootstrap/css/bootstrap.min.css'); ?>
	<!-- font awesome icons-->
	<?php echo link_tag('bootstrap/css/font-awesome.min.css'); ?>
	<!-- ionicons-->
	<?php echo link_tag('bootstrap/css/ionicons.min.css'); ?>
	<!--Theme style-->
	<?php echo link_tag('dist/css/AdminLTE.min.css'); ?>
	<!--Theme skin -->
	<?php echo link_tag('dist/css/skins/skin-red.min.css'); ?>
	<!--Theme skin -->
	<?php  echo link_tag('plugins/datatables/dataTables.bootstrap.css'); ?>
	<?php  //echo link_tag('plugins/datatables/dataTables.js'); ?>
	<!--My Custom-->
	<?php echo link_tag('dist/css/mycustom.css'); ?>
	<!-- font -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>dist/css/mycustom.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Charm&family=IBM+Plex+Sans+Thai:wght@300&family=Itim&family=Mochiy+Pop+One&family=Pattaya&family=Prompt:wght@100&family=Thasadith&display=swap" rel="stylesheet">
	<!-- REQUIRED JS SCRIPTS -->
	<!-- jQuery 2.1.4 -->
	<script src="<?php echo base_url(); ?>plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript">
	</script>
	<script src="<?php echo base_url(); ?>plugins/datatables/jquery.dataTables.min.js" type="text/javascript">
	</script>
	<script src="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript">
	</script>
	<!-- Bootstrap 3.3.2 JS -->
	<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js" type="text/javascript">
	</script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url(); ?>dist/js/app.min.js" type="text/javascript">
	</script>
	<!-- ckeditor-->
	<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
	<!-- Sweet Alert-ok -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<style type="text/css">
		.fr{color: red;}
	</style>
	<script>
		function myFunction() {
			var x = document.getElementById("myInput");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		}
	</script>

</head>
<body class="skin-red sidebar-mini">
	<div class="wrapper">
		<!-- Main Header -->
		<header class="main-header">
			<!-- Logo -->
			<a href="<?php site_url(); ?>" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini">
					<b>
						MB
					</b>
				</span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg">
					<b>
						Medical Borrow
					</b>
				</span>
			</a>
			<!-- Header Navbar -->
			<nav class="navbar navbar-static-top" role="navigation">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">
						Toggle navigation
					</span>
				</a>
				<!-- Navbar Right Menu -->
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- User Account Menu -->
						<li class="dropdown user user-menu">
							<!-- Menu Toggle Button -->
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<!-- The user image in the navbar-->
								<img src="<?php echo base_url('profile_img/'.$_SESSION['m_img']); ?>" class="user-image" alt="User Image" />
								<!-- hidden-xs hides the username on small devices so only the image appears. -->
								<span class="hidden-xs">
									<?php // echo $this->session->userdata('display_name')?>
								</span>
							</a>
							<ul class="dropdown-menu">
								<!-- The user image in the menu -->
								<li class="user-header">
									<img src="<?php echo base_url('profile_img/'.$_SESSION['m_img']); ?>" class="img-circle" alt="User Image" />

									<p>
										<?php // echo $this->session->userdata('username'); ?>
										<small>
											รูปภาพประจำตัว
										</small>
									</p>
								</li>

								<li class="user-footer">
									<div class="pull-left">
										<a href="<?php echo  site_url('employee/profile'); ?>" class="btn btn-default btn-flat">
											โปรไฟล์
										</a>
									</div>
									<div class="pull-right">
										<a href="<?php echo  site_url('user/logout'); ?>" class="btn btn-default btn-flat">
											ออกจากระบบ
										</a>
									</div>
								</li>
							</ul>
						</li>
						<!-- Control Sidebar Toggle Button -->

					</ul>
				</div>
			</nav>
		</header>
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel">
					<div class="pull-left image">
						<img src="<?php echo base_url('profile_img/'.$_SESSION['m_img']); ?>" class="img-circle" alt="User Image" />
					</div>
					<div class="pull-left info">
						<p>

						</p>
						<!-- Status -->
						<a href="#">
							<i class="fa fa-circle text-success">
							</i>ออนไลน์
						</a>
					</div>
				</div>
				<?php
				$menus = "active";
				?>
				<!-- sidebar menu: : style can be found in sidebar.less -->

				<!-- Admin -->

				<ul class="sidebar-menu">
					<li class="<?php echo $menus;?>">
						<a href="<?php echo site_url('employee');?>">
							<i class="fa fa-home"></i>
							<span>หน้าหลัก</span>
						</a>
						<ul class="treeview-menu">
							<li>
								<a href="<?php echo site_url('employee');?>">
									<i class="fa fa-smile-o" aria-hidden="true"></i> ประวัติยืม-คืน </a>
								</li>
							</ul>
						</li>



						<li class="<?php echo $menus;?>">
							<a href="<?php echo site_url('employee');?>">
								<i class="fa fa-heartbeat" aria-hidden="true"></i>
								<span>อุปกรณ์</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="<?php echo site_url('employee/devices');?>">
										<i class="fa fa-smile-o" aria-hidden="true"></i> รายการอุปกรณ์ </a>
									</li>
								</ul>
							</li>

							<li>
								<a href="ads_type">
									<i class="fa fa-cogs" aria-hidden="true"></i>
									<span>จัดการโปรไฟล์</span>
								</a>
								<ul class="treeview-menu">
									<li>
										<a href="<?php echo site_url('employee/profile');?>">
											<i class="fa fa-user" aria-hidden="true"></i> โปรไฟล์ </a>
										</li>
										<li>
											<a href="<?php echo site_url('employee/pwd');?>">
												<i class="fa fa-key" aria-hidden="true"></i> เปลี่ยนรหัสผ่าน </a>
											</li>
										</ul>
									</li>


									<!-- <li class="<?php //echo $menus;?>">
										<a href="ads_type">
											<i class="fa fa-th" aria-hidden="true"></i>
											<span>จัดการ</span>
										</a>
										<ul class="treeview-menu">
											<li>
												<a href="<?php //echo site_url('employee');?>">
													<i class="fa fa-book" aria-hidden="true"></i> เอกสาร </a>
												</li>

											</ul>
										</li> -->

										<li>
											<a href="ads_type">
												<i class="fa fa-caret-square-o-down" aria-hidden="true"></i>
												<span>ออกจากระบบ</span>
											</a>
											<ul class="treeview-menu">
												<li>
													<a href="<?php echo site_url('user/logout');?>" onclick="return confirm('ยืนยัน');">
														<i class="fa fa-sign-out" aria-hidden="true"></i> sign out </a>
													</li>
												</ul>
											</li>
										</ul><!-- /.sidebar-menu -->
									</section>
									<!-- /.sidebar -->
								</aside>
								