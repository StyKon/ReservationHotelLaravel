<!-- =========================================================
* Argon Dashboard PRO v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro
* Copyright 2019 Creative Tim (https://www.creative-tim.com)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 -->
 <!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Argon Dashboard PRO - Premium Bootstrap 4 Admin Template</title>
  <!-- Favicon -->
  <link rel="icon" href="{{asset('assets2/img/brand/favicon.png')}}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset('assets2/vendor/nucleo/css/nucleo.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('assets2/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
  <!-- Page plugins -->
   <!-- Page plugins -->
   <link rel="stylesheet" href="{{asset('assets2/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets2/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets2/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">

  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset('assets2/css/argon.css?v=1.1.0')}}" type="text/css">
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="../../pages/dashboards/dashboard.html">
          <img src="{{asset('assets2/img/brand/blue.png')}}" class="navbar-brand-img" alt="...">
        </a>
        <div class="ml-auto">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">



            <li class="nav-item">
              <a class="nav-link" href="/">
                <i class="ni ni-shop text-primary"></i>
                <span class="nav-link-text">Dashboards</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('Admin/Chambre') }}">
                <i class="ni ni-building text-orange"></i>
                <span class="nav-link-text">Room Management</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('Admin/Category') }}">
                <i class="ni ni-atom text-green"></i>
                <span class="nav-link-text">Category Management</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ url('Admin/Image') }}">
                <i class="ni ni-image text-red"></i>
                <span class="nav-link-text">Image Management</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('Admin/Ville') }}">
                <i class="ni ni-world-2 text-green"></i>
                <span class="nav-link-text">City Management</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('Admin/Hotel') }}">
                <i class="ni ni-istanbul text-red"></i>
                <span class="nav-link-text">Hotel Management</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('Admin/Promotion') }}">
                <i class="ni ni-khalil text-green"></i>
                <span class="nav-link-text">Discount Management</span>
              </a>
            </li>

          </ul>

        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center ml-md-auto">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>


          </ul>
          <ul class="navbar-nav align-items-center ml-auto ml-md-0">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="{{asset('assets2/img/theme/team-4.jpg')}}">
                  </span>
                  <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">Admin</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>

                <div class="dropdown-divider"></div>
                <a href="/LogoutAdmin" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  @yield('content')


  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{asset('assets2/vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('assets2/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets2/vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{asset('assets2/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{asset('assets2/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
  <!-- Optional JS -->
  <script src="{{asset('assets2/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('assets2/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('assets2/vendor/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('assets2/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{asset('assets2/vendor/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{asset('assets2/vendor/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
  <script src="{{asset('assets2/vendor/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{asset('assets2/vendor/datatables.net-select/js/dataTables.select.min.js')}}"></script>
  <script src="{{asset('assets2/vendor/select2/dist/js/select2.min.js')}}"></script>
  <script src="{{asset('assets2/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('assets2/vendor/nouislider/distribute/nouislider.min.js')}}"></script>
  <script src="{{asset('assets2/vendor/quill/dist/quill.min.js')}}"></script>
  <script src="{{asset('assets2/vendor/dropzone/dist/min/dropzone.min.js')}}"></script>
  <script src="{{asset('assets2/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
  <script src="{{asset('assets2/vendor/dropzone/dist/min/dropzone.min.js')}}"></script>
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>
  <!-- Argon JS -->
  <script src="{{asset('assets2/js/argon.js?v=1.1.0')}}"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="{{asset('assets2/js/demo.min.js')}}"></script>
  <script>
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
$(document).on('click', 'a.table-action-delete', function(e) {
    e.preventDefault(); // does not go through with the link.

    var $this = $(this);

    $.post({
        type: $this.data('method'),
        url: $this.attr('href')
    }).done(function (data) {
        location.reload();
    });

});
</script>
<script>
    $('.nav-link').on('click',function(){

//Remove any previous active classes
$('.nav-link').removeClass('active');

//Add active class to the clicked item
$(this).addClass('active');
});
</script>
<script>

if ( window.location.href.indexOf('Category') > -1){
    $('[href*="{{ url('Admin/Category') }}"]').closest('.nav-link').addClass("active")
}else if ( window.location.href.indexOf('Chambre') > -1){
    $('[href*="{{ url('Admin/Chambre') }}"]').closest('.nav-link').addClass("active")
}else if ( window.location.href.indexOf('Image') > -1){
    $('[href*="{{ url('Admin/Image') }}"]').closest('.nav-link').addClass("active")
}else if ( window.location.href.indexOf('Ville') > -1){
    $('[href*="{{ url('Admin/Ville') }}"]').closest('.nav-link').addClass("active")
}else if ( window.location.href.indexOf('Hotel') > -1){
    $('[href*="{{ url('Admin/Hotel') }}"]').closest('.nav-link').addClass("active")
}else if ( window.location.href.indexOf('Promotion') > -1){
    $('[href*="{{ url('Admin/Promotion') }}"]').closest('.nav-link').addClass("active")
}
</script>
</body>

</html>
