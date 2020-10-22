<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;
class profilecontroller extends Controller
{
    public function index(User $user)
    {   
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        
        return view('profile.profile',compact('user', 'follows'));
        
    }
    public function edit(User $user)
    {
        $this->authorize('update',$user->profile);
        return view('profile.edit',compact('user'));
    }


    public function update(User $user)
    {
        $this->authorize('update',$user->profile);
        $data = request()->validate([
            'title' => 'required',
            'body' => 'required',
            'url' => 'required',
            'image' => '',
        ]);
        if (request('image')) {
            $imagepath = request('image')->store('uploads','public');
            $img = ['image'=> $imagepath];
        }
        auth()->user()->profile->update(array_merge(
            $data,
            $img ?? []
        ));
        return redirect("/profile/{$user->id}");
    }
}
