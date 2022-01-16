<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Lider extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname','lastname' ,'dni','phone','phone_two', 
        'address' ,'birthdate','son_number','status','user_id', 
        'coordinator_id' ,'city_id','guide','witness' ,'comment',
        'call_status','place','table','gender'
    ];

    public function coordinator()
    {
        return $this->belongsTo(Coordinator::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function voters()
    {
        return $this->hasMany(Voter::class);
    }

    public function age(){
        $birthdate = Carbon::parse($this->birthdate);
        $age = $birthdate->age;
        return $age;
    }
}
