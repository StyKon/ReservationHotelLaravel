@extends('layouts.admin')
@section('content')
<div class="header bg-primary pb-6">
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
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Discount Management</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{ route('Promotion.index') }}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="{{ route('Promotion.index') }}">Discount</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Index</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
            <a href="{{ url('Admin/Promotion/create') }}" class="btn btn-sm btn-neutral">Add New Discount</a>

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <h3 class="mb-0">Liste Discount</h3>

            </div>
            <div class="table-responsive py-4">
              <table class="table table-flush" id="datatable-basic">
                <thead class="thead-light">
                  <tr>
                    <th>#</th>
                    <th>DateDeb</th>
                    <th>DateFin</th>
                    <th>Remise</th>
                    <th>Hotel</th>
                    <th class="td-actions text-right">Actions</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>DateDeb</th>
                    <th>DateFin</th>
                    <th>Remise</th>
                    <th>Hotel</th>
                    <th class="td-actions text-right">Actions</th>
                  </tr>
                </tfoot>
                <tbody>
                @foreach($promotions as $promotion)
                  <tr>
                    <td>{{$loop->index+1}}.</td>
                    <td>{{$promotion->DateDeb}}</td>
                    <td>{{$promotion->DateFin}}</td>
                    <td>{{$promotion->Remise}}</td>
                    <td>{{$promotion->hotel->Nom}}</td>
                    <td class="td-actions text-right">

<a href="{{route('Promotion.edit',$promotion->Id_Promotion)}}" class="table-action" data-toggle="tooltip" data-original-title="Edit Promotion">
  <i class="fas fa-user-edit"></i>
</a>

@csrf
@method('DELETE')
<meta name="csrf-token" content="{{ csrf_token() }}">
<a    href="{{route('Promotion.destroy',$promotion->Id_Promotion)}}" class="table-action table-action-delete" data-method="delete" data-toggle="tooltip" data-original-title="Delete Promotion">

 <i class="fas fa-trash"></i>
</a>
</td>
                  </tr>
                @endforeach

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection
