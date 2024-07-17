@extends('admin/layout')
@section('content')

<style>
    input[type="file"] {
    display:none;
}

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
                                                <a href="javascript:void(0);">Banner Management</a>
                                            </li>
                                            <li class="separator">
                                                <i class="flaticon-right-arrow"></i>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0);" id="test">Banner</a>
                                            </li>
                                        </ul>
                                        
										<button class="btn btn-primary btn-round btn-sm ml-auto" data-toggle="modal" data-target="#add-banner">
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
													<th>Banner Image</th>
													<th>Banner Name</th>
													<th>Banner Position</th>
                                                    <th>Description</th>													
													
													<!--<th>Created At</th>-->
													<!--<th>Updated At</th>-->
													<th>Status</th>
													<th>Action</th>
													
												</tr>
											</thead>
											<tbody>
											    
											    @foreach($bannerData as $key=>$item)
												<tr>
													<td>{{ $key + 1 }}</td>
													<td class="catname"><img src="{{ asset('assets/img/'.$item->banner_image) }}" style="width: 90px;height: auto;" alt="Banner Image" /></td>
													<td>{{  $item->banner_name  }}</td>
													<td class="catname">{{ $item->banner_position }}</td>
                                                    <td class="catname">{{ $item->description }}</td>
													
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
													<!--<td class="catname">{{ $item->created_at }}</td>-->
													<!--<td class="catname">{{ $item->updated_at }}</td>-->
													
													<td>
														<a id="editModal{{ $item->id }}"  class="text-warning mr-2 editModal" data-href="{{asset('admin/editBannerData')}}" data-id="{{$item->id}}" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a> 
														<!--<a href="{{ asset('admin/bannerDelete/'.$item->ID) }}" class="text-danger" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>-->
													<a href="javascript:void(0);" class="text-danger DeleteModal" data-bandel="{{asset('admin/bannerDelete/'.$item->ID)}}" data-toggle="tooltip" title="Delete"><i class="fas fa-trash" ></i></a>
														
	                                                <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content py-2">
                                                            <div class="modal-body">
                                                                <p class="text-center mb-0">Are you sure you want to Delete?</p>
                                                            </div>
                                                            <div class="modal-footer mx-auto border-top-0">
                                                                <button type="button" class="btn btn-outline-primary btn-danger" data-dismiss="modal">Cancel</button>
                                                                <a href="" id="deleteLink" class="btn btn-success">Confirm</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                        
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
  <div class="modal fade add-modal" id="add-banner" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          Add Banner
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method='post' action="{{asset('admin/add_Banner')}}" enctype="multipart/form-data" id="addBannerForm">
        <!--<form method='post' enctype="multipart/form-data" id="addForm">-->
            @csrf
          <div class="row">
            <div class="col-12 col-md-6 col-lg-6 mb-3">
              <div class="form-group p-0">
                <label for="BannerName">Banner Name </label>
                <span class="text-danger">*</span>
                <input type="text" class="form-control input-full input-pill" id="BannerName" name="BannerName" placeholder="Enter Banner Name" required onkeypress="return addOnlyDescriptionKey(event)"
                   maxlength="30">
                 <span id="BannerNameAddError" class="text-danger textNotVisible">Banner name already exists</span>
                  @error('BannerName')
                        <small class="form-text text-danger">{{   $message    }}</small>
                  @enderror
              </div>
            </div>

            <div class="col-12 col-md-6 col-lg-6 mb-3">
              <div class="form-group p-0">
                <label for="Page">Page</label><span class="text-danger"> *</span>
                <!--<input type="text" class="form-control input-full input-pill" id="BannerPosition" name="BannerPosition" placeholder="Banner Position" required onkeypress="return addOnlyNumberKey(event)" maxlength="1">-->
                    <select class="form-select form-control input-full input-pill" name="page" id="page">
                        <option selected>Select Page</option>
                        
                        <option value="about_us">About Us</option>
                        <option value="closures">Closures</option>
                        <option value="contact_us">Contact Us</option>
                        <option value="insights">Insights</option>
                        <option value="home">Home</option>
                        <option value="our_team">Our Team</option>
                        
                        
                     </select>
                
                <!--<span id="BannerPositionAddError" class="text-danger textNotVisible">Banner position already exists</span>-->
                 @error('BannerPosition')
                    <small class="form-text text-danger">{{   $message    }}</small>
                @enderror

              </div>
            </div>

            <div class="col-12 col-md-6 col-lg-6 mb-3">
              <div class="form-group p-0">
                <label for="BannerPosition">Banner Position *</label>
                <span class="text-danger">*</span>
                <input type="text" class="form-control input-full input-pill" id="BannerPosition" name="BannerPosition" placeholder="Enter Banner Position" required onkeypress="return addOnlyNumberKey(event)" maxlength="1">
                <span id="BannerPositionAddError" class="text-danger textNotVisible">Banner position already exists</span>
                 @error('BannerPosition')
                    <small class="form-text text-danger">{{   $message    }}</small>
                @enderror

                
              </div>
            </div>
            
           
            
            <div class="col-12 col-md-12 col-lg-12 mb-3">
              <div class="form-group p-0">
                <label for="Description">Description</label>
                <span class="text-danger">*</span>
                <textarea class="form-control input-full input-pill" id="Description" name="Description" placeholder="Enter Description"  row="4" style="width:100%" 
                maxlength="50" onkeypress="return addOnlyDescriptionKey(event)"></textarea>
                <!--<input type="text" class="form-control input-full input-pill" id="Description" name="Description" placeholder="Enter Description" required>-->
                @error('Description')
                    <small class="form-text text-danger">{{   $message    }}</small>
                @enderror
                
              </div>
            </div>
            
            
            <div class="col-12 col-md-12 col-lg-12 mb-3">
                <div class="form-group p-0">
					<label>Banner Image</label>
                    <span class="text-danger">*</span>
                        <div class="input-AddBannerImage-1" style="padding-top: .5rem;">
                            <input type="file" id="AddBannerImage" name="AddBannerImage" class="form-control">
                            <span id="file-name" class="form-text text-info mt-2"></span>
                        </div>
                        @error('AddBannerImage')
                        <small class="form-text text-danger">{{   $message    }}</small>
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

<div class="modal fade edit-modal" id="edit-banner" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">
					Edit Banner
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form  method='post' action="{{ asset('admin/bannerEdit') }}" enctype="multipart/form-data">
				    @csrf
					<div class="row">
						<div class="col-12 col-md-6 col-lg-6 mb-3">
							<div class="form-group p-0">
								<label for="BannerName">Banner Name <span class="text-danger">*</span></label>
                                
								<input type="text" class="form-control input-full input-pill" id="EditBannerName" name="EditBannerName" required onkeypress="return addOnlyDescriptionKey(event)"
                                    maxlength="30">
								<input type="hidden"  id="editbannerid" name="editbannerid" value="" >
								<span id="BannerNameEditError" class="text-danger textNotVisible">Banner name already exists</span>
								 @error('editbannerid')
                                        <small class="form-text text-danger">{{   $message    }}</small>
                                    @enderror
							</div>
						</div>

						<div class="col-12 col-md-6 col-lg-6 mb-3">
							<div class="form-group p-0">
								<label for="BannerPosition">Banner Position <span class="text-danger">*</span></label>
								<input type="text" class="form-control input-full input-pill" id="EditBannerPosition" name="EditBannerPosition" value="" maxlength="1" required onkeypress="return addOnlyNumberKey(event)">
								<span id="BannerPositionEditError" class="text-danger textNotVisible">Banner position already exists</span>
								@error('EditBannerPosition')
                                        <small class="form-text text-danger">{{   $message    }}</small>
                                @enderror
							</div>
						</div>
						
                        
                   
						<div class="col-12 col-md-12 col-lg-12 mb-3">
							<div class="form-group p-0">
								<label for="Description">Description <span class="text-danger">*</span></label>
								<textarea class="form-control input-full input-pill" id="EditDescription" name="EditDescription" placeholder="Enter Description"  row="4" style="width:100%" 
								maxlength="50" onkeypress="return addOnlyDescriptionKey(event)"></textarea>
								<!--<input type="text" class="form-control input-full input-pill" id="EditDescription" name="EditDescription" value="" maxlength="255" onkeypress="return addOnlyCommentKey(event)">-->
								@error('EditDescription')
                                        <small class="form-text text-danger">{{   $message    }}</small>
                                @enderror
							</div>
						</div>
					
						 <!--<div class="col-12 col-md-6 col-lg-6 mb-3">-->
       <!--                       <div class="form-group p-0">-->
       <!--                         <label for="EditStatus">Status</label>-->
       <!--         				<select class="form-control input-pill" id="EditStatus" name="EditStatus" onblur="requiredField(this)" required>               					-->
       <!--         					<option value="0">Inactive</option>-->
       <!--         					<option value="1">Active</option>-->
       <!--         				</select>-->
       <!--                          @error('EditStatus')-->
       <!--                             <small class="form-text text-danger">{{   $message    }}</small>-->
       <!--                         @enderror-->
                                
       <!--                       </div>-->
       <!--                     </div>-->
                            
                            
      <!--                  <div class="col-12 col-md-12 col-lg-12 mb-3">-->
      <!--                      <div class="form-group p-0">-->
						<!--		<label for="BannerImage">Banner Image</label>-->
                               <!-- <ul id="media-list" class="clearfix medialist">
                                   <li><img src="" title="" id="editbannerimage"><div class="post-thumb"><div class="inner-post-thumb"><a href="javascript:void(0);" data-id="1_2.jpg" class="remove-pic"><i class="fa fa-times" aria-hidden="true"></i></a><div></div></div></div></li>
      <!--                              <li class="myupload">-->
      <!--                                  <span><i class="fa fa-plus" aria-hidden="true"></i><input type="file" click-type="edit" id="editImage" name="editImage" class="picupload"></span>-->
      <!--                              </li>-->
                                    
      <!--                          </ul>-->
      <!--                          <img id="editbannerimage" src="#" alt="your image" style="width:25%;" />-->
      <!--                          <div id="image_preview"></div>-->
      <!--                          <label for="editbannerimage1" class="custom-file-upload text-center">-->
      <!--                              <span class="add-icon"><i class="fas fa-plus"></i></span>-->
      <!--                              <input type="file"  id="editbannerimage1" name='editbannerimage1'>-->
      <!--                          </label>-->
      <!--                            @error('editbannerimage')-->
      <!--                                  <small class="form-text text-danger">{{   $message    }}</small>-->
      <!--                          @enderror-->
						<!--	</div>-->
						<!--</div>-->
						
                <div class="col-12 col-md-12 col-lg-12 mb-3">
                    <div class="form-group p-0">
						<label>Banner Image<span class="text-danger">*</span></label>
                        <input id="editbannerimage1" name='editbannerimage1[]' type="file" multiple >
                        @error('editbannerimage1')
                               <small class="form-text text-danger">{{   $message    }}</small>
                        @enderror
					</div>
				</div>
						
						
					</div>
					<div class="row">
                        <div class="col-12 col-md-12 col-lg-12 mb-3">
                            <button id="updateBtn" class="btn btn-secondary btn-sm float-right">Update</button>
                        </div>
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- <script src="{{ asset('assets/js/jquery.min.js') }}"></script> -->
 <script>
 
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
  
    
    var images1 = [];
    $( ".editModal" ).click(function() {
        var href = $(this).data('href');
        var valueid = $(this).data('id');
        console.log("href : ",href);
        
        $.ajax({
         type: "GET",
         url: href,
         data:{
            id:valueid
         },
         success: function(data){
            console.log("data : ",data);
            
            $('#editbannerid').val(data[0].id);
            $('#EditBannerName').val(data[0].banner_name);  
            $('#EditBannerPosition').val(data[0].banner_position);  
            $('#EditDescription').val(data[0].description);
            
            var imgurl1 = "{{asset('assets/img/')}}" + "/" + data[0].banner_image;
            var image1 = { id: data[0].ID,imgid : data[0].ID , name: data[0].banner_image, file: imgurl1, size:data[0].ID,size2:'512', thumbnail: imgurl1};
            images1.push(image1);
            
           
            $('#editbannerimage1').fileuploader({
                limit:1,
                files:images1,
                onListInput: function(list, fileList, listInputEl, listEl, parentEl, newInputEl, inputEl) {
                    // callback will go here
                
                    console.log(fileList.length);
                    
                    return list;
                    
                },
                // Callback fired after deleting a file
                // by returning false, you can prevent a file from removing
                onRemove: function(item, listEl, parentEl, newInputEl, inputEl) {
                    console.log(listEl);
                    var id = item.size;
                    var href = "{{asset('admin/productImgDelete/gdfg')}}" + "/" + id;
                    var token = $("input[name='_token']").val();
                    $.ajax({
                             type: "POST",
                             url: href,
                             data: { _token : token }
                    }).done(function(data) {
                            // alert("deleted successfully");
                            // $('#pr-' + id).remove();
                            // alert(JSON.parse(data));
                            if(data == 'success'){
                                alert("deleted successfully");
                               
                                var plength = $('ul.fileuploader-items-list li').length - 1;
                                if(plength < 2){
                                    alert('please upload 4 images for products. now it has ' + plength + ' files')
                                    $('#update-product').hide();
                                }
                                //alert('length :' + plength);
                                
                            }
                    });
                },
            });
            
            
            $("#edit-banner").modal("show");
         }
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
    
    $( ".DeleteModal" ).click(function() {
        var href = $(this).data('bandel');
        // console.log("href : ",href);
        $("#deleteLink").attr("href", href);
      $("#DeleteModal").modal("show");
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
