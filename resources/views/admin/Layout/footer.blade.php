
<!--start switcher-->
<div class="switcher-wrapper">
    <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
    </div>
    <div class="switcher-body">
        <div class="d-flex align-items-center">
            <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
            <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
        </div>
        <hr/>
        <p class="mb-0">Gaussian Texture</p>
        <hr>

        <ul class="switcher">
            <li id="theme1"></li>
            <li id="theme2"></li>
            <li id="theme3"></li>
            <li id="theme4"></li>
            <li id="theme5"></li>
            <li id="theme6"></li>
        </ul>
        <hr>
        <p class="mb-0">Gradient Background</p>
        <hr>

        <ul class="switcher">
            <li id="theme7"></li>
            <li id="theme8"></li>
            <li id="theme9"></li>
            <li id="theme10"></li>
            <li id="theme11"></li>
            <li id="theme12"></li>
            <li id="theme13"></li>
            <li id="theme14"></li>
            <li id="theme15"></li>
        </ul>
    </div>
</div>
<!--end switcher-->
<!-- Bootstrap JS -->
<script src="{{asset('') }}assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="{{asset('') }}assets/js/jquery.min.js"></script>
<script src="{{asset('') }}assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="{{asset('') }}assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="{{asset('') }}assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="{{asset('') }}assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="{{asset('') }}assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="{{asset('') }}assets/plugins/highcharts/js/highcharts.js"></script>
<script src="{{asset('') }}assets/plugins/highcharts/js/exporting.js"></script>
<script src="{{asset('') }}assets/plugins/highcharts/js/variable-pie.js"></script>
<script src="{{asset('') }}assets/plugins/highcharts/js/export-data.js"></script>
<script src="{{asset('') }}assets/plugins/highcharts/js/accessibility.js"></script>
<script src="{{asset('') }}assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
<script src="{{asset('') }}assets/plugins/fancy-file-uploader/jquery.ui.widget.js"></script>
<script src="{{asset('') }}assets/plugins/fancy-file-uploader/jquery.fileupload.js"></script>
<script src="{{asset('') }}assets/plugins/fancy-file-uploader/jquery.iframe-transport.js"></script>
<script src="{{asset('') }}assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js"></script>
<script src="{{asset('') }}assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js"></script>

<script>
    $(document).ready(function () {
        $("#show_hide_password1 a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password1 input').attr("type") == "text") {
                $('#show_hide_password1 input').attr('type', 'password');
                $('#show_hide_password1 i').addClass("bx-hide");
                $('#show_hide_password1 i').removeClass("bx-show");
            } else if ($('#show_hide_password1 input').attr("type") == "password") {
                $('#show_hide_password1 input').attr('type', 'text');
                $('#show_hide_password1 i').removeClass("bx-hide");
                $('#show_hide_password1 i').addClass("bx-show");
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        $("#show_hide_password2 a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password2 input').attr("type") == "text") {
                $('#show_hide_password2 input').attr('type', 'password');
                $('#show_hide_password2 i').addClass("bx-hide");
                $('#show_hide_password2 i').removeClass("bx-show");
            } else if ($('#show_hide_password2 input').attr("type") == "password") {
                $('#show_hide_password2 input').attr('type', 'text');
                $('#show_hide_password2 i').removeClass("bx-hide");
                $('#show_hide_password2 i').addClass("bx-show");
            }
        });
    });
</script>

<script>
	$(document).ready(function () {
		$('#image-uploadify').imageuploadify();
	})
</script>

<script>
    function changeImage(imageSrc) {
        document.getElementById('mainImage').src = imageSrc;
    }
</script>


<script>
    $(document).ready(function () {
        $('#sidebar-menu').metisMenu();
    });
</script>
<script>
   new PerfectScrollbar('.dashboard-top-countries');
</script>
<script src="{{asset('') }}assets/js/dashboard-alternate.js"></script>
<!--app JS-->
<script src="{{asset('') }}assets/js/app.js"></script>


</html>
