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

                                                                                <div class="card-footer mt-3 d-flex justify-content-center">
                                                                            <form action="" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="data_id" value="{{ $data->id }}">
                                                                                <button type="submit" class="btn btn-primary m-1">Approve</button>
                                                                            </form>
                                                                            
                                                                            <form action="" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="data_id" value="{{ $data->id }}">
                                                                                <button type="submit" class="btn btn-danger m-1">Reject</button>
                                                                            </form>
                                                                        </div>

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
                                                                        <div class="card-footer mt-3 d-flex justify-content-center">
                                                                            <form action="" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="data_id" value="{{ $data->id }}">
                                                                                <button type="submit" class="btn btn-primary m-1">Approve</button>
                                                                            </form>
                                                                            
                                                                            <form action="" method="POST">
                                                                                @csrf
                                                                                <input type="hidden" name="data_id" value="{{ $data->id }}">
                                                                                <button type="submit" class="btn btn-danger m-1">Reject</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    @elseif($modelName == 'OurTeam')
                                                        <h2>Our Team Details</h2>
                                                        <img src="{{ asset($data->image_path) }}" alt="Our Team Image" style="max-width: 100%; height: auto;">
                                                        <p>{{ $data->description }}</p>
                                                    @elseif($modelName == 'Testimonial')
                                                        <h2>Testimonial Details</h2>
                                                        <p>{{ $data->description }}</p>
                                                        <img src="{{ asset($data->image_path) }}" alt="Testimonial Image" style="max-width: 100%; height: auto;">
                                                    @elseif($modelName == 'Event')
                                                        <h2>Event Details</h2>
                                                        <p>{{ $data->description }}</p>
                                                        <img src="{{ asset($data->image_path) }}" alt="Event Image" style="max-width: 100%; height: auto;">
                                                    @endif
                                          
                                        
                                            <p></p>
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
  

<!--edit-->





						
                
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- <script src="{{ asset('assets/js/jquery.min.js') }}"></script> -->
 <script>
    $(document).ready(function () {
        $('.editModal').on('click', function (e) {
            e.preventDefault();
            var recordId = $(this).data('id');
            $('#gallery_id').val(recordId);
            console.log(recordId);
            $.ajax({
                url: '/admin/galleryData', // Replace with your route to fetch record details
                type: 'GET',
                data:{
                    id:recordId
                },
                success: function (data) {
                    console.log(data);
                    $('#editUnit_id').append('<option value="' + data[0].address_id + '">' + data[0].center + '</option>');
                    
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
            
            var deleteId = $(this).data('id');

            $.ajax({
                url: '/admin/gallery/delete',
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
