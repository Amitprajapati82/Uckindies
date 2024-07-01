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
                                                <a href="javascript:void(0);">Website Management</a>
                                            </li>
                                            <li class="separator">
                                                <i class="flaticon-right-arrow"></i>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0);" id="test">Banners</a>
                                            </li>
                                        </ul>
                                        
										<button class="btn btn-primary btn-round btn-sm ml-auto" title="Add Banner" data-toggle="modal" data-target="#add-banner">
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
													
													<th>Status</th>
													<th>Action</th>
													
													<th>Banner Image</th>
													<th>Banner Title</th>
													<th>Banner Page</th>
													<th>Banner Position</th>
                                                    <th>Description</th>													
													
    												<th>Created On</th>
    												<th>Last Modified On</th>
													
												</tr>
											</thead>
											<tbody>
											    
											    
											    @foreach($data as $key=>$item)
											    
												@php
												    $date=date_create($item->created_at);
												    $created_at = date_format($date,"d M Y H:i");
												    $date1=date_create($item->updated_at);
												    $updated_at = date_format($date1,"d M Y H:i");
												@endphp
											    
												<tr>
													<td>{{ $key + 1 }}</td>
													
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
													
													<td class="catname text-center">
    												    @if($item->status == '0')
    												        <a href="{{asset('admin/bannerstatus/'.$item->ID)}}" class="redColor" data-toggle="tooltip" title="Inactive">
    												            <i class="fas fa-check-circle fa-2x " aria-hidden="true"></i>
    												        </a>
    												    @else
    												        <a href="{{asset('admin/bannerstatus/'.$item->ID)}}" class="greenColor" data-toggle="tooltip" title="Active">
    												            <i class="fas fa-check-circle fa-2x" aria-hidden="true"></i>
    												        </a>
    												    @endif
													</td>
												
													<td>
														<a id="editModal{{ $item->ID }}"  class="text-warning mr-2 editModal" data-href="{{asset('admin/editBannerData/'.$item->ID)}}" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a> 
														
													<a href="javascript:void(0);" class="text-danger DeleteModal" data-bandel="{{asset('admin/bannerDelete/'.$item->ID)}}" data-toggle="tooltip" title="Delete"><i class="fas fa-trash" ></i></a>
														


													</td>
													
													<td class="catname"><img src="{{ asset('admin/assets/img/admin/banner/'.$item->banner_image) }}" style="width: 90px;height: auto;" alt="Banner Image" /></td>
													<td>{{  $item->banner_title  }}</td>
													<?php
													    if($item->page=="home")
													        $mypage = "Home";
													    elseif($item->page=="about_us")
													        $mypage = "About Us";
													    elseif($item->page=="our_team")
													        $mypage = "Our Team";
													    elseif($item->page=="closures")
													        $mypage = "Closures";
													    elseif($item->page=="insights")
													        $mypage = "Insights";
													    elseif($item->page=="contact_us")
													        $mypage = "Contact Us";
													    else
													        $mypage = "";
													    
													?>
													<td>{{ $mypage  }}</td>
													<td class="catname">{{ $item->banner_position }}</td>
                                                    <td class="catname">{{ $item->description }}</td>
													
                                                    <td>{{ $created_at }}</td>
                                                    <td>{{ $updated_at }}</td>

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

  <!-- ADD Modal -->
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
                <label for="BannerName">Banner Title</label><span class="text-danger"> *</span>
                
                <input type="text" class="form-control input-full input-pill" id="BannerName" name="BannerName" placeholder="Banner Title" required onkeypress="return addOnlyDescriptionKey(event)"
                   maxlength="30">
                 <span id="BannerNameAddError" class="text-danger textNotVisible">Banner Title already exists</span>
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
                <label for="BannerPosition">Banner Position</label><span class="text-danger"> *</span>
                <input type="text" class="form-control input-full input-pill" id="BannerPosition" name="BannerPosition" placeholder="Banner Position" required onkeypress="return addOnlyNumberKey(event)" maxlength="1">
                <span id="BannerPositionAddError" class="text-danger textNotVisible">Banner position already exists</span>
                 @error('BannerPosition')
                    <small class="form-text text-danger">{{   $message    }}</small>
                @enderror

                
              </div>
            </div>
            
           
            
            <div class="col-12 col-md-12 col-lg-12 mb-3">
              <div class="form-group p-0">
                <label for="Description">Description</label>
                <textarea class="form-control input-full input-pill" id="Description" name="Description" placeholder="Description"  row="4" style="width:100%" 
                maxlength="50" onkeypress="return addOnlyDescriptionKey(event)"></textarea>
                <!--<input type="text" class="form-control input-full input-pill" id="Description" name="Description" placeholder="Description" required>-->
                 @error('Description')
                    <small class="form-text text-danger">{{   $message    }}</small>
                @enderror
                
              </div>
            </div>
            
            
    <!--        <div class="col-12 col-md-6 col-lg-6 mb-3">-->
    <!--          <div class="form-group p-0">-->
    <!--            <label for="Status">Status</label>-->
				<!--<select class="form-control input-pill" id="Status" name="Status" onblur="requiredField(this)" required>-->
    <!--                <option value="1">Active</option>-->
				<!--	<option value="0">Inactive</option>-->
					
				<!--</select>-->
    <!--             @error('Status')-->
    <!--                <small class="form-text text-danger">{{   $message    }}</small>-->
    <!--            @enderror-->
                
    <!--          </div>-->
    <!--        </div>-->
            
            
            <!--<div class="col-12 col-md-12 col-lg-12 mb-3">-->
            <!--    <div class="form-group p-0">-->
            <!--        <ul id="media-list" class="clearfix medialist">-->
            <!--            <li class="myupload">-->
            <!--                <span><i class="fa fa-plus" aria-hidden="true"></i>-->
            <!--                <input type="file" click-type="add" id="BannerImage1" name='BannerImage1' class="picupload" >-->
            <!--                </span>-->
                            
            <!--            </li>-->
            <!--        </ul>-->
            <!--          <output id='result' />-->
            <!--          <div id="image_preview"></div>-->
            <!--          <input type='file' id='files' name ="AddBannerImage" required onchange="return addFileValidation()"/>-->
            <!--        <label for="files" class="custom-file-upload text-center add-img">-->
            <!--            <span class="add-icon"><i class="fas fa-plus"></i></span>-->
            <!--            <input type="file" id="BannerImage" name='BannerImage'>-->
            <!--            <input data-device="desktop" type="file" id="files" name="files" multiple>-->
            <!--            <input type='file' id='files' name ="AddBannerImage" required onchange="return addFileValidation()"/>-->
                        
            <!--        </label>-->
                    <!--@error('AddBannerImage')-->
                    <!--    <small class="form-text text-danger">{{   $message    }}</small>-->
                    <!--@enderror-->
            <!--  </div>-->
            <!--</div>-->
            
            <div class="col-12 col-md-12 col-lg-12 mb-3">
                <div class="form-group p-0">
					<div class="d-flex justify-content-between"><label >Banner Image<span class="text-danger"> *</span></label> <span class="text-danger"> Image size:- width:1920 px, height:650 px </span></div>
                        <div class="input-AddBannerImage-1" style="padding-top: .5rem;"></div>
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

<!-- Update Modal -->

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
								<label for="BannerName">Banner Title</label><span class="text-danger"> *</span>
								<input type="text" class="form-control input-full input-pill" id="EditBannerName" name="EditBannerName" required onkeypress="return addOnlyDescriptionKey(event)"
                                    maxlength="30">
								<input type="hidden"  id="editbannerid" name="editbannerid" value="" >
								<span id="BannerNameEditError" class="text-danger textNotVisible">Banner Title already exists</span>
								 @error('editbannerid')
                                        <small class="form-text text-danger">{{   $message    }}</small>
                                @enderror
							</div>
						</div>
						
						
                    <div class="col-12 col-md-6 col-lg-6 mb-3">
                      <div class="form-group p-0">
                        <label for="Page">Page</label><span class="text-danger"> *</span>
                        <!--<input type="text" class="form-control input-full input-pill" id="BannerPosition" name="BannerPosition" placeholder="Banner Position" required onkeypress="return addOnlyNumberKey(event)" maxlength="1">-->
                            <select class="form-select form-control input-full input-pill" name="editpage" id="editpage">
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
								<label for="BannerPosition">Banner Position</label><span class="text-danger"> *</span>
								<input type="text" class="form-control input-full input-pill" id="EditBannerPosition" name="EditBannerPosition" value="" maxlength="1" required onkeypress="return addOnlyNumberKey(event)">
								<span id="BannerPositionEditError" class="text-danger textNotVisible">Banner position already exists</span>
								@error('EditBannerPosition')
                                        <small class="form-text text-danger">{{   $message    }}</small>
                                @enderror
							</div>
						</div>
						
                        
                   
						<div class="col-12 col-md-12 col-lg-12 mb-3">
							<div class="form-group p-0">
								<label for="Description">Description</label>
								<textarea class="form-control input-full input-pill" id="EditDescription" name="EditDescription" placeholder="Description"  row="4" style="width:100%" 
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
      <!--                              <li><img src="" title="" id="editbannerimage"><div class="post-thumb"><div class="inner-post-thumb"><a href="javascript:void(0);" data-id="1_2.jpg" class="remove-pic"><i class="fa fa-times" aria-hidden="true"></i></a><div></div></div></div></li>-->
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
							<div class="d-flex justify-content-between"><label >Banner Image<span class="text-danger"> *</span></label> <span class="text-danger"> Image size:- width:1920 px, height:650 px </span></div>
                        <input id="editbannerimage1" name='editbannerimage1[]' type="file" multiple >
                        <!--@error('editbannerimage1')-->
                        <!--        <small class="form-text text-danger">{{   $message    }}</small>-->
                        <!--@enderror-->
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


<!-- DELETE Modal START  -->
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
    
<!-- DELETE Modal END  -->

<script src="{{ asset('admin/assets/js/core/jquery.3.2.1.min.js') }}"></script>
 <script>
 
    //  $( "#addForm" ).submit(function( e ) {
 
    //   // Stop form from submitting normally
    //     e.preventDefault();
    //     console.log("All Validation check");
    //     //alert("All Validation check");
    //     var href = "{{asset('admin/add_Banner')}}";
    //     var token = $("input[name='_token']").val();
    //     console.log("href : ",href);
    //     console.log("token : ",token);
        
    //     var file = $("#AddBannerImage");
    //     console.log("file : ",file);
    //     if ($('#file')[0].files.length === 0)
    //     {
    //         console.log("image file is available");
    //     }
    //     else
    //     {
    //         console.log("image file is not available");
    //     }
        
    //     // $.ajax({
    //     //          type: "POST",
    //     //          url: href,
    //     //          data: { _token : token, fname:fname, lname:lname, phoneno:phoneno, 
    //     //          email:email, message:message, basic_price: basic_price, color_price:color_price,
    //     //          shading_price:shading_price, total_price:total_price }
    //     // }).done(function(data) {
    //     //       // console.log("data : ",data);
    //     //       swal.fire({text:"Thank you!! We wil contact you soon.",icon:"success",timer:3000,showConfirmButton:false});
    //     //       $("#searchForm")[0].reset();
    //     //       $("#submitContact").prop('disabled', true);
    //     //     //   $("#payment").removeClass("d-none").delay(60000).queue(function(){
    //     //     //         $("#searchForm")[0].reset();
    //     //     //         $(this).addClass("d-none");
    //     //     //         $("#submitContact").prop('disabled', false);
    //     //     //   });
    //     // });
        
    // });
  
    
    var images1 = [];
    $( ".editModal" ).click(function() {
        var href = $(this).data('href');
        console.log("href : ",href);
        
        $.ajax({
         type: "GET",
         url: href,
         success: function(data){
            console.log("data : ",data);
            
            $('#editbannerid').val(data[0].ID);
            $('#EditBannerName').val(data[0].banner_title);  
            $('#editpage').val(data[0].page);  
            $('#EditBannerPosition').val(data[0].banner_position);  
            $('#EditDescription').val(data[0].description);
            
            // page disable
            var page = data[0].page;
            if(page!=='our_team')
            {
                $("#EditBannerPosition").prop('readonly', true);
                $("#editpage").prop('disabled', true);
                $("#EditBannerPosition").val(1);
                // $("#BannerPosition").removeAttr('disabled');
            }
            else
            {
                $("#EditBannerPosition").prop('readonly', false);
                $("#editpage").prop('disabled', true);
                // $("#EditBannerPosition").val('');                
                // $("#BannerPosition").attr('disabled','disabled');
            }
            
            var imgurl1 = "{{asset('admin/assets/img/admin/banner/')}}" + "/" + data[0].banner_image;
            var image1 = { id: data[0].ID,imgid : data[0].ID , name: data[0].banner_image, file: imgurl1, size:data[0].ID,size2:'512', thumbnail: imgurl1};
            images1.push(image1);
            
            
            $('#editbannerimage1').fileuploader({
                limit:1,
                files:images1,
                onListInput: function(list, fileList, listInputEl, listEl, parentEl, newInputEl, inputEl) {
                    // callback will go here
                
                    console.log(list.length);
                    
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
        
        var avalue = $("#editpage").val();
        console.log ("avalue :",avalue);
        
        $("#editpage").change(function() {
        var value = $(this).val();
        if(value.length > 0)
        {
            console.log("value : ",value);

            if(value!=='our_team' && avalue!=='our_team')
            {
                $("#EditBannerPosition").prop('disabled', true);
                $("#EditBannerPosition").val(1);
                // $("#BannerPosition").removeAttr('disabled');
            }
            else
            {
                $("#EditBannerPosition").prop('disabled', false);
                $("#EditBannerPosition").val('');                
                // $("#BannerPosition").attr('disabled','disabled');
            }
        }
        else
        {
            $("#addBtn").addClass("disableButton");
            $("#BannerPositionAddError").addClass("textNotVisible");
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
    
    $("#page").change(function() {
        var value = $(this).val();
        if(value.length > 0)
        {
            console.log("value : ",value);
            
            if(value=='our_team')
            {
                console.log("if");
                $("#BannerPosition").prop('readonly', false);
                $("#BannerPosition").val('');
                // $("#BannerPosition").removeAttr('disabled');
            }
            else
            {
                console.log("else");
                $("#BannerPosition").prop('readonly', true);
                $("#BannerPosition").val(1);
                // $("#BannerPosition").attr('disabled','disabled');
            }

        }
        else
        {
            $("#addBtn").addClass("disableButton");
            $("#BannerPositionAddError").addClass("textNotVisible");
        }
        
        
    }); 
    
    
    // $("#editpage").change(function() {
    //     var value = $(this).val();
    //     if(value.length > 0)
    //     {
    //         console.log("value : ",value);
            
            
            
            
    //         if(value!=='our_team')
    //         {
    //             $("#EditBannerPosition").prop('disabled', true);
    //             $("#EditBannerPosition").val(1);
    //             // $("#BannerPosition").removeAttr('disabled');
    //         }
    //         else
    //         {
    //             $("#EditBannerPosition").prop('disabled', false);
    //             $("#EditBannerPosition").val('');                
    //             // $("#BannerPosition").attr('disabled','disabled');
    //         }
    //     }
    //     else
    //     {
    //         $("#addBtn").addClass("disableButton");
    //         $("#BannerPositionAddError").addClass("textNotVisible");
    //     }
        
        
    // });   
    
        
    // var page = $("#page").change();
    // console.log("page : ",page);
    
    $("#BannerPosition").keyup(function() {
        var value = $(this).val();
        
        // var page_name = "our_team";
        // console.log("page_name : ",page_name);
        // var page_value = $("#page").val();
        // if(value.length > 0 && page_name==page_value  )
        if(value.length > 0 )
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
        
        $('.input-AddBannerImage-1').imageUploader({
            imagesInputName: 'AddBannerImage',
            preloadedInputName: 'old',
            maxFiles: '1',
        });
        
        const input = document.getElementById('AddBannerImage');

        // ✅ Set required attribute
        input.setAttribute('required', '');
        
        $('#add-banner').on('hidden.bs.modal', function (event) {
         location.reload();
        });
        
        $('#edit-banner').on('hidden.bs.modal', function (event) {
         location.reload();
        });
    });
        
   </script>


@stop