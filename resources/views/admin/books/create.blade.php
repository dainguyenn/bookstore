<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="w-1/2">
                 
                <form action={{route('admin.books.store')}} method="POST" enctype="multipart/form-data">
                    @csrf
                   
                    <x-form-group>
                        <x-form-label for="title">Title</x-form-label>
                        <x-form-input id="title" name='title' type="text"/>
                        @error('title') 
                         <x-err-message>{{$message}}</x-err-message>
                        @enderror
                    </x-form-group>
                     
                    <x-form-group>
                        <x-form-label for="description">Description</x-form-label>
                        <textarea name="description" id="content" cols="30" rows="2.5"></textarea>
                    </x-form-group>
                    <x-form-group>
                        <x-form-label for="image">Image</x-form-label>
                        <x-form-input id="image" type="file" name="image"/>
                    </x-form-group>
                    <x-form-group>
                        <x-form-label for="avaliable_quantity">Avaliable quantity</x-form-label>
                        <x-form-input id="avaliable_quantity" type="number" name="avaliable_quantity"/>
                        @error('avaliable_quantity') 
                        <x-err-message >{{$message}}</x-err-message>
                        @enderror
                    </x-form-group>
                    <x-form-group>
                        <x-form-label for="price">Price</x-form-label>
                        <x-form-input id="price" type="number" name="price"/>
                        @error('price') 
                        <x-err-message >{{$message}}</x-err-message>
                    @enderror
                    </x-form-group>
                    <x-form-group>
                        <x-form-label for="discount">Discount</x-form-label> 
                        <x-form-input id="discount" type="number" name="discount"/>
                    </x-form-group>
                    <div class="w-full my-2">
                        <x-form-label>Author</x-form-label>
                        <select class="w-full rounded-lg" name="author_id">
                            @foreach ($authors as $author)
                                <option value="{{$author->id}}">{{$author->name}}</option>
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
