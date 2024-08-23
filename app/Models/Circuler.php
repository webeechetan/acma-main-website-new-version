<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Category;
use App\Models\Attachment;


class Circuler extends Model
{
    use HasFactory;

    public function setKeywordsAttribute($value)
    {
        if(!$value) {
            $this->attributes['keywords'] = json_encode([]);
            return;
        }

        $value = json_decode($value);
        $keywords = [];
        foreach ($value as $key => $keyword) {
            $keywords[] = $keyword->value;
        }
        $this->attributes['keywords'] = json_encode($keywords);
    }

    public function getKeywordsAttribute($value)
    {
        $keywords = $this->attributes['keywords'];
        $keywords = json_decode($keywords);
        return $keywords;
    }

    public static function categories()
    {
        return Category::where('categorizable_type', 'App\Models\Circuler')->get();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }
}
