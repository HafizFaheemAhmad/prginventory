@extends('layouts.app')

@push('page-css')
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
@endpush

@push('page-header')
    <div class="col-sm-7 col-auto">
        <h3 class="page-title">{{ $category->name }}</h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Deparments</li>
        </ul>
    </div>
    {{-- <div class="col-sm-5 col">
        <a href="#add_categories" data-toggle="modal" class="btn btn-primary float-right mt-2">Add Department</a>
    </div> --}}
@endpush

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <br>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-center mb-0">
                            <table id="datatable-export" class="table table-hover table-center mb-0">

                                <thead>
                                    <th>ID</th>
                                    <th>Department Name</th>
                                    <th>Cubical Number</th>
                                    <th>Status</th>
                                    <th>Created date</th>
                                    <th>Update date</th>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td><a href="{{ route('product-show', $product) }}">{{ $product->id }}</a>
                                            </td>
                                            <td>{{ $category->name }}</td>
                                            <td><a
                                                    href="{{ route('product-show', $product) }}">{{ $product->Cubical_Number }}</a>
                                            </td>
                                            <td>{{ $product->status->name }}</td>
                                            <td>{{ date('d-M-Y / h:i:s', strtotime($product->created_at)) }}</td>
                                            <td>{{ date('d-M-Y / h:i:s', strtotime($product->updated_at)) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="add_categories" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('categories') }}">
                        @csrf
                        <div class="row form-row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Category</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
