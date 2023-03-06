<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="w-1/2">
                 
                <form action={{route('admin.authors.store')}} method="POST" enctype="multipart/form-data">
                    @csrf
                   
                    <x-form-group>
                        <x-form-label for="">Name</x-form-label>
                        <x-form-input type="text" name="name"   />
                        @error('name') 
                            <x-err-message>{{$message}}</x-err-message>
                        @enderror
                    </x-form-group>
                    <x-form-group>
                        <x-form-label for="">Avatar</x-form-label>
                        <x-form-input type="file" name="avatar"/>
                    </x-form-group>
                    <x-form-group>
                        <x-form-label for="">Dob</x-form-label>
                        <x-form-input type="date" name="dob"/>
                    </x-form-group>
                    <x-form-group>
                        <x-form-label for="">Address</x-form-label>
                        <x-form-input type="text" name="address"/>
                    </x-form-group>
                    <x-form-group>
                        <x-form-label for="">Story</x-form-label>
                        <textarea   id="content" cols="70" rows="5" name="story"></textarea>
                    </x-form-group>
                    <button class="py-[7px] px-[12px]  text-white cursor-pointer rounded-md bg-primary hover:bg-h_primary" type="submit">
                        Create
                    </button>
                    <a class="py-[7px] px-[12px]  text-white cursor-pointer rounded-md bg-warning hover:bg-h-warning" href="{{route('admin.authors.index')}}" type="submit">
                        Back
                    </a>
                </form>
             </div>
        </div>
    </div>
    <script >
        CKEDITOR.replace('content');
    </script>
</x-admin-layout>
