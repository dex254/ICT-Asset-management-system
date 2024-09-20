@include('admin.Layout.header')

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Devices || KSG LRS</title>
</head>

    <!--wrapper-->
	<div class="wrapper">
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<div class="row align-items-center">
									<div class="col-lg-9 col-xl-10">
										<form class="float-lg-end">
											<div class="row row-cols-lg-auto g-2">
												<div class="col-12">
													<div class="position-relative">
														<input type="text" class="form-control ps-5" placeholder="Search Device..."> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
													</div>
												</div>
												<div class="col-12">
													<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
														<button type="button" class="btn btn-light">Sort By</button>
														<div class="btn-group" role="group">
														    <button id="btnGroupDrop1" type="button" class="btn btn-light dropdown-toggle dropdown-toggle-nocaret px-1" data-bs-toggle="dropdown" aria-expanded="false">
															    <i class='bx bx-chevron-down'></i>
														    </button>
														    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                                <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                                <li><a class="dropdown-item" href="#">Dropdown link</a></li>
														    </ul>
														</div>
													</div>
												</div>
												<div class="col-12">
													<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
														<button type="button" class="btn btn-light">Collection Type</button>
														<div class="btn-group" role="group">
														    <button id="btnGroupDrop1" type="button" class="btn btn-light dropdown-toggle dropdown-toggle-nocaret px-1" data-bs-toggle="dropdown" aria-expanded="false">
															    <i class='bx bxs-category'></i>
														    </button>
														    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                                <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                                                                <li><a class="dropdown-item" href="#">Dropdown link</a></li>
														    </ul>
														</div>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div   id="dataTable" class="row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-4">
                    @foreach($devices as $devices)
                        <div class="col">
                            <div class="card">
                                <img src="{{ asset('uploads/devices/' . $devices->image_name1) }}" class="card-img-top" alt="..." width="300" height="350">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $devices->model }}</h5>
                                    <p class="card-text">{{ $devices->desc }}</p>
                                    <a href="{{ route ('admin.eachdev', ['id'=> $devices->id]) }}" class="btn btn-light">Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        <div>
    </div> <!--end page wrapper -->
</div> <!--end wrapper -->

</body>
<br/>
<br/>
<br/>
<br/>
<br/>

@include('admin.Layout.footer')
