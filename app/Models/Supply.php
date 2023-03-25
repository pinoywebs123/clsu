<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsto(Category::class);
    }

    public function department()
    {
        return $this->belongsto(Department::class);
    }

    public function unit()
    {
        return $this->belongsto(Unit::class);
    }
}
