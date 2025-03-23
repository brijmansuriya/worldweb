<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>
    @if (session('success'))
        <div class="mb-4 flex items-center rounded-md border border-green-300 bg-green-50 p-4 text-sm text-green-800">
            <svg class="h-5 w-5 mr-2 text-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M16.707 4.293a1 1 0 00-1.414 0L9 10.586 5.707 7.293a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l7-7a1 1 0 000-1.414z"
                    clip-rule="evenodd" />
            </svg>
            <span class="flex-1">{{ session('success') }}</span>
            <button onclick="this.parentElement.remove()"
                class="ml-auto text-green-600 hover:text-green-900 focus:outline-none">
                ✕
            </button>
        </div>
    @endif


    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif --}}

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
                                        {{-- <td class="border border-gray-300 p-2">{{ $loop->iteration }}</td> --}}
                                        <td class="border border-gray-300 p-2">{{ $category->id }}</td>
                                        <td class="border border-gray-300 p-2">{{ $category->title }}</td>
                                        <td class="border border-gray-300 p-2">{{ $category->description }}</td>
                                        <td class="border border-gray-300 p-2 text-center">
                                            <a href="{{ $category->image }}" target="_blank">
                                                <img src="{{ $category->image }}" width="50" height="50"
                                                    alt="Category Image">
                                            </a>
                                        </td>
                                        <td class="border border-gray-300 p-2">{{ ucfirst($category->status) }}</td>
                                        <td class="border border-gray-300 p-2 flex items-center gap-3">
                                            <!-- Edit Button -->
                                            <x-primary-button>
                                                <a href="{{ route('categories.edit', $category->id) }}"
                                                    class="text-white hover:text-gray-200">
                                                    Edit
                                                </a>
                                            </x-primary-button>

                                            <!-- View Button -->
                                            <x-secondary-button>
                                                <a href="{{ route('categories.show', $category->id) }}"
                                                    class="text-gray-500 hover:text-gray-700">
                                                    View
                                                </a>
                                            </x-secondary-button>

                                            <!-- Delete Button -->
                                            <form action="{{ route('categories.destroy', $category->id) }}"
                                                method="POST" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <x-danger-button type="submit">
                                                    Delete
                                                </x-danger-button>
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
