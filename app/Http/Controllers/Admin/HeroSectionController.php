<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Section;
use App\Models\Text;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroSectionController extends Controller
{
    /**
     * Show hero section management
     */
    public function index()
    {
        $section = Section::getBySlug('hero');
        $heroImages = Image::where('key', 'hero_main')->get();
        $portraitImage = Image::getOneByKey('hero_portrait');
        $description = Text::getByKey('hero_description');

        return view('admin.sections.hero', compact('section', 'heroImages', 'portraitImage', 'description'));
    }

    /**
     * Update hero section
     */
    public function update(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'hero_images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'portrait_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ], [
            'description.required' => 'Описанието е задължително.',
            'hero_images.*.image' => 'Файлът трябва да бъде изображение.',
            'hero_images.*.mimes' => 'Изображението трябва да бъде jpeg, png, jpg или webp.',
            'hero_images.*.max' => 'Изображението не може да надвишава 5MB.',
            'portrait_image.image' => 'Файлът трябва да бъде изображение.',
            'portrait_image.mimes' => 'Изображението трябва да бъде jpeg, png, jpg или webp.',
            'portrait_image.max' => 'Изображението не може да надвишава 5MB.',
        ]);

        // Update description
        Text::setByKey('hero_description', $request->description);

        // Handle hero images upload
        if ($request->hasFile('hero_images')) {
            foreach ($request->file('hero_images') as $file) {
                $currentCount = Image::where('key', 'hero_main')->count();
                if ($currentCount >= 5) {
                    break;
                }
                
                $path = $file->store('images/hero', 'public');
                Image::create([
                    'key' => 'hero_main',
                    'path' => $path,
                    'alt_text' => 'Hero изображение',
                ]);
            }
        }

        // Handle portrait image upload
        if ($request->hasFile('portrait_image')) {
            // Delete old portrait if exists
            $oldPortrait = Image::getOneByKey('hero_portrait');
            if ($oldPortrait) {
                $oldPortrait->delete();
            }

            $path = $request->file('portrait_image')->store('images/hero', 'public');
            Image::create([
                'key' => 'hero_portrait',
                'path' => $path,
                'alt_text' => 'Портретна снимка на автора',
            ]);
        }

        return redirect()->route('admin.hero.index')
            ->with('success', 'Секцията беше обновена успешно.');
    }

    /**
     * Delete hero image
     */
    public function deleteImage(Image $image)
    {
        if (!in_array($image->key, ['hero_main', 'hero_portrait'])) {
            abort(403);
        }

        $image->delete();

        return redirect()->route('admin.hero.index')
            ->with('success', 'Изображението беше изтрито успешно.');
    }

    /**
     * Update image alt text
     */
    public function updateImageAlt(Request $request, Image $image)
    {
        $request->validate([
            'alt_text' => 'nullable|string|max:255',
        ]);

        $image->update(['alt_text' => $request->alt_text]);

        return response()->json(['success' => true]);
    }
}
