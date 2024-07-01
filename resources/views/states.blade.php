 @extends('layout')
 @section('content')

  <style>
  
  
  h1.mb-2{
         font-family: Arial, Helvetica, sans-serif;
    
  }
  
   h1.mb-4{
         font-family: Arial, Helvetica, sans-serif;
    
  }
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

/*h1.mb-4.H1::after {*/
/*    content: '';*/
/*    display: block;*/
/*    height: 2px;*/
/*    width: 45%;*/
/*    background: red;*/
/*    margin-top: 5px;*/
    /*font-weight:400px;*/
/*}*/

    
  </style>


               <!-- Page Header start -->
        <div class="container py-5 page-header5 position-relative mb-5">
            <div class="container py-5">
                <h1 class="display-2 text-white animated slideInDown mb-4">{{$state}}</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
                        <!--li class="breadcrumb-item"><a href="#">Pages</a></li-->
                        <li class="breadcrumb-item text-white active" aria-current="page">{{$state}}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->   
        
        
        
        
   
   
   
    <!-- Call To Action Start -->
    
                   
                 
                

                         
        <div class="container py-5">
            <div class="container">
                <h1 class="mb-2 ">UCKindies Maharashtra</h1>
                <div class="bg-white">
                    <div class="row g-0">
                        <div class="col-lg-3 wow fadeIn" data-wow-delay="0.1s" style="min-height: 400px;">
                            <div class="position-relative h-100"> <div class="card-body ">
                                 <img src="{{asset('assets/img/state-p1.jpg')}}"class="img-fluid" style="object-fit: cover;">
                            </div>
                                <div class="card-body ">
                                 <img src="{{asset('assets/img/state-p1.jpg')}}" class="img-fluid">
                                 </div>
                                <!--<img class="position-absolute img-fluid w-100 " src="{{asset('assets/img/state-p1.jpg')}}" style="object-fit: cover;">-->
                            </div>
                        </div>
                        <div class="col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                            <div class="h-100 d-flex flex-column" style="margin-top:10px">
                                <p class="mb-4" style="object-fit:cover;">With experience of more than 25 years and presence in more than 90 Countries the true International Kindergarten is now in the Royal City of Mysuru., With  Highly trained faculty and an vast space with clean and diverse classrooms and play area, this preschool is sure to be the best education experience your child  can have. With a dedicated R&D facility located in Malaysia, which solely focuses on improvising the quality of the education, No stones will be left unturned to make your child the best in the world.
                                </p>
                                   
                                   
                                



       <table class="table table-bordered "style="font-size:13px;">
 
     <tbody>
     <tr>
    
      <th>Trust Name</th>
      <td>Unnati Educational Trust </td>
     
      </tr>
       <tr>
      <th>School Email</th>
     <td>unnatieducationaltrust@gmail.com</td>
     
    </tr>
    <tr>
      <th>School Address</th>
      <td>#317, Shubrathi, Vijaynagar 3rd Stage, E-block, Mysuru 570017</td>
    </tr>
    <tr>
      <th>Website</th>
      <td>https://uc-kindies-mysuru-vijaynagar-branch-unnati.buisness.site/</td>
    </tr>
    <tr>
      <th>Established Year</th>
      <td>2017</td>
    </tr>
    <tr>
      <th>Category</th>
      <td>Franchise</td>
    </tr>
    </tbody>
    </table>
    
    
    
    </div>
    </div>
    
    
   
                                          
                            <div class="col-lg-3 wow fadeIn" data-wow-delay="0.1s" style="min-height: 400px;">
                            <div class="position-relative">
                              
                             <div class="card-body ">
                                 
                            <img src="{{asset('assets/img/galary19.jpg')}}"class="img-fluid">
                            </div>
                            
                                 <div class="card-body ">
                                 <img src="{{asset('assets/img/Traingle.jpg')}}" class="img-fluid">
                                 </div>
                                 
                                  <div class="card-body ">
                                 <img src="{{asset('assets/img/Traingle.jpg')}}" class="img-fluid">
                                 </div>
                        </div>
                   </div>
                                
                         <div class="col-lg-3 wow fadeIn" data-wow-delay="0.1s"  style="min-height: 400px;">
                            <div class="position-relative h-100">
                             <div class="card-body ">
                                 <img src="{{asset('assets/img/Traingle.jpg')}}" class="img-fluid">
                                
                            </div>
                             <div class="card-body ">
                                 <img src="{{asset('assets/img/Traingle.jpg')}}" class="img-fluid">
                                 </div>
                                     <div class="card-body">
                                 <img src="{{asset('assets/img/galary18.jpg')}}" class="img-fluid">
                            </div>
                        </div>
                     </div>
                        
                       
                       
                               

       
        
    
 
                    


        <!--<div class="container py-5">-->
        <!--<div class="container">-->
        <!--     <h1 class="mb-4" >Awards & Recognition</h1>-->
        <!--<div class="row g-5 d-flex align-items-center justify-content-start">-->
        <!-- <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">-->
        <!--     <div class="d-flex">-->
        <!--        <div class="flex-shrink-0">-->
        <!--            <i class="fa fa-star text-danger fa-2x mt-2"></i>-->
        <!--        </div>-->
        <!--        <div class="flex-grow-1 ms-3">-->
        <!--         <h1 class="mb-4">AWARD-01</h1>-->
        <!--          <p>Outstanding Best</p>-->
        <!--        <p>Preschool Franchises</p>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <!--<div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">-->
        <!--     <div class="d-flex">-->
        <!--        <div class="flex-shrink-0">-->
        <!--            <i class="fa fa-star text-danger fa-2x mt-2"></i>-->
        <!--        </div>-->
        <!--        <div class="flex-grow-1 ms-3">-->
        <!--         <h1 class="mb-4">AWARD-02</h1>-->
        <!--              <p>Limca Book of World</p>-->
        <!--          <p>Records for UCMAS</p>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
             
    
        <!--  </div>-->
        <!--  </div>-->
       
                               
                            
        <!--</div>-->
                    
    </div>
    </div>
    </div>
    </div>
 
    
   
  
        
        
        
        <!-- Call To Action End -->
        
        
        
      
        
    <div class="site-section ">
    <div class="container">
      <div class="row align-items-center">
            <div class="card-body " >
                <h1 class=" mb-4 H1 fw-bolder "> Upcoming Event </h1>
                <div class="row mt-2 " id="lightgallery">
                    
                        <!--h4>We are a Concept Kindergarten that advocates children to develop with Love and Laughter.</h4-->
                    <div class="col-lg-3 mt-2 " data-src="{{asset('assets/img/Purple2.jpg')}}">
                        <div class="card tabcard printtabrespon" >
                            <div class="card-body " >
                                 <img src="{{asset('assets/img/Purple2.jpg')}}" class="img-fluid" alt="image small">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 mt-2" data-src="{{asset('assets/img/galary17.jpg')}}">
                        <div class="card tabcard printtabrespon" >
                             <div class="card-body ">
                                 <img src="{{asset('assets/img/galary17.jpg')}}" class="img-fluid" alt="image small">
                             </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 mt-2" data-src="{{asset('assets/img/Traingle.jpg')}}">
                        <div class="card tabcard printtabrespon ">
                             <div class="card-body">
                                 <img src="{{asset('assets/img/Traingle.jpg')}}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-md-3 mt-2 " data-src="{{asset('assets/img/galary19.jpg')}}">
                        <div class="card tabcard printtabrespon">
                            <div class="card-body">
                                 <img src="{{asset('assets/img/galary19.jpg')}}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 mt-2"  data-src="{{asset('assets/img/Study.jpg')}}">
                        <div class="card tabcard printtabrespon">
                             <div class="card-body">
                                 <img src="{{asset('assets/img/Study.jpg')}}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 mt-2" data-src="{{asset('assets/img/Circle.jpg')}}">
                        <div class="card tabcard printtabrespon">
                             <div class="card-body">
                                 <img src="{{asset('assets/img/Circle.jpg')}}" class="img-fluid">
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
                    
                    <div class="col-md-3 mt-2" data-src="{{asset('assets/img/Fish.jpg')}}">
                        <div class="card tabcard printtabrespon">
                             <div class="card-body">
                                 <img src="{{asset('assets/img/Fish.jpg')}}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    
                   
                </div>
      </div>
    </div>
  </div> 
<!--<hr>-->
  </div>
 
@stop