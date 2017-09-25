@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form class="form-horizontal">
				{{csrf_field()}}
				<fieldset>
					<legend>Profile</legend>
					<div class="col-lg-12">
					</div>
				</fieldset>
			</form> 
			<div class="col-lg-12">
				<br>
			</div>
			<div class="col-lg-3">
			</div>
			<div class="col-lg-6 form-group">
				<form class="form-horizontal" enctype="multipart/form-data" action="{{ url('/update') }}" method="POST">
					<fieldset>
						<div class="form-group" style="text-align: center;">
							<div class="col-lg-5">
							</div>
							<div class="col-lg-5">
								<img src="uploads/avatars/{{ Auth::user()->avatar }}" id="imgProfile" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;"  onclick="$('#imgupload').trigger('click'); return false;">
								<input id="imgupload" type="file" name="avatar" style="display: none;" accept="image/*" onchange="readURL(this);">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
							</div>
						</div>
						<div class="form-group">
							<label for="firstname" class="col-lg-2 control-label">Firstname</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="firstname" placeholder="Firstname" value="{{ Auth::user()->firstname }}" disabled>
							</div>
						</div>
						<div class="form-group">
							<label for="lastname" class="col-lg-2 control-label">Lastname</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="lastname" placeholder="Lastname" value="{{ Auth::user()->lastname }}" disabled>
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail" class="col-lg-2 control-label">Email</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="inputEmail" placeholder="Email" value="{{ Auth::user()->email }}" disabled>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-12">
								<input type="submit" class="btn btn-sm btn-primary" style="float: right;">
							</div>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
		<div class="col-lg-3">
		</div>
	</div>
</div>
</div>
@endsection