<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use UserFilter;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function courses()
    {
        return $this->hasMany(Course::class,'user_id');
    }
//    public function vote(Course $course)
//    {
//        $votes = \DB::table('votes')->increment('number_of_votes',1);
//        return $this->votes()->save($course, ['number_of_votes' => $votes]);
//    }
//
//    public function votes()
//    {
//        return $this->belongsToMany(Course::class, 'course_user','user_id','course_id')->withPivot('number_of_votes')->withTimestamps();
//    }


    public function scopeFilterBy($query, $filters)
    {
        $userFilter = new UserFilter($query, $filters );

        return $filtered->apply();
    }

}
