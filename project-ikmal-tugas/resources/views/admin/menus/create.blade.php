@extends('admin.layouts.app')

@section('title', 'Add New Menu')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden max-w-3xl">
    <div class="px-6 py-5 border-b border-gray-100 bg-gray-50">
        <h3 class="font-semibold text-gray-800 text-lg flex items-center">
            <a href="{{ route('menus.index') }}" class="text-gray-400 hover:text-yellow-600 mr-3"><i class="fas fa-arrow-left"></i></a>
            Create Menu Item
        </h3>
    </div>
    
    <div class="p-6">
        @if ($errors->any())
        <div class="mb-6 bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-lg">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent text-sm">
                </div>
                
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                    <select id="category" name="category" required class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent text-sm">
                        <option value="burger" {{ old('category') == 'burger' ? 'selected' : '' }}>Burger</option>
                        <option value="pizza" {{ old('category') == 'pizza' ? 'selected' : '' }}>Pizza</option>
                        <option value="pasta" {{ old('category') == 'pasta' ? 'selected' : '' }}>Pasta</option>
                        <option value="fries" {{ old('category') == 'fries' ? 'selected' : '' }}>Fries</option>
                    </select>
                </div>

                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Price ($)</label>
                    <input type="number" id="price" name="price" value="{{ old('price') }}" required class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent text-sm">
                </div>

                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                    <input type="file" id="image" name="image" required accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-yellow-50 file:text-yellow-700 hover:file:bg-yellow-100 border border-gray-300 rounded-lg focus:outline-none">
                </div>
            </div>

            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea id="description" name="description" rows="3" required class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent text-sm">{{ old('description') }}</textarea>
            </div>

            <div class="mb-8">
                <label for="composition" class="block text-sm font-medium text-gray-700 mb-2">Composition (Optional)</label>
                <textarea id="composition" name="composition" rows="2" class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent text-sm">{{ old('composition') }}</textarea>
            </div>

            <div class="flex justify-end pt-4 border-t border-gray-100">
                <button type="submit" class="px-6 py-2.5 bg-yellow-500 text-white font-medium rounded-lg hover:bg-yellow-600 transition-colors shadow-sm flex items-center">
                    <i class="fas fa-save mr-2"></i> Save Menu
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
