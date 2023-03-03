<x-guest-layout>
    <div class="">
        <x-card-layout>
            @foreach ($books as $book)
               <a   href="{{route('frontend.book.detail',$book->id)}}">
                <x-card>
                    <x-card-img src="{{Storage::url($book->image)}}"/>
                    <x-card-title>{{$book->title}}</x-card-title>
                    <x-card-price>{{$book->price}}</x-card-price>
                </x-card>
               </a>
            @endforeach
        </x-card-layout>
    </div>
</x-guest-layout>