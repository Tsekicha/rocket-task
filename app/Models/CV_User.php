<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CV_User extends Model
{
    use HasFactory;

    protected $fillable = ['firstName', 'middleName', 'lastName', 'birthday'];

    public function cv()
    {
        return $this->hasOne(CV::class);
    }
}
