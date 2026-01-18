@extends('admin.layouts.app')

@section('title', 'Нов пакет')
@section('breadcrumb', 'Нов пакет')

@section('header', 'Създаване на нов пакет')
@section('subheader', 'Раздел: ' . $section->name)

@section('content')
<form action="{{ route('admin.packages.store', $section) }}" method="POST" id="package-form">
    @csrf

    <div class="max-w-3xl space-y-6">
        <!-- Basic Info -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100">
                <h2 class="text-lg font-semibold text-gray-900">Основна информация</h2>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Заглавие на пакета</label>
                    <input 
                        type="text" 
                        name="title" 
                        id="title" 
                        value="{{ old('title') }}"
                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 @error('title') border-red-500 @enderror"
                        placeholder="напр. Стандартен пакет"
                        required
                    >
                    @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Цена (лв.)</label>
                    <input 
                        type="number" 
                        name="price" 
                        id="price" 
                        value="{{ old('price') }}"
                        step="0.01"
                        min="0"
                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 @error('price') border-red-500 @enderror"
                        placeholder="0.00"
                        required
                    >
                    @error('price')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Описание (незадължително)</label>
                    <textarea 
                        name="description" 
                        id="description" 
                        rows="3"
                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500"
                        placeholder="Кратко описание на пакета..."
                    >{{ old('description') }}</textarea>
                </div>
            </div>
        </div>

        <!-- Package Items -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100">
                <h2 class="text-lg font-semibold text-gray-900">Включени услуги</h2>
                <p class="text-sm text-gray-500">Добавете услугите, които са включени в пакета</p>
            </div>
            <div class="p-6">
                <div id="items-container" class="space-y-3">
                    <!-- Items will be added here dynamically -->
                </div>
                <button type="button" onclick="addItem(false)" class="mt-4 inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Добави услуга
                </button>
            </div>
        </div>

        <!-- Extra Items -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100">
                <h2 class="text-lg font-semibold text-gray-900">Допълнителни услуги</h2>
                <p class="text-sm text-gray-500">Услуги, които могат да бъдат добавени срещу допълнително заплащане</p>
            </div>
            <div class="p-6">
                <div id="extra-items-container" class="space-y-3">
                    <!-- Extra items will be added here dynamically -->
                </div>
                <button type="button" onclick="addItem(true)" class="mt-4 inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Добави допълнителна услуга
                </button>
            </div>
        </div>

        <!-- Submit -->
        <div class="flex justify-end space-x-3">
            <a href="{{ route('admin.packages.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-900">
                Отказ
            </a>
            <button type="submit" class="px-6 py-2 bg-amber-500 text-white font-medium rounded-lg hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-colors">
                Създай пакет
            </button>
        </div>
    </div>
</form>

@push('scripts')
<script>
    let itemIndex = 0;

    function addItem(isExtra = false) {
        const container = isExtra ? document.getElementById('extra-items-container') : document.getElementById('items-container');
        const div = document.createElement('div');
        div.className = 'flex items-center space-x-3';
        div.innerHTML = `
            <input type="hidden" name="items[${itemIndex}][is_extra]" value="${isExtra ? '1' : '0'}">
            <input 
                type="text" 
                name="items[${itemIndex}][title]" 
                class="flex-1 rounded-lg border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500"
                placeholder="${isExtra ? 'Допълнителна услуга...' : 'Въведете услуга...'}"
                required
            >
            <button type="button" onclick="removeItem(this)" class="p-2 text-gray-400 hover:text-red-500 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
            </button>
        `;
        container.appendChild(div);
        itemIndex++;
    }

    function removeItem(button) {
        button.parentElement.remove();
    }

    // Add one default item
    addItem(false);
</script>
@endpush
@endsection
