<?php

namespace Medicplus\HL7\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use Medicplus\HL7\Contracts\SampleInterface;
use Medicplus\HL7\Facades\HL7;
use Medicplus\HL7\Sample;

/**
 * Class HL7ServiceProvider
 *
 * @author  Ivan Vasquez  <ivanvasquezp@outlook.com>
 * @author  Omar Acuña
 */
class HL7ServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the package.
     */
    public function boot() {
        /*
        |--------------------------------------------------------------------------
        | Publish the Config file from the Package to the App directory
        |--------------------------------------------------------------------------
        */
        $this->configPublisher();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        /*
        |--------------------------------------------------------------------------
        | Implementation Bindings
        |--------------------------------------------------------------------------
        */
        $this->implementationBindings();

        /*
        |--------------------------------------------------------------------------
        | Facade Bindings
        |--------------------------------------------------------------------------
        */
        $this->facadeBindings();

        /*
        |--------------------------------------------------------------------------
        | Registering Service Providers
        |--------------------------------------------------------------------------
        */
        $this->serviceProviders();
    }

    /**
     * Implementation Bindings
     */
    private function implementationBindings() {
        $this->app->bind(
            SampleInterface::class,
            Sample::class
        );
    }

    /**
     * Publish the Config file from the Package to the App directory
     */
    private function configPublisher() {
        // When users execute Laravel's vendor:publish command, the config file will be copied to the specified location
        $this->publishes([
            __DIR__ . '/Config/hl7.php' => config_path('hl7.php'),
        ]);
    }

    /**
     * Facades Binding
     */
    private function facadeBindings() {
        // Register 'nextpack.say' instance container
        $this->app['hl7.sample'] = $this->app->share(function ($app) {
            return $app->make(Sample::class);
        });

        // Register 'HL7' Alias, So users don't have to add the Alias to the 'app/config/app.php'
        $this->app->booting(function () {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('HL7', HL7::class);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {
        return [];
    }

    /**
     * Registering Other Custom Service Providers (if you have)
     */
    private function serviceProviders() {
        // $this->app->register('...\...\...');
    }
}
