<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasFactory;

    protected $guarded = [];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
        $this->attributes['slug'] = Str::slug($value);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function admin()
    {
        return $this->belongsTo(DepartmentAdmin::class, 'admin_id');
    }

    public function course_teachers()
    {
        return $this->hasMany(CourseTeacher::class, 'teacher_id');
    }
}
