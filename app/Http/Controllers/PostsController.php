<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Posts;
use Carbon\Carbon;
use Storage;
use Auth;

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
        $form["user_id"] = Auth::id();
        
        if(isset($form['image'])) {
            $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
            $post->image_path = Storage::disk('s3')->url($path);
        } else {
            $post->image_path = null;
        }
        
        unset($form['_token']);
        unset($form['image']);
        
        $post->fill($form);
        $post->save();
        
        return redirect('/');
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
        return view('post.detail', ['post_form' => $post]);
    }
    
        public function edit(Request $request)
    {
        $post = Posts::find($request->id);
        if (empty($post)) {
            abort(404);
        }
        $this->postUserJudgment($post->user_id);
        return view('post/edit', ['post_form' => $post]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Posts::$rules);
        $post = Posts::find($request->id);
        $post_form = $request->all();
        if ($request->remove == 'true') {
          $post_form['image_path'] = null;
      } elseif ($request->file('image')) {
          $path = Storage::disk('s3')->putFile('/',$post_form['image'],'public');
          $post->image_path = Storage::disk('s3')->url($path);
      } else {
          $post_form['image_path'] = $post->image_path;
      }
        unset($post_form['_token']);
        unset($post_form['image']);
        
        $post->fill($post_form)->save();
        return redirect('/');
    }
    
    public function delete(Request $request)
    {
        $post = Posts::find($request->id);
        $this->postUserJudgment($post->user_id);
        $post->delete();
        
        return redirect('/');
    }
    
    private function postUserJudgment($postUserId)
    {
        if ($postUserId !== Auth::id()){
            abort(403);
        }
    }
    
    
    //public function __construct(){
       // $this->middleware('auth')->only([ 'edit', 'update', 'delete']);
       // $this->middleware('can:update,article')->only(['edit', 'update']);
       // $this->middleware('verified')->only('create');
   // }
}

