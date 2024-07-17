<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>UCKindies - International Kindergarten| Best Preschool,Nursery & Day Care Center In Mumbai & Thane</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="google-site-verification" content="G-BF7iJldCTOzNKtN2asUHwuHvjJu4QJfWZzzzPpwTY" />

    <!-- Favicon -->
    <link href="{{asset('assets/img/fav.png')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('assets/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <!--<script src="{{ asset('assets/js/sweetalert/sweetalert2.all.min.js') }}"></script>-->
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4@5.0.12/bootstrap-4.min.css">-->
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
    <!-- lightgallery Stylesheet -->
    <!--<link href="{{asset('assets/css/lightgallery.css')}}" rel="stylesheet">-->
    
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-2F89GDH1JQ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-2F89GDH1JQ');
</script>
    

    <style>
        .container{
            max-width: 100%;
        }
        a {
    color: #FE5D37;
    text-decoration: none;
}

.text-head4 {
    
    text-decoration: none;
}
a:hover {
    color:#cb4a2c;
}
    </style>
    

    
</head>

<body>
        <?php 
            $url = basename($_SERVER['REQUEST_URI']);
            
            ?>
    <div class="container bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
            <a href="{{route('home.index')}}" class="navbar-brand">
                <img src="{{asset('assets/img/Uckindies-Logo.png')}}" alt="Uckindies Logo"> 
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <!--<a href="{{route('home.index')}}" class="nav-item nav-link <?= ($url == 'uckindies_demo') ? 'active':''; ?>">Home</a>-->
                    <a href="{{asset('/')}}" class="nav-item nav-link <?= ($url == '') ? 'active':''; ?>">Home</a>

                    <a href="{{asset('about')}}" class="nav-item nav-link <?= ($url == 'about') ? 'active':''; ?>">About Us</a>
                    <a href="{{route('home.classes')}}" class="nav-item nav-link <?= ($url == 'classes') ? 'active':''; ?>">Programs</a>
                    <a href="{{route('home.franchise')}}" class="nav-item nav-link <?= ($url == 'franchise') ? 'active':''; ?>">Franchise</a>
                    <a href="{{route('home.centers')}}" class="nav-item nav-link <?= ($url == 'centers') ? 'active':''; ?>">Learning Centers</a>
                    <!--<div class="nav-item dropdown">-->
                    <!--    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>-->
                    <!--    <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">-->
                    <!--        <a href="{{route('home.facility')}}" class="dropdown-item">School Facilities</a>-->
                    <!--        <a href="{{route('home.team')}}" class="dropdown-item">Popular Teachers</a>-->
                    <!--        <a href="{{route('home.callToAction')}}" class="dropdown-item">Become A Teachers</a>-->
                    <!--        <a href="{{route('home.appointment')}}" class="dropdown-item">Make Appointment</a>-->
                    <!--        <a href="{{route('home.testimonial')}}" class="dropdown-item">Testimonial</a>-->
                    <!--        <a href="{{route('home.404')}}" class="dropdown-item">404 Error</a>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <a href="{{route('home.awards')}}" class="nav-item nav-link <?= ($url == 'awards') ? 'active':''; ?>">Awards</a>
                    <a href="{{route('home.gallery')}}" class="nav-item nav-link <?= ($url == 'gallery') ? 'active':''; ?>">Gallery</a>
                    <a href="{{route('home.contact')}}" class="nav-item nav-link <?= ($url == 'contact') ? 'active':''; ?>">Contact Us</a>
                </div>
                <!--<a href="{{route('home.centers')}}" class="btn btn-primary rounded-pill px-3 d-none d-lg-block">Enroll<i class="fa fa-arrow-right ms-3"></i></a>&nbsp-->
                <div>
                    
                <a href="{{route('home.franchise')}}#FranchiseForm" class="btn btn-primary rounded-pill px-3 d-none d-lg-block">Collaborate<i class="fa fa-arrow-right ms-3"></i></a>
                <a href="{{route('home.enrollment')}}#EnrollmentForm" class="btn btn-primary rounded-pill px-3 mt-1 d-none d-lg-block">Enrollment<i class="fa fa-arrow-right ms-3"></i></a>
                </div>

            </div>
        </nav>
        <!-- Navbar End -->
        
        <!-- Page Header End -->
        <!--<div class="container-xxl py-5 page-header position-relative mb-5">-->
        <!--    <div class="container py-5">-->
        <!--        <h1 class="display-2 text-white animated slideInDown mb-4">About Us</h1>-->
        <!--        <nav aria-label="breadcrumb animated slideInDown">-->
        <!--            <ol class="breadcrumb">-->
        <!--                <li class="breadcrumb-item"><a href="{{asset('/')}}">Home</a></li>-->
        <!--                <li class="breadcrumb-item"><a href="#">Pages</a></li>-->
        <!--                <li class="breadcrumb-item text-white active" aria-current="page">About Us</li>-->
        <!--            </ol>-->
        <!--        </nav>-->
        <!--    </div>-->
        <!--</div>-->
        <!-- Page Header End -->
        
    <main class="page__content mrtop">
        @yield('content')
    </main>
    
    

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h3 class="text-white mb-4">Get In Touch</h3>
                        <p class="mb-2">UC KINDIES INTERNATIONAL KINDERGARTEN</p>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i> Bungalow No.8, Dev Darshan CHS, Ghodbunder Rd, Near KMC Nursing Home, Behind Hotel Gravity, Dongripada, Thane West, Thane, Maharashtra 400607.</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+91 99305 56597</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>admin.india@uckindies.com</p>
                        <div class="d-flex pt-2">
                            <!--a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a-->
                            <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/profile.php?id=100077292031184" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://www.youtube.com/channel/UCLRp0b1Kcl05PACfVpfsPQw" target="_blank"><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://instagram.com/uckindiesindiahq?igshid=YmMyMTA2M2Y=" target="_blank"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h3 class="text-white mb-4">Quick Links</h3>
                        <a class="btn btn-link text-white-50" href="{{route('home.about')}}">About Us</a>
                        <a class="btn btn-link text-white-50" href="{{route('home.classes')}}">Programs</a>
                        <a class="btn btn-link text-white-50" href="{{route('home.franchise')}}">Franchisee</a>
                        <a class="btn btn-link text-white-50" href="{{route('home.centers')}}">Learning Centers</a>
                        <a class="btn btn-link text-white-50" href="{{route('home.awards')}}">Awards</a>
                        <a class="btn btn-link text-white-50" href="{{route('home.gallery')}}">Gallery</a>
                        <a class="btn btn-link text-white-50" href="{{route('home.contact')}}">Contact Us</a>
                    </div>
                    <!--<div class="col-lg-3 col-md-6">-->
                    <!--    <h3 class="text-white mb-4">Photo Gallery</h3>-->
                    <!--    <div class="row g-2 pt-2">-->
                    <!--        <div class="col-4">-->
                    <!--            <img class="img-fluid rounded bg-light p-1" src="{{asset('assets/img/classes-1.jpg')}}" alt="">-->
                    <!--        </div>-->
                    <!--        <div class="col-4">-->
                    <!--            <img class="img-fluid rounded bg-light p-1" src="{{asset('assets/img/classes-2.jpg')}}" alt="">-->
                    <!--        </div>-->
                    <!--        <div class="col-4">-->
                    <!--            <img class="img-fluid rounded bg-light p-1" src="{{asset('assets/img/classes-3.jpg')}}" alt="">-->
                    <!--        </div>-->
                    <!--        <div class="col-4">-->
                    <!--            <img class="img-fluid rounded bg-light p-1" src="{{asset('assets/img/classes-4.jpg')}}" alt="">-->
                    <!--        </div>-->
                    <!--        <div class="col-4">-->
                    <!--            <img class="img-fluid rounded bg-light p-1" src="{{asset('assets/img/classes-5.jpg')}}" alt="">-->
                    <!--        </div>-->
                    <!--        <div class="col-4">-->
                    <!--            <img class="img-fluid rounded bg-light p-1" src="{{asset('assets/img/classes-6.jpg')}}" alt="">-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="col-lg-3 col-md-6">
                        <h3 class="text-white mb-4">Newsletter</h3>
                        <p>Stay in sync with the latest events and activities at UC Kindies.</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">UC Kindies</a>, All Right Reserved. 
							
							<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
							Designed by <a class="border-bottom" href="https://www.ideatore.in/" target="_blank">Ideatore</a>
                            <!--<br>Distributed By: <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>-->
                        </div>
                        <!--div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div-->
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('assets/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('assets/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <!--<script src="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/js/lightgallery.js"></script>-->
    


    <!-- Template Javascript -->
    <script src="{{asset('assets/js/main.js')}}"></script>
    
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>-->
    <!--<script>-->
    <!--   baguetteBox.run('.tz-gallery');-->
    <!--</script>-->

</body>

</html>