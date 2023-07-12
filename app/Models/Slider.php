<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table = '_slider';


    public function scopeActive(Builder $builder)
    {
        $builder->where('status', '=', 'active');
    }
}
