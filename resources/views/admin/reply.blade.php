@include('admin.Layout.header')

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Feedback Reply || KSG LRS</title>
</head>

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
										<h5 class="">KSG Feedback Reply</h5>
                                        <br>
									</div>
									<div class="form-body">
										<form class="row g-3" method="POST"  action="{{ route('admin.reply.update.post', $feedback->id) }}">
                                            @csrf

                                            <p class="card-text"><strong>Staff Name: </strong>{{ $feedback->staffname }}</p>

                                            <p class="card-text"><strong>Staff E-mail Address: </strong>{{ $feedback->staffemail }}</p>

                                            <p class="card-text"><strong>Staff Contact: </strong>{{ $feedback->staffphone }}</p>

                                            <p class="card-text"><strong>Subject: </strong>{{ $feedback->subject }}</p>

                                            <p class="card-text"><strong>Message: </strong>{{ $feedback->message }}</p>

											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Reply:</label>
												<textarea class="form-control" id="inputAddress2" name = "reply" rows="8" required></textarea>
											</div>

                                            <input type="hidden" class="form-control" name = "replydate" id = "currentDateTime">

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

											<input type="hidden" class="form-control" name = "adminname" value="{{ Auth::guard('admin')->user()->fname}} {{ Auth::guard('admin')->user()->mname}} {{ Auth::guard('admin')->user()->sname}}">
                                            <input type="hidden" class="form-control" name = "adminphone" value="{{ Auth::guard('admin')->user()->phone}}">
											<input type="hidden" class="form-control" name = "adminemail"value="{{ Auth::guard('admin')->user()->email}}">
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-light">Reply</button>
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

@include('admin.Layout.footer')
