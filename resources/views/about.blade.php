@extends('layout')
@section('content')

<style>
 #team{
     padding-right:6rem;
     padding-left:6rem;
 }
</style>


        <!-- Page Header End -->
        <div class="container py-5 page-header position-relative mb-5">
            <div class="container py-5">
                <h1 class="display-2 text-white animated slideInDown mb-4">About Us</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">About Us</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- About Start -->
        <div class="container">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">ABOUT US</h1> 
                </div>
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <h1 class="mb-4">Inspiration, Not Just Instruction!</h1>
                        <h4>We are a Concept Kindergarten that advocates children to develop with Love and Laughter.</h4>
                        <p>UC Kindies is a Concept Kindergarten, where kids have a great time learning all the good things that matter. Resting our work on the complexities of neuroscience, we teach with a delightfully different twist. Our unique approach inspired by Whole Brain Development helps to enhance kids’ cognitive abilities, fine motor skills, and gross motor skills.</p>
                        <p class="mb-4">We trigger intuitiveness and curiosity among kids, inculcate a growth mindset, and strive to make them happy and emotionally healthy.</p>
                        <p>&nbsp;</p>
                        <h4>A Proud Legacy</h4>
                        <p>UC Kindies is a part of Malaysia-based UC International Corporation, which has done groundbreaking work in the field of mental development.</p>
                        <p>Under the visionary and dynamic leadership of Prof.Dr Dino Wang, UCIC has achieved breakthrough results in Whole Brain Development. The scientifically proven, innovative learning skills pioneered by Prof. Dr Dino Wong form the foundation of UC Kindies, which offers well-rounded education for today’s pre-schoolers.</p>
                        <p>&nbsp;</p>
                        <h4>Message from the Founder’s Desk</h4>
                        <p>“Every parent desires their child to obtain the best of every aspect, such as education, life skills, morality, etc. After 20 years of involving in mental development worldwide, UC International Corporation has come up with a concept kindergarten ‘UC Kindies’.</p>
                        <p>Childhood is a journey, not a race. By maintaining our core values in accordance with our concept cloud and philosophy, we promise to deliver our motto of “Develop with Love & Laughter” to the children and the community. I look forward to see what the future holds for UC Kindies- the ideal kindergarten.”</p>
                        <p>-Prof.Dr. Dino Wong,<br> President and Founder</p>
                        <p>&nbsp;</p>
                        <h4>Brand Belief</h4>
                        <p>We believe childhood is a journey, not a race. Hence we help children develop with love and laughter.</p>
                        <p>&nbsp;</p>
                        <h4>Our Core Philosophy</h4>
                        <p>The UC Kindies learning ecosystem is shaped by four robust signature programmes developed over years of intensive research.</p>
                        <p>These include: International Culture Programme, UC Mental Development Programme, Whole Language Teaching Programme, and Training & Services Programme.</p>
                        <!--<div class="row g-4 align-items-center">-->
                        <!--    <div class="col-sm-6">-->
                        <!--        <a class="btn btn-primary rounded-pill py-3 px-5" href="">Read More</a>-->
                        <!--    </div>-->
                            <!--<div class="col-sm-6">-->
                            <!--    <div class="d-flex align-items-center">-->
                            <!--        <img class="rounded-circle flex-shrink-0" src="{{asset('assets/img/user.jpg')}}" alt="" style="width: 45px; height: 45px;">-->
                            <!--        <div class="ms-3">-->
                            <!--            <h6 class="text-primary mb-1">Jhon Doe</h6>-->
                            <!--            <small>CEO & Founder</small>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                        <!--</div>-->
                    </div>
                    <div class="col-lg-6 about-img wow fadeInUp" data-wow-delay="0.5s">
                        <div class="row">
                            <div class="col-12 text-center ">
                                <img class="img-fluid img-01 w-75 rounded-circle bg-light p-3" src="{{asset('assets/img/about-11.jpg')}}" alt="">
                            </div>
                            <div class="col-6 text-start " style="margin-top: -150px;">
                                <img class="img-fluid img-02 w-100 rounded-circle bg-light p-3 " src="{{asset('assets/img/about-10.jpg')}}" alt="">
                            </div>
                            <div class="col-6 text-end " style="margin-top: -150px;">
                                <img class="img-fluid img-03 w-100 rounded-circle bg-light p-3" src="{{asset('assets/img/about-4.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div><br>
            
<div class="row  d-flex align-items-center justify-content-center">
<div class="accordion col-10" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        International Culture Programme
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <p>We encourage kids to connect with other young learners beyond boundaries through fun games and exciting activities.</p>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        UC Mental Development Programme
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
          <p>A strong foundation in math and science will help unlock doors of opportunity in your kid’s professional life in later years.</p>
          <p><strong>Science Lab</strong><br>Kids are encouraged to conduct experiments safely, enabling them to understand the principle behind different physical phenomena. Explorative science experiments using everyday domestic materials help   demystify many complex things in an interesting way.
           </p>
        <p><strong>Math Lab</strong><br> ‘Play While You Learn; Learn While You Play’ is the secret sauce that transforms kids into Little Maths Experts, where kids gain hands-on benefit by operating learning materials.
           </p>
      
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Whole Language Teaching Programme
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <p>The idea is to learn language basics through interactivity and creativity. By integrating writing, speaking, reading, and listening tasks, we teach students to read and write naturally with a focus on real communication.</p>  
        <p><strong>Language Corner</strong><br>
Using an Interactive and Photographic Memory approach, we teach kids the nitty-gritty of language based on the 3R Method (Read, Recite, Recall), where they also learn the significance of phonetics.
</p>
 </div>
    </div>
  </div>
    <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Training & Services Programme
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <p>UC Kindies has an extensive amount of training available, as we strive to develop with love and laughter, not just with children, but with our teachers, principals, and parents as well.</p>
      </div>
    </div>
  </div>
</div>
</div>            
</div>
        <!-- About End -->
        
        
        <p id="our_team"></p>
        <br>
        
        <!-- Team Start -->
        <div class="container py-5" id="team">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Our Team</h1>
                    <!--<p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit-->
                    <!--    eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>-->
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item position-relative">
                            <img class="img-fluid rounded-circle w-75" src="{{asset('assets/img/director01.png')}}" alt="">
                            <div class="team-text director-1">
                                <h3 id="director1" data-bs-toggle="modal" data-bs-target="#exampleModal" role="button">Sanjay Bhoir</h3>
                                <p>Director</p>
                                <!--<div class="d-flex align-items-center">-->
                                <!--    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>-->
                                <!--    <a class="btn btn-square btn-primary  mx-1" href=""><i class="fab fa-twitter"></i></a>-->
                                <!--    <a class="btn btn-square btn-primary  mx-1" href=""><i class="fab fa-instagram"></i></a>-->
                                <!--</div>-->
                            </div>
                        </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLabel">Sanjay Bhoir</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Mr Sanjay Bhoir is a proud alumnus of the coveted J. J. School of Art, Mumbai. Gifted with exemplary creative skills, he carved out a successful career in the field of advertising, design, and commercial printing, where he has worked for more than 25 years. He has conducted several art workshops, which have garnered excellent response.</p>  
                                    <p>Inspired by a philanthropic cause, Sanjay Bhoir has also been active in the social sector and holds office as a Trustee for a charitable institute. Sharing an equal passion for the academic arena, he is working dedicatedly to turn UC Kindies into the most sought-after Pre-School in town.</p>
                                  </div>
                                </div>
                              </div>
                            </div>                        
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item position-relative">
                            <img class="img-fluid rounded-circle w-75" src="{{asset('assets/img/director02.png')}}" alt="">
                            <div class="team-text director-2">
                                <h3 id="director2" data-bs-toggle="modal" data-bs-target="#exampleModal1" role="button">C.D. Mishra</h3>
                                <p>Director</p>
                                <!--<div class="d-flex align-items-center">-->
                                <!--    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>-->
                                <!--    <a class="btn btn-square btn-primary  mx-1" href=""><i class="fab fa-twitter"></i></a>-->
                                <!--    <a class="btn btn-square btn-primary  mx-1" href=""><i class="fab fa-instagram"></i></a>-->
                                <!--</div>-->
                            </div>
                        </div>
                            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLabel">C.D. Mishra</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Mr C. D. Mishra is a Management expert who provides strategic direction to the organization. He leverages his superior management experience to strengthen the work culture at the institute.</p>  
                                    <p>C.D. Mishra, who is backed by more than 25 years’ experience, is a revered figure in the academic field. At UC Kindies, he has put in place many innovative workplace practices that have resulted in earning the greater trust and confidence of parents.</p>
                                  </div>
                                </div>
                              </div>
                            </div>                        
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="team-item position-relative">
                            <img class="img-fluid rounded-circle w-75" src="{{asset('assets/img/director03.png')}}" alt="">
                            <div class="team-text director-3">
                                <h3 id="director3" data-bs-toggle="modal" data-bs-target="#exampleModal2" role="button">Bhanu Rajput</h3>
                                <p>Director</p>
                                <!--<div class="d-flex align-items-center">-->
                                <!--    <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>-->
                                <!--    <a class="btn btn-square btn-primary  mx-1" href=""><i class="fab fa-twitter"></i></a>-->
                                <!--    <a class="btn btn-square btn-primary  mx-1" href=""><i class="fab fa-instagram"></i></a>-->
                                <!--</div>-->
                            </div>
                        </div>
                            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLabel">Bhanu Rajput</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Mr Bhanu Rajput brings to the table an assortment of academic and leadership skills. He is an accredited Master Trainer, backed by insightful and rich teaching experience.</p>
                                    <p>Bhanu Rajput is a quality conscious individual, who focuses on ensuring high standards in education delivery. His inspired thoughts have been instrumental in promoting a culture of excellence at UC Kindies.</p>
                                  </div>
                                </div>
                              </div>
                            </div>                        
                    </div>
                <!--<div class="mt-4 text-center">-->
                <!--    <a class="bg-primary text-white rounded-pill py-2 px-3" href="about">Know More-->
                <!--     <i class="fa fa-arrow-right" aria-hidden="true"></i>-->
                <!--     </a>-->
                <!--     </div>                    -->
                </div>
            </div>
        </div>
        <!-- Team End --> 

<!-- Modal -->


@stop