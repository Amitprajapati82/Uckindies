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
                                                <a href="javascript:void(0);">Events Management</a>
                                            </li>
                                            <li class="separator">
                                                <i class="flaticon-right-arrow"></i>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0);" id="test">Events</a>
                                            </li>
                                        </ul>
                                        
										<button class="btn btn-primary btn-round btn-sm ml-auto" data-toggle="modal" data-target="#add-event">
											<i class="fa fa-plus"></i>
										</button>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="display border-top border-bottom table datatable table-striped table-hover table-sm">
											<thead class="thead-dark">
												<tr>
													<th>Sr. No.</th>
													<th>Title</th>
													<th>Description</th>
													<th>Location</th>
													<!-- <th>Message</th> -->
                                                    <th>Start Time</th>													
                                                    <th>End Time</th>													
                                                    <th>Organizer</th>													
                                                    <th>Image</th>													
                                                    <th>Published</th>
													<th>Status</th>
													<th>Action</th>
													
												</tr>
											</thead>
											<tbody>
											    
											    @foreach($data as $key=>$item)
												<tr id="item_{{$item->id}}">
													<td>{{ $key + 1 }}</td>
													<td>{{ $item->title}}</td>
													<td>{{  $item->description  }}</td>
													<td>{{  $item->location  }}</td>
													<td>{{  $item->start_time  }}</td>
													<td>{{  $item->end_time  }}</td>
													<td>{{  $item->organizer  }}</td>
													<!-- <td>{{  $item->image  }}</td> -->
													<td class="catname"><img src="{{ asset('storage/' . $item->image_path) }}" style="width: 90px; height: auto;" alt="Event Image" /></td>
                                                    <!-- <td class="profile-image">
                                                        <img src="{{ asset('storage/images/' . $item->image_path) }}" style="width: 80px; height: 80px; border-radius: 50%;" alt="Profile Image" />
                                                    </td> -->

													<td class="catname">{{ $item->is_published }}</td>
                                                    <!-- <td class="catname">{{ $item->description }}</td>
													<td class="catname">{{ $item->ratings }}</td> -->
													<?php
													    if($item->status == '0')
													    
													    {
													        $status = "Inactive";
													    }
													    else
													    {
													        $status = "Active";
													    }
													?>                                                   
													<!--<td class="catname">{{ $status }}</td>-->
													<td class="catname text-center">
    												    @if($item->status == '0')
    												        <a href="{{asset('admin/bannerstatus/'.$item->id)}}" class="redColor" data-toggle="tooltip" title="Inactive">
    												            <i class="fas fa-check-circle fa-2x " aria-hidden="true"></i>
    												        </a>
    												    @else
    												        <a href="{{asset('admin/bannerstatus/'.$item->id)}}" class="greenColor" data-toggle="tooltip" title="Active">
    												            <i class="fas fa-check-circle fa-2x" aria-hidden="true"></i>
    												        </a>
    												    @endif
													</td>
													
													
													<td>
                                                        <a href="" data-toggle="modal" class="text-warning mr-2 editModal" id="About_Us" data-target="#update-event" data-id="{{$item->id}}"><i class="fas fa-edit"></i></a>
														<!-- <a id="editModal{{ $item->id }}"  class="text-warning mr-2 editModal" data-href="{{asset('admin/editBannerData')}}" data-id="{{$item->id}}" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>  -->
														<!--<a href="{{ asset('admin/bannerDelete/'.$item->ID) }}" class="text-danger" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>-->
													<a href="javascript:void(0);" class="text-danger DeleteLink" data-bandel="{{asset('admin/events/Delete/'.$item->id)}}" data-id="{{$item->id}}" data-toggle="tooltip" title="Delete"><i class="fas fa-trash" ></i></a>
														
	                                                
                                                        
													</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

</div>

  <!-- Modal -->
  <div class="modal fade add-modal" id="add-event" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          Add Event
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ asset('admin/events/store') }}" enctype="multipart/form-data" id="addEventForm">
            @csrf

            <div class="row m-2">
            <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label class="form-label">Select Unit</label>
                        <select class="form-control input-pill" id="Unit_id" name="Unit_id">
                            <option value="">Select Unit</option>
                            @foreach($address as $askey=>$asitem)
                            
                            <option value="{{$asitem->ID}}">{{ $asitem->center }}</option>
                            @endforeach   
                        </select>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-12 mb-3">
                    <div class="form-group p-0 mt-3">
                        <label for="title">Title</label>
                        <span class="text-danger"> *</span>
                        <input type="text" class="form-control input-full input-pill" id="title" name="title">
                        @error('title')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-12 mb-3">
                    <div class="form-group p-0 mt-3">
                        <label for="description">Description</label>
                        <textarea class="form-control input-full input-pill" id="description" name="description" rows="5"></textarea>
                        @error('description')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-12 mb-3">
                    <div class="form-group p-0 mt-3">
                        <label for="location">Location</label>
                        <input type="text" class="form-control input-full input-pill" id="location" name="location">
                        @error('location')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-12 mb-3">
                    <div class="form-group p-0 mt-3">
                        <label for="start_time">Start Time</label>
                        <span class="text-danger"> *</span>
                        <input type="datetime-local" class="form-control input-full input-pill" id="start_time" name="start_time">
                        @error('start_time')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-12 mb-3">
                    <div class="form-group p-0 mt-3">
                        <label for="end_time">End Time</label>
                        <input type="datetime-local" class="form-control input-full input-pill" id="end_time" name="end_time">
                        @error('end_time')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-12 mb-3">
                    <div class="form-group p-0 mt-3">
                        <label for="organizer">Organizer</label>
                        <input type="text" class="form-control input-full input-pill" id="organizer" name="organizer">
                        @error('organizer')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="form-group p-0 mt-3">
                        <label for="image">Image</label>
                        <span class="text-danger"> *</span>
                        <input type="file" class="form-control input-full input-pill" id="image" name="image">
                        @error('image')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                        <div id="imagePreview" class="mt-2"></div>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="form-group p-0 mt-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="is_published" name="is_published" value="1">
                            <label class="custom-control-label" for="is_published">Published</label>
                        </div>
                        @error('is_published')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 mb-3">
                    <button id="addBtn" class="btn btn-secondary btn-sm float-right" type="submit">Submit</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!--edit-->
<div class="modal fade add-modal" id="update-event" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          Update Event
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ url('admin/events/update') }}" enctype="multipart/form-data" id="updateEventForm">
            @csrf
            @method('PUT') <!-- Add this for PUT request -->

            <!-- Hidden input for the event ID -->
            <input type="hidden" id="event_id"  name="event_id" value="">

            <div class="row m-2">

                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label class="form-label">Select Unit</label>
                        <select class="form-control input-pill" id="editUnit_id" name="editUnit_id">
                            
                        </select>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-12 mb-3">
                    <div class="form-group p-0 mt-3">
                        <label for="title">Title</label>
                        <span class="text-danger"> *</span>
                        <input type="text" class="form-control input-full input-pill" id="eventTitle" name="eventTitle" value="">
                        @error('eventTitle')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-12 mb-3">
                    <div class="form-group p-0 mt-3">
                        <label for="description">Description</label>
                        <textarea class="form-control input-full input-pill" id="eventDescription" name="eventDescription" rows="5"></textarea>
                        @error('eventDescription')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-12 mb-3">
                    <div class="form-group p-0 mt-3">
                        <label for="location">Location</label>
                        <input type="text" class="form-control input-full input-pill" id="eventLocation" name="eventLocation" value="">
                        @error('eventLocation')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-12 mb-3">
                    <div class="form-group p-0 mt-3">
                        <label for="start_time">Start Time</label>
                        <span class="text-danger"> *</span>
                        <input type="datetime-local" class="form-control input-full input-pill" id="eventStartTime" name="eventStartTime" value="">
                        @error('eventStartTime')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-12 mb-3">
                    <div class="form-group p-0 mt-3">
                        <label for="end_time">End Time</label>
                        <input type="datetime-local" class="form-control input-full input-pill" id="eventEndtime" name="eventEndtime" value="">
                        @error('eventEndtime')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-12 mb-3">
                    <div class="form-group p-0 mt-3">
                        <label for="organizer">Organizer</label>
                        <input type="text" class="form-control input-full input-pill" id="eventOrganizer" name="eventOrganizer" value="">
                        @error('eventOrganizer')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="form-group p-0 mt-3">
                        <label for="image">Image</label>
                        <span class="text-danger"> *</span>
                        <input type="file" class="form-control input-full input-pill" id="eventImage" name="eventImage">
                        @error('eventImage')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                        <div id="edit_imagePreview" class="mt-2"></div>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="form-group p-0 mt-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="eventPublished" name="eventPublished" value="1">
                            <label class="custom-control-label" for="eventPublished">Published</label>
                        </div>
                        @error('is_published')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 mb-3">
                    <button id="updateBtn" class="btn btn-secondary btn-sm float-right" type="submit">update</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content py-2">
            <div class="modal-body">
                <p class="text-center mb-0">Are you sure you want to Delete?</p>
            </div>
            <div class="modal-footer mx-auto border-top-0">
                <button type="button" class="btn btn-outline-primary btn-danger" data-dismiss="modal">Cancel</button>
                <a href="" id="deleteLink"  class="btn btn-success">Confirm</a>
            </div>
        </div>
    </div>
</div>

						
                
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- <script src="{{ asset('assets/js/jquery.min.js') }}"></script> -->
 <script>
    $(document).ready(function () {
            
        $('.editModal').on('click', function (e) {

            e.preventDefault();

            var recordId = $(this).data('id');
            $('#event_id').val(recordId);
            // console.log(recordId);
            $.ajax({
                url: '/admin/eventEdit',
                type: 'GET',
                data:{
                    id:recordId
                },
                success: function (data) {

                    console.log(data);
                    $('#editUnit_id').append('<option value="' + data[0].address_id + '">' + data[0].center + '</option>');
                    $('#eventTitle').val(data[0].title);
                    $('#eventDescription').val(data[0].description) 
                    $('#eventLocation').val(data[0].location) 
                    $('#eventStartTime').val(data[0].start_time) 
                    $('#eventEndtime').val(data[0].end_time) 
                    $('#eventOrganizer').val(data[0].organizer) 
                    // $('#eventImage').val(data[0].imag) 

                    if (data[0].is_published) {
                        $('#eventPublished').prop('checked', true);
                    } else {
                        $('#eventPublished').prop('checked', false);
                    } 
                    // $('#editEmail').val(data[0].email) 

                    var imagePath = data[0].image_path ? '/storage/' + data[0].image_path.replace('public/', '') : null;
                    if (imagePath) {
                        $('#edit_imagePreview').html('<img src="' + imagePath + '" style="max-width: 150px; width: 100%; height: auto;">');                    } else {
                        $('#edit_imagePreview').empty();
                    }
                    
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
        
    });
    
    $('#image').on('change', function() {
        var imagePreview = $('#imagePreview');
        imagePreview.empty(); // Clear previous content
        var file = this.files[0];
        if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var img = $('<img />', {
            src: e.target.result,
            
            style: 'max-width: 150px; width: 100%; height: auto;'
            });
            imagePreview.append(img);
        };
        reader.readAsDataURL(file);
        }
    });

    $('#eventImage').on('change', function() {
        var imagePreview = $('#edit_imagePreview');
        imagePreview.empty(); // Clear previous content
        var file = this.files[0];
        if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var img = $('<img />', {
            src: e.target.result,
            style: 'max-width: 100%; height: auto;'
            });
            imagePreview.append(img);
        };
        reader.readAsDataURL(file);
        }
    });

     $( "#addForm" ).submit(function( e ) {
 
      // Stop form from submitting normally
        e.preventDefault();
        console.log("All Validation check");
        //alert("All Validation check");
        var href = "{{asset('admin/add_Banner')}}";
        var token = $("input[name='_token']").val();
        console.log("href : ",href);
        console.log("token : ",token);
        
        var file = $("#AddBannerImage");
        console.log("file : ",file);
        if ($('#file')[0].files.length === 0)
        {
            console.log("image file is available");
        }
        else
        {
            console.log("image file is not available");
        }
        
        $.ajax({
                 type: "POST",
                 url: href,
                 data: { _token : token, fname:fname, lname:lname, phoneno:phoneno, 
                 email:email, message:message, basic_price: basic_price, color_price:color_price,
                 shading_price:shading_price, total_price:total_price }
        }).done(function(data) {
              // console.log("data : ",data);
              swal.fire({text:"Thank you!! We wil contact you soon.",icon:"success",timer:3000,showConfirmButton:false});
              $("#searchForm")[0].reset();
              $("#submitContact").prop('disabled', true);
              $("#payment").removeClass("d-none").delay(60000).queue(function(){
                    $("#searchForm")[0].reset();
                    $(this).addClass("d-none");
                    $("#submitContact").prop('disabled', false);
              });
        });
        
    });
  
    
    
          

    // Validation START
    $("#BannerName").keyup(function() {
        var value = $(this).val();
        if(value.length > 0)
        {
            console.log("value : ",value);
           var href = "{{asset('admin/checkAddBannerName')}}"+'/'+value;
           console.log("href : ",href);
            $.ajax({
                type: "GET",
                url: href, 
                success: function(data) {
                console.log("reponse : ",data);
                    if(data == 'error')
                    {
                        $("#addBtn").addClass("disableButton");
                        $("#BannerNameAddError").removeClass("textNotVisible");
                    }
                    else 
                    {
                        $("#addBtn").removeClass("disableButton");
                        $("#BannerNameAddError").addClass("textNotVisible");
                    }
                }
            });
            
        }
        else
        {
            $("#addBtn").addClass("disableButton");
            $("#BannerNameAddError").addClass("textNotVisible");
        }
        
        
    });
    
    
    $("#EditBannerName").keyup(function() {
        var value = $(this).val();
        if(value.length > 0)
        {
            var id = $("#editbannerid").val();
            console.log("id : ",id);
           var href = "{{asset('admin/checkEditBannerName')}}"+'/'+id+'/'+value;
          console.log("href : ",href);
            $.ajax({
                type: "GET",
                url: href, 
                success: function(data) {
                console.log("reponse : ",data);
                if(data == 'error')
                {
                    $("#updateBtn").addClass("disableButton");
                    $("#BannerNameEditError").removeClass("textNotVisible");
                }
                else 
                {
                    $("#updateBtn").removeClass("disableButton");
                    $("#BannerNameEditError").addClass("textNotVisible");
                }
            }
            });
            
        }
        else
        {
            console.log("no data");
            $("#updateBtn").addClass("disableButton");
            $("#BannerNameEditError").addClass("textNotVisible");
        }
        
        
    });
    
    $("#BannerPosition").keyup(function() {
        var value = $(this).val();
        if(value.length > 0)
        {
            console.log("value : ",value);
            var href = "{{asset('admin/checkAddBannerPosition')}}"+'/'+value;
            console.log("href : ",href);
            $.ajax({
                type: "GET",
                url: href, 
                success: function(data) {
                console.log("reponse : ",data);
                    if(data == 'error')
                    {
                        $("#addBtn").addClass("disableButton");
                        $("#BannerPositionAddError").removeClass("textNotVisible");
                    }
                    else 
                    {
                        $("#addBtn").removeClass("disableButton");
                        $("#BannerPositionAddError").addClass("textNotVisible");
                    }
                }
            });
        }
        else
        {
            $("#addBtn").addClass("disableButton");
            $("#BannerPositionAddError").addClass("textNotVisible");
        }
        
        
    });
    
    
    $("#EditBannerPosition").keyup(function() {
        var value = $(this).val();
        if(value.length > 0)
        {
            var id = $("#editbannerid").val();
            console.log("id : ",id);
            var href = "{{asset('admin/checkEditBannerPosition')}}"+'/'+id+'/'+value;
            console.log("href : ",href);
            $.ajax({
                type: "GET",
                url: href, 
                success: function(data) {
                console.log("reponse : ",data);
                if(data == 'error')
                {
                    $("#updateBtn").addClass("disableButton");
                    $("#BannerPositionEditError").removeClass("textNotVisible");
                }
                else 
                {
                    $("#updateBtn").removeClass("disableButton");
                    $("#BannerPositionEditError").addClass("textNotVisible");
                }
            }
            });
            
        }
        else
        {
            console.log("no data");
            $("#updateBtn").addClass("disableButton");
            $("#BannerPositionEditError").addClass("textNotVisible");
        }
        
        
    });
    
    // Validation END
          
          
    //  DeleteModal  start
    
    $( ".DeleteLink" ).click(function() {
        
        var id = $(this).data('id');
        console.log(id);
      
      $("#DeleteModal").modal("show");
      
      $('#deleteLink').on('click',function () {
        var deleteID = $(this).val();
            
          $.ajax({
              url: '/admin/events/delete',
              type: 'DELETE',
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    id:id
                },
                success: function(response) {
                    // console.log(response);
                    $('#item_' + deleteId).remove();
                    
                },
                error: function(xhr) {
                    
                    alert('An error occurred while deleting the state.');
                }
            });
        });
   });


    
    //  DeleteModal  end
  
          
          
          
// add modal validation



    // character 
     function addOnlyCharacterKey(evt) {
         
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if ( ASCIICode != 32 && (ASCIICode < 65 || ASCIICode > 90) &&  (ASCIICode < 97 || ASCIICode > 122))
            return false;
        return true;
    }

// number
     function addOnlyNumberKey(evt) {
         
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if ( ASCIICode != 31 && (ASCIICode < 48 || ASCIICode > 57) )
            return false;
        return true;
    }
    
    // comment
     function addOnlyCommentKey(evt) {
         

        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode != 32 && ASCIICode != 46 && (ASCIICode < 65 || ASCIICode > 90) &&  (ASCIICode < 97 || ASCIICode > 122) )
            return false;
        return true;
    }
    
    // Description
     function addOnlyDescriptionKey(evt) {
         
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode != 34 && ASCIICode != 32 && ASCIICode != 63 && (ASCIICode < 65 || ASCIICode > 90) && (ASCIICode < 38 || ASCIICode > 57)  &&  (ASCIICode < 97 || ASCIICode > 122))
        return false;
        return true;
    }
     
     
// image add validation
       function addFileValidation() {
            var fileInput = 
                document.getElementById('files');
              
            var filePath = fileInput.value;
          
            // Allowing file type
            var allowedExtensions = 
                    /(\.jpg|\.jpeg|\.png)$/i;
              
            if (!allowedExtensions.exec(filePath)) {
                alert('Invalid file type');
                fileInput.value = '';
                return false;
            } 
            else 
            {
                // Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById(
                            'image_preview').innerHTML = 
                            '<img src="' + e.target.result
                            + '" style="width: 25%;"/>';
                    };
                      
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }
        
// image edit validation
       function editFileValidation() {
            var fileInput = 
                document.getElementById('editbannerimage1');
              
            var filePath = fileInput.value;
          
            // Allowing file type
            var allowedExtensions = 
                    /(\.jpg|\.jpeg|\.png)$/i;
              
            if (!allowedExtensions.exec(filePath)) {
                alert('Invalid file type');
                fileInput.value = '';
                return false;
            } 
            else 
            {
              
                // Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById(
                            'image_preview').innerHTML = 
                            '<img src="' + e.target.result
                            + '" style="width: 25%;"/>';
                    };
                      
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }
        
    $(document).ready(function() {
        
        if (!$('.input-AddBannerImage-1').data('imageUploader')) {
            // console.log('fvkdf');
            $('.input-AddBannerImage-1').imageUploader({
                imagesInputName: 'AddBannerImage',
                preloadedInputName: 'old',
                maxFiles: 1,
                onSuccess: function(file, response) {
                // Update UI with uploaded file's name
                console.log(file);
                $('#file-name').text('Uploaded file: ' + file.name);
            },
            });

            // Set a data attribute to indicate that imageUploader has been initialized
            $('.input-AddBannerImage-1').data('imageUploader', true);
        }

        $('#AddBannerImage').on('change', function() {
            
            var fileName = $(this).val().split('\\').pop();
            $('#file-name').text('Selected file: ' + fileName);
        });
        
        $('#add-banner').on('hidden.bs.modal', function (event) {
         location.reload();
        });
        
        $('#edit-banner').on('hidden.bs.modal', function (event) {
         location.reload();
        });
    });

    
   </script>


@stop
