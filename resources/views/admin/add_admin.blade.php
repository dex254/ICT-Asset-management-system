@include('admin.Layout.header')

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add New Admin || KSG LRS</title>
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
                            <li class="breadcrumb-item active" aria-current="page">Add New Admin User</li>
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
                                    <h5 class="">KSG Admin</h5>
                                    <p class="mb-0">Please fill the below details to create new admin account</p>
                                </div>
                                <div class="form-body">
                                    <form class="row g-3" action="{{ route('admin.add.store') }}" method="POST">
                                        @csrf
                                        <div class="col-md-6">
                                            <label for="inputFirstname" class="form-label">First Name</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class='bx bxs-user'></i></span>
                                                <input type="text" class="form-control" name="fname" id="fname" placeholder="James">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="inputMidname" class="form-label">Middle Name</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class='bx bxs-user'></i></span>
                                                <input type="text" class="form-control" name="mname" id="mname" placeholder="Gabriel">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="inputSurname" class="form-label">Surname</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class='bx bxs-user'></i></span>
                                                <input type="text" class="form-control" name="sname" id="sname" placeholder="Andrews">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label">Email Address</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class='bx bxs-message'></i></span>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="example@user.com">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="inputID" class="form-label">ID OR Passport No.</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class='bx bxs-id-card'></i></span>
                                                <input type="number" class="form-control" name="iden" id="iden" placeholder="1234567">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="inputNumber" class="form-label">Phone Number</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class='bx bxs-phone'></i></span>
                                                <input type="text" class="form-control" name="phone" id="phone" placeholder="(+254)xxx xxx xxx">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="inputDept" class="form-label">Department</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class='bx bx-detail'></i></span>
                                                <input type="text" class="form-control" name="dept" id="dept" placeholder="Human Resources">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="inputDes" class="form-label">Designation</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class='bx bxs-briefcase-alt-2'></i></span>
                                                <input type="text" class="form-control" name="des" id="des" placeholder="Assistant Supervisor">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="inputPassword" class="form-label">Password</label>
                                            <div class="input-group" id="show_hide_password1">
                                                <span class="input-group-text"><i class='bx bxs-lock-open'></i></span>
                                                <input type="password" class="form-control border-end-0" name="password" id="password" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="inputCPassword" class="form-label">Confirm Password</label>
                                            <div class="input-group" id="show_hide_password2">
                                                <span class="input-group-text"><i class='bx bxs-lock'></i></span>
                                                <input type="password" class="form-control border-end-0" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                            </div>
                                        </div>

                                        <br/>

                                        <div class="col-12">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                                <label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms & Conditions</label>
                                            </div>
                                        </div>

                                        <br/>

                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-light">Add</button>
                                            </div>
                                        </div>

                                        <br/>

                                        <div class="col-12 text-center">
                                            <p class="mb-0">Does admin already exist? <a href="/AdminLogin">Sign in here.</a></p>
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
<!--end wrapper-->

</body>

@include('admin.Layout.footer')


