<?php

namespace App\Interfaces\Database\Ruling;

use App\Models\Ruling;

interface RulingInterface
{
    public function create(array $ruling_array): Ruling;

    public function update(array $ruling_array, $id): void;

    public function delete($id): void;

    public function find(string $id): Ruling;

    public function findBySlug(string $slug): Ruling;

    /** @return Collection<Ruling> */
    public function getAll() : iterable;

    /** @return Collection<Ruling> */
    public function getAllPaginated(int $items_per_page = 10) : iterable;

    /** @return Collection<Ruling> */
    public function getAllLimit(int $limit) : iterable;

    public function getAllCount() : int;
}
