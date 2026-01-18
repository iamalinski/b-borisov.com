@extends('admin.layouts.app')

@section('title', 'Нов раздел')
@section('breadcrumb', 'Нов раздел')

@section('header', 'Създаване на нов раздел')
@section('subheader', 'Добавете нов раздел за групиране на пакети')

@section('content')
<form action="{{ route('admin.packages.section.store') }}" method="POST">
    @csrf

    <div class="max-w-2xl">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100">
                <h2 class="text-lg font-semibold text-gray-900">Информация за раздела</h2>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Име на раздела</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        value="{{ old('name') }}"
                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 @error('name') border-red-500 @enderror"
                        placeholder="напр. Сватбена фотография"
                        required
                    >
                    @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="px-6 py-4 border-t border-gray-100 flex justify-end space-x-3">
                <a href="{{ route('admin.packages.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-900">
                    Отказ
                </a>
                <button type="submit" class="px-6 py-2 bg-amber-500 text-white font-medium rounded-lg hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-colors">
                    Създай раздел
                </button>
            </div>
        </div>
    </div>
</form>
@endsection
