@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form class="form-horizontal">
				{{csrf_field()}}
				<fieldset>
					<legend>Friends</legend>
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
				        <div class="infinite-scroll">
				        @foreach($users->all() as $user)
						<div class="form-group" style="margin-bottom: 20px;">
							<div class="col-lg-5">
								<img src="uploads/avatars/{{ $user->avatar }}" style="width:50px; height:50px; border-radius:50%; margin-right: 10px">
								<?php $encryptedId = encrypt($user->id) ?>
								<a href="<?php echo url('/stalk/'.$encryptedId); ?>">{{ $user->firstname }} {{ $user->lastname }}</a>
							</div>
							<div class="col-lg-5">
								{{ $user->username }}
								{{ $user->email }}
							</div>
						</div>
				        @endforeach
				        {{ $users->links() }}
				        </div>
				        @endif
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