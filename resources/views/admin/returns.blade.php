@include('admin.Layout.header')

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Returns || KSG LRS</title>
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
								<li class="breadcrumb-item active" aria-current="page">Returns</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-light">Download Returns</button>
							<button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
                                <a class="dropdown-item" href="javascript:;">Copy</a>
								<a class="dropdown-item" href="{{ route('devreturns.export') }}">Excel</a>
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
								<input type="text" class="form-control ps-5 radius-30" placeholder="Search Returns"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
							</div>
						</div>
						<div class="table-responsive">
							<table id="dataTable" class="table mb-0">
								<thead class="table-light">
									<tr>
										<th>Return#</th>
                                        <th>Staff ID</th>
                                        <th>Staff Name</th>
                                        <th>E-Mail Address</th>
                                        <th>Contact</th>
                                        <th>Department</th>
                                        <th>Device</th>
                                        <th>Allocation Date</th>
                                        <th>Return Date</th>
                                        <th>More Details</th>
									</tr>
								</thead>
								<tbody>
									<tr>
                                        @foreach ($devreturn as $devreturns)
                                            <tr>
                                                <td>{{ $devreturns->id }}</td>
                                                <td>{{ $devreturns->iden }}</td>
                                                <td>{{ $devreturns->fullname }}</td>
                                                <td>{{ $devreturns->email }}</td>
                                                <td>{{ $devreturns->phone }}</td>
                                                <td>{{ $devreturns->dept }}</td>
                                                <td>{{ $devreturns->devmodel}}: {{ $devreturns->sno }}</td>
                                                <td>{{ $devreturns->ADate }}</td>
                                                <td>{{ $devreturns->RDate }}</td>
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
                                                                        <p>Device Tag Number: {{ $devreturns->devtag }}</p>
                                                                        <p>Event: {{ $devreturns->event }}<</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
									</tr>
								</tbody>
								<tfoot>
                                    <tr>
										<th>Return#</th>
                                        <th>Staff ID</th>
                                        <th>Staff Name</th>
                                        <th>E-Mail Address</th>
                                        <th>Contact</th>
                                        <th>Department</th>
                                        <th>Device</th>
                                        <th>Allocation Date</th>
                                        <th>Return Date</th>
                                        <th>More Details</th>
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
