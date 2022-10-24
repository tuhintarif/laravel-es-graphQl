<?php

namespace App\Providers;

use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\ClientBuilder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Client::class, fn($app) => $this->EsClientBuilder());
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    protected function EsClientBuilder(): Client
    {
        return ClientBuilder::create()
            ->setHosts($this->generateHostAndPort(config('elasticsearch.hosts')))
            ->build();

    }

    protected function generateHostAndPort(array $configs): array
    {
        $hosts = [];
        foreach ($configs as $config){
            $hosts[] = $config['host']. ':' .$config['port'];
        }
        return $hosts;
    }
}
