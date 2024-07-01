@extends('layout')
@section('content')

@if(Session::has('Developer') || Session::has('Admin') )
    @php
        $url = asset('admin/dashboard');
        header('Location:'.$url);
        exit;
    @endphp

@endif

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
             <form action="{{asset('submit_login')}}" method="post">
                        
                 @csrf
                 <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-control" name="selectRole" id="selectRole" required>
                        <option value="">---Select Role---</option>
                        @foreach($admin as $value)
                        <option value="{{ json_encode(['id' => $value->ID, 'name' => $value->name]) }}">{{ $value->name }}</option>

                        @endforeach
                    </select>
                </div>
                <div class="mb-3" id="stateDiv" style="display: none;">
                        <label for="state" class="form-label">State</label>
                        <select class="form-control" name="selectState" id="selectState">
                            <option value="">---Select State---</option>
                            @foreach ($State as $statevalue )
                                <option value="{{$statevalue->ID}}">{{$statevalue->state_name}}</option>
                            @endforeach
                            <!-- <option value="state1">State 1</option>
                            <option value="state2">State 2</option> -->
                        </select>
                    </div>
                    <div class="mb-3" id="branchDiv" style="display: none;">
                        <label for="branch" class="form-label">Branch</label>
                        <select class="form-control" name="selectBranch" id="selectBranch">
                            <option value="">---Select Branch---</option>
                            <!-- <option value="uc_thane">UC Thane</option> -->
                        </select>
                    </div>
                 <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email"  placeholder="Enter Email " required>
                 </div>
                 <div class="mb-3">
                   <label for="password" class="form-label">Password</label>
                   <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                 </div>
                 <div class="mb-3 d-flex justify-content-end">
                    <span class="psw"> <a href="forgot_password">Forgot Password?</a></span>
                 </div>
                     <button type="submit" class="btn btn-primary rounded-pill">Submit</button>
             </form>
           </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    
    $(document).ready(function() {
            $('#selectRole').change(function() {
                var selectedValue = $(this).val();
                var role_data = JSON.parse(selectedValue)

                var roleId = role_data.id;
                var roleName = role_data.name;
                
                if (roleName == 'Admin') {
                    $('#stateDiv').hide();
                    $('#branchDiv').hide();
                }else if (roleName === 'State') {
                    $('#stateDiv').show();
                    $('#branchDiv').hide();
                } else if (roleName === 'Center') {
                    $('#stateDiv').show();
                    $('#branchDiv').show(); // Hide branchDiv initially

                    $('#selectState').change(function() {
                        var stateId = $(this).val();

                        if(stateId) {
                            $.ajax({
                                url: '/getBranche', // Adjust URL to your Laravel route for fetching branches
                                type: 'GET',
                                data: {
                                    id: stateId
                                },
                                dataType: 'json',
                                success: function(data) {
                                    $('#selectBranch').empty();
                                    $('#selectBranch').append('<option value="">---Select Branch---</option>');
                                    $.each(data, function(key, value) {
                                        console.log(key);
                                        $('#selectBranch').append('<option value="' + value.id + '">' + value.center + '</option>');
                                    });
                                    $('#branchDiv').show(); // Show branchDiv after loading branches
                                },
                                error: function(xhr, status, error) {
                                    console.error('Error fetching branches:', error);
                                }
                            });
                        } else {
                            $('#branchDiv').hide(); // Hide branchDiv if no state is selected
                            $('#selectBranch').empty();
                            $('#selectBranch').append('<option value="">---Select Branch---</option>');
                        }
                    });
                } else {
                    $('#stateDiv').hide(); // Hide both divs if neither 'State' nor 'Center' is selected
                    $('#branchDiv').hide();
                    $('#selectBranch').empty();
                    $('#selectBranch').append('<option value="">---Select Branch---</option>');
                }
            });
        });

            
   
</script>

@stop