@extends('layouts.layout')
@section('title', 'つぶやきの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>つぶやき編集</h2>
                <form action="{{ route('post.update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="post">本文</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="body" value="{{ $posts->body }}">
                        </div>
                    </div>

                    <input type="hidden" name="id" value="{{ $posts->id }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <input type="submit" class="update-btn" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection