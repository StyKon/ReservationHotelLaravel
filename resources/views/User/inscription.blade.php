<!doctype html>
    <html lang="en" id="top">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
        <link rel="icon" type="image/png" href="{{asset('assets/img/apple-icon.png')}}">

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Reservation Hotel</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <link href="{{asset('bootstrap3/css/bootstrap.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/css/gsdk.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/css/demo.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/css/style1.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/css/style2.css')}}" rel="stylesheet" />

        <link href="{{asset('assets/css/hotelaff.css')}}" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>



<style>
    * {
  padding:0;
  margin:0;
}
.slideContainer {
  position: relative;
}
.picture {
  display: none;

  transition-duration: 0.5s;
  transition-timing-function: ease;
}

.arrow {
  color: white;
  font-size: 3em;
  position: absolute;
  top: 40%;
  left: 5%;
  width: 90%;

}

    </style>
<style>
@import "https://fonts.googleapis.com/css?family=Montserrat:400,400i,700";*{position:relative;margin:0;padding:0;box-sizing:border-box;font-family:Montserrat,sans-serif}:focus{outline:none}body{background:#e0e0e0;height:100vh}

</style>




        <!--     Font Awesome     -->
        <link href="{{asset('bootstrap3/css/font-awesome.css')}}" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
    </head>
    <body>
    <div id="navbar-full">
        <div class="container">
            <nav class="navbar navbar-ct-blue navbar-transparent navbar-fixed-top" role="navigation">

                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="http://creative-tim.com">
                            <div class="logo-container">
                                <div class="logo">
                                    <img src="{{asset('assets/img/new_logo.png')}}">
                                </div>
                                <div class="brand">
                                    Reservation Hotel
                                </div>
                            </div>

                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="/">Home</a></li>
                            <li><a href="#top">Top</a></li>
                            <li><a href="#down">Down</a></li>
                            @if(session()->has('ClientLogin'))
                            <li><a href="/myreservation" >My Reservation</a></li>

                            <li><a href="/LogoutClient" class="btn btn-round btn-default">Logout</a></li>

                            @else
                            <li><a href="/inscription" class="btn btn-round btn-default">Register</a></li>
                            <li><a href="/login" class="btn btn-round btn-default">Login</a></li>

                            @endif
                        </ul>

                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div><!--  end container-->

        <div class='blurred-container'>
            <div class="motto">
                <div>Get</div>
                <div class="border no-right-border">T</div><div class="border">OP</div>
                <div>Offer</div>
            </div>
            <div class="img-src" style="background-image: url('{{asset('assets/img/cover_4.jpg')}}')"></div>
            <div class='img-src blur' style="background-image: url('{{asset('assets/img/cover_4_blur.jpg')}}')"></div>
        </div>

    </div>

    <div class="main">
    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif
    @if ($message = Session::get('ops!'))
      <div class="alert alert-danger">
        <p>{{$message}}</p>
      </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
        <strong>Whoops! </strong>Civilié already exist.<br>
            <ul>
                @foreach ($errors as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container tim-container">


    <div id="inputs">
        <center>
            <form action="/inscription" method="post">
            @csrf
                <div class="tim-title">
                 <h3>Inscription</h3>
                </div>
                <div class="row tim-row">

                <div class="col-sm-6">
                	<div class="input-group">
                	<!-- 	   Since the css properties cannot check the previous sibling of an element and for the design consistency we recommend to use the "input-group-addon" after the "form-control" like in this example -->
                      <input type="text" maxlength="8" minlength="8" size="8" placeholder="Civilite" name="Civilite" class="form-control" required>
                      <span class="input-group-addon"><i class="fas fa-address-card"></i></span>
                    </div>
                </div>

                  <div class="col-sm-6">
                	<div class="input-group">
                	<!-- 	   Since the css properties cannot check the previous sibling of an element and for the design consistency we recommend to use the "input-group-addon" after the "form-control" like in this example -->
                      <input type="password" placeholder="Password" name="Password" class="form-control" required>
                      <span class="input-group-addon"><i class="fas fa-key"></i></span>
                    </div>
                </div>
                </div>
                <div class="row tim-row">
                <div class="col-sm-6">
                	<div class="input-group">
                	<!-- 	   Since the css properties cannot check the previous sibling of an element and for the design consistency we recommend to use the "input-group-addon" after the "form-control" like in this example -->
                      <input type="text" placeholder="Nom" name="Nom" class="form-control" required>
                      <span class="input-group-addon"><i class="fas fa-user"></i></span>
                    </div>
                </div>
                <div class="col-sm-6">
                	<div class="input-group">
                	<!-- 	   Since the css properties cannot check the previous sibling of an element and for the design consistency we recommend to use the "input-group-addon" after the "form-control" like in this example -->
                      <input type="text" placeholder="Prenom" name="Prenom" class="form-control" required>
                      <span class="input-group-addon"><i class="fas fa-user"></i></span>
                    </div>
                </div>
                </div>
                <div class="row tim-row">
                <div class="col-sm-6">
                	<div class="input-group">
                	<!-- 	   Since the css properties cannot check the previous sibling of an element and for the design consistency we recommend to use the "input-group-addon" after the "form-control" like in this example -->
                      <input type="email" placeholder="Email" name="Email" class="form-control" required>
                      <span class="input-group-addon"><i class="fas fa-at"></i></span>
                    </div>
                </div>
                <div class="col-sm-6">
                	<div class="input-group">
                	<!-- 	   Since the css properties cannot check the previous sibling of an element and for the design consistency we recommend to use the "input-group-addon" after the "form-control" like in this example -->
                      <input type="text" placeholder="Mobile" name="Mobile" class="form-control" required>
                      <span class="input-group-addon"><i class="fas fa-mobile-alt"></i></span>
                    </div>
                </div>
                </div>
                <div class="row tim-row">
                <div class="col-sm-6">
                	<div class="input-group">
                	<!-- 	   Since the css properties cannot check the previous sibling of an element and for the design consistency we recommend to use the "input-group-addon" after the "form-control" like in this example -->
                      <input type="text" placeholder="Adresse" name="Adresse" class="form-control" required>
                      <span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></span>
                    </div>
                </div>
                <div class="col-sm-6">
                	<div class="input-group">
                	<!-- 	   Since the css properties cannot check the previous sibling of an element and for the design consistency we recommend to use the "input-group-addon" after the "form-control" like in this example -->
                      <input type="text" placeholder="CodePostal" name="CodePostal" class="form-control"required>
                      <span class="input-group-addon"><i class="fas fa-box"></i></span>
                    </div>
                </div>
                </div>
                <div class="row tim-row">
                <div class="col-sm-12">
                	<div class="input-group">
                	<!-- 	   Since the css properties cannot check the previous sibling of an element and for the design consistency we recommend to use the "input-group-addon" after the "form-control" like in this example -->

                    <select name="Ville" data-placeholder="Ville" placeholder="Ville"  class="form-control" required>
                    <option value="" disabled selected>Select Your Ville</option>
                    <option value="Tunis">Tunis</option>
                    <option value="Ariana">Ariana</option>
                    <option value="Ben Arous">Ben Arous</option>
                    <option value="Manouba">Manouba</option>
                    <option value="Nabeul">Nabeul</option>
                    <option value="Zaghouan">Zaghouan</option>
                    <option value="Bizerte">Bizerte</option>
                    <option value="Béja">Béja</option>
                    <option value="Jendouba">Jendouba</option>
                    <option value="Kef">Kef</option>
                    <option value="Siliana">Siliana</option>
                    <option value="Sousse">Sousse</option>
                    <option value="Monastir">Monastir</option>
                    <option value="Mahdia">Mahdia</option>
                    <option value="Sfax">Sfax</option>
                    <option value="Kairouan">Kairouan</option>
                    <option value="Kasserine">Kasserine</option>
                    <option value="Sidi Bouzid">Sidi Bouzid</option>
                    <option value="Gabès">Gabès</option>
                    <option value="Mednine">Mednine</option>
                    <option value="Tataouine">Tataouine</option>
                    <option value="Gafsa">Gafsa</option>
                    <option value="Tozeur">Tozeur</option>
                    <option value="Kebili">Kebili</option>
                     </select>
                      <span class="input-group-addon"><i class="fas fa-city"></i></span>
                    </div>
                </div>
                </div>
                <div class="row tim-row">
                <div class="col-md-6 col-sm-6">
                        <button href="#fakelink" class="btn btn-block btn-lg btn-info btn-round">Inscription</button>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <cancel href="#fakelink" class="btn btn-block btn-lg btn-info btn-round">Annuler</cancel>
                    </div>
                </div>

            </form>
</center>


        </div><!--  end inputs -->

</div>
</div>



        <div  class="parallax-pro" id="down">
        <div class="img-src" style="background-image: url('{{asset('assets/img/Cover.jpg')}}');"></div>
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-md-offset-3 col-md-12 text-center">
                    <h4 class="hello text-center">
                        <a href="http://gsdk.creative-tim.com">Contact Us <span class="label label-warning"> New</span></a>
                        <small>

                        <li>
                                <i class="fa fa-map-marker fs-16 dis-inline-block size19" aria-hidden="true"></i>
                                Route     km  - 3012     - Tunisie</li>
                                <li>
                                <i class="fa fa-phone fs-16 dis-inline-block size19" aria-hidden="true"></i>

                                Mobile :(+216) 54 647 661</li>
                                <li>
                                <i class="fa fa-phone fs-16 dis-inline-block size19" aria-hidden="true"></i>

                                Mobile : (+216) 44 587 066</li>
                                <li>
                                <i class="fa fa-envelope fs-13 dis-inline-block size19" aria-hidden="true"></i>

                                E-mail : khalilfrikha@iit.ens.tn </li>
                                <li>
<i class="fa fa-envelope fs-13 dis-inline-block size19" aria-hidden="true"></i>

E-mail : yahia.chehaider@iit.ens.tn </li>
                        </small>
                    </h4>

                </div>
            </div>
            <div class="space-30"></div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="credits">
                        &copy; <script>document.write(new Date().getFullYear())</script> Get Best Offer <a href=""> Hotel Reservation</a>,<i class="fa fa-heart heart" alt="love"></i> Welcome.
                    </div>
                </div>
            </div>
        </div>

    </div>

    </body>


    <script src="{{asset('jquery/jquery-1.10.2.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery-ui-1.10.4.custom.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('bootstrap3/js/bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/gsdk-checkbox.js')}}"></script>
    <script src="{{asset('assets/js/addroom.js')}}"></script>
    <script src="{{asset('assets/js/datetime.js')}}"></script>
    <script src="{{asset('assets/js/btnonclick.js')}}"></script>
    <script src="{{asset('assets/js/datetimedisp.js')}}"></script>
    <script src="{{asset('assets/js/gsdk-radio.js')}}"></script>
    <script src="{{asset('assets/js/gsdk-bootstrapswitch.js')}}"></script>
    <script src="{{asset('assets/js/get-shit-done.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>

<script>

var slideIndex = 1;
slideShow(slideIndex);

function slideMove(n) {
  slideShow(slideIndex += n);
}

function slideShow(n) {
  var i;
  var slide= document.getElementsByClassName("picture");

  if (n > slide.length) {
    slideIndex = 1;
  }

  if(n < 1) {
    slideIndex = slide.length;
  }

  for(i = 0; i < slide.length; i++) {
    slide[i].style.display = "none";
  }

  slide[slideIndex-1].style.display = "block";
}


</script>


    </html>
