<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_has_subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subject_id',
    ];

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'id');
    }
}
