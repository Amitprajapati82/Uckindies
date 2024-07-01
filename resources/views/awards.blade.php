@extends('layout')
@section('content')


<style>
.card-title{
    font-family: Arial, Helvetica, sans-serif;
    font-size:30px;
}


h2.mb-4.H1::after {
    content: '';
    display: block;
    height: 2px;
    width: 45%;
    background: red;
    margin-top: 5px;
    font-weight:400px;
}
</style>
        <!-- Page Header End -->
        <div class="container py-5 page-header position-relative mb-5">
            <div class="container py-5">
                <h1 class="display-2 text-white animated slideInDown mb-4">Awards</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
                        <!--<li class="breadcrumb-item"><a href="#">Pages</a></li>-->
                        <li class="breadcrumb-item text-white active" aria-current="page">Awards</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->
        
        
         <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-4">AWARDS</h1> 
                </div>
  <div class="row row-cols-1 row-cols-md-2 g-0 ">
  <div class="col g-0 ">
    <div class="card text-center border-0" style="margin-top:40px" >
      <img src="{{asset('assets/img/award1.jpg')}}" class="card-img-top img-fluid mx-auto" alt="..." style="width:80%">
      <div class="card-body">
        <h1 class="card-title"> "HALL OF FAME AWARD" 2019 </h1>
        <h5 class="card-text" > "Top 50 Franchised Preschool in Asia" Awarded at city palace, jaipur 2019.</h5>
      </div>
    </div>
  </div>
  <div class="col g-0 ">
    <div class="card text-center border-0" style="margin-top:40px">
      <img src="{{asset('assets/img/award2.jpg')}}" class="card-img-top img-fluid mx-auto" alt="..." style="width:80%" >
      <div class="card-body">
       <h1 class="card-title">Internaional School Award </h1>
        <h5 class="card-text"> "Teaching Exellence" at Amity University Dubai,2020.</h5>
             <h5><span>Chief Guest: <span>Dr.Deepak Vohra (Indian diplomat)</span></span></h5>
                      
      </div>
    </div>
  </div>
  <div class="col g-0 ">
    <div class="card text-center border-0" style="margin-top:40px; margin-bottom:40px">
      <img src="{{asset('assets/img/award3.jpg')}}" class="card-img-top img-fluid mx-auto" alt="..." style="width:80%">
      <div class="card-body">
        <h1 class="card-title">DR.Anurabh Singh, Director </h1>
        <h5 class="card-text"> Nehru Worldschool Gaziabad and Smt.Asha Varma, senior Educationist.</h5>
        
                      
      </div>
    </div>
  </div>
  <div class="col g-0 ">
    <div class="card text-center border-0" style="margin-top:40px">
      <img src="{{asset('assets/img/award4.jpg')}}" class="card-img-top img-fluid mx-auto" alt="..." style="width:80%">
      <div class="card-body">
        <!--<h1 class="card-title">Card title</h1>-->
        <h5 class="card-text "> UC Kindies Director Sanjay Bhoir Receiving Award from Dr.Deepak Vohra.</h5>
      </div>
    </div>
  </div>
</div>




         
                 
            <!--<div class="container py-5">-->
            <!--<div class="container">-->
            <!--    <div class="col-md-6 mt-2 " data-src="{{asset('assets/img/hall.jpg')}}">-->
            <!--            <div class="card tabcard printtabrespon" >-->
            <!--                <div class="card-body d-flex align-items-center justify-content-center " >-->
            <!--                     <img src="{{asset('assets/img/hall.jpg')}}" class="img-fluid" alt="image small">-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    <div class="row g-5 d-flex align-items-center justify-content-center">-->
            <!--        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">-->
            <!--            <h1 class="mb-4">  "HALL OF FAME AWARD" 2019 </h1>-->
            <!--            <h5> "Top 50 Franchised Preschool in Asia" Awarded at city palace, jaipur 2019</h5>-->
            <!--             </div>-->
                      
                    <!--      <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">-->
                    <!--           <div class="col-md-3 mt-2 " data-src="{{asset('assets/img/galary1.jpg')}}">-->
                    <!--    <div class="card tabcard printtabrespon" >-->
                    <!--        <div class="card-body " >-->
                    <!--             <img src="{{asset('assets/img/galary1.jpg')}}" class="img-fluid" alt="image small">-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--      <h1 class="mb-4">Dr.Arunabh Singh, Director </h1>-->
                    <!--     <h5>Nehru Worldschool Gaziabad and Smt.Asha Varma, senior Educationist   </h5>-->
                     
 
                    <!--</div>-->
            <!--        </div>-->
            <!--        </div>-->
            <!--        </div>-->
                    
                    
            <!-- <div class="container py-5">-->
            <!--<div class="container">-->
            <!--    <div class="col-md-3 mt-2 " data-src="{{asset('assets/img/galary1.jpg')}}">-->
            <!--            <div class="card tabcard printtabrespon" >-->
            <!--                <div class="card-body " >-->
            <!--                     <img src="{{asset('assets/img/Award  (2).jpg')}}" class="img-fluid" alt="image small">-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    <div class="row g-5 d-flex align-items-center justify-content-start">-->
            <!--        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">-->
            <!--            <h1 class="mb-4">Dr.Arunabh Singh, Director</h1>-->
            <!--            <h5>Nehru Worldschool Gaziabad and Smt.Asha Varma, senior Educationist </h5>-->
                        <!--<h5><span>Chief Diector: <span>Dr.Deepak Vohra (Indian diplomat)</span></span></h5>-->
                      
            <!--             </div>-->
                    <!--      <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">-->
                              
                
                    <!--     <h5>UC Kindies Director Sanjay Bhoir Receiving Award from Dr.Deepak Vohra</h5>-->
                     
 
                    <!--</div>-->
            <!--        </div>-->
            <!--        </div>-->
            <!--        </div>-->
                    
            <!--           <div class="container py-5">-->
            <!--<div class="container">-->
            <!--    <div class="col-md-3 mt-2 " data-src="{{asset('assets/img/galary1.jpg')}}">-->
            <!--            <div class="card tabcard printtabrespon" >-->
            <!--                <div class="card-body " >-->
            <!--                     <img src="{{asset('assets/img/2b award.JPG')}}" class="img-fluid" alt="image small">-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    <div class="row g-5 d-flex align-items-center justify-content-start">-->
            <!--        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">-->
            <!--            <h1 class="mb-4">Blue Certificate</h1>-->
            <!--            <h5>Internaional School Award "Teaching Exellence" at Amity University Dubai,2020</h5>-->
            <!--            <h5><span>Chief Diector: <span>Dr.Deepak Vohra (Indian diplomat)</span></span></h5>-->
                      
            <!--             </div>-->
            <!--             </div>-->
            <!--               </div>-->
            <!--        </div>-->
                    
            <!--<div class="container py-5">-->
            <!--<div class="container">-->
            <!--    <div class="col-md-3 mt-2 " data-src="{{asset('assets/img/galary1.jpg')}}">-->
            <!--            <div class="card tabcard printtabrespon" >-->
            <!--                <div class="card-body " >-->
            <!--                     <img src="{{asset('assets/img/galary1.jpg')}}" class="img-fluid" alt="image small">-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    <div class="row g-5 d-flex align-items-center justify-content-start">-->
            <!--        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">-->
                        <!--<h1 class="mb-4">Blue Certificate</h1>-->
            <!--            <h5> UC Kindies Director Sanjay Bhoir Receiving Award from Dr.Deepak Vohra</h5>-->
                       
                      
            <!--             </div>-->
            <!--             </div>-->
            <!--               </div>-->
            <!--        </div>-->
                        
        
       
@stop