<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PackageItem;
use App\Models\Section;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Show packages management
     */
    public function index()
    {
        $sections = Section::where('slug', 'like', 'packages-%')
            ->orWhere('slug', 'packages')
            ->with(['packages.items'])
            ->get();

        return view('admin.packages.index', compact('sections'));
    }

    /**
     * Show create package section form
     */
    public function createSection()
    {
        return view('admin.packages.create-section');
    }

    /**
     * Store new package section
     */
    public function storeSection(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ], [
            'name.required' => 'Името на раздела е задължително.',
        ]);

        $slug = 'packages-' . \Str::slug($request->name);
        $counter = 1;
        $originalSlug = $slug;
        
        while (Section::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        Section::create([
            'name' => $request->name,
            'slug' => $slug,
        ]);

        return redirect()->route('admin.packages.index')
            ->with('success', 'Разделът беше създаден успешно.');
    }

    /**
     * Edit package section
     */
    public function editSection(Section $section)
    {
        return view('admin.packages.edit-section', compact('section'));
    }

    /**
     * Update package section
     */
    public function updateSection(Request $request, Section $section)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ], [
            'name.required' => 'Името на раздела е задължително.',
        ]);

        $section->update(['name' => $request->name]);

        return redirect()->route('admin.packages.index')
            ->with('success', 'Разделът беше обновен успешно.');
    }

    /**
     * Delete package section
     */
    public function destroySection(Section $section)
    {
        $section->delete();

        return redirect()->route('admin.packages.index')
            ->with('success', 'Разделът беше изтрит успешно.');
    }

    /**
     * Show create package form
     */
    public function create(Section $section)
    {
        return view('admin.packages.create', compact('section'));
    }

    /**
     * Store new package
     */
    public function store(Request $request, Section $section)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'items' => 'nullable|array',
            'items.*.title' => 'required|string|max:255',
            'items.*.is_extra' => 'boolean',
        ], [
            'title.required' => 'Заглавието е задължително.',
            'price.required' => 'Цената е задължителна.',
            'price.numeric' => 'Цената трябва да бъде число.',
            'price.min' => 'Цената не може да бъде отрицателна.',
            'items.*.title.required' => 'Заглавието на услугата е задължително.',
        ]);

        $maxOrder = Package::where('section_id', $section->id)->max('order') ?? 0;

        $package = Package::create([
            'section_id' => $section->id,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'order' => $maxOrder + 1,
        ]);

        if ($request->has('items')) {
            foreach ($request->items as $index => $item) {
                PackageItem::create([
                    'package_id' => $package->id,
                    'title' => $item['title'],
                    'is_extra' => $item['is_extra'] ?? false,
                    'order' => $index,
                ]);
            }
        }

        return redirect()->route('admin.packages.index')
            ->with('success', 'Пакетът беше създаден успешно.');
    }

    /**
     * Show edit package form
     */
    public function edit(Package $package)
    {
        $package->load('items');
        return view('admin.packages.edit', compact('package'));
    }

    /**
     * Update package
     */
    public function update(Request $request, Package $package)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'items' => 'nullable|array',
            'items.*.title' => 'required|string|max:255',
            'items.*.is_extra' => 'boolean',
        ], [
            'title.required' => 'Заглавието е задължително.',
            'price.required' => 'Цената е задължителна.',
            'price.numeric' => 'Цената трябва да бъде число.',
            'price.min' => 'Цената не може да бъде отрицателна.',
            'items.*.title.required' => 'Заглавието на услугата е задължително.',
        ]);

        $package->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        // Delete old items and create new ones
        $package->items()->delete();

        if ($request->has('items')) {
            foreach ($request->items as $index => $item) {
                PackageItem::create([
                    'package_id' => $package->id,
                    'title' => $item['title'],
                    'is_extra' => $item['is_extra'] ?? false,
                    'order' => $index,
                ]);
            }
        }

        return redirect()->route('admin.packages.index')
            ->with('success', 'Пакетът беше обновен успешно.');
    }

    /**
     * Delete package
     */
    public function destroy(Package $package)
    {
        $package->delete();

        return redirect()->route('admin.packages.index')
            ->with('success', 'Пакетът беше изтрит успешно.');
    }

    /**
     * Update packages order
     */
    public function updateOrder(Request $request)
    {
        $request->validate([
            'order' => 'required|array',
            'order.*' => 'integer|exists:packages,id',
        ]);

        foreach ($request->order as $position => $packageId) {
            Package::where('id', $packageId)->update(['order' => $position]);
        }

        return response()->json(['success' => true]);
    }
}
