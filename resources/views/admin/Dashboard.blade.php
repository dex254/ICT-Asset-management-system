@include('admin.Layout.header')

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home || KSG LRS</title>
</head>

	<!--wrapper-->
	<div class="wrapper">
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
                @foreach ($broadcast as $broadcasts)
                    <div class="col mb-3">
                        @php
                            $textClass = 'danger rounded'; // Default class
                            if ($broadcasts->category == 'Info') {
                                $textClass = 'warning rounded';
                            }
                        @endphp

                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title text-{{ $textClass }}">{{ $broadcasts->title }}</h5>
                                <p class="text-{{ $textClass }}">{{ $broadcasts->message }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>


@include('admin.Layout.footer')
