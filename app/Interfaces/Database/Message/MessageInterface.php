<?php

namespace App\Interfaces\Database\Message;

use App\Models\Message;

interface MessageInterface
{
    public function create(array $group_array): Message;

    public function update(array $group_array, $id): void;

    public function delete($id): void;

    public function find(string $id): Message;

    /** @return Collection<Message> */
    public function getAll() : iterable;

    /** @return Collection<Message> */
    public function getAllPaginated(int $items_per_page = 10) : iterable;

    /** @return Collection<Message> */
    public function getAllLimit(int $limit) : iterable;

    public function getAllCount() : int;
}
