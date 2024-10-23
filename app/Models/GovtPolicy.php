<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class GovtPolicy extends Model
{
    use HasFactory;

    public static function categories()
    {
        return Category::where('categorizable_type', 'App\Models\GovtPolicy')->get();
    }

    public function attachment()
    {
        // return $this->morphMany(Attachment::class, 'attachable');
        return $this->morphOne(Attachment::class, 'attachable');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
