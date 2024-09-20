@include('staff.Layout.header')
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
                                    <form id="searchForm" class="float-lg-end">
                                        <div class="row row-cols-lg-auto g-2">
                                            <div class="col-12">
                                                <div class="position-relative">
                                                    <input type="text" id="searchInput" name="search" class="form-control ps-5" placeholder="Search Device...">
                                                    <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                                    <button type="button" class="btn btn-light">Sort By</button>
                                                    <div class="btn-group" role="group">
                                                        <button id="btnSortDrop" type="button" class="btn btn-light dropdown-toggle dropdown-toggle-nocaret px-1" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class='bx bx-chevron-down'></i>
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="btnSortDrop">
                                                            <li><a class="dropdown-item" href="#" data-status="Available">Available</a></li>
                                                            <li><a class="dropdown-item" href="#" data-status="Unavailable">Unavailable</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                                    <button type="button" class="btn btn-light">Collection Type</button>
                                                    <div class="btn-group" role="group">
                                                        <button id="btnCategoryDrop" type="button" class="btn btn-light dropdown-toggle dropdown-toggle-nocaret px-1" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class='bx bxs-category'></i>
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="btnCategoryDrop">
                                                            <li><a class="dropdown-item" href="#" data-category="Laptop">Laptop</a></li>
                                                            <li><a class="dropdown-item" href="#" data-category="Projector">Projector</a></li>
                                                            <li><a class="dropdown-item" href="#" data-category="SmartPhone">SmartPhone</a></li>
                                                            <li><a class="dropdown-item" href="#" data-category="Extension">Extension</a></li>
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
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-4" id="deviceList">
                @foreach($devices as $device)
                    <div class="col device-item" data-category="{{ $device->category }}" data-status="{{ $device->status }}">
                        <div class="card">
                            <img src="{{ asset('uploads/devices/' . $device->image_name1) }}" class="card-img-top" alt="..." width="300" height="350">
                            <div class="card-body">
                                <h5 class="card-title">{{ $device->category }}</h5>
                                
                                <h2 class="card-text" style="font-weight: bold; color: {{ $device->status == 'Available' ? 'blue' : 'red' }}">
                                    {{ $device->status }}
                                </h2>
                                
                                <a href="{{ route('device.devicedetail', ['id'=> $device->id]) }}" class="btn btn-light">Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    <div>
</div> <!--end page wrapper -->
</div> <!--end wrapper -->
@include('staff.Layout.footer')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // References to dropdown buttons
        const categoryDropdown = document.getElementById('btnCategoryDrop');
        const statusDropdown = document.getElementById('btnSortDrop');
        const searchForm = document.getElementById('searchForm');
        const searchInput = document.getElementById('searchInput');

        // Update form inputs when dropdown items are clicked
        document.querySelectorAll('#btnCategoryDrop .dropdown-item').forEach(item => {
            item.addEventListener('click', function () {
                searchInput.value = ''; // Clear search input if needed
                const category = this.getAttribute('data-category');
                document.querySelector('#searchForm input[name="category"]').value = category;
                filterDevices();
            });
        });

        document.querySelectorAll('#btnSortDrop .dropdown-item').forEach(item => {
            item.addEventListener('click', function () {
                searchInput.value = ''; // Clear search input if needed
                const status = this.getAttribute('data-status');
                document.querySelector('#searchForm input[name="status"]').value = status;
                filterDevices();
            });
        });

        // Filter devices based on input values
        function filterDevices() {
            const searchValue = searchInput.value.toLowerCase();
            const selectedCategory = document.querySelector('#searchForm input[name="category"]')?.value;
            const selectedStatus = document.querySelector('#searchForm input[name="status"]')?.value;

            document.querySelectorAll('.device-item').forEach(item => {
                const itemCategory = item.getAttribute('data-category');
                const itemStatus = item.getAttribute('data-status');
                const isCategoryMatch = selectedCategory ? itemCategory === selectedCategory : true;
                const isStatusMatch = selectedStatus ? itemStatus === selectedStatus : true;
                const isSearchMatch = searchValue ? itemCategory.toLowerCase().includes(searchValue) : true;

                if (isCategoryMatch && isStatusMatch && isSearchMatch) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }

        // Handle form submission
        searchForm.addEventListener('submit', function (e) {
            e.preventDefault();
            filterDevices();
        });
    });
</script>
