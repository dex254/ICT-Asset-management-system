@include('staff.Layout.header')

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Request Management || KSG LRS</title>
</head>

	<!--wrapper-->
	<div class="wrapper">
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Request Management</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="/a/dashboard"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page"> My Requests</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-light">Download  Requestss</button>
							<button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
                                <a class="dropdown-item" href="javascript:;">Copy</a>
								<a class="dropdown-item" href="">Excel</a>
								<a class="dropdown-item" href="javascript:;">PDF</a>
                                <a class="dropdown-item" href="javascript:;">Print</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="card">
					<div class="card-body">
						<div class="d-lg-flex align-items-center mb-4 gap-3">
							<div class="position-relative">
								<input type="text" class="form-control ps-5 radius-30" placeholder="Search My Requests"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
							</div>
						  	<div class="ms-auto"><a href="/staff/request" class="btn btn-light radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>New Request</a></div>
						</div>
						<div class="table-responsive">
							<table class="table mb-0">
								<thead class="table-light">
									<tr>
                                        <th>SNo.</th>
										<th>Request#</th>
                                        <th>Status</th>
										<th>Devices</th>
                                        <th>Event</th>
										<th>Preferred Allocation Date</th>
                                        <th>Suggested Return Date</th>
										<th>View Details</th>
                                        <th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<tr>
                                        @foreach ($devrequest as $index => $devrequest)
                                            <tr>

                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $devrequest->id }}</td>
                                                <td>
                                                    @if ($devrequest->status === 'Pending')
                                                        <span class="badge bg-dark">Pending</span>
                                                    @elseif ($devrequest->status === 'Assigned')
                                                        <span class="badge bg-info text-dark">Assigned</span>
                                                    @elseif ($devrequest->status === 'Declined')
                                                        <span class="badge bg-danger">Declined</span>
                                                    @elseif ($devrequest->status === 'Cancelled')
                                                        <span class="badge bg-warning text-dark">Cancelled</span>
                                                    @elseif ($devrequest->status === 'Allocated')
                                                        <span class="badge bg-primary">Allocated</span>
                                                    @elseif ($devrequest->status === 'Completed')
                                                        <span class="badge bg-success">Completed</span>
                                                    @endif
                                                </td>
                                                <td>{{ $devrequest->type_formatted }}</td>
                                                <td>{{ $devrequest->event }}</td>
                                                <td>{{ $devrequest->PAD }}</td>
                                                <td>{{ $devrequest->SRD }}</td>
                                                <td>
                                                    <div class="col">
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleLargeModal">View Details</button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Modal title</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur.</div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex order-actions">
                                                        <a href="javascript:;" class="ms-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Cancel Request" onclick="confirmCancel({{ $devrequest->id }});"><i class="fadeIn animated bx bx-message-square-x"></i></a>

                                                        <form  id="cancel-form-{{ $devrequest->id }}" action="{{ route('request.cancel', ['id'=> $devrequest->id]) }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    </div>

                                                    <script>
                                                        function confirmCancel(id) {
                                                            if (confirm('Are you sure you want to cancel this request?')) {
                                                                document.getElementById('cancel-form-' + id).submit();
                                                            }
                                                        }
                                                    </script>
                                                </td>
                                            </tr>
                                        @endforeach
									</tr>
								</tbody>
								<tfoot>
                                    <tr>
										<th>SNo.</th>
                                        <th>Request#</th>
                                        <th>Status</th>
										<th>Devices</th>
                                        <th>Event</th>
										<th>Preferred Allocation Date</th>
                                        <th>Suggested Return Date</th>
										<th>View Details</th>
                                        <th>Actions</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end page wrapper -->
	</div>
	<!--end wrapper-->

</body>

@include('staff.Layout.footer')
