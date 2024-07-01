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
                                                <a href="javascript:void(0);" id="test">States</a>
                                            </li>
                                        </ul>
                                        
										<button class="btn btn-primary btn-round btn-sm ml-auto" title="Add State" data-toggle="modal" data-target="#add-state">
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
													<th>center</th>
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
    												        <a href="{{asset('admin/status_state/'.$item->ID)}}" class="redColor" data-toggle="tooltip" title="Inactive">
    												            <i class="fas fa-check-circle fa-2x " aria-hidden="true"></i>
    												        </a>
    												    @else
    												        <a href="{{asset('admin/status_state/'.$item->ID)}}" class="greenColor" data-toggle="tooltip" title="Active">
    												            <i class="fas fa-check-circle fa-2x" aria-hidden="true"></i>
    												        </a>
    												    @endif
													</td>

													
													<td>
														<a id="editModal{{ $item->ID }}"  class="text-warning mr-2 editModal" data-href="{{asset('admin/get_state/'.$item->ID)}}" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a> 
													<a href="javascript:void(0);" class="text-danger delete-modal" data-id="{{$item->ID}}" data-delete="{{asset('admin/delete_state/'.$item->ID)}}" data-toggle="tooltip" title="Delete"><i class="fas fa-trash" ></i></a>

													</td>
													
													<td>{{ $item->state_name }}</td>
                                                    <td>{{ $item->center }}</td>
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
  <div class="modal fade add-modal" id="add-state" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add State</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method='post' action="{{asset('admin/add_state')}}" enctype="multipart/form-data" id="addArticleForm">
        <!--<form method='post' enctype="multipart/form-data" id="addForm">-->
            @csrf
          <div class="row">
            <div class="col-12 col-md-12 col-lg-6 mb-3">
              <div class="form-group p-0">
                <label for="StateTitle">State</label>
                
                <input type="text" class="form-control input-full input-pill" id="StateTitle" name="StateTitle" placeholder="State Name" required maxlength="120">
                 <span id="StateNameAddError" class="text-danger textNotVisible">State name already exists</span>
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

<div class="modal fade edit-modal" id="edit-state" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit State</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form  method='post' action="{{ asset('admin/update_state') }}" enctype="multipart/form-data">
				    @csrf
					<div class="row">
						<div class="col-12 col-md-6 col-lg-6 mb-3">
							<div class="form-group p-0">
								<label for="StateTitle">State</label>
								<input type="text" class="form-control input-full input-pill" id="EditStateTitle" name="EditStateTitle" required maxlength="120">
								<input type="hidden"  id="Ustate_id" name="state_id" value="" >
								<span id="StateNameEditError" class="text-danger textNotVisible">State name already exists</span>
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
            
            $('#Ustate_id').val(data[0].ID);
            $('#EditStateTitle').val(data[0].state_name);  
            $("#edit-state").modal("show");
         }
        });
        
    });
          

    // Validation START
    $("#StateTitle").keyup(function() {
        var value = $(this).val();
        if(value.length > 0)
        {
            console.log("value : ",value);
            var href = "{{asset('admin/checkAddStateName')}}"+'/'+value;
            console.log("href : ",href);
            $.ajax({
                type: "GET",
                url: href, 
                success: function(data) {
                    console.log("reponse : ",data);
                        if(data == 'error')
                        {
                            $("#addBtn").addClass("disableButton");
                            $("#StateNameAddError").removeClass("textNotVisible");
                        }
                        else 
                        {
                            $("#addBtn").removeClass("disableButton");
                            $("#StateNameAddError").addClass("textNotVisible");
                        }
                    }
            });
            
        }
        else
        {
            $("#addBtn").addClass("disableButton");
            $("#StateNameAddError").addClass("textNotVisible");
        }
        
        
    });
    
    
    $("#EditStateTitle").keyup(function() {
        var value = $(this).val();
        if(value.length > 0)
        {
            var id = $("#Ustate_id").val();
            console.log("id : ",id);
            var href = "{{asset('admin/checkEditStateName')}}"+'/'+id+'/'+value;
            console.log("href : ",href);
            $.ajax({
                type: "GET",
                url: href, 
                success: function(data) {
                console.log("reponse : ",data);
                if(data == 'error')
                {
                    $("#updateBtn").addClass("disableButton");
                    $("#StateNameEditError").removeClass("textNotVisible");
                }
                else 
                {
                    $("#updateBtn").removeClass("disableButton");
                    $("#StateNameEditError").addClass("textNotVisible");
                }
            }
            });
            
        }
        else
        {
            console.log("no data");
            $("#updateBtn").addClass("disableButton");
            $("#StateNameEditError").addClass("textNotVisible");
        }
        
        
    });
    
    
        
    $(document).ready(function() {
        
        
        $('#add-state').on('hidden.bs.modal', function (event) {
         state.reload();
        });
        
        $('#edit-state').on('hidden.bs.modal', function (event) {
         state.reload();
        });
    });
        
   </script>


@stop