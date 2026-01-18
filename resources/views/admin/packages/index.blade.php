@extends('admin.layouts.app')

@section('title', 'Услуги и пакети')
@section('breadcrumb', 'Услуги и пакети')

@section('header', 'Услуги и пакетни предложения')
@section('subheader', 'Управление на раздели и пакети с услуги')

@section('content')
<div class="space-y-6">
    <!-- Add New Section Button -->
    <div class="flex justify-end">
        <a href="{{ route('admin.packages.section.create') }}" class="inline-flex items-center px-4 py-2 bg-amber-500 text-white font-medium rounded-lg hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
            </svg>
            Нов раздел
        </a>
    </div>

    @if($sections->count() > 0)
        @foreach($sections as $section)
        <!-- Section Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-semibold text-gray-900">{{ $section->name }}</h2>
                    <p class="text-sm text-gray-500">{{ $section->packages->count() }} пакета</p>
                </div>
                <div class="flex items-center space-x-2">
                    <a href="{{ route('admin.packages.create', $section) }}" class="inline-flex items-center px-3 py-1.5 bg-green-500 text-white text-sm font-medium rounded-lg hover:bg-green-600 transition-colors">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        Добави пакет
                    </a>
                    <a href="{{ route('admin.packages.section.edit', $section) }}" class="p-2 text-gray-600 hover:text-amber-600 transition-colors" title="Редактирай раздел">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </a>
                    <form action="{{ route('admin.packages.section.destroy', $section) }}" method="POST" class="inline" onsubmit="return confirm('Сигурни ли сте? Това ще изтрие и всички пакети в този раздел.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 text-gray-600 hover:text-red-600 transition-colors" title="Изтрий раздел">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

            @if($section->packages->count() > 0)
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($section->packages as $package)
                    <div class="border border-gray-200 rounded-lg p-4 hover:border-amber-300 transition-colors">
                        <div class="flex items-start justify-between mb-3">
                            <div>
                                <h3 class="font-semibold text-gray-900">{{ $package->title }}</h3>
                                <p class="text-2xl font-bold text-amber-500">{{ number_format($package->price, 0) }} лв.</p>
                            </div>
                            <div class="flex items-center space-x-1">
                                <a href="{{ route('admin.packages.edit', $package) }}" class="p-1.5 text-gray-500 hover:text-amber-600 transition-colors" title="Редактирай">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>
                                <form action="{{ route('admin.packages.destroy', $package) }}" method="POST" class="inline" onsubmit="return confirm('Сигурни ли сте, че искате да изтриете този пакет?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1.5 text-gray-500 hover:text-red-600 transition-colors" title="Изтрий">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>

                        @if($package->description)
                        <p class="text-sm text-gray-600 mb-3">{{ Str::limit($package->description, 100) }}</p>
                        @endif

                        @if($package->items->count() > 0)
                        <div class="space-y-1">
                            @foreach($package->standardItems as $item)
                            <div class="flex items-center text-sm">
                                <svg class="w-4 h-4 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-gray-700">{{ $item->title }}</span>
                            </div>
                            @endforeach

                            @if($package->extraItems->count() > 0)
                            <div class="mt-2 pt-2 border-t border-gray-100">
                                <p class="text-xs text-gray-500 mb-1">Допълнителни услуги:</p>
                                @foreach($package->extraItems as $item)
                                <div class="flex items-center text-sm">
                                    <svg class="w-4 h-4 text-amber-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                    <span class="text-gray-600">{{ $item->title }}</span>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            @else
            <div class="p-6 text-center">
                <p class="text-gray-500">Няма пакети в този раздел.</p>
                <a href="{{ route('admin.packages.create', $section) }}" class="inline-flex items-center mt-2 text-amber-500 hover:text-amber-600 font-medium text-sm">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Добави първия пакет
                </a>
            </div>
            @endif
        </div>
        @endforeach
    @else
    <!-- Empty State -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-12 text-center">
        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
        </svg>
        <h3 class="mt-2 text-sm font-medium text-gray-900">Няма раздели с пакети</h3>
        <p class="mt-1 text-sm text-gray-500">Създайте първия раздел за вашите услуги и пакети.</p>
        <div class="mt-6">
            <a href="{{ route('admin.packages.section.create') }}" class="inline-flex items-center px-4 py-2 bg-amber-500 text-white font-medium rounded-lg hover:bg-amber-600 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Създай раздел
            </a>
        </div>
    </div>
    @endif
</div>
@endsection
