@extends('admin/layout')
@section('content')

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
                                                <a href="javascript:void(0);">Enquiries</a>
                                            </li>
                                        </ul>
										<!--<button class="btn btn-primary btn-round btn-sm ml-auto">
											<i class="fa fa-plus"></i>
										</button>-->
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="display border-top border-bottom table datatable table-striped table-hover table-sm">
											<thead>
											   
												<tr>
													<!--<th>Id</th>-->
													<th>Sr. No.</th>
                                                    <!--<th>Name / Company Name</th>-->
                                                    <th>Name</th>
                                                    <th>Email Id</th>
                                                    <th>Mobile Number</th>
                                                    <!--<th>Designation</th>-->
                                                    <th>Message</th>
                                                    <th>Attachment</th>
                                                    <!--<th>Action</th>-->
    												<th>Created On</th>
                                                    	    												
												</tr>
											</thead>
											<tbody>
											     @foreach($datas as $key=>$item)
											     
												@php
												    $date=date_create($item->created_at);
												    $created_at = date_format($date,"d M Y H:i");
												@endphp
											     
												<tr>
                                                    
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item->company_name }}</td>
                                                    <td>{{ $item->email_id }}</td>
                                                    <td>{{ $item->mobile_number }}</td>
                                                    <!--<td>{{ $item->designation }}</td>-->
                                                    <td>{{ $item->message }}</td>
             <!--                                       <td>-->
														<!--<a href="{{ asset('admin/enquiriessDelete/'.$item->enquiry_id ) }}" class="text-danger" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>-->
													<!--    <a href="javascript:void(0);" class="text-danger DeleteModal" data-enqdel="{{asset('admin/enquiriessDelete/'.$item->enquiry_id)}}" data-toggle="tooltip" title="Delete"><i class="fas fa-trash" ></i></a>-->
													
													<!--</td>-->
													<td>
													    <a href="{{asset('assets/images/contactus-attachment/'.$item->attachment)}}" target="_blank" download ><i class="fa fa-download" aria-hidden="true"></i></a>
													</td>
													
													<td>{{ $created_at }}</td>
													
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
<script>
    
    //  DeleteModal  start
    
    $( ".DeleteModal" ).click(function() {
        var href = $(this).data('enqdel');
        // console.log("href : ",href);
        $("#deleteLink").attr("href", href);
      $("#DeleteModal").modal("show");
    });
    
    //  DeleteModal  end

</script>

@stop