@include('staff.Layout.header')

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Feedback Management || KSG LRS</title>
</head>

	<!--wrapper-->
	<div class="wrapper">
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Feedback Management</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="/a/dashboard"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page"> My Feedback </li>
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
                                    <input type="text" class="form-control ps-5 radius-30" placeholder="Search My Feedback"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>SNo.</th>
                                            <th>Feedback#</th>
                                            <th>Date</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                            <th>Reply Date</th>
                                            <th>Reply</th>
                                            <th>Admin Name</th>
                                            <th>Admin Phone Number</th>
                                            <th>Admin Email Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($feedback as $index => $feedback)
                                                <tr>

                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $feedback->id }}</td>
                                                    <td>{{ $feedback->date }}</td>
                                                    <td>{{ $feedback->subject }}</td>
                                                    <td>{{ $feedback->message }}</td>
                                                    <td>{{ $feedback->replydate }}</td>
                                                    <td>{{ $feedback->reply }}</td>
                                                    <td>{{ $feedback->adminname }}</td>
                                                    <td>{{ $feedback->adminphone }}</td>
                                                    <td>{{ $feedback->adminemail }}</td>
                                                </tr>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SNo.</th>
                                            <th>Feedback#</th>
                                            <th>Date</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                            <th>Reply Date</th>
                                            <th>Reply</th>
                                            <th>Admin Name</th>
                                            <th>Admin Phone Number</th>
                                            <th>Admin Email Address</th>
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
