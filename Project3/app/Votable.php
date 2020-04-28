<?php


namespace App;


use Illuminate\Database\Eloquent\Builder;

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

//    public function unvote()
//    {
//        $this->votes()->delete();
//    }
//    public function toggleVote(User $user)
//    {
//        $this->votes()->toggle($user);
//    }
}
