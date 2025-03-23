<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <div class="mb-4 flex justify-end">

                        <x-secondary-button class="ml-3 inline-flex items-center">
                            <a href="{{ route('categories.create') }}" class="text-gray-500 hover:text-gray-700">
                                {{ __('Add New Categories') }}
                            </a>
                        </x-secondary-button>

                    </div>

                    <div class="overflow-x-auto">
                        <table class="table-fixed w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="w-12 border border-gray-300 p-2">#</th>
                                    <th class="w-1/4 border border-gray-300 p-2">Title</th>
                                    <th class="w-1/3 border border-gray-300 p-2">Description</th>
                                    <th class="w-32 border border-gray-300 p-2">Image</th>
                                    <th class="w-24 border border-gray-300 p-2">Status</th>
                                    <th class="w-40 border border-gray-300 p-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td class="border border-gray-300 p-2">{{ $loop->iteration }}</td>
                                    <td class="border border-gray-300 p-2">{{ $category->title }}</td>
                                    <td class="border border-gray-300 p-2">{{ $category->description }}</td>
                                    <td class="border border-gray-300 p-2 text-center">
                                        @if ($category->image)
                                        <img src="{{ asset('storage/' . $category->image) }}" width="50" height="50"
                                            alt="Category Image">
                                        @else
                                        No Image
                                        @endif
                                    </td>
                                    <td class="border border-gray-300 p-2">{{ ucfirst($category->status) }}</td>
                                    <td class="border border-gray-300 p-2">
                                        <a href="{{ route('categories.edit', $category->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $categories->links() }}
                        <!-- Pagination -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>