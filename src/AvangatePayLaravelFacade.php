<?php

namespace Avangate\AvangatePayLaravel;
use Illuminate\Support\Facades\Facade;

class AvangatePayLaravelFacade extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'avangate-laravel';
    }
}