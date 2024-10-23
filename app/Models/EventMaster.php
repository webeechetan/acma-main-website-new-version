<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Attachment;


class EventMaster extends Model
{
    use HasFactory;

    public static function categories()
    {
        return Category::where('categorizable_type', 'App\Models\EventMaster')->get();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function attachment()
    {
        return $this->morphOne(Attachment::class, 'attachable');
    }

}
