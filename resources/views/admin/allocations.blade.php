@include('admin.Layout.header')

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Allocations || KSG LRS</title>
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
								<li class="breadcrumb-item"><a href="/admin/dashboard"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Allocations</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-light">Download Files</button>
							<button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
                                <a class="dropdown-item" href="javascript:;">Copy</a>
								<a class="dropdown-item" href="{{ route('allocations.export') }}">Excel</a>
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
								<input type="text" class="form-control ps-5 radius-30" placeholder="Search Allocations"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
							</div>
						</div>
						<div class="table-responsive">
							<table   id="dataTable" class="table mb-0">
								<thead class="table-light">
									<tr>
										<th>Allocations#</th>
                                        <th>Status</th>
                                        <th>Staff ID</th>
                                        <th>Staff Name</th>
                                        <th>E-Mail Address</th>
                                        <th>Contact</th>
                                        <th>Dept.</th>
                                        <th>Device</th>
                                        <th>Allocation Date</th>
                                        <th>Return Date</th>
                                        <th>More Details</th>
                                        <th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<tr>
                                        @foreach ($allocations as $allocations)
                                            <tr>
                                                <td>{{ $allocations->id }}</td>
                                                <td>
                                                    @if ($allocations->status === 'Suspended')
                                                        <span class="badge bg-danger">Suspended</span>
                                                    @elseif ($allocations->status === 'Returned')
                                                        <span class="badge bg-success">Complete</span>
                                                    @elseif ($allocations->status === 'Active')
                                                        <span class="badge bg-primary">Active</span>
                                                    @endif
                                                </td>
                                                <td>{{ $allocations->iden }}</td>
                                                <td>{{ $allocations->fullname }}</td>
                                                <td>{{ $allocations->email }}</td>
                                                <td>{{ $allocations->phone }}</td>
                                                <td>{{ $allocations->dept }}</td>
                                                <td>{{ $allocations->devmodel}}: {{ $allocations->sno }}</td>
                                                <td>{{ $allocations->ADate }}</td>
                                                <td>{{ $allocations->ERD }}</td>
                                                <td>
                                                    <div class="col">
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleScrollableModal">More Details</button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleScrollableModal" tabindex="-1" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-scrollable">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Additional Details</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Device Tag Number: {{ $allocations->devtag }}</p>
                                                                        <p>Event: {{ $allocations->event }}<</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex order-actions">
                                                        <a href="javascript:;" class="ms-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Return" onclick="confirmReturn({{ $allocations->id }});"><i class='bx bx-revision'></i></a>

                                                        <form id="return-form-{{ $allocations->id }}" action="{{ route('admin.return', [$allocations->id]) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            <input type="hidden" name="RDate" value="{{ \Carbon\Carbon::now() }}"  onclick="return confirm('Do  you  wish  to  chage the allocation?')">
                                                        </form>
                                                       

                                                        <script>
                                                            function confirmReturn(id) {
                                                                if (confirm('Are you sure you want to initiate the return of this device?')) {
                                                                    document.getElementById('return-form-' + id).submit();
                                                                }
                                                            }
                                                        </script>

                                                        <a href="javascript:;" class="ms-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Suspend"><i class="fadeIn animated bx bx-message-square-x"></i></a>
                                                        <a href="{{ route ('admin.allocations.update', ['id'=> $allocations->id]) }}" class="ms-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class='bx bxs-edit'></i></a>
                                                        <a href="javascript:;" class="ms-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="confirmDelete({{ $allocations->id }});"><i class='bx bxs-trash'></i></a>
                                                        <form id="delete-form-{{ $allocations->id }}" action="{{ route('allocations.delete', $allocations->id) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>

                                                    <script>
                                                        function confirmDelete(iden) {
                                                            if (confirm('Are you sure you want to delete this device?')) {
                                                                document.getElementById('delete-form-' + iden).submit();
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
										<th>Allocations#</th>
                                        <th>Status</th>
                                        <th>Staff ID</th>
                                        <th>Staff Name</th>
                                        <th>E-Mail Address</th>
                                        <th>Contact</th>
                                        <th>Dept.</th>
                                        <th>Device</th>
                                        <th>Allocation Date</th>
                                        <th>Expected Return Date</th>
                                        <th>More Details</th>
                                        <th>Actions</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div> <!--end page wrapper -->
	</div>
	<!--end wrapper-->

</body>

@include('admin.Layout.footer')
