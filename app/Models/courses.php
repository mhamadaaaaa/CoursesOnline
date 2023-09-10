<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class courses extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'description',
        'status',
        'slug',
        'image',
        'categories_id',
        'teacher_id',
    ];
    public function users()
    {

        return $this->belongsToMany(

            User::class, // Related Model
            'usercourses', // Pivot table name
            'course_id',  // FK in pivot table for the current model
            'user_id',  // FK in pivot table for the related model
            'id',  // PK current model
            'id'   // PK related model
        );
    }
}
