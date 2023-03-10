<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <x-a-link class="border-primary hover:bg-h-primary" href="{{ route('admin.authors.create') }}">
                    Add new Author
                </x-a-link>
            </div>
            <table class="min-w-full">
                <!-- head -->
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr class="border-black  bg-gray-500  h-[60px]">
                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">Id</th>
                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">Name</th>
                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">Avatar</th>
                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">Dob</th>
                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">Address</th>
                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">Story</th>
                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">Action</th>
                    </tr>
                </thead>
                <!-- section -->
                <tbody>
                    @foreach ($authors as $author)
                        <tr class="bg-white border-b">
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap ">{{ $author->id }}</td>
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap ">{{ $author->name }}</td>
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap "><img src="{{ Storage::url($author->avatar) }}" alt="" class="w-20 h-20"></td>
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap ">{{ $author->dob }}</td>
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap ">{{ $author->address }}</td>
                            <td class="py-4 px-6 text-sm text-ellipsis overflow-hidden font-medium text-gray-900 whitespace-nowrap ">
                                <span class="w-[230px] text-ellipsis overflow-hidden block">{{$author->story}}</span>
                            </td>
                            <td class="py-4 px-6 text-sm font-medium flex items-center text-gray-900 whitespace-nowrap ">

                                <form action="{{ route('admin.authors.destroy', $author->id) }}" method="POST"
                                    onsubmit="return confirm('B???n ch???c ch???n mu???n x??a?');">
                                    @csrf
                                    @method('DELETE')
                                    <x-button class="border-danger hover:bg-h-danger" type="submit">Delete</x-button>
                                </form>

                                <x-a-link :href="route('admin.authors.edit', $author->id)" class="border-primary hover:bg-h-primary ml-1">Update</x-a-link>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            {{$authors->links('components.pagination')}}

        </div>
    </div>
</x-admin-layout>
