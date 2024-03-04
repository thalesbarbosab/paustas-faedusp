<?php

namespace App\Repositories\Eloquent\Ruling;

use App\Interfaces\Database\Ruling\RulingInterface;
use App\Models\Ruling;

class RulingEloquentRepository implements RulingInterface
{
    public function create(array $ruling_array): Ruling
    {
        return Ruling::create($ruling_array);
    }

    public function update(array $ruling_array, $id): void
    {
        $ruling = Ruling::findOrFail($id);
        $ruling->update($ruling_array);
    }

    public function delete($id): void
    {
        $ruling = Ruling::findOrFail($id);
        $ruling->delete();
    }

    public function find(string $id): Ruling
    {
        return Ruling::findOrFail($id);
    }

    public function findBySlug(string $slug): Ruling
    {
        return Ruling::whereSlug($slug)->firstOrFail();
    }

    public function getAll() : iterable
    {
        return Ruling::orderBy('publish_date','desc')
                   ->get();
    }

    public function getAllPaginated(int $items_per_page = 10) : iterable
    {
        return Ruling::orderBy('publish_date','desc')
                   ->paginate($items_per_page);
    }

    public function getAllLimit(int $limit) : iterable
    {
        return Ruling::orderBy('publish_date','desc')
                   ->take($limit)
                   ->get();
    }

    public function getAllCount() : int
    {
        return Ruling::all()->count();
    }
}
