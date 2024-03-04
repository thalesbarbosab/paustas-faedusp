<?php

namespace App\Services\Ruling;

use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Http\UploadedFile;

use App\Models\Ruling;
use App\Models\RulingPicture;
use App\Interfaces\Database\Ruling\RulingInterface;
use App\Interfaces\Database\Ruling\RulingPictureInterface;
use Illuminate\Support\Facades\Storage;
use InvalidArgumentException;

class RulingPictureService
{
    protected const default_local_files = 'public/ruling/';
    protected const valid_default_local_files = '/storage/ruling/';

    public function __construct(
        protected readonly RulingInterface $ruling_repository,
        protected readonly RulingPictureInterface $ruling_picture_repository,
    ){}

    public function getAllPaginated(int $ruling_id, int $items_per_page, bool $return_formated = true)
    {
        $ruling_pictures = $this->ruling_picture_repository->getAllPaginated($ruling_id, $items_per_page);
        if($return_formated){
            $ruling_pictures = $this->format($ruling_pictures);
        }
        return $ruling_pictures;
    }

    public function create(int $ruling_id, array $paths) : void
    {
        foreach($paths as $path){
            if( !($path instanceof UploadedFile) ){
                throw new InvalidArgumentException('The path is not valid instaceof Illuminate\Http\UploadedFile');
            }
            $path->store(self::default_local_files);
            $picture_data = [
                'ruling_id' => $ruling_id,
                'path' => $path->hashName()
            ];
            $this->ruling_picture_repository->create($picture_data);
        }
    }

    public function setAsDefault($ruling_id, $ruling_picture_id): void
    {
        $this->ruling_picture_repository->setAllAsDefaultFalseByRulingId($ruling_id);
        $this->ruling_picture_repository->update(['is_default'=>true],$ruling_picture_id);
    }

    public function delete($id) : void
    {
        $ruling_picture = $this->ruling_picture_repository->find($id);;
        Storage::delete(self::default_local_files.$ruling_picture->path);
        $this->ruling_picture_repository->delete($id);
    }

    public function deleteByRulingId($ruling_id) : void
    {
        $ruling_pictures = $this->ruling_picture_repository->findByRulingId($ruling_id);
        foreach($ruling_pictures as $ruling_picture){
            Storage::delete(self::default_local_files.$ruling_picture->path);
            $this->ruling_picture_repository->delete($ruling_picture->id);
        }
    }

    public function findRuling($id): Ruling
    {
        return $this->ruling_repository->find($id);
    }

    public function format(iterable $ruling_pictures)
    {
        foreach($ruling_pictures as $ruling_picture){
            $ruling_picture = $this->formatToValidUrl($ruling_picture);
        }
        return $ruling_pictures;
    }

    public function getDefaultCover(Ruling $ruling) : Ruling
    {
        $ruling_picture = $ruling->pictures->where('is_default',true)->first();
        if(isset($ruling_picture)){
            $ruling_picture = $this->formatToValidUrl($ruling_picture);
            $ruling->cover = $ruling_picture->formated_path;
            return $ruling;
        }
        $ruling_picture = $ruling->pictures->first();
        if(isset($ruling_picture)){
            $ruling_picture = $this->formatToValidUrl($ruling_picture);
            $ruling->cover = $ruling_picture->formated_path;
            return $ruling;
        }
        $ruling->cover = '/storage/default/default-no-image.png';
        return $ruling;
    }

    private function formatToValidUrl(RulingPicture $ruling_picture)
    {
        $ruling_picture->formated_path = asset(self::valid_default_local_files.$ruling_picture->path);
        return $ruling_picture;
    }
}
