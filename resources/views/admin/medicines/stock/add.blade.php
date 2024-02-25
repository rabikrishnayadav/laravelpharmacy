@extends('admin.layouts.app')
@section('content')

<div class="pagetitle">
	<h1>Add Medicine Stock</h1>
</div>

<section class="section">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Medicine Stock</h5>
					
					<form method="post" action="{{ url('admin/medicines_stock/add') }}" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="row mb-3">
							<label class="col-sm-2 col-form-label">Medicine Name<span style="color:red;">*</span></label>
							<div class="col-sm-10">
								<select class="form-control" name="medicines_id" required>
									<option>Select Medicine Name</option>
									@foreach($getRecord as $value)
									<option value="{{ $value->id }}">{{ $value->name }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="row mb-3">
							<label class="col-sm-2 col-form-label">Batch ID<span style="color:red;">*</span></label>
							<div class="col-sm-10">
								<input type="text" name="batch_id" value="{{ old('batch_id') }}" class="form-control" required>
							</div>
						</div>

						<div class="row mb-3">
							<label class="col-sm-2 col-form-label">Expiry Date<span style="color:red;">*</span></label>
							<div class="col-sm-10">
								<input type="date" name="expiry_date" value="{{ old('expiry_date') }}" class="form-control" required>
							</div>
						</div>

						<div class="row mb-3">
							<label class="col-sm-2 col-form-label">Quantity<span style="color:red;">*</span></label>
							<div class="col-sm-10">
								<input type="text" name="quantity" value="{{ old('quantity') }}" class="form-control" required>
							</div>
						</div>

						<div class="row mb-3">
							<label class="col-sm-2 col-form-label">MRP<span style="color:red;">*</span></label>
							<div class="col-sm-10">
								<input type="text" name="mrp" value="{{ old('mrp') }}" class="form-control" required>
							</div>
						</div>

						<div class="row mb-3">
							<label class="col-sm-2 col-form-label">Rate<span style="color:red;">*</span></label>
							<div class="col-sm-10">
								<input type="text" name="rate" value="{{ old('rate') }}" class="form-control" required>
							</div>
						</div>

						<div class="row mb-3">
							<label class="col-sm-2 col-form-label"></label>
							<div class="col-sm-10">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</section>


@endsection