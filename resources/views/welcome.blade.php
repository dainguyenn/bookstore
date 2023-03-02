<x-guest-layout>
    <div class="">
        <x-card-layout>
            @foreach ($books as $book)
                <x-card>
                    <x-card-img src="{{Storage::url($book->image)}}"/>
                    <x-card-title>{{$book->title}}</x-card-title>
                    <x-card-price>{{$book->price}}</x-card-price>
                </x-card>
            @endforeach
        </x-card-layout>
    </div>
</x-guest-layout>