<?php

namespace App\Repositories\Eloquent\Ruling;

use App\Interfaces\Database\Ruling\RulingPictureInterface;
use App\Models\RulingPicture;
use Illuminate\Support\Facades\DB;

class RulingPictureEloquentRepository implements RulingPictureInterface
{
    public function create(array $ruling_array): RulingPicture
    {
        return RulingPicture::create($ruling_array);
    }

    public function delete($id): void
    {
        $ruling = RulingPicture::findOrFail($id);
        $ruling->delete();
    }

    public function update(array $ruling_picture_array, $id): void
    {
        $ruling_picture = RulingPicture::findOrFail($id);
        $ruling_picture->update($ruling_picture_array);
    }

    public function setAllAsDefaultFalseByRulingId($ruling_id): void
    {
        DB::table('ruling_pictures')->where('ruling_id',$ruling_id)->update(['is_default'=>false]);
    }

    public function find(string $id): RulingPicture
    {
        return RulingPicture::findOrFail($id);
    }

    public function findByRulingId(string $ruling_id): iterable
    {
        return RulingPicture::whereRulingId($ruling_id)->get();
    }

    public function getAllPaginated(int $ruling_id, int $items_per_page = 10) : iterable
    {
        return RulingPicture::orderBy('is_default','desc')
                             ->orderBy('created_at','desc')
                             ->whereRulingId($ruling_id)
                             ->paginate($items_per_page);
    }
}
