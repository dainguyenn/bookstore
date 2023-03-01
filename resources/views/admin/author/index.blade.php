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
                href={{route('admin.authors.create')}}>
                    Add new Author
                </a>
            </div>
            <div>
                <!-- head -->
                <div class="border-b-[1px] border-black flex justify-around bg-gray-500 py-3 mb-6">
                    <div class="">Id</div>
                    <div class=" ">Name</div>
                    <div class="">Avatar</div>
                    <div class="">Dob</div>
                    <div class="">Address</div>
                    <div class="">Story</div>
                    <div class="">Action</div>
                </div>
                <!-- section -->
                @foreach ($authors as $author)
                    <div class="flex justify-around my-[5px]">
                        <div class="">{{$author->id}}</div>
                        <div class=" ">{{$author->name}}</div>
                        <div class=""><img src="{{ Storage::url($author->avatar) }}" alt="" class="w-20 h-20"></div>
                        <div class=" ">{{$author->dob}}</div>
                        <div class=" ">{{$author->address}}</div>
                        <div class=" ">
                            @if (strlen($author->story) > 25)
                                {{substr( $author->story,0,25).'...'}}
                            @else
                                {{$author->story}}
                            @endif
                        </div>
                        <div class="">
                           <div>
                                <form action="{{route('admin.authors.destroy',$author->id)}}" method="POST"
                                    onsubmit="return confirm('Bạn chắc chắn muốn xóa?');"
                                    >
                                    @csrf
                                    @method('DELETE')
                                    <x-button class="bg-danger hover:bg-h-danger" type="submit">Delete</x-button>
                                </form>
                           </div>
                            <x-a-link :href="route('admin.authors.edit',$author->id)" class="bg-primary hover:bg-h_primary">Update</x-a-link>
                        </div>
                    </div>   
                @endforeach 
            </div>
        </div>
    </div>
</x-admin-layout>
