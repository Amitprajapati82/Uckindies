@extends('admin/layout')
@section('content')

<style>
    
.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
    width:100px;
    height:100px;
}

.add-icon{
    color:#cccccc;
    font-size:55px;
}


.add-icon i{
    line-height: 80px;
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
            
				<div class="page-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="card mb-0">
                                <div class="card-header py-2">
                                    <div class="d-flex align-items-center">
                                        <ul class="breadcrumbs m-0 p-0 border-left-0">
                                            <li class="nav-home">
                                                <a href="{{asset('admin/dashboard')}}">
                                                    <i class="flaticon-home"></i>
                                                </a>
                                            </li>
                                            <li class="separator">
                                                <i class="flaticon-right-arrow"></i>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0);">Preview Content</a>
                                            </li>
                                            <li class="separator">
                                                <i class="flaticon-right-arrow"></i>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0);" id="test">Preview</a>
                                            </li>
                                        </ul>
                                        
                                
										<!-- <button class="btn btn-primary btn-round btn-sm ml-auto" data-toggle="modal" data-target="#add-about_us">
											<i class="fa fa-plus"></i>
										</button> -->
									</div>
								</div>
								
							</div>
                            
						</div>
                        <div class="container">
                            <div class="card">
                                <div class="card-body">
                                            <h1 class="text-center">Preview of {{$modelName}} Description</h1>
                                           
                                             
                                                    @if($modelName == 'About')
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col-md-8 offset-md-2">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h2 class="card-title text-center">About Details</h2>

                                                                                <div class="form-group">
                                                                                    <label>Title:</label>
                                                                                    <input type="text" class="form-control" value="{{ $data->title }}" readonly>
                                                                                </div>

                                                                                <div class="form-group mt-3">
                                                                                    <label>Image:</label><br>
                                                                                    <img src="{{ asset('storage/' . $data->image) }}" alt="About Image" class="img-fluid" >
                                                                                </div>

                                                                                <div class="form-group " >
                                                                                    <label for="description">Description:</label>
                                                                                    <textarea class="form-control" name="" id="" readonly>{{$data->description}}</textarea>
                                                                                </div>

                                                                                @if ($data->approval_status == 1)
                                                                                    <div class="card-footer mt-3 d-flex justify-content-center" style="display: none !important;">
                                                                                        <button type="button" class="btn btn-primary m-1 approveBtn" data-id="{{ $data->approval_id }}">Approve</button>
                                                                                        <button type="button" class="btn btn-danger m-1 rejectBtn" data-id="{{ $data->approval_id }}">Reject</button>
                                                                                    </div>
                                                                                @else
                                                                                <div class="card-footer mt-3 d-flex justify-content-center">
                                                                                    <button type="button" class="btn btn-primary m-1 approveBtn" data-id="{{ $data->approval_id }}">Approve</button>
                                                                                    <button type="button" class="btn btn-danger m-1 rejectBtn" data-id="{{ $data->approval_id }}">Reject</button>
                                                                                </div>
                                                                                @endif

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                    @elseif($modelName == 'Gallery')
                                                        
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-md-8 offset-md-2">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h4 class="text-center mt-3">Image</h4>
                                                                            <div class="ImagePreview mt-3 d-flex justify-content-center">
                                                                                @if($data->image_path)
                                                                                    <img src="{{ asset('storage/' . $data->image_path) }}" alt="Gallery Image" class="img-fluid" style="max-width: 50%; height: 40%;">
                                                                                @endif
                                                                            </div>

                                                                            <h4 class="text-center mt-3">Video</h4>
                                                                            <div class="VideoPreview mt-2 d-flex justify-content-center">
                                                                                @if($data->video_path)
                                                                                    <video controls class="w-100" style="max-width: 50%; height: 40%;">
                                                                                        <source src="{{ asset('storage/' . $data->video_path) }}" type="video/mp4">
                                                                                        Your browser does not support the video tag.
                                                                                    </video>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        @if ($data->approval_status == 1)
                                                                                    <div class="card-footer mt-3 d-flex justify-content-center" style="display: none !important;">
                                                                                        <button type="button" class="btn btn-primary m-1 approveBtn" data-id="{{ $data->approval_id }}">Approve</button>
                                                                                        <button type="button" class="btn btn-danger m-1 rejectBtn" data-id="{{ $data->approval_id }}">Reject</button>
                                                                                    </div>
                                                                                @else
                                                                                <div class="card-footer mt-3 d-flex justify-content-center">
                                                                                    <button type="button" class="btn btn-primary m-1 approveBtn" data-id="{{ $data->approval_id }}">Approve</button>
                                                                                    <button type="button" class="btn btn-danger m-1 rejectBtn" data-id="{{ $data->approval_id }}">Reject</button>
                                                                                </div>
                                                                            @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    @elseif($modelName == 'OurTeam')
                                                    <div class="container mt-5">
                                                        <div class="row">
                                                            <div class="col-md-8 offset-md-2">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h2 class="card-title text-center">Our Team Details</h2>

                                                                        <!-- <div class="form-group">
                                                                            <label>Title:</label>
                                                                            <input type="text" class="form-control" value="{{ $data->title }}" readonly>
                                                                        </div> -->

                                                                        <div class="form-group mt-3">
                                                                            <label>Image:</label><br>
                                                                            <img src="{{ asset('storage/' . $data->image_path) }}" alt="About Image" class="img-fluid">
                                                                        </div>

                                                                        <div class="form-group mt-3">
                                                                            <label for="description">Description:</label>
                                                                            <textarea class="form-control" readonly>{{ $data->description }}</textarea>
                                                                        </div>

                                                                        @if ($data->approval_status == 1)
                                                                                    <div class="card-footer mt-3 d-flex justify-content-center" style="display: none !important;">
                                                                                        <button type="button" class="btn btn-primary m-1 approveBtn" data-id="{{ $data->approval_id }}">Approve</button>
                                                                                        <button type="button" class="btn btn-danger m-1 rejectBtn" data-id="{{ $data->approval_id }}">Reject</button>
                                                                                    </div>
                                                                                @else
                                                                                <div class="card-footer mt-3 d-flex justify-content-center">
                                                                                    <button type="button" class="btn btn-primary m-1 approveBtn" data-id="{{ $data->approval_id }}">Approve</button>
                                                                                    <button type="button" class="btn btn-danger m-1 rejectBtn" data-id="{{ $data->approval_id }}">Reject</button>
                                                                                </div>
                                                                                @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @elseif($modelName == 'Testimonial')
                                                    <div class="container mt-5">
                                                            <div class="row">
                                                                <div class="col-md-8 offset-md-2">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h2 class="card-title text-center">Testimonial Details</h2>

                                                                            <div class="form-group">
                                                                                <label>Name:</label>
                                                                                <input type="text" class="form-control" value="{{ $data->name }}" readonly>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label>Email:</label>
                                                                                <input type="text" class="form-control" value="{{ $data->email }}" readonly>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label>Message:</label>
                                                                                <textarea class="form-control" readonly>{{ $data->message }}</textarea>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label>Ratings:</label>
                                                                                <input type="text" class="form-control" value="{{ $data->ratings }}" readonly>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label>Published:</label>
                                                                                <input type="text" class="form-control" value="{{ $data->published ? 'Yes' : 'No' }}" readonly>
                                                                            </div>

                                                                            <div class="form-group mt-3">
                                                                                <label>Image:</label><br>
                                                                                <img src="{{ asset('storage/images/' .$data->image_path) }}" alt="Testimonial Image" class="img-fluid">
                                                                            </div>

                                                                            @if ($data->approval_status == 1)
                                                                                    <div class="card-footer mt-3 d-flex justify-content-center" style="display: none !important;">
                                                                                        <button type="button" class="btn btn-primary m-1 approveBtn" data-id="{{ $data->approval_id }}">Approve</button>
                                                                                        <button type="button" class="btn btn-danger m-1 rejectBtn" data-id="{{ $data->approval_id }}">Reject</button>
                                                                                    </div>
                                                                                @else
                                                                                <div class="card-footer mt-3 d-flex justify-content-center">
                                                                                    <button type="button" class="btn btn-primary m-1 approveBtn" data-id="{{ $data->approval_id }}">Approve</button>
                                                                                    <button type="button" class="btn btn-danger m-1 rejectBtn" data-id="{{ $data->approval_id }}">Reject</button>
                                                                                </div>
                                                                                @endif

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    @elseif($modelName == 'Event')
                                                    <div class="container mt-5">
                                                            <div class="row">
                                                                <div class="col-md-8 offset-md-2">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h2 class="card-title text-center">Events Details</h2>

                                                                            <div class="form-group">
                                                                                <label>Title:</label>
                                                                                <input type="text" class="form-control" value="{{ $data->title }}" readonly>
                                                                            </div>

                                                                            

                                                                            <div class="form-group">
                                                                                <label>Description:</label>
                                                                                <textarea class="form-control" readonly>{{ $data->description }}</textarea>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label>Location:</label>
                                                                                <input type="text" class="form-control" value="{{ $data->location }}" readonly>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label>Start Time:</label>
                                                                                <input type="datetime-local" class="form-control" value="{{ $data->start_time }}" readonly>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>End Time:</label>
                                                                                <input type="datetime-local" class="form-control" value="{{ $data->end_time }}" readonly>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label>Organizer:</label>
                                                                                <input type="text" class="form-control" value="{{ $data->organizer }}" readonly>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label>Published:</label>
                                                                                <input type="text" class="form-control" value="{{ $data->is_published ? 'Yes' : 'No' }}" readonly>
                                                                            </div>

                                                                            <div class="form-group mt-3">
                                                                                <label>Image:</label><br>
                                                                                <img src="{{ asset('storage/' .$data->image_path) }}" alt="Testimonial Image" class="img-fluid">
                                                                            </div>

                                                                            @if ($data->approval_status == 1)
                                                                                    <div class="card-footer mt-3 d-flex justify-content-center" style="display: none !important;">
                                                                                        <button type="button" class="btn btn-primary m-1 approveBtn" data-id="{{ $data->approval_id }}">Approve</button>
                                                                                        <button type="button" class="btn btn-danger m-1 rejectBtn" data-id="{{ $data->approval_id }}">Reject</button>
                                                                                        </div>
                                                                                @else
                                                                                <div class="card-footer mt-3 d-flex justify-content-center">
                                                                                    <button type="button" class="btn btn-primary m-1 approveBtn" data-id="{{ $data->approval_id }}">Approve</button>
                                                                                    <button type="button" class="btn btn-danger m-1 rejectBtn" data-id="{{ $data->approval_id }}">Reject</button>
                                                                                    </div>
                                                                                @endif

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    @elseif($modelName == 'Address')
                                                    <div class="container mt-5">
                                                            <div class="row">
                                                                <div class="col-md-8 offset-md-2">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h2 class="card-title text-center">Units Details</h2>

                                                                            <div class="form-group">
                                                                                <label>Unit:</label>
                                                                                <input type="text" class="form-control" value="{{ $data->center }}" readonly>
                                                                            </div>

                                                                            

                                                                            <div class="form-group">
                                                                                <label>Description:</label>
                                                                                <textarea class="form-control" readonly>{{ $data->address }}</textarea>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label>Conatct:</label>
                                                                                <input type="number" class="form-control" value="{{ $data->contact }}" readonly>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label>Email:</label>
                                                                                <input type="text" class="form-control" value="{{ $data->email }}" readonly>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Facebook:</label>
                                                                                <input type="text" class="form-control" value="{{ $data->facebook }}" readonly>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label>Instagram:</label>
                                                                                <input type="text" class="form-control" value="{{ $data->insta }}" readonly>
                                                                            </div>

                                                                            
                                                                            @if ($data->approval_status == 1)
                                                                                    <div class="card-footer mt-3 d-flex justify-content-center" style="display: none !important;">
                                                                                        <button type="button" class="btn btn-primary m-1 approveBtn" data-id="{{ $data->approval_id }}">Approve</button>
                                                                                        <button type="button" class="btn btn-danger m-1 rejectBtn" data-id="{{ $data->approval_id }}">Reject</button>
                                                                                        </div>
                                                                                @else
                                                                                <div class="card-footer mt-3 d-flex justify-content-center">
                                                                                    <button type="button" class="btn btn-primary m-1 approveBtn" data-id="{{ $data->approval_id }}">Approve</button>
                                                                                    <button type="button" class="btn btn-danger m-1 rejectBtn" data-id="{{ $data->approval_id }}">Reject</button>
                                                                                    </div>
                                                                                @endif

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    @elseif($modelName == 'Banner')
                                                    <div class="container mt-5">
                                                        <div class="row">
                                                            <div class="col-md-8 offset-md-2">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <h2 class="card-title text-center">Banner Details</h2>

                                                                        <div class="form-group">
                                                                            <label>Banner Name:</label>
                                                                            <input type="text" class="form-control" value="{{ $data->banner_name }}" readonly>
                                                                        </div>

                                                                        

                                                                        <div class="form-group">
                                                                            <label>Banner Postion:</label>
                                                                            <input type="number" class="form-control" value="{{ $data->banner_position }}" readonly>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Description:</label>
                                                                            <input type="text" class="form-control" value="{{ $data->description }}" readonly>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>Banner Image:</label>
                                                                            <img src="{{ asset('storage/' .$data->banner_image) }}" alt="Banner Image" class="img-fluid">
                                                                        </div>

                                                                        
                                                                        @if ($data->approval_status == 1)
                                                                                <div class="card-footer mt-3 d-flex justify-content-center" style="display: none !important;">
                                                                                    <button type="button" class="btn btn-primary m-1 approveBtn" data-id="{{ $data->approval_id }}">Approve</button>
                                                                                    <button type="button" class="btn btn-danger m-1 rejectBtn" data-id="{{ $data->approval_id }}">Reject</button>
                                                                                    </div>
                                                                            @else
                                                                            <div class="card-footer mt-3 d-flex justify-content-center">
                                                                                <button type="button" class="btn btn-primary m-1 approveBtn" data-id="{{ $data->approval_id }}">Approve</button>
                                                                                <button type="button" class="btn btn-danger m-1 rejectBtn" data-id="{{ $data->approval_id }}">Reject</button>
                                                                                </div>
                                                                            @endif

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                    @endif
                                          
                                        
                                         
                                        </div>
                                        <!-- <div class="card-footer d-flex justify-content-center">
                                            <form action="" method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-primary m-1">Approve</button>
                                            </form>

                                            <form action="" method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-danger m-1">Reject</button>
                                            </form>
                                        </div> -->
                                    </div>
                                </div>
					</div>
				</div>
			</div>

</div>

  <!-- Modal -->
   <!-- Modal -->
<div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rejectModalLabel">Reject Approval</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="rejectForm">
          <div class="mb-3">
            <label for="rejectReason" class="form-label">Reason for Rejection</label>
            <textarea class="form-control" id="rejectReason" rows="3" required></textarea>
          </div>
          <input type="hidden" id="approvalId" name="approval_id">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" data-id="{{$data->approval_id}}" id="submitReject">Reject</button>
      </div>
    </div>
  </div>
</div>

  

<!--edit-->





						
                
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- <script src="{{ asset('assets/js/jquery.min.js') }}"></script> -->
 <script>
    $(document).ready(function () {

        $('.approveBtn').click(function() {
            var approval_id = $(this).data('id');
            console.log(approval_id);
            submitApprovalOrRejection(approval_id, 'approve');
        });

        $('.rejectBtn').click(function() {
            var approval_id = $(this).data('id');
            $('#approvalId').val(approval_id);
            $('#rejectModal').modal('show');
            // submitApprovalOrRejection(approval_id, 'reject');
            $('#submitReject').click(function() {
                var approval_id = $(this).data('id');
                var reason = $('#rejectReason').val();
                // console.log(approval_id);

                // Call a function to submit approval rejection
                submitApprovalOrRejection(approval_id, 'reject', reason);
            });
        });

        

        function submitApprovalOrRejection(approval_id, action ,reason = null,) {
            $.ajax({
                url: '/admin/approval_or_reject',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    approval_id: approval_id,
                    reason:reason,
                    action: action
                },
                success: function(response) {
                    // Handle success response
                    console.log(response);
                    console.log('Approval/rejection successful');
                    window.location.href = '/admin/request';
                    // Example: Show success message or update UI
                },
                error: function(xhr) {
                    // Handle error response
                    console.error('Error:', xhr.responseText);
                    // Example: Show error message or alert
                }
            });
        }

        
    });
   </script>


@stop
