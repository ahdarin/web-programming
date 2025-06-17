<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    //Relationship: One Major has many Student
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
