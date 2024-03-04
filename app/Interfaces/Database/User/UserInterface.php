<?php

namespace App\Interfaces\Database\User;

use Illuminate\Support\Collection;

interface UserInterface
{
     public function getAll() : Collection;

     public function findOrFail($id);

     public function delete($id) : void;

     public function create(array $user__array);

     public function update(array $user__array, $id);

}
