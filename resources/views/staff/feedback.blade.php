@include('staff.Layout.header')

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Send Feedback || KSG LRS</title>
</head>

<body class="bg-theme bg-theme1">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="card mb-0">
							<div class="card-body">
								<div class="p-4">
                                    <div class="mb-3 text-center">
										<img src="{{asset('') }}assets/images/KSG Logo (1).png" width="60" alt="">
									</div>
									<div class="text-center mb-4">
										<h5 class="">KSG Staff Feedback Form</h5>
                                        <h6 class="mb-0">Hello, {{ Auth::guard('staff')->user()->fname}}!</h6>
                                        <br>
										<p class="mb-0">Is your experience here smooth? Having trouble? Tell us more.</p>
									</div>
									<div class="form-body">
										<form class="row g-3" method="POST" action="{{ route('feedback.store') }}">
                                            @csrf

											<input type="hidden" class="form-control" name = "staffname" value="{{ Auth::guard('staff')->user()->fname}} {{ Auth::guard('staff')->user()->mname}} {{ Auth::guard('staff')->user()->sname}}">
											<input type="hidden" class="form-control" name = "staffiden" value="{{ Auth::guard('staff')->user()->iden}}">
                                            <input type="hidden" class="form-control" name = "staffphone" value="{{ Auth::guard('staff')->user()->phone}}">
											<input type="hidden" class="form-control" name = "staffemail" value="{{ Auth::guard('staff')->user()->email}}">
                                            <div class="col-12">
												<label for="inputEmailAddress" class="form-label">Subject:</label>
												<input type="text" class="form-control" name = "subject" id="inputEmailAddress" required>
											</div>
                                            <input type="hidden" class="form-control" name = "date" id = "currentDateTime">
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

											<input type="hidden" class="form-control" name = "staffiden" value="{{ Auth::guard('staff')->user()->iden}}">
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Message:</label>
												<textarea class="form-control" id="inputAddress2" name = "message" rows="8" required></textarea>
											</div>
											<input type="hidden" class="form-control" name = "replydate" id = "currentDateTime">

											<input type="hidden" class="form-control" name = "adminname">
                                            <input type="hidden" class="form-control" name = "adminphone">
											<input type="hidden" class="form-control" name = "adminemail">
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-light">Send</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
</body>

@include('staff.Layout.footer')
