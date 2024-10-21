<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Publication extends Model
{
    use HasFactory;

    public static function categories()
    {
        return Category::where('categorizable_type', 'App\Models\Publication')->get();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
