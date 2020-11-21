@extends('layouts.layout')
@section('title', 'todos一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Todos一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\PostController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\PostController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">本文</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ str_limit($post->body, 255) }}</td>
                                <td>{{ $post->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>