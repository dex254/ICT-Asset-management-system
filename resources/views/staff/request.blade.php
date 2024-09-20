@include('staff.Layout.header')

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>New Request || KSG LRS</title>

    <style>
        .custom-radio {
            position: relative;
            display: block;
            padding-left: 25px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 16px;
            user-select: none;
        }
        .custom-radio input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }
        .radiomark {
            position: absolute;
            top: 0;
            left: 0;
            height: 20px;
            width: 20px;
            background-color: #eee;
            border-radius: 50%;
        }
        .custom-radio input:checked ~ .radiomark {
            background-color: #2196F3;
        }
        .radiomark:after {
            content: "";
            position: absolute;
            display: none;
        }
        .custom-radio input:checked ~ .radiomark:after {
            display: block;
        }
        .custom-radio .radiomark:after {
            left: 7px;
            top: 7px;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: white;
        }
    </style>

</head>

<body class="bg-theme bg-theme3">
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
                                <li class="breadcrumb-item"><a href="/staff/dashboard"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Make New Request</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ms-auto">
                        <div class="btn-group">
                            <button type="button" class="btn btn-light">Settings</button>
                            <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                                <a class="dropdown-item" href="javascript:;">Another action</a>
                                <a class="dropdown-item" href="javascript:;">Something else here</a>
                                <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                            </div>
                        </div>
                    </div>
                </div>
                    <!--end breadcrumb-->
                    @if ($errors->any() || session('success'))
                <div class="alert alert-{{ $errors->any() ? 'danger' : 'success' }}" role="alert">
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @else
                        {{ session('success') }}
                    @endif
                </div>
            @endif

                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="card-title">Request Details</h5>
                        <hr/>
                            <form class="form-body mt-4" action="{{ route('staff.request.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="border border-3 p-4 rounded">
                                            <div class="mb-3">
                                                <label for="inputProductTitle" class="form-label">Name of Staff Member:</label>
                                                <input type="text" class="form-control" id="inputProductTitle" name="fullname" value="{{ Auth::guard('staff')->user()->fname}} {{ Auth::guard('staff')->user()->mname}} {{ Auth::guard('staff')->user()->sname}}" readonly />
                                            </div>
                                            <div class="mb-3">
                                                <label for="inputProductTitle" class="form-label">ID or Passport No.:</label>
                                                <input type="text" class="form-control" id="inputProductTitle" name="iden" value="{{ Auth::guard('staff')->user()->iden}}" readonly />
                                            </div>
                                            <div class="mb-3">
                                                <label for="inputProductTitle" class="form-label">E-mail Address:</label>
                                                <input type="text" class="form-control" id="inputProductTitle" name="email" value="{{ Auth::guard('staff')->user()->email}}" readonly />
                                            </div>
                                            <div class="mb-3">
                                                <label for="inputProductTitle" class="form-label">Contact:</label>
                                                <input type="text" class="form-control" id="inputProductTitle" name="phone" value="{{ Auth::guard('staff')->user()->phone}}" readonly />
                                            </div>
                                            <div class="col-md-12">
                                                <label for="inputPrice" class="form-label">Department</label>
                                                <input type="text" class="form-control" id="inputProductTitle" name="dept" value="{{ Auth::guard('staff')->user()->dept}}" readonly />
                                            </div>
                                            <br/>
                                            <hr>

                                            <div class="mb-3">
                                                <label for="inputProductTitle" class="form-label">Status:</label>
                                                <input type="text" class="form-control" id="inputProductTitle" name="status" value="Pending" readonly />
                                            </div>
                                            <div class="mb-3">
                                                <label for="deviceType" class="form-label">Choose Device Type:</label>
                                                <label class="custom-radio">Laptop
                                                    <input type="radio" name="type" value="Laptop">
                                                    <span class="radiomark"></span>
                                                </label>
                                                <label class="custom-radio">Tablet
                                                    <input type="radio" name="type" value="Tablet">
                                                    <span class="radiomark"></span>
                                                </label>
                                                <label class="custom-radio">Smartphone
                                                    <input type="radio" name="type" value="Smartphone">
                                                    <span class="radiomark"></span>
                                                </label>
                                                <label class="custom-radio">Desktop
                                                    <input type="radio" name="type" value="Desktop">
                                                    <span class="radiomark"></span>
                                                </label>
                                                <label class="custom-radio">Printer
                                                    <input type="radio" name="type" value="Printer">
                                                    <span class="radiomark"></span>
                                                </label>
                                                <label class="custom-radio">Projector
                                                    <input type="radio" name="type" value="Projector">
                                                    <span class="radiomark"></span>
                                                </label>
                                                <label class="custom-radio">Printer
                                                    <input type="radio" name="type" value="IPPhone">
                                                    <span class="radiomark"></span>
                                                </label>
                                                <label class="custom-radio">Projector
                                                    <input type="radio" name="type" value="Projector">
                                                    <span class="radiomark"></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="border border-3 p-4 rounded">
                                            <div class="row g-3">
                                                <div class="col-12">
                                                    <label for="inputProductType" class="form-label">Event:</label>
                                                    <input type="text" class="form-control" name="event" id="inputProductTitle" required>
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputVendor" class="form-label">Preffered Allocation Date:</label>
                                                    <input type="date" class="form-control" name="PAD" id="inputProductTitle" required>
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputCollection" class="form-label">Suggested Return Date:</label>
                                                    <input type="date" class="form-control" name="SRD" id="inputProductTitle" required>
                                                </div>
                                                <div class="mb-3">
                                                    <input type="hidden" class="form-control" name="fine" id="inputProductTitle">
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-light">Make Request</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!--end row-->
                            </form>
                    </div>
                </div>
            </div><!--end page wrapper -->
        </div>
    </div>
	<!--end wrapper-->
</body>

@include('staff.Layout.footer')
