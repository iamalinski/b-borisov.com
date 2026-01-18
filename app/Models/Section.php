<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * Get section by slug
     */
    public static function getBySlug(string $slug): ?self
    {
        return static::where('slug', $slug)->first();
    }

    /**
     * Get all texts for this section
     */
    public function texts()
    {
        return $this->morphedByMany(Text::class, 'sectionable')
            ->withPivot('order')
            ->withTimestamps()
            ->orderBy('sectionables.order');
    }

    /**
     * Get all images for this section
     */
    public function images()
    {
        return $this->morphedByMany(Image::class, 'sectionable')
            ->withPivot('order')
            ->withTimestamps()
            ->orderBy('sectionables.order');
    }

    /**
     * Get all packages for this section
     */
    public function packages()
    {
        return $this->hasMany(Package::class)->orderBy('order');
    }
}
