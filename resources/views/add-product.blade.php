@extends('layouts.app')

@push('page-css')
	<!-- Select2 CSS -->
	<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
@endpush

@push('page-header')
<div class="col-sm-12">
	<h3 class="page-title">Add Product</h3>
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
		<li class="breadcrumb-item active">Add Product</li>
	</ul>
</div>
@endpush


@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-body custom-edit-service">

			<!-- Add Medicine -->
			<form method="post" enctype="multipart/form-data" id="update_service" action="{{route('add-product')}}">
				@csrf
				<div class="service-fields mb-3">
					<div class="row">

						<div class="col-lg-4">
                            <div class="form-group">
                                <label>Category <span class="text-danger">*</span></label>
                                <select class="select2 form-select form-control" name="category">
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
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
								<input class="form-control" type="text" name="Cubical_Number">
							</div>
						</div>

						<div class="col-lg-6">
							<div class="form-group">
								<label>LCD Code<span class="text-danger">*</span></label>
								<input class="form-control" type="text" name="Lcd_Code" value="">
							</div>
						</div>

                        <div class="col-lg-6">
							<div class="form-group">
								<label>Headset Code<span class="text-danger">*</span></label>
								<input class="form-control" type="text" name="Headset_Code" value="">
							</div>
						</div>

					</div>
				</div>
				<div class="service-fields mb-3">
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label>CPU Detail <span class="text-danger">*</span></label>
								<textarea class="form-control service-desc" name="CPU_Detail"></textarea>
							</div>
						</div>

					</div>
				</div>


				<div class="submit-section">
					<button class="btn btn-primary submit-btn" type="submit" name="form_submit" value="submit">Submit</button>
				</div>
			</form>
			<!-- /Add Medicine -->


			</div>
		</div>
	</div>
</div>
@endsection

@push('page-js')
	<!-- Select2 JS -->
	<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
@endpush

