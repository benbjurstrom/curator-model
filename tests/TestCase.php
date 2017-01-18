<?php

namespace BenBjurstrom\CuratorModel\Test;

use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{

    public function setUp()
    {
        parent::setUp();

        $artisan = $this->app->make('Illuminate\Contracts\Console\Kernel');

        // Path to Model Factories (within your package
        $this->withFactories(__DIR__ . '/factories');

        // Migrate package tables
        $artisan->call('migrate', [
            '--realpath' => realpath(__DIR__ . '/../migrations/')
        ]);
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            'BenBjurstrom\CuratorModel\CuratorModelServiceProvider'
        ];
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        $app['config']->set('app', [
            'debug' => true,
            'key'   => str_random(32),
            'cipher'=> 'AES-256-CBC'
        ]);

        $base_path  = $app['path.base'];
        $db_path    = $app['path.database'];
    }
}