<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'slug', 'order', 'parent_id'
    ];

    public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function parent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function scopeRoots(Builder $builder)
    {
        $builder->whereNull('parent_id');
    }

    public function scopeSort(Builder $builder, $direction = 'asc')
    {
        $builder->orderBy('order', $direction);
    }
}
