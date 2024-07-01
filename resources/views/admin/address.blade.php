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
                                                <a href="javascript:void(0);">Admin Management</a>
                                            </li>
                                            <li class="separator">
                                                <i class="flaticon-right-arrow"></i>
                                            </li>
                                            <li class="nav-item">
                                                <a href="javascript:void(0);" id="test">Addresses</a>
                                            </li>
                                        </ul>
                                        
										<button class="btn btn-primary btn-round btn-sm ml-auto" title="Add Address" data-toggle="modal" data-target="#add-address">
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
													<th>State</th>
													<th>Center</th>
													<th>Address</th>
													<th>Contact</th>
													<th>Email</th>
													<th>Facebook</th>
													<th>Instagram</th>
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
													
													<td class="catname text-center">
    												    @if($item->status == '0')
    												        <a href="{{asset('admin/status_address/'.$item->ID)}}" class="redColor" data-toggle="tooltip" title="Inactive">
    												            <i class="fas fa-check-circle fa-2x " aria-hidden="true"></i>
    												        </a>
    												    @else
    												        <a href="{{asset('admin/status_address/'.$item->ID)}}" class="greenColor" data-toggle="tooltip" title="Active">
    												            <i class="fas fa-check-circle fa-2x" aria-hidden="true"></i>
    												        </a>
    												    @endif
													</td>

													
													<td>
														<a id="editModal{{ $item->ID }}"  class="text-warning mr-2 editModal" data-href="{{asset('admin/get_address/'.$item->ID)}}" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a> 
													<a href="javascript:void(0);" class="text-danger delete-modal" data-id="{{$item->ID}}" data-delete="{{asset('admin/delete_address/'.$item->ID)}}" data-toggle="tooltip" title="Delete"><i class="fas fa-trash" ></i></a>

													</td>
													
													<td>{{ $item->state_name }}</td>
													<td>{{ $item->center }}</td>
													<td>{{ $item->address }}</td>
													<td>{{ $item->contact }}</td>
													<td>{{ $item->email }}</td>
													<td>{{ $item->facebook }}</td>
													<td>{{ $item->insta }}</td>
													
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

  <!-- Modal -->
  
  <!-- Delete Modal -->
														
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content py-2">
                <div class="modal-body">
                    <p class="text-center mb-0" id="delete-top-notifi">Are you sure you want to Delete?</p>
                    <p id="delete-confi-text" class="text-center mb-0">All related dependencies, status will be delete.</p>
                </div>
                <div class="modal-footer mx-auto border-top-0">
                    <button type="button" class="btn btn-outline-primary btn-danger" data-dismiss="modal">Cancel</button>
                    <a href="" id="deleteLink" class="btn btn-success">Confirm</a>
                </div>
            </div>
        </div>
    </div>
  
  <!--Add Modal-->
<div class="modal fade add-modal" id="add-address" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method='post' action="{{asset('admin/add_address')}}" enctype="multipart/form-data" >
            @csrf
		    <div class="modal-body">

			    <div class="row">
                    
                    <!-- Select State -->
					<div class="col-sm-12 col-md-6 col-lg-6">
						<div class="form-group">
							<label class="form-label">Select State</label>
                            <select class="form-control input-pill" id="state_id" name="state_id"  >
                                <option value="">Select State</option>
                                @foreach($State as $askey=>$asitem)
                                
                                <option value="{{$asitem->ID}}">{{ $asitem->state_name }}</option>
                                @endforeach   
                            </select>
						</div>
					</div>
					
					
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
					    <div class="form-group "> 
						     <label class="form-label">Center</label>
                             <input type="text" id="center" name="center" placeholder="Center" class="form-control input-full input-pill"  required  />
                             
                        </div>
                    </div>

					
					<div class="col-sm-12 col-md-12">
						<div class="form-group">
                            <label class="form-label" for="address">Address</label>
                            <textarea class="form-control input-full input-pill" id="address" name="address" rows="5" cols="50" maxlength="500"></textarea>
					    </div>
					</div>
					
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
					    <div class="form-group "> 
						     <label class="form-label">Contact Number</label>
                             <input type="text" id="contact" name="contact" placeholder="Contact Number" class="form-control input-full input-pill"  required  />
                             
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
					    <div class="form-group "> 
						     <label class="form-label">Email ID</label>
                             <input type="text" id="email" name="email" placeholder="Email ID" class="form-control input-full input-pill"    />
                             
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
					    <div class="form-group "> 
						     <label class="form-label">Facebook Link</label>
                             <input type="text" id="facebook" name="facebook" placeholder="Facebook Link" class="form-control input-full input-pill"   />
                             
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
					    <div class="form-group "> 
						     <label class="form-label">Instagram Link</label>
                             <input type="text" id="insta" name="insta" placeholder="Instagram Link" class="form-control input-full input-pill"    />
                             
                        </div>
                    </div>
                    
					
                   
			</div>
			
		    </div>
			<div class="modal-footer">
			    <button id="addBtn" type="submit" class="btn  btn-primary">Submit</button>
				<button type="button" class="btn  btn-danger" data-dismiss="modal">Cancel</button>
				
			</div>
		</form>
	</div>
  </div>
</div>

<!--edit-->

<div class="modal fade edit-modal" id="edit-address" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Address</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form  method='post' action="{{ asset('admin/update_address') }}" enctype="multipart/form-data">
				    @csrf
					<div class="row">
                    
                    <!-- Select State -->
					<div class="col-sm-12 col-md-6 col-lg-6">
						<div class="form-group">
							<label class="form-label">Select State</label>
                            <select class="form-control input-pill" id="Ustate_id" name="state_id"  >
                                <option value="">Select State</option>
                                @foreach($State as $askey=>$asitem)
                                
                                <option value="{{$asitem->ID}}">{{ $asitem->state_name }}</option>
                                @endforeach   
                            </select>
						</div>
					</div>
					
					
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
					    <div class="form-group "> 
						     <label class="form-label">Center</label>
                             <input type="text" id="Ucenter" name="center" placeholder="Center" class="form-control input-full input-pill"  required  />
                             <input type="hidden" id="Uaddress_id" name="address_id"   />
                             
                        </div>
                    </div>

					
					<div class="col-sm-12 col-md-12">
						<div class="form-group">
                            <label class="form-label" for="address">Address</label>
                            <textarea class="form-control input-full input-pill" id="Uaddress" name="address" rows="5" cols="50" maxlength="500"></textarea>
					    </div>
					</div>
					
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
					    <div class="form-group "> 
						     <label class="form-label">Contact Number</label>
                             <input type="text" id="Ucontact" name="contact" placeholder="Contact Number" class="form-control input-full input-pill"  required  />
                             
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
					    <div class="form-group "> 
						     <label class="form-label">Email ID</label>
                             <input type="text" id="Uemail" name="email" placeholder="Email ID" class="form-control input-full input-pill"  />
                             
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
					    <div class="form-group "> 
						     <label class="form-label">Facebook Link</label>
                             <input type="text" id="Ufacebook" name="facebook" placeholder="Facebook Link" class="form-control input-full input-pill" />
                             
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
					    <div class="form-group "> 
						     <label class="form-label">Instagram Link</label>
                             <input type="text" id="Uinsta" name="insta" placeholder="Instagram Link" class="form-control input-full input-pill"   />
                             
                        </div>
                    </div>
                    
					
                   
			</div>
					<div class="row">
                        <div class="col-12 col-md-12 col-lg-12 mb-3">
                            <button id="updateBtn" class="btn btn-secondary btn-sm float-right">Update</button>
                            <button type="button" class="btn  btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>

<script src="{{ asset('admin/assets/js/core/jquery.3.2.1.min.js') }}"></script>
 <script>

    $( ".editModal" ).click(function() {
        var href = $(this).data('href');
        console.log("href : ",href);
        
        $.ajax({
         type: "GET",
         url: href,
         success: function(data){
            console.log("data : ",data);
            
            $('#Uaddress_id').val(data[0].ID);
            $('#Ustate_id').val(data[0].state_id);
            $('#Ucenter').val(data[0].center);
            $('#Uaddress').val(data[0].address);
            $('#Ucontact').val(data[0].contact);
            $('#Uemail').val(data[0].email);
            $('#Ufacebook').val(data[0].facebook);
            $('#Uinsta').val(data[0].insta);
            $("#edit-address").modal("show");
         }
        });
        
    });
          

    
        
    $(document).ready(function() {
        
        
        $('#add-address').on('hidden.bs.modal', function (event) {
         address.reload();
        });
        
        $('#edit-address').on('hidden.bs.modal', function (event) {
         address.reload();
        });
    });
        
   </script>


@stop