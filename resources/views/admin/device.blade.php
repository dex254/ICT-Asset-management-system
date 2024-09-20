@include('admin.Layout.header')

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>New Device || KSG LRS</title>
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
								<li class="breadcrumb-item"><a href="/admin/dashboard"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add New Device</li>
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
				  	<div class="card-body p-4">
					  	<h5 class="card-title">Add New Device</h5>
					  	<hr/>
                       	<div class="form-body mt-4">
					    	<form class="row" action="{{ route('device.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
						   		<div class="col-lg-8">
                           			<div class="border border-3 p-4 rounded">
										<div class="mb-3">
											<label for="inputProductTitle" class="form-label">Device Model</label>
											<input type="text" class="form-control" name="model" id="inputProductTitle" placeholder="Enter device model">
							  			</div>
							  			<div class="mb-3">
											<label for="inputProductDescription" class="form-label">Description</label>
											<textarea class="form-control" name="desc" id="inputProductDescription" rows="3" placeholder="Colour, Markings"></textarea>
							  			</div>
							  			<div class="mb-3">
											<label for="inputDevImg" class="form-label">Device Front:</label>
											<input id="images" type="file" class="form-control" name="images[1]" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
							  			</div>
                                          <div class="mb-3">
											<label for="inputDevImg" class="form-label">Device Back:</label>
											<input id="images" type="file" class="form-control" name="images[2]" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
							  			</div>
                                          <div class="mb-3">
											<label for="inputDevImg" class="form-label">Device Lateral:</label>
											<input id="images" type="file" class="form-control" name="images[3]" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
							  			</div>
                            		</div>
						   		</div>
						   		<div class="col-lg-4">
									<div class="border border-3 p-4 rounded">
                              			<div class="row g-3">
											<div class="col-12">
												<label for="inputPrice" class="form-label">Serial Number</label>
												<input type="text" class="form-control" name = "sno" id="inputPrice" placeholder="CK6822654">
								  			</div>
                                              <div class="col-12">
												<label for="inputPrice" class="form-label">Tag Number</label>
												<input type="text" class="form-control" name = "tag" id="inputPrice" placeholder= "814891">
								  			</div>
								  			<div class="col-12">
												<label for="inputProductType" class="form-label">Category</label>
												<select class="form-select" name="category" id="inputProductType">
													<option></option>
													<option value="Desktop">Desktop</option>
													<option value="Laptop">Laptop</option>
													<option value="Printer">Printer</option>
													<option value="Projector">Projector</option>
                                                    <option value="Smartphone">Smart Phone</option>
													<option value="Tablet">Tablet</option>
                                                    <option value="IPPhone">IP-Phone</option>
									  			</select>
								  			</div>
								  			<div class="col-12">
												<label for="inputVendor" class="form-label">Status</label>
												<select class="form-select" name="status" id="inputVendor">
													<option></option>
													<option value="Available">Available</option>
													<option value="Unavailable">Unavailable</option>
									  			</select>
								  			</div>
								  			<div class="col-12">
												<label for="inputCollection" class="form-label">Condition</label>
												<select class="form-select" name="con" id="inputCollection">
													<option></option>
													<option value="BNew">Brand New</option>
													<option value="New">New</option>
													<option value="Good">Good</option>
													<option value="Fair">Fair</option>
													<option value="Old">Old</option>
													<option value="VOld">Very Old</option>
									  			</select>
								  			</div>
								  			<div class="col-12">
									  			<div class="d-grid">
                                         			<button type="submit" class="btn btn-light">Add Device</button>
									  			</div>
								  			</div>
							  			</div>
						  			</div>
						  		</div>
					   		</form><!--end row-->
						</div>
				  	</div>
			  	</div>
			</div>
		</div> <!--end page wrapper -->
	</div>
	<!--end wrapper-->

</body>


@include('admin.Layout.footer')
