<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="mb-4">
                        <h3 class="text-2xl font-semibold">{{ $category->title }}</h3>
                        <p class="text-gray-600">{{ $category->description }}</p>
                    </div>

                    <div class="mb-4">
                        <strong>Status:</strong>
                        <span
                            class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset 
                        {{ $category->status === 'active' ? 'bg-green-100 text-green-700 ring-green-600/20' : 'bg-red-100 text-red-700 ring-red-600/20' }}">
                            {{ ucfirst($category->status) }}
                        </span>
                    </div>

                    <div class="mb-4">
                        <strong>Image:</strong>
                        @if ($category->image)
                            <div class="mt-4">
                                @if ($category->image)
                                    <a href="{{ asset($category->image) }}" target="_blank" class="inline-block">
                                        <img src="{{ asset($category->image) }}" alt="Category Image"
                                            class="w-32 h-32 object-cover rounded-md shadow-md border border-gray-300">
                                    </a>
                                @else
                                    <p class="text-gray-500">No Image Available</p>
                                @endif
                            </div>
                        @else
                            <p class="text-gray-500">No Image Available</p>
                        @endif
                    </div>

                    <div class="mt-6 flex space-x-4 gap-4">
                        <!-- Edit Button -->
                        <x-primary-button>
                            <a href="{{ route('categories.edit', $category->id) }}">
                                {{ __('Edit') }}
                            </a>
                        </x-primary-button>

                        <!-- Delete Button -->
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <x-danger-button type="submit">
                                {{ __('Delete') }}
                            </x-danger-button>
                        </form>

                        <!-- Back Button -->
                        <x-secondary-button>
                            <a href="{{ route('categories.index') }}">
                                {{ __('Back to Categories') }}
                            </a>
                        </x-secondary-button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
