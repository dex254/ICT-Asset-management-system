@include('admin.Layout.header')

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>New Allocation || KSG LRS</title>
</head>

<body class="bg-theme bg-theme8">
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
                                <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Allocate Device</li>
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
                        <h5 class="card-title">Device Allocation Details</h5>
                        <hr/>
                        <div class="border border-3 p-4 rounded">
                            <div class="mb-3" style="margin-bottom: px;">
                                <label for="inputProductTitle" class="form-label">
                                    <strong>Staff Name: </strong>{{ $devrequest->fullname }}
                                </label>
                            </div>

                            <div class="mb-3" style="margin-bottom: px;">
                                <label for="inputProductTitle" class="form-label">
                                    <strong>Staff E-mail Address: </strong>{{ $devrequest->email }}
                                </label>
                            </div>

                            <div class="mb-3" style="margin-bottom: px;">
                                <label for="inputProductTitle" class="form-label">
                                    <strong>Staff Contact: </strong>{{ $devrequest->phone }}
                                </label>
                            </div>

                            <div class="mb-3" style="margin-bottom: px;">
                                <label for="inputProductTitle" class="form-label">
                                    <strong>Department: </strong>{{ $devrequest->dept }}
                                </label>
                            </div>

                            <div class="mb-3" style="margin-bottom: px;">
                                <label for="inputProductTitle" class="form-label">
                                    <strong>Event: </strong>{{ $devrequest->event }}
                                </label>
                            </div>

                            <div class="mb-3" style="margin-bottom: px;">
                                <label for="inputProductTitle" class="form-label">
                                    <strong>Preferred Allocation Date: </strong>{{ $devrequest->PAD }}
                                </label>
                            </div>

                            <div class="mb-3" style="margin-bottom: px;">
                                <label for="inputProductTitle" class="form-label">
                                    <strong>Suggested Return Date: </strong>{{ $devrequest->SRD }}
                                </label>
                            </div>

                            <form class="form-body mt-4" action="{{ route('admin.allocate.store',$devrequest->id) }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <hr>

                                    <div class="mb-3" style="margin-bottom: px;">
                                        <label for="inputProductTitle" name="type" class="form-label"><strong>Requested Device Type:</strong> {{ $devrequest->type_formatted}}</label>
                                    </div>

                                    <div class="mb-3" style="margin-bottom: px;">
                                        <label for="inputProductTitle" class="form-label">Choose device by serial:</label>
                                        <select  class="form-select" id="deviceSerial" name="sno"  required>
                                            <option value="">Select Serial  Number</option>
                                            @foreach($devicesByCat as $category => $devices)
                                                <optgroup label="{{ $category }}">
                                                    @foreach($devices as $devices)
                                                        <option value="{{ $devices->sno }}">{{ $devices->sno }}</option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="mb-3" style="margin-bottom: px;">
                                        <label for="inputProductTitle" class="form-label">Device Model:</label>
                                        <select  class="form-select" id="deviceModel" name="devmodel"  required>
                                            <option value="">Select Device Model</option>
                                        </select>
                                    </div>
                                    <br/>
                                    <div class="mb-3" style="margin-bottom: px;">
                                        <label for="inputProductTitle" class="form-label">Device Tag Number:</label>
                                        <select  class="form-select" id="deviceTag" name="devtag"  required>
                                            <option value="">Select Tag Number</option>
                                        </select>
                                    </div>

                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            $('#deviceSerial').change(function() {
                                                var serialNumber = $(this).val();

                                                if(serialNumber) {
                                                    $.ajax({
                                                        url: '/admin/get-device-info/' + serialNumber,
                                                        type: 'GET',
                                                        dataType: 'json',
                                                        success: function(data) {
                                                            if(data) {
                                                                $('#deviceModel').empty();
                                                                $('#deviceTag').empty();

                                                                $('#deviceModel').append('<option value="'+ data.model +'">' + data.model + '</option>');
                                                                $('#deviceTag').append('<option value="'+ data.tag +'">' + data.tag + '</option>');
                                                            }
                                                        }
                                                    });
                                                } else {
                                                    $('#deviceModel').empty();
                                                    $('#deviceTag').empty();
                                                }
                                            });
                                        });
                                    </script>


                                    <br/>
                                    <hr>

                                    <div class="mb-3">
                                        <label for="inputProductTitle" class="form-label">Status:</label>
                                        <input type="text" class="form-control" id="inputProductTitle" name="status" value="Active" readonly />
                                    </div>

                                    <div class="mb-3" style="margin-bottom: px;">
                                        <label for="inputVendor" class="form-label">Allocation Date:</label>
                                        <input type="datetime" class="form-control" name="ADate" id="currentDateTime" value="" readonly />

                                            <script>
                                                function getCurrentDateTime() {
                                                    const now = new Date();
                                                    const year = now.getFullYear();
                                                    const month = String(now.getMonth() + 1).padStart(2, '0'); // Months are 0-11
                                                    const day = String(now.getDate()).padStart(2, '0');
                                                    const hours = String(now.getHours()).padStart(2, '0');
                                                    const minutes = String(now.getMinutes()).padStart(2, '0');
                                                    const seconds = String(now.getSeconds()).padStart(2, '0');

                                                    return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
                                                }

                                                document.getElementById('currentDateTime').value = getCurrentDateTime();
                                            </script>

                                    </div>

                                    <div class="mb-3" style="margin-bottom: px;">
                                        <label for="inputCollection" class="form-label">Expected Return Date:</label>
                                        <input type="date" class="form-control" name="ERD" id="inputProductTitle" required>
                                    </div>

                                    <br/>

                                    <div class="mb-3" style="margin-bottom: px;">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-light">Assign Device</button>
                                        </div>
                                    </div>
                                </div> <!--end row-->
                            </form>
                        <div>
                    </div>
                </div>
            </div>
        </div> <!--end page wrapper -->
    </div>
	<!--end wrapper-->

</body>


@include('admin.Layout.footer')
