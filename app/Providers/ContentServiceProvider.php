<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class ContentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */

    public $visitorCounter = "";

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->visitorCounter = DB::table('m_visitor')->count();

        view()->composer('layouts.app', function($view) {
            $view->with(['visitors' => $this->visitorCounter]);
        });
    }
}
