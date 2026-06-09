@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="mb-8">
    <h3 class="text-3xl font-bold text-gray-800 mb-2">Welcome back, {{ auth()->user()->name }}! 👋</h3>
    <p class="text-gray-500">Here's what's happening with your restaurant today.</p>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-shadow">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-gray-500 font-medium">Total Orders</h3>
            <span class="flex items-center justify-center w-10 h-10 rounded-full bg-blue-100 text-blue-600">
                <i class="fas fa-shopping-bag"></i>
            </span>
        </div>
        <div class="text-3xl font-bold text-gray-800">1,248</div>
        <div class="mt-2 text-sm text-green-500 flex items-center">
            <i class="fas fa-arrow-up mr-1"></i>
            <span>12% from last month</span>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-shadow">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-gray-500 font-medium">Total Revenue</h3>
            <span class="flex items-center justify-center w-10 h-10 rounded-full bg-green-100 text-green-600">
                <i class="fas fa-dollar-sign"></i>
            </span>
        </div>
        <div class="text-3xl font-bold text-gray-800">$ 45M</div>
        <div class="mt-2 text-sm text-green-500 flex items-center">
            <i class="fas fa-arrow-up mr-1"></i>
            <span>8% from last month</span>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-shadow">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-gray-500 font-medium">Menu Items</h3>
            <span class="flex items-center justify-center w-10 h-10 rounded-full bg-yellow-100 text-yellow-600">
                <i class="fas fa-hamburger"></i>
            </span>
        </div>
        <div class="text-3xl font-bold text-gray-800">42</div>
        <div class="mt-2 text-sm text-gray-500 flex items-center">
            <span>Active items</span>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-shadow">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-gray-500 font-medium">Total Users</h3>
            <span class="flex items-center justify-center w-10 h-10 rounded-full bg-purple-100 text-purple-600">
                <i class="fas fa-users"></i>
            </span>
        </div>
        <div class="text-3xl font-bold text-gray-800">892</div>
        <div class="mt-2 text-sm text-green-500 flex items-center">
            <i class="fas fa-arrow-up mr-1"></i>
            <span>24 new today</span>
        </div>
    </div>
</div>

<!-- Recent Activity -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center bg-gray-50">
        <h3 class="font-semibold text-gray-800">Recent Activities</h3>
        <button class="text-sm text-yellow-600 hover:text-yellow-700 font-medium">View All</button>
    </div>
    <div class="p-6 text-center text-gray-500">
        <i class="fas fa-clipboard-list text-4xl mb-3 text-gray-300"></i>
        <p>No recent activities found.</p>
    </div>
</div>
@endsection
