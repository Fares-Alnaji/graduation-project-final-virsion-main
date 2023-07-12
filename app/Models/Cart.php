<?php

namespace App\Models;

use App\Observers\CartObserver;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class cart extends Model
{
    use HasFactory;
        public $table="cart";

    public function user()
    {
        return $this->belongsTo(User::class);
    }



}

