
<x-guest-layout>
    <div class="flex justify-center">
        <div class="max-w-[90%] min-h-screen w-[90%] bg-white rounded-lg"> 
            <div class="p-5 flex ">
                <div> 
                    <div class="w-[444px] h-[444px] "><img class="w-full h-full object-cover" src="{{Storage::url($book->image)}}" alt=""></div>
                </div>
                <div class="px-7">
                    <div class="">
                        <span>Tác giả: </span>
                        <span>{{$author[0]->name}}</span>
                    </div>
                    <div class=""> 
                        <span>{{$book->title}}</span>
                    </div>
                    <div class="">
                        @if ($book->discount > 0)
                            <div class="">
                                <span>{{$book->price * (100 - $book->discount)/100}}đ</span>
                                <span class="line-through">{{$book->price}}đ </span>
                                <span>-{{$book->discount}}%</span> 
                            </div>
                        @else
                        <span>{{$book->price}}</span>
                        @endif
                    </div>
                    <div class="">
                         <form method="POST" action="{{route('cart.addToCart',$book->id)}}" onclick="event.preventDefault();
                         this.closest('form').submit();">
                         @csrf
                        
                         <x-button >Thêm vào giỏ hàng
                            
                         </x-button> </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>