<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Boljoon National High School</title>
	<link rel="icon" type="image/x-icon" href="images/bnhs1-removebg-preview.png">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>

	<!-- <div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="images/logo.PNG" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div> -->
	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			<div class="header-search">
				<form>
					<div class="form-group mb-0">
						<i class="dw dw-search2 search-icon"></i>
						<input type="text" class="form-control search-input" placeholder="Search Here">
					
					</div>
				</form>
			</div>
		</div>
		<div class="header-right">
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
						<i class="dw dw-settings2"></i>
					</a>
				</div>
			</div>
			<!-- <div class="user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
						<i class="icon-copy dw dw-notification"></i>
						<span class="badge notification-active"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<div class="notification-list mx-h-350 customscroll">
							<ul>
								<li>
									<a href="#">
										<img src="vendors/images/img.jpg" alt="">
										<h3>John Doe</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="vendors/images/photo1.jpg" alt="">
										<h3>Lea R. Frith</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="vendors/images/photo2.jpg" alt="">
										<h3>Erik L. Richards</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="vendors/images/photo3.jpg" alt="">
										<h3>John Doe</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="vendors/images/photo4.jpg" alt="">
										<h3>Renee I. Hansen</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="vendors/images/img.jpg" alt="">
										<h3>Vicki M. Coleman</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div> -->
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">

					
						<span class="user-icon" >
						@if(auth()->user()->profile_picture)
						<img src="{{ asset('images/' . auth()->user()->profile_picture) }}"  alt="Profile Image" style="width: 80px; ">
						@else
							{{-- Default image if the user doesn't have a profile picture --}}
							<img src="{{ asset('images/admin.png') }}" alt="Default Image" style="width: 170px; border: 3px solid;">
						@endif
							
							<!-- <img src="vendors/images/photo1.jpg" alt=""> -->
						</span>
						@auth
						<span class="user-name">{{auth()->user()->name}} </span>
						@endauth
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="#"><i class="dw dw-user1"></i> Profile</a>
						<!-- <a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a> -->
						<a class="dropdown-item" href="{{ route('logout') }}"><i class="dw dw-logout"></i> Log Out</a>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<div class="right-sidebar">
		<div class="sidebar-title">
			<h3 class="weight-600 font-16 text-blue">
				Layout Settings
				<span class="btn-block font-weight-400 font-12">User Interface Settings</span>
			</h3>
			<div class="close-sidebar" data-toggle="right-sidebar-close">
				<i class="icon-copy ion-close-round"></i>
			</div>
		</div>
		<div class="right-sidebar-body customscroll">
			<div class="right-sidebar-body-content">
				<h4 class="weight-600 font-18 pb-10">Header Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
				<div class="sidebar-radio-group pb-10 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="">
						<label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2">
						<label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3">
						<label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
					</div>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
				<div class="sidebar-radio-group pb-30 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="">
						<label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2">
						<label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3">
						<label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="">
						<label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5">
						<label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6">
						<label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
					</div>
				</div>

				<div class="reset-options pt-30 text-center">
					<button class="btn btn-danger" id="reset-settings">Reset Settings</button>
				</div>
			</div>
		</div>
	</div>

	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="/adminDashboard">
				<img src="vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
				<img src="images/logo3.PNG" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
			
                    <li>
						<a href="/adminDashboard" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-house-1"></span><span class="mtext" href=>Home</span>
						</a>
					</li>

                    <li>
						<a href="/manageAdmin" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-user1"></span><span class="mtext" href=>Admins</span>
						</a>
					</li>
					<li>
						<a href="/manage_teachers" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-user2"></span><span class="mtext" href=>Teachers</span>
						</a>
					</li>

					
					<li>
						<a href="/admin_manage_students" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-user"></span><span class="mtext" href=>Students</span>
						</a>
					</li>
						
					<li>
						<a href="/manage_parents" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-user"></span><span class="mtext" href=>Parents</span>
						</a>
					</li>
					<li>
						<a href="/manage_subjects" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-book"></span><span class="mtext" href=>Subjects</span>
						</a>
					</li>


					<li>
						<a href="/manage_forms" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-file"></span><span class="mtext" href=>Forms</span>
						</a>
					</li>
					<li>
						<a href="/manage_events" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-calendar"></span><span class="mtext" href=>Events</span>
						</a>
					</li>
					<li>
						<a href="/manage_updates" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-pencil"></span><span class="mtext" href=>Updates</span>
						</a>
					</li>

					<li>
						<a href="/manage_gradelvl" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-lines"></span><span class="mtext" href=>Grade Level</span>
						</a>
					</li>
					<li>
						<a href="/manage_sections" class="dropdown-toggle no-arrow">
                        <span class="micon dw dw-sections"></span><span class="mtext" href=>Section</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>
	

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<!-- <div class="title">
								<h4>List of Admins</h4>
							</div> -->
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Teachers</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-primary" href="/add_teacher">
									ADD NEW TEACHER
								</a>
							
							</div>
						</div>
					
					</div>
				</div>
				<!-- Checkbox select Datatable start -->
			<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">List of teachers</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th class="datatable-nosort">ID Number</th>
									<th class="datatable-nosort">Name</th>
									<th class="datatable-nosort">Address</th>
									<th class="datatable-nosort">Email</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
							@foreach($teachers as $teacher)
						
								<tr>
									<td class="table-plus">{{ $teacher->id_number }}</td>
									<td>{{ $teacher->fullname }}</td>
									<td>{{ $teacher->address }} </td>
									<td>{{ $teacher->email }} </td>
									
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="{{ route('specTeacher.show', ['teacher_id' => $teacher->id]) }}"><i class="dw dw-eye"></i> View</a>
												<a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
												<form action="{{ route('delete.teacher', ['id' => $teacher->id]) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this teacher?')">
													@csrf
													@method('DELETE')
													<button type="submit" class="dropdown-item" style="background: none; border: none; cursor: pointer;">
														<i class="dw dw-delete-3"></i> Delete
													</button>
												</form>	
												</a>
											</div>
										</div>
									</td>
								</tr>
							
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
				Boljoon National High School | All rights reserved.
			</div>
		</div>
		</div>
	</div>


	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<!-- buttons for Export datatable -->
	<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="src/plugins/datatables/js/vfs_fonts.js"></script>
	<!-- Datatable Setting js -->
	<script src="vendors/scripts/datatable-setting.js"></script></body>
</html>