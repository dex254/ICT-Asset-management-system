@include('admin.Layout.header')

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admins || KSG Device Request System</title>
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
                            <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Admins</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-light">Outputs</button>
                        <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
                            <a class="dropdown-item" href="javascript:;">Copy</a>
                            <a class="dropdown-item" href="javascript:;">Excel</a>
                            <a class="dropdown-item" href="javascript:;">PDF</a>
                            <a class="dropdown-item" href="javascript:;">Print</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:;">Separated link</a>
                        </div>
                    </div>
                </div>
            </div> <!--end breadcrumb-->

            <div class="card">
                <div class="card-body">
                    <div class="d-lg-flex align-items-center mb-4 gap-3">
                        <div class="position-relative">
                            <input type="text" class="form-control ps-5 radius-30" placeholder="Search Admin">
                            <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                        </div>
                        <div class="ms-auto">
                            <a href="/admin/add_admin" class="btn btn-light radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New Admin</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table   id="dataTable" class="table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Admin#</th>
                                    <th>Full Name</th>
                                    <th>E-Mail</th>
                                    <th>Contact</th>
                                    <th>Department</th>
                                    <th>Designation</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admin as $admin)
                                <tr>
                                    <td>{{ $admin->iden }}</td>
                                    <td>{{ $admin->fname }} {{ $admin->mname }} {{ $admin->sname }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->phone }}</td>
                                    <td>{{ $admin->dept }}</td>
                                    <td>{{ $admin->des }}</td>
                                    <td>
                                        <div class="d-flex order-actions">
                                            <a href="{{ route ('admin.profile.edit', ['id'=> $admin->id]) }}" class="ms-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Update"><i class='bx bxs-edit'></i></a>
                                            <a href="javascript:;" class="ms-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="confirmDelete({{ $admin->id }});"><i class='bx bxs-trash'></i></a>
                                            <form id="delete-form-{{ $admin->id }}" action="{{ route('admin.delete', $admin->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                        <script>
                                            function confirmDelete(iden) {
                                                if (confirm('Are you sure you want to delete this user data?')) {
                                                    document.getElementById('delete-form-' + iden).submit();
                                                }
                                            }
                                        </script>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Admin#</th>
                                    <th>Full Name</th>
                                    <th>E-Mail</th>
                                    <th>Contact</th>
                                    <th>Department</th>
                                    <th>Designation</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!--end page wrapper -->
</div>
<!--end wrapper-->

@include('admin.Layout.footer')
