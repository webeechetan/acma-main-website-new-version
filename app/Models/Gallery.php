<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Attachment;

class Gallery extends Model
{
    use HasFactory;

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }

    public static function categories()
    {
        return Category::where('categorizable_type', 'App\Models\Gallery')->get();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
