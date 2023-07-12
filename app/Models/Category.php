<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name', 'description', 'image', 'status', 'slug'
    ];

    public function products()
    {
        return $this->hasMany(product::class, 'category_id', 'id');
    }
    public function scopeActive(Builder $builder){
        $builder->where('status', '=', 'active');
    }
}
