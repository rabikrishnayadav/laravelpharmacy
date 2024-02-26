@extends('admin.layouts.app')
@section('content')

<div class="pagetitle">
	<h1>Website Update</h1>
</div>

<section class="section">
	<div class="row">
		<div class="col-lg-12">
			@include('_message')
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Website Update</h5>

					<form method="post" action="{{ url('admin/website_update') }}" enctype="multipart/form-data">
						{{ csrf_field() }}
						
						<div class="row mb-3">
							<label class="col-sm-2 col-form-label">Website Name<span style="color:red;">*</span></label>
							<div class="col-sm-10">
								<input type="text" name="website_name" value="{{ $getRecord->website_name }}" class="form-control" required>
								<span style="color:red;">{{ $errors->first('website_name') }}</span>
							</div>
						</div>

						<div class="row mb-3">
							<label class="col-sm-2 col-form-label">Website Logo</label>
							<div class="col-sm-10">
								<input type="file" name="logo" class="form-control">
								@if(!empty($getRecord->logo))
								<img src="{{ $getRecord->getWebsiteLogo() }}" height="100px" width="100px">
								@endif
								<span style="color:red;">{{ $errors->first('logo') }}</span>
							</div>
						</div>

						<div class="row mb-3">
							<label class="col-sm-2 col-form-label"></label>
							<div class="col-sm-10">
								<button type="submit" class="btn btn-primary">Update</button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</section>


@endsection