@if(!empty($getRecord))
<form method="post" action="{{ url('admin/medicines/edit/'.$getRecord->id) }}" enctype="multipart/form-data">
@else
<form method="post" action="{{ url('admin/medicines/add') }}" enctype="multipart/form-data">
@endif

	{{ csrf_field() }}
	<div class="row mb-3">
		<label class="col-sm-2 col-form-label">Medicine Name<span style="color:red;">*</span></label>
		<div class="col-sm-10">
			<input type="text" name="name" class="form-control" value="{{ old('name', !empty($getRecord) ? $getRecord->name : '') }}" required>
		</div>
	</div>

	<div class="row mb-3">
		<label class="col-sm-2 col-form-label">Packing<span style="color:red;">*</span></label>
		<div class="col-sm-10">
			<input type="text" name="packing" class="form-control" value="{{ old('packing', !empty($getRecord) ? $getRecord->packing : '') }}" required>
		</div>
	</div>

	<div class="row mb-3">
		<label class="col-sm-2 col-form-label">Generic Name<span style="color:red;">*</span></label>
		<div class="col-sm-10">
			<input type="text" name="generic_name" class="form-control" value="{{ old('generic_name', !empty($getRecord) ? $getRecord->generic_name : '') }}" required>
		</div>
	</div>

	<div class="row mb-3">
		<label class="col-sm-2 col-form-label">Supplier Name<span style="color:red;">*</span></label>
		<div class="col-sm-10">
			<input type="text" name="supplier_name" class="form-control" value="{{ old('supplier_name', !empty($getRecord) ? $getRecord->supplier_name : '') }}" required>
		</div>
	</div>

	<div class="row mb-3">
		<label class="col-sm-2 col-form-label"></label>
		<div class="col-sm-10">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</div>

</form>