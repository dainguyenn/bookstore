<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
 
<body class="font-sans text-gray-900 antialiased"> 
    <div class=" flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-200">
        <div class="flex w-full py-5 bg-white shadow-md">
            <div class="flex-1 items-center bg-white"><a href="{{route('frontend.home')}}" class="text-3xl px-5">Book Store</a></div>
            <div class="px-7  flex items-center">
                <a href="{{route('frontend.home')}}" class="text-lg px-3">Home</a>
                <span class="text-lg px-3">Books</span> 
                <a href="{{route('cart.getCart')}}" class="text-lg px-3"> 
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="p-[2px] rounded-lg bg-red-500">{{Session::get('cart')? Session::get('cart')->totalQty : 0}}</span>
                </a>
                
                @if (Auth::check())
                    <div class="flex">
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        <div class="text-lg px-3">{{ Auth::user()->name }}</div>
            
                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>
            
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>
                                    @if (Auth::user()->is_admin)
                                    <x-dropdown-link :href="route('admin.index')">
                                        {{ __('Admin') }}
                                    </x-dropdown-link>
                                    @endif
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
            
                                        <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    </div>
                @else
                <x-a-link class="text-lg px-3 border-primary hover:bg-h-primary" href="{{route('login')}}">Login</x-a-link>

                @endif
            </div>
        </div>
        <div class="w-full min-w-full min-h-screen sm:max-w-md mt-6 px-6 py-4 bg-gray-200 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div> 
</body>

                                        
</html>
