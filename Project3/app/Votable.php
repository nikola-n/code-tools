<?php


namespace App;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

trait Votable {

//    public function scopeWithVotes(Builder $query)
//    {
//        $query->leftJoinSub(
//            'select course_id, sum(voted) votes from votes group by course_id',
//            'votes',
//            'votes.course_id',
//            'courses.id'
//        );
//    }


    public function votes()
    {
        return $this->hasMany(Vote::class)->where('voted', true);
    }

    public function vote($user = null, $voted = true)
    {
        $this->votes()->updateOrCreate(
            [
                'user_id' => $user = auth()->id()
            ],
            [
                'voted' => $voted,
            ]
        );
    }
    public function unvote()
    {
        $this->votes()->where('user_id' , Auth::user()->id)
            ->delete();
    }

    public function isVoted()
    {
        return $this->votes()
            ->where('user_id', Auth::id())
            ->count();
    }

    public function toggle()
    {
        if($this->isVoted()) {
            return !! $this->unvote();
        }
        return $this->vote();
    }

    public function getVotesCountAttribute()
    {
        return $this->votes()->count();
    }

}
