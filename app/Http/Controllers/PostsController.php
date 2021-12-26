<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Posts;

class PostsController extends Controller
{
    //
    public function add()
    {
        return view('post.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Posts::$rules);
        $post = new Posts;
        $form = $request->all();
        
        unset($form['_token']);
        
        $post->fill($form);
        $post->save();
        
        return redirect('post/create');
    }
    
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            $post = Posts::where('title', $cond_title)->get();
        } else {
            $post = Posts::all();
        }
        return view('post.index', ['posts' => $post, 'cond_title' => $cond_title]);
    }
}
