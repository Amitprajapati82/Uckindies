<!DOCTYPE html>
<html lang="en">
<head>
	<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge" /> -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<title>UCKindies - International Kindergarten</title>
	<link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon"/>
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/Favicon.png')}}"/>
	
	<!-- Font-awesome  Css -->
	<!-- CSS Files -->
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
	<link rel="stylesheet" href="{{ asset('admin/assets/css/icon.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/assets/css/azzara.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('admin/assets/css/image-uploader.css') }}">
    <!-- <link type="text/css" rel="stylesheet" href="{{ asset('admin/assets/css/icon.css') }}"> -->
	<link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
	
	<!-- <script src="{{ asset('assets/js/jquery.min.js') }}"></script> -->
    
	<link type="text/css" rel="stylesheet" href="{{ asset('admin/assets/font/font-fileuploader.css') }}">
	<link type="text/css" rel="stylesheet" href="{{ asset('admin/assets/css/jquery.fileuploader.min.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/assets/css/multi-select.css') }}">
	<link rel="stylesheet" href="{{ asset('/admin/assets/css/tagify.css') }}" />
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css"> -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script> -->

	
	
	
	<!--Select2 Plugin -->
	<!-- <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" > -->
	
	<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

		<!--Multiselect css and js-->
		
		<!--<script type="text/javascript" src="assets/js/bootstrap-multiselect.js"></script>-->
		<!--<link rel="stylesheet" href="assets/css/bootstrap-multiselect.css" type="text/css">-->
		
		<style>
		    #emailtext{
		        font-size:11px;
		    }
			.badge-notification {
				position: absolute;
				top: 0px;
				right: 12px;
				background-color:  rgba(255, 0, 0, 0.8);
				color: white;
				border-radius: 50%;
				padding: 1px 5px;
			}
			.notification-icon {
				position: relative;
			}
		</style>


</head>
<!--<body>-->
    
				
    <div class="wrappe">
		<!--
				Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header">
				
				<?php
			    if(Session::has('State'))
                {
					$session  ='State';
                }
                elseif(Session::has('Center'))
                {
					$session  ='Center';
                }
				elseif (Session::has('Admin')){
					$session = 'Admin';
				}
                else
                {
					return redirect ('login');
                }
                
                ?>
				<?php $data = Session::get($session);
				// dd(session()->all());die;
				?>
			    
				
		        @if( Session::has('Admin'))
						@php 
						
							$data[0]->name;
                            $myprofile = ''; 
                            $email= $data[0]->email;
                            $role = ''; 
                            $dashbord = asset('admin/dashboard');  
                        @endphp
                     
                @elseif (Session::has('State'))

						@php 
                            $name = $data->name;
                            $myprofile = ''; 
                            $email= $data->email;
                            $role = ''; 
                            $dashbord = asset('state/dashboard');  
                        @endphp
                    
                @elseif (Session::has('Center'))  
						@php 
                            $name = $data->name;
                            $myprofile = ''; 
                            $email= $data->email;
                            $role = ''; 
                            $dashbord = asset('center/dashboard');  

                        @endphp
				@else
				<?php
                         $url = asset('login');
                        header('Location:'.$url);
                        exit;
                    ?>
                @endif
			    
			    
				<a href="{{ $dashbord }}" class="logo">
					<img src="{{asset('assets\img/Uckindies-Logo.png')}}" alt="navbar brand" class="navbar-brand img-fluid p-0 w-85  pt-3">
				</a>
				<!-- <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button> -->
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>

			 <!-- Logout Button -->
			  <div class="float-right m-3">

				  <form id="logout-form" class="" action="{{ route('logout') }}" method="POST" style="display: none;">
						 @csrf
					</form>
					 <button type="button" class="btn btn-danger pt-2" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
						 Logout
					 </button>
			  </div>
            </div>
			<!-- End Logo Header -->
              @if(Session::has('$session'))
                @foreach(Session::get('$session') as $admin)
        			<!-- Navbar Header -->
        			<nav class="navbar navbar-header navbar-expand-lg">
        
        				<div class="container-fluid">
        					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
        						
        						<li class="nav-item dropdown hidden-caret">
        							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
        								<div class="avatar-sm">
        									<img src="{{asset('admin/assets/img/profile-admin.png')}}" alt="..." class="avatar-img rounded-circle">
        								</div>
        							</a>
        							<ul class="dropdown-menu dropdown-user animated fadeIn">
        								<li>
        									<div class="user-box">
        										<div class="avatar-lg"><img src="{{asset('admin/assets/img/profile-admin.png')}}" alt="image profile" class="avatar-img rounded"></div>
        										<div class="u-text">
        											<h4>Admin</h4>
        											<p class="text-muted">{{ $admin->name }}</p><a href="{{asset('admin_logout')}}" class="btn btn-rounded btn-danger btn-sm">Logout</a>
        										</div>
        									</div>
        								</li>
        							</ul>
        						</li>
        
        					</ul>
        				</div>
        			</nav>
        			<!-- End Navbar -->
        	    @endforeach   
           
            @endif
            
		</div>
		<?php 
		$role_id = '';
		if(Session::has('Admin'))
		{
			$role_id = $data[0]->role_id;
		}else{
			$role_id = $data->role_id;
		};

		// dd(Session::all());die;

		?>	
        		<!-- Sidebar -->
		@if (Session::has('Admin'))
		
			<div class="sidebar">

			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<ul class="nav accordion" id="accordionExample">
					<!--  	<li class="nav-item">-->
							<!--<a href="{{ asset('admin/banner') }}">-->
							<!--	<i class="fas fa-user-cog"></i>-->
							<!--	<p>Banner Management</p>-->
								<!--<span class="caret"></span>-->
							<!--	</a>-->
							<!--</li>-->
						<li class="nav-item">
							<a href="javascript:void(0);" data-toggle="collapse" data-target="#Usermgmt" aria-expanded="false" aria-controls="Usermgmt">
								<i class="fas fa-user-cog"></i>
								<p>Admin Management</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="Usermgmt" aria-labelledby="Usermgmt" data-parent="#accordionExample">
								<ul class="nav nav-collapse">
									<li>
										
										<a href="{{ asset('admin/states') }}">
											<span class="sub-item">States</span>
										</a>
										<a href="{{ asset('admin/address') }}">
											<span class="sub-item">Addresses</span>
										</a>
										
									</li>

								</ul>
							</div>

							<a href="{{asset('admin/dashboard')}}" >
							<i class="fas fa-user"></i>
							<p>Dashboard</p>
							</a>

							<a href="{{asset('admin/request')}}" >
							<span class="notification-icon float-right">
                                        <i class="fas fa-bell fa-2x"></i><span class="badge badge-notification">3</span>
                                        </span>
							<p>New Request</p>
							</a>

							<!-- <a href="{{asset('admin/about')}}" >
								<i class="fas fa-user-cog"></i>
								<p>Franchise About Us</p>
							</a> -->

							<!-- <a href="{{ asset('admin/gallery' )}}" >
							<i class="fas fa-image"></i>
								<p>Gallery</p> 
							</a> -->

							<!-- <a href="{{asset('admin/address')}}?role_id={{$role_id}}" >
								<i class="fas fa-user-cog"></i>
								<p>Unit franchise list</p>
							</a> -->

							<!-- <a href="{{asset('admin/our_team')}}" >
							<i class="fas fa-phone-volume"></i>
							<p>Our Team</p>
							</a> -->

							<!-- <a href="{{asset('admin/testimonial')}}" >
							<i class="fas fa-comment"></i>
							<p>Testimonials</p>
							</a> -->

							<!-- <a href="javascript:void(0);" >
								<i class="fas fa-user-cog"></i>
								<p>Our program</p>
							</a> -->

							<!-- <a href="javascript:void(0);" >
								<i class="fas fa-share"></i>
								<p>Social media icons</p>
							</a> -->

							<!-- <a href="{{asset('admin/events')}}" >
							<i class="fas fa-calendar"></i>
							<p>Events & News</p>
							</a> -->


						</li>
						<!--<li class="nav-item">-->
						<!--	<a href="javascript:void(0);" data-toggle="collapse" data-target="#Productmgmt" aria-expanded="false" aria-controls="Usermgmt">-->
						<!--		<i class="fas fa-box-open"></i>-->
						<!--		<p>Product Management</p>-->
						<!--		<span class="caret"></span>-->
						<!--	</a>-->
						<!--	<div class="collapse" id="Productmgmt" aria-labelledby="Productmgmt" data-parent="#accordionExample">-->
						<!--		<ul class="nav nav-collapse">-->
						<!--			<li>-->
										
						<!--			</li>-->

						<!--		</ul>-->
						<!--	</div>-->
						<!--</li>-->
						<!--<li class="nav-item">-->
						<!--	<a href="javascript:void(0);" data-toggle="collapse" data-target="#Ordermgmt" aria-expanded="false" aria-controls="Ordermgmt">-->
						<!--		<i class="fas fa-truck"></i>-->
						<!--		<p>Order Management</p>-->
						<!--		<span class="caret"></span>-->
						<!--	</a>-->
						<!--	<div class="collapse" id="Ordermgmt" aria-labelledby="Ordermgmt" data-parent="#accordionExample">-->
						<!--		<ul class="nav nav-collapse">-->
						<!--			<li>-->
						<!--				<a href="{{ asset('admin/cart_details') }}">-->
						<!--					<span class="sub-item">Cart Details</span>-->
						<!--				</a>-->
						<!--				<a href="{{ asset('admin/orders') }}">-->
						<!--					<span class="sub-item">Orders list</span>-->
						<!--				</a>-->
						<!--				<a href="{{ asset('admin/tracking') }}">-->
						<!--					<span class="sub-item">Tracking</span>-->
						<!--				</a>-->
						<!--				<a href="{{ asset('admin/discount_offers') }}">-->
						<!--					<span class="sub-item">Discount & Offers</span>-->
						<!--				</a>-->
						<!--				<a href="{{ asset('admin/discount_image') }}">-->
						<!--					<span class="sub-item">Discount Image</span>-->
						<!--				</a>-->
						<!--				<a href="{{ asset('admin/shipping_charges') }}">-->
						<!--					<span class="sub-item">Shipping Charges</span>-->
						<!--				</a>-->
						<!--				<a href="{{ asset('admin/tax') }}">-->
						<!--					<span class="sub-item">Tax Table</span>-->
						<!--				</a>-->
						<!--				<a href="{{ asset('admin/pincodes') }}">-->
						<!--					<span class="sub-item">Pin code Servicability</span>-->
						<!--				</a>-->
						<!--				<a href="{{ asset('admin/payment_response') }}">-->
						<!--					<span class="sub-item">Payment Response</span>-->
						<!--				</a-->
						<!--			</li>-->

						<!--		</ul>-->
						<!--	</div>-->
						<!--</li>-->
					</ul>
				</div>
			</div>
			</div>

		@elseif (Session::has('State'))
		
			<div class="sidebar">

				<div class="sidebar-background"></div>
				<div class="sidebar-wrapper scrollbar-inner">
					<div class="sidebar-content">
						<ul class="nav accordion" id="accordionExample">
						<!--  	<li class="nav-item">-->
								<!--<a href="{{ asset('admin/banner') }}">-->
								<!--	<i class="fas fa-user-cog"></i>-->
								<!--	<p>Banner Management</p>-->
									<!--<span class="caret"></span>-->
								<!--	</a>-->
								<!--</li>-->
							<li class="nav-item">
								<a href="javascript:void(0);" data-toggle="collapse" data-target="#Usermgmt" aria-expanded="false" aria-controls="Usermgmt">
									<i class="fas fa-user-cog"></i>
									<p>State Management</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="Usermgmt" aria-labelledby="Usermgmt" data-parent="#accordionExample">
									<ul class="nav nav-collapse">
										<li>
											<a href="{{ asset('admin/states') }}?role_id={{ $role_id }}">
												<span class="sub-item">States</span>
											</a>
											
											<a href="{{ asset('admin/banner') }}">
												<span class="sub-item">Banner</span>
											</a>
											
										</li>

									</ul>
								</div>

							<a href="{{asset('admin/about')}}" >
								<i class="fas fa-user-cog"></i>
								<p>Franchise About Us</p>
							</a>

							<a href="{{ asset('admin/gallery' )}}" >
							<i class="fas fa-image"></i>
								<p>Gallery</p> 
							</a>

							<a href="{{asset('admin/address')}}?role_id={{$role_id}}" >
								<i class="fas fa-user-cog"></i>
								<p>Unit franchise list</p>
							</a>

							<a href="{{asset('admin/our_team')}}" >
							<i class="fas fa-phone-volume"></i>
							<p>Our Team</p>
							</a>

							<a href="{{asset('admin/testimonial')}}" >
							<i class="fas fa-comment"></i>
							<p>Testimonials</p>
							</a>

							<a href="javascript:void(0);" >
								<i class="fas fa-user-cog"></i>
								<p>Our program</p>
							</a>

							<a href="javascript:void(0);" >
								<i class="fas fa-share"></i>
								<p>Social media icons</p>
							</a>

							<a href="{{asset('admin/events')}}" >
							<i class="fas fa-calendar"></i>
							<p>Events & News</p>
							</a>
							</li>
							<!--<li class="nav-item">-->
							<!--	<a href="javascript:void(0);" data-toggle="collapse" data-target="#Productmgmt" aria-expanded="false" aria-controls="Usermgmt">-->
							<!--		<i class="fas fa-box-open"></i>-->
							<!--		<p>Product Management</p>-->
							<!--		<span class="caret"></span>-->
							<!--	</a>-->
							<!--	<div class="collapse" id="Productmgmt" aria-labelledby="Productmgmt" data-parent="#accordionExample">-->
							<!--		<ul class="nav nav-collapse">-->
							<!--			<li>-->
											
							<!--			</li>-->

							<!--		</ul>-->
							<!--	</div>-->
							<!--</li>-->
							<!--<li class="nav-item">-->
							<!--	<a href="javascript:void(0);" data-toggle="collapse" data-target="#Ordermgmt" aria-expanded="false" aria-controls="Ordermgmt">-->
							<!--		<i class="fas fa-truck"></i>-->
							<!--		<p>Order Management</p>-->
							<!--		<span class="caret"></span>-->
							<!--	</a>-->
							<!--	<div class="collapse" id="Ordermgmt" aria-labelledby="Ordermgmt" data-parent="#accordionExample">-->
							<!--		<ul class="nav nav-collapse">-->
							<!--			<li>-->
							<!--				<a href="{{ asset('admin/cart_details') }}">-->
							<!--					<span class="sub-item">Cart Details</span>-->
							<!--				</a>-->
							<!--				<a href="{{ asset('admin/orders') }}">-->
							<!--					<span class="sub-item">Orders list</span>-->
							<!--				</a>-->
							<!--				<a href="{{ asset('admin/tracking') }}">-->
							<!--					<span class="sub-item">Tracking</span>-->
							<!--				</a>-->
							<!--				<a href="{{ asset('admin/discount_offers') }}">-->
							<!--					<span class="sub-item">Discount & Offers</span>-->
							<!--				</a>-->
							<!--				<a href="{{ asset('admin/discount_image') }}">-->
							<!--					<span class="sub-item">Discount Image</span>-->
							<!--				</a>-->
							<!--				<a href="{{ asset('admin/shipping_charges') }}">-->
							<!--					<span class="sub-item">Shipping Charges</span>-->
							<!--				</a>-->
							<!--				<a href="{{ asset('admin/tax') }}">-->
							<!--					<span class="sub-item">Tax Table</span>-->
							<!--				</a>-->
							<!--				<a href="{{ asset('admin/pincodes') }}">-->
							<!--					<span class="sub-item">Pin code Servicability</span>-->
							<!--				</a>-->
							<!--				<a href="{{ asset('admin/payment_response') }}">-->
							<!--					<span class="sub-item">Payment Response</span>-->
							<!--				</a-->
							<!--			</li>-->

							<!--		</ul>-->
							<!--	</div>-->
							<!--</li>-->
						</ul>
					</div>
				</div>
			</div>
			
		<!--  -->

		@endif

		<!-- End Sidebar -->

        
            <main>
                @yield('content')
            </main>
        


        </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('admin/assets/js/core/jquery.3.2.1.min.js') }}"></script>
	<script src="{{ asset('admin/assets/js/core/popper.min.js') }}"></script>
	<script src="{{ asset('admin/assets/js/core/bootstrap.min.js') }}"></script>
	<script src="{{ asset('admin/assets/js/jQuery.tagify.min.js') }}"></script>
	<script src="{{ asset('admin/assets/js/ready.min.js') }}"></script>

	<!-- jQuery UI -->
	<script src="{{ asset('admin/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('admin/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{ asset('admin/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

	<!-- Moment JS -->
	<script src="{{ asset('admin/assets/js/plugin/moment/moment.min.js') }}"></script>

	<!-- Chart JS -->
	<script src="{{ asset('admin/assets/js/plugin/chart.js/chart.min.js') }}"></script>

	<!-- jQuery Sparkline -->
	<script src="{{ asset('admin/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

	<!-- Chart Circle -->
	<script src="{{ asset('admin/assets/js/plugin/chart-circle/circles.min.js') }}"></script>

	<!-- Datatables -->
	<script src="{{ asset('admin/assets/js/plugin/datatables/datatables.min.js') }}"></script>

	<!-- Bootstrap Notify -->
	<script src="{{ asset('admin/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

	<!-- Bootstrap Toggle -->
	<script src="{{ asset('admin/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>

	<!-- jQuery Vector Maps -->
	<script src="{{ asset('admin/assets/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
	<script src="{{ asset('admin/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>

	<!-- Google Maps Plugin -->
	 
	<script src="{{ asset('admin/assets/js/plugin/gmaps/gmaps.js') }}"></script>
	<!-- jQuery CDN -->
	
		

	<!-- Sweet Alert -->
	
	

	<!-- Tinymce -->
	<script src="{{ asset('admin/assets/js/plugin/tinymce/js/tinymce/tinymce.min.js') }}"></script>
	
	<script src="{{ asset('admin/assets/js/image-uploader.js') }}"></script>
	<script src="{{ asset('admin/assets/js/jquery.fileuploader.min.js') }}"></script>
	
	<!-- Azzara JS -->
	<script src="{{ asset('admin/assets/js/main.js') }}"></script>
	<script src="{{ asset('admin/assets/js/jquery.multi-select.js') }}"></script>

	
	
    <script>
    $('#pre-selected-options').multiSelect();
    
        $('.status-datatable').dataTable({searching: false, paging: false, info: false});
    </script>

	<script src="{{ asset('admin/assets/js/plugin/sweetalert/sweetalert2.all.min.js') }}"></script>
		<!-- Fonts and icons -->
	<script src="{{ asset('admin/assets/js/plugin/webfont/webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ["{{asset('admin/assets/css/fonts.css')}}"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	
</body>
</html>