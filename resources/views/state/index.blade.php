@extends('admin/layout')
@section('content')

@if(Session::get('success'))
      <?php $message = Session::get('success') ?>
      <?php echo '<script>swal.fire({text:"'. $message .'",icon:"success",timer:3000,showConfirmButton:false});</script>' ?>
  @endif
  
    @if(Session::get('error'))
      <?php $message = Session::get('error') ?>
      <?php echo '<script>swal.fire({text:"'. $message .'",icon:"error",timer:3000,showConfirmButton:false});</script>' ?>
  @endif

  
  <!--Main Area-->
  <div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div>
        <h4 class="page-title" style="text-align:center">Welcome</h4>
      </div>
      <div class="page-category">State</div>
    </div>
  </div>

</div>
  <!--Main Area End-->

@stop
