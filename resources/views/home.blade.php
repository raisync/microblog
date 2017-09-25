@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <form class="form-horizontal" method="POST" action="{{ url('/add') }}">
      {{csrf_field()}}
        <fieldset>
          <legend>Newsfeed</legend>
          @if(session('info'))
            <div class="alert alert-success">
              {{session('info')}}
            </div>
          @endif
          @if(count($errors) > 0)
            @foreach($errors->all() as $error)
            <div class="alert alert-danger">
              {{$error}}
            </div>
            @endforeach
          @endif
            <div class="col-lg-12">
              <textarea name="feed" class="form-control" rows="3" id="textArea" maxlength="150" placeholder="What's on your mind?" style="margin-bottom: 10px;"></textarea>
              <div class="col-md-11" style="margin-bottom: 10px;"></div>
              <button class="btn btn-primary col-md-1" type="submit">Post</button>
            </div>
        </fieldset>
      </form> 
        <div class="col-lg-12">
          <br>
        </div>
        @if(count($feeds) > 0)
        <div class="infinite-scroll">
        @foreach($feeds->all() as $feed)
        <div class="col-lg-12">
          <blockquote>
            <p style="word-wrap: break-word;">{{ $feed->feed }}</p>
            <small>{{ $feed->created_at->diffForHumans() }}</small>
          </blockquote>
        </div>
        @endforeach
        {{ $feeds->links() }}
        </div>
        @endif
    </div>
  </div>
</div>
@endsection
