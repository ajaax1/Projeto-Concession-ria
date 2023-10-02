<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicles extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'image',
        'slug',
        'brand',
        'year',
        'mileage',
        'fuel',
        'items',
        'condition',
        'description',
        'characteristics',
        'users_id'
    ];

    protected $casts = [
        'characteristics' => 'array',
    ];

    public function parent(): BelongsTo{
        return $this->belongsTo(Vehicles::class,'users_id');
    }
}
