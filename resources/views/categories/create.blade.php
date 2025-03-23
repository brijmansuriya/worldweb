<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <!-- Title -->
                        <div class="mb-4">
                            <label class="block text-gray-700">Title:</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="w-full border-gray-300 rounded-lg shadow-sm">
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label class="block text-gray-700">Description:</label>
                            <textarea name="description" class="w-full border-gray-300 rounded-lg shadow-sm">{{ old('description') }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Image -->
                        <div class="mb-4">
                            <label class="block text-gray-700">Image:</label>
                            <input type="file" name="image" class="w-full border-gray-300 shadow-sm">
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <!-- Status -->
                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700 mb-2">Status</label>
                            <label class="inline-flex items-center space-x-6">
                                <input type="radio" name="status" value="active" class="form-radio" {{ old('status') == 'active' ? 'checked' : '' }}>
                                <span class="ml-2">Active</span>
                            </label>
                            <label class="inline-flex items-center ml-4">
                                <input type="radio" name="status" value="inactive" class="form-radio" {{ old('status') == 'inactive' ? 'checked' : '' }}>
                                <span class="ml-2">Inactive</span>
                            </label>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-4">
                            <x-primary-button class="inline-flex items-center">
                                {{ __('Create Category') }}
                            </x-primary-button>
                            <a href="{{ route('categories.index') }}" class="ml-3 inline-flex items-center text-gray-500 hover:text-gray-700">
                                {{ __('Back to Categories') }}
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
