<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>{{ config('app.name', 'Instagram') }}</title>
    
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <meta charset="utf-8">
        

        <title>Laravel</title>

        <!-- Fonts -->
        

        <!-- Styles -->
        <style>
            

            .full-height {
                height: 10vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

        </style>
    </head>
    <body>
        
        <div>
            <div class="container d-flex"  >
                <a class="navbar-brand col-3" style="margin-top:15px" href="{{ url('/') }}">
                    <img src="/svg/instagram.svg" width="20px" style="margin-top:-3px" class="mr-3">
                    <span class="pl-3" style="border-left:1px solid black; font-weight:bold;font-size:20px;color:black;">Instagram</span>
                </a>
                <ul class="navbar-nav col-4" style="margin-top:20px ">
                        <form action="" class="d-flex">
                            <input class="form-control shadow-none" placeholder="Search" type="text" style="height: 30px;outline: none;">
                            <button type="submit" class="btn btn-outline-success py-0" style="padding: 5px; pad">Search</button>
                        </form>
                        
                </ul>
            </div>
            
            
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/profile/'.auth()->user()->id) }}">Profile</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            
        </div>
        @foreach ($post as $post)
            
        <div class="container">
            <div class="row justify-content-center" style="padding:100px 0px">
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
        @endforeach
    </body>
</html>
