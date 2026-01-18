<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Section;
use Illuminate\Http\Request;

class GallerySectionController extends Controller
{
    protected const MAX_IMAGES = 20;

    /**
     * Show gallery section management
     */
    public function index()
    {
        $images = Image::where('key', 'gallery')
            ->orderBy('id')
            ->get();

        return view('admin.sections.gallery', compact('images'));
    }

    /**
     * Upload gallery images
     */
    public function upload(Request $request)
    {
        $currentCount = Image::where('key', 'gallery')->count();
        $allowedCount = self::MAX_IMAGES - $currentCount;

        if ($allowedCount <= 0) {
            return redirect()->route('admin.gallery.index')
                ->with('error', 'Достигнат е максималният брой изображения (20).');
        }

        $request->validate([
            'images' => 'required|array|max:' . $allowedCount,
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:5120',
        ], [
            'images.required' => 'Моля, изберете поне едно изображение.',
            'images.max' => "Можете да качите максимум {$allowedCount} изображения.",
            'images.*.image' => 'Файлът трябва да бъде изображение.',
            'images.*.mimes' => 'Изображението трябва да бъде jpeg, png, jpg или webp.',
            'images.*.max' => 'Изображението не може да надвишава 5MB.',
        ]);

        $uploaded = 0;
        foreach ($request->file('images') as $file) {
            if ($currentCount + $uploaded >= self::MAX_IMAGES) {
                break;
            }

            $path = $file->store('images/gallery', 'public');
            Image::create([
                'key' => 'gallery',
                'path' => $path,
                'alt_text' => null,
            ]);
            $uploaded++;
        }

        return redirect()->route('admin.gallery.index')
            ->with('success', "{$uploaded} изображения бяха качени успешно.");
    }

    /**
     * Delete gallery image
     */
    public function deleteImage(Image $image)
    {
        if ($image->key !== 'gallery') {
            abort(403);
        }

        $image->delete();

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Изображението беше изтрито успешно.');
    }

    /**
     * Update gallery images order
     */
    public function updateOrder(Request $request)
    {
        $request->validate([
            'order' => 'required|array',
            'order.*' => 'integer|exists:images,id',
        ]);

        // Since we're using simple ordering, we can use a custom order field or re-order by IDs
        // For simplicity, we'll update a pivot table or use the sectionables table
        // Here we'll use a simple approach with the images table

        foreach ($request->order as $position => $imageId) {
            Image::where('id', $imageId)
                ->where('key', 'gallery')
                ->update(['updated_at' => now()->addSeconds($position)]);
        }

        return response()->json(['success' => true]);
    }

    /**
     * Update image alt text
     */
    public function updateAlt(Request $request, Image $image)
    {
        $request->validate([
            'alt_text' => 'nullable|string|max:255',
        ]);

        if ($image->key !== 'gallery') {
            abort(403);
        }

        $image->update(['alt_text' => $request->alt_text]);

        return response()->json(['success' => true]);
    }
}
