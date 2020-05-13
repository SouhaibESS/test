<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::all();

        return view('home', compact('posts'));
    }

    public function createPost(Request $request) 
    {
        $data = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $user = auth()->user();
        $user->posts()->create($data);

        $request->session()->flash('success', 'post created succesfuly');
        return redirect()->back();
    }

    public function editPost(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function updatePost(Request $request,Post $post) 
    {
        $data = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        
        $post->update($data);
        $request->session()->flash('success', 'post updated succesfuly');
        return redirect(route('home'));
    }

    public function deletePost(Post $post) 
    {
        $post->delete();
        Request()->session()->flash('danger', 'post deleted');
        return redirect()->back();
    }

}
