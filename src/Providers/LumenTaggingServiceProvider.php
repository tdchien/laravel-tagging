<?php

namespace Chientd\Tagging\Providers;

use Illuminate\Support\ServiceProvider;
use Chientd\Tagging\Contracts\TaggingUtility;
use Chientd\Tagging\Util;

/**
 * Copyright (C) 2014 Robert Conner
 */
class LumenTaggingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TaggingUtility::class, function () {
            return new Util;
        });
    }

    /**
     * (non-PHPdoc)
     * @see \Illuminate\Support\ServiceProvider::provides()
     */
    public function provides()
    {
        return [TaggingUtility::class];
    }
}
