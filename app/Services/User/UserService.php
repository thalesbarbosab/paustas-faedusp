<?php

namespace App\Services\User;

use Illuminate\Support\Facades\Hash;

use App\Interfaces\Database\User\UserInterface;

class UserService
{
    public function __construct(
        protected readonly UserInterface $user_repository,
    ){}

    public function getEntityClassNamespace(): string
    {
        return \App\Models\User::class;
    }

    public function getAll(bool $format = false)
    {
        $users = $this->user_repository->getAll();
        return $users;
    }

    public function findOrFail($id)
    {
        $user = $this->user_repository->findOrFail($id);
        return $user;
    }

    public function delete($id): void
    {
        $this->user_repository->delete($id);
    }

    public function create(array $user_array)
    {
        if(isset($user_array['password'])){
            $user_array['password'] = Hash::make($user_array['password']);
        }
        return $this->user_repository->create($user_array);
    }

    public function update(array $user_array, $id)
    {
        if(isset($user_array['password'])){
            $user_array['password'] = Hash::make($user_array['password']);
        }
        return $this->user_repository->update($user_array, $id);
    }
}
