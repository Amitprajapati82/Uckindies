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
  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="card-link">Card link</a>
      <a href="#" class="card-link">Another link</a>
    </div>
</div>
  <!--Main Area End-->

@stop
