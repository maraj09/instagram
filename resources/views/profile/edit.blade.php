@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 style="text-align: center" class="my-5">Edit Profile</h3>
        <form action="/profile/{{  $user->id  }}"  enctype="multipart/form-data" method="post" >
            @csrf
            @method('PATCH')
            <div class="form-group row">
                <label for="title" class="col-4 col-form-label text-right font-weight-bolder ">{{ __('Title') }}</label>
                <div class="col-6 ">
                    <input id="title" type="title" class="form-control  @error('title') is-invalid @enderror" name="title" value="{{ old('title') ??  $user->profile->title }}"  autocomplete="title" style="max-width: 400px">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong style="font-size: 15px">{{ $message }}</strong>
                        </span>
                    @enderror
                </div> <br><br><br>
                <label for="description" class="col-4 col-form-label text-right font-weight-bolder ">{{ __('Body') }}</label>
                <div class="col-6">
                    <input id="body" type="body" class="form-control  @error('body') is-invalid @enderror" name="body" value="{{ old('body') ??  $user->profile->body }}"  autocomplete="body" style="max-width: 400px">
                    @error('body')
                        <span class="invalid-feedback" role="alert">
                            <strong  style="font-size: 15px">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <br><br><br>
                <label for="url" class="col-4 col-form-label text-right font-weight-bolder ">{{ __('Url') }}</label>
                <div class="col-6">
                    <input id="url" type="url" class="form-control  @error('url') is-invalid @enderror" name="url" value="{{ old('url') ??  $user->profile->url }}"  autocomplete="url" style="max-width: 400px">
                    @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong  style="font-size: 15px">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <label for="image" class="col-4 align-items-baseline text-right font-weight-bolder pt-4 ">{{ __('Image') }}</label>
                <div class="col-6 mt-4">
                    <input type="file" class="@error('image') is-invalid @enderror"  name="image" id="">
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong  style="font-size: 15px">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <label class="col-4"></label>
                <div class="col-6 mt-5   ">
                    <button type="submit"  class="btn btn-primary mr-3 px-5">Save</button>
                    <button type="rest"  class="btn btn-danger ">Reset</button>
                </div>
            </div>
            
        </form>
    </div>
@endsection