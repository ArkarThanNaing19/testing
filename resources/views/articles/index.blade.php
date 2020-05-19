@extends('layouts.app')

@section('content')
<div class="container">
  @auth
    <div class="row float-right">
      <a href="{{ url("/articles/add") }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Article</a>
    </div>
  @endauth

  <div class="clearfix"></div>

    <div class="row justify-content-center ">
      <div class="col-md-8">
        @if(session('error'))
          <div class="alert alert-danger">
              {{ session('error') }}
          </div>
        @endif
        @if(session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
        @endif
      </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">

          {{ $articles->links() }}

          @forelse( $articles as $a )
            <div class="card mb-3">

              <div class="card-header d-flex justify-content-between">
                <h4> {{ $a->title }} </h4>
                <small>POST ID : {{ $a->full_number }}</small>
                <a href='{{ url("/articles/delete/$a->id") }}' class="close">
                    &times;
                </a>
              </div>

              <div class="card-body">
                <p>  {{ $a->body }} </p>
                <a href='{{ url("articles/detail/{$a->id}") }}' class="btn btn-info">View Detail</a>
              </div>

              <div class="card-footer">
                <small> By <b>{{ $a->user->name }}</b> </small>
                <small class="float-right">{{ $a->created_at->diffForHumans() }} </small>
              </div>

            </div>
          @empty
          <div class="card">
            <div class="card-body">
              <h3 class="text-center"> No Article Posts Found.</h3>
            </div>
          </div>
          @endforelse
        </div>
    </div>
</div>
@endsection
