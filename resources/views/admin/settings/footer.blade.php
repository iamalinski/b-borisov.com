@extends('admin.layouts.app')

@section('title', 'Footer настройки')
@section('breadcrumb', 'Footer')

@section('header', 'Footer настройки')
@section('subheader', 'Контактна информация, която се показва в целия сайт')

@section('content')
<form action="{{ route('admin.settings.footer.update') }}" method="POST">
    @csrf
    @method('PUT')

    <div class="max-w-2xl space-y-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100">
                <h2 class="text-lg font-semibold text-gray-900">Контактна информация</h2>
                <p class="text-sm text-gray-500">Тази информация ще се показва в footer секцията и на други места в сайта</p>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Телефонен номер</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <input 
                            type="text" 
                            name="phone" 
                            id="phone" 
                            value="{{ old('phone', $phone) }}"
                            class="block w-full pl-10 rounded-lg border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 @error('phone') border-red-500 @enderror"
                            placeholder="+359 888 123 456"
                            required
                        >
                    </div>
                    @error('phone')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Имейл адрес</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <input 
                            type="email" 
                            name="email" 
                            id="email" 
                            value="{{ old('email', $email) }}"
                            class="block w-full pl-10 rounded-lg border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 @error('email') border-red-500 @enderror"
                            placeholder="contact@example.com"
                            required
                        >
                    </div>
                    @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="px-6 py-4 border-t border-gray-100 flex justify-end">
                <button type="submit" class="px-6 py-2 bg-amber-500 text-white font-medium rounded-lg hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-colors">
                    Запази промените
                </button>
            </div>
        </div>
    </div>
</form>
@endsection
