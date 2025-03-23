<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Categorie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if ($errors->any())
                        <div class="mb-4 text-red-600">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('categories.update', $categories->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block text-gray-700">Title:</label>
                            <input type="text" name="title" value="{{ old('title', $categories->title) }}" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Description:</label>
                            <textarea name="description" class="w-full border-gray-300 rounded-lg shadow-sm">{{ old('description', $categories->description) }}</textarea>
                        </div>

                        <div class="mb-4"   id="current-image">
                            <label class="block text-gray-700">Current Image:</label>
                            @if($categories->image)
                                <img src="{{ asset($categories->image) }}" width="100" height="100" class="mb-2">
                            @endif
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block font-medium text-sm text-gray-700">Change Image</label>
                            <input type="file" name="image" id="image" class="w-full border-gray-300 rounded-md">
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>


                         <!-- Status -->
                         <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">Status</label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="status" value="active" class="form-radio" 
                                    {{ old('status', $categories->status) == 'active' ? 'checked' : '' }}>
                                <span class="ml-2">Active</span>
                            </label>
                            <label class="inline-flex items-center ml-4">
                                <input type="radio" name="status" value="inactive" class="form-radio"
                                    {{ old('status', $categories->status) == 'inactive' ? 'checked' : '' }}>
                                <span class="ml-2">Inactive</span>
                            </label>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>


                        <div class="mt-4">
                           <x-primary-button class="inline-flex items-center">
                                {{ __('Update Category') }}
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
