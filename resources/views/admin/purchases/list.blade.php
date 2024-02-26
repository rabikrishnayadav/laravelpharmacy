@extends('admin.layouts.app')
@section('content')

<div class="pagetitle">
	<h1>Purchases List</h1>
</div>

<section class="section">
	<div class="row">
		<div class="col-lg-12">
			@include('_message')
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">
						<a href="{{ url('admin/purchases/add') }}" class="btn btn-primary">Add New Purchase</a>
					</h5>

					<table class="table datatable">
						<thead>
							<tr>
								<th scope="col">ID</th>
								<th scope="col">Supplier Name</th>
								<th scope="col">Invoice Number</th>
								<th scope="col">Voucher  Number</th>
								<th scope="col">Purchase Date</th>
								<th scope="col">Total Amount</th>
								<th scope="col">Payment Status</th>
								<th scope="col">Created At</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($getRecord as $value)
							<tr>
								<th scope="row">{{ $value->id }}</th>
								<td>{{ $value->getSuppliersName->suppliers_name }}</td>
								<td>{{ $value->invoices_id }}</td>
								<td>{{ $value->voucher_number }}</td>
								<td>{{ $value->purchase_date }}</td>
								<td>{{ $value->total_amount }}</td>
								<td>
									@if($value->payment_status == 1)
									Pending
									@elseif($value->payment_status == 2)
									Accept
									@elseif($value->payment_status == 3)
									Cancel
									@endif
								</td>
								<td>{{ date('d-m-Y H:i:s', strtotime($value->created_at)) }}</td>
								<td>
									<a href="{{ url('admin/purchases/edit/'.$value->id) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
									<a href="{{ url('admin/purchases/delete/'.$value->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')"><i class="bi bi-trash"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection