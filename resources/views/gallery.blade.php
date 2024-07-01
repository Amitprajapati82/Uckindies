@extends('layout')
@section('content')

  
  <!-- Latest compiled and minified CSS -->
<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->

<!-- Optional theme -->
<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">-->

<!-- Latest compiled and minified JavaScript -->
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->


  
  <!--light gallery css start-->
    <link href="{{asset('assets/css/lightgallery.css')}}" rel="stylesheet">
  <!--light gallery css end-->


  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">


  
  <style>
  .card.tabcard.printtabrespon .card-body {
    padding: 0;
}

  .card.tabcard.printtabrespon .card-body img {
    width: 100%;
}

.card.tabcard.printtabrespon {
    /*border: 10px solid red;*/
    margin-bottom: 20px;
    border-style: solid;
  border-width: 7px;
  border-image: conic-gradient(#ffdd00, #ffdd00, #e86d1f, #83401d, #00853f, #ffdd00) 1;
}

    
  </style>
<!-- Page Header End -->
        <div class="container py-5 page-header2 position-relative mb-5">
            <div class="container py-5">
                <h1 class="display-2 text-white animated slideInDown mb-4">Gallery</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
                        <!--li class="breadcrumb-item"><a href="#">Pages</a></li-->
                        <li class="breadcrumb-item text-white active" aria-current="page">Gallery</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->
  <div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close mt-3">
        <span class="icon-close2 js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div> <!-- .site-mobile-menu -->

  <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url("{{asset('assets/img/about-1.jpg')}}"); margin-top:100px;" data-stellar-background-ratio="0.5" data-aos="fade">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-7 text-center" data-aos="fade-up" data-aos-delay="400">
        </div>
      </div>
    </div>
  </div>

   <div class="site-section ">
    <div class="container">
         <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-4">GALLERY</h1> 
                </div>
      <div class="row align-items-center">
            <div class="card-body " >
                <h1 class="mb-4">Where Learning is Never Boring..!</h1>
                <div class="row mt-2 " id="lightgallery">
                    
                        <!--h4>We are a Concept Kindergarten that advocates children to develop with Love and Laughter.</h4-->
                    <div class="col-md-3 mt-2 " data-src="{{asset('assets/img/galary1.jpg')}}">
                        <div class="card tabcard printtabrespon" >
                            <div class="card-body " >
                                 <img src="{{asset('assets/img/galary1.jpg')}}" class="img-fluid" alt="image small">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 mt-2" data-src="{{asset('assets/img/galary2.jpg')}}">
                        <div class="card tabcard printtabrespon" >
                             <div class="card-body ">
                                 <img src="{{asset('assets/img/galary2.jpg')}}" class="img-fluid" alt="image small">
                             </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 mt-2" data-src="{{asset('assets/img/new.jpeg')}}">
                        <div class="card tabcard printtabrespon">
                             <div class="card-body">
                                 <img src="{{asset('assets/img/new.jpeg')}}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-md-3 mt-2 " data-src="{{asset('assets/img/galary13.jpeg')}}">
                        <div class="card tabcard printtabrespon">
                            <div class="card-body">
                                 <img src="{{asset('assets/img/galary13.jpeg')}}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 mt-2"  data-src="{{asset('assets/img/galary5.jpeg')}}">
                        <div class="card tabcard printtabrespon">
                             <div class="card-body">
                                 <img src="{{asset('assets/img/galary5.jpeg')}}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 mt-2" data-src="{{asset('assets/img/galary17.jpg')}}">
                        <div class="card tabcard printtabrespon">
                             <div class="card-body">
                                 <img src="{{asset('assets/img/galary17.jpg')}}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 mt-2" data-src="{{asset('assets/img/galary18.jpg')}}">
                        <div class="card tabcard printtabrespon">
                            <div class="card-body">
                                 <img src="{{asset('assets/img/galary18.jpg')}}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 mt-2" data-src="{{asset('assets/img/galary19.jpg')}}">
                        <div class="card tabcard printtabrespon">
                             <div class="card-body">
                                 <img src="{{asset('assets/img/galary19.jpg')}}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 mt-2" data-src="{{asset('assets/img/galary20.jpg')}}">
                        <div class="card tabcard printtabrespon">
                             <div class="card-body">
                                 <img src="{{asset('assets/img/galary20.jpg')}}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 mt-2" data-src="{{asset('assets/img/galary14.jpeg')}}">
                        <div class="card tabcard printtabrespon">
                            <div class="card-body">
                                 <img src="{{asset('assets/img/galary14.jpeg')}}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 mt-2" data-src="{{asset('assets/img/galary15.jpeg')}}">
                        <div class="card tabcard printtabrespon">
                             <div class="card-body">
                                 <img src="{{asset('assets/img/galary15.jpeg')}}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 mt-2" data-src="{{asset('assets/img/galary16.jpeg')}}">
                        <div class="card tabcard printtabrespon">
                             <div class="card-body">
                                 <img src="{{asset('assets/img/galary16.jpeg')}}" class="img-fluid">
                            </div>
                        </div>
                    </div
                    
                    
                    
            
                    
                  
                </div>
      </div>
    </div>
  </div> 
<!--<hr>-->
  </div>



<!--light gallery js start-->
<script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/js/lightgallery.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-pager.js/master/dist/lg-pager.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-autoplay.js/master/dist/lg-autoplay.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-fullscreen.js/master/dist/lg-fullscreen.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-zoom.js/master/dist/lg-zoom.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-hash.js/master/dist/lg-hash.js"></script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-share.js/master/dist/lg-share.js"></script>
<!--<script src="js/lg-rotate.min.js"></script>-->
<script>
    lightGallery(document.getElementById('lightgallery'));
    lightGallery(document.getElementById('lightgalleryPuri'));
</script>
<!--light gallery js end-->


@stop