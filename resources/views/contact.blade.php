@extends('layout')
@section('content')


         <!--success / error-->
        @if(Session::get('success'))
            <?php $message = Session::get('success') ?>
            <?php echo '<script>swal.fire({text:"'. $message .'",icon:"success",timer:3000,showConfirmButton:false});</script>' ?>
        @endif
        
        @if(Session::get('error'))
            <?php $message = Session::get('error') ?>
            <?php echo '<script>swal.fire({text:"'. $message .'",icon:"error",timer:3000,showConfirmButton:false});</script>' ?>
        @endif
        
        
        <!-- Page Header End -->
        <div class="container py-5 page-header position-relative mb-5">
            <div class="container py-5">
                <h1 class="display-2 text-white animated slideInDown mb-4">Contact Us</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home.index')}}">Home</a></li>
                        <!--li class="breadcrumb-item"><a href="#">Pages</a></li-->
                        <li class="breadcrumb-item text-white active" aria-current="page">Contact Us</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- Contact Start -->
        <div class="container py-5">
            <div class="container">
                 <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
                    <h1 class="mb-4">CONTACT US/ENROLLMENT/COLLABORATION</h1> 
                </div>
                
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Get In Touch</h1>
                    <p>Have any queries? Need some clarification? Reach out to us; We would be happy to help! </p>
                </div>
                <div class="row g-4 mb-5">
                    <div class="col-md-6 col-lg-4 text-center wow fadeInUp" data-wow-delay="0.1s">
                        <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 75px; height: 75px;">
                            <i class="fa fa-map-marker-alt fa-2x text-primary"></i>
                        </div>
                        <h6>Bungalow No.8, Dev Darshan CHS, Ghodbunder Rd, Near KMC Nursing Home, Behind Hotel Gravity, Dongripada, Thane West, Thane, Maharashtra 400607.</h6>
                    </div>
                    <div class="col-md-6 col-lg-4 text-center wow fadeInUp" data-wow-delay="0.3s">
                        <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 75px; height: 75px;">
                            <i class="fa fa-envelope-open fa-2x text-primary"></i>
                        </div>
                        <h6>admin.india@uckindies.com</h6>
                    </div>
                    <div class="col-md-6 col-lg-4 text-center wow fadeInUp" data-wow-delay="0.5s">
                        <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 75px; height: 75px;">
                            <i class="fa fa-phone-alt fa-2x text-primary"></i>
                        </div>
                        <h6>+91 99305 56597</h6>
                    </div>
                </div>
                <div class="bg-light rounded">
                    <div class="row g-0">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                            <div class="h-100 d-flex flex-column justify-content-center p-5">
                                <!--p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p-->
                                <form action="{{ route('home.contactform_submit') }}" method = "post" >
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control border-0" id="name" name="name" placeholder="Your Name" required>
                                                <label for="name">Your Name</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="email" class="form-control border-0" id="email" name="email" placeholder="Your Email" required>
                                                <label for="email">Your Email</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control border-0" id="subject" name="subject" placeholder="Subject" required>
                                                <label for="subject">Subject</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <textarea class="form-control border-0" placeholder="Leave a message here" id="message" name="message" style="height: 100px" required></textarea>
                                                <label for="message">Message</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                            <div class="position-relative h-100">
                                <!--iframe class="position-relative rounded w-100 h-100"
                                src="<iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d60281.31756233555!2d72.93525892731446!3d19.213435874239902!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d19.1881509!2d72.9637468!4m5!1s0x3be7bbea3676e0d7%3A0x9a1ed3ce8b478f06!2sUC%20KINDIES%20INTERNATIONAL%20KINDERGARTEN%2C%20Bungalow%20no.%208%2CDev%20Darshan%20CHS%2C%20Ghodbunder%20Rd%2C%20near%20KMC%20Nursing%20Home%2C%20behind%20Hotel%20Gravity%2C%20Dongripada%2C%20Thane%20West%2C%20Thane%2C%20Maharashtra%20400607!3m2!1d19.250360399999998!2d72.9715828!5e0!3m2!1sen!2sin!4v1663321832072!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                                frameborder="0" style="min-height: 400px; border:0;" allowfullscreen="" aria-hidden="false"
                                tabindex="0"></iframe-->
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3766.735395700651!2d72.9693941147166!3d19.250360386988124!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7bbea3676e0d7%3A0x9a1ed3ce8b478f06!2sUC%20KINDIES%20INTERNATIONAL%20KINDERGARTEN!5e0!3m2!1sen!2sin!4v1663322165526!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->



@stop