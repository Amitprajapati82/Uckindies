<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
    <meta name="keywords" content="">
    <!--<meta name="author" content="Awaiken Theme">-->
    <link href="{{ asset('assets1/images/fav.png') }}" rel="icon">

	<!-- Page Title -->
	<title>Uckindies State </title>
	<!-- Google Fonts css-->
	<link href="https://fonts.googleapis.com/css?family=Bubblegum+Sans|Roboto:300,400,500,700,900" rel="stylesheet">
	<!-- Bootstrap css -->
	<link href="{{ asset('assets1/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">

	<!-- Font Awesome icon css-->
	<link href="{{ asset('assets1/css/font-awesome.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('assets1/css/flaticon.css') }}" rel="stylesheet" media="screen">

	<!-- Swiper's CSS -->
	<link rel="stylesheet" href="{{ asset('assets1/css/swiper.min.css') }}">

	<!-- Animated css -->
	<link rel="stylesheet" href="{{ asset('assets1/css/animate.css') }}">

	<!-- Magnific Popup CSS -->
	<link rel="stylesheet" href="{{ asset('assets1/css/magnific-popup.css') }}">

	<!-- Slick nav css -->
	<link rel="stylesheet" href="{{ asset('assets1/css/slicknav.css') }}">

	<!-- Main custom css -->
	<link href="{{ asset('assets1/css/custom.css') }}" rel="stylesheet" media="screen">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style>




.testimonial .section-title {
    text-align: center;
    margin-bottom: 30px;
}

.testimonial-slide {
    text-align: center;
    padding: 20px;
    /*background-color: #f8f9fa;*/
    border-radius: 10px;
}

.testimonial-slide figure {
    margin-bottom: 15px;
}

.testimonial-slide img {
    border-radius: 50%;
    width: 100px;
    height: 100px;
}

.swiper-container {
    padding: 0px 0;
}

.swiper-pagination-bullet {
    background: #ff6600;
}

.swiper-pagination-bullet-active {
    background: #ff3300;
}



.video-single {
    position: relative;
    overflow: hidden;
}

.video-single img {
    width: 100%;
    height: auto;
    display: block;
}

.video-single .play-icon {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 3em;
    opacity: 0.8;
    pointer-events: none;
}

.video-popup {
    display: block;
    position: relative;
    text-decoration: none;
}






  body {
    margin: 0;
    font-family: Arial, sans-serif;
}

.banner-slider {
    position: relative;
    width: 100%;
    height: 500px; /* Adjust height as needed */
    overflow: hidden;
}

.banner-slide {
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.banner-slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.sticky-form {
    position: absolute;
    top: 50%;
    right: 5%;
    transform: translateY(-50%);
    background-color: rgba(255, 255, 255, 0.9);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 400px; 
    z-index: 1000;
}

.sticky-form h2 {
    color: #f77f00;
    margin-bottom: 20px;
    text-align: center;
}

.form-group {
    margin-bottom: 15px;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.form-group button {
    width: 100%;
    padding: 10px;
    background-color: #f77f00; 
    border: none;
    color: white;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.form-group button:hover {
    background-color: #e66a00;
}

.event-body1 {
    padding: 0 5px;
}


.col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, {
    position: relative;
    width: 100%;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 18px;
}

.event-body1 p {
    color: #707070;
    margin: 0;
    font-size: 14px;
    font-weight: 500;
    margin-bottom: 8px;
    position: relative;
    padding: 0px 0 0px 0px;
    text-align: justify;
}

.event-single1 {
    background: #fff;
    padding: 10px;
    box-shadow: 2px 2px 30px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    margin: 15px;
    height: 880px;
}

   .map-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
            height: 0;
            overflow: hidden;
        }

        .map-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }



    </style>
    
  
</head>
<body data-spy="scroll" data-target="#main-navbar" data-offset="71">
	<!-- Tob Bar Section Start -->
	<!-- <div class="top-bar">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="header-social-link">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-linkedin"></i></a>
						<a href="#"><i class="fa fa-instagram"></i></a>
					</div>
				</div>
				
				<div class="col-md-8 text-right">
					<div class="school-info">
						<ul>
							<li><a href="#"><i class="fa fa-envelope"></i> Email : example@domain.com</a></li>
							<li><a href="#"><i class="fa fa-phone"></i> Call : +28 232 574 1</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<!-- Tob Bar Section End -->
	
	<!-- Header Section Start -->
	<header class="header">
		<nav class="navbar navbar-expand-lg navbar-light" id="main-navbar">
			<div class="container">
				<!-- Navbar Brand start -->
				<a class="navbar-brand" href="#"><img src="assets1/images/Uckindies-Logo.png" alt="" /></a>
				<!-- Navbar Brand end -->
				
				<ul class="navbar-nav ml-auto" id="main-menu">
					<li class="nav-item"><a class="nav-link active" href="#home">Home</a></li>
					<!--<li class="nav-item"><a class="nav-link" href="#activities">Activities</a></li>-->
					<li class="nav-item"><a class="nav-link" href="#about">About us </a></li>
					
						<li class="nav-item"><a class="nav-link" href="#Programs">Our Programs</a></li> 
					   
					<li class="nav-item"><a class="nav-link" href="#testimonial">Testimonial</a></li>
					
					
					<li class="nav-item"><a class="nav-link" href="#gallery">Gallery</a></li>
						
				
						
					<li class="nav-item"><a class="nav-link" href="#events">Events</a></li>
					
						<li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
					
					<!--<li class="nav-item"><a class="nav-link" href="#teachers">Teachers</a></li>-->
						
				
				
				</ul>
					
				<div class="navbar-toggle"></div>
				<div id="responsive-menu"></div>
			</div>
		</nav>	
	</header>
	<!-- Header Section End -->
	
	
	
	
	
	
	
	
	
	
	

 <div class="banner-slider" id="home">
        <div class="container-fluid">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="swiper-container banner-slider">
                        <div class="swiper-wrapper">
                            <!-- Header Slide start -->
                             @foreach ($bannerData as $item)
                             
                             <div class="swiper-slide">
                                 <div class="banner-slide">
                                     <figure>
                                     <img src="{{ asset('admin/assets/img/'.$item->banner_image) }}" alt="Slide 1">
 
                                     </figure>
                                 </div>
                             </div>
                             @endforeach
                            <!-- Header Slide end -->
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sticky-form">
        
        <form action="{{asset('franchise_enquiry')}}" method="POST" class="banner-form">
            @csrf
            <h2 class="color-orange">Enroll Today!</h2>
            <div class="form-group">
                <input type="text" name="name" placeholder=" Name" required>
            </div>
            <div class="form-group">
                <input type="tel" name="mobile" placeholder=" Mobile No" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder=" Email id " required>
            </div>
            
            
            <div class="form-group">
            <!--<label for="exampleFormControlSelect1">Please select</label>-->
            <select class="form-control" id="exampleFormControlSelect1" name="enquiry" required>
                <option>please Select</option>
                <option>Are you Looking for Franchise/Business</option>
                <option>Looking for Admission for Your ids?</option>
            </select>
        </div>
  
        <div class="form-group">
            <input type="text" name="location" id="loctaion" placeholder=" Location" required>
        </div>
    
    
    <div class="form-group">
        <button type="submit" class="btn-slider">Submit</button>
    </div>

</form>

        <!--<form action="/submit" method="POST" class="banner-form">-->
        <!--    <h2 class="color-orange">Enroll Today!</h2>-->
        <!--    <div class="form-group">-->
        <!--        <input type="text" name="name" placeholder="Your Name" required>-->
        <!--    </div>-->
        <!--    <div class="form-group">-->
        <!--        <input type="tel" name="mobile" placeholder="Your Mobile Number" required>-->
        <!--    </div>-->
        <!--    <div class="form-group">-->
        <!--        <textarea name="message" placeholder="Your Message" required></textarea>-->
        <!--    </div>-->
        <!--    <div class="form-group">-->
        <!--        <button type="submit" class="btn-slider">Submit</button>-->
        <!--    </div>-->
        <!--</form>-->
    </div>



	<!-- Banner Slider Section ends -->
	
	
    <!-- About us Section Starts -->
    @foreach ($aboutData as $value)
        <section  class="courses" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Section title start -->
                        <div class="section-title">
                            <h2 class="color-orange">About International Kindergarten, Airoli</h2>
                        
                        </div>
                        <!-- Section title end -->
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-4">
                        <!-- About Image Start -->
                        
                        <!-- {{$value->about_image_path}} -->
                        <div class="about-image wow fadeInLeft" data-wow-delay="0.3s">
                            <img src="{{asset('storage/'.$value->about_image_path)}}" />
                        </div>
                        
                        <!-- About Image End -->
                    </div>
                    
                    <div class="col-md-8">
                        <!-- About Content Start -->
                        <div class="about-content wow fadeInUp" data-wow-delay="0.6s">

                            <p>{{$value->about_us_content}}</p>
                                
                        </div>
                        <!-- About Content End -->
                        
                        <!-- About Social Link Starts -->
                        <!--<div class="about-social-links">-->
                        <!--	<a href="#"><i class="fa fa-facebook"></i></a>-->
                        <!--	<a href="#"><i class="fa fa-twitter"></i></a>-->
                        <!--	<a href="#"><i class="fa fa-linkedin"></i></a>-->
                        <!--	<a href="#"><i class="fa fa-instagram"></i></a>-->
                        <!--</div>-->
                        <!-- About Social Link Ends -->
                    </div>
                </div>
            </div>
        </section>
    @endforeach
	<!-- About us Section Ends -->
	
	<!-- Upcoming Events Section Starts -->
	<section class="Programs" id="Programs">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!-- Section title start -->
					<div class="section-title">
						<h2 class="color-orange">Our Programs</h2>
					
					</div>
					<!-- Section title end -->
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<div class="swiper-container event-slider">
						<div class="swiper-wrapper">
							<!-- Event Single Slide start -->
							<div class="swiper-slide">
								<div class="event-single1 event-orange">
									<figure>
										<img src="assets1/images/event-1.jpg" alt="" />
										
									</figure>
									
									<div class="event-body1">
										<h3>Playgroup</h3>
										<p>Tiny tots are gifted with an innate desire to explore. Our thoughtfully curated curriculum enables little ones to explore, imagine, discover, listen, and create, while they delightfully take their bumbling baby steps!</p>
									
									</div>
									  <h5>Quickfacts</h5>
									
									<div class="row g-1">
									  
                                    <div class="col-3">
                                        <div class="border-top border-3 border-primary pt-2">
                                            <h6 class="text-primary mb-1">Age group:</h6>
                                            <small>2-3 Years</small>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="border-top border-3 border-success pt-2">
                                            <h6 class="text-success mb-1">Duration:</h6>
                                            <small>2 hours/day</small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="border-top border-3 border-warning pt-2">
                                            <h6 class="text-warning mb-1">Academics:</h6>
                                            <small>UC English, <br>UC Maths,<br> UC Brilliant Science</small>
                                        </div>
                                    </div>
                                </div>
								</div>
							</div>
							<!-- Event Single Slide end -->
							
							<!-- Event Single Slide start -->
							<div class="swiper-slide">
								<div class="event-single1 event-blue">
									<figure>
										<img src="assets1/images/event-2.jpg" alt="" />
									
									</figure>
									
									<div class="event-body1">
										<h3>Nursery</h3>
										<p>The Nursery program is designed to nurture tender minds, setting the stage for your child’s cognitive and emotional development.</p>
									
									</div>
									<h5>Quickfacts</h5>
									
									<div class="row g-1">
                                    <div class="col-3">
                                        <div class="border-top border-3 border-primary pt-2">
                                            <h6 class="text-primary mb-1">Age group:</h6>
                                            <small>3-4 Years</small>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="border-top border-3 border-success pt-2">
                                            <h6 class="text-success mb-1">Duration:</h6>
                                            <small>3 hours/day</small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="border-top border-3 border-warning pt-2">
                                            <h6 class="text-warning mb-1">Academics:</h6>
                                            <small>UC English,<br> UC Maths,<br> UC Brilliant Science,<br> UC Social Science</small>
                                        </div>
                                    </div>
                                </div>
									
								</div>
							</div>
							<!-- Event Single Slide end -->
							
							<!-- Event Single Slide start -->
							<div class="swiper-slide">
								<div class="event-single1 event-green">
									<figure>
										<img src="assets1/images/event-3.jpg" alt="" />
									
									</figure>
									
									<div class="event-body1">
										<h3>Junior. KG</h3>
										<p>Based on 25 years of pathbreaking research in neuroscience, we have pioneered the Whole Brain Development approach.

This innovative approach helps easily overcome learning difficulties among kids, such as boredom, short attention spans, and poor coordination.
It turns learning into an engaging an immersive experience, where juniors become fast learners.
We adopt a multi-layered teaching methodology of ‘conceptual learning using teaching aid material’.</p>
									
									</div>
										<h5>Quickfacts</h5>
									
									<div class="row g-1">
                                    <div class="col-3">
                                        <div class="border-top border-3 border-primary pt-2">
                                            <h6 class="text-primary mb-1">Age group (Jr.KG):</h6>
                                            <small>4-6 Years</small>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="border-top border-3 border-success pt-2">
                                            <h6 class="text-success mb-1">Duration:</h6>
                                            <small>4 hours/day</small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="border-top border-3 border-warning pt-2">
                                            <h6 class="text-warning mb-1">Academics:</h6>
                                            <small>UC English,<br> UC Maths,<br> UC Brilliant Science, <br>UC Social Science,<br> Brino’s Vivid Calculation (BVC)</small>
                                        </div>
                                    </div>
                                </div>
								</div>
							</div>
							<!-- Event Single Slide end -->
							
							<!-- Event Single Slide start -->
							<div class="swiper-slide">
								<div class="event-single1 event-orange">
									<figure>
										<img src="assets1/images/event-1.jpg" alt="" />
									
									</figure>
									
									<div class="event-body1">
										<h3>Senior.KG</h3>
										<p>Based on 25 years of pathbreaking research in neuroscience, we have pioneered the Whole Brain Development approach.

This innovative approach helps easily overcome learning difficulties among kids, such as boredom, short attention spans, and poor coordination.

It turns learning into an engaging an immersive experience, where juniors become fast learners.

We adopt a multi-layered teaching methodology of ‘conceptual learning using teaching aid material’.</p>
									
									</div>
									
										<h5>Quickfacts</h5>
									
									<div class="row g-1">
                                    <div class="col-3">
                                        <div class="border-top border-3 border-primary pt-2">
                                            <h6 class="text-primary mb-1">Age group (Sr.KG):</h6>
                                            <small>4-6 Years</small>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="border-top border-3 border-success pt-2">
                                            <h6 class="text-success mb-1">Duration:</h6>
                                            <small>4 hours/day</small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="border-top border-3 border-warning pt-2">
                                            <h6 class="text-warning mb-1">Academics:</h6>
                                            <small>UC English,<br> UC Maths,<br> UC Brilliant Science, <br>UC Social Science,<br> Brino’s Vivid Calculation (BVC)</small>
                                        </div>
                                    </div>
                                </div>
								</div>
							</div>
							<!-- Event Single Slide end -->
							
							<!-- Event Single Slide start -->
							<div class="swiper-slide">
								<div class="event-single1 event-blue">
									<figure>
										<img src="assets1/images/event-2.jpg" alt="" />
									
									</figure>
									
									<div class="event-body1">
										<h3>Brino’s Discovery Land (Concept Day Care)</h3>
										<p>Moving away from the traditional Day Care model, UC Kindies brings you a Concept Day Care, also known as Brino’s Discovery Land.
Our Concept Day Care provides a platform for your kids to enrich their mental faculties and emotional abilities, while being cocooned in a stimulating and safe environment.</p>
										
									</div>
									
								  <h5>Key Highlights</h5>
								  <h6>Daily Theme</h6>
								  <p>Every day of the week is assigned a specific theme, in which we teach different subjects. Children learn each subject through fun-filled activities, which help inculcate a natural love for the subject.</p>
								  
								  
								  <h6>Dedicated Teacher</h6>
								  <p>Unlike most Day Care centers where the after school section is managed by a maid we at UC Kindies, have a dedicated and competent teacher to take care of your kids and teach them assorted life skills through fun activities.</p>
									
								</div>
							</div>
							<!-- Event Single Slide end -->
							
							<!-- Event Single Slide start -->
							<div class="swiper-slide">
								<div class="event-single1 event-green">
									<figure>
										<img src="assets1/images/event-3.jpg" alt="" />
									
									</figure>
									
									<div class="event-body1">
										<h3>Enrichment Program</h3>
										<p>Activity-focused program for non-Day Care students
Helps learn life skills in a fun, interesting way
Flexible module; customization in terms of timing and activities available to suit needs of working parents
Helps keep children away from addictive gadgets</p>
									
									</div>
								</div>
							</div>
							<!-- Event Single Slide end -->
						</div>
						
						<!-- Event Pagination start -->
						<div class="event-pagination"></div>
						<!-- Event Pagination end -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Upcoming Events Section Ends -->
	
	<!-- Testimonial Section Starts -->
    <section class="testimonial" id="testimonial">
        <div class="container mb-5">
            <div class="row">
                <div class="col-md-12">
                    <!-- Section title start -->
                    <div class="section-title">
                        <h2 class="color-orange">Parents Say!</h2>
                    </div>
                    <!-- Section title end -->
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="testimonial-slider-wrapper-outer">
                        <div class="testimonial-slider-wrapper">
                            <div class="swiper-container testimonial-slider">
                                <div class="swiper-wrapper">
                                    <!-- Testimonial Slide start -->
                                    @foreach ($testimonialData as $item)
                                    
                                    <div class="swiper-slide">
                                        <div class="testimonial-slide">
                                            <figure>
                                                <img src="{{asset('storage/images/'.$item->testimonial_image)}}" alt="">
                                            </figure>
                                            <h3>{{$item->testimonial_author}}</h3>
                                            <p>{{$item->testimonial_content}}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                    <!-- Add more testimonial slides as needed -->
                                </div>
                                <!-- Testimonial Pagination start -->
                                <div class="swiper-pagination"></div>
                                <!-- Testimonial Pagination end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
	<!-- Photo Gallery Section Starts -->
	<section class="photo-gallery" id="gallery">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!-- Section title start -->
					<div class="section-title">
						<h2 class="color-orange">Photo Gallery</h2>
						<p>Lorem ipsum dolor sit amet, ipsum dolor sit amet</p>
					</div>
					<!-- Section title end -->
				</div>
			</div>
			
			<div class="row gallery">
                @foreach ( $galleryData as $item )
                
				<div class="col-lg-3 col-md-4 col-sm-6">
					<!-- Photo Gallery Single start -->
					<div class="photo-single photo-orange wow fadeInUp" data-wow-delay="0.3s">
						<a href="assets1/images/course-1.jpg"><img src="{{asset('storage/'.$item->gallery_image)}}" /></a>
					</div>
					<!-- Photo Gallery Single end -->
				</div>
                @endforeach
			</div>
		</div>
	</section>
	<!-- Photo Gallery Section Ends -->
	
    <section class="video-gallery" id="video-gallery">
        <div class="container">
          	<div class="row">
				<div class="col-md-12">
					<!-- Section title start -->
					<div class="section-title">
						<h2 class="color-orange">Video Gallery</h2>
						<p>Lorem ipsum dolor sit amet, ipsum dolor sit amet</p>
					</div>
					<!-- Section title end -->
				</div>
			</div>
            
            <div class="row gallery">
                @foreach ($galleryData as $item)
                
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <!-- Video Gallery Single start -->
                    <div class="video-single video-orange wow fadeInUp" data-wow-delay="0.3s">
                        <iframe width="100%" height="auto" src="{{asset('storage/'.$item->gallery_video)}}" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <!-- Video Gallery Single end -->
                </div>
                
                @endforeach
                 
            </div>
        </div>
    </section>
    
    <div class="container">
        <div class="text-center mx-auto  wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px; visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <h1 class="mb-3 mt-3">Unit Franchise List</h1>
        </div>

        <div class="row g-5">
            @foreach ($groupedData as $data)
            
            <div class="col-12 ">
            <h1 class="mb-5"> <a href="{{ url('/states/' . strtolower($data['state_name']) . '/?id=' . $data['state_id']) }}">
                {{ $data['state_name'] }}
            </a></h1>

                <div class="row">
                @foreach($data['addresses'] as $index => $address)
                    <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                        <h4>{{ $index + 1 }}) {{ $address['center'] }}</h4>
                        <p><span>Address: - </span><span>{{ $address['franchise_details'] }}</span></p>
                        <p><span>Contact No: - </span><span>9930556597</span></p>
                        <p><span>Email Id: - </span><span>admin.india@uckindies.com</span></p>
                    </div>
                @endforeach
                
                </div>
            </div>
            @endforeach

        </div>
    </div>
   
    <!-- Upcoming Events Section Starts -->
	<section class="events" id="events">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!-- Section title start -->
					<div class="section-title">
						<h2 class="color-orange">Upcoming Events</h2>
						<!--<p>Lorem ipsum dolor sit amet, ipsum dolor sit amet</p>-->     
					</div>
					<!-- Section title end -->
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<div class="swiper-container event-slider">
						<div class="swiper-wrapper">
							<!-- Event Single Slide start -->
                             @foreach ($eventData as $item)
                                <div class="swiper-slide">
                                    <div class="event-single event-orange">
                                        <figure>
                                            <img src="{{asset('storage/'.$item->image_path)}}" alt="" />
                                            <div class="date"><span>06</span> Dec - 18</div>
                                        </figure>
                                        
                                        <div class="event-body">
                                            <h3>{{$item->event_title}}</h3>
                                            <p class="location">{{$item->location}}, Times Square</p>
                                            <p class="time">{{$item->start_time}} AM to {{$item->start_time}} PM</p>
                                        </div>
                                    </div>
                                </div>
                             @endforeach    
							<!-- Event Single Slide end -->
							
						</div>
						
						<!-- Event Pagination start -->
						<div class="event-pagination"></div>
						<!-- Event Pagination end -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Upcoming Events Section Ends -->
	
	
    <section class="contactus" id="contact">
        <div class= "container mb-5">
        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7533.435957393041!2d72.972337!3d19.251119!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7bbea4bf3b50d%3A0x8fcc479ff05f1910!2sUC%20KINDIES%20INTERNATIONAL%20KINDERGARTEN!5e0!3m2!1sen!2sin!4v1721131634684!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        
        </div>
        </div>

    </section>
	
    <!-- Contact us Section Starts -->
	<section class="contactus" id="contact">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<!-- Section title start -->
					<div class="section-title">
						<h2 class="color-orange">Get In Touch</h2>
						<p>UC KINDIES INTERNATIONAL KINDERGARTEN</p>
					</div>
					<!-- Section title end -->
					
					<!-- Contact info start -->
					<div class="contact-info">
					<p class="address">Bungalow No.8, Dev Darshan CHS, Ghodbunder Rd, Near KMC Nursing Home, Behind Hotel Gravity, Dongripada, Thane West, Thane, Maharashtra 400607. </p>
						
					 <p class="email">
                     <a href="mailto:admin.india@uckindies.com">admin.india@uckindies.com</a>
                     </p>
                   
                     <p class="contact">
                     <a href="tel:+919930556597">+91 99305 56597</a>
                     </p>

						
					</div>
					<!-- Contact info End -->
					
					<!-- Contact Social Link start -->
					<div class="contact-social-link">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-youtube-play"></i></a>
						<!--<a href="#"><i class="fa fa-linkedin"></i></a>-->
						<a href="#"><i class="fa fa-instagram"></i></a>
					</div>
					<!-- Contact Social Link end -->
				</div>
				
				<div class="col-md-6">
					<!-- Section title start -->
					<div class="section-title">
						<h2 class="color-orange">Contact Us</h2>
						<p>Lorem ipsum dolor sit amet, ipsum dolor sit amet</p>
					</div>
					<!-- Section title end -->
					
					<!-- Contact Form start -->
					<div class="contact-form">
                        <form id="contactForm" action="{{asset('contact_us')}}" method="post">
                            @csrf
                            <input type="hidden" name="state_id" id="state_id" value="{{$State_id}}">
                            <div class="row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <input type="text" name="stud_name" id="stud_name" class="form-control" placeholder="Student Name" />
                                </div>
                                
                                <div class="form-group col-md-12 col-sm-12">
                                    <input type="number" name="number" id="number" class="form-control" placeholder="Contact No" />
                                </div>
                                
                                <div class="form-group col-md-12 col-sm-12">
                                    <input type="number" name="age" id="age" class="form-control" placeholder="Age" />
                                </div>
                                
                                <div class="form-group col-md-12 col-sm-12">
                                    <input type="text" name="location" id="location" class="form-control" placeholder="Location" />
                                </div>
                                
                            
                                
                                <div class="col-md-12 col-sm-12 text-center">
                                    <button type="submit" class="btn-contact">Submit</button>
                                </div>
                            </div>
                        </form>

					</div>
					<!-- Contact Form end -->
				</div>
			</div>
		</div>
	</section>
	<!-- Contact us Section Ends -->
	
	<!-- Footer Section Starts -->
	<footer class="footer">
		<div class="container">
			<div class="row">
			
					
					<div class="footer-copyright">
						<div class="text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">UC Kindies</a>, All Right Reserved. 
							
							<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
							Designed by <a class="border-bottom" href="https://www.ideatore.in/" target="_blank">Ideatore</a>
                            <!--<br>Distributed By: <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>-->
                        </div>
					</div>
					<!-- Footer Copyright end -->
				
			</div>
		</div>
	</footer>
	<!-- Footer Section Ends -->
	
	<!-- Jquery Library File -->
	<script src="{{ asset('assets1/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets1/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets1/js/wow.js') }}"></script>
    <script src="{{ asset('assets1/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assets1/js/SwiperAnimation.min.js') }}"></script>
    <script src="{{ asset('assets1/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets1/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('assets1/js/SmoothScroll.js') }}"></script>
    <script src="{{ asset('assets1/js/function.js') }}"></script>

	

<!--	<link rel="stylesheet" href="path/to/magnific-popup.css">-->
<!--<script src="path/to/jquery.magnific-popup.min.js"></script>-->

	
<script>
	        
    document.addEventListener('DOMContentLoaded', function () {
        var swiper = new Swiper('.testimonial-slider', {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                640: {
                    slidesPerView: 1,
                    spaceBetween: 10
                }
            }
        });
    });

	

    $(document).ready(function() {
        $('.video-popup').magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
    });


</script>
	
</body>
</html>