@extends('layouts.post')

@section('title', '新規投稿')

@section('content')
    <div class="container"> 
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1>新規投稿</h1>
                <form action="{{ action('PostsController@create') }}" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group row">
                        <label class="col-md-3" for="title">タイトル</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="author">著者</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="author" value="{{ old('author') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="publisher">出版社</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="publisher" value="{{ old('publisher') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="publication_date">出版日</label>
                        <div class="col-md-5">
                            <input type="date" class="form-control" name="publication_date" value="{{ old('publication_date') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="word">お気に入りの言葉</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="word" value="{{ old('word') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="feelings">感想</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="feelings" value="{{ old('feelings') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3" for="image">画像</label>
                        <div class="col-md-5">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" onClick="delete_alert(event);return false;" class="btn btn-primary" value="投稿">
                </form>
            </div> 
        </div>
    </div>
    <script>
    function delete_alert(e){
    if(!window.confirm('本当に投稿しますか？')){
      window.alert('キャンセルされました'); 
      return false;
    }
    document.saveform.submit();
    };
    </script>
@endsection