@extends('admin.layouts.app')

@section('title', 'SEO настройки')
@section('breadcrumb', 'SEO настройки')

@section('header', 'SEO настройки')
@section('subheader', 'Управление на SEO мета данни за сайта')

@section('content')
<form action="{{ route('admin.settings.seo.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="max-w-2xl space-y-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100">
                <h2 class="text-lg font-semibold text-gray-900">Meta данни</h2>
                <p class="text-sm text-gray-500">Тези данни се използват от търсачките и социалните мрежи</p>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
                        SEO Заглавие
                        <span class="text-gray-400 font-normal">(максимум 70 символа)</span>
                    </label>
                    <input 
                        type="text" 
                        name="title" 
                        id="title" 
                        value="{{ old('title', $title) }}"
                        maxlength="70"
                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 @error('title') border-red-500 @enderror"
                        placeholder="Борис Борисов - Професионална фотография"
                        required
                    >
                    <p class="mt-1 text-xs text-gray-500">
                        <span id="title-count">{{ strlen(old('title', $title)) }}</span>/70 символа
                    </p>
                    @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
                        Meta Описание
                        <span class="text-gray-400 font-normal">(максимум 160 символа)</span>
                    </label>
                    <textarea 
                        name="description" 
                        id="description" 
                        rows="3"
                        maxlength="160"
                        class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 @error('description') border-red-500 @enderror"
                        placeholder="Професионална фотография за сватби, портрети и събития. Улавям незабравими моменти с внимание към детайла."
                        required
                    >{{ old('description', $description) }}</textarea>
                    <p class="mt-1 text-xs text-gray-500">
                        <span id="description-count">{{ strlen(old('description', $description)) }}</span>/160 символа
                    </p>
                    @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- OG Image -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100">
                <h2 class="text-lg font-semibold text-gray-900">OG Image</h2>
                <p class="text-sm text-gray-500">Изображение, което се показва при споделяне в социални мрежи</p>
            </div>
            <div class="p-6">
                <div class="flex items-start space-x-6">
                    @if($ogImage)
                    <div class="flex-shrink-0">
                        <div class="relative group">
                            <img src="{{ Storage::url($ogImage->path) }}" alt="OG Image" class="w-48 h-auto rounded-lg">
                            <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center">
                                <button type="button" onclick="deleteOgImage()" class="p-2 bg-red-500 text-white rounded-full hover:bg-red-600 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ $ogImage ? 'Смени OG изображението' : 'Качи OG изображение' }}
                        </label>
                        <input 
                            type="file" 
                            name="og_image" 
                            accept="image/jpeg,image/png,image/jpg,image/webp"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100"
                        >
                        <p class="mt-1 text-xs text-gray-500">Препоръчителен размер: 1200x630 пиксела. Максимален размер: 2MB.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Preview -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100">
                <h2 class="text-lg font-semibold text-gray-900">Преглед в Google</h2>
            </div>
            <div class="p-6">
                <div class="border border-gray-200 rounded-lg p-4 bg-gray-50">
                    <p class="text-blue-600 text-lg hover:underline cursor-pointer" id="preview-title">
                        {{ $title ?: 'Заглавие на сайта' }}
                    </p>
                    <p class="text-green-700 text-sm">https://b-borisov.com</p>
                    <p class="text-gray-600 text-sm mt-1" id="preview-description">
                        {{ $description ?: 'Meta описание на сайта ще се показва тук...' }}
                    </p>
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-6 py-2 bg-amber-500 text-white font-medium rounded-lg hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-colors">
                Запази промените
            </button>
        </div>
    </div>
</form>

<!-- Скрита форма за изтриване на OG изображение -->
<form id="delete-og-form" action="{{ route('admin.settings.seo.delete-og') }}" method="POST" class="hidden">
    @csrf
    @method('DELETE')
</form>

@push('scripts')
<script>
    // Delete OG Image function
    function deleteOgImage() {
        if (confirm('Сигурни ли сте, че искате да изтриете OG изображението?')) {
            document.getElementById('delete-og-form').submit();
        }
    }

    // Character counters
    const titleInput = document.getElementById('title');
    const descInput = document.getElementById('description');
    const titleCount = document.getElementById('title-count');
    const descCount = document.getElementById('description-count');
    const previewTitle = document.getElementById('preview-title');
    const previewDesc = document.getElementById('preview-description');

    titleInput.addEventListener('input', function() {
        titleCount.textContent = this.value.length;
        previewTitle.textContent = this.value || 'Заглавие на сайта';
    });

    descInput.addEventListener('input', function() {
        descCount.textContent = this.value.length;
        previewDesc.textContent = this.value || 'Meta описание на сайта ще се показва тук...';
    });
</script>
@endpush
@endsection
