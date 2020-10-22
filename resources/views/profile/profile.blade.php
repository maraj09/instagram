@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="border-bottom:1px solid rgb(238, 238, 238);">
        <div class="col-3 p-5">
            <img class="w-100 rounded-circle" src="{{ $user->profile->proImg()  }}" height="200px" alt="">
            
        </div>
        <div class="col-9 pt-5" >
            <div class="d-flex justify-content-between align-items-baseline"> 
                <div class=" d-flex align-items-center">
                    <h2 class="mt-2">{{ $user->name }}</h2>
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}" ></follow-button>
                </div>
                
                @can('update', $user->profile)
                <a href="/p/create">Add New Post</a>
                @endcan
            </div>
            @can('update', $user->profile)
            <a href="/profile/{{  $user->id  }}/edit">Edit Profile</a>
            @endcan
            <div class="mt-2 d-flex">
                <div class="pr-4"><span style="font-weight:bold">{{ $user->post->count() }}</span> Posts</div>
                <div class="pr-4"><span style="font-weight:bold">{{ $user->profile->followers->count() }}</span> followers</div>
                <div class="pr-4"><span style="font-weight:bold">{{ $user->following->count() }}</span> following</div>
            </div> 
            <div class="font-weight-bold pt-3" style="font-size: 15px"> {{  $user->profile->title }}</div>
            <div> {{ $user->profile->body }}</div>
            <div  style="font-size: 16px"><a href="" style="color: rgb(4, 58, 173)">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-12" style="text-align:center" >
            <img src="/image/logo.png" alt="" width="25px" style="margin-top: -5px">
            <span style="font-weight: bold; font-size:16px;" >POSTS</span>
        </div>
    </div>
    <div class="row pt-3">
        @foreach ($user->post as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{   $post->id   }}"><img src="/storage/{{  $post->image  }}" class="w-100 "></a>
        </div>
        @endforeach
    </div>
</div>
@endsection
