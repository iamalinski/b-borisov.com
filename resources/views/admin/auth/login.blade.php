@extends('admin.layouts.guest')

@section('title', 'Вход')

@section('content')
<div class="bg-white rounded-2xl shadow-xl p-8">
    <!-- Logo -->
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900">
            Borisov
        </h1>
        <p class="mt-2 text-sm text-gray-600">Администраторски панел</p>
    </div>

    <!-- Login Form -->
    <form method="POST" action="{{ route('admin.login') }}" class="space-y-6">
        @csrf

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Имейл адрес</label>
            <input 
                type="email" 
                name="email" 
                id="email" 
                value="{{ old('email') }}"
                required 
                autofocus
                class="mt-1 block w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors @error('email') border-red-500 @enderror"
                placeholder="admin@example.com"
            >
            @error('email')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Парола</label>
            <input 
                type="password" 
                name="password" 
                id="password" 
                required
                class="mt-1 block w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-colors @error('password') border-red-500 @enderror"
                placeholder="••••••••"
            >
            @error('password')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="flex items-center">
            <input 
                type="checkbox" 
                name="remember" 
                id="remember"
                class="h-4 w-4 text-amber-500 focus:ring-amber-500 border-gray-300 rounded"
            >
            <label for="remember" class="ml-2 block text-sm text-gray-700">
                Запомни ме
            </label>
        </div>

        <!-- Submit Button -->
        <button 
            type="submit"
            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-amber-500 hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-colors"
        >
            Вход
        </button>
    </form>
</div>

<!-- Footer -->
<p class="mt-8 text-center text-sm text-gray-500">
    &copy; {{ date('Y') }} Борис Борисов - Фотограф
</p>
@endsection
