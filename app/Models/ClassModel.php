<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    protected $table = 'classes';

    protected $fillable = [
        'class_name', 'class_time', 'video_id', 'deleted_at',
    ];

    protected $casts = [
        'class_time', 'deleted_at',
    ];

    public function members()
    {
        return $this->hasMany(Member::class, 'id', 'class_id');
    }
}
