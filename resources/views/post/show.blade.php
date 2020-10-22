@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-top:200px">
        <div class="col-7">
            <img src="/storage/{{  $post->image  }}" width="600px" height="400px">
        </div>
        <div class="col-2">
            <div class="d-flex pb-4" style="border-bottom: 1px solid gray">
                <img src="{{ $post->user->profile->proImg()  }}" alt="" srcset="" width="60px" height="60px" class="rounded-circle">
                <h4 class="m-3"><a href="/profile/{{ $post->user->id }}">{{ $post->user->name }}</a></h4>
            </div>
            <div class="mt-2">
                <span style="font-weight: bold; font-size:18px">{{ $post->caption }}</span>
            </div>
        </div>
    </div>
</div>
@endsection
