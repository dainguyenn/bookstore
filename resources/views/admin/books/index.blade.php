<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <x-a-link class="border-primary hover:bg-h-primary"
                href="{{ route('admin.books.create') }}">
                    Add new Books
                </x-a-link>
            </div>
            <table class="min-w-full">
                <!-- head -->
                <thead>
                    <tr class="bg-gray-50 dark:bg-gray-700">
                        <th scope="col"
                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                            Id</th>
                        <th scope="col"
                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                            Title</th>
                        <th scope="col"
                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                            Description</th>
                        <th scope="col"
                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                            Image</th>
                        <th scope="col"
                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                            Avaliable quantity</th>
                        <th scope="col"
                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                            Discount</th>
                        <th scope="col"
                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                            Author</th>
                        <th scope="col"
                            class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                            Action</th>
                    </tr>
                </thead>
                <!-- section -->
                <tbody>
                    @foreach ($books as $book)
                        <tr class="bg-white border-b">
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap ">
                                {{ $book->id }}</td>
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap"> 
                                  
                                 <span class="w-[120px] text-ellipsis overflow-hidden block">{{$book->title}}</span>
                            </td>
                            <td class="py-4 px-6 text-sm text-ellipsis overflow-hidden font-medium text-gray-900 whitespace-nowrap ">
                                <span class="w-[230px] text-ellipsis overflow-hidden block">{{$book->title}}</span>
                            </td>
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap "><img
                                    src="{{ Storage::url($book->image) }}" alt="" class="w-20 h-20"></td>
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap ">
                                {{ $book->avaliable_quantity }}</td>
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap ">
                                {{ $book->discount }}</td>
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap ">
                                {{ $book->author_id }}
                            </td>
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap flex ">
                                <div>
                                    <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST"
                                        onsubmit="return confirm('B???n ch???c ch???n mu???n x??a?');">
                                        @csrf
                                        @method('DELETE')
                                        <x-button class="border-danger hover:bg-h-danger" type="submit">Delete</x-button>
                                    </form>
                                </div>
                                <x-a-link  :href="route('admin.books.edit', $book->id)" class="ml-1 border-primary hover:bg-h-primary">Update</x-a-link>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
             {{$books->links('components.pagination')}}
        </div>
    </div>
</x-admin-layout>
