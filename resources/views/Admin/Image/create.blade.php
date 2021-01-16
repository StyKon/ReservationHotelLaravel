@extends('layouts.admin')
@section('content')
  <!-- Header -->
  <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Image Management</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('Image.index') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('Image.index') }}">Image</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
            <a href="{{ route('Image.index') }}" class="btn btn-sm btn-neutral">Back to list</a>

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
                <h3 class="mb-0">Add Image</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">


        <form class="needs-validation" novalidate  action="{{ route('Image.store') }}" method="post" enctype="multipart/form-data">
        {{csrf_field()  }}
        <div >
                      <label class="form-control-label" for="validationCustom01">Nom Image</label>
                      <input type="text" class="form-control" name="Nom" id="validationCustom01" placeholder="Nom Hotel"  required>
                      <div class="invalid-feedback">
                        Please choose a Name Image .
                      </div>
                    </div>
                  <label class="form-control-label" for="exampleFormControlSelect1">Select Image</label>

                  <div class="custom-file">
                    <input type="file" name="Path" class="custom-file-input" id="customFileLang" lang="en">
                    <label class="custom-file-label" for="customFileLang">Select file</label>
                  </div>

                  <div class="form-group">
                    <label class="form-control-label"  for="exampleFormControlSelect1">Select Hotel</label>
                    <select class="form-control" name="Id_Hotel" id="exampleFormControlSelect1">
                    @foreach ($hotels as $hotel)
                                    <option value="{{$hotel->Id_Hotel}}">{{$hotel->Nom}}</option>

                    @endforeach
                    </select>
                  </div>

                  <button class="btn btn-primary" type="submit">Add Image</button>
        </form>
              </div>
            </div>


          </div>
        </div>
      </div>

    </div>
  </div>
@endsection
