@extends('admin/layout')
@section('content')

  <style>
  .disableButton
  {
    pointer-events: none; opacity: 0.5;    
      
  }
  .textNotVisible
  {
      display:none;
  }
  </style>
  
  <!--success / error-->
    @if(Session::get('success'))
        <?php $message = Session::get('success') ?>
        <?php echo '<script>swal.fire({text:"'. $message .'",icon:"success",timer:3000,showConfirmButton:false});</script>' ?>
    @endif
    
    @if(Session::get('error'))
        <?php $message = Session::get('error') ?>
        <?php echo '<script>swal.fire({text:"'. $message .'",icon:"error",timer:3000,showConfirmButton:false});</script>' ?>
    @endif

<div class="main-panel">
			<div class="content">

   <div class="container-login">
    <div class="row justify-content-center mx-0">
      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row d-flex justify-content-center">
              <div class="col-xs-12 col-md-8 col-lg-8 col-xl-8">
                <div class="login-form p-3">
                  <div class="text-center">
                    <h1 class="text-gray-900 mb-4">Change Password</h1>
                  </div>
                  <form action="{{asset('admin/adminUpdatePass')}}" method="POST" class="user">
                      @csrf
                      <div class="form-group">
                      <input type="password" name="changeOldPassword" class="form-control" id="changeOldPassword" placeholder="Old Password" minlength="6" maxlength="15" required />
                    </div>
                    <div class="form-group">
                      <input type="password" name="changeNewPassword" class="form-control" id="changeNewPassword" placeholder="New Password"  minlength="6" maxlength="15" required />
                    </div>
                    <div class="form-group">
                        <input type="password" name="changeConfirmPassword" class="form-control" id="changeConfirmPassword" placeholder="Confirm Password"  minlength="6" maxlength="15" required />
                        <span class="text-danger textNotVisible" id="confirmPassError">Password does not match!</span>
                        <span class="text-success textNotVisible" id="confirmPassSuccess">Password Match</span>
                    </div>
                    <!--<div class="form-group">-->
                    <!--  <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">-->
                    <!--    <input type="checkbox" class="custom-control-input" id="customCheck">-->
                    <!--    <label class="custom-control-label" for="customCheck">Remember-->
                    <!--      Me</label>-->
                    <!--  </div>-->
                    <!--</div>-->
                    <div class="form-group">
                      <button type="submit" id="updateBtn" class="btn btn-primary btn-block">Update</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>

<script src="{{ asset('assets/js/jquery.3.2.1.min.js') }}"></script>
 <script type="text/javascript">
 

          // Function to check Whether both passwords is same or not.
        //   function checkPassword(form) 
        //     { 
        //       changeConfirmPassword = form.changeConfirmPassword.value;
        //       changeNewPassword = form.changeNewPassword.value;
        //         // alert (CPassword);
        //       // If password not entered
        //       if (changeConfirmPassword != changeNewPassword) 
        //       {
        //           alert ("\nConfirm password does not match with password");
        //           return false;
        //       }             
        //     }
        
        $('#changeNewPassword').keyup(function() {
            var newPass = $(this).val();
            var confirmPass = $('#changeConfirmPassword').val();
            // console.log("confirmPass :",confirmPass);
            // console.log("newPass :",newPass);
            if(newPass.length > 0)
            {
                if(newPass!==confirmPass)
                {
                    console.log("password not equal");
                    $("#updateBtn").addClass("disableButton");
                    $("#confirmPassError").removeClass("textNotVisible");
                    $("#confirmPassSuccess").addClass("textNotVisible");
                }
                else
                {
                    console.log("password equal");
                    $("#updateBtn").removeClass("disableButton");
                    $("#confirmPassError").addClass("textNotVisible");
                    $("#confirmPassSuccess").removeClass("textNotVisible");
                }
            }
            else
            {
                console.log("length less");
                $("#confirmPassError").addClass("textNotVisible");
                $("#confirmPassSuccess").addClass("textNotVisible");
            }
        });
        
        $('#changeConfirmPassword').keyup(function() {
            var confirmPass = $(this).val();
            var newPass = $('#changeNewPassword').val();
            // console.log("confirmPass :",confirmPass);
            // console.log("newPass :",newPass);
            if(confirmPass.length > 0)
            {
                if(confirmPass!==newPass)
                {
                    $("#updateBtn").addClass("disableButton");
                    $("#confirmPassError").removeClass("textNotVisible");
                    $("#confirmPassSuccess").addClass("textNotVisible");
                }
                else
                {
                    $("#updateBtn").removeClass("disableButton");
                    $("#confirmPassError").addClass("textNotVisible");
                    $("#confirmPassSuccess").removeClass("textNotVisible");
                }
            }
            else
            {
                $("#confirmPassError").addClass("textNotVisible");
                $("#confirmPassSuccess").addClass("textNotVisible");
            }
        });
  
  </script>
  
  @stop
  <!-- Login Content -->
<!--  <script src="vendor/jquery/jquery.min.js"></script>-->
<!--  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>-->
<!--  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>-->
<!--  <script src="js/ruang-admin.min.js"></script>-->
<!--</body>-->

<!--</html>-->