@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Posts</div>

                    <div class="card-body">

                        @if(count($posts) > 0)
                            @foreach($posts as $post)
                                <div class="well">
                                    <h3>{{$post->title}}</h3>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
