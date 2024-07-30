<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'image'];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'guardian_student');
    }
}
