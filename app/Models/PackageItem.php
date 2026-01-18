<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'title',
        'is_extra',
        'order',
    ];

    protected $casts = [
        'is_extra' => 'boolean',
    ];

    /**
     * Get the package this item belongs to
     */
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
