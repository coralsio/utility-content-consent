<?php

namespace Corals\Modules\Utility\ContentConsent;

use Corals\Foundation\Providers\BasePackageServiceProvider;
use Corals\Modules\Utility\ContentConsent\Classes\UtilityContentConsent;
use Corals\Modules\Utility\ContentConsent\Providers\UtilityAuthServiceProvider;
use Corals\Modules\Utility\ContentConsent\Providers\UtilityRouteServiceProvider;
use Corals\Settings\Facades\Modules;
use Corals\User\Communication\Facades\CoralsNotification;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\AliasLoader;
use Corals\Modules\Utility\ContentConsentHttp\Middleware\ContentConsent\ContentConsentMiddleware;
use Corals\Modules\Utility\ContentConsent\Providers\UtilityObserverServiceProvider;
use Corals\Settings\Facades\Settings;


class UtilityContentConsentServiceProvider extends BasePackageServiceProvider
{
    /**
     * @var
     */
    protected $packageCode = 'corals-utility-content-consent';

    public function bootPackage()
    {
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'utility-content-consent');
        $this->loadTranslationsFrom(__DIR__ . '/resources/lang', 'utility-content-consent');

        $this->mergeConfigFrom(
            __DIR__ . '/config/utility-content-consent.php',
            'utility-content-consent'
        );
        $this->publishes([
            __DIR__ . '/config/utility-content-consent.php' => config_path('utility-content-consent.php'),
            __DIR__ . '/resources/views' => resource_path('resources/views/vendor/utility-content-consent'),
        ]);
    }

    public function registerPackage()
    {
        $this->app->register(UtilityAuthServiceProvider::class);
        $this->app->register(UtilityRouteServiceProvider::class);

        $this->app->booted(function () {
            $loader = AliasLoader::getInstance();
            $loader->alias('UtilityContentConsent', UtilityContentConsent::class);
        });
    }

    public function registerModulesPackages()
    {
        Modules::addModulesPackages('corals/utility-content-consent');
    }


}
