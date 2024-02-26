@extends('admin.layouts.app')
@section('content')

<div class="pagetitle">
	<h1>Update Profile</h1>
</div>

<section class="section">
	<div class="row">
		<div class="col-lg-12">
			@include('_message')
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Profile</h5>

					<form method="post" action="{{ url('admin/my_account') }}" enctype="multipart/form-data">
						{{ csrf_field() }}
						
						<div class="row mb-3">
							<label class="col-sm-2 col-form-label">Name<span style="color:red;">*</span></label>
							<div class="col-sm-10">
								<input type="text" name="name" value="{{ $getRecord->name }}" class="form-control" required>
								<span style="color:red;">{{ $errors->first('name') }}</span>
							</div>
						</div>

						<div class="row mb-3">
							<label class="col-sm-2 col-form-label">Email<span style="color:red;">*</span></label>
							<div class="col-sm-10">
								<input type="email" name="email" value="{{ $getRecord->email }}" class="form-control" required>
								<span style="color:red;">{{ $errors->first('email') }}</span>
							</div>
						</div>

						<div class="row mb-3">
							<label class="col-sm-2 col-form-label">Profile Image</label>
							<div class="col-sm-10">
								<input type="file" name="profile_image" class="form-control">
								@if(!empty($getRecord->profile_image))
								<img src="{{ $getRecord->getProfileImage() }}" height="100px" width="150px">
								@endif
								<span style="color:red;">{{ $errors->first('profile_image') }}</span>
							</div>
						</div>

						<div class="row mb-3">
							<label class="col-sm-2 col-form-label">Password</label>
							<div class="col-sm-10">
								<input type="password" name="password" class="form-control">
								(leave blank if you are not changing the password)
								<span style="color:red;">{{ $errors->first('password') }}</span>
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