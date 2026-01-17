<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'organization_id',
        'teacher_id',
        'category_id',
        'title',
        'slug',
        'description',
        'level',
        'price',
        'cover_photo',
        'status',
        'remark',
        'created_by',
        'updated_by',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class)->orderBy('lesson_order');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'enrollments')
            ->withPivot(['status'])
            ->withTimestamps();
    }


}
