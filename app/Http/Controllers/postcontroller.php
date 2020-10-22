<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Post;
use GuzzleHttp\Middleware;

class postcontroller extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }    
    public function index()
    {
        $user = auth()->user()->following()->pluck('profiles.user_id');
        $post = Post::whereIn('user_id',$user)->latest()->get();
        return view('index',compact('post'));
    }
    public function create()
    {
        return view('post.create');
    }
    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' =>'required|image',
        ]);
        $imgpath = request('image')->store('uploads','public');
        auth()->user()->post()->create([
            'caption' => $data['caption'],
            'image' => $imgpath ,
        ]);
        return redirect('/profile/'.auth()->user()->id);
        
    }
    public function show(\App\Post $post)
    {
        return view('post.show',compact('post'));
    }
}
