 

<x-guest-layout>

    <div class="">
        
        @if (Session::get('cart'))
        <div class="flex justify-around w-[92%] font-bold mb-4">
            <span>Ảnh</span>
            <span>Mô tả</span>
            <span>Số lượng</span>
            <span>Đơn giá</span>
        </div>
            @foreach ($books as $book)
                <div class="flex items-center justify-around my-3">
                    <img class="w-[123px] h-[123px]" src="{{ Storage::url($book['item']['image']) }}" alt="">
                    <span class="block overflow-hidden text-ellipsis w-[255px]">{{ $book['item']['title'] }}</span>
                    <div class=""> 
                        <span>{{ $book['qty'] }}</span>
                    </div>
                    <div class="">
                        @if ($book['item']['discount']>0)    
                        <span class="font-bold">{{ number_format($book['price']) }} đ</span>
                        <span class="line-through">{{number_format($book['item']['price'])}} đ</span>
                        @else
                        <span class="font-bold">{{ number_format($book['price']) }} đ</span>

                        @endif
                    </div>
                    <div>
                        <form action="{{ route('cart.removeItem', $book['item']['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            @endforeach
          
            <div class="mt-7 px-12">
                <span>Tổng tiền: </span>
                <span>{{ number_format($total) }}</span>
            </div>
        @else
            <x-a-link class="border-primary hover:bg-h-primary" href="{{route('frontend.home')}}">Mua hàng ngay!</x-a-link>
        @endif

    </div>
</x-guest-layout>


