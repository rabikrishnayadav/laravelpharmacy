@extends('admin.layouts.app')
@section('content')

<div class="pagetitle">
	<h1>Add Purchases</h1>
</div>

<section class="section">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Purchases</h5>

					<form method="post" action="{{ url('admin/purchases/add') }}" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="row mb-3">
							<label class="col-sm-2 col-form-label">Supplier Name<span style="color:red;">*</span></label>
							<div class="col-sm-10">
								<select class="form-control" name="suppliers_id" required>
									<option value="">Select Supplier Name</option>
									@foreach($getSuppliers as $value)
									<option value="{{ $value->id }}">{{ $value->suppliers_name }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="row mb-3">
							<label class="col-sm-2 col-form-label">Invoice Number<span style="color:red;">*</span></label>
							<div class="col-sm-10">
								<select class="form-control" name="invoices_id" required>
									<option value="">Select Invoice Number</option>
									@foreach($getInvoices as $value)
									<option value="{{ $value->id }}">{{ $value->id }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="row mb-3">
							<label class="col-sm-2 col-form-label">Voucher Number<span style="color:red;">*</span></label>
							<div class="col-sm-10">
								<input type="number" name="voucher_number" class="form-control" required>
							</div>
						</div>

						<div class="row mb-3">
							<label class="col-sm-2 col-form-label">Purchase Date<span style="color:red;">*</span></label>
							<div class="col-sm-10">
								<input type="date" name="purchase_date" class="form-control" required>
							</div>
						</div>

						<div class="row mb-3">
							<label class="col-sm-2 col-form-label">Total Amount<span style="color:red;">*</span></label>
							<div class="col-sm-10">
								<input type="number" name="total_amount" class="form-control" required>
							</div>
						</div>

						<div class="row mb-3">
							<label class="col-sm-2 col-form-label">Payment Status<span style="color:red;">*</span></label>
							<div class="col-sm-10">
								<select class="form-control" name="payment_status" required>
									<option value="">Select Payment Status</option>
									<option value="1">Pending</option>
									<option value="2">Approve</option>
									<option value="3">Cancel</option>
								</select>
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