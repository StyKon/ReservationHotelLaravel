@extends('layouts.admin')
@section('content')
  <!-- Header -->
  <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Category Management</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('Category.index') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('Category.index') }}">Category</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
            <a href="{{ route('Category.index') }}" class="btn btn-sm btn-neutral">Back to list</a>

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
                <h3 class="mb-0">Edit Category</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">


              <form class="needs-validation" novalidate  action="{{ route('Category.update',$category->Id_Category) }}" method="post">
                @csrf
                @method('PUT')
                  <div class="form-group">
                    <label class="form-control-label" for="exampleFormControlSelect1">Select Type</label>
                    <select class="form-control" name="Type" id="exampleFormControlSelect1" required>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                  <button class="btn btn-primary" type="submit">Update Category</button>
                </form>
              </div>
            </div>


          </div>
        </div>
      </div>

    </div>
  </div>

@endsection
