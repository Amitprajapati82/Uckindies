@extends('admin/layout')
@section('content')

<style>
  .badge-notification {
            position: absolute;
            top: -10px;
            right: -10px;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 5px 10px;
        }
        .notification-icon {
            position: relative;
        }
</style>
<div class="main-panel">
			<div class="content">

  <!--success / error-->
  @if(Session::get('success'))
        <?php $message = Session::get('success') ?>
        <?php echo '<script>swal.fire({text:"'. $message .'",icon:"success",timer:3000,showConfirmButton:false});</script>' ?>
    @endif
    
      @if(Session::get('error'))
        <?php $message = Session::get('error') ?>
        <?php echo '<script>swal.fire({text:"'. $message .'",icon:"error",timer:3000,showConfirmButton:false});</script>' ?>
    @endif
        
    @if (Session::has('State'))
    
        <div class="page-inner">
              <div class="row">
                <div class="col-md-12">
                  <div class="card mb-0">
                    <div class="card-header py-2 mt-4">
                        <div class="d-flex align-items-center">
                            <!-- <div class="row"> -->
                              <div class="col-sm-4">
                                  <div class="card">
                                      <div class="card-body position-relative">
                                        <span class="notification-icon float-right">
                                        <i class="fas fa-bell fa-2x"></i><span class="badge badge-notification">3</span>
                                        </span>
                                          <h1>Notification</h1>
                                          <p class="card-text text-warning">New Update</p>
                                          <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                          <!-- Notification Icon -->
                                      </div>
                                  </div>
                              </div>

                              <div class="col-sm-4">
                                  <div class="card">
                                      <div class="card-body position-relative">
                                        <span class="notification-icon float-right">
                                            <i class="fas fa-bell fa-2x"></i>
                                            
                                        </span>
                                          <h1>States</h1>
                                          <h3><a href="">{{$State}}</a></h3>
                                          <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                          <!-- Notification Icon -->
                                      </div>
                                  </div>
                              </div>

                              <div class="col-sm-4">
                                  <div class="card">
                                      <div class="card-body position-relative">
                                        <span class="notification-icon float-right">
                                            <i class="fas fa-bell fa-2x"></i>
                                        </span>
                                          <h1>Units</h1>
                                          <h3><a href="">{{$Units}}</a></h3>
                                          <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                          <!-- Notification Icon -->
                                      </div>
                                  </div>
                              </div>

                                   
                    </div>
                  </div>
                </div>
              <!-- </div> -->
            </div>
        </div>	
    @endif
    </div>
</div>

@stop
