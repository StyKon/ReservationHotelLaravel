<!doctype html>
    <html lang="en"  id="top">
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
            <strong>Whoops! </strong> verifier votre donnee.<br>
            <ul>
                @foreach ($errors as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

<form action="{{ route('search') }}" method="post">
@csrf

        <div class="container tim-container">

        <div class="main-search-input"style="margin-bottom:40px;z-index: 2;">
             <div class="main-search-input-item">
   <div class="o-container">
    <div class="o-flex">
      <div class="o-form-group">

        <input class="c-input" name="DateDebut"  placeholder="Date entry" id="startDate" type="text" required/>
      </div>

    </div>
  </div>

   </div>
   <div class="main-search-input-item">
   <div class="o-container">
    <div class="o-flex">

      <div class="o-form-group">
        <input class="c-input" id="endDate" name="DateFin"  placeholder="Date Leave" type="text" required/>
      </div>
    </div>
  </div>

    </div>

   <div class="main-search-input-item">
      <select name="ville" data-placeholder="All Categories" class="chosen-select">
         <option>All Ville</option>
         @foreach ($villes as $ville)
                                    <option value="{{$ville->Id_Ville}}">{{$ville->Nom}}</option>
        @endforeach
      </select>


   </div>
   <div class="main-search-input-item">
      <select name="category" data-placeholder="All Categories" class="chosen-select">
         <option>All Categories</option>
         @foreach ($categorys as $category)
                                    <option value="{{$category->Id_Category}}">{{$category->Type}}</option>
                                @endforeach
      </select>


   </div>
   <div class="main-search-input-item">


    <details style="margin: 11px;font-size: 13px;">

        <summary class="hello text-center" id="sum">1 Room 1 Adult 0 Kids</summary>
        <div>Room Adult kids</div>

    <div class="text-boxes">

       <input min="0" max="4" id="name" style="width:40px;text-align:right;display: inline-block;" onclick="Count()" type="number" name="name[]" value="1"  class="form-control" readonly>
        <input min="1" max="4" id="adult" style="width:40px;text-align:right;display: inline-block;" onclick="Count()" type="number" name="adult[]" value="1" class="form-control" >
        <input min="0" max="4" id="kids"  style="width:40px;text-align:right;display: inline-block;" onclick="Count()"  type="number"  name="kids[]" value="0"  class="form-control" >

   </div>


    <div class="sign-btn signup-page"style="display: inline-block;">

    <button type="button" style="width:60px;display: inline-block;"  class="btn btn-info sign-bttn">+</button>

    </div>
    <div class="rmv-btn"style="display: inline-block;">
        <button type="button" style="width:60px;display: inline-block;" onclick="Remove()"  class="btn btn-info rmv-btnn">-</button>
        </div>
    </details>


   </div>

   <button class="button" >Search</button>

</div>

</form>
<br><br>
<!-- <div class="widget-container center">
  <div class="card">
    <div class="card-top">
    <div class="slideContainer">
        <div class="picture">
         <img  class="main-image" style="height: 259.188px; width: 461px"  src="https://www.pro-voyages.com/storage/app/uploads/public/5b4/dd8/036/5b4dd80365bad827588706.jpg">
        </div>
        <div class="picture">
      		<img class="main-image" style="height: 259.188px; width: 461px" src="https://images.unsplash.com/photo-1485646485012-f09e6a19d9c4?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=35deb3c9cdf9c401a71377fb09238eb4&auto=format&fit=crop&w=1500&q=80">
    	</div>
    	<div class="picture">
     	 	<img class="main-image" style="height: 259.188px; width: 461px" src="https://images.unsplash.com/photo-1497120573086-6219573cf71c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=ce6032d8d7955f6d9601c7293dab2f2f&auto=format&fit=crop&w=1052&q=80">
   	 	</div>
    	<div class="picture">
      		<img class="main-image" style="height: 259.188px; width: 461px" src="https://images.unsplash.com/photo-1486758206125-94d07f414b1c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=5dd0763cb8402ca760ec8d37336eb372&auto=format&fit=crop&w=1050&q=80">
    	</div>
    </div>
      <div class="card-sidenav">
        <div class="btn-next center"onclick="slideMove(-1)" >
          <i class="fas fa-chevron-right" ></i>
        </div>
        <div class="btn-previous center" onclick="slideMove(1)" >
          <i class="fas fa-chevron-left"></i>
        </div>
    </div>
    <div class="card-description row">
      <div class="col-md-7">
        <div class="hotel-name">
          Hacienda Xamena
          <span class="stars">
          @for ($i = 1; $i < 6; $i++)
          <i class="fas fa-star"></i>
          @endfor

          </span>
        </div>
        <div class="hotel-location">
          Mahdia
        </div>
      </div>
      <div class="col-md-5 center-vertically">
        <button class="book-button">BOOK NOW</button>
      </div>
    </div>
   </div>


</div> -->


</div>


@if(!empty($hotels))

@if(!(count($hotels)>0))
<div class="alert alert-warning">
        <strong>No!</strong> Result Found .
    </div>
@endif
@foreach ($hotels as $hotel)
<div class="widget-container center">
  <div class="card">
    <div class="card-top">
    <div class="slideContainer">
   <!-- @ foreach ($images as $image)-->
   <!--   @ if($hotel->Id_Hotel == $image->Id_Hotel)-->
   <!--  <div class="picture"> -->
         <img  class="main-image" style="height: 259.188px; width: 461px"  src="{{url('uploads/'.$hotel->Path)}}">
  <!-- </div> -->
  <!--   @ endif-->
  <!-- @  endforeach-->
    </div>
      <div class="card-sidenav">
        <div class="btn-next center"onclick="slideMove(-1)" >
          <i class="fas fa-chevron-right" ></i>
        </div>
        <div class="btn-previous center" onclick="slideMove(1)" >
          <i class="fas fa-chevron-left"></i>
        </div>
    </div>
    <div class="card-description row">
      <div class="col-md-7">
        <div class="hotel-name">
        Hotel : {{$hotel->Nom}}
          <span class="stars">
          @for($i = 1; $i < 6; $i++)
            @if($i-1<$hotel->Type)
            <i class="fas fa-star"></i>
            @else
            <i class="far fa-star"></i>
             @endif
          @endfor

          </span>
        </div>
        <div class="hotel-location">
        Location : {{$hotel->NomVille}}
        </div>
        <br>
        <div class="hotel-name">
       Price : {{$hotel->PrixTot}} DT
        </div>
      </div>
      <!--
          Array = {hotel_iD , date_deb , date_fin , n }
       -->

      <div class="col-md-5 center-vertically">
        <form id="reservation" action="{{ route('reservation') }}" method="post">
        @csrf

        <input type="hidden" name="hotel" value="{{ json_encode($hotel,TRUE)}}">
        <input type="hidden" name="NbCh" value="{{ json_encode($NbCh,TRUE)}}">
        <input type="hidden" name="Nb" value="{{ json_encode($Nb,TRUE)}}">


        <button class="book-button" onclick="return confirmation();" >BOOK NOW</button>
        </form>
      </div>
    </div>
   </div>
</div>

</div>
@endforeach

@endif
<br><br>


    <div  class="parallax-pro"  id="down">
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
<script>
function confirmation(){
    if(confirm('are you sure?')){
        document.getElementById('reservation').submit();
    }else{
        return false;
    }
}
</script>

    </html>
