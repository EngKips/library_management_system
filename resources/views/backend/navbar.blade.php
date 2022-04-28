	<nav class="pcoded-navbar menu-light ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div " >
				
				<div class="">
					<div class="main-menu-header">
						<img class="img-radius" src="assets/images/user/avatar.jpg" alt="User-Profile-Image">
						<div class="user-details">
							<div id="more-details">{{Auth::user()->name}}<i class="fa fa-caret-down"></i></div>
						</div>
					</div>
					<div class="collapse" id="nav-user-link">
						<ul class="list-inline">
							<li class="list-inline-item"><a href="user-profile.html" data-toggle="tooltip" title="View Profile"><i class="feather icon-user"></i></a></li>
							<li class="list-inline-item"><a href="email_inbox.html"><i class="feather icon-mail" data-toggle="tooltip" title="Messages"></i><small class="badge badge-pill badge-primary">5</small></a></li>
							<li class="list-inline-item"><a href="auth-signin.html" data-toggle="tooltip" title="Logout" class="text-danger"><i class="feather icon-power"></i></a></li>
						</ul>
					</div>
				</div>
				
				<ul class="nav pcoded-inner-navbar ">
					<li class="nav-item pcoded-menu-caption">
						<label>Dashboard</label>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="{{URL::route('libraries')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-book"></i></span><span class="pcoded-mtext">Library & Branches</span></a>
					<!-- 	<ul class="pcoded-submenu">
							<li><a href="">Subject and tag setup</a></li>
							<li><a href="">Publishers</a></li>
							<li><a href="">Authors</a></li>
							<li><a href="">Rack and location identifier</a></li>
							<li><a href="">MERC setup</a></li>
						</ul> -->
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Cataloging</span></a>
						<ul class="pcoded-submenu">
							<li><a href="{{URL::route('itemlist')}}">Item Creation</a></li>
							<li><a href="{{URL::route('publisherlist')}}">Publishers</a></li>
							<li><a href="{{URL::route('authors')}}">Authors</a></li>
							<li><a href="#">Rack and location identifier</a></li>
							<li><a href="">MARC setup</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Circulations</span></a>
						<ul class="pcoded-submenu">
							<li class="pcoded-hasmenu"><a href="#!">Acquisition Circulation</a>
								<ul class="pcoded-submenu">
									<li><a href="" >Purchases</a></li>
									<li><a href="{{URL::route('vendorlist')}}" >Vendors</a></li>
									<!-- <li><a href="" >Tagging</a></li> -->
									<li><a href="" >Transfer</a></li>
									<li><a href="" >Disposal</a></li>
									<li><a href="" >Stock take</a></li>
								</ul>
							</li>
							<li class="pcoded-hasmenu"><a href="#!">Item Circulation</a>
								<ul class="pcoded-submenu">
									<li><a href="{{URL::route('circulations')}}" >Check out</a></li>
									<li><a href="{{URL::route('checkin')}}" >Check in</a></li>
									<li><a href="" >Renew Item</a></li>
									<li><a href="" >Penalties & Losses</a></li>
									<li><a href="" >Reservation</a></li>
									<li><a href="" >Fines</a></li>
									<li><a href="" >Notices</a></li>
								</ul>
							</li>						
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layers"></i></span><span class="pcoded-mtext">Reports</span></a>
						<ul class="pcoded-submenu">
							<li><a href="">Statistic</a></li>
							<li><a href="">Data</a></li>
							<li><a href="">Chart</a></li>
						</ul>
					</li>
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">User</span></a>
						<ul class="pcoded-submenu">
							<li><a href="{{URL::route('newuser')}}">Profile and enrolment</a></li>
							<li><a href="{{URL::route('subscriptionlist')}}">Subscriptions</a></li>
							<!-- <li><a href="">User Card and Barcodes</a></li> -->
							<li><a href="{{URL::route('userlist')}}">User List</a></li>
							<li><a href="">Discharge</a></li>
						</ul>
					</li>
					
					<li class="nav-item pcoded-hasmenu">
						<a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-settings"></i></span><span class="pcoded-mtext">Settings</span></a>
						<ul class="pcoded-submenu">
							<li><a href="{{URL::route('appsettings')}}">App settings</a></li>
							<li><a href="">User roles</a></li>
						</ul>
					</li>					

				</ul>
				
				<div class="card text-center">
					<div class="card-block">
						<button type="button" class="btn-close" data-dismiss="alert" aria-hidden="true"></button>
						<i class="feather icon-sunset f-40"></i>
						<h6 class="mt-3">Help?</h6>
						<p>Please contact us on our email for need any support</p>
						<a href="#!" target="_blank" class="btn btn-primary btn-sm text-white m-0">Support</a>
					</div>
				</div>
				
			</div>
		</div>
	</nav>