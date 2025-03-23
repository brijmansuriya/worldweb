<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    @if (session('success'))
    <div class="mb-4 flex items-center rounded-md border border-green-300 bg-green-50 p-4 text-sm text-green-800">
        <svg class="h-5 w-5 mr-2 text-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M16.707 4.293a1 1 0 00-1.414 0L9 10.586 5.707 7.293a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l7-7a1 1 0 000-1.414z" clip-rule="evenodd" />
        </svg>
        <span class="flex-1">{{ session('success') }}</span>
        <button onclick="this.parentElement.remove()" class="ml-auto text-green-600 hover:text-green-900 focus:outline-none">
            ✕
        </button>
    </div>
@endif

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

    
                    <div class="mb-4 flex justify-end">
                        <x-secondary-button>
                            <a href="{{ route('products.create') }}" class="text-gray-500 hover:text-gray-700">
                                {{ __('Add New Product') }}
                            </a>
                        </x-secondary-button>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="table-fixed w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="w-12 border p-2">#</th>
                                    <th class="w-1/4 border p-2">Title</th>
                                    <th class="w-1/4 border p-2">Category</th>
                                    <th class="w-1/4 border p-2">Price</th>
                                    <th class="w-32 border p-2">Image</th>
                                    <th class="w-24 border p-2">Status</th>
                                    <th class="w-40 border p-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        {{-- <td class="border p-2">{{ $loop->iteration }}</td> --}}
                                        <td class="border p-2">{{ $product->id }}</td>
                                        <td class="border p-2">{{ $product->title }}</td>
                                        <td class="border p-2">{{ implode(', ', $product->categories->pluck('title')->toArray()) }}</td>
                                        <td class="border p-2">{{ $product->price }}</td>
                                        <td class="border border-gray-300 p-2 text-center">
                                            <a href="{{ $product->image }}" target="_blank">
                                                <img src="{{ $product->image }}" width="50" height="50"
                                                    alt="product Image">
                                            </a>
                                        </td>
                                        <td class="border p-2">{{ ucfirst($product->status) }}</td>
                                        <td class="border p-2 flex gap-3">
                                            <x-primary-button>
                                                <a href="{{ route('products.edit', $product->id) }}" class="text-white">Edit</a>
                                            </x-primary-button>

                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
