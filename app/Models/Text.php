<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'content',
    ];

    /**
     * Get text by key
     */
    public static function getByKey(string $key): ?string
    {
        $text = static::where('key', $key)->first();
        return $text?->content;
    }

    /**
     * Set text by key
     */
    public static function setByKey(string $key, string $content): self
    {
        return static::updateOrCreate(
            ['key' => $key],
            ['content' => $content]
        );
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
}
