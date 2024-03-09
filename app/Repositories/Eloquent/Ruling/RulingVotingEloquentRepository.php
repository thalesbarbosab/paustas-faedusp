<?php

namespace App\Repositories\Eloquent\Ruling;

use App\Models\RulingVoting;
use App\Interfaces\Database\Ruling\RulingVotingInterface;

class RulingVotingEloquentRepository implements RulingVotingInterface
{
    public function create(array $ruling_voting_array): RulingVoting
    {
        return RulingVoting::create($ruling_voting_array);
    }
}
