<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $guarded = array('id');
    //
    public static $rules = array(
       'title' => 'required',
       'author' => 'required',
       'publisher' => 'required',
       'publication_date' => 'nullable',
       'word' => 'nullable',
       'feelings' => 'nullable',
       'image' => 'nullable',
       );
    
}
