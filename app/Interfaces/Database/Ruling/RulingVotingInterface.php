<?php

namespace App\Interfaces\Database\Ruling;

use App\Models\RulingVoting;

interface RulingVotingInterface
{
    public function create(array $ruling_array): RulingVoting;

    public function deleteByRuling($ruling_id): bool;
}
