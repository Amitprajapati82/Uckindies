  @extends('layout')
@section('content')

  <style>
.card.w-50{
    bottom:70px;
}

    
  </style>


               <!-- Page Header End -->
        <div class="container py-5  position-relative mb-5">
            <!--<div class="container py-5">-->
            <!--    <h1 class="display-2 text-white animated slideInDown mb-4">Programs</h1>-->
            <!--    <nav aria-label="breadcrumb animated slideInDown">-->
            <!--        <ol class="breadcrumb">-->
                        <!--<li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>-->
                        <!--li class="breadcrumb-item"><a href="#">Pages</a></li-->
            <!--            <li class="breadcrumb-item text-white active" aria-current="page">Programs</li>-->
            <!--        </ol>-->
            <!--    </nav>-->
            <!--</div>-->
        </div>
        <!-- Page Header End -->   
        
        
        
        
        <div class="card w-50 mx-auto">
         <h5 class="card-header">Login</h5>
           <div class="card-body">
             <form>
                 <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email ">
                 </div>
                
                     <button type="submit" class="btn btn-primary rounded-pill">Send Mail</button>
             </form>
           </div>
        </div>
        
<!--        <div class="card w-50">-->
<!--  <div class="card-body">-->
<!--    <h5 class="card-title">Card title</h5>-->
<!--    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>-->
<!--    <a href="#" class="btn btn-primary">Button</a>-->
<!--  </div>-->
<!--</div>-->



        
        


@stop