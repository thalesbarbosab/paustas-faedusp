<?php

use App\Interfaces\Database\Shepherd\ShepherdRepositoryInterface;
use App\Repositories\Eloquent\Shepherd\ShepherdEloquentRepository;

return [
    /*
     |--------------------------------------------------------------------------
     | Bind Settings
     |--------------------------------------------------------------------------
     |
     | Here you can configure the bind settings
     |
    */

    /**
     * In interfaces_and_classes array put first (index) the interface namespace then the class (value)
     */
    'interfaces_and_classes' =>
    [
        // Repositories
        App\Interfaces\Database\User\UserInterface::class => App\Repositories\Eloquent\User\UserEloquentRepository::class,
        App\Interfaces\Database\Content\ContentInterface::class => App\Repositories\Eloquent\Content\ContentEloquentRepository::class,
        App\Interfaces\Database\Ruling\RulingInterface::class => App\Repositories\Eloquent\Ruling\RulingEloquentRepository::class,
        App\Interfaces\Database\Ruling\RulingPictureInterface::class => App\Repositories\Eloquent\Ruling\RulingPictureEloquentRepository::class,
        App\Interfaces\Database\Ruling\RulingVotingInterface::class => App\Repositories\Eloquent\Ruling\RulingVotingEloquentRepository::class,
        // Services
    ]
];
