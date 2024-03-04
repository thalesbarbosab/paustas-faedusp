<?php

namespace App\Interfaces\Database\Ruling;

use App\Models\RulingPicture;
use Illuminate\Support\Collection;

interface RulingPictureInterface
{
    public function create(array $ruling_picture_array): RulingPicture;

    public function update(array $ruling_picture_array, $id): void;

    public function setAllAsDefaultFalseByRulingId($ruling_id): void;

    public function delete($id): void;

    public function find(string $id): RulingPicture;

    public function findByRulingId(string $ruling_id): iterable;

    /** @return Collection<RulingPicture> */
    public function getAllPaginated(int $ruling_id, int $items_per_page = 10) : iterable;
}
