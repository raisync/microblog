@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form class="form-horizontal">
				{{csrf_field()}}
				<fieldset>
					<legend>
						Profile
              			<a href="{{ url('/friends') }}" class="btn btn-sm btn-primary" style="float: right;">Back</a>
					</legend>
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
				<form class="form-horizontal">
					<fieldset>
						@if(count($users) > 0)
							@foreach($users as $user)
								<div class="form-group" style="text-align: center;">
									<div class="col-lg-5">
									</div>
									<div class="col-lg-5">
										<img src="{{ URL::asset('uploads/avatars/'.$user->avatar) }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
									</div>
								</div>
								<div class="form-group">
									<label for="firstname" class="col-lg-2 control-label">Firstname</label>
									<div class="col-lg-10">
										<input type="text" class="form-control" id="firstname" placeholder="Firstname" value="{{ $user->firstname }}" disabled>
									</div>
								</div>
								<div class="form-group">
									<label for="lastname" class="col-lg-2 control-label">Lastname</label>
									<div class="col-lg-10">
										<input type="text" class="form-control" id="lastname" placeholder="Lastname" value="{{ $user->lastname }}" disabled>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail" class="col-lg-2 control-label">Username</label>
									<div class="col-lg-10">
										<input type="text" class="form-control" id="inputEmail" placeholder="Email" value="{{ $user->username }}" disabled>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail" class="col-lg-2 control-label">Email</label>
									<div class="col-lg-10">
										<input type="text" class="form-control" id="inputEmail" placeholder="Email" value="{{ $user->email }}" disabled>
									</div>
								</div>
							@endforeach
						@else
							<div class="col-lg-2">
							</div>
							<div class="col-lg-10">
								<p style="text-align: center;">The user does not exist</p>
							</div>
						@endif
					</fieldset>
					<fieldset>
						@if(count($feeds) > 0)
				        <div class="infinite-scroll">
							@foreach($feeds->all() as $feed)
								<div class="form-group" style="border: 2px solid #CCCCCC; border-radius: 12px; padding-top: 20px; padding-bottom: 20px;">
									<div class="col-lg-12">
										<p style="word-wrap: break-word;">{{ $feed->feed}}</p>
										<small style="float: right;">- 
											<?php
												echo Carbon\Carbon::parse($feed->created_at)->diffForHumans();
											 ?>
										 </small>
									</div>
								</div>
							@endforeach
        					{{ $feeds->links() }}
							</div>
						@else
							<div class="col-lg-2">
							</div>
							<div class="col-lg-10">
								<p style="text-align: center;">No post</p>
							</div>
						@endif
					</fieldset>
				</form>
			</div>
			<div class="col-lg-3">
			</div>
		</div>
	</div>
</div>
@endsection