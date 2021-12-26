@extends('layouts.index')
@section('title', '投稿一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h1>投稿一覧</h1>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('PostsController@add') }}" role="button" class="btn btn-primary">新規投稿</a> 
            </div>
            <div class="col-md-8">
                <form action="{{ action('PostsController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
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
            <div class="list-post col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-light">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="10%">タイトル</th>
                                <th width="10%">著者名</th>
                                <th width="10%">出版社</th>
                                <th width="10%">出版日</th>
                                <th width="20%">お気に入りの言葉</th>
                                <th width="20%">感想</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($post as $posts)
                                <tr>
                                    <th>{{ $post->id }}</th>
                                    <td>{{ \Str::limit($post->title, 100) }}</td>
                                    <td>{{ \Str::limit($post->author, 20 }}</td>
                                    <td>{{ \Str::limit($post->publisher, 20 }}</td>
                                    <td>{{ \Str::limit($post->publication_date, 20 }}</td>
                                    <td>{{ \Str::limit($post->word, 100 }}</td>
                                    <td>{{ \Str::limit($post->feelings, 100 }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('PostsController@edit', ['id' => $posts->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('PostsController@delete', ['id' => $posts->id]) }}">削除</a>   
                                        </div>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>    
            </div>
        </div>
    </div>