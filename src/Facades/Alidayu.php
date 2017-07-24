<?php

namespace Lelite\Alidayu\Facades;

use Illuminate\Support\Facades\Facade;
use Lelite\Alidayu\Contracts\Sms as SmsContract;

class Alidayu extends Facade
{
    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return SmsContract::class;
    }
}
