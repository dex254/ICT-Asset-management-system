@include('staff.Layout.header')

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Device Management || KSG LRS</title>
</head>

	<!--wrapper-->
	<div class="wrapper">
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Device Management</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="/a/dashboard"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page"> My Returned Devices </li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-light">Outputs</button>
							<button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
                                <a class="dropdown-item" href="javascript:;">Copy</a>
								<a class="dropdown-item" href="javascript:;">Excel</a>
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
                                    <input type="text" class="form-control ps-5 radius-30" placeholder="Search Returned Devices"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Device#</th>
                                            <th>Device Status</th>
                                            <th>Tag#</th>
                                            <th>Device Model</th>
                                            <th>Description</th>
                                            <th>Category</th>
                                            <th>Condtion</th>
                                            <th>Event</th>
                                            <th>Allocation Date</th>
                                            <th>Return Date</th>
                                            <th>View Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($devices as $index => $devices)
                                                <tr>

                                                    <td>{{ $devices->sno }}</td>
                                                    <td>
                                                        @if ($devices->status === 'Available')
                                                            <span class="badge bg-success">Available</span>
                                                        @elseif ($devices->status === 'Unavailable')
                                                            <span class="badge bg-danger">Unavailable</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $devices->tag }}</td>
                                                    <td>{{ $devices->model }}</td>
                                                    <td>{{ $devices->desc }}</td>
                                                    <td>
                                                        @if ($devices->category === 'Desktop')
                                                            <div class="badge rounded-pill bg-light p-2 text-uppercase px-3"><i class='bx bxs-circle align-middle me-1'></i>Desktop</div>
                                                        @elseif ($devices->category === 'Laptop')
                                                            <div class="badge rounded-pill bg-light p-2 text-uppercase px-3"><i class='bx bxs-circle align-middle me-1'></i>Laptop</div>
                                                        @elseif ($devices->category === 'Printer')
                                                            <div class="badge rounded-pill bg-light p-2 text-uppercase px-3"><i class='bx bxs-circle align-middle me-1'></i>Printer</div>
                                                        @elseif ($devices->category === 'IPPhone')
                                                            <div class="badge rounded-pill bg-light p-2 text-uppercase px-3"><i class='bx bxs-circle align-middle me-1'></i>IP-Phone</div>
                                                        @elseif ($devices->category === 'Smartphone')
                                                            <div class="badge rounded-pill bg-light p-2 text-uppercase px-3"><i class='bx bxs-circle align-middle me-1'></i>Smart Phone</div>
                                                        @elseif ($devices->category === 'Tablet')
                                                            <div class="badge rounded-pill bg-light p-2 text-uppercase px-3"><i class='bx bxs-circle align-middle me-1'></i>Tablet</div>
                                                        @elseif ($devices->category === 'Projector')
                                                            <div class="badge rounded-pill bg-light p-2 text-uppercase px-3"><i class='bx bxs-circle align-middle me-1'></i>Projector</div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($devices->con === 'VOld')
                                                            <span class="badge bg-dark">Very Old</span>
                                                        @elseif ($devices->con === 'Fair')
                                                            <span class="badge bg-info text-dark">Fair</span>
                                                        @elseif ($devices->con === 'New')
                                                            <span class="badge bg-secondary">New</span>
                                                        @elseif ($devices->con === 'Good')
                                                            <span class="badge bg-warning text-dark">Good</span>
                                                        @elseif ($devices->con === 'Old')
                                                            <span class="badge bg-light text-white">Old</span>
                                                        @elseif ($devices->con === 'BNew')
                                                            <span class="badge bg-primary">Brand New</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $devices->event }}</td>
                                                    <td>{{ $devices->ADate }}</td>
                                                    <td>{{ $devices->RDate }}</td>
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
                                            <th>Device#</th>
                                            <th>Device Status</th>
                                            <th>Tag#</th>
                                            <th>Device Model</th>
                                            <th>Description</th>
                                            <th>Category</th>
                                            <th>Condtion</th>
                                            <th>Event</th>
                                            <th>Allocation Date</th>
                                            <th>Return Date</th>
                                            <th>View Details</th>
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
