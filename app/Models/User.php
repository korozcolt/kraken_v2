<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'firstname','lastname' ,'dni', 'password',
        'role','status','email'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function getCompleteNameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }

    public function voter(){
        return $this->hasMany(Voter::class);
    }

    public function voterPerDay(){
        return $this->hasMany(Voter::class)->whereDate('created_at',Carbon::now());
    }

    public function typeRole(){
        $user = Coordinator::where('dni',$this->dni)->first();
        $user2 = Lider::where('dni',$this->dni)->first();
        $user3 = Supervisor::where('dni',$this->dni)->first();
        $user4 = Verifier::where('dni',$this->dni)->first();
        if($user){
            return 'COORDINATOR';
        }else if($user2){
            return 'LIDER';
        }else if($user3){
            return 'SUPERVISOR';
        }else if($user4){
            return 'VERIFIER';
        }else{
            return 'USER';
        }
    }
    
}
