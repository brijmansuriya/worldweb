<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Product') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Categories (Multiple Selection) -->
                        <div class="mb-4">
                            <label for="categories" class="block font-medium text-sm text-gray-700">Categories</label>
                            <select name="categories[]" id="categories" multiple class="w-full border-gray-300 rounded-md">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('categories')" class="mt-2" />
                        </div>

                        <!-- Title -->
                        <div class="mb-4">
                            <label for="title" class="block font-medium text-sm text-gray-700">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}"
                                class="w-full border-gray-300 rounded-md">
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="block font-medium text-sm text-gray-700">Description</label>
                            <textarea name="description" id="description" class="w-full border-gray-300 rounded-md">{{ old('description') }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Image Upload -->
                        <div class="mb-4">
                            <label for="image" class="block font-medium text-sm text-gray-700">Image</label>
                            <input type="file" name="image" id="image" class="w-full border-gray-300 rounded-md">
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <!-- Price -->
                        <div class="mb-4">
                            <label for="price" class="block font-medium text-sm text-gray-700">Price</label>
                            <input type="text" name="price" id="price" value="{{ old('price') }}"
                                class="w-full border-gray-300 rounded-md">
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        <!-- Status -->
                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">Status</label>
                            <label class="inline-flex items-center">
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
                            <x-primary-button>
                                {{ __('Create Product') }}
                            </x-primary-button>
                            <a href="{{ route('products.index') }}" class="ml-4 text-gray-600 hover:text-gray-900">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
