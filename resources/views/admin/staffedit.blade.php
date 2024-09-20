@include('admin.Layout.header')

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Staff Details || KSG LRS</title>
</head>

    <!--wrapper-->
    <div class="wrapper">
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">User Management</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Staff User Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col-xl-9 mx-auto">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="p-4">
                                    <div class="mb-3 text-center">
                                        <img src="{{asset('assets/images/KSG Logo (1).png')}}" width="60" alt="" />
                                    </div>
                                    <div class="text-center mb-4">
                                        <h5 class="">KSG Staff Update</h5>
                                        <p class="mb-0">Please fill the below details to edit staff details</p>
                                    </div>
                                    <div class="form-body">
                                        <form class="row g-3" action="{{ route('admin.staff.update.post', $staff->id) }}" method="POST">
                                            @csrf
                                            <div class="col-md-6">
                                                <label for="inputFirstname" class="form-label">First Name</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class='bx bxs-user'></i></span>
                                                    <input type="text" class="form-control" name="fname" id="fname" value="{{ $staff->fname }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="inputMidname" class="form-label">Middle Name</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class='bx bxs-user'></i></span>
                                                    <input type="text" class="form-control" name="mname" id="mname" value="{{ $staff->mname }}">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label for="inputSurname" class="form-label">Surname</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class='bx bxs-user'></i></span>
                                                    <input type="text" class="form-control" name="sname" id="sname" value="{{ $staff->sname }}">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Email Address</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class='bx bxs-message'></i></span>
                                                    <input type="email" class="form-control" name="email" id="email" value="{{ $staff->email }}">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label for="inputID" class="form-label">ID OR Passport No.</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class='bx bxs-id-card'></i></span>
                                                    <input type="number" class="form-control" name="iden" id="iden" value="{{ $staff->iden }}">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label for="inputNumber" class="form-label">Phone Number</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class='bx bxs-phone'></i></span>
                                                    <input type="text" class="form-control" name="phone" id="phone" value="{{ $staff->phone }}">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label for="inputDept" class="form-label">Department</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class='bx bx-detail'></i></span>
                                                    <input type="text" class="form-control" name="dept" id="dept" value="{{ $staff->dept }}">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label for="inputDes" class="form-label">Designation</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class='bx bxs-briefcase-alt-2'></i></span>
                                                    <input type="text" class="form-control" name="des" id="des" value="{{ $staff->des }}">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputDes" class="form-label">Password</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class='bx bxs-briefcase-alt-2'></i></span>
                                                    <input type="text" class="form-control" name="password" id="des" value="KSG@2024">
                                                </div>
                                            </div>
                                            <br/>
                                            <br/>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-light">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!--end row-->
            </div>
        </div>
    </div>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <!--end wrapper-->
</body>

@include('admin.Layout.footer')
