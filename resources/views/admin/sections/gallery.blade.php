@extends('admin.layouts.app')

@section('title', 'Галерия')
@section('breadcrumb', 'Галерия')

@section('header', 'Галерия')
@section('subheader', 'Управление на до 20 изображения за галерията')

@section('content')
<div class="space-y-6">
    <!-- Upload Form -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100">
            <h2 class="text-lg font-semibold text-gray-900">Качване на изображения</h2>
            <p class="text-sm text-gray-500">
                Качени: {{ $images->count() }} от 20 изображения
            </p>
        </div>
        <div class="p-6">
            @if($images->count() < 20)
            <form action="{{ route('admin.gallery.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex items-end space-x-4">
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Избери изображения (максимум {{ 20 - $images->count() }} оставащи)
                        </label>
                        <input 
                            type="file" 
                            name="images[]" 
                            multiple 
                            accept="image/jpeg,image/png,image/jpg,image/webp"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100"
                            required
                        >
                        <p class="mt-1 text-xs text-gray-500">Допустими формати: JPEG, PNG, JPG, WebP. Максимален размер: 5MB на файл.</p>
                    </div>
                    <button type="submit" class="px-6 py-2 bg-amber-500 text-white font-medium rounded-lg hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-colors">
                        Качи
                    </button>
                </div>
            </form>
            @else
            <p class="text-sm text-amber-600">Достигнат е максималният брой изображения (20). Изтрийте някое, за да качите ново.</p>
            @endif
        </div>
    </div>

    <!-- Images Grid -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100">
            <h2 class="text-lg font-semibold text-gray-900">Изображения в галерията</h2>
            <p class="text-sm text-gray-500">Преместете изображенията за да промените реда им (drag & drop)</p>
        </div>
        <div class="p-6">
            @if($images->count() > 0)
            <div id="gallery-grid" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                @foreach($images as $image)
                <div class="relative group gallery-item" data-id="{{ $image->id }}">
                    <div class="aspect-square overflow-hidden rounded-lg bg-gray-100">
                        <img 
                            src="{{ Storage::url($image->path) }}" 
                            alt="{{ $image->alt_text }}" 
                            class="w-full h-full object-cover cursor-move"
                            draggable="false"
                        >
                    </div>
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center space-x-2">
                        <!-- Edit Alt Text -->
                        <button 
                            type="button" 
                            onclick="editAltText({{ $image->id }}, '{{ addslashes($image->alt_text ?? '') }}')"
                            class="p-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition-colors"
                            title="Редактирай alt текст"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </button>
                        <!-- Delete -->
                        <form action="{{ route('admin.gallery.delete-image', $image) }}" method="POST" class="inline" onsubmit="return confirm('Сигурни ли сте, че искате да изтриете това изображение?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 bg-red-500 text-white rounded-full hover:bg-red-600 transition-colors" title="Изтрий">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                    <!-- Drag Handle -->
                    <div class="absolute top-2 left-2 p-1 bg-white bg-opacity-75 rounded cursor-move">
                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"/>
                        </svg>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">Няма изображения</h3>
                <p class="mt-1 text-sm text-gray-500">Качете първото си изображение в галерията.</p>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Alt Text Modal -->
<div id="alt-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
    <div class="bg-white rounded-xl shadow-xl max-w-md w-full mx-4">
        <div class="px-6 py-4 border-b border-gray-100">
            <h3 class="text-lg font-semibold text-gray-900">Редактиране на Alt текст</h3>
        </div>
        <div class="p-6">
            <input 
                type="text" 
                id="alt-text-input" 
                class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500"
                placeholder="Въведете описание на изображението..."
            >
            <input type="hidden" id="alt-image-id">
        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex justify-end space-x-3">
            <button type="button" onclick="closeAltModal()" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-900">
                Отказ
            </button>
            <button type="button" onclick="saveAltText()" class="px-4 py-2 bg-amber-500 text-white text-sm font-medium rounded-lg hover:bg-amber-600 transition-colors">
                Запази
            </button>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
    // Initialize Sortable
    const galleryGrid = document.getElementById('gallery-grid');
    if (galleryGrid) {
        new Sortable(galleryGrid, {
            animation: 150,
            ghostClass: 'opacity-50',
            onEnd: function(evt) {
                const items = galleryGrid.querySelectorAll('.gallery-item');
                const order = Array.from(items).map(item => item.dataset.id);
                
                fetch('{{ route("admin.gallery.update-order") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ order: order })
                });
            }
        });
    }

    // Alt text modal functions
    function editAltText(id, currentAlt) {
        document.getElementById('alt-image-id').value = id;
        document.getElementById('alt-text-input').value = currentAlt;
        document.getElementById('alt-modal').classList.remove('hidden');
    }

    function closeAltModal() {
        document.getElementById('alt-modal').classList.add('hidden');
    }

    function saveAltText() {
        const id = document.getElementById('alt-image-id').value;
        const altText = document.getElementById('alt-text-input').value;

        fetch(`/admin/gallery/${id}/alt`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ alt_text: altText })
        }).then(response => {
            if (response.ok) {
                closeAltModal();
                location.reload();
            }
        });
    }
</script>
@endpush
@endsection
