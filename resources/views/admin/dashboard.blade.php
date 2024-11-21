@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-gray-100 py-12 px-6">

        <!-- Dashboard Stats -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Categories Card -->
            <div class="bg-white p-6 rounded-xl shadow-lg flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-semibold text-gray-700">Categories</h3>
                    <p class="text-3xl font-bold text-blue-500">{{ $categoriesCount }}</p>
                </div>
                <div class="bg-blue-500 text-white p-3 rounded-full">
                    <i class="fas fa-box-open"></i>
                </div>
            </div>

            <!-- Products Card -->
            <div class="bg-white p-6 rounded-xl shadow-lg flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-semibold text-gray-700">Products</h3>
                    <p class="text-3xl font-bold text-green-500">{{ $productsCount }}</p>
                </div>
                <div class="bg-green-500 text-white p-3 rounded-full">
                    <i class="fas fa-cogs"></i>
                </div>
            </div>

            <!-- Contacts Card -->
            <div class="bg-white p-6 rounded-xl shadow-lg flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-semibold text-gray-700">Contacts</h3>
                    <p class="text-3xl font-bold text-yellow-500">{{ $contactsCount }}</p>
                </div>
                <div class="bg-yellow-500 text-white p-3 rounded-full">
                    <i class="fas fa-envelope"></i>
                </div>
            </div>
        </div>

        <!-- Recent Activities Section -->
        <div class="mt-8 bg-white p-6 rounded-xl shadow-lg">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Recent Activities</h2>
            <ul class="space-y-4">
                <li class="flex justify-between items-center text-gray-700">
                    <span class="font-medium">Added a new product</span>
                    <span class="text-sm text-gray-500">2 hours ago</span>
                </li>
                <li class="flex justify-between items-center text-gray-700">
                    <span class="font-medium">Updated category: Electronics</span>
                    <span class="text-sm text-gray-500">1 day ago</span>
                </li>
                <li class="flex justify-between items-center text-gray-700">
                    <span class="font-medium">Received a new contact message</span>
                    <span class="text-sm text-gray-500">3 days ago</span>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
