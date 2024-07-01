@extends('layout')
@section('content')


<style>


.header-carousel .owl-carousel-item {
    height: 85vh;
    background: no-repeat scroll;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}



.header-carousel .owl-text-container{
    position:absolute;
    bottom:10px;
}

.profile {
    background-color: var(--primary-bg);
    height: 265px;
    border-radius: 8px;
    position: relative;
    overflow: hidden;
    transition: height 0.2s ease;
    display: inline-block;
    vertical-align: top;
}
    .profile:hover {
        cursor: pointer;
    }
    .profile.profile--expanded {
        height: 740px;
        animation: expand 0.5s ease;
    }



        .profile--unexpanded > .profile__data, .profile--expanded > .profile__data {
            width: 100%;
            text-align: center;
            padding-top: inherit;
            height: 66px;
            position: absolute;
            top: 168px;

            display: flex;
            flex-wrap: nowrap;
            justify-content: space-around;
        }
        .profile--unexpanded > .profile__data {
            opacity: 0;
            animation: unreveal 0.2s ease;
        }
        .profile--expanded > .profile__data {
            opacity: 1;
            animation: reveal 0.7s ease;
        }
        .profile__data > * > * {
            display: block;
        }
        .profile__data > * > *:first-child {
            font-size: 1.2rem;
            font-weight: bold;
        }
        .profile__data > * > *:nth-child(2) {
            font-size: 0.9rem;
        }

@keyframes reveal {
    0% {
        opacity: 0;
        transform: translateY(-20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}
@keyframes unreveal {
    0% {
        opacity: 1;
        transform: translateY(0);
    }
    100% {
        opacity: 0;
        transform: translateY(-20px);
    }
}
@keyframes expand {
    0% {
        height: 350px;
    }
    100% {
        height: 500px;
    }
}
@keyframes unexpand {
    0% {
        height: 500px;
    }
    100% {
        height: 350px;
    }
}
</style>

<style>
@media (min-width: 1200px){
    
    
    .text-info-cust{
        font-size: 1.35rem;
    }
    .text-info-para-cust{
        font-size: 0.9rem;
    }
    
}

.text-orange{
    color: #fe5d37;
}

#team{
    padding-left:4rem;
    padding-right:4rem;
}

</style>





        <!-- Carousel Start -->
        <div class="container-fluid p-0 mb-5">
            
            <div class="owl-carousel header-carousel position-relative">
            <!-- Banner1 -->
                
                <div class="owl-carousel-item position-relative" style="background-image:url({{asset('assets/img/banner01.png')}})">
                    <!--<img class="img-fluid" src="{{asset('assets/img/banner01.png')}}"    alt="">-->
                    <div class="position-absolute top-0  start-0 w-100 h-100 d-flex align-items-center">
                        <div class="container owl-text-container">
                            <div class="row justify-content-start owl-carousel-text">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">Nurturing Your Child for the Top Schools in Town</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">UC Kindies provides well-rounded education, preparing your kid for a brighter tomorrow.</p>
                                    <!--<a href="" class="btn btn-primary rounded-pill py-sm-3 px-sm-5 me-3 animated slideInLeft">Learn More</a>-->
                                    <!--<a href="" class="btn btn-dark rounded-pill py-sm-3 px-sm-5 animated slideInRight">Our Classes</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Banner2 -->
                <div class="owl-carousel-item position-relative" style="background-image:url({{asset('assets/img/banner02.png')}})">
                    <!--<img class="img-fluid" src="{{asset('assets/img/banner02.png')}}" alt="">-->
                    <div class="position-absolute  top-0  start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .2);">
                        <div class="container owl-text-container">
                            <div class="row justify-content-start  owl-carousel-text">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white  animated slideInDown mb-4">Now Your 5-Year-Old Kid Will Be Able to Add or Subtract Three Digit Sums!</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Many more such surprises await you at UC Kindies.</p>
                                    <!--<a href="" class="btn btn-primary rounded-pill py-sm-3 px-sm-5 me-3 animated slideInLeft">Learn More</a>-->
                                    <!--<a href="" class="btn btn-dark rounded-pill py-sm-3 px-sm-5 animated slideInRight">Our Classes</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            <!-- Banner3 -->
                <div class="owl-carousel-item position-relative" style="background-image:url({{asset('assets/img/banner03.png')}})">
                    <!--<img class="img-fluid" src="{{asset('assets/img/banner03.png')}}" alt="">-->
                    <div class="  position-absolute  top-0  start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .2);">
                        <div class="container owl-text-container">
                            <div class="row justify-content-start  owl-carousel-text">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">Learning Should Be a Pleasure, Not Pressure…</h1>
                                    <p class="fs-5 fw-medium text-white  mb-4 pb-2">At UC Kindies, your kid learns joyfully in a stimulating and safe environment.</p>
                                    <!--<a href="" class="btn btn-primary rounded-pill py-sm-3 px-sm-5 me-3 animated slideInLeft">Learn More</a>-->
                                    <!--<a href="" class="btn btn-dark rounded-pill py-sm-3 px-sm-5 animated slideInRight">Our Classes</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Banner4 -->
                <div class="owl-carousel-item position-relative" style="background-image:url({{asset('assets/img/banner04.png')}})">
                    <!--<img class="img-fluid" src="{{asset('assets/img/banner04.png')}}" alt="">-->
                    <div class=" position-absolute  top-0  start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .2);">
                        <div class="container owl-text-container">
                            <div class="row justify-content-start owl-carousel-text">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">Turning Little Ones into Fast Learners</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">We nurture your kid with care and passion, equipping them with unique skills that make them smart learners.</p>
                                    <!--<a href="" class="btn btn-primary rounded-pill py-sm-3 px-sm-5 me-3 animated slideInLeft">Learn More</a>-->
                                    <!--<a href="" class="btn btn-dark rounded-pill py-sm-3 px-sm-5 animated slideInRight">Our Classes</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <!--Banner5-->
                <!--div class="owl-carousel-item position-relative" style="background-image:url({{asset('assets/img/banner05.png')}})">
                    <img class="img-fluid" src="{{asset('assets/img/01= Banner 2 and Brino VIVID Calcn SC_0334.jpg')}}" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .2);">
                        <div class="container owl-text-container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">Be a Proud Business Owner; Become Our Franchisee!</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">If you are an entrepreneur hungry for growth, UC Kindies provides you the platform to realize your aspirations.</p>
                                    <!--<a href="" class="btn btn-primary rounded-pill py-sm-3 px-sm-5 me-3 animated slideInLeft">Learn More</a>-->
                                    <!--<a href="" class="btn btn-dark rounded-pill py-sm-3 px-sm-5 animated slideInRight">Our Classes</a>->
                                </div>
                            </div>
                        </div>
                    </div>
                </div-->
                
            </div>
            
        </div>
        <!-- Carousel End -->


        <!-- Testimonial Start -->
        <div class="container-xxl">
            <div class="container">
                
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">About UC Kindies </h1>
                    <p>We are a Concept Kindergarten that advocates children to develop with love and laughter.<a href="about" class="text-orange">Read More</a></p>
                </div>
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3"> What Our Parents Say!</h1>
                    <!--<p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>-->
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                    <!--<div class="testimonial-item bg-light rounded p-5">-->
                    <!--    <p class="fs-5">Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>-->
                    <!--    <div class="d-flex align-items-center bg-white me-n5" style="border-radius: 50px 0 0 50px;">-->
                    <!--        <img class="img-fluid flex-shrink-0 rounded-circle" src="{{asset('assets/img/testimonial-1.jpg')}}" style="width: 90px; height: 90px;">-->
                    <!--        <div class="ps-3">-->
                    <!--            <h3 class="mb-1">Client Name</h3>-->
                    <!--            <span>Profession</span>-->
                    <!--        </div>-->
                    <!--        <i class="fa fa-quote-right fa-3x text-primary ms-auto d-none d-sm-flex"></i>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="testimonial-item bg-light rounded p-5">-->
                    <!--    <p class="fs-5">Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>-->
                    <!--    <div class="d-flex align-items-center bg-white me-n5" style="border-radius: 50px 0 0 50px;">-->
                    <!--        <img class="img-fluid flex-shrink-0 rounded-circle" src="{{asset('assets/img/testimonial-2.jpg')}}" style="width: 90px; height: 90px;">-->
                    <!--        <div class="ps-3">-->
                    <!--            <h3 class="mb-1">Client Name</h3>-->
                    <!--            <span>Profession</span>-->
                    <!--        </div>-->
                    <!--        <i class="fa fa-quote-right fa-3x text-primary ms-auto d-none d-sm-flex"></i>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="testimonial-item bg-light rounded p-5">
                        <video class="w-100" width="320" height="240" controls>
                        <source src="{{asset('assets/img/Parents Testimonial_ Aditya.mp4')}}" type="video/mp4">
                        <!--<source src="movie.ogg" type="video/ogg">-->
                        Your browser does not support the video tag.
                        </video>
                        
                    </div>
                     <div class="testimonial-item bg-light rounded p-5">
                        <video class="w-100" width="320" height="240" controls>
                        <source src="{{asset('assets/img/Parents Testimonial_ Charavi Jain.mp4')}}" type="video/mp4">
                        <!--<source src="movie.ogg" type="video/ogg">-->
                        Your browser does not support the video tag.
                        </video>
                        
                    </div>
                     <div class="testimonial-item bg-light rounded p-5">
                        <video class="w-100" width="320" height="240" controls>
                        <source src="{{asset('assets/img/Parents Testimonial_ Eva Badgujar.mp4')}}" type="video/mp4">
                        <!--<source src="movie.ogg" type="video/ogg">-->
                        Your browser does not support the video tag.
                        </video>
                        
                    </div>
                </div>
                
                
                
                <!-- <div class="text-center mx-auto mb-5 wow fadeInUp mt-5" data-wow-delay="0.1s" style="max-width: 600px;">-->
                <!--    <h1 class="mb-3"> What Our Partners Say!</h1>-->
                <!--    <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>-->
                <!--</div>-->
                <!--<div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">-->
                <!--    <div class="testimonial-item bg-light rounded p-5">-->
                <!--        <p class="fs-5">Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>-->
                <!--        <div class="d-flex align-items-center bg-white me-n5" style="border-radius: 50px 0 0 50px;">-->
                <!--            <img class="img-fluid flex-shrink-0 rounded-circle" src="{{asset('assets/img/testimonial-1.jpg')}}" style="width: 90px; height: 90px;">-->
                <!--            <div class="ps-3">-->
                <!--                <h3 class="mb-1">Client Name</h3>-->
                <!--                <span>Profession</span>-->
                <!--            </div>-->
                <!--            <i class="fa fa-quote-right fa-3x text-primary ms-auto d-none d-sm-flex"></i>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="testimonial-item bg-light rounded p-5">-->
                <!--        <p class="fs-5">Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>-->
                <!--        <div class="d-flex align-items-center bg-white me-n5" style="border-radius: 50px 0 0 50px;">-->
                <!--            <img class="img-fluid flex-shrink-0 rounded-circle" src="{{asset('assets/img/testimonial-2.jpg')}}" style="width: 90px; height: 90px;">-->
                <!--            <div class="ps-3">-->
                <!--                <h3 class="mb-1">Client Name</h3>-->
                <!--                <span>Profession</span>-->
                <!--            </div>-->
                <!--            <i class="fa fa-quote-right fa-3x text-primary ms-auto d-none d-sm-flex"></i>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="testimonial-item bg-light rounded p-5">-->
                <!--        <video class="w-100" width="320" height="240" controls>-->
                <!--        <source src="{{asset('assets/img/testimonial-video.mp4')}}" type="video/mp4">-->
                        <!--<source src="movie.ogg" type="video/ogg">-->
                <!--        Your browser does not support the video tag.-->
                <!--        </video>-->
                        
                <!--    </div>-->
                <!--</div>-->

            </div>
        </div>
        <!-- Testimonial End -->
        
        
        <!--<div class="container-xxl py-5">-->
        <!--    <div class="container">-->
        <!--        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">-->
        <!--            <h1 class="mb-3">About UC Kindies </h1>-->
        <!--            <p>We are a Concept Kindergarten that advocates children to develop with love and laughter.<a href="about" class="text-orange">Read More</a></p>-->
        <!--        </div>-->
        <!--        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">-->
        <!--            <h1 class="mb-3"> What Our Partners Say!</h1>-->
        <!--            <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>-->
        <!--        </div>-->
        <!--        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">-->
        <!--            <div class="testimonial-item bg-light rounded p-5">-->
        <!--                <p class="fs-5">Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>-->
        <!--                <div class="d-flex align-items-center bg-white me-n5" style="border-radius: 50px 0 0 50px;">-->
        <!--                    <img class="img-fluid flex-shrink-0 rounded-circle" src="{{asset('assets/img/testimonial-1.jpg')}}" style="width: 90px; height: 90px;">-->
        <!--                    <div class="ps-3">-->
        <!--                        <h3 class="mb-1">Client Name</h3>-->
        <!--                        <span>Profession</span>-->
        <!--                    </div>-->
        <!--                    <i class="fa fa-quote-right fa-3x text-primary ms-auto d-none d-sm-flex"></i>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="testimonial-item bg-light rounded p-5">-->
        <!--                <p class="fs-5">Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>-->
        <!--                <div class="d-flex align-items-center bg-white me-n5" style="border-radius: 50px 0 0 50px;">-->
        <!--                    <img class="img-fluid flex-shrink-0 rounded-circle" src="{{asset('assets/img/testimonial-2.jpg')}}" style="width: 90px; height: 90px;">-->
        <!--                    <div class="ps-3">-->
        <!--                        <h3 class="mb-1">Client Name</h3>-->
        <!--                        <span>Profession</span>-->
        <!--                    </div>-->
        <!--                    <i class="fa fa-quote-right fa-3x text-primary ms-auto d-none d-sm-flex"></i>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="testimonial-item bg-light rounded p-5">-->
        <!--                <p class="fs-5">Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>-->
        <!--                <div class="d-flex align-items-center bg-white me-n5" style="border-radius: 50px 0 0 50px;">-->
        <!--                    <img class="img-fluid flex-shrink-0 rounded-circle" src="{{asset('assets/img/testimonial-3.jpg')}}" style="width: 90px; height: 90px;">-->
        <!--                    <div class="ps-3">-->
        <!--                        <h3 class="mb-1">Client Name</h3>-->
        <!--                        <span>Profession</span>-->
        <!--                    </div>-->
        <!--                    <i class="fa fa-quote-right fa-3x text-primary ms-auto d-none d-sm-flex"></i>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        
        <!-- Team Start -->
        <div class="container py-5" id="team">
            <div class="container ">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Our Team</h1>
                    <!--<p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit-->
                    <!--    eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>-->
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item position-relative">
                            <img class="img-fluid rounded-circle w-50" src="{{asset('assets/img/director01.png')}}" alt="">
                            <div class="team-text director-1">
                                <h3 class="popup_main">Sanjay Bhoir</h3>
                                <p>Director</p>
                                <!--<div class="d-flex align-items-center">-->
                                <!--    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>-->
                                <!--    <a class="btn btn-square btn-primary  mx-1" href=""><i class="fab fa-twitter"></i></a>-->
                                <!--    <a class="btn btn-square btn-primary  mx-1" href=""><i class="fab fa-instagram"></i></a>-->
                                <!--</div>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item position-relative">
                            <img class="img-fluid rounded-circle w-50" src="{{asset('assets/img/director02.png')}}" alt="">
                            <div class="team-text director-2">
                                <h3>C.D. Mishra</h3>
                                <p>Director</p>
                                <div class="d-flex align-items-center">
                                    <!--<a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>-->
                                    <!--<a class="btn btn-square btn-primary  mx-1" href=""><i class="fab fa-twitter"></i></a>-->
                                    <!--<a class="btn btn-square btn-primary  mx-1" href=""><i class="fab fa-instagram"></i></a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item position-relative">
                            <img class="img-fluid rounded-circle w-50" src="{{asset('assets/img/director03.png')}}" alt="">
                            <div class="team-text director-3">
                                <h3>Bhanu Rajput</h3>
                                <p>Director</p>
                                <div class="d-flex align-items-center">
                                    <!--<p></p>-->
                                    <!--<a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>-->
                                    <!--<a class="btn btn-square btn-primary  mx-1" href=""><i class="fab fa-twitter"></i></a>-->
                                    <!--<a class="btn btn-square btn-primary  mx-1" href=""><i class="fab fa-instagram"></i></a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="mt-4 text-center" style="padding-top: 30px;">
                    <a class="bg-primary text-white rounded-pill py-2 px-3" href="about#our_team">Know More
                     <i class="fa fa-arrow-right" aria-hidden="true"></i>
                     </a>
                     </div>                    
                </div>
            </div>
        </div>
        <!-- Team End -->        
        
        <!-- Classes Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Programs</h1>
                    <p>Our thoughtfully curated programs address the learning needs and concerns of specific age groups among children.</p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="classes-item">
                            <div class="bg-light rounded-circle w-75 mx-auto p-3" id="program-1">
                                <img class="img-fluid rounded-circle" src="{{asset('assets/img/classes-1.jpg')}}" alt="">
                            </div>
                            <div class="bg-light rounded p-4 pt-5 mt-n5 profile"  onclick="expand(this)">
                                <a class="d-block text-center h4 mt-3 mb-4" >Playgroup</a>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="d-flex align-items-center">
                                        <!--<img class="rounded-circle flex-shrink-0" src="{{asset('assets/img/user.jpg')}}" alt="" style="width: 45px; height: 45px;">-->
                                        <!--<div class="ms-3">-->
                                            <h6 class="text-primary mb-1">Quick Facts</h6>
                                            <!--<small>Teacher</small>-->
                                        <!--</div>-->
                                    </div>
                                    <!--<span class="bg-primary text-white rounded-pill py-2 px-3" href="">Overview</span>-->
                                </div>
                                <div class="row g-1">
                                    <div class="col-3">
                                        <div class="border-top border-3 border-primary pt-2">
                                            <h6 class="text-primary mb-1">Age group:</h6>
                                            <small>2-2.5 years</small>
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
                                            <h6 class="text-warning mb-1">Skills Taught:</h6>
                                            <small>Tiny tots at this age are gifted with excellent listening and observing abilities. Our thoughtfully curated curriculum enables little ones to develop fine and gross motor skills as well as language basics while they delightfully take their bumbling baby steps!</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="classes-item">
                            <div class="bg-light rounded-circle w-75 mx-auto p-3" id="program-2">
                                <img class="img-fluid rounded-circle" src="{{asset('assets/img/classes-2.jpg')}}" alt="">
                            </div>
                            <div class="bg-light rounded p-4 pt-5 mt-n5 profile"  onclick="expand(this)">
                                <a class="d-block text-center h4 mt-3 mb-4">Nursery</a>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="d-flex align-items-center">
                                        <!--<img class="rounded-circle flex-shrink-0" src="{{asset('assets/img/user.jpg')}}" alt="" style="width: 45px; height: 45px;">-->
                                        <!--<div class="ms-3">-->
                                            <h6 class="text-primary mb-1">Quick Facts</h6>
                                            <!--<small>Teacher</small>-->
                                        <!--</div>-->
                                    </div>
                                    <!--<span class="bg-primary text-white rounded-pill py-2 px-3" href="">Overview</span>-->
                                </div>
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
                                            <small>The Nursery program is designed to nurture tender minds, setting the stage for your child’s cognitive and emotional development.</small>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="classes-item">
                            <div class="bg-light rounded-circle w-75 mx-auto p-3" id="program-3">
                                <img class="img-fluid rounded-circle" src="{{asset('assets/img/classes-3.jpg')}}" alt="">
                            </div>
                            <div class="bg-light rounded p-4 pt-5 mt-n5 profile"  onclick="expand(this)">
                                <a class="d-block text-center h4 mt-3 mb-4"> Junior. KG  </a>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="d-flex align-items-center">
                                        <!--<img class="rounded-circle flex-shrink-0" src="{{asset('assets/img/user.jpg')}}" alt="" style="width: 45px; height: 45px;">-->
                                        <!--<div class="ms-3">-->
                                            <h6 class="text-primary mb-1">Quick Facts</h6>
                                            <!--<small>Teacher</small>-->
                                        <!--</div>-->
                                    </div>
                                    <!--<span class="bg-primary text-white rounded-pill py-2 px-3" href="">Overview</span>-->
                                </div>
                                <div class="row g-1">
                                    <div class="col-3">
                                        <div class="border-top border-3 border-primary pt-2">
                                            <h6 class="text-primary mb-1">Age group (Jr.KG & Sr.KG):</h6>
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
                                            <small>UC English, UC Maths, UC Brilliant Science, </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-center" style="padding-top: 30px;">
                    <a class="bg-primary text-white rounded-pill py-2 px-3" href="classes">See all courses</a>
                </div>
            </div>
        </div>
        <!-- Classes End -->        

        <!-- Appointment Start -->
        <div class="container py-5">
            <div class="container">
                <div class="bg-light rounded">
                    <div class="row g-0">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                            <div class="h-100 d-flex flex-column justify-content-center p-5">
                                <h1 class="mb-4"> Franchisee </h1>
                                <p>Aspiring entrepreneurs can team up with UC Kindies to unlock new growth opportunities with our proven learning model!</p>
                                <a class="bg-primary text-white rounded-pill py-2 px-3 col-3 text-center" href="franchise">Read More</a>
                                
                                <!--<form>-->
                                <!--    <div class="row g-3">-->
                                        <!--<div class="col-sm-6">-->
                                        <!--    <div class="form-floating">-->
                                        <!--        <input type="text" class="form-control border-0" id="gname" placeholder="Gurdian Name">-->
                                        <!--        <label for="gname">Gurdian Name</label>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                <!--        <div class="col-sm-6">-->
                                <!--            <div class="form-floating">-->
                                <!--                <input type="email" class="form-control border-0" id="gmail" placeholder="Gurdian Email">-->
                                <!--                <label for="gmail">Gurdian Email</label>-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--        <div class="col-sm-6">-->
                                <!--            <div class="form-floating">-->
                                <!--                <input type="text" class="form-control border-0" id="cname" placeholder="Child Name">-->
                                <!--                <label for="cname">Child Name</label>-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--        <div class="col-sm-6">-->
                                <!--            <div class="form-floating">-->
                                <!--                <input type="text" class="form-control border-0" id="cage" placeholder="Child Age">-->
                                <!--                <label for="cage">Child Age</label>-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--        <div class="col-12">-->
                                <!--            <div class="form-floating">-->
                                <!--                <textarea class="form-control border-0" placeholder="Leave a message here" id="message" style="height: 100px"></textarea>-->
                                <!--                <label for="message">Message</label>-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--        <div class="col-12">-->
                                <!--            <button class="btn btn-primary w-100 py-3" type="submit">Submit</button>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</form>-->
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                            <div class="position-relative h-100">
                                <img class="position-absolute w-100 h-100 rounded" src="{{asset('assets/img/daycare-centre-in-mumbai.jpg')}}" style="object-fit: cover;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Appointment End -->

        <!-- Facilities Start -->
        <div class="container py-5">
            <div class="container">
                
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Why UC Kindies is So Unique?</h1>
                    
                </div>
                
                <div class="row g-4 mb-5 d-flex justify-content-center">
                    
                    <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="facility-item">
                            <div class="facility-icon bg-primary">
                                <span class="bg-primary"></span>
                                <i class="fa fa-bus-alt fa-3x text-primary"></i>
                                <span class="bg-primary"></span>
                            </div>
                            <div class="facility-text bg-primary">
                                <h3 class="text-primary mb-3 text-info-cust">Proven Methodology</h3>
                                <p class="mb-0 text-info-para-cust">Pioneering research in Whole Brain Development done by our Founder-President Prof. Dr Dino Wong and his team forms the basis of our methodology, which is both ‘effective’ and ‘efficient’.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="facility-item">
                            <div class="facility-icon bg-success">
                                <span class="bg-success"></span>
                                <i class="fa fa-futbol fa-3x text-success"></i>
                                <span class="bg-success"></span>
                            </div>
                            <div class="facility-text bg-success">
                                <h3 class="text-success mb-3 text-info-cust">Innovative Approach</h3>
                                <p class="mb-0 text-info-para-cust">At UC Kindies, your child is freed up from the clutches of
conventional rote learning. They enjoy assimilating the
same concept through auditory, kinesthetic, and sensory
approaches; it helps reinforce the idea in an easy and
organic way.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="facility-item">
                            <div class="facility-icon bg-warning">
                                <span class="bg-warning"></span>
                                <i class="fa fa-home fa-3x text-warning"></i>
                                <span class="bg-warning"></span>
                            </div>
                            <div class="facility-text bg-warning">
                                <h3 class="text-warning mb-3 text-info-cust">Arousing Curiosity, Amplifying Creativity</h3>
                                <p class="mb-0 text-info-para-cust">Using unique and innovative tools, along with the
Interactive UC Treasure Box, children easily learn various
concepts with better intuition and imagination.</p>
                            </div>
                        </div>
                    </div>                    
                    
                </div>
                    
                <div class="row g-4">
                    
                    <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="facility-item">
                            <div class="facility-icon bg-primary">
                                <span class="bg-primary"></span>
                                <i class="fa fa-chalkboard-teacher fa-3x text-primary"></i>
                                <span class="bg-primary"></span>
                            </div>
                            <div class="facility-text bg-primary">
                                <h3 class="text-primary mb-3 text-info-cust">Experiential Learning</h3>
                                <p class="mb-0 text-info-para-cust">We promote a hands-on approach to learning, where the
focus is on ‘education through experience’ rather than
the typical academic approach.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="facility-item">
                            <div class="facility-icon bg-success">
                                <span class="bg-success"></span>
                                <i class="fa fa-chalkboard-teacher fa-3x text-success"></i>
                                <span class="bg-success"></span>
                            </div>
                            <div class="facility-text bg-success">
                                <h3 class="text-success mb-3 text-info-cust">Immersive Experiences</h3>
                                <p class="mb-0 text-info-para-cust">At UC Kindies, kids learn in a safe, hygienic, vibrant, and interactive environment.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="facility-item">
                            <div class="facility-icon bg-warning">
                                <span class="bg-warning"></span>
                                <i class="fa fa-chalkboard-teacher fa-3x text-warning"></i>
                                <span class="bg-warning"></span>
                            </div>
                            <div class="facility-text bg-warning">
                                <h3 class="text-warning mb-3 text-info-cust">Whole Brain Development</h3>
                                <p class="mb-0 text-info-para-cust">With our focus on Whole Brain Development, children
benefit in multiple ways, collectively labeled as COMIC
JARS: Concentration; Observation; Photographic
Memory; Imagination; Creativity; Judgment; Application;
Reasoning; Self-Confidence</p>
                            </div>
                        </div>
                    </div>                    
                    
                </div>
                
            </div>
        </div>
        <!-- Facilities End -->



        <!-- About Start -->
        <!--<div class="container py-5">-->
        <!--    <div class="container">-->
        <!--        <div class="row g-5 align-items-center">-->
        <!--            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">-->
        <!--                <h1 class="mb-4">Inspiration, Not Just Instruction!</h1>-->
        <!--                <h4>We are a concept kindergarten that advocates children to develop with love and laughter.</h4>-->
        <!--                <p class="mb-4">UC Kindies is a Concept Pre-School where kids have a great time learning all the good things that matter. Resting our work on the complexities of neuroscience, we teach with a delightfully different twist. Our unique-->
        <!--                                approach inspired by Whole Brain Development helps to enhance kids’ cognitive abilities, fine motor skills, and gross motor skills.</p>-->
        <!--                <p class="mb-3">We trigger intuitiveness and curiosity among kids, inculcate a growth mindset, and strive to make them happy and emotionally healthy.</p>-->
        <!--                <h4>A Proud Legacy</h4>-->
        <!--                <p class="mb-3">UC Kindies is a part of Malaysia-based UC International Corporation, which has done groundbreaking work in the field of mental development.</p>-->
        <!--                <p class="mb-3">Under the visionary and dynamic leadership of Prof. Dr Dino Wong, UCIC has achieved breakthrough results in Whole Brain development. The -->
        <!--                scientifically proven, innovative learning skills pioneered by Prof. Dr Dino Wong form the foundation of UC Kindies, which offers well-rounded education for today’s pre-schoolers.</p>-->
        <!--                <div class="row g-4 align-items-center">-->
        <!--                    <div class="col-sm-6">-->
        <!--                        <a class="btn btn-primary rounded-pill py-3 px-5" href="">Read More</a>-->
        <!--                    </div>-->
                            <!--<div class="col-sm-6">-->
                            <!--    <div class="d-flex align-items-center">-->
                            <!--        <img class="rounded-circle flex-shrink-0" src="{{asset('assets/img/user.jpg')}}" alt="" style="width: 45px; height: 45px;">-->
                            <!--        <div class="ms-3">-->
                            <!--            <h6 class="text-primary mb-1">Jhon Doe</h6>-->
                            <!--            <small>CEO & Founder</small>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="col-lg-6 about-img wow fadeInUp" data-wow-delay="0.5s">-->
        <!--                <div class="row">-->
        <!--                    <div class="col-12 text-center">-->
        <!--                        <img class="img-fluid w-75 rounded-circle bg-light p-3" src="{{asset('assets/img/about-1.jpg')}}" alt="">-->
        <!--                    </div>-->
        <!--                    <div class="col-6 text-start" style="margin-top: -150px;">-->
        <!--                        <img class="img-fluid w-100 rounded-circle bg-light p-3" src="{{asset('assets/img/about-2.jpg')}}" alt="">-->
        <!--                    </div>-->
        <!--                    <div class="col-6 text-end" style="margin-top: -150px;">-->
        <!--                        <img class="img-fluid w-100 rounded-circle bg-light p-3" src="{{asset('assets/img/about-3.jpg')}}" alt="">-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <!-- About End -->


        <!-- Call To Action Start -->
        <div class="container py-5">
            <div class="container">
                <div class="bg-light rounded">
                    <div class="row g-0">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s" style="min-height: 400px;">
                            <div class="position-relative h-100">
                                <img class="position-absolute w-100 h-100 rounded" src="{{asset('assets/img/Preschool-franchisee.jpg')}}" style="object-fit: cover;">
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                            <div class="h-100 d-flex flex-column justify-content-center p-5">
                                <h1 class="mb-4">Not Just another Kindergarten… </h1>
                                <p class="mb-4">Progressive minded parents in growing numbers are choosing UC Kindies as their kids’ pre-school.
                                </p>
                                <p>Talk to our Counselor today to discover the multifaceted benefits of enrolling your child at UC Kindies.</p>
                                <p>For more details, please call: +91 99305 56597<br>
                                 Or write to us at: admin.india@uckindies.com
                                </p>
                                <!--<a class="btn btn-primary py-3 px-5" href="">Get Started Now<i class="fa fa-arrow-right ms-2"></i></a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call To Action End -->

        <script>
            function expand(card) {
            card.classList.toggle('profile--expanded');

            // If card is not expanded after toggle, add 'unexpanded' class
            if (!card.classList.contains('profile--expanded')) card.classList.toggle('profile--unexpanded');
            // Else if card is expanded after toggle and still contains 'unexpanded' class, remove 'unexpanded'
            else if (card.classList.contains('profile--expanded') && card.classList.contains('profile--unexpanded')) card.classList.toggle('profile--unexpanded');
        }

        function toggleTheme() {
            let docu = document.querySelector('html');

            docu.classList.toggle('light-theme');
            docu.classList.toggle('dark-theme');
        }
        </script>
@stop