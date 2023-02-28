<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="">
                <form action={{route('admin.author.store')}} method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="">
                        <label for="">Name</label>
                        <input type="text" name="name"/>
                        @error('name')
                            <span class="text-red-700">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="">
                        <label for="">Avatar</label>
                        <input type="file" name="image"/>
                    </div>
                    <div class="">
                        <label for="">Dob</label>
                        <input type="date" name="dob"/>
                    </div>
                    <div class="">
                        <label for="">Address</label>
                        <input type="text" name="address"/>
                    </div>
                    <div class="">
                        <label for="">Story</label>
                        <textarea   id="" cols="70" rows="5" name="story"></textarea>
                    </div>
                    <button class="py-[7px] px-[12px]  text-white cursor-pointer rounded-md bg-primary hover:bg-h_primary" type="submit">
                        Create
                    </button>
                </form>
             </div>
        </div>
    </div>
</x-admin-layout>
