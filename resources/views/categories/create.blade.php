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

                    @if ($errors->any())
                        <div class="mb-4 text-red-600">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="block text-gray-700">Title:</label>
                            <input type="text" name="title" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Description:</label>
                            <textarea name="description" class="w-full border-gray-300 rounded-lg shadow-sm"></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700">Image:</label>
                            <input type="file" name="image" class="w-full border-gray-300  shadow-sm">
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

                        <div class="mt-4">
                           <x-primary-button class="inline-flex items-center">
                                {{ __('Create Category') }}
                            </x-primary-button>
                           
                            <a href="{{ route('categories.index') }}" class="ml-3 inline-flex items-center text-gray-500 hover:text-gray-700">
                                {{ __('Back to Categories') }}
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
