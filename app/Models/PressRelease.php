<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Attachment;

class PressRelease extends Model
{
    use HasFactory;

    public function attachment()
    {
         return $this->morphOne(Attachment::class, 'attachable');
    }
}
