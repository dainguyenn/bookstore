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
    @vite(['resources/js/adminDropdown.js'])
</head>

<body class="font-sans antialiased   ">
    <div class="flex">
        <nav class=" bg-[#181823] w-[250px] text-[#4E6E81] h-auto">
            <h1 class="text-3xl p-[3px]">BookStore</h1>
            <ul class="flex flex-col  p-[7px]">
                <x-nav-item :href={{routes('admin.author.index')}}>
                    Author
                </x-nav-item>
                <li class="text-[18px] my-1 rounded-[3.5px]   hover:bg-[#443C68] ease-in duration-[250ms]">
                    <a class="p-[2px]">Home</a>
                </li> 
                <li class="text-[18px] my-1 rounded-[3.5px]   hover:bg-[#443C68] ease-in duration-[250ms]">
                    <a class="p-[2px]">Home</a>
                </li>
                <li id="admin-control" class="text-[18px] my-1 rounded-[3.5px]   hover:bg-[#443C68] ease-in duration-[250ms]">
                    <a class="p-[2px]">User</a> 
                    <i id="showMore"  class="fa-solid fa-caret-down "></i>

                </li>
                <li>
                    <div id="user-more" class="hidden">
                        <ul class=" pl-[5px]">
                            <li class="text-[18px] rounded-[3.5px]   hover:bg-[#443C68] ease-in duration-[250ms]">Abc</li>
                            <form method="POST"   action="{{ route('logout') }}">
                                @csrf
    
                                <x-nav-item :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-nav-item>
                            </form>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="m-2 p-8 flex-grow-0">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
