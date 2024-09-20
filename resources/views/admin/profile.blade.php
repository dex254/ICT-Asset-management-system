@include('admin.Layout.header')

	<!--wrapper-->
	<div class="wrapper">
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Admin User Profile</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">User Profile </li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-light">Settings</button>
							<button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">
                                <span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="/admin/profile/edit">Edit Profile</a>
								<a class="dropdown-item" href="javascript:;"></a>
								<a class="dropdown-item" href="reset-password.php">Reset Password</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="index.php">User Activity</a>
							</div>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<div class="d-flex flex-column align-items-center text-center">
											<img src="assets/images/avatars/avatar-2.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
											<div class="mt-3">
												<h4> {{ Auth::guard('admin')->user()->sname}}, {{ Auth::guard('admin')->user()->fname}} {{ Auth::guard('admin')->user()->mname}} </h4>
												<p class="mb-1"> {{ Auth::guard('admin')->user()->email}} </p>
												<p class="mb-1"> {{ Auth::guard('admin')->user()->phone}} </p>
											</div>
										</div>
										<hr class="my-4" />
									</div>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="card">
									<div class="card-body">
                                        <h5 class="d-flex align-items-center mb-3">User Details</h5>
                                        <br>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">First Name</h6>
											</div>
											<div class="col-sm-9">
												<input type="text" class="form-control" value="{{ Auth::guard('admin')->user()->fname}}" readonly />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Middle Name</h6>
											</div>
											<div class="col-sm-9">
												<input type="text" class="form-control" value="{{ Auth::guard('admin')->user()->mname}}" readonly />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Surname</h6>
											</div>
											<div class="col-sm-9">
												<input type="text" class="form-control" value="{{ Auth::guard('admin')->user()->sname}}" readonly />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">E-Mail</h6>
											</div>
											<div class="col-sm-9">
												<input type="text" class="form-control" value="{{ Auth::guard('admin')->user()->email}}" readonly />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">ID or Passport No.</h6>
											</div>
											<div class="col-sm-9">
												<input type="text" class="form-control" value="{{ Auth::guard('admin')->user()->iden}}" readonly />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Phone Contact</h6>
											</div>
											<div class="col-sm-9">
												<input type="text" class="form-control" value="{{ Auth::guard('admin')->user()->phone}}"; " readonly />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Designation</h6>
											</div>
											<div class="col-sm-9">
												<input type="text" class="form-control" value="{{ Auth::guard('admin')->user()->des}}" readonly />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Department</h6>
											</div>
											<div class="col-sm-9">
												<input type="text" class="form-control" value="{{ Auth::guard('admin')->user()->dept}}" readonly />
											</div>
											<form action="{{ route('admin.uadminupdate') }}" method="POST">
												@csrf
												
												<div class="mb-3">
												  <label for="password" class="form-label">Crrent password Password</label>
												  <input type="password" class="form-control" id="current_password" name="current_password">
												  @error('current_password')
												  <div class="text-danger">{{ $message }}</div>
											  @enderror
											  </div>
			  
										
												<div class="mb-3">
													<label for="password" class="form-label">New Password</label>
													<input type="password" class="form-control" id="password" name="password">
													@error('password')
														<div class="text-danger">{{ $message }}</div>
													@enderror
												</div>
										
												<div class="mb-3">
													<label for="password_confirmation" class="form-label">Confirm New Password</label>
													<input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
												</div>
										
												<button type="submit" class="btn btn-primary">Change Password</button>
											</form>
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

@include('admin.Layout.footer')
