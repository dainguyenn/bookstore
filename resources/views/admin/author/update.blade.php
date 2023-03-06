<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="w-1/2">
                 
                <form action={{route('admin.authors.update',$author->id )}} method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <x-form-group class="">
                        <x-form-label for="">Name</x-form-label>
                        <x-form-input type="text" name="name" value="{{$author->name}}" />
                        @error('name') 
                            <span class="text-red-700">{{$message}}</span>
                        @enderror
                    </x-form-group>
                    <x-form-group class="">
                        <x-form-label for="">Avatar</x-form-label>
                        <img src="{{Storage::url($author->avatar)}}" alt="">
                        <x-form-input type="file" name="avatar"/>
                    </x-form-group>
                    <x-form-group class="">
                        <x-form-label for="">Dob</x-form-label>
                        <x-form-input type="date" name="dob" value="{{$author->dob}}"/>
                    </x-form-group>
                    <x-form-group class="">
                        <x-form-label for="">Address</x-form-label>
                        <x-form-input type="text" name="address" value="{{$author->address}}"/>
                    </x-form-group>
                    <x-form-group class="">
                        <x-form-label for="">Story</x-form-label>
                        <textarea   id="content" cols="70" rows="5" name="story">
                            {{$author->story}}
                        </textarea>
                    </x-form-group>
                    <button class="py-[7px] px-[12px]  text-white cursor-pointer rounded-md bg-primary hover:bg-h_primary" type="submit">
                        Update
                    </button>
                    <a class="py-[7px] px-[12px]  text-white cursor-pointer rounded-md bg-warning hover:bg-h-warning" href="{{route('admin.authors.index')}}" type="submit">
                        Back
                    </a>
                </form>
             </div>
        </div>
    </div>
</x-admin-layout>
