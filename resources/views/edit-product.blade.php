@extends('layouts.app')

@push('page-css')
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
@endpush

@push('page-header')
    <div class="col-sm-12">
        <h3 class="page-title">Edit Product</h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Product</li>
        </ul>
    </div>
@endpush

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body custom-edit-service">


                    <!-- Edit Medicine -->
                    <form method="post" enctype="multipart/form-data" id="update_service"
                        action="{{ route('edit-product', $product) }}">
                        @csrf

                        <div class="service-fields mb-3">
                            <div class="row">

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Category <span class="text-danger">*</span></label>
                                        <select class="select2 form-select form-control" name="category">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>Status <span class="text-danger">*</span></label>
                                        <select class="select2 form-select form-control" name="status">
                                            @foreach ($statuses as $status)
                                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="service-fields mb-3">
                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Cubical Number<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="Cubical_Number"
                                            value="{{ $product->Cubical_Number }}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Lcd Code <span class="text-danger">*</span></label>
                                        <input class="form-control" value="{{ $product->Lcd_Code }}" type="text"
                                            name="Lcd_Code" value="">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="service-fields mb-3">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Headset Code <span class="text-danger">*</span></label>
                                        <textarea class="form-control service-desc" value="{{ $product->Headset_Code }}"
                                            name="Headset_Code">{{ $product->Headset_Code }}</textarea>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="service-fields mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>CPU Detail<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="CPU_Detail"
                                            value="{{ $product->CPU_Detail }}">
                                    </div>
                                </div>

                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn" type="submit" name="form_submit"
                                        value="submit">Submit</button>
                                </div>
                    </form>
                    <!-- /Edit Medicine -->
                </div>
            </div>
        </div>
    </div>
@endsection


@push('page-js')
    <!-- Select2 JS -->
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
@endpush
