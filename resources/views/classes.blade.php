@extends('layout')
@section('content')


<style>
.profile {
    background-color: var(--primary-bg);
    height: 180px;
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


        <!-- Page Header End -->
        <div class="container py-5 page-header1 position-relative mb-5">
            <div class="container py-5">
                <h1 class="display-2 text-white animated slideInDown mb-4">Programs</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
                        <!--li class="breadcrumb-item"><a href="#">Pages</a></li-->
                        <li class="breadcrumb-item text-white active" aria-current="page">Programs</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- Classes Start -->
        <div class="container py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Programs</h1>
                    <p>Our vibrant learning environment is designed to bring out the playfulness in kids, which is backed by qualified and well-trained teachers and caring support staff.</p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="classes-item">
                            <div class="bg-light rounded-circle w-75 mx-auto p-3" id="program-1">
                                <img class="img-fluid rounded-circle" src="{{asset('assets/img/UC-playgroup.jpg')}}" alt="">
                            </div>
                            <div class="bg-light rounded p-4 pt-5 mt-n5 profile" onclick="expand(this)">
                                <a class="d-block text-center h4 mt-3 mb-4" >Playgroup</a>
                                <div class="row">
                                       <div class="col-4 mt-4 mb-4">
                                      <span class="bg-trasparent text-dark rounded-pill py-2 fw-bolder">Overview</span>  
                                       </div>
                                    </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p>Tiny tots are gifted with an innate desire to explore. Our thoughtfully curated curriculum enables little ones to explore, imagine, discover, listen, and create, while they delightfully take their bumbling baby steps!</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="d-flex align-items-center">
                                        <!--<img class="rounded-circle flex-shrink-0" src="{{asset('assets/img/user.jpg')}}" alt="" style="width: 45px; height: 45px;">-->
                                        <!--<div class="ms-3">-->
                                            <h6 class="text-primary mb-1">Quick Facts</h6>
                                            <!--<small>Teacher</small>-->
                                        <!--</div>-->
                                    </div>

                                </div>
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
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="classes-item">
                            <div class="bg-light rounded-circle w-75 mx-auto p-3" id="program-2">
                                <img class="img-fluid rounded-circle" src="{{asset('assets/img/UC-nursery.jpg')}}" alt="">
                            </div>
                            <div class="bg-light rounded p-4 pt-5 mt-n5 profile" onclick="expand(this)">
                                <a class="d-block text-center h4 mt-3 mb-4" >Nursery</a>
                                <div class="row">
                                       <div class="col-4 mt-4 mb-4">
                                      <span class="bg-trasparent text-dark rounded-pill py-2 fw-bolder">Overview</span>  
                                       </div>
                                    </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p>The Nursery program is designed to nurture tender minds, setting the stage for your child’s cognitive and emotional development.</p>
                                    </div>
                                </div>
                                
                                
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="d-flex align-items-center">
                                        <!--<img class="rounded-circle flex-shrink-0" src="{{asset('assets/img/user.jpg')}}" alt="" style="width: 45px; height: 45px;">-->
                                        <!--<div class="ms-3">-->
                                            <h6 class="text-primary mb-1">Quick Facts</h6>
                                            <!--<small>Teacher</small>-->
                                        <!--</div>-->
                                    </div>
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
                                            <small>UC English,<br> UC Maths,<br> UC Brilliant Science,<br> UC Social Science</small>
                                        </div>
                                    </div>
                                </div>
                                                                    
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="classes-item">
                            <div class="bg-light rounded-circle w-75 mx-auto p-3" id="program-3">
                                <img class="img-fluid rounded-circle" src="{{asset('assets/img/UC-jrkg.jpg')}}" alt="">
                            </div>
                            <div class="bg-light rounded p-4 pt-5 mt-n5 profile" onclick="expand(this)">
                                <a class="d-block text-center h4 mt-3 mb-4" > Junior. KG </a>
                                <div class="row">
                                       <div class="col-4 mt-4 mb-4">
                                      <span class="bg-trasparent text-dark rounded-pill py-2 fw-bolder">Overview</span>  
                                       </div>
                                    </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p>Based on 25 years of pathbreaking research in neuroscience, we have pioneered the Whole Brain Development approach.</p>
                                        <p>This innovative approach helps easily overcome learning difficulties among kids, such as boredom, short attention spans, and poor coordination.</p>
                                        <p>It turns learning into an engaging an immersive experience, where juniors become fast learners.</p>
                                        <p>We adopt a multi-layered teaching methodology of ‘conceptual learning using teaching aid material’. This includes:</p>
                                    </div>
                                </div>
                                
                                
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="d-flex align-items-center">
                                        <!--<img class="rounded-circle flex-shrink-0" src="{{asset('assets/img/user.jpg')}}" alt="" style="width: 45px; height: 45px;">-->
                                        <!--<div class="ms-3">-->
                                            <h6 class="text-primary mb-1">Quick Facts</h6>
                                            <!--<small>Teacher</small>-->
                                        <!--</div>-->
                                    </div>
                                </div>
                                
                                
                                
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
                    </div>
               
                <!--<div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">-->
                <!--    <h1 class="mt-5">Programs</h1>-->
                <!--    <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>-->
                <!--</div>-->
            <div class="row g-4 mt-3">
                
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="classes-item">
                            <div class="bg-light rounded-circle w-75 mx-auto p-3" id="program-1">
                                <img class="img-fluid rounded-circle" src="{{asset('assets/img/UC-srkg.jpg')}}" alt="">
                            </div>
                            <div class="bg-light rounded p-4 pt-5 mt-n5 profile" onclick="expand(this)">
                                <a class="d-block text-center h3 mt-3 mb-4" >Senior.KG</a>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="d-flex align-items-center">
                                      <span class="bg-trasparent text-dark rounded-pill py-2 fw-bolder">Overview</span>  
                                    </div>
                                </div>
                                <div class="row g-1">
                                    <div class="col-12">
                                        <p>Based on 25 years of pathbreaking research in neuroscience, we have pioneered the Whole Brain Development approach.</p>
                                        <p>This innovative approach helps easily overcome learning difficulties among kids, such as boredom, short attention spans, and poor coordination.</p>
                                        <p>It turns learning into an engaging an immersive experience, where juniors become fast learners.</p>
                                        <p>We adopt a multi-layered teaching methodology of ‘conceptual learning using teaching aid material’. This includes:</p>
                                    </div>
                                </div>   <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="d-flex align-items-center">
                                        <!--<img class="rounded-circle flex-shrink-0" src="{{asset('assets/img/user.jpg')}}" alt="" style="width: 45px; height: 45px;">-->
                                        <!--<div class="ms-3">-->
                                            <h6 class="text-primary mb-1">Quick Facts</h6>
                                            <!--<small>Teacher</small>-->
                                        <!--</div>-->
                                    </div>
                                </div>
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
                    </div>
                    
                    
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="classes-item">
                            <div class="bg-light rounded-circle w-75 mx-auto p-3" id="program-2">
                                <img class="img-fluid rounded-circle" src="{{asset('assets/img/UC-Brino.jpg')}}" alt="">
                            </div>
                            <div class="bg-light rounded p-4 pt-5 mt-n5 profile" onclick="expand(this)">
                                <a class="d-block text-center h3 mt-3 mb-4" >Brino’s Discovery Land (Concept Day Care)</a>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="d-flex align-items-center">
                                      <span class="bg-trasparent text-dark rounded-pill py-2 fw-bolder">Overview</span>  
                                    </div>
                                </div>
                                <div class="row g-1">
                                    <div class="col-12">
                                       <p>Moving away from the traditional Day Care model, UC Kindies brings you a Concept Day Care, also known as Brino’s Discovery Land.<br>
                                       Our Concept Day Care provides a platform for your kids to enrich their mental faculties and emotional abilities, while being cocooned in a stimulating and safe environment.
                                       </p> 
                                          <h5>Key Highlights</h5>
                                          <p><strong>Daily Theme</strong></p>
                                        <p>Every day of the week is assigned a specific theme, in which we teach different subjects. Children learn each subject through fun-filled activities, which help inculcate a natural love for the subject.</p>
                                       <p>Dedicated Teacher</p>  
                                       <p>Unlike most Day Care centers where the after school section is managed by a maid we at UC Kindies, have a dedicated and competent teacher to take care of your kids and teach them assorted life skills through fun activities.</p>
                                    </div>
                                </div>                               
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="classes-item">
                            <div class="bg-light rounded-circle w-75 mx-auto p-3" id="program-3">
                                <img class="img-fluid rounded-circle" src="{{asset('assets/img/07 day care.jpg')}}" alt="">
                            </div>
                            <div class="bg-light rounded p-4 pt-5 mt-n5 profile" onclick="expand(this)">
                                <a class="d-block text-center h3 mt-3 mb-4" >Enrichment Program</a>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="d-flex align-items-center">
                                      <span class="bg-trasparent text-dark rounded-pill py-2 fw-bolder">Overview</span>  
                                    </div>
                                </div>
                                
                                
                                <div class="row g-1">
                                    <div class="col-12">
                                       <p>Activity-focused program for non-Day Care students<br>
                                        Helps learn life skills in a fun, interesting way<br> 
                                        Flexible module; customization in terms of timing and activities available to suit needs of working parents<br>
                                        Helps keep children away from addictive gadgets
                                        </p> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Classes End -->


        <!-- Appointment Start -->
        <!--<div class="container py-5">-->
        <!--    <div class="container">-->
        <!--        <div class="bg-light rounded">-->
        <!--            <div class="row g-0">-->
        <!--                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">-->
        <!--                    <div class="h-100 d-flex flex-column justify-content-center p-5">-->
        <!--                        <h1 class="mb-4">Make Appointment</h1>-->
        <!--                        <form>-->
        <!--                            <div class="row g-3">-->
        <!--                                <div class="col-sm-6">-->
        <!--                                    <div class="form-floating">-->
        <!--                                        <input type="text" class="form-control border-0" id="gname" placeholder="Gurdian Name">-->
        <!--                                        <label for="gname">Gurdian Name</label>-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                                <div class="col-sm-6">-->
        <!--                                    <div class="form-floating">-->
        <!--                                        <input type="email" class="form-control border-0" id="gmail" placeholder="Gurdian Email">-->
        <!--                                        <label for="gmail">Gurdian Email</label>-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                                <div class="col-sm-6">-->
        <!--                                    <div class="form-floating">-->
        <!--                                        <input type="text" class="form-control border-0" id="cname" placeholder="Child Name">-->
        <!--                                        <label for="cname">Child Name</label>-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                                <div class="col-sm-6">-->
        <!--                                    <div class="form-floating">-->
        <!--                                        <input type="text" class="form-control border-0" id="cage" placeholder="Child Age">-->
        <!--                                        <label for="cage">Child Age</label>-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                                <div class="col-12">-->
        <!--                                    <div class="form-floating">-->
        <!--                                        <textarea class="form-control border-0" placeholder="Leave a message here" id="message" style="height: 100px"></textarea>-->
        <!--                                        <label for="message">Message</label>-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                                <div class="col-12">-->
        <!--                                    <button class="btn btn-primary w-100 py-3" type="submit">Submit</button>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                        </form>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">-->
        <!--                    <div class="position-relative h-100">-->
        <!--                        <img class="position-absolute w-100 h-100 rounded" src="{{asset('assets/img/appointment.jpg')}}" style="object-fit: cover;">-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <!-- Appointment End -->


         <!--Testimonial Start -->
        <!--<div class="container py-5">-->
        <!--    <div class="container">-->
        <!--        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">-->
        <!--            <h1 class="mb-3">Our Clients Say!</h1>-->
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
         <!--Testimonial End -->
        <script>
        function toggleProfile() {
            let getLink = document.querySelectorAll(".profile .btn-overview");
            getLink.forEach(addEvent => {  
                addEvent.onclick = (event) => {                
                    event.preventDefault();
                    let button = event.target;
                    let profileWrapper = button.closest(".profile");
                    profileWrapper.classList.toggle("profile--expanded");
                };
            });
        }
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