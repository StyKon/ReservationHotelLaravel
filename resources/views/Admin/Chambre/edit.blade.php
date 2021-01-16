@extends('layouts.admin')
@section('content')

  <!-- Header -->
  <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Room Management</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('Chambre.index') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('Chambre.index') }}">Room</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
            <a href="{{ route('Chambre.index') }}" class="btn btn-sm btn-neutral">Back to list</a>

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card-wrapper">
            <!-- Custom form validation -->
            <div class="card">
              <!-- Card header -->
              <div class="card-header">
                <h3 class="mb-0">Edit Room</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">


              <form class="needs-validation" novalidate  action="{{ route('Chambre.update',$chambre->Id_Chambre) }}" method="post" >
              @csrf
               @method('PUT')

                  <div class="form-row">
                    <div class="col-md-4 mb-3">
                      <label class="form-control-label" for="validationCustom01">Numero de la chambre</label>
                      <input type="text" name="Num" class="form-control" id="validationCustom01" value="{{$chambre->Num}}"  placeholder="Number Chambre"  required>
                      <div class="invalid-feedback">
                        Please choose a Numero Chambre .
                      </div>
                    </div>

                    <div class="col-md-4 mb-3">
                      <label class="form-control-label" for="validationCustom02">Nombre de place</label>
                      <input type="text" name="NbPlace" class="form-control" value="{{$chambre->NbPlace}}"  id="validationCustom02" placeholder="Number place" required>
                      <div class="invalid-feedback">
                        Please choose a Place Number.
                      </div>
                    </div>

                    <div class="col-md-4 mb-3">
                      <label class="form-control-label" for="validationCustomUsername">Prix</label>
                      <input type="text" name="Prix" class="form-control" value="{{$chambre->Prix}}"  id="validationCustomUsername" placeholder="Price" aria-describedby="inputGroupPrepend" required>
                      <div class="invalid-feedback">
                        Please choose a Prix.
                      </div>
                    </div>
                  </div>
                  <div >
                      <label class="form-control-label" for="validationCustom01">Etat de la chambre</label>
                      <input type="text" name="Etat" class="form-control" id="validationCustom01" value="{{$chambre->Etat}}"  placeholder="Etat Chambre"  required>
                      <div class="invalid-feedback">
                        Please choose Etat Chambre .
                      </div>
                    </div>
                  <div class="form-group">
                    <label class="form-control-label" for="exampleFormControlSelect1">Select Hotel</label>
                    <select class="form-control" name="Id_Hotel"   id="exampleFormControlSelect1" required>
                    @foreach ($hotels as $hotel)

                    @if($hotel->Id_Hotel == $chambre->Id_Hotel)
                    {
                        <option value="{{$hotel->Id_Hotel}}" selected>{{$hotel->Nom}}</option>
                    }
                    @else{
                        <option value="{{$hotel->Id_Hotel}}">{{$hotel->Nom}}</option>
                    }
                     @endif



                     @endforeach
                    </select>
                  </div>

                  <button class="btn btn-primary" type="submit">Update Room</button>
                </form>
              </div>
            </div>


          </div>
        </div>
      </div>

    </div>
  </div>
@endsection
