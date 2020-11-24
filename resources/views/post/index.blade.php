@extends('layouts.layout')
@section('title', 'todos一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>つぶやき一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\PostController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\PostController@index') }}" method="get">
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="text" placeholder="つぶやきを検索して下さい" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card text-center">
            <div class="card-header">
                
            </div>
            @foreach($posts as $post)
                <div class="card card-body bg-light p-5">
                    <h5 class="card-title">ユーザ名</h5>
                    <h5 class="carg-title">{{ $post->created_at }}</h5>
                    <p class="card-text">{{ $post->body }}</p>
                    @if( $post->user_id === Auth::id())
                    <div>
                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">編集</a>
                    <a href="{{ route('post.delete', $post->id) }}" class="btn btn-danger">削除</a>
                    </div>
                    @endif
                </div>               
            @endforeach
        </div>
       
                    
            
                
            
        
    </div>
@endsection