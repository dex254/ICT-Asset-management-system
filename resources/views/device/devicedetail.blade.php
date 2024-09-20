@include('staff.Layout.header')
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
                            <li class="breadcrumb-item active" aria-current="page">Device Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="row g-0">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="{{ asset('uploads/devices/' . $devices->image_name1) }}" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('uploads/devices/' . $devices->image_name2) }}" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('uploads/devices/' . $devices->image_name3) }}" class="d-block w-100" alt="...">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">	<span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title">{{ $devices->model }}</h4>

                            <p class="card-text fs-6">{{ $devices->desc }}</p>

                            <dl class="row">
                                <dt class="col-sm-4">Tag#</dt>
                                <dd class="col-sm-9">{{ $devices->tag }}</dd>

                                <dt class="col-sm-4">Category</dt>
                                <dd class="col-sm-9">{{ $devices->category }}</dd>

                                <dt class="col-sm-4">Status</dt>
                                <dd class="col-sm-9">{{ $devices->status }}</dd>

                                <dt class="col-sm-4">Condition</dt>
                                <dd class="col-sm-9">{{ $devices->con }} </dd>
                            </dl>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!--end page wrapper -->
</div>
<!--end wrapper -->
@include('staff.Layout.footer')