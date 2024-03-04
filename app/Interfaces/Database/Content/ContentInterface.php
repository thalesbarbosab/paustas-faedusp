<?php

namespace App\Interfaces\Database\Content;

use App\Models\Content;

interface ContentInterface
{
    public function findFirst() : ?Content;

    public function save(array $content_array): void;

    public function getSocialMedias() : ?Content;

    public function getHomeData() : ?Content;

    public function getBgData() : ?Content;

    public function getContactData() : ?Content;
}
