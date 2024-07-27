<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'birthday'];

    public function guardians()
    {
        return $this->belongsToMany(Guardian::class, 'guardian_student');
    }
}
