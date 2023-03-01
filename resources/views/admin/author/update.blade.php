<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="">
                 
                <form action={{route('admin.authors.update',$author->id )}} method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{$author->name}}" />
                        @error('name') 
                            <span class="text-red-700">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="">
                        <label for="">Avatar</label>
                        <img src="{{Storage::url($author->avatar)}}" alt="">
                        <input type="file" name="avatar"/>
                    </div>
                    <div class="">
                        <label for="">Dob</label>
                        <input type="date" name="dob" value="{{$author->dob}}"/>
                    </div>
                    <div class="">
                        <label for="">Address</label>
                        <input type="text" name="address" value="{{$author->address}}"/>
                    </div>
                    <div class="">
                        <label for="">Story</label>
                        <textarea   id="" cols="70" rows="5" name="story">
                            {{$author->story}}
                        </textarea>
                    </div>
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
