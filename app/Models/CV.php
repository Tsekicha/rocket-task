<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'technology_id', 'university_id'];

    public function user()
    {
        return $this->belongsTo(CV_User::class);
    }

    public function technology()
    {
        return $this->belongsTo(Technology::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}

