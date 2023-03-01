<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a class="py-[7px] px-[12px]  text-white cursor-pointer rounded-md bg-primary hover:bg-h_primary" 
                href={{route('admin.books.create')}}>
                    Add new Books
                </a>
            </div>
            <div>
                <!-- head -->
                <div class="border-b-[1px] border-black flex justify-around bg-gray-500 py-3 mb-6">
                    <div class="">Id</div>
                    <div class=" ">Title</div>
                    <div class="">Description</div>
                    <div class="">Image</div>
                    <div class="">Avaliable quantity</div>
                    <div class="">Discount</div>
                    <div class="">Author</div>
                    <div class="">Action</div>
                </div>
                <!-- section -->
                @foreach ($books as $book)
                    <div class="flex justify-around my-[5px]">
                        <div class="">{{$book->id}}</div>
                        <div class=" ">{{$book->title}}</div>
                        <div class=" "> @if (strlen($book->description) > 25)
                            {{substr( $book->description,0,25).'...'}}
                        @else
                            {{$book->description}}
                        @endif</div>
                        <div class=""><img src="{{ Storage::url($book->image) }}" alt="" class="w-20 h-20"></div>
                        <div class=" ">{{$book->avaliable_quantity}}</div>
                        <div class=" ">{{$book->discount}}</div>
                        <div class=" ">
                             {{$book->author_id}}
                        </div>
                        <div class="">
                           <div>
                                <form action="{{route('admin.books.destroy',$book->id)}}" method="POST"
                                    onsubmit="return confirm('Bạn chắc chắn muốn xóa?');"
                                    >
                                    @csrf
                                    @method('DELETE')
                                    <x-button class="bg-danger hover:bg-h-danger" type="submit">Delete</x-button>
                                </form>
                           </div>
                            <x-a-link :href="route('admin.books.edit',$book->id)" class="bg-primary hover:bg-h_primary">Update</x-a-link>
                        </div>
                    </div>   
                @endforeach 
            </div>
        </div>
    </div>
</x-admin-layout>
