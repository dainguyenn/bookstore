<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="w-1/2">
                 
                <form action={{route('admin.books.update',$book->id)}} method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <x-form-group>
                        <x-form-label for="">Title</x-form-label>
                        <x-form-input type="text" name="title" value="{{$book->title}}" />
                        @error('title') 
                            <span class="text-red-700">{{$message}}</span>
                        @enderror
                    </x-form-group>
                    <x-form-group>
                        <x-form-label for="">Description</x-form-label>
                        <textarea  id="content" cols="30" rows="2.5" name="description">{{$book->description}}</textarea>
                    </x-form-group>
                    <x-form-group>
                        <x-form-label for="">Image</x-form-label>
                        <img class="w-20 h-20 my-[3px]" src="{{Storage::url($book->image)}}" alt="">
                        <x-form-input type="file" name="image"/>
                    </x-form-group>
                    <x-form-group>
                        <x-form-label for="">Avaliable quantity</x-form-label>
                        <x-form-input type="number" name="avaliable_quantity" value="{{$book->avaliable_quantity}}"/>
                        @error('avaliable_quantity') 
                            <span class="text-red-700">{{$message}}</span>
                        @enderror
                    </x-form-group>
                    <x-form-group>
                        <x-form-label for="">Price</x-form-label>
                        <x-form-input type="number" name="price" value="{{$book->price}}"/>
                        @error('price') 
                            <span class="text-red-700">{{$message}}</span>
                        @enderror
                    </x-form-group>
                    <x-form-group>
                        <x-form-label for="">Discount</x-form-label> 
                        <x-form-input type="number" name="discount" value="{{$book->discount}}"/>
                    </x-form-group>
                    <div class="my-2">
                        <x-form-label>Author</x-form-label>
                        <select class="w-full rounded-lg" name="author_id" >
                            @foreach ($authors as $author)
                                <option value="{{$author->id}}" {{$book->author_id == $author->id? 'selected':''}}>{{$author->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="py-[7px] px-[12px]  text-white cursor-pointer rounded-md bg-primary hover:bg-h_primary" type="submit">
                        Update
                    </button>
                    <a class="py-[7px] px-[12px]  text-white cursor-pointer rounded-md bg-warning hover:bg-h-warning" href="{{route('admin.books.index')}}" type="submit">
                        Back
                    </a>
                </form>
             </div>
        </div>
    </div>
</x-admin-layout>
