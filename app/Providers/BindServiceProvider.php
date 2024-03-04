<?php

namespace App\Providers;

use InvalidArgumentException;
use Illuminate\Support\ServiceProvider;

/**
 * In this service provider will be bind all classes into their interfaces
 */
class BindServiceProvider extends ServiceProvider
{

    /** Avaible bind_types "singleton" ou "bind" */
    protected const bind_type = 'singleton';

    public function register()
    {
        $this->registerClasses();
    }

    protected function registerClasses()
    {
        $classes = config('binds.interfaces_and_classes');
        if(!isset($classes) || !is_array($classes)){
            throw new InvalidArgumentException('Invalid array interfaces_and_classes on Configurations/binds.php');
        }
        foreach ( $classes as $interface => $class) {
            $this->app->{self::bind_type}($interface, function ($app) use ($class) {
                return new $class;
            });
        }
    }
}
