<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'name', 'email', 'role', 'image', 'class_id', 'allocation_deleted_at', 'deleted_at',
    ];

    protected $casts = [
        'allocation_deleted_at', 'deleted_at',
    ];

    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id', 'id');
    }
}
