<?php

namespace App\Services\Ruling;

use InvalidArgumentException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

use App\Models\Ruling;
use App\Interfaces\Database\Ruling\RulingInterface;

class RulingService
{
    public function __construct(
        protected readonly RulingInterface $ruling_repository,
    ){}

    public function getAll()
    {
        return $this->ruling_repository->getAll();
    }

    public function getAllPaginated(int $items_per_page)
    {
        return $this->ruling_repository->getAllPaginated($items_per_page);
    }

    public function getLimit(int $limit = 3)
    {
        $ruling = $this->ruling_repository->getAllLimit($limit);
        return $ruling;
    }

    public function getAllCount()
    {
       return $this->ruling_repository->getAllCount();
    }

    public function create(array $ruling_array) : Ruling
    {
        $ruling_array = $this->sanitizeRuling($ruling_array);
        return $this->ruling_repository->create($ruling_array);
    }

    public function update(array $ruling_array, $id) : void
    {
        $ruling_array = $this->sanitizeRuling($ruling_array);
        $this->ruling_repository->update($ruling_array, $id);
    }

    public function delete($id) : void
    {
        $this->ruling_repository->delete($id);
    }

    public function find($id): Ruling
    {
        return $this->ruling_repository->find($id);
    }

    public function findBySlug($slug): Ruling
    {
        return $this->ruling_repository->findBySlug($slug);
    }

    public function getRecents(int $limit = 10, ?Ruling $ruling_exclude = null)
    {
        $ruling = $this->ruling_repository->getAllLimit($limit);
        if(isset($ruling_exclude)){
            $ruling = $ruling->where('id',"<>",$ruling_exclude->id);
        }
        return $ruling;
    }

    public function formatToValidUrl(Ruling $ruling)
    {
        if(isset($ruling->image)){
            $ruling->formated_image = asset(self::valid_default_local_files.$ruling->image);
        }
        return $ruling;
    }

    public function countViews($id): void
    {
        $this->ruling_repository->countMoreOneView($id);
    }

    protected function sanitizeRuling(array $ruling_array) : array
    {
        $ruling_array_merged = array_merge($ruling_array,[
            'title' => mb_strtoupper($ruling_array['title']),
            'slug' => Str::slug($ruling_array['title']),
        ]);
        return $ruling_array_merged;
    }
}
