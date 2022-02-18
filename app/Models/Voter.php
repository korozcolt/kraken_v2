<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Voter extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname','lastname' ,'dni','phone','phone_two', 
        'address' ,'birthdate','son_number','status','user_id', 
        'lider_id' ,'city_id','guide','witness' ,'comment',
        'call_status','place','table',
    ];

    public function lider()
    {
        return $this->belongsTo(Lider::class);
    }
    public function getCompleteNameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }
    public function coordinator(){
        return $this->hasManyThrough(Coordinator::class, Lider::class);
    }

    public function verifier()
    {
        return $this->belongsToMany(Verifier::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function verify(){
        return VerifiedVoter::find($this->id) ? true : false;
    }

    public function age(){
        $birthdate = Carbon::parse($this->birthdate);
        $age = $birthdate->age;
        return $age;
    }
}
