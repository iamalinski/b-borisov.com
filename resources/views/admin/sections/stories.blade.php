@extends('admin.layouts.app')

@section('title', 'Истории в кадър')
@section('breadcrumb', 'Истории в кадър')

@section('header', 'Истории в кадър')
@section('subheader', 'Управление на описателния текст за тази секция')

@section('content')
<form action="{{ route('admin.stories.update') }}" method="POST">
    @csrf
    @method('PUT')

    <div class="space-y-6">
        <!-- Description Text -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100">
                <h2 class="text-lg font-semibold text-gray-900">Описателен текст</h2>
                <p class="text-sm text-gray-500">Текст, който описва секцията "Истории в кадър"</p>
            </div>
            <div class="p-6">
                <textarea 
                    name="description" 
                    id="description" 
                    rows="8"
                    class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 @error('description') border-red-500 @enderror"
                    placeholder="Въведете описание за секцията..."
                    required
                >{{ old('description', $description) }}</textarea>
                @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-2 text-xs text-gray-500">Можете да използвате абзаци за по-добра структура на текста.</p>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" class="px-6 py-3 bg-amber-500 text-white font-medium rounded-lg hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-colors">
                Запази промените
            </button>
        </div>
    </div>
</form>
@endsection
