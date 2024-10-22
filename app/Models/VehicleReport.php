<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class VehicleReport extends Model
{
    use HasFactory;

    public static function categories()
    {
        return Category::where('categorizable_type', 'App\Models\VehicleReport')->get();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
