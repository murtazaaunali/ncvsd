@extends('admin.layout.master')
@section('title')
    Admin | Dashboard
@endsection

@section('content')
<div class="content-page">
	<!-- Start content -->
	<div class="content">
		<div class="container">
			<div class="row">

				@if(Session::has('usersuccess'))
					{!! session('usersuccess') !!}
				@endif

				<div class="row">
					<div class="col-xs-12">
						<div class="page-title-box inner-page">
							<h4 class="page-title">Edit User</h4>
							<div class="clearfix"></div>
						</div>
					</div>
				</div> 

				<div class="card-box">
					
					<form class="formspace" enctype="multipart/form-data" method="POST" action="{{ route('updateuser') }}">
						{{ csrf_field() }}
						
						<input type="hidden" name="user_id" value="{{$user->id}}" />
						
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
									<label for="name" class="control-label">Full Name</label>
									<input id="name" type="text" class="form-control" name="name" @if(old('name') != '') value="{{ old('name') }}" @else value="{{$user->name}}" @endif required autofocus>

									@if ($errors->has('name'))
										<span class="help-block">
											<strong>{{ $errors->first('name') }}</strong>
										</span>
									@endif
								</div>
							</div>
							
							
							<div class="col-sm-6">
								<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
									<label for="email" class="control-label">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="email" @if(old('email') != '') value="{{ old('email') }}" @else value="{{$user->email}}" @endif required>

									@if ($errors->has('email'))
										<span class="help-block">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
									@endif
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
									<label for="password" class="control-label">New Password</label>
									<input id="password" type="password" class="form-control" name="password">

									@if ($errors->has('password'))
										<span class="help-block">
											<strong>{{ $errors->first('password') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<label for="password-confirm" class="control-label">Confirm New Password</label>
									<input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
								</div>
							</div>
						</div>
						
						<div class="row">
                        <div class="col-sm-6">
								<div class="form-group{{ $errors->has('usertype') ? ' has-error' : '' }}">
									<label for="usertype" class="control-label">User Type</label>
                                    <br>
                                    <select name="usertype" id="usertype" class="form-control">
                                    	<option  value="">Select User Type</option>
                                    	<option  value="Super Admin" {{ $user->user_type === 'Super Admin' ? 'selected' : '' }}>Super Admin</option>
                                        <option value="Sub Admin" {{ $user->user_type === 'Sub Admin' ? 'selected' : '' }}>Sub Admin</option>
                                        <option value="Contributor" {{ $user->user_type === 'Contributor' ? 'selected' : '' }}>Contributor</option>
									</select>
									@if ($errors->has('usertype'))
										<span class="help-block">
											<strong>{{ $errors->first('usertype') }}</strong>
										</span>
									@endif
								</div>
							</div>
							<div class="col-sm-6">
								@if($user->profile != "")
								<div>
									<img src="{!! asset('uploads/users/'.$user->id.'/'.$user->profile) !!}" width="100" height="100" />
								</div>
								@endif
								<div class="form-group{{ $errors->has('profile') ? ' has-error' : '' }}">
									<label for="profile" class="control-label">Profile Image</label>
									<input id="profile" type="file" class="form-control" name="profile" />

									@if ($errors->has('profile'))
										<span class="help-block">
											<strong>{{ $errors->first('profile') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group text-right">
									<div><label>&nbsp;</label></div>
									<button type="submit" class="btn btn-primary">
										Submit
									</button>
								</div>
							</div>
						
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('footer')
<script>
   
    
</script>
@endsection