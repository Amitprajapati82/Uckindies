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
                                                <a href="javascript:void(0);">Testimonial Management</a>
                                            </li>
                                            <li class="separator">
                                                <i class="flaticon-right-arrow"></i>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0);" id="test">Testimonial</a>
                                            </li>
                                        </ul>
                                        
										<button class="btn btn-primary btn-round btn-sm ml-auto" data-toggle="modal" data-target="#add-about_us">
											<i class="fa fa-plus"></i>
										</button>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="display border-top border-bottom table datatable table-striped table-hover table-sm">
											<thead>
												<tr>
													<th>Sr. No.</th>
													<th>Name</th>
													<th>Username</th>
													<th>Profile Image</th>
													<th>Message</th>
                                                    <th>Ratings</th>													
													
													<th>Status</th>
													<!--<th>Updated At</th>-->
													<!-- <th>Status</th> -->
													<th>Action</th>
													
												</tr>
											</thead>
											<tbody>
											    
											    @foreach($data as $key=>$item)
												<tr id="item_{{$item->id}}">
													<td>{{ $key + 1 }}</td>
													<td>{{ $item->name}}</td>
													<td>{{  $item->email  }}</td>
													<!-- <td class="catname"><img src="{{ asset('storage/' . $item->image) }}" style="width: 90px; height: auto;" alt="Banner Image" /></td> -->
                                                    <td class="profile-image">
                                                        <img src="{{ asset('storage/images/' . $item->image_path) }}" style="width: 80px; height: 80px; border-radius: 50%;" alt="Profile Image" />
                                                    </td>

													<td class="catname">{{ $item->message }}</td>
                                                    <!-- <td class="catname">{{ $item->description }}</td> -->
													<td class="catname">{{ $item->ratings }}</td>
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
                                                        <a href="" data-toggle="modal" class="text-warning mr-2 editModal" id="About_Us" data-target="#edit-testimonial" data-id="{{$item->id}}"><i class="fas fa-edit"></i></a>
														<!-- <a id="editModal{{ $item->id }}"  class="text-warning mr-2 editModal" data-href="{{asset('admin/editBannerData')}}" data-id="{{$item->id}}" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>  -->
														<!--<a href="{{ asset('admin/bannerDelete/'.$item->ID) }}" class="text-danger" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>-->
													<a href="javascript:void(0);" class="text-danger DeleteLink" data-bandel="{{asset('admin/testimonial/Delete/'.$item->id)}}" data-id="{{$item->id}}" data-toggle="tooltip" title="Delete"><i class="fas fa-trash" ></i></a>
														
	                                                
                                                        
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
  <div class="modal fade add-modal" id="add-about_us" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          Add Testimonial
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{ asset('admin/testimonial/store') }}" enctype="multipart/form-data" id="addBannerForm">
            @csrf

            <div class="row m-2">
                <div class="col-12 col-md-12 col-lg-12 mb-3">
                    <div class="form-group p-0 mt-3">
                        <label for="Name">Name</label>
                        <span class="text-danger"> *</span>
                        <input type="text"  class="form-control input-full input-pill" id="name" name="name">
                        @error('name')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-12 mb-3">
                    <div class="form-group p-0 mt-3">
                        <label for="Email">Email</label>
                        <span class="text-danger"> *</span>
                        <input type="text" class="form-control input-full input-pill" id="Email" name="Email">
                        @error('Email')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-12 mb-3">
                    <div class="form-group p-0 mt-3">
                        <label for="Message">Message</label>
                        <span class="text-danger"> *</span>
                        <textarea class="form-control input-full input-pill" id="Message" name="Message" rows="5"></textarea>
                        @error('Message')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-12 mb-3">
                    <div class="form-group p-0 mt-3">
                        <label for="Ratings">Ratings</label>
                        <span class="text-danger"> *</span>
                        <input type="number" class="form-control input-full input-pill" id="Ratings" name="Ratings" min="1" max="5" step="1">
                        @error('Ratings')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="form-group p-0 mt-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="Published" name="Published" value="1">
                            <label class="custom-control-label" for="Published">Published</label>
                        </div>
                        @error('Published')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="form-group p-0 mt-3">
                        <label for="PublishedImage">Published Image</label>
                        <span class="text-danger"> *</span>
                        <input type="file" class="form-control input-full input-pill" id="PublishedImage" name="PublishedImage">
                        @error('PublishedImage')
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
<div class="modal fade edit-modal" id="edit-testimonial" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          Edit Testimonial
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ asset('admin/testimonial/update') }}" enctype="multipart/form-data" id="editTestimonialForm">
            @csrf
            @method('PUT')
            <input type="hidden" id="testimonial_id" name="testimonial_id">
            <div class="row m-2">
                <div class="col-12 col-md-12 col-lg-12 mb-3">
                    <div class="form-group p-0 mt-3">
                        <label for="editName">Name</label>
                        <span class="text-danger"> *</span>
                        <input type="text" class="form-control input-full input-pill" id="editName" name="editName" value="">
                        @error('name')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-12 mb-3">
                    <div class="form-group p-0 mt-3">
                        <label for="editEmail">Email</label>
                        <span class="text-danger"> *</span>
                        <input type="email" class="form-control input-full input-pill" id="editEmail" name="editEmail" value="">
                        @error('email')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-12 mb-3">
                    <div class="form-group p-0 mt-3">
                        <label for="editMessage">Message</label>
                        <span class="text-danger"> *</span>
                        <textarea class="form-control input-full input-pill" id="editMessage" name="editMessage" rows="5"></textarea>
                        @error('message')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-12 mb-3">
                    <div class="form-group p-0 mt-3">
                        <label for="editRatings">Ratings</label>
                        <span class="text-danger"> *</span>
                        <input type="number" class="form-control input-full input-pill" id="editRatings" name="editRatings" min="1" max="5" step="1" value="">
                        @error('ratings')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="form-group p-0 mt-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="editPublished" name="editPublished" value="1" >
                            <label class="custom-control-label" for="editPublished">Published</label>
                        </div>
                        @error('published')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="form-group p-0 mt-3">
                        <label for="editPublishedImage">Published Image</label>
                        <span class="text-danger"> *</span>
                        <input type="file" class="form-control input-full input-pill" id="editPublishedImage" name="editPublishedImage">
                        @error('published_image')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                        <!-- <img src="" alt="Current Image" style="width: 90px; height: auto; margin-top: 10px;"> -->
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 mb-3">
                    <button id="editBtn" class="btn btn-secondary btn-sm float-right" type="submit">Update</button>
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
                <a href="" id="deleteLink" data-id="{{$item->id}}" class="btn btn-success">Confirm</a>
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
            $('#testimonial_id').val(recordId);
            // console.log(recordId);
            $.ajax({
                url: '/admin/testimonial_id',
                type: 'GET',
                data:{
                    id:recordId
                },
                success: function (data) {

                    console.log(data[0].id);

                    $('#editName').val(data[0].name);
                    $('#editEmail').val(data[0].email) 
                    $('#editMessage').val(data[0].message) 
                    $('#editRatings').val(data[0].ratings) 

                    if (data[0].published) {
                        $('#editPublished').prop('checked', true);
                    } else {
                        $('#editPublished').prop('checked', false);
                    } 
                    // $('#editEmail').val(data[0].email) 
                    
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
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
              url: '/admin/testimonial/delete',
              type: 'DELETE',
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    id:id
                },
                success: function(response) {
                    
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
