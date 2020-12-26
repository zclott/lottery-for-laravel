<?php

namespace Zclott\Lottery;

use Illuminate\Support\ServiceProvider;

class LotteryServiceProvider extends ServiceProvider
{

    /**
     * 服务提供者加是否延迟加载.
     *
     * @var bool
     */
    protected $defer = true; // 延迟加载服务
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'lottery'); //view dir
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/vendor/lottery'), // publish to laravel resources 
        ]);
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton('lottery', function ($app) {
            return new Lottery( $app['config']);
        });
    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        // 因为延迟加载 所以要定义provides函数 具体参考laravel 文档
        return ['lottery'];
    }
}
