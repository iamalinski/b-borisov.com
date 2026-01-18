<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_id',
        'title',
        'description',
        'price',
        'order',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    /**
     * Get the section this package belongs to
     */
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    /**
     * Get all items for this package
     */
    public function items()
    {
        return $this->hasMany(PackageItem::class)->orderBy('order');
    }

    /**
     * Get standard items (not extras)
     */
    public function standardItems()
    {
        return $this->hasMany(PackageItem::class)
            ->where('is_extra', false)
            ->orderBy('order');
    }

    /**
     * Get extra items
     */
    public function extraItems()
    {
        return $this->hasMany(PackageItem::class)
            ->where('is_extra', true)
            ->orderBy('order');
    }
}
