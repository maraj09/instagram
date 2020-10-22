@extends('layouts.app')

@section('content')
<div class="container">
    <h2  class="py-5 text-success" style="text-align: center;  ">Add  New Post</h2>
    <form action="/p"  enctype="multipart/form-data" method="post" >
        @csrf
        <div class="form-group row">
            <label for="caption" class="col-4 col-form-label text-right font-weight-bolder ">{{ __('Caption') }}</label>
            <div class="col-6">
                <input id="caption" type="caption" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}"  autocomplete="caption">
                @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <label for="image" class="col-4 align-items-baseline text-right font-weight-bolder pt-4 ">{{ __('Image') }}</label>
            <div class="col-6 mt-4">
                <input type="file" class="@error('image') is-invalid @enderror"  name="image" id="">
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <label for="" class="col-4"></label>
            <div class="col-6  mt-5 ">
                <button type="submit"  class="btn btn-primary mr-2 ">Add New Post</button>
                <button type="rest"  class="btn btn-danger ">Reset</button>
            </div>
        </div>

        
    </form>
</div>
@endsection
