@include('admin.Layout.header')

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Profile Edit || KSG LRS</title>
</head>

	<!--wrapper-->
	<div class="wrapper">
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Account Management</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->

                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
                    <div class="col">
						<div class="card">
							<div class="card-body">
								<ul class="list-group">
									<li class="list-group-item active" aria-current="true"><strong>CURRENT ADMIN USER DETAILS</strong></li>
									<li class="list-group-item"><strong>Full Name: </strong> <span> {{ Auth::guard('admin')->user()->fname}} {{ Auth::guard('admin')->user()->mname}} {{ Auth::guard('admin')->user()->sname}} </span></li>
									<li class="list-group-item"><strong>E-Mail Address: </strong><span>{{ Auth::guard('admin')->user()->email}}</span></li>
									<li class="list-group-item"><strong>ID or Passport No.: </strong><span>{{ Auth::guard('admin')->user()->iden}}</span></li>
									<li class="list-group-item"><strong>Contact: </strong><span>{{ Auth::guard('admin')->user()->phone}}</span></li>
									<li class="list-group-item"><strong>Designation: </strong><span>{{ Auth::guard('admin')->user()->des}}</span></li>
									<li class="list-group-item"><strong>Department: </strong><span>{{ Auth::guard('admin')->user()->dept}}</span></li>
								</ul>
							</div>
						</div>
					</div>
                </div>
				<div class="row">
					<div class="col-sm-12">
						<div class="card">
							<div class="card-body">
								<h5 class="d-flex align-items-center mb-3">Key in new details:</h5>
                                <br>
								<div class="row mb-3">
									<div class="col-sm-3">
										<p>First Name:</p>
									</div>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="fname" value="{{ Auth::guard('admin')->user()->fname}}" />
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-sm-3">
										<p>Middle Name:</p>
									</div>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="mname" value="{{ Auth::guard('admin')->user()->mname}}" />
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-sm-3">
										<p>Surname:</p>
									</div>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="sname" value="{{ Auth::guard('admin')->user()->sname}}" />
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-sm-3">
										<p>E-Mail Address:</p>
									</div>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="email" value="{{ Auth::guard('admin')->user()->email}}>" />
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-sm-3">
										<p>ID or Passport No.:</p>
									</div>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="iden" value="{{ Auth::guard('admin')->user()->iden}}" />
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-sm-3">
										<p>Contact:</p>
									</div>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="phone" value="{{ Auth::guard('admin')->user()->phone}}" />
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-sm-3">
										<p>Designation:</p>
									</div>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="des" value="{{ Auth::guard('admin')->user()->des}}" />
									</div>
								</div>
								<div class="row mb-3">
									<div class="col-sm-3">
										<p>Department:</p>
									</div>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="dept" value="{{ Auth::guard('admin')->user()->dept}}" />
									</div>
								</div>
								<div class="row">
									<div class="col-sm-3"></div>
										<div class="col-sm-9">
											<button type="submit" class="btn btn-light px-4">Save Changes</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
            	</div>
        	</div>
    	</div>
		<!--end page wrapper -->
	</div>
	<!--end wrapper-->

</body>


@include('admin.Layout.footer')
