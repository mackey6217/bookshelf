@extends('layouts.post')

@section('title', '投稿の編集')

@section('content')
    <div class="container"> 
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1>投稿の編集</h1>
                <form action="{{ action('PostsController@edit') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif                    
                    <div class="form-group row">
                        <label class="col-md-3" for="title">タイトル</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="title" value="{{ $post_form->title }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="author">著者</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="author" value="{{ $post_form->author }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="publisher">出版社</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="publisher" value="{{ $post_form->publisher }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="publication_date">出版日</label>
                        <div class="col-md-5">
                           <input type="text" class="form-control" name="publication_date" value="{{ $post_form->publication_date }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="word">お気に入りの言葉</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="word" value="{{ $post_form->word }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="feelings">感想</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="feelings" value="{{ $post_form->feelings }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                <img src="{{ $post_form->image_path }}" style="max-width:450px">
            
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $post_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection