<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname','lastname' ,'dni','phone','phone_two', 
        'address' ,'birthdate','son_number','status','user_id', 
        'city_id','guide','witness' ,'comment','place','table','gender'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function age(){
        $birthdate = Carbon::parse($this->birthdate);
        $age = $birthdate->age;
        return $age;
    }
}
