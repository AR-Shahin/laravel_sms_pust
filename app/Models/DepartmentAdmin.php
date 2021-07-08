<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DepartmentAdmin extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
        $this->attributes['slug'] = Str::slug($value);
    }
}
