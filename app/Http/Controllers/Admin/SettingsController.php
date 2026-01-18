<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Show footer settings
     */
    public function footer()
    {
        $phone = Setting::getValue('footer_phone', '');
        $email = Setting::getValue('footer_email', '');

        return view('admin.settings.footer', compact('phone', 'email'));
    }

    /**
     * Update footer settings
     */
    public function updateFooter(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|max:50',
            'email' => 'required|email|max:255',
        ], [
            'phone.required' => 'Телефонният номер е задължителен.',
            'email.required' => 'Имейлът е задължителен.',
            'email.email' => 'Моля, въведете валиден имейл адрес.',
        ]);

        Setting::setValue('footer_phone', $request->phone, 'text', 'footer');
        Setting::setValue('footer_email', $request->email, 'text', 'footer');

        return redirect()->route('admin.settings.footer')
            ->with('success', 'Настройките бяха обновени успешно.');
    }

    /**
     * Show SEO settings
     */
    public function seo()
    {
        $title = Setting::getValue('seo_title', '');
        $description = Setting::getValue('seo_description', '');
        $ogImage = Image::getOneByKey('seo_og_image');

        return view('admin.settings.seo', compact('title', 'description', 'ogImage'));
    }

    /**
     * Update SEO settings
     */
    public function updateSeo(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:70',
            'description' => 'required|string|max:160',
            'og_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ], [
            'title.required' => 'SEO заглавието е задължително.',
            'title.max' => 'SEO заглавието не може да надвишава 70 символа.',
            'description.required' => 'Meta описанието е задължително.',
            'description.max' => 'Meta описанието не може да надвишава 160 символа.',
            'og_image.image' => 'Файлът трябва да бъде изображение.',
            'og_image.mimes' => 'Изображението трябва да бъде jpeg, png, jpg или webp.',
            'og_image.max' => 'Изображението не може да надвишава 2MB.',
        ]);

        Setting::setValue('seo_title', $request->title, 'text', 'seo');
        Setting::setValue('seo_description', $request->description, 'textarea', 'seo');

        if ($request->hasFile('og_image')) {
            // Delete old OG image if exists
            $oldImage = Image::getOneByKey('seo_og_image');
            if ($oldImage) {
                $oldImage->delete();
            }

            $path = $request->file('og_image')->store('images/seo', 'public');
            Image::create([
                'key' => 'seo_og_image',
                'path' => $path,
                'alt_text' => 'OG Image',
            ]);
        }

        return redirect()->route('admin.settings.seo')
            ->with('success', 'SEO настройките бяха обновени успешно.');
    }

    /**
     * Delete OG Image
     */
    public function deleteOgImage()
    {
        $image = Image::getOneByKey('seo_og_image');
        if ($image) {
            $image->delete();
        }

        return redirect()->route('admin.settings.seo')
            ->with('success', 'OG изображението беше изтрито успешно.');
    }
}
