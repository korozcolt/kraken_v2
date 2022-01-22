<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Coordinator extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname','lastname' ,'dni','phone','phone_two', 
        'address' ,'birthdate','son_number','status','user_id', 
        'supervisor_id' ,'city_id','guide','witness' ,'comment',
        'call_status','place','table','gender'
    ];

    public function supervisor(){
        return $this->belongsTo(Supervisor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function liders()
    {
        return $this->hasMany(Lider::class);
    }

    public function age(){
        $birthdate = Carbon::parse($this->birthdate);
        $age = $birthdate->age;
        return $age;
    }
}
