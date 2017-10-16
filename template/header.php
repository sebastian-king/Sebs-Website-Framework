<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo htmlspecialchars($title ? $title . " | Movieventure" : "Movieventure"); ?></title>

	<link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />

	<!--STYLESHEET-->
	<!--=================================================-->

	<!--Open Sans Font [ OPTIONAL ] -->
 	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=latin" rel="stylesheet">


	<!--Bootstrap Stylesheet [ REQUIRED ]-->
	<link href="/css/bootstrap.min.css" rel="stylesheet">


	<!--Nifty Stylesheet [ REQUIRED ]-->
	<link href="/css/nifty.min.css" rel="stylesheet">

	
	<!--Font Awesome [ OPTIONAL ]-->
	<link href="/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">


	<!--Switchery [ OPTIONAL ]-->
	<link href="/assets/switchery/switchery.min.css" rel="stylesheet">


	<!--Bootstrap Select [ OPTIONAL ]-->
	<link href="/assets/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">




	<!--SCRIPT-->
	<!--=================================================-->

	<!--Page Load Progress Bar [ OPTIONAL ]-->
	<link href="/assets/pace/pace.min.css" rel="stylesheet">
	<script src="/assets/pace/pace.min.js"></script>


	
	<!--

	REQUIRED
	You must include this in your project.

	RECOMMENDED
	This category must be included but you may modify which plugins or components which should be included in your project.

	OPTIONAL
	Optional plugins. You may choose whether to include it in your project or not.

	DEMONSTRATION
	This is to be removed, used for demonstration purposes only. This category must not be included in your project.

	SAMPLE
	Some script samples which explain how to initialize plugins or components. This category should not be included in your project.


	Detailed information and more samples can be found in the document.

	-->
		

</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

<body>
	<div id="container" class="<?php echo $container_classes; ?>">
		
		<!--NAVBAR-->
		<!--===================================================-->
		<header id="navbar">
			<div id="navbar-container" class="boxed">

				<!--Brand logo & name-->
				<!--================================-->
				<div class="navbar-header">
					<a href="/" class="navbar-brand">
						<img src="/favicon.ico" alt="Movieventure" class="brand-icon" style="margin-left:5px;">
						<div class="brand-title">
							<span class="brand-text" style="padding-left:10px;">Movieventure</span>
						</div>
					</a>
				</div>
				<!--================================-->
				<!--End brand logo & name-->


				<!--Navbar Dropdown-->
				<!--================================-->
				<div class="navbar-content clearfix">
					<ul class="nav navbar-top-links pull-left">

						<!--Navigation toogle button-->
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<li class="tgl-menu-btn">
							<a class="mainnav-toggle" href="#">
								<i class="fa fa-navicon fa-lg"></i>
							</a>
						</li>
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<!--End Navigation toogle button-->


						<!--Messages Dropdown-->
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<li class="dropdown">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle">
								<i class="fa fa-envelope fa-lg"></i>
								<span class="badge badge-header badge-warning">9</span>
							</a>

							<!--Message dropdown menu-->
							<div class="dropdown-menu dropdown-menu-md with-arrow">
								<div class="pad-all bord-btm">
									<p class="text-lg text-muted text-thin mar-no">You have 3 messages.</p>
								</div>
								<div class="nano scrollable">
									<div class="nano-content">
										<ul class="head-list">
									
											<!-- Dropdown list-->
											<li>
												<a href="#" class="media">
													<div class="media-left">
														<img src="/img/av2.png" alt="Profile Picture" class="img-circle img-sm">
													</div>
													<div class="media-body">
														<div class="text-nowrap">Andy sent you a message</div>
														<small class="text-muted">15 minutes ago</small>
													</div>
												</a>
											</li>
									
											<!-- Dropdown list-->
											<li>
												<a href="#" class="media">
													<div class="media-left">
														<img src="/img/av4.png" alt="Profile Picture" class="img-circle img-sm">
													</div>
													<div class="media-body">
														<div class="text-nowrap">Lucy sent you a message</div>
														<small class="text-muted">30 minutes ago</small>
													</div>
												</a>
											</li>
									
											<!-- Dropdown list-->
											<li>
												<a href="#" class="media">
													<div class="media-left">
														<img src="/img/av3.png" alt="Profile Picture" class="img-circle img-sm">
													</div>
													<div class="media-body">
														<div class="text-nowrap">Jackson sent you a message</div>
														<small class="text-muted">40 minutes ago</small>
													</div>
												</a>
											</li>
									
											<!-- Dropdown list-->
											<li>
												<a href="#" class="media">
													<div class="media-left">
														<img src="/img/av6.png" alt="Profile Picture" class="img-circle img-sm">
													</div>
													<div class="media-body">
														<div class="text-nowrap">Donna sent you a message</div>
														<small class="text-muted">5 hours ago</small>
													</div>
												</a>
											</li>
									
											<!-- Dropdown list-->
											<li>
												<a href="#" class="media">
													<div class="media-left">
														<img src="/img/av4.png" alt="Profile Picture" class="img-circle img-sm">
													</div>
													<div class="media-body">
														<div class="text-nowrap">Lucy sent you a message</div>
														<small class="text-muted">Yesterday</small>
													</div>
												</a>
											</li>
									
											<!-- Dropdown list-->
											<li>
												<a href="#" class="media">
													<div class="media-left">
														<img src="/img/av3.png" alt="Profile Picture" class="img-circle img-sm">
													</div>
													<div class="media-body">
														<div class="text-nowrap">Jackson sent you a message</div>
														<small class="text-muted">Yesterday</small>
													</div>
												</a>
											</li>
										</ul>
									</div>
								</div>

								<!--Dropdown footer-->
								<div class="pad-all bord-top">
									<a href="/me/messages" class="btn-link text-dark box-block">
										<i class="fa fa-angle-right fa-lg pull-right"></i>Show All Messages
									</a>
								</div>
							</div>
						</li>
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<!--End message dropdown-->




						<!--Notification dropdown-->
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<li class="dropdown">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle">
								<i class="fa fa-bell fa-lg"></i>
								<span class="badge badge-header badge-danger">5</span>
							</a>

							<!--Notification dropdown menu-->
							<div class="dropdown-menu dropdown-menu-md with-arrow">
								<div class="pad-all bord-btm">
									<p class="text-lg text-muted text-thin mar-no">You have 3 tasks.</p>
								</div>
								<div class="nano scrollable">
									<div class="nano-content">
										<ul class="head-list">

											<!-- Dropdown list-->
											<li>
												<a href="#">
													<div class="clearfix">
														<p class="pull-left">Database Repair</p>
														<p class="pull-right">70%</p>
													</div>
													<div class="progress progress-sm">
														<div style="width: 70%;" class="progress-bar">

															<span class="sr-only">70% Complete</span>
														</div>
													</div>
												</a>
											</li>

											<!-- Dropdown list-->
											<li>
												<a href="#">
													<div class="clearfix">
														<p class="pull-left">Upgrade Progress</p>
														<p class="pull-right">10%</p>
													</div>
													<div class="progress progress-sm">
														<div style="width: 10%;" class="progress-bar progress-bar-warning">
															<span class="sr-only">10% Complete</span>
														</div>
													</div>
												</a>
											</li>
									
											<!-- Dropdown list-->
											<li>
												<a href="#" class="media">
													<div class="media-left">
														<span class="icon-wrap icon-circle bg-primary">
															<i class="fa fa-comment fa-lg"></i>
														</span>
													</div>
													<div class="media-body">
														<div class="text-nowrap">New comments waiting approval</div>
														<small class="text-muted">15 minutes ago</small>
													</div>
												</a>
											</li>
									
											<!-- Dropdown list-->
											<li>
												<a href="#" class="media">
											<span class="badge badge-success pull-right">90%</span>
													<div class="media-left">
														<span class="icon-wrap icon-circle bg-danger">
															<i class="fa fa-hdd-o fa-lg"></i>
														</span>
													</div>
													<div class="media-body">
														<div class="text-nowrap">HDD is full</div>
														<small class="text-muted">50 minutes ago</small>
													</div>
												</a>
											</li>
									
											<!-- Dropdown list-->
											<li>
												<a href="#" class="media">
													<div class="media-left">
														<span class="icon-wrap bg-info">
															<i class="fa fa-file-word-o fa-lg"></i>
														</span>
													</div>
													<div class="media-body">
														<div class="text-nowrap">Write a news article</div>
														<small class="text-muted">Last Update 8 hours ago</small>
													</div>
												</a>
											</li>
									
											<!-- Dropdown list-->
											<li>
												<a href="#" class="media">
											<span class="label label-danger pull-right">New</span>
													<div class="media-left">
														<span class="icon-wrap bg-purple">
															<i class="fa fa-comment fa-lg"></i>
														</span>
													</div>
													<div class="media-body">
														<div class="text-nowrap">Comment Sorting</div>
														<small class="text-muted">Last Update 8 hours ago</small>
													</div>
												</a>
											</li>
									
											<!-- Dropdown list-->
											<li>
												<a href="#" class="media">
													<div class="media-left">
														<span class="icon-wrap bg-success">
															<i class="fa fa-user fa-lg"></i>
														</span>
													</div>
													<div class="media-body">
														<div class="text-nowrap">New User Registered</div>
														<small class="text-muted">4 minutes ago</small>
													</div>
												</a>
											</li>
										</ul>
									</div>
								</div>

								<!--Dropdown footer-->
								<div class="pad-all bord-top">
									<a href="/me/tasks" class="btn-link text-dark box-block">
										<i class="fa fa-angle-right fa-lg pull-right"></i>Show All Tasks
									</a>
								</div>
							</div>
						</li>
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<!--End notifications dropdown-->

					</ul>
					<ul class="nav navbar-top-links pull-right">

						<!--Language selector-->
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<li class="dropdown">
							<a id="demo-lang-switch" class="lang-selector dropdown-toggle" href="#" data-toggle="dropdown">
								<span class="lang-selected">
									<img class="lang-flag" src="/img/flags/united-kingdom.png" alt="English (UK)">
									<span class="lang-id">EN</span>
									<span class="lang-name">English (UK)</span>
								</span>
							</a>

							<!--Language selector menu-->
							<ul class="head-list dropdown-menu with-arrow">
								<li>
									<!--English-->
									<a href="#" class="active">
										<img class="lang-flag" src="/img/flags/united-kingdom.png" alt="English (UK)">
										<span class="lang-id">EN</span>
										<span class="lang-name">English (UK)</span>
									</a>
								</li>
								<li>
									<!--France-->
									<a href="#">
										<img class="lang-flag" src="/img/flags/united-states.png" alt="English (US)">
										<span class="lang-id">EN</span>
										<span class="lang-name">English (US)</span>
									</a>
								</li>
							</ul>
						</li>
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<!--End language selector-->



						<!--User dropdown-->
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<li id="dropdown-user" class="dropdown">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
								<span class="pull-right">
									<img class="img-circle img-user media-object" src="/img/av1.png" alt="Profile Picture">
								</span>
								<div class="username hidden-xs"><?php echo $userinfo['first_name']; ?> <?php echo $userinfo['last_name']; ?></div>
							</a>


							<div class="dropdown-menu dropdown-menu-md dropdown-menu-right with-arrow panel-default">
                            
                            	<div class="pad-all bord-btm">
									<div class="text-lg text-muted text-thin" style="text-align:center;">Welcome to Movieventure</div>
								</div>

								<!-- User dropdown menu -->
								<ul class="head-list">
									<li>
										<a href="/me/profile">
											<i class="fa fa-user fa-fw fa-lg"></i> Profile
										</a>
									</li>
									<li>
										<a href="/me/settings">
											<i class="fa fa-gear fa-fw fa-lg"></i> Settings
										</a>
									</li>
									<li>
										<a href="/help">
											<i class="fa fa-question-circle fa-fw fa-lg"></i> Help
										</a>
									</li>
								</ul>

								<!-- Dropdown footer -->
								<div class="pad-all text-right">
									<a href="/auth/logout" class="btn btn-primary">
										<i class="fa fa-sign-out fa-fw"></i> Logout
									</a>
								</div>
							</div>
						</li>
						<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
						<!--End user dropdown-->

					</ul>
				</div>
				<!--================================-->
				<!--End Navbar Dropdown-->

			</div>
		</header>
		<!--===================================================-->
		<!--END NAVBAR-->

		<div class="boxed">

			<!--CONTENT CONTAINER-->
			<!--===================================================-->
			<div id="content-container">
				
				<!--Page Title-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<div id="page-title">
					<h1 class="page-header text-overflow"><?php echo $heading; ?></h1>

					<!--Searchbox-->
					<div class="searchbox">
                    	<form action="/search">
						<div class="input-group custom-search-form">
							<input type="text" class="form-control" placeholder="Search..." name="q" id="search-box">
							<span class="input-group-btn">
								<button class="text-muted" type="submit"><i class="fa fa-search"></i></button>
							</span>
						</div>
                        </form>
					</div>
				</div>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End page title-->


				<!--Breadcrumb-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<ol class="breadcrumb">
                	<?php
					$i = 0;
					foreach ($breadcrumbs as $key => $val) {
						if (++$i === count($breadcrumbs)) {
							echo "<li><a href='{$val}'>{$key}</a></li>";
						} else {
							echo "<li class='active'><a href='{$val}'>{$key}</a></li>";
						}
                    }
					?>
				</ol>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End breadcrumb-->


		

				<!--Page content-->
				<!--===================================================-->