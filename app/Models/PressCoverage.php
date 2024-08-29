<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Attachment;

class PressCoverage extends Model
{
    use HasFactory;

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }
}
