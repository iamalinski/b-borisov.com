<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'path',
        'alt_text',
    ];

    /**
     * Get the full URL to the image
     */
    public function getUrlAttribute(): string
    {
        return Storage::url($this->path);
    }

    /**
     * Get images by key
     */
    public static function getByKey(string $key)
    {
        return static::where('key', $key)->get();
    }

    /**
     * Get single image by key
     */
    public static function getOneByKey(string $key): ?self
    {
        return static::where('key', $key)->first();
    }

    /**
     * Sections relationship through sectionables
     */
    public function sections()
    {
        return $this->morphToMany(Section::class, 'sectionable')
            ->withPivot('order')
            ->withTimestamps();
    }

    /**
     * Delete the image file when deleting the model
     */
    protected static function booted(): void
    {
        static::deleting(function (Image $image) {
            if (Storage::exists($image->path)) {
                Storage::delete($image->path);
            }
        });
    }
}
