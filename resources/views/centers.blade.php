@extends('layout')
@section('content')

        <!-- Page Header End -->
        <div class="container py-5 page-header3 position-relative mb-5">
            <div class="container py-5">
                <h1 class="display-2 text-white animated slideInDown mb-4">Learning Centers</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Centers</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->


        <div class="container py-5">
            <div class="container">
                  <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">LEARNING CENTER </h1> 
                </div>
                <div class="row g-5 d-flex align-items-center justify-content-start">
                    
                    @if($data)
                    
                     @foreach($State as $Statevalue)
                     <?php 
                     $key = 1; 
                     $url1 = strtolower($Statevalue->state_name);
                     $url = str_replace(' ', '_', $url1);
                    //  echo'<pre>';printf($data);die;
                     
                     ?>
                     
                    <h1 >
                        <!--<a href="javascript:void(0)">	{{$Statevalue->state_name}} </a>-->
                        <a href="{{ asset('states/'.$url.'?id='.$Statevalue->ID) }}">
                            {{$Statevalue->state_name}}
                        </a>

                           </h1>
                    @foreach($data as $value)
                    
                        @if($Statevalue->ID == $value->state_id)
                        <?php 
                            $unitUrl = strtolower($value->center);
                            $unitUrl = str_replace(' ', '_', $unitUrl);
                        ?>
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                            
                        <h4 ><a class="text-head4" href="{{asset('units/'.$unitUrl.'?id='.$value->ID)}}">{{ $key }} {{ $value->center }}</a></h4>

                            <p><span>Address : - </span><span>{{$value->address}}</span></p>
                            <p><span>Contact No : - </span><span>{{$value->contact}} </span></p>
                            <p><span>Email Id : - </span><span>{{$value->email}}</span></p>
                             <!--<p><span>Facebook Link : - </span><span>http://www.facebook.com/profile.php?id=100077292031184</span></p>-->
                             <!--<p><span>Insta Link : - </span><span></span></p>-->
                        </div>
                        <?php $key++; ?>
                        @endif
                    @endforeach
                    
                    @endforeach
                    @endif
                    
                    
                </div>
            </div>
        </div>
        

@stop