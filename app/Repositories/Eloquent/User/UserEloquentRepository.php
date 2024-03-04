<?php

namespace App\Repositories\Eloquent\User;

use Illuminate\Support\Collection;

use App\Interfaces\Database\User\UserInterface;
use App\Models\User;

class UserEloquentRepository implements UserInterface
{
    public function getAll() : Collection
    {
        return User::all();
    }

    public function findOrFail($id)
    {
       return User::findOrFail($id);
    }

    public function delete($id): void
    {
        $user = $this->findOrFail($id);
        $user->delete();
    }

    public function create(array $user_array)
    {
       return User::create($user_array);
    }

    public function update(array $user_array, $id)
    {
        $user = $this->findOrFail($id);
        $user->update($user_array);
    }
}
