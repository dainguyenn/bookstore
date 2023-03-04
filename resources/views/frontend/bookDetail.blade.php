
<x-guest-layout>
    <div class="flex justify-center">
        <div class="max-w-[90%] min-h-screen w-[90%] bg-white rounded-lg"> 
            <div class="p-5 flex ">
                <div> 
                    <div class="w-[444px] h-[444px] "><img class="w-full h-full object-cover" src="{{Storage::url($book->image)}}" alt=""></div>
                </div>
                <div class="flex-shrink-0 mx-3"></div>
                <div class="px-7">
                    <div class=" pr-[28px] flex flex-col">
                        <div class=""><span>Tác giả: </span>
                            <a class="text-[#0D5CB6]" href="#">{{$author[0]->name}}</a></div>
                        <span class="text-2xl">{{$book->title}}</span>
                    </div> 
                    <div class=" bg-[#FAFAFA]  px-[16px] mt-3">
                        @if ($book->discount > 0)
                            <div class="flex items-end pt-3  pb-[12px]">
                                <span class="text-2xl text-red-500 mr-[8px]">{{$book->price * (100 - $book->discount)/100}} đ</span>
                                <span class="text-[15px] line-through">{{$book->price}} đ </span>
                                <span class="text-red-500 text-[15px] ml-1 mt-[3px]">-{{$book->discount}}%</span> 
                            </div>
                        @else
                        <span class="pt-3 px-[16px] pb-[12px] text-xl">{{$book->price}} đ</span>
                        @endif
                    </div>
                    <div class="mt-4">
                         <form method="POST" action="{{route('cart.addToCart',$book->id)}}" onclick="event.preventDefault();
                         this.closest('form').submit();">
                         @csrf
                        
                         <x-button class="border-danger hover:bg-h-danger">Thêm vào giỏ hàng
                            
                         </x-button> </form>
                    </div>
                </div>
            </div>
            <div class="p-5">
                <h4 class="font-medium text-xl">Mô tả sản phẩm</h4>
                <p class="pt-4  ">{{$book->description}}</p>
            </div>
        </div>
    </div>
</x-guest-layout>