@extends('admin.layouts.app')

@section('title', 'Menus')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center bg-gray-50 flex-wrap gap-4">
        <h3 class="font-semibold text-gray-800 text-lg">Menu Management</h3>
        <div class="flex gap-2 flex-wrap">
            <a href="{{ route('menus.cetak_pdf') }}" target="_blank" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition-colors font-medium text-sm flex items-center shadow-sm">
                <i class="fas fa-file-pdf mr-2"></i> Print All PDF
            </a>
            <a href="{{ route('menus.create') }}" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg transition-colors font-medium text-sm flex items-center shadow-sm">
                <i class="fas fa-plus mr-2"></i> Add New Menu
            </a>
        </div>
    </div>
    
    <div class="p-6 border-b border-gray-100 bg-white">
        <form action="{{ route('menus.index') }}" method="GET" class="flex gap-2 max-w-md">
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text" name="search" value="{{ $search }}" placeholder="Search by title or category..." class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent text-sm">
            </div>
            <button type="submit" class="px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700 transition-colors text-sm font-medium">Search</button>
            @if($search)
                <a href="{{ route('menus.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors text-sm font-medium">Clear</a>
            @endif
        </form>
    </div>

    @if(session('success'))
    <div class="mx-6 mt-4 p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg border border-green-200" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-900">Image</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-900">Title</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-900">Category</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-900">Price</th>
                    <th scope="col" class="px-6 py-4 font-semibold text-gray-900 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($menus as $menu)
                <tr class="bg-white border-b hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">
                        <img src="{{ asset('feane-assets/images/' . $menu->image) }}" alt="{{ $menu->title }}" class="w-16 h-16 object-cover rounded-lg shadow-sm">
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900">{{ $menu->title }}</td>
                    <td class="px-6 py-4">
                        <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded border border-yellow-200">{{ ucfirst($menu->category) }}</span>
                    </td>
                    <td class="px-6 py-4 text-green-600 font-medium">$ {{ number_format($menu->price, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('menus.cetak_pdf_by_id', $menu->id) }}" target="_blank" class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-red-100 text-red-600 hover:bg-red-200 transition-colors" title="Print PDF">
                            <i class="fas fa-file-pdf"></i>
                        </a>
                        <a href="{{ route('menus.edit', $menu->id) }}" class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-600 hover:bg-blue-200 transition-colors" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this item?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-gray-100 text-gray-600 hover:bg-gray-200 hover:text-red-600 transition-colors" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                        <div class="flex flex-col items-center justify-center">
                            <i class="fas fa-inbox text-4xl mb-3 text-gray-300"></i>
                            <p>No menus found.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="p-6 border-t border-gray-100">
        {{ $menus->links('pagination::tailwind') }}
    </div>
</div>
@endsection
