@extends('layouts.app')

@section('content')
<div class="container">
  @auth
    <div class="row float-right">
      <a href="{{ url("/articles/add") }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Article</a>
    </div>
  @endauth

    <div class="clearfix"></div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card mb-3">

              <div class="card-header d-flex justify-content-between">
                <h4> {{ $article->title }} </h4>
                <small>POST ID : {{ $article->full_number }}</small>
              </div>

              <div class="card-body">
                <p>  {{ $article->body }} </p>
              </div>

              <div class="card-footer">
                <small> By <b>{{ $article->user->name }}</b> </small>
                <small class="float-right">{{ $article->created_at->diffForHumans() }} </small>
              </div>

            </div>
        </div>
    </div>
</div>
@endsection
