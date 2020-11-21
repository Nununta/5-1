@extends('layouts.layout')
@section('title', '予定の編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>予定編集</h2>
                <form action="{{ action('Admin\PostController@update') }}" method="post" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" name="body" value="{{ $todo_form->body }}">
                        </div>
                    </div>

                    <input type="hidden" name="id" value="{{ $todo_form->id }}">
                    {{ csrf_field() }}
                    <input type="submit" class="update-btn" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection