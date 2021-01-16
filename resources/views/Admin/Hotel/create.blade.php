@extends('layouts.admin')
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Hotel Management</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('Hotel.index') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('Hotel.index') }}">Hotel</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
            <a href="{{ route('Hotel.index') }}" class="btn btn-sm btn-neutral">Back to list</a>

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
                <h3 class="mb-0">Add Hotel</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">


              <form class="needs-validation" novalidate  action="{{ route('Hotel.store') }}" method="post">
                @csrf
                  <div class="form-row">
                    <div class="col-md-6 mb-3">
                      <label class="form-control-label" for="validationCustom01">Name Hotel</label>
                      <input type="text" class="form-control" name="Nom" id="validationCustom01" placeholder="Nom Hotel"  required>
                      <div class="invalid-feedback">
                        Please choose a Name Hotel .
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label class="form-control-label" for="exampleFormControlSelect1">Select Ville</label>
                      <select class="form-control" name="Id_Ville" id="exampleFormControlSelect1">
                      @foreach ($villes as $ville)
                                    <option value="{{$ville->Id_Ville}}">{{$ville->Nom}}</option>
                                @endforeach
                      </select>
                    </div>

                  </div>
                  <div class="form-row">

                    <div class="col-md-6 mb-3">
                      <label class="form-control-label" for="exampleFormControlSelect1">Select Category</label>
                      <select class="form-control" name="Id_Category" id="exampleFormControlSelect1">
                      @foreach ($categorys as $category)
                                    <option value="{{$category->Id_Category}}">{{$category->Type}}</option>
                                @endforeach
                      </select>
                    </div>

                  </div>

                  <button class="btn btn-primary" type="submit">Add Hotel</button>
                </form>
              </div>
            </div>


          </div>
        </div>
      </div>

    </div>
  </div>
@endsection
