@include('staff.Layout.header')

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Reset Password || KSG LRS</title>
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
                            <li class="breadcrumb-item active" aria-current="page">Reset Password</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-light">Settings</button>
                        <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="edit-profile.php">Edit Profile</a>
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
                        <form class="row" action="{{ route('staff.pass.update.post') }}" method="POST">
                            @csrf
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="d-flex align-items-center mb-3">Update Password</h5>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <p>Current Password</p>
                                            </div>
                                            <div class="input-group" id="show_hide_password1">
                                                <input type="password" class="form-control" name="cpassword"/><a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <p>New Password</p>
                                            </div>
                                            <div class="input-group" id="show_hide_password2">
                                                <input type="password" class="form-control" name="npassword"/><a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <p>Confirm Password</p>
                                            </div>
                                            <div class="input-group" id="show_hide_password3">
                                                <input type="password" class="form-control" name="conpassword"/><a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <input type="submit" class="btn btn-light px-4" value="Update Password"/>
                                            </div>
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
    <!--end page wrapper -->
</div>
<!--end wrapper-->

@include('staff.Layout.footer')
