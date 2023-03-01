<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="">
                 
                <form action={{route('admin.books.store',$book->id)}} method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="">
                        <label for="">Title</label>
                        <input type="text" name="title" value="{{$book->title}}" />
                        @error('title') 
                            <span class="text-red-700">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="">
                        <label for="">Description</label>
                        <textarea  id="" cols="30" rows="10" name="description">{{$book->description}}</textarea>
                    </div>
                    <div class="">
                        <label for="">Image</label>
                        <img class="w-20 h-20" src="{{Storage::url($book->image)}}" alt="">
                        <input type="file" name="image"/>
                    </div>
                    <div class="">
                        <label for="">Avaliable quantity</label>
                        <input type="number" name="avaliable_quantity" value="{{$book->avaliable_quantity}}"/>
                    </div>
                    <div class="">
                        <label for="">Price</label>
                        <input type="number" name="price" value="{{$book->price}}"/>
                    </div>
                    <div class="">
                        <label for="">Discount</label> 
                        <input type="number" name="discount" value="{{$book->discount}}"/>
                    </div>
                    <div class="">
                        <select name="author_id" >
                            @foreach ($authors as $author)
                                <option value="{{$author->id}}" {{$book->author_id == $author->id? 'selected':''}}>{{$author->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="py-[7px] px-[12px]  text-white cursor-pointer rounded-md bg-primary hover:bg-h_primary" type="submit">
                        Create
                    </button>
                    <a class="py-[7px] px-[12px]  text-white cursor-pointer rounded-md bg-warning hover:bg-h-warning" href="{{route('admin.books.index')}}" type="submit">
                        Back
                    </a>
                </form>
             </div>
        </div>
    </div>
</x-admin-layout>
