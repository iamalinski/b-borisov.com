@extends('admin.layouts.app')

@section('title', 'Борис Борисов – Фотограф')
@section('breadcrumb', 'Борис Борисов – Фотограф')

@section('header', 'Борис Борисов – Фотограф')
@section('subheader', 'Управление на главните изображения и описателен текст')

@section('content')
<div class="space-y-6">
    <!-- Main Hero Images -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100">
            <h2 class="text-lg font-semibold text-gray-900">Главни изображения (максимум 5)</h2>
            <p class="text-sm text-gray-500">Тези изображения ще се показват в hero секцията на сайта</p>
        </div>
        <div class="p-6">
            <!-- Current Images -->
            @if($heroImages->count() > 0)
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 mb-6">
                @foreach($heroImages as $image)
                <div class="relative group">
                    <img src="{{ Storage::url($image->path) }}" alt="{{ $image->alt_text }}" class="w-full h-32 object-cover rounded-lg">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center">
                        <button type="button" onclick="deleteImage({{ $image->id }})" class="p-2 bg-red-500 text-white rounded-full hover:bg-red-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            <!-- Upload New Images -->
            @if($heroImages->count() < 5)
            <form action="{{ route('admin.hero.update') }}" method="POST" enctype="multipart/form-data" id="upload-hero-form">
                @csrf
                @method('PUT')
                <input type="hidden" name="description" value="{{ old('description', $description) }}">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Качи нови изображения ({{ 5 - $heroImages->count() }} оставащи)
                    </label>
                    <div class="flex items-end space-x-4">
                        <div class="flex-1">
                            <input 
                                type="file" 
                                name="hero_images[]" 
                                multiple 
                                accept="image/jpeg,image/png,image/jpg,image/webp"
                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100"
                            >
                            <p class="mt-1 text-xs text-gray-500">Допустими формати: JPEG, PNG, JPG, WebP. Максимален размер: 5MB.</p>
                        </div>
                        <button type="submit" class="px-4 py-2 bg-green-500 text-white font-medium rounded-lg hover:bg-green-600 transition-colors">
                            Качи
                        </button>
                    </div>
                </div>
            </form>
            @else
            <p class="text-sm text-amber-600">Достигнат е максималният брой изображения. Изтрийте някое, за да качите ново.</p>
            @endif
        </div>
    </div>

    <!-- Portrait Image -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100">
            <h2 class="text-lg font-semibold text-gray-900">Портретна снимка на автора</h2>
            <p class="text-sm text-gray-500">Една снимка, която представя фотографа</p>
        </div>
        <div class="p-6">
            <div class="flex items-start space-x-6">
                <!-- Current Portrait -->
                @if($portraitImage)
                <div class="flex-shrink-0">
                    <div class="relative group">
                        <img src="{{ Storage::url($portraitImage->path) }}" alt="{{ $portraitImage->alt_text }}" class="w-40 h-40 object-cover rounded-lg">
                        <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center">
                            <button type="button" onclick="deleteImage({{ $portraitImage->id }})" class="p-2 bg-red-500 text-white rounded-full hover:bg-red-600 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Upload Portrait -->
                <div class="flex-1">
                    <form action="{{ route('admin.hero.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="description" value="{{ old('description', $description) }}">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ $portraitImage ? 'Смени портретната снимка' : 'Качи портретна снимка' }}
                        </label>
                        <div class="flex items-end space-x-4">
                            <div class="flex-1">
                                <input 
                                    type="file" 
                                    name="portrait_image" 
                                    accept="image/jpeg,image/png,image/jpg,image/webp"
                                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100"
                                >
                                <p class="mt-1 text-xs text-gray-500">Допустими формати: JPEG, PNG, JPG, WebP. Максимален размер: 5MB.</p>
                            </div>
                            <button type="submit" class="px-4 py-2 bg-green-500 text-white font-medium rounded-lg hover:bg-green-600 transition-colors">
                                Качи
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Description Text -->
    <form action="{{ route('admin.hero.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100">
                <h2 class="text-lg font-semibold text-gray-900">Описателен текст</h2>
                <p class="text-sm text-gray-500">Текст, който описва фотографа и неговата работа</p>
            </div>
            <div class="p-6">
                <textarea 
                    name="description" 
                    id="description" 
                    rows="6"
                    class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 @error('description') border-red-500 @enderror"
                    placeholder="Въведете описание..."
                    required
                >{{ old('description', $description) }}</textarea>
                @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="px-6 py-4 border-t border-gray-100 flex justify-end">
                <button type="submit" class="px-6 py-3 bg-amber-500 text-white font-medium rounded-lg hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-colors">
                    Запази описанието
                </button>
            </div>
        </div>
    </form>
</div>

<!-- Hidden delete form -->
<form id="delete-image-form" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

@push('scripts')
<script>
    function deleteImage(imageId) {
        if (confirm('Сигурни ли сте, че искате да изтриете това изображение?')) {
            const form = document.getElementById('delete-image-form');
            form.action = '/admin/hero/image/' + imageId;
            form.submit();
        }
    }
</script>
@endpush
@endsection
