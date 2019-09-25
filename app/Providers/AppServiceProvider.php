<?php

namespace App\Providers;

use App\Contracts\Repositories\CommentRepository;
use App\Contracts\Repositories\PostRepository;
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
        $this->app->bind(PostRepository::class, \App\Repositories\PostRepository::class);
        $this->app->bind(CommentRepository::class, \App\Repositories\CommentRepository::class);
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
}
