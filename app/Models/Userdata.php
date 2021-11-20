<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Userdata extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'name',
        'profession',
        'phone',
        'email',
        'address'
    ];
    //capitalize first letter of user name
    public function setNameAttribute($value){

        return $this->attributes['name'] = Str::ucfirst($value);
    }
}
