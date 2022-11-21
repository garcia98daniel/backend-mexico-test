<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subject_has_student;

class Subject extends Model
{
    use HasFactory;

    public function studentsPivot()
    {
        return $this->hasMany(Subject_has_student::class);
    }


    
}
