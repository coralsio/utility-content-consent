<?php

namespace Corals\Modules\Utility\ContentConsent\Facades;

use Illuminate\Support\Facades\Facade;

class UtilityContentConsent extends Facade
{
    /**
     * @return mixed
     */
    protected static function getFacadeAccessor()
    {
        return \Corals\Modules\Utility\ContentConsent\Classes\UtilityContentConsent::class;
    }
}
