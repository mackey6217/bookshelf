<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Posts;
use Carbon\Carbon;
use Storage;

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
        
        //dd($form['image']);
        if(isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $post->image_path = basename($path);
        } else {
            $post->image_path = null;
        }
        
        
        unset($form['_token']);
        unset($form['image']);
        
        $post->fill($form);
        $post->save();
        
        return redirect('post');
    }
    
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            $posts = Posts::where('title', $cond_title)->get();
        } else {
            $posts = Posts::all();
        }
        return view('post.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function detail(Request $request)
    {
        $post = Posts::find($request->id);
        $form = $request->all();
        
        if (empty($post)) {
            about(404);
        }
        //dd($form['image']);
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $post->image_path = basename($path);
        } else {
            $post->image_path = null;
        }
        return view('post.detail', ['post_form' => $post]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Posts::$rules);
        $post = Posts::find($request->id);
        $post_form = $request->all();
        unset($post_form['_token']);
        
        $post->fill($post_form)->save();
        
        return redirect('post');
    }
    
    public function delete(Request $request)
    {
        $post = Posts::find($request->id);
        $post->delete();
        return redirect('post');
    }
}
