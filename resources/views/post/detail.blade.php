@extends('layouts.post')

@section('title', '投稿の詳細')

@section('content')
    <div class="container"> 
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1>投稿の詳細</h1>
                <form action="{{ action('PostsController@create') }}" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group row">
                        <label class="col-md-3" for="title">タイトル</label>
                        <div class="col-md-5">
                            <p>{{ $post_form->title }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="author">著者</label>
                        <div class="col-md-5">
                            <p>{{ $post_form->author }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="publisher">出版社</label>
                        <div class="col-md-5">
                            <p>{{ $post_form->publisher }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="publication_date">出版日</label>
                        <div class="col-md-5">
                           <p>{{ $post_form->publication_date }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="word">お気に入りの言葉</label>
                        <div class="col-md-5">
                            <p>{{ $post_form->word }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="feelings">感想</label>
                        <div class="col-md-5">
                            <p>{{ $post_form->feelings }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="image">画像</label>
                        <div class="col-md-5">
                            <p>{{ $post_form->image }}</p>
                        </div>
                    </div>
            </div> 
        </div>
    </div>
@endsection