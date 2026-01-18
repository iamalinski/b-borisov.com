<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sectionable extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_id',
        'sectionable_type',
        'sectionable_id',
        'order',
    ];

    /**
     * Get the parent section
     */
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    /**
     * Get the sectionable model (polymorphic)
     */
    public function sectionable()
    {
        return $this->morphTo();
    }
}
