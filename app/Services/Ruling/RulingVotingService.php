<?php

namespace App\Services\Ruling;

use App\Models\RulingVoting;
use App\Interfaces\Database\Ruling\RulingVotingInterface;

class RulingVotingService
{
    public function __construct(
        protected readonly RulingVotingInterface $ruling_voting_interface,
    ){}

    public function create(array $ruling_voting_array) : RulingVoting
    {
        return $this->ruling_voting_interface->create($ruling_voting_array);
    }

}
