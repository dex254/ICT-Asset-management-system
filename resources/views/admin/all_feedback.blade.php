@include('admin.Layout.header')

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="assets/images/KSG Logo (1).png" type="image/png" />
	<title>My Feedback || KSG LRS</title>
</head>


<!--wrapper-->
<div class="wrapper">
    <!--start page wrapper -->
    <div class="page-wrapper">
                <div class="page-content">
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Feedback</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">My feedback</li>
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

                    <div class="card">
                        <div class="card-body">
                            <div class="d-lg-flex align-items-center mb-4 gap-3">
                                <div class="position-relative">
                                    <input type="text" class="form-control ps-5 radius-30" placeholder="Search Feedback"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table   id="dataTable" class="table mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Feedback#</th>
                                            <th>ID or Passport NO.</th>
                                            <th>Staff Name</th>
                                            <th>Staff Contact</th>
                                            <th>Staff E-Mail</th>
                                            <th>Date</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                            <th>Reply</th>
                                            <th>Reply Date</th>
                                            <th>Admin Name</th>
                                            <th>Admin Contact</th>
                                            <th>Admin E-mail</th>
                                            <th>Actions</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($feedback as $feedback)
                                                <tr>
                                                    <td>{{ $feedback->id }}</td>
                                                    <td>{{ $feedback->staffiden }}</td>
                                                    <td>{{ $feedback->staffname }}</td>
                                                    <td>{{ $feedback->staffphone}}</td>
                                                    <td>{{ $feedback->staffemail }}</td>
                                                    <td>{{ $feedback->date }}</td>
                                                    <td>{{ $feedback->subject }}</td>
                                                    <td>{{ $feedback->message }}</td>
                                                    <td>{{ $feedback->reply }}</td>
                                                    <td>{{ $feedback->replydate }}</td>
                                                    <td>{{ $feedback->adminname }}</td>
                                                    <td>{{ $feedback->adminphone }}</td>
                                                    <td>{{ $feedback->adminemail }}</td>
                                                    <td>
                                                        <div class="d-flex order-actions">
                                                            <a href="{{ route ('admin.reply.update', ['id'=> $feedback->id]) }}" class="ms-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Reply"><i class='bx bx-reply'></i></a>
                                                            <a href="javascript:;" class="ms-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="confirmDelete({{ $feedback->id }});"><i class='bx bxs-trash'></i></a>
                                                            <form id="delete-form-{{ $feedback->id }}" action="{{ route('feedback.delete', $feedback->id) }}" method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </div>

                                                        <script>
                                                        function confirmDelete(iden) {
                                                            if (confirm('Are you sure you want to delete this feedback message?')) {
                                                                document.getElementById('delete-form-' + iden).submit();
                                                            }
                                                        }
                                                        </script>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Feedback#</th>
                                            <th>ID or Passport NO.</th>
                                            <th>Staff Name</th>
                                            <th>Staff Contact</th>
                                            <th>Staff E-Mail</th>
                                            <th>Date</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                            <th>Reply</th>
                                            <th>Reply Date</th>
                                            <th>Admin Name</th>
                                            <th>Admin Contact</th>
                                            <th>Admin E-mail</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
        </div>
            <!--end page wrapper -->

</body>

@include('admin.Layout.footer')
